<?php

use phpDocumentor\Reflection\DocBlock\Tags\Reference\Reference;

defined('BASEPATH') or exit('No direct script access allowed');

date_default_timezone_set('Asia/Riyadh');
class Jm extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
        $this->load->library('session');
        $this->load->helper('captcha');
        $this->load->library('excel');
        $this->load->model('Jm_model');
        $this->load->library('pdf');
    }

    public function view_function1($pageName, $data = '', $sdata = '', $ndata = '')
    {
        $sdata = array();
        $sdata['bcdp'] = 2;
        $ndata = array();
        $this->load->view('template/header', $sdata);
        $this->load->view('template/navbar', $ndata);
        $this->load->view($pageName, $data);
        $this->load->view('template/footer', $data);
        $this->load->view('template/script', $data);
        $this->load->view('template/last', $data);
    }
    public function index()
    {
        $rdata = array();
        $sdata = array();
        $ndata = array();
        $rdata['pagetitle'] = 'Homepage';
        $this->view_function1('newjm/newjob_form', $rdata, $sdata, $ndata);
    }
    // Add-On Work - HYDROSEAL
    // Job creation: Job received date, Job type, Job Title, customer name, employee name, Product list, expected completion date, expected cost, scope of work,
    // After job creation: View, edit, status update and conversion to invoice.
    public function newjob()
    {
        $rdata['pagetitle'] = 'Create Job';
        $rdata['b1'] = $this->lang->line('dashboard');;
        $rdata['b2'] = 'Create Job';
        $rdata['b3'] = '';
        $rdata['trb'] = '';
        $sdata['job'] = 'active bg-gradient-';
        $sdata['index'] = '';
        $ndata['title'] = 'Create Job';
        $ndata['bn1'] = $this->lang->line('dashboard');;
        $ndata['bn3'] = 'Create Job';
        $this->view_function1('jm/newjob', $rdata, $sdata, $ndata);
    }
    public function getitemdetailsbyid()
    {
        $id = $this->input->get('id');

        if (empty($id)) {
            echo json_encode(['success' => false, 'error' => 'Item ID is required']);
            return;
        }

        $columns = [
            'i.id',
            'i.name',
            'i.sales_price',
            'i.mrp',
            'i.unit_id',
            'u.uqc',
            'u.id as unitid',
            'i.qty',
            'i.item_code',
            'i.description',
            'i.vat_perc',

        ];

        $item = $this->Jm_model->getJoinedDataPagination(
            'tbl_items i',
            ['tbl_unitofmeasure u' => 'u.id = i.unit_id'],
            $columns,
            ['i.id' => $id, 'i.status' => 0],
            'row'
        );

        if (!$item) {
            echo json_encode(['success' => false, 'error' => 'Item not found']);
            return;
        }

        echo json_encode(['success' => true, 'data' => $item]);
    }
    public function savejob()
    {

        $customer_id   = $this->input->post('client_name');
        $received_date = $this->input->post('received_date');
        $expected_date = $this->input->post('expected_date');
        $items         = $this->input->post('items');

        // ── Generate Job Number ──────────────────────────────────────────────────
        $last = $this->Jm_model->getJoinedDataPagination(
            'tbl_maintenance_job',
            [],
            'job_number',
            [],
            'row',
            '',
            ['id' => 'DESC'],
            1,
            0
        );

        if (!empty($last) && !empty($last['job_number'])) {
            $lastNumber = (int) str_replace('JOB_', '', $last['job_number']);
            $nextNumber = $lastNumber + 1;
        } else {
            $nextNumber = 1;
        }

        $job_no = 'JOB_' . str_pad($nextNumber, 5, '0', STR_PAD_LEFT);

        // ── Compute grand total from line items ──────────────────────────────────
        $grand_total    = 0;
        $estimated_cost = $this->input->post('estimated_cost');

        if (!empty($items) && is_array($items)) {
            foreach ($items as $it) {
                $grand_total += (float)($it['total_price'] ?? 0);
            }
        }

        // ── Step 1: Insert into tbl_logs first ──────────────────────────────────
        $log_data = [
            'status'     => 0,
        ];

        $log_id = $this->Jm_model->insert_to_tb('tbl_logs', $log_data);


        if (!$log_id) {
            redirect('jm/newjob', $rdata, $sdata, $ndata);
            return;
        }

        // ── Step 2: Insert main job record ──────────────────────────────────────
        $job_data = [

            // Basic Details
            'reference'               => $log_id,
            'customer'                => $customer_id,
            'job_number'              => $job_no,
            'job_name'                => $this->input->post('job_title'),
            'job_type'                => $this->input->post('job_type'),

            // Dates
            'recieved_date'           => $received_date,
            'estimated_delivery_date' => $expected_date,

            // Status
            'job_status'              => 0,
            'status'                  => 0,

            // Description
            'description'             => $this->input->post('problem_desc'),
            'remark'                  => $this->input->post('scope_of_work'),

            // Technician
            'technician_id'           => $this->input->post('assigned_to'),

            // Amounts
            'grand_total'                => $this->input->post('sum_subtotal'),
            'discount'                => $this->input->post('sum_disc'),
            'vat'                     => $this->input->post('sum_tax'),
            'grand_total'             => $this->input->post('sum_grand'),
            'estimated_cost'          => $estimated_cost ?: $grand_total,

            // Audit
            'datetime'                => date('Y-m-d H:i:s'),
            'ip_address'              => $this->input->ip_address(),
            'added_by'                => $this->session->userdata('user_id') ?? 1,
        ];
        $job_id = $this->Jm_model->insert_to_tb('tbl_maintenance_job', $job_data);

        // ── Step 3: Insert line items ────────────────────────────────────────────
        if ($job_id && !empty($items) && is_array($items)) {

            foreach ($items as $order => $it) {

                $item_data = [
                    'reference'   => $log_id,        // ← tbl_logs ID
                    'item_order'  => $order + 1,
                    'currency'    => 0,
                    'ccrate'      => 0.00,
                    'parent_id'   => $job_id,
                    'invoice_id'  => $job_id,
                    'type'        => 0,
                    'item_id'     => $it['item_id']     ?? null,
                    'item_name'   => $it['item_name']   ?? '',
                    'mrp'         => $it['mrp']         ?? 0.00,
                    'rate'        => $it['price']       ?? 0.00,
                    'price'       => $it['price']       ?? 0.00,
                    'quantity'    => $it['quantity']    ?? 0.00,
                    'free_qty'    => 0.00,
                    'unit_id'     => $it['unit']        ?? null,
                    'discount'    => $it['disc_amt']    ?? 0.00,
                    'taxable'     => $it['taxable']     ?? 0.00,
                    'vat_perc'    => $it['vat_perc']    ?? 0.00,
                    'vat_amt'     => $it['vat_amt']     ?? 0.00,
                    'cess_perc'   => 0.00,
                    'cess_amt'    => 0.00,
                    'disc_perc'   => $it['disc_perc']   ?? 0.00,
                    'disc_amt'    => $it['disc_amt']    ?? 0.00,
                    'total_price' => $it['total_price'] ?? 0.00,
                    'description' => $it['description'] ?? '',
                    'remark'      => $it['remark']      ?? '',
                    'status'      => 0,
                ];

                $this->Jm_model->insert_to_tb('tbl_maintenance_job_items', $item_data);
            }
        }

        // ── Redirect ─────────────────────────────────────────────────────────────
        if ($job_id) {
            redirect('jm/listjobs');
        } else {
            redirect('jm/newjob');
        }
    }
    public function listjobs()
    {
        $rdata['pagetitle'] = 'List Jobs';
        $rdata['b1']  = $this->lang->line('dashboard');
        $rdata['b2']  = 'List Jobs';
        $rdata['b3']  = '';
        $rdata['trb'] = '';
        $sdata['jobs']  = 'active bg-gradient-';
        $sdata['index'] = '';
        $ndata['title'] = 'List Jobs';
        $ndata['bn1']   = $this->lang->line('dashboard');
        $ndata['bn3']   = 'List Jobs';

        $perPage = 10;
        $page    = max(1, (int)($this->input->get('page') ?: 1));
        $start   = ($page - 1) * $perPage;

        $from_date = $this->input->get('start_date');
        $to_date   = $this->input->get('end_date');
        $client    = $this->input->get('client_name');
        $job       = $this->input->get('job_number');

        // Build shared WHERE — used for BOTH count and paginated fetch
        $where = [
            'mj.status'          => 0,
            'mj.job_type IN (0,1)' => null,
        ];

        if (!empty($from_date)) {
            $where['mj.recieved_date >='] = $from_date . ' 00:00:00';
        }
        if (!empty($to_date)) {
            $where['mj.recieved_date <='] = $to_date . ' 23:59:59';
        }
        if (!empty($client)) {
            $where['p.name LIKE'] = "%{$client}%";
        }
        if (!empty($job)) {
            $where['mj.job_number LIKE'] = "%{$job}%";
        }

        // Count with the SAME filters applied
        $allFiltered = $this->Jm_model->getJoinedDataPagination(
            'tbl_maintenance_job mj',
            [
                'tbl_profile p' => 'mj.customer = p.id',
                'tbl_profile e' => 'mj.technician_id = e.id',
            ],
            'mj.id',
            $where,
            'array'
        );
        $totalRows = is_array($allFiltered) ? count($allFiltered) : 0;

        $columns = [
            'mj.id as job_id',
            'mj.recieved_date as date',
            'mj.job_type',
            'mj.job_name',
            'mj.item',
            'mj.approval_status',
            'mj.job_status',
            'mj.job_number',
            'mj.is_paid',
            'mj.progress_status',
            'p.name as client_name',
            'e.name as assigned_to_name',
        ];

        $rdata['jobs'] = $this->Jm_model->getJoinedDataPagination(
            'tbl_maintenance_job mj',
            [
                'tbl_profile p' => 'mj.customer = p.id',
                'tbl_profile e' => 'mj.technician_id = e.id',
            ],
            $columns,
            $where,
            'array',
            '',
            ['mj.id' => 'DESC'],
            $perPage,
            $start
        );

        $rdata['start']      = $start;
        $rdata['perPage']    = $perPage;
        $rdata['totalRows']  = $totalRows;
        $rdata['totalPages'] = ceil($totalRows / $perPage);
        $rdata['page']       = $page;

        // Preserve all filters in pagination links
        $queryParams = $this->input->get() ?: [];
        unset($queryParams['page']);
        $rdata['suffix'] = !empty($queryParams) ? '&' . http_build_query($queryParams) : '';

        $this->view_function1('jm/jobs', $rdata, $sdata, $ndata);
    }
    public function getproducts()
    {
        $products = $this->Jm_model->get_specific_columns(
            'tbl_items',
            'id, name',
            ['status' => 0]
        );

        $data = array_map(function ($row) {
            return ['id' => $row['id'], 'text' => $row['name']];
        }, $products);

        header('Content-Type: application/json');
        echo json_encode(['success' => true, 'data' => $data]);
        exit;
    }

    public function getclients()
    {
        $customers = $this->Jm_model->get_specific_columns(
            'tbl_profile',
            'id, name',
            ['type' => 0, 'status' => 0]
        );

        $data = array_map(function ($row) {
            return ['id' => $row['id'], 'text' => $row['name']];
        }, $customers);

        header('Content-Type: application/json');
        echo json_encode(['success' => true, 'data' => $data]);
        exit;
    }

    public function getemployees()
    {
        $employees = $this->Jm_model->get_specific_columns(
            'tbl_profile',
            'id, name',
            ['type' => 1, 'status' => 0]
        );

        $data = array_map(function ($row) {
            return ['id' => $row['id'], 'text' => $row['name']];
        }, $employees);

        header('Content-Type: application/json');
        echo json_encode(['success' => true, 'data' => $data]);
        exit;
    }

    public function getunits()
    {
        $units = $this->Jm_model->get_specific_columns(
            'tbl_unitofmeasure',
            'id, uqc',
            ['status' => 0, 'showstatus' => 0]
        );

        $data = array_map(function ($row) {
            return ['id' => $row['id'], 'text' => $row['uqc']];
        }, $units);

        header('Content-Type: application/json');
        echo json_encode(['success' => true, 'data' => $data]);
        exit;
    }
    public function updatejobstatus()
    {
        if (ob_get_level() > 0) ob_clean();
        header('Content-Type: application/json');

        try {
            $job_id = $this->input->post('job_id');
            $requested_ui_id = (int)$this->input->post('job_status');
            // 1. Fetch current job state
            $current_job = $this->Jm_model->get_specific_columns(
                'tbl_maintenance_job',
                'job_status,approval_status,is_paid,progress_status',
                ['id' => $job_id]
            );

            if (is_object($current_job)) {
                $current_job = get_object_vars($current_job);
            } elseif (empty($current_job)) {
                throw new Exception("Job ID $job_id not found in database.");
            }

            $js = (int)($current_job[0]['job_status'] ?? 0);
            $as = (int)($current_job[0]['approval_status'] ?? null);
            $ip = (int)($current_job[0]['is_paid'] ?? 0);
            $ps = (int)($current_job[0]['progress_status'] ?? null);
            $update_data = [];
            $is_valid = false;
            $msg = "Transition not allowed from current state.";
            switch ($requested_ui_id) {

                // 1 → New Job (Only if totally fresh)
                case 1:
                    if ($js === null && $as === null && $ip === null) {
                        $update_data = ['job_status' => 0];
                        $is_valid = true;
                    }
                    break;

                // 2 → Quotation Given (ONLY if approval_status is NULL)
                case 2:
                    if ($js == 0) {
                        $update_data = ['approval_status' => 10];
                        $is_valid = true;
                    }
                    break;

                // 3 → Quotation Approved (ONLY if approval_status is EXACTLY 10)
                case 3:
                    if ($js == 0 && $as === 10) {
                        $update_data = ['approval_status' => 11];
                        $is_valid = true;
                    }
                    break;

                // 4 → Quotation Cancelled (ONLY if approval_status is EXACTLY 10)
                case 4:
                    if ($js == 0 && $as === 10) {
                        $update_data = ['approval_status' => 12];
                        $is_valid = true;
                    }
                    break;

                // 5 / 6 / 7 → Payment (only if Approved)
                case 5: // Not Paid
                case 6: // Advance
                case 7: // Fully Paid
                    $val = ($requested_ui_id == 5) ? 0 : (($requested_ui_id == 6) ? 1 : 2);
                    if ($js >= 0 && $as == 11) {
                        $update_data = ['is_paid' => $val];
                        $is_valid = true;
                    }
                    break;

                // 8 → Job Started (only if Approved)
                case 8:
                    if ($js == 0 && $as == 11) {
                        $update_data = ['job_status' => 4];
                        $is_valid = true;
                    }
                    break;

                // 9 / 10 / 11 → Progress (only if Started)
                case 9:  // Repaired
                case 10: // Replaced
                case 11: // Repaired & Replaced
                    $val = ($requested_ui_id == 9) ? 10 : (($requested_ui_id == 10) ? 11 : 12);
                    if ($js == 4 && $as == 11) {
                        $update_data = ['progress_status' => $val];
                        $is_valid = true;
                    }
                    break;

                // 12 → Job Completed (must be Started + Progress done)
                case 12:
                    if ($js == 4 && $as == 11 && in_array($ps, [10, 11, 12])) {
                        $update_data = ['job_status' => 5];
                        $is_valid = true;
                    }
                    break;

                // 13 → Delivered (must be Completed + Fully Paid)
                case 13:
                    if ($js == 5 && $as == 11 && $ip == 2) {
                        $update_data = ['job_status' => 8];
                        $is_valid = true;
                    } else {
                        $msg = "Deliver Error: Job must be Completed and Fully Paid.";
                    }
                    break;
            }


            if ($is_valid && !empty($update_data)) {
                $this->Jm_model->update_record('tbl_maintenance_job', $update_data, ['id' => $job_id]);

                echo json_encode(["status" => "success", "message" => "Updated"]);
            } else {
                echo json_encode(["status" => "error", "message" => $msg]);
            }
        } catch (Exception $e) {
            echo json_encode(["status" => "error", "message" => $e->getMessage()]);
        }

        exit;
    }
    public function editjob()
    {
        $rdata['pagetitle'] = 'Edit Job';

        $rdata['b1'] = $this->lang->line('dashboard');;
        $rdata['b2'] = 'Edit Job';
        $rdata['b3'] = '';
        $rdata['trb'] = '';
        $sdata['jobedit'] = 'active bg-gradient-';
        $sdata['index'] = '';
        $ndata['title'] = 'Edit Job';
        $ndata['bn1'] = $this->lang->line('dashboard');;
        $ndata['bn3'] = 'Edit Job';

        $rdata['pagetitle'] = 'Update Job';
        $id = $this->input->get('id');

        if (empty($id)) {
            $this->session->set_flashdata('error', 'Job ID is required');
            redirect('jm/listjobs');
            return;
        }

        // ── Fetch job (no JOIN on items) ──────────────────────────────
        $condition = [
            'mj.id'             => $id,
            'mj.status'         => 0,
            'mj.job_type IN (0,1)' => null
        ];

        $rdata['jobs'] = $this->Jm_model->getJoinedDataPagination(
            'tbl_maintenance_job mj',
            [
                'tbl_profile p' => 'mj.customer = p.id',
                'tbl_profile e' => 'mj.technician_id = e.id'
            ],
            'mj.job_name,
        mj.id as job_id,
        mj.job_status,
        mj.job_number,
        mj.job_type,
        mj.is_paid,
        mj.item,
        mj.reference,
        mj.approval_status,
        mj.progress_status,
        mj.recieved_date,
        mj.estimated_delivery_date,
        mj.description,
        mj.estimated_cost,
        mj.remark,
        mj.technician_id,
        mj.customer,
        p.name as client_name,
        e.name as assigned_to_name',
            $condition,
            'row'
        );

        // ── Fetch job items separately (only if editable) ─────────────
        $approval_status = isset($rdata['jobs']['approval_status'])
            ? $rdata['jobs']['approval_status']
            : null;

        if ($approval_status != 14) {
            $rdata['job_items'] = $this->Jm_model->get_specific_columns(
                'tbl_maintenance_job_items',
                'id as item_id,
            item_name,
            description,
            mrp,
            price,
            quantity,
            unit_id,
            disc_perc,
            disc_amt,
            taxable,
            vat_perc,
            vat_amt,
            total_price,
            remark',
                ['reference' => $rdata['jobs']['reference'], 'status' => 0]
            );
        } else {
            $rdata['job_items'] = [];
        }

        $rdata['customers'] = $this->Jm_model->get_specific_columns(
            'tbl_profile',
            'id, name',
            ['type' => 0, 'status' => 0]
        );
        $rdata['employees'] = $this->Jm_model->get_specific_columns(
            'tbl_profile',
            'id, name',
            ['type' => 1, 'status' => 0]
        );
        $rdata['products'] = $this->Jm_model->get_specific_columns(
            'tbl_items',
            'id, name',
            ['status' => 0]
        );
        $rdata['units'] = $this->Jm_model->get_specific_columns(
            'tbl_unitofmeasure',
            'id, uqc',
            ['status' => 0]
        );

        $this->view_function1('jm/editjob', $rdata, $sdata, $ndata);
    }
    public function updatejob()
    {
        $id    = $this->input->post('job_id');
        $items = $this->input->post('items');

        if (empty($id)) {
            $this->session->set_flashdata('error', 'Job ID is required');
            redirect('jm/listjobs');
            return;
        }

        // ── Fetch existing job to get reference (log_id) ────────────────────────
        $existing = $this->Jm_model->getJoinedDataPagination(
            'tbl_maintenance_job',
            [],
            'id, reference, approval_status',
            ['id' => $id, 'status' => 0],
            'row'
        );

        if (empty($existing)) {
            $this->session->set_flashdata('error', 'Job not found');
            redirect('jm/listjobs');
            return;
        }

        $log_id          = $existing['reference'];
        $approval_status = $existing['approval_status'];

        // ── Compute grand total from line items ──────────────────────────────────
        $grand_total    = 0;
        $estimated_cost = $this->input->post('estimated_cost');

        if (!empty($items) && is_array($items)) {
            foreach ($items as $it) {
                $grand_total += (float)($it['total_price'] ?? 0);
            }
        }

        // ── Update main job record ───────────────────────────────────────────────
        $job_data = [
            'customer'                => $this->input->post('client_name'),
            'job_name'                => $this->input->post('job_title'),
            'job_type'                => $this->input->post('job_type'),
            'recieved_date'           => $this->input->post('received_date'),
            'estimated_delivery_date' => $this->input->post('expected_date'),
            'description'             => $this->input->post('problem_desc'),
            'remark'                  => $this->input->post('scope_of_work'),
            'technician_id'           => $this->input->post('assigned_to'),
            'discount'                => $this->input->post('sum_disc'),
            'vat'                     => $this->input->post('sum_tax'),
            'grand_total'             => $this->input->post('sum_grand'),
            'estimated_cost'          => $estimated_cost ?: $grand_total,
            'datetime'                => date('Y-m-d H:i:s'),
            'ip_address'              => $this->input->ip_address(),
            'added_by'                => $this->session->userdata('user_id') ?? 1,
        ];

        $updated = $this->Jm_model->update_record('tbl_maintenance_job', $job_data, ['id' => $id]);

        // ── Update line items only if approval_status != 14 ─────────────────────
        if ($approval_status != 14 && !empty($log_id)) {

            // Delete old items for this job reference
            $this->Jm_model->update_record(
                'tbl_maintenance_job_items',
                ['status' => 1],               // soft delete
                ['reference' => $log_id]
            );

            // Re-insert updated items
            if (!empty($items) && is_array($items)) {
                foreach ($items as $order => $it) {
                    $item_data = [
                        'reference'   => $log_id,
                        'item_order'  => $order + 1,
                        'currency'    => 0,
                        'ccrate'      => 0.00,
                        'parent_id'   => $id,
                        'invoice_id'  => $id,
                        'type'        => 0,
                        'item_id'     => $it['item_id']     ?? null,
                        'item_name'   => $it['item_name']   ?? '',
                        'mrp'         => $it['mrp']         ?? 0.00,
                        'rate'        => $it['price']       ?? 0.00,
                        'price'       => $it['price']       ?? 0.00,
                        'quantity'    => $it['quantity']    ?? 0.00,
                        'free_qty'    => 0.00,
                        'unit_id'     => $it['unit']        ?? null,
                        'discount'    => $it['disc_amt']    ?? 0.00,
                        'taxable'     => $it['taxable']     ?? 0.00,
                        'vat_perc'    => $it['vat_perc']    ?? 0.00,
                        'vat_amt'     => $it['vat_amt']     ?? 0.00,
                        'cess_perc'   => 0.00,
                        'cess_amt'    => 0.00,
                        'disc_perc'   => $it['disc_perc']   ?? 0.00,
                        'disc_amt'    => $it['disc_amt']    ?? 0.00,
                        'total_price' => $it['total_price'] ?? 0.00,
                        'description' => $it['description'] ?? '',
                        'remark'      => $it['remark']      ?? '',
                        'status'      => 0,
                    ];

                    $this->Jm_model->insert_to_tb('tbl_maintenance_job_items', $item_data);
                }
            }
        }

        // ── Redirect ─────────────────────────────────────────────────────────────
        if ($updated) {
            $this->session->set_flashdata('success', 'Job updated successfully');
            redirect('jm/listjobs');
        } else {
            $this->session->set_flashdata('error', 'Failed to update job');
            redirect('jm/editjob?id=' . $id);
        }
    }
    // public function jobview()
    // {
    //     $rdata['pagetitle'] = 'Job View';

    //     $rdata['b1'] = $this->lang->line('dashboard');;
    //     $rdata['b2'] = 'Job View';
    //     $rdata['b3'] = '';
    //     $rdata['trb'] = '';
    //     $sdata['jobview'] = 'active bg-gradient-';
    //     $sdata['index'] = '';
    //     $ndata['title'] = 'Job View';
    //     $ndata['bn1'] = $this->lang->line('dashboard');;
    //     $ndata['bn3'] = 'Job View';

    //     // Job ID
    //     $id = $this->input->get('id');
    //     if (empty($id)) {
    //         $this->session->set_flashdata('error', 'Job ID is required');
    //         redirect('jm/listjobs');
    //         return;
    //     }
    //     // Job Details with customer and technician names
    //     $rdata['job'] = $this->Jm_model->getJoinedDataPagination(
    //         'tbl_maintenance_job mj',
    //         [
    //             'tbl_profile p' => 'mj.customer = p.id',
    //             'tbl_profile e' => 'mj.technician_id = e.id',
    //         ],
    //         'mj.job_name,
    //         mj.reference,
    //         mj.id as job_id,
    //         mj.job_status,
    //         mj.job_number,
    //         mj.job_type,
    //         mj.approval_status,
    //         mj.progress_status,
    //         mj.is_paid,
    //         mj.progress_status,
    //         mj.recieved_date,
    //         mj.estimated_delivery_date,
    //         mj.description,
    //         mj.estimated_cost,
    //         mj.remark,
    //         mj.technician_id,
    //         mj.customer,
    //         p.name as client_name,
    //         e.name as assigned_to_name',
    //         "mj.status = 0 AND (mj.job_type = 0 OR mj.job_type = 1) AND mj.id = " . (int)$id,
    //         'row',
    //         '',
    //         [],
    //     );
    //     // Check Invoice Created or not for this job
    //     $rdata['invoices'] = $this->Jm_model->getJoinedDataPagination(
    //         'tbl_invoice inv',
    //         [
    //             'tbl_invoice_items ii' => 'ii.reference = inv.reference',
    //             'tbl_maintenance_job mj' => 'mj.id = inv.logistics_job_id',
    //         ],
    //         '
    //         mj.id as job_id,
    //         inv.id as invoice_id,
    //          inv.reference',
    //         "mj.status = 0 AND (mj.job_type = 0 OR mj.job_type = 1) AND inv.logistics_job_id = " . (int)$id,
    //         'row',
    //         '',
    //         [],
    //     );
    //     $rdata['inv_id'] = $rdata['invoices'] ? $rdata['invoices']['invoice_id'] : null;
    //     $reference = $rdata['invoices']['reference'] ?? null;
    //     // Invoice Items (if invoice exists)
    //     $rdata['items'] = $this->Jm_model->getJoinedDataPagination(
    //         'tbl_invoice_items ii',
    //         [
    //             'tbl_invoice inv' => 'ii.reference = inv.reference',
    //             'tbl_unitofmeasure  u' => 'ii.unit_id = u.id',
    //             'tbl_items i' => 'ii.item_id = i.id'
    //         ],
    //         [
    //             'ii.item_name',
    //             'ii.reference',
    //             'ii.item_id',
    //             'ii.price',
    //             'ii.mrp',
    //             'ii.quantity',
    //             'ii.unit_id',
    //             'ii.disc_perc',
    //             'ii.disc_amt',
    //             'ii.taxable',
    //             'ii.vat_perc',
    //             'ii.vat_amt',
    //             'ii.total_price',
    //             'ii.description',
    //             'ii.remark',
    //             'ii.nf1',
    //             'ii.status',
    //             'u.uqc as unit_name',
    //             'i.name as itemname',
    //         ],
    //         [
    //             'ii.reference' => $reference,
    //             'ii.status' => 0
    //         ],
    //         'array',
    //         '',
    //         ['ii.id' => 'DESC']
    //     );

    //     $this->view_function1('jm/jobview', $rdata, $sdata, $ndata);
    // }
    // public function printjob()
    // {
    //     // Job ID
    //     $id = $this->input->get('id');
    //     if (empty($id)) {
    //         $this->session->set_flashdata('error', 'Job ID is required');
    //         redirect('jm/listjobs');
    //         return;
    //     }

    //     // Job Details with customer and technician names
    //     $job = $this->Jm_model->getJoinedDataPagination(
    //         'tbl_maintenance_job mj',
    //         [
    //             'tbl_profile p' => 'mj.customer = p.id',
    //             'tbl_profile e' => 'mj.technician_id = e.id'
    //         ],
    //         'mj.job_name,
    //         mj.reference,
    //         mj.id as job_id,
    //         mj.job_status,
    //         mj.job_number,
    //         mj.job_type,
    //         mj.approval_status,
    //         mj.progress_status,
    //         mj.is_paid,
    //         mj.recieved_date,
    //         mj.estimated_delivery_date,
    //         mj.description,
    //         mj.estimated_cost,
    //         mj.remark,
    //         mj.technician_id,
    //         mj.customer,
    //         p.name as client_name,
    //         e.name as assigned_to_name',
    //         "mj.status = 0 AND (mj.job_type = 0 OR mj.job_type = 1) AND mj.id = " . (int)$id,
    //         'row',
    //         '',
    //         [],
    //     );

    //     if (empty($job)) {
    //         $this->session->set_flashdata('error', 'Job not found');
    //         redirect('jm/listjobs');
    //         return;
    //     }

    //     // Check Invoice for this job
    //     $invoices = $this->Jm_model->getJoinedDataPagination(
    //         'tbl_invoice inv',
    //         [
    //             'tbl_invoice_items ii' => 'ii.reference = inv.reference',
    //             'tbl_maintenance_job mj' => 'mj.id = inv.logistics_job_id',
    //         ],
    //         'mj.id as job_id,
    //     inv.id as invoice_id,
    //     inv.reference',
    //         "mj.status = 0 AND (mj.job_type = 0 OR mj.job_type = 1) AND inv.logistics_job_id = " . (int)$id,
    //         'row',
    //         '',
    //         [],
    //     );

    //     $inv_id    = $invoices ? $invoices['invoice_id'] : null;
    //     $reference = $invoices['reference'] ?? null;

    //     // Invoice Items (if invoice exists)
    //     $items = [];
    //     if ($reference) {
    //         $items = $this->Jm_model->getJoinedDataPagination(
    //             'tbl_invoice_items ii',
    //             [
    //                 'tbl_invoice inv'       => 'ii.reference = inv.reference',
    //                 'tbl_unitofmeasure u'   => 'ii.unit_id = u.id',
    //                 'tbl_items i'           => 'ii.item_id = i.id'
    //             ],
    //             [
    //                 'ii.item_name',
    //                 'ii.reference',
    //                 'ii.item_id',
    //                 'ii.price',
    //                 'ii.mrp',
    //                 'ii.quantity',
    //                 'ii.unit_id',
    //                 'ii.disc_perc',
    //                 'ii.disc_amt',
    //                 'ii.taxable',
    //                 'ii.vat_perc',
    //                 'ii.vat_amt',
    //                 'ii.total_price',
    //                 'ii.description',
    //                 'ii.remark',
    //                 'ii.nf1',
    //                 'ii.status',
    //                 'u.uqc',
    //                 'i.name as itemname',
    //             ],
    //             [
    //                 'ii.reference' => $reference,
    //                 'ii.status'    => 0
    //             ],
    //             'array',
    //             '',
    //             ['ii.id' => 'DESC']
    //         );
    //     }

    //     // Build HTML for PDF
    //     $data = [
    //         'job'      => $job,
    //         'invoices' => $invoices,
    //         'inv_id'   => $inv_id,
    //         'items'    => $items,
    //     ];
    //     // print_r($data);
    //     // return $data;
    //     $html = $this->load->view('jm/printjob', $data, true);

    //     // Load mPDF library (adjust path to your setup)
    //     // Via Composer: require_once APPPATH . '../vendor/autoload.php';
    //     // Or manually:  require_once APPPATH . 'third_party/mpdf/autoload.php';
    //     require_once APPPATH . '../vendor/autoload.php';

    //     $mpdf = new \Mpdf\Mpdf([
    //         'margin_top'    => 10,
    //         'margin_bottom' => 10,
    //         'margin_left'   => 10,
    //         'margin_right'  => 10,
    //     ]);

    //     $mpdf->SetTitle('Job # ' . $job['job_number']);
    //     $mpdf->WriteHTML($html);

    //     // 'D' = force download | 'I' = inline in browser
    //     $mpdf->Output('job_' . $job['job_number'] . '.pdf', 'I');
    //     exit;
    // }
    public function jobview()
    {
        $rdata['pagetitle'] = 'Job View';

        $rdata['b1'] = $this->lang->line('dashboard');
        $rdata['b2'] = 'Job View';
        $rdata['b3'] = '';
        $rdata['trb'] = '';
        $sdata['jobview'] = 'active bg-gradient-';
        $sdata['index'] = '';
        $ndata['title'] = 'Job View';
        $ndata['bn1'] = $this->lang->line('dashboard');
        $ndata['bn3'] = 'Job View';

        // Job ID
        $id = $this->input->get('id');
        if (empty($id)) {
            $this->session->set_flashdata('error', 'Job ID is required');
            redirect('jm/listjobs');
            return;
        }

        // Job Details with customer and technician names
        $rdata['job'] = $this->Jm_model->getJoinedDataPagination(
            'tbl_maintenance_job mj',
            [
                'tbl_profile p' => 'mj.customer = p.id',
                'tbl_profile e' => 'mj.technician_id = e.id',
            ],
            'mj.job_name,
        mj.reference,
        mj.id as job_id,
        mj.job_status,
        mj.job_number,
        mj.job_type,
        mj.approval_status,
        mj.progress_status,
        mj.is_paid,
        mj.recieved_date,
        mj.estimated_delivery_date,
        mj.description,
        mj.estimated_cost,
        mj.remark,
        mj.technician_id,
        mj.customer,
        p.name as client_name,
        e.name as assigned_to_name',
            "mj.status = 0 AND (mj.job_type = 0 OR mj.job_type = 1) AND mj.id = " . (int)$id,
            'row',
            '',
            [],
        );

        if (empty($rdata['job'])) {
            $this->session->set_flashdata('error', 'Job not found');
            redirect('jm/listjobs');
            return;
        }

        // reference = tbl_logs id saved against this job's items
        $reference = $rdata['job']['reference'] ?? null;

        // Items straight from tbl_maintenance_job_items, no invoice check
        $rdata['items'] = $this->Jm_model->getJoinedDataPagination(
            'tbl_maintenance_job_items mji',
            [
                'tbl_unitofmeasure u' => 'mji.unit_id = u.id',
                'tbl_items i'         => 'mji.item_id = i.id'
            ],
            [
                'mji.item_name',
                'mji.reference',
                'mji.item_id',
                'mji.price',
                'mji.mrp',
                'mji.quantity',
                'mji.unit_id',
                'mji.disc_perc',
                'mji.disc_amt',
                'mji.taxable',
                'mji.vat_perc',
                'mji.vat_amt',
                'mji.total_price',
                'mji.description',
                'mji.remark',
                'mji.status',
                'u.uqc as unit_name',
                'i.name as itemname',
            ],
            [
                'mji.reference' => $reference,
                'mji.status'    => 0
            ],
            'array',
            '',
            ['mji.id' => 'DESC']
        );
        $this->view_function1('jm/jobview', $rdata, $sdata, $ndata);
    }
    public function printjob()
    {
        // Job ID
        $id = $this->input->get('id');
        if (empty($id)) {
            $this->session->set_flashdata('error', 'Job ID is required');
            redirect('jm/listjobs');
            return;
        }

        // Job Details with customer and technician names
        $job = $this->Jm_model->getJoinedDataPagination(
            'tbl_maintenance_job mj',
            [
                'tbl_profile p' => 'mj.customer = p.id',
                'tbl_profile e' => 'mj.technician_id = e.id'
            ],
            'mj.job_name,
        mj.reference,
        mj.id as job_id,
        mj.job_status,
        mj.job_number,
        mj.job_type,
        mj.approval_status,
        mj.progress_status,
        mj.is_paid,
        mj.recieved_date,
        mj.estimated_delivery_date,
        mj.description,
        mj.estimated_cost,
        mj.remark,
        mj.technician_id,
        mj.customer,
        p.name as client_name,
        e.name as assigned_to_name',
            "mj.status = 0 AND (mj.job_type = 0 OR mj.job_type = 1) AND mj.id = " . (int)$id,
            'row',
            '',
            [],
        );

        if (empty($job)) {
            $this->session->set_flashdata('error', 'Job not found');
            redirect('jm/listjobs');
            return;
        }

        // Reference on the job row = tbl_logs id used when items were saved
        $reference = $job['reference'] ?? null;

        // Items straight from tbl_maintenance_job_items, no invoice check
        $items = [];
        if ($reference) {
            $items = $this->Jm_model->getJoinedDataPagination(
                'tbl_maintenance_job_items mji',
                [
                    'tbl_maintenance_job mj' => 'mji.reference = mj.id',
                    'tbl_unitofmeasure u'   => 'mji.unit_id = u.id',
                    'tbl_items i'           => 'mji.item_id = i.id'
                ],
                [
                    'mji.item_name',
                    'mji.reference',
                    'mji.item_id',
                    'mji.price',
                    'mji.mrp',
                    'mji.quantity',
                    'mji.unit_id',
                    'mji.disc_perc',
                    'mji.disc_amt',
                    'mji.taxable',
                    'mji.vat_perc',
                    'mji.vat_amt',
                    'mji.total_price',
                    'mji.description',
                    'mji.remark',
                    'mji.status',
                    'u.uqc as unit_name',
                    'i.name as itemname',
                ],
                [
                    'mji.reference' => $reference,
                    'mji.status'    => 0
                ],
                'array',
                '',
                ['mji.id' => 'DESC']
            );
        }

        // Build HTML for PDF
        $data = [
            'job'      => $job,
            'items'    => $items,
        ];

        $html = $this->load->view('jm/printjob', $data, true);

        require_once APPPATH . '../vendor/autoload.php';

        $mpdf = new \Mpdf\Mpdf([
            'margin_top'    => 10,
            'margin_bottom' => 10,
            'margin_left'   => 10,
            'margin_right'  => 10,
        ]);

        $mpdf->SetTitle('Job # ' . $job['job_number']);
        $mpdf->WriteHTML($html);

        // 'D' = force download | 'I' = inline in browser
        $mpdf->Output('job_' . $job['job_number'] . '.pdf', 'I');
        exit;
    }
    public function deletejob()
    {
        $id = $this->input->post('id');

        if (empty($id)) {
            echo json_encode([
                'status'  => false,
                'message' => 'Job ID is required'
            ]);
            exit;
        }

        $data = [
            'status' => 1, // soft delete
        ];

        $updated = $this->Jm_model->update_record(
            'tbl_maintenance_job',
            $data,
            ['id' => $id]
        );

        if ($updated) {
            echo json_encode([
                'status'  => true,
                'message' => 'Job deleted successfully'
            ]);
        } else {
            echo json_encode([
                'status'  => false,
                'message' => 'Unable to delete Job'
            ]);
        }
        exit;
    }
    public function converttoinvoice()
    {
        $this->load->model('Jm_model');

        $job_id = (int)$this->input->post('job_id');

        if (!$job_id) {
            echo json_encode(['status' => 'error', 'message' => 'Invalid job ID']);
            return;
        }

        // 1. Fetch main job only (no item join)
        $job = $this->Jm_model->getJoinedDataPagination(
            'tbl_maintenance_job mj',
            [
                'tbl_profile c' => 'c.id = mj.customer',
            ],
            'mj.*, c.name AS client_name',
            ['mj.status' => 0, 'mj.id' => $job_id],
            'array'
        );

        if (!$job) {
            echo json_encode(['status' => 'error', 'message' => 'Job not found']);
            return;
        }

        // 2. Fetch job items SEPARATELY
        $job_items = $this->Jm_model->getJoinedDataPagination(
            'tbl_maintenance_job_items ji',
            [
                'tbl_items i' => 'i.id = ji.item_id',
            ],
            'ji.*',
            ['ji.reference' => $job[0]['reference'], 'ji.status' => 0],
            'array'
        );

        if (!$job_items) {
            echo json_encode(['status' => 'error', 'message' => 'No items found for this job']);
            return;
        }
        $log_data = [
            'status'     => 0,
        ];

        $log_id = $this->Jm_model->insert_to_tb('tbl_logs', $log_data);


        if (!$log_id) {
            redirect('jm/listjob', $rdata, $sdata, $ndata);
            return;
        }
        // 5. Insert each item into tbl_invoice_items
        foreach ($job_items as $item) {
            $itemData = [
                'item_name'   => $item['item_name'],
                'reference'   => $log_id,
                'item_id'     => $item['item_id'],
                'price'       => $item['price'],
                'quantity'    => $item['quantity'],
                'unit_id'     => $item['unit_id'],
                'disc_perc'   => $item['disc_perc'],
                'disc_amt'    => $item['disc_amt'],
                'taxable'     => $item['taxable'],
                'vat_perc'    => $item['vat_perc'],
                'vat_amt'     => $item['vat_amt'],
                'total_price' => $item['total_price'],
                'description' => $item['description'],
                'remark'      => $item['remark'],
                'nf1'         => 0,
                'status'      => 2,
            ];
            $this->Jm_model->insert_to_tb('tbl_invoice_items', $itemData);
        }

        $this->Jm_model->update_record(
            'tbl_maintenance_job',
            [
                'job_status' => 10, // Mark approval status as "Quotation Given"
            ],
            ['id'     => $job_id]
        );

        echo json_encode([
            'status'       => 'success',
            'message'      => 'Invoice created successfully',
            'redirect_url' => base_url('home/newsale?mj=' . $job_id . '&ref=' . $log_id)
        ]);
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

date_default_timezone_set('Asia/Riyadh');
class DeliveryNote extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
        $this->load->library('session');
        $this->load->helper('captcha');
        $this->load->library('excel');
        $this->load->model('Default_model');
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
    public function view_function($pageName, $data = '', $sdata = '', $ndata = '')
    {
        $sdata = array();
        $sdata['bcdp'] = 2;
        $ndata = array();
        $this->load->view('task_templates/header', $sdata);
        $this->load->view('task_templates/sidebar', $ndata);
        $this->load->view($pageName, $data);
        $this->load->view('task_templates/footer', $data);
        $this->load->view('template/script', $data);
        $this->load->view('template/last', $data);
    }
    public function createdriver()
    {
        $rdata = array();
        $sdata = array();
        $ndata = array();
        $rdata['pagetitle'] = 'Create driver';
        $this->view_function1('drivermngmnt/create_driver', $rdata, $sdata, $ndata);
    }
    public function savedriver()
    {
        $rdata = array();
        $sdata = array();
        $ndata = array();
        $rdata['pagetitle'] = 'Create driver';
        $profile_id = $this->session->userdata('profile_id');

        $data = [
            'name'       => $this->input->post('driver_name'),
            'status'     => 0,
            'added_by'   => !empty($profile_id) ? $profile_id : 1,
            'ip_address' => $this->input->ip_address(),
            'date_time'  => date('Y-m-d H:i:s'),
        ];

        $id = $this->Default_model->insert_to_tb('tbl_delivery_person', $data);

        if ($id) {
            // Set success flashdata for the toast
            $this->session->set_flashdata('success', 'New driver created successfully ✔');
            redirect('deliverynote/listdrivers');
        } else {
            // Set error flashdata for the toast
            $this->session->set_flashdata('error', 'Failed to create driver. Please try again ❌');
            redirect('deliverynote/createdriver');
        }
    }
    public function listdrivers()
    {
        $rdata = [];
        $sdata = [];
        $ndata = [];

        $rdata['pagetitle'] = 'List Drivers';

        // Pagination settings
        $perPage = 10;
        $start   = $this->input->get('per_page') ? (int)$this->input->get('per_page') : 0;

        // Get total rows count
        $totalRows = $this->Default_model->getJoinedDataPagination(
            'tbl_delivery_person',
            [],
            'id',
            ['status' => 0],
            'array'
        );
        $totalRows = count($totalRows);
        $columns = [
            'id',
            'name',
        ];
        $rdata['drivers'] = $this->Default_model->getJoinedDataPagination(
            'tbl_delivery_person',
            [],
            $columns,
            ['status' => 0],
            '',
            '',
            ['id' => 'DESC'],
            $perPage,
            $start
        );

        // Pass pagination variables to view
        $rdata['start']       = $start;
        $rdata['perPage']     = $perPage;
        $rdata['totalRows']   = $totalRows;
        $rdata['totalPages'] = ceil($totalRows / $perPage);
        $rdata['suffix']      = ''; // you can append filters later

        $this->view_function1('drivermngmnt/listdrivers', $rdata, $sdata, $ndata);
    }
    public function editdriver()
    {
        $rdata = [];
        $sdata = [];
        $ndata = [];

        $rdata['pagetitle'] = 'Edit Driver';
        $id = $this->input->get('id');

        if (empty($id)) {
            // show_error('Invalid request. ID is missing.', 400);
            $this->session->set_flashdata('error', 'Invalid request.');
            redirect('deliverynote/listdrivers');
            return;
        }
        $driver = $this->Default_model->get_specific_columns(
            'tbl_delivery_person',
            'id, name',
            ['status' => 0, 'id' => $id],
        );
        $rdata = [
            'driver' => $driver[0],
        ];
        $this->view_function1('drivermngmnt/editdriver', $rdata, $sdata, $ndata);
    }
    public function updatedriver()
    {
        $rdata = array();
        $sdata = array();
        $ndata = array();
        $rdata['pagetitle'] = 'Update driver';

        $id = $this->input->post('driver_id');
        $data = [
            'name' => $this->input->post('driver_name'),
        ];

        $updated = $this->Default_model->update_record('tbl_delivery_person', $data, ['id' => $id]);

        if ($updated) {
            $this->session->set_flashdata('success', 'Driver updated successfully ✔');
            redirect('deliverynote/listdrivers');
        } else {
            $this->session->set_flashdata('error', 'No changes made or update failed ❌');
            // Redirect back to edit page with the ID
            redirect('deliverynote/editdriver?id=' . $id);
        }
    }
    public function deletedriver()
    {
        $id = $this->input->post('id');

        if (empty($id)) {
            echo json_encode([
                'status'  => false,
                'message' => 'Driver ID is required'
            ]);
            exit;
        }

        $data = [
            'status' => 1, // soft delete
        ];

        $updated = $this->Default_model->update_record(
            'tbl_delivery_person',
            $data,
            ['id' => $id]
        );

        if ($updated) {
            echo json_encode([
                'status'  => true,
                'message' => 'Driver deleted successfully'
            ]);
        } else {
            echo json_encode([
                'status'  => false,
                'message' => 'Unable to delete driver'
            ]);
        }
        exit;
    }
    public function dvrdnreport()
    {
        $rdata = [];
        $sdata = [];
        $ndata = [];

        $rdata['pagetitle'] = 'View Driver';
        try {

            // Get filter inputs
            $from_date = $this->input->get('from_date');
            $to_date   = $this->input->get('to_date');
            $driver_id = $this->input->get('driver_id');

            if (empty($driver_id)) {
                $driver_id = 'all';
            }
            $perPage = 100;
            $start   = $this->input->get('per_page') ? (int)$this->input->get('per_page') : 0;

            // Get total rows count
            $totalRows = $this->Default_model->getJoinedDataPagination(
                'tbl_delivery_person',
                [],
                'id',
                ['status' => 0],
                'array'
            );
            $totalRows = count($totalRows);
            // Get all active drivers
            $columns = ['id', 'name'];
            $drivers = $this->Default_model->get_specific_columns('tbl_delivery_person', $columns, ['status' => 0]);

            // Build JOIN
            $join = [
                'tbl_deliverynote dn' => 'dn.delivery_personid = dp.id AND dn.status = 0'
            ];

            // Build SELECT columns with aggregation
            $columns = [
                'dp.id as driver_id',
                'dp.name as driver_name',
                'COALESCE(SUM(CASE WHEN dn.delivery_status = 0 THEN 1 ELSE 0 END), 0) as draft',
                'COALESCE(SUM(CASE WHEN dn.delivery_status = 1 THEN 1 ELSE 0 END), 0) as approved',
                'COALESCE(SUM(CASE WHEN dn.delivery_status = 2 THEN 1 ELSE 0 END), 0) as dispatched',
                'COALESCE(SUM(CASE WHEN dn.delivery_status = 3 THEN 1 ELSE 0 END), 0) as partially_delivered',
                'COALESCE(SUM(CASE WHEN dn.delivery_status = 4 THEN 1 ELSE 0 END), 0) as delivered',
                'COALESCE(SUM(CASE WHEN dn.delivery_status = 5 THEN 1 ELSE 0 END), 0) as returned',
                'COALESCE(SUM(CASE WHEN dn.delivery_status = 6 THEN 1 ELSE 0 END), 0) as cancelled',
                'COALESCE(SUM(CASE WHEN dn.delivery_status = 7 THEN 1 ELSE 0 END), 0) as closed',
                'COUNT(dn.id) as total'
            ];

            // Build WHERE for driver filter and date range
            $where = ['dp.status' => 0];

            if ($driver_id && $driver_id != 'all') {
                $where['dp.id'] = $driver_id;
            }

            if (!empty($from_date)) {
                $where['dn.inv_date >='] = $from_date . ' 00:00:00';
            }

            if (!empty($to_date)) {
                $where['dn.inv_date <='] = $to_date . ' 23:59:59';
            }

            // GROUP BY driver
            $groupBy = ['dp.id', 'dp.name'];

            // Fetch report
            $report = $this->Default_model->getJoinedDataPagination(
                'tbl_delivery_person dp',
                $join,
                $columns,
                $where,
                'array',
                $groupBy,
                ['dp.name' => 'ASC'],
                $perPage,
                $start
            );
            $rdata['totalPages'] = ceil($totalRows / $perPage);
            $rdata['suffix']      = '';
            $rdata = [
                'start'           => $start,
                'perPage'         => $perPage,
                'totalRows'       => $totalRows,
                'totalPages'      => ceil($totalRows / $perPage),
                'suffix'          => '',
                'drivers'         => $drivers,
                'report'          => $report,
                'selected_driver' => $driver_id,
                'from_date'       => !empty($from_date) ? $from_date : '',
                'to_date'         => !empty($to_date) ? $to_date : ''
            ];

            $this->view_function1('drivermngmnt/driverwise_deliveryreport', $rdata, $sdata, $ndata);
        } catch (Exception $e) {
            $this->view_function1('deliverynote/listdrivers', $rdata, $sdata, $ndata);
        }
    }
    public function dvrdnreportdetails($driver_id = null)
    {
        $rdata = [];
        $sdata = [];
        $ndata = [];

        $rdata['pagetitle'] = 'Driver-wise Delivery Note Details';
        try {
            // Get optional date filters from query string
            $from_date = $this->input->get('from_date');
            $to_date   = $this->input->get('to_date');

            // Use driver_id from URI segment if provided, else fallback to GET
            if (empty($driver_id)) {
                $driver_id = $this->input->get('driver');
            }
            $perPage = 100;
            $start   = $this->input->get('per_page') ? (int)$this->input->get('per_page') : 0;

            // Get total rows count
            $totalRows = $this->Default_model->getJoinedDataPagination(
                'tbl_deliverynote',
                [],
                'id',
                ['status' => 0, 'delivery_personid' => $driver_id],
                'array'
            );
            $totalRows = count($totalRows);
            $join = [
                'tbl_deliverynote dn' => 'dn.delivery_personid = dp.id AND dn.status = 0'
            ];

            $columns = [
                'dn.inv_no',
                'dn.inv_date',
                'dn.delivery_status',
            ];

            $where = [];

            if ($driver_id && $driver_id !== 'all') {
                $where['dp.id'] = $driver_id;
            }

            if (!empty($from_date)) {
                $where['dn.inv_date >='] = $from_date . ' 00:00:00';
            }

            if (!empty($to_date)) {
                $where['dn.inv_date <='] = $to_date . ' 23:59:59';
            }

            $groupBy = [];

            $details = $this->Default_model->getJoinedDataPagination(
                'tbl_delivery_person dp',
                $join,
                $columns,
                $where,
                'array',
                $groupBy,
                ['dp.name' => 'ASC'],
                $perPage,
                $start
            );

            $rdata = [
                'start'           => $start,
                'perPage'         => $perPage,
                'totalRows'       => $totalRows,
                'totalPages'      => ceil($totalRows / $perPage),
                'suffix'          => '',
                'details'   => $details,
                'from_date' => $from_date,
                'to_date'   => $to_date,
                'driver_id' => $driver_id,
                'pagetitle' => $rdata['pagetitle'],
            ];

            $this->view_function1('drivermngmnt/viewdriver', $rdata, $sdata, $ndata);
        } catch (Exception $e) {
            return redirect('deliverynote/listdrivers');
        }
    }



    // same as driverwisednreportdetails
    // public function viewdriver()
    // {
    //     $rdata = [];
    //     $sdata = [];
    //     $ndata = [];

    //     $rdata['pagetitle'] = 'Driverwise Delivery Note Report';
    //     $from_date = $this->input->get('from_date');
    //     $to_date   = $this->input->get('to_date');

    //     // Use driver_id from URI segment if provided, else fallback to GET
    //     if (empty($driver_id)) {
    //         $driver_id = $this->input->get('driver_id') ?? 'all';
    //     }
    //     $perPage = 100;
    //     $start   = $this->input->get('per_page') ? (int)$this->input->get('per_page') : 0;

    //     // Get total rows count
    //     $totalRows = $this->Default_model->getJoinedDataPagination(
    //         'tbl_deliverynote',
    //         [],
    //         'id',
    //         ['status' => 0, 'delivery_personid' => $driver_id],
    //         'array'
    //     );
    //     $totalRows = count($totalRows);
    //     $join = [
    //         'tbl_deliverynote dn' => 'dn.delivery_personid = dp.id AND dn.status = 0'
    //     ];

    //     $columns = [
    //         'dn.inv_no',
    //         'dn.inv_date',
    //         'dn.delivery_status',
    //     ];

    //     $where = [];

    //     if (!empty($driver_id)) {
    //         $where['dp.id'] = $driver_id;
    //     }

    //     if (!empty($from_date)) {
    //         $where['dn.inv_date >='] = $from_date . ' 00:00:00';
    //     }

    //     if (!empty($to_date)) {
    //         $where['dn.inv_date <='] = $to_date . ' 23:59:59';
    //     }

    //     $groupBy = [];

    //     $details = $this->Default_model->getJoinedDataPagination(
    //         'tbl_delivery_person dp',
    //         $join,
    //         $columns,
    //         $where,
    //         'array',
    //         $groupBy,
    //         ['dp.name' => 'ASC'],
    //         $perPage,
    //         $start
    //     );

    //     $rdata = [
    //         'start'           => $start,
    //         'perPage'         => $perPage,
    //         'totalRows'       => $totalRows,
    //         'totalPages'      => ceil($totalRows / $perPage),
    //         'suffix'          => '',
    //         'details'   => $details,
    //         'from_date' => $from_date,
    //         'to_date'   => $to_date,
    //         'driver_id' => $driver_id,
    //     ];

    //     // Load view
    //     $this->view_function1('drivermngmnt/viewdriver', $rdata, $sdata, $ndata);
    // }
}

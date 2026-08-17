<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\IOFactory;

class porders extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Approval_model');
        $this->load->helper(array('form', 'url'));
        $this->load->model('Default_model');
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
public function purchase_order()
{
    /*
    |--------------------------------------------------------------------------
    | Page Data
    |--------------------------------------------------------------------------
    */

    $sdata['purchase_order_window'] = 'active bg-gradient-';
    $sdata['index'] = '';

    $ndata['bn1']   = $this->lang->line('dashboard');
    $ndata['bn3']   = 'Purchase Order';
    $ndata['title'] = 'Purchase Order';

    $rdata['pagetitle'] = 'Purchase Order';


    /*
    |--------------------------------------------------------------------------
    | Search / Date Filter
    |--------------------------------------------------------------------------
    */

    $search    = $this->input->get('search');
    $from_date = $this->input->get('from_date');
    $to_date   = $this->input->get('to_date');


    /*
    |--------------------------------------------------------------------------
    | Purchase Order + Approval Data
    |--------------------------------------------------------------------------
    */

    $approvalData = $this->Approval_model->getJoinedDataPagination(
        'tbl_document_approval da',

        [
            // Purchase Order
            'tbl_porder po' =>
                'po.id = da.doc_id',

            // Employee who transferred approval
            'tbl_employee e' =>
                'e.id = da.transfer_from',

            // Designation
            'tbl_designation d' =>
                'd.id = e.designation'
        ],

        '
            po.id,
            po.reference,
            po.project_id,
            po.currency,
            po.ccrate,
            po.delivery_date,
            po.inv_no,
            po.inv_date,
            po.due_date,
            po.profile_id,
            po.employee_id,
            po.name,
            po.total,
            po.discount,
            po.vat,
            po.grand_total,
            po.paid,
            po.payment_status,
            po.branch_id,
            po.status,

            da.id AS approval_id,
            da.doc_id,
            da.type,
            da.transfer_from,
            da.transfer_to,
            da.approval_status,
            da.remark,
            da.transfer_from_datetime,
            da.transfer_to_datetime,
            da.action_datetime,

            e.name AS employee_name,

            d.name AS designation_name
        ',

        [
            // Purchase Order = type 0
            'da.type' => 0
        ],

        'array',

        '',

        [
            'da.id' => 'DESC'
        ]
    );


    /*
    |--------------------------------------------------------------------------
    | Latest Approval For Each Purchase Order
    |--------------------------------------------------------------------------
    */

    $latestApprovals = [];

    if (!empty($approvalData)) {

        foreach ($approvalData as $row) {

            $doc_id = (int)$row['doc_id'];

            if (!isset($latestApprovals[$doc_id])) {

                $latestApprovals[$doc_id] = $row;
            }
        }
    }


    /*
    |--------------------------------------------------------------------------
    | Purchase Orders
    |--------------------------------------------------------------------------
    */

    $orders = array_values($latestApprovals);


    /*
    |--------------------------------------------------------------------------
    | If Purchase Order Has No Approval Record
    |--------------------------------------------------------------------------
    | Still show the Purchase Order in the list.
    |--------------------------------------------------------------------------
    */

    $this->db->select('
        po.id,
        po.reference,
        po.project_id,
        po.currency,
        po.ccrate,
        po.delivery_date,
        po.inv_no,
        po.inv_date,
        po.due_date,
        po.profile_id,
        po.employee_id,
        po.name,
        po.total,
        po.discount,
        po.vat,
        po.grand_total,
        po.paid,
        po.payment_status,
        po.branch_id,
        po.status
    ');

    $this->db->from('tbl_porder po');


    /*
    |--------------------------------------------------------------------------
    | Search
    |--------------------------------------------------------------------------
    */

    if (!empty($search)) {

        $this->db->group_start();

        $this->db->like('po.reference', $search);
        $this->db->or_like('po.inv_no', $search);
        $this->db->or_like('po.name', $search);

        $this->db->group_end();
    }


    /*
    |--------------------------------------------------------------------------
    | From Date
    |--------------------------------------------------------------------------
    */

    if (!empty($from_date)) {

        $this->db->where(
            'po.inv_date >=',
            $from_date
        );
    }


    /*
    |--------------------------------------------------------------------------
    | To Date
    |--------------------------------------------------------------------------
    */

    if (!empty($to_date)) {

        $this->db->where(
            'po.inv_date <=',
            $to_date
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Latest Purchase Order First
    |--------------------------------------------------------------------------
    */

    $this->db->order_by(
        'po.id',
        'DESC'
    );


    $poQuery = $this->db->get();

    $purchaseOrders = $poQuery->result_array();


    /*
    |--------------------------------------------------------------------------
    | Merge Approval Data Into Purchase Order Data
    |--------------------------------------------------------------------------
    */

    $finalOrders = [];

    foreach ($purchaseOrders as $po) {

        $doc_id = (int)$po['id'];

        /*
        | Default approval values
        */

        $po['approval_id'] = 0;
        $po['doc_id'] = $doc_id;
        $po['type'] = 0;

        $po['transfer_from'] = 0;
        $po['transfer_to'] = 0;

        $po['approval_status'] = 0;

        $po['remark'] = '';

        $po['transfer_from_datetime'] = null;
        $po['transfer_to_datetime'] = null;
        $po['action_datetime'] = null;

        $po['employee_name'] = '';
        $po['designation_name'] = '';


        /*
        | If approval exists, replace defaults
        */

        if (isset($latestApprovals[$doc_id])) {

            $approval = $latestApprovals[$doc_id];

            $po['approval_id'] =
                (int)$approval['approval_id'];

            $po['doc_id'] =
                (int)$approval['doc_id'];

            $po['type'] =
                (int)$approval['type'];

            $po['transfer_from'] =
                (int)$approval['transfer_from'];

            $po['transfer_to'] =
                (int)$approval['transfer_to'];

            $po['approval_status'] =
                (int)$approval['approval_status'];

            $po['remark'] =
                $approval['remark'] ?? '';

            $po['transfer_from_datetime'] =
                $approval['transfer_from_datetime'];

            $po['transfer_to_datetime'] =
                $approval['transfer_to_datetime'];

            $po['action_datetime'] =
                $approval['action_datetime'];

            $po['employee_name'] =
                $approval['employee_name'] ?? '';

            $po['designation_name'] =
                $approval['designation_name'] ?? '';
        }


        $finalOrders[] = $po;
    }

    $rdata['designation'] = $this->Approval_model->get_specific_columns(
    'tbl_designation',
    ['id', 'name'],
    [
        'status' => 0
    ]
);

    /*
    |--------------------------------------------------------------------------
    | Send Data To View
    |--------------------------------------------------------------------------
    */

    $rdata['orders'] = $finalOrders;

    $rdata['search']    = $search;
    $rdata['from_date'] = $from_date;
    $rdata['to_date']   = $to_date;


    /*
    |--------------------------------------------------------------------------
    | Debug
    |--------------------------------------------------------------------------
    */

    // echo '<pre>';
    // print_r($rdata['orders']);
    // exit;


    /*
    |--------------------------------------------------------------------------
    | Load Purchase Order View
    |--------------------------------------------------------------------------
    */

    $this->view_function1(
        'purchase/purchase_order',
        $rdata,
        $sdata,
        $ndata
    );
}


    /*
    |--------------------------------------------------------------------------
    | View Purchase Order
    |--------------------------------------------------------------------------
    */


    /*
    |--------------------------------------------------------------------------
    | Create Purchase Order Page
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        $data = array();

        $this->load->view('purchaseorder/create', $data);
    }


    /*
    |--------------------------------------------------------------------------
    | Save Purchase Order
    |--------------------------------------------------------------------------
    */
    public function save()
    {
        $data = array(

            'reference'       => $this->input->post('reference'),
            'project_id'     => $this->input->post('project_id') ?: 0,
            'currency'       => $this->input->post('currency') ?: 0,
            'ccrate'         => $this->input->post('ccrate') ?: 0,

            'logistics_job_id' => $this->input->post('logistics_job_id') ?: 0,
            'shipping_mode'   => $this->input->post('shipping_mode') ?: 0,

            'delivery_time'  => $this->input->post('delivery_time'),
            'payment_terms'  => $this->input->post('payment_terms'),
            'po_type'        => $this->input->post('po_type'),

            'order_id'       => $this->input->post('order_id') ?: 0,
            'rfq_id'         => $this->input->post('rfq_id') ?: 0,
            'rfq_status'     => $this->input->post('rfq_status') ?: 0,

            'reference_no'   => $this->input->post('reference_no'),
            'enq_reference'  => $this->input->post('enq_reference'),

            'inv_no'         => $this->input->post('inv_no'),
            'inv_date'       => $this->input->post('inv_date'),
            'delivery_date' => $this->input->post('delivery_date'),
            'sup_date'      => $this->input->post('sup_date'),
            'due_date'      => $this->input->post('due_date'),

            'profile_id'     => $this->input->post('profile_id') ?: 0,
            'employee_id'    => $this->input->post('employee_id') ?: 0,
            'name'           => $this->input->post('name'),

            'statecode'      => $this->input->post('statecode'),

            'total'          => $this->input->post('total') ?: 0,
            'discount'       => $this->input->post('discount') ?: 0,
            'vat'            => $this->input->post('vat') ?: 0,
            'igst'           => $this->input->post('igst') ?: 0,
            'sgst'           => $this->input->post('sgst') ?: 0,
            'cgst'           => $this->input->post('cgst') ?: 0,
            'cess'           => $this->input->post('cess') ?: 0,
            'othervalue'     => $this->input->post('othervalue') ?: 0,

            'grand_total'    => $this->input->post('grand_total') ?: 0,
            'round_off'      => $this->input->post('round_off') ?: 0,

            'payment_status' => $this->input->post('payment_status') ?: 0,

            'st_date'        => $this->input->post('st_date'),
            'st_remark'      => $this->input->post('st_remark'),
            'st_number'      => $this->input->post('st_number'),

            'paid'           => $this->input->post('paid') ?: 0,
            'in_count'       => $this->input->post('in_count') ?: 0,

            'itemdesc'       => $this->input->post('itemdesc') ?: 0,

            'branch_id'      => $this->input->post('branch_id') ?: 0,

            'billing'        => $this->input->post('billing') ?: 0,
            'shipping'       => $this->input->post('shipping') ?: 0,
            'terms'          => $this->input->post('terms') ?: 0,

            'attention'      => $this->input->post('attention'),

            // New PO = Pending
            'status'         => 0
        );

        $this->db->insert('tbl_porder', $data);

        $insert_id = $this->db->insert_id();

        if ($insert_id) {

            echo json_encode(array(
                'status'  => true,
                'message' => 'Purchase Order created successfully',
                'id'      => $insert_id
            ));

        } else {

            echo json_encode(array(
                'status'  => false,
                'message' => 'Failed to create Purchase Order'
            ));
        }
    }


    /*
    |--------------------------------------------------------------------------
    | View Purchase Order
    |--------------------------------------------------------------------------
    */
    public function view($id)
    {
        $this->db->where('id', $id);

        $query = $this->db->get('tbl_porder');

        if ($query->num_rows() == 0) {

            show_404();
            return;
        }

        $data['purchase_order'] = $query->row();

        $this->load->view(
            'purchaseorder/view',
            $data
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Edit Purchase Order
    |--------------------------------------------------------------------------
    */
    public function edit($id)
    {
        $this->db->where('id', $id);

        $query = $this->db->get('tbl_porder');

        if ($query->num_rows() == 0) {

            show_404();
            return;
        }

        $data['purchase_order'] = $query->row();

        $this->load->view(
            'purchaseorder/edit',
            $data
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Update Purchase Order
    |--------------------------------------------------------------------------
    */
    public function update($id)
    {
        $data = array(

            'reference'      => $this->input->post('reference'),
            'project_id'     => $this->input->post('project_id') ?: 0,
            'currency'       => $this->input->post('currency') ?: 0,
            'ccrate'         => $this->input->post('ccrate') ?: 0,

            'logistics_job_id' => $this->input->post('logistics_job_id') ?: 0,
            'shipping_mode'   => $this->input->post('shipping_mode') ?: 0,

            'delivery_time'  => $this->input->post('delivery_time'),
            'payment_terms'  => $this->input->post('payment_terms'),
            'po_type'        => $this->input->post('po_type'),

            'order_id'       => $this->input->post('order_id') ?: 0,
            'rfq_id'         => $this->input->post('rfq_id') ?: 0,
            'rfq_status'     => $this->input->post('rfq_status') ?: 0,

            'reference_no'   => $this->input->post('reference_no'),
            'enq_reference'  => $this->input->post('enq_reference'),

            'inv_no'         => $this->input->post('inv_no'),
            'inv_date'       => $this->input->post('inv_date'),
            'delivery_date' => $this->input->post('delivery_date'),
            'sup_date'      => $this->input->post('sup_date'),
            'due_date'      => $this->input->post('due_date'),

            'profile_id'     => $this->input->post('profile_id') ?: 0,
            'employee_id'    => $this->input->post('employee_id') ?: 0,
            'name'           => $this->input->post('name'),

            'statecode'      => $this->input->post('statecode'),

            'total'          => $this->input->post('total') ?: 0,
            'discount'       => $this->input->post('discount') ?: 0,
            'vat'            => $this->input->post('vat') ?: 0,
            'igst'           => $this->input->post('igst') ?: 0,
            'sgst'           => $this->input->post('sgst') ?: 0,
            'cgst'           => $this->input->post('cgst') ?: 0,
            'cess'           => $this->input->post('cess') ?: 0,
            'othervalue'     => $this->input->post('othervalue') ?: 0,

            'grand_total'    => $this->input->post('grand_total') ?: 0,
            'round_off'      => $this->input->post('round_off') ?: 0,

            'payment_status' => $this->input->post('payment_status') ?: 0,

            'st_date'        => $this->input->post('st_date'),
            'st_remark'      => $this->input->post('st_remark'),
            'st_number'      => $this->input->post('st_number'),

            'paid'           => $this->input->post('paid') ?: 0,
            'in_count'       => $this->input->post('in_count') ?: 0,

            'itemdesc'       => $this->input->post('itemdesc') ?: 0,

            'branch_id'      => $this->input->post('branch_id') ?: 0,

            'billing'        => $this->input->post('billing') ?: 0,
            'shipping'       => $this->input->post('shipping') ?: 0,
            'terms'          => $this->input->post('terms') ?: 0,

            'attention'      => $this->input->post('attention')
        );

        $this->db->where('id', $id);
        $updated = $this->db->update('tbl_porder', $data);

        echo json_encode(array(
            'status'  => $updated,
            'message' => $updated
                ? 'Purchase Order updated successfully'
                : 'Failed to update Purchase Order'
        ));
    }


    /*
    |--------------------------------------------------------------------------
    | Delete Purchase Order
    |--------------------------------------------------------------------------
    */
    public function delete($id)
    {
        // Soft delete
        $this->db->where('id', $id);
        $updated = $this->db->update(
            'tbl_porder',
            array('status' => 3)
        );

        echo json_encode(array(
            'status'  => $updated,
            'message' => $updated
                ? 'Purchase Order deleted successfully'
                : 'Failed to delete Purchase Order'
        ));
    }


    /*
    |--------------------------------------------------------------------------
    | Change Purchase Order Status
    |--------------------------------------------------------------------------
    | 0 = Pending
    | 1 = Approved
    | 2 = Rejected
    | 3 = Deleted
    |--------------------------------------------------------------------------
    */
    public function change_status()
    {
        $id     = $this->input->post('id');
        $status = $this->input->post('status');

        if (empty($id)) {

            echo json_encode(array(
                'status'  => false,
                'message' => 'Purchase Order ID is required'
            ));

            return;
        }

        $this->db->where('id', $id);

        $updated = $this->db->update(
            'tbl_porder',
            array(
                'status' => $status
            )
        );

        echo json_encode(array(
            'status'  => $updated,
            'message' => $updated
                ? 'Status updated successfully'
                : 'Failed to update status'
        ));
    }


    /*
    |--------------------------------------------------------------------------
    | Get Single Purchase Order JSON
    |--------------------------------------------------------------------------
    */
    public function get($id)
    {
        $this->db->where('id', $id);

        $query = $this->db->get('tbl_porder');

        if ($query->num_rows() == 0) {

            echo json_encode(array(
                'status'  => false,
                'message' => 'Purchase Order not found',
                'data'    => array()
            ));

            return;
        }

        echo json_encode(array(
            'status' => true,
            'data'   => $query->row()
        ));
    }
}
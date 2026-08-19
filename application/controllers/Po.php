<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\IOFactory;

class Po extends CI_Controller
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

     $start_date = $this->input->get('start_date', true);
    $end_date   = $this->input->get('end_date', true);
    $search     = trim($this->input->get('search', true));
    $filter_status = $this->input->get('status', true);


    if (empty($start_date)) {

        $start_date = date('Y-m-01');
    }

    if (empty($end_date)) {

        $end_date = date('Y-m-d');
    }
    /*
    |--------------------------------------------------------------------------
    | Purchase Order List
    |--------------------------------------------------------------------------
    |
    | Only Purchase Orders where status = 0
    |
    */

    $purchaseOrders = $this->Approval_model->getJoinedDataPagination(

        'tbl_porder po',

      

        [
            'tbl_branch_profile bp' =>
                'bp.id = po.branch_id'
        ],

        
        '
            po.id,
            po.reference,
            po.inv_no,
            po.inv_date,
            po.due_date,
            po.profile_id,

            bp.name AS branch_name,

            po.name,
            po.name AS vendor_name,

            po.total,
            po.discount,
            po.vat,
            po.grand_total,
            po.paid,
            po.payment_status,
            po.branch_id,
            po.status
        ',

        /*
        | ONLY status = 0
        */

        [
            'po.status' => 0
        ],

        'array',

        '',

        [
            'po.id' => 'DESC'
        ]
    );

     $filteredOrders = [];


    foreach ($purchaseOrders as $po) {

        /*
        | Date
        */

        if (!empty($po['inv_date'])) {

            $invDate =
                date(
                    'Y-m-d',
                    strtotime($po['inv_date'])
                );

            if (
                $invDate < $start_date ||
                $invDate > $end_date
            ) {
                continue;
            }

        } else {

            continue;
        }


        /*
        |--------------------------------------------------------------------------
        | SEARCH
        |--------------------------------------------------------------------------
        |
        | Search Invoice Number or Vendor Name
        |
        */

        if (!empty($search)) {

            $invoiceNo =
                strtolower(
                    $po['inv_no'] ?? ''
                );

            $vendorName =
                strtolower(
                    $po['name'] ?? ''
                );

            $searchValue =
                strtolower($search);


            if (
                strpos(
                    $invoiceNo,
                    $searchValue
                ) === false
                &&
                strpos(
                    $vendorName,
                    $searchValue
                ) === false
            ) {

                continue;
            }
        }
        $filteredOrders[] = $po;
    }

  $purchaseOrders = $filteredOrders;

    /*
    |--------------------------------------------------------------------------
    | Approval Data
    |--------------------------------------------------------------------------
    |
    | This is only for the approval modal.
    | It does NOT decide which Purchase Orders are displayed.
    |
    */

    $approvalData = $this->Approval_model->getJoinedDataPagination(

        'tbl_document_approval da',

        [
            'tbl_employee e' =>
                'e.profile_id = da.transfer_from',

            'tbl_designation d' =>
                'd.id = e.designation'
        ],

        '
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
            'da.type' => 1
        ],

        'array',

        '',

        [
            'da.id' => 'DESC'
        ]
    );


    /*
    |--------------------------------------------------------------------------
    | Latest Approval Per Purchase Order
    |--------------------------------------------------------------------------
    */

    $latestApprovals = [];

    foreach ($approvalData as $approval) {

        $docId = (int)$approval['doc_id'];

        if (!isset($latestApprovals[$docId])) {

            $latestApprovals[$docId] = $approval;
        }
    }


    /*
    |--------------------------------------------------------------------------
    | Add Approval Data To Purchase Orders
    |--------------------------------------------------------------------------
    */

    foreach ($purchaseOrders as &$po) {

        $docId = (int)$po['id'];


        /*
        | Default values
        */

        $po['approval_id'] = 0;
        $po['doc_id'] = $docId;
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
        | Existing approval
        */

        if (isset($latestApprovals[$docId])) {

            $approval = $latestApprovals[$docId];

            $po['approval_id'] =
                (int)($approval['approval_id'] ?? 0);

            $po['doc_id'] =
                (int)($approval['doc_id'] ?? $docId);

            $po['type'] =
                (int)($approval['type'] ?? 0);

            $po['transfer_from'] =
                (int)($approval['transfer_from'] ?? 0);

            $po['transfer_to'] =
                (int)($approval['transfer_to'] ?? 0);

            $po['approval_status'] =
                (int)($approval['approval_status'] ?? 0);

            $po['remark'] =
                $approval['remark'] ?? '';

            $po['transfer_from_datetime'] =
                $approval['transfer_from_datetime'] ?? null;

            $po['transfer_to_datetime'] =
                $approval['transfer_to_datetime'] ?? null;

            $po['action_datetime'] =
                $approval['action_datetime'] ?? null;

            $po['employee_name'] =
                $approval['employee_name'] ?? '';

            $po['designation_name'] =
                $approval['designation_name'] ?? '';
        }
    }

    unset($po);


    /*
    |--------------------------------------------------------------------------
    | Designations
    |--------------------------------------------------------------------------
    */

    $rdata['designation'] =
        $this->Approval_model->get_specific_columns(
            'tbl_designation',
            [
                'id',
                'name'
            ],
            [
                'status' => 0
            ]
        );


    /*
    |--------------------------------------------------------------------------
    | Send To View
    |--------------------------------------------------------------------------
    */

    $rdata['orders'] = $purchaseOrders;
    $rdata['start_date'] =
        $start_date;

    $rdata['end_date'] =
        $end_date;

    $rdata['search'] =
        $search;

    $rdata['filter_status'] =
        $filter_status;


    /*
    |--------------------------------------------------------------------------
    | Load View
    |--------------------------------------------------------------------------
    */

    $this->view_function1(
        'po/purchase_order',
        $rdata,
        $sdata,
        $ndata
    );
}
public function savePurchaseOrderApproval()
{
    $this->output->set_content_type('application/json');

    /*
    |--------------------------------------------------------------------------
    | POST DATA
    |--------------------------------------------------------------------------
    */

    $doc_id        = (int)$this->input->post('doc_id');
    $status        = $this->input->post('status');
    $remarks       = trim($this->input->post('remarks'));
    $approval_date = $this->input->post('approval_date');
    $employee_id   = (int)$this->input->post('employee_id');
    $reference   = (int)$this->input->post('reference');

    /*
    | Purchase Order ALWAYS type = 0
    */
    $type = 0;

     //$profile_id = $this->session->userdata('profile_id') ?: 1;
   
    $profile_id = 1;


    /*
    |--------------------------------------------------------------------------
    | DEBUG
    |--------------------------------------------------------------------------
    */

    log_message(
        'error',
        '========== PURCHASE ORDER APPROVAL START =========='
    );

    log_message(
        'error',
        'POST DATA: ' . print_r($this->input->post(), true)
    );


    /*
    |--------------------------------------------------------------------------
    | VALIDATION
    |--------------------------------------------------------------------------
    */

    if (empty($doc_id)) {

        echo json_encode([
            'status'  => false,
            'message' => 'Purchase Order ID is missing.'
        ]);

        return;
    }


    if ($status === '' || $status === null) {

        echo json_encode([
            'status'  => false,
            'message' => 'Approval status is missing.'
        ]);

        return;
    }


    /*
    |--------------------------------------------------------------------------
    | CHECK PURCHASE ORDER
    |--------------------------------------------------------------------------
    */

    $purchaseOrder = $this->Approval_model->get_specific_columns(
        'tbl_porder',
        'id, inv_no, status, payment_status',
        [
            'id' => $doc_id
        ]
    );


    log_message(
        'error',
        'PURCHASE ORDER RESULT: ' .
        print_r($purchaseOrder, true)
    );


    if (empty($purchaseOrder)) {

        echo json_encode([
            'status'  => false,
            'message' => 'Purchase Order not found. ID: ' . $doc_id
        ]);

        return;
    }


    /*
    |--------------------------------------------------------------------------
    | CHECK EXISTING ACTIVE APPROVAL
    |--------------------------------------------------------------------------
    */

    $existingApproval = $this->Approval_model->get_specific_columns(
        'tbl_document_approval',
        '
            id,
            doc_id,
            type,
            approval_status,
            transfer_from,
            transfer_to,
            status
        ',
        [
            'doc_id' => $doc_id,
            'type'   => 0,
            'status' => 0
        ]
    );


    log_message(
        'error',
        'EXISTING APPROVAL: ' .
        print_r($existingApproval, true)
    );


    if (!empty($existingApproval)) {

        echo json_encode([
            'status'  => false,
            'message' => 'An approval already exists for this Purchase Order.',
            'data' => [
                'approval_id' =>
                    (int)$existingApproval[0]['id'],

                'doc_id' =>
                    $doc_id
            ]
        ]);

        return;
    }


    /*
    |--------------------------------------------------------------------------
    | DATE
    |--------------------------------------------------------------------------
    */

    $date = !empty($approval_date)
        ? $approval_date
        : date('Y-m-d');


    /*
    |--------------------------------------------------------------------------
    | EMPLOYEE / TRANSFER TO
    |--------------------------------------------------------------------------
    */

    $transfer_to = $employee_id;


    /*
    |--------------------------------------------------------------------------
    | PENDING / FURTHER APPROVAL
    |--------------------------------------------------------------------------
    */

    if (
        (int)$status === 0 ||
        (int)$status === 3
    ) {

        if (empty($transfer_to)) {

            echo json_encode([
                'status'  => false,
                'message' => 'Please select an employee for approval.'
            ]);

            return;
        }
    }


    /*
    |--------------------------------------------------------------------------
    | APPROVAL DATA
    |--------------------------------------------------------------------------
    */

    $approvalData = [

        /*
        | Purchase Order ID
        */
        'doc_id' => $doc_id,
        'reference'=> $reference,

        /*
        | 0 = Purchase Order
        */
        'type' => 0,

        /*
        | Current employee
        */
        'transfer_from' => $profile_id,

        /*
        | Selected employee
        */
        'transfer_to' => $transfer_to,

        /*
        | IMPORTANT:
        | Use selected status.
        |
        | 0 = Pending
        | 1 = Approved
        | 2 = Rejected
        | 3 = Further Approval
        */
        'approval_status' => (int)$status,

        /*
        | Remark
        */
        'remark' => !empty($remarks)
            ? $remarks
            : (
                (int)$status === 1
                    ? 'Approved'
                    : (
                        (int)$status === 2
                            ? 'Rejected'
                            : (
                                (int)$status === 3
                                    ? 'Forwarded for further approval'
                                    : 'Pending'
                            )
                    )
            ),

        /*
        | Dates
        */
        'transfer_from_datetime' => $date,

        'transfer_to_datetime' =>
            ((int)$status === 1)
                ? $date
                : null,

        'action_datetime' =>
            ((int)$status === 1)
                ? $date
                : null,

        /*
        | Active approval row
        */
        'status' => 0,

        /*
        | Audit
        */
        'added_by' => $profile_id,

        'ip_address' =>
            $this->input->ip_address(),

        'created_at' =>
            date('Y-m-d H:i:s')
    ];


    log_message(
        'error',
        'APPROVAL INSERT DATA: ' .
        print_r($approvalData, true)
    );


    /*
    |--------------------------------------------------------------------------
    | INSERT INTO tbl_document_approval
    |--------------------------------------------------------------------------
    */

    $approval_id = $this->Approval_model->insert_to_tb(
        'tbl_document_approval',
        $approvalData
    );


    /*
    |--------------------------------------------------------------------------
    | CHECK INSERT
    |--------------------------------------------------------------------------
    */

    if (!$approval_id) {

        $dbError = $this->db->error();

        log_message(
            'error',
            '========== APPROVAL INSERT FAILED =========='
        );

        log_message(
            'error',
            'DB ERROR: ' .
            print_r($dbError, true)
        );

        log_message(
            'error',
            'LAST QUERY: ' .
            $this->db->last_query()
        );


        echo json_encode([
            'status'  => false,
            'message' => 'Failed to insert Purchase Order approval.',
            'error'   => $dbError,
            'query'   => $this->db->last_query()
        ]);

        return;
    }


    log_message(
        'error',
        'APPROVAL INSERTED. ID = ' . $approval_id
    );


    /*
    |--------------------------------------------------------------------------
    | UPDATE PURCHASE ORDER PAYMENT STATUS
    |--------------------------------------------------------------------------
    |
    | IMPORTANT:
    |
    | DO NOT UPDATE tbl_purchase_order.status
    |
    | status = 0
    |      -> Purchase Order remains in the list
    |
    | payment_status = 3
    |      -> Further Approval
    |
    */

    $updateResult = $this->db
        ->where('id', $doc_id)
        ->update(
            'tbl_porder',
            [
                'payment_status' => (int)$status
            ]
        );


    /*
    |--------------------------------------------------------------------------
    | CHECK PURCHASE ORDER UPDATE
    |--------------------------------------------------------------------------
    */

    if (!$updateResult) {

        $dbError = $this->db->error();

        log_message(
            'error',
            '========== PURCHASE ORDER PAYMENT STATUS UPDATE FAILED =========='
        );

        log_message(
            'error',
            'DB ERROR: ' .
            print_r($dbError, true)
        );

        log_message(
            'error',
            'LAST QUERY: ' .
            $this->db->last_query()
        );


        echo json_encode([
            'status'  => false,
            'message' =>
                'Approval was saved, but Purchase Order payment status could not be updated.',
            'error' => $dbError,
            'query' => $this->db->last_query()
        ]);

        return;
    }


    /*
    |--------------------------------------------------------------------------
    | SUCCESS
    |--------------------------------------------------------------------------
    */

    log_message(
        'error',
        'PURCHASE ORDER APPROVAL SUCCESS'
    );


    echo json_encode([

        'status' => true,

        'message' =>
            ((int)$status === 3)
                ? 'Purchase Order forwarded for further approval.'
                : 'Purchase Order approval saved successfully.',

        'data' => [

            'approval_id' =>
                (int)$approval_id,

            'doc_id' =>
                $doc_id,

            'type' =>
                0,

            'status' =>
                (int)$status
        ]
    ]);

    return;
}
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\IOFactory;

class Approval extends CI_Controller
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

    private function updateDocumentApprovalStatus($type, $doc_id, $approval_status)
    {
        $table = '';

        if ((int)$type === 0) {


            $table = 'tbl_purchase_order';
        } elseif ((int)$type === 1) {


            $table = 'tbl_order';
        } else {

            log_message(
                'error',
                'Invalid document type: ' . $type
            );

            return false;
        }

        $updated = $this->db
            ->where('id', (int)$doc_id)
            ->update(
                $table,
                [
                    'payment_status' => (int)$approval_status
                ]
            );

        if (!$updated) {

            log_message(
                'error',
                'Failed to update approval_status. Table: ' .
                    $table .
                    ', ID: ' .
                    $doc_id .
                    ', Status: ' .
                    $approval_status .
                    ', DB Error: ' .
                    print_r($this->db->error(), true)
            );

            return false;
        }

        return true;
    }
    public function approval_in()
    {
        $sdata['approval_window'] = 'active bg-gradient-';
        $sdata['index'] = '';

        $ndata['bn1']   = $this->lang->line('dashboard');
        $ndata['bn3']   = 'Document Approval';
        $ndata['title'] = 'Document Approval';

        $rdata['pagetitle'] = 'Document Approval';

        // Get type from URL
        // 0 = Purchase
        // 1 = Sales
        $type = $this->input->get('type');

        if ($type === null || $type === '') {
            $type = 0;
        }

        $type = (int)$type;
        /*
    |--------------------------------------------------------------------------
    | PURCHASE / SALES TABLE
    |--------------------------------------------------------------------------
    */

        if ($type === 0) {

            // Purchase Order
            $order_table = 'tbl_purchase_order po';
        } elseif ($type === 1) {

            // Sales Order
            $order_table = 'tbl_order po';
        } else {

            // Only allow type 0 or 1
            $order_table = '';
        }

        // Logged-in user's profile ID
        //$profile_id = $this->session->userdata('profile_id');
        $profile_id = 1;

        $rdata['purchase_orders'] = [];
        $rdata['sales_orders'] = [];

        $rdata['designation'] = $this->Approval_model->get_specific_columns(
            'tbl_designation',
            ['id', 'name'],
            [
                'status' => 0
            ]
        );

        if (!empty($profile_id)) {

            $approvalData = $this->Approval_model->getJoinedDataPagination(
                'tbl_document_approval da',
                [
                    $order_table  => 'po.id = da.doc_id',
                    'tbl_profile p'         => 'p.id = po.profile_id',
                    'tbl_employee e'        => 'e.id = da.transfer_from',
                    'tbl_designation d'     => 'd.id = e.designation'
                ],
                '
                po.id,
                po.reference,
                po.inv_no,
                po.inv_date,
                po.due_date,
                po.profile_id,
                po.grand_total,
                po.payment_status,
                
                po.status,

                p.name AS vendor_name,

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
                    'da.type'   => $type,
                    'po.status' => 0
                ],
                'array',
                '',
                [
                    'da.id' => 'DESC'
                ]
            );

            $latestApprovals = [];

            if (!empty($approvalData)) {

                foreach ($approvalData as $row) {

                    $doc_id = (int)$row['doc_id'];

                    if (!isset($latestApprovals[$doc_id])) {
                        $latestApprovals[$doc_id] = $row;
                    }
                }
            }

            foreach ($latestApprovals as $row) {

                if ((int)$row['transfer_to'] !== (int)$profile_id) {
                    continue;
                }

                if ((int)$row['type'] === 0) {

                    $rdata['purchase_orders'][] = $row;
                } elseif ((int)$row['type'] === 1) {

                    $rdata['sales_orders'][] = $row;
                }
            }
        }

        // Send type to view
        $rdata['type'] = $type;

        $this->view_function1(
            'approval/approval_in',
            $rdata,
            $sdata,
            $ndata
        );
    }

    public function approval_out()
    {
        $sdata['approval_window'] = 'active bg-gradient-';
        $sdata['index'] = '';

        $ndata['bn1']   = $this->lang->line('dashboard');
        $ndata['bn3']   = 'Document Approval Out';
        $ndata['title'] = 'Document Approval Out';

        $rdata['pagetitle'] = 'Document Approval Out';

        // Get type from URL
        // 0 = Purchase
        // 1 = Sales
        $type = (int)$this->input->get('type');

        // Logged-in user's profile ID
        //$profile_id = $this->session->userdata('profile_id');
        $profile_id = 1;

        $rdata['orders'] = [];
        $rdata['type']   = $type;


        /*
    |--------------------------------------------------------------------------
    | PURCHASE / SALES TABLE
    |--------------------------------------------------------------------------
    */

        if ($type === 0) {

            // Purchase Order
            $order_table = 'tbl_purchase_order po';
        } elseif ($type === 1) {

            // Sales Order
            $order_table = 'tbl_order po';
        } else {

            // Only allow type 0 or 1
            $order_table = '';
        }


        /*
    |--------------------------------------------------------------------------
    | GET APPROVAL OUT RECORDS
    |--------------------------------------------------------------------------
    */

        if (!empty($profile_id) && !empty($order_table)) {

            $rdata['orders'] = $this->Approval_model->getJoinedDataPagination(
                'tbl_document_approval da',

                [
                    $order_table        => 'po.id = da.doc_id',
                    'tbl_profile p'     => 'p.id = po.profile_id',
                    'tbl_employee e'    => 'e.id = da.transfer_from',
                    'tbl_designation d' => 'd.id = e.designation',



                    // To
                    'tbl_employee et'    => 'et.id = da.transfer_to',
                    'tbl_designation dt' => 'dt.id = et.designation'
                ],

                '
                po.id,
                po.reference,
                po.inv_no,
                po.inv_date,
                po.due_date,
                po.profile_id,
                po.grand_total,
                
                po.status,

                p.name AS vendor_name,

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
            d.name AS designation_name,

            et.name AS transfer_to_name,
            dt.name AS transfer_to_designation
            ',

                [
                    'da.type'          => $type,
                    'da.transfer_from' => $profile_id,
                    'po.status'        => 0
                ],

                'array',
                '',

                [
                    'da.id' => 'DESC'
                ]
            );
        }



        /*
    |--------------------------------------------------------------------------
    | VIEW
    |--------------------------------------------------------------------------
    */

        if ($type === 0) {

            $view = 'approval/approval_out';
        } elseif ($type === 1) {

            $view = 'approval/approval_out';
        } else {

            $view = 'approval/approval_out';
        }


        /*
    |--------------------------------------------------------------------------
    | LOAD VIEW
    |--------------------------------------------------------------------------
    */

        $this->view_function1(
            $view,
            $rdata,
            $sdata,
            $ndata
        );
    }


    public function getemployeesbydesignation()
    {
        $designation_id = $this->input->get('designation_id');

        log_message(
            'error',
            'GET EMPLOYEES BY DESIGNATION: ' . $designation_id
        );

        if (empty($designation_id)) {

            echo json_encode([
                'status' => false,
                'message' => 'Designation ID is required',
                'data' => [
                    'employees' => []
                ]
            ]);

            return;
        }

        $employees = $this->Approval_model->getJoinedDataPagination(
            'tbl_employee e',
            [],
            [
                'e.id',
                'e.name',
                'e.email',
                'e.designation'
            ],
            [
                'e.designation' => $designation_id,
                'e.status'     => 0
            ],
            'array',
            '',
            [
                'e.id' => 'DESC'
            ]
        );

        if (empty($employees)) {

            echo json_encode([
                'status' => true,
                'message' => 'No employees found',
                'data' => [
                    'employees' => []
                ]
            ]);

            return;
        }

        foreach ($employees as &$employee) {

            $desig = $this->Approval_model->get_specific_columns(
                'tbl_designation',
                'name',
                [
                    'id' => $designation_id
                ]
            );

            $employee['designation_name'] =
                !empty($desig)
                ? $desig[0]['name']
                : null;
        }

        echo json_encode([
            'status' => true,
            'message' => 'Employees fetched successfully',
            'data' => [
                'employees' => $employees
            ]
        ]);
    }

    public function saveapproval()
    {
        $this->load->library('PHPMailer_Library');
        $profile_id = 1; // replace with session user id
        // $type = (int)$current['type'];
        $doc_id        = (int)$this->input->post('doc_id');
        $approval_id   = (int)$this->input->post('approval_id');
        $status        = $this->input->post('status');
        $remarks       = $this->input->post('remarks');
        $approval_date = $this->input->post('approval_date');
        $type = (int)$this->input->post('type');
        $employee_id = $this->input->post('employee_id');

        /*
        |--------------------------------------------------------------------------
        | VALIDATION
        |--------------------------------------------------------------------------
        */

        if (empty($doc_id)) {

            $this->session->set_flashdata(
                'error',
                'Purchase Order ID is missing.'
            );

            redirect('approval/approval_in?type=' . $type);
            return;
        }

        if (empty($approval_id)) {

            $this->session->set_flashdata(
                'error',
                'Approval ID is missing.'
            );

            redirect('approval/approval_in?type=' . $type);
            return;
        }

        if ($status === '' || $status === null) {

            $this->session->set_flashdata(
                'error',
                'Please select approval status.'
            );

            redirect('approval/approval_in?type=' . $type);
            return;
        }


        /*
        |--------------------------------------------------------------------------
        | GET CURRENT ROW
        |--------------------------------------------------------------------------
        */

        $approval = $this->Approval_model->get_specific_columns(
            'tbl_document_approval',
            '
                id,
                doc_id,
                type,
                transfer_from,
                transfer_to,
                approval_status,
                remark,
                status
            ',
            [
                'id'     => $approval_id,
                'doc_id' => $doc_id
            ]
        );


        if (empty($approval)) {

            $this->session->set_flashdata(
                'error',
                'Approval record not found.'
            );

            redirect('approval/approval_in?type=' . $type);
            return;
        }


        $current = isset($approval[0])
            ? $approval[0]
            : $approval;


        $type          = (int)$current['type'];
        $transfer_from = (int)$current['transfer_from'];
        $transfer_to   = (int)$current['transfer_to'];
        $employee = $this->Approval_model->get_specific_columns(
            'tbl_employee',
            'id, name, email',
            [
                'id' => $transfer_from
            ]
        );

        $employee_name  = !empty($employee) ? $employee[0]['name'] : '';
        $employee_email = !empty($employee) ? $employee[0]['email'] : '';

        $date = !empty($approval_date)
            ? $approval_date
            : date('Y-m-d');



        /*
            |--------------------------------------------------------------------------
            | STATUS = APPROVED
            |--------------------------------------------------------------------------
            | OLD ROW IS NOT UPDATED.
            | A NEW ROW IS CREATED WITH approval_status = 1.
            |--------------------------------------------------------------------------
            */

        if ((int)$status === 1) {

            $newData = [

                'doc_id' => $doc_id,

                'type' => $type,

                /*
                | Current receiver becomes the sender
                */
                'transfer_from' => $transfer_to,

                /*
                | Send back to previous sender
                */
                'transfer_to' => $transfer_from,

                /*
                | ONLY THE NEW ROW IS APPROVED
                */
                'approval_status' => 1,

                'remark' => !empty($remarks)
                    ? $remarks
                    : 'Approved',

                'transfer_from_datetime' => $date,

                'transfer_to_datetime' => $date,

                'action_datetime' => $date,

                'status' => 0,

                'added_by' => $profile_id,

                'ip_address' => $this->input->ip_address(),

                'created_at' => date('Y-m-d H:i:s')
            ];


            /*
            |--------------------------------------------------------------------------
            | INSERT NEW APPROVAL ROW
            |--------------------------------------------------------------------------
            */

            $new_id = $this->Approval_model->insert_to_tb(
                'tbl_document_approval',
                $newData
            );
            $updated = $this->updateDocumentApprovalStatus(
                $type,
                $doc_id,
                1
            );
            if (!$updated) {

                $this->session->set_flashdata(
                    'error',
                    'Approval was saved, but document status could not be updated.'
                );

                redirect('approval/approval_in?type=' . $type);
                return;
            }



            if (!$new_id) {

                log_message(
                    'error',
                    'FAILED TO INSERT APPROVED APPROVAL: ' .
                        print_r($this->db->error(), true)
                );

                $this->session->set_flashdata(
                    'error',
                    'Failed to create approved approval entry.'
                );

                redirect('approval/approval_in?type=' . $type);
                return;
            }
            /*
|--------------------------------------------------------------------------
| SEND APPROVAL EMAIL
|--------------------------------------------------------------------------
*/

            if (!empty($employee_email)) {

                $subject = 'Purchase Order Approved';

                $body = '
        <h3>Purchase Order Approved</h3>

        <p>Hello ' . htmlspecialchars($employee_name) . ',</p>

        <p>Your Purchase Order has been approved.</p>

        <p>
            <strong>Document ID:</strong> ' . $doc_id . '<br>
            <strong>Status:</strong> Approved<br>
            <strong>Remarks:</strong> ' . htmlspecialchars($remarks ?: 'Approved') . '
        </p>

        <p>Regards,<br>Your ERP</p>
    ';

                $emailSent = $this->phpmailer_library->send(
                    $employee_email,
                    $subject,
                    $body
                );

                if (!$emailSent) {
                    log_message(
                        'error',
                        'Approval inserted, but email failed for: ' . $employee_email
                    );
                }
            }

            /*
            |--------------------------------------------------------------------------
            | SUCCESS
            |--------------------------------------------------------------------------
            */

            $this->session->set_flashdata(
                'success',
                'Purchase Order approved successfully.'
            );

            redirect('approval/approval_in?type=' . $type);
            return;
        }
        /*
        |--------------------------------------------------------------------------
        | REJECTED
        |--------------------------------------------------------------------------
        */

        if ((int)$status === 2) {

            $newData = [

                'doc_id' => $doc_id,

                'type' => $type,

                /*
                | Previous receiver becomes sender
                */
                'transfer_from' => $transfer_to,

                /*
                | Send back to previous sender
                */
                'transfer_to' => $transfer_from,

                /*
                | ONLY NEW ROW HAS STATUS 2
                */
                'approval_status' => 2,

                'remark' => !empty($remarks)
                    ? $remarks
                    : 'Rejected',

                'transfer_from_datetime' => $date,

                'transfer_to_datetime' => $date,

                'action_datetime' => $date,

                'status' => 0,

                'added_by' => $profile_id,

                'ip_address' => $this->input->ip_address(),

                'created_at' => date('Y-m-d H:i:s')
            ];


            $new_id = $this->Approval_model->insert_to_tb(
                'tbl_document_approval',
                $newData
            );
            $updated = $this->updateDocumentApprovalStatus(
                $type,
                $doc_id,
                2
            );

            if (!$updated) {

                $this->session->set_flashdata(
                    'error',
                    'Rejection was saved, but document status could not be updated.'
                );

                redirect('approval/approval_in?type=' . $type);
                return;
            }


            if (!$new_id) {

                log_message(
                    'error',
                    'FAILED TO INSERT REJECTED APPROVAL: ' .
                        print_r($this->db->error(), true)
                );

                $this->session->set_flashdata(
                    'error',
                    'Failed to create rejection entry.'
                );

                redirect('approval/approval_in?type=' . $type);
                return;
            }


            $this->session->set_flashdata(
                'success',
                'Purchase Order rejected successfully.'
            );

            redirect('approval/approval_in?type=' . $type);
            return;
        }


        /*
        |--------------------------------------------------------------------------
        | PENDING
        |--------------------------------------------------------------------------
        */

        if ((int)$status === 0) {

            /*
            | Create a NEW pending row
            */

            $newData = [

                'doc_id' => $doc_id,

                'type' => $type,

                'transfer_from' => $transfer_to,

                'transfer_to' => $transfer_from,

                'approval_status' => 0,

                'remark' => !empty($remarks)
                    ? $remarks
                    : 'Pending',

                'transfer_from_datetime' => $date,

                'transfer_to_datetime' => null,

                'action_datetime' => null,

                'status' => 0,

                'added_by' => $profile_id,

                'ip_address' => $this->input->ip_address(),

                'created_at' => date('Y-m-d H:i:s')
            ];


            $new_id = $this->Approval_model->insert_to_tb(
                'tbl_document_approval',
                $newData
            );
            // UPDATE PURCHASE / SALES ORDER STATUS
            $updated = $this->updateDocumentApprovalStatus(
                $type,
                $doc_id,
                0
            );

            if (!$updated) {

                $this->session->set_flashdata(
                    'error',
                    'Pending status was saved, but document status could not be updated.'
                );

                redirect('approval/approval_in?type=' . $type);
                return;
            }


            if (!$new_id) {

                $this->session->set_flashdata(
                    'error',
                    'Failed to create pending approval entry.'
                );

                redirect('approval/approval_in');
                return;
            }


            $this->session->set_flashdata(
                'success',
                'Approval status changed to Pending.'
            );

            redirect('approval/approval_in');
            return;
        }


        /*
        |--------------------------------------------------------------------------
        | FURTHER APPROVAL
        |--------------------------------------------------------------------------
        */

        if ((int)$status === 3) {

            if (empty($employee_id)) {

                $this->session->set_flashdata(
                    'error',
                    'Please select employee for further approval.'
                );

                redirect('approval/approval_in');
                return;
            }


            $newData = [

                'doc_id' => $doc_id,

                'type' => $type,


                'transfer_from' => $transfer_to,


                'transfer_to' => (int)$employee_id,


                'approval_status' => 0,

                'remark' => !empty($remarks)
                    ? $remarks
                    : 'Forwarded for further approval',

                'transfer_from_datetime' => $date,

                'transfer_to_datetime' => null,

                'action_datetime' => null,

                'status' => 0,

                'added_by' => $profile_id,

                'ip_address' => $this->input->ip_address(),

                'created_at' => date('Y-m-d H:i:s')
            ];


            $new_id = $this->Approval_model->insert_to_tb(
                'tbl_document_approval',
                $newData
            );
            // DOCUMENT STATUS = FURTHER APPROVAL / WAITING
            $updated = $this->updateDocumentApprovalStatus(
                $type,
                $doc_id,
                3
            );

            if (!$updated) {

                $this->session->set_flashdata(
                    'error',
                    'Further approval was created, but document status could not be updated.'
                );

                redirect('approval/approval_in?type=' . $type);
                return;
            }

            if (!$new_id) {

                log_message(
                    'error',
                    'FAILED TO INSERT FURTHER APPROVAL: ' .
                        print_r($this->db->error(), true)
                );

                $this->session->set_flashdata(
                    'error',
                    'Failed to create further approval entry.'
                );

                redirect('approval/approval_in?type=' . $type);
                return;
            }
            /*
|--------------------------------------------------------------------------
| SEND FURTHER APPROVAL EMAIL
|--------------------------------------------------------------------------
*/

            $nextEmployee = $this->Approval_model->get_specific_columns(
                'tbl_employee',
                'id, name, email',
                [
                    'id' => (int)$employee_id
                ]
            );

            $nextEmployeeName  = !empty($nextEmployee)
                ? $nextEmployee[0]['name']
                : '';

            $nextEmployeeEmail = !empty($nextEmployee)
                ? $nextEmployee[0]['email']
                : '';

            if (!empty($nextEmployeeEmail)) {

                if ($type === 0) {
                    $documentType = 'Purchase Order';
                } elseif ($type === 1) {
                    $documentType = 'Sales Order';
                } else {
                    $documentType = 'Document';
                }

                $subject = $documentType . ' - Further Approval Required';

                $body = '
        <h3>Further Approval Required</h3>

        <p>Hello ' . htmlspecialchars($nextEmployeeName) . ',</p>

        <p>
            A ' . htmlspecialchars($documentType) . '
            has been forwarded to you for approval.
        </p>

        <p>
            <strong>Document ID:</strong> ' . $doc_id . '<br>
            <strong>Status:</strong> Waiting for Approval<br>
            <strong>Remarks:</strong> ' .
                    htmlspecialchars(
                        !empty($remarks)
                            ? $remarks
                            : 'Forwarded for further approval'
                    ) . '
        </p>

        <p>
            Please login to the ERP system and review the document.
        </p>

        <p>
            Regards,<br>
            Ethicfin ERP
        </p>
    ';

                $emailSent = $this->phpmailer_library->send(
                    $nextEmployeeEmail,
                    $subject,
                    $body
                );

                if (!$emailSent) {

                    log_message(
                        'error',
                        'Further approval inserted, but email failed for: ' .
                            $nextEmployeeEmail
                    );
                } else {

                    log_message(
                        'error',
                        'Further approval email sent successfully to: ' .
                            $nextEmployeeEmail
                    );
                }
            } else {

                log_message(
                    'error',
                    'Further approval inserted, but selected employee email not found. Employee ID: ' .
                        $employee_id
                );
            }


            $this->session->set_flashdata(
                'success',
                'Document forwarded for further approval.'
            );
//  if ($type == 0) {

//     redirect('Approval/approval_in?type=0');

// } elseif ($type == 1) {

//     redirect('Approval/approval_in?type=1');

// } elseif ($type == 2) {

//     redirect('Approval/payment_approval_in');
// }
            redirect('approval/approval_in?type=' . $type);
            return;
        }


        /*
        |--------------------------------------------------------------------------
        | FALLBACK
        |--------------------------------------------------------------------------
        */

        $this->session->set_flashdata(
            'error',
            'Invalid approval status.'
        );


        redirect('approval/approval_in?type=' . $type);
    }

    public function payment_approval_in()
    {
        $sdata['approval_window'] = 'active bg-gradient-';
        $sdata['index'] = '';

        $ndata['bn1']   = $this->lang->line('dashboard');
        $ndata['bn3']   = 'Payment Approval';
        $ndata['title'] = 'Payment Approval';

        $rdata['pagetitle'] = 'Payment Approval';

        /*
     * Payment approval type
     * 0 = Purchase 
     * 1 = Sales
     * 2 = Payment
     */
        $type = 2;

        // Logged-in user's profile ID
        //$profile_id = $this->session->userdata('profile_id');
        $profile_id = 1;

        $rdata['payments'] = [];

        $rdata['designation'] = $this->Approval_model->get_specific_columns(
            'tbl_designation',
            ['id', 'name'],
            [
                'status' => 0
            ]
        );

        if (!empty($profile_id)) {

            /*
         * Get pending payment transactions
         * and their approval record.
         *
         * IMPORTANT:
         * da.doc_id = tna.reference
         */
           $approvalData = $this->Approval_model->getJoinedDataPagination(
    'tbl_document_approval da',
    [
        'tbl_transactions_main_not_approved tna'
            => 'tna.id = da.doc_id
              AND tna.reference = da.reference',

        'tbl_profile p'
            => 'p.id = tna.profile_id',

        'tbl_employee e'
            => 'e.id = da.transfer_from',

        'tbl_designation d'
            => 'd.id = e.designation'
    ],
    '
        tna.id,
        tna.reference,
        tna.reference2,
        tna.voucher_no,
        tna.branch_id,
        tna.trans_ref,
        tna.date,
        tna.profile_id,
        tna.receiver_payer,
        tna.amount,
        tna.description,
        tna.remark,
        tna.project_id,
        tna.branch_to,
        tna.type,
        tna.status,

        p.name AS profile_name,

        da.id AS approval_id,
        da.doc_id,
        da.reference AS approval_reference,
        da.type,
        da.transfer_from,
        da.transfer_to,
        da.approval_status,
        da.remark AS approval_remark,
        da.transfer_from_datetime,
        da.transfer_to_datetime,
        da.action_datetime,

        e.name AS employee_name,

        d.name AS designation_name
    ',
    [
        'da.type'    => 2,
        'tna.status' => 0
    ],
    'array',
    '',
    [
        'da.id' => 'DESC'
    ]
);

 



           $latestApprovals = [];

if (!empty($approvalData)) {

    foreach ($approvalData as $row) {

        $doc_id = (int)$row['doc_id'];

        // Only current employee
        if ((int)$row['transfer_to'] !== (int)$profile_id) {
            continue;
        }

        // Only pending approval
        if ((int)$row['approval_status'] !== 0) {
            continue;
        }

        // Keep the latest pending approval for this document
        if (
            !isset($latestApprovals[$doc_id]) ||
            (int)$row['approval_id'] >
            (int)$latestApprovals[$doc_id]['approval_id']
        ) {

            $latestApprovals[$doc_id] = $row;
        }
    }
}
        }
        $rdata['payments'] = array_values($latestApprovals);
        $rdata['type'] = $type;

       
        $this->view_function1(
            'Approval/payment_approval_in',
            $rdata,
            $sdata,
            $ndata
        );
    }

public function payment_approval_out()
{
    $sdata['approval_window'] = 'active bg-gradient-';
    $sdata['index'] = '';

    $ndata['bn1']   = $this->lang->line('dashboard');
    $ndata['bn3']   = 'Payment Approval Out';
    $ndata['title'] = 'Payment Approval Out';

    $rdata['pagetitle'] = 'Payment Approval Out';

    /*
    |--------------------------------------------------------------------------
    | PAYMENT TYPE
    |--------------------------------------------------------------------------
    | 2 = Payment
    |--------------------------------------------------------------------------
    */

    $type = 2;

    // Logged-in profile
    // $profile_id = $this->session->userdata('profile_id');
    $profile_id = 1;

    $rdata['payments'] = [];
    $rdata['type'] = $type;
    $rdata['payment_direction'] = 'out';


    /*
    |--------------------------------------------------------------------------
    | DESIGNATIONS
    |--------------------------------------------------------------------------
    */

    $rdata['designation'] = $this->Approval_model->get_specific_columns(
        'tbl_designation',
        ['id', 'name'],
        [
            'status' => 0
        ]
    );


    /*
    |--------------------------------------------------------------------------
    | GET PAYMENT OUT APPROVALS
    |--------------------------------------------------------------------------
    */

    if (!empty($profile_id)) {

        $rdata['payments'] = $this->Approval_model->getJoinedDataPagination(
            'tbl_document_approval da',

            [
                /*
                | Payment transaction
                */
                'tbl_transactions_main_not_approved tna'
                    => 'tna.id = da.doc_id',

                /*
                | Payment creator/profile
                */
                'tbl_profile p'
                    => 'p.id = tna.profile_id',

                /*
                | Employee who sent the approval
                */
                'tbl_employee e'
                    => 'e.id = da.transfer_from',

                /*
                | Sender designation
                */
                'tbl_designation d'
                    => 'd.id = e.designation',

                /*
                | Employee who receives approval
                */
                'tbl_employee et'
                    => 'et.id = da.transfer_to',

                /*
                | Receiver designation
                */
                'tbl_designation dt'
                    => 'dt.id = et.designation'
            ],

            '
                tna.id,
                tna.reference,
                tna.reference2,
                tna.voucher_no,
                tna.branch_id,
                tna.trans_ref,
                tna.date,
                tna.profile_id,
                tna.receiver_payer,
                tna.amount,
                tna.description,
                tna.remark,
                tna.project_id,
                tna.branch_to,
                tna.type,
                tna.status,

                p.name AS profile_name,

                da.id AS approval_id,
                da.doc_id,
                da.reference AS approval_reference,
                da.type AS approval_type,
                da.transfer_from,
                da.transfer_to,
                da.approval_status,
                da.remark AS approval_remark,
                da.transfer_from_datetime,
                da.transfer_to_datetime,
                da.action_datetime,

                e.name AS employee_name,
                d.name AS designation_name,

                et.name AS transfer_to_name,
                dt.name AS transfer_to_designation
            ',

            [
                /*
                | Payment approval
                */
                'da.type' => $type,

                /*
                | IMPORTANT:
                | Payment OUT = current profile is transfer_from
                */
                'da.transfer_from' => $profile_id,

                /*
                | Temporary payment transaction
                */
                'tna.type' => $type,

                /*
                | Still not approved / temporary transaction
                */
                'tna.status' => 0
            ],

            'array',
            '',

            [
                'da.id' => 'DESC'
            ]
        );
    }


 
    /*
    |--------------------------------------------------------------------------
    | LOAD VIEW
    |--------------------------------------------------------------------------
    */

    $this->view_function1(
        'Approval/payment_approval_out',
        $rdata,
        $sdata,
        $ndata
    );
}

 public function payment_saveapproval()
{
    $approval_id = (int)$this->input->post('approval_id');
    $doc_id      = (int)$this->input->post('doc_id');
    $type        = (int)$this->input->post('type');

    $remarks     = $this->input->post('remarks');
    $approval_date = $this->input->post('approval_date');

    // Logged-in profile
    // $profile_id = $this->session->userdata('profile_id');
    $profile_id = 1;


    /*
    |--------------------------------------------------------------------------
    | ONLY PAYMENT
    |--------------------------------------------------------------------------
    */

    if ($type !== 2) {

        echo json_encode([
            'status'  => false,
            'message' => 'Invalid payment approval type.'
        ]);

        return;
    }


    /*
    |--------------------------------------------------------------------------
    | VALIDATION
    |--------------------------------------------------------------------------
    */

    if (empty($approval_id)) {

        echo json_encode([
            'status'  => false,
            'message' => 'Approval ID is missing.'
        ]);

        return;
    }

    if (empty($doc_id)) {

        echo json_encode([
            'status'  => false,
            'message' => 'Payment document ID is missing.'
        ]);

        return;
    }


    /*
    |--------------------------------------------------------------------------
    | START DATABASE TRANSACTION
    |--------------------------------------------------------------------------
    */

    $this->db->trans_begin();


    /*
    |--------------------------------------------------------------------------
    | 1. GET PENDING PAYMENT
    |--------------------------------------------------------------------------
    */

    $payment = $this->db
        ->where('id', $doc_id)
        ->where('type', 2)
        ->where('status', 0)
        ->get('tbl_transactions_main_not_approved')
        ->row_array();


    if (empty($payment)) {

        $this->db->trans_rollback();

        echo json_encode([
            'status'  => false,
            'message' => 'Pending payment not found.'
        ]);

        return;
    }


    /*
    |--------------------------------------------------------------------------
    | 2. GET PAYMENT SUB TRANSACTIONS
    |--------------------------------------------------------------------------
    */

    $subTransactions = $this->db
        ->where('reference', $payment['reference'])
        ->where('status', 0)
        ->get('tbl_transactions_sub_not_approved')
        ->result_array();


    if (empty($subTransactions)) {

        $this->db->trans_rollback();

        echo json_encode([
            'status'  => false,
            'message' => 'Payment sub transactions not found.'
        ]);

        return;
    }


    /*
    |--------------------------------------------------------------------------
    | 3. CHECK APPROVAL RECORD
    |--------------------------------------------------------------------------
    */

    $approval = $this->db
        ->where('id', $approval_id)
        ->where('doc_id', $doc_id)
        ->where('type', 2)
        ->where('approval_status', 0)
        ->get('tbl_document_approval')
        ->row_array();


    if (empty($approval)) {

        $this->db->trans_rollback();

        echo json_encode([
            'status'  => false,
            'message' => 'Pending payment approval record not found.'
        ]);

        return;
    }


    /*
    |--------------------------------------------------------------------------
    | 4. INSERT INTO tbl_transactions_main
    |--------------------------------------------------------------------------
    */

    $mainData = $payment;

    // Remove primary key from temporary table
    unset($mainData['id']);

    $this->db->insert(
        'tbl_transactions_main',
        $mainData
    );


    if ($this->db->affected_rows() <= 0) {

        $this->db->trans_rollback();

        echo json_encode([
            'status'  => false,
            'message' => 'Failed to insert payment into transactions main.'
        ]);

        return;
    }


   /*
|--------------------------------------------------------------------------
| 5. INSERT INTO tbl_transactions_sub
|--------------------------------------------------------------------------
*/

foreach ($subTransactions as $sub) {

    $subData = [
        'reference'   => $sub['reference'],
        'cc_id'       => isset($sub['cc_id']) ? $sub['cc_id'] : 0,
        'acc_id'      => $sub['acc_id'],
        'acc_name'    => $sub['acc_name'],
        'description' => isset($sub['description']) ? $sub['description'] : '',
        'debit'       => isset($sub['debit']) ? $sub['debit'] : 0,
        'credit'      => isset($sub['credit']) ? $sub['credit'] : 0,
        'status'      => 0
    ];

    $this->db->insert(
        'tbl_transactions_sub',
        $subData
    );

    if ($this->db->affected_rows() <= 0) {

        $this->db->trans_rollback();

        echo json_encode([
            'status'  => false,
            'message' => 'Failed to insert payment sub transaction.',
            'error'   => $this->db->error()
        ]);

        return;
    }
}

    /*
    |--------------------------------------------------------------------------
    | 6. UPDATE MAIN NOT APPROVED
    |--------------------------------------------------------------------------
    */

    $this->db
        ->where('id', $doc_id)
        ->update(
            'tbl_transactions_main_not_approved',
            [
                'status' => 1
            ]
        );


    /*
    |--------------------------------------------------------------------------
    | 7. UPDATE SUB NOT APPROVED
    |--------------------------------------------------------------------------
    */

    $this->db
        ->where('reference', $payment['reference'])
        ->update(
            'tbl_transactions_sub_not_approved',
            [
                'status' => 1
            ]
        );


    /*
    |--------------------------------------------------------------------------
    | 8. INSERT PAYMENT APPROVAL
    |--------------------------------------------------------------------------
    */

    $approvalData = [

        'doc_id' => $doc_id,

        // Your new reference column
        'reference' => $payment['reference'],

        // Payment
        'type' => 2,

        'transfer_from' => $approval['transfer_to'],

        'transfer_to' => $approval['transfer_from'],

        // Approved
        'approval_status' => 1,

        'remark' => !empty($remarks)
            ? $remarks
            : 'Payment Approved',

        'transfer_from_datetime' => !empty($approval_date)
            ? $approval_date
            : date('Y-m-d'),

        'transfer_to_datetime' => date('Y-m-d'),

        'action_datetime' => date('Y-m-d'),

        'status' => 0,

        'added_by' => $profile_id,

        'ip_address' => $this->input->ip_address(),

        'created_at' => date('Y-m-d H:i:s')
    ];


    $this->db->insert(
        'tbl_document_approval',
        $approvalData
    );


    if ($this->db->affected_rows() <= 0) {

        $this->db->trans_rollback();

        echo json_encode([
            'status'  => false,
            'message' => 'Failed to insert payment approval.'
        ]);

        return;
    }


    /*
    |--------------------------------------------------------------------------
    | 9. COMMIT
    |--------------------------------------------------------------------------
    */

    if ($this->db->trans_status() === false) {

        $this->db->trans_rollback();

        echo json_encode([
            'status'  => false,
            'message' => 'Payment approval failed.'
        ]);

        return;
    }


    $this->db->trans_commit();


    /*
    |--------------------------------------------------------------------------
    | SUCCESS
    |--------------------------------------------------------------------------
    */

    echo json_encode([
        'status'  => true,
        'message' => 'Payment approved successfully.',
        'doc_id'  => $doc_id,
        'reference' => $payment['reference']
    ]);
}
}

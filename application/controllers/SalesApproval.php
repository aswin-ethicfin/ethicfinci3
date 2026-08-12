<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\IOFactory;
class SalesApproval extends CI_Controller
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

    public function approval_in()
    {
        $sdata['approval_window'] = 'active bg-gradient-';
        $sdata['index'] = '';
    
        $ndata['bn1']   = $this->lang->line('dashboard');
        $ndata['bn3']   = 'Document Approval';
        $ndata['title'] = 'Document Approval';
    
        $rdata['pagetitle'] = 'Document Approval';
    
        // Logged-in user's profile ID
        //$profile_id = $this->session->userdata('profile_id');
        $profile_id = 1;
    
        $rdata['sales_orders'] = [];
    
    
        /*
        |--------------------------------------------------------------------------
        | GET DESIGNATIONS
        |--------------------------------------------------------------------------
        | Only active designations (status = 0)
        |--------------------------------------------------------------------------
        */
    
        $rdata['designation'] = $this->Approval_model->get_specific_columns(
            'tbl_designation',
            ['id', 'name'],
            [
                'status' => 0
            ]
        );
    
    
        // DEBUG - temporarily check what is coming
        // echo '<pre>';
        // print_r($rdata['designation']);
        // exit;
    
    
        if (!empty($profile_id)) {
    
            /*
            |--------------------------------------------------------------------------
            | GET ALL APPROVAL RECORDS
            |--------------------------------------------------------------------------
            */
    
            $approvalData = $this->Approval_model->getJoinedDataPagination(
                'tbl_document_approval da',
                [
                    'tbl_purchase_order po' => 'po.id = da.doc_id',
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
                    'da.type'   => 1,//sales o rder
                    'po.status' => 0
                ],
                'array',
                '', 
                [
                    'da.id' => 'DESC'
                ]
            );
    
    
            /*
            |--------------------------------------------------------------------------
            | KEEP ONLY LAST APPROVAL ENTRY FOR EACH DOC_ID
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
            | CHECK LAST ENTRY TRANSFER_TO
            |--------------------------------------------------------------------------
            */
    
            foreach ($latestApprovals as $row) {
    
                if ((int)$row['transfer_to'] === (int)$profile_id) {
    
                    $rdata['sales_orders'][] = $row;
                }
            }
        }
    
    
        /*
        |--------------------------------------------------------------------------
        | VIEW
        |--------------------------------------------------------------------------
        */
    
        $this->view_function1(
            'approval/sales_approval_in',
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
    
        // Logged-in user's profile ID
        //$profile_id = $this->session->userdata('profile_id');
        $profile_id = 1;
    
        $rdata['sales_orders'] = [];
    
        if (!empty($profile_id)) {
    
            $rdata['sales_orders'] = $this->Approval_model->getJoinedDataPagination(
                'tbl_document_approval da',
    
                [
                    'tbl_order po' => 'po.id = da.doc_id',
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
                    'da.type'         => 1, // Sales Order
                    'da.transfer_from' => $profile_id,
                    'po.status'       => 0
                ],
    
                'array',
                '',
    
                [
                    'da.id' => 'DESC'
                ]
            );
        }
    
        $this->view_function1(
            'approval/sales_approval_out',
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
        $profile_id = 1; // replace with session user id
    
        $doc_id        = (int)$this->input->post('doc_id');
        $approval_id   = (int)$this->input->post('approval_id');
        $status        = $this->input->post('status');
        $remarks       = $this->input->post('remarks');
        $approval_date = $this->input->post('approval_date');
    
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
    
            redirect('approval/sales_approval_in');
            return;
        }
    
        if (empty($approval_id)) {
    
            $this->session->set_flashdata(
                'error',
                'Approval ID is missing.'
            );
    
            redirect('approval/sales_approval_in');
            return;
        }
    
        if ($status === '' || $status === null) {
    
            $this->session->set_flashdata(
                'error',
                'Please select approval status.'
            );
    
            redirect('approval/sales_approval_in');
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
    
            redirect('approval/sales_approval_in');
            return;
        }
    
    
        $current = isset($approval[0])
            ? $approval[0]
            : $approval;
    
    
        $type          = (int)$current['type'];
        $transfer_from = (int)$current['transfer_from'];
        $transfer_to   = (int)$current['transfer_to'];
    
        $date = !empty($approval_date)
            ? $approval_date
            : date('Y-m-d');
    
    
        /*
        |--------------------------------------------------------------------------
        | IMPORTANT
        |
        | DO NOT UPDATE THE OLD ROW.
        |
        | We are creating a completely NEW approval row.
        |--------------------------------------------------------------------------
        */
    
    
        /*
        |--------------------------------------------------------------------------
        | APPROVED
        |--------------------------------------------------------------------------
        */
    
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
                // 'type' => 1,

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

                redirect('approval/sales_approval_in');
                return;
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

            redirect('approval/approval_in');
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
    
                redirect('approval/approval_in');
                return;
            }
    
    
            $this->session->set_flashdata(
                'success',
                'Purchase Order rejected successfully.'
            );
    
            redirect('approval/approval_in');
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
    
                /*
                | Current receiver becomes sender
                */
                'transfer_from' => $transfer_to,
    
                /*
                | Selected employee becomes receiver
                */
                'transfer_to' => (int)$employee_id,
    
                /*
                | NEW ROW IS WAITING/PENDING
                */
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
    
                redirect('approval/approval_in');
                return;
            }
    
    
            $this->session->set_flashdata(
                'success',
                'Document forwarded for further approval.'
            );
    
            redirect('approval/approval_in');
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
    
        redirect('approval/approval_in');
    }
}
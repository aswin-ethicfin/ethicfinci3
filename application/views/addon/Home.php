<?php
defined('BASEPATH') or exit('No direct script access allowed');

date_default_timezone_set('Asia/Riyadh');
class Home extends CI_Controller
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
    //certificate of Origine
   public function upload_COO_form()
    {
        $rdata = array();
        $sdata = array();
        $ndata = array();
        $rdata['pagetitle'] = 'Upload Document';
        $this->view_function1('addon/upload_file', $rdata, $sdata, $ndata);
    }
    public function listCOO()
    {
        $this->load->library('pagination');

        $rdata = [];
        $sdata = [];
        $ndata = [];

        $rdata['pagetitle'] = 'Uploaded Lab Images';

        // Get filter inputs
        $file_name = $this->input->get('title'); // Match with input field name in form
        $start_date = $this->input->get('start_date');
        $end_date = $this->input->get('end_date');

        // Basic conditions
        $conditions = ['status' => 0, 'file_type' => 0];
        $like = [];
        $range = [];

        if (!empty($file_name)) {
            $like['title'] = $file_name;
        }
        if (!empty($start_date)) {
            $range['date_time >='] = $start_date . ' 00:00:00';
        }
        if (!empty($end_date)) {
            $range['date_time <='] = $end_date . ' 23:59:59';
        }

        // Pagination setup
        $config['base_url'] = site_url('home/listCOO'); // Important for correct links
        $config['total_rows'] = $this->Default_model->countJoinedData('tbl_document_uploads', [], $conditions, $like, [], $range);
        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'per_page';
        // print_r($config['total_rows']);
        // exit();
        // Preserve filters in pagination links
        $config['suffix'] = '&title=' . urlencode($file_name) .
            '&start_date=' . urlencode($start_date) .
            '&end_date=' . urlencode($end_date);
        $config['first_url'] = $config['base_url'] . '?per_page=0' . $config['suffix'];

        $this->pagination->initialize($config);

        // Get current offset
        $offset = $this->input->get('per_page') ?: 0;

        // Pass required values to the view
        $rdata['per_page'] = $config['per_page'];
        $rdata['pagination_suffix'] = $config['suffix'];
        $rdata['total_rows'] = $config['total_rows'];
        $rdata['start'] = $offset;


        $orderBy = ['date_time' => 'DESC'];

        // Fetch paginated data
        $rdata['images'] = $this->Default_model->getJoinedDataPagination(
            'tbl_document_uploads',
            [],
            '*',
            $conditions,
            $like,
            [],
            $range,
            'array',
            '',
            $orderBy,
            $rdata['per_page'],
            $offset
        );

        $rdata['totalPages'] = ceil($config['total_rows'] / $config['per_page']);
        $rdata['pagination_links'] = $this->pagination->create_links();

        // Load view
        $this->view_function1('addon/image_list', $rdata, $sdata, $ndata, $rdata);
    }
    public function editDocument()
    {
        $rdata = array();
        $rdata['pagetitle'] = 'Editpage';
        $id = $this->input->get('id');
        $upload = $this->Default_model->get_specific_columns('tbl_document_uploads', '', ['id' => $id]);
        // print_r($rdata['upload']);
        // exit();
        $rdata['upload'] = $upload[0];
        $rdata['pagetitle'] = 'Edit COO';
        $this->view_function1('addon/edit_upload', $rdata);
    }
    //certificate of Analysis
    public function upload_COA_form()
    {
        $rdata = array();
        $sdata = array();
        $ndata = array();
        $rdata['pagetitle'] = 'Upload Document';
        $this->view_function1('addon/upload_coa', $rdata, $sdata, $ndata);
    }
    public function listCOA()
    {
        $this->load->library('pagination');

        $rdata = [];
        $sdata = [];
        $ndata = [];

        $rdata['pagetitle'] = 'Uploaded Lab Images';

        // Get filter inputs
        $file_name = $this->input->get('title'); // Match with input field name in form
        $start_date = $this->input->get('start_date');
        $end_date = $this->input->get('end_date');

        // Basic conditions
        $conditions = ['status' => 0, 'file_type' => 1];
        $like = [];
        $range = [];

        if (!empty($file_name)) {
            $like['title'] = $file_name;
        }
        if (!empty($start_date)) {
            $range['date_time >='] = $start_date . ' 00:00:00';
        }
        if (!empty($end_date)) {
            $range['date_time <='] = $end_date . ' 23:59:59';
        }

        // Pagination setup
        $config['base_url'] = site_url('home/listCOO'); // Important for correct links
        $config['total_rows'] = $this->Default_model->countJoinedData('tbl_document_uploads', [], $conditions, $like, [], $range);
        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'per_page';
        // print_r($config['total_rows']);
        // exit();
        // Preserve filters in pagination links
        $config['suffix'] = '&title=' . urlencode($file_name) .
            '&start_date=' . urlencode($start_date) .
            '&end_date=' . urlencode($end_date);
        $config['first_url'] = $config['base_url'] . '?per_page=0' . $config['suffix'];

        $this->pagination->initialize($config);

        // Get current offset
        $offset = $this->input->get('per_page') ?: 0;

        // Pass required values to the view
        $rdata['per_page'] = $config['per_page'];
        $rdata['pagination_suffix'] = $config['suffix'];
        $rdata['total_rows'] = $config['total_rows'];
        $rdata['start'] = $offset;


        $orderBy = ['date_time' => 'DESC'];

        // Fetch paginated data
        $rdata['images'] = $this->Default_model->getJoinedDataPagination(
            'tbl_document_uploads',
            [],
            '*',
            $conditions,
            $like,
            [],
            $range,
            'array',
            '',
            $orderBy,
            $rdata['per_page'],
            $offset
        );

        $rdata['totalPages'] = ceil($config['total_rows'] / $config['per_page']);
        $rdata['pagination_links'] = $this->pagination->create_links();

        // Load view
        $this->view_function1('addon/list_coa', $rdata, $sdata, $ndata, $rdata);
    }
    public function editCOA()
    {
        $rdata = array();
        $rdata['pagetitle'] = 'Editpage';
        $id = $this->input->get('id');
        $upload = $this->Default_model->get_specific_columns('tbl_document_uploads', '', ['id' => $id]);
        // print_r($rdata['upload']);
        // exit();
        $rdata['imageData'] = $upload[0];
        $rdata['pagetitle'] = 'Edit COA';
        $this->view_function1('addon/edit_coa', $rdata);
    }
    //Common for both COA and COO
    public function uploadDocument()
    {
        // Load helpers and libraries
        $this->load->helper('url');
        $this->load->library('upload');
        $this->load->library('image_lib');

        // Prepare upload config
        $config['upload_path']   = FCPATH . 'uploads/lab/';
        $config['allowed_types'] = 'pdf|png|jpg|jpeg';
        $config['max_size']      = 5120; // 5MB
        $config['file_name']     = time() . '_upload';

        $this->upload->initialize($config);

        if (!$this->upload->do_upload('file_upload')) {
            // Upload failed
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('upload_error', $error);
        } else {
            // Upload successful
            $upload_data = $this->upload->data();

            $file_name = $upload_data['file_name'];
            $file_path = 'uploads/lab/' . $file_name;
            $file_ext = strtolower($upload_data['file_ext']);

            // Resize only if file is image
            if (in_array($file_ext, ['.jpg', '.jpeg', '.png'])) {
                $resize_config['image_library'] = 'gd2';
                $resize_config['source_image'] = $upload_data['full_path'];
                $resize_config['maintain_ratio'] = TRUE;
                $resize_config['width']         = 1024;  // fixed width
                $resize_config['height']        = 768;   // fixed height (adjust as needed)

                $this->image_lib->clear();
                $this->image_lib->initialize($resize_config);
                $this->image_lib->resize();
            }

            // Prepare data for insertion
            $uploadSource = $this->input->post('upload_source', true);
            $file_type = ($uploadSource === 'png_form') ? 1 : 0;

            $data = [
                'added_by'     => 1,
                'ip_address'   => $this->input->ip_address(),
                'status'       => 0,
                'reference_no' => $this->input->post('reference_number', true),
                'title'        => $this->input->post('title', true),
                'file_name'    => $file_name,
                'file_path'    => $file_path,
                'file_type'    => $file_type,
                'date_time'    => date('Y-m-d H:i:s')
            ];


            // Insert to table tbl_document_uploads
            $insert_id = $this->Default_model->insert_to_tb('tbl_document_uploads', $data);

            if ($insert_id) {
                $this->session->set_flashdata('upload_success', 'File uploaded and saved successfully.');
            } else {
                $this->session->set_flashdata('upload_error', 'File uploaded, but DB insert failed.');
            }
        }

        if ($file_type === 1) {
            redirect('home/listCOA');
        } else {
            redirect('home/listCOO');
        }
    }
    public function updateDocument()
    {
        $id = $this->input->get('id');

        // Load helpers and libraries
        $this->load->helper('url');
        $this->load->library('upload');
        $this->load->library('image_lib');

        // Fetch existing record
        $upload = $this->Default_model->get_specific_columns('tbl_document_uploads', '', ['id' => $id]);
        if (!$upload) {
            $this->session->set_flashdata('upload_error', 'Record not found.');
            redirect('home/listCOO');
            return;
        }

        // Upload config
        $config['upload_path']   = FCPATH . 'uploads/lab/';
        $config['allowed_types'] = 'pdf|png|jpg|jpeg';
        $config['max_size']      = 5120; // 5MB
        $config['file_name']     = time() . '_upload';

        $this->upload->initialize($config);

        $file_name = $upload[0]['file_name'];
        $file_path = $upload[0]['file_path'];

        // Check if a new file was uploaded
        if (isset($_FILES['file_upload']) && $_FILES['file_upload']['error'] === 0) {

            // Upload config
            $config['upload_path']   = FCPATH . 'uploads/lab/';
            $config['allowed_types'] = 'pdf|png|jpg|jpeg';
            $config['max_size']      = 5120; // 5MB
            $config['file_name']     = time() . '_upload';

            $this->upload->initialize($config);

            // Upload file
            if ($this->upload->do_upload('file_upload')) {
                $upload_data = $this->upload->data();
                $file_name = $upload_data['file_name'];
                $file_path = 'uploads/lab/' . $file_name;
                $file_ext = strtolower($upload_data['file_ext']);

                // Resize if it's an image
                if (in_array($file_ext, ['.jpg', '.jpeg', '.png'])) {
                    $resize_config['image_library']  = 'gd2';
                    $resize_config['source_image']   = $upload_data['full_path'];
                    $resize_config['maintain_ratio'] = TRUE;
                    $resize_config['width']          = 1024;
                    $resize_config['height']         = 768;

                    $this->image_lib->clear();
                    $this->image_lib->initialize($resize_config);
                    $this->image_lib->resize();
                }

                // Delete old file only after successful upload
                if (!empty($upload['file_path']) && file_exists(FCPATH . $upload['file_path'])) {
                    unlink(FCPATH . $upload['file_path']);
                }
            } else {
                // Upload error
                $this->session->set_flashdata('upload_error', $this->upload->display_errors());
                redirect('home/editLabImage/' . $id);
                return;
            }
        }
        // Determine form source
        $uploadSource = $this->input->post('upload_source', true);
        $file_type = ($uploadSource === 'coa') ? 1 : 0;

        // Prepare data for update
        $data = [
            'reference_no' => $this->input->post('reference_number', true),
            'title'        => $this->input->post('title', true),
            'file_name'    => $file_name,
            'file_path'    => $file_path,
            'file_type'    => $file_type,
            'date_time'    => date('Y-m-d H:i:s')
        ];

        $updated = $this->Default_model->update_record('tbl_document_uploads', $data, ['id' => $id]);

        if ($updated) {
            $this->session->set_flashdata('upload_success', 'Record updated successfully.');
        } else {
            $this->session->set_flashdata('upload_error', 'Update failed. Please try again.');
        }

        // Redirect based on form type
        if ($file_type === 1) {
            redirect('home/listCOA');
        } else {
            redirect('home/listCOO');
        }
    }
    public function view_file()
    {
        $rdata = array();
        $sdata = array();
        $ndata = array();

        $rdata['pagetitle'] = 'Lab Image Preview';

        // Get the ID from the query string
        $id = $this->input->get('id');

        if (!$id) {
            show_error('Invalid request: Missing ID');
        }

        // Get upload details by ID
        $record = $this->Default_model->get_specific_columns('tbl_document_uploads', '', ['id' => $id]);

        if (!$record) {
            show_error('No record found for the given ID');
        }

        // Full path to the uploaded file
        $file_path = FCPATH . $record[0]['file_path'];

        if (!file_exists($file_path)) {
            show_error('File does not exist on the server.');
        }

        // Convert to relative base URL
        $image_url = base_url($record[0]['file_path']);

        // Store for download or session use
        $this->session->set_userdata('current_image_path', $file_path);

        $rdata['image_url'] = $image_url;

        $this->view_function1('addon/image_view', $rdata, $ndata, $sdata);
    }
    public function deleteDocument()
    {
        $document_id = $this->input->post('id');
        $redirect = $this->input->post('redirect');

        if (!$document_id) {
            $this->session->set_flashdata('error', 'Document ID missing');
            return redirect('home/listCOO');
        }

        // Soft delete (set status = 1)
        $update_data = ['status' => 1];
        $deleted = $this->Default_model->update_record('tbl_document_uploads', $update_data, ['id' => $document_id]);

        if ($deleted) {
            $this->session->set_flashdata('success', 'Document deleted successfully');
        } else {
            $this->session->set_flashdata('error', 'Failed to delete document');
        }

        // Redirect based on source
        switch ($redirect) {
            case 'coa':
                return redirect('home/listCOA');
            case 'lab':
            default:
                return redirect('home/listCOO');
        }
    }
}

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
    public function index()
    {
        $rdata = array();
        $sdata = array();
        $ndata = array();
        $rdata['pagetitle'] = 'Homepage';
        $this->view_function1('ci4design/projects', $rdata, $sdata, $ndata);
    }
    public function project_report()
    {
        $rdata = array();
        $sdata = array();
        $ndata = array();
        $rdata['pagetitle'] = 'Homepage';
        $this->view_function1('addon/project_report', $rdata, $sdata, $ndata);
    }
    public function pdr()
    {
        $rdata = array();
        $sdata = array();
        $ndata = array();
        $rdata['pagetitle'] = 'Homepage';
        $this->view_function1('pdr/pdr', $rdata, $sdata, $ndata);
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
    public function datasetting_form()
    {
        $rdata = array();
        $sdata = array();
        $ndata = array();
        $rdata['pagetitle'] = 'Data Settings In Industry Page';
        $this->view_function1('datasettings/industry', $rdata, $sdata, $ndata);
    }
    public function submit_setting()
    {
        $settingNumber = $this->input->post('settingNumber');
        $status = $this->input->post('status');
        $showDescrIds = $this->input->post('show_descrids');
        $hiddenDescrIds = $this->input->post('hidden_descrids');

        if ($status === 'Wanted' && !empty($showDescrIds)) {
            $ids = explode(',', $showDescrIds);
            $updateField = 'show_descrids';
        } elseif ($status === 'Unwanted' && !empty($hiddenDescrIds)) {
            $ids = explode(',', $hiddenDescrIds);
            $updateField = 'hidden_descrids';
        } else {
            $ids = [];
            $updateField = null;
        }

        if ($updateField && !empty($ids)) {
            foreach ($ids as $fieldId) {
                // Check if record already exists
                // $this->db->where('id', $fieldId);
                $existsData = $this->Default_model->get_specific_columns(
                    'tbl_app_branch_settings_sub',
                    $updateField, // example: 'show_descrids'
                    ['id' => $fieldId]
                );

                $exists = (!empty($existsData) && isset($existsData[0])) ? $existsData[0] : null;

                if ($exists) {
                    // Get current value of the field (e.g., show_descrids)
                    $existing = $exists[$updateField];
                    $existingArray = $existing ? explode(',', $existing) : [];

                    // Append if not already present
                    if (!in_array($settingNumber, $existingArray)) {
                        $existingArray[] = $settingNumber;
                        $newValue = implode(',', array_unique($existingArray));

                        // Use model to update
                        $this->Default_model->update_record(
                            'tbl_app_branch_settings_sub',
                            [$updateField => $newValue],
                            ['id' => $fieldId]
                        );
                    }
                } else {
                    // Insert new row if no record exists
                    $data = [
                        'id' => $fieldId,
                        $updateField => $settingNumber
                    ];
                    $this->Default_model->insert_to_tb('tbl_app_branch_settings_sub', $data);
                }
            }

            $this->session->set_flashdata('success', 'Setting saved successfully.');
        } else {
            $this->session->set_flashdata('error', 'No valid fields were Selected.');
        }

        redirect('home/datasetting_form');
    }
    public function branch_form()
    {
        $rdata = array();
        $sdata = array();
        $ndata = array();
        $rdata['pagetitle'] = 'Data Settings In Branch Page';
        $this->view_function1('datasettings/branch', $rdata, $sdata, $ndata);
    }
    public function submit_branch()
    {
        $settingNumber = $this->input->post('settingNumber');
        $status = $this->input->post('status');
        $showDescrIds = $this->input->post('show_descrids');
        $hiddenDescrIds = $this->input->post('hidden_descrids');

        if ($status === 'Wanted' && !empty($showDescrIds)) {
            $ids = explode(',', $showDescrIds);
            $updateField = 'show_descrids';
        } elseif ($status === 'Unwanted' && !empty($hiddenDescrIds)) {
            $ids = explode(',', $hiddenDescrIds);
            $updateField = 'hidden_descrids';
        } else {
            $ids = [];
            $updateField = null;
        }

        if ($updateField && !empty($ids)) {
            foreach ($ids as $fieldId) {
                // Check if record already exists
                // $this->db->where('id', $fieldId);
                $existsData = $this->Default_model->get_specific_columns(
                    'tbl_app_branch_settings_sub',
                    $updateField, // example: 'show_descrids'
                    ['id' => $fieldId]
                );

                $exists = (!empty($existsData) && isset($existsData[0])) ? $existsData[0] : null;

                if ($exists) {
                    // Get current value of the field (e.g., show_descrids)
                    $existing = $exists[$updateField];
                    $existingArray = $existing ? explode(',', $existing) : [];

                    // Append if not already present
                    if (!in_array($settingNumber, $existingArray)) {
                        $existingArray[] = $settingNumber;
                        $newValue = implode(',', array_unique($existingArray));

                        // Use model to update
                        $this->Default_model->update_record(
                            'tbl_app_branch_settings_sub',
                            [$updateField => $newValue],
                            ['id' => $fieldId]
                        );
                    }
                } else {
                    // Insert new row if no record exists
                    $data = [
                        'id' => $fieldId,
                        $updateField => $settingNumber
                    ];
                    $this->Default_model->insert_to_tb('tbl_app_branch_settings_sub', $data);
                }
            }

            $this->session->set_flashdata('success', 'Setting saved successfully.');
        } else {
            $this->session->set_flashdata('error', 'No valid fields were Selected.');
        }

        redirect('home/branch_form');
    }
    public function costongoods()
    {
        $rdata = array();
        $sdata = array();
        $ndata = array();

        $rdata['pagetitle'] = 'View Cost on Goods Total';

        $from_date = $this->input->get('from_date');
        $to_date = $this->input->get('to_date');
        //$branch_id = $this->input->get('branch_id');
        $branch_id = 1;
        $where = [];
        if ($from_date && $to_date) {
            $where['date >='] = $from_date;
            $where['date <='] = $to_date;
        }
        if ($branch_id) {
            $where['branch_id'] = $branch_id;
        }

        $columns = 'SUM(opening_value) as opening_value, SUM(inflow_value) as inflow_value, SUM(outflow_value) as outflow_value, SUM(stock_value) as stock_value';
        $result = $this->Default_model->get_specific_columns('tbl_daily_stock', $columns, $where);


        $joins = [
            'tbl_purchase p' => 'p.id = pi.reference'
        ];

        $column = 'SUM(pi.taxable) as taxable_sum';

        $conditions = [
            'pi.item_id >' => 0,
            'pi.status' => 0,
            'p.status' => 0,
            'p.supd' => 1
        ];

        $range = [];
        if ($from_date && $to_date) {
            $range['p.inv_date >='] = $from_date;
            $range['p.inv_date <='] = $to_date;
        }
        if ($branch_id) {
            $conditions['p.branch_id'] = $branch_id;
        }

        $result_items = $this->Default_model->getJoinedDataPagination(
            'tbl_purchase_items pi',
            $joins,
            $column,
            $conditions,
            [], // like
            [], // or_like
            $range,
            'row' // returnType
        );
        $rdata['totals'] = $result[0] ?? [
            'opening_value' => 0,
            'inflow_value' => 0,
            'outflow_value' => 0,
            'stock_value' => 0,
        ];

        $rdata['totals']['taxable_sum'] = $result_items['taxable_sum'] ?? 0;
        //$rdata['taxable_sum'] = $result_items['taxable_sum'] ?? 0;
        // print_r($rdata);
        // exit();
        $this->view_function1('addon/costongoods', $rdata, $sdata, $ndata);
    }
    public function adv_report()
    {
        $rdata = [];
        $sdata = [];
        $ndata = [];
        $rdata['d74'] = new stdClass();
        $rdata['d75'] = new stdClass();
        $rdata['d74']->active = '20';
        $rdata['d75']->active = '30';
        $rdata['isocode'] = 'sar';
        $rdata['pagetitle'] = 'Advanced Sales Report';

        // Get filters
        $branch_id = $this->input->get('branch_id');
        $from_date = $this->input->get('from_date') ?? date('Y-m-01');
        $to_date = $this->input->get('to_date') ?? date('Y-m-d');
        $rdata['date_period'] = array(
            'from_date' => $from_date,
            'to_date' => $to_date,
        );
        $rdata['branch'] = $this->Default_model->get_specific_columns('tbl_branch_profile', 'id, name', ['id' => $branch_id]);
        $rdata['branches'] = $this->Default_model->get_specific_columns('tbl_branch_profile', 'id, name', '');

        /**
         * ==============================
         * TOP 10 BEST-SELLING PRODUCTS
         * ==============================
         */
        $joins_products = [
            'tbl_invoice i' => 'i.reference = ii.reference',
            'tbl_items it' => 'it.id = ii.item_id',
            'tbl_unitofmeasure u' => 'u.id = ii.unit_id',
        ];

        $columns_products = '
            it.name AS product_name,
            u.uqc AS unit,  
            SUM(ii.quantity) AS qty_sold,
            SUM(i.grand_total * i.ccrate) AS total_sales,
           
        ';

        $conditions_products = [
            'ii.item_id !=' => 0,
            'u.status' => 0,
            'u.showstatus' => 0
        ];
        if (!empty($branch_id)) {
            $conditions_products['i.branch_id'] = $branch_id;
        }
        $range_products = [
            'i.inv_date >=' => $from_date,
            'i.inv_date <=' => $to_date
        ];

        $groupBy_products = ['ii.item_id', 'it.name'];
        $orderBy_products = ['qty_sold' => 'DESC'];

        $rdata['top_products'] = $this->Default_model->getJoinedDataPagination(
            'tbl_invoice_items ii',
            $joins_products,
            $columns_products,
            $conditions_products,
            [],
            [],
            $range_products,
            'array',
            $groupBy_products,
            $orderBy_products,
            10,
            0
        );
        /**
         * ==============================
         * TOP 10 CUSTOMERS BY PROFIT
         * ==============================
         */
        $joins_customers = [
            'tbl_profile p' => 'p.id = i.profile_id'
        ];

        $columns_customers = '
            i.profile_id,
            p.name AS customer_name,
            COUNT(*) AS orders_count
        ';

        $conditions_customers = [
            'i.profile_id !=' => 0,
            ' i.status ' => 0,
        ];

        $range_customers = [
            'i.inv_date >=' => $from_date,
            'i.inv_date <=' => $to_date
        ];
        if (!empty($branch_id)) {
            $conditions_customers['i.branch_id'] = $branch_id;
        }
        $groupBy_customers = ['i.profile_id', 'p.name'];
        $orderBy_customers = ['orders_count' => 'DESC'];

        $rdata['top_customers'] = $this->Default_model->getJoinedDataPagination(
            'tbl_invoice i',
            $joins_customers,
            $columns_customers,
            $conditions_customers,
            [],
            [],
            $range_customers,
            'array',
            $groupBy_customers,
            $orderBy_customers,
            10,
            0
        );
        /**
         * ==============================
         * DAILY SALES TREND DATA
         * ==============================
         */
        $columns_daily_sales = '
            DATE(i.inv_date) AS sale_date,
            SUM(i.grand_total * i.ccrate)  AS total_sales
        ';

        $conditions_daily_sales = [
            'i.status' => 0
        ];

        $range_daily_sales = [
            'i.inv_date >=' => $from_date,
            'i.inv_date <=' => $to_date
        ];
        if (!empty($branch_id)) {
            $conditions_daily_sales['i.branch_id'] = $branch_id;
        }
        $groupBy_daily_sales = ['sale_date'];
        $orderBy_daily_sales = ['sale_date' => 'ASC'];

        $rdata['daily_sales_trend'] = $this->Default_model->getJoinedDataPagination(
            'tbl_invoice i',
            [],
            $columns_daily_sales,
            $conditions_daily_sales,
            [],
            [],
            $range_daily_sales,
            'array',
            $groupBy_daily_sales,
            $orderBy_daily_sales
        );

        /**
         * ==============================
         * SALES BY CATEGORY
         * ==============================
         */
        $joins_sales_category = [
            'tbl_invoice_items ii' => 'ii.reference = i.reference',
            'tbl_items it' => 'it.id = ii.item_id',
            'tbl_category c' => 'c.id = it.cat_id',
            'tbl_unitofmeasure u' => 'u.id = ii.unit_id'
        ];

        $columns_sales_category = '
            c.name AS category_name,
            u.uqc AS unit,  
            SUM(ii.quantity) AS units_sold,
            SUM(ii.total_price) AS total_sales,
            
        ';
        $conditions_sales_category = [
            'it.cat_id !=' => 0,
            'u.status' => 0,
            'u.showstatus' => 0
        ];

        $range_sales_category = [
            'i.inv_date >=' => $from_date,
            'i.inv_date <=' => $to_date
        ];
        if (!empty($branch_id)) {
            $range_sales_category['i.branch_id'] = $branch_id;
        }
        $groupBy_sales_category = ['it.cat_id', 'c.name'];
        $orderBy_sales_category = ['total_sales' => 'DESC'];

        $rdata['sales_by_category'] = $this->Default_model->getJoinedDataPagination(
            'tbl_invoice i',
            $joins_sales_category,
            $columns_sales_category,
            $conditions_sales_category,
            [],
            [],
            $range_sales_category,
            'array',
            $groupBy_sales_category,
            $orderBy_sales_category
        );
        /**
         * ==============================
         * LEAST SELLING PRODUCTS
         * ==============================
         */
        $joins_least_products = [
            'tbl_invoice i' => 'i.reference = ii.reference',
            'tbl_items it' => 'it.id = ii.item_id',
            'tbl_unitofmeasure u' => 'u.id = ii.unit_id'
        ];

        $columns_least_products = '
            it.name AS product_name,
            u.uqc AS unit,  
            SUM(ii.quantity) AS qty_sold,
            MAX(i.inv_date) AS last_sold_date
        ';

        $conditions_least_products = [
            'ii.item_id !=' => 0,
            'u.status' => 0,
            'u.showstatus' => 0
        ];

        $range_least_products = [
            'i.inv_date >=' => $from_date,
            'i.inv_date <=' => $to_date
        ];
        if (!empty($branch_id)) {
            $conditions_least_products['i.branch_id'] = $branch_id;
        }
        $groupBy_least_products = ['ii.item_id', 'it.name'];
        $orderBy_least_products = ['qty_sold' => 'ASC'];

        $rdata['least_selling_products'] = $this->Default_model->getJoinedDataPagination(
            'tbl_invoice_items ii',
            $joins_least_products,
            $columns_least_products,
            $conditions_least_products,
            [],
            [],
            $range_least_products,
            'array',
            $groupBy_least_products,
            $orderBy_least_products,
            10,
            0
        );
        /**
         * ==============================
         * TOP SALESPERSONS
         * ==============================
         */
        $joins_salespersons = [
            'tbl_profile e' => 'e.id = i.employee_id'
        ];

        $columns_salespersons = '
            i.employee_id,
            e.name AS employee_name,
            COUNT(i.id) AS orders_count,
            SUM(i.grand_total * i.ccrate) AS total_sales
        ';

        $conditions_salespersons = [
            'i.employee_id !=' => 0,
            'i.status' => 0
        ];

        $range_salespersons = [
            'i.inv_date >=' => $from_date,
            'i.inv_date <=' => $to_date
        ];
        if (!empty($branch_id)) {
            $conditions_salespersons['i.branch_id'] = $branch_id;
        }
        $groupBy_salespersons = ['i.employee_id', 'e.name'];
        $orderBy_salespersons = ['total_sales' => 'DESC'];

        $rdata['top_salespersons'] = $this->Default_model->getJoinedDataPagination(
            'tbl_invoice i',
            $joins_salespersons,
            $columns_salespersons,
            $conditions_salespersons,
            [],
            [],
            $range_salespersons,
            'array',
            $groupBy_salespersons,
            $orderBy_salespersons,
            10,
            0
        );
        if (isset($_GET['print'])) {
            $this->load->view('addon/advanced_report_pdf', $rdata, $sdata, $ndata);
        } else {
            $this->view_function1('addon/advanced_report', $rdata, $sdata, $ndata);
        }
    }
    public function items_modal()
    {
        $rdata = array();
        $sdata = array();
        $ndata = array();

        $rdata['pagetitle'] = 'Homepage';

        // No invoice_id filter -> load all invoices
        $columns = 'id, inv_date, inv_no, reference';
        $where = null; // fetch all
        $invoice_list = $this->Default_model->get_specific_columns('tbl_invoice', $columns, $where);

        // Format inv_date to 'Y-m-d'
        foreach ($invoice_list as &$inv) {
            if (!empty($inv['inv_date'])) {
                $inv['inv_date'] = date('d-M-Y', strtotime($inv['inv_date']));
            }
        }
        unset($inv);

        $rdata['invoice_list'] = $invoice_list;
        // Check if invoice_id is provided
        $invoice_id = $this->input->get('id'); // or from POST if needed

        if ($invoice_id) {
            // Define joins
            $joins = [
                'tbl_items' => 'tbl_items.id = tbl_invoice_items.item_id',
                'tbl_unitofmeasure' => 'tbl_unitofmeasure.id = tbl_invoice_items.unit_id'
            ];

            // Columns to select
            $columns = 'tbl_items.item_name, tbl_invoice_items.quantity, tbl_unitofmeasure.unit_name, tbl_invoice_items.price, tbl_invoice_items.total';

            // Where condition
            $conditions = ['tbl_invoice_items.invoice_id' => $invoice_id];

            // Fetch using your reusable model method
            $invoice_items = $this->Default_model->getJoinedDataPagination(
                'tbl_invoice_items',
                $joins,
                $columns,
                $conditions
            );

            // Pass to your view
            $rdata['invoice_items'] = $invoice_items;
        }


        $this->view_function1('addon/invoice_items', $rdata, $sdata, $ndata);
    }
    public function get_invoice_items()
    {
        $reference = $this->input->get('ref');

        if (!$reference) {
            echo json_encode(['status' => false, 'message' => 'Invalid invoice ID']);
            return;
        }

        // Define table joins (DO NOT include document_profit here)
        $joins = [
            'tbl_items it' => 'it.id = ii.item_id',
            'tbl_unitofmeasure um' => 'um.id = ii.unit_id',
        ];

        // Add required fields for mapping
        $columns = '
            ii.id as invoice_item_id,
            ii.item_id,
            ii.unit_id,
            it.name,
            ii.quantity,
            um.uqc as unit,
            ii.price,
            ii.total_price
        ';

        // Only filter by reference here — no dp.type!
        $conditions = ['ii.reference' => $reference];

        // Step 1: Get invoice items
        $invoice_items = $this->Default_model->getJoinedDataPagination(
            'tbl_invoice_items ii',
            $joins,
            $columns,
            $conditions
        );

        // Step 2: Get profit data per item
        foreach ($invoice_items as &$item) {
            $profit_conditions = [
                'tbl_document_profit.row_id' => $item['invoice_item_id'],
                // 'tbl_document_profit.item_id' => $item['item_id'],
                // 'tbl_document_profit.unit_id' => $item['unit_id'],
                'tbl_document_profit.type' => 0,
                'tbl_document_profit.status' => 0
            ];

            $item['profit_details'] = $this->Default_model->getJoinedDataPagination(
                'tbl_document_profit',
                [],
                'unit_price, quantity, unit_cost_on_goods, cost_on_goods, purchase_price, sales_price',
                $profit_conditions
            );
        }

        echo json_encode([
            'status' => true,
            'items' => $invoice_items
        ]);
    }
    public function invoicepreview()
    {
        $rdata = [];
        $sdata = [];
        $ndata = [];

        $rdata['pagetitle'] = 'Homepage';

        // Get ref from URL (if not present, start with 3040)
        $ref = $this->input->get('ref');

        if (empty($ref)) {
            $ref = 3040; // starting point
        }


        $this->view_function1('addon/invoice_preview', $rdata, $sdata, $ndata);
    }
    public function get_product_details()
    {
        $ref = $this->input->get('ref');

        if (!$ref) {
            echo json_encode(['status' => false, 'message' => 'Missing product reference']);
            return;
        }

        // Define table joins to get item name
        $joins = [
            'tbl_items it' => 'it.id = ii.item_id',
            'tbl_unitofmeasure u' => 'u.id = ii.unit_id AND ii.unit_id > 0',
        ];


        // Define the columns to fetch
        $columns = '
        ii.id as invoice_item_id,
        it.name as item_name,
        ii.quantity,
        u.uqc as unit,
        ii.price,
            ii.disc_perc,
            ii.disc_amt,
            ii.taxable as total,
            ii.vat_perc,
            ii.vat_amt,
            ii.total_price as item_total,
        ';

        // Fetch all items under the same reference
        $products = $this->Default_model->getJoinedDataPagination(
            'tbl_invoice_items ii',
            $joins,
            $columns,
            ['ii.reference' => $ref]
        );
        if (!empty($products)) {
            $structured_products = [];

            foreach ($products as $product) {
                $attributes = [];
                foreach ($product as $key => $value) {
                    $display_key = ucwords(str_replace('_', ' ', $key));

                    // Check if the value is numeric and format with 2 decimal places
                    if (is_numeric($value)) {
                        $attributes[$display_key] = number_format((float)$value, 2, '.', '');
                    } else {
                        $attributes[$display_key] = $value ?? '-';
                    }
                }
                $structured_products[] = $attributes;
            }

            echo json_encode([
                'status' => true,
                'product' => [
                    'name' => $products[0]['item_name'], // global name not used
                    'attributes' => $structured_products
                ]
            ]);
        } else {
            echo json_encode(['status' => false, 'message' => 'No product found']);
        }
    }
    public function invoice_110()
    {
        $rdata = array();
        $sdata = array();
        $ndata = array();
        $rdata['pagetitle'] = 'Homepage';
        $this->view_function1('addon/invoice_110', $rdata, $sdata, $ndata);
    }
    public function proforma_invoice_115()
    {
        $rdata = array();
        $sdata = array();
        $ndata = array();
        $rdata['pagetitle'] = 'Homepage';
        $this->view_function1('addon/template153', $rdata, $sdata, $ndata);
    }
    public function invoice_subProducts()
    {
        $rdata = array();
        $sdata = array();
        $ndata = array();
        $rdata['pagetitle'] = 'Homepage';
        $join = ['tbl_items i' => 'ii.item_id = i.id'];
        $columns = 'ii.id, i.name, ii.item_id, ii.unit_id, ii.reference, 
                    ii.quantity, ii.disc_amt, ii.price, ii.total_price, 
                    ii.taxable, ii.vat_amt, ii.vat_perc, ii.disc_perc';
        $where = ['ii.status' => 0];
        $rdata['product_list'] = $this->Default_model->getJoinedDataPagination(
            'tbl_invoice_items ii',  // main table with alias
            $join,                   // joins
            $columns,                // selected columns
            $where                   // where condition
        );

        $joins = ['tbl_unitofmeasure u' => 'u.id = i.unit_id'];
        $column = 'i.name, u.uqc as unit, i.id,i.item_code, u.id as unit_id';
        $condition = ['i.status' => 0];
        $rdata['products'] = $this->Default_model->getJoinedDataPagination(
            'tbl_items i',
            $joins,
            $column,
            $condition,
        );
        $this->view_function1('addon/joborder_products', $rdata, $sdata, $ndata);
    }
    public function savesub_products()
    {
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        log_message('debug', '[save_sub_products] Raw JSON: ' . $json);
        log_message('debug', '[save_sub_products] Parsed Data: ' . print_r($data, true));

        $main_product_id = $data['main_product_id'] ?? null;
        $subProducts     = $data['subProducts'] ?? [];
        $reference       = $data['reference'] ?? null;

        if (!$main_product_id || empty($subProducts)) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Missing main product ID or sub-product data.'
            ]);
            return;
        }

        $item_id = $item['productCode'] ?? null;
        if (!$item_id) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Missing product code.'
            ]);
            return;
        }

        $dataToSave = [
            'row_id'      => $main_product_id,
            'type'        => 5,
            'reference'   => $reference,
            'item_id'     => $item_id,
            'description' => trim($subProduct['description'] ?? ''),
            'quantity'    => floatval($subProduct['quantity'] ?? 0),
            'unit_id'     => trim($subProduct['unit'] ?? ''),
            'price'       => floatval($subProduct['price'] ?? 0),
            'total_price' => floatval($subProduct['total'] ?? 0),
        ];

        $item_db_id = $subProduct['id'] ?? null;

        if ($item_db_id) {
            // UPDATE specific row
            $where = ['id' => $item_db_id];
            if ($this->Default_model->update_record('tbl_outbound_items', $dataToSave, $where)) {
                echo json_encode([
                    'status' => 'success',
                    'message' => 'Sub-product updated successfully.'
                ]);
            } else {
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Failed to update sub-product.'
                ]);
            }
        } else {
            // INSERT new sub-product
            if ($this->Default_model->insert_to_tb('tbl_outbound_items', $dataToSave)) {
                echo json_encode([
                    'status' => 'success',
                    'message' => 'Sub-product added successfully.'
                ]);
            } else {
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Failed to add sub-product.'
                ]);
            }
        }
    }
    public function save_sub_products()
    {
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        $main_product_id = $data['main_product_id'] ?? null;
        $reference       = $data['reference'] ?? null;
        $subProducts     = $data['subProducts'] ?? [];

        if (!$main_product_id || empty($subProducts)) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Missing main product ID or sub-product data.'
            ]);
            return;
        }

        $results = [];
        foreach ($subProducts as $index => $subProduct) {
            log_message('debug', '[save_sub_products] Incoming subProduct: ' . print_r($subProduct, true));

            $item_id = $subProduct['productCode'] ?? null;
            if (is_null($item_id)) {
                $results[] = ['index' => $index, 'status' => 'error', 'message' => 'Missing product code.'];
                continue;
            }
            $dataToSave = [
                'row_id'      => $main_product_id,
                'type'        => 5,
                'reference'   => $reference,
                'item_id'     => $item_id,
                'description' => trim($subProduct['description'] ?? ''),
                'quantity'    => floatval($subProduct['quantity']),
                'unit_id'     => trim($subProduct['unit_id'] ?? ''),
                'price'       => floatval($subProduct['price']),
                'total_price' => isset($subProduct['total']) && $subProduct['total'] !== ''
                    ? floatval($subProduct['total'])
                    : floatval($subProduct['quantity'] ?? 0) * floatval($subProduct['price'] ?? 0),
            ];

            $item_db_id = isset($subProduct['id']) && is_numeric($subProduct['id']) && $subProduct['id'] > 0
                ? intval($subProduct['id'])
                : null;

            if ($item_db_id) {
                // Update
                $where = ['id' => $item_db_id];
                $result = $this->Default_model->update_record('tbl_outbound_items', $dataToSave, $where);
                $success = $result !== false;

                $results[] = [
                    'index'   => $index,
                    'status'  => $success ? 'success' : 'error',
                    'message' => $success ? 'Updated successfully.' : 'Failed to update.'
                ];
            } else {
                // Insert (check for duplicates)
                $duplicates = $this->Default_model->get_specific_columns(
                    'tbl_outbound_items',
                    'id',
                    [
                        'row_id'   => $dataToSave['row_id'],
                        'item_id'  => $dataToSave['item_id'],
                        'quantity' => $dataToSave['quantity'],
                        'price'    => $dataToSave['price'],
                    ]
                );

                if (!empty($duplicates)) {
                    $results[] = [
                        'index' => $index,
                        'status' => 'skipped',
                        'message' => 'Duplicate entry skipped.'
                    ];
                    continue;
                }

                $success = $this->Default_model->insert_to_tb('tbl_outbound_items', $dataToSave);

                $results[] = [
                    'index'   => $index,
                    'status'  => $success ? 'success' : 'error',
                    'message' => $success ? 'Inserted successfully.' : 'Failed to insert.'
                ];
            }
        }
        // ✅ NEW: Summarize result messages
        $inserted = 0;
        $updated = 0;
        $skipped = 0;
        $failed  = 0;

        $inserted = $updated = $skipped = $failed = 0;

        foreach ($results as $r) {
            if ($r['status'] === 'success' && strpos($r['message'], 'Inserted') !== false) {
                $inserted++;
            } elseif ($r['status'] === 'success' && strpos($r['message'], 'Updated') !== false) {
                $updated++;
            } elseif ($r['status'] === 'skipped') {
                $skipped++;
            } else {
                $failed++;
            }
        }

        $actions = [];
        if ($inserted > 0) $actions[] = 'inserted';
        if ($updated > 0)  $actions[] = 'updated';
        if ($skipped > 0)  $actions[] = 'skipped';
        if ($failed > 0)   $actions[] = 'failed';

        $overallMessage = !empty($actions)
            ? 'Sub Products ' . implode(' and ', $actions) . ' successfully.'
            : 'No changes made.';

        echo json_encode([
            'status'  => 'completed',
            'message' => $overallMessage,
            'results' => $results
        ]);
    }
    public function get_sub_products()
    {
        $product_id = $this->input->post('main_product_id');
        log_message('debug', '[get_sub_products] Received main_product_id: ' . $product_id);

        if (empty($product_id)) {
            log_message('error', '[get_sub_products] Missing product ID');
            echo json_encode(['status' => 'error', 'message' => 'Missing product ID']);
            return;
        }

        $join = [
            'tbl_invoice_items ii' => 'ii.id = obi.row_id',
            'tbl_items i' => 'i.id = obi.item_id',
            'tbl_unitofmeasure u' => 'u.id = obi.unit_id',
        ];

        $columns = 'obi.id as sub_id, obi.item_id, i.name as productTitle,
                obi.description, obi.quantity, obi.unit_id, u.uqc as unit, obi.price';

        $where = [
            'obi.row_id' => $product_id,
            'obi.status' => 0,
            'i.status' => 0,
            'ii.status' => 0,
        ];

        log_message('debug', '[get_sub_products] Join Conditions: ' . json_encode($join));
        log_message('debug', '[get_sub_products] Columns: ' . $columns);
        log_message('debug', '[get_sub_products] Where Conditions: ' . json_encode($where));

        $subProducts = $this->Default_model->getJoinedDataPagination(
            'tbl_outbound_items obi',
            $join,
            $columns,
            $where
        );
        log_message('debug', '[get_sub_products] Result subProduct: ' . print_r($subProducts, true));

        echo json_encode(['status' => 'success', 'data' => $subProducts]);
    }
    public function delete_sub_product()
    {
        log_message('debug', 'delete_sub_product() called');

        $sub_id = $this->input->post('sub_id');

        log_message('debug', 'Attempting to delete sub-product. Input sub_id: ' . $sub_id);

        if (empty($sub_id)) {
            log_message('error', 'Sub-product deletion failed: Missing sub_id.');
            return $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode([
                    'success' => false,
                    'message' => 'Sub-product ID is missing.'
                ]));
        }

        // Soft delete by setting status = 1
        $update_data = ['status' => 1];
        $deleted = $this->Default_model->update_record('tbl_outbound_items', $update_data, ['id' => $sub_id]);

        if ($deleted) {
            log_message('info', 'Sub-product ID ' . $sub_id . ' marked as inactive (status = 1).');
            return $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode([
                    'success' => true,
                    'message' => 'Sub-product deleted successfully.'
                ]));
        } else {
            log_message('error', 'Sub-product deletion failed for ID: ' . $sub_id);
            return $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode([
                    'success' => false,
                    'message' => 'Failed to delete sub-product.'
                ]));
        }
    }
    public function ledger_statement()
    {
        $rdata = [];
        $sdata = [];
        $ndata = [];
        $rdata['pagetitle'] = 'Homepage';

        $account_id = $this->input->get('id');

        // Filter inputs with defaults
        $from_date = $this->input->get('from_date') ?: date('Y-m-01');
        $to_date   = $this->input->get('to_date') ?: date('Y-m-d');

        if (empty($account_id)) {
            log_message('error', '[ledger_statement_excluding_acc] Missing account ID');
            echo json_encode(['status' => 'error', 'message' => 'Missing account ID']);
            return;
        }

        // --- Calculate Opening Balance ---
        // Take the closing balance of the day before the from_date
        $prev_date = date('Y-m-d', strtotime($from_date . ' -1 day'));

        // Get debit/credit totals before the period start
        $opening = $this->Default_model->getJoinedDataPagination(
            'tbl_transactions_sub ts',
            ['tbl_transactions_main tm' => 'tm.reference = ts.reference'],
            'SUM(ts.debit) AS total_debit, SUM(ts.credit) AS total_credit',
            ['ts.acc_id' => $account_id, 'ts.status' => 0],
            [],
            [],
            ['tm.date <=' => $prev_date], // all activity up to prev_date
            'row'
        );

        // Calculate opening balance
        $total_debit  = isset($opening['total_debit']) ? (float)$opening['total_debit'] : 0;
        $total_credit = isset($opening['total_credit']) ? (float)$opening['total_credit'] : 0;

        $opening_balance = $total_debit - $total_credit;

        // If there's no prior activity, this will naturally be zero
        $rdata['opening_balance'] = $opening_balance;

        $rdata['total_debit'] = $opening['total_debit'] ?? 0;
        $rdata['total_credit'] = $opening['total_credit'] ?? 0;
        // --- Fetch ledger entries within date range ---
        $join = [
            'tbl_transactions_main tm' => 'tm.reference = ts.reference',
            'tbl_account ac'           => 'ac.id = ts.acc_id',
        ];

        $columns = 'ts.reference, ts.acc_id, ac.name as acc_name,
         ts.description, ts.debit, ts.credit, tm.voucher_no, tm.date';

        $conditions = [
            'ts.status' => 0,
            'tm.status' => 0,
            'ac.status' => 0
        ];

        $range = [
            'tm.date >=' => $from_date,
            'tm.date <=' => $to_date
        ];

        $allData = $this->Default_model->getJoinedDataPagination(
            'tbl_transactions_sub ts',
            $join,
            $columns,
            $conditions,
            [],
            [],
            $range
        );

        if (empty($allData)) {
            $rdata['ledgers'] = [];
            $rdata['from_date'] = $from_date;
            $rdata['to_date'] = $to_date;
            $this->view_function1('addon/ledger_statement', $rdata, $sdata, $ndata);
            return;
        }

        // Step 1: Find references containing the target account_id
        $refs_with_acc = [];
        foreach ($allData as $row) {
            if ($row['acc_id'] == $account_id) {
                $refs_with_acc[] = $row['reference'];
            }
        }
        $refs_with_acc = array_unique($refs_with_acc);

        // Step 2: Filter out rows where acc_id = $account_id but keep rows with the same reference
        $filteredData = array_filter($allData, function ($row) use ($refs_with_acc, $account_id) {
            return in_array($row['reference'], $refs_with_acc) && $row['acc_id'] != $account_id;
        });

        // Step 3: Group by reference
        $grouped = [];
        foreach ($filteredData as $row) {
            $grouped[$row['reference']][] = $row;
        }
        $result = $this->Default_model->get_specific_columns(
            'tbl_account',
            'type, subtype',
            ['id' => $account_id, 'status' => 0]
        );

        if (!empty($result)) {
            $ledgerInfo = $result[0];

            // Type name
            switch ($ledgerInfo['type']) {
                case 1:
                    $ledgerInfo['type_name'] = 'Asset';
                    break;
                case 2:
                    $ledgerInfo['type_name'] = 'Income';
                    break;
                case 3:
                    $ledgerInfo['type_name'] = 'Expense';
                    break;
                default:
                    $ledgerInfo['type_name'] = $ledgerInfo['type'];
                    break;
            }

            // Subtype name
            switch ($ledgerInfo['subtype']) {
                case 2:
                    $ledgerInfo['subtype_name'] = 'Current Asset';
                    break;
                case 5:
                    $ledgerInfo['subtype_name'] = 'Income';
                    break;
                case 7:
                    $ledgerInfo['subtype_name'] = 'Expense';
                    break;
                default:
                    $ledgerInfo['subtype_name'] = $ledgerInfo['subtype'];
                    break;
            }
        } else {
            // No record found
            $ledgerInfo = [
                'type_name' => '',
                'subtype_name' => ''
            ];
        }

        $rdata['ledger_info'] = $ledgerInfo;

        $rdata['ledgers'] = $grouped;
        $rdata['from_date'] = $from_date;
        $rdata['to_date'] = $to_date;

        log_message('debug', '[ledger_statement_excluding_acc] Opening Balance: ' . $opening_balance);
        log_message('debug', '[ledger_statement_excluding_acc] Grouped Ledgers without acc_id ' . $account_id . ': ' . print_r($grouped, true));

        $this->view_function1('addon/ledger_statement', $rdata, $sdata, $ndata);
    }
    public function general_ledgers()
    {
        $rdata = [];
        $sdata = [];
        $ndata = [];
        $rdata['pagetitle'] = 'Homepage';

        // Get filters from GET request
        $branch_id = $this->input->get('branch_id');
        $category = trim($this->input->get('category')); // type or subtype
        $search = trim($this->input->get('search'));

        // Get accounts with filters
        $account_conditions = [];
        if (!empty($branch_id)) {
            $account_conditions['branch_id'] = $branch_id;
        }

        $accounts = $this->Default_model->get_specific_columns(
            'tbl_account',
            'id, name, type, subtype, branch_id',
            $account_conditions
        );

        // Filter category and search manually
        $filtered_accounts = [];
        foreach ($accounts as $acc) {
            $match_category = empty($category) || $acc['type'] == $category || $acc['subtype'] == $category;
            $match_search = empty($search) || stripos($acc['name'], $search) !== false;

            if ($match_category && $match_search) {
                $filtered_accounts[] = $acc;
            }
        }

        $rdata['accounts'] = [];

        foreach ($filtered_accounts as $acc) {
            // Get total debit/credit using model function
            $totals = $this->Default_model->getJoinedDataPagination(
                'tbl_transactions_sub tsub',
                ['tbl_transactions_main t' => 't.id = tsub.reference'],
                'SUM(tsub.debit) as total_debit, SUM(tsub.credit) as total_credit',
                ['tsub.acc_id' => $acc['id']], // exact match
                [],
                [],
                [],                     // no like, or_like, range
                'row'
            );

            $total_debit  = $totals['total_debit'] ?? 0;
            $total_credit = $totals['total_credit'] ?? 0;
            $balance = $total_debit - $total_credit;
            // Convert type to human-readable
            switch ($acc['type']) {
                case 1:
                    $type_name = 'Asset';
                    break;
                case 2:
                    $type_name = 'Income';
                    break;
                case 3:
                    $type_name = 'Expense';
                    break;
                default:
                    $type_name = $acc['type'];
                    break;
            }

            // Convert subtype to human-readable
            switch ($acc['subtype']) {
                case 2:
                    $subtype_name = 'Current Asset';
                    break;
                case 5:
                    $subtype_name = 'Income';
                    break;
                case 7:
                    $subtype_name = 'Expense';
                    break;
                default:
                    $subtype_name = $acc['subtype'];
                    break;
            }
            $rdata['accounts'][] = [
                'id'      => $acc['id'],
                'name'    => $acc['name'],
                'type'    => $type_name,
                'subtype' => $subtype_name,
                'debit'   => $total_debit,
                'credit'  => $total_credit,
                'balance' => $balance
            ];
        }

        // Pass filters to view
        $rdata['selected_branch_id'] = $branch_id;
        $rdata['selected_category'] = $category;
        $rdata['search'] = $search;

        $this->view_function1('addon/general_ledger', $rdata, $ndata, $sdata);
    }
    public function stock_summery()
    {
        $rdata = array();
        $sdata = array();
        $ndata = array();
        $rdata['pagetitle'] = 'Stock Summary Report';
        $rdata['bcdp'] =    '2';
        $rdata['stockData'] = array(
            array(
                'item_code'     => 'PI01001',
                'name'          => 'Bricks',
                'unitname'      => 'Kilo Grams',
                'opening_qty'   => -14,
                'inflow_qty'    => 0,
                'outflow_qty'   => 0,
                'closing_qty'   => -14,
                'opening_value' => 400,
                'inflow_value'  => 0,
                'outflow_value' => 0,
                'stock_value'   => 400
            ),
            array(
                'item_code'     => 'PI01002',
                'name'          => 'Note Book',
                'unitname'      => 'Kilo Grams',
                'opening_qty'   => -61,
                'inflow_qty'    => 0,
                'outflow_qty'   => 0,
                'closing_qty'   => -61,
                'opening_value' => 2957.33,
                'inflow_value'  => 0,
                'outflow_value' => 0,
                'stock_value'   => 2957.33
            ),
            array(
                'item_code'     => 'PI01003',
                'name'          => 'Choclates',
                'unitname'      => 'Kilo Grams',
                'opening_qty'   => -12,
                'inflow_qty'    => 0,
                'outflow_qty'   => 0,
                'closing_qty'   => -12,
                'opening_value' => 2647.33,
                'inflow_value'  => 0,
                'outflow_value' => 0,
                'stock_value'   => 2647.33
            ),
            array(
                'item_code'     => 'SERV01001',
                'name'          => 'Ethical Investments',
                'unitname'      => 'Bag',
                'opening_qty'   => -4,
                'inflow_qty'    => 0,
                'outflow_qty'   => 0,
                'closing_qty'   => -4,
                'opening_value' => -250,
                'inflow_value'  => 0,
                'outflow_value' => 0,
                'stock_value'   => -250
            ),
            // … add as many rows as needed …
        );
        if (isset($_GET['print'])) {
            $this->load->view('addon/stock_report', $rdata, $sdata, $ndata);
        } else {
            $this->view_function1('addon/stock_summery', $rdata, $sdata, $ndata);
        }
    }
    public function inbound_edit()
    {
        $rdata = array();
        $sdata = array();
        $ndata = array();
        $rdata['pagetitle'] = 'Edit Inbound';
        $where =  ['status' => 0];
        $rdata['products'] = $this->Default_model->get_specific_columns(
            'tbl_inbound_items',
            '',
            $where
        );
        $this->view_function1('addon/edit_inbound', $rdata, $sdata, $ndata);
    }
    public function get_item_details()
    {
        $id = $this->input->get('id'); // CI3 way

        $where = ['ib.id' => $id, 'ib.status' => 0, 'i.status' => 0, 'uom.status' => 0];

        $item = $this->Default_model->getJoinedDataPagination(
            'tbl_inbound_items ib',
            [
                'tbl_items i' => 'i.id = ib.item_id',
                'tbl_unit_conversions uc' => 'uc.item_id = ib.item_id',
                'tbl_unitofmeasure uom' => 'uom.id = ib.unit_id'
            ],
            'ib.*,uom.uqc,i.name,i.item_code, uc.secondary_unit',
            $where,
            [],
            [],
            [], // all activity up to prev_date
            'row'
        );
        // Log query result
        if ($item) {
            echo json_encode(['success' => true, 'item' => $item]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Item not found']);
        }
    }
    public function update_inbound_item()
    {
        $id = $this->input->post('id');  // inbound item ID

        // Collect fields from form
        $data = [
            'description'   => $this->input->post('description'),
            'price'         => $this->input->post('price'),
            'quantity'      => $this->input->post('quantity'),
            'free_qty'      => $this->input->post('free_qty'),
            'taxable'   => $this->input->post('total'),   // JS sends "total"
            'disc_perc'     => $this->input->post('disc_perc'),
            'disc_amt'      => $this->input->post('disc_amt'),
            'vat_perc'      => $this->input->post('vat_perc'),
            'vat_amt'       => $this->input->post('vat_amt'),
            'total_price'   => $this->input->post('final_total'),
            'unit_id'       => $this->input->post('unit_id'),
        ];

        $where = ['id' => $id];
        $success = $this->Default_model->update_record('tbl_inbound_items', $data, $where);

        if ($success) {
            echo json_encode(['success' => true, 'message' => 'Inbound item updated successfully.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to update inbound item.']);
        }
    }
    public function stockagingreport()
    {
        $rdata = $sdata = $ndata = [];
        $rdata['pagetitle'] = 'Stock Aging Report (By Product)';

        // Get filters from GET
        $branch    = $this->input->get('branch');
        $category  = trim($this->input->get('category'));
        $item      = $this->input->get('item');
        $warehouse = trim($this->input->get('warehouse'));

        // Fetch filter dropdown data
        $rdata['branches']   = $this->Default_model->get_specific_columns('tbl_branch_profile', 'id,name', ['status' => 0]);
        $rdata['warehouses'] = $this->Default_model->get_specific_columns('tbl_warehouse', 'id,name', ['status' => 0]);
        $rdata['items']      = $this->Default_model->get_specific_columns('tbl_items', 'id,name', ['status' => 0]);
        $rdata['categories'] = $this->Default_model->get_specific_columns('tbl_category', 'id,name', ['status' => 0, 'type' => 0]);

        // Joins
        $joins = [
            'tbl_items i'    => 'i.id = ds.item_id',
            'tbl_category c' => 'c.id = i.cat_id'
        ];

        // Columns for report
        $columns = "
            ds.item_id, i.item_code, i.name as item, i.part_number, c.name as category,
            SUM(ds.inflow_value) AS total_inflow_value,
            SUM(ds.outflow_value) AS total_outflow_value,
            SUM(ds.inflow_qty) AS total_in_qty,
            SUM(ds.outflow_qty) AS total_out_qty,
            SUM(CASE WHEN DATEDIFF(CURDATE(), ds.date) BETWEEN 0 AND 30 THEN ds.stock_value ELSE 0 END) AS stock_value_0_30,
            SUM(CASE WHEN DATEDIFF(CURDATE(), ds.date) BETWEEN 31 AND 60 THEN ds.stock_value ELSE 0 END) AS stock_value_31_60,
            SUM(CASE WHEN DATEDIFF(CURDATE(), ds.date) BETWEEN 61 AND 90 THEN ds.stock_value ELSE 0 END) AS stock_value_61_90,
            SUM(CASE WHEN DATEDIFF(CURDATE(), ds.date) >= 91 THEN ds.stock_value ELSE 0 END) AS stock_value_above_90
        ";
        // SUM(CASE WHEN DATEDIFF(CURDATE(), ds.date) BETWEEN 91 AND 720 THEN ds.stock_value ELSE 0 END) AS stock_value_361_720,
        $groupBy = 'ds.item_id';

        // Base conditions
        $conditions = [
            'i.status' => 0,
            'ds.status' => 0,
            'c.status' => 0,
            'c.type'   => 0
        ];

        // Apply filters
        if (!empty($branch))    $conditions['ds.branch_id'] = $branch;
        if (!empty($warehouse)) $conditions['ds.warehouse_id'] = $warehouse;
        if (!empty($category))  $conditions['i.cat_id'] = $category;
        if (!empty($item))      $conditions['ds.item_id'] = $item;

        // -------------------
        // ✅ Pagination Setup
        // -------------------
        $perPage = 10; // items per page
        $totalCountRes = $this->Default_model->getJoinedDataPagination(
            'tbl_daily_stock ds',
            $joins,
            "COUNT(DISTINCT ds.item_id) as total_rows",
            $conditions,
            [],
            [],
            [],
            'row'
        );
        $totalRows = $totalCountRes['total_rows'] ?? 0;
        $totalPages = ($totalRows > 0) ? ceil($totalRows / $perPage) : 1;

        // Get current page from query string (?page=)
        $page = $this->input->get('page') ? (int)$this->input->get('page') : 1;
        $page = max(1, $page); // prevent negative or zero
        $offset = ($page - 1) * $perPage;

        // -------------------
        // Fetch paginated report data
        // -------------------
        $rdata['reportData'] = $this->Default_model->getJoinedDataPagination(
            'tbl_daily_stock ds',
            $joins,
            $columns,
            $conditions,
            [],
            [],
            [],
            'array',
            $groupBy,
            [], // orderBy
            $perPage,
            $offset
        );

        // -------------------
        // Grand totals (not paginated)
        // -------------------
        $columnsGrand = "
            SUM(ds.inflow_value) AS total_inflow_value,
            SUM(ds.outflow_value) AS total_outflow_value,
            SUM(ds.inflow_qty) AS total_in_qty,
            SUM(ds.outflow_qty) AS total_out_qty,
            SUM(CASE WHEN DATEDIFF(CURDATE(), ds.date) BETWEEN 0 AND 30 THEN ds.stock_value ELSE 0 END) AS stock_value_0_30,
            SUM(CASE WHEN DATEDIFF(CURDATE(), ds.date) BETWEEN 31 AND 60 THEN ds.stock_value ELSE 0 END) AS stock_value_31_60,
            SUM(CASE WHEN DATEDIFF(CURDATE(), ds.date) BETWEEN 61 AND 90 THEN ds.stock_value ELSE 0 END) AS stock_value_61_90,
            SUM(CASE WHEN DATEDIFF(CURDATE(), ds.date) >= 91 THEN ds.stock_value ELSE 0 END) AS stock_value_above_90
        ";

        $totals = $this->Default_model->getJoinedDataPagination(
            'tbl_daily_stock ds',
            $joins,
            $columnsGrand,
            $conditions,
            [],
            [],
            [],
            'array'
        );
        $rdata['totals'] = $totals[0];
        $rdata['totals']['grand_total'] =
            $rdata['totals']['stock_value_0_30'] +
            $rdata['totals']['stock_value_31_60'] +
            $rdata['totals']['stock_value_61_90'] +
            // $rdata['totals']['stock_value_91_180'] +
            $rdata['totals']['stock_value_above_90'];

        // -------------------
        // Pass pagination info to view
        // -------------------
        $rdata['page'] = $page;
        $rdata['totalPages'] = $totalPages;

        $this->view_function1('addon/aging_report', $rdata, $sdata, $ndata);
    }
    public function get_items_by_category()
    {
        // Get category ID from AJAX POST
        $cat_id = $this->input->post('category_id');
        if (empty($cat_id)) {
            echo json_encode(['status' => false, 'message' => 'Category not selected', 'items' => []]);
            return;
        }

        // Fetch items for the selected category
        $items = $this->Default_model->get_specific_columns(
            'tbl_items',
            'id, name',
            ['cat_id' => $cat_id, 'status' => 0] // active items only
        );

        if (!empty($items)) {
            echo json_encode(['status' => true, 'items' => $items]);
        } else {
            echo json_encode(['status' => false, 'items' => [], 'message' => 'No items found']);
        }
    }
    public function productReport()
    {
        $rdata = array();
        $sdata = array();
        $ndata = array();
        $rdata['pagetitle'] = 'Product Report';

        // Set up parameters
        $table_name = 'tbl_invoice i';
        $columns = 'i.*, COUNT(o.id) AS no_of_products';
        $join = [
            'tbl_outbound_items o' => 'i.reference = o.reference'
        ];
        $where = [
            'i.status' => 0
        ];

        // Get date filters from GET
        $from_date = $this->input->get('from_date');
        $to_date = $this->input->get('to_date');

        // If date filters are present, add to $where clause
        if (!empty($from_date) && !empty($to_date)) {
            // CI Active Record needs where clause in array or custom string for BETWEEN
            $this->db->where("DATE(i.inv_date) BETWEEN '$from_date' AND '$to_date'");
        } elseif (!empty($from_date)) {
            $this->db->where("DATE(i.inv_date) >=", $from_date);
        } elseif (!empty($to_date)) {
            $this->db->where("DATE(i.inv_date) <=", $to_date);
        }

        $group_by = 'i.reference';

        // Get data
        $rdata['invoices'] = $this->Default_model->get_joined_columns($table_name, $columns, $join, $where, $group_by);

        // Load view
        $this->view_function1('addon/productreport.php', $rdata, $sdata, $ndata);
    }
    public function getInvoiceDetails()
    {
        $reference = $this->input->post('id');
        log_message('debug', 'Reference received: ' . print_r($reference, true));

        if (!$reference) {
            log_message('error', 'No reference ID provided in getInvoiceDetails()');
            echo json_encode(['error' => 'Reference not provided']);
            return;
        }

        // 1. Fetch invoice details
        log_message('debug', 'Fetching invoice details for reference: ' . $reference);
        $invoice = $this->Default_model->get_specific_columns(
            'tbl_invoice',
            '*',
            ['reference' => $reference, 'status' => 0]
        );
        log_message('debug', 'Invoice query result: ' . print_r($invoice, true));

        // 2. Fetch item details with JOIN to get `uqc`
        log_message('debug', 'Fetching outbound items for reference: ' . $reference);
        $table_name = 'tbl_outbound_items o';
        $columns = 'o.item_name, o.quantity, o.unit_id, u.uqc';
        $join = [
            'tbl_unitofmeasure u' => 'u.id = o.unit_id'
        ];
        $where = [
            'o.reference' => $reference,
            'o.status' => 0,
            'u.status' => 0
        ];
        $items = $this->Default_model->get_joined_columns($table_name, $columns, $join, $where);
        log_message('debug', 'Items query result: ' . print_r($items, true));

        // 3. Get count of products
        log_message('debug', 'Fetching product count for reference: ' . $reference);
        $count_result = $this->Default_model->get_specific_columns(
            'tbl_outbound_items',
            'COUNT(id) AS no_of_products',
            ['reference' => $reference, 'status' => 0]
        );
        log_message('debug', 'Product count result: ' . print_r($count_result, true));

        // 4. Merge and respond
        if (!empty($invoice)) {
            $invoice_data = $invoice[0];
            $invoice_data['items'] = $items;
            $invoice_data['no_of_products'] = $count_result[0]['no_of_products'];

            log_message('debug', 'Final invoice data to return: ' . print_r($invoice_data, true));
            echo json_encode($invoice_data);
        } else {
            log_message('error', 'No invoice found for reference: ' . $reference);
            echo json_encode(['error' => 'Invoice not found']);
        }
    }
    public function pdctReport()
    {
        $rdata = [];
        $sdata = [];
        $ndata = [];
        $rdata['pagetitle'] = 'Product Report';

        // Get filter dates from GET or default to current week
        $from_date = $this->input->get('from_date') ?? date('Y-m-d');
        $to_date   = $this->input->get('to_date')   ?? date('Y-m-d');


        $table_name = 'tbl_invoice_items ii';
        $columns = 'ii.id as inv_id,i.reference,i.inv_date,i.inv_no,i.grand_total,
         ii.quantity,ii.price,ii.item_name, ii.reference, ii.total_price';
        $join = [
            'tbl_invoice i' => 'ii.reference = i.reference'
        ];

        // Prepare base where condition
        $where = ['i.status' => 0];

        // Build date filter condition as raw SQL string
        if (!empty($from_date) && !empty($to_date)) {
            // Add raw condition in model param (assuming your model supports a custom where string)
            // We'll pass this as a string, separate from the array
            $where = "DATE(i.inv_date) BETWEEN '$from_date' AND '$to_date'";
        } elseif (!empty($from_date)) {
            $where = "DATE(i.inv_date) >= '$from_date'";
        } elseif (!empty($to_date)) {
            $where = "DATE(i.inv_date) <= '$to_date'";
        } else {
            $where = '';
        }

        $group_by = 'ii.id';

        $invoices = $this->Default_model->get_joined_columns($table_name, $columns, $join, $where, $group_by);

        // Get items for each invoice
        foreach ($invoices as &$inv) {
            $item_table = 'tbl_outbound_items o';
            $item_columns = 'it.name as item_name, o.quantity, u.uqc, o.price, o.total_price as grand_total,';
            $item_join = [
                'tbl_unitofmeasure u' => 'u.id = o.unit_id',
                'tbl_invoice_items i'        => 'i.id = o.row_id',
                'tbl_items it'        => 'it.id = o.item_id'
            ];
            $item_where = [
                'o.row_id'    => $inv['inv_id'],
                'o.status'    => 0,
                'u.status'    => 0
            ];

            $inv['items'] = $this->Default_model->get_joined_columns($item_table, $item_columns, $item_join, $item_where);
        }
        $rdata['invoices'] = $invoices;
        $this->view_function1('addon/joborderreport.php', $rdata, $sdata, $ndata);
    }
    public function deleteInvoice()
    {
        $invoice_id = $this->input->post('reference'); // Get invoice ID from AJAX request

        $updateData = [
            'status' => 1
        ];

        // Update tbl_invoice where id = $invoice_id
        $deleted = $this->Default_model->update_record('tbl_invoice', $updateData, ['id' => $invoice_id]);

        if ($deleted) {
            echo json_encode([
                "status" => "success",
                "message" => "Invoice deleted successfully"
            ]);
        } else {
            echo json_encode([
                "status" => "error",
                "message" => "Failed to delete invoice"
            ]);
        }
    }
    public function vansalereport()
    {
        $rdata = array();
        $sdata = array();
        $ndata = array();
        $rdata['pagetitle'] = 'Van sales report';

        // Joins
        $joins = [
            'tbl_warehouse w' => 'ds.warehouse_id = w.id',
            "(SELECT 
                warehouse_id, 
                DATE(inv_date) as inv_date,
                SUM(CASE WHEN paid > 0 AND mop = 1 THEN paid ELSE 0 END) as cash_sale,
                SUM(CASE WHEN paid = 0 THEN paid ELSE 0 END) as credit_sale,
                SUM(CASE WHEN mop = 2 AND paid > 0 THEN paid ELSE 0 END) as bank_collection
            FROM tbl_invoice
            WHERE status = 0
            GROUP BY warehouse_id, DATE(inv_date)
            ) i" => 'ds.warehouse_id = i.warehouse_id AND DATE(ds.date) = i.inv_date'
        ];

        // Columns
        $columns = '
            ds.warehouse_id,
            w.name as warehouse_name,
            ds.date,
            SUM(ds.opening_value) as loaded_stock,
            SUM(ds.stock_value) as balance_stock,
            COALESCE(SUM(i.cash_sale),0) as cash_sale,
            COALESCE(SUM(i.credit_sale),0) as credit_sale,
            COALESCE(SUM(i.bank_collection),0) as bank_collection,
            
        ';


        // Base Conditions
        $condition = [
            'ds.status' => 0,
            'w.status' => 0,
        ];

        // ✅ Apply Van filter if selected
        if (!empty($_GET['van'])) {
            $condition['ds.warehouse_id'] = $_GET['van'];
        }

        // Use the reusable function
        $rdata['vansales'] = $this->Default_model->getJoinedDataPagination(
            'tbl_daily_stock ds',   // main table
            $joins,                 // joins
            $columns,               // columns
            $condition,             // where conditions
            [],                     // like
            [],                     // or_like
            [],                     // range
            'array',                // return type
            ['ds.warehouse_id', 'ds.date'] // groupBy
        );

        // Dropdown lists
        $rdata['van'] = $this->Default_model->get_specific_columns('tbl_warehouse', 'id, name', ['status' => 0]);
        $rdata['branch'] = $this->Default_model->get_specific_columns('tbl_branch_profile', 'id, name', ['status' => 0]);
        $rdata['salesman'] = $this->Default_model->get_specific_columns('tbl_profile', 'id, name', ['status' => 0, 'type' => 1]);

        $this->view_function1('addon/vansalereport', $rdata, $sdata, $ndata);
    }
    public function viewvan($van_id = null)
    {
        $rdata = array();
        $sdata = array();
        $ndata = array();
        $rdata['pagetitle'] = '';
        if ($van_id === null) {
            // Redirect or show error if no ID provided
            redirect('addon/vansalereport');
            return;
        }

        // Dummy data - replace with actual model data fetching
        $rdata['van_sales_data'] = [
            'pagetitle' => 'Van Sales Report Dashboard',
            'van_id' => $van_id,
            'van_name' => "Van " . $van_id,
            'sales' => 5000,
            'expenses' => 450,
            'cash_in_hand' => 2000,
            'status' => 'Complete'
        ];
        $rdata['van'] = $this->Default_model->get_specific_columns('tbl_warehouse', 'id, name', ['status' => 0]);
        $rdata['branch'] = $this->Default_model->get_specific_columns('tbl_branch_profile', 'id, name', ['status' => 0]);
        $rdata['salesman'] = $this->Default_model->get_specific_columns('tbl_profile', 'id, name', ['status' => 0, 'type' => 2]);

        $this->view_function1('addon/viewvan', $rdata, $sdata, $ndata);
    }
    public function paymentlist()
    {
        $rdata = [];
        $rdata['pagetitle'] = 'Payments';

        // --- Filter Inputs ---
        $search = trim($this->input->get('search_key'));
        $start_date = $this->input->get('from') ?? date('Y-m-01');
        $end_date   = $this->input->get('to') ?? date('Y-m-d');
        $page       = $this->input->get('page') ? (int)$this->input->get('page') : 1;
        $limit      = 1; // vouchers per page
        $offset     = ($page - 1) * $limit;

        // --- Joins ---
        $joins = [
            'tbl_transactions_sub ts' => 'tm.reference = ts.reference',
            'tbl_branch_profile bp'   => 'tm.branch_id = bp.id'
        ];

        // --- Base Conditions ---
        $conditions = [
            'tm.status' => 0,
            'tm.type'   => 1,
            'ts.status' => 0
        ];

        // --- Date range ---
        if (!empty($start_date)) $conditions['tm.date >='] = $start_date;
        if (!empty($end_date))   $conditions['tm.date <='] = $end_date;

        // --- Step 1: Fetch all transaction rows ---
        $transactions = $this->Default_model->getJoinedDataPagination(
            'tbl_transactions_main tm',
            $joins,
            ['tm.voucher_no', 'tm.reference', 'ts.acc_name', 'ts.acc_id', 'ts.debit', 'ts.credit', 'tm.date', 'tm.description', 'bp.name as branch_name'],
            $conditions,
            'array',
            '',  // no group
            ['tm.date' => 'DESC']
        );

        // --- Step 2: Apply search filter if provided ---
        if (!empty($search)) {
            $filtered_transactions = [];
            foreach ($transactions as $row) {
                $amount = ((float)$row['debit'] > 0) ? (float)$row['debit'] : (float)$row['credit'];

                $match_customer = isset($row['acc_name']) && stripos($row['acc_name'], $search) !== false;
                $match_debit    = isset($row['debit']) && stripos((string)$row['debit'], $search) !== false;
                $match_credit   = isset($row['credit']) && stripos((string)$row['credit'], $search) !== false;
                $match_amount   = stripos((string)$amount, $search) !== false;
                $match_voucher  = isset($row['voucher_no']) && stripos($row['voucher_no'], $search) !== false;

                if ($match_customer || $match_debit || $match_credit || $match_amount || $match_voucher) {
                    $filtered_transactions[] = $row;
                }
            }

            $transactions = $filtered_transactions;
        }
        // --- Step 3: Group transactions by voucher ---
        $payments = [];
        foreach ($transactions as $row) {
            $voucher = $row['voucher_no'];

            if (!isset($payments[$voucher])) {
                $payments[$voucher] = [
                    'date'        => $row['date'],
                    'voucher'     => $row['voucher_no'],
                    'reference'   => $row['reference'],  // added reference
                    'branch'      => $row['branch_name'],
                    'description' => $row['description'],
                    'customer'    => [],
                    'mode'        => [],
                    'amount'      => [],
                    'acc_ids'     => [],                  // added acc_ids array
                ];
            }

            // Debit = Customer paid
            if ((float)$row['credit'] == 0 && (float)$row['debit'] > 0) {
                $payments[$voucher]['customer'][] = $row['acc_name'];
                $payments[$voucher]['amount'][]   = $row['debit'];
                $payments[$voucher]['acc_ids'][]  = $row['acc_id']; // store acc_id
            }

            // Credit = Payment mode
            if ((float)$row['debit'] == 0 && (float)$row['credit'] > 0) {
                $payments[$voucher]['mode'][]   = $row['acc_name'];
                $payments[$voucher]['amount'][] = $row['credit'];
            }
        }


        // --- Step 4: Pagination ---
        $payments = array_values($payments);
        $total_records = count($payments);
        $total_pages   = ceil($total_records / $limit);
        $payments      = array_slice($payments, $offset, $limit);

        // --- Step 5: Prepare data for view ---
        $rdata['payments']    = $payments;
        $rdata['page']        = $page;
        $rdata['total_pages'] = $total_pages;
        $rdata['limit']       = $limit;
        $rdata['search']      = $search;
        $rdata['from']        = $start_date;
        $rdata['to']          = $end_date;

        $this->view_function1('addon/payment_list', $rdata);
    }

    //addon Daniya Client - Nour Al watania maintenance est  
    //Job status visible on dashboard 2.Clicking job number shows its status: - Job received - Maintenance in progress - Spare parts repaired/replaced - Quotation given - Quotation approval status - Payment status (received/pending)
    public function create_job()
    {
        $rdata = array();
        $sdata = array();
        $ndata = array();
        $rdata['pagetitle'] = 'Create Job';
        $rdata['customers'] = $this->Default_model->get_specific_columns(
            'tbl_profile',
            'id, name',
            ['type' => 0, 'status' => 0]
        );
        $rdata['employees'] = $this->Default_model->get_specific_columns(
            'tbl_profile',
            'id, name',
            ['type' => 1, 'status' => 0]
        );
        $this->view_function1('addon/create_job', $rdata, $sdata, $ndata);
    }
    public function savejob()
    {
        $rdata = array();
        $sdata = array();
        $ndata = array();
        $rdata['pagetitle'] = 'Create Job';
        $customer_id        = $this->input->post('client_name');
        $received_date      = $this->input->post('received_date');
        $expected_date      = $this->input->post('expected_date');
        $last = $this->Default_model->getJoinedDataPagination(
            'tbl_maintenance_job',      // Main table
            [],                         // No joins
            'job_number',               // Only column we need
            [],                         // No WHERE
            'row',                      // Return single row
            '',                         // No GROUP BY
            ['id' => 'DESC'],           // ORDER BY id DESC (latest first)
            1,                          // LIMIT 1
            0                           // OFFSET
        );

        if (!empty($last) && !empty($last['job_number'])) {
            $lastNumber = (int) str_replace('JOB_', '', $last['job_number']);
            $nextNumber = $lastNumber + 1;
        } else {
            $nextNumber = 1;
        }

        // Format as JOB_00001
        $job_no = 'JOB_' . str_pad($nextNumber, 5, '0', STR_PAD_LEFT);
        //$job_no             = 'JOB_' . str_pad(rand(0, 99999), 5, '0', STR_PAD_LEFT);

        $data = [
            'customer'                  => $customer_id,
            'job_number'                => $job_no,
            'job_name'                  => $this->input->post('job_title'),
            'job_type'                  => $this->input->post('job_type'),
            'recieved_date'             => $received_date,
            'estimated_delivery_date'   => $expected_date,
            'job_status'                => 0,
            'description'               => $this->input->post('problem_desc'),
            'estimated_cost'            => $this->input->post('estimated_cost'),
            'remark'                   => $this->input->post('scope_of_work'),
            'technician_id'             => $this->input->post('assigned_to'),
            'status'                    => 0,
            'datetime'                  => date('Y-m-d H:i:s'),
            'ip_address'                =>  $this->input->ip_address(),
            'added_by'                  => $this->session->userdata('user_id') ?? 1,
        ];
        $inserted = $this->Default_model->insert_to_tb('tbl_maintenance_job', $data);
        $rdata['inserted'] = $inserted;
        if ($inserted) {
            redirect('home/list_jobs', $rdata, $sdata, $ndata);
        } else {
            redirect('home/create_job', $rdata, $sdata, $ndata);
        }
    }
    public function list_jobs()
    {
        $rdata = [];
        $sdata = [];
        $ndata = [];

        $rdata['pagetitle'] = 'List Jobs';

        // Pagination settings
        $perPage = 10;
        $start   = $this->input->get('per_page') ? (int)$this->input->get('per_page') : 0;

        $from_date = $this->input->get('start_date');
        $to_date   = $this->input->get('end_date');
        $client   = $this->input->get('client_name');
        $job   = $this->input->get('job_number');
        // Get total rows count
        $data = $this->Default_model->getJoinedDataPagination(
            'tbl_maintenance_job mj',
            [
                'tbl_profile p' => 'mj.customer = p.id',
                'tbl_profile e' => 'mj.technician_id = e.id'
            ],
            'mj.id',
            'mj.status = 0 AND (mj.job_type = 0 OR mj.job_type = 1)',
            'array'
        );

        $totalRows = is_array($data) ? count($data) : 0;

        $where = [
            'mj.status' => 0,
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

        // Get paginated jobs
        $rdata['jobs'] = $this->Default_model->getJoinedDataPagination(
            'tbl_maintenance_job mj',
            [
                'tbl_profile p' => 'mj.customer = p.id',
                'tbl_profile e' => 'mj.technician_id = e.id'
            ],
            'mj.id as job_id,mj.job_type, mj.job_name,mj.job_status,mj.job_number,mj.is_paid,mj.approval_status,mj.progress_status, p.name as client_name, e.name as assigned_to_name',
            $where,
            'array',
            '',
            ['mj.id' => 'DESC'],
            $perPage,
            $start
        );
        // Pass pagination variables to view
        $rdata['start']      = $start;
        $rdata['perPage']    = $perPage;
        $rdata['totalRows']  = $totalRows;
        $rdata['totalPages'] = ceil($totalRows / $perPage);

        // Keep all GET params except per_page
        $queryParams = $this->input->get();
        unset($queryParams['per_page']);

        $suffix = '';
        if (!empty($queryParams)) {
            $suffix = '&' . http_build_query($queryParams);
        }

        $rdata['suffix'] = $suffix;   // ✅ Use rdata, not $data

        $this->view_function1('addon/list_jobs', $rdata, $sdata, $ndata);
    }
    public function job_dashboard()
    {
        $rdata = [];
        $sdata = [];
        $ndata = [];
        $rdata['pagetitle'] = 'Job Dashboard';
        $data = $this->Default_model->getJoinedDataPagination(
            'tbl_maintenance_job mj',
            [
                'tbl_profile p' => 'mj.customer = p.id',
                'tbl_profile e' => 'mj.technician_id = e.id'
            ],
            'mj.id',
            'mj.status = 0 AND (mj.job_type = 0 OR mj.job_type = 1)',
            'array'
        );

        $totalRows = is_array($data) ? count($data) : 0;

        $perPage = 10;
        $start   = $this->input->get('per_page') ? (int)$this->input->get('per_page') : 0;
        $rdata['jobs'] = $this->Default_model->getJoinedDataPagination(
            'tbl_maintenance_job mj',
            [
                'tbl_profile p' => 'mj.customer = p.id',
                'tbl_profile e' => 'mj.technician_id = e.id'
            ],
            'mj.id, mj.job_number, mj.job_name, mj.job_status,mj.approval_status,mj.is_paid,mj.progress_status, p.name as client_name',
            "mj.status = 0 AND (mj.job_type = 0 OR mj.job_type = 1)",
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
        // Keep all GET params except per_page
        $queryParams = $this->input->get();
        unset($queryParams['per_page']);

        $suffix = '';
        if (!empty($queryParams)) {
            $suffix = '&' . http_build_query($queryParams);
        }

        $rdata['suffix'] = $suffix;   // ✅ Use rdata, not $data
        $this->view_function1('addon/job_dashboard', $rdata, $sdata, $ndata);
    }
    public function job_timeline($job_id)
    {
        $rdata = [];
        $sdata = [];
        $ndata = [];
        $rdata['pagetitle'] = 'Job Status Flow';

        $rdata['job'] = $this->Default_model->getJoinedDataPagination(
            'tbl_maintenance_job mj',
            [
                'tbl_profile p' => 'mj.customer = p.id',
                'tbl_profile e' => 'mj.technician_id = e.id'
            ],
            'mj.id, mj.job_status,mj.job_number,mj.job_name, mj.approval_status, mj.is_paid, mj.progress_status, p.name as client_name, e.name as assigned_to_name',
            ['mj.id' => $job_id],
            'row'
        );
        $this->view_function1('addon/job_timeline', $rdata, $sdata, $ndata,);
    }
    public function update_job_status()
    {
        if (ob_get_level() > 0) ob_clean();
        header('Content-Type: application/json');

        try {
            $job_id = $this->input->post('job_id');
            $requested_ui_id = (int)$this->input->post('job_status');
            // 1. Fetch current job state
            $current_job = $this->Default_model->get_specific_columns(
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
                $this->Default_model->update_record('tbl_maintenance_job', $update_data, ['id' => $job_id]);

                echo json_encode(["status" => "success", "message" => "Updated"]);
            } else {
                echo json_encode(["status" => "error", "message" => $msg]);
            }
        } catch (Exception $e) {
            echo json_encode(["status" => "error", "message" => $e->getMessage()]);
        }

        exit;
    }
    public function edit_job()
    {
        $rdata = array();
        $sdata = array();
        $ndata = array();
        $rdata['pagetitle'] = 'Update Job';
        $id = $this->input->get('id');
        $id = $this->input->get('id');
        if (empty($id)) {
            // Option 1: Redirect back with an error
            $this->session->set_flashdata('error', 'Job ID is required');
            redirect('home/list_jobs'); // change to your listing page
            return;

            // Option 2: If you want JSON response (e.g. called via AJAX)
            // echo json_encode(['success' => false, 'error' => 'Job ID is required']);
            // return;
        }
        $condition = [
            'mj.id' => $id,
            'mj.status' => 0,
            'mj.job_type IN (0,1)' => null
        ];
        $rdata['jobs'] = $this->Default_model->getJoinedDataPagination(
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
        $rdata['customers'] = $this->Default_model->get_specific_columns(
            'tbl_profile',
            'id, name',
            ['type' => 0, 'status' => 0]
        );
        $rdata['employees'] = $this->Default_model->get_specific_columns(
            'tbl_profile',
            'id, name',
            ['type' => 1, 'status' => 0]
        );
        $this->view_function1('addon/edit_job', $rdata, $sdata, $ndata);
    }
    public function updatejob()
    {
        $rdata = array();
        $sdata = array();
        $ndata = array();
        $rdata['pagetitle'] = 'Update Job';
        $id = $this->input->post('job_id');
        $customer_id        = $this->input->post('client_name');
        $received_date      = $this->input->post('received_date');
        $expected_date      = $this->input->post('expected_date');
        $data = [
            'customer'                  => $customer_id,
            'job_name'                  => $this->input->post('job_title'),
            'job_type'                  => $this->input->post('job_type'),
            'recieved_date'             => $received_date,
            'estimated_delivery_date'   => $expected_date,
            'description'               => $this->input->post('problem_desc'),
            'estimated_cost'            => $this->input->post('estimated_cost'),
            'remark'                   => $this->input->post('scope_of_work'),
            'technician_id'             => $this->input->post('assigned_to'),
        ];

        $inserted = $this->Default_model->update_record('tbl_maintenance_job', $data, ['id' => $id]);
        $rdata['inserted'] = $inserted;
        if ($inserted) {
            return redirect('home/list_jobs', $rdata, $sdata, $ndata);
        } else {
            return redirect('home/edit_job', $rdata, $sdata, $ndata);
        }
    }
    public function job_view()
    {
        $rdata = array();
        $sdata = array();
        $ndata = array();
        $rdata['pagetitle'] = 'View Job';
        $id = $this->input->get('id');
        $rdata['job'] = $this->Default_model->getJoinedDataPagination(
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
            mj.approval_status,
            mj.progress_status,
            mj.is_paid,
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
            "mj.status = 0 AND (mj.job_type = 0 OR mj.job_type = 1) AND mj.id = " . (int)$id,
            'row',
            '',
            [],
        );

        $rdata['customers'] = $this->Default_model->get_specific_columns(
            'tbl_profile',
            'id, name',
            ['type' => 1, 'profile_type' => 0, 'status' => 0]
        );
        $rdata['employees'] = $this->Default_model->get_specific_columns(
            'tbl_profile',
            'id, name',
            ['type' => 2, 'profile_type' => 1, 'status' => 0]
        );
        $this->view_function1('addon/job_view', $rdata, $sdata, $ndata);
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

        $updated = $this->Default_model->update_record(
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


    public function task_dashboard()
    {
        $rdata = [];
        $rdata['pagetitle'] = 'Dashboard';

        // 1. Count All Tasks
        $rdata['count_all'] = count($this->Default_model->get_specific_columns('tbl_tasks', 'id', ['status' => 0]));

        // 2. Count Pending (task_status = 0)
        $rdata['count_pending'] = count($this->Default_model->get_specific_columns(
            'tbl_tasks',
            'id',
            ['task_status' => 0, 'status' => 0]
        ));
        // 4. Count Completed (task_status = 2)
        $rdata['count_completed'] = count($this->Default_model->get_specific_columns(
            'tbl_tasks',
            'id',
            ['task_status' => 1, 'status' => 0]
        ));

        // 5. Count Urgent (Due within next 24 hours, and still pending)
        // 1. Get today's date and the date 24 hours from now
        $today = date('Y-m-d');
        $next_24h = date('Y-m-d', strtotime('+1 day'));

        // 2. Prepare Conditions
        // We want tasks that are:
        // - Not completed (status 0 or 1)
        // - Due date is LESS THAN OR EQUAL TO tomorrow (includes today and overdue)
        $urgent_conditions = [
            'task_status'    => 0,            // Not completed
            'due_date <='    => $next_24h,    // Everything due from now until tomorrow night
            'status'         => 0             // Assuming 0 is 'Active' record in your tbl_tasks
        ];

        $rdata['count_urgent'] = count($this->Default_model->get_specific_columns(
            'tbl_tasks',
            'id',
            $urgent_conditions
        ));
        // Pass data to the view
        $this->load->view('addon/task_dashboard', $rdata);
    }
    public function create_task()
    {
        // This simply loads the premium creation page
        $this->load->view('addon/add_task');
    }
    public function save_task()
    {
        $rdata = [];
        $sdata = [];
        $ndata = [];
        $rdata['pagetitle'] = 'Add Task';
        $due_date = $this->input->post('due_date');
        $today = date('Y-m-d');

        // Validation Check
        if ($due_date < $today) {
            // Option A: Redirect back with an error (if you use flashdata)
            // $this->session->set_flashdata('error', 'Past dates are not allowed.');
            redirect('home/create_task');
            return;
        }
        $data = [
            'task'     => $this->input->post('task_name'),
            'description'   => $this->input->post('description'),
            'due_date'      => $due_date,
            'priority'      => $this->input->post('priority'),
            'status'        => 0, // 0 = Pending
            'added_by'    => $this->session->userdata('user_id') ?? 1,
            'ip_address'  => $this->input->ip_address() ?? 1,
            'date_time'    => date('Y-m-d H:i:s'),
        ];
        $inserted = $this->Default_model->insert_to_tb('tbl_tasks', $data);
        $rdata['inserted'] = $inserted;
        if ($inserted) {
            return redirect('home/tasks');
        } else {
            return redirect('home/task_dashboard');
        }
    }
    public function tasks()
    {
        $rdata = [];
        $rdata['pagetitle'] = 'Task Inventory';

        // 1. Capture Form Inputs
        $search   = trim($this->input->get('search'));
        $due_date = trim($this->input->get('due_date'));
        $status   = $this->input->get('status') ?? 0;   // Don't default here, handle below
        $priority = $this->input->get('priority');
        $sort     = $this->input->get('sort') ?? 'due_date';

        // 2. Initial page load logic: Default to Pending (0)
        if ($status === null) {
            $status = 0;
        }

        // 3. Prepare Conditions Array
        $conditions = [];

        // Always filter for Active records (status 0 in your table schema)
        $conditions['status'] = 0;

        // Status Filter: Only apply if NOT 'all'
        if ($status !== 'all' && $status !== '') {
            $conditions['task_status'] = (int)$status;
        }

        // Priority Filter: Only apply if NOT 'all'
        if ($priority !== 'all' && $priority !== null && $priority !== '') {
            $conditions['priority'] = (int)$priority;
        }

        // Date Filter
        if (!empty($due_date)) {
            $conditions['due_date'] = $due_date;
        }

        // Search Logic
        if (!empty($search)) {
            // Ensure column name matches 'task' as per your schema
            $conditions["(task LIKE '%$search%' OR description LIKE '%$search%')"] = NULL;
        }

        // 4. Handle Dynamic Sorting
        $orderBy = [];
        if ($sort === 'task') {
            $orderBy = ['task' => 'ASC'];
        } elseif ($sort === 'priority') {
            $orderBy = ['priority' => 'DESC']; // High (2) to Low (0)
        } else {
            $orderBy = ['due_date' => 'ASC'];
        }

        // 5. Fetch Data
        $rdata['tasks'] = $this->Default_model->getJoinedDataPagination(
            'tbl_tasks',
            [],
            '*',
            $conditions,
            'array',
            '',
            $orderBy
        );

        // 6. Pass data back to view
        $rdata['filters'] = [
            'search'   => $search,
            'due_date' => $due_date,
            'status'   => $status,
            'priority' => $priority,
            'sort'     => $sort
        ];

        $this->load->view('addon/task_list', $rdata);
    }
    public function update_task_status()
    {
        // Get the data
        $id = $this->input->post('id');
        $status = $this->input->post('status');

        // Force it to return JSON even if things go wrong
        header('Content-Type: application/json');

        try {
            $result = $this->Default_model->update_record('tbl_tasks', ['task_status' => $status], ['id' => $id]);
            echo json_encode(['success' => $result]);
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'error' => $e->getMessage()]);
        }
    }
    //UI of Inventory Report


    public function inventoryreport()
    {
        $rdata = array();
        $sdata = array();
        $ndata = array();
        $rdata['pagetitle'] = 'Inventory Report';
        $this->view_function1('addon/inventoryreport', $rdata, $sdata, $ndata);
    }

    public function stock_agingreport()
    {
        $rdata = array();
        $sdata = array();
        $ndata = array();
        $rdata['pagetitle'] = 'Stock Aging Report';
        $this->view_function1('addon/stockagingreport', $rdata, $sdata, $ndata);
    }













    //old non working code
    //     public function paymentlist()
    // {
    //     $rdata = [];
    //     $sdata = [];
    //     $ndata = [];
    //     $rdata['pagetitle'] = 'Payments';

    //     // Get filter inputs
    //     $search = $this->input->get('search_key');
    //     $start_date = $this->input->get('from');
    //     $end_date = $this->input->get('to');

    //     // Basic joins and columns
    //     $joins = [
    //         'tbl_transactions_sub ts' => 'tm.reference = ts.reference',
    //         'tbl_branch_profile bp' => 'tm.branch_id = bp.id'
    //     ];

    //     $columns = [
    //         'tm.date',
    //         'tm.voucher_no',
    //         'tm.description',
    //         'ts.acc_name',
    //         'ts.debit',
    //         'ts.credit',
    //         'bp.name as branch_name'
    //     ];

    //     $conditions = [
    //         'tm.status' => 0,
    //         'tm.type' => 1,
    //         'ts.status' => 0,
    //     ];

    //     $like = [];
    //     $range = [];

    //     if (!empty($search)) {
    //         $like['title'] = $search;
    //     }
    //     if (!empty($start_date)) {
    //         $range['date_time >='] = $start_date . ' 00:00:00';
    //     }
    //     if (!empty($end_date)) {
    //         $range['date_time <='] = $end_date . ' 23:59:59';
    //     }

    //     $orderBy = ['date_time' => 'DESC'];

    //     // Fetch data
    //     $transactions = $this->Default_model->getJoinedDataPagination(
    //         'tbl_transactions_main tm',
    //         $joins,
    //         $columns,
    //         $conditions,
    //         $like,
    //         [],
    //         $range,
    //         'array',
    //         '',
    //         $orderBy,
    //     );

    //     // Prepare payments array
    //     $payments = [];

    //     foreach ($transactions as $row) {
    //         $voucher = $row['voucher_no'];

    //         // Initialize voucher entry if not exists
    //         if (!isset($payments[$voucher])) {
    //             $payments[$voucher] = [
    //                 'date' => $row['date'],
    //                 'voucher' => $row['voucher_no'],
    //                 'branch' => $row['branch_name'],
    //                 'description' => $row['description'],
    //                 'customer' => [],
    //                 'mode' => [],
    //                 'amount' => [],
    //             ];
    //         }

    //         // If credit = 0 → Customer entry
    //         if ((float)$row['credit'] == 0 && (float)$row['debit'] > 0) {
    //             $payments[$voucher]['customer'][] = $row['acc_name'];
    //             $payments[$voucher]['amount'][] = $row['debit'];
    //         }

    //         // If debit = 0 → Mode entry
    //         if ((float)$row['debit'] == 0 && (float)$row['credit'] > 0) {
    //             $payments[$voucher]['mode'][] = $row['acc_name'];
    //             // Also push same amount (to match customer)
    //             $payments[$voucher]['amount'][] = $row['credit'];
    //         }
    //     }

    //     // Reindex array
    //     $rdata['payments'] = array_values($payments);

    //     $this->view_function1('addon/payment_list', $rdata, $sdata, $ndata);
    // }

    //correct working code 


    // public function paymentlist()
    // {
    //     $rdata = [];
    //     $rdata['pagetitle'] = 'Payments';

    //     // --- Filter Inputs ---
    //     $search = trim($this->input->get('search_key'));
    //     $start_date = $this->input->get('from');
    //     $end_date = $this->input->get('to');
    //     $page = $this->input->get('page') ? (int)$this->input->get('page') : 1;
    //     $limit = 10;
    //     $offset = ($page - 1) * $limit;

    //     // --- Joins ---
    //     $joins = [
    //         'tbl_transactions_sub ts' => 'tm.reference = ts.reference',
    //         'tbl_branch_profile bp'   => 'tm.branch_id = bp.id'
    //     ];

    //     // --- Base Conditions ---
    //     $conditions = [
    //         'tm.status' => 0,
    //         'tm.type'   => 1,
    //         'ts.status' => 0,
    //     ];

    //     // --- LIKE & OR_LIKE ---
    //     $or_like = [];
    //     if (!empty($search)) {
    //         $or_like = [
    //             'tm.voucher_no'   => $search,
    //             'tm.description'  => $search,
    //             'ts.acc_name'     => $search,
    //             'ts.debit'        => $search,
    //             'ts.credit'       => $search
    //         ];
    //     }

    //     // --- Date Range ---
    //     $range = [];
    //     if (!empty($start_date)) $range['tm.date >='] = $start_date;
    //     if (!empty($end_date))   $range['tm.date <='] = $end_date;

    //     // --- Count total unique vouchers ---
    //     $total_records = $this->Default_model->countJoinedData(
    //         'tbl_transactions_main tm',
    //         $joins,
    //         $conditions,
    //         [],          // exact match LIKE not used for counting
    //         $or_like,
    //         $range,
    //         'tm.voucher_no' // group by voucher
    //     );
    //     $total_pages = ceil($total_records / $limit);

    //     // --- Fetch voucher list for current page ---
    //     $voucher_rows = $this->Default_model->getJoinedDataPagination(
    //         'tbl_transactions_main tm',
    //         $joins, // include the join here
    //         'tm.voucher_no',
    //         $conditions,
    //         [],
    //         $or_like,
    //         $range,
    //         'array',
    //         'tm.voucher_no',
    //         ['tm.date' => 'DESC'],
    //         $limit,
    //         $offset
    //     );

    //     $voucher_nos = array_column($voucher_rows, 'voucher_no');
    //     if (empty($voucher_nos)) $voucher_nos = ['']; // prevent empty IN query

    //     // --- Fetch all transaction sub-rows for these vouchers ---
    //     $transactions = $this->Default_model->getJoinedDataPagination(
    //         'tbl_transactions_main tm',
    //         $joins,
    //         [
    //             'tm.date',
    //             'tm.voucher_no',
    //             'tm.description',
    //             'ts.acc_name',
    //             'ts.debit',
    //             'ts.credit',
    //             'bp.name as branch_name'
    //         ],
    //         array_merge($conditions, ['tm.voucher_no IN' => $voucher_nos]),
    //         [],
    //         [],
    //         $range,
    //         'array',
    //         '',
    //         ['tm.date' => 'DESC']
    //     );

    //     // --- Build payments array grouped by voucher ---
    //     $payments = [];
    //     foreach ($transactions as $row) {
    //         $voucher = $row['voucher_no'];
    //         if (!isset($payments[$voucher])) {
    //             $payments[$voucher] = [
    //                 'date'        => $row['date'],
    //                 'voucher'     => $row['voucher_no'],
    //                 'branch'      => $row['branch_name'],
    //                 'description' => $row['description'],
    //                 'customer'    => [],
    //                 'mode'        => [],
    //                 'amount'      => [],
    //             ];
    //         }

    //         if ((float)$row['debit'] > 0 && (float)$row['credit'] == 0) {
    //             $payments[$voucher]['customer'][] = $row['acc_name'];
    //             $payments[$voucher]['amount'][]   = $row['debit'];
    //         }

    //         if ((float)$row['credit'] > 0 && (float)$row['debit'] == 0) {
    //             $payments[$voucher]['mode'][]   = $row['acc_name'];
    //             $payments[$voucher]['amount'][] = $row['credit'];
    //         }
    //     }

    //     $rdata['payments']    = array_values($payments);
    //     $rdata['page']        = $page;
    //     $rdata['total_pages'] = $total_pages;
    //     $rdata['limit']       = $limit;
    //     $rdata['search']      = $search;
    //     $rdata['from']        = $start_date;
    //     $rdata['to']          = $end_date;

    //     $this->view_function1('addon/payment_list', $rdata);
    // }












    // public function aging_report()
    // {
    //     $rdata = array();
    //     $sdata = array();
    //     $ndata = array();
    //     $rdata['pagetitle'] = 'Stock Aging Report (By Product)';
    //     $branch = $this->input->get('branch_id');
    //     $category = trim($this->input->get('cat_id'));
    //     $item = $this->input->get('item_id');
    //     $warehouse = trim($this->input->get('warehouse_id'));
    //     $rdata['branches'] = $this->Default_model->get_specific_columns('tbl_branch_profile', 'id,name', ['status' => 0]);
    //     $rdata['warehouses'] = $this->Default_model->get_specific_columns('tbl_warehouse', 'id,name', ['status' => 0]);
    //     $rdata['items'] = $this->Default_model->get_specific_columns('tbl_items', 'id,name', ['status' => 0]);
    //     $rdata['categories'] = $this->Default_model->get_specific_columns('tbl_category', 'id,name', ['status' => 0, 'type' => 0]);
    //     // In your controller
    //     $joins = [
    //         'tbl_items i' => 'i.id = ds.item_id',
    //         'tbl_category c' => 'c.id = i.cat_id'
    //     ];

    //     $columns = "
    //         ds.item_id, i.item_code, i.name as item, i.part_number, c.name as category,
    //         SUM(ds.inflow_value) AS total_inflow_value,
    //         SUM(ds.outflow_value) AS total_outflow_value,
    //         SUM(ds.inflow_qty) AS total_in_qty,
    //         SUM(ds.outflow_qty) AS total_out_qty,
    //         SUM(CASE WHEN DATEDIFF(CURDATE(), ds.date) BETWEEN 0 AND 90 THEN ds.stock_value ELSE 0 END) AS stock_value_0_90,
    //         SUM(CASE WHEN DATEDIFF(CURDATE(), ds.date) BETWEEN 91 AND 180 THEN ds.stock_value ELSE 0 END) AS stock_value_91_180,
    //         SUM(CASE WHEN DATEDIFF(CURDATE(), ds.date) BETWEEN 181 AND 360 THEN ds.stock_value ELSE 0 END) AS stock_value_181_360,
    //         SUM(CASE WHEN DATEDIFF(CURDATE(), ds.date) BETWEEN 361 AND 720 THEN ds.stock_value ELSE 0 END) AS stock_value_361_720
    //     ";

    //     $groupBy = 'ds.item_id';


    //     $conditions = [];
    //     $conditions = [
    //         'i.status' => 0,
    //         'ds.status' => 0,
    //         'c.status' => 0,
    //         'c.type'   => 0
    //     ];

    //     // Apply filters if selected
    //     if (!empty($branch)) {
    //         $conditions['ds.branch_id'] = $branch;
    //     }
    //     if (!empty($warehouse)) {
    //         $conditions['ds.warehouse_id'] = $warehouse;
    //     }
    //     if (!empty($category)) {
    //         $conditions['i.cat_id'] = $category;
    //     }
    //     if (!empty($item)) {
    //         $conditions['ds.item_id'] = $item;
    //     }

    //     $rdata['reportData'] = $this->Default_model->getJoinedDataPagination(
    //         'tbl_daily_stock ds',
    //         $joins,
    //         $columns,
    //         $conditions,
    //         [], // like
    //         [], // or_like
    //         [], // range
    //         'array',
    //         $groupBy
    //     );
    //     // Grand totals for all items
    //     $columnsGrand = "
    //         SUM(ds.inflow_value) AS total_inflow_value,
    //         SUM(ds.outflow_value) AS total_outflow_value,
    //         SUM(ds.inflow_qty) AS total_in_qty,
    //         SUM(ds.outflow_qty) AS total_out_qty,
    //         SUM(CASE WHEN DATEDIFF(CURDATE(), ds.date) BETWEEN 0 AND 90  THEN ds.stock_value ELSE 0 END) AS stock_value_0_90,
    //         SUM(CASE WHEN DATEDIFF(CURDATE(), ds.date) BETWEEN 91 AND 180 THEN ds.stock_value ELSE 0 END) AS stock_value_91_180,
    //         SUM(CASE WHEN DATEDIFF(CURDATE(), ds.date) BETWEEN 181 AND 360 THEN ds.stock_value ELSE 0 END) AS stock_value_181_360,
    //         SUM(CASE WHEN DATEDIFF(CURDATE(), ds.date) BETWEEN 361 AND 720 THEN ds.stock_value ELSE 0 END) AS stock_value_361_720
    //     ";

    //     // use same joins as before
    //     $joinsGrand = [
    //         'tbl_items i'    => 'i.id = ds.item_id',
    //         'tbl_category c' => 'c.id = i.cat_id'
    //     ];

    //     // fetch with joins
    //     $rdata['totals'] = $this->Default_model->getJoinedDataPagination(
    //         'tbl_daily_stock ds',
    //         $joinsGrand,
    //         $columnsGrand,
    //         $conditions,   // ✅ keep same filters
    //         [],
    //         [],
    //         [],    // like, or_like, range
    //         'array'
    //     );

    //     // since it's aggregated, take first row
    //     $rdata['totals'] = $rdata['totals'][0];

    //     // Optional: Grand total sum
    //     $rdata['totals']['grand_total'] =
    //         $rdata['totals']['stock_value_0_90'] +
    //         $rdata['totals']['stock_value_91_180'] +
    //         $rdata['totals']['stock_value_181_360'] +
    //         $rdata['totals']['stock_value_361_720'];

    //     // print_r($rdata);
    //     // exit();
    //     $this->view_function1('addon/aging_report', $rdata, $sdata, $ndata);
    // }
    // public function aging_report()
    // {
    //     $rdata = array();
    //     $sdata = array();
    //     $ndata = array();
    //     $rdata['pagetitle'] = 'Stock Aging Report (By Product)';

    //     // Get filters from GET
    //     $branch    = $this->input->get('branch');
    //     $category  = trim($this->input->get('category'));
    //     $item      = $this->input->get('item');
    //     $warehouse = trim($this->input->get('warehouse'));

    //     $rdata['branches'] = $this->Default_model->get_specific_columns('tbl_branch_profile', 'id,name', ['status' => 0]);
    //     $rdata['warehouses'] = $this->Default_model->get_specific_columns('tbl_warehouse', 'id,name', ['status' => 0]);
    //     $rdata['items'] = $this->Default_model->get_specific_columns('tbl_items', 'id,name', ['status' => 0]);
    //     $rdata['categories'] = $this->Default_model->get_specific_columns('tbl_category', 'id,name', ['status' => 0, 'type' => 0]);

    //     // Joins
    //     $joins = [
    //         'tbl_items i' => 'i.id = ds.item_id',
    //         'tbl_category c' => 'c.id = i.cat_id'
    //     ];

    //     // Columns
    //     $columns = "
    //         ds.item_id, i.item_code, i.name as item, i.part_number, c.name as category,
    //         SUM(ds.inflow_value) AS total_inflow_value,
    //         SUM(ds.outflow_value) AS total_outflow_value,
    //         SUM(ds.inflow_qty) AS total_in_qty,
    //         SUM(ds.outflow_qty) AS total_out_qty,
    //         SUM(CASE WHEN DATEDIFF(CURDATE(), ds.date) BETWEEN 0 AND 90 THEN ds.stock_value ELSE 0 END) AS stock_value_0_90,
    //         SUM(CASE WHEN DATEDIFF(CURDATE(), ds.date) BETWEEN 91 AND 180 THEN ds.stock_value ELSE 0 END) AS stock_value_91_180,
    //         SUM(CASE WHEN DATEDIFF(CURDATE(), ds.date) BETWEEN 181 AND 360 THEN ds.stock_value ELSE 0 END) AS stock_value_181_360,
    //         SUM(CASE WHEN DATEDIFF(CURDATE(), ds.date) BETWEEN 361 AND 720 THEN ds.stock_value ELSE 0 END) AS stock_value_361_720
    //     ";

    //     $groupBy = 'ds.item_id';

    //     // Base conditions
    //     $conditions = [
    //         'i.status' => 0,
    //         'ds.status' => 0,
    //         'c.status' => 0,
    //         'c.type'   => 0
    //     ];

    //     // Apply filters if selected
    //     if (!empty($branch)) {
    //         $conditions['ds.branch_id'] = $branch;
    //     }
    //     if (!empty($warehouse)) {
    //         $conditions['ds.warehouse_id'] = $warehouse;
    //     }
    //     if (!empty($category)) {
    //         $conditions['i.cat_id'] = $category;
    //     }
    //     if (!empty($item)) {
    //         $conditions['ds.item_id'] = $item;
    //     }

    //     // Fetch report data
    //     $rdata['reportData'] = $this->Default_model->getJoinedDataPagination(
    //         'tbl_daily_stock ds',
    //         $joins,
    //         $columns,
    //         $conditions,
    //         [], // like
    //         [], // or_like
    //         [], // range
    //         'array',
    //         $groupBy
    //     );
    //     // Grand totals for all items
    //     $columnsGrand = "
    //         SUM(ds.inflow_value) AS total_inflow_value,
    //         SUM(ds.outflow_value) AS total_outflow_value,
    //         SUM(ds.inflow_qty) AS total_in_qty,
    //         SUM(ds.outflow_qty) AS total_out_qty,
    //         SUM(CASE WHEN DATEDIFF(CURDATE(), ds.date) BETWEEN 0 AND 90  THEN ds.stock_value ELSE 0 END) AS stock_value_0_90,
    //         SUM(CASE WHEN DATEDIFF(CURDATE(), ds.date) BETWEEN 91 AND 180 THEN ds.stock_value ELSE 0 END) AS stock_value_91_180,
    //         SUM(CASE WHEN DATEDIFF(CURDATE(), ds.date) BETWEEN 181 AND 360 THEN ds.stock_value ELSE 0 END) AS stock_value_181_360,
    //         SUM(CASE WHEN DATEDIFF(CURDATE(), ds.date) BETWEEN 361 AND 720 THEN ds.stock_value ELSE 0 END) AS stock_value_361_720,
    //         SUM(CASE WHEN DATEDIFF(CURDATE(), ds.date) >= 721 
    //          THEN ds.stock_value ELSE 0 END) AS stock_value_above_720
    //     ";

    //     $rdata['totals'] = $this->Default_model->getJoinedDataPagination(
    //         'tbl_daily_stock ds',
    //         $joins,
    //         $columnsGrand,
    //         $conditions,
    //         [],
    //         [],
    //         [],
    //         'array'
    //     );

    //     $rdata['totals'] = $rdata['totals'][0];
    //     $rdata['totals']['grand_total'] =
    //         $rdata['totals']['stock_value_0_90'] +
    //         $rdata['totals']['stock_value_91_180'] +
    //         $rdata['totals']['stock_value_181_360'] +
    //         $rdata['totals']['stock_value_361_720'] +
    //         $rdata['totals']['stock_value_above_720']; // ✅ include 721+ days


    //     $this->view_function1('addon/aging_report', $rdata, $sdata, $ndata);
    // }
    // public function aging_report()
    // {
    //     $rdata = array();
    //     $sdata = array();
    //     $ndata = array();
    //     $rdata['pagetitle'] = 'Stock Aging Report (By Product)';

    //     // Get filters from GET
    //     $branch    = $this->input->get('branch');
    //     $category  = trim($this->input->get('category'));
    //     $item      = $this->input->get('item');
    //     $warehouse = trim($this->input->get('warehouse'));

    //     $rdata['branches']   = $this->Default_model->get_specific_columns('tbl_branch_profile', 'id,name', ['status' => 0]);
    //     $rdata['warehouses'] = $this->Default_model->get_specific_columns('tbl_warehouse', 'id,name', ['status' => 0]);
    //     $rdata['items']      = $this->Default_model->get_specific_columns('tbl_items', 'id,name', ['status' => 0]);
    //     $rdata['categories'] = $this->Default_model->get_specific_columns('tbl_category', 'id,name', ['status' => 0, 'type' => 0]);

    //     // Joins
    //     $joins = [
    //         'tbl_items i' => 'i.id = ds.item_id',
    //         'tbl_category c' => 'c.id = i.cat_id'
    //     ];

    //     // Columns
    //     $columns = "
    //         ds.item_id, i.item_code, i.name as item, i.part_number, c.name as category,
    //         SUM(ds.inflow_value) AS total_inflow_value,
    //         SUM(ds.outflow_value) AS total_outflow_value,
    //         SUM(ds.inflow_qty) AS total_in_qty,
    //         SUM(ds.outflow_qty) AS total_out_qty,
    //         SUM(CASE WHEN DATEDIFF(CURDATE(), ds.date) BETWEEN 0 AND 90 THEN ds.stock_value ELSE 0 END) AS stock_value_0_90,
    //         SUM(CASE WHEN DATEDIFF(CURDATE(), ds.date) BETWEEN 91 AND 180 THEN ds.stock_value ELSE 0 END) AS stock_value_91_180,
    //         SUM(CASE WHEN DATEDIFF(CURDATE(), ds.date) BETWEEN 181 AND 360 THEN ds.stock_value ELSE 0 END) AS stock_value_181_360,
    //         SUM(CASE WHEN DATEDIFF(CURDATE(), ds.date) BETWEEN 361 AND 720 THEN ds.stock_value ELSE 0 END) AS stock_value_361_720,
    //         SUM(CASE WHEN DATEDIFF(CURDATE(), ds.date) >= 721 THEN ds.stock_value ELSE 0 END) AS stock_value_above_720
    //     ";

    //     $groupBy = 'ds.item_id';

    //     // Base conditions
    //     $conditions = [
    //         'i.status' => 0,
    //         'ds.status' => 0,
    //         'c.status' => 0,
    //         'c.type'   => 0
    //     ];

    //     // Apply filters
    //     if (!empty($branch)) {
    //         $conditions['ds.branch_id'] = $branch;
    //     }
    //     if (!empty($warehouse)) {
    //         $conditions['ds.warehouse_id'] = $warehouse;
    //     }
    //     if (!empty($category)) {
    //         $conditions['i.cat_id'] = $category;
    //     }
    //     if (!empty($item)) {
    //         $conditions['ds.item_id'] = $item;
    //     }

    //     // ✅ Pagination setup
    //     $this->load->library('pagination');
    //     $config['base_url'] = base_url('home/aging_report');
    //     $config['per_page'] = 1;
    //     $config['uri_segment'] = 3;

    //     // Count total rows (for pagination)
    //     $countData = $this->Default_model->getJoinedDataPagination(
    //         'tbl_daily_stock ds',
    //         $joins,
    //         "COUNT(DISTINCT ds.item_id) as total_rows",
    //         $conditions,
    //         [],
    //         [],
    //         [],
    //         'row'
    //     );
    //     $config['total_rows'] = $countData['total_rows'];

    //     $this->pagination->initialize($config);
    //     $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

    //     // ✅ Fetch paginated report data
    //     $rdata['reportData'] = $this->Default_model->getJoinedDataPagination(
    //         'tbl_daily_stock ds',
    //         $joins,
    //         $columns,
    //         $conditions,
    //         [],
    //         [],
    //         [], // like, or_like, range
    //         'array',
    //         $groupBy,
    //         [], // orderBy
    //         $config['per_page'],
    //         $page
    //     );

    //     // ✅ Grand totals (not paginated)
    //     $columnsGrand = "
    //         SUM(ds.inflow_value) AS total_inflow_value,
    //         SUM(ds.outflow_value) AS total_outflow_value,
    //         SUM(ds.inflow_qty) AS total_in_qty,
    //         SUM(ds.outflow_qty) AS total_out_qty,
    //         SUM(CASE WHEN DATEDIFF(CURDATE(), ds.date) BETWEEN 0 AND 90  THEN ds.stock_value ELSE 0 END) AS stock_value_0_90,
    //         SUM(CASE WHEN DATEDIFF(CURDATE(), ds.date) BETWEEN 91 AND 180 THEN ds.stock_value ELSE 0 END) AS stock_value_91_180,
    //         SUM(CASE WHEN DATEDIFF(CURDATE(), ds.date) BETWEEN 181 AND 360 THEN ds.stock_value ELSE 0 END) AS stock_value_181_360,
    //         SUM(CASE WHEN DATEDIFF(CURDATE(), ds.date) BETWEEN 361 AND 720 THEN ds.stock_value ELSE 0 END) AS stock_value_361_720,
    //         SUM(CASE WHEN DATEDIFF(CURDATE(), ds.date) >= 721 
    //         THEN ds.stock_value ELSE 0 END) AS stock_value_above_720
    //     ";

    //     $rdata['totals'] = $this->Default_model->getJoinedDataPagination(
    //         'tbl_daily_stock ds',
    //         $joins,
    //         $columnsGrand,
    //         $conditions,
    //         [],
    //         [],
    //         [],
    //         'array'
    //     );

    //     $rdata['totals'] = $rdata['totals'][0];
    //     $rdata['totals']['grand_total'] =
    //         $rdata['totals']['stock_value_0_90'] +
    //         $rdata['totals']['stock_value_91_180'] +
    //         $rdata['totals']['stock_value_181_360'] +
    //         $rdata['totals']['stock_value_361_720'] +
    //         $rdata['totals']['stock_value_above_720'];

    //     // Pass pagination links to view
    //     $rdata['pagination'] = $this->pagination->create_links();
    //     $rdata['page'] = $page;
    //     $rdata['totalPages'] = $totalPages;
    //     $this->view_function1('addon/aging_report', $rdata, $sdata, $ndata);
    // }






}

<?php
class Maintenance_model extends CI_Model
{
    private static $db;
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        self::$db = &get_instance()->db;
    }
    public function insert_to_tb($tableName, $data)
    {
        return $this->db->insert($tableName, $data);
    }
    public function select_from_table($tableName, $columns = '*')
    {
        $this->db->select($columns);
        $this->db->where('status', "0");
        $query = $this->db->get($tableName);
        return $query->result_array();
    }
    public function select_from_table_users($username)
    {
        $this->db->select('*');
        $this->db->where('username', $username);
        $query = $this->db->get('tbl_users');
        return $query->result_array();
    }
    public function get_data_with_id($id, $column, $tableName)
    {
        // Selecting all columns from the first table, and the name columns from tbl_profile, tbl_item, tbl_model, and tbl_brand
        $this->db->select(
            $tableName . '.*,
        sup_profile.name as supervisor_name,
        tech_profile.name as technician_name,
        tbl_item.item_name,
        tbl_model.model_name,
        tbl_brand.brand_name'
        );

        // Joining 'tbl_profile' table with 'supervisor_id' column from the first table
        $this->db->join('tbl_profile as sup_profile', $tableName . '.supervisor_id = sup_profile.id', 'left');

        // Joining 'tbl_profile' table with 'technician_id' column from the first table
        $this->db->join('tbl_profile as tech_profile', $tableName . '.technician_id = tech_profile.id', 'left');

        // Joining 'tbl_item' table with 'item' column from the first table
        $this->db->join('tbl_item', $tableName . '.item = tbl_item.id', 'left');

        // Joining 'tbl_model' table with 'model' column from the first table
        $this->db->join('tbl_model', $tableName . '.model = tbl_model.id', 'left');

        // Joining 'tbl_brand' table with 'brand' column from the first table
        $this->db->join('tbl_brand', $tableName . '.brand = tbl_brand.id', 'left');

        // Where condition
        $this->db->where($column, $id);

        // Getting data from the first table
        $query = $this->db->get($tableName);

        // Returning the result
        return $query->result();
    }



    public function select_accessory_with_job($id)
    {
        $this->db->select('accessories');
        $this->db->from('tbl_maintenance_accessories');
        $this->db->where('tbl_maintenance_accessories.maintenance_job_id', $id);
        $this->db->where('tbl_maintenance_accessories.status', 0);
        $this->db->join('tbl_accessories', 'tbl_accessories.id = tbl_maintenance_accessories.accessories_id');
        $query = $this->db->get();
        return $query->result_array();
    }



    public function get_max_group_ref()
    {
        // Select the maximum value of group_ref from the specified table
        $this->db->select_max('group_ref');
        $query = $this->db->get('tbl_maintenance_job');
        if ($query->num_rows() > 0) {
            // Rows are found, get the maximum group_ref
            return $query->row()->group_ref;
        } else {
            // No rows found, return a default value or handle accordingly
            return 0; // For example, return 0 if there are no rows
        }

    }
    public function select_from_table_without_status($tableName, $columns = '*')
    {
        $this->db->select($columns);
        //$this->db->where('status', "0");
        $query = $this->db->get($tableName);
        return $query->result_array();
    }
    public function check_duplication($tableName, $column1, $column2, $value1, $value2)
    {
        $this->db->select($column1);
        $this->db->where('status', "0");
        $this->db->where($column1, $value1);
        $this->db->where($column2, $value2);
        $query = $this->db->get($tableName);
        return $query->row();
    }
    public function check_duplication_for_brand($tableName, $column1, $value1)
    {
        $this->db->select($column1);
        $this->db->where('status', "0");
        $this->db->where($column1, $value1);
        $query = $this->db->get($tableName);
        return $query->row();
    }
    public function get_options_for_item_dropdown($item)
    {
        $this->db->select('id, item_name');
        $this->db->where('brand_id', $item);
        $query = $this->db->get('tbl_item');
        return $query->result_array();
    }
    public function get_options_for_model_dropdown($item)
    {
        $this->db->select('id, model_name');
        $this->db->where('item_id', $item);
        $this->db->where('status', "0");

        $query = $this->db->get('tbl_model');
        return $query->result_array();
    }
    public function select_from_table_for_list($tableName, $columns = '*')
    {
        $this->db->select($columns);
        $this->db->where('status', "0");
        $query = $this->db->get($tableName);
        return $query->result_array();
    }
    public function select_from_table_for_list_for_model($columns = '*')
    {
        $this->db->select($columns);
        $this->db->from('tbl_brand'); // Set the main table to tbl_model
        $this->db->join('tbl_item', 'tbl_item.brand_id = tbl_brand.id', 'left'); // Join with tbl_brand
        $this->db->where('tbl_item.status', "0"); // Filter by status in tbl_model
        $query = $this->db->get();
        return $query->result_array();
    }

    public function select_from_table_with_jobstatus($tableName, $jobstatus, $columns = '*')
    {
        $this->db->select($columns);
        $this->db->where('job_status', $jobstatus);
        $query = $this->db->get($tableName);
        return $query->result_array();
    }
    public function select_from_profile_table($tableName, $columns = '*')
    {
        $this->db->select($columns);
        $this->db->where('status', "1");
        $query = $this->db->get($tableName);
        return $query->result_array();
    }
    public function select_from_table_with_id($tableName, $id, $columns = '*')
    {
        // Select columns from tbl_maintenance_job and join with tbl_brand, tbl_item, tbl_model, and tbl_customers
        $this->db->select('mj.*, b.brand_name, i.item_name, m.model_name, c.customer , c.id as customer_id, p.name,tp.name as technician_name');
        $this->db->from('tbl_maintenance_job mj');
        $this->db->join('tbl_brand b', 'mj.brand = b.id', 'left');
        $this->db->join('tbl_item i', 'mj.item = i.id', 'left');
        $this->db->join('tbl_model m', 'mj.model = m.id', 'left');
        $this->db->join('tbl_customers c', 'mj.customer = c.id', 'left');
        $this->db->join('tbl_profile p', 'mj.supervisor_id = p.id', 'left');
        $this->db->join('tbl_profile tp', 'mj.technician_id = tp.id', 'left');
        $this->db->where('mj.id', $id); // Filter by ID
        $this->db->where('mj.status', 0);
        $query = $this->db->get();
        return $query->row(); // Return single row
    }

    public function get_job_accessory_data($id)
    {
        $this->db->select('a.*');
        $this->db->from('tbl_maintenance_job mj');
        $this->db->join('tbl_maintenance_accessories ma', 'mj.id = ma.maintenance_job_id', 'left');
        $this->db->join('tbl_accessories a', 'ma.accessories_id = a.id', 'left');
        $this->db->where('ma.maintenance_job_id', $id);
        $this->db->where('ma.status', 0);
        $query = $this->db->get();
        return $query->result();
    }
    public function update_table($table_name, $id, $data)
    {
        // Ensure $data is not empty
        if (!empty($data)) {
            // Update the row in tbl_maintenance_job with the given job_id
            $this->db->where('id', $id);
            $this->db->update($table_name, $data);
        }
    }
    public function delete_table($table_name, $column, $id)
    {
        // Ensure $table_name and $id are not empty
        if (!empty($table_name) && !empty($id)) {
            // Set the status to 1 where the ID matches in the specified table
            $this->db->where($column, $id);
            $this->db->update($table_name, array('status' => 1));
        }
    }
    public function hard_delete($table_name, $job_id)
    {
        $this->db->where('job_id', $job_id);
        $this->db->delete($table_name);
    }
    public function delete_accessories_table($table_name, $id)
    {
        // Ensure $table_name and $id are not empty
        if (!empty($table_name) && !empty($id)) {
            // Set the status to 1 where the ID matches in the specified table
            $this->db->where('maintenance_job_id', $id);
            $this->db->update($table_name, array('status' => 1));
        }
    }
    public function hard_delete_accessories_table($id)
    {
        $this->db->where('maintenance_job_id', $id);
        $this->db->delete('tbl_maintenance_accessories');
    }
    public function update_accessories_table($table_name, $id, $data)
    {
        // Ensure $data is not empty
        if (!empty($data)) {
            // Update the row in tbl_maintenance_job with the given job_id
            $this->db->where('maintenance_job_id', $id);
            $this->db->update($table_name, $data);
        }
    }


    public function get_jobs_with_details($status)
    {
        // Select columns from tbl_maintenance_job and join with tbl_brand, tbl_item, and tbl_model

        $this->db->select('mj.*, b.brand_name, i.item_name, m.model_name,c.customer');
        $this->db->from('tbl_maintenance_job mj');
        $this->db->join('tbl_brand b', 'mj.brand = b.id', 'left');
        $this->db->join('tbl_item i', 'mj.item = i.id', 'left');
        $this->db->join('tbl_model m', 'mj.model = m.id', 'left');
        $this->db->join('tbl_customers c', 'mj.customer = c.id', 'left');
        $this->db->where_in('mj.job_status', $status);
        $this->db->where('mj.status', 0);
        $query = $this->db->get();
        return $query->result();
    }
    public function get_jobs_with_details_new_job($status)
    {
        // Select columns from tbl_maintenance_job and join with tbl_brand, tbl_item, tbl_model, tbl_customers, and tbl_profile
        $this->db->select('mj.*, b.brand_name, i.item_name, m.model_name, c.customer, p_supervisor.name AS supervisor_name, p_technician.name AS technician_name');
        $this->db->from('tbl_maintenance_job mj');
        $this->db->join('tbl_brand b', 'mj.brand = b.id', 'left');
        $this->db->join('tbl_item i', 'mj.item = i.id', 'left');
        $this->db->join('tbl_model m', 'mj.model = m.id', 'left');
        $this->db->join('tbl_customers c', 'mj.customer = c.id', 'left');
        $this->db->join('tbl_profile p_supervisor', 'mj.supervisor_id = p_supervisor.id', 'left');
        $this->db->join('tbl_profile p_technician', 'mj.technician_id = p_technician.id', 'left');
        $this->db->where_in('mj.job_status', $status);
        $this->db->where('mj.status', 0);
        // $this->db->where("(mj.job_created_by = $user_id OR mj.supervisor_id = $user_id OR mj.technician_id = $user_id)");
        $query = $this->db->get();
        return $query->result();
    }
    public function get_jobs_with_details_new_job_collector($status, $user_id, $keyword)
    {
        // Select columns from tbl_maintenance_job and join with tbl_brand, tbl_item, tbl_model, tbl_customers, and tbl_profile
        $this->db->select('mj.*, b.brand_name, i.item_name, m.model_name, c.customer, p_supervisor.name AS supervisor_name, p_technician.name AS technician_name');
        $this->db->from('tbl_maintenance_job mj');
        $this->db->join('tbl_brand b', 'mj.brand = b.id', 'left');
        $this->db->join('tbl_item i', 'mj.item = i.id', 'left');
        $this->db->join('tbl_model m', 'mj.model = m.id', 'left');
        $this->db->join('tbl_customers c', 'mj.customer = c.id', 'left');
        $this->db->join('tbl_profile p_supervisor', 'mj.supervisor_id = p_supervisor.id', 'left');
        $this->db->join('tbl_profile p_technician', 'mj.technician_id = p_technician.id', 'left');
        if (!empty($keyword)) {
            $this->db->group_start();
            $this->db->like('c.customer', $keyword);
            $this->db->or_like('mj.job_number', $keyword);
            $this->db->or_like('mj.group_reference', $keyword);
            $this->db->or_like('mj.phone', $keyword);
            $this->db->group_end();
        }
        $this->db->where_in('mj.job_status', $status);
        $this->db->where('mj.status', 0);
        $this->db->where('mj.job_created_by', $user_id);
        // $this->db->where("(mj.job_created_by = $user_id OR mj.supervisor_id = $user_id OR mj.technician_id = $user_id)");
        $query = $this->db->get();
        return $query->result();
    }
    public function new_jobs_with_details_job_collector($status, $user_id, $keyword)
    {
        // Select columns from tbl_maintenance_job and join with tbl_brand, tbl_item, tbl_model, tbl_customers, and tbl_profile
        $this->db->select('mj.*, b.brand_name, i.item_name, m.model_name, c.customer');
        $this->db->from('tbl_maintenance_job mj');
        $this->db->join('tbl_brand b', 'mj.brand = b.id', 'left');
        $this->db->join('tbl_item i', 'mj.item = i.id', 'left');
        $this->db->join('tbl_model m', 'mj.model = m.id', 'left');
        $this->db->join('tbl_customers c', 'mj.customer = c.id', 'left');
        if (!empty($keyword)) {
            $this->db->group_start();
            $this->db->like('mj.job_number', $keyword);
            $this->db->or_like('mj.job_number', $keyword);
            $this->db->or_like('mj.phone', $keyword);
            $this->db->or_like('mj.group_reference', $keyword);
            $this->db->or_like('mj.customer', $keyword);

            $this->db->group_end();
        }
        // $this->db->join('tbl_profile p_supervisor', 'mj.supervisor_id = p_supervisor.id', 'left');
        // $this->db->join('tbl_profile p_technician', 'mj.technician_id = p_technician.id', 'left');
        $this->db->where_in('mj.job_status', $status);
        $this->db->where('mj.supervisor_id', null);
        $this->db->where('mj.status', 0);
        $this->db->where('mj.job_created_by', $user_id);
        // $this->db->where("(mj.job_created_by = $user_id OR mj.supervisor_id = $user_id OR mj.technician_id = $user_id)");
        $query = $this->db->get();
        return $query->result();
    }
    public function get_jobs_with_details_for_supervisor($status, $supervisor_id, $keyword)
    {
        // Select columns from tbl_maintenance_job and join with tbl_brand, tbl_item, and tbl_model
        $this->db->select('mj.*, b.brand_name, i.item_name, m.model_name,c.customer');
        $this->db->from('tbl_maintenance_job mj');
        $this->db->join('tbl_brand b', 'mj.brand = b.id', 'left');
        $this->db->join('tbl_item i', 'mj.item = i.id', 'left');
        $this->db->join('tbl_model m', 'mj.model = m.id', 'left');
        $this->db->join('tbl_customers c', 'mj.customer = c.id', 'left');
        if (!empty($keyword)) {
            $this->db->group_start();
            $this->db->like('c.customer', $keyword);
            $this->db->or_like('mj.job_number', $keyword);
            $this->db->or_like('mj.group_reference', $keyword);
            $this->db->or_like('mj.phone', $keyword);
            $this->db->group_end();
        }
        $this->db->where_in('mj.job_status', $status);
        $this->db->where('mj.supervisor_id', $supervisor_id);
        $this->db->where('mj.status', 0);
        $query = $this->db->get();
        return $query->result();
    }
    public function get_jobs_with_details_for_technician($status, $technician_id, $keyword)
    {
        // Select columns from tbl_maintenance_job and join with tbl_brand, tbl_item, and tbl_model

        $this->db->select('mj.*, b.brand_name, i.item_name, m.model_name,c.customer,p.name,t.name as tech_name');
        $this->db->from('tbl_maintenance_job mj');
        $this->db->join('tbl_brand b', 'mj.brand = b.id', 'left');
        $this->db->join('tbl_item i', 'mj.item = i.id', 'left');
        $this->db->join('tbl_model m', 'mj.model = m.id', 'left');
        $this->db->join('tbl_profile p', 'mj.supervisor_id = p.id', 'left');
        $this->db->join('tbl_profile t', 'mj.technician_id = t.id', 'left');
        $this->db->join('tbl_customers c', 'mj.customer = c.id', 'left');
        if (!empty($keyword)) {
            $this->db->group_start();
            $this->db->like('c.customer', $keyword);
            $this->db->or_like('mj.job_number', $keyword);
            $this->db->or_like('mj.group_reference', $keyword);
            $this->db->or_like('mj.phone', $keyword);
            $this->db->group_end();
        }

        $this->db->where_in('mj.job_status', $status);
        $this->db->where('mj.technician_id', $technician_id);
        //$this->db->or_where('mj.supervisor_id', $technician_id);
        $query = $this->db->get();
        return $query->result();
    }
    public function tech_ongoing_for_supervisor($status, $supervisor_id, $keyword)
    {
        // Select columns from tbl_maintenance_job and join with tbl_brand, tbl_item, and tbl_model

        $this->db->select('mj.*, b.brand_name, i.item_name, m.model_name,c.customer,p.name,t.name as tech_name');
        $this->db->from('tbl_maintenance_job mj');
        $this->db->join('tbl_brand b', 'mj.brand = b.id', 'left');
        $this->db->join('tbl_item i', 'mj.item = i.id', 'left');
        $this->db->join('tbl_model m', 'mj.model = m.id', 'left');
        $this->db->join('tbl_profile p', 'mj.supervisor_id = p.id', 'left');
        $this->db->join('tbl_profile t', 'mj.technician_id = t.id', 'left');
        $this->db->join('tbl_customers c', 'mj.customer = c.id', 'left');
        if (!empty($keyword)) {
            $this->db->group_start();
            $this->db->like('c.customer', $keyword);
            $this->db->or_like('mj.job_number', $keyword);
            $this->db->or_like('mj.group_reference', $keyword);
            $this->db->or_like('mj.phone', $keyword);
            $this->db->group_end();
        }

        $this->db->where_in('mj.job_status', $status);
        $this->db->where('mj.supervisor_id', $supervisor_id);
        //$this->db->or_where('mj.supervisor_id', $technician_id);
        $query = $this->db->get();
        return $query->result();
    }
    public function get_approved_or_rejected_jobs_with_details($status, $column, $technician_id, $keyword)
    {
        // Select columns from tbl_maintenance_job and join with tbl_brand, tbl_item, and tbl_model

        $this->db->select('mj.*, b.brand_name, i.item_name, m.model_name,c.customer,p.name');
        $this->db->from('tbl_maintenance_job mj');
        $this->db->join('tbl_brand b', 'mj.brand = b.id', 'left');
        $this->db->join('tbl_item i', 'mj.item = i.id', 'left');
        $this->db->join('tbl_model m', 'mj.model = m.id', 'left');
        $this->db->join('tbl_profile p', 'mj.supervisor_id = p.id', 'left');
        $this->db->join('tbl_customers c', 'mj.customer = c.id', 'left');
        if (!empty($keyword)) {
            $this->db->group_start();
            $this->db->like('c.customer', $keyword);
            $this->db->or_like('mj.job_number', $keyword);
            $this->db->or_like('mj.group_reference', $keyword);
            $this->db->or_like('mj.phone', $keyword);
            $this->db->group_end();
        }
        $this->db->where_in('mj.approval_status', $status);
        $this->db->where('mj.' . $column, $technician_id);
        $this->db->where('mj.status', 0);
        $query = $this->db->get();
        return $query->result();
    }
    public function get_approved_rejected_jobs_with_details_for_supervisor($user_id)
    {
        // Select columns from tbl_maintenance_job and join with tbl_brand, tbl_item, and tbl_model

        $this->db->select('mj.*, p.name,c.customer,t.name as t_name');
        $this->db->from('tbl_maintenance_job mj');
        $this->db->join('tbl_customers c', 'mj.customer = c.id', 'left');
        $this->db->join('tbl_profile p', 'mj.supervisor_id = p.id', 'left');
        $this->db->join('tbl_profile t', 'mj.technician_id = t.id', 'left');
        $this->db->where('mj.job_created_by', $user_id);
        $this->db->where('(mj.approval_status = 1 OR mj.approval_status = 2)');

        $query = $this->db->get();
        return $query->result();
    }

    public function get_job_status_count()
    {
        $this->db->select('job_status, COUNT(*) as count');
        $this->db->from('tbl_maintenance_job');
        $this->db->where_in('job_status', array(6, 7));
        $this->db->group_by('job_status');
        $query = $this->db->get();

        // Initialize counts
        $counts = array(
            'status_6' => 0,
            'status_7' => 0
        );

        // Loop through results and set counts
        foreach ($query->result() as $row) {
            if ($row->job_status == 6) {
                $counts['status_6'] = $row->count;
            } elseif ($row->job_status == 7) {
                $counts['status_7'] = $row->count;
            }
        }

        return $counts;
    }
    public function get_timeline($id)
    {
        $this->db->select('tbl_remarks.*, tbl_profile.*');
        $this->db->from('tbl_remarks');
        $this->db->join('tbl_profile', 'tbl_profile.id = tbl_remarks.employee_id', 'left');
        $this->db->where('tbl_remarks.job_id', $id); // Filter by job_id
        $query = $this->db->get();
        return $query->result();

    }
    public function get_live_remarks_with_profile($job_id)
    {
        $this->db->select('r.*, p.*'); // Select all columns from both tables
        $this->db->from('tbl_remarks r');
        $this->db->join('tbl_profile p', 'r.employee_id = p.id', 'left'); // Join with tbl_profile
        $this->db->where('r.status', 1); // Filter by status = 1
        $this->db->where('r.job_id', $job_id); // Filter by job_id
        $query = $this->db->get();
        return $query->result(); // Return result set
    }
    public function get_items_collected_data($id)
    {
        // Select data and count distinct job_ids where collected_id = $id
        $this->db->select('tbl_items_collected.*, COUNT(tbl_items_collected.job_id) AS item_count, tbl_maintenance_job.job_number');
        $this->db->from('tbl_items_collected');
        $this->db->join('tbl_maintenance_job', 'tbl_maintenance_job.id = tbl_items_collected.job_id');
        $this->db->where('tbl_items_collected.collected_by', $id);
        $this->db->where('tbl_items_collected.status', 0);
        $this->db->group_by('tbl_items_collected.job_id'); // Group by job_id to ensure correct count
        $query = $this->db->get();

        return $query->result();
    }
    public function get_items_collected_data_per_job($id, $job_id)
    {
        // Select data and count distinct job_ids where collected_id = $id
        $this->db->select('tbl_items.*, tbl_items_collected.quantity, tbl_items_collected.collection_date, tbl_maintenance_job.job_number,tbl_maintenance_job.id as job_id');
        $this->db->from('tbl_items_collected');
        $this->db->join('tbl_items', 'tbl_items.id = tbl_items_collected.item_id');
        $this->db->join('tbl_maintenance_job', 'tbl_maintenance_job.id = tbl_items_collected.job_id');
        $this->db->where('tbl_items_collected.collected_by', $id);
        $this->db->where('tbl_items_collected.job_id', $job_id);
        $this->db->where('tbl_items_collected.status', 0);
        //$this->db->group_by('tbl_items_collected.job_id'); // Group by job_id to ensure correct count
        $query = $this->db->get();

        return $query->result();
    }
    public function manage_brand_item_model_details($table, $column)
    {
        $this->db->select($table . '.*, COUNT(tbl_maintenance_job.' . $column . ') AS count');
        $this->db->from($table);
        $this->db->join('tbl_maintenance_job', $table . '.id = tbl_maintenance_job.' . $column, 'left');
        $this->db->group_by($table . '.id');
        $this->db->where($table . '.status', 0);// Group by brand ID to ensure correct count
        $query = $this->db->get();

        return $query->result();
    }
    public function get_unique_group_ref_details()
    {
        // Select unique group_ref values, count of jobs under each group_ref,
        // customer name, collection date, and collection time
        $this->db->select('mj.group_ref, COUNT(*) as job_count, mj.group_reference,tc.customer as customer_name, mj.collection_date, mj.collection_time, mj.phone,mj.id_number');
        $this->db->from('tbl_maintenance_job mj');
        $this->db->where('mj.status', 0);
        $this->db->join('tbl_customers tc', 'tc.id=mj.customer', 'left');
        $this->db->group_by('mj.group_ref');
        $this->db->where('mj.group_ref IS NOT NULL');


        $query = $this->db->get();

        // Check if query executed successfully
        if ($query->num_rows() > 0) {
            // Return the result array
            return $query->result_array();
        } else {
            // Return an empty array if no records found
            return array();
        }
    }
    public function get_unique_individual_group_details()
    {
        // Select unique group_ref values, count of jobs under each group_ref,
        // customer name, collection date, and collection time
        $this->db->select('mj.*,tc.customer as customer_name ');
        $this->db->from('tbl_maintenance_job mj');

        $this->db->join('tbl_customers tc', 'tc.id=mj.customer', 'left');
        //$this->db->group_by('mj.group_ref');
        $this->db->where('mj.group_ref IS NULL');
        //$this->db->where('mj.group_ref IS NOT NULL');


        $query = $this->db->get();

        // Check if query executed successfully
        if ($query->num_rows() > 0) {
            // Return the result array
            return $query->result_array();
        } else {
            // Return an empty array if no records found
            return array();
        }
    }
    public function get_unique_group_ref_details_search($keyword = '')
    {
        // Select unique group_ref values, count of jobs under each group_ref,
        // customer name, collection date, and collection time
        $this->db->select('mj.group_ref, COUNT(*) as job_count, mj.group_reference, tc.customer as customer_name, mj.collection_date, mj.collection_time, mj.phone, mj.id_number');
        $this->db->from('tbl_maintenance_job mj');
        $this->db->where('mj.status', 0);
        $this->db->join('tbl_customers tc', 'tc.id = mj.customer', 'left');

        // Apply search keyword conditions
        if (!empty($keyword)) {
            $this->db->group_start();
            $this->db->like('tc.customer', $keyword);
            $this->db->or_like('mj.job_number', $keyword);
            $this->db->or_like('mj.group_reference', $keyword);
            $this->db->or_like('mj.phone', $keyword);
            $this->db->group_end();
        }

        $this->db->group_by('mj.group_ref');
        $this->db->where('mj.group_ref IS NOT NULL');

        $query = $this->db->get();

        // Check if query executed successfully
        if ($query->num_rows() > 0) {
            // Return the result array
            return $query->result_array();
        } else {
            // Return an empty array if no records found
            return array();
        }
    }

    public function get_jobs_under_group($ref)
    {
        $this->db->select('tbl_item.item_name, tbl_model.model_name, tbl_brand.brand_name,tbl_customers.customer as customer_name,tbl_profile_supervisor.name as supervisor_name, tbl_profile_technician.name as technician_name,tbl_maintenance_job.*');
        $this->db->from('tbl_maintenance_job');
        $this->db->join('tbl_item', 'tbl_item.id = tbl_maintenance_job.item', 'left');
        $this->db->join('tbl_model', 'tbl_model.id = tbl_maintenance_job.model', 'left');
        $this->db->join('tbl_brand', 'tbl_brand.id = tbl_maintenance_job.brand', 'left');
        $this->db->join('tbl_customers', 'tbl_customers.id = tbl_maintenance_job.customer', 'left');
        $this->db->join('tbl_profile as tbl_profile_supervisor', 'tbl_profile_supervisor.id = tbl_maintenance_job.supervisor_id', 'left');
        $this->db->join('tbl_profile as tbl_profile_technician', 'tbl_profile_technician.id = tbl_maintenance_job.technician_id', 'left');
        $this->db->where('tbl_maintenance_job.group_ref', $ref);
        $this->db->where('tbl_maintenance_job.status', 0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return [];
        }
    }
    public function get_filtered_group_jobs($status, $ref)
    {
        $this->db->select('tbl_item.item_name, tbl_model.model_name, tbl_brand.brand_name, tbl_profile_supervisor.name as supervisor_name, tbl_profile_technician.name as technician_name,tbl_maintenance_job.*');
        $this->db->from('tbl_maintenance_job');
        $this->db->join('tbl_item', 'tbl_item.id = tbl_maintenance_job.item', 'left');
        $this->db->join('tbl_model', 'tbl_model.id = tbl_maintenance_job.model', 'left');
        $this->db->join('tbl_brand', 'tbl_brand.id = tbl_maintenance_job.brand', 'left');
        $this->db->join('tbl_profile as tbl_profile_supervisor', 'tbl_profile_supervisor.id = tbl_maintenance_job.supervisor_id', 'left');
        $this->db->join('tbl_profile as tbl_profile_technician', 'tbl_profile_technician.id = tbl_maintenance_job.technician_id', 'left');
        $this->db->where('tbl_maintenance_job.group_ref', $ref);
        $this->db->where_in('tbl_maintenance_job.job_status', $status);
        $this->db->where('tbl_maintenance_job.status', 0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return [];
        }
    }
    public function get_maintenance_job_details($ref)
    {
        // Select the specified fields from the table where group_ref matches
        $this->db->select('collection_date, collection_time, customer, phone, id_number');
        $this->db->where('group_ref', $ref);
        $this->db->limit(1);
        $query = $this->db->get('tbl_maintenance_job');

        // Check if any row exists
        if ($query->num_rows() > 0) {
            return $query->row_array(); // Return the first row as an associative array
        } else {
            return NULL; // Return NULL if no row is found
        }
    }

    public function removefromgroup($data, $id)
    {

        $this->db->where('id', $id);
        $this->db->update('tbl_maintenance_job', $data);
    }
    public function count_individual_jobs()
    {
        $this->db->from('tbl_maintenance_job');
        $this->db->where('group_ref IS NULL');
        return $this->db->count_all_results();
    }

    // Count of unique group references
    public function count_unique_group_refs()
    {
        $this->db->select('group_ref');
        $this->db->from('tbl_maintenance_job');
        $this->db->where('group_ref IS NOT NULL');
        $this->db->group_by('group_ref');
        return $this->db->count_all_results();
    }

    // Count of completed jobs where job_status is 5
    public function count_completed_jobs()
    {
        $this->db->from('tbl_maintenance_job');
        $this->db->where('job_status', 5);
        return $this->db->count_all_results();
    }

    // Count of delivered jobs where job_status is 8
    public function count_delivered_jobs()
    {
        $this->db->from('tbl_maintenance_job');
        $this->db->where('job_status', 8);
        return $this->db->count_all_results();
    }

    // Count of due jobs where estimated_delivery_date is less than today
    public function count_due_jobs()
    {
        $this->db->from('tbl_maintenance_job');
        $this->db->where('estimated_delivery_date <', date('Y-m-d'));
        $this->db->where('job_status !=', 8);
        return $this->db->count_all_results();
    }
    public function searchresult($keyword, $added_by)
    {
        $this->db->select('mj.*, b.brand_name, i.item_name, m.model_name, c.customer, p_supervisor.name AS supervisor_name, p_technician.name AS technician_name');
        $this->db->from('tbl_maintenance_job mj');
        $this->db->join('tbl_brand b', 'mj.brand = b.id', 'left');
        $this->db->join('tbl_item i', 'mj.item = i.id', 'left');
        $this->db->join('tbl_model m', 'mj.model = m.id', 'left');
        $this->db->join('tbl_customers c', 'mj.customer = c.id', 'left');
        $this->db->join('tbl_profile p_supervisor', 'mj.supervisor_id = p_supervisor.id', 'left');
        $this->db->join('tbl_profile p_technician', 'mj.technician_id = p_technician.id', 'left');
        if (!empty($keyword)) {
            $this->db->group_start();
            $this->db->like('c.customer', $keyword);
            $this->db->or_like('mj.job_number', $keyword);
            $this->db->or_like('mj.group_reference', $keyword);
            $this->db->or_like('mj.phone', $keyword);
            $this->db->group_end();
        }
        //$this->db->where_in('mj.job_status', $status);
        $this->db->where('mj.status', 0);
        $this->db->where('mj.job_created_by', $added_by);
        // $this->db->where("(mj.job_created_by = $user_id OR mj.supervisor_id = $user_id OR mj.technician_id = $user_id)");
        $query = $this->db->get();
        return $query->result();
    }
    //////////////////////////////FOR EXCEL TO INVOICE//////////////////////////////////////////
    public function get_max_invoice_ref()
    {
        // Select the maximum value of group_ref from the specified table
        $this->db->select_max('reference');
        $query = $this->db->get('tbl_invoice');
        if ($query->num_rows() > 0) {
            // Rows are found, get the maximum group_ref
            return $query->row()->reference;
        } else {
            // No rows found, return a default value or handle accordingly
            return 0; // For example, return 0 if there are no rows
        }

    }
}








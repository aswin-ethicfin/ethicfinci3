<?php
class Intern_model extends CI_Model
{
    private static $db;
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        self::$db = &get_instance()->db;
    }
    public function insert_to_tb($table, $data)
    {
        $this->db->insert($table, $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    public function get_specific_columns($table_name, $columns, $where_condition = null)
    {
        $this->db->select($columns);
        $this->db->from($table_name);

        if ($where_condition) {
            $this->db->where($where_condition);
        }

        $query = $this->db->get();
        return $query->result_array();
    }
    public function update_record($table, $data, $where)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
        return $this->db->affected_rows();
    }
    public function delete_record($table, $where)
    {
        $this->db->where($where);
        $this->db->delete($table);
        return $this->db->affected_rows();
    }
    public function delete_record($table, $where)
    {
        $this->db->where($where);
        $this->db->delete($table);
        return $this->db->affected_rows();
    }
    public function get_joined_columns($table_name, $columns, $join = null, $where_condition = null, $group_by = null)
    {
        $this->db->select($columns);
        $this->db->from($table_name);

        if ($join) {
            foreach ($join as $table => $on_condition) {
                $this->db->join($table, $on_condition, 'left');
            }
        }

        if ($where_condition) {
            $this->db->where($where_condition);
        }

        if ($group_by) {
            $this->db->group_by($group_by);
        }

        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_specific_columns($table_name, $columns, $where_condition = null)
    {
        $this->db->select($columns);
        $this->db->from($table_name);

        if ($where_condition) {
            $this->db->where($where_condition);
        }

        $query = $this->db->get();
        return $query->result_array();
    }
}

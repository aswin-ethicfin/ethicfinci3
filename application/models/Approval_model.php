<?php
class Approval_model extends CI_Model
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
public function get_joined_columns($table_name, $columns, $join = null, $where_condition = null)
{
    // Select specific columns
    $this->db->select($columns);
    // From the table
    $this->db->from($table_name);
    // If join condition is provided, perform the join
    if ($join) {
        foreach ($join as $table => $on_condition) {
            // Perform the join (using 'left' join as default)
            $this->db->join($table, $on_condition, 'left'); // You can change 'left' to 'inner' or 'right' as needed
        }
    }
    // Apply where condition if provided
    if ($where_condition) {
        $this->db->where($where_condition);
    }
    // Execute the query
    $query = $this->db->get();
    // Return the results as an array
    return $query->result_array();
    }
    public function get_last_grn_reference()
    {
        $this->db->select('grn_no');
        $this->db->from('tbl_grn');
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);

        $query = $this->db->get()->row_array();

        return $query ? $query['grn_no'] : null;
    }
    public function getJoinedData($mainTable, $joins = [], $columns = '*', $conditions = [], $returnType = 'array', $groupBy = '', $orderBy = '')
    {
        // ✅ Handle select fields
        if (is_array($columns)) {
            $this->db->select(implode(', ', $columns));
        } elseif (is_string($columns)) {
            $this->db->select($columns);
        } else {
            $this->db->select('*');
        }
    
        $this->db->from($mainTable);
    
        // ✅ Handle joins
        if (!empty($joins) && is_array($joins)) {
            foreach ($joins as $table => $condition) {
                $this->db->join($table, $condition, 'left');
            }
        }
    
        // ✅ Handle where / where_in / where_not_in
        if (!empty($conditions) && is_array($conditions)) {
            foreach ($conditions as $key => $value) {
                if (stripos($key, ' IN') !== false) {
                    $column = trim(str_ireplace('IN', '', $key));
                    $this->db->where_in($column, $value);
                } elseif (stripos($key, ' NOT IN') !== false) {
                    $column = trim(str_ireplace('NOT IN', '', $key));
                    $this->db->where_not_in($column, $value);
                } else {
                    $this->db->where($key, $value);
                }
            }
        }
    
        // ✅ Group by support
        if (!empty($groupBy)) {
            $this->db->group_by($groupBy);
        }
    
        // ✅ Order by support
        if (!empty($orderBy)) {
            if (is_array($orderBy)) {
                foreach ($orderBy as $col => $dir) {
                    if (is_string($col) && is_string($dir)) {
                        $this->db->order_by($col, $dir);
                    }
                }
            } elseif (is_string($orderBy)) {
                $this->db->order_by($orderBy, '', false);
            }
        }
    
        // ✅ Execute
        $query = $this->db->get();
    
        return ($returnType === 'row') ? $query->row_array() : $query->result_array();
    }
    
    public function getJoinedDataPagination(
        $mainTable,
        $joins = [],
        $columns = '*',
        $conditions = [],
        $returnType = 'array',
        $groupBy = '',
        $orderBy = [],
        $limit = 0,
        $start = 0
    ) {
        $this->db->select($columns);
        $this->db->from($mainTable);

        foreach ($joins as $table => $condition) {
            $this->db->join($table, $condition, 'left');
        }

        if (!empty($conditions)) {
            $this->db->where($conditions);
        }

        if (!empty($groupBy)) {
            is_array($groupBy)
                ? $this->db->group_by(implode(', ', $groupBy))
                : $this->db->group_by($groupBy);
        }

        if (!empty($orderBy)) {
            foreach ($orderBy as $column => $direction) {
                $this->db->order_by($column, $direction);
            }
        }

        if ($limit > 0) {
            $this->db->limit($limit, $start);
        }

        $query = $this->db->get();

        return $returnType === 'row' ? $query->row_array() : $query->result_array();
    }



}


?>
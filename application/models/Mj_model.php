<?php
class Mj_model extends CI_Model
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
    public function getJoinedDataPagination(
        $mainTable,               // Main table name
        $joins = [],              // Array of joins (key = table, value = condition)
        $columns = '*',           // Columns to select
        $conditions = [],         // WHERE conditions
        $returnType = 'array',    // Return type: 'array' or 'row'
        $groupBy = '',            // Group By column(s)
        $orderBy = [],            // Order By column(s)
        $limit = 0,               // Limit for pagination
        $start = 0                // Offset for pagination
    ) {
        // ✅ Select columns
        $this->db->select($columns);
        $this->db->from($mainTable);

        // ✅ Apply joins dynamically if provided
        if (!empty($joins)) {
            foreach ($joins as $table => $condition) {
                $this->db->join($table, $condition, 'left'); // LEFT JOIN by default
            }
        }

        // ✅ Apply conditions if provided
        if (!empty($conditions)) {
            $this->db->where($conditions);
        }

        // ✅ Apply GROUP BY if provided
        if (!empty($groupBy)) {
            if (is_array($groupBy)) {
                $this->db->group_by(implode(', ', $groupBy));
            } else {
                $this->db->group_by($groupBy);
            }
        }

        // ✅ Apply ORDER BY if provided
        if (!empty($orderBy)) {
            foreach ($orderBy as $column => $direction) {
                $this->db->order_by($column, $direction);
            }
        }

        // ✅ Apply limit and offset for pagination
        if ($limit > 0) {
            $this->db->limit($limit, $start);
        }

        // ✅ Execute query
        $query = $this->db->get();
        // ✅ Return single row or multiple rows based on returnType
        if ($returnType === 'row') {
            return $query->row_array();
        } else {
            return $query->result_array();
        }
    }

    /**
     * Count total rows with joins and filters
     */
    public function countJoinedData(
        $mainTable,
        $joins = [],
        $conditions = [],
        $like = [],
        $or_like = [],
        $range = [],
        $groupBy = ''
    ) {
        // If groupBy is provided, select only the grouped column
        if (!empty($groupBy)) {
            $this->db->select($groupBy);
        } else {
            $this->db->select('*');
        }

        $this->db->from($mainTable);

        // Joins
        if (!empty($joins)) {
            foreach ($joins as $table => $condition) {
                $this->db->join($table, $condition, 'left');
            }
        }

        // Conditions
        if (!empty($conditions)) {
            $this->db->where($conditions);
        }

        // LIKE
        if (!empty($like)) {
            foreach ($like as $col => $val) {
                $this->db->like($col, $val);
            }
        }

        // OR LIKE
        if (!empty($or_like)) {
            $this->db->group_start();
            foreach ($or_like as $col => $val) {
                $this->db->or_like($col, $val);
            }
            $this->db->group_end();
        }

        // Range
        if (!empty($range)) {
            foreach ($range as $key => $val) {
                $this->db->where($key, $val);
            }
        }

        // GROUP BY
        if (!empty($groupBy)) {
            if (is_array($groupBy)) {
                $this->db->group_by($groupBy);
            } else {
                $this->db->group_by([$groupBy]);
            }
            // Use get()->num_rows() instead of count_all_results() to avoid duplicate column issues
            $query = $this->db->get();
            return $query->num_rows();
        } else {
            return $this->db->count_all_results();
        }
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
}

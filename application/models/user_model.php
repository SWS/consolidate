<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_model extends CI_Model {

    var $message = array('yes', 'no', 'Thank You!<br>You Email has verified. Please Login.', 'Sorry You have something mistake', 'You have already verified.');

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function userLogin($array) {
        $query = $this->db->get_where('user', $array);

        return $query->row_array();
    }

    function update_password($old_pass, $new_pass, $id) {
        $array = array('id' => $id, 'password' => $old_pass);
        $update = array('password' => $new_pass);
        $query = $this->db->get_where('user', $array);

        if ($query->row_array()) {
            $this->db->where('id', $id);
            $this->db->update('user', $update);
            return $this->message[0];
        } else {
            return $this->message[1];
        }
    }

    function add($table, $array) {
        $query = $this->db->insert($table, $array);

        return $this->db->insert_id();
    }

    function all_data($table) {
        $query = $this->db->get($table);
        return $query->result_array();
    }

    function record_count() {
        return $this->db->count_all("user");
    }

    function get_username($data) {
        $query = $this->db->get_where('user', $data);

        return $query->row_array();
    }

    function update_user_detail($siteData, $user_id) {
        $this->db->where('id', $user_id);
        $this->db->update('user', $siteData);
    }

    function user($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get('user');

        return $query->result_array();
    }

    function delete_user_data($id) {
        $this->db->where('user_id', $id);
        $this->db->delete('user');
    }

    function search_data($table, $array) {
        $this->db->or_like($array);
        $query = $this->db->get_where($table);

        return $query->result_array();
    }

    function search_data_with_condition($table, $array, $condition) {
        $this->db->like($array);
        $query = $this->db->get_where($table, $condition);

        return $query->result_array();
    }

    function check_user($id, $confirm) {
        $check_confirm = $this->user_valid($id);
        if ($check_confirm == 0) {
            $this->db->where('md5(id)', $id);
            $this->db->where('confirm', $confirm);
            $query = $this->db->get('user');
            if ($query->num_rows() == 1) {
                $this->db->where('md5(id)', $id);
                $this->db->update('user', array('confirm' => 'confirm'));
                return $this->message[2];
            } else {
                return $this->message[3];
            }
        } else {
            return $this->message[4];
        }
    }

    function user_valid($id) {
        $check = $this->db->get_where('user', array('md5(id)' => $id, 'confirm' => 'confirm'));
        return $check->num_rows();
    }

    function get_all_data_by_id($table_name, $condition) {
        $query = $this->db->get_where($table_name, $condition);

        return $query->result_array();
    }

    function get_data_by_id($table_name, $condition) {
        $query = $this->db->get_where($table_name, $condition);

        return $query->row_array();
    }

    function delete_data($table_name, $condition) {
        $this->db->delete($table_name, $condition);
    }

    function get_sum_data($table_name, $field, $condition) {
        $query = $this->db->select_sum($field);
        $query = $this->db->get_where($table_name, $condition);

        return $query->row_array();
    }

    function get_data_by_order($tablename, $field_name, $order_by) {
        $query = $this->db->order_by($field_name, $order_by)->get($tablename);

        return $query->result_array();
    }

}

/* End of file super_admin_model.php */
/* Location: ./system/application/models/super_admin_model.php */
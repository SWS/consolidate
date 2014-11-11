<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class comman_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function userLogin($array) {
        $query = $this->db->get_where('user', $array);
        return $query->row_array();
    }

    function check_user_id($table, $id, $value) {
        $this->db->where('md5(' . $id . ')', $value);
        $query = $this->db->get($table);
        return $query->row_array();
    }

    function check_user_by_id($table, $id, $value) {
        $this->db->where('md5(' . $id . ')', $value);
        $query = $this->db->get($table);
        return $query->row_array();
    }

    function add($table, $array) {
        $query = $this->db->insert($table, $array);
        return $this->db->insert_id();
    }

    function record_count($table) {
        return $this->db->count_all($table);
    }

    function get_total_row($table, $where) {
        $query = $this->db->get_where($table, $where);
        return $query->num_rows();
    }

    function get_data_by_pagination($table, $field, $value, $limit, $start) {
        $this->db->order_by($field, $value);
        $this->db->limit($limit, $start);
        $query = $this->db->get($table);

        return $query->result_array();
    }

    function get_username($data) {
        $query = $this->db->get_where('user', $data);

        return $query->row_array();
    }

    function get_average_by_id($table, $data, $field_name) {
        $query = $this->db->select_avg($field_name)->get_where($table, $data);

        return $query->row_array();
    }

    function get_sum_by_id($table, $data, $field_name) {
        $query = $this->db->select_sum($field_name)->get_where($table, $data);

        return $query->row_array();
    }

    function get_awards_remarks($code) {
        $this->db->select('title');
        $this->db->where('code', $code);
        $result = $this->db->get('serial_code');
        return $result->result_array();
    }

    function get_top_ranking($table, $field1, $field2, $new_name, $order) {
        $this->db->select($field1);
        $this->db->select_sum($field2, $new_name);
        $this->db->group_by($field1);
        $this->db->order_by($new_name, $order);
        $query = $this->db->get($table, 10);

        return $query->result_array();
    }

    function get_top_ranking1($table, $field1, $field2, $new_name, $order) {
        $this->db->select($field1);
        $this->db->select_sum($field2, $new_name);
        $this->db->group_by($field1);
        $this->db->order_by($new_name, $order);
        $query = $this->db->get($table);

        return $query->result_array();
    }

    function get_top_ranking2($table, $field1, $field2, $new_name, $order, $limit, $start) {
        $this->db->select($field1);
        $this->db->select_sum($field2, $new_name);
        $this->db->group_by($field1);
        $this->db->order_by($new_name, $order);
        $this->db->limit($limit, $start);
        $query = $this->db->get($table);

        return $query->result_array();
    }

    function get_all_top_ranking($table, $field1, $field2, $new_name2, $field3, $new_name3, $order) {
        $this->db->select($field1);
        $this->db->select_sum($field2, $new_name2);
        $this->db->select_sum($field3, $new_name3);
        $this->db->group_by($field1);
        $this->db->order_by($new_name2, $order);
        $this->db->order_by($new_name3, $order);
        $query = $this->db->get($table);

        return $query->result_array();
    }

    function query_result($query) {
        $query = $this->db->query($query);

        return $query->result_array();
    }

    function get_data_by_where_in($table, $condition, $where, $id, $value) {
        if ($where == 'not') {
            $this->db->where_not_in($id, $value);
        }
        $query = $this->db->get_where($table, $condition);
        return $query->result_array();
    }

    function get_all_data_by_id_with_order($table_name, $condition, $field_name, $order_by) {
        $query = $this->db->order_by($field_name, $order_by)->get_where($table_name, $condition);

        return $query->result_array();
    }

    function get_all_data_by_id_with_order1($table_name, $condition, $field_name1, $order_by1, $field_name2, $order_by2) {
        $query = $this->db->order_by($field_name1, $order_by1)->order_by($field_name2, $order_by2)->get_where($table_name, $condition);

        return $query->result_array();
    }

    function update_user_detail($siteData, $user_id) {
        $this->db->where('id', $user_id);
        $this->db->update('user', $siteData);
    }

    function all_data($table_Name) {

        $query = $this->db->get($table_Name);

        return $query->result_array();
    }

    function all_data_by_id($table_Name, $where) {

        $query = $this->db->get_where($table_Name, $where);

        return $query->result_array();
    }

    function all_data_by_condition($table_Name, $where, $order, $value) {
        $query = $this->db->or_where($where);
        $this->db->order_by($order, $value);
        $query = $this->db->get($table_Name);

        return $query->result_array();
    }

    function all_data_by_condition1($table_Name, $where1, $where2, $order, $value) {
        $this->db->where($where2);
        $query = $this->db->or_where($where1);
        $this->db->order_by($order, $value);
        $query = $this->db->get($table_Name);
        echo $this->db->last_query();
        die; //shahla moved back from the original code
        return $query->result_array();
    }

    function all_data_by_condition2($table_Name, $where, $order, $value) {
        $query = $this->db->where($where);
        $this->db->order_by($order, $value);
        $query = $this->db->get($table_Name);

        return $query->result_array();
    }

    function delete_by_id($table, $where) {
        $this->db->delete($table, $where);
        return TRUE;
    }

    /*     * * added by razib from 4axiz start  ** */

    function deleteAllById($table, $array, $field = 'id') {
        $this->db->where_in($field, $array);
        $this->db->delete($table);
        return TRUE;
    }

    function getAllById($table, $array, $fields = null, $where_fields = 'id') {
        if ($fields) {
            $table_field = '';
            foreach ($fields as $field) {
                $table_field .= $field . ', ';
            }
            $this->db->select($table_field);
        }
        $this->db->where_in($where_fields, $array);
        $query = $this->db->get($table);
        return $query->result_array();
    }

    /*     * * added by razib from 4axiz end  ** */

    function delete_winner_id($table, $where) {
        $this->db->delete($table, $where);
        return TRUE;
    }

    function last_row($table_Name, $where) {

        $query = $this->db->get_where($table_Name, $where);

        $last = $query->last_row('array');

        return $last;
    }

    function count_row_by_id($table_Name, $where) {

        $query = $this->db->get_where($table_Name, $where);

        return $query->num_rows();
        ;
    }

    function update_by_id($table_Name, $updatequery, $id) {
        $this->db->where('id', $id);
        $this->db->update($table_Name, $updatequery);
        return $this->db->affected_rows();
    }

    function update_data_by_id($table_Name, $updatequery, $field_name, $value) {
        $this->db->where($field_name, $value);
        $this->db->update($table_Name, $updatequery);
        return $this->db->affected_rows();
    }

    function update_data_by_condition($table_Name, $updatequery, $array) {
        $this->db->where($array);
        $this->db->update($table_Name, $updatequery);
    }

    function get_data_by_id($tablename, $condition) {
        $query = $this->db->get_where($tablename, $condition);

        return $query->row_array();
    }

    function get_all_data_by_id($table_name, $condition) {
        $query = $this->db->get_where($table_name, $condition);

        return $query->result_array();
    }

    function search_serial_data($table) {
        $query = $this->db->get_where($table);

        return $query->result_array();
    }

    function get_list_by_group($table, $field) {
        $this->db->group_by($field);
        $query = $this->db->get($table);
        return $query->result_array();
    }

    function delete_blocked_id($table, $array) {
        $this->db->where($array);
        $query = $this->db->get($table);
        $result = $query->result_array();
        $email = $result[0]['email'];
        $this->db->delete($table, array('email' => $email));
        return true;
    }

    function delete_blocked_all($table) {
        $this->db->empty_table($table);
    }

    function get_winner_by_id($table, $array) {
        $this->db->where($array);
        $query = $this->db->get($table);
        $result = $query->result_array();
        return $result[0];
    }

    function get_breadcrumbcategorydetailsbyid($vehicle_category_id) {
        $this->db->where('id', $vehicle_category_id);
        $query = $this->db->get('tbl_vehicle_categories');
        $result = $query->row();
        $breadcrumb = '';
        if ($result->vehicle_category_icon != '') {
            $breadcrumb .= $this->getImagePath($result->vehicle_category_icon);
        }
        $breadcrumb .= '&nbsp;&nbsp;' . $result->category_name . '';
        return $breadcrumb;
    }

    function get_breadcrumbproducttypedetailsbyid($vehicle_type_id) {
        $this->db->where('id', $vehicle_type_id);
        $query = $this->db->get('tbl_product_types');
        $result = $query->row();
        $breadcrumb = '&nbsp;&nbsp;' . $result->product_type_name . '';
        return $breadcrumb;
    }

    function get_breadcrumbmakerdetailsbyid($product_maker_id) {
        $this->db->where('id', $product_maker_id);
        $query = $this->db->get('tbl_makers');
        $result = $query->row();
        $breadcrumb = '&nbsp;&nbsp;' . $result->maker_name . '';
        return $breadcrumb;
    }

    function get_vehicle_categories($product_type, $offset = 0) {
        $this->db->select('tbl_vehicle_categories.*');
        $this->db->from('tbl_product_types');
        $this->db->join('tbl_vehicle_categories', 'tbl_product_types.vehicle_category_id = tbl_vehicle_categories.id');
        $this->db->where('tbl_product_types.product_type_name', $product_type);
        $this->db->limit($this->config->item('pagination_limit'), $offset);

        $query = $this->db->get();
        return $query->result();
    }

    function count_vehicle_categories($product_type) {
        $this->db->select('tbl_vehicle_categories.*');
        $this->db->from('tbl_product_types');
        $this->db->join('tbl_vehicle_categories', 'tbl_product_types.vehicle_category_id = tbl_vehicle_categories.id');
        $this->db->where('tbl_product_types.product_type_name', $product_type);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function get_vehicle_categories_by_id($product_id, $offset = 0) {
        $this->db->select('tbl_vehicle_categories.*');
        $this->db->from('tbl_product_types');
        $this->db->join('tbl_vehicle_categories', 'tbl_product_types.vehicle_category_id = tbl_vehicle_categories.id');
        $this->db->where('tbl_product_types.id !=', '0');
        if (!empty($product_id)) {
            $i = 1;
            foreach ($product_id as $id) {
                $product_type = str_replace('_', ' ', $id);
                if ($id != '') {
                    if ($i > 1)
                        $this->db->or_like('tbl_product_types.product_type_name', $product_type);
                    else
                        $this->db->like('tbl_product_types.product_type_name', $product_type);

                    $i++;
                }
            }
        }
        $this->db->group_by('tbl_vehicle_categories.id');
        $this->db->limit($this->config->item('pagination_limit'), $offset);
        $query = $this->db->get();
        return $query->result();
    }

    function count_vehicle_categories_by_id($product_id) {
        $this->db->select('tbl_vehicle_categories.*');
        $this->db->from('tbl_product_types');
        $this->db->join('tbl_vehicle_categories', 'tbl_product_types.vehicle_category_id = tbl_vehicle_categories.id');
        $this->db->where('tbl_product_types.id !=', '0');
        if (!empty($product_id)) {
            $i = 1;
            foreach ($product_id as $id) {
                $product_type = str_replace('_', ' ', $id);
                if ($id != '') {
                    if ($i > 1)
                        $this->db->or_like('tbl_product_types.product_type_name', $product_type);
                    else
                        $this->db->like('tbl_product_types.product_type_name', $product_type);

                    $i++;
                }
            }
        }
        $this->db->group_by('tbl_vehicle_categories.id');
        $query = $this->db->get();
        return $query->num_rows();
    }

    function get_vehicle_type_details_by_name($product_type) {
        $query = $this->db->get_where('tbl_product_types', array('product_type_name' => $product_type));
        return $query->result();
    }

    function get_prodouct_type($product_type, $vehicle_category_ids) {
        $product_type_array = array();
        foreach ($vehicle_category_ids as $vehicle_category_id) {
            $this->db->where('product_type_name', $product_type);
            $this->db->where('vehicle_category_id', $vehicle_category_id);
            $query = $this->db->get('tbl_product_types');
            $details = $query->row();
            $product_type_array[] = $details->id;
        }
        return $product_type_array;
    }

    function get_product_type_for_menu1() {
        $this->db->group_by('product_type_name');
        $query = $this->db->get('tbl_product_types');
        return $query->result();
    }

    function get_product_type_for_menu($offset = 0) {
        $this->db->group_by('tbl_product_types.product_type_name');
        $query = $this->db->get('tbl_product_types', $this->config->item('pagination_limit'), $offset);
        return $query->result();
    }

    function num_product_type_for_menu() {
        $this->db->group_by('product_type_name');
        $query = $this->db->get('tbl_product_types');
        $rowcount = $query->num_rows();
        return $rowcount;
    }

    function get_tabledata_by_id($table, $id, $where) {
        $this->db->where('id', $id);
        $this->db->where($where, 1);
        $result = $this->db->get($table);
        return $result->result_array();
    }

    function get_tabledata_block_id($table, $id) {
        $this->db->where('int_id', $id);
        $result = $this->db->get($table);
        return $result->result_array();
    }

    function delete_block_email_list_by_id($email) {
        $this->db->where('str_email', $email);
        $this->db->delete('block_email_list');
        return $this->db->affected_rows();
    }

    function delete_block_email_by_table($table, $where1, $where2) {
        if ($table == 'tbl_dist_app_support') {
            $this->db->where('str_email', $where2);
        } else if ($table == 'cart_block_users') {
            $this->db->where('email', $where2);
        } else {
            $this->db->where('email', $where2);
            $this->db->where($where1, 1);
        }
        $this->db->delete($table);
    }

    function get_code_remarks($code) {
        $this->db->select('title');
        $this->db->where('code', $code);
        $result = $this->db->get('serial_code');
        return $result->result_array();
    }

    function get_timer($table, $select) {
        $this->db->select($select);
        $result = $this->db->get($table);
        return $result->result_array();
    }

    function get_isactive_checkbox($table, $id, $value) {
        $this->db->where($id, $value);
        $query = $this->db->get($table);

        $result = $query->row_array();


        if (!empty($result)) {
            if ($result['is_product_selectall'] == 'Y') {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    function get_vehicle_categoriesjeet($product_type, $offset = NULL) {

        $this->db->select('*');
        $this->db->join('tbl_product_types', 'tbl_product_types.vehicle_category_id = tbl_vehicle_categories.id');
        $this->db->where('tbl_product_types.product_type_name', $product_type);
        $query = $this->db->get('tbl_vehicle_categories', $this->config->item('pagination_limit'), $offset);
        echo $this->db->last_query();
    }

    function get_vehicle_type_for_menu($offset = 0) {
        $query = $this->db->get('tbl_vehicle_categories', $this->config->item('pagination_limit'), $offset);

        return $query->result_array();
    }

    function num_vehicle_type_for_menu() {
        $query = $this->db->count_all_results('tbl_vehicle_categories');
        return $query;
    }

    public function get_vichle_type_by_id($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('tbl_product_types');
        $result = $query->row();
        return $result->product_type_name;
    }

    /* Shahla: unused function */

    public function getVicleDetailsById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('tbl_product_types');
        return $query->row();
    }

    public function getImagePath($vehicle_category_icon) {

        $ImagePath = '&nbsp;&nbsp;<img alt="Kondar Global" src="assets/uploads/vehicle_categories/' . $vehicle_category_icon . '" width="35">';
        return $ImagePath;
    }

    /** function created by shahla for message handling */
    public function getMessage($msgid) {
        $message = array();
        $message[0] = 'yes';
        $message[1] = 'no';
        $message[2] = 'Thank You!<br>You Email has verified. Please Login.';
        $message[3] = 'Sorry You have something mistake';
        $message[4] = 'You have already verified.';

        return $message[$msgid];
    }

}

/* End of file super_admin_model.php */
/* Location: ./system/application/models/super_admin_model.php */

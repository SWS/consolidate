<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pro_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function product($limit, $start) {
        $this->db->order_by("id", "desc");
        $this->db->limit($limit, $start);
        $query = $this->db->get('products');

        return $query->result_array();
    }

    function record_count() {
        return $this->db->count_all("products");
    }

    // this method is used for the add category
    function add_product($post_data) {
        $this->db->insert('products', $post_data);
    }

    function add_excel_product($post_data) {


        foreach ($post_data as $data) {
            if (empty($data['A'])) {
                return false;
            }
            $query = $this->db->get_where('category', array('name' => $data['A']));
            if ($query->num_rows() == 0) {
                $this->db->set('date', date('Y-m-d'));
                $this->db->set('name', $data['A']);
                $this->db->set('status', 1);
                $this->db->insert('category');
            }
        }


        foreach ($post_data as $data) {


            if (empty($data['A']) || empty($data['B']) || empty($data['C']) || empty($data['D']) || empty($data['E']) || empty($data['F']) || empty($data['G']) || empty($data['H']) || empty($data['I']) || empty($data['J']) || empty($data['K']) || empty($data['L']) || empty($data['M']) || empty($data['N']) || empty($data['O']) || empty($data['P']) || empty($data['Q']) || empty($data['R'])) {
                return false;
            }
            $this->db->set('position', $data['R']);
            $this->db->set('name', $data['D']);
            $this->db->set('description', $data['E']);
            $this->db->set('img_name', $data['N']);
            $this->db->set('retail_price', $data['G']);
            $this->db->set('your_price', $data['J']);
            $this->db->set('size_type', $data['L']);
            $this->db->set('date', date('Y-m-d'));
            $this->db->set('category', $data['A']);
            $this->db->set('status', 1);
            $this->db->set('sn', $data['B']);
            $this->db->set('barcode', $data['C']);
            $this->db->set('whole_saler_name', $data['F']);
            $this->db->set('whole_sale_price', $data['I']);
            $this->db->set('regular_price', $data['H']);
            $this->db->set('general_size', $data['K']);
            $this->db->set('bottles_container', $data['M']);
            $this->db->set('totalwait', $data['P']);
            $this->db->set('unit_prise', $data['Q']);
            $this->db->set('best', $data['O']);
            $this->db->insert('products');
        }
        return true;
    }

    function edit_product($siteData, $id) {
        $this->db->where('id', $id);
        $this->db->update('products', $siteData);
    }

    function select_product_data($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('products');
        return $query->row_array();
    }

    function delete_product_data($id, $path) {
        $this->db->where('id', $id);
        $this->db->delete('products');

        if (unlink($path)) {
            return true;
        } else {
            return false;
        }
    }

    function delete_all_data() {
        $this->db->empty_table('products');
        $this->load->helper("file");
        $path = 'assets/templates/images/products/';
        delete_files($path);
    }

    function productByName() {
        $query = $this->db->get_where('products', array('status' => 1));

        return $query->result_array();
    }

    //  This method is used for the get category list
    function fetchCategoryList($offset) {
        $query = $this->db->get('tbl_category', RESULTS_PER_PAGE, $offset);
        return $query->result_array();
    }

    //  This method is used for the count user 
    function fetchCategoryCount() {
        $this->db->select('category_id');
        $query = $this->db->get('tbl_category');
        return $query->num_rows();
    }

    function fetchDataById($condition, $table) {

        if (!empty($condition)) {
            foreach ($condition as $fieldName => $fieldValue) {
                $this->db->where($fieldName, $fieldValue);
            }
        }

        $query = $this->db->get_where($table);
        return $query->row_array();
    }

    function deleteCategory($category_id) {
        $this->db->delete('tbl_category', array('category_id' => $category_id));
    }

    // this method is used for the get category detail by id
    function get_product_detail_by_id($id) {
        $query = $this->db->get_where('products', array('id' => $id));

        return $query->row_array();
    }

    //  this method is used for the update category detail
    function update_category_detail($siteData, $category_id) {
        $this->db->where('id', $category_id);
        $this->db->update('category', $siteData);
    }

    //  This method is used for the get category list - get all category
    function fetchAllCategory() {
        $query = $this->db->get('tbl_category');
        return $query->result_array();
    }

    function getCheckPointByCategoryid($category_id) {
        $this->db->where("category_id", $category_id);
        $query = $this->db->get('checklist');
        return $query->result_array();
    }

    function get_user_check_point($category_id, $user_id) {
        $this->db->where('category_id', $category_id);
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('users_list');
        return $query->result_array();
    }

    function getAllCheckPoint() {


        $query = $this->db->get('checklist');
        return $query->result_array();
    }

    // this method is used for the add user list
    function add_user_list($post_data) {
        $this->db->insert('users_list', $post_data);
    }

    function delete_user_check_point($id, $user_id) {

        $this->db->where('id', $id);
        $this->db->where('user_id', $user_id);
        $this->db->delete('users_list');
    }

    function add_checkpoint($post_data) {
        $this->db->insert('users_list', $post_data);
    }

    //  This method is used for the count user 
    function all_category() {

        $query = $this->db->get('tbl_category');
        return $query->result_array();
    }

//----------

    function get_models_details() {

        $this->db->select('tbl_models.*, tbl_makers.maker_name as maker_name, tbl_makers.id as maker_id');
        $this->db->from('tbl_models');
        $this->db->join('tbl_makers', 'tbl_models.maker_id = tbl_makers.id', 'left');

        $query = $this->db->get();
        return $query->result_array();
    }

    function deleteallproductmodels() {
        $this->db->empty_table('tbl_models');
    }

    function deleteSelectedproductmodel($id) {
        $this->db->delete('tbl_models', array('id' => $id));
        return TRUE;
    }

}

// END Category_model Class

/* End of file category_model.php */
/* Location: ./application/models/category_model.php */
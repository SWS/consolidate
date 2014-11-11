<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Product_type_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function check_serial_number($code) {

        $query = $this->db->get_where('serial_code', array('code' => $code));
        return $query->result();
    }

    function search_producttype_data($table, $key, $field1) {
        $this->db->select('tbl_product_types.*, tbl_vehicle_categories.category_name as category_name, tbl_vehicle_categories.id as cat_id');
        $this->db->from($table);
        $this->db->join('tbl_vehicle_categories', 'tbl_product_types.vehicle_category_id = tbl_vehicle_categories.id');
        if ($key != "") {
            $this->db->like($field1, $key);
        }

        $query = $this->db->get();


        return $query->result_array();
    }

    function deleteallproducttypes() {
        $this->db->empty_table('tbl_product_types');
    }

    function deleteSelectedproducttypes($id) {
        $this->db->delete('tbl_product_types', array('id' => $id));
        return TRUE;
    }

}

/* End of file super_admin_model.php */
/* Location: ./system/application/models/super_admin_model.php */
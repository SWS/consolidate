<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Vehicle_categories_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function search_vehicle_category_data($table, $key, $field1) {
        if ($key != "") {
            $this->db->like($field1, $key);
        }
        $query = $this->db->get($table);


        return $query->result_array();
    }

    function deleteallvehiclecategories() {
        $this->db->empty_table('tbl_vehicle_categories');
    }

    function deleteSelectedvehiclecategories($id) {
        $this->db->delete('tbl_vehicle_categories', array('id' => $id));
        return TRUE;
    }

}

/* End of file super_admin_model.php */
/* Location: ./system/application/models/super_admin_model.php */
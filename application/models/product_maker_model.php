<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Product_maker_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function search_maker_data($table, $key, $field1) {
        //$query='SELECT * FROM '.$table.' WHERE 1=1';

        if ($key != "") {
            //$query .= ' AND '.$field1.' LIKE "%'.$key.'%" ';
            $this->db->like($field1, $key);
        }
        $query = $this->db->get($table);
        //$this->db->query($query);

        return $query->result_array();
    }

    function deleteallproductmakers() {
        $this->db->empty_table('tbl_makers');
    }

    function deleteSelectedproductmaker($id) {
        $this->db->delete('tbl_makers', array('id' => $id));
        return TRUE;
    }

}

/* End of file super_admin_model.php */
/* Location: ./system/application/models/super_admin_model.php */
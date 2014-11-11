<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Common_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    //  This method is used for the get category list - get all category
    function fetchAllSponser() {
        $query = $this->db->get('tbl_sponser');
        return $query->result_array();
    }

    function fetchAllAdvertis() {
        $query = $this->db->get('tbl_advt');
        return $query->result_array();
    }

    function fetchAllLink() {
        $query = $this->db->get('tbl_link');
        return $query->result_array();
    }

    function fetchAllCategory() {
        $query = $this->db->get('tbl_category');
        return $query->result_array();
    }

    function getDistAppSupportByEmail($str_email = '') {
        $this->db->limit(1);
        $query = $this->db->get_where('tbl_dist_app_support', array('str_email' => $str_email));
        return $query;
    }

}
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Search_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function autosuggest_searchpart($term = NULL) {
        $this->db->select('kgt_ref_number,fmsi_ref_number,knect,filtron,purflux,mann,mecafilter,oem_part_number,fleet,baldwin,wva,others');
        $this->db->from('tbl_products');
        $this->db->like('kgt_ref_number', $term, 'after');
        $this->db->or_like('fmsi_ref_number', $term, 'after');
        $this->db->or_like('knect', $term, 'after');
        $this->db->or_like('filtron', $term, 'after');
        $this->db->or_like('purflux', $term, 'after');
        $this->db->or_like('mann', $term, 'after');
        $this->db->or_like('mecafilter', $term, 'after');
        $this->db->or_like('oem_part_number', $term, 'after');
        $this->db->or_like('fleet', $term, 'after');
        $this->db->or_like('baldwin', $term, 'after');
        $this->db->or_like('wva', $term, 'after');
        $this->db->or_like('others', $term, 'after');
        $query = $this->db->get();
        return $query->result_array();
    }

}

/* End of file super_admin_model.php */
/* Location: ./system/application/models/super_admin_model.php */
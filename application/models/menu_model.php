<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Menu_model extends MY_Model {

    public $_table = 'menus';

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function get_menu_info($menu_name) {

        $query = $this->db->get_where('menus', array('menu_name' => $menu_name));
        return $query->result_array();
    }

    function update_menu_info($info, $menu_name) {
        $this->db->where('menu_name', $menu_name);
        $this->db->update('menus', $info);
        return $this->db->affected_rows();
    }

    function get_all_menus() {
        //$sql = "SELECT * FROM menus";
        $query = $this->db->get('menus');
        return $query->result_array();
    }

    function insert_menu($post) {
        $this->db->set('name', $post['name']);
        $this->db->set('menu_catogery', $post['catogery']);
        $this->db->set('menu_style', $post['style']);
        $this->db->set('separater', $post['separater']);
        $this->db->set('class', $post['class']);
        $this->db->set('menu_befor_txt', $post['befotxt']);
        $this->db->set('menu_after_txt', $post['aftertxt']);
        $this->db->set('background_colur', $post['background']);
        $this->db->set('background_img', $post['imgurl']);
        $this->db->set('status', $post['status']);
        $result = $this->db->insert('menu_management');
        if ($result)
            return TRUE;
        else
            return FALSE;
    }

}

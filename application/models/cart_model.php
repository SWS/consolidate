<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cart_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_cart_details() {
        $this->db->select('cart_users.*,count(cart.id) as count_of_cart');
        $this->db->from('cart_users');
        $this->db->join('cart', 'cart_users.id = cart.user_id', 'left');
        $this->db->group_by('cart_users.id');
        $query = $this->db->get();
        return $query->result();
    }

    function get_cart_detailsbyid($id) {
        $this->db->select('cart_users.*,count(cart.id) as count_of_cart');
        $this->db->from('cart_users');
        $this->db->join('cart', 'cart_users.id = cart.user_id', 'left');
        $this->db->where('cart_users.id', $id);
        $this->db->group_by('cart_users.id');
        $query = $this->db->get();
        return $query->result();
    }

    function get_data_by_id($id) {
        $this->db->select('cart.*,cart_users.user_name as username,cart_users.id as userid,tbl_products.id as productid,tbl_products.*,tbl_vehicle_categories.id as vehicleid,tbl_vehicle_categories.category_name as veh_catname,tbl_makers.id as makerid,tbl_makers.maker_name as makername,tbl_models.id as modelid,tbl_models.model_name as modelname,tbl_product_types.product_type_name as producttype,tbl_product_types.menu_privilages_admin as menuprivilages');
        $this->db->from('cart');
        $this->db->join('cart_users', 'cart.user_id = cart_users.id', 'left');
        $this->db->join('tbl_products', 'cart.product_id = tbl_products.id', 'left');
        $this->db->join('tbl_vehicle_categories', 'tbl_products.id = tbl_vehicle_categories.id', 'left');
        $this->db->join('tbl_makers', 'tbl_products.model_id = tbl_makers.id', 'left');
        $this->db->join('tbl_models', 'tbl_products.model_id = tbl_models.id', 'left');
        $this->db->join('tbl_product_types', 'tbl_products.product_type_id = tbl_product_types.id', 'left');
        $this->db->where('cart.user_id', $id);
        ;
        $query = $this->db->get();
        return $query->result();
    }

    function getBlockDetails() {
        $query = $this->db->query('SELECT * FROM cart_block_users l JOIN (SELECT id FROM cart_block_users s  ORDER BY created_time desc ) as cart_block_users ON l.id=cart_block_users.id group by email');
        return $query->result();
    }

}

/* End of file super_admin_model.php */
/* Location: ./system/application/models/super_admin_model.php */
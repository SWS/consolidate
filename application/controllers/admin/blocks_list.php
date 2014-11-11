<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Blocks_list extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('comman_model', 'block_list_email'));
    }

//  Landing page of admin section.
    function index() {
        check_lang_admin();
        validateAdminLogin();
        $data = array();
        $data['login'] = $this->session->all_userdata();
        $data['title'] = 'Welcome To CompanyName';
        $data['active'] = 'blocks';
$data['addscripts'] = 'blocks_list';

        $select_param = "*";
        $where_param = array();
        $data['all_data'] = $this->block_list_email->get_row_in_array('block_email_list', $select_param, $where_param);

        $this->load->view('admin/header', $data);
        $this->load->view('admin/left_menu', $data);
        $this->load->view('admin/blocks_list', $data);
        $this->load->view('admin/footer', $data);
    }

    function set_lang() {
        $name = $this->input->post('lang');
        $lang = array('lang' => $name);
        $this->session->set_userdata($lang);
        echo 'success';
    }

    function blocksDeleteAll() {
        $data = array();
        $data['login'] = $this->session->all_userdata();
        validateAdminLogin();

        $block_ids = $this->input->post('block_ids');

        foreach ($block_ids as $block_id) {
            $this->blocksDeleteById($block_id);
        }

        echo "Successfully Delete";
        exit;
    }

    function delete($id = false) {
        $data = array();
        $data['login'] = $this->session->all_userdata();
        validateAdminLogin();

        $this->blocksDeleteById($id);

        $this->session->set_flashdata('success', 'Block has been removed successfully.');
        redirect('admin/blocks_list');
    }

    function blocksDeleteById($id = false) {
        $table = "block_email_list";
        $arr_ = array('int_id' => $id);

        $data = $this->comman_model->get_tabledata_block_id($table, $id);
        foreach ($data as $item) {
            if ($item['region'] == 'Career') {
                $this->comman_model->delete_block_email_by_table('apply_form', 'block', $item['str_email']);
            } else if ($item['region'] == 'Contact us') {
                $this->comman_model->delete_block_email_by_table('contact_form', 'block', $item['str_email']);
            } else if ($item['region'] == 'Cart') {
                $this->comman_model->delete_block_email_by_table('cart_block_users', 'status', $item['str_email']);
            } else if ($item['region'] == 'Promotion-Download') {
                $this->comman_model->delete_block_email_by_table('promotion_form', 'block', $item['str_email']);
            } else if ($item['region'] == 'Award') {
                $this->comman_model->delete_block_email_by_table('block_users', 'status', $item['str_email']);
            } else if ($item['region'] == 'Distribution') {
                $this->comman_model->delete_block_email_by_table('tbl_dist_app_support', 'int_block', $item['str_email']);
            }
        }
        $result = $this->comman_model->delete_by_id($table, $arr_);
    }

}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */
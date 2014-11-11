<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Front extends MY_Controller {

    public function __construct() {

        parent::__construct();

        $this->load->helper(array('assets', 'av_helper', 'cart_helper'));
        $this->load->model(array('comman_model', 'product_model', 'menu_model_ab'));
        $this->load->language(array('header', 'front', 'footer'));
    }

    function clear_cache() {

        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");

        $this->output->set_header("Pragma: no-cache");
    }

    function set_lang() {

        $name = $this->input->post('lang');

        $lang = array('lang' => $name);

        $this->session->set_userdata($lang);

        echo 'success';
    }

    function check_lang() {

        $lang = $this->session->all_userdata();

        if (isset($lang['lang']) && $lang['lang'] != '' && $lang['lang'] == 'russian') {

            $this->lang->load("common", "russian");

            $this->lang->load("user", "russian");
        } else {

            $this->lang->load("common", "english");

            $this->lang->load("user", "english");
        }
    }

    function validateLogin() {

        $logged_in = $this->session->userdata('logged_in');

        if ((isset($logged_in) || $logged_in == true) && $logged_in != "user") {

            redirect('/front', 'refresh');
        }
    }

    function get_current_time() {
        $date = date_create();
        echo date_timestamp_get($date);
    }

    function set_unblock_user() {

        $set_unblock_user = $this->comman_model->get_all_data_by_id('promotion_form', array());

        foreach ($set_unblock_user as $set_data2) {

            if ($set_data2['block'] == 1) {

                $currentTime = time();

                $blockTime = strtotime('+120 minutes', $set_data2['block_time']);

                if ($blockTime < $currentTime) {

                    $result1 = $this->comman_model->delete_by_id('promotion_form', array('id' => $set_data2['id']));
                }
            }
        }

        $set_unblock_user1 = $this->comman_model->get_all_data_by_id('apply_form', array());

        foreach ($set_unblock_user1 as $set_data2) {

            if ($set_data2['block'] == 1) {

                $currentTime = time();

                $blockTime = strtotime('+120 minutes', $set_data2['block_time']);

                if ($blockTime < $currentTime) {

                    $result1 = $this->comman_model->delete_by_id('apply_form', array('id' => $set_data2['id']));
                }
            }
        }
    }

    public function index() {
        $data = array();
        $this->load->model('home_page_model');
        $this->load->model('country_model');
        $data['all_data'] = $this->home_page_model->as_array()->get(1);
        $data['country_data'] = $this->country_model->as_array()->get_many_by(array('status' => 1));
        $data['login'] = $this->session->all_userdata();
        $data['menus'] = $this->menu_model_ab->as_array()->get_all();
        $headerdata['title'] = $this->_configs['title'];

        $this->load->view('master/include/header_welcome', $headerdata);
        $this->load->view('master/home/welcome', $data);
        $this->load->view('master/include/footer');
    }

    public function home($page = false) {
        $this->check_lang();
        $data = array();
        $data['title'] = "Welcome To Company Name";
        $data['active'] = "home";
        $data['menu_vehicle_categories'] = $this->comman_model->all_data('tbl_vehicle_categories');
        $data['menu_product_types'] = $this->comman_model->get_product_type_for_menu();
        $data['all_data'] = $this->comman_model->get_data_by_id('home_page', array('id' => 1));
        $data['page_data'] = $this->comman_model->get_all_data_by_id('content', array('status' => 1));
        $data['slider_data'] = $this->comman_model->get_all_data_by_id('slider', array('status' => 1));
        $data['country_data'] = $this->comman_model->get_all_data_by_id('country', array('status' => 1));
        $data['product_catagory'] = $this->product_model->getallvehiclecategory_data('tbl_vehicle_categories');
        $data['product_makers'] = $this->product_model->get_all_makers_by_type();
        $data['product_models'] = $this->comman_model->all_data('tbl_models');
        $data['product_types'] = $this->product_model->getall_producttype_data('tbl_product_types');
        $cart = $this->session->userdata('cart');
        $data['cartcount'] = getcartcount($cart);
        if ($page == 'car') {
            $this->load->view('temp/car', $data);
        } else if ($page == 'contact_us') {
            $this->load->view('temp/contact_us', $data);
        } else {
            $this->load->view('temp/include/header', $data);
            $this->load->view('temp/home', $data);
            $this->load->view('temp/footer', $data);
        }
    }

    function menu($id = false) {

        $this->check_lang();

        if (!$id) {

            redirect('front');
        }

        $data = array();

        $data['title'] = "Welcome To Company Name";

        $data['active'] = "home";

        $data['login'] = $this->session->all_userdata();

        $data['category'] = $this->comman_model->get_data_by_id('menu_category', array('id' => $id));

        $data['all_data'] = $this->comman_model->get_all_data_by_id('menu_content', array('menu_id' => $id));

        $data['menu_vehicle_categories'] = $this->comman_model->all_data('tbl_vehicle_categories');

        $data['menu_product_types'] = $this->comman_model->get_product_type_for_menu();

        $data['cartcount'] = $this->getcartcount();

        $this->load->view('templates/header', $data);

        $this->load->view('templates/menu', $data);

        $this->load->view('templates/menu_content');

        $this->load->view('templates/footer');
    }

    function get_data() {
        $this->load->model("block_list_email");
        $id = $this->input->post('id');
        $select_param = array("link", "alt", "image");
        $where_param = array();
        $where_param['status'] = 1;
        $where_param['set_image'] = $id;
        $check1 = $this->block_list_email->get_row_in_array('product_image', $select_param, $where_param);

        if (empty($check1)) {
            echo 'Not calculate.';
        } else {
            echo json_encode($check1);
        }
    }

}

/* End of file welcome.php */

/* Location: ./application/controllers/welcome.php */
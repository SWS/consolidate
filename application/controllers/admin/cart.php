<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cart extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('comman_model', 'cart_model'));
    }

    function index() {
        check_lang_admin();
        validateAdminLogin();

        $data = array();
        $data['login'] = $this->session->all_userdata();
        $data['title'] = 'List Order Details';
        $data['active'] = 'cart';
$data['addscripts'] = 'cart_list';

        $key = $this->input->post('search');

        $data['all_data'] = $this->cart_model->get_cart_details();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/left_menu', $data);
        $this->load->view('admin/cart_list', $data);
        $this->load->view('admin/footer', $data);
    }

    function deleteAll() {
        $data = array();
        $data['login'] = $this->session->all_userdata();
        validateAdminLogin();
        $block_ids = $this->input->post('block_ids');
        $table = $this->input->post('table');
        $result = $this->comman_model->deleteAllById($table, $block_ids);
        $this->comman_model->deleteAllById('cart', $block_ids, 'user_id');
        echo "Successfully Delete";
        exit;
    }

    function delete($id) {
        $result = $this->comman_model->delete_by_id('cart_users', array('id' => $id));
        $result = $this->comman_model->delete_by_id('cart', array('user_id' => $id));
        $this->session->set_flashdata('success', 'Order has successfully deleted.');
        redirect('admin/cart');
    }

    function listcart($id = false) {
        check_lang_admin();
        validateAdminLogin();
        $data = array();
        $data['login'] = $this->session->all_userdata();
        $data['title'] = 'List Order Details';
        $data['active'] = 'cart';
$data['addscripts'] = 'list_cart_details';

        $data['main_data'] = $this->cart_model->get_cart_detailsbyid($id);
        $data['all_data'] = $this->cart_model->get_data_by_id($id);

        $this->load->view('admin/header', $data);
        $this->load->view('admin/left_menu', $data);
        $this->load->view('admin/list_cart_details', $data);
        $this->load->view('admin/footer', $data);
    }

    function add_serial() {
        validateAdminLogin();
        $data = array();
        $data['login'] = $this->session->all_userdata();
        $data['title'] = 'Serial Code';
        $data['active'] = 'serial';
        $data['sub_menu'] = 'add_article';
        if ($this->input->post('operation')) {
            $post_data = array(
                'title' => $this->input->post('title'),
                'code' => $this->input->post('code'),
                'part_number' => $this->input->post('part_number'),
                'status' => $this->input->post('status'),
                'created_date' => date('Y-m-d')
            );
            $result = $this->comman_model->add('serial_code', $post_data);
            $this->session->set_flashdata('success', 'Serial Code has been successfully added.');
            redirect('admin/serial');
        }
        $this->load->view('admin/header', $data);
        $this->load->view('admin/left_menu', $data);
        $this->load->view('admin/add_serial', $data);
        $this->load->view('admin/footer', $data);
    }

    function edit_serial($id = false) {
        if (!$id) {
            redirect('admin/serial');
        }
        validateAdminLogin();
        $data = array();
        $data['login'] = $this->session->all_userdata();
        $data['title'] = 'Serial code';

        $edit_data = $this->comman_model->get_data_by_id('serial_code', array('id' => $id));

        if ($this->input->post('status') == '1') {
            $this->comman_model->delete_blocked_id('winner_list', array('serial_id' => $edit_data["id"]));
        }

        if ($this->input->post('operation')) {
            $post_data = array(
                'title' => $this->input->post('title'),
                'code' => $this->input->post('code'),
                'part_number' => $this->input->post('part_number'),
                'status' => $this->input->post('status')
            );

            $result = $this->comman_model->update_data_by_id('serial_code', $post_data, 'id', $id);
            $this->session->set_flashdata('success', 'Serial Code has been successfully updated.');
            redirect('admin/serial');
        }
        $data['edit_data'] = $this->comman_model->get_data_by_id('serial_code', array('id' => $id));
        $data['winners_entry'] = $this->comman_model->get_data_by_id('winner_list', array('serial_id' => $id));
        $this->load->view('admin/header', $data);
        $this->load->view('admin/left_menu', $data);
        $this->load->view('admin/edit_serial', $data);
        $this->load->view('admin/footer', $data);
    }

    function blocked() {
        check_lang_admin();
        validateAdminLogin();
        $data = array();
        $data['login'] = $this->session->all_userdata();
        $data['title'] = 'Order Blocked Users List';
        $data['active'] = 'cart_blocked';
$data['addscripts'] = 'cart_blocked_list';

        $data['all_data'] = $this->cart_model->getBlockDetails();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/left_menu', $data);
        $this->load->view('admin/cart_blocked_list', $data);
        $this->load->view('admin/footer', $data);
    }

    function delete_blocked($id) {
        $where = 'status';
        $data = $this->comman_model->get_tabledata_by_id('cart_block_users', $id, $where);
        foreach ($data as $item) {
            $this->comman_model->delete_block_email_list_by_id($item['email']);
        }
        $result = $this->comman_model->delete_blocked_id('cart_block_users', array('id' => $id));
        $this->session->set_flashdata('success', 'Blocked user successfully deleted.');
        redirect('admin/cart/blocked');
    }

    function delete_blocked_all() {
        $result = $this->comman_model->delete_blocked_all('cart_block_users');
        $this->session->set_flashdata('success', 'Deleted all blocked users.');
        redirect('admin/cart/blocked');
    }

}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */

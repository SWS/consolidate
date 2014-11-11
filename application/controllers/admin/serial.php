<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Serial extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('comman_model', 'serial_model'));
    }

    function deleteAll() {
        $data = array();
        $data['login'] = $this->session->all_userdata();
        validateAdminLogin();

        $block_ids = $this->input->post('block_ids');
        $table = $this->input->post('table');
        $result = $this->comman_model->deleteAllById($table, $block_ids);

        echo "Successfully Delete";
        exit;
    }

    function index() {

        check_lang_admin();
        validateAdminLogin();

        $data = array();
        $data['login'] = $this->session->all_userdata();
        $data['title'] = 'Serial code';
        $data['active'] = 'serial';
$data['addscripts'] = 'serial_list';

        $key = $this->input->post('search');

        $data['all_data'] = $this->serial_model->search_serial_data('serial_code', $key, 'code', 'part_number');
        $this->load->view('admin/header', $data);
        $this->load->view('admin/left_menu', $data);
        $this->load->view('admin/serial_list', $data);
        $this->load->view('admin/footer', $data);
    }

    function delete($id) {

        $result = $this->comman_model->delete_by_id('serial_code', array('id' => $id));
        $this->session->set_flashdata('success', 'Serial code has successfully deleted.');
        redirect('admin/serial');
    }

    function delete_winner($id) {
        $result = $this->comman_model->delete_winner_id('winner_list', array('id' => $id));
        $this->session->set_flashdata('success', 'Winner successfully deleted.');
        redirect('admin/serial/winners');
    }

    function add_serial() {
        check_lang_admin();
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
        check_lang_admin();
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

    function winners() {
        check_lang_admin();
        validateAdminLogin();
        $data = array();
        $data['login'] = $this->session->all_userdata();
        $data['title'] = 'Winner list';
        $data['active'] = 'winner_list';
$data['addscripts'] = 'winner_list';
        $data['all_data'] = $this->comman_model->search_serial_data('winner_list');
        $data['countries'] = $this->comman_model->search_serial_data('countries');
        $data['serial_codes'] = $this->comman_model->search_serial_data('serial_code');
        $this->load->view('admin/header', $data);
        $this->load->view('admin/left_menu', $data);
        $this->load->view('admin/winner_list', $data);
        $this->load->view('admin/footer', $data);
    }

    function blocked()
    {
        check_lang_admin();
        validateAdminLogin();
        $data = array();
        $data['login'] = $this->session->all_userdata();
        $data['title'] = 'Blocked Users List';
        $data['active'] = 'blocked';
$data['addscripts'] = 'blocked_list';

        $data['all_data'] = $this->serial_model->getBlockDetails();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/left_menu', $data);
        $this->load->view('admin/blocked_list', $data);
        $this->load->view('admin/footer', $data);
    }

    function delete_blocked($id)
    {
        $result = $this->comman_model->delete_blocked_id('block_users', array('id' => $id));
        $this->session->set_flashdata('success', 'Blocked user successfully deleted.');
        redirect('admin/serial/blocked');
    }

    function delete_blocked_all() {
        $result = $this->comman_model->delete_blocked_all('block_users');
        $this->session->set_flashdata('success', 'Deleted all blocked users.');
        redirect('admin/serial/blocked');
    }

    function view_winner($id) {
        check_lang_admin();
        validateAdminLogin();
        $data = array();
        $data['login'] = $this->session->all_userdata();
        $data['title'] = 'View winner';
        $data['active'] = 'view_winner';
$data['addscripts'] = 'view_winner';
        $data['set_data'] = $this->comman_model->get_winner_by_id('winner_list', array('id' => $id));
        $this->load->view('admin/header', $data);
        $this->load->view('admin/left_menu', $data);
        $this->load->view('admin/view_winner', $data);
        $this->load->view('admin/footer', $data);
    }

}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */
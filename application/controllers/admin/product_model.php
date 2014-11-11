<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Product_model extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('comman_model', 'pro_model'));
    }

    function index() {
        check_lang_admin();
        validateAdminLogin();
        $data = array();
        $data['login'] = $this->session->all_userdata();
        $data['title'] = 'Product Model';
        $data['active'] = 'product_model';
        $data['addscripts'] = 'product_model_list';

        if ($this->input->post('DeleteAll')) {
            $this->pro_model->deleteallproductmodels();
            $files = glob('assets/uploads/product_model/*'); // get all file names
            foreach ($files as $file) { // iterate files
                if (is_file($file))
                    unlink($file); // delete file
            }

            $files = glob('assets/uploads/product_images/*'); // get all file names
            foreach ($files as $file) { // iterate files
                if (is_file($file))
                    unlink($file); // delete file
            }
        }
        if ($this->input->post('DeleteSelected')) {

            $selectedproductmodeltodelete = $this->input->post('deleteitem');

            foreach ($selectedproductmodeltodelete as $modeltodelete) {

                $p_type_data = $this->comman_model->get_data_by_id('tbl_models', array('id' => $modeltodelete));

                $product_data = $this->comman_model->get_all_data_by_id('tbl_products', array('model_id' => $modeltodelete));

                $result = $this->pro_model->deleteSelectedproductmodel($modeltodelete);

                if ($result) {

                    if (file_exists("assets/uploads/product_model/" . $p_type_data['model_photo']))
                        unlink("assets/uploads/product_model/" . $p_type_data['model_photo']);

                    foreach ($product_data as $item) {

                        if (file_exists("assets/uploads/product_images/" . $item['drawing_photo']))
                            unlink("assets/uploads/product_images/" . $item['drawing_photo']);

                        if (file_exists("assets/uploads/product_images/" . $item['product_photo']))
                            unlink("assets/uploads/product_images/" . $item['product_photo']);

                        if (file_exists("assets/uploads/product_images/" . $item['vehicle_photo']))
                            unlink("assets/uploads/product_images/" . $item['vehicle_photo']);
                    }
                }
            }
        }

        $data['all_data'] = $this->pro_model->get_models_details();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/left_menu', $data);
        $this->load->view('admin/product_model_list', $data);
        $this->load->view('admin/footer', $data);
    }

    function delete_model($id) {
        $p_type_data = $this->comman_model->get_data_by_id('tbl_models', array('id' => $id));
        $product_data = $this->comman_model->get_all_data_by_id('tbl_products', array('model_id' => $id));
        $result = $this->comman_model->delete_winner_id('tbl_models ', array('id' => $id));

        if ($result) {

            if (file_exists("assets/uploads/product_model/" . $p_type_data['model_photo']))
                unlink("assets/uploads/product_model/" . $p_type_data['model_photo']);

            foreach ($product_data as $item) {

                if (file_exists("assets/uploads/product_images/" . $item['drawing_photo']))
                    unlink("assets/uploads/product_images/" . $item['drawing_photo']);

                if (file_exists("assets/uploads/product_images/" . $item['product_photo']))
                    unlink("assets/uploads/product_images/" . $item['product_photo']);

                if (file_exists("assets/uploads/product_images/" . $item['vehicle_photo']))
                    unlink("assets/uploads/product_images/" . $item['vehicle_photo']);
            }
        }

        $this->session->set_flashdata('success', 'Product Model successfully deleted.');
        redirect('admin/product_model');
    }

    function add_model() {

        check_lang_admin();
        validateAdminLogin();

        $data = array();
        $data['login'] = $this->session->all_userdata();
        $data['title'] = 'Product Model';
        $data['active'] = 'product_model';
        $data['sub_menu'] = 'add_article';
        $data['addscripts'] = 'add_model';
        
        if ($this->input->post('operation')) {
            $field_name1 = 'pro_modelimage';
            $config['upload_path'] = './assets/uploads/product_model';
            $config['allowed_types'] = 'gif|jpg|png|pdf|jpeg';
            $config['max_size'] = '1024';
            $config['max_width'] = '100000';
            $config['max_height'] = '10000';
            $this->load->library('upload', $config);

            $post_data = array(
                'model_name' => $this->input->post('pro_modelname'),
                'kgt_ref_number' => $this->input->post('ref_no'),
                'maker_id' => $this->input->post('maker_id'),
                'status' => $this->input->post('status'),
                'created_date' => date('Y-m-d')
            );

            $this->upload->do_upload($field_name1);
            $upload_data = $this->upload->data();
            $post_data['model_photo'] = $upload_data['file_name'];

            $result = $this->comman_model->add('tbl_models', $post_data);
            $this->session->set_flashdata('success', 'Product Model has been successfully added.');
            redirect('admin/product_model');
        }
        $data['maker_info'] = $this->comman_model->all_data('tbl_makers');
        $this->load->view('admin/header', $data);
        $this->load->view('admin/left_menu', $data);
        $this->load->view('admin/add_model', $data);
        $this->load->view('admin/footer', $data);
    }

    function edit_model($id = false) {
        if (!$id) {
            redirect('admin/product_model');
        }

        check_lang_admin();
        validateAdminLogin();

        $data = array();
        $data['login'] = $this->session->all_userdata();
        $data['title'] = 'Product Model';
$data['addscripts'] = 'edit_product_model';

        if ($this->input->post('operation')) {
            $field_name1 = 'pro_modelimage';
            $config['upload_path'] = './assets/uploads/product_model';
            $config['allowed_types'] = 'gif|jpg|png|pdf|jpeg';
            $config['max_size'] = '1024';
            $config['max_width'] = '100000';
            $config['max_height'] = '10000';
            $this->load->library('upload', $config);

            $post_data = array(
                'model_name' => $this->input->post('pro_modelname'),
                'kgt_ref_number' => $this->input->post('pro_modelref_no'),
                'maker_id' => $this->input->post('maker_id'),
                'status' => $this->input->post('status')
            );


            $this->upload->do_upload($field_name1);
            $upload_data = $this->upload->data();
            if ($upload_data['file_name'] != '')
                $post_data['model_photo'] = $upload_data['file_name'];


            $p_type_data = $this->comman_model->get_data_by_id('tbl_models', array('id' => $id));

            $result = $this->comman_model->update_data_by_id('tbl_models', $post_data, 'id', $id);

            if ($result && $post_data['model_photo']) {

                if (file_exists("assets/uploads/product_model/" . $p_type_data['model_photo']))
                    unlink("assets/uploads/product_model/" . $p_type_data['model_photo']);
            }

            $this->session->set_flashdata('success', 'Product Model has been successfully updated.');
            redirect('admin/product_model');
        }
        $data['maker_info'] = $this->comman_model->all_data('tbl_makers');
        $data['edit_data'] = $this->comman_model->get_data_by_id('tbl_models', array('id' => $id));
        $this->load->view('admin/header', $data);
        $this->load->view('admin/left_menu', $data);
        $this->load->view('admin/edit_product_model', $data);
        $this->load->view('admin/footer', $data);
    }

}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */
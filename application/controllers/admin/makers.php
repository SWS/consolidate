<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Makers extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model(array('comman_model', 'product_maker_model'));
    }

    function index() {
        check_lang_admin();
        validateAdminLogin();
        $data = array();
        $data['login'] = $this->session->all_userdata();
        $data['title'] = 'Product Makers';
        $data['active'] = 'makers';
$data['addscripts'] = 'makers_list';

        if ($this->input->post('DeleteAll')) {

            $this->product_maker_model->deleteallproductmakers();

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

            $files = glob('assets/uploads/product_maker/*'); // get all file names
            foreach ($files as $file) { // iterate files
                if (is_file($file))
                    unlink($file); // delete file
            }
        }
        if ($this->input->post('DeleteSelected')) {
            $selectedproductmakertodelete = $this->input->post('deleteitem');

            foreach ($selectedproductmakertodelete as $makertodelete) {

                $p_type_data = $this->comman_model->get_data_by_id('tbl_makers', array('id' => $makertodelete));

                $product_data = $this->comman_model->get_all_data_by_id('tbl_products', array('maker_id' => $makertodelete));

                $models_data = $this->comman_model->get_all_data_by_id('tbl_models', array('maker_id' => $makertodelete));

                $result = $this->product_maker_model->deleteSelectedproductmaker($makertodelete);

                if ($result) {

                    if (file_exists("assets/uploads/product_maker/" . $p_type_data['maker_logo']))
                        unlink("assets/uploads/product_maker/" . $p_type_data['maker_logo']);

                    foreach ($product_data as $item) {

                        if (file_exists("assets/uploads/product_images/" . $item['drawing_photo']))
                            unlink("assets/uploads/product_images/" . $item['drawing_photo']);

                        if (file_exists("assets/uploads/product_images/" . $item['product_photo']))
                            unlink("assets/uploads/product_images/" . $item['product_photo']);

                        if (file_exists("assets/uploads/product_images/" . $item['vehicle_photo']))
                            unlink("assets/uploads/product_images/" . $item['vehicle_photo']);
                    }

                    foreach ($models_data as $model) {

                        if (file_exists("assets/uploads/product_model/" . $model['model_photo']))
                            unlink("assets/uploads/product_model/" . $item['model_photo']);
                    }
                }
            }
        }

        $key = $this->input->post('search');
        $data['all_data'] = $this->product_maker_model->search_maker_data('tbl_makers', $key, 'maker_name');
        $data['search'] = $key;
        $this->load->view('admin/header', $data);
        $this->load->view('admin/left_menu', $data);
        $this->load->view('admin/makers_list', $data);
        $this->load->view('admin/footer', $data);
    }

    function delete_maker($id) {
        $p_type_data = $this->comman_model->get_data_by_id('tbl_makers', array('id' => $id));
        $product_data = $this->comman_model->get_all_data_by_id('tbl_products', array('maker_id' => $id));
        $models_data = $this->comman_model->get_all_data_by_id('tbl_models', array('maker_id' => $id));
        $result = $this->comman_model->delete_winner_id('tbl_makers ', array('id' => $id));

        if ($result) {

            if (file_exists("assets/uploads/product_maker/" . $p_type_data['maker_logo']))
                unlink("assets/uploads/product_maker/" . $p_type_data['maker_logo']);

            foreach ($product_data as $item) {

                if (file_exists("assets/uploads/product_images/" . $item['drawing_photo']))
                    unlink("assets/uploads/product_images/" . $item['drawing_photo']);

                if (file_exists("assets/uploads/product_images/" . $item['product_photo']))
                    unlink("assets/uploads/product_images/" . $item['product_photo']);

                if (file_exists("assets/uploads/product_images/" . $item['vehicle_photo']))
                    unlink("assets/uploads/product_images/" . $item['vehicle_photo']);
            }

            foreach ($models_data as $model) {

                if (file_exists("assets/uploads/product_model/" . $model['model_photo']))
                    unlink("assets/uploads/product_model/" . $item['model_photo']);
            }
        }

        $this->session->set_flashdata('success', 'Product Maker successfully deleted.');
        redirect('admin/makers');
    }

    function add_productmakers() {
        check_lang_admin();
        validateAdminLogin();

        $data = array();
        $data['login'] = $this->session->all_userdata();
        $data['title'] = 'Product Makers';
        $data['active'] = 'makers';
        $data['sub_menu'] = 'add_article';
$data['addscripts'] = 'add_productmakers';

        if ($this->input->post('operation')) {
            $field_name1 = 'pro_makerlogo';
            $config['upload_path'] = './assets/uploads/product_maker';
            $config['allowed_types'] = 'gif|jpg|png|pdf';
            $config['max_size'] = '1024';
            $config['max_width'] = '100000';
            $config['max_height'] = '10000';
            $this->load->library('upload', $config);

            $post_data = array(
                'maker_name' => $this->input->post('pro_makername'),
                'status' => $this->input->post('status'),
                'created_date' => date('Y-m-d')
            );

            $this->upload->do_upload($field_name1);
            $upload_data = $this->upload->data();
            $post_data['maker_logo'] = $upload_data['file_name'];

            $result = $this->comman_model->add('tbl_makers', $post_data);
            $this->session->set_flashdata('success', 'Product Makers has been successfully added.');
            redirect('admin/makers');
        }
        $this->load->view('admin/header', $data);
        $this->load->view('admin/left_menu', $data);
        $this->load->view('admin/add_productmakers', $data);
        $this->load->view('admin/footer', $data);
    }

    function edit_maker($id = false) {
        if (!$id) {
            redirect('admin/makers');
        }

        check_lang_admin();
        validateAdminLogin();

        $data = array();
        $data['login'] = $this->session->all_userdata();
        $data['title'] = 'Product Maker';
$data['addscripts'] = 'edit_maker';

        if ($this->input->post('operation')) {
            $field_name1 = 'pro_makerlogo';
            $config['upload_path'] = './assets/uploads/product_maker';
            $config['allowed_types'] = 'gif|jpg|png|pdf';
            $config['max_size'] = '1024';
            $config['max_width'] = '100000';
            $config['max_height'] = '10000';
            $this->load->library('upload', $config);

            $post_data = array(
                'maker_name' => $this->input->post('pro_makername'),
                'status' => $this->input->post('status')
            );

            $this->upload->do_upload($field_name1);
            $upload_data = $this->upload->data();
            if ($upload_data['file_name'] != '')
                $post_data['maker_logo'] = $upload_data['file_name'];


            $all_data = $this->comman_model->get_data_by_id('tbl_makers', array('id' => $id));

            $result = $this->comman_model->update_data_by_id('tbl_makers', $post_data, 'id', $id);

            if ($result && $post_data['maker_logo']) {

                if (file_exists("assets/uploads/product_maker/" . $all_data['maker_logo']))
                    unlink("assets/uploads/product_maker/" . $all_data['maker_logo']);
            }


            $this->session->set_flashdata('success', 'Product Maker has been successfully updated.');
            redirect('admin/makers');
        }
        $data['edit_data'] = $this->comman_model->get_data_by_id('tbl_makers', array('id' => $id));
        $this->load->view('admin/header', $data);
        $this->load->view('admin/left_menu', $data);
        $this->load->view('admin/edit_maker', $data);
        $this->load->view('admin/footer', $data);
    }
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */
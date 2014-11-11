<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Vehicle_categories extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('comman_model', 'serial_model', 'vehicle_categories_model'));
    }

    function index() {
        check_lang_admin();
        validateAdminLogin();

        $data = array();
        $data['login'] = $this->session->all_userdata();
        $data['title'] = 'Vehicle Category';
        $data['active'] = 'vehicle_categories';
$data['addscripts'] = 'product_catagory_list';

        if ($this->input->post('DeleteAll')) {
            $this->vehicle_categories_model->deleteallvehiclecategories();

            $files = glob('assets/uploads/vehicle_categories/*'); // get all file names
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
            $selectedvehiclecategories = $this->input->post('deleteitem');
            foreach ($selectedvehiclecategories as $vehtodelete) {

                $p_type_data = $this->comman_model->get_data_by_id('tbl_vehicle_categories', array('id' => $vehtodelete));

                $product_data = $this->comman_model->get_all_data_by_id('tbl_products', array('vehicle_category_id' => $vehtodelete));

                $result = $this->vehicle_categories_model->deleteSelectedvehiclecategories($vehtodelete);

                if ($result) {

                    if (file_exists("assets/uploads/vehicle_categories/" . $p_type_data['VehicleType_Photo']))
                        unlink("assets/uploads/vehicle_categories/" . $p_type_data['VehicleType_Photo']);

                    if (file_exists("assets/uploads/vehicle_categories/" . $p_type_data['vehicle_category_icon']))
                        unlink("assets/uploads/vehicle_categories/" . $p_type_data['vehicle_category_icon']);

                    if (file_exists("assets/uploads/vehicle_categories/" . $p_type_data['menu_image']))
                        unlink("assets/uploads/vehicle_categories/" . $p_type_data['menu_image']);

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

        $key = $this->input->post('search');
        $null = '';
        $data['all_data'] = $this->vehicle_categories_model->search_vehicle_category_data('tbl_vehicle_categories', $key, 'category_name');
        $data['search'] = $key;
        $this->load->view('admin/header', $data);
        $this->load->view('admin/left_menu', $data);
        $this->load->view('admin/product_catagory_list', $data);
        $this->load->view('admin/footer', $data);
    }

    function delete($id) {


        $p_type_data = $this->comman_model->get_data_by_id('tbl_vehicle_categories', array('id' => $id));

        $product_data = $this->comman_model->get_all_data_by_id('tbl_products', array('vehicle_category_id' => $id));

        $result = $this->comman_model->delete_by_id('tbl_vehicle_categories', array('id' => $id));

        if ($result) {

            if (file_exists("assets/uploads/vehicle_categories/" . $p_type_data['VehicleType_Photo']))
                unlink("assets/uploads/vehicle_categories/" . $p_type_data['VehicleType_Photo']);

            if (file_exists("assets/uploads/vehicle_categories/" . $p_type_data['vehicle_category_icon']))
                unlink("assets/uploads/vehicle_categories/" . $p_type_data['vehicle_category_icon']);

            if (file_exists("assets/uploads/vehicle_categories/" . $p_type_data['menu_image']))
                unlink("assets/uploads/vehicle_categories/" . $p_type_data['menu_image']);

            foreach ($product_data as $item) {

                if (file_exists("assets/uploads/product_images/" . $item['drawing_photo']))
                    unlink("assets/uploads/product_images/" . $item['drawing_photo']);

                if (file_exists("assets/uploads/product_images/" . $item['product_photo']))
                    unlink("assets/uploads/product_images/" . $item['product_photo']);

                if (file_exists("assets/uploads/product_images/" . $item['vehicle_photo']))
                    unlink("assets/uploads/product_images/" . $item['vehicle_photo']);
            }
        }


        $this->session->set_flashdata('success', 'Vehicle category has successfully deleted.');
        redirect('admin/vehicle_categories');
    }

    function add_product_category() {
        check_lang_admin();
        validateAdminLogin();

        $data = array();
        $data['login'] = $this->session->all_userdata();
        $data['title'] = 'Vehicle Category';
        $data['active'] = 'vehicle_categories';
        $data['sub_menu'] = 'add_article';
        $data['addscripts'] = 'add_product_category';

        if ($this->input->post('operation')) {

            $field_name1 = 'VehicleType_Photo';
            $field_name2 = 'vehicle_category_icon';
            $field_name3 = 'menu_image';
            $config['upload_path'] = './assets/uploads/vehicle_categories';
            $config['allowed_types'] = 'gif|jpg|png|pdf';
            $config['max_size'] = '1024';
            $config['max_width'] = '100000';
            $config['max_height'] = '10000';
            $this->load->library('upload', $config);

            $post_data = array(
                'category_name' => $this->input->post('category_name'),
                'status' => $this->input->post('status'),
                'created_date' => date('Y-m-d')
            );
            $this->upload->do_upload($field_name1);
            $upload_data = $this->upload->data();
            if ($upload_data['file_name'] != '')
                $post_data['VehicleType_Photo'] = $upload_data['file_name'];

            $this->upload->do_upload($field_name2);
            $upload_data2 = $this->upload->data();
            if ($upload_data2['file_name'] != '')
                $post_data['vehicle_category_icon'] = $upload_data2['file_name'];


            $this->upload->do_upload($field_name3);
            $upload_data3 = $this->upload->data();
            if ($upload_data3['file_name'] != '')
                $post_data['menu_image'] = $upload_data3['file_name'];

            $result = $this->comman_model->add('tbl_vehicle_categories', $post_data);
            $this->session->set_flashdata('success', 'Vehicle category has been successfully added.');
            redirect('admin/vehicle_categories');
        }
        $this->load->view('admin/header', $data);
        $this->load->view('admin/left_menu', $data);
        $this->load->view('admin/add_product_category', $data);
        $this->load->view('admin/footer', $data);
    }

    function edit_product_category($id = false) {
        if (!$id) {
            redirect('admin/vehicle_categories');
        }

        check_lang_admin();
        validateAdminLogin();

        $data = array();
        $data['login'] = $this->session->all_userdata();
        $data['title'] = 'Vehicle Category';
$data['addscripts'] = 'edit_product_category';

        $edit_data = $this->comman_model->get_data_by_id('serial_code', array('id' => $id));

        if ($this->input->post('status') == '1') {
            $this->comman_model->delete_blocked_id('winner_list', array('serial_id' => $edit_data["id"]));
        }



        if ($this->input->post('operation')) {

            $field_name1 = 'VehicleType_Photo';
            $field_name2 = 'vehicle_category_icon';
            $field_name3 = 'menu_image';
            $config['upload_path'] = './assets/uploads/vehicle_categories';
            $config['allowed_types'] = 'gif|jpg|png|pdf';
            $config['max_size'] = '1024';
            $config['max_width'] = '100000';
            $config['max_height'] = '10000';
            $this->load->library('upload', $config);
            $post_data = array(
                'category_name' => $this->input->post('category_name'),
                'status' => $this->input->post('status')
            );
            $this->upload->do_upload($field_name1);
            $upload_data = $this->upload->data();
            if ($upload_data['file_name'] != '')
                $post_data['VehicleType_Photo'] = $upload_data['file_name'];
            $this->upload->initialize($config);
            $this->upload->do_upload($field_name2);
            $upload_data2 = $this->upload->data();
            if ($upload_data2['file_name'] != '')
                $post_data['vehicle_category_icon'] = $upload_data2['file_name'];
            $this->upload->initialize($config);
            $this->upload->do_upload($field_name3);
            $upload_data3 = $this->upload->data();
            if ($upload_data3['file_name'] != '')
                $post_data['menu_image'] = $upload_data3['file_name'];


            $all_data = $this->comman_model->get_data_by_id('tbl_vehicle_categories', array('id' => $id));

            $result = $this->comman_model->update_data_by_id('tbl_vehicle_categories', $post_data, 'id', $id);

            if ($result) {

                if ($post_data['VehicleType_Photo']) {
                    if (file_exists("assets/uploads/vehicle_categories/" . $all_data['VehicleType_Photo']))
                        unlink("assets/uploads/vehicle_categories/" . $all_data['VehicleType_Photo']);
                }

                if ($post_data['vehicle_category_icon']) {
                    if (file_exists("assets/uploads/vehicle_categories/" . $all_data['vehicle_category_icon']))
                        unlink("assets/uploads/vehicle_categories/" . $all_data['vehicle_category_icon']);
                }

                if ($post_data['menu_image']) {
                    if (file_exists("assets/uploads/vehicle_categories/" . $all_data['menu_image']))
                        unlink("assets/uploads/vehicle_categories/" . $all_data['menu_image']);
                }
            }


            $this->session->set_flashdata('success', 'Vehicle Category has been successfully updated.');
            redirect('admin/vehicle_categories');
        }
        $data['edit_data'] = $this->comman_model->get_data_by_id('tbl_vehicle_categories', array('id' => $id));
        $data['winners_entry'] = $this->comman_model->get_data_by_id('winner_list', array('serial_id' => $id));
        $this->load->view('admin/header', $data);
        $this->load->view('admin/left_menu', $data);
        $this->load->view('admin/edit_product_category', $data);
        $this->load->view('admin/footer', $data);
    }

}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */
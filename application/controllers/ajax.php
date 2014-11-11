<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ajax extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('search_model', 'product_model', 'comman_model'));
    }

    function clear_cache() {
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
    }

    function autosuggest_searchpartnumber($Search = "") {

        $term = $Search;
        $term = htmlspecialchars($term);
        $searchresarr = array();
        if ($term != "") {

            $products = $this->search_model->autosuggest_searchpart($term);
            $term = strtolower($term);
            foreach ($products as $product) {
                if (strpos(strtolower($product['kgt_ref_number']), $term) === 0) {
                    $searchresarrelem['display'] = $product['kgt_ref_number'];
                    $searchresarrelem['title'] = 'KGT Ref Number';
                    $searchresarrelem['value'] = $product['kgt_ref_number'];
                    $searchresarr[] = $searchresarrelem;
                }
                if (strpos(strtolower($product['fmsi_ref_number']), $term) === 0) {
                    $searchresarrelem['display'] = $product['fmsi_ref_number'];
                    $searchresarrelem['title'] = 'FMSI Ref';
                    $searchresarrelem['value'] = $product['kgt_ref_number'];
                    $searchresarr[] = $searchresarrelem;
                }
                if (strpos(strtolower($product['knect']), $term) === 0) {
                    $searchresarrelem['display'] = $product['knect'];
                    $searchresarrelem['title'] = 'KNECT';
                    $searchresarrelem['value'] = $product['kgt_ref_number'];
                    $searchresarr[] = $searchresarrelem;
                }
                if (strpos(strtolower($product['filtron']), $term) === 0) {
                    $searchresarrelem['display'] = $product['filtron'];
                    $searchresarrelem['title'] = 'Filtron';
                    $searchresarrelem['value'] = $product['kgt_ref_number'];
                    $searchresarr[] = $searchresarrelem;
                }
                if (strpos(strtolower($product['purflux']), $term) === 0) {
                    $searchresarrelem['display'] = $product['purflux'];
                    $searchresarrelem['title'] = 'Purflux';
                    $searchresarrelem['value'] = $product['kgt_ref_number'];
                    $searchresarr[] = $searchresarrelem;
                }
                if (strpos(strtolower($product['mann']), $term) === 0) {
                    $searchresarrelem['display'] = $product['mann'];
                    $searchresarrelem['title'] = 'MANN';
                    $searchresarrelem['value'] = $product['kgt_ref_number'];
                    $searchresarr[] = $searchresarrelem;
                }
                if (strpos(strtolower($product['mecafilter']), $term) === 0) {
                    $searchresarrelem['display'] = $product['mecafilter'];
                    $searchresarrelem['title'] = 'Mecafilter';
                    $searchresarrelem['value'] = $product['kgt_ref_number'];
                    $searchresarr[] = $searchresarrelem;
                }
                if (strpos(strtolower($product['oem_part_number']), $term) === 0) {
                    $searchresarrelem['display'] = $product['oem_part_number'];
                    $searchresarrelem['title'] = 'OEM Part Number';
                    $searchresarrelem['value'] = $product['kgt_ref_number'];
                    $searchresarr[] = $searchresarrelem;
                }
                if (strpos(strtolower($product['fleet']), $term) === 0) {
                    $searchresarrelem['display'] = $product['fleet'];
                    $searchresarrelem['title'] = 'Fleetguard';
                    $searchresarrelem['value'] = $product['kgt_ref_number'];
                    $searchresarr[] = $searchresarrelem;
                }
                if (strpos(strtolower($product['baldwin']), $term) === 0) {
                    $searchresarrelem['display'] = $product['baldwin'];
                    $searchresarrelem['title'] = 'Baldwin';
                    $searchresarrelem['value'] = $product['kgt_ref_number'];
                    $searchresarr[] = $searchresarrelem;
                }
                if (strpos(strtolower($product['wva']), $term) === 0) {
                    $searchresarrelem['display'] = $product['wva'];
                    $searchresarrelem['title'] = 'WVA';
                    $searchresarrelem['value'] = $product['kgt_ref_number'];
                    $searchresarr[] = $searchresarrelem;
                }
                if (strpos(strtolower($product['others']), $term) === 0) {
                    $searchresarrelem['display'] = $product['others'];
                    $searchresarrelem['title'] = 'Others';
                    $searchresarrelem['value'] = $product['kgt_ref_number'];
                    $searchresarr[] = $searchresarrelem;
                }
            }
        }
        if (!empty($searchresarr)) {
            usort($searchresarr, "avalphabetialsort");
            foreach ($searchresarr as $searchelem) {

                $searchelem['value'] = str_replace('/', '_', $searchelem['value']);
                echo '<a href="javascript:void(0);" onClick="testsearch(this);" rel="' . htmlentities($searchelem['value']) . '"><li class="border-bottom1">' . $searchelem['display'] . '-' . $searchelem['title'] . '</li></a>';

            }
        } else {

            echo '<a href="javascript:void(0);" class="noresult" onClick="noresultsearch(this);" rel="' . $Search . '"><li class="border-bottom1">Part number is not recognized</li></a>';

        }
    }

    function product_category_details($id = '') {//todo
        if (!empty($id)) {
            $product_type = str_replace('_', ' ', $id);
            $category_details = $this->comman_model->get_vehicle_categories($product_type);
        } else {
            $category_details = $this->product_model->get_product_category_by_typeid($id);
        }

        echo '<select name="vehicle_category_id[]" id="vehicle_category_id" class="form-control selectpicker">';

        foreach ($category_details as $category) {
            if (!empty($id)) {
                echo '<option value="' . $category->id . '">' . $category->category_name . '</option>';
            } else {
                echo '<option value="' . $category['id'] . '">' . $category['category_name'] . '</option>';
            }
        }
        echo '</select>';
    }

    function product_maker_details($id = '') {
        //category
        $category = $this->input->post('category');
        $vehicle_type_ids = array();

        if (strlen($id) < 4) {
            $vehicle_type = $this->comman_model->get_vichle_type_by_id($id);
            $vehicle_type_details = $this->comman_model->get_vehicle_type_details_by_name($vehicle_type);
            foreach ($vehicle_type_details as $details) {

                if (!empty($details))
                    $vehicle_type_ids[] = isset($details->id) ? $details->id : '';
            }
        }else {
            $vehicle_type = str_replace('_', ' ', $id);
            $vehicle_type_details = $this->comman_model->get_vehicle_type_details_by_name($vehicle_type);
            foreach ($vehicle_type_details as $details) {

                if (!empty($details))
                    $vehicle_type_ids[] = isset($details->id) ? $details->id : '';
            }
        }


        $makers_details = $this->product_model->get_all_makers_by_type($vehicle_type_ids, $category);


        echo '<select name="maker_id[]" id="maker_id" class="form-control selectpicker" >';

        foreach ($makers_details as $maker) {
            echo '<option value="' . $maker['id'] . '">' . $maker['maker_name'] . '</option>';
        }
        echo '</select>';
    }

    function product_model_details($maker_id) {
        $model_details = $this->product_model->get_all_model_by_markers($maker_id);

        echo '<select name="model_id[]" id="model_id" class="form-control selectpicker" >';

        foreach ($model_details as $model) {
            echo '<option value="' . $model['id'] . '">' . $model['model_name'] . '</option>';
        }
        echo '</select>';
    }

    function product_type_details($id = '') {
        if (!empty($id)) {
            $category_details = $this->product_model->get_product_type_by_typename(array(0 => $id));
        } else {
            $category_details = $this->comman_model->get_product_type_for_menu();
        }

        echo '<select name="product_type_id[]" id="product_type_id" class="form-control selectpicker">';

        foreach ($category_details as $category) {
            if ($id == '') {
                echo '<option value="' . strtolower(str_replace(' ', '_', $category->product_type_name)) . '">' . $category->product_type_name . '</option>';
            } else {
                echo '<option value="' . $category['id'] . '">' . $category['product_type_name'] . '</option>';
            }
        }
        echo '</select>';
    }

    function sendenquiry() {
        $this->load->library('email');
        $data = array(
            'name' => $_POST['name'],
            'enquirypart_number' => $_POST['enquirypart_number'],
            'telephone' => $_POST['telephone'],
            'email' => $_POST['email']
        );
        $html = $this->load->view('master/email/new_product_enquiry_email', $data, TRUE);
        $config = array(
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'priority' => '1'
        );
        $this->email->initialize($config);

        $this->email->from($data['name'], 'Enquiry');


        $homepage_data = $this->comman_model->search_serial_data('home_page');

        $toadminemail = $this->config->item('fromemailaddress');

        $to = isset($homepage_data[0]['admin_mail']) ? $homepage_data[0]['admin_mail'] : $toadminemail;
        $this->email->to($to);

        $this->email->subject("Enquiry");
        $this->email->message($html);
        $this->email->send();
    }

}

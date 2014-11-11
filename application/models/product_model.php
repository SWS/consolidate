<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Product_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function product($limit, $start) {
        $this->db->order_by("id", "desc");
        $this->db->limit($limit, $start);
        $query = $this->db->get('products');

        return $query->result_array();
    }

    function record_count() {
        return $this->db->count_all("products");
    }

    // this method is used for the add category
    function add_product($post_data) {
        $this->db->insert('products', $post_data);
    }

    function add_excel_product($post_data) {
        foreach ($post_data as $data) {
            if (empty($data['A'])) {
                return false;
            }
            $query = $this->db->get_where('category', array('name' => $data['A']));
            if ($query->num_rows() == 0) {
                $this->db->set('date', date('Y-m-d'));
                $this->db->set('name', $data['A']);
                $this->db->set('status', 1);
                $this->db->insert('category');
            }
        }


        foreach ($post_data as $data) {
            if (empty($data['A']) || empty($data['B']) || empty($data['C']) || empty($data['D']) || empty($data['E']) || empty($data['F']) || empty($data['G']) || empty($data['H']) || empty($data['I']) || empty($data['J']) || empty($data['K']) || empty($data['L']) || empty($data['M']) || empty($data['N']) || empty($data['O']) || empty($data['P']) || empty($data['Q']) || empty($data['R'])) {
                return false;
            }
            $this->db->set('position', $data['R']);
            $this->db->set('name', $data['D']);
            $this->db->set('description', $data['E']);
            $this->db->set('img_name', $data['N']);
            $this->db->set('retail_price', $data['G']);
            $this->db->set('your_price', $data['J']);
            $this->db->set('size_type', $data['L']);
            $this->db->set('date', date('Y-m-d'));
            $this->db->set('category', $data['A']);
            $this->db->set('status', 1);
            $this->db->set('sn', $data['B']);
            $this->db->set('barcode', $data['C']);
            $this->db->set('whole_saler_name', $data['F']);
            $this->db->set('whole_sale_price', $data['I']);
            $this->db->set('regular_price', $data['H']);
            $this->db->set('general_size', $data['K']);
            $this->db->set('bottles_container', $data['M']);
            $this->db->set('totalwait', $data['P']);
            $this->db->set('unit_prise', $data['Q']);
            $this->db->set('best', $data['O']);
            $this->db->insert('products');
        }
        return true;
    }

    function edit_product($siteData, $id) {
        $this->db->where('id', $id);
        $this->db->update('products', $siteData);
    }

    function select_product_data($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('products');
        return $query->row_array();
    }

    function delete_product_data($id, $path) {
        $this->db->where('id', $id);
        $this->db->delete('products');

        if (unlink($path)) {
            return true;
        } else {
            return false;
        }
    }

    function delete_all_data() {
        $this->db->empty_table('products');
        $this->load->helper("file");
        $path = 'assets/templates/images/products/';
        delete_files($path);
    }

    function productByName() {
        $query = $this->db->get_where('products', array('status' => 1));

        return $query->result_array();
    }

    function productByOEMPartNo($oempartno) {
        $this->db->select('tbl_products.*, tbl_makers.maker_name as make,tbl_makers.maker_logo as maker_logo, tbl_models.model_name as model, tbl_models.model_photo as model_photo, tbl_vehicle_categories.category_name as category, tbl_product_types.product_type_name as type, tbl_product_types.menu_privilages');
        $this->db->from('tbl_products');
        $this->db->join('tbl_makers', 'tbl_makers.id = tbl_products.maker_id');
        $this->db->join('tbl_models', 'tbl_models.id = tbl_products.model_id');
        $this->db->join('tbl_vehicle_categories', 'tbl_vehicle_categories.id = tbl_products.vehicle_category_id');
        $this->db->join('tbl_product_types', 'tbl_product_types.id = tbl_products.product_type_id');
        $this->db->where('tbl_products.oem_part_number', $oempartno);
        $query = $this->db->get();
        return $query->result();
    }

    function productByKGTRefNo($kgt_ref_number) {
        $this->db->select('tbl_products.*, tbl_makers.maker_name as make,tbl_makers.maker_logo as maker_logo, tbl_models.model_name as model, tbl_models.model_photo as model_photo,tbl_vehicle_categories.category_name as category, tbl_product_types.product_type_name as type, tbl_product_types.menu_privilages');
        $this->db->from('tbl_products');
        $this->db->join('tbl_makers', 'tbl_makers.id = tbl_products.maker_id');
        $this->db->join('tbl_models', 'tbl_models.id = tbl_products.model_id');
        $this->db->join('tbl_vehicle_categories', 'tbl_vehicle_categories.id = tbl_products.vehicle_category_id');
        $this->db->join('tbl_product_types', 'tbl_product_types.id = tbl_products.product_type_id');
        $this->db->where('tbl_products.kgt_ref_number', $kgt_ref_number);
        $query = $this->db->get();
        return $query->result();
    }

    //  This method is used for the get category list
    function fetchCategoryList($offset) {
        $query = $this->db->get('tbl_category', RESULTS_PER_PAGE, $offset);
        return $query->result_array();
    }

    //  This method is used for the count user 
    function fetchCategoryCount() {
        $this->db->select('category_id');
        $query = $this->db->get('tbl_category');
        return $query->num_rows();
    }

    function fetchDataById($condition, $table) {

        if (!empty($condition)) {
            foreach ($condition as $fieldName => $fieldValue) {
                $this->db->where($fieldName, $fieldValue);
            }
        }

        $query = $this->db->get_where($table);
        return $query->row_array();
    }

    function deleteCategory($category_id) {
        $this->db->delete('tbl_category', array('category_id' => $category_id));
    }

    // this method is used for the get category detail by id
    function get_product_detail_by_id($id) {
        $query = $this->db->get_where('products', array('id' => $id));

        return $query->row_array();
    }

    //  this method is used for the update category detail
    function update_category_detail($siteData, $category_id) {
        $this->db->where('id', $category_id);
        $this->db->update('category', $siteData);
    }

    //  This method is used for the get category list - get all category
    function fetchAllCategory() {
        $query = $this->db->get('tbl_category');
        return $query->result_array();
    }

    function getCheckPointByCategoryid($category_id) {
        $this->db->where("category_id", $category_id);
        $query = $this->db->get('checklist');
        return $query->result_array();
    }

    function get_user_check_point($category_id, $user_id) {
        $this->db->where('category_id', $category_id);
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('users_list');
        return $query->result_array();
    }

    function getAllCheckPoint() {


        $query = $this->db->get('checklist');
        return $query->result_array();
    }

    // this method is used for the add user list
    function add_user_list($post_data) {
        $this->db->insert('users_list', $post_data);
    }

    function delete_user_check_point($id, $user_id) {

        $this->db->where('id', $id);
        $this->db->where('user_id', $user_id);
        $this->db->delete('users_list');
    }

    function add_checkpoint($post_data) {
        $this->db->insert('users_list', $post_data);
    }

    //  This method is used for the count user 
    function all_category() {

        $query = $this->db->get('tbl_category');
        return $query->result_array();
    }

    function get_product_type_by_catagoryid($id = '') {
        $this->db->select('tbl_product_types.*,tbl_vehicle_categories.category_name as category_name');
        $this->db->from('tbl_vehicle_categories');
        $this->db->join('tbl_product_types', 'tbl_product_types.vehicle_category_id = tbl_vehicle_categories.id', 'left');
        $this->db->join('tbl_products', 'tbl_product_types.id = tbl_products.product_type_id', 'left');

        if ($id != '')
            $this->db->where('tbl_vehicle_categories.id', $id);


        $this->db->group_by("tbl_product_types.product_type_name");
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_product_category_by_typeid($id = '') {
        $this->db->select('tbl_vehicle_categories.*,tbl_product_types.product_type_name as product_type_name');
        $this->db->from('tbl_vehicle_categories');
        $this->db->join('tbl_products', 'tbl_products.vehicle_category_id = tbl_vehicle_categories.id');
        $this->db->join('tbl_product_types', 'tbl_product_types.id = tbl_products.product_type_id');

        if ($id != '')
            $this->db->where('tbl_product_types.product_type_name', str_replace('_', ' ', $id));

        $this->db->group_by("tbl_vehicle_categories.id");
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_product_type_by_catagory($ids) {
        $this->db->select('tbl_product_types.*,tbl_vehicle_categories.category_name as category_name');
        $this->db->from('tbl_vehicle_categories');
        $this->db->join('tbl_products', 'tbl_products.vehicle_category_id = tbl_vehicle_categories.id');
        $this->db->join('tbl_product_types', 'tbl_product_types.id = tbl_products.product_type_id');

        if (!empty($ids)) {
            foreach ($ids as $id) {
                if ($id != '')
                    $this->db->or_where('tbl_products.vehicle_category_id', $id);
            }
        }
        $this->db->group_by("tbl_product_types.id");
        $query = $this->db->get();

        return $query->result_array();
    }

    function get_product_type_by_typename($ids, $offset = 0, $type_ids = FALSE) {
        $this->db->select('tbl_product_types.*,tbl_vehicle_categories.category_name as category_name');
        $this->db->from('tbl_vehicle_categories');
        $this->db->join('tbl_product_types', 'tbl_product_types.vehicle_category_id = tbl_vehicle_categories.id');

        if (!empty($ids)) {
            foreach ($ids as $id) {
                if ($id != '')
                    $this->db->or_where('tbl_vehicle_categories.id', $id);
            }
        }

        if (!empty($type_ids)) {
            foreach ($type_ids as $type_id) {
                if ($type_id != '')
                    $this->db->where('tbl_product_types.id', $type_id);
            }
        }
        $this->db->group_by("tbl_product_types.id");
        $this->db->order_by("tbl_product_types.product_type_name");
        $this->db->limit($this->config->item('pagination_limit'), $offset);
        $query = $this->db->get();

        return $query->result_array();
    }

    function get_product_type_by_type_names($names, $offset = 0) {
        if (!is_array($names))
            $names = array($names);
        $this->db->select('*');
        $this->db->from('tbl_product_types');

        if (!empty($names)) {
            foreach ($names as $name) {
                if ($name != '')
                    $this->db->or_where('product_type_name', $name);
            }
        }
        $this->db->order_by("tbl_product_types.product_type_name");
        $this->db->limit($this->config->item('pagination_limit'), $offset);
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_product_type_ids_by_type_names_and_cat_ids($names, $cat_ids) {
        if (!is_array($names))
            $names = array($names);
        if (!is_array($cat_ids))
            $cat_ids = array($cat_ids);
        $this->db->select('id');
        $this->db->from('tbl_product_types');

        if ($names && !empty($names)) {
            $names = array_diff($names, array(''));
            $this->db->where_in('product_type_name', $names);
        }

        if ($cat_ids && !empty($cat_ids)) {
            $cat_ids = array_diff($cat_ids, array(''));
            $this->db->where_in('vehicle_category_id', $cat_ids);
        }

        $this->db->order_by("tbl_product_types.product_type_name");
        $query = $this->db->get();
        $result = array();
        foreach ($query->result_array() as $elem)
            $result[] = $elem['id'];
        return $result;
    }

    function count_product_type_by_typename($ids, $type_ids = FALSE) {
        $this->db->select('tbl_product_types.id');
        $this->db->from('tbl_vehicle_categories');
        $this->db->join('tbl_product_types', 'tbl_product_types.vehicle_category_id = tbl_vehicle_categories.id');

        if (!empty($ids)) {
            foreach ($ids as $id) {
                if ($id != '')
                    $this->db->or_where('tbl_vehicle_categories.id', $id);
            }
        }
        if (!empty($type_ids)) {
            foreach ($type_ids as $type_id) {
                if ($type_id != '')
                    $this->db->where('tbl_product_types.id', $type_id);
            }
        }
        $this->db->group_by("tbl_product_types.id");
        $this->db->order_by("tbl_product_types.product_type_name");
        $query = $this->db->get();
        $rowcount = $query->num_rows();
        return $rowcount;
    }

    function get_product_makers_by_types($ids) {
        $session_data = $this->session->all_userdata();
        $vehicle_categorie_ids = $session_data['vehicle_category_id'];


        $this->db->select('tbl_makers.*');
        $this->db->from('tbl_makers');
        $this->db->join('tbl_products', 'tbl_makers.id = tbl_products.maker_id');
        if (!empty($ids)) {
            foreach ($ids as $id) {
                if ($id != '')
                    $this->db->or_where('tbl_products.product_type_id', $id);
            }
        }
        if (!empty($vehicle_categorie_ids)) {
            foreach ($vehicle_categorie_ids as $categorie_id) {
                if ($id != '')
                    $this->db->or_where('tbl_products.vehicle_category_id', $categorie_id);
            }
        }


        $this->db->group_by("tbl_makers.id");
        $query = $this->db->get();

        return $query->result_array();
    }

    function get_products_by_makers_brand_details($offset = NULL) {
        $session_data = $this->session->all_userdata();

        $vehicle_category_id = $session_data['vehicle_category_id'];
        $vehicle_category_id = array_unique($vehicle_category_id);
        $vehicle_type_id = isset($session_data['vehicle_type_id']) ? $session_data['vehicle_type_id'] : '';
        //print_r($vehicle_type_id);
        $vehicle_type_names = isset($session_data['vehicle_type_names']) ? $session_data['vehicle_type_names'] : '';
        $product_maker_id = isset($session_data['product_maker_id']) ? $session_data['product_maker_id'] : '';
        if ($product_maker_id == NULL)
            $product_maker_id = array();

        $querysql = "SELECT tbl_makers.*, tbl_makers.maker_name as make, tbl_makers.maker_logo as maker_logo, tbl_models.id as model_id,tbl_models.model_name as model, tbl_models.model_photo as model_photo,tbl_vehicle_categories.id as category_id,tbl_vehicle_categories.category_name as category,tbl_vehicle_categories.vehicle_category_icon as category_icon, tbl_product_types.id as type_id,tbl_product_types.product_type_name as type, tbl_product_types.menu_privilages FROM tbl_products JOIN tbl_makers ON tbl_makers.id = tbl_products.maker_id JOIN tbl_models ON tbl_models.id = tbl_products.model_id JOIN tbl_vehicle_categories ON tbl_vehicle_categories.id = tbl_products.vehicle_category_id JOIN tbl_product_types ON tbl_product_types.id = tbl_products.product_type_id WHERE 1 = 1";

        if (!empty($vehicle_category_id)) {
            $querysql_1 = "";
            $i = 1;
            foreach ($vehicle_category_id as $category_id) {
                if ($category_id != '') {
                    if ($i > 1)
                        $querysql_1.= " OR tbl_products.vehicle_category_id = " . $category_id . " ";
                    else
                        $querysql_1.= " AND ( tbl_products.vehicle_category_id = " . $category_id . " ";

                    $i++;
                }
            }
            if ($querysql_1 != '')
                $querysql_1.= " ) ";
            $querysql.= $querysql_1;
        }
        if (!empty($vehicle_type_names)) {
            $querysql_2 = "";
            $j = 1;
            foreach ($vehicle_type_names as $vehicle_type_name) {
                //var_dump($type_id);
                if ($type_id != '') {
                    if ($j > 1)
                        $querysql_2.= " OR tbl_product_types.product_type_name = " . $vehicle_type_name . " ";
                    else
                        $querysql_2.= " AND ( tbl_product_types.product_type_name = " . $vehicle_type_name . " ";

                    $j++;
                }
            }
            if ($querysql_2 != '')
                $querysql_2.= " ) ";
            $querysql.= $querysql_2;
        }
        elseif (!empty($vehicle_type_id)) {
            $querysql_2 = "";
            $j = 1;
            foreach ($vehicle_type_id as $type_id) {
                //var_dump($type_id);
                if ($type_id != '') {
                    if ($j > 1)
                        $querysql_2.= " OR tbl_products.product_type_id = " . $type_id . " ";
                    else
                        $querysql_2.= " AND ( tbl_products.product_type_id = " . $type_id . " ";

                    $j++;
                }
            }
            if ($querysql_2 != '')
                $querysql_2.= " ) ";
            $querysql.= $querysql_2;
        }

        if (!empty($product_maker_id)) {
            $querysql_3 = "";
            $k = 1;
            foreach ($product_maker_id as $maker_id) {
                if ($maker_id != '') {
                    if ($k > 1)
                        $querysql_3.= " OR tbl_products.maker_id = " . $maker_id . " ";
                    else
                        $querysql_3.= " AND ( tbl_products.maker_id = " . $maker_id . " ";

                    $k++;
                }
            }
            if ($querysql_3 != '')
                $querysql_3.= " ) ";
            $querysql.= $querysql_3;
        }

        //$querysql.= " GROUP BY tbl_products.maker_id ";
        $querysql.= " GROUP BY tbl_products.vehicle_category_id ";

        if (isset($offset)) {
            $querysql.= " limit " . $offset . "," . $this->config->item('pagination_limit');
        } else {
            $querysql.= " limit " . $this->config->item('pagination_limit');
        }

        // echo $querysql;
        //exit;
        $query = $this->db->query($querysql);
        return $query->result_array();
    }

    function get_products_by_makers($limit = null, $offset = 0) {
        $session_data = $this->session->all_userdata();

        $vehicle_category_id = $session_data['vehicle_category_id'];
        $vehicle_type_id = isset($session_data['vehicle_type_id']) ? $session_data['vehicle_type_id'] : '';
        $product_maker_id = isset($session_data['vehicle_brand_id']) ? $session_data['vehicle_brand_id'] : '';
        $product_model_id = isset($session_data['product_model_id']) ? $session_data['product_model_id'] : '';
        if ($product_maker_id == NULL)
            $product_maker_id = array();

        $querysql = "SELECT tbl_products.*, tbl_makers.maker_name as make,tbl_makers.maker_logo as maker_logo, tbl_models.model_name as model,tbl_models.model_photo as model_photo, tbl_vehicle_categories.category_name as category, tbl_product_types.product_type_name as type, tbl_product_types.menu_privilages 
				FROM tbl_products 
				JOIN tbl_makers ON tbl_makers.id = tbl_products.maker_id 
				JOIN tbl_models ON tbl_models.id = tbl_products.model_id 
				JOIN tbl_vehicle_categories ON tbl_vehicle_categories.id = tbl_products.vehicle_category_id 
				JOIN tbl_product_types ON tbl_product_types.id = tbl_products.product_type_id WHERE 1 = 1";

        if (!empty($vehicle_category_id)) {
            $querysql_1 = "";
            $i = 1;
            foreach ($vehicle_category_id as $category_id) {
                if ($category_id != '') {
                    if ($i > 1)
                        $querysql_1.= " OR tbl_products.vehicle_category_id = " . $category_id . " ";
                    else
                        $querysql_1.= " AND ( tbl_products.vehicle_category_id = " . $category_id . " ";

                    $i++;
                }
            }
            if ($querysql_1 != '')
                $querysql_1.= " ) ";
            $querysql.= $querysql_1;
        }

        if (!empty($vehicle_type_id)) {
            $querysql_2 = "";
            $j = 1;
            foreach ($vehicle_type_id as $type_id) {
                //var_dump($type_id);
                if ($type_id != '') {
                    if ($j > 1)
                        $querysql_2.= " OR tbl_products.product_type_id = " . $type_id . " ";
                    else
                        $querysql_2.= " AND ( tbl_products.product_type_id = " . $type_id . " ";

                    $j++;
                }
            }
            if ($querysql_2 != '')
                $querysql_2.= " ) ";
            $querysql.= $querysql_2;
        }

        if (!empty($product_maker_id)) {
            $querysql_3 = "";
            $k = 1;
            foreach ($product_maker_id as $maker_id) {
                if ($maker_id != '') {
                    if ($k > 1)
                        $querysql_3.= " OR tbl_products.maker_id = " . $maker_id . " ";
                    else
                        $querysql_3.= " AND ( tbl_products.maker_id = " . $maker_id . " ";

                    $k++;
                }
            }
            if ($querysql_3 != '')
                $querysql_3.= " ) ";
            $querysql.= $querysql_3;
        }

        if (!empty($product_model_id)) {
            $querysql_4 = "";
            $n = 1;
            foreach ($product_model_id as $model_id) {
                if ($model_id != '') {
                    if ($n > 1)
                        $querysql_4.= " OR tbl_products.model_id = " . $model_id . " ";
                    else
                        $querysql_4.= " AND ( tbl_products.model_id = " . $model_id . " ";

                    $n++;
                }
            }
            if ($querysql_4 != '')
                $querysql_4.= " ) ";
            $querysql.= $querysql_4;
        }



        //$querysql.= " GROUP BY tbl_products.maker_id,tbl_products.id,tbl_products.kgt_ref_number ";
        $querysql.= " GROUP BY tbl_products.id ORDER BY tbl_products.maker_id, tbl_models.model_name, tbl_products.model_id, tbl_products.product_type_id ";
        if ($limit) {
            $querysql.= " limit " . $offset . "," . $limit;
        }
        // echo $querysql;
        $query = $this->db->query($querysql);
        return $query->result();
    }

    function get_cart_items($cart_details) {
        $cart_data = array();
        if (!empty($cart_details)) {
            foreach ($cart_details as $cart) {
                $this->db->select('tbl_products.*,count(tbl_products.id) as itemcount,tbl_makers.maker_name as make,tbl_product_types.menu_privilages as menu_privilages ,tbl_models.model_name as model ,tbl_vehicle_categories.category_name as category ,tbl_product_types.product_type_name as type ');
                $this->db->from('tbl_products');
                $this->db->join('tbl_makers', 'tbl_makers.id = tbl_products.maker_id');
                $this->db->join('tbl_models', 'tbl_models.id = tbl_products.model_id');
                $this->db->join('tbl_vehicle_categories', 'tbl_vehicle_categories.id = tbl_products.vehicle_category_id');
                $this->db->join('tbl_product_types', 'tbl_product_types.id = tbl_products.product_type_id');
                $query = $this->db->where('tbl_products.id', $cart['item_id'])->get();
                $resultobject = $query->row_array();
                $resultobject['comment'] = isset($cart['comment']) ? $cart['comment'] : '';
                $resultobject['quantity'] = isset($cart['quantity']) ? $cart['quantity'] : '';
                $cart_data[] = $resultobject;
            }
        }

        return $cart_data;
    }

    function get_menu_fields($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('tbl_product_types');
        return $query->row_array();
    }

    function getall_producttype_data($table) {
        $this->db->select('tbl_product_types.*, tbl_vehicle_categories.category_name as category_name, tbl_vehicle_categories.id as cat_id');
        $this->db->from($table);
        $this->db->join('tbl_vehicle_categories', 'tbl_product_types.vehicle_category_id = tbl_vehicle_categories.id', 'left');
        $query = $this->db->get();
        return $query->result_array();
    }

    function getallvehiclecategory_data($table) {
        $this->db->distinct('tbl_vehicle_categories.category_name');
        $this->db->select('tbl_vehicle_categories.*');
        $this->db->from($table);
        $this->db->join('tbl_product_types', 'tbl_product_types.vehicle_category_id = tbl_vehicle_categories.id', 'inner');
        $query = $this->db->get();
        return $query->result_array();
    }

    function search_product_data($table, $key, $field1) {
        $this->db->select('tbl_products.*,tbl_vehicle_categories.id as vehicleid,tbl_vehicle_categories.category_name as vehiclecat_name,tbl_product_types.id as protype_id, tbl_product_types.product_type_name as protype_name,tbl_product_types.menu_privilages as menuprivilages,tbl_models.id as modelid,tbl_models.model_name as modelname,tbl_makers.id as makerid,tbl_makers.maker_name as makername');
        $this->db->from($table);
        $this->db->join('tbl_vehicle_categories', 'tbl_products.vehicle_category_id = tbl_vehicle_categories.id', 'left');
        $this->db->join('tbl_product_types', 'tbl_products.product_type_id=tbl_product_types.id', 'left');
        $this->db->join('tbl_models', 'tbl_products.model_id=tbl_models.id', 'left');
        $this->db->join('tbl_makers', 'tbl_products.maker_id=tbl_makers.id', 'left');
        $this->db->where('tbl_products.id !=', '');

        if ($key != "") {
            $this->db->like('tbl_products.kgt_ref_number', $key);
            $this->db->or_like('tbl_products.oem_part_number', $key);
            $this->db->or_like('tbl_products.application', $key);
            $this->db->or_like('tbl_models.model_name', $key);
            $this->db->or_like('tbl_vehicle_categories.category_name', $key);
            $this->db->or_like('tbl_product_types.product_type_name', $key);
            $this->db->or_like('tbl_makers.maker_name', $key);
        }

        $query = $this->db->get();
        return $query->result_array();
    }

    function deleteallproducts() {
        $this->db->empty_table('tbl_products');
    }

    function deleteSelectedproducts($id) {
        $this->db->delete('tbl_products', array('id' => $id));
        return TRUE;
    }

    function get_all_makers_by_type($id = '', $category = '') {
        $this->db->select('tbl_makers.*,tbl_products.product_type_id,tbl_products.vehicle_category_id ,tbl_product_types.product_type_name');
        $this->db->from('tbl_makers');
        $this->db->join('tbl_products', 'tbl_products.maker_id = tbl_makers.id');

        $this->db->join('tbl_product_types', 'tbl_product_types.id = tbl_products.product_type_id');
        if (!empty($id))
            $this->db->where_in('tbl_products.product_type_id', $id);
        if ($category != '')
            $this->db->where('tbl_products.vehicle_category_id', $category);
        $this->db->group_by("tbl_makers.id");
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_all_makers_by_vehicleid($id) {
        $this->db->select('tbl_makers.*');
        $this->db->from('tbl_makers');
        $this->db->join('tbl_products', 'tbl_products.maker_id = tbl_makers.id');
        $this->db->join('tbl_product_types', 'tbl_product_types.id = tbl_products.product_type_id');
        $this->db->where('tbl_products.vehicle_category_id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_all_model_by_markers($maker_id) {
        $query = $this->db->get_where('tbl_models', array('maker_id' => $maker_id));
        return $query->result_array();
    }

    function get_productModelname($product) {
        $query = $this->db->get_where('tbl_products', array('id' => $product));
        return $query->result_array();
    }

    function get_all_category_by_type($typeid) {
        $this->db->select('tbl_vehicle_categories.*');
        $this->db->from('tbl_product_types');
        $this->db->join('tbl_vehicle_categories', 'tbl_product_types.vehicle_category_id= tbl_vehicle_categories.id', 'left');
        $this->db->where('tbl_product_types.id', $typeid);
        $query = $this->db->get();
        return $query->result_array();
    }

    function num_products_by_makers_brand_details() {
        $session_data = $this->session->all_userdata();

        $vehicle_category_id = $session_data['vehicle_category_id'];
        $vehicle_type_id = isset($session_data['vehicle_type_id']) ? $session_data['vehicle_type_id'] : '';
        $vehicle_type_names = isset($session_data['vehicle_type_names']) ? $session_data['vehicle_type_names'] : '';
        $product_maker_id = isset($session_data['product_maker_id']) ? $session_data['product_maker_id'] : '';
        if ($product_maker_id == NULL)
            $product_maker_id = array();

        $querysql = "SELECT tbl_makers.*, tbl_makers.maker_name as make, tbl_makers.maker_logo as maker_logo, tbl_models.model_name as model, tbl_models.model_photo as model_photo,tbl_vehicle_categories.category_name as category, tbl_product_types.product_type_name as type, tbl_product_types.menu_privilages FROM tbl_products JOIN tbl_makers ON tbl_makers.id = tbl_products.maker_id JOIN tbl_models ON tbl_models.id = tbl_products.model_id JOIN tbl_vehicle_categories ON tbl_vehicle_categories.id = tbl_products.vehicle_category_id JOIN tbl_product_types ON tbl_product_types.id = tbl_products.product_type_id WHERE 1 = 1";

        if (!empty($vehicle_category_id)) {
            $querysql_1 = "";
            $i = 1;
            foreach ($vehicle_category_id as $category_id) {
                if ($category_id != '') {
                    if ($i > 1)
                        $querysql_1.= " OR tbl_products.vehicle_category_id = " . $category_id . " ";
                    else
                        $querysql_1.= " AND ( tbl_products.vehicle_category_id = " . $category_id . " ";

                    $i++;
                }
            }
            if ($querysql_1 != '')
                $querysql_1.= " ) ";
            $querysql.= $querysql_1;
        }
        if (!empty($vehicle_type_names)) {
            $querysql_2 = "";
            $j = 1;
            foreach ($vehicle_type_names as $vehicle_type_name) {
                //var_dump($type_id);
                if ($type_id != '') {
                    if ($j > 1)
                        $querysql_2.= " OR tbl_product_types.product_type_name = " . $vehicle_type_name . " ";
                    else
                        $querysql_2.= " AND ( tbl_product_types.product_type_name = " . $vehicle_type_name . " ";

                    $j++;
                }
            }
            if ($querysql_2 != '')
                $querysql_2.= " ) ";
            $querysql.= $querysql_2;
        }
        elseif (!empty($vehicle_type_id)) {
            $querysql_2 = "";
            $j = 1;
            foreach ($vehicle_type_id as $type_id) {
                //var_dump($type_id);
                if ($type_id != '') {
                    if ($j > 1)
                        $querysql_2.= " OR tbl_products.product_type_id = " . $type_id . " ";
                    else
                        $querysql_2.= " AND ( tbl_products.product_type_id = " . $type_id . " ";

                    $j++;
                }
            }
            if ($querysql_2 != '')
                $querysql_2.= " ) ";
            $querysql.= $querysql_2;
        }

        if (!empty($product_maker_id)) {
            $querysql_3 = "";
            $k = 1;
            foreach ($product_maker_id as $maker_id) {
                if ($maker_id != '') {
                    if ($k > 1)
                        $querysql_3.= " OR tbl_products.maker_id = " . $maker_id . " ";
                    else
                        $querysql_3.= " AND ( tbl_products.maker_id = " . $maker_id . " ";

                    $k++;
                }
            }
            if ($querysql_3 != '')
                $querysql_3.= " ) ";
            $querysql.= $querysql_3;
        }

        $querysql.= " GROUP BY tbl_products.maker_id ";

        $query = $this->db->query($querysql);
        //var_dump($query->result());
        return count($query->result_array());
    }

    function get_type_by_cat($category, $vehicle_type_id) {
        $data = array();
        foreach ($category as $item) {
            foreach ($vehicle_type_id as $type_id) {
                $this->db->select('id');
                $this->db->from('tbl_product_types');
                $this->db->where('id', $type_id);
                $this->db->where('vehicle_category_id', $item);
                $query = $this->db->get();
                $result = $query->result();
                if ($result[0]->id)
                    $data[] = $result[0]->id;
            }
        }

        return $data;
    }

    function get_products_by_makers_brand_details_count($offset = NULL) {
        $session_data = $this->session->all_userdata();

        $vehicle_category_id = $session_data['vehicle_category_id'];
        $vehicle_type_id = isset($session_data['vehicle_type_id']) ? $session_data['vehicle_type_id'] : '';
        //print_r($vehicle_type_id);
        $vehicle_type_names = isset($session_data['vehicle_type_names']) ? $session_data['vehicle_type_names'] : '';
        $product_maker_id = isset($session_data['product_maker_id']) ? $session_data['product_maker_id'] : '';
        if ($product_maker_id == NULL)
            $product_maker_id = array();

        $querysql = "SELECT tbl_makers.*, tbl_makers.maker_name as make, tbl_makers.maker_logo as maker_logo, tbl_models.id as model_id,tbl_models.model_name as model, tbl_models.model_photo as model_photo,tbl_vehicle_categories.id as category_id,tbl_vehicle_categories.category_name as category,tbl_vehicle_categories.vehicle_category_icon as category_icon, tbl_product_types.id as type_id,tbl_product_types.product_type_name as type, tbl_product_types.menu_privilages FROM tbl_products JOIN tbl_makers ON tbl_makers.id = tbl_products.maker_id JOIN tbl_models ON tbl_models.id = tbl_products.model_id JOIN tbl_vehicle_categories ON tbl_vehicle_categories.id = tbl_products.vehicle_category_id JOIN tbl_product_types ON tbl_product_types.id = tbl_products.product_type_id WHERE 1 = 1";

        if (!empty($vehicle_category_id)) {
            $querysql_1 = "";
            $i = 1;
            foreach ($vehicle_category_id as $category_id) {
                if ($category_id != '') {
                    if ($i > 1)
                        $querysql_1.= " OR tbl_products.vehicle_category_id = " . $category_id . " ";
                    else
                        $querysql_1.= " AND ( tbl_products.vehicle_category_id = " . $category_id . " ";

                    $i++;
                }
            }
            if ($querysql_1 != '')
                $querysql_1.= " ) ";
            $querysql.= $querysql_1;
        }
        if (!empty($vehicle_type_names)) {
            $querysql_2 = "";
            $j = 1;
            foreach ($vehicle_type_names as $vehicle_type_name) {
                //var_dump($type_id);
                if ($type_id != '') {
                    if ($j > 1)
                        $querysql_2.= " OR tbl_product_types.product_type_name = " . $vehicle_type_name . " ";
                    else
                        $querysql_2.= " AND ( tbl_product_types.product_type_name = " . $vehicle_type_name . " ";

                    $j++;
                }
            }
            if ($querysql_2 != '')
                $querysql_2.= " ) ";
            $querysql.= $querysql_2;
        }
        elseif (!empty($vehicle_type_id)) {
            $querysql_2 = "";
            $j = 1;
            foreach ($vehicle_type_id as $type_id) {
                //var_dump($type_id);
                if ($type_id != '') {
                    if ($j > 1)
                        $querysql_2.= " OR tbl_products.product_type_id = " . $type_id . " ";
                    else
                        $querysql_2.= " AND ( tbl_products.product_type_id = " . $type_id . " ";

                    $j++;
                }
            }
            if ($querysql_2 != '')
                $querysql_2.= " ) ";
            $querysql.= $querysql_2;
        }

        if (!empty($product_maker_id)) {
            $querysql_3 = "";
            $k = 1;
            foreach ($product_maker_id as $maker_id) {
                if ($maker_id != '') {
                    if ($k > 1)
                        $querysql_3.= " OR tbl_products.maker_id = " . $maker_id . " ";
                    else
                        $querysql_3.= " AND ( tbl_products.maker_id = " . $maker_id . " ";

                    $k++;
                }
            }
            if ($querysql_3 != '')
                $querysql_3.= " ) ";
            $querysql.= $querysql_3;
        }

        $querysql.= " GROUP BY tbl_products.vehicle_category_id ";

        $query = $this->db->query($querysql);
        return count($query->result_array());
    }

    function get_products_by_makers_cats_pair($limit = null, $offset = 0) {
        $session_data = $this->session->all_userdata();
        $vehicle_type_id_and_cat_id_pair = isset($session_data['vehicle_type_id_and_cat_id_pair']) ? $session_data['vehicle_type_id_and_cat_id_pair'] : array();

        $querysql = "SELECT tbl_products.*, tbl_makers.maker_name as make,tbl_makers.maker_logo as maker_logo, tbl_models.model_name as model,tbl_models.model_photo as model_photo, tbl_vehicle_categories.category_name as category, tbl_product_types.product_type_name as type, tbl_product_types.menu_privilages 
				FROM tbl_products 
				JOIN tbl_makers ON tbl_makers.id = tbl_products.maker_id 
				JOIN tbl_models ON tbl_models.id = tbl_products.model_id 
				JOIN tbl_vehicle_categories ON tbl_vehicle_categories.id = tbl_products.vehicle_category_id 
				JOIN tbl_product_types ON tbl_product_types.id = tbl_products.product_type_id WHERE 1 = 1";


        if (!empty($vehicle_type_id_and_cat_id_pair)) {
            $where_array = array();
            foreach ($vehicle_type_id_and_cat_id_pair as $pair) {
                if ($pair['brand_id'] && $pair['type_id'])
                    $where_array[] = " ( tbl_products.maker_id = " . $pair['brand_id'] . " AND tbl_products.product_type_id = " . $pair['type_id'] . " ) ";
            }
        }
        $querysql .= " AND (" . implode(" OR ", $where_array) . ") ";

        $querysql .= " GROUP BY tbl_products.id ORDER BY tbl_products.maker_id, tbl_models.model_name, tbl_products.model_id, tbl_products.product_type_id ";
        if ($limit) {
            $querysql .= " limit " . $offset . "," . $limit;
        }

        $query = $this->db->query($querysql);
        return $query->result();
    }

    function get_all_products_by_makers_cats_pair() {
        $session_data = $this->session->all_userdata();
        $vehicle_type_id_and_cat_id_pair = isset($session_data['vehicle_type_id_and_cat_id_pair']) ? $session_data['vehicle_type_id_and_cat_id_pair'] : array();

        $querysql = "SELECT tbl_products.*, tbl_makers.maker_name as make,tbl_makers.maker_logo as maker_logo, tbl_models.model_name as model,tbl_models.model_photo as model_photo, tbl_vehicle_categories.category_name as category, tbl_product_types.product_type_name as type, tbl_product_types.menu_privilages 
				FROM tbl_products 
				JOIN tbl_makers ON tbl_makers.id = tbl_products.maker_id 
				JOIN tbl_models ON tbl_models.id = tbl_products.model_id 
				JOIN tbl_vehicle_categories ON tbl_vehicle_categories.id = tbl_products.vehicle_category_id 
				JOIN tbl_product_types ON tbl_product_types.id = tbl_products.product_type_id WHERE 1 = 1";

        if (!empty($vehicle_type_id_and_cat_id_pair)) {
            $where_array = array();
            foreach ($vehicle_type_id_and_cat_id_pair as $pair) {
                if ($pair['brand_id'] && $pair['type_id'])
                    $where_array[] = " ( tbl_products.maker_id = " . $pair['brand_id'] . " AND tbl_products.product_type_id = " . $pair['type_id'] . " ) ";
            }
        }
        if ($where_array)
            $querysql .= " AND (" . implode(" OR ", $where_array) . ") ";

        $querysql .= " GROUP BY tbl_products.id ORDER BY tbl_products.maker_id, tbl_models.model_name, tbl_products.model_id, tbl_products.product_type_id ";


        $query = $this->db->query($querysql);
        return $query->result();
    }

    //get category ids for selected type_ids
    function get_product_category_by_type_id($id = array()) {
        if ($id) {
            $this->db->or_where_in('id', $id);
            $this->db->select('vehicle_category_id');
            $query = $this->db->get('tbl_product_types');
            foreach ($query->result_array() as $res)
                $result[] = $res['vehicle_category_id'];
            return $result;
        }
        return array();
    }

    function get_product_type_data_by_id($product_type_ids = array()) {

        if ($product_type_ids) {
            $this->db->where_in('tbl_product_types.id', $product_type_ids);
            $this->db->join('tbl_vehicle_categories', 'tbl_vehicle_categories.id=tbl_product_types.vehicle_category_id');
            $query = $this->db->get('tbl_product_types');
            return $query->row_array();
        }
        return array();
    }

}

// END Category_model Class

/* End of file category_model.php */
/* Location: ./application/models/category_model.php */

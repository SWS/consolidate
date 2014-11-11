<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Career extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('assets'));
        $this->load->library('cart');
        $this->load->model(array('menu_model', 'comman_model', 'career_model', 'block_list_email', 'country_model'));
        $this->load->language(array('header', 'career', 'footer'));
    }

    function set_unblock_user() {
        $set_unblock_user = $this->career_model->get_all_data_by_id('promotion_form', array());
        $set_unblock_user1 = $this->career_model->get_all_data_by_id('apply_form', array());
        $set_unblock_user2 = $this->career_model->get_all_data_by_id('contact_form', array());

        //edited by 4axiz to perform action of block_email_list table

        $where_param = array();
        $select_param = array("dte_block", "str_email");
        $block_emails = $this->block_list_email->get_row("block_email_list", $select_param, $where_param);
        foreach ($block_emails as $each_email) {
            $date = date("Y-m-d H:i:s", time());
            $datelimit = strtotime('-120 minute', strtotime($date));
            $datelimit = date("Y-m-d H:i:s", $datelimit);
            if ($datelimit > $each_email->dte_block) {   //block time expired
                $where_param = array();
                $where_param['str_email'] = $each_email->str_email;
                $this->block_list_email->delete_row("block_email_list", $where_param);
            }
        }

        //end region


        foreach ($set_unblock_user as $set_data2) {
            if ($set_data2['block'] == 1) {
                $currentTime = time();

                $blockTime = strtotime('+120 minutes', $set_data2['block_time']);

                if ($blockTime < $currentTime) {
                    $result1 = $this->career_model->delete_by_id('promotion_form', array('id' => $set_data2['id']));
                }
            }
        }

        foreach ($set_unblock_user1 as $set_data2) {
            if ($set_data2['block'] == 1) {
                $currentTime = time();
                $blockTime = strtotime('+120 minutes', $set_data2['block_time']);
                if ($blockTime < $currentTime) {
                    $result1 = $this->career_model->delete_by_id('apply_form', array('id' => $set_data2['id']));
                }
            }
        }

        foreach ($set_unblock_user2 as $set_data2) {
            if ($set_data2['block'] == 1) {
                $currentTime = time();
                $blockTime = strtotime('+120 minutes', $set_data2['block_time']);
                if ($blockTime < $currentTime) {
                    $result1 = $this->career_model->delete_by_id('contact_form', array('id' => $set_data2['id']));
                }
            }
        }
    }

    function check_user_block($email) {

        //edited by 4axiz to perform action of block_email_list table
        $check_user1 = $this->career_model->get_data_by_id('apply_form', array('email' => $email, 'block' => 1));
        $check_user2 = $this->career_model->get_data_by_id('contact_form', array('email' => $email, 'block' => 1));
        $check_user3 = $this->career_model->get_data_by_id('promotion_form', array('email' => $email, 'block' => 1));

        $where_param = array();
        $where_param['str_email'] = $email;
        $select_param = array("dte_block", "str_email", "region");
        $blocked_email = $this->block_list_email->get_row("block_email_list", $select_param, $where_param);
        if (!empty($blocked_email)) {
            $date = date("Y-m-d H:i:s", time());
            $datelimit = strtotime('-120 minute', strtotime($date));
            $datelimit = date("Y-m-d H:i:s", $datelimit);
            if ($datelimit > $blocked_email[0]->dte_block) {   //block time expired
                $where_param = array();
                $where_param['str_email'] = $blocked_email[0]->str_email;
                $this->block_list_email->delete_row("block_email_list", $where_param);
            }
            else
                echo "Sorry your email ID has been blocked in the " . $blocked_email[0]->region . " section";
        } //end region


        else if (!empty($check_user1)) {
            $currentTime1 = time();
            $blockTime1 = strtotime('+120 minutes', $check_user1['block_time']);
            echo '<br>
add date: ' . date('d-m-Y H:i', $blockTime1);

            if ($blockTime1 > $currentTime1) {
                $diff = strtotime(date('d-m-Y', $currentTime1) . " 00:00:00") + ($blockTime1 - $currentTime1);
                $h = date('H', $diff);
                $min = date('i', $diff);
                if ($h == 00 || $h == 0) {

                    $min = $min;
                } else {
                    $min = (($h * 60) + $min);
                }
            }
            return $min;
        } else if (!empty($check_user2)) {
            $currentTime1 = time();
            $blockTime1 = strtotime('+120 minutes', $check_user2['block_time']);
            echo '<br>
add date: ' . date('d-m-Y H:i', $blockTime1);

            if ($blockTime1 > $currentTime1) {
                $diff = strtotime(date('d-m-Y', $currentTime1) . " 00:00:00") + ($blockTime1 - $currentTime1);
                $h = date('H', $diff);
                $min = date('i', $diff);
                if ($h == 00 || $h == 0) {

                    $min = $min;
                } else {
                    $min = (($h * 60) + $min);
                }
            }
            return $min;
        } else if (!empty($check_user3)) {
            $currentTime2 = time();
            $blockTime2 = strtotime('+120 minutes', $check_user3['block_time']);
            echo '<br>
add date: ' . date('d-m-Y H:i', $blockTime1);
            if ($blockTime2 > $currentTime2) {
                $diff = strtotime(date('d-m-Y', $currentTime2) . " 00:00:00") + ($blockTime2 - $currentTime2);
                $h = date('H', $diff);
                $min = date('i', $diff);
                if ($h == 00 || $h == 0) {

                    $min = $min;
                } else {
                    $min = (($h * 60) + $min);
                }
            }
            return $min;
        } else {

            return 'success';
        }
    }

    function getcartcount() {
        $cart = $this->session->userdata('cart');
        $cartcount = is_array($cart) ? count($cart) : 0;
        return $cartcount;
    }

    function index() {
        $this->session->unset_userdata('question_number');
        $this->session->unset_userdata("curquespost");
        $this->session->unset_userdata("curquesrefresh");
        $this->session->unset_userdata("visitinfo");
        $this->session->unset_userdata('attempts');
        $data = array();
        $data['title'] = lang("Kondar Global Trading Ltd");
        $data['active'] = "career";

        $data['country_data'] = $this->country_model->as_array()->get_many_by(array('status' => 1));
        $data['countries'] = $this->comman_model->search_serial_data('countries');

        $data['menus'] = $this->menu_model->get_all_menus();

        $cart = $this->session->userdata('cart');
        $data['cartcount'] = $this->getcartcount($cart);

        $data['vehicle_categories'] = $this->comman_model->all_data('tbl_vehicle_categories');

        $data['menu_vehicle_categories'] = $this->comman_model->all_data('tbl_vehicle_categories');

        $data['menu_product_types'] = $this->comman_model->get_product_type_for_menu();


        $data['vehicle_category_ids'] = $this->session->userdata('vehicle_category_id');

        if ($data['vehicle_category_ids'] == false)
            $data['vehicle_category_ids'] = array();


        $this->load->view('temp/include/header', $data);
        $this->load->view('career/career', $data);
        $this->load->view('temp/footer', $data);
    }

    function apply_form($id = false) {
        if (!$id) {
            redirect('career');
        }

        $this->set_unblock_user();

        $data = array();

        $data['country_data'] = $this->country_model->as_array()->get_many_by(array('status' => 1));
        $data['countries'] = $this->comman_model->search_serial_data('countries');
        $data['title'] = lang("Kondar Global Trading Ltd");
        $data['active'] = "applyForm";
        $this->session->unset_userdata('set_user');
        $data['apply_form'] = $this->career_model->get_data_by_id('job_section', array('id' => $id, 'status' => 1));
        $cart = $this->session->userdata('cart');
        $data['cartcount'] = $this->getcartcount($cart);

        if (empty($data['apply_form'])) {
            redirect('career');
        }

        if ($this->input->post('operation')) {
            $word = "a,b,c,d,e,f,g,h,i,j,k,l,m,1,2,3,4,5,6,7,8,9,0";
            $array = explode(",", $word);
            shuffle($array);
            $newstring = implode($array, "");
            $dynamic_code = substr($newstring, 0, 10);
            $this->load->library('form_validation');
            $this->form_validation->set_rules('name', lang('Name'), 'trim|required');
            $this->form_validation->set_rules('email', lang('Email'), 'trim|required|valid_email');
            $this->form_validation->set_rules('contact', lang('Telephone'), 'trim|required|numeric');
            if ($this->form_validation->run() == FALSE) {
                
            } else {
                $post_data = array('name' => $this->input->post('salutation') . $this->input->post('name'), 'email' => $this->input->post('email'), 'contact' => $this->input->post('contact'), 'job_id' => $id, 'country' => $this->input->post('country'), 'code' => $dynamic_code, 'confirm' => $dynamic_code);

                //edited by 4axiz to perform action of block_email_list table

                $this->load->model("block_list_email");


                $where_param = array();
                $where_param['str_email'] = $this->input->post('email');
                $select_param = array("dte_block", "str_email", "region");
                $blocked_email = $this->block_list_email->get_row("block_email_list", $select_param, $where_param);
                if (!empty($blocked_email)) {
                    $date = date("Y-m-d H:i:s", time());
                    $datelimit = strtotime('-120 minute', strtotime($date));
                    $datelimit = date("Y-m-d H:i:s", $datelimit);
                    if ($datelimit > $blocked_email[0]->dte_block) {   //block time expired
                        $where_param = array();
                        $where_param['str_email'] = $blocked_email[0]->str_email;
                        $this->block_list_email->delete_row("block_email_list", $where_param);
                    } else {
                        $int_block = strtotime($blocked_email[0]->dte_block);
                        $int_TR = 120 - intval(((time() - $int_block) / 60));
                        if ($int_TR < 0)
                            $int_TR = 0;
                        $career_msg = $this->get_career_msg(true);
                        $str = preg_replace('/\bPHRASE\b/', $blocked_email[0]->str_email, $career_msg[0]['blocked_email_msg']); //"The email " . $blocked_email[0]->str_email . "  is blocked in the section " . $blocked_email[0]->region . " . Therefore, please use an alternative email or wait " . $int_TR . "  minutes to use this email again within our website. Thank you";
                        $str = preg_replace('/\bSECTION\b/', $blocked_email[0]->region, $str); //"The email " . $blocked_email[0]->str_email . "  is blocked in the section " . $blocked_email[0]->region . " . Therefore, please use an alternative email or wait " . $int_TR . "  minutes to use this email again within our website. Thank you";
                        $this->session->set_flashdata('success', $str);

                        redirect('career/apply_form/' . $id);
                    }
                }


                //end region

                $check_user1 = $this->career_model->get_data_by_id('apply_form', array('email' => $this->input->post('email'), 'block' => 1));
                if (!empty($check_user1)) {
                    $currentTime1 = time();
                    $blockTime1 = strtotime('+120 minutes', $check_user1['block_time']);
                    echo '<br>
add date: ' . date('d-m-Y H:i', $blockTime1);

                    if ($blockTime1 > $currentTime1) {
                        $diff = strtotime(date('d-m-Y', $currentTime1) . " 00:00:00") + ($blockTime1 - $currentTime1);
                        $h = date('H', $diff);
                        $min = date('i', $diff);
                        if ($h == 00 || $h == 0) {

                            $min = $min;
                        } else {
                            $min = (($h * 60) + $min);
                        }
                    }

                    $this->session->set_flashdata('success', sprintf(lang('Sorry your email ID has been blocked. Please try again after %s minutes'), $min));
                    redirect('career/apply_form/' . $id);
                }

                $check_user3 = $this->career_model->get_data_by_id('promotion_form', array('email' => $this->input->post('email'), 'block' => 1));
                if (!empty($check_user3)) {
                    $currentTime2 = time();
                    $blockTime2 = strtotime('+120 minutes', $check_user3['block_time']);
                    echo '<br>
add date: ' . date('d-m-Y H:i', $blockTime1);
                    if ($blockTime2 > $currentTime2) {
                        $diff = strtotime(date('d-m-Y', $currentTime2) . " 00:00:00") + ($blockTime2 - $currentTime2);
                        $h = date('H', $diff);
                        $min = date('i', $diff);
                        if ($h == 00 || $h == 0) {

                            $min = $min;
                        } else {
                            $min = (($h * 60) + $min);
                        }
                    }

                    $this->session->set_flashdata('error', sprintf(lang('Sorry your email ID has been blocked. Please try again after %s minutes'), $min));
                    redirect('career/apply_form/' . $id);
                }
                $check_user2 = $this->career_model->get_data_by_id('apply_form', array('email' => $this->input->post('email'), 'job_id' => $id));
                if (!empty($check_user2)) {
                    $career_msg = $this->get_career_msg(true);
                    $this->session->set_flashdata('success', $career_msg[0]['already_applied']);
                    redirect('career/apply_form/' . $id);
                }
                $attempt = 1;
                $result = $this->career_model->add('apply_form', $post_data);

                //edited by 4axiz to execute the operation of block_email_list table

                $block_data = array();
                $block_data['int_errors'] = 0;
                $block_data['int_sents'] = 1;
                $block_data['dte_block'] = NULL;
                $block_data['int_block'] = 0;
                $block_data['str_code'] = $dynamic_code;
                $block_data['str_email'] = $this->input->post('email');
                $block_data['str_applicant'] = $this->input->post('name');
                $block_data['str_country'] = $this->input->post('country');
                $block_data['str_ip_address'] = $_SERVER['REMOTE_ADDR'];
                $block_data['str_telephone'] = $this->input->post('contact');
                $block_data['region'] = "Career";
                $this->block_list_email->insert_column("block_email_list", $block_data);

                //region end
                //create use session		
                $session_data = array('name' => $this->input->post('salutation') . '' . $this->input->post('name'), 'email' => $this->input->post('email'), 'user_id' => $result, 'job_id' => $id);
                $this->session->set_userdata('user_interview_data', $session_data);
                $html = $this->load->view('career/email/verify', array('name' => $this->input->post('salutation') . '' . $this->input->post('name'), 'dynamic_code' => $dynamic_code, 'attempt' => $attempt), true);
                $this->load->library('email');
                $config = array('mailtype' => 'html', 'charset' => 'utf-8', 'priority' => '1');

                $this->email->initialize($config);

                $this->email->from('hr@kondar.ca', 'KGT HR Department');

                $this->email->to($this->input->post('email'));
                $this->email->set_header("To", $this->input->post('salutation') . '' . $this->input->post('name') . '<' . $this->input->post('email') . '>');

                $subject = $data['apply_form']['name'] . " Verification Code";
                $this->email->subject($subject);
                $this->email->message($html);
                $result = $this->email->send();

                $this->session->set_flashdata('success', lang('You have been successfully submited.'));
                $this->session->unset_userdata('interview');
                redirect('career/verify_form');
            }
        }
        $data['menus'] = $this->menu_model->get_all_menus();
        $this->load->view('temp/include/header', $data);
        $this->load->view('career/apply_form', $data);
        $this->load->view('temp/footer', $data);
    }

    function pdfpreview($filename) {
        $fileUrl = site_url("assets/uploads/document/{$filename}");
        $this->load->view("career/pdfpreview", array('fileUrl' => $fileUrl));
    }

    function resume_form_upload() {

        if (!empty($_FILES['file']['name'])) {
            $field_name = 'file';
            $config['upload_path'] = './assets/uploads/document/';
            $config['allowed_types'] = 'doc|docx|DOC|DOCX|pdf|jpg|JPG|png|gif';
            $config['max_size'] = '1024';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload($field_name)) {
                echo $this->upload->display_errors();
            } else {
                $upload_data = $this->upload->data();
                $this->load->view("career/filepreview", array('file' => $upload_data));
            }
        }
    }

    function get_send_mail($attempt = '') {

        $user_data = $this->session->userdata('user_interview_data');


        if (empty($user_data)) {

            redirect('career');
        }

        $word = "a,b,c,d,e,f,g,h,i,j,k,l,m,1,2,3,4,5,6,7,8,9,0";

        $array = explode(",", $word);

        shuffle($array);

        $newstring = implode($array, "");

        $dynamic_code = substr($newstring, 0, 10);


        //edited by to excute the operation for the block_email_list table
        $this->load->model("block_list_email");

        $where_param = array();
        $where_param['str_email'] = $user_data['email'];
        $select_param = array('int_sents' => 'int_sents');
        $block_info = $this->block_list_email->get_row("block_email_list", $select_param, $where_param);
        $block_data = array();
        $block_data['int_sents'] = $block_info[0]->int_sents + 1;
        $block_data['str_code'] = $dynamic_code;
        $this->block_list_email->update_column("block_email_list", $where_param, $block_data);

        //region end


        $this->comman_model->update_data_by_id('apply_form', array('code' => $dynamic_code, 'confirm' => $dynamic_code), 'id', $user_data['user_id']);

        $email_data = array(
            'name' => $user_data['name'],
            'dynamic_code' => $dynamic_code
        );
        $html = $this->load->view('master/email/verification_code_email', $email_data, TRUE);

        $this->load->library('email');

        $config = array('mailtype' => 'html', 'charset' => 'utf-8', 'priority' => '1');

        $this->email->initialize($config);


        $this->email->from('hr@kondar.ca', 'KGT HR Department');


        $this->email->to($user_data['email']);
        $this->email->set_header("To", $user_data['name'] . '<' . $user_data['email'] . '>');

        $this->email->subject("Career Verification Code Resend Attempt : " . ($attempt) . " ");

        $this->email->message($html);

        $this->email->send();

        echo 'success';
    }

    function get_cancel_form() {
        $user_data = $this->session->userdata('user_interview_data');
        $cart = $this->session->userdata('cart');
        $data['cartcount'] = $this->getcartcount($cart);
        if (empty($user_data)) {
            redirect('career');
        }

        $check_attempt = $this->session->userdata('attempts');

        $result1 = $this->comman_model->delete_by_id('apply_form', array('id' => $user_data['user_id']));

        //edited by 4axiz to execute operation on block_email_list

        $this->load->model("block_list_email");
        $where_param = array();
        $where_param['str_email'] = $user_data['email'];
        $block_data = array();
        $block_data['int_block'] = 1;
        $block_data['dte_block'] = date("Y-m-d H:i:s", time());
        $this->block_list_email->update_column("block_email_list", $where_param, $block_data);

        //end region

        $this->session->unset_userdata('user_interview_data');
        $this->session->unset_userdata('attempts');
        echo 'success';
    }

    function get_verify() {
        $this->load->model("block_list_email");
        $user_data = $this->session->userdata('user_interview_data');
        if (empty($user_data)) {
            redirect('career');
        }
        if (isset($check['attempts'])) {
            $set = array('attempts' => 0);
            $this->session->set_userdata($set);
        }

        $check_attempt = $this->session->userdata('attempts');
        if ($check_attempt < 3) {
            $code = $this->input->post('code');
            $check1 = $this->career_model->get_data_by_id('apply_form', array('code' => $code));
            $cart = $this->session->userdata('cart');
            $data['cartcount'] = $this->getcartcount($cart);
            if (empty($check1)) {

                $attmpt = $this->session->userdata('attempts') + 1;
                $set = array('attempts' => $attmpt);
                $this->session->set_userdata($set);
                $this->session->userdata('attempts');

                //edited by 4axiz to execute operation on block_email_list table

                $where_param = array();
                $where_param['str_email'] = $user_data['email'];
                $select_param = array('int_errors' => 'int_errors');
                $block_info = $this->block_list_email->get_row("block_email_list", $select_param, $where_param);
                $block_data = array();
                $block_data['int_errors'] = $block_info[0]->int_errors + 1;
                $this->block_list_email->update_column("block_email_list", $where_param, $block_data);

                //region end              


                $attmpt_str = "";
                switch ($attmpt) {

                    case 1 :
                        $attmpt_str = "first";
                        break;

                    case 2 :
                        $attmpt_str = "second";
                        break;

                    case 3 :
                        $attmpt_str = "third";
                        break;
                }

                echo lang('Your code is wrong.Please try again.') . $attmpt_str . " attempt";
            } else {

                $this->session->set_userdata('interview', 'set');
                $this->career_model->update_data_by_id('apply_form', array('confirm' => 'confirm'), 'id', $user_data['user_id']);

                //edited by 4axiz to execute the block_email_list table

                $where_param = array();

                $where_param['str_email'] = $user_data['email'];
                $this->block_list_email->delete_row("block_email_list", $where_param);

                //end the block

                echo 'success';
            }
        } else {

            $this->career_model->update_data_by_id('apply_form', array('block' => 1, 'block_time' => time()), 'id', $user_data['user_id']);

            //edited by 4axiz to execute operation on block_email_list table

            $where_param = array();
            $where_param['str_email'] = $user_data['email'];

            $block_data = array();
            $block_data['int_block'] = 2;
            $block_data['dte_block'] = date("Y-m-d H:i:s", time());
            $this->block_list_email->update_column("block_email_list", $where_param, $block_data);

            //region end

            $this->session->unset_userdata('user_interview_data');
            $this->session->unset_userdata('attempts');
            echo 'redirect';
        }
    }

    function verify_form() {

        $data = array();
        //check for
        $user_data = $this->session->userdata('user_interview_data');
        $cart = $this->session->userdata('cart');
        $data['cartcount'] = $this->getcartcount($cart);
        if (empty($user_data)) {

            redirect('career');
        }
        $this->session->unset_userdata('question_number');
        $set_user = $this->session->userdata('set_user');
        if (empty($set_user)) {
            $this->session->set_userdata('set_user', true);
        } else {
            $this->career_model->update_data_by_id('apply_form', array('block' => 1, 'block_time' => time()), 'id', $user_data['user_id']);
            $this->session->unset_userdata('user_interview_data');
            $this->session->unset_userdata('set_user');
            $this->session->set_flashdata('error', 'Invalid code');
            redirect('career/career');
        }


        $check_interview = $this->session->userdata('interview');

        if (!isset($check_interview) || !empty($check_interview)) {

            redirect('career/interview');
        }
        $data['career_msg'] = $this->get_career_msg(true);
        $data['title'] = lang(lang("Kondar Global Trading Ltd"));
        $data['active'] = "applyForm";
        $data['user_email'] = $user_data['email'];

        $data['menus'] = $this->menu_model->get_all_menus();
        $this->load->view('temp/include/header', $data);
        $this->load->view('career/verify_form', $data);
        $this->load->view('temp/footer', $data);
    }

    function interview($id = false) {
        $data = array();
        $data['title'] = lang("Kondar Global Trading Ltd");
        $data['active'] = "applyForm";

        $data['career_msg'] = $this->get_career_msg(true);

        $user_data = $this->session->userdata('user_interview_data');
        $cart = $this->session->userdata('cart');
        $data['cartcount'] = $this->getcartcount($cart);
        if (empty($user_data)) {
            redirect('career');
        }

        $quest_num = $this->session->userdata('question_number');

        if ($quest_num) {
            $curquespost = (int) $this->session->userdata("curquespost");
            $curquesrefresh = (int) $this->session->userdata("curquesrefresh");
        } else {
            $curquespost = 0;
            $curquesrefresh = 0;
            $this->session->set_userdata("curquespost", $curquespost);
            $this->session->set_userdata("curquesrefresh", $curquesrefresh);
        }

        if ($this->input->post('operation')) {
            $curquespost++;
            $this->session->set_userdata("curquespost", $curquespost);
        } else {
            $curquesrefresh++;
            $this->session->set_userdata("curquesrefresh", $curquesrefresh);
        }

        if ($curquesrefresh - $curquespost > 1) {
            $this->ApplyJob_BlockIfRefresh("interview");
            $this->ApplyJob_BlockIfRefresh("interview");
        }


        if (isset($quest_num) && !empty($quest_num)) {
            $this->session->set_userdata('question_number', $quest_num + 1);
            $data['question_number'] = $quest_num + 1;
        } else {
            $this->session->set_userdata('question_number', 1);
            $data['question_number'] = 1;
        }


        if ($this->input->post('operation')) {
            $quest_num1 = $this->session->userdata('question_number');
            $this->session->set_userdata('question_number', $quest_num1 - 1);
            $check = $this->session->userdata('question_detail');
            if (isset($check) && !empty($check)) {
                $check = $this->session->userdata('question_detail');
                array_push($check, array('question_id' => $this->input->post('question_id')));
                $this->session->set_userdata('question_detail', $check);
            } else {
                $ar = array('question_id' => $this->input->post('question_id'));
                $this->session->set_userdata('question_detail', array($ar));
            }

            $post_data = array('answer' => $this->input->post('answer'), 'user_id' => $user_data['user_id'], 'job_id' => $user_data['job_id'], 'question_id' => $this->input->post('question_id'), 'create_date' => time());
            $result = $this->career_model->add('user_ans', $post_data);
            redirect('career/interview');
        }

        $query = array('job_id' => $user_data['job_id']);
        $hello = $this->session->userdata('question_detail');
        if (isset($hello) && !empty($hello)) {
            $where = array();
            foreach ($hello as $set_data) {
                $where[] = $set_data['question_id'];
            }

            $data['all_data'] = $this->career_model->get_data_by_where_in('question', $query, 'not', 'id', $where);
        } else {
            $data['all_data'] = $this->career_model->get_all_data_by_id('question', $query);
        }

        if (empty($data['all_data'])) {
            $this->session->unset_userdata('question_detail');
            redirect('career/resume_form');
        }
        $data['menus'] = $this->menu_model->get_all_menus();

        $this->load->view('temp/include/header', $data);
        $this->db->join("question", "question.id = user_ans.question_id");

        $data['all_answers'] = $this->career_model->get_all_data_by_id('user_ans', array('user_ans.user_id' => $user_data['user_id'], 'user_ans.job_id' => $user_data['job_id']));

        $this->load->view('career/interview', $data);
    }

    function set_block_user() {
        $page = $this->input->post('form');

        if ($page == 'order') {
            $user_data = $this->session->userdata('user_order_data');
            if (empty($user_data)) {
                redirect('home');
            }

            $this->career_model->update_data_by_id('contact_form', array('block' => 1, 'block_time' => time()), 'id', $user_data['user_id']);
            $this->session->unset_userdata('user_order_data');
            $this->session->unset_userdata('attempts');
            echo 'success';
        }

        if ($page == 'promotion') {
            $user_data = $this->session->userdata('user_promotion_data');
            if (empty($user_data)) {
                redirect('promotion/index');
            }

            $this->career_model->update_data_by_id('promotion_form', array('block' => 1, 'block_time' => time()), 'id', $user_data['user_id']);
            $this->session->unset_userdata('user_promotion_data');
            $this->session->unset_userdata('attempts');
            echo 'success';
        }

        if ($page == 'contact') {
            $user_data = $this->session->userdata('user_contact_data');
            if (empty($user_data)) {
                redirect('front/contact_us');
            }

            $this->career_model->update_data_by_id('contact_form', array('block' => 1, 'block_time' => time()), 'id', $user_data['user_id']);
            $this->session->unset_userdata('user_contact_data');
            $this->session->unset_userdata('attempts');
            echo 'success';
        }

        if ($page == 'career') {
            $user_data = $this->session->userdata('user_interview_data');
            if (empty($user_data)) {
                redirect('career/career');
            }
            $cart = $this->session->userdata('cart');
            $data['cartcount'] = $this->getcartcount($cart);

            $this->career_model->update_data_by_id('apply_form', array('block' => 1, 'block_time' => time()), 'id', $user_data['user_id']);

            //edited by 4axiz to execute operation on block_email_list
            $this->load->model("block_list_email");
            $where_param = array();
            $where_param["str_email"] = $user_data['email'];
            $select_param = array("str_email" => "str_email");
            $block_info = $this->block_list_email->get_row('block_email_list', $select_param, $where_param);

            if (!empty($block_info)) {
                $where_param = array();
                $where_param["str_email"] = $user_data['email'];
                $block_data = array();
                $block_data['int_block'] = 5;
                $block_data['dte_block'] = date("Y-m-d H:i:s", time());
                $this->block_list_email->update_column("block_email_list", $where_param, $block_data);
            } else {
                $block_data = array();
                $block_data['int_errors'] = 0;
                $block_data['int_sents'] = 0;
                $block_data['int_block'] = 5;
                $block_data['dte_block'] = date("Y-m-d H:i:s", time());
                $block_data['str_email'] = $user_data['email'];
                $block_data['str_applicant'] = $user_data['name'];

                $block_data['str_ip_address'] = $_SERVER['REMOTE_ADDR'];

                $block_data['region'] = "Career";
                $this->block_list_email->insert_column("block_email_list", $block_data);
            }
//end region

            $this->session->unset_userdata('attempts');
            echo 'success';
        }
    }

    //block the user

    function set_next_question($echo = true) {

        $id = $this->input->post('id');
        $check = $this->session->userdata('question_detail');
        $user_data = $this->session->userdata('user_interview_data');
        $cart = $this->session->userdata('cart');
        $data['cartcount'] = $this->getcartcount($cart);
        $result1 = $this->career_model->delete_by_id('user_ans', array('user_id' => $user_data['user_id']));
        $this->career_model->update_data_by_id('apply_form', array('block' => 1, 'block_time' => time()), 'id', $user_data['user_id']);

        $this->load->model("block_list_email");
        $where_param = array();
        $where_param['id'] = $user_data['user_id'];
        $select_param = "*";
        $user_info = $this->block_list_email->get_row("apply_form", $select_param, $where_param);

        $where_param = array();
        $where_param["str_email"] = $user_data['email'];
        $select_param = array("str_email" => "str_email");
        $block_info = $this->block_list_email->get_row('block_email_list', $select_param, $where_param);

        if (!empty($block_info)) {
            $where_param = array();
            $where_param["str_email"] = $user_data['email'];
            $block_data = array();
            $block_data['int_block'] = 5;
            $block_data['dte_block'] = date("Y-m-d H:i:s", time());
            $this->block_list_email->update_column("block_email_list", $where_param, $block_data);
        } else {
            $block_data = array();
            $block_data['int_errors'] = 0;
            $block_data['int_sents'] = 0;
            $block_data['int_block'] = 5;
            $block_data['dte_block'] = date("Y-m-d H:i:s", time());
            $block_data['str_email'] = $user_data['email'];
            $block_data['str_applicant'] = $user_info[0]->name;
            $block_data['str_country'] = $user_info[0]->country;
            $block_data['str_ip_address'] = $_SERVER['REMOTE_ADDR'];
            $block_data['str_telephone'] = $user_info[0]->contact;
            $block_data['region'] = "Career";
            $this->block_list_email->insert_column("block_email_list", $block_data);
        }
        $this->session->unset_userdata('user_interview_data');
        $this->session->unset_userdata('question_detail');
        if ($echo)
            echo 'success#**#' . $user_data['email'];
    }

    function resume_form() {
        $data = array();
        $this->session->unset_userdata('question_detail');
        $this->session->unset_userdata('interview');
        $user_data = $this->session->userdata('user_interview_data');
        $cart = $this->session->userdata('cart');
        $data['cartcount'] = $this->getcartcount($cart);

        if (empty($user_data)) {
            redirect('career');
        }

        $data['title'] = lang("Kondar Global Trading Ltd");
        $data['active'] = "applyForm";
        if ($this->input->post('operation')) {
            if (!empty($_POST['filename'])) {
                $post_data = array('document' => $_POST['filename']);
                $result = $this->career_model->update_data_by_id('apply_form', $post_data, 'id', $user_data['user_id']);
                $user_data1 = $this->career_model->get_data_by_id('apply_form', array('id' => $user_data['user_id']));
                $job_title = $this->career_model->get_data_by_id('job_section', array('id' => $user_data['job_id']));


                //edited by to excute the operation for the block_email_list table
                $this->load->model("block_list_email");
                $where_param = array();
                $where_param['countryName'] = $user_data1['country'];
                $select_param = array("alpha_2");
                $block_email = $this->block_list_email->get_row("countries", $select_param, $where_param);
                $user_data1['flag_name'] = $block_email[0]->alpha_2;
                //region end

                $job = $this->career_model->get_data_by_id('job_section', array('id' => $user_data1['job_id']));
                $answer = $this->career_model->get_all_data_by_id('user_ans', array('user_id' => $user_data['user_id']));
                //for admin
                $email_admin = $this->load->view('career/email/resume_admin', array('user_data1' => $user_data1, "job" => $job, "answer" => $answer), true);
                $email_user = $this->load->view('career/email/resume_user', array('user_data1' => $user_data1, "job" => $job, "answer" => $answer), true);
                $this->load->library('email');
                $config = array('mailtype' => 'html', 'charset' => 'utf-8', 'priority' => '1');
                $this->email->initialize($config);
                //for admin mail
                $this->email->from($user_data['email'], $user_data['name']);

                $this->email->to('hr@kondar.ca');

                $this->email->set_header("To", 'KGT HR Department<hr@kondar.ca>');


                $subject = $job_title['name'] . " application form";
                $this->email->subject($subject);
                $this->email->message($email_admin);
                $this->email->attach(realpath(__DIR__ . '/../../assets/uploads/document/' . $_POST['filename']));
                $this->email->send();
                //for user mail

                $this->email->from('hr@kondar.ca', 'KGT HR Department');

                $this->email->to($user_data['email']);
                $this->email->set_header("To", $user_data['name'] . '<' . $user_data['email'] . '>');


                $subject = $job_title['name'] . " application form";
                $this->email->subject($subject);

                //attached already...
                $this->email->message($email_user);
                $this->email->send();
                $career_msg = $this->get_career_msg(true);
                $this->session->set_flashdata('success', preg_replace('/\bPHRASE\b/', $user_data['email'], $career_msg[0]['modal_success_body']));
                redirect('career/success_form');
            }
        } else {

            $this->ApplyJob_BlockIfRefresh("resume_form");
        }

        $data['career_msg'] = $this->get_career_msg(true);

        $this->db->join("question", "question.id = user_ans.question_id");
        $data['all_answers'] = $this->comman_model->get_all_data_by_id('user_ans', array('user_ans.user_id' => $user_data['user_id'], 'user_ans.job_id' => $user_data['job_id']));

        $data['menus'] = $this->menu_model->get_all_menus();
        $this->load->view('temp/include/header', $data);
        $this->load->view('career/resume_form', $data);
        $this->load->view('temp/footer', $data);
    }

    function careerblocked() {
        $data = array();
        $data['title'] = lang("Kondar Global Trading Ltd");
        $data['active'] = "applyForm";
        $cart = $this->session->userdata('cart');
        $data['cartcount'] = $this->getcartcount($cart);

        $data['menus'] = $this->menu_model->get_all_menus();
        $this->load->view('temp/include/header', $data);
        $this->load->view('career/careerblocked', $data);
        $this->load->view('temp/footer', $data);
    }

    function ApplyJob_BlockIfRefresh($formname) {
        $visitKey = "visit_" . $formname;
        $visitInfo = $this->session->userdata('visitinfo');
        if ($visitInfo && isset($visitInfo[$visitKey])) {
            //block user
            $this->set_next_question(false);
            $this->session->unset_userdata("visitinfo");
            redirect('career/careerblocked');
        }

        $visitInfo = $visitInfo ? $visitInfo : array();
        $visitInfo[$visitKey] = true;
        $this->session->set_userdata('visitinfo', $visitInfo);
    }

    function success_form() {
        $data = array();
        $cart = $this->session->userdata('cart');
        $data['cartcount'] = $this->getcartcount($cart);
        $data['title'] = lang("Kondar Global Trading Ltd");
        $data['active'] = "applyForm";

        $data['menus'] = $this->menu_model->get_all_menus();
        $this->load->view('temp/include/header', $data);
        $user_data = $this->session->userdata('user_interview_data');
        if (empty($user_data)) {
            
        }
        $data['career_msg'] = $this->get_career_msg(true);
        $this->load->view('career/success', $data);
        $this->load->view('temp/footer', $data);
        $this->session->unset_userdata('user_interview_data');
    }

    function set_question() {

        $id = $this->input->post('id');
        if (isset($id) && !empty($id)) {
            $check = $this->session->userdata('question_detail');
            if (isset($check) && !empty($check)) {
                $check = $this->session->userdata('question_detail');
                array_push($check, array('question_id' => $id));
                $this->session->set_userdata('question_detail', $check);
            } else {
                $ar = array('question_id' => $id);
                $this->session->set_userdata('question_detail', array($ar));
            }
            echo 'success';
        } else {
            echo 'error';
        }
    }

    // this function will execute when an email is sent more that 3 times
    function set_block_user_sent_email() {
        $this->load->model("block_list_email");
        $user_data = $this->session->userdata('user_interview_data');
        $where_param = array();
        $where_param["str_email"] = $user_data['email'];
        $block_data = array();
        $block_data['int_block'] = 3;
        $block_data['dte_block'] = date("Y-m-d H:i:s", time());
        $this->block_list_email->update_column("block_email_list", $where_param, $block_data);

        $where_param = array();
        $where_param['email'] = $user_data['email'];
        $this->block_list_email->delete_row("block_email_list", $where_param);
    }

    function get_timer() {
        $value = $this->input->post('value');
        if ($value == 'edit') {
            $select = "career_edit_timer,career_edit_msg";
        } elseif ($value == 'main') {
            $select = "main_career_timer,main_career_msg";
        } elseif ($value == 'preview') {
            $select = "career_preview_timer,career_preview_msg";
        } else {
            $select = "career_popup_timer,career_popup_msg";
        }
        $time = $this->comman_model->get_timer('career_timer', $select);
        echo json_encode($time);
    }

    function get_career_msg($check = false) {
        $select_param = "*";
        $result = $this->comman_model->get_timer('career_message', $select_param);

        return $result;
    }

}

/* End of file welcome.php */

/* Location: ./application/controllers/welcome.php */ 
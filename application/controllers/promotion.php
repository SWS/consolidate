<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Promotion extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('serial_model', 'menu_model', 'country_model', 'comman_model', 'promotion_model'));
        $this->load->helper(array('assets', 'av_helper', 'cart_helper'));
        $this->load->language(array('header', 'promotion', 'footer'));
    }

    function save_user_details() {

        $this->load->model("block_list_email");
        $cart = $this->session->userdata('cart');
        $data['cartcount'] = $this->getcartcount($cart);
        $title = $this->input->post('salutation');
        $email = $this->input->post('email');
        $country = $this->input->post('country_title1');

        $telephone = $this->input->post('telephone');
        $name = $this->input->post('name');
        $code = $this->input->post('code');
        $block_new_data = array(
            'email' => $email,
            'created_time' => time(),
            'user_name' => $title . $name,
            'country' => $country,
            'telephone' => $telephone,
            'code' => $code,
            'status' => 1
        );


        $length = 10;
        $randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);


        $session_data = array(
            'randomString' => $randomString,
            'user_email' => $email
        );
        $this->session->set_userdata($session_data);


        $new_session_data = $this->session->userdata('randomString');


        $homepage_data = $this->comman_model->search_serial_data('home_page');


        $msg = file_get_contents('save_user_details.html');
        $msg = str_replace('{base_url}', base_url(), $msg);
        $msg = str_replace('{name}', $title . ' ' . $name, $msg);
        $msg = str_replace('{serial_no}', $code, $msg);
        $msg = str_replace('{new_session_data}', $new_session_data, $msg);

        $wrong_attempt_email = $this->session->userdata('wrong_attempt_email');


        $config = $this->config->item('emailconfig');


        if (!empty($config)) {
            $this->load->library('email', $config);
        } else {
            $this->load->library('email');
        }

        $subject = 'Award verification code for the serial number ' . $code;
        $to = $email;
        $cc = '';
        $fromname = 'KGT Marketing Department';
        $from = 'marketing@kondar.ca';

        $message = $msg;


        $this->email->set_newline("\r\n");
        $this->email->from($from, $fromname);
        $this->email->to($to);
        $this->email->set_header("To", $title . " " . $name . '<' . $to . '>');
        $this->email->subject($subject);
        $this->email->message($message);


        $where_param = array();
        $where_param['str_email'] = $email;
        $select_param = array("dte_block", "str_email", "region");
        $block_email = $this->block_list_email->get_row("block_email_list", $select_param, $where_param);
        $date = date("Y-m-d H:i:s", time());
        $datelimit = strtotime('-120 minute', strtotime($date));
        $datelimit = date("Y-m-d H:i:s", $datelimit);
        if ($datelimit > $block_email[0]->dte_block) {
            $where_param = array();
            $where_param['str_email'] = $block_email[0]->str_email;
            $this->block_list_email->delete_row("block_email_list", $where_param);

            $where_param = array();
            $where_param['email'] = $block_email[0]->str_email;
            $where_param['status'] = 1;
            $this->block_list_email->delete_row("block_users", $where_param);


            $block_data = $this->serial_model->getUserBlockByStatus('block_users', $email, '1');

            if (!empty($block_data))
                $block_user_time = $block_data[0]->created_time;
            else
                $block_user_time = time();

            $now = time();
            $check_time_block = $now - $block_user_time;

            if (!empty($block_data)) {


                if ($check_time_block >= 7200) {


                    $this->email->send();
                    $this->comman_model->add('block_users', $block_new_data);


                    $last_insert_id = $this->db->insert_id();

                    //edited by 4axiz to execute the operation of block_email_list table

                    $block_data = array();
                    $block_data['int_errors'] = 0;
                    $block_data['int_sents'] = 1;
                    $block_data['dte_block'] = NULL;
                    $block_data['int_block'] = 0;
                    $block_data['str_code'] = $randomString;
                    $block_data['str_email'] = $email;
                    $block_data['str_applicant'] = $name;
                    $block_data['str_country'] = $country;
                    $block_data['str_ip_address'] = $_SERVER['REMOTE_ADDR'];
                    $block_data['str_telephone'] = $telephone;
                    $block_data['region'] = "Award";
                    $this->block_list_email->insert_column("block_email_list", $block_data);

                    //region end

                    $session_data = array(
                        'last_inserted_block_id' => $last_insert_id
                    );
                    $this->session->set_userdata($session_data);
                    echo '1##*##' . $check_time_block . '##*##' . $email;
                } else {
                    echo '0##*##' . $check_time_block . '##*##' . $email;
                }
            } else {


                $this->email->send();
                $this->comman_model->add('block_users', $block_new_data);
                $last_insert_id = $this->db->insert_id();

                //edited by 4axiz to execute the operation of block_email_list table

                $block_data = array();
                $block_data['int_errors'] = 0;
                $block_data['int_sents'] = 1;
                $block_data['dte_block'] = NULL;
                $block_data['int_block'] = 0;
                $block_data['str_code'] = $randomString;
                $block_data['str_email'] = $email;
                $block_data['str_applicant'] = $name;
                $block_data['str_country'] = $country;
                $block_data['str_ip_address'] = $_SERVER['REMOTE_ADDR'];
                $block_data['str_telephone'] = $telephone;
                $block_data['region'] = "Award";
                $this->block_list_email->insert_column("block_email_list", $block_data);

                //region end

                $session_data = array(
                    'last_inserted_block_id' => $last_insert_id
                );
                $this->session->set_userdata($session_data);
                echo '1##*##' . $check_time_block . '##*##' . $email;
            }
        } else {
            $int_block = strtotime($block_email[0]->dte_block);
            $int_TR = 120 - intval(((time() - $int_block) / 60));
            if ($int_TR < 0)
                $int_TR = 0;

            echo '2##*##' . $block_email[0]->region . '##*##' . $email . "##*##" . $int_TR;
        }
    }

    public function checkserialcode() {
        $this->load->model("block_list_email");
        $cart = $this->session->userdata('cart');
        $data['cartcount'] = $this->getcartcount($cart);
        $randomString = $this->session->userdata('randomString');
        $code_VerificationCode = $this->input->post('code_VerificationCode');
        $emailVerificationCode = $this->input->post('emailVerificationCode');
        $wrong_attempt = $this->session->userdata('wrong_attempt');
        $last_inserted_block_id = $this->session->userdata('last_inserted_block_id');
        $wrong_attempt_email = $this->session->userdata('wrong_attempt_email');

        $user_email = $this->input->post('user_email');
        $user_details_name = $this->input->post('user_details_name');
        $user_details_countries = $this->input->post('user_details_countries');
        $user_details_telephone = $this->input->post('user_details_telephone');


        $block_data_new = array(
            'email' => $user_email,
            'created_time' => time(),
            'user_name' => $user_details_name,
            'country' => $user_details_countries,
            'telephone' => $user_details_telephone,
            'code' => $code_VerificationCode,
            'status' => 1
        );

        $block_data = $this->serial_model->getUserBlockByStatus('block_users', $user_email, '1');

        $new_block_data = array();
        if (!empty($block_data)) {
            foreach ($block_data as $block_user_data) {
                if ($block_user_data->id != $last_inserted_block_id) {
                    $new_block_data[] = $block_user_data;
                }
            }
        }
        $block_data = $new_block_data;
        $result = $this->serial_model->check_serial_number($code_VerificationCode);

        if (!empty($block_data))
            $block_user_time = $block_data[0]->created_time;
        else
            $block_user_time = time();

        $now = time();
        $check_time_block = $now - $block_user_time;

        if (empty($block_data) || $check_time_block >= 7200) {
            if (trim($emailVerificationCode) == $randomString) {
                if (!empty($result)) {
                    if ($wrong_attempt_email == $user_email && $wrong_attempt == '3') {

                        //edited by 4axiz to execute operation on block_email_list

                        $where_param = array();
                        $where_param['str_email'] = $user_email;
                        $block_data = array();
                        $block_data['int_block'] = 1;
                        $block_data['dte_block'] = date("Y-m-d H:i:s", time());
                        $this->block_list_email->update_column("block_email_list", $where_param, $block_data);

                        //end region

                        $this->comman_model->add('block_users', $block_data_new);
                        $wrong_attempt = 1;
                        echo '4';
                    } else if ($wrong_attempt_email != $user_email) {
                        $wrong_attempt = 1;
                        if (!empty($result)) {
                            if ($result[0]->status == 1) {
                                echo '1';
                            } else {
                                echo '5';
                                $where_param = array('id' => $last_inserted_block_id);
                                $this->block_list_email->delete_row("block_users", $where_param);
                                $wrong_attempt = array(
                                    'user_email' => ""
                                );

                                //edited by 4axiz to execute the block_email_list table

                                $where_param = array();

                                $where_param['str_email'] = $user_email;
                                $this->block_list_email->delete_row("block_email_list", $where_param);

                                //end the block

                                $this->session->set_userdata($wrong_attempt);
                            }
                        } else {
                            echo '0';
                            $where_param = array('id' => $last_inserted_block_id);
                            $this->block_list_email->delete_row("block_users", $where_param);
                            //edited by 4axiz to execute the block_email_list table

                            $where_param = array();

                            $where_param['str_email'] = $user_email;
                            $this->block_list_email->delete_row("block_email_list", $where_param);

                            //end the block
                        }
                    } else if (($wrong_attempt == NULL || $wrong_attempt == 0) && $wrong_attempt_email == $user_email) {
                        $wrong_attempt = 1;
                        if (!empty($result)) {
                            if ($result[0]->status == 1) {
                                echo '1';
                            } else {
                                echo '5';
                                $where_param = array('id' => $last_inserted_block_id);
                                $this->block_list_email->delete_row("block_users", $where_param);

                                //edited by 4axiz to execute the block_email_list table

                                $where_param = array();

                                $where_param['str_email'] = $user_email;
                                $this->block_list_email->delete_row("block_email_list", $where_param);

                                //end the block
                            }
                        } else {
                            echo '0';
                            $where_param = array('id' => $last_inserted_block_id);
                            $this->block_list_email->delete_row("block_users", $where_param);

                            //edited by 4axiz to execute the block_email_list table

                            $where_param = array();

                            $where_param['str_email'] = $user_email;
                            $this->block_list_email->delete_row("block_email_list", $where_param);

                            //end the block
                        }
                    } else if ($wrong_attempt_email == $user_email) {
                        $wrong_attempt = 1;
                        if (!empty($result)) {
                            if ($result[0]->status == 1) {
                                echo '1';
                                $wrong_attempt = array(
                                    'wrong_attempt' => $wrong_attempt,
                                    'wrong_attempt_email' => $user_email
                                );
                                $this->session->set_userdata($wrong_attempt);
                            } else {
                                echo '5';
                                $where_param = array('id' => $last_inserted_block_id);
                                $this->block_list_email->delete_row("block_users", $where_param);
                                $wrong_attempt = array(
                                    'wrong_attempt' => "",
                                    'user_email' => "",
                                    'wrong_attempt_email' => ""
                                );
                                $this->session->set_userdata($wrong_attempt);

                                //edited by 4axiz to execute the block_email_list table

                                $where_param = array();

                                $where_param['str_email'] = $user_email;
                                $this->block_list_email->delete_row("block_email_list", $where_param);

                                //end the block
                            }
                        } else {
                            echo '0';
                            $where_param = array('id' => $last_inserted_block_id);
                            $this->block_list_email->delete_row("block_users", $where_param);
                            $wrong_attempt = array(
                                'wrong_attempt' => $wrong_attempt,
                                'wrong_attempt_email' => $user_email
                            );
                            $this->session->set_userdata($wrong_attempt);

                            //edited by 4axiz to execute the block_email_list table

                            $where_param = array();

                            $where_param['str_email'] = $user_email;
                            $this->block_list_email->delete_row("block_email_list", $where_param);

                            //end the block
                        }
                    }
                    $wrong_attempt = array(
                        'wrong_attempt' => "",
                        'wrong_attempt_email' => ""
                    );
                    $this->session->set_userdata($wrong_attempt);
                } else {
                    echo '0';
                    $where_param = array('id' => $last_inserted_block_id);
                    $this->block_list_email->delete_row("block_users", $where_param);

                    //edited by 4axiz to execute the block_email_list table

                    $where_param = array();

                    $where_param['str_email'] = $user_email;
                    $this->block_list_email->delete_row("block_email_list", $where_param);

                    //end the block
                }
            } else {
                if ($wrong_attempt_email == $user_email && $wrong_attempt >= '3') {
                    $this->comman_model->add('block_users', $block_data_new);
                    $wrong_attempt = 1;

                    //edited by 4axiz to execute operation on block_email_list table

                    $where_param = array();
                    $where_param['str_email'] = $user_email;

                    $block_data = array();
                    $block_data['int_block'] = 2;
                    $block_data['dte_block'] = date("Y-m-d H:i:s", time());
                    $this->block_list_email->update_column("block_email_list", $where_param, $block_data);

                    //region end

                    echo '4';
                } else if ($wrong_attempt_email != $user_email) {
                    $wrong_attempt = 1;
                    echo '2##*##' . $wrong_attempt;
                } else if (($wrong_attempt == NULL || $wrong_attempt == 0) && $wrong_attempt_email == $user_email) {
                    $wrong_attempt = 1;
                    echo '2##*##' . $wrong_attempt;
                } else if ($wrong_attempt > 0) {
                    $wrong_attempt++;

                    //edited by 4axiz to execute operation on block_email_list table

                    $where_param = array();
                    $where_param['str_email'] = $user_email;
                    $select_param = array('int_errors' => 'int_errors');
                    $block_info = $this->block_list_email->get_row("block_email_list", $select_param, $where_param);
                    $block_data = array();
                    $block_data['int_errors'] = $block_info[0]->int_errors + 1;
                    $this->block_list_email->update_column("block_email_list", $where_param, $block_data);

                    //region end

                    echo '2##*##' . $wrong_attempt;
                }
                $wrong_attempt = array(
                    'wrong_attempt' => $wrong_attempt,
                    'wrong_attempt_email' => $user_email
                );
                $this->session->set_userdata($wrong_attempt);
            }
        } else {
            if ($check_time_block >= 7200 && trim($emailVerificationCode) == $randomString) {
                echo '1';
            } else {
                echo '4';
            }
        }
        echo "##*##" . $user_email;
    }

    function get_award_title() {
        $code = $this->input->post('code');
        $remarks = $this->comman_model->get_awards_remarks($code);
        $data['award_msg'] = $this->getAwardMsg('true');

        echo str_replace('PRIZE_TITLE', $remarks[0]['title'], $data['award_msg'][0]['congratulation']);
    }

    public function clearSession() {
        $session_data = array(
            'randomString' => "",
            'user_email' => ""
        );
        $this->session->set_userdata($session_data);
    }

    public function checkTimeInBlock() {
        $cart = $this->session->userdata('cart');
        $data['cartcount'] = $this->getcartcount($cart);
        $user_email = $this->input->post('email');

        $block_data = $this->serial_model->getUserBlockByStatus('block_users', $user_email, '1');
        if (!empty($block_data))
            $block_user_time = $block_data[0]->created_time;
        else
            $block_user_time = time();

        $now = time();
        $check_time_block = $now - $block_user_time;

        if (empty($block_data))
            echo $check_time_block . '##*##0';
        else
            echo $check_time_block . '##*##1';

        $this->clearSession();
    }

    function winner_mail($email, $post_data, $code, $fromemailid, $name = "", $flag_name) {

        $cart = $this->session->userdata('cart');
        $data['cartcount'] = $this->getcartcount($cart);

        $homepage_data = $this->comman_model->search_serial_data('home_page');

        if ($name != "") {
            $name_details = "Marketing Manager";
            $content = 'I bought KGT product and find out that I am winning a prize. Please double check my credentials and feel free to call me at any time if double verification is needed. I hope to receive your prize at the earliest possible and look forward to be loyal to KGT.';
            $subject = 'New winner notification for serial number ' . $code;
            $signature = $_POST['salutation'] . " " . $post_data['name'];
            $toname = 'KGT Marketing Department';
            $fromname = $_POST['salutation'] . " " . $post_data['name'];
        } else {
            $content = 'Congratulations! This is to confirm that you won our prize and now we will process your documents and deliver the prize at the earliest possible.';
            $name_details = $_POST['salutation'] . " " . $post_data['name'];
            $toname = $_POST['salutation'] . " " . $post_data['name'];
            $fromname = 'KGT Marketing Department';
            $signature = 'KGT Marketing Department';
            $remarks = $this->comman_model->get_code_remarks($code);
            $subject = ' Congratulations! You just won ' . $remarks[0]['title'];
        }

        $msg = file_get_contents('winner_mail.html');
        $msg = str_replace('{base_url}', base_url(), $msg);
        $msg = str_replace('{name_details}', $name_details, $msg);
        $msg = str_replace('{content}', $content, $msg);
        $msg = str_replace('{code}', $code, $msg);
        $msg = str_replace('{name}', $post_data['name'], $msg);
        $msg = str_replace('{telephone}', $post_data['telephone'], $msg);
        $msg = str_replace('{email}', $post_data['email'], $msg);
        $msg = str_replace('{flag}', $flag_name, $msg);
        $msg = str_replace('{country}', $post_data['country'], $msg);
        $msg = str_replace('{passport_id}', $post_data['passport_id'], $msg);
        $msg = str_replace('{address}', $post_data['address'], $msg);
        $msg = str_replace('{occupation}', $post_data['occupation'], $msg);
        $msg = str_replace('{product_supplier}', $post_data['product_supplier'], $msg);
        $msg = str_replace('{signature}', $signature, $msg);

        $receipturl = base_url() . 'assets/uploads/winner_image/' . $post_data['receipt_copy'];
        $passporturl = base_url() . 'assets/uploads/winner_image/' . $post_data['passport_copy'];
        $msg = str_replace('{receipt_copy}', $receipturl, $msg);
        $msg = str_replace('{passport_copy}', $passporturl, $msg);


        $this->load->helper('av_helper');
        $kgtmailer = new KGTMailer();

        $from = $fromemailid;
        $to = $email;
        $subject = $subject;
        $message = $msg;
        $cc = '';
        $bcc = '';
        $mailerstatus = $kgtmailer->sendmail($subject, $message, $to, $from, $fromname, $cc, $bcc, $toname);


        $session_data = array(
            'randomString' => "",
            'user_email' => ""
        );
        $this->session->set_userdata($session_data);
    }

    public function save_winner_details() {
        $cart = $this->session->userdata('cart');
        $data['cartcount'] = $this->getcartcount($cart);
        $claim_award_code_VerificationCode = $this->input->post('claim_award_code_VerificationCode');
        $last_inserted_block_id = $this->session->userdata('last_inserted_block_id');
        $result = $this->serial_model->check_serial_number($claim_award_code_VerificationCode);

        $post_data = array(
            'name' => $this->input->post('claim_award_name'),
            'country' => $this->input->post('claim_award_countries_title1'),
            'telephone' => $this->input->post('claim_award_telephone'),
            'email' => $this->input->post('claim_award_email'),
            'passport_id' => $this->input->post('passport_id'),
            'address' => $this->input->post('address'),
            'occupation' => $this->input->post('occupation'),
            'product_supplier' => $this->input->post('product_supplier'),
            'receipt_copy' => $this->input->post('receipt_copy_file'),
            'passport_copy' => $this->input->post('passport_copy_file'),
            'serial_id' => $result[0]->id,
            'created_date' => time()
        );

        //edited by to excute the operation for the block_email_list table
        $this->load->model("block_list_email");
        $where_param = array();
        $where_param['countryName'] = $this->input->post('claim_award_countries_title1');
        $select_param = array("alpha_2");
        $block_email = $this->block_list_email->get_row("countries", $select_param, $where_param);
        $flag_name = $block_email[0]->alpha_2;
        //region end

        if (!empty($post_data['passport_copy']) && !empty($post_data['receipt_copy'])) {

            $data['code'] = $claim_award_code_VerificationCode;

            $checktable = $this->comman_model->get_data_by_id('winner_list', array('serial_id' => $result[0]->id));
            if (empty($checktable)) {
                $where_param = array('id' => $last_inserted_block_id);
                $this->block_list_email->delete_row("block_users", $where_param);
                $result = $this->comman_model->add('winner_list', $post_data);

                $homepage_data = $this->comman_model->search_serial_data('home_page');
                $this->winner_mail($this->input->post('claim_award_email'), $post_data, $claim_award_code_VerificationCode, 'marketing@kondar.ca', '', $flag_name);


                $this->winner_mail('marketing@kondar.ca', $post_data, $claim_award_code_VerificationCode, $this->input->post('claim_award_email'), 'admin', $flag_name);

                $post_data = array(
                    'status' => 0
                );

                $result = $this->comman_model->update_data_by_id('serial_code', $post_data, 'code', $data['code']);

                $data['post_data'] = $post_data;
                $data['result'] = true;
                $data['msg'] = 1;
                return 0;
            } else {
                $data['post_data'] = $post_data;
                $data['result'] = true;
                $data['msg'] = 0;
                return 1;
            }
        }
    }

    function index() {
        $this->check_lang();
        $data = array();
        $data['title'] = "Kondar Global Trading Ltd";
        $data['active'] = "promotion";
        $data['result'] = "";
        $data['msg'] = "";
        $data['sesstion_user_email'] = "";
        $data['download_material'] = $this->promotion_model->get_all_data_by_id('promotion_section', array('status' => 1, 'type' => 'download_materials'));
        $data['knowledge_center'] = $this->promotion_model->get_all_data_by_id('promotion_section', array('status' => 1, 'type' => 'knowledge_center'));
        $data['press_release'] = $this->promotion_model->get_all_data_by_id('promotion_section', array('status' => 1, 'type' => 'press_release'));
        $data['client_testi'] = $this->promotion_model->get_all_data_by_id('promotion_section', array('status' => 1, 'type' => 'client_testimonial'));

        $data['country_data'] = $this->country_model->as_array()->get_many_by(array('status' => 1));

        $cart = $this->session->userdata('cart');
        $data['cartcount'] = $this->getcartcount($cart);

        $data['vehicle_categories'] = $this->comman_model->all_data('tbl_vehicle_categories');

        $data['menu_vehicle_categories'] = $this->comman_model->all_data('tbl_vehicle_categories');

        $data['menu_product_types'] = $this->comman_model->get_product_type_for_menu();

        $data['menus'] = $this->menu_model->get_all_menus();
        //  $data['head_css'] = '<link rel="stylesheet" type="text/css" href="assets/template/css/video-js.css" media="screen" />';
        $this->load->view('temp/include/header', $data);
        $this->load->view('promotion/promotion', $data);
        $this->load->view('temp/footer', $data);
    }

    function awards() {
        $this->check_lang();
        $data = array();
        $data['title'] = "Kondar Global Trading Ltd";
        $data['active'] = "promotion";
        $cart = $this->session->userdata('cart');
        $data['cartcount'] = $this->getcartcount($cart);
        $data['download_material'] = $this->promotion_model->get_all_data_by_id('promotion_section', array('status' => 1, 'type' => 'download_materials'));
        $data['knowledge_center'] = $this->promotion_model->get_all_data_by_id('promotion_section', array('status' => 1, 'type' => 'knowledge_center'));
        $data['press_release'] = $this->promotion_model->get_all_data_by_id('promotion_section', array('status' => 1, 'type' => 'press_release'));
        $data['award'] = $this->promotion_model->get_all_data_by_id('promotion_section', array('status' => 1, 'type' => 'award'));
        $data['client_testi'] = $this->promotion_model->get_all_data_by_id('promotion_section', array('status' => 1, 'type' => 'client_testimonial'));

        $data['country_data'] = $this->country_model->as_array()->get_many_by(array('status' => 1));

        $data['post_data'] = '';
        $data['code'] = '';
        $data['result'] = 'false';
        $data['msg'] = 0;
        $data['countries'] = $this->promotion_model->search_serial_data('countries');

        $data['sesstion_user_email'] = $this->session->userdata('user_email');
        if ($_POST) {
            $data['sesstion_user_email'] = "";
            $session_data = array(
                'sesstion_user_email' => "",
                'user_email' => ""
            );
            $this->session->set_userdata($session_data);
            $data['msg'] = $this->save_winner_details();
            $data['result'] = 'true';

            $data['countries'] = $this->promotion_model->search_serial_data('countries');
        }
        $data['menu_vehicle_categories'] = $this->promotion_model->all_data('tbl_vehicle_categories');
        $data['menu_product_types'] = $this->promotion_model->get_product_type_for_menu();
        $cart = $this->session->userdata('cart');
        $data['cartcount'] = getcartcount($cart);
        $data['menus'] = $this->menu_model->get_all_menus();
        $data['award_msg'] = $this->getAwardMsg('true');
        $this->load->view('temp/include/header', $data);
        $this->load->view('promotion/awards', $data);
        $this->load->view('temp/footer', $data);
    }

    function award_form_upload() {

        if (!empty($_FILES['passport_copy']['name'])) {

            $field_name = 'passport_copy';
            $config['upload_path'] = './assets/uploads/winner_image/';
            $config['allowed_types'] = 'doc|docx|DOC|DOCX|pdf|jpg|JPG|png|gif|tif';
            $config['max_size'] = '1024';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload($field_name)) {
                echo $this->upload->display_errors();
            } else {
                $upload_data = $this->upload->data();
                $upload_data['passport_copy'] = 1;
                $this->load->view("promotion/filepreview", array('file' => $upload_data));
            }
        }
    }

    function receipt_form_upload() {

        if (!empty($_FILES['receipt_copy']['name'])) {

            $field_name = 'receipt_copy';
            $config['upload_path'] = './assets/uploads/winner_image/';
            $config['allowed_types'] = 'doc|docx|DOC|DOCX|pdf|jpg|JPG|png|gif|tif';
            $config['max_size'] = '1024';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload($field_name)) {
                echo $this->upload->display_errors();
                $this->session->set_userdata('fileUploaded', 0);
            } else {
                $upload_data = $this->upload->data();
                $upload_data['receipt_copy'] = 1;
                $this->load->view("promotion/filepreview", array('file' => $upload_data));
            }
        }
    }

    function promotion1($page = false, $id = false) {
        $cart = $this->session->userdata('cart');
        $data['cartcount'] = $this->getcartcount($cart);
        $this->check_lang();
        $data = array();
        $data['menu_vehicle_categories'] = $this->comman_model->all_data('tbl_vehicle_categories');
        $data['menu_product_types'] = $this->comman_model->get_product_type_for_menu();

        $data['country_data'] = $this->country_model->as_array()->get_many_by(array('status' => 1));

        $data['cartcount'] = $this->getcartcount();
        $data['title'] = "Kondar Global Trading Ltd";
        $data['menus'] = $this->menu_model->get_all_menus();
        if (!$page) {
            $data['all_data'] = $this->comman_model->get_all_data_by_id('promotion_category', array('status' => 1));
        } else {
            if (!$id) {
                redirect('promotion');
            }
            $data['all_data'] = $this->comman_model->get_all_data_by_id('promotion_section', array('type' => $page, 'category_id' => $id));
        }
        $this->load->view('temp/include/header', $data);
        if ($id && $page) {
            $data['category'] = $this->comman_model->get_data_by_id('promotion_category', array('id' => $id));
            if (empty($data['category'])) {
                redirect('promotion');
            }
            $data['active'] = "category";
            $this->load->view('temp/category', $data);
        } else {
            $data['active'] = "promotion";
            $this->load->view('promotion', $data);
        }

        $this->load->view('temp/footer', $data);
    }

    function check_lang() {
        $lang = $this->session->all_userdata();
        if (isset($lang['lang'])) {
            if ($lang['lang'] == 'english') {
                $this->lang->load("common", "english");
                $this->lang->load("user", "english");
            } else if ($lang['lang'] == 'russian') {
                $this->lang->load("common", "russian");
                $this->lang->load("user", "russian");
            }
        } else {
            $this->lang->load("common", "english");
            $this->lang->load("user", "english");
        }
    }

    function view_promotion($id = false) {
        if (!$id) {
            redirect('promotion');
        }
        $this->check_lang();
        $data = array();
        $data['title'] = "Kondar Global Trading Ltd";
        $data['active'] = "promotion";
        $cart = $this->session->userdata('cart');

        $data['country_data'] = $this->country_model->as_array()->get_many_by(array('status' => 1));
        $data['cartcount'] = $this->getcartcount($cart);
        $data['page_data'] = $this->promotion_model->get_data_by_id('promotion_section', array('id' => $id, 'status' => 1));
        if (empty($data['page_data'])) {
            redirect('promotion');
        }
        $data['menu_vehicle_categories'] = $this->promotion_model->all_data('tbl_vehicle_categories');
        $data['menu_product_types'] = $this->promotion_model->get_product_type_for_menu();
        $data['category'] = $this->promotion_model->get_data_by_id('promotion_category', array('id' => $data['page_data']['category_id']));
        $data['cartcount'] = $this->getcartcount();
        $data['menus'] = $this->menu_model->get_all_menus();

        $this->load->view('temp/include/header', $data);
        $this->load->view('promotion/view_promotion', $data);
        $this->load->view('temp/footer.php', $data);
    }

    function promotion_form($id = false) {

        if (!$id) {
            redirect('promotion');
        }
        $this->check_lang();
        $this->set_unblock_user();
        $data = array();
        $user_contact_data = $this->session->userdata("user_promotion_data");
        if (!empty($user_contact_data)) {
            $where_param = array();
            $where_param['id'] = $user_contact_data['user_id'];
            $where_param['block'] = 1;
            $select_param = "*";
            $data['block_email_info'] = $this->block_list_email->get_row("promotion_form", $select_param, $where_param);
        }


        $cart = $this->session->userdata('cart');
        $data['cartcount'] = $this->getcartcount($cart);
        $this->session->unset_userdata('set_user');
        $data['title'] = "Kondar Global Trading Ltd";
        $data['active'] = "promotion_form";
        $data['apply_form'] = $this->promotion_model->get_data_by_id('promotion_section', array('id' => $id, 'status' => 1));
        $data['countries'] = $this->comman_model->search_serial_data('countries');
        $this->session->set_userdata('file_name', $data['apply_form']['name']);
        if (empty($data['apply_form'])) {
            redirect('promotion');
        }
        $word1 = "a,b,c,d,e,f,g,h,i,j,k,l,m,1,2,3,4,5,6,7,8,9,0";
        $array1 = explode(",", $word1);
        shuffle($array1);
        $newstring1 = implode($array1, "");
        $data['user_code'] = substr($newstring1, 0, 10);
        $check_user_code = $this->promotion_model->get_data_by_id('promotion_form', array('user_code' => $data['user_code']));
        if (!empty($check_user_code)) {
            redirect('promotion/promotion_form/' . $id);
        }
        $data['promotion_id'] = $id;
        $data['menus'] = $this->menu_model->get_all_menus();
        $data['promotion_message'] = $this->get_promotion_msg('true');
        $this->load->view('temp/include/header', $data);
        $this->load->view('promotion/promotion_form', $data);
        $this->load->view('temp/footer', $data);
    }

    function set_unblock_user() {

        $cart = $this->session->userdata('cart');
        $data['cartcount'] = $this->getcartcount($cart);


        $this->load->model("block_list_email");

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

        $set_unblock_user = $this->promotion_model->get_all_data_by_id('promotion_form', array());
        $set_unblock_user1 = $this->promotion_model->get_all_data_by_id('apply_form', array());
        $set_unblock_user2 = $this->promotion_model->get_all_data_by_id('contact_form', array());
        foreach ($set_unblock_user as $set_data2) {
            if ($set_data2['block'] == 1) {
                $currentTime = time();
                $blockTime = strtotime('+120 minutes', $set_data2['block_time']);
                if ($blockTime < $currentTime) {
                    $result1 = $this->promotion_model->delete_by_id('promotion_form', array('id' => $set_data2['id']));
                }
            }
        }
        foreach ($set_unblock_user1 as $set_data2) {
            if ($set_data2['block'] == 1) {
                $currentTime = time();
                $blockTime = strtotime('+120 minutes', $set_data2['block_time']);
                if ($blockTime < $currentTime) {
                    $result1 = $this->promotion_model->delete_by_id('apply_form', array('id' => $set_data2['id']));
                }
            }
        }
        foreach ($set_unblock_user2 as $set_data2) {
            if ($set_data2['block'] == 1) {
                $currentTime = time();
                $blockTime = strtotime('+120 minutes', $set_data2['block_time']);
                if ($blockTime < $currentTime) {
                    $result1 = $this->promotion_model->delete_by_id('contact_form', array('id' => $set_data2['id']));
                }
            }
        }
    }

    function set_promotion_form() {

        $this->load->model("block_list_email");

        $cart = $this->session->userdata('cart');
        $data['cartcount'] = $this->getcartcount($cart);
        $pro_id = $this->input->post('promotion_id');
        $operation = $this->input->post('operation');
        $user_code = $this->input->post('user_code');
        $title = $this->input->post('salutation');
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $branch = $this->input->post('branch');
        $country = $this->input->post('country');
        $contact = $this->input->post('contact');
        $company = $this->input->post('company');
        $msge = $this->input->post('msge');
        $promotion_id = $this->input->post('promotion_id');
        $design = $this->input->post('design');
        $this->session->set_userdata('flag', $this->input->post('flag'));
        $this->load->helper('url');
        if ($this->input->post('operation')) {
            $word = "a,b,c,d,e,f,g,h,i,j,k,l,m,1,2,3,4,5,6,7,8,9,0";
            $array = explode(",", $word);
            shuffle($array);
            $newstring = implode($array, "");
            $dynamic_code = substr($newstring, 0, 10);
            $post_data = array(
                'name' => $title . '. ' . $name,
                'user_code' => $user_code,
                'email' => $email,
                'contact' => $contact,
                'branch' => $branch,
                'company' => $company,
                'designation' => $design,
                'message' => $msge,
                'duration' => 30,
                'total_download' => 1,
                'promotion_id' => $pro_id,
                'create_date' => time(),
                'country' => $country,
                'code' => $dynamic_code,
                'confirm' => $dynamic_code);

            $check_user1 = $this->promotion_model->get_data_by_id('apply_form', array('email' => $email, 'block' => 1));
            $check_user3 = $this->promotion_model->get_data_by_id('promotion_form', array('email' => $email, 'block' => 1));
            $check_user4 = $this->promotion_model->get_data_by_id('contact_form', array('email' => $email, 'block' => 1));
            $check_user2 = $this->promotion_model->get_data_by_id('promotion_form', array('email' => $email, 'promotion_id' => $pro_id));

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
                    $int_block = strtotime($blocked_email[0]->dte_block);
                $int_TR = 120 - intval(((time() - $int_block) / 60));
                if ($int_TR < 0)
                    $int_TR = 0;
                echo "The email " . $email . "  is blocked in the section " . $blocked_email[0]->region . " . Therefore, please use an alternative email or wait " . $int_TR . "  minutes to use this email again within our website. Thank you";
            } else if (!empty($check_user1)) {
                $currentTime1 = time();
                $blockTime1 = strtotime('+120 minutes', $check_user1['block_time']);
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
                echo "The email " . $email . "  is blocked in the section promotion-download . Therefore, please use an alternative email or wait " . $min . "  minutes to use this email again within our website. Thank you";
            } else if (!empty($check_user4)) {
                $currentTime2 = time();
                $blockTime2 = strtotime('+120 minutes', $check_user4['block_time']);
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
                echo "The email " . $email . "  is blocked in the section promotion-download . Therefore, please use an alternative email or wait " . $min . "  minutes to use this email again within our website. Thank you";
            } else if (!empty($check_user3)) {
                $currentTime2 = time();
                $blockTime2 = strtotime('+120 minutes', $check_user3['block_time']);
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
                echo "The email " . $email . "  is blocked in the section promotion-download . Therefore, please use an alternative email or wait " . $min . "  minutes to use this email again within our website. Thank you";
            } else if (!empty($check_user2)) {
                echo json_encode($this->get_promotion_msg('true'));
            } else {
                $result = $this->promotion_model->add('promotion_form', $post_data);
                //create use session
                $session_data = array('name' => $this->input->post('name'), 'email' => $this->input->post('email'), 'user_id' => $result, 'promotion_id' => $pro_id, 'salutation' => $title);
                $this->session->set_userdata('user_promotion_data', $session_data);

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
                $block_data['region'] = "Promotion-Download";
                $this->block_list_email->insert_column("block_email_list", $block_data);

                //region end
                $title = $this->input->post('salutation');
                $name_details = $this->input->post('name');
                $dynamiccode = $dynamic_code;
                $htmltemplate_url = base_url() . 'promotion_email.html';
                $html = file_get_contents($htmltemplate_url);
                $html = str_replace('{name_details}', $title . '. ' . $name_details, $html);
                $html = str_replace('{dynamiccode}', $dynamiccode, $html);
                $html = str_replace('{base_url}', base_url(), $html);

                $this->load->library('email');
                $config = array(
                    'mailtype' => 'html',
                    'charset' => 'utf-8',
                    'priority' => '1'
                );
                $this->email->initialize($config);
                $this->load->helper('av_helper');
                $kgtmailer = new KGTMailer();

                $fromame = 'KGT Marketing Department';
                $from = 'marketing@kondar.ca';
                $to = $this->input->post('email');
                $toname = $title . ". " . $name_details;
                $subject = 'Verification Code to download the file : ' . $this->session->userdata('file_name');
                $message = $html;
                $cc = '';
                $bcc = '';


                $mailerstatus = $kgtmailer->sendmail($subject, $message, $to, $from, $fromame, $cc, $bcc, $toname);
                echo 'success';
            }
        }
    }

    function verify_promotion() {
        $this->check_lang();
        $data = array();
        $cart = $this->session->userdata('cart');
        $data['cartcount'] = $this->getcartcount($cart);
        $user_data = $this->session->userdata('user_promotion_data');
        if (empty($user_data)) {

            redirect('promotion');
        }
        $this->session->set_userdata('flag_name_temp', $this->input->post('flag'));
        $set_user = $this->session->userdata('set_user');
        if (empty($set_user)) {
            $this->session->set_userdata('set_user', true);
        } else {
            $this->promotion_model->update_data_by_id('promotion_form', array('block' => 1, 'block_time' => time()), 'id', $user_data['user_id']);
            $this->session->unset_userdata('user_promotion_data');
            $this->session->unset_userdata('set_user');
            $this->session->set_flashdata('invalid', '');
            $this->session->set_flashdata('error', 'Invalid code');
            redirect('promotion');
        }

        $data['title'] = "Kondar Global Trading Ltd";
        $data['active'] = "applyForm";
        $data['user_email'] = $user_data['email'];
        $data['menus'] = $this->menu_model->get_all_menus();
        $data['promotion_message'] = $this->get_promotion_msg('true');
        $this->load->view('temp/include/header', $data);
        $this->load->view('promotion/verify_promotion', $data);
        $this->load->view('temp/footer', $data);
    }

    function get_cancel_form1() {
        $cart = $this->session->userdata('cart');
        $data['cartcount'] = $this->getcartcount($cart);
        $page = $this->input->post('form');
        if ($page == 'promotion') {
            $user_data = $this->session->userdata('user_promotion_data');
            if (empty($user_data)) {
                redirect('promotion');
            }

            $result1 = $this->promotion_model->delete_by_id('promotion_form', array('id' => $user_data['user_id']));
            $this->session->unset_userdata('user_promotion_data');
            echo 'success';
        }

        if ($page == 'order') {
            $user_data = $this->session->userdata('user_order_data');
            if (empty($user_data)) {
                redirect('home');
            }

            $order = $this->promotion_model->get_data_by_id('orders', array('customer_id' => $user_data['user_id']));
            $result1 = $this->promotion_model->delete_by_id('contact_form', array('id' => $user_data['user_id']));
            $this->session->unset_userdata('user_order_data');
            $this->session->unset_userdata('attempts');

            //edited by 4axiz to execute operation on block_email_list

            $this->load->model("block_list_email");
            $where_param = array();
            $where_param['str_email'] = $user_data['email'];
            $block_data = array();
            $block_data['int_block'] = 1;
            $block_data['dte_block'] = date("Y-m-d H:i:s", time());
            $this->block_list_email->update_column("block_email_list", $where_param, $block_data);

            //end region

            echo 'success';
        }

        if ($page == 'contact') {
            $user_data = $this->session->userdata('user_contact_data');
            if (empty($user_data)) {
                redirect('contact');
            }
            //edited by 4axiz to execute operation on block_email_list

            $this->load->model("block_list_email");
            $where_param = array();
            $where_param['str_email'] = $user_data['email'];
            $block_data = array();
            $block_data['int_block'] = 1;
            $block_data['dte_block'] = date("Y-m-d H:i:s", time());
            $this->block_list_email->update_column("block_email_list", $where_param, $block_data);

            //end region

            $result1 = $this->promotion_model->delete_by_id('contact_form', array('id' => $user_data['user_id']));
            $this->session->unset_userdata('user_contact_data');
            echo 'success';
        }
    }

    function get_send_mail1($attempt = '') {
        $this->load->model("block_list_email");

        $cart = $this->session->userdata('cart');
        $data['cartcount'] = $this->getcartcount($cart);
        $page = $this->input->post('form');


        if ($page == 'promotion') {
            $user_data = $this->session->userdata('user_promotion_data');
            if (empty($user_data)) {
                redirect('promotion');
            }
            $word = "a,b,c,d,e,f,g,h,i,j,k,l,m,1,2,3,4,5,6,7,8,9,0";
            $array = explode(",", $word);
            shuffle($array);
            $newstring = implode($array, "");
            $dynamic_code = substr($newstring, 0, 10);
            $this->promotion_model->update_data_by_id('promotion_form', array('code' => $dynamic_code, 'confirm' => $dynamic_code), 'id', $user_data['user_id']);
            $name_details = $user_data['name'];
            $dynamiccode = $dynamic_code;

            //edited by to excute the operation for the block_email_list table

            $where_param = array();
            $where_param['str_email'] = $user_data['email'];
            $select_param = array('int_sents' => 'int_sents');
            $block_info = $this->block_list_email->get_row("block_email_list", $select_param, $where_param);
            $block_data = array();
            $block_data['int_sents'] = $block_info[0]->int_sents + 1;
            $block_data['str_code'] = $dynamic_code;
            $this->block_list_email->update_column("block_email_list", $where_param, $block_data);

            //region end

            $html = file_get_contents('promotion_email.html');
            $html = str_replace('{name_details}', $user_data['salutation'] . '. ' . $name_details, $html);
            $html = str_replace('{dynamiccode}', $dynamiccode, $html);
            $html = str_replace('{base_url}', base_url(), $html);

            $this->load->library('email');
            $config = array(
                'mailtype' => 'html',
                'charset' => 'utf-8',
                'priority' => '1'
            );
            $this->email->initialize($config);
            $this->load->helper('av_helper');
            $kgtmailer = new KGTMailer();


            $from = 'marketing@kondar.ca';
            $fromname = 'KGT Marketing Department';
            $to = $user_data['email'];
            $toname = $user_data['salutation'] . ". " . $name_details;
            $subject = 'Verification Code to download the file  : ' . $this->session->userdata('file_name') . ' resent attempt ' . $attempt;
            $message = $html;
            $cc = '';
            $bcc = '';

            $mailerstatus = $kgtmailer->sendmail($subject, $message, $to, $from, $fromname, $cc, $bcc, $toname);
            echo 'success';
        }
        if ($page == 'contact') {
            $user_data = $this->session->userdata('user_contact_data');
            if (empty($user_data)) {
                
            }
            $word = "a,b,c,d,e,f,g,h,i,j,k,l,m,1,2,3,4,5,6,7,8,9,0";
            $array = explode(",", $word);
            shuffle($array);
            $newstring = implode($array, "");
            $dynamic_code = substr($newstring, 0, 10);
            $this->promotion_model->update_data_by_id('contact_form', array('code' => $dynamic_code, 'confirm' => $dynamic_code), 'id', $user_data['user_id']);

            //edited by to excute the operation for the block_email_list table

            $where_param = array();
            $where_param['str_email'] = $user_data['email'];
            $select_param = array('int_sents' => 'int_sents');
            $block_info = $this->block_list_email->get_row("block_email_list", $select_param, $where_param);
            $block_data = array();
            $block_data['int_sents'] = $block_info[0]->int_sents + 1;
            $block_data['str_code'] = $dynamic_code;
            $this->block_list_email->update_column("block_email_list", $where_param, $block_data);

            $email_data = array(
                'name' => $user_data['name'],
                'dynamic_code' => $dynamic_code
            );
            $html = $this->load->view('promotion/email/verification_code_email', $email_data, TRUE);
            $this->load->library('email');

            $config = array(
                'mailtype' => 'html',
                'charset' => 'utf-8',
                'priority' => '1'
            );
            $this->email->initialize($config);
            $this->load->helper('av_helper');
            $kgtmailer = new KGTMailer();


            $from = 'marketing@kondar.ca';
            $fromname = 'Kondar Global Trading Ltd';
            $to = $user_data['email'];
            $toname = $user_data['name'];
            $subject = 'Promotion Verification Code Resend Attempt : ' . $attempt;
            $message = $html;
            $cc = '';
            $bcc = '';

            $mailerstatus = $kgtmailer->sendmail($subject, $message, $to, $from, $fromname, $cc, $bcc, $toname);
            echo 'success';
        }
    }

    public function user_block($block_reason = 0) {
        $user_data = $this->session->userdata('user_promotion_data');
        $this->load->model('promotion_model');
        $this->promotion_model->update_data_by_id('promotion_form', array('block' => 1, 'block_time' => time()), 'id', $user_data['user_id']);
        //edited by 4axiz to execute operation on block_email_list

        $this->load->model("block_list_email");
        $where_param = array();
        $where_param['str_email'] = $user_data['email'];
        $block_data = array();
        $block_data['int_block'] = $block_reason;
        $block_data['dte_block'] = date("Y-m-d H:i:s", time());
        $this->block_list_email->update_column("block_email_list", $where_param, $block_data);

        //end region

        $this->session->unset_userdata('attempts');
        echo 'block';
    }

    function get_verify1() {

        $this->load->model("block_list_email");
        $cart = $this->session->userdata('cart');
        $data['cartcount'] = $this->getcartcount($cart);
        $page = $this->input->post('form');
        if ($page == 'promotion') {
            $user_data = $this->session->userdata('user_promotion_data');
            if (empty($user_data)) {
                
            }
            $check_attempt = $this->session->userdata('attempts');
            if ($check_attempt < 4) {
                $code = $this->input->post('code');
                $check1 = $this->promotion_model->get_data_by_id('promotion_form', array('code' => $code));
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

                    echo 'Your code is wrong.Please try again.';
                } else {
                    $user_data1 = $this->promotion_model->get_data_by_id('promotion_form', array('id' => $user_data['user_id']));
                    $product = $this->promotion_model->get_data_by_id('promotion_section', array('id' => $user_data1['promotion_id']));


                    //edited by to excute the operation for the block_email_list table
                    $this->load->model("block_list_email");
                    $where_param = array();
                    $where_param['countryName'] = $user_data1['country'];
                    $select_param = array("alpha_2");
                    $block_email = $this->block_list_email->get_row("countries", $select_param, $where_param);
                    $user_data1['flag_name'] = $block_email[0]->alpha_2;
                    //region end
                    //edited by 4axiz to execute the block_email_list table

                    $where_param = array();

                    $where_param['str_email'] = $user_data['email'];
                    $this->block_list_email->delete_row("block_email_list", $where_param);

                    //end the block
                    $branch_flag = $this->session->userdata['new_session']['branchflag'];
                    $branch_flag = explode(' ', $branch_flag);

                    $email_data = array(
                        'name' => $user_data1['name'],
                        'email' => $user_data1['email'],
                        'company' => $user_data1['company'],
                        'contact' => $user_data1['contact'],
                        'flag_name' => $user_data1['flag_name'],
                        'country' => $user_data1['country'],
                        'branch_flag' => $branch_flag[1],
                        'branch' => $user_data1['branch'],
                        'designation' => $user_data1['designation'],
                        'message' => $user_data1['message'],
                        'productname' => $product['name'],
                        'user_code' => $user_data1['user_code']
                    );
                    $html = $this->load->view('promotion/email/download_req_email', $email_data, TRUE);

                    $email_data1 = array(
                        'name' => $user_data1['name'],
                        'email' => $user_data1['email'],
                        'company' => $user_data1['company'],
                        'contact' => $user_data1['contact'],
                        'flag_name' => $user_data1['flag_name'],
                        'country' => $user_data1['country'],
                        'branch_flag' => $branch_flag[1],
                        'branch' => $user_data1['branch'],
                        'designation' => $user_data1['designation'],
                        'message' => $user_data1['message'],
                        'productname' => $product['name']
                    );
                    $html1 = $this->load->view('promotion/email/receipt_acknowledgement_email', $email_data1, TRUE);

                    $this->load->library('email');
                    $config = array(
                        'mailtype' => 'html',
                        'charset' => 'utf-8',
                        'priority' => '1'
                    );
                    $this->email->initialize($config);
                    $this->load->helper('av_helper');
                    $kgtmailer = new KGTMailer();


                    $homepage_data = $this->comman_model->search_serial_data('home_page');

                    $from = $user_data1['email'];
                    $fromname = $user_data1['name'];

                    $to = 'marketing@kondar.ca';

                    $toname = 'KGT Marketing Department';
                    $subject = 'New download request for the file: ' . $this->session->userdata('file_name');
                    $message = $html;
                    $cc = '';
                    $bcc = '';
                    $mailerstatus = $kgtmailer->sendmail($subject, $message, $to, $from, $fromname, $cc, $bcc, $toname);
//for user mail

                    $from = 'marketing@kondar.ca';
//
                    $fromname = 'KGT Marketing Department';
                    $to = $user_data['email'];
                    $toname = $user_data['salutation'] . ". " . $user_data['name'];
                    $subject = 'receipt acknowledgement email for downloading the file ' . $this->session->userdata('file_name');
                    $message = $html1;
                    $cc = '';
                    $bcc = '';
                    $mailerstatus = $kgtmailer->sendmail($subject, $message, $to, $from, $fromname, $cc, $bcc, $toname);

                    $this->promotion_model->update_data_by_id('promotion_form', array('confirm' => 'confirm'), 'id', $user_data['user_id']);
                    $this->session->unset_userdata('user_promotion_data');
                    echo 'success';
                }
            } else {
                $this->promotion_model->update_data_by_id('promotion_form', array('block' => 1, 'block_time' => time()), 'id', $user_data['user_id']);

//edited by 4axiz to execute operation on block_email_list table

                $where_param = array();
                $where_param['str_email'] = $user_data['email'];

                $block_data = array();
                $block_data['int_block'] = 2;
                $block_data['dte_block'] = date("Y-m-d H:i:s", time());
                $this->block_list_email->update_column("block_email_list", $where_param, $block_data);

                //region end

                $this->session->unset_userdata('attempts');

                echo 'redirect';
            }
        }
        if ($page == 'contact') {
            $user_data = $this->session->userdata('user_contact_data');
            if (empty($user_data)) {
                redirect('front/contact_us');
            }
            $check_attempt = $this->session->userdata('attempts');
            if ($check_attempt < 2) {
                $code = $this->input->post('code');
                $check1 = $this->promotion_model->get_data_by_id('contact_form', array('code' => $code));
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

                    echo 'Your code is wrong.Please try again.';
                } else {
                    $user_data1 = $this->promotion_model->get_data_by_id('contact_form', array('id' => $user_data['user_id']));


                    $email_data = array(
                        'name' => $user_data1['name'],
                        'email' => $user_data1['email'],
                        'company' => $user_data1['company'],
                        'contact' => $user_data1['contact'],
                        'country' => $user_data1['country'],
                        'branch' => $user_data1['branch'],
                        'designation' => $user_data1['designation'],
                        'message' => $user_data1['message']
                    );
                    $html = $this->load->view('promotion/email/user_info_admin_email', $email_data, TRUE);

                    //for user mail


                    $email_data1 = array(
                        'name' => $user_data1['name'],
                        'email' => $user_data1['email'],
                        'company' => $user_data1['company'],
                        'contact' => $user_data1['contact'],
                        'country' => $user_data1['country'],
                        'branch' => $user_data1['branch'],
                        'designation' => $user_data1['designation'],
                        'message' => $user_data1['message']
                    );
                    $html1 = $this->load->view('promotion/email/user_info_email', $email_data1, TRUE);

                    $this->load->library('email');
                    $config = array(
                        'mailtype' => 'html',
                        'charset' => 'utf-8',
                        'priority' => '1'
                    );
                    $this->email->initialize($config);
                    $this->load->helper('av_helper');
                    $kgtmailer = new KGTMailer();

                    $homepage_data = $this->comman_model->search_serial_data('home_page');


                    $from = $user_data['email'];
                    $fromname = 'Contact Us Form';
                    $to = isset($homepage_data[0]['admin_mail']) ? $homepage_data[0]['admin_mail'] : '';
                    $toname = 'KGT HR Department';
                    $subject = 'Contact Us Form';
                    $message = $html;
                    $cc = '';
                    $bcc = '';
                    $mailerstatus = $kgtmailer->sendmail($subject, $message, $to, $from, $fromname, $cc, $bcc, $toname);


                    $from = isset($homepage_data[0]['admin_mail']) ? $homepage_data[0]['admin_mail'] : '';
                    $fromname = 'Kondar Global Trading Ltd';
                    $to = $user_data['email'];
                    $toname = $user_data['name'];
                    $subject = 'Contact';
                    $message = $html1;
                    $cc = '';
                    $bcc = '';
                    $mailerstatus = $kgtmailer->sendmail($subject, $message, $to, $from, $fromname, $cc, $bcc, $toname);

                    //edited by 4axiz to execute the block_email_list table

                    $where_param = array();

                    $where_param['str_email'] = $user_data['email'];
                    $this->block_list_email->delete_row("block_email_list", $where_param);

                    //end the block

                    $this->promotion_model->update_data_by_id('contact_form', array('confirm' => 'confirm'), 'id', $user_data['user_id']);
                    $this->session->unset_userdata('user_contact_data');
                    echo 'success';
                }
            } else {
                $this->promotion_model->update_data_by_id('contact_form', array('block' => 1, 'block_time' => time()), 'id', $user_data['user_id']);
                $this->session->unset_userdata('user_contact_data');
                $this->session->unset_userdata('attempts');

//edited by 4axiz to execute operation on block_email_list table

                $where_param = array();
                $where_param['str_email'] = $user_data['email'];

                $block_data = array();
                $block_data['int_block'] = 2;
                $block_data['dte_block'] = date("Y-m-d H:i:s", time());
                $this->block_list_email->update_column("block_email_list", $where_param, $block_data);


                echo 'redirect';
            }
        }
    }

    function user_form($id = false) {
        $cart = $this->session->userdata('cart');
        $data['cartcount'] = $this->getcartcount($cart);
        if (!$id) {
            redirect('front/promotion');
        }
        $this->check_lang();
        $data = array();
        //check for 
        $data['title'] = "Kondar Global Trading Ltd";
        $data['active'] = "applyForm";
        $data['user_data'] = $this->comman_model->check_user_id('promotion_form', 'id', $id);
        if (empty($data['user_data'])) {
            redirect('front/promotion');
        }
        if ($this->input->post('operation')) {
            $code = $this->input->post('code');
            $check_user = $this->comman_model->get_data_by_id('promotion_form', array('md5(id)' => $id, 'user_code' => $code));
            if (empty($check_user)) {
                $this->session->set_flashdata('error', 'Invalid code. Please Try again.');
                redirect('front/user_form/' . $id);
            }

            $check_code = $this->comman_model->get_data_by_id('promotion_section', array('id' => $check_user['promotion_id']));
            //check emppty product
            if (empty($check_code)) {
                $this->session->set_flashdata('error', 'Sorry There is no download file.');
                redirect('front/user_form/' . $id);
            }
            //if user expired
            $current_time = time();
            $expired_time = strtotime('+' . $check_user['duration'] . ' minutes', $check_user['create_date']);
            if ($expired_time < $current_time) {
                $this->session->set_flashdata('error', 'Sorry this code is not valid any more as it is either expired or used more then authorized times. Please repeat the verification process. Please use another email ID.');
                redirect('front/user_form/' . $id);
            }

            //check many time download file
            if (empty($check_user['download_file'])) {
                $download_file = 1;
            } else {
                $download_file = $check_user['download_file'] + 1;
            }
            //check download file limited
            if ($download_file > $check_user['total_download']) {
                $this->session->set_flashdata('error', 'Sorry you can not download file , your limit has been exeed from limt permitted by Admin. Please contact to KGT.');
                redirect('front/user_form/' . $id);
            }

            $this->comman_model->update_data_by_id('promotion_form', array('download_file' => $download_file), 'id', $check_user['id']);


            $file_name = 'assets/uploads/promotion_section/file/' . $check_code['file'];
            $mime = 'application/force-download';
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Cache-Control: private', false);
            header('Content-Type: ' . $mime);
            header('Content-Disposition: attachment; filename="' . basename($file_name) . '"');
            header('Content-Transfer-Encoding: binary');
            header('Connection: close');
            readfile($file_name);
            exit();
            redirect('front/user_form/' . $id);
        }
        $data['menu_vehicle_categories'] = $this->comman_model->all_data('tbl_vehicle_categories');
        $data['menu_product_types'] = $this->comman_model->get_product_type_for_menu();
        $data['cartcount'] = $this->getcartcount();
        $this->load->view('temp/include/header', $data);
        $this->load->view('temp/user_form', $data);
        $this->load->view('temp/footer', $data);
    }

    function getcartcount() {
        $cart = $this->session->userdata('cart');
        $cartcount = is_array($cart) ? count($cart) : 0;
        return $cartcount;
    }

    function success_form1() {
        $cart = $this->session->userdata('cart');
        $data['cartcount'] = $this->getcartcount($cart);
        $this->check_lang();
        $data = array();
        $data['title'] = "Kondar Global Trading Ltd";
        $data['active'] = "applyForm";
        $data['menu_vehicle_categories'] = $this->comman_model->all_data('tbl_vehicle_categories');
        $data['menu_product_types'] = $this->comman_model->get_product_type_for_menu();
        $data['cartcount'] = $this->getcartcount();
        $data['menus'] = $this->menu_model->get_all_menus();
        $this->load->view('temp/include/header', $data);
        $this->load->view('temp/success1', $data);
        $this->load->view('temp/footer', $data);
    }

    function put_data_session() {
        $new_session['email'] = $this->input->post("email");
        $new_session['country'] = $this->input->post("country");
        $new_session['contact'] = $this->input->post("contact");
        $new_session['name'] = $this->input->post("name");
        $new_session['branchflag'] = $this->input->post("branchflag");

        $this->session->set_userdata("new_session", $new_session);
        echo "success";
    }

    function preview_state_block() {
        $user_data = $this->session->userdata('new_session');

//edited by 4axiz to execute operation on block_email_list
        $this->load->model("block_list_email");
        $where_param = array();
        $new_email = $this->input->post('email');
        if ($user_data['email'] == $new_email) {
            $where_param["str_email"] = $user_data['email'];
        } else {
            $where_param["str_email"] = $new_email;
        }
        $select_param = array("str_email" => "str_email");
        $block_info = $this->block_list_email->get_row('block_email_list', $select_param, $where_param);

        if (!empty($block_info)) {
            $where_param = array();
            $where_param["str_email"] = $user_data['email'];
            $block_data = array();
            $block_data['int_block'] = 3;
            $block_data['dte_block'] = date("Y-m-d H:i:s", time());
            $this->block_list_email->update_column("block_email_list", $where_param, $block_data);
        } else {
            $block_data = array();
            $block_data['int_errors'] = 0;
            $block_data['int_sents'] = 0;
            $block_data['int_block'] = 5;
            $block_data['dte_block'] = date("Y-m-d H:i:s", time());
            $block_data['str_email'] = $new_email;
            $block_data['str_applicant'] = $user_data['name'];
            $block_data['str_country'] = $user_data['country'];
            $block_data['str_ip_address'] = $_SERVER['REMOTE_ADDR'];
            $block_data['str_telephone'] = $user_data['contact'];
            $block_data['region'] = "Promotion-Download";
            $this->block_list_email->insert_column("block_email_list", $block_data);
        }
//end region

        echo "success";
    }

    /*
     * This function will evoke in the blur event of an email is given
     * to check whether this email address is already blocked or not
     */

    function block_email_check() {
        $this->load->model("block_list_email");
        $email = $this->input->post("email");
        $where_param = array();
        $where_param['str_email'] = $email;
        $where_param['int_block !='] = 0;
        $select_param = array("int_id", "str_email", "dte_block", "region");
        $block_emails = $this->block_list_email->get_row("block_email_list", $select_param, $where_param);
        if (count($block_emails) > 0) {
            $int_block = strtotime($block_emails[0]->dte_block);
            $int_TR = 120 - intval(((time() - $int_block) / 60));
            echo $block_emails[0]->str_email . "#**#" . $int_TR . "#**#" . $block_emails[0]->region;
        } else {
            echo "no_block";
        }
    }

    /*
     * This function will evoke when timeout will happen from the promotion download form. 
     * 
     */

    function block_email_timeout() {
        $this->load->model("block_list_email");
        $email = $this->input->post("email");
        $name = $this->input->post("name");
        $country = $this->input->post("country");
        $contact = $this->input->post("contact");
        $where_param = array();
        $where_param['str_email'] = $email;
        $where_param['int_block !='] = 0;
        $select_param = array("int_id", "str_email", "dte_block", "region");
        $block_emails = $this->block_list_email->get_row("block_email_list", $select_param, $where_param);
        if (count($block_emails) == 0) {

            $block_data = array();
            $block_data['int_errors'] = 0;
            $block_data['int_sents'] = 0;
            $block_data['dte_block'] = date("Y-m-d H:i:s", time());
            $block_data['int_block'] = 5;
            $block_data['str_code'] = "";
            $block_data['str_email'] = $email;
            $block_data['str_applicant'] = $name;
            $block_data['str_country'] = $country;
            $block_data['str_ip_address'] = $_SERVER['REMOTE_ADDR'];
            $block_data['str_telephone'] = $contact;
            $block_data['region'] = "Promotion-Download";
            $this->block_list_email->insert_column("block_email_list", $block_data);
        }
        $this->session->unset_userdata('user_promotion_data');
        echo "success";
    }

    function get_timer() {
        $value = $this->input->post('value');
        if ($value == 'edit') {
            $select = "promotion_edit_timer,promotion_edit_msg";
        } elseif ($value == 'main') {
            $select = "main_promotion_timer,main_promotion_msg";
        } elseif ($value == 'preview') {
            $select = "promotion_preview_timer,promotion_preview_msg";
        } else {
            $select = "promotion_popup_timer,promotion_popup_msg";
        }
        $time = $this->comman_model->get_timer('promotion_timer', $select);
        echo json_encode($time);
    }

    function get_timer_award() {
        $value = $this->input->post('value');
        if ($value == 'edit') {
            $select = "award_edit_timer,award_edit_msg";
        } elseif ($value == 'main') {
            $select = "main_award_timer,main_award_msg";
        } elseif ($value == 'preview') {
            $select = "award_preview_timer,award_preview_msg";
        } else {
            $select = "award_popup_timer,award_popup_msg";
        }
        $time = $this->comman_model->get_timer('award_timer', $select);
        echo json_encode($time);
    }

    // This function will evoke when time out happends during verification pop of award.
    function award_timeout_block() {
        $this->load->model("block_list_email");
        $email = $this->input->post("email");
        $where_param = array();
        $where_param['str_email'] = $email;
        $where_param['region'] = "Award";
        $select_param = array("int_id");
        $block_emails = $this->block_list_email->get_row("block_email_list", $select_param, $where_param);
        if (!empty($block_emails) && count($block_emails) > 0) {
            $where_param = array();
            $where_param['int_id'] = $block_emails[0]->int_id;
            $block_data = array();
            $block_data['int_errors'] = 0;
            $block_data['int_sents'] = 0;
            $block_data['dte_block'] = date("Y-m-d H:i:s", time());
            $block_data['int_block'] = 5;
            $block_data['str_code'] = "";
            $block_data['str_email'] = $email;
            $block_data['str_ip_address'] = $_SERVER['REMOTE_ADDR'];
            $block_data['region'] = "Award";
            $this->block_list_email->update_column("block_email_list", $where_param, $block_data);
        } else {
            $name = $this->input->post("name");
            $country = $this->input->post("country");
            $contact = $this->input->post("contact");
            $block_data = array();
            $block_data['int_errors'] = 0;
            $block_data['int_sents'] = 0;
            $block_data['dte_block'] = date("Y-m-d H:i:s", time());
            $block_data['int_block'] = 5;
            $block_data['str_code'] = "";
            $block_data['str_email'] = $email;
            $block_data['str_applicant'] = $name;
            $block_data['str_country'] = $country;
            $block_data['str_ip_address'] = $_SERVER['REMOTE_ADDR'];
            $block_data['str_telephone'] = $contact;
            $block_data['region'] = "Award";
            $this->block_list_email->insert_column("block_email_list", $block_data);
        }
    }

    function getAwardMsg($check = false) {
        $select_param = "*";
        $result = $this->comman_model->get_timer('award_message', $select_param);
        if ($check == true) {
            return $result;
        } else {
            echo json_encode($result);
        }
    }

    function get_promotion_msg($check = false) {
        $select_param = "*";
        $result = $this->comman_model->get_timer('promotion_message', $select_param);
        if ($check == true) {
            return $result;
        } else {
            echo json_encode($result);
        }
    }

}

// END Promotion_model Class

/* End of file promotion_model.php */
/* Location: ./application/models/promotion_model.php */

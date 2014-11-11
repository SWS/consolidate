<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_model extends CI_Model {

    var $message = array('yes', 'no', 'Thank You!<br>You Email has verified. Please Login.', 'Sorry You have something mistake', 'You have already verified.');

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

//  Function to verify the user login credentials.
    function verifyUserLogin($user_name, $user_password) {

        $query = $this->db->get_where('admin', array('adminname' => $user_name, 'password' => md5($user_password), 'status' => 1));

        return $query->row_array();
    }

    function update_password($old_pass, $new_pass, $id) {

        $array = array('id' => $id, 'password' => md5($old_pass));
        $update = array('password' => md5($new_pass));
        $query = $this->db->get_where('admin', $array);
        $message = array();
        $message[0] = 'yes';
        $message[1] = 'no';

        if ($query->row_array()) {
            $this->db->where('id', $id);
            $this->db->update('admin', $update);
            return $this->message[0];
        } else {
            return $this->message[1];
        }
    }

}

// END Admin_model Class

/* End of file admin_model.php */
/* Location: ./application/models/admin_model.php */
<?php

if (!defined('BASEPATH'))
    exit('No direct access is allowed!');

class Admin_Model extends CI_Model {

    function __construct() {
        $this->load->database();
    }

    public function getAdminInput($name) {
        $result = $this->db->get_where('admin_inputs', array('name' => $name));
        return $result->row();
    }
    
    public function updateAdminInput($name, $input) {
        $this->db->where('name', $name);
        $this->db->update('admin_inputs', array('input' => $input));
        return "OK";
    }

}
<?php

if (!defined('BASEPATH'))
    exit('No direct access is allowed!');

class User_Model extends CI_Model {

    function __construct() {
        $this->load->database();
    }

    public function add($user) {
        $this->db->insert('users', $user);
    }

    public function checkUsername($username) {
        $result = $this->db->get_where('users', array('username' => $username));
        if ($result->num_rows() < 1) {
            echo "Available";
        }
    }

    public function login($username, $password) {
        $result = $this->db->get_where('users', array('username' => $username));
        if ($result->num_rows() > 0) {
            $user = $result->row();
            if ($user->password == $password) {
                $this->load->library('session');
                $this->session->set_userdata('user', $user);
                session_start();
                $_SESSION['user'] = $user;
                return "Success";
            }
        }
        return "Login failed, incorrect username/password!";
    }

}
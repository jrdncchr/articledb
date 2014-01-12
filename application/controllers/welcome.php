<?php

if (!defined('BASEPATH'))
    exit('No direct access is allowed!');

class Welcome extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
    }
    
    public function index() {
        $this->title = "Article Database &raquo; Home";
        $this->data['message'] = $this->session->userdata('message');
        $this->session->unset_userdata('message');
        $this->css[] = "custom/home.css";
        $this->js[] = "custom/home.js";
        
        $user = $this->session->userdata('user');
        if(null == $user) {
            $this->_render('pages/home');
        } else {
            $this->data['user'] = $user;
            $this->_renderL('pages/home');
        }
        
    }
    
    public function login() {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $this->load->model('User_Model');
        $login = $this->User_Model->login($username, $password); 
        echo $login;
    }
    
}
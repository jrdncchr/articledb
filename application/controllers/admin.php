<?php

if (!defined('BASEPATH'))
    exit('No direct access is allowed!');

class Admin extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $user = $this->session->userdata('user');
        if ($user->type != 'admin') {
            redirect(base_url());
        }
        $this->load->database();
    }

    public function index() {
        $this->title = "Article Database &raquo; Administration";
        $user = $this->session->userdata('user');
        $this->data['user'] = $user;
        $this->_renderL('pages/admin');
    }

}
<?php

if (!defined('BASEPATH'))
    exit('No direct access is allowed!');

class Faqs extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('faqs_model');
        $this->load->library('session');
    }

    public function index() {
        $this->title = "Authority Niche Links &raquo; Faqs";
        $this->data['faqs'] = $this->faqs_model->get();
        $user = $this->session->userdata('user');
        if (null != $user) {
            $this->data['user'] = $user;
        }
        $this->_render('pages/faqs');
    }

}

?>
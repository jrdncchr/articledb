<?php

if (!defined('BASEPATH'))
    exit('No direct access is allowed!');

class Welcome extends MY_Controller {
    
    public function index() {
        $this->title = "Article Database &raquo; Home";
        $this->load->model('Article_Model');
        $this->data['articles'] = $this->Article_Model->getArticles();
        $this->_render('pages/home');
    }
    
}
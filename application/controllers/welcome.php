<?php

if (!defined('BASEPATH'))
    exit('No direct access is allowed!');

class Welcome extends MY_Controller {
    
    public function index() {
        $this->title = "Article Database &raquo; Home";
        $this->_render('pages/home');
    }
    
}
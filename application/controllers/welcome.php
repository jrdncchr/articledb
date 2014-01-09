<?php

if (!defined('BASEPATH'))
    exit('No direct access is allowed!');

class Welcome extends MY_Controller {
    
    public function index() {
        $this->_render("pages/home");
    }
    
}
<?php

if (!defined('BASEPATH'))
    exit('No direct access is allowed!');

class Register extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('User_Model');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    public function index() {
        $this->title = "Authority Niche Links &raquo; Register";
        $this->js[] = 'custom/register.js';

        $this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('password', 'Password', 'required|matches[confirm]');
        $this->form_validation->set_rules('confirm', 'Password Confirmation', 'required');
        $this->form_validation->set_rules('name', 'Name', 'required|trim|min_length[5]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() === FALSE) {
            $this->form_validation->set_error_delimiters("<p><i class='fa fa-times'></i> ", '</p>');
            $this->_render('pages/register');
        } else {
            $data = array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'type' => 'user'
            );
            $this->User_Model->add($data);
            $this->load->library('session');
            $this->session->set_userdata('message', "Registration successful, you may now login! <i class='fa fa-smile-o'></i>");
            redirect(base_url());
        }
    }

    public function check() {
        $this->User_Model->checkUsername($_POST['username']);
    }

}
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    // Page resources
    protected $js = array();
    protected $css = array();
    protected $fonts = array();
    // Page Info
    protected $title = FALSE;
    protected $description = FALSE;
    protected $keywords = FALSE;
    protected $author = FALSE;
    // Page data
    protected $data = array();

    function __construct() {
        parent::__construct();
        $this->load->helper('url');

        $this->title = $this->config->item('site_title');
        $this->description = $this->config->item('site_description');
        $this->keywords = $this->config->item('site_keywords');
        $this->author = $this->config->item('site_author');
    }

    public function _render($view) {
        $data = $this->data;
        $data['css'] = $this->css;
        $data['js'] = $this->js;

        $data['title'] = $this->title;
        $data['description'] = $this->description;
        $data['keywords'] = $this->keywords;
        $data['author'] = $this->author;

        $data['head'] = $this->load->view('templates/head', $data, true);
        $data['nav'] = $this->load->view('templates/nav', $data, true);
        $data['footer'] = $this->load->view('templates/footer', $data, true);
        $data['scripts'] = $this->load->view('templates/scripts', $data, true);

        $data['content'] = $this->load->view($view, $data, true);

        $this->load->view('templates/skeleton', $data);
    }

}

?>
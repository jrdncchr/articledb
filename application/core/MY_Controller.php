<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    // Page resources
    protected $js = array();
    protected $css = array();
    protected $fonts = array();
    // Page Info
    protected $title = "Authority Niche Links";
    protected $description = "Authority Niche Links";
    protected $keywords = "Authority Niche Links";
    protected $author = "Danero";
    // Page data
    protected $data = array();

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
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
        if(isset($data['user'])) {
            $data['nav'] = $this->load->view('templates/logged/nav', $data, true);
        } else {
            $data['nav'] = $this->load->view('templates/nav', $data, true);
        }
        $data['scripts'] = $this->load->view('templates/scripts', $data, true);
        $data['footer'] = $this->load->view('templates/footer', $data, true);
        
        $data['content'] = $this->load->view($view, $data, true);

        $this->load->view('templates/skeleton', $data);
    }
    
    public function _renderL($view) {
        $data = $this->data;
        $data['css'] = $this->css;
        $data['js'] = $this->js;

        $data['title'] = $this->title;
        $data['description'] = $this->description;
        $data['keywords'] = $this->keywords;
        $data['author'] = $this->author;

        $data['head'] = $this->load->view('templates/head', $data, true);
        $data['nav'] = $this->load->view('templates/logged/nav', $data, true);
        $data['quicklink'] = $this->load->view('templates/logged/quicklink', $data, true);
        $data['scripts'] = $this->load->view('templates/scripts', $data, true);
        $data['footer'] = $this->load->view('templates/footer', $data, true);
        
        $data['content'] = $this->load->view($view, $data, true);

        $this->load->view('templates/logged/skeleton', $data);
    }

}

?>
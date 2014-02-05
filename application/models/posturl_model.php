<?php

if (!defined('BASEPATH'))
    exit('No direct access is allowed!');

class PostUrl_Model extends CI_Model {

    function __construct() {
        $this->load->database();
    }

    public function get($projectId = 0) {
        if ($projectId > 0) {
            $result = $this->db->get_where('post_urls', array('project_id' => $projectId));
            return $result->result();
        }
    }

    public function add($posturl) {
        $this->db->insert('post_urls', $posturl);
    }

}
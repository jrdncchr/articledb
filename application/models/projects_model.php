<?php

if (!defined('BASEPATH'))
    exit('No direct access is allowed!');

class Projects_Model extends CI_Model {

    function __construct() {
        $this->load->database();
    }

    public function addProject($project) {
        try {
            $this->db->insert('projects', $project);
            echo "OK";
        } catch (Exception $e) {
            echo "ADD PROJECT ERROR: " . $e->message();
        }
    }

    function getProject($id) {
        $result = $this->db->get_where('projects', array('id' => $id));
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return null;
        }
    }

}
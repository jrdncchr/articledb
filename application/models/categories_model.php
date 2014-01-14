<?php

if (!defined('BASEPATH'))
    exit('No direct access is allowed!');

class Categories_Model extends CI_Model {

    function __construct() {
        $this->load->database();
    }

    public function get() {
        $result = $this->db->get('categories');
        return $result->result();
    }

    public function add($name) {
        $this->db->insert('categories', array('name' => $name));
        echo "OK";
    }
    
    public function update($id, $name) {
        $this->db->where('id', $id);
        $this->db->update('categories', array('name' => $name));
        echo "OK";
    }

    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('categories');
        echo "OK";
    }

}
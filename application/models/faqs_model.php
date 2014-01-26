<?php

if (!defined('BASEPATH'))
    exit('No direct access is allowed!');

class Faqs_Model extends CI_Model {

    function __construct() {
        $this->load->database();
    }

    public function get() {
        $result = $this->db->get('faqs');
        return $result->result();
    }

    public function add($faq) {
        $this->db->insert('faqs', $faq);
        echo "OK";
    }
    
    public function update($id, $faq) {
        $this->db->where('id', $id);
        $this->db->update('faqs', $faq);
        echo "OK";
    }

    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('faqs');
        echo "OK";
    }

}
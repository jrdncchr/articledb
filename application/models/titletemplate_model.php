<?php

if (!defined('BASEPATH'))
    exit('No direct access is allowed!');

class TitleTemplate_Model extends CI_Model {

    function __construct() {
        $this->load->database();
    }

    public function getRandomTitles($limit) {
        $this->db->order_by('id', 'random');
        $result = $this->db->get('title_templates', $limit);
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return null;
        }
    }

    function getTitleTemplates($id = 0) {
        if ($id == 0) {
            $result = $this->db->get('title_templates');
            if ($result->num_rows() > 0) {
                return $result->result();
            }
        } else {
            $result = $this->db->get_where('title_templates', array('id' => $id));
            if ($result->num_rows() > 0) {
                return $result->row();
            } else {
                return null;
            }
        }
    }

    function add($title) {
        try {
            $this->db->insert('title_templates', array('title' => $title));
            echo "OK";
        } catch (Exception $e) {
            echo "ADD TITLETEMP ERROR: " . $e;
        }
    }

    function update($id, $title) {
        try {
            $this->db->where('id', $id);
            $this->db->update('title_templates', array('title' => $title));
            echo "OK";
        } catch (Exception $e) {
            echo "UPDATE TITLETEMP ERROR: " . $e->message();
        }
    }

    function delete($id) {
        try {
            $this->db->where('id', $id);
            $this->db->delete('title_templates');
            echo "OK";
        } catch (Exception $e) {
            echo "DELETING TITLETEMP ERROR: " . $e->message();
        }
    }

}
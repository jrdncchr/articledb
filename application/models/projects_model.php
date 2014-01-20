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

    public function deleteProject($id) {
        try {
            $this->db->where('id', $id);
            $this->db->delete('projects');
            echo "OK";
        } catch (Exception $e) {
            echo "DELETING ARTICLE ERROR: " . $e->message();
        }
    }

    function updateProject($id, $project) {
        try {
            $this->db->where('id', $id);
            $this->db->update('projects', $project);
            $data = array('result' => 'OK', 'title' => $project['title'], 'content' => $project['content']);
            echo json_encode($data);
        } catch (Exception $e) {
            echo "UPDATE PROJECT ERROR: " . $e->message();
        }
    }

    public function getProjectCategories($author) {
        $this->db->distinct();
        $this->db->select('category');
        $result = $this->db->get_where('projects', array('author' => $author));
        if ($result->num_rows() > 0) {
            $categories = $result->result();
            return $categories;
        } else {
            return array();
        }
    }

    public function getProjectCountByCategory($data) {
        try {
            $this->db->where($data);
            $this->db->from('projects');
            echo $this->db->count_all_results();
        } catch (Exception $e) {
            echo "COUNT ARTICLES BY KEYWORD ERROR: " . $e->message();
        }
    }

    public function countProjectsByKeyword($keyword, $author) {
        try {
            $this->db->where('author', $author);
            $this->db->like('title', $keyword, 'both');
            $this->db->from('projects');
            echo $this->db->count_all_results();
        } catch (Exception $e) {
            echo "COUNT ARTICLES BY KEYWORD ERROR: " . $e->message();
        }
    }

}
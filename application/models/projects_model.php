<?php

if (!defined('BASEPATH'))
    exit('No direct access is allowed!');

class Projects_Model extends CI_Model {

    function __construct() {
        $this->load->database();
    }

    function getProjectTrack($user) {
        $today = date('Y-m-d');
        $this->db->select('id')->from('projects')->where('DATE(date_created) >= ', $today)->where('author', $user->username);
        $todayCount = $this->db->count_all_results();

        $lastWeek = date('Y-m-d', strtotime('today - 7 days'));
        $this->db->select('id')->from('projects')->where('DATE(date_created) >= ', $lastWeek)->where('author', $user->username);
        $lwCount = $this->db->count_all_results();

        $lastMonth = date('Y-m-d', strtotime('today - 30 days'));
        $this->db->select('id')->from('projects')->where('DATE(date_created) >= ', $lastMonth)->where('author', $user->username);
        $lmCount = $this->db->count_all_results();

        $this->db->select('id')->from('projects')->where('author', $user->username);
        $all = $this->db->count_all_results();

        $html = "<tr><td>Projects Created</td><td>$todayCount</td><td>$lwCount</td><td>$lmCount</td><td>$all</td></tr>";
        return $html;
    }

    function getPostsCountByProject($id) {
        $this->db->select('id')->from('post_urls')->where('project_id', $id);
        return $this->db->count_all_results();
    }

    public function addProject($project) {
        $this->db->insert('projects', $project);
        $this->db->order_by('date_created', 'desc');
        $query = $this->db->get('projects', 1);
        $this->session->set_userdata('addedProjectId', $query->row()->id);
        return $query->row()->id;
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
        $this->db->where('id', $id);
        $this->db->update('projects', $project);
        $data = array('result' => 'OK', 'title' => $project['title'], 'content' => $project['content']);
        return json_encode($data);
    }
    
    function updateProjectPostCount($id, $postCount) {
        $this->db->where('id', $id);
        $this->db->update('projects', array('postCount' => $postCount));
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

    /* Projects Option */

    public function getProjectOption($id) {
        $result = $this->db->get_where('projects_option', array('project_id' => $id));
        return $result->row();
    }

    public function addProjectOption($option) {
        $this->db->insert('projects_option', $option);
        return "OK";
    }

    public function updateProjectOption($option) {
        $this->db->where('project_id', $option['project_id']);
        $this->db->update('projects_option', $option);
        return "OK";
    }

    public function deleteProjectOption($id) {
        $this->db->where('project_id', $id);
        $this->db->delete('projects_option');
        return "OK";
    }

}
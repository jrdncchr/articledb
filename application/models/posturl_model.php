<?php

if (!defined('BASEPATH'))
    exit('No direct access is allowed!');

class PostUrl_Model extends CI_Model {

    function __construct() {
        $this->load->database();
    }

    function getPostsTrack($user) {
        $today = date('Y-m-d');
        $this->db->select('id')->from('post_urls')->where('DATE(date_posted) >= ', $today)->where('author', $user->username);
        $todayCount = $this->db->count_all_results();

        $lastWeek = date('Y-m-d', strtotime('today - 7 days'));
        $this->db->select('id')->from('post_urls')->where('DATE(date_posted) >= ', $lastWeek)->where('author', $user->username);
        $lwCount = $this->db->count_all_results();

        $lastMonth = date('Y-m-d', strtotime('today - 30 days'));
        $this->db->select('id')->from('post_urls')->where('DATE(date_posted) >= ', $lastMonth)->where('author', $user->username);
        $lmCount = $this->db->count_all_results();

        $this->db->select('id')->from('post_urls')->where('author', $user->username);
        $all = $this->db->count_all_results();

        $html = "<tr><td>Projects posted in WordPress Blogs</td><td>$todayCount</td><td>$lwCount</td><td>$lmCount</td><td>$all</td></tr>";
        return $html;
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
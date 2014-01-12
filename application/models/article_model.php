<?php

if (!defined('BASEPATH'))
    exit('No direct access is allowed!');

class Article_Model extends CI_Model {

    function __construct() {
        $this->load->database();
    }

    function getArticles($id = 0) {
        if ($id == 0) {
            $this->db->order_by("date", "desc");
            $result = $this->db->get('articles');
            if ($result->num_rows() > 0) {
                $articles = $result->result();
                return $articles;
            }
        } else {
            $result = $this->db->get_where('articles', array('id' => $id));
            if ($result->num_rows() > 0) {
                return $result->row();
            }
        }
    }

    function addArticle($title, $category, $content) {
        try {
            $this->load->library('session');
            $user = $this->session->userdata('user');
            $article = array(
                'title' => $title,
                'category' => $category,
                'content' => $content,
                'author' => $user->username,
                'date' => date('Y-m-d')
            );
            $this->db->insert('articles', $article);
            echo "OK";
        } catch (Exception $e) {
            echo "ADD ARTICLE ERROR: " . $e;
        }
    }

}
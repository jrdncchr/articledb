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
            } else {
                return null;
            }
        }
    }

    function addArticle($article) {
        try {
            $this->db->insert('articles', $article);
            echo "OK";
        } catch (Exception $e) {
            echo "ADD ARTICLE ERROR: " . $e;
        }
    }

    function updateArticle($id, $article) {
        try {
            $this->db->where('id', $id);
            $this->db->update('articles', $article);
            $data = array('result' => 'OK', 'title' => $article['title'], 'category' => $article['category'], 'content' => $article['content']);
            echo json_encode($data);
        } catch (Exception $e) {
            echo "UPDATE ARTICLE ERROR: " . $e;
        }
    }

    function deleteArticle($id) {
        try {
            $this->db->where('id', $id);
            $this->db->delete('articles');
            echo "OK";
        } catch (Exception $e) {
            echo "DELETING ARTICLE ERROR: " . $e;
        }
    }

}
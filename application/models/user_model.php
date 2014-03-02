<?php

if (!defined('BASEPATH'))
    exit('No direct access is allowed!');

class User_Model extends CI_Model {

    function __construct() {
        $this->load->database();
    }

    public function add($user) {
        $this->db->insert('users', $user);
    }

    public function update($user, $update) {
        try {
            $this->db->where('id', $user->id);
            $this->db->update('users', $update);

            $result = $this->db->get_where('users', array('username' => $user->username));
            if ($result->num_rows() > 0) {
                $user = $result->row();
                $this->load->library('session');
                $this->session->set_userdata('user', $user);
                session_start();
                $_SESSION['user'] = $user;
            }
            echo "OK";
        } catch (Exception $e) {
            echo $e->message();
        }
    }

    public function checkUsername($username) {
        $result = $this->db->get_where('users', array('username' => $username));
        if ($result->num_rows() < 1) {
            echo "Available";
        }
    }

    public function login($username, $password) {
        $result = $this->db->get_where('users', array('username' => $username));
        if ($result->num_rows() > 0) {
            $user = $result->row();
            if ($user->password == $password) {
                $this->load->library('session');
                $this->session->set_userdata('user', $user);
                session_start();
                $_SESSION['user'] = $user;
                return "Success";
            }
        }
        return "Login failed, incorrect username/password!";
    }

    public function getTrackerInfo($user) {
        $this->load->model('article_model');
        $this->load->model('projects_model');
        $this->load->model('posturl_model');
        $html = "";
        $article = $this->article_model->getArticleTrack($user);
        $html .= $article;
        $project = $this->projects_model->getProjectTrack($user);
        $html .= $project;
        $post = $this->posturl_model->getPostsTrack($user);
        $html .= $post;
        return $html;
    }

}
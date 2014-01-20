<?php

if (!defined('BASEPATH'))
    exit('No direct access is allowed!');

class Main extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $user = $this->session->userdata('user');
        if (null == $user) {
            redirect(base_url());
        }
        $this->load->model('article_model');
    }

    public function index() {
        $this->title = "Article Database &raquo; Main";
        $this->js[] = "custom/main.js";
        $this->data['user'] = $this->session->userdata('user');
        $this->load->model('categories_model');
        $this->data['categories'] = $this->categories_model->get();
        $this->_renderL('pages/main');
    }

    public function logout() {
        $this->session->sess_destroy();
        session_start();
        if (isset($_SESSION['user']))
            unset($_SESSION['user']);
        redirect(base_url());
    }

    public function profile() {
        $this->title = "Article Database &raquo; Profile";
        $this->js[] = "custom/profile.js";
        $this->data['user'] = $this->session->userdata('user');
        $this->_renderL('pages/profile');
    }

    public function updateProfile() {
        $this->load->model('user_model');
        $user = $this->session->userdata('user');
        $update = array(
            'name' => $_POST['name'],
            'email' => $_POST['email']
        );
        $this->user_model->update($user, $update);
    }

    public function changePassword() {
        $user = $this->session->userdata('user');
        if ($user->password == $_POST['old']) {
            $this->load->model('user_model');
            $update = array(
                'password' => $_POST['new']
            );
            $this->user_model->update($user, $update);
        } else {
            echo 'Incorrect Old Password!';
        }
    }

    public function generateTitles() {
        $keyword = $_POST['keyword'];
        $category = $_POST['category'];
        $noTitles = $_POST['noTitles'];
        $result = $this->article_model->generateTitles($keyword, $category, $noTitles);
        if (sizeof($result) > 0) {
            $titles = "{";
            foreach ($result as $title) {
                $titles .= "$title->title|";
            }
            $titles = substr($titles, 0, -1);
            $titles .= "}";

            $data = array(
                'result' => "OK",
                'titles' => $titles
            );
            echo json_encode($data);
        } else {
            $data = array(
                'result' => "No title found matching you request."
            );
            echo json_encode($data);
        }
    }

    public function countArticlesByKeyword() {
        $keyword = $_POST['keyword'];
        $this->article_model->countArticlesByKeyword($keyword);
    }

    public function countProjectsByKeyword() {
        $keyword = $_POST['keyword'];
        $user = $this->session->userdata('user');
        $this->article_model->countArticlesByKeyword($keyword, $user->username);
    }

    public function generateArticles() {
        $data = array(
            'keyword' => $_POST['keyword'],
            'category' => $_POST['category'],
            'noTitles' => $_POST['noTitles'],
            'noArticlesToMix' => $_POST['noArticlesToMix'],
            'pMin' => $_POST['pMin'],
            'pMax' => $_POST['pMax'],
            'sMin' => $_POST['sMin'],
            'sMax' => $_POST['sMax']
        );

        $result = array();

        //Generate Titles
        $generateTitles = $this->article_model->generateTitles($data['keyword'], $data['category'], $data['noTitles']);
        if (sizeof($generateTitles) > 0) {
            $titles = "{";
            foreach ($generateTitles as $title) {
                $titles .= "$title->title|";
            }
            $titles = substr($titles, 0, -1);
            $titles .= "}";

            $result['titles'] = $titles;
        } else {
            $result['titles'] = "No titles found.";
        }

        //Generate Article
        $generateArticle = $this->article_model->generateArticles($data);
        $result['article'] = $generateArticle;

        echo json_encode($result);
    }

    public function generateArticlesByProject() {
        $user = $this->session->userdata('user');
        $data = array(
            'keyword' => $_POST['keyword'],
            'category' => $_POST['category'],
            'noTitles' => $_POST['noTitles'],
            'noArticlesToMix' => $_POST['noArticlesToMix'],
            'pMin' => $_POST['pMin'],
            'pMax' => $_POST['pMax'],
            'sMin' => $_POST['sMin'],
            'sMax' => $_POST['sMax'],
            'author' => $user->username
        );

        $result = array();

        //Generate Titles
        $generateTitles = $this->article_model->generateTitlesByProject($data['keyword'], $data['category'], $data['noTitles'], $data['author']);
        if (sizeof($generateTitles) > 0) {
            $titles = "{";
            foreach ($generateTitles as $title) {
                $titles .= "$title->title|";
            }
            $titles = substr($titles, 0, -1);
            $titles .= "}";

            $result['titles'] = $titles;
        } else {
            $result['titles'] = "No titles found.";
        }

        //Generate Article
        $generateArticle = $this->article_model->generateArticlesByProject($data);
        $result['article'] = $generateArticle;

        echo json_encode($result);
    }

}
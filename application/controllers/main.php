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

//    public function test() {
//        $this->load->model('titleTemplate_model');
//        $this->titleTemplate_model->testAdd();
//    }

    public function index() {
        $this->title = "Article Database &raquo; Main";
        $this->js[] = "custom/main.js";
        $this->js[] = "custom/main2.js";
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

    public function updateTBSInfo() {
        $this->load->model('user_model');
        $user = $this->session->userdata('user');
        $update = array(
            'tbsun' => $_POST['tbsun'],
            'tbspw' => $_POST['tbspw']
        );
        $this->user_model->update($user, $update);
    }

    public function generateTitles() {
        $useTemplate = $_POST['useTemplate'];
        $keyword = $_POST['keyword'];
        $category = $_POST['category'];
        $noTitles = $_POST['noTitles'];
        $result = array();
        if ($useTemplate == "YES") {
            $this->load->model('titletemplate_model');
            $result = $this->titletemplate_model->getRandomTitles($noTitles);
        } else {
            $result = $this->article_model->generateTitles($keyword, $category, $noTitles);
        }
        if (sizeof($result) > 0) {
            $titles = "{";
            foreach ($result as $title) {
                if ($useTemplate == "YES") {
                    $title->title = str_replace("Keyword", $keyword, $title->title);
                }
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
                $titles .= $this->unspun($title->title) . "|";
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

    public function unspun($s) {
        if (preg_match_all('#\{(((?>[^{}]+)|(?R))*)\}#', $s, $matches, PREG_OFFSET_CAPTURE)) {
            for ($i = count($matches[0]) - 1; $i >= 0; --$i) {
                $s = substr_replace($s, $this->unspun($matches[1][$i][0]), $matches[0][$i][1], strlen($matches[0][$i][0]));
            }
        }
        $choices = explode('|', $s);
        return $choices[array_rand($choices)];
    }

    function spin() {
        $result = array();
        session_start();
        $user = $_SESSION['user'];

        if ($user->tbsun == null && $user->tbspw == null) {
            $result['result'] = "You must setup your TBS details in your profile to enable this feature.";
        } else {

            function curl_post($url, $data, &$info) {
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, curl_postData($data));
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_REFERER, $url);
                $html = trim(curl_exec($ch));
                curl_close($ch);
                return $html;
            }

            function curl_postData($data) {
                $fdata = "";
                foreach ($data as $key => $val) {
                    $fdata .= "$key=" . urlencode($val) . "&";
                }
                return $fdata;
            }

            $url = 'http://thebestspinner.com/api.php';

            #$testmethod = 'identifySynonyms';
            $testmethod = 'replaceEveryonesFavorites';


            # Build the data array for authenticating.
            $data = array();
            $data['action'] = 'authenticate';
            $data['format'] = 'php'; # You can also specify 'xml' as the format.
            # The user credentials should change for each UAW user with a TBS account.
            $data['username'] = $user->tbsun;
            $data['password'] = $user->tbspw;

            # Authenticate and get back the session id.
            # You only need to authenticate once per session.
            # A session is good for 24 hours.
            $output = unserialize(curl_post($url, $data, $info));

            if ($output['success'] == 'true') {
                # Success.
                $session = $output['session'];

                # Build the data array for the example.
                $data = array();
                $data['session'] = $session;
                $data['format'] = 'php'; # You can also specify 'xml' as the format.
                $data['text'] = $_POST['text'];
                $data['action'] = $testmethod;
                $data['maxsyns'] = '3'; # The number of synonyms per term.

                if ($testmethod == 'replaceEveryonesFavorites') {
                    # Add a quality score for this method.
                    $data['quality'] = '1';
                }

                # Post to API and get back results.
                $output = curl_post($url, $data, $info);
                $output = unserialize($output);

                $data['action'] = 'apiQuota';
                $quota = curl_post($url, $data, $info);
                $quota = unserialize($quota);

                if ($output['success'] == 'true') {
                    $result['output'] = str_replace("\r", "<br>", $output['output']);
                    $result['result'] = "OK";
                } else {
                    $result['result'] = "Spinning failed, please try again...";
                }
            } else {
                $result['result'] = "Invalid TBS Username or Password, uncheck the checkbox below to mix only.";
            }
        }
        echo json_encode($result);
    }

}
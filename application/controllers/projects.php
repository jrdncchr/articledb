<?php

if (!defined('BASEPATH'))
    exit('No direct access is allowed!');

class Projects extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('projects_model');
        $this->load->library('session');
    }

    public function getProjectInfo() {
        $this->load->model('projects_model');
        $project = $this->projects_model->getProject($_POST['id']);
        $this->session->set_userdata('selectedProject', $_POST['id']);
        echo json_encode($project);
    }

    public function post() {
        $post = array(
            'title' => $_POST['title'],
            'content' => $_POST['content']
        );
        $blogCount = $_POST['blogCount'];
        $type = $_POST['type'];
        $user = $this->session->userdata('user');
        $this->load->model('blogs_model');
        $randomBlogs = $this->blogs_model->getRandomBlogs($type, $blogCount);
        foreach ($randomBlogs as $blog) {
            $id = $this->blogs_model->postArticle($blog, $post);
            $url = $blog->url . "?p=" . $id;

            $projectId = $this->session->userdata('addedProjectId');
            $posturl = array(
                'project_id' => $projectId,
                'url' => $url,
                'author' => $user->username
            );
            $this->load->model('posturl_model');
            $this->posturl_model->add($posturl);

            echo $url . ",";
        }
        $this->load->model('projects_model');
        $postCount = $this->projects_model->getPostsCountByProject($projectId);
        $this->projects_model->updateProjectPostCount($projectId, $postCount);
    }

    public function nonSpin() {

        function unspun($s) {
            if (preg_match_all('#\{(((?>[^{}]+)|(?R))*)\}#', $s, $matches, PREG_OFFSET_CAPTURE)) {
                for ($i = count($matches[0]) - 1; $i >= 0; --$i) {
                    $s = substr_replace($s, unspun($matches[1][$i][0]), $matches[0][$i][1], strlen($matches[0][$i][0]));
                }
            }
            $choices = explode('|', $s);
            return $choices[array_rand($choices)];
        }

        $text = unspun($_POST['text']);
        echo $text;
    }

    public function preview() {

        function unspun2($s) {
            if (preg_match_all('#\{(((?>[^{}]+)|(?R))*)\}#', $s, $matches, PREG_OFFSET_CAPTURE)) {
                for ($i = count($matches[0]) - 1; $i >= 0; --$i) {
                    $s = substr_replace($s, unspun2($matches[1][$i][0]), $matches[0][$i][1], strlen($matches[0][$i][0]));
                }
            }
            $choices = explode('|', $s);
            return $choices[array_rand($choices)];
        }

        $text = $_POST['text'];
        session_start();
        $_SESSION['preview'] = unspun2($text);
        echo "OK";
    }

    public function showPreview() {
        session_start();
        $data['output'] = nl2br($_SESSION['preview']);
        $this->load->view('pages/projects_output', $data);
    }

    public function view($id) {
        $project = $this->projects_model->getProject($id);
        if ($project != null) {
            $this->js[] = "custom/projects_view.js";
            $this->data['project'] = $project;
            $this->session->set_userdata('selectedProjectView', $id);
            $this->_renderL('pages/projects_view');
        } else {
            show_404();
        }
    }

    public function viewFull($id) {
        $project = $this->projects_model->getProject($id);
        if ($project != null) {
            $data['output'] = "$project->title \r\n $project->content";
            $this->load->view('pages/projects_output', $data);
        } else {
            show_404();
        }
    }

    public function viewTitle($id) {
        $project = $this->projects_model->getProject($id);
        if ($project != null) {
            $data['output'] = $project->title;
            $this->load->view('pages/projects_output', $data);
        } else {
            show_404();
        }
    }

    public function viewContent($id) {
        $project = $this->projects_model->getProject($id);
        if ($project != null) {
            $data['output'] = $project->content;
            $this->load->view('pages/projects_output', $data);
        } else {
            show_404();
        }
    }

    public function viewSummary($id) {
        $project = $this->projects_model->getProject($id);
        if ($project != null) {
            $split = explode(".", $project->content);
            $data['output'] = $split[0] . ". " . $split[1] . ". " . $split[2] . ".";
            $this->load->view('pages/projects_output', $data);
        } else {
            show_404();
        }
    }

    public function info($id) {
        $user = $this->session->userdata('user');
        if (null == $user) {
            redirect(base_url());
        }

        $project = $this->projects_model->getProject($id);
        if ($project != null) {
            $this->js[] = "custom/projects_info.js";
            $this->data['project'] = $project;
            $this->data['user'] = $this->session->userdata('user');
            $this->session->set_userdata('selectedProject', $id);

            $this->load->model('posturl_model');
            $urls = $this->posturl_model->get($id);
            $this->data['urls'] = $urls;

            $this->_renderL('pages/projects_info');
        } else {
            show_404();
        }
    }

    public function add() {
        $user = $this->session->userdata('user');
        if (null == $user) {
            redirect(base_url());
        }
        $project = array(
            'title' => $_POST['title'],
            'content' => $_POST['content'],
            'author' => $user->username,
            'category' => $_POST['category'],
            'name' => $_POST['name']
        );
        $id = $this->projects_model->addProject($project);
        $project_option = $this->session->userdata('project_option');
        $project_option['project_id'] = $id;
        $project_option['postType'] = $_POST['postType'];
        $project_option['postCount'] = $_POST['postCount'];
        echo $this->projects_model->addProjectOption($project_option);
    }

    public function delete() {
        $user = $this->session->userdata('user');
        if (null == $user) {
            redirect(base_url());
        }

        $id = $this->session->userdata('selectedProject');
        $this->projects_model->deleteProject($id);
    }

    //get by post data
    public function deleteProject() {
        $user = $this->session->userdata('user');
        if (null == $user) {
            redirect(base_url());
        }
        $this->projects_model->deleteProject($_POST['id']);
    }

    public function update() {
        $user = $this->session->userdata('user');
        if (null == $user) {
            redirect(base_url());
        }

        $id = $this->session->userdata('selectedProject');
        $project = array(
            'title' => $_POST['title'],
            'content' => $_POST['content'],
            'name' => $_POST['name']
        );
        echo $this->projects_model->updateProject($id, $project);
    }

    public function regenerate() {
        $id = $_POST['id'];
        if ($id > 0) {
            $option = $this->projects_model->getProjectOption($id);
            $user = $this->session->userdata('user');
            $result = array();
            $project = array();
            $data = array(
                'keyword' => $option->keyword,
                'category' => $option->category,
                'noTitles' => $option->noTitles,
                'noArticlesToMix' => $option->noArticlesToMix,
                'pMin' => $option->pMin,
                'pMax' => $option->pMax,
                'sMin' => $option->sMin,
                'sMax' => $option->sMax,
                'addedCode' => $option->addedCode,
                'generateCount' => $option->generateCount,
                'spin' => $option->spin
            );
            if ($data['spin'] == 'yes') {
                if ($user->tbsun == null && $user->tbspw == null) {
                    $result['result'] = "Please setup your TBS account in your Profile.";
                    return false;
                }
            }

            //Generate Titles
            $this->load->model('article_model');
            $generateTitles = $this->article_model->generateTitles($data['keyword'], $data['category'], $data['noTitles']);
            if (sizeof($generateTitles) > 0) {
                $titles = "{";
                foreach ($generateTitles as $title) {
                    $titles .= "$title->title|";
                }
                $titles = substr($titles, 0, -1);
                $titles .= "}";
                $project['title'] = $titles;

                //Generate Article
                $generateArticle = $this->article_model->generateArticles($data, $user);
                if (strlen($generateArticle) > 10) {
                    $project['content'] = $generateArticle;
                    //Update Project
                    $this->projects_model->updateProject($id, $project);

                    //post
                    if ($option->postType != "") {
                        $result['links'] = $this->wordPressPost($id, $project, $option->postCount, $option->postType);
                    }
                    $result['result'] = "OK";
                    echo json_encode($result);
                } else {
                    $result['result'] = "Error regenerating article, please try again... ";
                    echo json_encode($result);
                }
            } else {
                $result['result'] = "No titles found.";
            }
        }
    }

    public function wordPressPost($projectId, $post, $blogCount, $type) {
        $user = $this->session->userdata('user');
        $this->load->model('blogs_model');
        $randomBlogs = $this->blogs_model->getRandomBlogs($type, $blogCount);
        $links = "";
        foreach ($randomBlogs as $blog) {
            $id = $this->blogs_model->postArticle($blog, $post);
            $url = $blog->url . "?p=" . $id;
            $posturl = array(
                'project_id' => $projectId,
                'url' => $url,
                'author' => $user->username
            );
            $this->load->model('posturl_model');
            $this->posturl_model->add($posturl);

            $links .= $url . ",";
        }
        $this->load->model('projects_model');
        $postCount = $this->projects_model->getPostsCountByProject($projectId);
        $this->projects_model->updateProjectPostCount($projectId, $postCount);
        return $links;
    }

    public function getProjectCategories() {
        $user = $this->session->userdata('user');
        $categories = $this->projects_model->getProjectCategories($user->username);
        if (count($categories) > 0) {
            $categoryString = "";
            $categoryString .= "<option value=''>Select Category</option>";
            foreach ($categories as $c) {
                if ($c->category != "" || $c->category != null) {
                    $categoryString .= "<option value='" . $c->category . "'>" . $c->category . "</option>";
                }
            }
            echo $categoryString;
        } else {
            echo "<option value=''></option>";
        }
    }

    public function getProjectCountByCategory() {
        $user = $this->session->userdata('user');
        $data = array(
            'category' => $_POST['category'],
            'author' => $user->username
        );
        $this->projects_model->getProjectCountByCategory($data);
    }

    public function countProjectsByKeyword() {
        $user = $this->session->userdata('user');
        $keyword = $_POST['keyword'];
        $this->projects_model->countProjectsByKeyword($keyword, $user->username);
    }

    public function get() {
        $aColumns = array('id', 'name', 'postCount', 'id');

        /* Indexed column (used for fast and accurate table cardinality) */
        $sIndexColumn = "id";

        /* DB table to use */
        $sTable = "projects";

        $gaSql['user'] = DB_USER;
        $gaSql['password'] = DB_PASSWORD;
        $gaSql['db'] = DB_DATABASE;
        $gaSql['server'] = DB_HOSTNAME;

        session_start();
        $user = $_SESSION['user'];


        /*         * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
         * If you just want to use the basic configuration for DataTables with PHP server-side, there is
         * no need to edit below this line
         */

        /*
         * MySQL connection
         */
        $gaSql['link'] = mysql_pconnect($gaSql['server'], $gaSql['user'], $gaSql['password']) or
                die('Could not open connection to server');

        mysql_select_db($gaSql['db'], $gaSql['link']) or
                die('Could not select database ' . $gaSql['db']);


        /*
         * Paging
         */
        $sLimit = "";
        if (isset($_GET['iDisplayStart']) && $_GET['iDisplayLength'] != '-1') {
            $sLimit = "LIMIT " . mysql_real_escape_string($_GET['iDisplayStart']) . ", " .
                    mysql_real_escape_string($_GET['iDisplayLength']);
        }


        /*
         * Ordering
         */
        if (isset($_GET['iSortCol_0'])) {
            $sOrder = "ORDER BY  ";
            for ($i = 0; $i < intval($_GET['iSortingCols']); $i++) {
                if ($_GET['bSortable_' . intval($_GET['iSortCol_' . $i])] == "true") {
                    $sOrder .= $aColumns[intval($_GET['iSortCol_' . $i])] . "
				 	" . mysql_real_escape_string($_GET['sSortDir_' . $i]) . ", ";
                }
            }

            $sOrder = substr_replace($sOrder, "", -2);
            if ($sOrder == "ORDER BY") {
                $sOrder = "";
            }
        }


        /*
         * Filtering
         * NOTE this does not match the built-in DataTables filtering which does it
         * word by word on any field. It's possible to do here, but concerned about efficiency
         * on very large tables, and MySQL's regex functionality is very limited
         */
        $sWhere = "WHERE author = '" . $user->username . "'";
        if ($_GET['sSearch'] != "") {
            $sWhere = "WHERE (";
            for ($i = 0; $i < count($aColumns); $i++) {
                $sWhere .= $aColumns[$i] . " LIKE '%" . mysql_real_escape_string($_GET['sSearch']) . "%' OR ";
            }
            $sWhere = substr_replace($sWhere, "", -3);
            $sWhere .= ')';
        }

        /* Individual column filtering */
        for ($i = 0; $i < count($aColumns); $i++) {
            if ($_GET['bSearchable_' . $i] == "true" && $_GET['sSearch_' . $i] != '') {
                if ($sWhere == "") {
                    $sWhere = "WHERE ";
                } else {
                    $sWhere .= " AND ";
                }
                $sWhere .= $aColumns[$i] . " LIKE '%" . mysql_real_escape_string($_GET['sSearch_' . $i]) . "%' ";
            }
        }


        /*
         * SQL queries
         * Get data to display
         */
        $sQuery = "
		SELECT SQL_CALC_FOUND_ROWS " . str_replace(" , ", " ", implode(", ", $aColumns)) . "
		FROM   $sTable
		$sWhere
		$sOrder
		$sLimit
	";
        $rResult = mysql_query($sQuery, $gaSql['link']) or die(mysql_error());

        /* Data set length after filtering */
        $sQuery = "
		SELECT FOUND_ROWS()
	";
        $rResultFilterTotal = mysql_query($sQuery, $gaSql['link']) or die(mysql_error());
        $aResultFilterTotal = mysql_fetch_array($rResultFilterTotal);
        $iFilteredTotal = $aResultFilterTotal[0];

        /* Total data set length */
        $sQuery = "
		SELECT COUNT(" . $sIndexColumn . ")
		FROM   $sTable
	";
        $rResultTotal = mysql_query($sQuery, $gaSql['link']) or die(mysql_error());
        $aResultTotal = mysql_fetch_array($rResultTotal);
        $iTotal = $aResultTotal[0];


        /*
         * Output
         */
        $output = array(
            "sEcho" => intval($_GET['sEcho']),
            "iTotalRecords" => $iTotal,
            "iTotalDisplayRecords" => $iFilteredTotal,
            "aaData" => array()
        );

        while ($aRow = mysql_fetch_array($rResult)) {
            $row = array();
            for ($i = 0; $i < count($aColumns); $i++) {
                if ($aColumns[$i] == "version") {
                    /* Special output formatting for 'version' column */
                    $row[] = ($aRow[$aColumns[$i]] == "0") ? '-' : $aRow[$aColumns[$i]];
                } else if ($aColumns[$i] != ' ') {
                    /* General output */
                    $row[] = $aRow[$aColumns[$i]];
                }
            }
            $output['aaData'][] = $row;
        }

        echo json_encode($output);
    }

}
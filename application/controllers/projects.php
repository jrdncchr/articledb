<?php

if (!defined('BASEPATH'))
    exit('No direct access is allowed!');

class Projects extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('projects_model');
        $this->load->library('session');
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
            $data['output'] = $project->title . "|" . $project->content;
            $this->load->view('pages/projects_output', $data);
        } else {
            show_404();
        }
    }

    public function viewTitle($id) {
        $project = $this->projects_model->getProject($id);
        if ($project != null) {
            $this->data['output'] = $project->title;
            $this->_renderL('pages/projects_output');
        } else {
            show_404();
        }
    }

    public function viewContent($id) {
        $project = $this->projects_model->getProject($id);
        if ($project != null) {
            $this->data['output'] = $project->content;
            $this->load->view('pages/projects_output');
        } else {
            show_404();
        }
    }

    public function viewSummary($id) {
        $project = $this->projects_model->getProject($id);
        if ($project != null) {
            $this->data['output'] = substr($project->content, 0, 50) . "...";
            $this->_renderL('pages/projects_output');
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
            'name' => $_POST['name'],
            'date' => date('Y-m-d')
        );
        $this->projects_model->addProject($project);
    }

    public function delete() {
        $user = $this->session->userdata('user');
        if (null == $user) {
            redirect(base_url());
        }

        $id = $this->session->userdata('selectedProject');
        $this->projects_model->deleteProject($id);
    }

    public function update() {
        $user = $this->session->userdata('user');
        if (null == $user) {
            redirect(base_url());
        }

        $id = $this->session->userdata('selectedProject');
        $project = array(
            'title' => $_POST['title'],
            'content' => $_POST['content']
        );
        $this->projects_model->updateProject($id, $project);
    }

    public function getProjectCategories() {
        $user = $this->session->userdata('user');
        $categories = $this->projects_model->getProjectCategories($user->username);
        if (count($categories) > 0) {
            $categoryString = "";
            foreach ($categories as $c) {
                $categoryString .= "<option value='" . $c->category . "'>" . $c->category . "</option>";
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
        $aColumns = array('id', 'name');

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
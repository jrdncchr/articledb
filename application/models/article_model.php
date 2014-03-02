<?php

if (!defined('BASEPATH'))
    exit('No direct access is allowed!');

class Article_Model extends CI_Model {

    function __construct() {
        $this->load->database();
    }

    function getArticleTrack($user) {
        $today = date('Y-m-d');
        $this->db->select('id')->from('articles')->where('date >= ', $today)->where('author', $user->username);
        $todayCount = $this->db->count_all_results();

        $lastWeek = date('Y-m-d', strtotime('today - 7 days'));
        $this->db->select('id')->from('articles')->where('date >= ', $lastWeek)->where('author', $user->username);
        $lwCount = $this->db->count_all_results();

        $lastMonth = date('Y-m-d', strtotime('today - 30 days'));
        $this->db->select('id')->from('articles')->where('date >= ', $lastMonth)->where('author', $user->username);
        $lmCount = $this->db->count_all_results();

        $this->db->select('id')->from('articles')->where('author', $user->username);
        $all = $this->db->count_all_results();

        $html = "<tr><td>Articles Created</td><td>$todayCount</td><td>$lwCount</td><td>$lmCount</td><td>$all</td></tr>";
        return $html;
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
            echo "UPDATE ARTICLE ERROR: " . $e->message();
        }
    }

    function deleteArticle($id) {
        try {
            $this->db->where('id', $id);
            $this->db->delete('articles');
            echo "OK";
        } catch (Exception $e) {
            echo "DELETING ARTICLE ERROR: " . $e->message();
        }
    }

    public function countArticlesByKeyword($keyword) {
        try {
            $this->db->like('title', $keyword, 'both');
            $this->db->from('articles');
            echo $this->db->count_all_results();
        } catch (Exception $e) {
            echo "COUNT ARTICLES BY KEYWORD ERROR: " . $e->message();
        }
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

    function generateTitles($keyword, $category, $noTitles) {
        try {
            if ($keyword != "") {
                $this->db->order_by('id', 'random');
                $this->db->like('title', $keyword, 'both');
                $result = $this->db->get('articles', $noTitles);
                if ($result->num_rows() > 0) {
                    return $result->result();
                } else {
                    return array();
                }
            } else {
                $this->db->order_by('id', 'random');
                $result = $this->db->get_where('articles', array('category' => $category), $noTitles);
                if ($result->num_rows() > 0) {
                    return $result->result();
                } else {
                    return array();
                }
            }
        } catch (Exception $e) {
            echo "GETTING TITLES ERROR: " . $e->message();
        }
    }

    public function generateArticles($data, $user) {
        try {
            $finalOutput = "{";
            // loop on how many articles should be generated
            for ($x = 0; $x < $data['generateCount']; $x++) {
                // get all articles depending on key or category on an array
                $articles = array();
                if ($data['keyword'] != "") {
                    $this->db->order_by('id', 'random');
                    $this->db->like('title', $data['keyword'], 'both');
                    $result = $this->db->get('articles', $data['noArticlesToMix']);
                    if ($result->num_rows() > 0) {
                        $articles = $result->result();
                    }
                } else {
                    $this->db->order_by('id', 'random');
                    $result = $this->db->get_where('articles', array('category' => $data['category']), $data['noArticlesToMix']);
                    if ($result->num_rows() > 0) {
                        $articles = $result->result();
                    }
                }

                // loop the articles array and remove unnecessary characters. put them all in one string
                $articlesStr = "";
                foreach ($articles as $a) {
                    $articlesStr .= preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)\'\;\:\?\!\,%&-]/s', '', $a->content);
                }

                // split the article string by '.' to sepearate each sentences
                $articlesSplit = explode(". ", $articlesStr);

                $generatedArticle = "";

                // create a paragraph depending on users min and max paragraph count
                for ($i = 1; $i <= rand($data['pMin'], $data['pMax']); $i++) {
                    $paragraph = "";
                    // in each paragraph randomize also how many sentence/paragraph
                    for ($y = 1; $y <= rand($data['sMin'], $data['sMax']); $y++) {
                        if (count($articlesSplit) > 0) {
                            // randomize the index to get a random sentence in the splitted article string
                            $randomIndex = rand(0, count($articlesSplit) - 1);
                            $sentence = $articlesSplit[$randomIndex];
                            // sentence should be atleast 15 characters, else randomize again
                            while (strlen($sentence) < 15) {
                                unset($articlesSplit[$randomIndex]);
                                $articlesSplit = array_values($articlesSplit);
                                $randomIndex = rand(0, count($articlesSplit) - 1);
                                $sentence = $articlesSplit[$randomIndex];
                            }
                            unset($articlesSplit[$randomIndex]);
                            $articlesSplit = array_values($articlesSplit);
                            if (strpos($generatedArticle, $sentence) == false) {
                                $paragraph .= $sentence . ". ";
                            }
                        }
                    }
                    $paragraph .= "\n\n";
                    $generatedArticle .= $paragraph;
                }
                if ($data['spin'] == 'yes') {
                    $generatedArticle = $this->spin($generatedArticle, $user);
                }
                // add the code in a random index of the created article splitted by '.'
                if ($data['addedCode'] != '') {
                    $gaSplit = explode(". ", $generatedArticle);
                    $randomIndex = rand(0, count($gaSplit) - 1);
                    $gaSplit[$randomIndex] = $data['addedCode'] . " " . $gaSplit[$randomIndex];
                    $generatedArticle = "";
                    for ($i = 0; $i < sizeof($gaSplit) - 1; $i++) {
                        $generatedArticle .= $gaSplit[$i] . ". ";
                    }
                }
                $finalOutput .= $generatedArticle . "|";
            }
            $finalOutput = substr($finalOutput, 0, -1);
            $finalOutput .= "}";
            return $finalOutput;
        } catch (Exception $e) {
            echo "GENERATE ARTICLE ERROR: " . $e->message();
        }
    }

    function spin($text, $user) {
        $result = array();

        if (!function_exists('curl_post')) {

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

        }

        if (!function_exists('curl_postData')) {
            function curl_postData($data) {
                $fdata = "";
                foreach ($data as $key => $val) {
                    $fdata .= "$key=" . urlencode($val) . "&";
                }
                return $fdata;
            }

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
            $data['text'] = $text;
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
            $result['result'] = "Invalid TBS Username or Password, please check your profile.";
        }
        return $result['output'];
    }

}
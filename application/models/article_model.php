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

    function generateTitlesByProject($keyword, $category, $noTitles, $author) {
        try {
            if ($keyword != "") {
                $this->db->order_by('id', 'random');
                $this->db->like('title', $keyword, 'both');
                $result = $this->db->get_where('projects', array('author' => $author), $noTitles);
                if ($result->num_rows() > 0) {
                    return $result->result();
                } else {
                    return array();
                }
            } else {
                $this->db->order_by('id', 'random');
                $result = $this->db->get_where('projects', array('category' => $category, 'author' => $author), $noTitles);
                if ($result->num_rows() > 0) {
                    return $result->result();
                } else {
                    return array();
                }
            }
        } catch (Exception $e) {
            echo "GETTING TITLES BY PROJECT ERROR: " . $e->message();
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

    public function generateArticles($data) {
        try {
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
                        // randomize and index to get a random sentence in the splitted article string
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
            return $generatedArticle;
        } catch (Exception $e) {
            echo "GENERATE ARTICLE ERROR: " . $e->message();
        }
    }

    public function generateArticlesByProject($data) {
        try {
            // get all articles depending on key or category on an array
            $articles = array();
            if ($data['keyword'] != "") {
                $this->db->order_by('id', 'random');
                $this->db->like('title', $data['keyword'], 'both');
                $result = $this->db->get_where('projects', array('author' => $data['author']), $data['noArticlesToMix']);
                if ($result->num_rows() > 0) {
                    $articles = $result->result();
                }
            } else {
                $this->db->order_by('id', 'random');
                $result = $this->db->get_where('projects', array('category' => $data['category'], 'author' => $data['author']), $data['noArticlesToMix']);
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
                        // randomize and index to get a random sentence in the splitted article string
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
            return $generatedArticle;
        } catch (Exception $e) {
            echo "GENERATE ARTICLE BY PROJECT ERROR: " . $e->message();
        }
    }

}
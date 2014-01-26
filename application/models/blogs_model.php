<?php

if (!defined('BASEPATH'))
    exit('No direct access is allowed!');

class Blogs_Model extends CI_Model {

    public function __construct() {
        $this->load->database();
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

    public function send($data, $url) {
        if (!function_exists('curl_init')) {
            die("Curl PHP package not installed!");
        }

        /** Initializing CURL * */
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: text/xml"));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        /** Now execute the CURL, download the URL specified * */
        $response = curl_exec($ch);
        return $response;
    }

    public function postArticle($blog, $post) {
        $xmlrpc_url = $blog->url . "xmlrpc.php";
        $xmlrpc_username = $blog->username; // User setup with contributor role
        $xmlrpc_password = $blog->password; // The users password

        $content = array(
            'post_title' => $this->unspun($post['title']),
            'post_content' => $this->unspun($post['content']),
            'post_status' => 'publish'
        );

        /** Encode the request * */
        $request = xmlrpc_encode_request("wp.newPost", array(1, $xmlrpc_username, $xmlrpc_password, $content));

        /** Making the request to wordpress XMLRPC * */
        $xml_response = $this->send($request, $xmlrpc_url);

        $response = xmlrpc_decode($xml_response);
        /** Printing the response on to the console * */
        return $response;
    }

    public function getRandomBlogs($type, $count) {
        $this->db->order_by("id", "random");
        if ($type == "admin") {
            $blogs = $this->db->get_where('blogs', array('type' => 'admin', 'status' => 'active'), $count);
            return $blogs->result();
        } else if ($type == "public") {
            $blogs = $this->db->get_where('blogs', array('type' => 'public', 'status' => 'active'), $count);
            return $blogs->result();
        } else {
            $blogs = $this->db->get_where('blogs', array('status' => 'active'), $count);
            return $blogs->result();
        }
    }

    public function getBlogs($id = 0) {
        if ($id == 0) {
            $result = $this->db->get('blogs');
            if ($result->num_rows() > 0) {
                return $result->result();
            }
        } else {
            $result = $this->db->get_where('blogs', array('id' => $id));
            if ($result->num_rows() > 0) {
                return $result->row();
            } else {
                return null;
            }
        }
    }

    public function getActiveBlogs() {
        $result = $this->db->get_where('blogs', array('status' => 'active'));
        if ($result->num_rows() > 0) {
            return $result->result();
        }
    }

    function addBlog($blog) {
        try {
            $this->db->insert('blogs', $blog);
            echo "OK";
        } catch (Exception $e) {
            echo "ADD BLOG ERROR: " . $e;
        }
    }

    function updateBlog($blog) {
        try {
            $this->db->where('id', $blog->id);
            $this->db->update('blogs', $blog);
            echo "OK";
        } catch (Exception $e) {
            echo "UPDATE BLOG ERROR: " . $e->message();
        }
    }

    function deleteBlog($id) {
        try {
            $this->db->where('id', $id);
            $this->db->delete('blogs');
            echo "OK";
        } catch (Exception $e) {
            echo "DELETING BLOG ERROR: " . $e->message();
        }
    }

    function test() {

        function send($data, $url) {
            if (!function_exists('curl_init')) {
                die("Curl PHP package not installed!");
            }

            /** Initializing CURL * */
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HEADER, false);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: text/xml"));
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

            /** Now execute the CURL, download the URL specified * */
            $response = curl_exec($ch);
            return $response;
        }

        $xmlrpc_url = "http://genuinecore.com/jordan/blog/xmlrpc.php";
        $xmlrpc_username = 'admin'; // User setup with contributor role
        $xmlrpc_password = 'danero2102285blog'; // The users password

        $content = array(
            'post_title' => 'test title',
            'post_content' => 'test content',
            'post_excerpt' => 'test excerpt',
            'post_status' => 'publish'
        );

        /** Encode the request * */
        $request = xmlrpc_encode_request("wp.newPost", array(1, $xmlrpc_username, $xmlrpc_password, $content));

        /** Making the request to wordpress XMLRPC * */
        $xml_response = send($request, $xmlrpc_url);

        $response = xmlrpc_decode($xml_response);
        /** Printing the response on to the console * */
    }

}
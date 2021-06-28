<?php
class RestController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index($post_id = NULL)
    {
        if ($post_id === NULL) {
            $data['posts'] = $this->viewAllPost();
        } else {
            $data['post'] = $this->viewPostByID($post_id);
            $data['comment'] = $this->getCommentsByPostID($post_id);
        }

        $this->load->view('templates/headers.php');
        $this->load->view('RestInterface', $data);
        $this->load->view('templates/footers.php');
    }

    public function viewAllPost()
    {
        $post_url = "https://jsonplaceholder.typicode.com/posts";
        $comment_url = "https://jsonplaceholder.typicode.com/comments";
        $json_post = json_decode(file_get_contents($post_url), true);
        $json_comment = json_decode(file_get_contents($comment_url), true);

        $data = array();

        for ($i = 0; $i < sizeof($json_post); $i++) {
            $data[$i]['post_id'] = $json_post[$i]['id'];
            $data[$i]['post_title'] = $json_post[$i]['title'];
            $data[$i]['post_body'] = $json_post[$i]['body'];
            $data[$i]['total_number_of_comments'] = 0;

            foreach ($json_comment as $comments)
                if ($comments['postId'] === $data[$i]['post_id'])
                    $data[$i]['total_number_of_comments'] += 1;
        }

        usort($data, function ($a, $b) {
            return $b['total_number_of_comments'] - $a['total_number_of_comments'];
        });

        return $data;
    }

    public function viewPostByID($post_id)
    {
        $url = "https://jsonplaceholder.typicode.com/posts/" . $post_id;
        return json_decode(file_get_contents($url), true);
    }

    public function getCommentsByPostID($post_id)
    {
        $url = "https://jsonplaceholder.typicode.com/comments?postId=" . $post_id;
        return json_decode(file_get_contents($url), true);
    }

}

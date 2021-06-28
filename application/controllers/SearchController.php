<?php
class SearchController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index($data = array())
    {
        $this->load->view('templates/headers.php');
        $this->load->view('SearchInterface', $data);
        $this->load->view('templates/footers.php');
    }

    public function getSearch()
    {
        $query = rawurlencode(trim($this->input->post('query')));
        $filter = rawurlencode(trim($this->input->post('filter')));

        $search_string = "?" . $filter . "=" . $query;

        $url = "https://jsonplaceholder.typicode.com/comments" . $search_string;
        $data['searchs'] = json_decode(file_get_contents($url), true);

        $this->index($data);
    }
}

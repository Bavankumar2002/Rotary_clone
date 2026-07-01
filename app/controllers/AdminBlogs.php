<?php
class AdminBlogs extends Controller {
    private $blogModel;

    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if(!isset($_SESSION['rotary_admin_id'])) {
            header('location: ' . URLROOT . '/admin/login');
            exit;
        }
        $this->blogModel = $this->model('BlogModel');
    }

    public function index() {
        $blogs = $this->blogModel->getBlogs();
        $data = [
            'blogs' => $blogs
        ];
        $this->view('admin/blogs/index', $data);
    }

    public function add() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'title' => trim($_POST['title']),
                'slug' => strtolower(str_replace(' ', '-', trim($_POST['title']))),
                'excerpt' => trim($_POST['excerpt']),
                'content' => trim($_POST['content']),
                'status' => trim($_POST['status'])
            ];

            if($this->blogModel->addBlog($data)) {
                header('location: ' . URLROOT . '/adminblogs');
            } else {
                die('Something went wrong');
            }
        } else {
            $data = [
                'title' => '',
                'excerpt' => '',
                'content' => '',
                'status' => ''
            ];
            $this->view('admin/blogs/add', $data);
        }
    }

    public function delete($id) {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if($this->blogModel->deleteBlog($id)) {
                header('location: ' . URLROOT . '/adminblogs');
            } else {
                die('Something went wrong');
            }
        } else {
            header('location: ' . URLROOT . '/adminblogs');
        }
    }

    public function view($view, $data = []) {
        if (file_exists('../app/views/' . $view . '.php')) {
            require_once '../app/views/layouts/admin.php';
        } else {
            die('View does not exist');
        }
    }
}

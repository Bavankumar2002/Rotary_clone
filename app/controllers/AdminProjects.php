<?php
class AdminProjects extends Controller {
    private $projectModel;

    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if(!isset($_SESSION['rotary_admin_id'])) {
            header('location: ' . URLROOT . '/admin/login');
            exit;
        }
        $this->projectModel = $this->model('ProjectModel');
    }

    public function index() {
        $projects = $this->projectModel->getProjects();
        $data = [
            'projects' => $projects
        ];
        $this->view('admin/projects/index', $data);
    }

    public function add() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'title' => trim($_POST['title']),
                'slug' => strtolower(str_replace(' ', '-', trim($_POST['title']))),
                'description' => trim($_POST['description']),
                'content' => trim($_POST['content']),
                'status' => trim($_POST['status']),
                'image_url' => ''
            ];

            // Handle file upload
            if (!empty($_FILES['image']['name'])) {
                $target_dir = APPROOT . '/public/uploads/';
                if(!is_dir($target_dir)) {
                    mkdir($target_dir, 0755, true);
                }
                $file_name = time() . '_' . basename($_FILES["image"]["name"]);
                $target_file = $target_dir . $file_name;
                
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    $data['image_url'] = URLROOT . '/public/uploads/' . $file_name;
                }
            }

            if($this->projectModel->addProject($data)) {
                header('location: ' . URLROOT . '/adminprojects');
            } else {
                die('Something went wrong');
            }
        } else {
            $data = [
                'title' => '',
                'description' => '',
                'content' => '',
                'status' => '',
                'image_url' => ''
            ];
            $this->view('admin/projects/add', $data);
        }
    }

    public function edit($id) {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $project = $this->projectModel->getProjectById($id);

            $data = [
                'id' => $id,
                'title' => trim($_POST['title']),
                'slug' => strtolower(str_replace(' ', '-', trim($_POST['title']))),
                'description' => trim($_POST['description']),
                'content' => trim($_POST['content']),
                'status' => trim($_POST['status']),
                'image_url' => $project->image_url
            ];

            // Handle file upload
            if (!empty($_FILES['image']['name'])) {
                $target_dir = APPROOT . '/public/uploads/';
                if(!is_dir($target_dir)) {
                    mkdir($target_dir, 0755, true);
                }
                $file_name = time() . '_' . basename($_FILES["image"]["name"]);
                $target_file = $target_dir . $file_name;
                
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    $data['image_url'] = URLROOT . '/public/uploads/' . $file_name;
                }
            }

            if($this->projectModel->updateProject($data)) {
                header('location: ' . URLROOT . '/adminprojects');
            } else {
                die('Something went wrong');
            }
        } else {
            $project = $this->projectModel->getProjectById($id);
            $data = [
                'id' => $project->id,
                'title' => $project->title,
                'description' => $project->description,
                'content' => $project->content,
                'status' => $project->status,
                'image_url' => $project->image_url
            ];
            $this->view('admin/projects/edit', $data);
        }
    }

    public function delete($id) {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if($this->projectModel->deleteProject($id)) {
                header('location: ' . URLROOT . '/adminprojects');
            } else {
                die('Something went wrong');
            }
        } else {
            header('location: ' . URLROOT . '/adminprojects');
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

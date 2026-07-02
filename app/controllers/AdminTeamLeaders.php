<?php
class AdminTeamLeaders extends Controller {
    private $teamLeaderModel;

    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['rotary_admin_id'])) {
            header('Location: ' . URLROOT . '/admin/login');
            exit;
        }
        $this->teamLeaderModel = $this->model('TeamLeaderModel');
    }

    public function index() {
        $leaders = $this->teamLeaderModel->getLeaders();
        $data = [
            'title' => 'Manage Team Leaders',
            'leaders' => $leaders
        ];
        $this->view('admin/team_leaders/index', $data);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'image_url' => '',
                'image_err' => ''
            ];

            if (!empty($_FILES['image']['name'])) {
                $target_dir = APPROOT . '/public/uploads/';
                if(!is_dir($target_dir)) {
                    mkdir($target_dir, 0755, true);
                }
                $file_name = time() . '_leader_' . basename($_FILES["image"]["name"]);
                $target_file = $target_dir . $file_name;
                
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    $data['image_url'] = URLROOT . '/public/uploads/' . $file_name;
                } else {
                    $data['image_err'] = 'Failed to upload image';
                }
            } else {
                $data['image_err'] = 'Please upload an image';
            }

            if (empty($data['image_err'])) {
                $insertData = [
                    'image_url' => $data['image_url'],
                    'name' => '',
                    'role' => '',
                    'display_order' => 0
                ];
                if ($this->teamLeaderModel->addLeader($insertData)) {
                    header('Location: ' . URLROOT . '/adminteamleaders');
                    exit;
                } else {
                    die('Something went wrong');
                }
            } else {
                $data['title'] = 'Add Team Leader Image';
                $this->view('admin/team_leaders/create', $data);
            }
        } else {
            $data = [
                'title' => 'Add Team Leader Image',
                'image_err' => ''
            ];
            $this->view('admin/team_leaders/create', $data);
        }
    }

    public function edit($id) {
        $leader = $this->teamLeaderModel->getLeaderById($id);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'id' => $id,
                'image_url' => $leader->image_url,
                'image_err' => ''
            ];

            if (!empty($_FILES['image']['name'])) {
                $target_dir = APPROOT . '/public/uploads/';
                if(!is_dir($target_dir)) {
                    mkdir($target_dir, 0755, true);
                }
                $file_name = time() . '_leader_' . basename($_FILES["image"]["name"]);
                $target_file = $target_dir . $file_name;
                
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    $data['image_url'] = URLROOT . '/public/uploads/' . $file_name;
                } else {
                    $data['image_err'] = 'Failed to upload image';
                }
            }

            if (empty($data['image_err'])) {
                $updateData = [
                    'id' => $data['id'],
                    'image_url' => $data['image_url'],
                    'name' => '',
                    'role' => '',
                    'display_order' => 0
                ];
                if ($this->teamLeaderModel->updateLeader($updateData)) {
                    header('Location: ' . URLROOT . '/adminteamleaders');
                    exit;
                } else {
                    die('Something went wrong');
                }
            } else {
                $data['title'] = 'Edit Team Leader Image';
                $this->view('admin/team_leaders/edit', $data);
            }
        } else {
            $data = [
                'title' => 'Edit Team Leader Image',
                'id' => $leader->id,
                'image_url' => $leader->image_url,
                'image_err' => ''
            ];
            $this->view('admin/team_leaders/edit', $data);
        }
    }

    public function delete($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->teamLeaderModel->deleteLeader($id)) {
                header('Location: ' . URLROOT . '/adminteamleaders');
                exit;
            } else {
                die('Something went wrong');
            }
        } else {
            header('Location: ' . URLROOT . '/adminteamleaders');
            exit;
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

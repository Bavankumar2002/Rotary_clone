<?php
class Admin extends Controller {
    private $adminModel;

    public function __construct() {
        // Start session if not already started
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $this->adminModel = $this->model('AdminModel');
    }

    public function index() {
        if($this->isLoggedIn()) {
            $this->redirect('admin/dashboard');
        } else {
            $this->view('admin/login');
        }
    }

    public function login() {
        // Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'error' => ''
            ];

            if(empty($data['email']) || empty($data['password'])) {
                $data['error'] = 'Please enter email and password';
            } else {
                if($this->adminModel->findAdminByEmail($data['email'])) {
                    // User found
                    $loggedInUser = $this->adminModel->login($data['email'], $data['password']);

                    if($loggedInUser) {
                        // Create Session
                        $this->createUserSession($loggedInUser);
                    } else {
                        $data['error'] = 'Password incorrect';
                    }
                } else {
                    $data['error'] = 'No user found';
                }
            }

            if(!empty($data['error'])) {
                // Load view with errors
                $this->view('admin/login', $data);
            }
        } else {
            // Init data
            $data = [
                'email' => '',
                'password' => '',
                'error' => ''
            ];
            $this->view('admin/login', $data);
        }
    }

    public function createUserSession($user) {
        $_SESSION['rotary_admin_id'] = $user->id;
        $_SESSION['rotary_admin_email'] = $user->email;
        $_SESSION['rotary_admin_name'] = $user->name;
        $this->redirect('admin/dashboard');
    }

    public function logout() {
        unset($_SESSION['rotary_admin_id']);
        unset($_SESSION['rotary_admin_email']);
        unset($_SESSION['rotary_admin_name']);
        session_destroy();
        $this->redirect('admin/login');
    }

    public function isLoggedIn() {
        if(isset($_SESSION['rotary_admin_id'])) {
            return true;
        } else {
            return false;
        }
    }

    public function dashboard() {
        if(!$this->isLoggedIn()) {
            $this->redirect('admin/login');
        }

        $contactMessageModel = $this->model('ContactMessageModel');
        $recentMessages = $contactMessageModel->getRecentMessages(1);

        $data = [
            'title' => 'Dashboard',
            'recent_messages' => $recentMessages
        ];

        $this->view('admin/dashboard', $data);
    }

    // Helper redirect
    public function redirect($page) {
        header('location: ' . URLROOT . '/' . $page);
        exit;
    }

    // Override view to use admin layout
    public function view($view, $data = []) {
        if (file_exists('../app/views/' . $view . '.php')) {
            // Include admin layout which will then include the specific view
            require_once '../app/views/layouts/admin.php';
        } else {
            die('View does not exist');
        }
    }
}

<?php
class AdminMessages extends Controller {
    private $contactMessageModel;

    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) { session_start(); }
        if(!isset($_SESSION['rotary_admin_id'])) { header('location: ' . URLROOT . '/admin/login'); exit; }
        
        $this->contactMessageModel = $this->model('ContactMessageModel');
    }

    public function index() {
        $messages = $this->contactMessageModel->getMessages();
        
        $data = [
            'messages' => $messages
        ];
        
        $this->view('admin/messages/index', $data);
    }
    
    public function delete($id) {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if($this->contactMessageModel->deleteMessage($id)) {
                // Success
            }
            header('location: ' . URLROOT . '/adminmessages');
        } else {
            header('location: ' . URLROOT . '/adminmessages');
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

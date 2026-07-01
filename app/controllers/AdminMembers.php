<?php
class AdminMembers extends Controller {
    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) { session_start(); }
        if(!isset($_SESSION['rotary_admin_id'])) { header('location: ' . URLROOT . '/admin/login'); exit; }
    }
    public function index() {
        echo "<div class='alert alert-info'>Members Module is currently under development.</div>";
    }
    public function view($view, $data = []) {
        if (file_exists('../app/views/' . $view . '.php')) {
            require_once '../app/views/layouts/admin.php';
        } else { die('View does not exist'); }
    }
}

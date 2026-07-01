<?php
class AdminSettings extends Controller {
    private $db;

    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) { session_start(); }
        if(!isset($_SESSION['rotary_admin_id'])) { header('location: ' . URLROOT . '/admin/login'); exit; }
        
        $this->db = new Database;
    }

    public function index() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            foreach($_POST as $key => $value) {
                // Update setting
                $this->db->query("UPDATE settings SET setting_value = :value WHERE setting_key = :key");
                $this->db->bind(':value', $value);
                $this->db->bind(':key', $key);
                $this->db->execute();
            }

            header('location: ' . URLROOT . '/adminsettings');
        } else {
            $this->db->query("SELECT * FROM settings");
            $settingsData = $this->db->resultSet();
            $settings = [];
            foreach($settingsData as $s) {
                $settings[$s->setting_key] = $s->setting_value;
            }

            $data = [
                'settings' => $settings
            ];

            $this->view('admin/settings/index', $data);
        }
    }

    public function view($view, $data = []) {
        if (file_exists('../app/views/' . $view . '.php')) {
            require_once '../app/views/layouts/admin.php';
        } else { die('View does not exist'); }
    }
}

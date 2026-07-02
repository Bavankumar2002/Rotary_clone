<?php
class AdminAboutSection extends Controller {
    private $db;

    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) { session_start(); }
        if(!isset($_SESSION['rotary_admin_id'])) { header('location: ' . URLROOT . '/admin/login'); exit; }
        
        $this->db = new Database;
    }

    public function index() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $settingsToUpdate = [
                'about_mission' => trim($_POST['about_mission']),
                'about_title' => trim($_POST['about_title'])
            ];

            // Handle file upload for about_image
            if (!empty($_FILES['about_image']['name'])) {
                $target_dir = APPROOT . '/public/uploads/';
                if(!is_dir($target_dir)) {
                    mkdir($target_dir, 0755, true);
                }
                $file_name = time() . '_' . basename($_FILES["about_image"]["name"]);
                $target_file = $target_dir . $file_name;
                
                if (move_uploaded_file($_FILES["about_image"]["tmp_name"], $target_file)) {
                    $settingsToUpdate['about_image'] = URLROOT . '/public/uploads/' . $file_name;
                }
            }

            foreach($settingsToUpdate as $key => $value) {
                $this->db->query("SELECT * FROM settings WHERE setting_key = :key");
                $this->db->bind(':key', $key);
                $row = $this->db->single();

                if($row) {
                    $this->db->query("UPDATE settings SET setting_value = :value WHERE setting_key = :key");
                } else {
                    $this->db->query("INSERT INTO settings (setting_key, setting_value) VALUES (:key, :value)");
                }
                $this->db->bind(':value', $value);
                $this->db->bind(':key', $key);
                $this->db->execute();
            }

            header('location: ' . URLROOT . '/adminaboutsection');
        } else {
            $settings = [
                'about_mission' => '',
                'about_title' => '',
                'about_image' => ''
            ];

            $this->db->query("SELECT * FROM settings WHERE setting_key IN ('about_mission', 'about_title', 'about_image')");
            $settingsData = $this->db->resultSet();
            
            foreach($settingsData as $s) {
                $settings[$s->setting_key] = $s->setting_value;
            }

            $data = [
                'settings' => $settings
            ];

            $this->view('admin/settings/about', $data);
        }
    }

    public function view($view, $data = []) {
        if (file_exists('../app/views/' . $view . '.php')) {
            require_once '../app/views/layouts/admin.php';
        } else { die('View does not exist'); }
    }
}

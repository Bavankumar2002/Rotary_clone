<?php
class AdminGeneralSettings extends Controller {
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
                'site_name' => trim($_POST['site_name']),
                'motto' => trim($_POST['motto']),
                'contact_email' => trim($_POST['contact_email']),
                'contact_phone' => trim($_POST['contact_phone'])
            ];

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

            header('location: ' . URLROOT . '/admingeneralsettings');
        } else {
            $settings = [
                'site_name' => '',
                'motto' => '',
                'contact_email' => '',
                'contact_phone' => ''
            ];

            $this->db->query("SELECT * FROM settings WHERE setting_key IN ('site_name', 'motto', 'contact_email', 'contact_phone')");
            $settingsData = $this->db->resultSet();
            
            foreach($settingsData as $s) {
                $settings[$s->setting_key] = $s->setting_value;
            }

            $data = [
                'settings' => $settings
            ];

            $this->view('admin/settings/general', $data);
        }
    }

    public function view($view, $data = []) {
        if (file_exists('../app/views/' . $view . '.php')) {
            require_once '../app/views/layouts/admin.php';
        } else { die('View does not exist'); }
    }
}

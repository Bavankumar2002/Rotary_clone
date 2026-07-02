<?php
class AdminContact extends Controller {
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
                'contact_banner_subtitle' => trim($_POST['contact_banner_subtitle']),
                'contact_banner_title' => trim($_POST['contact_banner_title']),
                'contact_banner_image' => trim($_POST['contact_banner_image']),
                'contact_section_image' => trim($_POST['contact_section_image']),
                'contact_form_title' => trim($_POST['contact_form_title'])
            ];

            foreach($settingsToUpdate as $key => $value) {
                // Check if setting exists
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

            header('location: ' . URLROOT . '/admincontact');
        } else {
            // Ensure default values exist in array even if not in DB yet
            $settings = [
                'contact_banner_subtitle' => 'JOIN WITH US',
                'contact_banner_title' => 'Connect. Serve. Lead. Become a Rotarian today.',
                'contact_banner_image' => 'https://images.unsplash.com/photo-1573164713988-8665fc963095?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
                'contact_section_image' => 'https://images.unsplash.com/photo-1606811841689-23dfddce3e95?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
                'contact_form_title' => 'Have Questions?<br>Get In Touch!'
            ];

            $this->db->query("SELECT * FROM settings WHERE setting_key IN ('contact_banner_subtitle', 'contact_banner_title', 'contact_banner_image', 'contact_section_image', 'contact_form_title')");
            $settingsData = $this->db->resultSet();
            
            foreach($settingsData as $s) {
                $settings[$s->setting_key] = $s->setting_value;
            }

            $data = [
                'settings' => $settings
            ];

            $this->view('admin/contact/index', $data);
        }
    }

    public function view($view, $data = []) {
        if (file_exists('../app/views/' . $view . '.php')) {
            require_once '../app/views/layouts/admin.php';
        } else { die('View does not exist'); }
    }
}

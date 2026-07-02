<?php
class AdminImpactStats extends Controller {
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
                'stat_projects' => trim($_POST['stat_projects']),
                'stat_years' => trim($_POST['stat_years']),
                'stat_beneficiaries' => trim($_POST['stat_beneficiaries'])
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

            header('location: ' . URLROOT . '/adminimpactstats');
        } else {
            $settings = [
                'stat_projects' => '0',
                'stat_years' => '0',
                'stat_beneficiaries' => '0'
            ];

            $this->db->query("SELECT * FROM settings WHERE setting_key IN ('stat_projects', 'stat_years', 'stat_beneficiaries')");
            $settingsData = $this->db->resultSet();
            
            foreach($settingsData as $s) {
                $settings[$s->setting_key] = $s->setting_value;
            }

            $data = [
                'settings' => $settings
            ];

            $this->view('admin/settings/stats', $data);
        }
    }

    public function view($view, $data = []) {
        if (file_exists('../app/views/' . $view . '.php')) {
            require_once '../app/views/layouts/admin.php';
        } else { die('View does not exist'); }
    }
}

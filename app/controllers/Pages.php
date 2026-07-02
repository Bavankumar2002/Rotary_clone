<?php
class Pages extends Controller {
    private $projectModel;

    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) { session_start(); }
        $this->projectModel = $this->model('ProjectModel');
    }

    public function index() {
        // Fetch CMS Data
        require_once '../app/models/BannerModel.php';
        $bannerModel = new BannerModel();
        $banners = $bannerModel->getActiveBanners();
        
        $projects = $this->projectModel->getProjects();
        // Since we didn't build EventModel and GalleryModel yet, we'll pass empty arrays or mock data for now.
        // If they exist, this will use them. Let's just create a generic db query for settings.
        
        $db = new Database();
        $db->query("SELECT * FROM settings");
        $settingsData = $db->resultSet();
        $settings = [];
        foreach($settingsData as $s) {
            $settings[$s->setting_key] = $s->setting_value;
        }

        $db->query("SELECT * FROM events ORDER BY event_date DESC LIMIT 4");
        $events = $db->resultSet();

        $db->query("SELECT * FROM gallery ORDER BY created_at DESC LIMIT 8");
        $gallery = $db->resultSet();

        $db->query("SELECT * FROM team_leaders ORDER BY display_order ASC, id DESC");
        $team_leaders = $db->resultSet();

        $data = [
            'title' => 'Rotary Club of Madurai - Single Page',
            'settings' => $settings,
            'banners' => $banners,
            'projects' => $projects,
            'events' => $events,
            'gallery' => $gallery,
            'team_leaders' => $team_leaders
        ];
        
        $this->view('home/index', $data);
    }

    public function submitContact() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [
                'first_name' => trim($_POST['first_name'] ?? ''),
                'last_name' => trim($_POST['last_name'] ?? ''),
                'email' => trim($_POST['email'] ?? ''),
                'phone' => trim($_POST['phone'] ?? ''),
                'message' => trim($_POST['message'] ?? '')
            ];
            
            if(!empty($data['first_name']) && !empty($data['email']) && !empty($data['message'])) {
                $contactModel = $this->model('ContactMessageModel');
                if($contactModel->addMessage($data)) {
                    if (session_status() === PHP_SESSION_NONE) { session_start(); }
                    $_SESSION['contact_success'] = 'Thank you for reaching out! We will get back to you soon.';
                }
            }
            
            header('location: ' . URLROOT . '/#contact');
            exit;
        } else {
            header('location: ' . URLROOT);
            exit;
        }
    }
}

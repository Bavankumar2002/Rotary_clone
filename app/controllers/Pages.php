<?php
class Pages extends Controller {
    private $projectModel;

    public function __construct() {
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

        $db->query("SELECT * FROM events ORDER BY event_date DESC LIMIT 3");
        $events = $db->resultSet();

        $db->query("SELECT * FROM gallery ORDER BY created_at DESC LIMIT 8");
        $gallery = $db->resultSet();

        $data = [
            'title' => 'Rotary Club of Madurai - Single Page',
            'settings' => $settings,
            'banners' => $banners,
            'projects' => $projects,
            'events' => $events,
            'gallery' => $gallery
        ];
        
        $this->view('home/index', $data);
    }
}

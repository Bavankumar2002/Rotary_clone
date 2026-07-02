<?php
class AdminBanners extends Controller {
    private $bannerModel;

    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['rotary_admin_id'])) {
            header('Location: ' . URLROOT . '/admin/login');
            exit;
        }
        $this->bannerModel = $this->model('BannerModel');
    }

    public function index() {
        // Fetch hero settings
        $db = new Database;
        $settings = ['hero_title' => '', 'hero_subtitle' => ''];
        $db->query("SELECT * FROM settings WHERE setting_key IN ('hero_title', 'hero_subtitle')");
        $settingsData = $db->resultSet();
        foreach($settingsData as $s) {
            $settings[$s->setting_key] = $s->setting_value;
        }

        $banners = $this->bannerModel->getBanners();
        $data = [
            'title' => 'Manage Banners & Hero Section',
            'banners' => $banners,
            'settings' => $settings
        ];
        $this->view('admin/banners/index', $data);
    }

    public function updateHero() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $db = new Database;
            
            $settingsToUpdate = [
                'hero_title' => trim($_POST['hero_title']),
                'hero_subtitle' => trim($_POST['hero_subtitle'])
            ];

            foreach($settingsToUpdate as $key => $value) {
                $db->query("SELECT * FROM settings WHERE setting_key = :key");
                $db->bind(':key', $key);
                $row = $db->single();

                if($row) {
                    $db->query("UPDATE settings SET setting_value = :value WHERE setting_key = :key");
                } else {
                    $db->query("INSERT INTO settings (setting_key, setting_value) VALUES (:key, :value)");
                }
                $db->bind(':value', $value);
                $db->bind(':key', $key);
                $db->execute();
            }
            header('Location: ' . URLROOT . '/adminbanners');
            exit;
        }
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'title_input' => trim($_POST['title']),
                'subtitle' => trim($_POST['subtitle']),
                'link_url' => trim($_POST['link_url']),
                'display_order' => trim($_POST['display_order']),
                'status' => trim($_POST['status']),
                'image_url' => '',
                'title_err' => '',
                'image_err' => ''
            ];

            if (empty($data['title_input'])) {
                $data['title_err'] = 'Please enter title';
            }

            if (!empty($_FILES['image']['name'])) {
                $target_dir = APPROOT . '/public/uploads/';
                if(!is_dir($target_dir)) {
                    mkdir($target_dir, 0755, true);
                }
                $file_name = time() . '_' . basename($_FILES["image"]["name"]);
                $target_file = $target_dir . $file_name;
                
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    $data['image_url'] = URLROOT . '/public/uploads/' . $file_name;
                } else {
                    $data['image_err'] = 'Failed to upload image';
                }
            } else {
                $data['image_err'] = 'Please upload an image';
            }

            if (empty($data['title_err']) && empty($data['image_err'])) {
                $insertData = [
                    'image_url' => $data['image_url'],
                    'title' => $data['title_input'],
                    'subtitle' => $data['subtitle'],
                    'link_url' => $data['link_url'],
                    'display_order' => $data['display_order'] ?: 0,
                    'status' => $data['status']
                ];
                if ($this->bannerModel->addBanner($insertData)) {
                    header('Location: ' . URLROOT . '/adminbanners');
                    exit;
                } else {
                    die('Something went wrong');
                }
            } else {
                $data['title'] = 'Add Banner';
                $this->view('admin/banners/create', $data);
            }
        } else {
            $data = [
                'title' => 'Add Banner',
                'title_input' => '',
                'subtitle' => '',
                'link_url' => '',
                'display_order' => 0,
                'status' => 'Active',
                'title_err' => '',
                'image_err' => ''
            ];
            $this->view('admin/banners/create', $data);
        }
    }

    public function edit($id) {
        $banner = $this->bannerModel->getBannerById($id);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'id' => $id,
                'title_input' => trim($_POST['title']),
                'subtitle' => trim($_POST['subtitle']),
                'link_url' => trim($_POST['link_url']),
                'display_order' => trim($_POST['display_order']),
                'status' => trim($_POST['status']),
                'image_url' => $banner->image_url,
                'title_err' => '',
                'image_err' => ''
            ];

            if (empty($data['title_input'])) {
                $data['title_err'] = 'Please enter title';
            }

            if (!empty($_FILES['image']['name'])) {
                $target_dir = APPROOT . '/public/uploads/';
                if(!is_dir($target_dir)) {
                    mkdir($target_dir, 0755, true);
                }
                $file_name = time() . '_' . basename($_FILES["image"]["name"]);
                $target_file = $target_dir . $file_name;
                
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    $data['image_url'] = URLROOT . '/public/uploads/' . $file_name;
                } else {
                    $data['image_err'] = 'Failed to upload image';
                }
            }

            if (empty($data['title_err']) && empty($data['image_err'])) {
                $updateData = [
                    'id' => $data['id'],
                    'image_url' => $data['image_url'],
                    'title' => $data['title_input'],
                    'subtitle' => $data['subtitle'],
                    'link_url' => $data['link_url'],
                    'display_order' => $data['display_order'] ?: 0,
                    'status' => $data['status']
                ];
                if ($this->bannerModel->updateBanner($updateData)) {
                    header('Location: ' . URLROOT . '/adminbanners');
                    exit;
                } else {
                    die('Something went wrong');
                }
            } else {
                $data['title'] = 'Edit Banner';
                $this->view('admin/banners/edit', $data);
            }
        } else {
            $data = [
                'title' => 'Edit Banner',
                'id' => $banner->id,
                'title_input' => $banner->title,
                'subtitle' => $banner->subtitle,
                'link_url' => $banner->link_url,
                'display_order' => $banner->display_order,
                'status' => $banner->status,
                'image_url' => $banner->image_url,
                'title_err' => '',
                'image_err' => ''
            ];
            $this->view('admin/banners/edit', $data);
        }
    }

    public function delete($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->bannerModel->deleteBanner($id)) {
                header('Location: ' . URLROOT . '/adminbanners');
                exit;
            } else {
                die('Something went wrong');
            }
        } else {
            header('Location: ' . URLROOT . '/adminbanners');
            exit;
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

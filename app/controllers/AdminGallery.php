<?php
class AdminGallery extends Controller {
    private $galleryModel;

    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['rotary_admin_id'])) {
            header('Location: ' . URLROOT . '/admin/login');
            exit;
        }
        $this->galleryModel = $this->model('GalleryModel');
    }

    public function index() {
        $gallery = $this->galleryModel->getGallery();
        $data = [
            'title' => 'Manage Gallery',
            'gallery' => $gallery
        ];
        $this->view('admin/gallery/index', $data);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'title_input' => trim($_POST['title']),
                'category' => trim($_POST['category']),
                'image_url' => '',
                'title_err' => '',
                'image_err' => ''
            ];

            if (empty($data['title_input'])) {
                $data['title_err'] = 'Please enter a title';
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
                    'category' => $data['category']
                ];
                if ($this->galleryModel->addGalleryItem($insertData)) {
                    header('Location: ' . URLROOT . '/admingallery');
                    exit;
                } else {
                    die('Something went wrong');
                }
            } else {
                $data['title'] = 'Add Gallery Item';
                $this->view('admin/gallery/create', $data);
            }
        } else {
            $data = [
                'title' => 'Add Gallery Item',
                'title_input' => '',
                'category' => '',
                'title_err' => '',
                'image_err' => ''
            ];
            $this->view('admin/gallery/create', $data);
        }
    }

    public function edit($id) {
        $galleryItem = $this->galleryModel->getGalleryItemById($id);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'id' => $id,
                'title_input' => trim($_POST['title']),
                'category' => trim($_POST['category']),
                'image_url' => $galleryItem->image_url,
                'title_err' => '',
                'image_err' => ''
            ];

            if (empty($data['title_input'])) {
                $data['title_err'] = 'Please enter a title';
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
                    'category' => $data['category']
                ];
                if ($this->galleryModel->updateGalleryItem($updateData)) {
                    header('Location: ' . URLROOT . '/admingallery');
                    exit;
                } else {
                    die('Something went wrong');
                }
            } else {
                $data['title'] = 'Edit Gallery Item';
                $this->view('admin/gallery/edit', $data);
            }
        } else {
            $data = [
                'title' => 'Edit Gallery Item',
                'id' => $galleryItem->id,
                'title_input' => $galleryItem->title,
                'category' => $galleryItem->category,
                'image_url' => $galleryItem->image_url,
                'title_err' => '',
                'image_err' => ''
            ];
            $this->view('admin/gallery/edit', $data);
        }
    }

    public function delete($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->galleryModel->deleteGalleryItem($id)) {
                header('Location: ' . URLROOT . '/admingallery');
                exit;
            } else {
                die('Something went wrong');
            }
        } else {
            header('Location: ' . URLROOT . '/admingallery');
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

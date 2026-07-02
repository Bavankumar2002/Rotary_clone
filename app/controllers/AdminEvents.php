<?php
class AdminEvents extends Controller {
    private $eventModel;

    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['rotary_admin_id'])) {
            header('Location: ' . URLROOT . '/admin/login');
            exit;
        }
        $this->eventModel = $this->model('EventModel');
    }

    public function index() {
        $events = $this->eventModel->getEvents();
        $data = [
            'title' => 'Manage Events',
            'events' => $events
        ];
        $this->view('admin/events/index', $data);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'title_input' => trim($_POST['title']),
                'description' => trim($_POST['description']),
                'content' => trim($_POST['content']),
                'event_date' => trim($_POST['event_date']),
                'location' => trim($_POST['location']),
                'image_url' => '',
                'title_err' => '',
                'date_err' => '',
                'image_err' => ''
            ];

            if (empty($data['title_input'])) {
                $data['title_err'] = 'Please enter a title';
            }

            if (empty($data['event_date'])) {
                $data['date_err'] = 'Please select an event date';
            }

            // Image Upload
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

            if (empty($data['title_err']) && empty($data['date_err']) && empty($data['image_err'])) {
                $slug = strtolower(str_replace(' ', '-', trim($_POST['title']))) . '-' . time();
                $insertData = [
                    'title' => $data['title_input'],
                    'slug' => $slug,
                    'description' => $data['description'],
                    'content' => $data['content'],
                    'event_date' => $data['event_date'],
                    'location' => $data['location'],
                    'image_url' => $data['image_url']
                ];
                if ($this->eventModel->addEvent($insertData)) {
                    header('Location: ' . URLROOT . '/adminevents');
                    exit;
                } else {
                    die('Something went wrong');
                }
            } else {
                $data['title'] = 'Add Event';
                $this->view('admin/events/create', $data);
            }
        } else {
            $data = [
                'title' => 'Add Event',
                'title_input' => '',
                'description' => '',
                'content' => '',
                'event_date' => '',
                'location' => '',
                'image_url' => '',
                'title_err' => '',
                'date_err' => '',
                'image_err' => ''
            ];
            $this->view('admin/events/create', $data);
        }
    }

    public function edit($id) {
        $event = $this->eventModel->getEventById($id);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'id' => $id,
                'title_input' => trim($_POST['title']),
                'description' => trim($_POST['description']),
                'content' => trim($_POST['content']),
                'event_date' => trim($_POST['event_date']),
                'location' => trim($_POST['location']),
                'image_url' => $event->image_url,
                'title_err' => '',
                'date_err' => '',
                'image_err' => ''
            ];

            if (empty($data['title_input'])) {
                $data['title_err'] = 'Please enter a title';
            }

            if (empty($data['event_date'])) {
                $data['date_err'] = 'Please select an event date';
            }

            // Image Upload
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

            if (empty($data['title_err']) && empty($data['date_err']) && empty($data['image_err'])) {
                $slug = strtolower(str_replace(' ', '-', trim($_POST['title']))) . '-' . $id;
                $updateData = [
                    'id' => $id,
                    'title' => $data['title_input'],
                    'slug' => $slug,
                    'description' => $data['description'],
                    'content' => $data['content'],
                    'event_date' => $data['event_date'],
                    'location' => $data['location'],
                    'image_url' => $data['image_url']
                ];
                if ($this->eventModel->updateEvent($updateData)) {
                    header('Location: ' . URLROOT . '/adminevents');
                    exit;
                } else {
                    die('Something went wrong');
                }
            } else {
                $data['title'] = 'Edit Event';
                $this->view('admin/events/edit', $data);
            }
        } else {
            // Convert DATETIME from MySQL format to datetime-local input format
            $eventDateFormatted = '';
            if (!empty($event->event_date)) {
                $eventDateFormatted = date('Y-m-d\TH:i', strtotime($event->event_date));
            }

            $data = [
                'title' => 'Edit Event',
                'id' => $event->id,
                'title_input' => $event->title,
                'description' => $event->description,
                'content' => $event->content,
                'event_date' => $eventDateFormatted,
                'location' => $event->location,
                'image_url' => $event->image_url,
                'title_err' => '',
                'date_err' => '',
                'image_err' => ''
            ];
            $this->view('admin/events/edit', $data);
        }
    }

    public function delete($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->eventModel->deleteEvent($id)) {
                header('Location: ' . URLROOT . '/adminevents');
                exit;
            } else {
                die('Something went wrong');
            }
        } else {
            header('Location: ' . URLROOT . '/adminevents');
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

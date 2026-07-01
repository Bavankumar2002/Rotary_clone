<?php
class Controller {
    // Load model
    public function model($model) {
        require_once '../app/models/' . $model . '.php';
        return new $model();
    }

    // Load view
    public function view($view, $data = []) {
        if (file_exists('../app/views/' . $view . '.php')) {
            // Include main layout which will then include the specific view
            require_once '../app/views/layouts/main.php';
        } else {
            die('View does not exist');
        }
    }
}

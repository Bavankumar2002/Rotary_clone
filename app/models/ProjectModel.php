<?php
class ProjectModel {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getProjects() {
        $this->db->query('SELECT * FROM projects ORDER BY created_at DESC');
        return $this->db->resultSet();
    }

    public function addProject($data) {
        $this->db->query('INSERT INTO projects (title, slug, description, content, status) VALUES(:title, :slug, :description, :content, :status)');
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':slug', $data['slug']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':content', $data['content']);
        $this->db->bind(':status', $data['status']);

        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteProject($id) {
        $this->db->query('DELETE FROM projects WHERE id = :id');
        $this->db->bind(':id', $id);

        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}

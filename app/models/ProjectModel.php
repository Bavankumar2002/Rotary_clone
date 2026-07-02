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
        $this->db->query('INSERT INTO projects (title, slug, description, content, status, image_url) VALUES(:title, :slug, :description, :content, :status, :image_url)');
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':slug', $data['slug']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':content', $data['content']);
        $this->db->bind(':status', $data['status']);
        $this->db->bind(':image_url', $data['image_url']);

        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    public function getProjectById($id) {
        $this->db->query('SELECT * FROM projects WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function updateProject($data) {
        $this->db->query('UPDATE projects SET title = :title, slug = :slug, description = :description, content = :content, status = :status, image_url = :image_url WHERE id = :id');
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':slug', $data['slug']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':content', $data['content']);
        $this->db->bind(':status', $data['status']);
        $this->db->bind(':image_url', $data['image_url']);

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

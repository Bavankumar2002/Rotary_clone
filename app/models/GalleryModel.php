<?php
class GalleryModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getGallery() {
        $this->db->query("SELECT * FROM gallery ORDER BY created_at DESC");
        return $this->db->resultSet();
    }

    public function getGalleryItemById($id) {
        $this->db->query("SELECT * FROM gallery WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function addGalleryItem($data) {
        $this->db->query("INSERT INTO gallery (image_url, title, category) VALUES (:image_url, :title, :category)");
        
        $this->db->bind(':image_url', $data['image_url']);
        $this->db->bind(':title', $data['title'] ?? null);
        $this->db->bind(':category', $data['category'] ?? null);

        return $this->db->execute();
    }

    public function updateGalleryItem($data) {
        $this->db->query("UPDATE gallery SET image_url = :image_url, title = :title, category = :category WHERE id = :id");
        
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':image_url', $data['image_url']);
        $this->db->bind(':title', $data['title'] ?? null);
        $this->db->bind(':category', $data['category'] ?? null);

        return $this->db->execute();
    }

    public function deleteGalleryItem($id) {
        $this->db->query("DELETE FROM gallery WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
}

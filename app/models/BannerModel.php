<?php
class BannerModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getBanners() {
        $this->db->query("SELECT * FROM banners ORDER BY display_order ASC, created_at DESC");
        return $this->db->resultSet();
    }

    public function getActiveBanners() {
        $this->db->query("SELECT * FROM banners WHERE status = 'Active' ORDER BY display_order ASC, created_at DESC");
        return $this->db->resultSet();
    }

    public function getBannerById($id) {
        $this->db->query("SELECT * FROM banners WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function addBanner($data) {
        $this->db->query("INSERT INTO banners (image_url, title, subtitle, link_url, display_order, status) VALUES (:image_url, :title, :subtitle, :link_url, :display_order, :status)");
        
        $this->db->bind(':image_url', $data['image_url']);
        $this->db->bind(':title', $data['title'] ?? null);
        $this->db->bind(':subtitle', $data['subtitle'] ?? null);
        $this->db->bind(':link_url', $data['link_url'] ?? null);
        $this->db->bind(':display_order', $data['display_order'] ?? 0);
        $this->db->bind(':status', $data['status'] ?? 'Active');

        return $this->db->execute();
    }

    public function updateBanner($data) {
        $this->db->query("UPDATE banners SET image_url = :image_url, title = :title, subtitle = :subtitle, link_url = :link_url, display_order = :display_order, status = :status WHERE id = :id");
        
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':image_url', $data['image_url']);
        $this->db->bind(':title', $data['title'] ?? null);
        $this->db->bind(':subtitle', $data['subtitle'] ?? null);
        $this->db->bind(':link_url', $data['link_url'] ?? null);
        $this->db->bind(':display_order', $data['display_order'] ?? 0);
        $this->db->bind(':status', $data['status'] ?? 'Active');

        return $this->db->execute();
    }

    public function deleteBanner($id) {
        $this->db->query("DELETE FROM banners WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
}

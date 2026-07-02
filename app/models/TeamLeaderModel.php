<?php
class TeamLeaderModel {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getLeaders() {
        $this->db->query('SELECT * FROM team_leaders ORDER BY display_order ASC, id DESC');
        return $this->db->resultSet();
    }

    public function getLeaderById($id) {
        $this->db->query('SELECT * FROM team_leaders WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function addLeader($data) {
        $this->db->query('INSERT INTO team_leaders (name, role, image_url, display_order) VALUES (:name, :role, :image_url, :display_order)');
        
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':role', $data['role']);
        $this->db->bind(':image_url', $data['image_url']);
        $this->db->bind(':display_order', $data['display_order']);

        return $this->db->execute();
    }

    public function updateLeader($data) {
        $this->db->query('UPDATE team_leaders SET name = :name, role = :role, image_url = :image_url, display_order = :display_order WHERE id = :id');
        
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':role', $data['role']);
        $this->db->bind(':image_url', $data['image_url']);
        $this->db->bind(':display_order', $data['display_order']);

        return $this->db->execute();
    }

    public function deleteLeader($id) {
        $this->db->query('DELETE FROM team_leaders WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
}

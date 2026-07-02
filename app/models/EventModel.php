<?php
class EventModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getEvents() {
        $this->db->query("SELECT * FROM events ORDER BY event_date ASC, created_at DESC");
        return $this->db->resultSet();
    }

    public function getEventById($id) {
        $this->db->query("SELECT * FROM events WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function addEvent($data) {
        $this->db->query("INSERT INTO events (title, slug, description, content, event_date, location, image_url) VALUES (:title, :slug, :description, :content, :event_date, :location, :image_url)");
        
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':slug', $data['slug']);
        $this->db->bind(':description', $data['description'] ?? null);
        $this->db->bind(':content', $data['content'] ?? null);
        $this->db->bind(':event_date', $data['event_date']);
        $this->db->bind(':location', $data['location'] ?? null);
        $this->db->bind(':image_url', $data['image_url'] ?? null);

        return $this->db->execute();
    }

    public function updateEvent($data) {
        $this->db->query("UPDATE events SET title = :title, slug = :slug, description = :description, content = :content, event_date = :event_date, location = :location, image_url = :image_url WHERE id = :id");
        
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':slug', $data['slug']);
        $this->db->bind(':description', $data['description'] ?? null);
        $this->db->bind(':content', $data['content'] ?? null);
        $this->db->bind(':event_date', $data['event_date']);
        $this->db->bind(':location', $data['location'] ?? null);
        $this->db->bind(':image_url', $data['image_url'] ?? null);

        return $this->db->execute();
    }

    public function deleteEvent($id) {
        $this->db->query("DELETE FROM events WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
}

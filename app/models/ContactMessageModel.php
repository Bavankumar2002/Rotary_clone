<?php
class ContactMessageModel {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function addMessage($data) {
        $this->db->query('INSERT INTO contact_messages (first_name, last_name, email, phone, message) VALUES(:first_name, :last_name, :email, :phone, :message)');
        
        $this->db->bind(':first_name', $data['first_name']);
        $this->db->bind(':last_name', $data['last_name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':phone', $data['phone']);
        $this->db->bind(':message', $data['message']);

        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function getMessages() {
        $this->db->query('SELECT * FROM contact_messages ORDER BY created_at DESC');
        return $this->db->resultSet();
    }
    
    public function deleteMessage($id) {
        $this->db->query('DELETE FROM contact_messages WHERE id = :id');
        $this->db->bind(':id', $id);
        
        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}

<?php
class BlogModel {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getBlogs() {
        $this->db->query('SELECT blogs.*, admins.name as author_name FROM blogs LEFT JOIN admins ON blogs.author_id = admins.id ORDER BY blogs.created_at DESC');
        return $this->db->resultSet();
    }

    public function addBlog($data) {
        $this->db->query('INSERT INTO blogs (title, slug, excerpt, content, status, author_id) VALUES(:title, :slug, :excerpt, :content, :status, :author_id)');
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':slug', $data['slug']);
        $this->db->bind(':excerpt', $data['excerpt']);
        $this->db->bind(':content', $data['content']);
        $this->db->bind(':status', $data['status']);
        $this->db->bind(':author_id', $_SESSION['admin_id']);

        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteBlog($id) {
        $this->db->query('DELETE FROM blogs WHERE id = :id');
        $this->db->bind(':id', $id);

        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}

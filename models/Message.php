<?php
class Message {
    private $conn;
    private $table_name = "messages";

    public $id;
    public $text;
    public $created_at;
    public $user_id;
    public $image;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function send($text, $user_id, $image_path = null) {
        $query = "INSERT INTO " . $this->table_name . " (text, created_at, user_id, image) VALUES (:text, NOW(), :user_id, :image)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':text', $text);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':image', $image_path);

        return $stmt->execute();
    }

    public function getLastMessages() {
        $query = "SELECT messages.*, users.name as user_name FROM " . $this->table_name . " 
                  JOIN users ON messages.user_id = users.id 
                  ORDER BY messages.created_at DESC LIMIT 20";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteMessage($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>

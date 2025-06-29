<?php
class Gallery {
    private $conn;
    private $table_name = "gallery";

    public $id;
    public $image_url;
    public $created_at;
    public $updated_at;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY created_at ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . "
                SET
                    image_url = :image_url,
                    created_at = NOW()";

        $stmt = $this->conn->prepare($query);

        $this->image_url = htmlspecialchars(strip_tags($this->image_url));

        $stmt->bindParam(":image_url", $this->image_url);

        return $stmt->execute();
    }

    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        return $stmt->execute();
    }

    public function update() {
        $query = "UPDATE " . $this->table_name . "
                SET
                    image_url = :image_url,
                    updated_at = NOW()
                WHERE
                    id = :id";

        $stmt = $this->conn->prepare($query);

        $this->image_url = htmlspecialchars(strip_tags($this->image_url));
        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(":image_url", $this->image_url);
        $stmt->bindParam(":id", $this->id);

        return $stmt->execute();
    }  
}
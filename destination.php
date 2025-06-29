<?php
class Destination {
    private $conn;
    private $table_name = "destinations";

    public $id;
    public $name;
    public $description;
    public $location;
    public $image_url;
    public $created_at;
    public $updated_at;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Read all destinations
    public function read() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Read single destination by ID
    public function readOne() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $this->name = $row['name'];
            $this->description = $row['description'];
            $this->location = $row['location'];
            $this->image_url = $row['image_url'];
            $this->created_at = $row['created_at'];
            $this->updated_at = $row['updated_at'];
            return true;
        }
        return false;
    }

    // Create a new destination
    public function create() {
        $query = "INSERT INTO " . $this->table_name . "
                SET
                    name = :name,
                    description = :description,
                    location = :location,
                    image_url = :image_url";

        $stmt = $this->conn->prepare($query);

        // Sanitize input
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->location = htmlspecialchars(strip_tags($this->location));
        $this->image_url = htmlspecialchars(strip_tags($this->image_url));

        // Bind values
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":location", $this->location);
        $stmt->bindParam(":image_url", $this->image_url);

        return $stmt->execute();
    }

    // Update a destination
    public function update() {
        $query = "UPDATE " . $this->table_name . "
                SET
                    name = :name,
                    description = :description,
                    location = :location,
                    image_url = :image_url
                WHERE
                    id = :id";

        $stmt = $this->conn->prepare($query);

        // Sanitize input
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->location = htmlspecialchars(strip_tags($this->location));
        $this->image_url = htmlspecialchars(strip_tags($this->image_url));
        $this->id = htmlspecialchars(strip_tags($this->id));

        // Bind values
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":location", $this->location);
        $stmt->bindParam(":image_url", $this->image_url);
        $stmt->bindParam(":id", $this->id);

        return $stmt->execute();
    }

    // Delete a destination
    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        $this->id = htmlspecialchars(strip_tags($this->id));
        $stmt->bindParam(1, $this->id);

        return $stmt->execute();
    }
}

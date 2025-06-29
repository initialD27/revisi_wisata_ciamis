<?php
class About {
    private $conn;
    private $table_name = "about";

    public $id;
    public $nama_kota;
    public $deskripsi;
    public $foto;
    public $created_at;
    public $updated_at;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function readOne() {
        $query = "SELECT id, nama_kota, deskripsi, foto FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if($row) {
            $this->nama_kota = $row['nama_kota'];
            $this->deskripsi = $row['deskripsi'];
            $this->foto = $row['foto'];
        }
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . "
                SET
                    nama_kota = :nama_kota,
                    deskripsi = :deskripsi,
                    foto = :foto";

        $stmt = $this->conn->prepare($query);

        $this->nama_kota = htmlspecialchars(strip_tags($this->nama_kota));
        $this->deskripsi = htmlspecialchars(strip_tags($this->deskripsi));
        $this->foto = htmlspecialchars(strip_tags($this->foto));

        $stmt->bindParam(":nama_kota", $this->nama_kota);
        $stmt->bindParam(":deskripsi", $this->deskripsi);
        $stmt->bindParam(":foto", $this->foto);

        return $stmt->execute();
    }

    public function update() {
        $query = "UPDATE " . $this->table_name . "
                SET
                    nama_kota = :nama_kota,
                    deskripsi = :deskripsi,
                    foto = :foto
                WHERE
                    id = :id";

        $stmt = $this->conn->prepare($query);

        $this->nama_kota = htmlspecialchars(strip_tags($this->nama_kota));
        $this->deskripsi = htmlspecialchars(strip_tags($this->deskripsi));
        $this->foto = htmlspecialchars(strip_tags($this->foto));
        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(":nama_kota", $this->nama_kota);
        $stmt->bindParam(":deskripsi", $this->deskripsi);
        $stmt->bindParam(":foto", $this->foto);
        $stmt->bindParam(":id", $this->id);

        return $stmt->execute();
    }

    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        return $stmt->execute();
    }
}
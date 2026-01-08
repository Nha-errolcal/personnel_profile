<?php
require_once __DIR__ . '/../core/Database.php';

class Clubs
{
    private PDO $conn;

    public function __construct()
    {
        $this->conn = Database::getConnection();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM clubs ORDER BY id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id)
    {
        $sql = "SELECT * FROM clubs WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function store($club_name, $role_name, $status)
    {
        $sql = "INSERT INTO clubs (club_name, role_name, status, created_at)
                VALUES (:club_name, :role_name, :status, NOW())";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":club_name", $club_name);
        $stmt->bindParam(":role_name", $role_name);
        $stmt->bindParam(":status", $status, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function update($id, $club_name, $role_name, $status)
    {
        $sql = "UPDATE clubs SET club_name = :club_name, role_name = :role_name, status = :status, updated_at = NOW()
                WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->bindParam(":club_name", $club_name);
        $stmt->bindParam(":role_name", $role_name);
        $stmt->bindParam(":status", $status, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM clubs WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}

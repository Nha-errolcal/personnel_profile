<?php

require_once __DIR__ . '/../core/Database.php';

class Academic extends Database
{
    private $conn;

    public function __construct()
    {
        $this->conn = Database::getConnection();
    }

    public function addAcademic($education_id, $achievement_name, $achievement_type, $year, $status)
    {
        $sql = "INSERT INTO academics (education_id, achievement_name, achievement_type, year, status) 
                VALUES (:education_id, :achievement_name, :achievement_type, :year, :status)";
        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':education_id', $education_id);
        $stmt->bindParam(':achievement_name', $achievement_name);
        $stmt->bindParam(':achievement_type', $achievement_type);
        $stmt->bindParam(':year', $year);
        $stmt->bindParam(':status', $status);

        return $stmt->execute();
    }

    public function getAllAcademics()
    {
        $sql = "SELECT * FROM academics ORDER BY id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAcademicById($id)
    {
        $sql = "SELECT * FROM academics WHERE id = :id LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateAcademic($id, $education_id, $achievement_name, $achievement_type, $year, $status)
    {
        $sql = "UPDATE academics SET 
                    education_id = :education_id,
                    achievement_name = :achievement_name,
                    achievement_type = :achievement_type,
                    year = :year,
                    status = :status,
                    updated_at = :updated_at
                WHERE id = :id";
        $stmt = $this->conn->prepare($sql);

        $updated_at = date("Y-m-d H:i:s");

        $stmt->bindParam(':education_id', $education_id);
        $stmt->bindParam(':achievement_name', $achievement_name);
        $stmt->bindParam(':achievement_type', $achievement_type);
        $stmt->bindParam(':year', $year);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':updated_at', $updated_at);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }


    public function deleteAcademic($id)
    {
        $sql = "DELETE FROM academics WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
?>
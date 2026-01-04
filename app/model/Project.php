<?php
require_once __DIR__ . '/../core/Database.php';
class Project extends Database
{
    public function __construct()
    {
        Database::getConnection();
    }

    public function getProjectsAll(){
        $conn = Database::getConnection();
        $stmt = $conn->prepare("SELECT * FROM projects ORDER BY id DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProject($id){
        $conn = Database::getConnection();
        $stmt = $conn->prepare("SELECT * FROM projects WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addProject($project_name,$type_project,$description,$technologies,$url_source_code,$demo_url,$icon_class,$status){
        $conn = Database::getConnection();
        $stmt = $conn->prepare("INSERT INTO projects (project_name, type_project, description, technologies, url_source_code, demo_url, icon_class, status) VALUES (:project_name, :type_project, :description, :technologies, :url_source_code, :demo_url, :icon_class, :status)");
        $stmt->bindParam(':project_name', $project_name, PDO::PARAM_STR);
        $stmt->bindParam(':type_project', $type_project, PDO::PARAM_STR);
        $stmt->bindParam(':description', $description, PDO::PARAM_STR);
        $stmt->bindParam(':technologies', $technologies, PDO::PARAM_STR);
        $stmt->bindParam(':url_source_code', $url_source_code, PDO::PARAM_STR);
        $stmt->bindParam(':demo_url', $demo_url, PDO::PARAM_STR);
        $stmt->bindParam(':icon_class', $icon_class, PDO::PARAM_STR);
        $stmt->bindParam(':status', $status, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function projectUpdate($id, $project_name,$type_project,$description,$technologies,$url_source_code,$demo_url,$icon_class,$status){
        $conn = Database::getConnection();
        $stmt = $conn->prepare("UPDATE projects SET project_name = :project_name, type_project = :type_project, description = :description, technologies = :technologies, url_source_code = :url_source_code, demo_url = :demo_url, icon_class = :icon_class, status = :status WHERE id = :id");
        $stmt->bindParam(':project_name', $project_name, PDO::PARAM_STR);
        $stmt->bindParam(':type_project', $type_project, PDO::PARAM_STR);
        $stmt->bindParam(':description', $description, PDO::PARAM_STR);
        $stmt->bindParam(':technologies', $technologies, PDO::PARAM_STR);
        $stmt->bindParam(':url_source_code', $url_source_code, PDO::PARAM_STR);
        $stmt->bindParam(':demo_url', $demo_url, PDO::PARAM_STR);
        $stmt->bindParam(':icon_class', $icon_class, PDO::PARAM_STR);
        $stmt->bindParam(':status', $status, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function projectDelete($id){
        $conn = Database::getConnection();
        $stmt = $conn->prepare("DELETE FROM projects WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
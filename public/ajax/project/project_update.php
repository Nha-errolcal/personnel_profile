<?php
require_once __DIR__ . '/../../../app/controllers/ProjectController.php';

try {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $id               = $_POST["id"];
        $project_name     = $_POST['project_name'] ?? '';
        $type_project     = $_POST['type_project'] ?? '';
        $project_link_id  = $_POST['project_link_id'] ?? '';
        $demo_link        = $_POST['demo_link'] ?? '';
        $description      = $_POST['description'] ?? '';
        $technologies     = $_POST['technologies'] ?? '';
        $icon_class       = $_POST['icon_class'] ?? '';
        $status           = $_POST['status'] ?? 1;

        if(!is_numeric($project_link_id)){
            echo "invalid_fk";
            exit;
        }

        if ($id) {
            $controller = new ProjectController();
            $controller->updateProject(
                $id,
                $project_name,
                $type_project,
                $description,
                $technologies,
                $project_link_id,
                $demo_link,
                $icon_class,
                $status
            );
            echo "success";
        } else {
            echo "fail";
        }
    }
}catch (Exception $e){
    echo $e->getMessage();
}

<?php

require_once __DIR__ . '/../../../app/controllers/AcademicController.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["id"];
    $education_id = $_POST["education_id"] ?? '';
    $achievement_name = $_POST["achievement_name"] ?? '';
    $achievement_type = $_POST["achievement_type"] ?? '';
    $year = $_POST["year"] ?? '';
    $status = $_POST["status"] ?? '';


    if (!$id) {
        http_response_code(400);
        echo "Missing ID";
        exit;
    }

    if ($id) {
        $controller = new AcademicController();
        $controller->updateAcademic(
            $id,
            $education_id,
            $achievement_name,
            $achievement_type,
            $year,
            $status
        );
        echo "success";
    } else {
        echo "error";
    }
}
?>
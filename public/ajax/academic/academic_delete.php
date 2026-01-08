<?php

require_once __DIR__ . '/../../../app/controllers/AcademicController.php';

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $id = $_POST["id"];

    if ($id) {
        $controller = new AcademicController();
        $controller->deleteAcademic($id);
        echo "success";
    } else {
        echo "fail";
    }
}
?>
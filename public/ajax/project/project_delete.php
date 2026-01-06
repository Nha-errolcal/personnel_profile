<?php
require_once __DIR__ . '/../../../app/controllers/ProjectController.php';

try {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $id = $_POST["id"];

        if($id){
            $controller = new ProjectController();
            $controller->deleteProject($id);

            echo "success";
        }else{
            echo "error";
        }
    }
}catch (Exception $e){
    echo $e->getMessage();
}
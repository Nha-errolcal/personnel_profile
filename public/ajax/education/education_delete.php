<?php
require __DIR__ . "/../../../app/controllers/EducationController.php";

try {

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $id = $_POST["id"] ?? "";

        if (!$id) {
            http_response_code(400);
            echo "Missing ID";
            exit;
        }

        if ($id) {
            $controller = new EducationController();
            $result = $controller->delete($id);
            http_response_code(200);
            echo "success";

        } else {
            http_response_code(500);
            echo "fail";
        }

    }

} catch (Exception $e) {
    http_response_code(500);
    echo $e->getMessage();
}

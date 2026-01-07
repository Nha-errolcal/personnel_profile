<?php
require __DIR__ . "/../../../app/controllers/EducationController.php";

try {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $id = $_POST["id"] ?? "";
        $university_name = $_POST["university_name"] ?? "";
        $degree = $_POST["degree"] ?? "";
        $field_of_study = $_POST["field_of_study"] ?? "";
        $start_year = $_POST["start_year"] ?? "";
        $end_year = $_POST["end_year"] ?? "";
        $gpa = $_POST["gpa"] ?? "";
        $year_of_study = $_POST["year_of_study"] ?? "";
        $status = $_POST["status"] ?? 1;
        $updated_at = date("Y-m-d H:i:s");

        if (!$id) {
            http_response_code(400);
            echo "Missing ID";
            exit;
        }

        if ($id) {

            $controller = new EducationController();
            $result = $controller->update(
                $id,
                $university_name,
                $degree,
                $field_of_study,
                $start_year,
                $end_year,
                $gpa,
                $year_of_study,
                $status,
                $updated_at
            );
            http_response_code(200);
            echo "success";
        } else {
            http_response_code(500);
            echo "fail";
        }
    }
} catch (Exception $e) {
    http_response_code(500);
    echo "fail: " . $e->getMessage();
}

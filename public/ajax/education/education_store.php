<?php
require __DIR__ . "/../../../app/controllers/EducationController.php";

try {

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $university_name = $_POST["university_name"] ?? "";
        $degree = $_POST["degree"] ?? "";
        $field_of_study = $_POST["field_of_study"] ?? "";
        $start_year = $_POST["start_year"] ?? "";
        $end_year = $_POST["end_year"] ?? "";
        $gpa = $_POST["gpa"] ?? "";
        $year_of_study = $_POST["year_of_study"] ?? "";
        $status = $_POST["status"] ?? 1;

        if (
            empty($university_name) ||
            empty($degree) ||
            empty($field_of_study) ||
            empty($start_year)
        ) {
            http_response_code(400);
            echo "Missing required fields";
            exit;
        }

        $controller = new EducationController();

        $result = $controller->create(
            $university_name,
            $degree,
            $field_of_study,
            $start_year,
            $end_year,
            $gpa,
            $year_of_study,
            $status
        );

        if ($result) {
            echo "success";
            http_response_code(response_code: 201);

        } else {
            http_response_code(response_code: 500);
            echo "fail";
        }
    }

} catch (Exception $e) {
    http_response_code(500);
    echo $e->getMessage();
}

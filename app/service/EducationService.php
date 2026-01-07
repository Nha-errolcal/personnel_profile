<?php
require_once __DIR__ . '/../model/Education.php';

class EducationService
{
    private $educationModel;

    public function __construct()
    {
        $this->educationModel = new Education();
    }

    public function getAllAsTable()
    {
        return $this->educationModel->getAllAsTable();
    }

    public function create($university_name, $degree, $field_of_study, $start_year, $end_year, $gpa, $year_of_study, $status)
    {
        return $this->educationModel->create($university_name, $degree, $field_of_study, $start_year, $end_year, $gpa, $year_of_study, $status);
    }

    public function update($id, $university_name, $degree, $field_of_study, $start_year, $end_year, $gpa, $year_of_study, $status)
    {
        $this->educationModel->update($id, $university_name, $degree, $field_of_study, $start_year, $end_year, $gpa, $year_of_study, $status);
    }

    public function delete($id)
    {
        return $this->educationModel->delete($id);
    }
}
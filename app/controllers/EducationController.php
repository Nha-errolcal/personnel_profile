<?php
require_once __DIR__ . '/../service/EducationService.php';

class EducationController
{
    private $educationService;

    public function __construct(){
        $this->educationService = new EducationService();
    }

    public function listAllAsTable()
    {
        return $this->educationService->getAllAsTable();
    }

    public function create($university_name,$degree,$field_of_study,$start_year,$end_year,$gpa,$year_of_study,$status)
    {
        return $this->educationService->create($university_name,$degree,$field_of_study,$start_year,$end_year,$gpa,$year_of_study,$status);
    }

    public function update($id,$university_name,$degree,$field_of_study,$start_year,$end_year,$gpa,$year_of_study,$status,$updated_at)
    {
        return $this->educationService->update($id,$university_name,$degree,$field_of_study,$start_year,$end_year,$gpa,$year_of_study,$status,$updated_at);
    }

    public function delete($id){
        return $this->educationService->delete($id);
    }
}
<?php
require_once __DIR__ . '/../model/Academic.php';

class AcademicService
{
    private $academicModel;

    public function __construct()
    {
        $this->academicModel = new Academic();
    }

    public function getAllAcademics()
    {
        return $this->academicModel->getAllAcademics();
    }

    public function getAcademicById($id)
    {
        return $this->academicModel->getAcademicById($id);
    }

    public function createAcademic($education_id, $achievement_name, $achievement_type, $year, $status)
    {
        return $this->academicModel->addAcademic(
            $education_id,
            $achievement_name,
            $achievement_type,
            $year,
            $status
        );
    }

    public function updateAcademic($id, $education_id, $achievement_name, $achievement_type, $year, $status)
    {
        return $this->academicModel->updateAcademic(
            $id,
            $education_id,
            $achievement_name,
            $achievement_type,
            $year,
            $status
        );
    }

    public function deleteAcademic($id)
    {
        return $this->academicModel->deleteAcademic($id);
    }
}
?>
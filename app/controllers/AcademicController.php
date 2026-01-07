<?php
require_once __DIR__ . '/../service/AcademicService.php';

class AcademicController
{
    private $academicService;

    public function __construct()
    {
        $this->academicService = new AcademicService();
    }

    public function getAllAcademics()
    {
        $academics = $this->academicService->getAllAcademics();
        echo json_encode($academics);
    }

    public function getAcademicById($id)
    {
        $academic = $this->academicService->getAcademicById($id);
        if ($academic) {
            echo json_encode($academic);
        } else {
            echo json_encode(['error' => 'Academic not found']);
        }
    }

    public function createAcademic($education_id, $achievement_name, $achievement_type, $year, $status)
    {
        $success = $this->academicService->createAcademic(
            $education_id,
            $achievement_name,
            $achievement_type,
            $year,
            $status
        );
        echo json_encode(['success' => $success]);
    }
    public function updateAcademic($id, $education_id, $achievement_name, $achievement_type, $year, $status)
    {
        $success = $this->academicService->updateAcademic(
            $id,
            $education_id,
            $achievement_name,
            $achievement_type,
            $year,
            $status
        );
        echo json_encode(['success' => $success]);
    }

    public function deleteAcademic($id)
    {
        $success = $this->academicService->deleteAcademic($id);
        echo json_encode(['success' => $success]);
    }
}
?>
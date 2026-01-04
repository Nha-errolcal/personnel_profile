<?php
require_once __DIR__ . '/../model/Skills.php';

class SkillsService
{
    private $skillsModel;

    public function __construct()
    {
        $this->skillsModel = new Skills();
    }

    public function getAllSkills()
    {
        return $this->skillsModel->getAllSkills();
    }

    public function getSkillById($id)
    {
        return $this->skillsModel->getSkillById($id);
    }

    public function createSkill($skill_name, $level, $skill_level, $category_id, $status)
    {
        $this->validateCategory($category_id);
        return $this->skillsModel->createSkill($skill_name, $level, $skill_level, $category_id, $status);
    }

    public function updateSkill($skill_name, $level, $skill_level, $category_id, $id, $status)
    {
        $this->validateCategory($category_id);
        return $this->skillsModel->updateSkill($skill_name, $level, $skill_level, $category_id, $id, $status);
    }

    public function deleteSkill($id)
    {
        return $this->skillsModel->deleteSkill($id);
    }

    private function validateCategory($category_id)
    {
        $conn = \Database::getConnection();
        $stmt = $conn->prepare("SELECT COUNT(*) FROM categories WHERE id = ?");
        $stmt->execute([$category_id]);
        if ($stmt->fetchColumn() == 0) {
            throw new Exception("Invalid category selected.");
        }
    }
}
?>

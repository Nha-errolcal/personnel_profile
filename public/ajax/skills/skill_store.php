<?php
require_once __DIR__ . '/../../../app/controllers/SkillController.php';

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $skillController = new SkillController();

        // Collect POST data safely
        $skill_name = $_POST['skill_name'] ?? '';
        $level = $_POST['level'] ?? '';
        $skill_level = $_POST['skill_level'] ?? 0;
        $category_id = $_POST['category_id'] ?? 0;
        $status = $_POST['status'] ?? 1;

        if (empty($skill_name) || empty($level) || empty($category_id)) {
            throw new Exception("Please fill all required fields.");
        }

        $result = $skillController->addSkill($skill_name, $level, $skill_level, $category_id, $status);

        echo $result ? "success" : "Failed to add skill";
    } else {
        echo "Invalid request method.";
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
?>

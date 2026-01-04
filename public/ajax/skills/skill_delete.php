<?php
require_once __DIR__ . '/../../../app/controllers/SkillController.php';

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $skillController = new SkillController();
        $id = $_POST['id'] ?? 0;

        if (empty($id)) {
            throw new Exception("Invalid skill ID.");
        }

        $result = $skillController->removeSkill($id);
        echo $result ? "success" : "Failed to delete skill";
    } else {
        echo "Invalid request method.";
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
?>

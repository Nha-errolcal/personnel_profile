<?php
require_once __DIR__ . "/../../../app/controllers/ClubController.php";

$data = json_decode(file_get_contents("php://input"), true);
$id = (int) ($data['id'] ?? 0);

if ($id > 0) {
    $controller = new ClubController();
    $result = $controller->destroy($id);
    echo $result ? 'success' : 'fail';
} else {
    echo 'fail';
}

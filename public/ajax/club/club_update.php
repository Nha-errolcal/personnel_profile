<?php
require_once __DIR__ . "/../../../app/controllers/ClubController.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = (int) ($_POST['id'] ?? 0);
    $controller = new ClubController();
    $result = $controller->update($id);
    echo $result ? 'success' : 'fail';
}

<?php
require_once __DIR__ . "/../../../app/controllers/ClubController.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new ClubController();
    $result = $controller->store();
    echo $result ? 'success' : 'fail';
}

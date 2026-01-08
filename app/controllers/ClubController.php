<?php
require_once __DIR__ . '/../service/ClubService.php';

class ClubController
{
    private ClubService $service;

    public function __construct()
    {
        $this->service = new ClubService();
    }

    public function index()
    {
        return $this->service->getAll();
    }



    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'club_name' => trim($_POST['club_name'] ?? ''),
                'role_name' => trim($_POST['role_name'] ?? ''),
                'status' => isset($_POST['status']) ? (int) $_POST['status'] : 1
            ];
            return $this->service->create($data);
        }
    }

    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'club_name' => trim($_POST['club_name'] ?? ''),
                'role_name' => trim($_POST['role_name'] ?? ''),
                'status' => isset($_POST['status']) ? (int) $_POST['status'] : 1
            ];
            return $this->service->update($id, $data);
        }
    }

    public function destroy($id)
    {
        return $this->service->delete($id);
    }
}

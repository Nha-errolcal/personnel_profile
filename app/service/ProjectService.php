<?php
require_once __DIR__ . '/../model/Project.php';

class ProjectService
{
    private $projectModel;

    public function __construct()
    {
        $this->projectModel = new Project();
    }

    public function getAllProjects()
    {
        return $this->projectModel->getProjectsAll();
    }

    public function getProjectById($id)
    {
        return $this->projectModel->getProject($id);
    }

    public function createProject($project_name, $type_project, $description, $technologies, $url_source_code, $demo_url, $icon_class, $status)
    {
        return $this->projectModel->addProject($project_name, $type_project, $description, $technologies, $url_source_code, $demo_url, $icon_class, $status);
    }

    public function updateProject($id, $project_name, $type_project, $description, $technologies, $url_source_code, $demo_url, $icon_class, $status)
    {
        return $this->projectModel->projectUpdate($id, $project_name, $type_project, $description, $technologies, $url_source_code, $demo_url, $icon_class, $status);
    }

    public function deleteProject($id)
    {
        return $this->projectModel->projectDelete($id);
    }
}
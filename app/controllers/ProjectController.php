<?php
require_once __DIR__ . '/../service/ProjectService.php';
class ProjectController
{
    private $projectService;

    public function __construct()
    {
        $this->projectService = new ProjectService();
    }

    public function getAllProjects(){
        return $this->projectService->getAllProjects();
    }

    public function getProjectById($id){
        return $this->projectService->getProjectById($id);
    }

    public function addProject(
        $project_name,
        $type_project,
        $description,
        $technologies,
        $project_link_id,
        $demo_link,
        $icon_class,
        $status
    ){
        return $this->projectService->createProject(
            $project_name,
            $type_project,
            $description,
            $technologies,
            $project_link_id,
            $demo_link,
            $icon_class,
            $status
        );
    }

    public function updateProject($id, $project_name, $type_project, $description, $technologies, $url_source_code, $demo_url, $icon_class, $status){
        return $this->projectService->updateProject($id, $project_name, $type_project, $description, $technologies, $url_source_code, $demo_url, $icon_class, $status);
    }

    public function deleteProject($id){
        return $this->projectService->deleteProject($id);
    }
}
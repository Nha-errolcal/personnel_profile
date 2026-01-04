<?php
require_once __DIR__ . '/../../../../app/controllers/ProjectController.php';
$projectController = new ProjectController();
$project = $projectController->getAllProjects();
?>


<div class="layout-content">

    <header class="layout-header d-flex justify-content-between align-items-center mb-4">
        <div class="d-flex align-items-center gap-3">
            <button id="toggleSidebar" class="btn btn-outline-secondary">
                <i class="fa fa-bars"></i>
            </button>
            <h2 class="m-0">
                Skills <span class="badge bg-primary"><?= count($project) ?></span>
            </h2>
        </div>

        <div>
            <button class="btn btn-success" id="addSkillBtn">
                <i class="fa fa-plus me-1"></i> Add New Skill
            </button>
        </div>
    </header>

    <main class="layout-main">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped align-middle text-center">
                <thead class="table-active">
                <tr>
                    <th>NO</th>
                    <th>Project Name</th>
                    <th>Type</th>
                    <th>Description</th>
                    <th>Technologies</th>
                    <th>Source Code</th>
                    <th>Demo</th>
                    <th>Icon</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <?php foreach ($project as $index=>$projectRow): ?>
                    <th><?= $index+1 ?></th>
                    <td><?= $projectRow["project_name"] ?></td>
                    <td><?= $projectRow["type_project"] ?></td>
                    <td><?= $projectRow["description"] ?></td>
                    <td><?= $projectRow["technologies"] ?></td>
                    <td>
                        <a href="#" target="_blank" class="text-decoration-none">
                            <i class="fab fa-github"></i> GitHub
                        </a>
                    </td>
                    <td>
                        <a href="<?= $projectRow["demo_url"] ?>" target="_blank" class="text-decoration-none">
                            <i class="fas fa-external-link-alt"></i> Live Demo
                        </a>
                    </td>
                    <td><i class="fas fa-laptop-code"></i></td>
                    <td>
                        <span class="badge bg-success">Active</span>
                    </td>
                    <td>
                        <button class="btn btn-sm btn-primary me-1">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                        <button class="btn btn-sm btn-danger">
                            <i class="fas fa-trash-alt"></i> Delete
                        </button>
                    </td>
                <?php endforeach; ?>
                </tr>
                </tbody>
            </table>
        </div>
    </main>

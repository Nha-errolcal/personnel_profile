<?php
require __DIR__ . '/../../../app/controllers/ProjectController.php';
$controller = new ProjectController();
$listProject = $controller->getAllProjects();
?>

<section class="section  animate-on-scroll animate__animated animate__fadeInLeft" id="project">
    <h2>Projects</h2>
    <div class="projects-list">
        <!-- Project 1 -->
        <?php foreach ($listProject as $list): ?>
        <?php if ($list["status"] !=1) :  continue?>
            <?php else:?>
        <?php endif; ?>
        <p><?= $list["status"] ?></p>
            <div class="project-item animate-on-scroll delay-1">
                <h3><i class="<?= $list["icon_class"] ?>"></i> <?= $list["project_name"] ?></h3>
                <p style="font-style: italic; color: var(--primary); margin-bottom: 15px;">
                    <?= $list["type_project"] ?>
                </p>
                <p>
                    <?= $list["description"] ?>
                </p>
                <p style="margin-top: 15px;">
                    <strong><i class="fas fa-tools"></i> Technologies:</strong>
                    <?= $list["technologies"] ?>
                </p>
                <p style="margin-top: 10px;">
                    <a href="<?= $list["source_code_url"] ?>" target="_blank">
                        <i class="fab fa-github"></i> View on <?= $list["link_type"] ?>
                    </a> |
                    <a href="<?= $list["demo_link"] ?>" target="_blank">
                        <i class="fas fa-external-link-alt"></i> Live Demo
                    </a>
                </p>
            </div>
        <?php endforeach; ?>
    </div>
</section>
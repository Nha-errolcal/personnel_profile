<?php
include __DIR__ . "/../../../app/controllers/SkillController.php";

$skillController = new SkillController();
$skills = $skillController->listSkills();

// group skills by category
$categories = [];
foreach ($skills as $skill) {
    $catName = $skill['category_name'];
    if (!isset($categories[$catName])) {
        $categories[$catName] = [];
    }
    $categories[$catName][] = $skill;
}
?>

<section class="section animate-on-scroll animate__animated animate__fadeInLeft" id="skills">
    <h2>Skills</h2>

    <div class="skills-content">
        <?php foreach ($categories as $categoryName => $skillsList): ?>
            <h3 style="color: var(--primary); font-size: 1.8rem; margin: 30px 0; text-align: center;">
                <?php if (strtolower($categoryName) == 'technical skills'): ?>
                    <i class="fas fa-laptop-code"></i>
                <?php else: ?>
                    <i class="fas fa-users"></i>
                <?php endif; ?>
                <?= $categoryName ?>
            </h3>

            <div class="skills-list">
                <?php foreach ($skillsList as $index => $skill): ?>
                    <div class="skill-item animate-on-scroll delay-<?= $index + 1 ?>">
                        <div class="skill-name">
                            <span><?= $skill['skill_name'] ?></span>
                            <span style="color: var(--primary); font-weight: 700;"><?= $skill['level'] ?></span>
                        </div>
                        <div class="skill-bar">
                            <div class="skill-level" style="--level: <?= $skill['skill_level'] ?>%; width: <?= $skill['skill_level'] ?>%;"></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </div>
</section>

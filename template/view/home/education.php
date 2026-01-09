<?php
require __DIR__ . '/../../../app/controllers/AcademicController.php';

$academicController = new AcademicController();
$listAll = $academicController->getToClient();

$grouped = []; //group by education_id

foreach ($listAll as $row) {
    $eduId = $row['education_id'];
    if (!isset($grouped[$eduId])) {
        $grouped[$eduId] = [
            'education' => [
                'education_id' => $row['education_id'],
                'university_name' => $row['university_name'] ?? '',
                'degree' => $row['degree'] ?? '',
                'field_of_study' => $row['field_of_study'] ?? '',
                'start_year' => $row['start_year'] ?? '',
                'end_year' => $row['end_year'] ?? '',
                'gpa' => $row['gpa'] ?? '',
                'year_of_study' => $row['year_of_study'] ?? '',
            ],
            'achievements' => []
        ];
    }

    // push achievements skip if empty
    if (!empty($row['achievement_name'])) {
        $grouped[$eduId]['achievements'][] = [
            'id' => $row['id'] ?? null,
            'name' => $row['achievement_name'] ?? '',
            'type' => $row['achievement_type'] ?? '',
            'year' => $row['year'] ?? '',
            'status' => $row['status'] ?? 0,
        ];
    }
}

function e($v)
{
    return htmlspecialchars((string) $v, ENT_QUOTES, 'UTF-8');
}
?>

<section class="section animate-on-scroll animate__animated animate__fadeInLeft" id="education">
    <h2>Education</h2>

    <div class="education-list">
        <?php if (empty($grouped)): ?>
            <p>No education records found.</p>
        <?php else: ?>

            <?php foreach ($grouped as $edu): ?>
                <?php $info = $edu['education']; ?>
                <div class="education-item animate-on-scroll delay-2">

                    <h3><?= e($info['university_name']) ?></h3>

                    <p><strong><?= e($info['degree']) ?></strong></p>

                    <p>
                        <i class="fas fa-calendar-alt"></i>
                        <?= e($info['start_year']) ?> - <?= e($info['end_year']) ?>
                    </p>

                    <p>
                        <i class="fas fa-graduation-cap"></i>
                        <?= e($info['year_of_study']) ?>
                    </p>

                    <?php if (!empty($info['gpa'])): ?>
                        <p><strong>GPA:</strong> <?= e($info['gpa']) ?></p>
                    <?php endif; ?>

                    <div style="margin-top: 15px;">
                        <p style="color: var(--text-dark); font-weight: 600; margin-bottom: 10px;">
                            <i class="fas fa-trophy" style="color: #f39c12;"></i> Academic Achievements:
                        </p>

                        <?php if (empty($edu['achievements'])): ?>
                            <p style="color: var(--text-light); margin-left: 20px;">No achievements yet.</p>
                        <?php else: ?>
                            <ul style="color: var(--text-light); margin-left: 20px; line-height: 1.8;">
                                <?php foreach ($edu['achievements'] as $ach): ?>
                                    <li>
                                        <?= e($ach['name']) ?>
                                        <?php if (!empty($ach['type']) || !empty($ach['year'])): ?>
                                            <small style="opacity:.8;">
                                                (<?= e($ach['type']) ?><?= !empty($ach['year']) ? ', ' . e($ach['year']) : '' ?>)
                                            </small>
                                        <?php endif; ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>

                </div>
            <?php endforeach; ?>

        <?php endif; ?>
    </div>
</section>
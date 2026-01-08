<?php

require_once __DIR__ . '/../../../../../app/controllers/EducationController.php';
$controller = new EducationController();
$education = $controller->listAllAsTable();

require_once __DIR__ . '/../../../../../app/controllers/AcademicController.php';
$academicController = new AcademicController();
$academics = $academicController->getAllAcademics();
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="layout-content">

    <header class="layout-header d-flex justify-content-between align-items-center mb-4">
        <div class="d-flex align-items-center gap-3">
            <button id="toggleSidebar" class="btn btn-outline-secondary">
                <i class="fa fa-bars"></i>
            </button>
            <h2 class="m-0">
                Project Links <span class="badge bg-primary"></span>
            </h2>
        </div>

        <button class="btn btn-success" id="btnShowModel">
            <i class="fa fa-plus"></i> Add Project
        </button>
    </header>

    <!-- MODAL -->
    <div class="modal fade" id="model" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 id="titleModel">Add Achievement</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <form id="form">
                        <input type="hidden" name="id" id="id">

                        <label>Education</label>
                        <select class="form-select mb-3" name="education_id" id="education_id">
                            <option value="">Please Select</option>
                            <?php foreach ($education as $edu): ?>
                                <option value="<?= $edu["id"] ?>"><?= $edu["university_name"] ?></option>
                            <?php endforeach ?>
                        </select>

                        <label>Achievement Name</label>
                        <textarea class="form-control mb-3" name="achievement_name" id="achievement_name"></textarea>

                        <label>Achievement Type</label>
                        <input class="form-control mb-3" name="achievement_type" id="achievement_type">

                        <label>Year</label>
                        <input type="text" name="year" id="year" class="form-control mb-3">

                        <label>Status</label>
                        <select class="form-select mb-3" name="status" id="status">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>

                        <button type="submit" class="btn btn-primary w-100">Save</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="layout-main">
        <!-- TABLE -->
        <table class="table table-bordered table-hover text-center" id="academicTable">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Education</th>
                    <th>Achievement Name</th>
                    <th>Achievement Type</th>
                    <th>Year</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php if (empty($academics)): ?>
                    <tr>
                        <td colspan="7" class="text-center text-muted">No data found</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($academics as $index => $ac): ?>
                        <tr data-id="<?= $ac["id"] ?>">
                            <td><?= $index + 1 ?></td>
                            <td>
                                <?= $ac["university_name"] ?>
                            </td>

                            <!-- <td><?= $ac["education_id"] ?></td> -->
                            <td><?= $ac["achievement_name"] ?></td>
                            <td><?= $ac["achievement_type"] ?></td>
                            <td><?= $ac["year"] ?></td>
                            <td>
                                <?php if ($ac["status"] == 1): ?>
                                    <span class="badge bg-success">Active</span>
                                <?php else: ?>
                                    <span class="badge bg-secondary">Inactive</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <button class="btn btn-primary btn-sm btn-editAc"
                                    data-data-ac='<?= htmlspecialchars(json_encode($ac), ENT_QUOTES, "UTF-8") ?>'>
                                    <i class="fa fa-edit"></i>
                                </button>
                                <button data-id-ac="<?= $ac["id"] ?>" class="btn btn-danger btnDelete btn-sm">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    const model = document.getElementById("model");
    const showModel = new bootstrap.Modal(model);
    const form = document.getElementById("form");
    const btnShowModel = document.getElementById("btnShowModel");
    const titleModel = document.getElementById("titleModel");
    const path = "/personnel_profile/public/ajax/academic/";

    // Show modal for new Academic
    btnShowModel.addEventListener("click", () => {
        form.reset();
        document.getElementById("id").value = ""; // clear hidden ID
        titleModel.textContent = "New Academic";
        showModel.show();
    });

    // Submit form (Create / Update)
    form.addEventListener("submit", (e) => {
        e.preventDefault();
        const formData = new FormData(form);
        const tmpId = document.getElementById("id").value
        const url = tmpId ? path + "academic_update.php" : path + "academic_store.php"
        fetch(url, {
            method: "POST",
            body: formData
        })
            .then(res => res.text())
            .then(data => {
                if (data.trim() === "success") {
                    alert(tmpId ? "Updated successfully!" : "Created successfully!");
                    showModel.hide();
                    location.reload();
                } else {
                    alert("Failed to save: " + data);
                }
            })
            .catch(err => alert(err));
    });

    // Delete record
    document.querySelectorAll(".btnDelete").forEach(btn => {
        btn.addEventListener("click", () => {
            const id = btn.dataset.idAc;
            if (!confirm("Are you sure you want to delete this record?")) return;

            const formData = new FormData();
            formData.append("id", id);

            fetch(path + "academic_delete.php", {
                method: "POST",
                body: formData
            })
                .then(res => res.text())
                .then(data => {
                    if (data.trim() === "success") {
                        alert("Deleted successfully!");
                        btn.closest("tr").remove();
                    } else {
                        alert("Delete failed: " + data);
                    }
                })
                .catch(err => alert(err));
        });
    });

    // Edit record
    document.querySelectorAll(".btn-editAc").forEach(btn => {
        btn.addEventListener("click", () => {
            const academic = JSON.parse(btn.dataset.dataAc);

            document.getElementById("id").value = academic.id;
            document.getElementById("education_id").value = academic.education_id;
            document.getElementById("achievement_name").value = academic.achievement_name;
            document.getElementById("achievement_type").value = academic.achievement_type;
            document.getElementById("year").value = academic.year;
            document.getElementById("status").value = academic.status;

            titleModel.textContent = "Update Academic";
            showModel.show();
        });
    });
</script>
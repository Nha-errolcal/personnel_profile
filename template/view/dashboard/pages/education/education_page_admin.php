<?php
require_once __DIR__ . '/../../../../../app/controllers/EducationController.php';
$controller = new EducationController();
$education = $controller->listAllAsTable();
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="layout-content">

    <!-- HEADER -->
    <header class="layout-header d-flex justify-content-between align-items-center mb-4">
        <div class="d-flex align-items-center gap-3">
            <button id="toggleSidebar" class="btn btn-outline-secondary">
                <i class="fa fa-bars"></i>
            </button>
            <h2 class="m-0">Education Records</h2>
        </div>

        <button class="btn btn-success" id="btnNew">
            <i class="fa fa-plus"></i> Add Education
        </button>
    </header>

    <!-- MODAL -->
    <div class="modal fade" id="model">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Add Education</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <form id="form">
                        <input type="hidden" id="educationId" name="id">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>University Name</label>
                                    <input type="text" class="form-control" name="university_name" id="university_name"
                                        required>
                                </div>

                                <div class="mb-3">
                                    <label>Degree</label>
                                    <input type="text" class="form-control" name="degree" id="degree" required>
                                </div>

                                <div class="mb-3">
                                    <label>Field of Study</label>
                                    <input type="text" class="form-control" name="field_of_study" id="field_of_study"
                                        required>
                                </div>

                                <div class="mb-3">
                                    <label>Start Year</label>
                                    <input type="number" class="form-control" name="start_year" id="start_year"
                                        required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>End Year</label>
                                    <input type="number" class="form-control" name="end_year" id="end_year" required>
                                </div>

                                <div class="mb-3">
                                    <label>GPA</label>
                                    <input type="text" class="form-control" name="gpa" id="gpa" required>
                                </div>

                                <div class="mb-3">
                                    <label>Year of Study</label>
                                    <input type="text" class="form-control" name="year_of_study" id="year_of_study"
                                        required>
                                </div>

                                <div class="mb-3">
                                    <label>Status</label>
                                    <select class="form-select" name="status" id="status">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <button class="btn btn-primary w-50" type="submit">
                                <i class="fas fa-save"></i> Save
                            </button>
                            <button type="button" class="btn btn-danger w-50" data-bs-dismiss="modal">
                                <i class="fas fa-times"></i> Close
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- TABLE -->
    <main class="layout-main">
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle text-center">
                <thead class="table-light">
                    <tr>
                        <th>NO</th>
                        <th>University Name</th>
                        <th>Degree</th>
                        <th>Field of Study</th>
                        <th>Start year</th>
                        <th>End year</th>
                        <th>GPA</th>
                        <th>Year of Study</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($education)): ?>
                        <tr>
                            <td colspan="10">No Data</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($education as $i => $edu): ?>
                            <tr data-id="<?= $edu['id'] ?>">
                                <td><?= $i + 1 ?></td>
                                <td><?= $edu['university_name'] ?></td>
                                <td><?= $edu['degree'] ?></td>
                                <td><?= $edu['field_of_study'] ?></td>
                                <td><?= $edu['start_year'] ?></td>
                                <td><?= $edu['end_year'] ?></td>
                                <td><?= $edu['gpa'] ?></td>
                                <td><?= $edu['year_of_study'] ?></td>
                                <td>
                                    <?= $edu['status'] ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-secondary">Inactive</span>' ?>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-primary btn-edit" data-data-edu='<?= json_encode($edu) ?>'>
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger btn-delete" data-id="<?= $edu['id'] ?>">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

<script>
    const model = document.getElementById("model");
    const showModel = new bootstrap.Modal(model);
    const form = document.getElementById("form");
    const btnAddNewShowModel = document.getElementById("btnNew");
    const titleModel = document.getElementById("modalTitle");
    const path = "/personnel_profile/public/ajax/education/";

    // Add new button
    btnAddNewShowModel.addEventListener("click", function () {
        form.reset();
        document.getElementById("educationId").value = "";
        titleModel.textContent = "Add New Education";
        showModel.show();
    });

    // Submit form (Create + Update)
    form.addEventListener("submit", (e) => {
        e.preventDefault();
        const tmpId = document.getElementById("educationId").value;
        const formData = new FormData(form);
        const url = tmpId ? path + "education_update.php" : path + "education_store.php";

        fetch(url, { method: "POST", body: formData })
            .then(res => res.text())
            .then(data => {
                if (data.trim() === "success") {
                    alert(tmpId ? "Updated successfully!" : "Created successfully!");
                    showModel.hide();
                    location.reload();
                } else {
                    alert("Operation failed: " + data);
                }
            }).catch(err => console.log(err));

    });

    // Edit button
    document.querySelectorAll(".btn-edit").forEach(btn => {
        btn.addEventListener("click", () => {
            const edu = JSON.parse(btn.dataset.dataEdu);
            document.getElementById("educationId").value = edu.id;
            document.getElementById("university_name").value = edu.university_name;
            document.getElementById("degree").value = edu.degree;
            document.getElementById("field_of_study").value = edu.field_of_study;
            document.getElementById("start_year").value = edu.start_year;
            document.getElementById("end_year").value = edu.end_year;
            document.getElementById("gpa").value = edu.gpa;
            document.getElementById("year_of_study").value = edu.year_of_study;
            document.getElementById("status").value = edu.status;
            titleModel.textContent = "Edit Education";
            showModel.show();
        });
    });

    // Delete button
    document.querySelectorAll(".btn-delete").forEach(btn => {
        btn.addEventListener("click", () => {
            const id = btn.dataset.id;
            if (!confirm("Are you sure you want to delete this record?")) return;

            const formData = new FormData();
            formData.append("id", id);

            fetch(path + "education_delete.php", { method: "POST", body: formData })
                .then(res => res.text())
                .then(data => {
                    if (data.trim() === "success") {
                        alert("Deleted successfully!");
                        location.reload()
                    } else {
                        alert("Delete failed: " + data);
                    }
                });
        });
    });
</script>
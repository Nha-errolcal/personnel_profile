<?php ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<div class="layout-content">

    <header class="layout-header d-flex justify-content-between mb-4">
        <h2>Achievements</h2>
        <button class="btn btn-success">
            <i class="fa fa-plus"></i> Add Achievement
        </button>
    </header>

    <!-- MODAL -->
    <div class="modal fade" id="model">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5>Add Achievement</h5>
                </div>

                <div class="modal-body">
                    <form>
                        <label>Education</label>
                        <input type="text" class="form-control mb-3" id="education_id" name="education_id">

                        <label>Achievement Name</label>
                        <input type="text" class="form-control mb-3" name="achievement_name" id="achievement_name">

                        <label>Achievement Type</label>
                        <input class="form-control mb-3" name="achievement_type" id="achievement_type">

                        <label>Year</label>
                        <input type="text" name="year" id="year" class="form-control mb-3">

                        <label>Status</label>
                        <select class="form-select mb-3" name="status" id="status">
                            <option>Active</option>
                            <option>Inactive</option>
                        </select>

                        <button class="btn btn-primary w-100">Save</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="layout-main">

        <!-- TABLE -->
        <table class="table table-bordered table-hover text-center">
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
                <tr>
                    <td>1</td>
                    <td>Dean's List</td>
                    <td>2022</td>
                    <td>Academic</td>
                    <td>Top GPA in faculty</td>
                    <td><span class="badge bg-success">Active</span></td>
                    <td>
                        <button class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
                        <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                    </td>
                </tr>

                <tr>
                    <td>2</td>
                    <td>Best Final Year Project</td>
                    <td>2024</td>
                    <td>Competition</td>
                    <td>Web App Award</td>
                    <td><span class="badge bg-success">Active</span></td>
                    <td>
                        <button class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
                        <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
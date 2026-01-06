<?php ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<div class="layout-content">

    <!-- HEADER -->
    <header class="layout-header d-flex justify-content-between align-items-center mb-4">
        <div class="d-flex align-items-center gap-3">
            <button id="toggleSidebar" class="btn btn-outline-secondary">
                <i class="fa fa-bars"></i>
            </button>
            <h2 class="m-0">Clubs & Activities</h2>
        </div>

        <button class="btn btn-success" id="btnNew">
            <i class="fa fa-plus"></i> Add Club
        </button>
    </header>

    <!-- MODAL -->
    <div class="modal fade" id="model">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Add Club / Activity</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <form>

                        <div class="row">
                            <div class="col-md-6">
                                <label>Club / Organization Name</label>
                                <input type="text" class="form-control mb-3">

                                <label>Role</label>
                                <input type="text" class="form-control mb-3">

                                <label>Start Year</label>
                                <input type="number" class="form-control mb-3">
                            </div>

                            <div class="col-md-6">
                                <label>End Year</label>
                                <input type="number" class="form-control mb-3">

                                <label>Description</label>
                                <textarea class="form-control mb-3"></textarea>

                                <label>Status</label>
                                <select class="form-select mb-3">
                                    <option>Active</option>
                                    <option>Inactive</option>
                                </select>
                            </div>
                        </div>

                        <button class="btn btn-primary w-100">
                            <i class="fa fa-save"></i> Save
                        </button>

                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- TABLE -->
    <div class="layout-main">
        <table class="table table-bordered table-hover text-center align-middle">
            <thead class="table-light">
            <tr>
                <th>No</th>
                <th>Club Name</th>
                <th>Role</th>
                <th>Period</th>
                <th>Description</th>
                <th>Status</th>
                <th width="120">Action</th>
            </tr>
            </thead>

            <tbody>
            <tr>
                <td>1</td>
                <td>University IT Club</td>
                <td>Web Development Team Lead</td>
                <td>2022 - 2024</td>
                <td>Led web dev projects and coding workshops</td>
                <td><span class="badge bg-success">Active</span></td>
                <td>
                    <button class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></button>
                    <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                </td>
            </tr>

            <tr>
                <td>2</td>
                <td>National Coding Club</td>
                <td>Member</td>
                <td>2021 - 2023</td>
                <td>Participated in competitions and hackathons</td>
                <td><span class="badge bg-success">Active</span></td>
                <td>
                    <button class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></button>
                    <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                </td>
            </tr>
            </tbody>

        </table>
    </div>

</div>

<style>
    .form-control {
        border: 1px solid #ced4da !important;
        border-radius: 0.375rem;
        background-color: #fff;
        box-shadow: none !important;
    }

    .form-control:focus {
        border-color: #86b7fe;
        box-shadow: 0 0 0 0.15rem rgba(13, 110, 253, .25);
    }

    .form-select {
        border: 1px solid #ced4da !important;
        border-radius: 0.375rem;
        background-color: #fff;
        box-shadow: none !important;
    }

    .form-select:focus {
        border-color: #86b7fe;
        box-shadow: 0 0 0 0.15rem rgba(13, 110, 253, .25);
    }
</style>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">

                <!-- Card Header -->
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3"><?= $pagetitle ?></h6>
                    </div>
                </div>

                <!-- Card Body -->
                <div class="card-body px-4 py-4">

                    <form method="post" action="<?= base_url('home/updatejob') ?>">

                        <div class="row mb-4">
                            <input type="hidden" class="form-control form-control-sm" name="job_id" value="<?= $jobs['job_id'] ?>" required>
                            <!-- Job Received Date -->
                            <div class="col-md-3 col-sm-6">
                                <label>Job Received Date <span style="color:red;">*</span></label>
                                <input type="date" class="form-control form-control-sm"
                                    name="received_date"
                                    value="<?= date('Y-m-d', strtotime($jobs['recieved_date'])); ?>"
                                    required>

                            </div>
                            <!-- Job Type -->
                            <div class="col-md-4 col-sm-6">
                                <label>Job Type<span style="color:red;">*</span></label>
                                <select class="form-select form-select-sm" name="job_type" required>
                                    <option value="">Select Type</option>
                                    <option value="0" <?= isset($jobs['job_type']) && $jobs['job_type'] == 0 ? 'selected' : '' ?>>Maintenance</option>
                                    <option value="1" <?= isset($jobs['job_type']) && $jobs['job_type'] == 1 ? 'selected' : '' ?>>Service</option>
                                </select>

                            </div>
                            <!-- Job Title -->
                            <div class="col-md-3 col-sm-6">
                                <label>Job Title <span style="color:red;">*</span></label>
                                <input type="text" class="form-control form-control-sm" name="job_title" value="<?= $jobs['job_name'] ?>" required>
                            </div>

                            <!-- Client Name -->
                            <div class="col-md-3 col-sm-6">
                                <label>Client Name<span style="color:red;">*</span></label>
                                <select class="form-select form-select-sm" name="client_name" required>
                                    <option value="">Select Client</option>
                                    <?php foreach ($customers as $customer): ?>
                                        <option value="<?= $customer['id'] ?>"
                                            <?= isset($jobs['customer']) && $jobs['customer'] == $customer['id'] ? 'selected' : '' ?>>
                                            <?= htmlspecialchars($customer['name']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>



                            <!-- Assigned To -->
                            <div class="col-md-3 col-sm-6">
                                <label>
                                    Assigned To <span style="color:red;">*</span>
                                </label>
                                <select class="form-select form-select-sm" name="technician_id" required>
                                    <option value="">Select Employee</option>
                                    <?php foreach ($employees as $employee): ?>
                                        <option value="<?= $employee['id'] ?>"
                                            <?= isset($jobs['technician_id']) && (int)$jobs['technician_id'] === (int)$employee['id'] ? 'selected' : '' ?>>
                                            <?= htmlspecialchars($employee['name']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>


                            <!-- Expected Completion -->
                            <div class="col-md-4 col-sm-6">
                                <label>Expected Completion</label>
                                <input type="date" class="form-control form-control-sm" name="expected_date" value="<?= $jobs['estimated_delivery_date'] ?>">
                            </div>
                            <!-- Estimated Cost -->
                            <div class="col-md-4 col-sm-6">
                                <label>Estimated Cost</label>
                                <input type="number" step="0.01" class="form-control form-control-sm" name="estimated_cost" value="<?= $jobs['estimated_cost'] ?>">
                            </div>

                        </div>
                        <div class="row mb-4">
                            <!-- Scope of Work -->
                            <div class="col-md-6 col-sm-12">
                                <label>Scope of Work (Initial)<span style="color:red;">*</span></label>
                                <textarea class="form-control form-control-sm" name="scope_of_work" rows="3" required><?= $jobs['remark'] ?></textarea>
                            </div>

                            <!-- Problem Description -->
                            <div class="col-md-6 col-sm-12">
                                <label>Problem Description</label>
                                <textarea class="form-control form-control-sm" name="problem_desc" rows="3"><?= $jobs['description'] ?></textarea>
                            </div>
                        </div>

                        <div class="row mb-4">

                            <!-- Submit -->
                            <div class="col-md-2 col-sm-6 d-flex align-items-end">
                                <button type="submit" class="btn btn-primary w-100">Update Job</button>
                            </div>

                            <!-- Reset -->
                            <div class="col-md-2 col-sm-6 d-flex align-items-end">
                                <a href="<?= base_url('home/edit_job?id=' .$jobs['job_id']) ?>" class="btn btn-outline-secondary w-100">Reset</a>
                            </div>

                        </div>

                    </form>

                </div><!-- /card-body -->

            </div>
        </div>
    </div>
</div>
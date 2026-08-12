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

                    <form method="post" action="<?= base_url('home/savejob') ?>">

                        <div class="row mb-4">

                            <!-- Job Received Date -->
                            <div class="col-md-3 col-sm-6">
                                <label>Job Received Date <span style="color:red;">*</span></label>
                                <input type="date" class="form-control form-control-sm" name="received_date" required>
                            </div>
                            <!-- Job Type -->
                            <div class="col-md-4 col-sm-6">
                                <label>Job Type<span style="color:red;">*</span></label>
                                <select class="form-select form-select-sm" name="job_type" required>
                                    <option value="">Select Type</option>
                                    <option value="0">Maintenance</option>
                                    <option value="1">Service</option>
                                </select>
                            </div>
                            <!-- Job Title -->
                            <div class="col-md-3 col-sm-6">
                                <label>Job Title <span style="color:red;">*</span></label>
                                <input type="text" class="form-control form-control-sm" name="job_title" required>
                            </div>

                            <!-- Client Name -->
                            <div class="col-md-3 col-sm-6">
                                <label>Client Name<span style="color:red;">*</span></label>
                                <select class="form-select form-select-sm" name="client_name" required>
                                    <option value="">Select Client</option>
                                    <?php foreach ($customers as $customer): ?>
                                        <option value="<?= $customer['id'] ?>"><?= htmlspecialchars($customer['name']) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <!-- Assigned To -->
                            <div class="col-md-3 col-sm-6">
                                <label>
                                    Assigned To <span style="color:red;">*</span>
                                </label>
                                <select class="form-select form-select-sm" name="assigned_to" required>
                                    <option value="">Select Employee</option>
                                    <?php foreach ($employees as $employee): ?>
                                        <option value="<?= $employee['id'] ?>">
                                            <?= htmlspecialchars($employee['name']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <!-- Expected Completion -->
                            <div class="col-md-4 col-sm-6">
                                <label>Expected Completion</label>
                                <input type="date" class="form-control form-control-sm" name="expected_date">
                            </div>
                            <!-- Estimated Cost -->
                            <div class="col-md-4 col-sm-6">
                                <label>Estimated Cost</label>
                                <input type="number" step="0.01" class="form-control form-control-sm" name="estimated_cost">
                            </div>

                        </div>
                        <div class="row mb-4">
                            <!-- Scope of Work -->
                            <div class="col-md-6 col-sm-12">
                                <label>Scope of Work (Initial)<span style="color:red;">*</span></label>
                                <textarea class="form-control form-control-sm" name="scope_of_work" rows="3" required></textarea>
                            </div>

                            <!-- Problem Description -->
                            <div class="col-md-6 col-sm-12">
                                <label>Problem Description</label>
                                <textarea class="form-control form-control-sm" name="problem_desc" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="row mb-4">

                            <!-- Submit -->
                            <div class="col-md-2 col-sm-6 d-flex align-items-end">
                                <button type="submit" class="btn btn-primary w-100">Create Job</button>
                            </div>

                            <!-- Reset -->
                            <div class="col-md-2 col-sm-6 d-flex align-items-end">
                                <a href="<?= base_url('/create_job') ?>" class="btn btn-outline-secondary w-100">Reset</a>
                            </div>

                        </div>

                    </form>

                </div><!-- /card-body -->

            </div>
        </div>
    </div>
</div>
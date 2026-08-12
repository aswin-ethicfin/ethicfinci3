<style>
    .timeline li {
        position: relative;
        padding-left: 26px;
        border-left: 2px solid #dee2e6;
    }

    .timeline li::before {
        content: '';
        position: absolute;
        left: -7px;
        top: 8px;
        width: 12px;
        height: 12px;
        background: #0d6efd;
        border-radius: 50%;
    }

    .timeline li.text-muted::before {
        background: #adb5bd;
    }

    .job-timeline-title {
        color: #0d6efd;
        /* Bootstrap primary blue */
        font-size: 18px;
        font-weight: 600;
        letter-spacing: 0.3px;
    }
</style>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-lg-12 mx-auto">

            <!-- Job Details Card -->
            <div class="card shadow-lg border-radius-xl">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between align-items-center">
                        <div class="border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3"><?= $pagetitle ?> : <?= $job['job_name'] ?></h6>

                        </div>

                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="card-body">
                        <h5>View Job</h5>
                        <div class="row">
                            <div class="col-lg-12 cus_table">
                                <div class="d-flex flex-row">
                                    <?php
                                    $statusLabel =
                                        ($job['job_status'] == 0 && $job['approval_status'] === null && $job['is_paid'] == 0) ? 'New Job' : (($job['job_status'] >= 0 && $job['approval_status'] == 0) ? 'Quotation Given' : (($job['job_status'] >= 0 && $job['approval_status'] == 1 && $job['progress_status'] === NULL) ? 'Quotation Approved' : (($job['job_status'] >= 0 && $job['approval_status'] == 2 && $job['progress_status'] === NULL) ? 'Quotation Cancelled' : (($job['job_status'] >= 0 && $job['approval_status'] == 1 && $job['is_paid'] == 0) ? 'Not Paid' : (($job['job_status'] >= 0 && $job['approval_status'] == 1 && $job['is_paid'] == 1) ? 'Advance Paid' : (($job['job_status'] <= 5 && $job['approval_status'] == 1 && $job['is_paid'] == 1) ? 'Fully Paid' : (($job['job_status'] == 4 && $job['approval_status'] == 1 && $job['is_paid'] >= 0) ? 'Started' : (($job['job_status'] == 4 && $job['approval_status'] == 1 && $job['is_paid'] >= 0 && $job['progress_status'] == 0) ? 'Repaired' : (($job['job_status'] == 4 && $job['approval_status'] == 1 && $job['is_paid'] >= 0 && $job['progress_status'] == 1) ? 'Replaced' : (($job['job_status'] == 4 && $job['approval_status'] == 1 && $job['is_paid'] >= 0 && $job['progress_status'] == 2) ? 'Repaired and Replaced' : (($job['job_status'] == 5 && $job['approval_status'] == 1 && $job['is_paid'] >= 0 && $job['progress_status'] >= 0) ? 'Completed' : (($job['job_status'] == 8 && $job['approval_status'] == 1 && $job['is_paid'] == 2 && $job['progress_status'] >= 0) ? 'Delivered' :
                                            'Unknown'
                                        ))))))))))));

                                    ?>
                                    <div class="card-body p-4 p-md-5">
                                        <div class="row">
                                            <div class="col-md-6 border-end-md">
                                                <div class="detail-row">
                                                    <div class="detail-label">Job Type</div>
                                                    <div class="detail-value">
                                                        <span class="status-pill"><?= $job['job_type'] == 0 ? 'Maintenance' : 'Service' ?></span>
                                                    </div>
                                                </div>
                                                <div class="detail-row">
                                                    <div class="detail-label">Received on</div>
                                                    <div class="detail-value"><?= date('d M Y', strtotime($job['recieved_date'])) ?></div>
                                                </div>
                                                <div class="detail-row">
                                                    <div class="detail-label">Assigned To</div>
                                                    <div class="detail-value">
                                                        <i class="fas fa-user-circle text-muted me-2"></i><?= htmlspecialchars($job['assigned_to_name']) ?>
                                                    </div>
                                                </div>
                                                <div class="mt-4">
                                                    <div class="detail-label mb-2">Scope & Description</div>
                                                    <div class="description-box">
                                                        <?= nl2br(htmlspecialchars($job['remark'])) ?>
                                                        <br>
                                                        <?= nl2br(htmlspecialchars($job['description'])) ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 ps-md-5">
                                                <div class="detail-row">
                                                    <div class="detail-label">Customer</div>
                                                    <div class="detail-value text-primary"><?= htmlspecialchars($job['client_name']) ?></div>
                                                </div>
                                                <div class="detail-row">
                                                    <div class="detail-label">Est. Delivery</div>
                                                    <div class="detail-value text-danger">
                                                        <i class="far fa-clock me-1"></i> <?= date('d/m/Y', strtotime($job['estimated_delivery_date'])) ?>
                                                    </div>
                                                </div>
                                                <div class="detail-row">
                                                    <div class="detail-label">Est. Cost</div>
                                                    <div class="detail-value cost-text">₹ <?= number_format($job['estimated_cost'], 2) ?></div>
                                                </div>

                                                <div class="mt-5 pt-4">
                                                    <div class="d-grid gap-2 d-md-block">
                                                        <a href="<?= base_url('home/edit_job?id=' . $job['job_id']) ?>" class="btn btn-primary px-4 me-2 shadow-sm">
                                                            <i class="fas fa-edit me-1"></i> Edit Details
                                                        </a>

                                                        <a href="<?= base_url('home/list_jobs') ?>" class="btn btn-outline-secondary px-4">
                                                            <i class="fas fa-arrow-left me-1"></i> Back to List
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    /* Premium Job Detail Styles */
    .job-card {
        border: none;
        border-radius: 16px;
        background: #ffffff;
    }

    .job-header {
        background: linear-gradient(87deg, #2152ff 0, #21d4fd 100%);
        padding: 2rem;
        border-radius: 16px 16px 0 0;
    }

    /* Table-like Structure without the "Table" look */
    .detail-row {
        display: flex;
        padding: 12px 0;
        border-bottom: 1px solid #f8f9fe;
        align-items: center;
    }

    .detail-row:last-child {
        border-bottom: none;
    }

    .detail-label {
        width: 35%;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: #8898aa;
        font-weight: 700;
    }

    .detail-value {
        width: 65%;
        font-size: 1rem;
        color: #32325d;
        font-weight: 600;
    }

    .status-pill {
        padding: 4px 12px;
        border-radius: 50px;
        font-size: 0.85rem;
        background: #e8f0fe;
        color: #2152ff;
    }

    .cost-text {
        font-size: 1.2rem;
        color: #2dce89;
        font-weight: 800;
    }

    .description-box {
        background: #f6f9fc;
        padding: 15px;
        border-radius: 8px;
        margin-top: 5px;
        font-weight: 400;
        color: #525f7f;
    }
</style>
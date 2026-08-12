<style>
    .status-container {
        display: flex;
        align-items: center;
        justify-content: center;

        /* This fixes your "unordered" feel */
        width: 140px;
        height: 32px;

        border-radius: 8px;
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;

        /* Soft border instead of heavy background */
        border: 1px solid;
        background-color: rgba(var(--bg-rgb), 0.1);
    }

    /* Color Definitions */
    .status-primary {
        --bg-rgb: 13, 110, 253;
        color: #0a58ca;
    }

    /* Clean Blue */
    .status-secondary {
        --bg-rgb: 108, 117, 125;
        color: #495057;
    }

    /* Neutral Gray */
    .status-success {
        --bg-rgb: 25, 135, 84;
        color: #149b02;
    }

    /* Emerald Green */
    .status-danger {
        --bg-rgb: 220, 53, 69;
        color: #b02a37;
    }

    /* Soft Crimson */
    .status-warning {
        --bg-rgb: 255, 159, 67;
        color: #a65f00;
    }

    /* Amber/Orange */
    .status-info {
        --bg-rgb: 13, 202, 240;
        color: #087990;
    }

    /* Teal/Cyan */
    .status-dark {
        --bg-rgb: 33, 37, 41;
        color: #800448;
    }

    .btn-outline-white {
        border: 0px solid rgba(255, 255, 255, 0.6);
        color: white;
        background: transparent;
    }

    .btn-outline-white:hover {
        background: rgba(255, 255, 255, 0.1);
        color: white;
    }

    /* Onyx */
</style>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">

                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between align-items-center">
                        <h6 class="text-white ps-3"><?= $pagetitle ?></h6>
                        <div class="pe-3">
                            <!-- <a href="<?= base_url('home/job_dashboard'); ?>" class="btn btn-sm btn-outline-white mb-0">
                                <i class="fas fa-file-alt"></i>
                            </a> -->
                            <a href="<?= base_url('home/list_jobs'); ?>" class="btn btn-sm btn-outline-white mb-0">
                                <i class="fas fa-list-alt"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body px-4 py-3">
                    <div class="table-responsive">
                        <table class="table table-hover align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th>Sl.No</th>
                                    <th>Job No</th>
                                    <th>Client</th>
                                    <th>Job Title</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($jobs)): $i = 1;
                                    foreach ($jobs as $job): ?>
                                        <tr onclick="window.location='<?= site_url('home/job_timeline/' . $job['id']) ?>';"
                                            style="cursor: pointer;"
                                            class="job-row-hover">
                                            <td><?= $start + $i++ ?></td>
                                            <td>
                                                <a href="<?= site_url('home/job_timeline/' . $job['id']) ?>" class="fw-bold text-primary">
                                                    <?= $job['job_number'] ?>
                                                </a>
                                            </td>
                                            <td><?= $job['client_name'] ?></td>
                                            <td><?= $job['job_name'] ?></td>

                                            <td>
                                                <?php
                                                $jStat = (int) $job['job_status'];
                                                $aStat = isset($job['approval_status']) ? (int)$job['approval_status'] : null;
                                                $pStat = (int) $job['is_paid'];
                                                $mStat = isset($job['progress_status']) ? (int)$job['progress_status'] : -1;

                                                $currentStatusLabel = null;
                                                $badgeClass = null;

                                                /* ===== PRIORITY: LATEST STAGE FIRST ===== */

                                                // 1️⃣ Delivered
                                                if ($jStat === 8 && $pStat === 2) {
                                                    $currentStatusLabel = 'Delivered';
                                                    $badgeClass = 'success';
                                                }

                                                // 2️⃣ Final Settlement Done
                                                // elseif ($jStat >= 5 && $pStat === 2) {
                                                //     $currentStatusLabel = 'Final Settlement Done';
                                                //     $badgeClass = 'success';
                                                // }

                                                // 3️⃣ Completed – Payment Pending
                                                // elseif ($jStat >= 5 && $pStat < 2) {
                                                //     $currentStatusLabel = 'Completed – Payment Pending';
                                                //     $badgeClass = 'danger';
                                                // }

                                                // 4️⃣ Maintenance Stage
                                                elseif ($jStat >= 4 && $mStat >= 10) {
                                                    $labels = [0 => 'Repaired', 1 => 'Replaced', 2 => 'Repaired & Replaced'];
                                                    $currentStatusLabel = 'Work in Progress';
                                                    // $currentStatusLabel = $labels[$mStat];
                                                    $badgeClass = 'dark';
                                                }

                                                // 5️⃣ Job Started
                                                elseif ($jStat >= 4) {
                                                    $currentStatusLabel = 'Job Started';
                                                    $badgeClass = 'warning';
                                                }
                                                // 8️⃣ Quotation Sent
                                                elseif ($aStat === 10 && $jStat === 0) {
                                                    $currentStatusLabel = 'Quote Sent';
                                                    $badgeClass = 'info';
                                                }

                                                // 9️⃣ Quotation Cancelled
                                                elseif ($aStat === 12 && $jStat === 0) {
                                                    $currentStatusLabel = 'Quote Cancelled';
                                                    $badgeClass = 'danger';
                                                }

                                                // 6️⃣ Quotation Approved (Before Payment)
                                                elseif ($aStat === 11 && $jStat === 0) {
                                                    $currentStatusLabel = 'Quote Approved';
                                                    $badgeClass = 'primary';
                                                }


                                                // 7️⃣ Payment Before Completion
                                                // elseif ($aStat === 1 && $pStat === 2 && $jStat < 5) {
                                                //     $currentStatusLabel = 'Paid in Full';
                                                //     $badgeClass = 'primary';
                                                // } elseif ($aStat === 1 && $pStat === 1 && $jStat < 5) {
                                                //     $currentStatusLabel = 'Advance Paid';
                                                //     $badgeClass = 'primary';
                                                // } elseif ($aStat === 1 && $pStat === 0 && $jStat < 4) {
                                                //     $currentStatusLabel = 'Not Paid';
                                                //     $badgeClass = 'secondary';
                                                // }

                                                // 🔟 New Job
                                                elseif ($aStat === null && $jStat === 0) {
                                                    $currentStatusLabel = 'New Job';
                                                    $badgeClass = 'secondary';
                                                }

                                                // Output badge
                                                if ($currentStatusLabel != null): ?>
                                                    <div class="status-container status-<?php echo $badgeClass; ?>">
                                                        <div class="text-truncate px-2">
                                                            <?php echo $currentStatusLabel; ?>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>

                                            </td>

                                        </tr>
                                    <?php endforeach;
                                else: ?>
                                    <tr>
                                        <td colspan="5" class="text-center text-muted">No jobs found</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- Pagination (same style as lab images) -->
                    <nav aria-label="Pagination">
                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <ul class="pagination mb-0">

                                <li class="page-item <?= ($start <= 0) ? 'disabled' : '' ?>">
                                    <a class="page-link" href="<?= ($start > 0) ? current_url() . '?per_page=' . ($start - $perPage) . $suffix : '1' ?>">
                                        <i class="fa fa-arrow-circle-left"></i>
                                    </a>
                                </li>

                                <?php for ($counter = 0; $counter < $totalPages; $counter++):
                                    $offset = $counter * $perPage; ?>
                                    <li class="page-item <?= ($offset == $start) ? 'active' : '' ?>">
                                        <a class="page-link" href="<?= current_url() . '?per_page=' . $offset . $suffix ?>">
                                            <?= $counter + 1 ?>
                                        </a>
                                    </li>
                                <?php endfor; ?>

                                <li class="page-item <?= ($start + $perPage >= $totalRows) ? 'disabled' : '' ?>">
                                    <a class="page-link" href="<?= ($start + $perPage < $totalRows) ? current_url() . '?per_page=' . ($start + $perPage) . $suffix : '#' ?>">
                                        <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </nav>
                </div>

            </div>
        </div>
    </div>
</div>
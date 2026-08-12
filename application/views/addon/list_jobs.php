<style>
    .status-dropdown-wrapper {
        position: relative;
        display: inline-block;
        width: 150px;
    }

    .status-select-premium {
        appearance: none;
        -webkit-appearance: none;
        width: 100%;
        padding: 6px 25px 6px 15px;
        font-size: 0.72rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        border-radius: 50px;
        border: 1px solid transparent;
        cursor: pointer;
        transition: all 0.3s ease;
        text-align: center;
    }

    .status-select-arrow {
        position: absolute;
        right: 12px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 0.6rem;
        pointer-events: none;
        opacity: 0.6;
    }

    /* Distinct Colors from your Config Classes */
    .st-new {
        background-color: #f0f2f5;
        color: #6c757d;
        border-color: #dee2e6;
    }

    .st-info {
        background-color: #e1f5fe;
        color: #0288d1;
        border-color: #b3e5fc;
    }

    .st-pri {
        background-color: #f3e5f5;
        color: #8e24aa;
        border-color: #e1bee7;
    }

    .st-warn {
        background-color: #fff8e1;
        color: #f57c00;
        border-color: #ffecb3;
    }

    .st-succ {
        background-color: #e8f5e9;
        color: #2e7d32;
        border-color: #c8e6c9;
    }

    .st-dark {
        background-color: #eceff1;
        color: #455a64;
        border-color: #cfd8dc;
    }

    /* Hover & Focus */
    .status-select-premium:hover {
        filter: brightness(0.95);
        box-shadow: 0 3px 8px rgba(0, 0, 0, 0.05);
    }

    .status-select-premium:focus {
        outline: none;
        box-shadow: 0 0 0 3px rgba(0, 0, 0, 0.1);
    }

    /* Reset option styles to default browser look for readability */
    .status-select-premium option {
        background: white;
        color: #333;
        text-transform: none;
        font-weight: normal;
    }

    /* Table Enhancements */
    .custom-table tbody tr {
        transition: all 0.2s ease;
    }

    .custom-table tbody tr:hover {
        background-color: #f8f9fa !important;
        transform: scale(1.002);
    }

    .job-link {
        color: #e91e63;
        /* Primary theme color */
        transition: color 0.2s;
        text-decoration: none;
    }

    .job-link:hover {
        color: #d81b60;
        text-decoration: underline;
    }

    /* Premium Badges Styling */
    .badge-premium {
        display: inline-block;
        padding: 0.55em 1.2em;
        font-size: 0.7rem;
        font-weight: 700;
        line-height: 1;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        border-radius: 50px;
        text-transform: uppercase;
        letter-spacing: 0.8px;
    }

    /* Soft Color Palette for Statuses */
    .st-new {
        background-color: #f0f2f5;
        color: #6c757d;
        border: 1px solid #dee2e6;
    }

    .st-info {
        background-color: #e1f5fe;
        color: #0288d1;
        border: 1px solid #b3e5fc;
    }

    .st-pri {
        background-color: #f3e5f5;
        color: #8e24aa;
        border: 1px solid #e1bee7;
    }

    .st-warn {
        background-color: #fff8e1;
        color: #f57c00;
        border: 1px solid #ffecb3;
    }

    .st-succ {
        background-color: #e8f5e9;
        color: #2e7d32;
        border: 1px solid #c8e6c9;
    }

    .st-dark {
        background-color: #eceff1;
        color: #455a64;
        border: 1px solid #cfd8dc;
    }

    /* Column Sizing */
    .custom-table th {
        padding: 15px 10px !important;
    }

    .custom-table td {
        padding: 12px 10px !important;
        vertical-align: middle !important;
    }

    /* Ensure the table looks good when printing */
    @media print {

        .btn {
            display: none !important;
        }

        .card {
            box-shadow: none !important;
            border: none !important;
        }

        .table-responsive {
            overflow: visible !important;
        }
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
</style>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">

                <!-- Card Header -->
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between align-items-center">
                        <h6 class="text-white text-capitalize ps-3"><?= $pagetitle ?></h6>
                        <div class="pe-3">
                            <!-- <a href="<?= base_url('home/job_dashboard'); ?>" class="btn btn-sm btn-outline-white mb-0">
                                <i class="fas fa-file-alt"></i>
                            </a> -->
                            <a href="<?= base_url('home/create_job'); ?>" class="btn btn-sm btn-outline-white mb-0">
                                <i class="fas fa-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Card Body -->
                <div class="card-body px-4 py-3">

                    <?php
                    // Default date range
                    $default_start_date = date('Y-m-d', strtotime('-1 month'));
                    $default_end_date   = date('Y-m-d');

                    $start_date_value = $this->input->get('start_date') ?: $default_start_date;
                    $end_date_value   = $this->input->get('end_date')   ?: $default_end_date;
                    ?>

                    <!-- Filter Form -->
                    <form method="get" action="<?= base_url('home/list_jobs') ?>" class="row g-1 mb-2">
                        <div class="col-md-1">
                            <input type="text" name="job_number" class="form-control form-control-sm" placeholder="Job No"
                                value="<?= htmlspecialchars($this->input->get('job_number')) ?>">
                        </div>

                        <div class="col-md-2">
                            <input type="text" name="client_name" class="form-control form-control-sm" placeholder="Client Name"
                                value="<?= htmlspecialchars($this->input->get('client_name')) ?>">
                        </div>

                        <div class="col-md-2 d-flex align-items-center">
                            <label class="form-label small text-muted me-1 mb-0">From:</label>
                            <input type="date" name="start_date" class="form-control form-control-sm" value="<?= $start_date_value ?>">
                        </div>

                        <div class="col-md-2 d-flex align-items-center">
                            <label class="form-label small text-muted me-1 mb-0">To:</label>
                            <input type="date" name="end_date" class="form-control form-control-sm" value="<?= $end_date_value ?>">
                        </div>

                        <div class="col-md-3">
                            <button type="submit" class="btn btn-sm btn-primary py-0 px-1" title="Filter">
                                <i class="fas fa-filter"></i>
                            </button>

                            <a href="<?= base_url('home/list_jobs') ?>"
                                class="btn btn-sm btn-secondary py-0 px-1" title="Reset">
                                <i class="fas fa-sync-alt"></i>
                            </a>
                        </div>
                    </form>


                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table table-hover align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th>Sl.No</th>
                                    <th>Job Title</th>
                                    <th>Client</th>
                                    <th>Assigned To</th>
                                    <th class="align-middle text-right">Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($jobs)): $i = 1;

                                    foreach ($jobs as $job):
                                        $status = (int)$job['job_status'];
                                        // Status Configuration for Premium Look

                                        $config = [
                                            // --- Phase 1: Pre-Production ---
                                            1  => ['text' => 'New Job',          'class' => 'st-new',  'icon' => 'fa-star'],
                                            2  => ['text' => 'Quotation Given',  'class' => 'st-info', 'icon' => 'fa-file-invoice-dollar'],
                                            3  => ['text' => 'Quotation Approved',         'class' => 'st-pri',  'icon' => 'fa-thumbs-up'],
                                            4  => ['text' => 'Quotation Cancelled',        'class' => 'st-err',  'icon' => 'fa-times-circle'],

                                            // --- Phase 2: Financial/Deposit ---
                                            5 => ['text' => 'Not Paid',         'class' => 'st-dark', 'icon' => 'fa-exclamation-circle'],
                                            6 => ['text' => 'Advance Paid',   'class' => 'st-bg-gradient-danger', 'icon' => 'fa-coins'],
                                            7 => ['text' => 'Fully Paid',         'class' => 'st-succ', 'icon' => 'fa-exclamation-circle'],

                                            // --- Phase 3: Technical Work ---
                                            8  => ['text' => 'Job Started',          'class' => 'st-warn', 'icon' => 'fa-tools'],
                                            9  => ['text' => 'Repaired',         'class' => 'st-dark', 'icon' => 'fa-hammer'],
                                            10 => ['text' => 'Replaced',         'class' => 'st-succ', 'icon' => 'fa-sync-alt'],
                                            11 => ['text' => 'Repaired & Replaced',        'class' => 'st-succ', 'icon' => 'fa-check-double'],
                                            12 => ['text' => 'Job Completed',        'class' => 'st-succ', 'icon' => 'fa-check-double'],

                                            // --- Phase 4: Finalization ---
                                            13 => ['text' => 'Job Delivered',        'class' => 'st-succ', 'icon' => 'fa-shipping-fast'],
                                        ]; // 2. REVERSE LOGIC: Determine which ID (1-13) matches the current DB state
                                        $activeStatus = 1; // Default to New Job

                                        // Check Job Status Column
                                        $job_status      = (int)$job['job_status'];
                                        $approval_status = $job['approval_status'] !== null ? (int)$job['approval_status'] : null;
                                        $is_paid         = $job['is_paid'] !== null ? (int)$job['is_paid'] : null;
                                        $progress_status = (int)$job['progress_status'];

                                        $activeStatus = 1; // Default: New Job

                                        if ($job_status == 0 && $approval_status === null && $is_paid === null && $progress_status == 0) {
                                            $activeStatus = 1;
                                        } elseif ($job_status == 0 && $approval_status == 10 && $is_paid === null && $progress_status == 0) {
                                            $activeStatus = 2;
                                        } elseif ($job_status == 0 && $approval_status == 11 && $is_paid === null && $progress_status == 0) {
                                            $activeStatus = 3;
                                        } elseif ($job_status == 0 && $approval_status == 12 && $is_paid === null && $progress_status == 0) {
                                            $activeStatus = 4;
                                        } elseif ($job_status == 0 && $approval_status == 11 && $is_paid == 0 && $progress_status == 0) {
                                            $activeStatus = 5;
                                        } elseif ($job_status == 0 && $approval_status == 11 && $is_paid == 1 && $progress_status == 0) {
                                            $activeStatus = 6;
                                        } elseif ($job_status < 4 && $approval_status == 11 && $is_paid == 2) {
                                            $activeStatus = 7;
                                        } elseif ($job_status == 4 && $approval_status == 11 && $progress_status == 0) {
                                            $activeStatus = 8;
                                        } elseif ($job_status == 4 && $approval_status == 11 && $progress_status == 10) {
                                            $activeStatus = 9;
                                        } elseif ($job_status == 4 && $approval_status == 11 && $progress_status == 11) {
                                            $activeStatus = 10;
                                        } elseif ($job_status == 4 && $approval_status == 11 && $progress_status == 12) {
                                            $activeStatus = 11;
                                        } elseif ($job_status == 5 && $approval_status == 11 && $progress_status >= 10) {
                                            $activeStatus = 12;
                                        } elseif ($job_status == 8 && $approval_status == 11 && $is_paid == 2 && $progress_status >= 10) {
                                            $activeStatus = 13;
                                        }

                                        $curr = isset($config[$activeStatus]) ? $config[$activeStatus] : $config[1];
                                ?>
                                        <tr>
                                            <td><?= $start + $i++ ?></td>
                                            <td><?= $job['job_name'] ?></td>
                                            <td><?= $job['client_name'] ?></td>
                                            <td><?= $job['assigned_to_name'] ?></td>

                                            <td class="align-middle text-center">
                                                <div class="status-dropdown-wrapper">
                                                    <select class="status-select-premium <?= $curr['class'] ?>"
                                                        data-job-id="<?= $job['job_id'] ?>"
                                                        onchange="updateStatusUI(this)">
                                                        <?php foreach ($config as $val => $opt): ?>
                                                            <option value="<?= $val ?>" <?= ($activeStatus == $val) ? 'selected' : '' ?>>
                                                                <?= $opt['text'] ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <i class="fas fa-chevron-down status-select-arrow"></i>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('home/job_view?id=' . $job['job_id']); ?>"
                                                    class="btn btn-link text-info px-3 mb-0">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a href="<?= base_url('home/edit_job?id=' . $job['job_id']); ?>"
                                                    class="btn btn-link text-dark px-3 mb-0">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <a href="javascript:void(0);"
                                                    class="btn btn-link text-danger px-3 mb-0"
                                                    onclick="confirmDelete('<?= $job['job_id']; ?>')" title="Delete">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach;
                                else: ?>
                                    <tr>
                                        <td colspan="8" class="text-center text-muted">No jobs found</td>
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

                </div><!-- /card-body -->

            </div>
        </div>
    </div>
</div>
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1080">
    <div id="statusToast" class="toast align-items-center text-white bg-success border-0" role="alert">
        <div class="d-flex">
            <div class="toast-body" id="toastMessage">
                Status updated successfully
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
        </div>
    </div>
</div>

<script>
    /**
     * Updates the CSS class of the select element instantly when changed
     */
    function updateStatusUI(element) {
        // Map of values to your config classes
        const classMap = {
            '0': 'st-new',
            '2': 'st-info',
            '3': 'st-pri',
            '4': 'st-warn',
            '5': 'st-succ',
            '6': 'st-succ',
            '7': 'st-dark',
            '8': 'st-succ'
        };

        // Remove all possible classes
        element.classList.remove('st-new', 'st-info', 'st-pri', 'st-warn', 'st-succ', 'st-dark');

        // Add the new class
        const newClass = classMap[element.value];
        if (newClass) {
            element.classList.add(newClass);
        }
    }

    /**
     * AJAX Call to save status to Database
     */
    $(document).on('change', '.status-select-premium', function() {
        const jobId = $(this).data('job-id');
        const status = $(this).val();
        const selectEl = $(this);
        console.log(`Updating Job ID ${jobId} to Status ${status}`);
        // Subtle loading feedback
        selectEl.css('opacity', '0.5');

        $.ajax({
            url: "<?= base_url('home/update_job_status') ?>",
            type: "POST",
            data: {
                job_id: jobId,
                job_status: status
            },
            success: function(response) {
                const res = typeof response === 'string' ? JSON.parse(response) : response;
                if (res.status === "success") {
                    selectEl.css('opacity', '1').fadeOut(100).fadeIn(100);
                    showToast("Job status updated successfully ✔");
                } else {
                    showToast(res.message || "Status update failed", "error");
                    setTimeout(() => location.reload(), 1500);
                }
            },
            error: function() {
                selectEl.css('opacity', '1');
                showToast("Server error while updating status ❌", "error");
                setTimeout(() => location.reload(), 1500);
            }
        });
    });

    function showToast(message, type = 'success') {
        const toastEl = document.getElementById('statusToast');
        const toastMsg = document.getElementById('toastMessage');

        toastMsg.innerText = message;

        toastEl.classList.remove('bg-success', 'bg-danger', 'bg-warning');
        toastEl.classList.add(type === 'error' ? 'bg-danger' : 'bg-success');

        const toast = new bootstrap.Toast(toastEl, {
            delay: 2500
        });
        toast.show();
    }

    function confirmDelete(id) {
        if (!id) return;

        if (confirm("Are you sure you want to delete this Job?")) {
            $.ajax({
                url: "<?= base_url('home/deletejob'); ?>",
                type: "POST",
                data: {
                    id: id
                },
                dataType: "json",
                success: function(res) {
                    if (res.status) {
                        showToast("Job deleted successfully ✔");
                        // Delay reload so the user can see the toast at the top
                        setTimeout(() => {
                            location.reload();
                        }, 1500);
                    } else {
                        showToast(res.message || "Failed to delete ❌", "error");
                    }
                }
            });
        }
    }
</script>
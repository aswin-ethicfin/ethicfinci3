<style>
    .inv-filter-bar {
        background: #fff;
        border: 1px solid #e9ecef;
        border-radius: 10px;
        padding: 14px 18px;
        margin-bottom: 14px;
    }

    .inv-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 12px;
    }

    .inv-table thead tr {
        background: linear-gradient(195deg, #344767, #344767);
    }

    .inv-table thead th {
        padding: 11px 9px;
        color: #fff;
        font-weight: 700;
        font-size: 10.5px;
        text-transform: uppercase;
        letter-spacing: .5px;
        white-space: nowrap;
        border: none;
    }

    .inv-table tbody tr {
        border-bottom: 1px solid #f0f2f5;
        transition: background .15s;
    }

    .inv-table tbody tr:hover {
        background: #fafbfc;
    }

    .inv-table tbody td {
        padding: 10px 9px;
        vertical-align: middle;
        color: #344767;
    }

    .inv-table tfoot td {
        padding: 9px;
        font-weight: 700;
        background: #f8f9fa;
        font-size: 12px;
    }

    .td-date-main {
        font-weight: 600;
        font-size: 12px;
        color: #344767;
    }

    .td-date-sub {
        font-size: 10px;
        color: #9ea6b8;
        margin-top: 1px;
    }

    .td-due-over {
        color: #e91e63;
        font-weight: 600;
        font-size: 12px;
    }

    .doc-icon {
        color: #344767;
        margin-right: 4px;
        font-size: 11px;
    }

    .order-badge {
        display: inline-block;
        background: #e3f2fd;
        color: #1565c0;
        border-radius: 20px;
        padding: 2px 8px;
        font-size: 10px;
        font-weight: 700;
    }

    .td-amount {
        font-weight: 700;
        font-size: 13px;
        color: #344767;
    }

    .status-badge {
        display: inline-block;
        padding: 3px 10px;
        border-radius: 20px;
        font-size: 10.5px;
        font-weight: 700;
        white-space: nowrap;
        text-transform: uppercase;
        letter-spacing: .3px;
    }

    .st-not-received {
        background: #fff3e0;
        color: #e65100;
        border: 1px solid #ffcc80;
    }

    .st-par-received {
        background: #e8f5e9;
        color: #2e7d32;
        border: 1px solid #a5d6a7;
    }

    .st-fully-paid {
        background: #e3f2fd;
        color: #1565c0;
        border: 1px solid #90caf9;
    }

    .act-btn {
        display: inline-block;
        padding: 2px 6px;
        border-radius: 3px;
        font-size: 10px;
        font-weight: 700;
        border: none;
        cursor: pointer;
        text-transform: uppercase;
        letter-spacing: .3px;
        margin: 1px;
        white-space: nowrap;
    }

    .ab-confirm {
        background: #e8f5e9;
        color: #2e7d32;
        border: 1px solid #c8e6c9;
    }

    .ab-confirm:hover {
        background: #c8e6c9;
    }

    .ab-clone {
        background: #e3f2fd;
        color: #1565c0;
        border: 1px solid #bbdefb;
    }

    .ab-clone:hover {
        background: #bbdefb;
    }

    .ab-i {
        background: #fff8e1;
        color: #f57f17;
        border: 1px solid #ffecb3;
        min-width: 22px;
        text-align: center;
    }

    .ab-edit {
        background: #f3e5f5;
        color: #6a1b9a;
        border: 1px solid #e1bee7;
    }

    .ab-edit:hover {
        background: #e1bee7;
    }

    .ab-receipt {
        background: #e0f2f1;
        color: #00695c;
        border: 1px solid #b2dfdb;
    }

    .ab-receipt:hover {
        background: #b2dfdb;
    }

    .ab-delete {
        background: #ffebee;
        color: #c62828;
        border: 1px solid #ffcdd2;
    }

    .ab-delete:hover {
        background: #ffcdd2;
    }

    .ab-view {
        background: #fce4ec;
        color: #880e4f;
        border: 1px solid #f48fb1;
    }

    .ab-view:hover {
        background: #f48fb1;
    }

    .ab-print {
        background: #eceff1;
        color: #455a64;
        border: 1px solid #cfd8dc;
    }

    .ab-print:hover {
        background: #cfd8dc;
    }

    .sl-no {
        font-size: 11px;
        color: #adb5bd;
        font-weight: 600;
    }

    .empty-inv-row td {
        text-align: center;
        padding: 30px;
        color: #adb5bd;
        font-style: italic;
        font-size: 13px;
    }

    .tbl-gear-btn {
        position: absolute;
        right: 0;
        top: 0;
        background: #344767;
        color: #fff;
        border: none;
        width: 32px;
        height: 42px;
        border-radius: 0 8px 0 4px;
        cursor: pointer;
        font-size: 13px;
    }

    .inv-totals-box {
        background: #f8f9fa;
        border: 1px solid #e9ecef;
        border-radius: 8px;
        padding: 14px 20px;
        min-width: 300px;
    }

    .inv-totals-row {
        display: flex;
        justify-content: space-between;
        padding: 4px 0;
        font-size: 12.5px;
        color: #344767;
    }

    .inv-totals-row.grand {
        border-top: 2px solid #dee2e6;
        margin-top: 6px;
        padding-top: 10px;
        font-size: 15px;
        font-weight: 700;
        color: #e91e63;
    }

    .inv-page-banner {
        background: linear-gradient(135deg, #e91e63, #c2185b);
        border-radius: 10px;
        padding: 14px 22px;
        margin-bottom: 16px;
    }

    .inv-page-banner h5 {
        color: #fff;
        font-weight: 700;
        font-size: 16px;
        margin: 0;
    }

    .job-pill {
        display: inline-block;
        background: rgba(255, 255, 255, .18);
        color: #fff;
        border-radius: 20px;
        padding: 3px 12px;
        font-size: 11px;
        font-weight: 600;
        margin: 2px;
        border: 1px solid rgba(255, 255, 255, .3);
    }

    .field-label {
        font-size: 10px !important;
        font-weight: 700 !important;
        color: #7b809a !important;
        text-transform: uppercase;
        letter-spacing: .5px;
        margin-bottom: 3px !important;
        display: block;
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
                    <div class="card-body px-4 py-4">

                        <!-- Pink "Invoices" banner -->
                        <!-- <div class="inv-page-banner d-flex align-items-center justify-content-between flex-wrap gap-2">
                        <h5><i class="fas fa-file-invoice-dollar me-2"></i>Invoices</h5>
                        <div>
                            <span class="job-pill">
                                <i class="fas fa-list me-1"></i><?= count($jobs) ?> Draft(s)
                            </span>
                            <span class="job-pill" style="background:rgba(255,235,59,.25);border-color:rgba(255,235,59,.5)">
                                <i class="fas fa-clock me-1"></i>Pending Confirmation
                            </span>
                        </div>
                    </div> -->

                        <!-- Filter Bar -->
                        <div class="inv-filter-bar">
                            <div class="row g-2 align-items-end">
                                <div class="col-md-2">
                                    <label class="field-label">Branch</label>
                                    <select class="form-select form-select-sm">
                                        <option value="">Select Branches</option>
                                        <?php foreach ($branches as $branch): ?>
                                            <option value="<?= $branch['id'] ?>">
                                                <?= htmlspecialchars($branch['name']) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label class="field-label">Customer</label>
                                    <select class="form-select form-select-sm" name="client_name" required>
                                        <option value="">Select Customer</option>
                                        <?php foreach ($customers as $customer): ?>
                                            <option value="<?= $customer['id'] ?>"><?= htmlspecialchars($customer['name']) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label class="field-label">Salesperson</label>
                                    <select class="form-select form-select-sm">
                                        <option value="">Select Employee</option>
                                        <?php foreach ($employees as $employee): ?>
                                            <option value="<?= $employee['id'] ?>">
                                                <?= htmlspecialchars($employee['name']) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-1">
                                    <label class="field-label">From</label>
                                    <div class="input-group input-group-sm">
                                        <input type="date" class="form-control"
                                            value="<?= date('Y-m-d', strtotime('-1 month')) ?>">
                                        <span class="input-group-text" style="padding:2px 6px">
                                            <i class="fas fa-calendar" style="font-size:10px"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label class="field-label">To</label>
                                    <div class="input-group input-group-sm">
                                        <input type="date" class="form-control"
                                            value="<?= date('Y-m-d') ?>">
                                        <span class="input-group-text" style="padding:2px 6px">
                                            <i class="fas fa-calendar" style="font-size:10px"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-auto">

                                </div>
                                <div class="col-md-2">
                                    <label class="field-label mb-0">Search</label>
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control"
                                            id="tbl-search" placeholder="Job no, customer...">
                                        <button class="btn btn-sm btn-primary px-3">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- Search -->
                            <div class="row g-2 mt-1 align-items-center">
                                <!-- <div class="col-auto">
                                    <label class="field-label mb-0">Search</label>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control"
                                            id="tbl-search" placeholder="Job no, customer...">
                                        <button class="btn btn-sm btn-primary px-3">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div> -->
                            </div>
                        </div>

                        <!-- Table -->
                        <div class="position-relative">
                            <div class="table-responsive" style="border-radius:8px;overflow:hidden;border:1px solid #e9ecef">
                                <table class="inv-table" id="inv-draft-table">
                                    <thead>
                                        <tr>
                                            <th style="width:36px">#</th>
                                            <th style="min-width:130px">Date</th>
                                            <th style="min-width:110px">Due Date</th>
                                            <th style="min-width:100px">Branch</th>
                                            <th style="min-width:110px">Job Number</th>
                                            <th style="min-width:140px">Doc. No</th>
                                            <th style="min-width:70px">Order No</th>
                                            <th style="min-width:150px">Select Customer</th>
                                            <th style="min-width:110px">Amount</th>
                                            <th style="min-width:130px">Received+Discount</th>
                                            <th style="min-width:90px">Balance</th>
                                            <th style="min-width:110px">Status</th>
                                            <th style="min-width:270px"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($jobs)): ?>
                                            <?php foreach ($jobs as $idx => $job):
                                                // ── Amounts from job row ──────────────────────────────
                                                // grand_total is in tbl_maintenance_job; fall back to
                                                // estimated_cost if grand_total is 0 (not yet computed)
                                                $row_grand   = (float)$job['grand_total'];
                                                if ($row_grand == 0) {
                                                    // $row_grand = (float)$job['estimated_cost'];
                                                }
                                                // $row_disc    = (float)$job['discount'];
                                                $row_tax     = (float)$job['vat'];
                                                $row_balance = $row_grand; // no receipts yet in draft

                                                // ── Status badge ──────────────────────────────────────
                                                $is_paid = $job['paid'];
                                                if ($is_paid == 2) {
                                                    $status_class = 'st-fully-paid';
                                                    $status_text  = 'Fully Paid';
                                                } elseif ($is_paid == 1) {
                                                    $status_class = 'st-par-received';
                                                    $status_text  = 'Par Received';
                                                } else {
                                                    $status_class = 'st-not-received';
                                                    $status_text  = 'Not Received';
                                                }

                                                // ── Due date ──────────────────────────────────────────
                                                // $due_date    = $job['estimated_delivery_date'] ?? '';
                                                $due_is_past = !empty($due_date)
                                                    && $due_date !== '0000-00-00'
                                                    && strtotime($due_date) < strtotime('today');
                                            ?>
                                                <tr>
                                                    <td><span class="sl-no"><?= $idx + 1 ?></span></td>

                                                    <!-- Date -->
                                                    <td>
                                                        <div class="td-date-main">
                                                            <!-- <?= date('d-M-Y', strtotime($job['recieved_date'])) ?> -->
                                                        </div>
                                                        <div class="td-date-sub">
                                                            <!-- <?= date('h:i A', strtotime($job['datetime'])) ?> -->
                                                        </div>
                                                        <div class="td-date-sub">
                                                            <!-- <?= 'User #' . (int)$job['added_by'] ?> -->
                                                        </div>
                                                    </td>

                                                    <!-- Due Date — red if overdue -->
                                                    <td>
                                                        <?php if (!empty($due_date) && $due_date !== '0000-00-00'): ?>
                                                            <span class="<?= $due_is_past ? 'td-due-over' : 'td-date-main' ?>">
                                                                <?= date('d-M-Y', strtotime($due_date)) ?>
                                                            </span>
                                                        <?php else: ?>
                                                            <span style="color:#adb5bd">—</span>
                                                        <?php endif; ?>
                                                    </td>

                                                    <!-- Branch -->
                                                    <td style="font-size:12px;font-weight:600">
                                                        MAIN<br>
                                                        <span style="font-size:10px;color:#9ea6b8;font-weight:400">COMPANY</span>
                                                    </td>

                                                    <!-- Job Number -->
                                                    <td>
                                                        <span style="font-weight:700;color:#344767;font-size:12px">
                                                            <!-- <?= htmlspecialchars($job['job_number']) ?> -->
                                                        </span>
                                                    </td>

                                                    <!-- Doc No -->
                                                    <td>
                                                        <i class="fas fa-file-invoice doc-icon"></i>
                                                        <span style="font-weight:600;color:#344767;font-size:12px">DRAFT</span>
                                                        <div style="font-size:10px;color:#9ea6b8">Pending</div>
                                                    </td>

                                                    <!-- Order No — inv_id from job row -->
                                                    <td>
                                                        <span class="order-badge"><?= (int)$job['inv_id'] ?></span>
                                                    </td>

                                                    <!-- Customer — client_name from join -->
                                                    <td style="font-weight:700;font-size:12px;color:#344767">
                                                        <?= htmlspecialchars($job['client_name'] ?? '') ?>
                                                    </td>

                                                    <!-- Amount -->
                                                    <td>
                                                        <span class="td-amount"><?= number_format($row_grand, 2) ?></span>
                                                        <span style="font-size:10px;color:#9ea6b8;margin-left:2px">SAR</span>
                                                    </td>

                                                    <!-- Received + Discount -->
                                                    <td style="color:#7b809a;font-size:12px">
                                                        <!-- <?= number_format($row_disc, 2) ?> -->
                                                    </td>

                                                    <!-- Balance -->
                                                    <td>
                                                        <span style="font-weight:700;font-size:13px;color:#344767">
                                                            <?= number_format($row_balance, 2) ?>
                                                        </span>
                                                    </td>

                                                    <!-- Status -->
                                                    <td>
                                                        <span class="status-badge <?= $status_class ?>">
                                                            <?= $status_text ?>
                                                        </span>
                                                    </td>

                                                    <!-- Actions -->
                                                    <td>
                                                        <!-- <button class="act-btn ab-confirm"
                                                            onclick="openInvoiceModal(
                                                        <?= (int)$job['id'] ?>,
                                                        '<?= addslashes($job['job_number']) ?>',
                                                        '<?= addslashes($job['client_name'] ?? '') ?>',
                                                        <?= $row_grand ?>,
                                                        '<?= $due_date ?>'
                                                    )">CONFIRM</button> -->

                                                        <button class="act-btn ab-clone">CLONE</button>

                                                        <!-- <button class="act-btn ab-i"
                                                            onclick="viewItems(<?= (int)$job['id'] ?>, '<?= addslashes($job['job_number']) ?>')"
                                                            title="View Items">
                                                            <i class="fas fa-info"></i>
                                                        </button> -->

                                                        <!-- <button class="act-btn ab-edit"
                                                            onclick="location.href='<?= base_url('jobmanagement/editjob?id=' . $job['id']) ?>'">
                                                            EDIT
                                                        </button> -->

                                                        <button class="act-btn ab-receipt">RECEIPT</button>

                                                        <button class="act-btn ab-delete"
                                                            onclick="confirmDraftDelete(<?= (int)$job['inv_id'] ?>)">
                                                            DELETE
                                                        </button>

                                                        <!-- <button class="act-btn ab-view"
                                                            onclick="viewItems(<?= (int)$job['id'] ?>, '<?= addslashes($job['job_number']) ?>')">
                                                            VIEW
                                                        </button> -->

                                                        <button class="act-btn ab-print"
                                                            onclick="window.print()">PRINT</button>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr class="empty-inv-row">
                                                <td colspan="13">No invoice drafts found.</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                    <tfoot>
                                        <?php
                                        $pg_total = 0;
                                        $pg_disc = 0;
                                        $pg_vat = 0;
                                        foreach ($jobs as $j) {
                                            // $gt = (float)$j['grand_total'] ?: (float)$j['estimated_cost'];
                                            // $pg_total += $gt;
                                            // $pg_disc  += (float)$j['discount'];
                                            $pg_vat   += (float)$j['vat'];
                                        }
                                        ?>
                                        <!-- <tr>
                                        <td colspan="8" style="text-align:right;color:#7b809a;font-size:10px;text-transform:uppercase;letter-spacing:.5px">
                                            Page Totals
                                        </td>
                                        <td>
                                            <span style="font-weight:700"><?= number_format($pg_total, 2) ?></span>
                                            <span style="font-size:10px;color:#9ea6b8"> SAR</span>
                                        </td>
                                        <td style="color:#e91e63;font-weight:700"><?= number_format($pg_disc, 2) ?></td>
                                        <td style="color:#2e7d32;font-weight:700"><?= number_format($pg_total, 2) ?></td>
                                        <td colspan="2"></td>
                                    </tr> -->
                                    </tfoot>
                                </table>
                            </div>

                            <!-- Gear button -->
                            <button class="tbl-gear-btn" title="Column Settings">
                                <i class="fas fa-cog"></i>
                            </button>
                        </div>

                        <!-- Grand Totals Box -->
                        <!-- <div class="d-flex justify-content-end mt-3">
                        <div class="inv-totals-box">
                            <div class="inv-totals-row">
                                <span>Subtotal</span>
                                <span><?= number_format($pg_total + $pg_disc, 2) ?> SAR</span>
                            </div>
                            <div class="inv-totals-row">
                                <span>Total Discount</span>
                                <span style="color:#e91e63">- <?= number_format($pg_disc, 2) ?> SAR</span>
                            </div>
                            <div class="inv-totals-row">
                                <span>Total Tax (VAT)</span>
                                <span style="color:#1565c0"><?= number_format($pg_vat, 2) ?> SAR</span>
                            </div>
                            <div class="inv-totals-row grand">
                                <span>Grand Total</span>
                                <span><?= number_format($pg_total, 2) ?> SAR</span>
                            </div>
                        </div>
                    </div> -->

                    </div><!-- /card-body -->
                </div>

            </div>
        </div>
    </div>

    <!-- ══════════════════════════════════════════════════════
     MODAL 1 — Confirm / Create Invoice
══════════════════════════════════════════════════════ -->
    <div class="modal fade" id="createInvoiceModal" tabindex="-1">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content" style="border-radius:12px;overflow:hidden">

                <div class="modal-header" style="background:linear-gradient(135deg,#344767,#3d5382);padding:16px 24px">
                    <div>
                        <h6 class="modal-title text-white mb-0">
                            <i class="fas fa-file-invoice-dollar me-2"></i>Create Invoice from Job
                        </h6>
                        <small class="text-white-50" id="modal-job-subtitle">—</small>
                    </div>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body" style="padding:20px 24px">

                    <div class="alert py-2 mb-3 d-flex align-items-center gap-3"
                        style="background:#e8f5e9;border:1px solid #c8e6c9;border-radius:8px;font-size:12px">
                        <i class="fas fa-check-circle text-success" style="font-size:18px"></i>
                        <div>
                            <strong>Job:</strong> <span id="modal-job-no">—</span> &nbsp;|&nbsp;
                            <strong>Customer:</strong> <span id="modal-customer">—</span> &nbsp;|&nbsp;
                            <strong>Grand Total:</strong>
                            <strong style="color:#e91e63;font-size:14px" id="modal-grand-total">0.00 SAR</strong>
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-3">
                            <label class="field-label">Invoice Date <span style="color:red">*</span></label>
                            <input type="date" class="form-control form-control-sm" id="inv-date"
                                value="<?= date('Y-m-d') ?>" required>
                        </div>
                        <div class="col-md-3">
                            <label class="field-label">Due Date</label>
                            <input type="date" class="form-control form-control-sm" id="inv-due-date">
                        </div>
                        <div class="col-md-3">
                            <label class="field-label">Payment Terms</label>
                            <select class="form-select form-select-sm" id="inv-terms">
                                <option value="">-- Select --</option>
                                <option>Net 15</option>
                                <option>Net 30</option>
                                <option>Net 45</option>
                                <option>Immediate</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="field-label">Notes</label>
                            <input type="text" class="form-control form-control-sm" id="inv-notes"
                                placeholder="Optional notes">
                        </div>
                    </div>

                    <!-- Items loaded via AJAX -->
                    <div id="modal-items-loading" class="text-center py-4 text-muted">
                        <i class="fas fa-spinner fa-spin me-2"></i>Loading items...
                    </div>
                    <div id="modal-items-table" style="display:none;border-radius:8px;overflow:hidden;border:1px solid #e9ecef"></div>

                </div>

                <div class="modal-footer" style="padding:12px 24px;background:#f8f9fa">
                    <div class="d-flex align-items-center justify-content-between w-100">
                        <div style="font-size:12px;color:#7b809a">
                            <i class="fas fa-info-circle me-1"></i>
                            This will create a confirmed invoice and mark the job as invoiced.
                        </div>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary"
                                data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-sm btn-success px-4" id="btn-create-inv"
                                onclick="submitCreateInvoice()">
                                <i class="fas fa-check me-1"></i> OK — Create Invoice
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- ══════════════════════════════════════════════════════
     MODAL 2 — View Items
══════════════════════════════════════════════════════ -->
    <div class="modal fade" id="viewItemsModal" tabindex="-1">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content" style="border-radius:12px;overflow:hidden">
                <div class="modal-header" style="background:linear-gradient(135deg,#344767,#3d5382)">
                    <h6 class="modal-title text-white mb-0" id="view-modal-title">
                        <i class="fas fa-list me-2"></i>Job Items
                    </h6>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-0">
                    <div id="view-items-content" class="text-center py-4 text-muted">
                        <i class="fas fa-spinner fa-spin me-2"></i>Loading...
                    </div>
                </div>
                <div class="modal-footer" style="background:#f8f9fa">
                    <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        let _activeJobId = null;

        // ── Open Confirm / Create Invoice modal ───────────────────────────────────
        function openInvoiceModal(jobId, jobNo, customer, grandTotal, dueDate) {
            _activeJobId = jobId;

            document.getElementById('modal-job-subtitle').textContent = jobNo + ' — ' + customer;
            document.getElementById('modal-job-no').textContent = jobNo;
            document.getElementById('modal-customer').textContent = customer;
            document.getElementById('modal-grand-total').textContent = parseFloat(grandTotal).toFixed(2) + ' SAR';
            document.getElementById('inv-due-date').value = dueDate || '';

            // Load items
            const loading = document.getElementById('modal-items-loading');
            const target = document.getElementById('modal-items-table');
            loading.style.display = 'block';
            target.style.display = 'none';

            $.ajax({
                url: '<?= base_url("jobmanagement/getjobitemshtml") ?>',
                type: 'GET',
                data: {
                    job_id: jobId
                },
                success: function(html) {
                    loading.style.display = 'none';
                    target.innerHTML = html;
                    target.style.display = 'block';
                },
                error: function() {
                    loading.style.display = 'none';
                    target.innerHTML = '<p class="text-center text-danger p-3">Failed to load items.</p>';
                    target.style.display = 'block';
                }
            });

            new bootstrap.Modal(document.getElementById('createInvoiceModal')).show();
        }

        // ── View Items modal ──────────────────────────────────────────────────────
        function viewItems(jobId, jobNo) {
            document.getElementById('view-modal-title').innerHTML =
                '<i class="fas fa-list me-2"></i>Job Items — ' + jobNo;
            document.getElementById('view-items-content').innerHTML =
                '<div class="text-center py-4 text-muted"><i class="fas fa-spinner fa-spin me-2"></i>Loading...</div>';

            new bootstrap.Modal(document.getElementById('viewItemsModal')).show();

            $.ajax({
                url: '<?= base_url("jobmanagement/getjobitemshtml") ?>',
                type: 'GET',
                data: {
                    job_id: jobId
                },
                success: function(html) {
                    document.getElementById('view-items-content').innerHTML = html;
                },
                error: function() {
                    document.getElementById('view-items-content').innerHTML =
                        '<p class="text-center text-danger p-4">Failed to load items.</p>';
                }
            });
        }

        // ── Submit invoice creation ───────────────────────────────────────────────
        function submitCreateInvoice() {
            const invDate = document.getElementById('inv-date').value;
            const invDueDate = document.getElementById('inv-due-date').value;
            const invNotes = document.getElementById('inv-notes').value;

            if (!invDate) {
                showToast('Please select an invoice date.', 'error');
                return;
            }
            if (!_activeJobId) {
                showToast('No job selected.', 'error');
                return;
            }

            const btn = document.getElementById('btn-create-inv');
            btn.disabled = true;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i> Creating...';

            $.ajax({
                url: '<?= base_url("jobmanagement/saveinvoicefromjob") ?>',
                type: 'POST',
                dataType: 'json',
                data: {
                    job_id: _activeJobId,
                    inv_date: invDate,
                    due_date: invDueDate,
                    notes: invNotes,
                },
                success: function(res) {
                    btn.disabled = false;
                    btn.innerHTML = '<i class="fas fa-check me-1"></i> OK — Create Invoice';

                    if (res.status === 'success') {
                        bootstrap.Modal.getInstance(
                            document.getElementById('createInvoiceModal')
                        ).hide();
                        showToast('Invoice created successfully ✔');
                        setTimeout(() => {
                            window.location.href = res.redirect_url;
                        }, 1200);
                    } else if (res.status === 'already_invoiced') {
                        if (confirm('Invoice already exists for this job. View it?')) {
                            window.location.href = res.redirect_url;
                        }
                    } else {
                        showToast(res.message || 'Failed to create invoice ❌', 'error');
                    }
                },
                error: function() {
                    btn.disabled = false;
                    btn.innerHTML = '<i class="fas fa-check me-1"></i> OK — Create Invoice';
                    showToast('Server error ❌', 'error');
                }
            });
        }

        // ── Delete draft ──────────────────────────────────────────────────────────
        function confirmDraftDelete(jobId) {
            if (confirm('Delete this draft? This cannot be undone.')) {
                $.ajax({
                    url: '<?= base_url("jobmanagement/deletejob") ?>',
                    type: 'POST',
                    data: {
                        id: jobId
                    },
                    dataType: 'json',
                    success: function(res) {
                        if (res.status) {
                            showToast('Draft deleted ✔');
                            setTimeout(() => location.reload(), 1200);
                        } else {
                            showToast(res.message || 'Failed to delete ❌', 'error');
                        }
                    }
                });
            }
        }

        // ── Live search ───────────────────────────────────────────────────────────
        document.getElementById('tbl-search').addEventListener('input', function() {
            const q = this.value.toLowerCase();
            const rows = document.querySelectorAll('#inv-draft-table tbody tr:not(.empty-inv-row)');
            rows.forEach(r => {
                r.style.display = r.textContent.toLowerCase().includes(q) ? '' : 'none';
            });
        });
    </script>
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
        font-size: 18px;
        font-weight: 600;
        letter-spacing: 0.3px;
    }

    /* Premium Job Detail Styles */
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

    /* Items Table */
    .items-view-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 12.5px;
    }

    .items-view-table thead tr {
        background: linear-gradient(195deg, #344767, #344767);
    }

    .items-view-table thead th {
        padding: 10px 8px;
        color: #fff;
        font-weight: 600;
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: .5px;
        white-space: nowrap;
        text-align: left;
    }

    .items-view-table tbody tr {
        border-bottom: 1px solid #f0f2f5;
        transition: background .15s;
    }

    .items-view-table tbody tr:hover {
        background: #fafafa;
    }

    .items-view-table tfoot td {
        padding: 8px;
        font-weight: 600;
        background: #f8f9fa;
    }

    .totals-box {
        background: #f8f9fa;
        border: 1px solid #e9ecef;
        border-radius: 8px;
        padding: 14px 20px;
        min-width: 280px;
    }

    .totals-row {
        display: flex;
        justify-content: space-between;
        padding: 4px 0;
        font-size: 13px;
        color: #344767;
    }

    .totals-row.grand {
        border-top: 1px solid #dee2e6;
        margin-top: 6px;
        padding-top: 10px;
        font-size: 15px;
        font-weight: 700;
        color: #e91e63;
    }

    .empty-items td {
        text-align: center;
        padding: 24px;
        color: #adb5bd;
        font-style: italic;
    }
</style>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-lg-12 mx-auto">

            <!-- ── Job Details Card ───────────────────────────────────── -->
            <div class="card shadow-lg border-radius-xl mb-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between align-items-center px-3">

                        <!-- Left: two-line layout -->
                        <div>
                            <h6 class="text-white mb-1" style="font-size:13px;">
                                <?= $pagetitle ?> : <?= htmlspecialchars($job['job_name']) ?>
                            </h6>
                            <span class="badge bg-white text-primary fw-bold ms-0" style="font-size:12px;">
                                <?= htmlspecialchars($job['job_number']) ?>
                            </span>
                        </div>

                        <!-- Right: buttons -->
                        <div class="d-flex align-items-center gap-2">
                            <a href="<?= site_url('jm/printjob?id=' . $job['job_id']) ?>"
                                target="_blank"
                                class="btn btn-sm bg-white text-primary py-1 px-3"
                                style="font-size:12px;">
                                <i class="fas fa-print me-1"></i> Print PDF
                            </a>
                        </div>

                    </div>
                </div>

                <div class="card-body p-4">

                    <!-- Job Info Grid -->
                    <div class="row">

                        <!-- Left Column -->
                        <div class="col-md-6 border-end">
                            <div class="detail-row">
                                <div class="detail-label">Job Type</div>
                                <div class="detail-value">
                                    <span class="status-pill"><?= $job['job_type'] == 0 ? 'Maintenance' : 'Service' ?></span>
                                </div>
                            </div>
                            <div class="detail-row">
                                <div class="detail-label">Received On</div>
                                <div class="detail-value"><?= date('d M Y', strtotime($job['recieved_date'])) ?></div>
                            </div>
                            <div class="detail-row">
                                <div class="detail-label">Assigned To</div>
                                <div class="detail-value">
                                    <i class="fas fa-user-circle text-muted me-2"></i>
                                    <?= htmlspecialchars($job['assigned_to_name']) ?>
                                </div>
                            </div>
                            <div class="detail-row">
                                <div class="detail-label">Scope & Description</div>
                                <div class="detail-value">
                                    <div class="description-box"><?= nl2br(htmlspecialchars($job['remark'])) ?> <br><?= nl2br(htmlspecialchars($job['description'])) ?></div>
                                </div>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="col-md-6 ps-md-4">
                            <div class="detail-row">
                                <div class="detail-label">Customer</div>
                                <div class="detail-value text-primary"><?= htmlspecialchars($job['client_name']) ?></div>
                            </div>
                            <div class="detail-row">
                                <div class="detail-label">Est. Delivery</div>
                                <div class="detail-value text-danger">
                                    <i class="far fa-clock me-1"></i>
                                    <?= date('d M Y', strtotime($job['estimated_delivery_date'])) ?>
                                </div>
                            </div>
                            <div class="detail-row">
                                <div class="detail-label">Est. Cost</div>
                                <div class="detail-value cost-text">
                                    ₹ <?= number_format($job['estimated_cost'], 2) ?>
                                </div>
                            </div>
                            <!-- Action Buttons -->
                            <div class="mt-4 d-flex gap-2 flex-wrap">
                                <a href="<?= base_url('jm/editjob?id=' . $job['job_id']) ?>"
                                    class="btn btn-primary px-4 shadow-sm">
                                    <i class="fas fa-edit me-1"></i> Edit Details
                                </a>
                                <a href="<?= base_url('jm/listjobs') ?>"
                                    class="btn btn-outline-secondary px-4">
                                    <i class="fas fa-arrow-left me-1"></i> Back to List
                                </a>
                            </div>
                        </div>

                    </div><!-- /row -->
                </div><!-- /card-body -->
            </div><!-- /job details card -->
            <?php if (!empty($items)): ?>
                <!-- ── Line Items Card ────────────────────────────────────── -->
                <div class="card shadow-lg border-radius-xl">

                    <div class="card-body p-4">
                        <div class="table-responsive">
                            <table class="items-view-table">
                                <thead>
                                    <tr>
                                        <th style="width:35px; text-align:center">Sl.No</th>
                                        <th style="min-width:160px; text-align:left">Product / Description</th>
                                        <th style="width:80px; text-align:right">MRP</th>
                                        <th style="width:80px; text-align:right">Price</th>
                                        <th style="width:60px; text-align:center">Qty</th>
                                        <th style="width:60px; text-align:center">Unit</th>
                                        <th style="width:70px; text-align:right">Disc %</th>
                                        <th style="width:75px; text-align:right">Disc Amt</th>
                                        <th style="width:80px; text-align:right">Taxable</th>
                                        <th style="width:60px; text-align:right">Tax %</th>
                                        <th style="width:75px; text-align:right">Tax Amt</th>
                                        <th style="width:90px; text-align:right">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($items)): ?>
                                        <?php
                                        $sum_taxable = 0;
                                        $sum_tax     = 0;
                                        $sum_total   = 0;
                                        $sum_disc    = 0;
                                        ?>
                                        <?php foreach ($items as $idx => $item): ?>
                                            <?php
                                            $sum_taxable += (float)($item['taxable']     ?? 0);
                                            $sum_tax     += (float)($item['vat_amt']     ?? 0);
                                            $sum_total   += (float)($item['total_price'] ?? 0);
                                            $sum_disc    += (float)($item['disc_amt']    ?? 0);
                                            ?>
                                            <tr>
                                                <td style="text-align:center">
                                                    <span style="font-size:11px;color:#7b809a;font-weight:600">
                                                        <?= $idx + 1 ?>
                                                    </span>
                                                </td>
                                                <td style="text-align:left">
                                                    <div style="font-weight:600;color:#344767;font-size:12px">
                                                        <?= htmlspecialchars($item['item_name'] ?? '') ?>
                                                    </div>
                                                    <?php if (!empty($item['description'])): ?>
                                                        <div style="font-size:11px;color:#7b809a">
                                                            <?= htmlspecialchars($item['description']) ?>
                                                        </div>
                                                    <?php endif; ?>
                                                    <?php if (!empty($item['remark'])): ?>
                                                        <div style="font-size:10px;color:#adb5bd;font-style:italic">
                                                            <?= htmlspecialchars($item['remark']) ?>
                                                        </div>
                                                    <?php endif; ?>
                                                </td>
                                                <td style="text-align:right;color:#7b809a">
                                                    <?= number_format((float)($item['mrp'] ?? 0), 2) ?>
                                                </td>
                                                <td style="text-align:right">
                                                    <?= number_format((float)($item['price'] ?? 0), 2) ?>
                                                </td>
                                                <td style="text-align:center">
                                                    <?= $item['quantity'] ?? 1 ?>
                                                </td>
                                                <td style="text-align:center;color:#7b809a">
                                                    <?= $item['unit_name'] ?? '-' ?>
                                                </td>
                                                <td style="text-align:right;color:#e91e63">
                                                    <?= number_format((float)($item['disc_perc'] ?? 0), 2) ?>%
                                                </td>
                                                <td style="text-align:right;color:#e91e63">
                                                    <?= number_format((float)($item['disc_amt'] ?? 0), 2) ?>
                                                </td>
                                                <td style="text-align:right">
                                                    <?= number_format((float)($item['taxable'] ?? 0), 2) ?>
                                                </td>
                                                <td style="text-align:right;color:#1565c0">
                                                    <?= number_format((float)($item['vat_perc'] ?? 0), 2) ?>%
                                                </td>
                                                <td style="text-align:right;color:#1565c0">
                                                    <?= number_format((float)($item['vat_amt'] ?? 0), 2) ?>
                                                </td>
                                                <td style="text-align:right">
                                                    <strong style="color:#2e7d32">
                                                        <?= number_format((float)($item['total_price'] ?? 0), 2) ?>
                                                    </strong>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr class="empty-items">
                                            <td colspan="12" style="text-align:center">No items found for this job.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>

                                <?php if (!empty($items)): ?>
                                    <tfoot>
                                        <tr>
                                            <td colspan="8" style="text-align:right;color:#7b809a;font-size:11px;text-transform:uppercase">
                                                Totals
                                            </td>
                                            <td style="text-align:right;color:#344767"><?= number_format($sum_taxable, 2) ?></td>
                                            <td></td>
                                            <td style="text-align:right;color:#1565c0"><?= number_format($sum_tax, 2) ?></td>
                                            <td style="text-align:right;color:#2e7d32;font-weight:700"><?= number_format($sum_total, 2) ?></td>
                                        </tr>
                                    </tfoot>
                                <?php endif; ?>
                            </table>
                        </div>

                        <!-- Grand Totals Box -->
                        <?php if (!empty($items)): ?>
                            <div class="d-flex justify-content-end mt-3">
                                <div class="totals-box">
                                    <div class="totals-row">
                                        <span>Subtotal</span>
                                        <span>₹ <?= number_format($sum_taxable + $sum_disc, 2) ?></span>
                                    </div>
                                    <div class="totals-row">
                                        <span>Total Discount</span>
                                        <span style="color:#e91e63">- ₹ <?= number_format($sum_disc, 2) ?></span>
                                    </div>
                                    <div class="totals-row">
                                        <span>Total Tax</span>
                                        <span>₹ <?= number_format($sum_tax, 2) ?></span>
                                    </div>
                                    <div class="totals-row grand">
                                        <span>Grand Total</span>
                                        <span>₹ <?= number_format($sum_total, 2) ?></span>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                    </div><!-- /card-body -->
                </div><!-- /items card -->
            <?php endif; ?>
        </div>
    </div>
</div>
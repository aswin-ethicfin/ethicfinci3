<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            font-size: 11px;
            color: #000;
            background: #fff;
        }

        h2 {
            text-align: center;
            margin-bottom: 4px;
        }

        /* Job name + number line just below h2 */
        .job-meta {
            text-align: center;
            margin-bottom: 12px;
        }

        .job-meta .job-title-line {
            font-size: 13px;
            font-weight: bold;
            color: #222;
        }

        .job-meta .job-number-badge {
            display: inline-block;
            border: 1px solid #555;
            border-radius: 3px;
            padding: 1px 8px;
            font-size: 10px;
            color: #333;
            margin-top: 3px;
        }

        /* ── Info Card ── */
        .info-card {
            border: 1px solid #bbb;
            border-radius: 4px;
            margin-bottom: 14px;
            overflow: hidden;
        }

        .info-grid {
            width: 100%;
            border-collapse: collapse;
        }

        .info-grid td {
            padding: 6px 10px;
            border-bottom: 1px solid #e0e0e0;
            vertical-align: top;
        }

        .info-grid tr:last-child td {
            border-bottom: none;
        }

        .info-grid .lbl {
            color: #555;
            font-size: 9px;
            text-transform: uppercase;
            letter-spacing: 0.4px;
            width: 18%;
            white-space: nowrap;
        }

        .info-grid .val {
            font-weight: bold;
            font-size: 11px;
            width: 32%;
        }

        .info-grid .divider {
            border-left: 1px solid #ddd;
        }

        /* ── Section heading ── */
        .section-heading {
            background: #fff;
            color: #333;
            font-size: 10px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 5px 10px;
            margin-bottom: 0;
        }

        /* ── Items Table ── */
        .items-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 14px;
            font-size: 10px;
        }

        .items-table thead tr {
            background: #fff;
            color: #333;
        }

        .items-table thead th {
            padding: 5px 6px;
            font-weight: bold;
            font-size: 9px;
            text-transform: uppercase;
            letter-spacing: 0.3px;
            border: 1px solid #444;
            white-space: nowrap;
        }

        .items-table tbody tr {
            border-bottom: 1px solid #ddd;
        }

        .items-table tbody tr:nth-child(even) {
            background: #f7f7f7;
        }

        .items-table tbody td {
            padding: 5px 6px;
            border: 1px solid #ddd;
            vertical-align: middle;
        }

        .items-table tfoot td {
            padding: 5px 6px;
            border: 1px solid #ccc;
            background: #efefef;
            font-size: 9px;
            font-weight: bold;
            text-transform: uppercase;
            color: #333;
        }

        .tc {
            text-align: center;
        }

        .tr {
            text-align: right;
        }

        .tl {
            text-align: left;
        }

        .item-name {
            font-weight: bold;
            font-size: 11px;
            color: #111;
        }

        .item-desc {
            font-size: 9px;
            color: #555;
            margin-top: 1px;
        }

        .item-remark {
            font-size: 9px;
            color: #777;
            font-style: italic;
            margin-top: 1px;
        }

        /* ── Summary Box — mPDF-safe right align via two-cell wrapper table ── */
        .summary-outer-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 6px;
            margin-bottom: 14px;
        }

        .summary-outer-table td {
            padding: 0;
            border: none;
            vertical-align: top;
        }

        .summary-spacer {
            width: 58%;
        }

        .summary-table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #bbb;
            font-size: 11px;
        }

        .summary-table td {
            padding: 5px 10px;
            border-bottom: 1px solid #ddd;
        }

        .summary-table tr:last-child td {
            border-bottom: none;
        }

        .summary-table .s-lbl {
            color: #444;
        }

        .summary-table .s-val {
            text-align: right;
            font-weight: bold;
        }

        .summary-table .grand-row td {
            background: #fff;
            color: #222;
            font-size: 12px;
            font-weight: bold;
            border-top: 1px solid #999;
        }

        /* ── Footer ── */
        .footer {
            border-top: 1px solid #bbb;
            margin-top: 16px;
            padding-top: 6px;
            font-size: 9px;
            color: #777;
            text-align: center;
        }
    </style>
</head>

<body>

    <?php
    $sum_taxable = 0;
    $sum_tax     = 0;
    $sum_total   = 0;
    $sum_disc    = 0;
    if (!empty($items)) {
        foreach ($items as $item) {
            $sum_taxable += (float)($item['taxable']     ?? 0);
            $sum_tax     += (float)($item['vat_amt']     ?? 0);
            $sum_total   += (float)($item['total_price'] ?? 0);
            $sum_disc    += (float)($item['disc_amt']    ?? 0);
        }
    }
    $subtotal = $sum_taxable;
    ?>

    <h2>Job Details</h2>
    <table style="width:100%; border-collapse:collapse; margin-bottom:12px; margin-top:4px;">
        <tr>
            <td style="text-align:left;">
                <?= htmlspecialchars($job['job_number'] ?? '') ?>
            </td>
            <td style="text-align:right; font-size:10px; color:#555;">
                Date: <?= date('d M Y') ?>
            </td>
        </tr>
    </table>
    <!-- ══ JOB INFO CARD ══ -->
    <div class="info-card">
        <table class="info-grid">
            <tr>
                <td class="lbl">Job Name</td>
                <td class="val"><?= htmlspecialchars($job['job_name'] ?? '') ?></td>
                <td class="lbl divider">Customer</td>
                <td class="val"><?= htmlspecialchars($job['client_name'] ?? '') ?></td>
            </tr>
            <tr>
                <td class="lbl">Job Type</td>
                <td class="val"><?= ($job['job_type'] ?? 0) == 0 ? 'Maintenance' : 'Service' ?></td>
                <td class="lbl divider">Est. Delivery</td>
                <td class="val"><?= htmlspecialchars($job['estimated_delivery_date'] ?? '') ?></td>
            </tr>
            <tr>
                <td class="lbl">Received On</td>
                <td class="val"><?= htmlspecialchars($job['recieved_date'] ?? '') ?></td>
                <td class="lbl divider">Est. Cost</td>
                <td class="val">&#8377; <?= number_format((float)($job['estimated_cost'] ?? 0), 2) ?></td>
            </tr>
            <tr>
                <td class="lbl">Assigned To</td>
                <td class="val"><?= htmlspecialchars($job['assigned_to_name'] ?? '') ?></td>
                <td class="lbl divider">Payment</td>
                <td class="val"><?= !empty($job['is_paid']) ? 'Paid' : 'Unpaid' ?></td>
            </tr>
            <?php if (!empty($job['description'])): ?>
                <tr>
                    <td class="lbl">Scope &amp; Description</td>
                    <td>
                        <?= nl2br(htmlspecialchars($job['description'])) ?>
                        <?php if (!empty($job['remark'])): ?>
                            <br><?= nl2br(htmlspecialchars($job['remark'])) ?>
                        <?php endif; ?>
                    </td>
                    <td class="lbl divider">Job Status</td>
                    <td class="val"><?php
                                    $_js_labels = [0 => 'New Job', 4 => 'Job Started', 5 => 'Job Completed', 8 => 'Job Delivered'];
                                    echo $_js_labels[(int)$job['job_status']] ?? 'New Job';
                                    ?>
                    </td>
                </tr>
            <?php endif; ?>
        </table>
    </div>

    <!-- ══ ITEMS TABLE ══ -->
    <?php if (!empty($items)): ?>

        <div class="section-heading">
            Invoice Items
            <?php if (!empty($invoices['reference'])): ?>
            <?php endif; ?>
        </div>

        <table class="items-table">
            <thead>
                <tr>
                    <th class="tc" style="width:30px">Sl.No</th>
                    <th class="tl">Product / Description</th>
                    <th class="tr" style="width:65px">MRP</th>
                    <th class="tr" style="width:65px">Price</th>
                    <th class="tc" style="width:40px">Qty</th>
                    <th class="tc" style="width:45px">Unit</th>
                    <th class="tr" style="width:52px">Disc %</th>
                    <th class="tr" style="width:60px">Disc Amt</th>
                    <th class="tr" style="width:65px">Taxable</th>
                    <th class="tr" style="width:45px">Tax %</th>
                    <th class="tr" style="width:60px">Tax Amt</th>
                    <th class="tr" style="width:70px">Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $idx => $item): ?>
                    <tr>
                        <td class="tc" style="color:#555;font-size:10px"><?= $idx + 1 ?></td>
                        <td class="tl">
                            <div class="item-name"><?= htmlspecialchars($item['item_name'] ?? '') ?></div>
                            <?php if (!empty($item['description'])): ?>
                                <div class="item-desc"><?= htmlspecialchars($item['description']) ?></div>
                            <?php endif; ?>
                            <?php if (!empty($item['remark'])): ?>
                                <div class="item-remark"><?= htmlspecialchars($item['remark']) ?></div>
                            <?php endif; ?>
                        </td>
                        <td class="tr" style="color:#555"><?= number_format((float)($item['mrp']        ?? 0), 2) ?></td>
                        <td class="tr"> <?= number_format((float)($item['price']       ?? 0), 2) ?></td>
                        <td class="tc"> <?= $item['quantity'] ?? 1 ?></td>
                        <td class="tc" style="color:#555"><?= htmlspecialchars($item['unit_name'] ?? '-') ?></td>
                        <td class="tr"> <?= number_format((float)($item['disc_perc']   ?? 0), 2) ?>%</td>
                        <td class="tr"> <?= number_format((float)($item['disc_amt']    ?? 0), 2) ?></td>
                        <td class="tr"> <?= number_format((float)($item['taxable']     ?? 0), 2) ?></td>
                        <td class="tr"> <?= number_format((float)($item['vat_perc']    ?? 0), 2) ?>%</td>
                        <td class="tr"> <?= number_format((float)($item['vat_amt']     ?? 0), 2) ?></td>
                        <td class="tr"><strong> <?= number_format((float)($item['total_price'] ?? 0), 2) ?></strong></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="8" class="tr">Totals</td>
                    <td class="tr"><?= number_format($sum_taxable, 2) ?></td>
                    <td></td>
                    <td class="tr"><?= number_format($sum_tax,     2) ?></td>
                    <td class="tr"><?= number_format($sum_total,   2) ?></td>
                </tr>
            </tfoot>
        </table>

        <!-- ══ SUMMARY BOX — two-cell wrapper table for mPDF right alignment ══ -->
        <table class="summary-outer-table">
            <tr>
                <td class="summary-spacer"></td><!-- left spacer: 58% width, pushes summary right -->
                <td>
                    <table class="summary-table">
                        <tr>
                            <td class="s-lbl">Subtotal</td>
                            <td class="s-val">&#8377; <?= number_format($subtotal,  2) ?></td>
                        </tr>
                        <tr>
                            <td class="s-lbl">Total Discount</td>
                            <td class="s-val">- &#8377; <?= number_format($sum_disc, 2) ?></td>
                        </tr>
                        <tr>
                            <td class="s-lbl">Total Tax</td>
                            <td class="s-val">&#8377; <?= number_format($sum_tax,   2) ?></td>
                        </tr>
                        <tr class="grand-row">
                            <td class="s-lbl"><strong>Grand Total</strong></td>
                            <td class="s-val">&#8377; <?= number_format($sum_total, 2) ?></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

    <?php else: ?>
        <p style="padding:10px;color:#555;font-style:italic">No invoice items found for this job.</p>
    <?php endif; ?>

</body>

</html>
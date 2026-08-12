<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
    .van-table {
        font-size: 12px;
        line-height: 1.2;
        table-layout: fixed;
        width: 100%;
    }

    .van-table th,
    .van-table td {
        text-align: center;
        word-wrap: break-word;
        padding: 6px;
        vertical-align: middle;
    }

    .van-table th {
        white-space: normal;
        background-color: #f8f9fa;
        font-weight: bold;
    }

    .view-icon i {
        cursor: pointer;
        color: #007bff;
        font-size: 16px;
    }

    .view-icon i:hover {
        color: #0056b3;
    }

    .report-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 20px;
        border-radius: 10px;
        margin-bottom: 20px;
    }

    .filter-section {
        background-color: #f8f9fa;
        padding: 15px;
        border-radius: 8px;
        margin-bottom: 20px;
    }

    .summary-cards {
        display: flex;
        gap: 15px;
        margin-bottom: 20px;
        flex-wrap: wrap;
    }

    .summary-card {
        background: white;
        padding: 15px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        flex: 1;
        min-width: 200px;
        text-align: center;
    }

    .summary-card h4 {
        margin: 0;
        color: #333;
        font-size: 18px;
    }

    .summary-card p {
        margin: 5px 0 0 0;
        color: #666;
        font-size: 14px;
    }

    .table-container {
        background: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .status-badge {
        padding: 4px 8px;
        border-radius: 12px;
        font-size: 11px;
        font-weight: bold;
    }

    .status-active {
        background-color: #d4edda;
        color: #155724;
    }

    .status-pending {
        background-color: #fff3cd;
        color: #856404;
    }
</style>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <div class="d-flex justify-content-between align-items-center px-3">
                        <div>
                            <h6 class="text-white text-capitalize mb-1">
                                <i class="fas fa-truck me-2"></i> <?= $pagetitle ?>
                            </h6>
                            <p class="text-white mb-0">Comprehensive sales tracking and inventory management</p>
                        </div>
                        <div>
                            <small class="text-white">Generated on: <?= date('d M Y, H:i A') ?></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Summary Cards -->
        <div class="summary-cards">
            <div class="summary-card">
                <h4><?= isset($total_vans) ? $total_vans : '5' ?></h4>
                <p>Active Vans</p>
            </div>
            <div class="summary-card">
                <h4>$<?= isset($total_sales) ? number_format($total_sales, 2) : '12,450.00' ?></h4>
                <p>Total Sales</p>
            </div>
            <div class="summary-card">
                <h4>$<?= isset($total_stock_value) ? number_format($total_stock_value, 2) : '8,750.00' ?></h4>
                <p>Stock Value</p>
            </div>
            <div class="summary-card">
                <h4>$<?= isset($total_collections) ? number_format($total_collections, 2) : '6,200.00' ?></h4>
                <p>Collections</p>
            </div>
        </div>

        <!-- Filter Section -->
        <div class="filter-section">
            <form method="get" action="<?= base_url('van_sales/report') ?>">
                <div class="row align-items-end">
                    <!-- Van Selector -->
                    <div class="col-md-2">
                        <label class="form-label">Select Van</label>
                        <select class="form-control" name="van_id">
                            <option value="">-- All Vans --</option>
                            <?php if (!empty($van)): ?>
                                <?php foreach ($van as $v): ?>
                                    <option value="<?= $v['id']; ?>" <?= (isset($_GET['van_id']) && $_GET['van_id'] == $v['id']) ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($v['name']); ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <!-- Driver Selector -->
                    <div class="col-md-2">
                        <label class="form-label">Select Driver</label>
                        <select class="form-control" name="salesman">
                            <option value="">-- All Drivers --</option>
                            <?php if (!empty($salesman)): ?>
                                <?php foreach ($salesman as $s): ?>
                                    <option value="<?= $s['id']; ?>" <?= (isset($_GET['salesman']) && $_GET['salesman'] == $s['id']) ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($s['name']); ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <!-- Branch Selector -->
                    <!-- <div class="col-md-2">
                        <label class="form-label">Select Branch</label>
                        <select class="form-control" name="branch">
                            <option value="">-- All Branches --</option>
                            <?php if (!empty($branch)): ?>
                                <?php foreach ($branch as $b): ?>
                                    <option value="<?= $b['id']; ?>" <?= (isset($_GET['branch']) && $_GET['branch'] == $b['id']) ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($b['name']); ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div> -->
                    <!-- From Date -->
                    <div class="col-md-2">
                        <label class="form-label">From Date</label>
                        <input type="date" class="form-control" name="from_date"
                            value="<?= isset($_GET['from_date']) ? $_GET['from_date'] : date('Y-m-01') ?>">
                    </div>

                    <!-- To Date -->
                    <div class="col-md-2">
                        <label class="form-label">To Date</label>
                        <input type="date" class="form-control" name="to_date"
                            value="<?= isset($_GET['to_date']) ? $_GET['to_date'] : date('Y-m-d') ?>">
                    </div>

                    <!-- Search -->
                    <div class="col-md-2">
                        <label class="form-label">Search</label>
                        <input type="text" class="form-control" name="search"
                            value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>"
                            placeholder="Search van, driver, route...">
                    </div>

                    <!-- Filter Button -->
                    <div class="col-md-1">
                        <button type="submit" class="btn btn-primary btn-sm w-100" title="Apply Filter">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>

                    <!-- Export Button -->
                    <div class="col-md-1">
                        <a href="<?= base_url('van_sales/export_excel') ?>?<?= http_build_query($_GET) ?>"
                            class="btn btn-success btn-sm w-100" title="Export to Excel">
                            <i class="fas fa-file-excel me-1"></i> Export
                        </a>
                    </div>
                </div>
            </form>
        </div>

        <!-- Main Data Table -->
        <div class="table-container">
            <div class="table-responsive">
                <table class="table van-table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th style="width: 8%;">Van ID</th>
                            <th style="width: 10%;">Driver</th>
                            <th style="width: 8%;">Route</th>
                            <th style="width: 8%;">Loaded<br>Stock </th>
                            <th style="width: 7%;">Cash<br>Sales </th>
                            <th style="width: 7%;">Credit<br>Sales </th>
                            <th style="width: 7%;">Total<br>Sales </th>
                            <th style="width: 7%;">Returns </th>
                            <th style="width: 8%;">Bank<br>Collection </th>
                            <th style="width: 7%;">Van<br>Expense </th>
                            <th style="width: 7%;">Cash in<br>Hand </th>
                            <th style="width: 8%;">Balance<br>Stock </th>
                            <th style="width: 6%;">Status</th>
                            <!-- <th style="width: 6%;">Action</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($van_sales_data) && !empty($van_sales_data)): ?>
                            <?php foreach ($van_sales_data as $row): ?>
                                <tr>
                                    <td><?= isset($row['van_id']) ? $row['van_id'] : 'VN-001' ?></td>
                                    <td><?= isset($row['driver_name']) ? $row['driver_name'] : 'John Doe' ?></td>
                                    <td><?= isset($row['route']) ? $row['route'] : 'Downtown' ?></td>
                                    <td><?= isset($row['loaded_stock']) ? number_format($row['loaded_stock'], 2) : '625.00' ?></td>
                                    <td><?= isset($row['cash_sales']) ? number_format($row['cash_sales'], 2) : '172.50' ?></td>
                                    <td><?= isset($row['credit_sales']) ? number_format($row['credit_sales'], 2) : '95.00' ?></td>
                                    <td><strong><?= isset($row['total_sales']) ? number_format($row['total_sales'], 2) : '267.50' ?></strong></td>
                                    <td><?= isset($row['returns']) ? number_format($row['returns'], 2) : '20.00' ?></td>
                                    <td><?= isset($row['bank_collection']) ? number_format($row['bank_collection'], 2) : '150.00' ?></td>
                                    <td><?= isset($row['van_expense']) ? number_format($row['van_expense'], 2) : '55.00' ?></td>
                                    <td><?= isset($row['cash_in_hand']) ? number_format($row['cash_in_hand'], 2) : '67.50' ?></td>
                                    <td><?= isset($row['balance_stock']) ? number_format($row['balance_stock'], 2) : '370.00' ?></td>
                                    <td>
                                        <span class="status-badge <?= isset($row['status']) && $row['status'] == 'Complete' ? 'status-active' : 'status-pending' ?>">
                                            <?= isset($row['status']) ? $row['status'] : 'Active' ?>
                                        </span>
                                    </td>

                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <!-- Sample Data Row -->
                            <!-- <tr>
                                <td>VN-001</td>
                                <td>John Doe</td>
                                <td>Downtown</td>
                                <td>625.00</td>
                                <td>172.50</td>
                                <td>95.00</td>
                                <td><strong>267.50</strong></td>
                                <td>20.00</td>
                                <td>150.00</td>
                                <td>55.00</td>
                                <td>67.50</td>
                                <td>370.00</td>
                                <td><span class="status-badge status-active">Active</span></td>
                            </tr>
                            <tr>
                                <td>VN-002</td>
                                <td>Jane Smith</td>
                                <td>Uptown</td>
                                <td>750.00</td>
                                <td>230.00</td>
                                <td>120.00</td>
                                <td><strong>350.00</strong></td>
                                <td>15.00</td>
                                <td>180.00</td>
                                <td>65.00</td>
                                <td>95.00</td>
                                <td>400.00</td>
                                <td><span class="status-badge status-active">Active</span></td>
                            </tr>
                            <tr>
                                <td>VN-003</td>
                                <td>Mike Johnson</td>
                                <td>Suburb</td>
                                <td>580.00</td>
                                <td>190.00</td>
                                <td>85.00</td>
                                <td><strong>275.00</strong></td>
                                <td>25.00</td>
                                <td>140.00</td>
                                <td>45.00</td>
                                <td>85.00</td>
                                <td>305.00</td>
                                <td><span class="status-badge status-pending">Pending</span></td>
                            </tr> -->
                        <?php endif; ?>
                    </tbody>
                    <tfoot>
                        <tr style="background-color: #e9ecef; font-weight: bold;">
                            <td colspan="3">TOTAL</td>
                            <td><?= isset($totals['loaded_stock']) ? number_format($totals['loaded_stock'], 2) : '1,955.00' ?></td>
                            <td><?= isset($totals['cash_sales']) ? number_format($totals['cash_sales'], 2) : '592.50' ?></td>
                            <td><?= isset($totals['credit_sales']) ? number_format($totals['credit_sales'], 2) : '300.00' ?></td>
                            <td><?= isset($totals['total_sales']) ? number_format($totals['total_sales'], 2) : '892.50' ?></td>
                            <td><?= isset($totals['returns']) ? number_format($totals['returns'], 2) : '60.00' ?></td>
                            <td><?= isset($totals['bank_collection']) ? number_format($totals['bank_collection'], 2) : '470.00' ?></td>
                            <td><?= isset($totals['van_expense']) ? number_format($totals['van_expense'], 2) : '165.00' ?></td>
                            <td><?= isset($totals['cash_in_hand']) ? number_format($totals['cash_in_hand'], 2) : '247.50' ?></td>
                            <td><?= isset($totals['balance_stock']) ? number_format($totals['balance_stock'], 2) : '1,075.00' ?></td>
                            <td colspan="2">-</td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <!-- Pagination -->
            <?php if (isset($pagination)): ?>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <p class="text-muted">
                            Showing <?= isset($start_record) ? $start_record : '1' ?> to
                            <?= isset($end_record) ? $end_record : '3' ?> of
                            <?= isset($total_records) ? $total_records : '3' ?> entries
                        </p>
                    </div>
                    <div class="col-md-6 text-end">
                        <?= isset($pagination) ? $pagination : '' ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
</div>

<!-- Success Message -->
<div id="updateMessage" style="display: none;" class="alert alert-success position-fixed"
    style="top: 20px; right: 20px; z-index: 1050;">
    <i class="fas fa-check-circle me-2"></i>
    <span id="messageText">Operation completed successfully!</span>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Auto-hide success messages
        if ($('#updateMessage').is(':visible')) {
            setTimeout(function() {
                $('#updateMessage').fadeOut();
            }, 3000);
        }

        // Export functionality
        $('.export-btn').click(function(e) {
            e.preventDefault();
            var url = $(this).attr('href');
            window.open(url, '_blank');

            $('#messageText').text('Export initiated successfully!');
            $('#updateMessage').show().delay(3000).fadeOut();
        });

        // Print functionality
        $('a[title="Print Report"]').click(function(e) {
            e.preventDefault();
            var url = $(this).attr('href');
            window.open(url, '_blank', 'width=800,height=600,scrollbars=yes');
        });

        // Filter form validation
        $('form').submit(function() {
            var fromDate = $('input[name="from_date"]').val();
            var toDate = $('input[name="to_date"]').val();

            if (fromDate && toDate && fromDate > toDate) {
                alert('From date cannot be greater than To date');
                return false;
            }
        });

        // Reset filters
        if (window.location.search.includes('reset=1')) {
            $('form input, form select').val('');
            $('input[name="from_date"]').val('<?= date('Y-m-01') ?>');
            $('input[name="to_date"]').val('<?= date('Y-m-d') ?>');
        }
    });

    // Add reset button functionality
    function resetFilters() {
        window.location.href = window.location.pathname + '?reset=1';
    }
</script>
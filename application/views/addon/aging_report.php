<style>
    .pagination {
        font-size: 0.9rem;
        border-radius: 8px;
        overflow: hidden;
    }

    .pagination .page-link {
        color: #0d6efd;
        /* Bootstrap primary */
        border: none;
        margin: 0 2px;
        border-radius: 6px;
        transition: all 0.2s ease-in-out;
    }

    .pagination .page-link:hover {
        background-color: #0d6efd;
        color: #fff;
    }

    .pagination .active .page-link {
        background-color: #0d6efd;
        border-color: #0d6efd;
        color: #fff;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
    }

    /* Compact table styles */
    .table-compact th,
    .table-compact td {
        font-size: 0.80rem;
        padding: 4px 6px;
        vertical-align: middle;
    }

    /* Alignment rules */
    .text-left {
        text-align: left;
    }

    .text-center {
        text-align: center;
    }

    .text-right {
        text-align: right;
    }

    /* Prevent wrapping for numbers */
    .text-right {
        white-space: nowrap;
    }

    /* Limit max column width */
    .table-compact td,
    .table-compact th {
        max-width: 120px;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    /* Action button smaller */
    .btn-sm {
        padding: 0;
        font-size: 0.75rem;
        width: 32px;
        height: 32px;
        /* Standard height for select-sm */
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 6px;
        margin-bottom: 0 !important;
        /* Prevents pushing the line up */
        vertical-align: middle;
    }

    /* Force same header background for all rows in thead */
    .table thead th {
        background-color: #243958ff !important;
        /* Bootstrap blue */
        color: #fff !important;
    }

    .btn-pink {
        background-color: #e91e63;
        /* Material Pink */
        color: #fff;
        border: none;
    }

    .btn-pink:hover {
        background-color: #c2185b;
        /* Darker pink on hover */
        color: #fff;
    }

    .fixed-card {
        width: 355px;
        height: 120px;
        position: relative;
        overflow: visible;
        border-radius: 12px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .fixed-card.bg-success {
        background: linear-gradient(135deg, #e6f9ee, #ffffff);
    }

    .fixed-card.bg-info {
        background: linear-gradient(135deg, #e6f4fa, #ffffff);
    }

    .fixed-card.bg-warning {
        background: linear-gradient(135deg, #fff7e6, #ffffff);
    }

    .fixed-card.bg-danger {
        background: linear-gradient(135deg, #fdeaea, #ffffff);
    }

    /* Icon box - move a bit right */
    .fixed-card .icon-box {
        position: absolute;
        top: -20px;
        left: 15px;
        /* instead of -20px */
        width: 60px;
        height: 60px;
        background: #28a745;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.15);
        border-radius: 12px;
        z-index: 5;
    }

    /* Days & Amount aligned to right side */
    .fixed-card .card-top-right {
        margin-left: auto;
        /* push it to far right */
        text-align: right;
        /* align text right */
        padding-right: 10px;
        /* little spacing from border */
        border-left: none;
        /* remove left border */
        border-right: 1px solid #ddd;
        /* optional thin separator on right */
        direction: ltr;
        /* makes text flow right-to-left */
    }

    /* Bottom section centered */
    .fixed-card .card-bottom-right {
        position: absolute;
        bottom: 10px;
        left: 15px;
        right: 15px;
        display: flex;
        justify-content: space-between;
        /* left & right ends */
        align-items: center;
        border-top: 1px solid #ddd;
        padding-top: 5px;
        font-size: 0.85rem;
    }

    .fixed-card .icon-box i {
        font-size: 24px;
        color: #fff;
    }

    /* Days and amount next to icon */
    .card-top-right {
        margin-left: 60px;
        padding-left: 15px;
        border-left: 1px solid #ddd;
        /* thin separator */
    }

    .card-top-right p {
        margin: 0;
        font-size: 0.8rem;
        color: #888;
    }

    .card-top-right h5 {
        margin: 0;
        font-weight: bold;
        font-size: 1.2rem;
    }

    /* Bottom right section */
    .card-bottom-right {
        position: absolute;
        bottom: 10px;
        right: 15px;
        text-align: right;
        border-top: 1px solid #ddd;
        padding-top: 5px;
        width: calc(100% - 30px);
    }

    .card-bottom-right p {
        margin: 0;
        font-size: 0.85rem;
    }

    .fixed-card::after {
        /* content: "\f073"; */
        /* example FontAwesome calendar icon */
        font-family: "Font Awesome 5 Free";
        font-weight: 900;
        font-size: 80px;
        color: rgba(0, 0, 0, 0.05);
        position: absolute;
        bottom: 10px;
        /* right: 10px; */
        left: 140px;
        pointer-events: none;
    }

    .fixed-card .progress {
        margin-top: 8px;
        margin-bottom: 25px;
        border-radius: 4px;
        overflow: hidden;
    }
</style><!-- Filter Section above cards -->
<?php
$total_stock =  $totals['stock_value_0_30'] +
    $totals['stock_value_31_60'] +
    $totals['stock_value_61_90'] +
    // $rdata['totals']['stock_value_91_180'] +
    $totals['stock_value_above_90']; // include 721+ days


function getPercentage($value, $total_stock)
{
    if ($total_stock == 0) return 0;
    return min(100, round(($value / $total_stock) * 100));
}
?>
<div class="container-fluid">
    <div class="card mb-4 border-0 shadow-sm bg-white">
        <div class="card-body p-3">
            <!-- ================== Filter Section ================== -->
            <form method="get" class="row g-2 justify-content-end align-items-center">
                <div class="col-md-2">
                    <select name="branch" class="form-select form-select-sm">
                        <option value="">All Branches</option>
                        <?php foreach ($branches as $b): ?>
                            <option value="<?= $b['id'] ?>" <?= ($this->input->get('branch') == $b['id']) ? 'selected' : '' ?>>
                                <?= $b['name'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="warehouse" class="form-select form-select-sm">
                        <option value="">All Warehouses</option>
                        <?php foreach ($warehouses as $w): ?>
                            <option value="<?= $w['id'] ?>" <?= ($this->input->get('warehouse') == $w['id']) ? 'selected' : '' ?>>
                                <?= $w['name'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-2">
                    <select id="categorySelect" name="category" class="form-select form-select-sm">
                        <option value="">All Categories</option>
                        <?php foreach ($categories as $c): ?>
                            <option value="<?= $c['id'] ?>" <?= ($this->input->get('category') == $c['id']) ? 'selected' : '' ?>>
                                <?= $c['name'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-2">
                    <select id="itemSelect" name="item" class="form-select form-select-sm">
                        <option value="">All Items</option>
                        <?php foreach ($items as $i): ?>
                            <option value="<?= $i['id'] ?>" <?= ($this->input->get('item') == $i['id']) ? 'selected' : '' ?>>
                                <?= $i['name'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-auto d-flex gap-2">
                    <!-- Search -->
                    <button type="submit" class="btn btn-primary btn-sm flex-fill">
                        <i class="fas fa-search"></i>
                    </button>

                    <!-- Reset -->
                    <a href="<?= base_url('home/agingreport'); ?>" class="btn btn-secondary btn-sm flex-fill">
                        <i class="fas fa-undo"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>
    <div class="row justify-content-center">
        <!-- 0-90 Days -->
        <div class="col-auto mb-4">
            <div class="card fixed-card">
                <div class="card-body p-3 d-flex align-items-start">
                    <!-- Icon -->
                    <div class="icon-box bg-success">
                        <i class="ni ni-calendar-grid-58"></i>
                    </div>
                    <!-- Days & Amount -->
                    <div class="card-top-right">
                        <p class="text-uppercase font-weight-bold">0-30 Days</p>
                        <h5><?= $totals['stock_value_0_30'] ?></h5>
                    </div>
                </div>
                <div class="progress mt-2" style="height:6px; margin-top:8px;">
                    <div class="progress-bar"
                        data-percent="<?= getPercentage($totals['stock_value_0_30'], $total_stock) ?>">
                    </div>
                </div>

                <!-- <div class="text-muted small mt-1">
                <span class="me-2">In Stock: <strong class="text-dark">132,693</strong></span>
                |
                <span>Issued: <strong class="text-dark">58,956</strong></span>
            </div> -->

                <!-- Bottom Right 
            <div class="card-bottom-right">
                <span class="text-danger font-weight-bolder">132,693.16 In Stock</span>
                <span class="text-success font-weight-bolder">58,956.12 Issued</span>
            </div> -->

            </div>
        </div>

        <!-- 91-180 Days -->
        <div class="col-auto mb-4">
            <div class="card fixed-card">
                <div class="card-body p-3 d-flex align-items-start">
                    <!-- Icon -->
                    <div class="icon-box bg-info">
                        <i class="ni ni-calendar-grid-58"></i>
                    </div>
                    <!-- Days & Amount -->
                    <div class="card-top-right">
                        <p class="text-uppercase font-weight-bold">31-60 Days</p>
                        <h5><?= $totals['stock_value_31_60'] ?></h5>
                    </div>
                </div>
                <div class="progress mt-2" style="height:6px; margin-top:8px;">
                    <div class="progress-bar"
                        data-percent="<?= getPercentage($totals['stock_value_31_60'], $total_stock) ?>">
                    </div>
                </div>
                <!-- <div class="text-muted small mt-1">
                <span class="me-2">In Stock: <strong class="text-dark">132,693</strong></span>
                |
                <span>Issued: <strong class="text-dark">58,956</strong></span>
            </div> -->

                <!-- Bottom Right 
            <div class="card-bottom-right">
                <span class="text-danger font-weight-bolder">295,257.00 In Stock</span>
                <span class="text-success font-weight-bolder">294,807.00 Issued</span>
            </div> -->
            </div>
        </div>

        <!-- 181-360 Days -->
        <div class="col-auto mb-4">
            <div class="card fixed-card">
                <div class="card-body p-3 d-flex align-items-start">
                    <!-- Icon -->
                    <div class="icon-box bg-warning">
                        <i class="ni ni-calendar-grid-58"></i>
                    </div>
                    <!-- Days & Amount -->
                    <div class="card-top-right">
                        <p class="text-uppercase font-weight-bold">61-90 Days</p>
                        <h5><?= $totals['stock_value_61_90'] ?></h5>
                    </div>
                </div>
                <div class="progress mt-2" style="height:6px; margin-top:8px;">
                    <div class="progress-bar"
                        data-percent="<?= getPercentage($totals['stock_value_61_90'], $total_stock) ?>">
                    </div>
                </div>
                <!-- <div class="text-muted small mt-1">
                <span class="me-2">In Stock: <strong class="text-dark">132,693</strong></span>
                |
                <span>Issued: <strong class="text-dark">58,956</strong></span>
            </div> -->

                <!-- Bottom Right 
            <div class="card-bottom-right">
                <span class="text-danger font-weight-bolder">0.00 In Stock</span>
                <span class="text-success font-weight-bolder">0.00 Issued</span>
            </div>-->
            </div>
        </div>

        <!-- 361-720 Days -->
        <div class="col-auto mb-4">
            <div class="card fixed-card">
                <div class="card-body p-3 d-flex align-items-start">
                    <!-- Icon -->
                    <div class="icon-box bg-danger">
                        <i class="ni ni-calendar-grid-58"></i>
                    </div>
                    <!-- Days & Amount -->
                    <div class="card-top-right">
                        <p class="text-uppercase font-weight-bold">Above 90 Days</p>
                        <h5><?= $totals['stock_value_above_90'] ?></h5>
                    </div>
                </div>
                <div class="progress mt-2" style="height:6px; margin-top:8px;">
                    <div class="progress-bar"
                        data-percent="<?= getPercentage($totals['stock_value_above_90'], $total_stock) ?>">
                    </div>
                </div>
                <!-- <div class="text-muted small mt-1">
                <span class="me-2">In Stock: <strong class="text-dark">132,693</strong></span>
                |
                <span>Issued: <strong class="text-dark">58,956</strong></span>
            </div> -->

                <!-- Bottom Right 
            <div class="card-bottom-right">
                <span class="text-danger font-weight-bolder">0.00 In Stock</span>
                <span class="text-success font-weight-bolder">0.00 Issued</span>

            </div>-->
            </div>
        </div>

        <!-- 721+ Days -->
        <!-- <div class="col-auto mb-4">
            <div class="card fixed-card">
                <div class="card-body p-3 d-flex align-items-start"> -->
        <!-- Icon -->
        <!-- <div class="icon-box bg-secondary">
                        <i class="ni ni-calendar-grid-58"></i>
                    </div> -->
        <!-- Days & Amount -->
        <!-- <div class="card-top-right">
                        <p class="text-uppercase font-weight-bold">721+ Days</p>
                        <h5><?= $totals['stock_value_above_720'] ?></h5>
                    </div>
                </div>
                <div class="progress mt-2" style="height:6px; margin-top:8px;">
                    <div class="progress-bar"
                        data-percent="<?= getPercentage($totals['stock_value_above_90'], $total_stock) ?>">
                    </div>
                </div>
            </div>
        </div> -->
    </div>

    <div class="card">
        <div class="card-header pb-1 d-flex justify-content-between align-items-center">
            <h6>Product Stock Aging Report</h6>

        </div>
        <div class="card-body px-3 pt-0 pb-2">
            <div class="table-responsive">
                <table class="table align-items-center mb-0">
                    <thead class="bg-primary text-white">
                        <!-- First row: Main headings -->
                        <tr>
                            <th rowspan="3" class="text-center">Sl No</th>
                            <th rowspan="3" class="text-start">
                                Item Code<br>
                                <span>-Part No.</span>
                            </th>
                            <th rowspan="3" class="text-start">
                                Item Name<br>
                                <span>-Category</span>
                            </th>
                            <th rowspan="2" colspan="2" class="text-center">Total In</th>
                            <th rowspan="2" colspan="2" class="text-center">Total Out</th>
                            <th colspan="10" class="text-center">Closing Stock in Periods</th>
                        </tr>

                        <!-- Second row: Closing stock period labels -->
                        <tr>
                            <th colspan="2" class="text-center"><?= date('Y-m-d') ?></th>
                            <th colspan="2" class="text-center">0-30</th>
                            <th colspan="2" class="text-center">31-60</th>
                            <th colspan="2" class="text-center">61-90</th>
                            <th colspan="2" class="text-center">Above 90</th>
                        </tr>

                        <!-- Third row: Qty / Value under each group -->
                        <tr>
                            <!-- Total In -->
                            <th class="text-end">Qty</th>
                            <th class="text-end">Value</th>

                            <!-- Total Out -->
                            <th class="text-end">Qty</th>
                            <th class="text-end">Value</th>

                            <!-- Closing stock periods -->
                            <th class="text-end">Qty</th>
                            <th class="text-end">Value</th>

                            <th class="text-end">Qty</th>
                            <th class="text-end">Value</th>

                            <th class="text-end">Qty</th>
                            <th class="text-end">Value</th>

                            <th class="text-end">Qty</th>
                            <th class="text-end">Value</th>

                            <th class="text-end">Qty</th>
                            <th class="text-end">Value</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if (!empty($reportData)): ?>
                            <?php $sl = 1;
                            foreach ($reportData as $row): ?>
                                <tr>
                                    <td class="text-center"><?= $sl++; ?></td>
                                    <td class="text-start"><?= $row['item_code']; ?>
                                        <br><span style="font-size: 12px; color: #bbb3b3;"><?= $row['part_number']; ?></span>
                                    </td>
                                    <td class="text-start"><?= $row['item']; ?>
                                        <br><span style="font-size: 12px; color: #bbb3b3;"><?= $row['category']; ?></span>
                                    </td>
                                    <!-- Total In -->
                                    <td class="text-end"><?= $row['total_in_qty']; ?></td>
                                    <td class="text-end"><?= number_format($row['total_inflow_value'], 2); ?></td>

                                    <!-- Total Out -->
                                    <td class="text-end"><?= $row['total_out_qty']; ?></td>
                                    <td class="text-end"><?= number_format($row['total_outflow_value'], 2); ?></td>

                                    <!-- Closing Stock as on Today -->
                                    <td class="text-end"><?= $row['closing_qty_today'] ?? 0; ?></td>
                                    <td class="text-end"><?= number_format($row['closing_value_today'] ?? 0, 2); ?></td>

                                    <!-- 0-90 Days -->
                                    <td class="text-end"><?= $row['stock_qty_0_30'] ?? 0; ?></td>
                                    <td class="text-end"><?= number_format($row['stock_value_0_30'] ?? 0, 2); ?></td>

                                    <!-- 91-180 Days -->
                                    <td class="text-end"><?= $row['stock_qty_31_60'] ?? 0; ?></td>
                                    <td class="text-end"><?= number_format($row['stock_value_31_60'] ?? 0, 2); ?></td>

                                    <!-- 181-360 Days -->
                                    <td class="text-end"><?= $row['stock_qty_61_90'] ?? 0; ?></td>
                                    <td class="text-end"><?= number_format($row['stock_value_61_90'] ?? 0, 2); ?></td>

                                    <!-- 361-720 Days -->
                                    <td class="text-end"><?= $row['stock_qty_above_90'] ?? 0; ?></td>
                                    <td class="text-end"><?= number_format($row['stock_value_above_90'] ?? 0, 2); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="20" class="text-center">No data found</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
                <?php
                $page = isset($page) ? (int)$page : 1;
                $totalPages = isset($totalPages) ? $totalPages : 1;
                ?>

                <div class="d-flex justify-content-center mt-3">
                    <nav>
                        <ul class="pagination">
                            <!-- Prev -->
                            <li class="page-item <?= ($page <= 1) ? 'disabled' : '' ?>">
                                <a class="page-link" href="<?= ($page > 1) ? '?page=' . ($page - 1) . '&' . http_build_query($_GET) : '#' ?>">
                                    &laquo;
                                </a>
                            </li>

                            <!-- Pages -->
                            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                                    <a class="page-link" href="?page=<?= $i ?>&<?= http_build_query($_GET) ?>">
                                        <?= $i ?>
                                    </a>
                                </li>
                            <?php endfor; ?>

                            <!-- Next -->
                            <li class="page-item <?= ($page >= $totalPages) ? 'disabled' : '' ?>">
                                <a class="page-link" href="<?= ($page < $totalPages) ? '?page=' . ($page + 1) . '&' . http_build_query($_GET) : '#' ?>">
                                    &raquo;
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>

            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#categorySelect").change(function() {
            var categoryId = $(this).val();
            var itemDropdown = $("#itemSelect");

            // Clear existing options
            itemDropdown.empty();
            itemDropdown.append('<option value="">All Items</option>');

            if (categoryId) {
                $.ajax({
                    url: "<?= base_url('home/get_items_by_category'); ?>",
                    type: "POST",
                    data: {
                        category_id: categoryId
                    },
                    dataType: "json",
                    success: function(res) {
                        if (res.status && res.items.length > 0) {
                            $.each(res.items, function(i, item) {
                                itemDropdown.append('<option value="' + item.id + '">' + item.name + '</option>');
                            });
                        } else {
                            itemDropdown.html('<option value="">No items available</option>');
                            console.log(res.message);
                        }
                    },
                    error: function(err) {
                        console.error('AJAX error:', err);
                    }
                });
            }
        });
    });
    document.querySelectorAll('.progress-bar').forEach(bar => {
        let percent = parseInt(bar.getAttribute('data-percent')) || 0;

        // Set width dynamically
        bar.style.width = percent + "%";

        // Color logic
        if (percent < 30) {
            bar.classList.add("bg-danger"); // red
        } else if (percent < 70) {
            bar.classList.add("bg-warning"); // yellow
        } else {
            bar.classList.add("bg-success"); // green
        }
    });
</script>
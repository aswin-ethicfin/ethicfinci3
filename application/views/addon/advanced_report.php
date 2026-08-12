<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3"><?= $pagetitle ?></h6>
                    <a target="_blank" href="<?= base_url('home/adv_report?print=y') ?>"> Print </a>

                </div>
                <div class="card-body px-4 py-3">

                    <!-- Filter section -->
                    <form method="get" action="<?= base_url('home/adv_report') ?>" class="row g-3 mb-4">
                        <div class="col-md-4">
                            <label for="from_date" class="form-label">From Date</label>
                            <input type="date" id="from_date" name="from_date" class="form-control" value="<?= htmlspecialchars($this->input->get('from_date') ?? date('Y-m-01')) ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="to_date" class="form-label">To Date</label>
                            <input type="date" id="to_date" name="to_date" class="form-control" value="<?= htmlspecialchars($this->input->get('to_date') ?? date('Y-m-d')) ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="branch_id" class="form-label">Branch</label>
                            <select name="branch_id" id="branch_id" class="form-control">
                                <option value="">All Branches</option>
                                <?php foreach ($branches as $branch): ?>
                                    <option value="<?= $branch['id'] ?>" <?= ($this->input->get('branch_id') == $branch['id']) ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($branch['name']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-12 text-end">
                            <button type="submit" class="btn btn-primary">Filter</button>
                            <a href="<?= current_url() ?>" class="btn btn-secondary">Reset</a>
                        </div>
                    </form>

                    <!-- Advanced Sales Report Content -->
                    <div class="table-responsive">

                        <h5 class="mt-4">Top 10 Best-Selling Products</h5>
                        <table class="table table-bordered table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>Sl.No</th>
                                    <th>Product</th>
                                    <th class="text-end">Qty Sold</th>
                                    <th class="text-end">Total Sales (₹)</th>
                                    <!-- <th class="text-end">Gross Profit (₹)</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($top_products)): ?>
                                    <?php $i = 1;
                                    foreach ($top_products as $product): ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= htmlspecialchars($product['product_name']) ?></td>
                                            <td class="text-end"><?= number_format($product['qty_sold']) ?>
                                                <?= htmlspecialchars($product['unit'] ?? '') ?>
                                            </td>
                                            <td class="text-end"><?= number_format($product['total_sales'] ?? 0, 2) ?></td>
                                            <!-- <td class="text-end">-</td> -->
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="5" class="text-center text-muted">No data available for the selected period.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>

                        <h5 class="mt-4">Top 10 Customers by Sales </h5>
                        <table class="table table-bordered table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>Sl.No</th>
                                    <th>Customer</th>
                                    <th class="text-end">Sales</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($top_customers)): ?>
                                    <?php $i = 1;
                                    foreach ($top_customers as $customer): ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= htmlspecialchars($customer['customer_name']) ?></td>
                                            <td class="text-end"><?= number_format($customer['orders_count']) ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="3" class="text-center text-muted">No customer data available for the selected period.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>

                        <!-- <h5 class="mt-4">Top 10 Customers by Profit</h5>
                        <table class="table table-bordered table-striped align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>Sl.No</th>
                                    <th>Customer</th>
                                    <th class="text-end">Total Sales (₹)</th>
                                    <th class="text-end">Cost (₹)</th>
                                    <th class="text-end">Profit (₹)</th>
                                    <th class="text-end">Margin %</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($top_customers_profit)): ?>
                                    <?php $i = 1;
                                    foreach ($top_customers_profit as $customer): ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= htmlspecialchars($customer['customer_name'] ?? 'N/A') ?></td>
                                            <td class="text-end"><?= number_format($customer['total_sales'] ?? 0, 2) ?></td>
                                            <td class="text-end"><?= number_format($customer['total_cost'] ?? 0, 2) ?></td>
                                            <td class="text-end <?= ($customer['profit'] ?? 0) < 0 ? 'text-danger' : 'text-success' ?>">
                                                <?= number_format($customer['profit'] ?? 0, 2) ?>
                                            </td>
                                            <td class="text-end"><?= number_format($customer['margin_percentage'] ?? 0, 2) ?>%</td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="6" class="text-center text-muted">No customer profit data available for the selected period.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table> -->

                        <!-- <h5 class="mt-4">Most Grouped Products</h5>
                        <table class="table table-bordered table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>Sl.No</th>
                                    <th>Group Name</th>
                                    <th>Included Products</th>
                                    <th>Times Sold</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Starter Kit</td>
                                    <td>A, B, C</td>
                                    <td class="text-end">120</td>
                                </tr>
                            </tbody>
                        </table> -->

                        <h5 class="mt-4">Daily Sales Trend</h5>
                        <div style="height: 400px;">
                            <canvas id="dailySalesChart"></canvas>
                        </div>


                        <h5 class="mt-4">Sales by Category</h5>
                        <table class="table table-bordered table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>Sl.No</th>
                                    <th>Category</th>
                                    <th class="text-end">Units Sold</th>
                                    <th class="text-end">Total Sales (₹)</th>
                                    <!-- <th class="text-end">Avg Margin %</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($sales_by_category)): ?>
                                    <?php $i = 1; ?>
                                    <?php foreach ($sales_by_category as $category): ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= htmlspecialchars($category['category_name'] ?? 'N/A') ?></td>
                                            <td class="text-end"><?= number_format($category['units_sold'] ?? 0) ?>
                                                <?= htmlspecialchars($product['unit'] ?? '') ?>
                                            </td>
                                            <td class="text-end"><?= number_format($category['total_sales'] ?? 0, 2) ?></td>
                                            <!-- <td class="text-end">-%</td> -->
                                            <!-- <?= number_format($category['avg_margin_percentage'] ?? 0, 2) ?> -->
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="4" class="text-center text-muted">No category sales data available for the selected period.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>


                        <!-- <h5 class="mt-4">New vs Repeat Customer Sales</h5>
                        <table class="table table-bordered table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>Type</th>
                                    <th>Orders</th>
                                    <th>Total Sales (₹)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>New Customers</td>
                                    <td class="text-end">100</td>
                                    <td class="text-end">300,000</td>
                                </tr>
                                <tr>
                                    <td>Repeat Customers</td>
                                    <td class="text-end">250</td>
                                    <td class="text-end">750,000</td>
                                </tr>
                            </tbody>
                        </table>

                        <h5 class="mt-4">Payment Method Analysis</h5>
                        <table class="table table-bordered table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>Method</th>
                                    <th>Orders</th>
                                    <th>Total (₹)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>UPI</td>
                                    <td class="text-end">200</td>
                                    <td class="text-end">400,000</td>
                                </tr>
                                <tr>
                                    <td>Card</td>
                                    <td class="text-end">100</td>
                                    <td class="text-end">300,000</td>
                                </tr>
                            </tbody>
                        </table> -->
                        <!-- Existing report sections you already have included above here -->

                        <h5 class="mt-4">Least Selling Products</h5>
                        <table class="table table-bordered table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>Sl.No</th>
                                    <th>Product</th>
                                    <th class="text-end">Qty Sold</th>
                                    <th class="text-end">Last Sold Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($least_selling_products)): ?>
                                    <?php $i = 1;
                                    foreach ($least_selling_products as $product): ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= htmlspecialchars($product['product_name'] ?? 'N/A') ?></td>
                                            <td class="text-end"><?= number_format($product['qty_sold'] ?? 0) ?>
                                                <?= htmlspecialchars($product['unit'] ?? '') ?>
                                            </td>
                                            <td class="text-end">
                                                <?php
                                                if (!empty($product['last_sold_date'])) {
                                                    $date = date('d-M-Y', strtotime($product['last_sold_date']));
                                                    echo htmlspecialchars($date);
                                                } else {
                                                    echo '-';
                                                }
                                                ?>
                                            </td>

                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="4" class="text-center text-muted">No least selling product data available for the selected period.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>

                        <!-- <h5 class="mt-4">Sales Return Summary</h5>
                        <table class="table table-bordered table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>Product</th>
                                    <th>Qty Returned</th>
                                    <th>Return Rate %</th>
                                    <th>Return Value (₹)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Product C</td>
                                    <td class="text-end">10</td>
                                    <td class="text-end">5%</td>
                                    <td class="text-end">5,000</td>
                                </tr>
                            </tbody>
                        </table>

                        <h5 class="mt-4">Average Order Value</h5>
                        <p><strong>₹3,200</strong> (Total Sales / Total Orders)</p>

                        <h5 class="mt-4">Discount Summary</h5>
                        <table class="table table-bordered table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>Total Discount Given (₹)</th>
                                    <th>Avg Discount %</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-end">20,000</td>
                                    <td class="text-end">5%</td>
                                </tr>
                            </tbody>
                        </table>

                        <h5 class="mt-4">Sales by Region</h5>
                        <table class="table table-bordered table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>Region</th>
                                    <th>Orders</th>
                                    <th>Total Sales (₹)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Mumbai</td>
                                    <td class="text-end">100</td>
                                    <td class="text-end">400,000</td>
                                </tr>
                            </tbody>
                        </table> -->

                        <h5 class="mt-4">Top Salespersons</h5>
                        <table class="table table-bordered table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>Sl.No</th>
                                    <th>Name</th>
                                    <th class="text-end">Sales</th>
                                    <th class="text-end">Total Sales (₹)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($top_salespersons)): ?>
                                    <?php $i = 1;
                                    foreach ($top_salespersons as $salesperson): ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= htmlspecialchars($salesperson['employee_name'] ?? 'N/A') ?></td>
                                            <td class="text-end"><?= number_format($salesperson['orders_count'] ?? 0) ?></td>
                                            <td class="text-end"><?= number_format($salesperson['total_sales'] ?? 0, 2) ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="4" class="text-center text-muted">No salesperson data available for the selected period.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>


                        <!-- <h5 class="mt-4">Sales by Channel</h5>
                        <table class="table table-bordered table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>Channel</th>
                                    <th>Orders</th>
                                    <th>Total Sales (₹)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Online</td>
                                    <td class="text-end">150</td>
                                    <td class="text-end">500,000</td>
                                </tr>
                                <tr>
                                    <td>Retail</td>
                                    <td class="text-end">100</td>
                                    <td class="text-end">400,000</td>
                                </tr>
                            </tbody>
                        </table>

                        <h5 class="mt-4">Inactive Customers (Past 6 Months)</h5>
                        <table class="table table-bordered table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>Customer</th>
                                    <th>Last Order Date</th>
                                    <th>Total Sales</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Customer Z</td>
                                    <td class="text-end">2024-12-12</td>
                                    <td class="text-end">45,000</td>
                                </tr>
                            </tbody>
                        </table>

                        <h5 class="mt-4">Pending Payments (Credit Sales)</h5>
                        <table class="table table-bordered table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>Customer</th>
                                    <th>Pending Amount (₹)</th>
                                    <th>Due Since</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Customer A</td>
                                    <td class="text-end">12,000</td>
                                    <td class="text-end">45 days</td>
                                </tr>
                            </tbody>
                        </table> -->

                        <!-- <h5 class="mt-4">Summary Values</h5>
                        <ul class="list-group mb-3">
                            <li class="list-group-item d-flex justify-content-between"><span>Average Order Value</span><span><strong>₹3,200</strong></span></li>
                            <li class="list-group-item d-flex justify-content-between"><span>Discount Given</span><span><strong>₹20,000 (Avg 5%)</strong></span></li>
                            <li class="list-group-item d-flex justify-content-between"><span>Pending Payments</span><span><strong>₹12,000 (45 days)</strong></span></li>
                        </ul>

                        <p class="text-muted small">* You can expand this section with additional charts or data tables as needed.</p> -->

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('dailySalesChart').getContext('2d');

        const labels = <?= json_encode(array_column($daily_sales_trend ?? [], 'sale_date')) ?>;
        const data = <?= json_encode(array_map('floatval', array_column($daily_sales_trend ?? [], 'total_sales'))) ?>;

        const dailySalesChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Total Sales (₹)',
                    data: data,
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                    barThickness: 80, // ✅ fixed bar width
                    maxBarThickness: 80 // ✅ ensure consistent maximum
                }]
            },
            options: {
                maintainAspectRatio: false, // allows fixed height control
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Date'
                        },
                        ticks: {
                            autoSkip: false,
                            maxRotation: 90,
                            minRotation: 45
                        }
                    },
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Total Sales (₹)'
                        }
                    }
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return '₹' + context.parsed.y.toLocaleString();
                            }
                        }
                    },
                    legend: {
                        display: false
                    }
                }
            }
        });
    });
</script>
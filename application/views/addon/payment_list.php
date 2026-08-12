<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between align-items-center px-3">
                    <h6 class="text-white text-capitalize ps-3 mb-0"><?= $pagetitle ?></h6>
                    <a href="new_payment.php" class="btn btn-sm text-white text-primary" style="border: 0.5px solid white">New Payment</a>
                </div>
                <div class="card-body px-4 py-3">
                    <form method="get" class="row g-4 px-10">
                        <div class="col-md-2">
                            <input type="date"
                                name="from"
                                value="<?= $from ?? date('Y-m-01') ?>"
                                class="form-control form-control-sm"
                                style="border: 0.5px solid gray; border-radius: 5px;">
                        </div>

                        <div class="col-md-2">
                            <input type="date"
                                name="to"
                                value="<?= $to ?? date('Y-m-d') ?>"
                                class="form-control form-control-sm"
                                style="border: 0.5px solid gray; border-radius: 5px;">
                        </div>


                        <div class="col-md-3">
                            <input type="text"
                                name="search_key"
                                value=""
                                placeholder="Search...."
                                class="form-control form-control-sm"
                                style="border: 0.5px solid gray; border-radius: 5px;">
                        </div>

                        <div class="col-md-2 d-flex align-items-end">
                            <button type="submit"
                                class="btn btn-sm bg-gradient-primary px-2 py-1"
                                title="Filter"
                                style="border-radius: 8px;">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </form>


                    <div class="table-responsive">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Voucher No</th>
                                    <th>Branch Name</th>
                                    <th>Customer / Party</th>
                                    <th>Description</th>
                                    <th>Mode</th>
                                    <th class="text-end">Amount</th>
                                    <th class="text-center"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($payments)): ?>
                                    <?php $i = ($page - 1) * $limit + 1; // SL number offset based on current page 
                                    ?>
                                    <?php foreach ($payments as $row): ?>
                                        <tr>
                                            <!-- Serial Number -->
                                            <td><?= $i++ ?></td>

                                            <!-- Date -->
                                            <td><?= date('d-M-Y', strtotime($row['date'])) ?></td>

                                            <!-- Voucher Number -->
                                            <td><?= $row['voucher'] ?></td>

                                            <!-- Branch Name -->
                                            <td><?= $row['branch'] ?></td>

                                            <!-- Customer / Party -->
                                            <td>
                                                <?php if (!empty($row['customer'])): ?>
                                                    <?php foreach ($row['customer'] as $cust): ?>
                                                        <div style="border-bottom: 1px solid #eee; padding: 2px 0;"><?= $cust ?></div>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </td>

                                            <!-- Description -->
                                            <td class="text-center"><?= $row['description'] ?></td>

                                            <!-- Mode -->
                                            <td>
                                                <?php if (!empty($row['mode'])): ?>
                                                    <?php foreach ($row['mode'] as $mode): ?>
                                                        <div style="border-bottom: 1px solid #eee; padding: 2px 0;"><?= $mode ?></div>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </td>

                                            <!-- Amount -->
                                            <td class="text-end">
                                                <?php if (!empty($row['amount'])): ?>
                                                    <?php foreach ($row['amount'] as $amt): ?>
                                                        <div style="border-bottom: 1px solid #eee; padding: 2px 0;"><?= number_format($amt, 2) ?></div>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </td>

                                            <!-- Action Buttons -->
                                            <td class="text-center">
                                                <a href="<?= base_url('view_payment?voucher=' . urlencode($row['voucher']) . '&reference=' . urlencode($row['reference']) . '&acc_ids=' . urlencode(json_encode($row['acc_ids']))) ?>" class="btn btn-sm bg-gradient-primary">View Payment</a>
                                                <a href="<?= base_url('view?voucher=' . urlencode($row['voucher']) . '&reference=' . urlencode($row['reference']) . '&acc_ids=' . urlencode(json_encode($row['acc_ids']))) ?>" class="btn btn-sm bg-gradient-primary">View</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="9" class="text-center text-muted py-3">No payments found</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- ✅ Pagination Section -->
                    <?php if (!empty($total_pages) && $total_pages > 1): ?>
                        <nav aria-label="Page navigation" class="mt-4">
                            <ul class="pagination justify-content-center">
                                <!-- Prev -->
                                <li class="page-item <?= $page <= 1 ? 'disabled' : '' ?>">
                                    <a class="page-link"
                                        href="?page=<?= $page - 1 ?>&search_key=<?= urlencode($_GET['search_key'] ?? '') ?>&from=<?= $_GET['from'] ?? '' ?>&to=<?= $_GET['to'] ?? '' ?>"
                                        aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>

                                <!-- Page Numbers -->
                                <?php for ($p = 1; $p <= $total_pages; $p++): ?>
                                    <li class="page-item <?= $p == $page ? 'active' : '' ?>">
                                        <a class="page-link"
                                            href="?page=<?= $p ?>&search_key=<?= urlencode($_GET['search_key'] ?? '') ?>&from=<?= $_GET['from'] ?? '' ?>&to=<?= $_GET['to'] ?? '' ?>">
                                            <?= $p ?>
                                        </a>
                                    </li>
                                <?php endfor; ?>

                                <!-- Next -->
                                <li class="page-item <?= $page >= $total_pages ? 'disabled' : '' ?>">
                                    <a class="page-link"
                                        href="?page=<?= $page + 1 ?>&search_key=<?= urlencode($_GET['search_key'] ?? '') ?>&from=<?= $_GET['from'] ?? '' ?>&to=<?= $_GET['to'] ?? '' ?>"
                                        aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
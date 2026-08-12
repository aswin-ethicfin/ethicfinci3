<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">General Ledger</h6>
                </div>

                <div class="card p-3">
                    <form method="get" action="">
                        <div class="text-end ms-auto d-flex">

                            <!-- Branch Dropdown -->
                            <select name="branch_id" class="form-control me-2">
                                <option value="">Select Branch</option>
                                <?php foreach ($branches as $branch): ?>
                                    <option value="<?= $branch['id'] ?>" <?= ($selected_branch_id ?? '') == $branch['id'] ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($branch['name']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>

                            <!-- Category Dropdown -->
                            <select name="category_id" class="form-control me-2">
                                <option value="">Select Category</option>
                                <?php foreach ($categories as $category): ?>
                                    <option value="<?= $category['id'] ?>" <?= ($selected_category_id ?? '') == $category['id'] ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($category['name']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>

                            <!-- Search Field -->
                            <input type="text" name="search" class="form-control me-2" placeholder="Search..." value="<?= htmlspecialchars($search ?? '') ?>">

                            <!-- Submit Button -->
                            <button class="btn btn-info mb-0 btn-sm">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>

                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Account Name</th>
                                    <th>Category</th>
                                    <th class="text-end">Balance</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($accounts)) : ?>
                                    <?php $i = 1; ?>
                                    <?php foreach ($accounts as $acc): ?>
                                        <tr style="cursor: pointer;"
                                            onclick="window.location.href='<?= base_url('home/ledger_statement?id=' . $acc['id']) ?>'">
                                            <td><?= $i++ ?></td>
                                            <td><?= $acc['name'] ?></td>
                                            <td><?= $acc['type'] ?> | <?= $acc['subtype']?></td>
                                            <td class="text-end"><?= number_format($acc['balance'], 2) ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="7" class="text-center">No data found</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
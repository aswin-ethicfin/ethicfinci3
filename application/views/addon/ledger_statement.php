<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3"><?= $pagetitle ?></h6>
                </div>
                <div class="container-fluid py-4">
                    <div class="row">
                        <div class="col-xl-12 col-xxl-12 col-lg-12 col-md-12 my_tabll">
                            <div class="card p-4 d-flex flex-row align-items-center">

                                <!-- Logo -->
                                <div class="cus_logo me-3">
                                    <img src="assets/img/customer-logo.jpg" alt="Customer Logo">
                                </div>

                                <!-- Ledger Info -->
                                <div class="customer_head">
                                    <h6 class="mb-1 text-sm">Ledger - <?= $ledger_id ?? '' ?></h6>

                                    <?php if (!empty($ledger_info)): ?>
                                        <span class="text-xs"><?= $ledger_info['type_name'] ?> | <?= $ledger_info['subtype_name'] ?></span>
                                    <?php else: ?>
                                        <span class="text-xs">No Category Found</span>
                                    <?php endif; ?>

                                    <p class="mb-0 mt-1">
                                        <span class="hspan" style="color:#032e46">
                                            <small>Opening Balance :</small> <b><?= number_format($opening_balance ?? 0, 2) ?></b>
                                        </span>
                                        <span class="hspan" style="color:#c94f4f">
                                            <small>Debit :</small> <?= number_format($total_debit ?? 0, 2) ?>
                                        </span>
                                        <span class="hspan" style="color:#11936d">
                                            <small>Credit :</small> <?= number_format($total_credit ?? 0, 2) ?>
                                        </span>
                                    </p>
                                </div>

                                <!-- Right Side -->
                                <div class="ms-auto d-flex flex-column align-items-end">

                                    <!-- Balance & Mode of Payment -->
                                    <div class="mb-1 text-end" style="font-size: 0.75rem;">
                                        <div><small>Balance :</small> <?= number_format($balance ?? 0, 2) ?></div>
                                        <div><small>Mode of Payment :</small> <?= $mode_of_payment ?? '' ?></div>
                                    </div>

                                    <!-- Buttons -->
                                    <div class="d-flex gap-2">
                                        <span id="cancelbtn"
                                            class="badge bg-gradient-warning text-white"
                                            style="font-size: 0.75rem; padding: 5px 10px; border-radius: 4px; cursor: pointer; display:<?= isset($show_cancel) && $show_cancel ? 'inline-block' : 'none' ?>;"
                                            onclick="cancust('<?= $ledger_id ?? '' ?>');">
                                            Cancel
                                        </span>

                                        <a href="https://accounts.ethicfin.com/home/"
                                            class="badge bg-gradient-secondary text-white"
                                            style="font-size: 0.75rem; padding: 5px 10px; border-radius: 4px; cursor: pointer; text-decoration: none;">
                                            View Profile
                                        </a>

                                        <a href="https://accounts.ethicfin.com/home/printledgerstatement?acc=<?= $ledger_id ?? '' ?>&from=<?= $from_date ?>&to=<?= $to_date ?>"
                                            class="badge bg-gradient-info text-white"
                                            style="font-size: 0.75rem; padding: 5px 10px; border-radius: 4px; cursor: pointer; text-decoration: none;">
                                            Print Preview
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-xl-12 col-xxl-12 col-lg-12 col-md-12 my_tabll">
                            <div class="card">
                                <div class="card-header d-flex align-items-center border-0 br">
                                    <!-- Title -->
                                    <h4 class="card-title mb-0">Transactions</h4>

                                    <!-- Filter Form aligned to right -->
                                    <form method="get" action="" class="d-flex align-items-center ms-auto">
                                        <input name="id" type="hidden" value="<?= $this->input->get('id') ?>">

                                        <div class="me-2">
                                            <input id="from" name="from_date" value="<?= $from_date ?>"
                                                class="multisteps-form__input form-control form-control-sm"
                                                type="date" required
                                                onfocus="focused(this)"
                                                onfocusout="defocused(this)">
                                        </div>

                                        <div class="me-2">
                                            <input id="to" name="to_date" value="<?= $to_date ?>"
                                                class="multisteps-form__input form-control form-control-sm"
                                                type="date" required
                                                onfocus="focused(this)"
                                                onfocusout="defocused(this)">
                                        </div>

                                        <input name="q" type="hidden" value="" placeholder="Search">

                                        <button class="btn bg-gradient-primary btn-sm mb-0" title="Filter">S</button>
                                    </form>
                                </div>
                            </div>


                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-responsive-md mb-0">
                                        <thead class="thead-light">
                                            <tr>
                                                <th><strong>#</strong></th>
                                                <th><strong>Date</strong></th>
                                                <th class="text-center"><strong>Reference</strong></th>
                                                <th class="text-center"><strong>Ledger</strong></th>
                                                <th class="text-center"><strong>Description</strong></th>
                                                <th class="text-center"><strong>Debit</strong></th>
                                                <th class="text-center"><strong>Credit</strong></th>
                                                <th class="text-center"><strong>Balance</strong></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($ledgers)) : ?>
                                                <?php
                                                $count = 1;
                                                $balance = $opening_balance; // You can compute running balance if needed
                                                ?>
                                                <?php $i = 1; ?>
                                                <?php foreach ($ledgers as $referenceGroup): ?>
                                                    <?php foreach ($referenceGroup as $ledger): ?>
                                                        <?php
                                                        $balance = $balance + ($ledger['debit'] ?? 0) - ($ledger['credit'] ?? 0);
                                                        ?>
                                                        <tr>
                                                            <td><?= $i++ ?></td>
                                                            <td>
                                                                <?= !empty($ledger['date'])
                                                                    ? date('d-M-Y', strtotime($ledger['date']))
                                                                    : '' ?>
                                                            </td>
                                                            <td class="text-center"><?= $ledger['reference'] ?? '' ?></td>
                                                            <td class="text-center"><b><?= $ledger['acc_name'] ?? '' ?></b></td>
                                                            <td class="text-center"><?= $ledger['description'] ?? '' ?></td>
                                                            <td class="text-end"><b><?= number_format($ledger['debit'] ?? 0, 2) ?></b></td>
                                                            <td class="text-end"><b><?= number_format($ledger['credit'] ?? 0, 2) ?></b></td>
                                                            <td class="text-end"><b><?= $balance ?></b></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php endforeach; ?>
                                            <?php else : ?>
                                                <tr>
                                                    <td colspan="8" class="text-center">No transactions found</td>
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
        </div>
    </div>
</div>
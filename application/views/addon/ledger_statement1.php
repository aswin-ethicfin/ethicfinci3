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
                            <div class="card p-4 d-flex  flex-row">
                                <div class="">
                                    <div class="cus_logo">
                                        <img src="assets/img/customer-logo.jpg">
                                    </div>
                                </div>
                                <div class="customer_head">
                                    <?php if (!empty($ledger_info)): ?>
                                        <span class="hbtn">
                                            <?= $ledger_info['type_name'] ?> | <?= $ledger_info['subtype_name'] ?>
                                        </span>
                                    <?php else: ?>
                                        <span>No Category Found</span>
                                    <?php endif; ?>
                                    <p class="mb-0 mt-0">
                                        <span class="hspan" style="color:#032e46">
                                            <small>Opening Balance :</small> <?= number_format($opening_balance ?? 0, 2) ?>
                                        </span>
                                        <span class="hspan" style="color:#c94f4f">
                                            <small>Debit :</small> <?= number_format($total_debit ?? 0, 2) ?>
                                        </span>
                                        <span class="hspan" style="color:#11936d">
                                            <small>Credit :</small> <?= number_format($total_credit ?? 0, 2) ?>
                                        </span>
                                    </p>
                                </div>
                                <div class="d-flex justify-content-end align-items-center m-auto">
                                    <button class="hbtn hbtn1 me-2">View Profile</button>
                                    <button class="hbtn hbtn2">Print Preview</button>
                                </div>
                            </div>


                        </div>
                        <div class="col-xl-12 col-xxl-12 col-lg-12 col-md-12 my_tabll">
                            <div class="card">
                                <div class="card-header d-flex align-items-center border-0 br">
                                    <div class="d-flex align-items-center">
                                        <h4 class="card-title mb-0">Transactions</h4>
                                    </div>
                                    <form method="get" action="">
                                        <input type="hidden" name="id" value="<?= $this->input->get('id')  ?>">
                                        <div class="text-end ms-auto d-flex">
                                            <input type="date" class="form-control me-2" name="from_date" value="<?= $from_date ?>">
                                            <input type="date" class="form-control me-2" name="to_date" value="<?= $to_date ?>">
                                            <button class="btn btn-info mb-0 btn-sm"><i class="fa fa-search"></i></button>
                                        </div>
                                    </form>
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
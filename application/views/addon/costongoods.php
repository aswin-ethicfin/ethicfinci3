<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3"><?= $pagetitle ?></h6>
                </div>
                <div class="card-body px-4 py-3">
                    <!-- Filter section for inside card-body -->
                    <form method="get" action="" class="row g-3 mb-4">
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
                                    <option value="<?= $branch['id'] ?>" <?= ($this->input->get('branch_id') == $branch['id']) ? 'selected' : '' ?>><?= htmlspecialchars($branch['name']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-12 text-end">
                            <button type="submit" class="btn btn-primary">Filter</button>
                            <a href="<?= base_url('home/costongoods') ?>" class="btn btn-secondary">Reset</a>
                        </div>
                    </form>

                    <div class="list-group">
                        <button class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" data-bs-toggle="modal" data-bs-target="#valuesModal">
                            <span>Cost on goods amount:</span>
                            <span><?= number_format($totals['stock_value'], 2) ?></span>
                        </button>
                    </div>

                    <!-- Modal -->
                    <!-- Modal with expandable distribution rows (clean, no $ symbol, Stock Value bold, and plain distribution) -->
                    <div class="modal fade" id="valuesModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-white">
                                    <h5 class="text-white text-capitalize ps-3">Detailed Values</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <div class="d-flex justify-content-between align-items-center expandable-row" data-bs-toggle="collapse" data-bs-target="#openingDetails" aria-expanded="false" style="cursor:pointer;">
                                                <span>Opening Value</span>
                                                <span><?= number_format($totals['opening_value'], 2) ?></span>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="d-flex justify-content-between align-items-center expandable-row" data-bs-toggle="collapse" data-bs-target="#inflowDetails" aria-expanded="false" style="cursor:pointer;">
                                                <span>Inflow</span>
                                                <span><?= number_format($totals['inflow_value'], 2) ?></span>
                                            </div>
                                            <div class="collapse mt-2" id="inflowDetails">
                                                <div class="small ps-2">
                                                    <div class="d-flex justify-content-between"><span>Purchase</span><span><?= $totals['taxable_sum']?></span></div>
                                                    <div class="d-flex justify-content-between"><span>Sales Return</span><span>-</span></div>
                                                    <div class="d-flex justify-content-between"><span>Credit Note</span><span>-</span></div>
                                                    <div class="d-flex justify-content-between"><span>Inbound</span><span>-</span></div>
                                                    <div class="d-flex justify-content-between"><span>Production In</span><span>-</span></div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="d-flex justify-content-between align-items-center expandable-row" data-bs-toggle="collapse" data-bs-target="#outflowDetails" aria-expanded="false" style="cursor:pointer;">
                                                <span>Outflow</span>
                                                <span><?= number_format($totals['outflow_value'], 2) ?></span>
                                            </div>
                                            <div class="collapse mt-2" id="outflowDetails">
                                                <div class="small ps-2">
                                                    <div class="d-flex justify-content-between"><span>Sale</span><span>-</span></div>
                                                    <div class="d-flex justify-content-between"><span>Purchase Return</span><span>-</span></div>
                                                    <div class="d-flex justify-content-between"><span>Debit Note</span><span>-</span></div>
                                                    <div class="d-flex justify-content-between"><span>Outbound</span><span>-</span></div>
                                                    <div class="d-flex justify-content-between"><span>Production Out</span><span>-</span></div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="d-flex justify-content-between align-items-center expandable-row" data-bs-toggle="collapse" data-bs-target="#stockDetails" aria-expanded="false" style="cursor:pointer;">
                                                <span><strong>Stock Value</strong></span>
                                                <span><strong><?= number_format($totals['stock_value'], 2) ?></strong></span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
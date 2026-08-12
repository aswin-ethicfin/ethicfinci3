<style>
    .pagination.pagination-primary .page-item.active>.page-link {
        background-image: linear-gradient(195deg, #EC407A 0%, #D81B60 100%);
        /* Matches your bg-gradient-primary */
        color: #fff;
        border: none;
        box-shadow: 0 3px 5px -1px rgba(0, 0, 0, 0.09), 0 2px 3px -1px rgba(0, 0, 0, 0.07);
    }

    .page-link {
        padding: 0.5rem 0.75rem;
        border-radius: 50% !important;
        margin: 0 2px;
        color: #7b809a;
        border: none;
    }
</style>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-lg-12 col-md-6 mx-auto">
            <div class="card shadow-lg border-radius-xl">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between align-items-center px-3">
                        <h6 class="text-white text-capitalize mb-0"><?= $pagetitle ?></h6>
                        <div class="d-flex">
                            <button class="btn bg-gradient-primary shadow-primary btn-sm mb-0 me-2" onclick="window.print()">Print Report</button>
                            <button class="btn bg-gradient-primary shadow-primary btn-sm mb-0">Export To PDF</button>
                        </div>
                    </div>
                </div>

                <div class="card-body p-4">

                    <div class="row mb-5">
                        <div class="col-md-3">
                            <div class="border-start border-primary border-4 ps-3">
                                <p class="text-xs font-weight-bold text-uppercase text-muted mb-1">Items Reported</p>
                                <h5 class="font-weight-bolder mb-0">9 Types</h5>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="border-start border-success border-4 ps-3">
                                <p class="text-xs font-weight-bold text-uppercase text-muted mb-1">Total Quantity</p>
                                <h5 class="font-weight-bolder mb-0 text-success">60 KGS</h5>
                            </div>
                        </div>
                        <?php
                        $branchName = (isset($_GET['branch']) && $_GET['branch'] != 'All Branches') ? $_GET['branch'] : "Global Inventory";
                        ?>

                        <div class="col-md-3">
                            <div class="border-start border-info border-4 ps-3">
                                <p class="text-xs font-weight-bold text-uppercase text-muted mb-1">Location Focus</p>
                                <h5 class="font-weight-bolder mb-0 text-truncate"><?= htmlspecialchars($branchName) ?></h5>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="border-start border-dark border-4 ps-3">
                                <p class="text-xs font-weight-bold text-uppercase text-muted mb-1">Total Valuation</p>
                                <h5 class="font-weight-bolder mb-0">42,620.00</h5>
                            </div>
                        </div>
                    </div>
                    <div class="border-0 shadow-0 mb-4">
                        <form method="POST" action="<?= base_url('home/inventoryreport') ?>" class="row g-3 align-items-end">
                            <div class="col-md-2">
                                <label class="form-label text-xs font-weight-bold text-uppercase text-muted">From</label>
                                <input type="date" name="from_date" class="form-control form-control-sm">
                            </div>

                            <div class="col-md-2">
                                <label class="form-label text-xs font-weight-bold text-uppercase text-muted">To</label>
                                <input type="date" name="to_date" class="form-control form-control-sm">
                            </div>

                            <div class="col-md-2">
                                <label class="form-label text-xs font-weight-bold text-uppercase text-muted">Item</label>
                                <select name="item" class="form-select form-select-sm">
                                    <option selected>All Items</option>
                                    <option value="1">Item Type A</option>
                                    <option value="2">Item Type B</option>
                                </select>
                            </div>

                            <div class="col-md-2">
                                <label class="form-label text-xs font-weight-bold text-uppercase text-muted">Warehouse</label>
                                <select name="warehouse" class="form-select form-select-sm">
                                    <option selected>All Warehouses</option>
                                    <option value="1">Warehouse A</option>
                                    <option value="2">Warehouse B</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label text-xs font-weight-bold text-uppercase text-muted">Branch</label>
                                <select name="branch" class="form-select form-select-sm">
                                    <option selected>All Branches</option>
                                    <option value="1">Main Warehouse</option>
                                    <option value="2">North Retail</option>
                                </select>
                            </div>
                            <div class="col-md-2 d-flex">
                                <button type="submit" class="btn btn-primary btn-sm w-15 me-2 d-flex justify-content-center align-items-center">
                                    <i class="fas fa-filter me-1"></i>
                                </button>
                                <a href="<?= base_url('home/inventoryreport') ?>" class="btn btn-light btn-sm w-15 border d-flex justify-content-center align-items-center">
                                    <i class="fas fa-refresh"></i>
                                </a>
                            </div>
                        </form>
                    </div>
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Inv Date</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Item / Purchase No</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Description</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Price</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Qty/UQC</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Taxable</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">COGS</th>
                                    <th class="text-end text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 pe-4">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $rows = [
                                    ['28-Aug-2025', 'J2', 'PR01001', 'Raw Material A', '300.00', '20', 'KGS', '6,000.00', '0.00', '6,000.00'],
                                    ['28-Aug-2025', 'D1', 'PR01001', 'Raw Material A', '250.00', '5', 'KGS', '1,250.00', '0.00', '1,250.00'],
                                    ['28-Aug-2025', 'P1', 'PR01001', 'Raw Material A', '700.00', '5', 'KGS', '3,500.00', '0.00', '3,500.00'],
                                    ['28-Aug-2025', 'T1', 'PR01001', 'Raw Material A', '700.00', '5', 'KGS', '3,500.00', '0.00', '3,500.00'],
                                    ['28-Aug-2025', 'C2', 'PR01001', 'Raw Material A', '380.00', '5', 'KGS', '1,900.00', '0.00', '1,900.00'],
                                    ['28-Aug-2025', 'C6', 'PR01001', 'Raw Material A', '900.00', '5', 'KGS', '4,500.00', '0.00', '4,500.00'],
                                    ['28-Aug-2025', 'C1', 'PR01001', 'Raw Material A', '3,000.00', '5', 'KGS', '15,000.00', '0.00', '15,000.00'],
                                    ['28-Aug-2025', 'C4', 'PR01001', 'Raw Material A', '134.00', '5', 'KGS', '670.00', '0.00', '670.00'],
                                    ['28-Aug-2025', 'C3', 'PR01001', 'Raw Material A', '660.00', '5', 'KGS', '3,300.00', '0.00', '3,300.00']
                                ];


                                foreach ($rows as $row): ?>
                                    <tr>
                                        <td class="align-left text-left">
                                            <p class="text-xs font-weight-bold mb-0"><?= $row[0] ?></p>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <div class="avatar avatar-sm me-3 bg-gradient-light border-radius-md d-flex align-items-center justify-content-center">
                                                        <i class="material-icons text-dark text-gradient text-sm">inventory_2</i>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm"><?= $row[1] ?></h6>
                                                    <p class="text-xs text-secondary mb-0"><?= $row[2] ?></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs text-dark font-weight-bold mb-0"><?= $row[3] ?></p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0"><?= $row[4] ?></p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-dark text-xs font-weight-bold"><?= $row[5] ?></span>
                                            <span class="text-dark text-xs"> <?= $row[6] ?></span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-dark text-xs"><?= $row[7] ?></span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-dark text-xs"><?= $row[8] ?></span>
                                        </td>
                                        <td class="align-middle text-end pe-4">
                                            <span class="text-dark text-sm font-weight-bolder"><?= $row[9] ?></span>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-4 border-top pt-3">
                        <div>
                            <p class="text-sm text-muted mb-0">
                                Showing <span class="font-weight-bold">1</span> to <span class="font-weight-bold">9</span> of <span class="font-weight-bold">45</span> entries
                            </p>
                        </div>

                        <nav aria-label="Table navigation">
                            <ul class="pagination pagination-primary pagination-sm mb-0">
                                <li class="page-item disabled">
                                    <a class="page-link" href="javascript:;" aria-label="Previous">
                                        <span aria-hidden="true"><i class="material-icons" style="font-size: 14px; vertical-align: middle;">keyboard_arrow_left</i></span>
                                    </a>
                                </li>
                                <li class="page-item active">
                                    <a class="page-link" href="javascript:;">1</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="javascript:;">2</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="javascript:;">3</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="javascript:;" aria-label="Next">
                                        <span aria-hidden="true"><i class="material-icons" style="font-size: 14px; vertical-align: middle;">keyboard_arrow_right</i></span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
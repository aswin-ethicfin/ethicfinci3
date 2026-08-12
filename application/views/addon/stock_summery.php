<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <div class="containers d-flex justify-content-between align-items-center mb-3">
                        <div class="item">
                            <h6 class="text-white text-capitalize ps-3"><?= $pagetitle ?></h6>
                        </div>
                        <div class="item">
                            <a class="btn btn-outline-white btn-sm mb-0 me-2"
                                href="<?= base_url('home/stock_summery?print=y') ?>"
                                target="_blank">
                                <i class="fas fa-file-pdf"></i> Export to PDF
                            </a>
                            <a class="btn btn-outline-white btn-sm mb-0"
                                href="https://accounts.ethicfin.com/Excelexport/stocksummary?branch=1&date=2025-08-20&warehs=All&filter=All&type=All"
                                target="_blank">
                                <i class="fas fa-file-excel"></i> Export to Excel
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body px-4 py-3">
                    <!-- Filters -->
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <label class="form-label">Filter</label>
                            <select class="form-select">
                                <option>All</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Warehouse</label>
                            <select class="form-select">
                                <option>All</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Product</label>
                            <select class="form-select">
                                <option>All</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Date</label>
                            <input type="date" class="form-control" value="<?= date('Y-m-d') ?>">
                        </div>
                        <div class="col-md-2 d-flex align-items-end">
                            <button class="btn btn-primary ">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle">
                            <thead class="bg-gradient-primary text-white">
                                <tr>
                                    <th>Sl No</th>
                                    <th>Item Code</th>
                                    <th>Item</th>
                                    <th>UoM</th>
                                    <th>Opening<br>Qty</th>
                                    <th>Inflow <br>Qty</th>
                                    <th>Outflow<br> Qty</th>
                                    <th>Closing <br>Qty</th>
                                    <th>Opening<br> Value</th>
                                    <th>Inflow <br>Value</th>
                                    <th>Outflow <br>Value</th>
                                    <th>Stock <br>Value</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>PI01001</td>
                                    <td>Bricks</td>
                                    <td>Kilo Grams</td>
                                    <td>-14</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>-14</td>
                                    <td>400.00</td>
                                    <td>0.00</td>
                                    <td>0.00</td>
                                    <td>400.00</td>
                                    <td>
                                        <button class="btn btn-sm btn-danger">View Details</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>PI01002</td>
                                    <td>Note Book</td>
                                    <td>Kilo Grams</td>
                                    <td>-61</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>-61</td>
                                    <td>2957.33</td>
                                    <td>0.00</td>
                                    <td>0.00</td>
                                    <td>2957.33</td>
                                    <td>
                                        <button class="btn btn-sm btn-danger">View Details</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>PI01003</td>
                                    <td>Chocolates</td>
                                    <td>Kilo Grams</td>
                                    <td>-13</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>-13</td>
                                    <td>2418.39</td>
                                    <td>0.00</td>
                                    <td>0.00</td>
                                    <td>2418.39</td>
                                    <td>
                                        <button class="btn btn-sm btn-danger">View Details</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>SERV01001</td>
                                    <td>Ethical Investments</td>
                                    <td>Bag</td>
                                    <td>-4</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>-4</td>
                                    <td>-250.00</td>
                                    <td>0.00</td>
                                    <td>0.00</td>
                                    <td>-250.00</td>
                                    <td>
                                        <button class="btn btn-sm btn-danger">View Details</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>SERV01002</td>
                                    <td>Ethical Mutual Funds</td>
                                    <td>Buckles</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0.00</td>
                                    <td>0.00</td>
                                    <td>0.00</td>
                                    <td>0.00</td>
                                    <td>
                                        <button class="btn btn-sm btn-danger">View Details</button>
                                    </td>
                                </tr>
                                <!-- Continue adding rows like in screenshot -->
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
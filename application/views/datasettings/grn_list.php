<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3"><?= $pagetitle ?></h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2 ps-5 pe-5">
                    <!-- Filters -->
                    <form method="get" class="mb-4 row">
                        <div class="col-md-3">
                            <label>From Date</label>
                            <input type="date" name="from_date" class="form-control" value="<?= set_value('from_date', $this->input->get('from_date')) ?>">
                        </div>
                        <div class="col-md-3">
                            <label>To Date</label>
                            <input type="date" name="to_date" class="form-control" value="<?= set_value('to_date', $this->input->get('to_date')) ?>">
                        </div>
                        <div class="col-md-3">
                            <label>Vendor</label>
                            <select name="vendor_id" class="form-control">
                                <option value="">All Vendors</option>
                                <?php foreach ($vendors as $vendor): ?>
                                    <option value="<?= $vendor['id'] ?>" <?= set_select('vendor_id', $vendor['id'], $this->input->get('vendor_id') == $vendor['id']) ?>><?= $vendor['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label>PO Ref</label>
                            <input type="text" name="po_ref" class="form-control" placeholder="PO Reference" value="<?= set_value('po_ref', $this->input->get('po_ref')) ?>">
                        </div>
                        <div class="col-md-12 mt-3">
                            <button type="submit" class="btn btn-primary">Filter</button>
                            <a href="<?= base_url('grn') ?>" class="btn btn-secondary">Reset</a>
                        </div>
                    </form>

                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>GRN No</th>
                                    <th>PO Ref</th>
                                    <th>Total Products</th>
                                    <th>Total Qty</th>
                                    <th>Created By</th>
                                    <th>Manage</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($grns as $grn): ?>
                                    <tr>
                                        <td><?= date('d-m-Y', strtotime($grn['date'])) ?></td>
                                        <td><?= $grn['reference'] ?></td>
                                        <td><?= $grn['po_ref'] ?></td>
                                        <td><?= $grn['total_products'] ?></td>
                                        <td><?= $grn['total_qty'] ?></td>
                                        <td><?= $grn['created_by_name'] ?></td>
                                        <td>
                                            <a href="<?= base_url('grn/view/' . $grn['id']) ?>" class="btn btn-info btn-sm">View</a>
                                            <a href="<?= base_url('grn/edit/' . $grn['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="<?= base_url('grn/convert_invoice/' . $grn['id']) ?>" class="btn btn-success btn-sm">Convert</a>
                                            <button onclick="confirmDelete(<?= $grn['id'] ?>)" class="btn btn-danger btn-sm">Delete</button>
                                            <a href="<?= base_url('grn/download/' . $grn['id']) ?>" class="btn btn-secondary btn-sm">Download</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                <?php if (empty($grns)): ?>
                                    <tr>
                                        <td colspan="7" class="text-center">No GRNs found.</td>
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

<script>
    function confirmDelete(id) {
        if (confirm('Are you sure you want to delete this GRN?')) {
            window.location.href = "<?= base_url('grn/delete/') ?>" + id;
        }
    }
</script>
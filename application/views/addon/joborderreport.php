<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <h6 class="text-white text-capitalize ps-3"><?= $pagetitle ?></h6>
          </div>

          <!-- Filter Form -->
          <form method="get" action="<?= base_url('home/pdctReport') ?>" class="p-3">
            <?php
            $from_default = $_GET['from_date'] ?? date('Y-m-d');
            $to_default   = $_GET['to_date']   ?? date('Y-m-d');
            ?>
            <div class="row g-3">
              <!-- From Date -->
              <div class="col-md-3 col-sm-6">
                <label class="form-label">From Date</label>
                <input type="date" class="form-control" name="from_date" value="<?= $from_default ?>">
              </div>

              <!-- To Date -->
              <div class="col-md-3 col-sm-6">
                <label class="form-label">To Date</label>
                <input type="date" class="form-control" name="to_date" value="<?= $to_default ?>">
              </div>

              <!-- Submit Button -->
              <div class="col-md-2 col-sm-6 d-flex align-items-end">
                <button type="submit" class="btn btn-primary w-100">Filter</button>
              </div>

              <!-- Reset Button -->
              <div class="col-md-2 col-sm-6 d-flex align-items-end">
                <a href="<?= base_url('home/pdctReport') ?>" class="btn btn-outline-secondary w-100">Reset</a>
              </div>
            </div>
          </form>
        </div>

        <div class="card-body px-4 pb-2">
          <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
              <thead class="table-light">
                <tr>
                  <th class="text-center">Sl. No</th>
                  <th>Date</th>
                  <th class="text-center">Invoice No</th>
                  <th style="min-width:220px;">Products</th>
                  <th class="text-end">Quantity</th>
                  <th class="text-end">Price</th>
                  <th class="text-end">Total</th>
                  <th class="text-center">Item Components</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1;
                foreach ($invoices as $inv): ?>
                  <tr>
                    <td class="text-center"><?= $i ?></td>
                    <td><?= date('d-m-Y', strtotime($inv['inv_date'])) ?></td>
                    <td class="text-center"><?= htmlspecialchars($inv['inv_no']) ?></td>
                    <td><?= htmlspecialchars($inv['item_name']) ?></td>
                    <td class="text-end"><?= number_format($inv['quantity'], 2) ?></td>
                    <td class="text-end"><?= number_format($inv['price'], 2) ?></td>
                    <td class="text-end"><?= number_format($inv['grand_total'], 2) ?></td>
                    <td style="font-size: 13px;">
                      <?php if (!empty($inv['items'])): ?>
                        <table class="table table-sm table-bordered mb-0">
                          <thead class="table-light">
                            <tr>
                              <th class="text-center">Item</th>
                              <th class="text-end">Qty</th>
                              <th class="text-end">Price</th>
                              <th class="text-end">Total</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach ($inv['items'] as $item): ?>
                              <tr>
                                <td><?= htmlspecialchars($item['item_name']) ?></td>
                                <td class="text-end">
                                  <?= number_format((float)$item['quantity'], 2) ?>
                                  <?= htmlspecialchars($item['uqc']) ?>
                                </td>
                                <td class="text-end"><?= number_format((float)$item['price'], 2) ?></td>
                                <td class="text-end"><?= number_format((float)$item['grand_total'], 2) ?></td>
                              </tr>
                            <?php endforeach; ?>
                          </tbody>
                        </table>
                      <?php else: ?>
                        <span class="text-muted">No products</span>
                      <?php endif; ?>
                    </td>
                    <td class="text-center">
                      <a href="https://accounts.ethicfin.com/home/viewinvoice?inv=<?= $inv['inv_id'] ?>&x=i"
                        class="btn btn-primary btn-sm">
                        <i class="fas fa-eye"></i>
                      </a>
                    </td>
                    </td>
                  </tr>
                <?php $i++;
                endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Confirm Delete Modal -->
  <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="confirmDeleteLabel">Confirm Deletion</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Are you sure you want to delete this invoice?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-danger" id="confirmDeleteInvoice">Yes, Delete</button>
        </div>
      </div>
    </div>
  </div>
</div>
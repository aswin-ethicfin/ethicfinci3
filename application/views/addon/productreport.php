
<div class="container-fluid py-4">     
  <div class="row">
    <div class="col-12">
      <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <h6 class="text-white text-capitalize ps-3"><?= $pagetitle ?></h6>
          </div>
          <!-- Filter Form -->
            <form method="get" action="<?= base_url('home/productReport') ?>"> <!-- Adjust route if needed -->
              <?php
                  // Set default dates if not coming from GET
                  $from_default = isset($_GET['from_date']) ? $_GET['from_date'] : date('Y-m-d', strtotime('monday this week'));
                  $to_default   = isset($_GET['to_date'])   ? $_GET['to_date']   : date('Y-m-d');
                ?>
              <div class="row mb-4">
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
                  <a href="<?= base_url('home/productReport') ?>" class="btn btn-outline-secondary w-100">Reset</a>
                </div>

              </div>
            </form>
        </div>
        <div class="card-body px-0 pb-2 ps-5 pe-5">
          <div class="card-content"> 
            <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
              <thead>
                <tr>
                  <th style="padding:12px; border:1px solid #ddd; background:#f4f4f4; font-weight:bold;">Sl. No</th>
                  <th style="padding:12px; border:1px solid #ddd; background:#f4f4f4; font-weight:bold;">Date</th>
                  <th style="padding:12px; border:1px solid #ddd; background:#f4f4f4; font-weight:bold;">Invoice No</th>
                  <th style="padding:12px; border:1px solid #ddd; background:#f4f4f4; font-weight:bold;">Description</th>
                  <th style="padding:12px; border:1px solid #ddd; background:#f4f4f4; font-weight:bold;">No. of Products</th>
                  <th style="padding:12px; border:1px solid #ddd; background:#f4f4f4; font-weight:bold;">Amount</th>
                  <th style="padding:12px; border:1px solid #ddd; background:#f4f4f4; font-weight:bold;">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; foreach ($invoices as $inv): ?>
                <tr>
                  <td style="padding:12px; border:1px solid #ddd;"><?= $i ?></td>
                  <td style="padding:12px; border:1px solid #ddd;"><?= date('d-m-Y', strtotime($inv['inv_date'])) ?></td>
                  <td style="padding:12px; border:1px solid #ddd;"><?= htmlspecialchars($inv['inv_no']) ?></td>
                  <td style="padding:12px; border:1px solid #ddd;"><?= !empty($inv['description']) ? htmlspecialchars($inv['description']) : '-' ?></td>
                  <td style="padding:12px; border:1px solid #ddd;" class="text-center"><?= $inv['no_of_products'] ?></td>
                  <td style="padding:12px; border:1px solid #ddd;" class="text-end"><?= number_format($inv['grand_total'], 2) ?></td>
                  <td style="padding:12px; border:1px solid #ddd;" class="text-center">
                    <button class="btn btn-info btn-sm viewInvoiceBtn" data-id="<?= htmlspecialchars($inv['id']) ?>">View</button>
                    <button class="btn btn-danger btn-sm deleteInvoiceBtn" data-ref="<?= htmlspecialchars($inv['id']) ?>">Delete</button>
                  </td>
                </tr>
                <?php $i++; endforeach; ?>
              </tbody>
            </table>
          </div>  
        </div>
      </div>
    </div>
  </div>

  <!-- View Invoice Modal -->
  <div class="modal fade" id="viewInvoiceModal" tabindex="-1" aria-labelledby="viewInvoiceLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header bg-gradient-primary shadow-primary text-white">
          <h5 class="modal-title text-white text-capitalize ps-3" id="viewInvoiceLabel">Invoice Details</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Dynamic content here -->
          <dl class="row">
            <dt class="col-sm-4">Date</dt>
            <dd class="col-sm-8" id="invDate"></dd>

            <dt class="col-sm-4">Invoice No</dt>
            <dd class="col-sm-8" id="invNo"></dd>

            <dt class="col-sm-4">Description</dt>
            <dd class="col-sm-8" id="invDescription"></dd>

            <dt class="col-sm-4">No. of Products</dt>
            <dd class="col-sm-8" id="invProductsCount"></dd>

            <dt class="col-sm-4">Amount</dt>
            <dd class="col-sm-8" id="invAmount"></dd>
          </dl>

          <hr>
          <h6 class="mb-3">Product Details</h6>
          <table class="table table-bordered table-striped" id="invoiceItemsTable">
            <thead>
              <tr>
                <th>Sl. No</th>
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Unit ID</th>
              </tr>
            </thead>
            <tbody>
              <!-- Populated dynamically -->
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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

<script>
$(document).ready(function() {
  let deleteReference = null;



  // When clicking Delete button
  $(".deleteInvoiceBtn").click(function() {
    deleteReference = $(this).data('ref');
    $("#confirmDeleteModal").modal("show");
  });

  // Confirm delete invoice
  $("#confirmDeleteInvoice").click(function() {
    if (!deleteReference) return;

    $.ajax({
      url: "<?= base_url('home/deleteInvoice') ?>",
      method: "POST",
      data: { reference: deleteReference },
      success: function(res) {
        alert("Invoice deleted successfully.");
        $("#confirmDeleteModal").modal("hide");

        // Remove row from table (optional: or refresh page)
        $(`button.deleteInvoiceBtn[data-ref='${deleteReference}']`).closest("tr").remove();

        deleteReference = null;
      },
      error: function() {
        alert("Error deleting invoice.");
      }
    });
  });
});
</script>

<script>
  $(document).ready(function() {
    let deleteReference = null;


    // When clicking the View button
    $(".viewInvoiceBtn").click(function() {
      const reference = $(this).data('id');
      console.log(reference);
      // Ajax call to get invoice + items details by reference
      $.ajax({
        url: "<?= base_url('home/getInvoiceDetails') ?>",
        method: "POST",
        data: {
          id: reference
        },
        success: function(res) {
          const data = JSON.parse(res);
          console.log(res);
          // Populate modal fields
          $("#invDate").text(data.inv_date ? new Date(data.inv_date).toLocaleDateString('en-GB') : '-');
          $("#invNo").text(data.inv_no || '-');
          $("#invDescription").text(data.description || '-');
          $("#invProductsCount").text(data.no_of_products || '0');
          $("#invAmount").text(data.grand_total ? parseFloat(data.grand_total).toFixed(2) : '0.00');

          // Populate product items table
          let itemsHtml = '';
          if (data.items && data.items.length) {
            data.items.forEach((item, idx) => {
              itemsHtml += `
              <tr>
                <td>${idx + 1}</td>
                <td>${item.item_name || '-'}</td>
                <td>${item.quantity || '-'}</td>
                <td>${item.uqc || '-'}</td>
              </tr>`;
            });
          } else {
            itemsHtml = `<tr><td colspan="4" class="text-center text-muted">No products found</td></tr>`;
          }
          $("#invoiceItemsTable tbody").html(itemsHtml);

          // Show modal
          $("#viewInvoiceModal").modal("show");
        },
        error: function() {
          alert("Failed to fetch invoice details.");
        }
      });
    });

    // When clicking Delete button
    $(".deleteInvoiceBtn").click(function() {
      deleteReference = $(this).data('ref');
      $("#confirmDeleteModal").modal("show");
    });

    // Confirm delete invoice
    $("#confirmDeleteInvoice").click(function() {
      if (!deleteReference) return;

      $.ajax({
        url: "<?= base_url('home/deleteInvoice') ?>",
        method: "POST",
        data: {
          reference: deleteReference
        },
        success: function(res) {
          alert("Invoice deleted successfully.");
          $("#confirmDeleteModal").modal("hide");

          // Remove row from table (or refresh page)
          $(`button.deleteInvoiceBtn[data-ref='${deleteReference}']`).closest("tr").remove();

          deleteReference = null;
        },
        error: function() {
          alert("Error deleting invoice.");
        }
      });
    });
  });
</script>
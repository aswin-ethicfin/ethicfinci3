<style>
    .modal-custom-width {
        max-width: 80%;
        /* Or any specific value like 1000px */
        width: 100%;
    }

    /* Reduce font size inside the modal */
    #invoiceModal .modal-body,
    #invoiceModal table,
    #invoiceModal th,
    #invoiceModal td {
        font-size: 0.85rem;
        /* Adjust as needed: 0.8rem, 0.75rem etc */
    }

    /* Optionally reduce heading size inside modal */
    #invoiceModal h5,
    #invoiceModal h6 {
        font-size: 1rem;
    }
</style>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3"><?= $pagetitle ?></h6>
                </div>
                <div class="card-body px-4 py-3">
                    <?php if (!empty($invoice_list)) { ?>
                        <?php foreach ($invoice_list as $inv) { ?>
                            <button
                                id="viewInvoiceBtn"
                                data-reference="<?= htmlspecialchars($inv['reference']); ?>"
                                data-invoiceno="<?= htmlspecialchars($inv['inv_no']); ?>"
                                data-date="<?= htmlspecialchars($inv['inv_date']); ?>"
                                class="btn btn-primary mb-2 me-2 viewInvoiceBtn">
                                View Invoice #<?= htmlspecialchars($inv['inv_no']); ?>
                            </button>
                        <?php } ?>
                    <?php } else { ?>
                        <p>No invoices available.</p>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="invoiceModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-xl modal-custom-width"> <!-- change to modal-xl if you add a table later -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Invoice Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col-md-4 d-flex align-items-center mb-2">
                        <strong class="me-2">Date:</strong>
                        <div id="invoiceDate">-</div>
                    </div>
                    <div class="col-md-4 d-flex align-items-center mb-2">
                        <strong class="me-2">Invoice No:</strong>
                        <div id="invoiceNo">-</div>
                    </div>
                </div>
                <hr>
                <h6>Invoice Items</h6>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Item Name</th>
                                <th>Quantity</th>
                                <th>Unit</th>
                                <th>Price</th>
                                <th>Total</th>
                                <th>Profit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($invoice_items)) { ?>
                                <?php foreach ($invoice_items as $index => $item) { ?>
                                    <!-- Main Invoice Item Row -->
                                    <tr>
                                        <td><?= $index + 1; ?></td>
                                        <td><?= htmlspecialchars($item['item_name']); ?></td>
                                        <td><?= htmlspecialchars($item['quantity']); ?></td>
                                        <td><?= htmlspecialchars($item['unit_name']); ?></td>
                                        <td><?= htmlspecialchars($item['price']); ?></td>
                                        <td><?= htmlspecialchars($item['total']); ?></td>
                                        <td></td>
                                    </tr>

                                    <!-- Sub-table for Profit Details -->
                                    <?php if (!empty($item['profit_details'])) { ?>
                                        <tr>
                                            <td colspan="6" class="p-0">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-sm mb-0 bg-light">
                                                        <thead class="table-secondary">
                                                            <tr>
                                                                <th colspan="7" class="text-start px-3 py-2">Additional Entries (Profit Data)</th>
                                                            </tr>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Unit Price</th>
                                                                <th>Quantity</th>
                                                                <th>Unit Cost</th>
                                                                <th>Purchase Price</th>
                                                                <th>Cost on Goods</th>
                                                                <th>Sales Price</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($item['profit_details'] as $pindex => $profit) { ?>
                                                                <tr>
                                                                    <td><?= $pindex + 1; ?></td>
                                                                    <td><?= htmlspecialchars($profit['unit_price']); ?></td>
                                                                    <td><?= htmlspecialchars($profit['quantity']); ?></td>
                                                                    <td><?= htmlspecialchars($profit['unit_cost_on_goods']); ?></td>
                                                                    <td><?= htmlspecialchars($profit['purchase_price']); ?></td>
                                                                    <td><?= htmlspecialchars($profit['cost_on_goods']); ?></td>
                                                                    <td><?= htmlspecialchars($profit['sales_price']); ?></td>
                                                                </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>
                            <?php } else { ?>
                                <tr>
                                    <td colspan="6" class="text-center">No items found for this invoice.</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- JS -->
<script>
    $(document).on('click', '.viewInvoiceBtn', function() {
        var reference = $(this).data('reference');
        var invoiceno = $(this).data('invoiceno');
        var date = $(this).data('date');

        // Populate static fields
        $('#invoiceReference').text(reference);
        $('#invoiceNo').text(invoiceno);
        $('#invoiceDate').text(date);

        // Clear previous table content
        var $tbody = $('#invoiceModal tbody');
        $tbody.html('<tr><td colspan="6" class="text-center">Loading...</td></tr>');

        // AJAX to fetch invoice items
        $.ajax({
            url: '<?= base_url("home/get_invoice_items") ?>',
            method: 'GET',
            data: {
                ref: reference
            },
            dataType: 'json',
            success: function(res) {
                console.log(res);
                if (res.status && res.items.length > 0) {
                    var rows = '';
                    $.each(res.items, function(i, item) {

                        // Profit details HTML (blank if none)
                        var profitHtml = '';
                        if (item.profit_details && item.profit_details.length > 0) {
                            profitHtml = `
            <div class="table-responsive bg-light rounded p-1 mt-2">
                <table class="table table-sm table-bordered mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Unit Price</th>
                            <th>Qty</th>
                            <th>Unit Cost</th>
                            <th>Purchase Price</th>
                            <th>Cost on Goods</th>
                            <th>Sales Price</th>
                        </tr>
                    </thead>
                    <tbody>
        `;

                            $.each(item.profit_details, function(pindex, profit) {
                                profitHtml += `
                <tr>
                    <td>${pindex + 1}</td>
                    <td class="text-end">${formatAmount(profit.unit_price)}</td>
                    <td class="text-end">${profit.quantity}</td>
                    <td class="text-end">${formatAmount(profit.unit_cost_on_goods)}</td>
                    <td class="text-end">${formatAmount(profit.purchase_price)}</td>
                    <td class="text-end">${formatAmount(profit.cost_on_goods)}</td>
                    <td class="text-end">${formatAmount(profit.sales_price)}</td>
                </tr>
            `;
                            });

                            profitHtml += `
                    </tbody>
                </table>
            </div>
        `;
                        }

                        // Main row with profitHtml inside Total column
                        rows += `
        <tr>
            <td>${i + 1}</td>
            <td>${item.name}</td>
            <td class="text-end">${item.quantity}</td>
            <td>${item.uqc}</td>
            <td class="text-end">${formatAmount(item.price)}</td>
            <td class="text-end">
                ${formatAmount(item.total_price)}
            </td>
            <td class="text-end">
                ${profitHtml}
            </td>
        </tr>
    `;
                    });
                    $tbody.html(rows);
                } else {
                    $tbody.html('<tr><td colspan="6" class="text-center">No items found for this invoice.</td></tr>');
                }
            },
            error: function() {
                $tbody.html('<tr><td colspan="6" class="text-center text-danger">Error retrieving invoice data.</td></tr>');
            }
        });

        // Show modal
        var modal = new bootstrap.Modal(document.getElementById('invoiceModal'));
        modal.show();
    });

    function formatAmount(val) {
        let num = parseFloat(val);
        if (isNaN(num)) num = 0;
        return '' + num.toFixed(2);
    }
</script>
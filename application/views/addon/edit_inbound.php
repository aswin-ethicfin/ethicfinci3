<?php
$pagetitle = "Inbound Entry"; // Page title
?>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <!-- Card Header -->
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <div class="containers d-flex justify-content-between align-items-center mb-3">
                        <div class="item">
                            <h6 class="text-white text-capitalize ps-3"><?= $pagetitle ?></h6>
                        </div>
                    </div>
                </div>

                <!-- Card Body -->
                <div class="card-body px-4 py-3">

                    <!-- Inbound Form -->
                    <div class="card card-body mb-4">
                        <div class="card-body">
                            <div class="row mb-2">
                                <!-- Row 1: Date and Project -->
                                <div class="col-2 form-group">
                                    <label>Date <code>*</code></label>
                                    <input type="date" class="form-control" style="border:1px solid #ccc; border-radius:4px;" name="inv_date" id="inv_date" value="2025-08-21">
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>Select Project</label>
                                    <select id="project" class="form-control" style="border:1px solid #ccc; border-radius:4px;">
                                        <option value="0">-- Select Project --</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <!-- Row 2: Warehouse To & Warehouse From -->
                                <div class="col-md-4 form-group">
                                    <label>Warehouse To</label>
                                    <select id="warehouseid" class="form-control" style="border:1px solid #ccc; border-radius:4px;">
                                        <option value="2" selected>Van1</option>
                                    </select>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>Warehouse From</label>
                                    <select id="fwarehouseid" class="form-control" style="border:1px solid #ccc; border-radius:4px;">
                                        <option value="0" selected>Select Warehouse</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <!-- Row 3: Product & Description -->
                                <div class="col-md-4 form-group">
                                    <label>Select Product</label>
                                    <select id="prod_id" class="form-control" style="border:1px solid #ccc; border-radius:4px;">
                                        <option value="0">-- Select Product --</option>
                                        <option value="3">PI01003-Choclates</option>
                                    </select>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>Description</label>
                                    <input type="text" id="itemdesc" class="form-control" style="border:1px solid #ccc; border-radius:4px;">
                                </div>
                            </div>

                            <div class="row mb-2">
                                <!-- Row 4: Product details continuous -->
                                <div class="col-1 form-group">
                                    <label>Code</label>
                                    <input type="text" id="itemcode" class="form-control" style="border:1px solid #ccc; border-radius:4px;">
                                </div>
                                <div class="col-2 form-group">
                                    <label>Price</label>
                                    <input type="number" id="ptr" class="form-control" style="border:1px solid #ccc; border-radius:4px;" onchange="calctot()" onkeyup="calctot()">
                                </div>
                                <div class="col-1 form-group">
                                    <label>Quantity</label>
                                    <input type="number" id="qty" class="form-control" style="border:1px solid #ccc; border-radius:4px;" onchange="calctot()" onkeyup="calctot()">
                                </div>
                                <div class="col-2 form-group">
                                    <label>Unit</label>
                                    <select id="punit" class="form-control" style="border:1px solid #ccc; border-radius:4px;">
                                        <option value="42" selected>Kilo Grams[KGS]</option>
                                    </select>
                                </div>
                                <div class="col-1 form-group">
                                    <label>Free Qty</label>
                                    <input type="number" id="free_qty" class="form-control" style="border:1px solid #ccc; border-radius:4px;">
                                </div>
                                <div class="col-2 form-group">
                                    <label>Total Quantity</label>
                                    <input type="number" id="tqty" class="form-control" style="border:1px solid #ccc; border-radius:4px;" readonly>
                                </div>
                                <div class="col-2 form-group">
                                    <label>Total</label>
                                    <input type="number" id="total" class="form-control" style="border:1px solid #ccc; border-radius:4px;">
                                </div>
                            </div>

                            <div class="row mb-2">
                                <!-- Row 5: Discount, Disc Amt, VAT, VAT Amount, Total -->
                                <div class="col-1 form-group">
                                    <label>Discount %</label>
                                    <input type="number" id="disc_perc" class="form-control" style="border:1px solid #ccc; border-radius:4px;">
                                </div>
                                <div class="col-2 form-group">
                                    <label>Disc Amt</label>
                                    <input type="number" id="disc_amt" class="form-control" style="border:1px solid #ccc; border-radius:4px;">
                                </div>
                                <div class="col-1 form-group">
                                    <label>VAT %</label>
                                    <input type="number" id="vat_perc" class="form-control" style="border:1px solid #ccc; border-radius:4px;">
                                </div>
                                <div class="col-2 form-group">
                                    <label>Vat Amount</label>
                                    <input type="number" id="vat_amt" class="form-control" style="border:1px solid #ccc; border-radius:4px;">
                                </div>
                                <div class="col-2 form-group">
                                    <label>Total</label>
                                    <input type="number" id="final_total" class="form-control" style="border:1px solid #ccc; border-radius:4px;">
                                </div>
                                <div class="col-1 paddingbtn">
                                    <button class="btn btn-sm btn-primary btn-block" onclick="addtocart()">Add</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Inbound Items Table -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-head-fixed text-nowrap">
                            <thead>
                                <tr>
                                    <th style="font-size:12px;">#</th>
                                    <th style="font-size:12px;">Product</th>
                                    <th style="font-size:12px;" class="text-end">Price</th>
                                    <th style="font-size:12px;" class="text-end">Quantity</th>
                                    <th style="font-size:12px;" class="text-end">Free Qty</th>
                                    <th style="font-size:12px;" class="text-end">Total</th>
                                    <th style="font-size:12px;" class="text-end">Discount</th>
                                    <th style="font-size:12px;" class="text-end">Taxable Value</th>
                                    <th style="font-size:12px;" class="text-end">VAT</th>
                                    <th style="font-size:12px;" class="text-end">Total Amount</th>
                                    <th style="font-size:12px;"></th>
                                    <th style="font-size:12px;"></th>
                                </tr>
                            </thead>
                            <tbody id="inbound-items">
                                <?php
                                $sl = 1;
                                $total_price = $total_qty = $total_free = $total_discount = $total_taxable = $total_vat = $total_amount = $total = 0;
                                foreach ($products as $row):
                                    $total_price   += $row['price'];
                                    $total_qty     += $row['quantity'];
                                    $total_free    += 0; // If you have free qty column, replace here
                                    $total_discount += $row['disc_amt'];
                                    $total_taxable += $row['taxable'];
                                    $total_vat     += $row['vat_amt'];
                                    $total_amount  += $row['total_price'];
                                    $total         += $row['price'] * $row['quantity'];
                                ?>
                                    <tr data-id="<?= $row['id']; ?>">
                                        <td style="font-size:12px;" class="text-center"><?= $sl++; ?></td>
                                        <td style="font-size:12px;">
                                            <?= $row['item_id']; ?> - <?= $row['item_name']; ?><br>
                                            <?= $row['description']; ?>
                                        </td>
                                        <td style="font-size:12px;" class="text-end"><?= number_format($row['price'], 2); ?></td>
                                        <td style="font-size:12px;" class="text-end"><?= $row['quantity']; ?></td>
                                        <td style="font-size:12px;" class="text-end">0</td>
                                        <td style="font-size:12px;" class="text-end"><?= number_format($row['price'] * $row['quantity'], 2); ?></td>
                                        <td style="font-size:12px;" class="text-end"><?= $row['disc_perc']; ?>% / <?= number_format($row['disc_amt'], 2); ?></td>
                                        <td style="font-size:12px;" class="text-end"><?= number_format($row['taxable'], 2); ?></td>
                                        <td style="font-size:12px;" class="text-end"><?= $row['vat_perc']; ?>% / <?= number_format($row['vat_amt'], 2); ?></td>
                                        <td style="font-size:12px;" class="text-end"><?= number_format($row['total_price'], 2); ?></td>

                                        <!-- Edit Button -->
                                        <td class="text-end">
                                            <a onclick="editItem('<?= $row['id']; ?>');">
                                                <span class="badge badge-warning" style="cursor: pointer;">Edit</span>
                                            </a>
                                        </td>

                                        <!-- Remove Button -->
                                        <td class="text-end">
                                            <a onclick="removeitem('<?= $row['id']; ?>','0','<?= $row['price']; ?>','<?= $row['total_price']; ?>');">
                                                <span class="badge badge-danger" style="cursor: pointer;">Remove</span>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                                <!-- Totals Row -->
                                <tr>
                                    <th style="font-size:12px;"></th>
                                    <th style="font-size:12px;">Total</th>
                                    <td style="font-size:12px;" class="text-end"><?= number_format($total_price, 2); ?></td>
                                    <td style="font-size:12px;" class="text-end"><?= $total_qty; ?></td>
                                    <td style="font-size:12px;" class="text-end"><?= $total_free; ?></td>
                                    <td style="font-size:12px;" class="text-end"><?= number_format($total, 2); ?></td>
                                    <td style="font-size:12px;" class="text-end"><?= number_format($total_discount, 2); ?></td>
                                    <td style="font-size:12px;" class="text-end"><?= number_format($total_taxable, 2); ?></td>
                                    <td style="font-size:12px;" class="text-end"><?= number_format($total_vat, 2); ?></td>
                                    <td style="font-size:12px;" class="text-end"><?= number_format($total_amount, 2); ?></td>
                                    <th style="font-size:12px;"></th>
                                    <th style="font-size:12px;"></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>


                </div> <!-- End Card Body -->

            </div>
        </div>
    </div>
</div>
<!-- Edit Inbound Item Modal -->
<div class="modal fade" id="editInboundModal" tabindex="-1" aria-labelledby="editInboundModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title text-white" id="editInboundModalLabel">Edit Inbound Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form id="editInboundForm">
                    <input type="hidden" id="editItemId" name="item_id">


                    <!-- Row 3: Product & Description -->
                    <div class="row mb-2">
                        <div class="col-md-4 form-group">
                            <label>Description</label>
                            <input type="text" id="edit_itemdesc" class="form-control" style="border:1px solid #ccc; border-radius:4px;">
                        </div>
                    </div>

                    <!-- Row 4: Product details continuous -->
                    <div class="row mb-2">
                        <div class="col-2 form-group">
                            <label>Code</label>
                            <input type="text" id="edit_itemcode" class="form-control" style="border:1px solid #ccc; border-radius:4px;">
                        </div>
                        <div class="col-2 form-group">
                            <label>Price</label>
                            <input type="number" id="edit_ptr" class="form-control" style="border:1px solid #ccc; border-radius:4px;" onchange="editCalcTotal()" onkeyup="editCalcTotal()">
                        </div>
                        <div class="col-1 form-group">
                            <label>Quantity</label>
                            <input type="number" id="edit_qty" class="form-control" style="border:1px solid #ccc; border-radius:4px;" onchange="editCalcTotal()" onkeyup="editCalcTotal()">
                        </div>
                        <div class="col-2 form-group">
                            <label>Unit</label>
                            <select id="edit_punit" class="form-control" style="border:1px solid #ccc; border-radius:4px;">
                                <option value="" selected></option>
                            </select>
                        </div>
                        <div class="col-1 form-group">
                            <label>Free Qty</label>
                            <input type="number" id="edit_free_qty" class="form-control" style="border:1px solid #ccc; border-radius:4px;">
                        </div>
                        <div class="col-2 form-group">
                            <label>Total Quantity</label>
                            <input type="number" id="edit_tqty" class="form-control" style="border:1px solid #ccc; border-radius:4px;" readonly>
                        </div>
                        <div class="col-2 form-group">
                            <label>Total</label>
                            <input type="number" id="edit_total" class="form-control" style="border:1px solid #ccc; border-radius:4px;" readonly>
                        </div>
                    </div>

                    <!-- Row 5: Discount, Disc Amt, VAT, Vat Amount, Total -->
                    <div class="row mb-2">
                        <div class="col-2 form-group">
                            <label>Discount %</label>
                            <input type="number" id="edit_disc_perc" class="form-control" style="border:1px solid #ccc; border-radius:4px;">
                        </div>
                        <div class="col-2 form-group">
                            <label>Disc Amt</label>
                            <input type="number" id="edit_disc_amt" class="form-control" style="border:1px solid #ccc; border-radius:4px;">
                        </div>
                        <div class="col-2 form-group">
                            <label>VAT %</label>
                            <input type="number" id="edit_vat_perc" class="form-control" style="border:1px solid #ccc; border-radius:4px;">
                        </div>
                        <div class="col-2 form-group">
                            <label>Vat Amount</label>
                            <input type="number" id="edit_vat_amt" class="form-control" style="border:1px solid #ccc; border-radius:4px;">
                        </div>
                        <div class="col-2 form-group">
                            <label>Total</label>
                            <input type="number" id="edit_final_total" class="form-control" style="border:1px solid #ccc; border-radius:4px;">
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="updateInboundItem()">Update</button>
            </div>
        </div>
    </div>
</div>
<script>
    function editItem(itemId) {
        fetch("<?= base_url('home/get_item_details'); ?>?id=" + itemId)
            .then(response => response.json())
            .then(data => {
                if (!data || !data.success) {
                    alert("Could not fetch item details.");
                    return;
                }


                // Your controller returns an array
                let item = Array.isArray(data.item) ? data.item[0] : data.item;

                document.getElementById('editItemId').value = item.id;
                document.getElementById('edit_itemdesc').value = item.description; // from table
                document.getElementById('edit_itemcode').value = item.hsncode; // itemcode = reference
                document.getElementById('edit_ptr').value = item.price;
                document.getElementById('edit_qty').value = item.quantity;
                // document.getElementById('edit_punit').value = item.unit_id; // dropdown
                document.getElementById('edit_free_qty').value = item.free_qty ?? 0; // not in table → set default 0
                document.getElementById('edit_tqty').value = (parseFloat(item.quantity) + parseFloat(item.free_qty ?? 0));
                document.getElementById('edit_total').value = item.total_price; // total = total_price in DB
                document.getElementById('edit_disc_perc').value = item.disc_perc;
                document.getElementById('edit_disc_amt').value = item.disc_amt;
                document.getElementById('edit_vat_perc').value = item.vat_perc;
                document.getElementById('edit_vat_amt').value = item.vat_amt;
                document.getElementById('edit_final_total').value = item.total_price; // final total = total_price
                // final total = total_price
                let punitSelect = document.getElementById('edit_punit');

                // Clear old options
                punitSelect.innerHTML = "";

                // Add the current item's UOM
                let opt = document.createElement("option");
                opt.value = item.unit_id ?? 0; // backend ID
                opt.text = item.uqc; // show UQC in UI
                opt.selected = true;
                punitSelect.appendChild(opt);

                // Show modal
                var modal = new bootstrap.Modal(document.getElementById('editInboundModal'));
                modal.show();
            })
            .catch(error => console.error("Error fetching item:", error));
    }

    function updateInboundItem() {
        let formData = {
            id: document.getElementById('editItemId').value,
            description: document.getElementById('edit_itemdesc').value,
            price: document.getElementById('edit_ptr').value,
            quantity: document.getElementById('edit_qty').value,
            free_qty: document.getElementById('edit_free_qty').value,
            total: document.getElementById('edit_total').value, // will be mapped to total_price in PHP
            disc_perc: document.getElementById('edit_disc_perc').value,
            disc_amt: document.getElementById('edit_disc_amt').value,
            vat_perc: document.getElementById('edit_vat_perc').value,
            vat_amt: document.getElementById('edit_vat_amt').value,
            final_total: document.getElementById('edit_final_total').value,
            unit_id: document.getElementById('edit_punit').value
        };

        $.ajax({
            url: "<?= base_url('home/update_inbound_item'); ?>", // keep inside PHP view
            type: "POST",
            data: formData,
            dataType: "json",
            success: function(res) {
                if (res.success) {
                    // alert(res.message);
                    $('#editInboundModal').modal('hide'); // close modal
                    // location.reload(); // reload table
                    $('tr[data-id="' + res.data.id + '"]').replaceWith(res.data.row_html);
                } else {
                    alert("Error: " + res.message);
                }
            },
            error: function(xhr, status, error) {
                alert("AJAX Error: " + error);
            }
        });
    }

    function editCalcTotal() {
        let price = parseFloat(document.getElementById('edit_ptr').value) || 0;
        let qty = parseFloat(document.getElementById('edit_qty').value) || 0;
        let freeQty = parseFloat(document.getElementById('edit_free_qty').value) || 0;
        let discPerc = parseFloat(document.getElementById('edit_disc_perc').value) || 0;
        let vatPerc = parseFloat(document.getElementById('edit_vat_perc').value) || 0;

        // Total quantity
        let totalQty = qty + freeQty;
        document.getElementById('edit_tqty').value = totalQty;

        // Total before discount
        let total = price * qty;
        document.getElementById('edit_total').value = total.toFixed(2);

        // Discount amount
        let discAmt = (total * discPerc) / 100;
        document.getElementById('edit_disc_amt').value = discAmt.toFixed(2);

        // Taxable value after discount
        let taxableValue = total - discAmt;

        // VAT amount
        let vatAmt = (taxableValue * vatPerc) / 100;
        document.getElementById('edit_vat_amt').value = vatAmt.toFixed(2);

        // Final total
        let finalTotal = taxableValue + vatAmt;
        document.getElementById('edit_final_total').value = finalTotal.toFixed(2);
    }
</script>
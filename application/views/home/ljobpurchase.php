<?php
$step = 1;
?>

<div class="container-fluid px-2 px-md-4">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <div class="containers">
                    <div class="item">
                        <div>
                            <h6>Add New Purchase</h6>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <div class="item">
                        <div></div>
                    </div>
                </div>



                <br>
                <form method="post" action="<?php echo site_url('home/save'); ?>" id="my-form1">
                    <div class="row">

                        <div class="col-2 form-group my-1">
                            <label class="form-control-label" for="input-username"> Date <code>*</code></label>
                            <input class="form-control" value="<?php echo date('Y-m-d'); ?>"
                                style="border: 1px solid #333;" type="date" name="date" id="date">
                        </div>


                        <div class="col-md-2 my-1" <?php // if($d81->active==0) {  ?>style="display:none1;" <?php // } ?>>
                            <div class="input-group input-group-outline ">
                                <label class="form-control-label"><?= $this->lang->line('branch_name') ?></label>
                                <select input id='branch_id' name='branch_id' class="form-control "
                                    style="width:100%;line-height: 202px;!important">
                                    <?php if (isset($branch_id)) { ?>
                                        <option value='<?= $branch_id ?>'><?= $branchname ?></option><?php } ?>
                                </select>

                            </div>
                        </div>
                        <hr>
                        <div class="container1" id="dynamic-table">

                            <div class="dynamic-row">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label>Date</label>
                                        <input type="date" name="dates[]" class="form-control "
                                            style="border: 1px solid #333 ;">
                                    </div>

                                    <div class="col-md-2">
                                        <label>Vendor</label>
                                        <select name="vendor[]" class="name-select" style="width: 100%;" required>
                                            <!-- Options for the select dropdown -->
                                            <option value="1" default>Option 1</option>
                                        </select>
                                    </div>

                                    <div class="col-md-2">
                                        <label>Product</label>
                                        <select name="name[]" class="product-select" style="width: 100%;" required
                                            onchange="findproductdetails(this.value)">
                                            <!-- Options for the select dropdown -->
                                            <option value="1" default>Option 1</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4"> <label>Description</label>
                                        <div class="input-group input-group-outline  focused is-focused "
                                            style="width: 100%;">
                                            <input type="text" name="description[]"
                                                class="form-control description-input">
                                        </div>
                                    </div>
                                    <div class="col-md-2"> <label>Price</label>
                                        <div class="input-group input-group-outline  focused is-focused "
                                            style="width: 100%;">
                                            <input type="number" name="price[]" step="<?= $step ?>"
                                                class="form-control  price-input">
                                        </div>
                                    </div>

                                    <div class="col-md-2"> <label>Quantity</label>
                                        <div class="input-group input-group-outline  focused is-focused "
                                            style="width: 100%;">
                                            <input type="number" name="quantity[]" step="<?= $step ?>"
                                                class="form-control  quantity-input">
                                        </div>
                                    </div>

                                    <div class="col-md-2"> <label>Unit</label>
                                        <select name="unit[]" class="unit-select" style="width: 100%;" required>
                                            <!-- Options for the select dropdown -->
                                            <option value="1">Option 1</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2"> <label>Total</label>
                                        <div class="input-group input-group-outline  focused is-focused "
                                            style="width: 100%;">
                                            <input type="number" name="total[]" step="<?= $step ?>"
                                                class="form-control total-input" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2"> <label>Disc %</label>
                                        <div class="input-group input-group-outline  focused is-focused "
                                            style="width: 100%;">
                                            <input type="number" name="disc_perc[]" step="<?= $step ?>"
                                                class="form-control disc_perc-input" required>
                                        </div>
                                    </div>

                                    <div class="col-md-2"> <label>Disc Amount</label>
                                        <div class="input-group input-group-outline  focused is-focused "
                                            style="width: 100%;">
                                            <input type="number" name="disc_amt[]" step="<?= $step ?>"
                                                class="form-control disc_amt-input" required>
                                        </div>
                                    </div>

                                    <div class="col-md-2"> <label>Taxable</label>
                                        <div class="input-group input-group-outline  focused is-focused "
                                            style="width: 100%;">
                                            <input type="number" name="taxable[]" step="<?= $step ?>"
                                                class="form-control taxable-input" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2"> <label>Tax %</label>
                                        <div class="input-group input-group-outline  focused is-focused "
                                            style="width: 100%;">
                                            <input type="number" name="taxperc[]" value="0" step="<?= $step ?>"
                                                class="form-control taxperc-input">
                                        </div>
                                    </div>
                                    <div class="col-md-2"> <label>Tax Amt</label>
                                        <div class="input-group input-group-outline  focused is-focused "
                                            style="width: 100%;">
                                            <input type="number" name="tax[]" value="0" step="<?= $step ?>"
                                                class="form-control tax-input">
                                        </div>
                                    </div>



                                    <div class="col-md-2"> <label>Total</label>
                                        <div class="input-group input-group-outline  focused is-focused "
                                            style="width: 100%;">
                                            <input type="number" name="amount[]" step="<?= $step ?>"
                                                class="form-control amount-input" required>
                                        </div>
                                    </div>

                                    <div class="col-md-2"> <label>Customer Amount</label>
                                        <div class="input-group input-group-outline  focused is-focused "
                                            style="width: 100%;">
                                            <input type="number" name="custamount[]" step="<?= $step ?>"
                                                class="form-control custamount-input" required>
                                        </div>
                                    </div>

                                    <div class="col-md-2"> <label>Revenue</label>
                                        <div class="input-group input-group-outline  focused is-focused "
                                            style="width: 100%;">
                                            <input type="number" name="revenue[]" step="<?= $step ?>"
                                                class="form-control revenue-input" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2"><br>
                                        <div class="remove-cell"><button type="button"
                                                class="remove-row-btn btn btn-danger btn-sm">-</button></div>

                                    </div>
                                    <hr>
                                </div>
                            </div>
                        </div>
                        <!-- </tr>
  </table>-->

                        <div style="text-align: right; padding-right: 0%;padding-top: -10%;">
                            <button type="button" id="add-row-btn" class="btn btn-info btn-sm">+</button>

                        </div>


                        <!--<div class="text-end">
      <h6 id="total-amount"></h6>
  </div>-->

                        <div class="text-end">
                            <h6 id="total-amount"></h6>
                            <h6 id="total-customer-amount"></h6>
                            <h6 id="total-revenue"></h6>
                        </div>




                        <!-- If Cheque start-->











                        <div class="row">
                            <div class="col-6">

                                <div class="text-end">
                                    <input type="submit" value="Submit" class="btn btn-primary" />

                                </div>
                </form>
            </div>


            <div class="col-6">
                <button class="btn btn-warning" onclick="canceleditpurchase();">Cancel </button>

            </div>
        </div>


        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>


            function addNewRow() {


                const newRow = $('<div class="dynamic-row"><div class="row">' +
                    '<div class="col-md-2"> <label>Date</label>' +
                    '<div class="input-group input-group-outline focused is-focused" style="width: 100%;">' +
                    '<input type="date" name="date[]" class="form-control date-input">' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-md-2"> <label>Vendor</label>' +
                    '<select name="vendor[]" class="name-select" style="width: 100%;" required>' +
                    '<!-- Options for the select dropdown -->' +
                    '</select>' +
                    '</div>' +
                    '<div class="col-md-2"> <label>Product</label>' +
                    '<select name="name[]" class="product-select" style="width: 100%;" required  onchange="findproductdetails(this.value)">' +
                    '<!-- Options for the select dropdown -->' +
                    '</select>' +
                    '</div>' +
                    '<div class="col-md-4"> <label>Description</label>' +
                    '<div class="input-group input-group-outline focused is-focused" style="width: 100%;">' +
                    '<input type="text"  name="description[]" class="form-control description-input">' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-md-2"> <label>Price</label>' +
                    '<div class="input-group input-group-outline focused is-focused" style="width: 100%;">' +
                    '<input type="number" name="price[]" step="<?= $step ?>" class="form-control price-input">' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-md-2"> <label>Quantity</label>' +
                    '<div class="input-group input-group-outline focused is-focused" style="width: 100%;">' +
                    '<input type="number" name="quantity[]" step="<?= $step ?>" class="form-control quantity-input">' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-md-2"> <label>Unit</label>' +
                    '<select name="unit[]" class="unit-select" style="width: 100%;" required>' +
                    '<!-- Options for the select dropdown -->' +
                    '</select>' +
                    '</div>' +
                    '<div class="col-md-2"> <label>Total</label>' +
                    '<div class="input-group input-group-outline focused is-focused" style="width: 100%;">' +
                    '<input type="number" name="total[]" step="<?= $step ?>" class="form-control total-input" required>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-md-2"> <label>Disc %</label>' +
                    '<div class="input-group input-group-outline focused is-focused" style="width: 100%;">' +
                    '<input type="number" name="disc_perc[]" step="<?= $step ?>" class="form-control disc_perc-input" required>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-md-2"> <label>Disc Amount</label>' +
                    '<div class="input-group input-group-outline focused is-focused" style="width: 100%;">' +
                    '<input type="number" name="disc_amt[]" step="<?= $step ?>" class="form-control disc_amt-input" required>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-md-2"> <label>Taxable</label>' +
                    '<div class="input-group input-group-outline focused is-focused" style="width: 100%;">' +
                    '<input type="number" name="taxable[]" step="<?= $step ?>" class="form-control taxable-input" required>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-md-2"> <label>Tax %</label>' +
                    '<div class="input-group input-group-outline focused is-focused" style="width: 100%;">' +
                    '<input type="number" name="taxperc[]" value="0" step="<?= $step ?>" class="form-control taxperc-input">' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-md-2"> <label>Tax Amount</label>' +
                    '<div class="input-group input-group-outline focused is-focused" style="width: 100%;">' +
                    '<input type="number" name="tax[]" value="0" step="<?= $step ?>" class="form-control tax-input">' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-md-2"> <label>Total</label>' +
                    '<div class="input-group input-group-outline focused is-focused" style="width: 100%;">' +
                    '<input type="number" name="amount[]" step="<?= $step ?>" class="form-control amount-input" required>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-md-2"> <label>Customer Amount</label>' +
                    '<div class="input-group input-group-outline focused is-focused" style="width: 100%;">' +
                    '<input type="number" name="custamount[]" step="<?= $step ?>" class="form-control custamount-input" required>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-md-2"> <label>Revenue</label>' +
                    '<div class="input-group input-group-outline focused is-focused" style="width: 100%;">' +
                    '<input type="number" name="revenue[]" step="<?= $step ?>" class="form-control revenue-input" required>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-md-2"><div class="remove-cell"><br>' +
                    '<button type="button" class="remove-row-btn btn btn-danger btn-sm">-</button>' +
                    '</div></div>' +
                    '</div></div><hr>');



                $('#dynamic-table').append(newRow);

                // Initialize select2 for the newly added select dropdown
                initializeSelect2();

                // Recalculate the total amount
                calculateTotalAmount();
            }

            /*   function removeRow() {
                //$(this).closest('tr').remove();
                 const row = event.target.closest('tr');
                row.remove();
                calculateTotalAmount();
              } */

            function removeRow() {
                //alert();
                const row = event.target.closest('.dynamic-row');
                row.remove();
                updateTotals(); // Assuming calculateTotalAmount is a function to update the total amount after removing a row
            }


            // Initialize select2 for the initial select dropdown
            initializeSelect2();

            $('#add-row-btn').on('click', function () {
                addNewRow();
            });

            $('#dynamic-table').on('click', '.remove-row-btn', function () {
                removeRow();
            });

            $('#my-form').on('submit', function (e) {
                e.preventDefault();
                // Perform form submission or further processing
                $(this).submit();
            });




            $('#dynamic-table').on('input', '.amount-input', function () {
                calculateTotalAmount();
            });









        </script>





































    </div>
</div>
</div>
</div>
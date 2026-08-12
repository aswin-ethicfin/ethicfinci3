<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fields Adjustment</title>
</head>

<body>
    <!-- <input id="balance_payable" type="hidden" value="100">
    <input id="input_tax" type="hidden" value="50">
    <input id="output_tax" type="hidden" value="30"> -->

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Create New Tax Payment</h6>
                        </div>
                    </div>
                    <div class="table-responsive p-0">
                        <div class="card mt-1" id="password">
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-lg-5"><br>
                                        <div class="row">
                                            <div class="col-lg-5">Date:</div>
                                            <div class="col-lg-7">
                                                <input value="<?= date('Y-m-d'); ?>" required type="date"
                                                    class="form-control" id="date" name="date"
                                                    style="border: 1px solid #333;">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-5">Tax paid amount Cr:</div>
                                            <div class="col-lg-7">
                                                <div class="form-group">
                                                    <input required value="<?= $balance_payable ?>" type="number"
                                                        min="0" step="0.01" class="form-control" id="Payable"
                                                        name="amount" style="border: 1px solid #333;">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row my-2">
                                            <div class="col-lg-5">Payment Mode:</div>
                                            <div class="col-lg-7">
                                                <div class="form-group">
                                                    <select name="mop" id='mop' class="form-control "
                                                        onchange="checkifcheque()" style="line-height: 202px;!important"
                                                        required>
                                                        <option value=''>-- Select Option --</option>
                                                        <option value='1'>option1</option>
                                                        <option value='2'>option2</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-5">Description:</div>
                                            <div class="col-lg-7">
                                                <div class="form-group">
                                                    <textarea type="text" class="form-control" id="description"
                                                        name="description" style="border: 1px solid #333;"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6"></div>
                                            <div class="col-lg-6">
                                                <div class="form-group">

                                                    <a href="#"><button class="btn bg-danger text-white btn-sm  mt-4"
                                                            type="button">Cancel</button></a>
                                                    <button class="btn bg-success text-white btn-sm mt-4" type="submit"
                                                        onclick="saveledger()">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3"><br>
                                        <div class="row">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-username"> VAT Output
                                                    Dr:</label>
                                                <input class="form-control" required value="<?= $outputtax_sum ?> "
                                                    type=" number" step="0.01" autocomplete="off" id="tax_output"
                                                    name="outamount" oninput="" placeholder=""
                                                    style="border: 1px solid #333 ;">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-username"> VAT Input
                                                    Cr:</label>
                                                <input class="form-control" required value="<?= $inputtax_sum ?>"
                                                    type="number" step="0.01" autocomplete="off" id="tax_input"
                                                    name="inamount" placeholder="" style="border: 1px solid #333 ;">
                                            </div>
                                        </div>
                                    </div>

                                    <input id="balance_payable" type="hidden" value="<?= $balance_payable ?>">
                                    <input id="input_tax" type="hidden" value="<?= $inputtax_sum ?>">
                                    <input id="output_tax" type="hidden" value="<?= $outputtax_sum ?>">
                                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                    <script>

                                        $(document).ready(function () {
                                            var Payabale = $('#Payable');
                                            var tax_output = $('#tax_output');
                                            var tax_input = $('#tax_input');
                                            const tobepayable = parseFloat($('#balance_payable').val());
                                            const inputtax = parseFloat($('#input_tax').val());
                                            const outputtax = parseFloat($('#output_tax').val());
                                            Payabale.on('input', function () {
                                                var PayabaleValue = parseFloat($(this).val());
                                                //const PayabaleFixedValue = parseFloat($(this).val());
                                                console.log("payable value" + PayabableValue);
                                                if (PayabaleValue > outputtax) {
                                                    alert('The value of Tax Payabale cannot exceed ' + outputtax);
                                                    $(this).val(outputtax);
                                                    tax_output.val(outputtax);
                                                    tax_input.val(0);

                                                } else if (PayabaleValue == outputtax) {
                                                    tax_output.val(outputtax);
                                                    tax_input.val(0);
                                                } else {

                                                    var checkValueFortax_output = (PayabaleValue + parseFloat(tax_input.val()));
                                                    if (checkValueFortax_output > outputtax) {
                                                        tax_output.val(outputtax);
                                                        tax_input.val(tax_output.val() - Payabale.val());
                                                    } else {
                                                        tax_input.val(inputtax);
                                                        tax_output.val(PayabaleValue + parseFloat(tax_input.val()));
                                                    }
                                                }
                                            });

                                            tax_output.on('keyup', function () {
                                                var tax_outputValue = parseFloat($(this).val());
                                                //const PayabaleFixedValue = parseFloat($(this).val());

                                                if (tax_outputValue > outputtax) {
                                                    alert('The value of Tax Output cannot exceed ' + outputtax);
                                                    $(this).val(outputtax);
                                                    tax_input.val(inputtax);
                                                    Payabale.val($(this).val() - tax_input.val());

                                                } else if (tax_output.val() == outputtax) {
                                                    tax_output.val(outputtax);
                                                    tax_input.val(inputtax);
                                                    Payabale.val($this.val() - tax_input.val());
                                                } else if (tax_outputValue < outputtax && tax_outputValue > 0) {
                                                    console.log($(this).val() + ' <' + tax_input.val());
                                                    // var checkValueForPayabale = ($this.val() - tax_input.val());
                                                    if ($(this).val() < inputtax) {
                                                        tax_input.val(tax_output.val());
                                                        Payabale.val(0);
                                                    } else {
                                                        console.log('here last');
                                                        tax_input.val(inputtax);
                                                        Payabale.val(tax_output.val() - tax_input.val());
                                                        // tax_output.val(PayabaleValue + parseFloat(tax_input.val()));
                                                    }
                                                } else {
                                                    Payabale.val(0);
                                                    tax_output.val(0);
                                                    tax_input.val(0);
                                                }

                                            });
                                            tax_input.on('keyup', function () {
                                                var tax_inputValue = parseFloat($(this).val());
                                                //const PayabaleFixedValue = parseFloat($(this).val());

                                                if (tax_inputValue > inputtax) {
                                                    alert('The value of Tax Input cannot exceed ' + inputtax);
                                                    $(this).val(inputtax);
                                                    tax_output.val(outputtax);
                                                    Payabale.val(tax_output.val() - tax_input.val());

                                                } else if (tax_input.val() == inputtax) {
                                                    tax_output.val(outputtax);
                                                    tax_input.val(inputtax);
                                                    Payabale.val($this.val() - tax_input.val());
                                                } else if (tax_inputValue < inputtax && tax_inputValue > 0) {
                                                    console.log($(this).val() + ' <' + tax_input.val());
                                                    // var checkValueForPayabale = ($this.val() - tax_input.val());
                                                    tax_output.val(outputtax);
                                                    Payabale.val(tax_output.val() - $(this).val());
                                                } else if ($(this).val() == 0) {

                                                    tax_output.val(outputtax);
                                                    tax_input.val(0);
                                                    Payabale.val(outputtax);
                                                } else {
                                                    Payabale.val(0);
                                                    tax_output.val(0);
                                                    tax_input.val(0);
                                                }

                                            });
                                        });
                                    </script>

                                    <div class="col-lg-4"><br>
                                        <h6 class="text-center"><u>Tax Details</u></h6>
                                        <form type="get" autocomplete="off">
                                            <div class="row">
                                                <div class="col-1 col-sm-1"> </div>
                                                <div class="col-4 col-sm-4"
                                                    style="padding-right: calc(var(--bs-gutter-x)* .1); padding-left: calc(var(--bs-gutter-x)* .1);">
                                                    <div class="form-group">
                                                        <label class="form-control-label"
                                                            for="input-username">From</label>
                                                        <input name="from" value="<?php if (isset($_GET['from'])) {
                                                            echo $_GET['from'];
                                                        } else {
                                                            echo date('Y-m-d');
                                                        } ?>" class="form-control" type="date"
                                                            style="border: 1px solid #333;" required />
                                                    </div>
                                                </div>
                                                <div class="col-4 col-sm-4"
                                                    style="padding-right: calc(var(--bs-gutter-x)* .1); padding-left: calc(var(--bs-gutter-x)* .1);">
                                                    <div class="form-group">
                                                        <label class="form-control-label"
                                                            for="input-username">To</label>
                                                        <input name="to" value="<?php if (isset($_GET['to'])) {
                                                            echo $_GET['to'];
                                                        } else {
                                                            echo date('Y-m-d');
                                                        } ?>" class="form-control" type="date"
                                                            style="border: 1px solid #333;" required />
                                                    </div>
                                                </div>
                                                <div class="col-2 col-sm-2"
                                                    style="padding-right: calc(var(--bs-gutter-x)* .1); padding-left: calc(var(--bs-gutter-x)* .1);">
                                                    <br>
                                                    <button class="btn bg-gradient-primary btn-sm ms-auto mb-0 my-3"
                                                        title="filter"><i class="fas fa-search"
                                                            aria-hidden="true"></i></button>
                                                </div>
                                            </div>
                                        </form>

                                        <div class="row">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-end" width="10%"></td>
                                                        <td class="text-end" width="40%">VAT Output :</td>
                                                        <td class="text-end" width="30%">
                                                            <?= number_format($outputtax_sum, 2) ?>
                                                        </td>
                                                        <td class="text-end" width="20%"></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td class="text-end">Vat Input :</td>
                                                        <td class="text-end"><?= number_format($inputtax_sum, 2) ?></td>
                                                        <td class="text-end"></td>
                                                    </tr>

                                                    <tr>
                                                        <td></td>
                                                        <td class="text-end">Vat Payable :</td>
                                                        <td class="text-end"><?= number_format($vat_payable, 2) ?></td>
                                                        <td class="text-end"></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td class="text-end">Vat Paid :</td>
                                                        <td class="text-end"><?= number_format($vat_paid, 2) ?></td>
                                                        <td class="text-end"></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td class="text-end">Balance Payable :</td>
                                                        <td class="text-end"><?= number_format($balance_payable, 2) ?>
                                                        </td>
                                                        <td class="text-end"></td>
                                                    </tr>
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
    </div>
    <!-- <script>
        function saveledger() {

            var date = $('#date').val();
            var payabale = $('#Payable').val();
            var payment_mode = $('#mop').val();
            var tax_output = $('#tax_output').val();
            var tax_input = $('#tax_input').val();
            var description = $('#description').val();
            console.log(date, payabale, payment_mode, tax_output, tax_input, description);
            $.ajax({
                type: "POST",
                url: "<?= base_url(); ?>Home/newtaxpaymentsubmit",
                data: { date: date, payable: payabale, payment_mode: payment_mode, tax_input: tax_input, tax_output: tax_output, description: description },
                cache: false,
                success: function (response) {
                    alert(response);
                    if (response.message === "success") {
                        alert('inserted successfully');
                    } else {
                        alert('Some Error occured');
                    }

                }
            });

        }
    </script> -->
</body>

</html>
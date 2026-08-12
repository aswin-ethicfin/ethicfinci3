<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Invoice View</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-size: 14px;
        }

        .table th,
        .table td {
            vertical-align: middle;
            padding: 0.5rem;
        }

        .invoice-header {
            text-transform: uppercase;
            font-weight: bold;
            font-size: 16px;
        }

        .bordered {
            border: 1px solid #dee2e6;
            padding: 0.5rem;
        }

        .custom-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        .custom-table th,
        .custom-table th,
        .custom-table td {
            border: 1px solid #ddd;
            /* thin light gray border */
            padding: 6px 10px;
            /* custom padding */
            text-align: center;
            /* center text */
        }

        .custom-table th {
            font-weight: bold;
        }

        .custom-table tr:nth-child(even) {
            background-color: #f9f9f9;
            /* optional light zebra striping */
        }
    </style>
</head>

<body>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between align-items-center px-3">
                        <h6 class="text-white text-capitalize m-0">TAX INVOICE / فاتورة ضريبية</h6>
                        <a target="_blank" href="#" class="btn btn-light btn-sm">Print</a>
                    </div>
                    <div class="card-body px-4 py-3">

                        <!-- Invoice Header -->
                        <div class="row mb-2">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="custom-table mb-0" style="width: 100%; border-collapse: collapse;">
                                        <thead class="text-center align-middle">
                                            <!-- Arabic Header Row -->
                                            <tr>
                                                <th>تاريخ الإصدار</th>
                                                <th>رقم الفاتورة</th>
                                                <th>شروط الدفع</th>
                                                <th>شروط التسليم</th>
                                                <th>رقم طلب المبيعات</th>
                                                <th>رقم إشعار التسليم</th>
                                            </tr>
                                            <!-- English Header Row -->
                                            <tr>
                                                <th>Issue Date</th>
                                                <th>Invoice No</th>
                                                <th>Payment Terms</th>
                                                <th>Terms Of Delivery</th>
                                                <th>Sales Order No</th>
                                                <th>Delivery Note</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center align-middle">
                                            <tr>
                                                <td>02-Nov-1991</td>
                                                <td>diziz Crditnotno</td>
                                                <td>Dhis is payment terms</td>
                                                <td>Dhis is delivery terms</td>
                                                <td>disisinv Reference No</td>
                                                <td>22020</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="text-start">Customer P.O No: disisinv OrdrNo/poNo</td>
                                                <td colspan="2" class="text-start">Customer P.O Date: 02-Jan-2000</td>
                                                <td>Currency</td>
                                                <td>this is isocode</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Buyer Information -->
                        <div class="row mb-2">
                            <div class="col-12">
                                <div class="border p-3">
                                    <!-- Row 1 -->
                                    <div class="row">
                                        <div class="col-md-4">Buyer Identification</div>
                                        <div class="col-md-4 text-end"><strong>تحديد هوية العميل</strong></div>
                                    </div>
                                    <!-- Row 2 -->
                                    <div class="row">
                                        <div class="col-md-4"><strong>Sajitha</strong></div>
                                        <div class="col-md-4 text-end"><strong>مؤسسة عبداالله سعود سعد المنجومي لإدارة المشاريع</strong></div>
                                    </div>
                                    <!-- Row 3 -->
                                    <div class="row">
                                        <div class="col-md-4">Sajitha</div>
                                        <div class="col-md-4 text-end">bilngadrs BldngNo lng2bilngadrs</div>
                                    </div>
                                    <!-- Row 4 -->
                                    <div class="row">
                                        <div class="col-md-4">disisbilngadrs Building No street1district1</div>
                                        <div class="col-md-4 text-end">stretnamelng2bilngadrs district lng2</div>
                                    </div>
                                    <!-- Row 5 -->
                                    <div class="row">
                                        <div class="col-md-4">disisbilngadrs citydisisbilngadrs country</div>
                                        <div class="col-md-4 text-end">bilngadrs city lng2bilngadrs countrylng2</div>
                                    </div>
                                    <!-- Row 6 -->
                                    <div class="row">
                                        <div class="col-md-4">VAT No: 54321</div>
                                        <div class="col-md-4 text-end">bilngadrs Vatlng2 : رقم ضريبة</div>
                                    </div>
                                    <!-- Row 7 -->
                                    <div class="row">
                                        <div class="col-md-4">CR No: CR765</div>
                                        <div class="col-md-4 text-end">CR765: رقم السجل</div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Products Table -->
                        <div class="table-responsive mb-3">
                            <table class="table table-bordered">
                                <thead class="table-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Product & Service Description<br>وصف المنتج والخدمة</th>
                                        <th>Quantity<br>كمية</th>
                                        <th>Unit<br>وحدة</th>
                                        <th>Unit Price<br>سعر الوحدة</th>
                                        <th>VAT (10%)<br>قيمة الضريبة</th>
                                        <th>Gross Amount<br>المبلغ الإجمالي</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>disisitm1 Name lng2disisitm1 Description</td>
                                        <td>5</td>
                                        <td>BOU</td>
                                        <td>100.00</td>
                                        <td>75.00</td>
                                        <td>575.00</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>disisitm1 Name lng2disisitm1 Description</td>
                                        <td>5</td>
                                        <td>BOU</td>
                                        <td>100.00</td>
                                        <td>75.00</td>
                                        <td>575.00</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>disisitm1 Name lng2disisitm1 Description</td>
                                        <td>5</td>
                                        <td>BOU</td>
                                        <td>100.00</td>
                                        <td>75.00</td>
                                        <td>575.00</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>disisitm1 Name lng2disisitm1 Description</td>
                                        <td>5</td>
                                        <td>BOU</td>
                                        <td>100.00</td>
                                        <td>75.00</td>
                                        <td>575.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Totals -->
                        <div class="row mb-2">
                            <div class="col-12">
                                <div class="border p-3">
                                    <div class="row">
                                        <!-- Beneficiary / Bank Details Table -->
                                        <div class="col-md-6 mb-3 mb-md-0">
                                            <table class="table table-borderless mb-0">
                                                <tr>
                                                    <th>Beneficiary:</th>
                                                    <td>disisbank Account Name</td>
                                                </tr>
                                                <tr>
                                                    <th>Bank Name:</th>
                                                    <td>disisbank Name</td>
                                                </tr>
                                                <tr>
                                                    <th>Account No:</th>
                                                    <td>134567</td>
                                                </tr>
                                                <tr>
                                                    <th>المبلغ بعد ضريبة القيمة المضافة:</th>
                                                    <td>840.00</td>
                                                </tr>
                                                <tr>
                                                    <th>SWIFT:</th>
                                                    <td>disisbank SWIFT Number</td>
                                                </tr>
                                            </table>
                                        </div>

                                        <!-- Totals Table -->
                                        <div class="col-md-6">
                                            <table class="table table-borderless mb-0">
                                                <tr>
                                                    <th>Gross Total:</th>
                                                    <td>690.00</td>
                                                </tr>
                                                <tr>
                                                    <th>Amount Before VAT:</th>
                                                    <td>600.00</td>
                                                </tr>
                                                <tr>
                                                    <th>VAT Amount:</th>
                                                    <td>90.00</td>
                                                </tr>
                                                <tr>
                                                    <th>Amount After VAT:</th>
                                                    <td>840.00</td>
                                                </tr>
                                                <tr>
                                                    <th>Net Payable Amount:</th>
                                                    <td>540.00</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Declaration -->
                        <div class="row mb-2">
                            <div class="col-12">
                                <div class="border p-0">
                                    <div class="table-responsive">
                                        <table class="mb-0" style="width: 100%; border-collapse: collapse; table-layout: fixed;">
                                            <!-- Empty Signature Space -->
                                            <tr>
                                                <td style="border: 1px solid #ddd; height: 120px; vertical-align: top; width: 33.33%;"></td>
                                                <td style="border: 1px solid #ddd; height: 120px; vertical-align: top; width: 33.33%;"></td>
                                                <td style="border: 1px solid #ddd; height: 120px; vertical-align: top; width: 33.33%;"></td>
                                            </tr>
                                            <!-- Declaration and Footer Labels -->
                                            <tr>
                                                <td style="border: 1px solid #ddd; padding: 6px 10px; vertical-align: top;">
                                                    <strong>Declaration</strong><br>
                                                    We declare that this invoice shows the actual price of the goods described and that all particulars are true and correct.
                                                </td>
                                                <td style="border: 1px solid #ddd; padding: 6px 10px; vertical-align: top; text-align: center;">
                                                    <strong>Customers Seal and Signature</strong><br>
                                                    ختم العملاء وتوقيعهم
                                                </td>
                                                <td style="border: 1px solid #ddd; padding: 6px 10px; vertical-align: top; text-align: center;">
                                                    <strong>For disisbrnch Name</strong>
                                                </td>
                                            </tr>
                                            <!-- Electronically Approved Note -->
                                            <tr>
                                                <td colspan="3" style="border: 1px solid #ddd; text-align: center; padding: 4px;">
                                                    Electronically Approved Document وثيقة معتمدة إلكترونيا
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Footer -->
                        <!-- <div class="text-center mt-3">
                            <small class="text-muted">Powered by TCPDF (www.tcpdf.org)</small>
                        </div> -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
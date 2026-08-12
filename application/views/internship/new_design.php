<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Vendor Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        table.table {
            background-color: #ffffff !important;
            font-size: 12px;
            border-collapse: collapse;
        }

        /* Ensure all table rows have white background */
        table.table tbody tr {
            background-color: #ffffff !important;
        }

        /* Enhanced specificity and !important for header colors */
        table.table thead,
        table.table thead tr,
        table.table thead th,
        .table thead th,
        .thead-dark th {
            background-color: #304664 !important;
            color: #ffffff !important;
            border-color: #304664 !important;
        }

        table.table th,
        table.table td {
            border-top: 1px solid #dee2e6;
            border-bottom: 1px solid #dee2e6;
            border-left: none;
            border-right: none;
            padding: 8px;
            vertical-align: middle;
        }

        table.table tr {
            border-bottom: 1px solid #dee2e6;
        }

        .btn-group-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 1rem 0.5rem 1rem;
        }

        .table-responsive {
            overflow-x: auto;
        }

        .card-header h6 {
            margin: 0;
        }

        /* Additional fix for Bootstrap override */
        .table>thead>tr>th {
            background-color: #304664 !important;
            color: #ffffff !important;
            border-color: #304664 !important;
        }
    </style>
</head>

<body>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <!-- Header with buttons -->
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <div class="btn-group-header">
                                <h6 class="text-white text-capitalize m-0">Adbul Nazeeb</h6>
                                <button class="btn btn-sm text-white" onclick="downloadTableAsPDF()">Download</button>
                            </div>
                        </div>
                    </div>

                    <!-- Content -->
                    <div id="pdf-content">
                        <!-- Purchase Records Table --> 
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th rowspan="2">Sl.No</th>
                                            <th rowspan="2">Reference</th>
                                            <th rowspan="2">Date</th>
                                            <th rowspan="2">Payment<br>Voucher</th>
                                            <th rowspan="2">Payment<br>Amount</th>
                                            <th rowspan="2">Distributed<br>Amount</th>
                                            <th rowspan="2">Purchase<br>Number</th>
                                            <th rowspan="2">Purchase<br>Date</th>
                                            <th rowspan="2">Purchase<br>Amount</th>
                                            <th colspan="2" class="text-center">Distributed Amount</th>
                                        </tr>
                                        <tr>
                                            <th>Amount</th>
                                            <th>Total<br>Distributed</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>27/146/793</td>
                                            <td>13-May-2025</td>
                                            <td>PMT01080</td>
                                            <td>200,000.00</td>
                                            <td>199,195.00</td>
                                            <td>PR01063</td>
                                            <td>12-May-2025</td>
                                            <td>253,000.00</td>
                                            <td>200,000.00</td>
                                            <td>199,195.00</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>26/146/793</td>
                                            <td>13-May-2025</td>
                                            <td>PMT01080</td>
                                            <td>200,000.00</td>
                                            <td>0.00</td>
                                            <td>PR01053</td>
                                            <td>09-May-2025</td>
                                            <td>53,000.00</td>
                                            <td>30,000.00</td>
                                            <td>30,000.00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div><!-- End Purchase Records Table -->
                    </div> <!-- End pdf-content -->
                </div>
            </div>
        </div>
    </div>

    <!-- html2pdf.js for downloading PDF -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <script>
        function downloadTableAsPDF() {
            const element = document.getElementById('pdf-content');
            const opt = {
                margin: 0.5,
                filename: 'vendor_full_report.pdf',
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
                html2canvas: {
                    scale: 2
                },
                jsPDF: {
                    unit: 'in',
                    format: 'a4',
                    orientation: 'landscape'
                }
            };
            html2pdf().set(opt).from(element).save();
        }
    </script>
</body>

</html>
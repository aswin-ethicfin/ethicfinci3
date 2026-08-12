<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    body {
        background-color: #f8f9fa;
    }

    table.table {
        background-color: #ffffff !important;
        font-size: 11px;
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
        border-left: none !important;
        border-right: none !important;
        border-top: 1px solid #dee2e6;
        border-bottom: 1px solid #dee2e6;
        padding: 6px;
        vertical-align: middle;
        text-align: center;
    }

    /* Add horizontal line between main header and distribution details */
    thead tr.sub-header th {
        border-top: 2px solid #ffffff !important;
    }

    /* Add thick horizontal line to separate Distribution Details section */
    thead tr:first-child th:nth-child(6),
    thead tr:first-child th:nth-child(7),
    thead tr:first-child th:nth-child(8),
    thead tr:first-child th:nth-child(9),
    thead tr:first-child th:nth-child(10),
    thead tr:first-child th:nth-child(11) {
        border-left: 2px solid #304664 !important;
    }

    .btn-group-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 1rem 0.5rem 1rem;
    }

    .table-responsive {
        overflow-x: visible;
    }

    .card-header h6 {
        margin: 0;
    }

    /* Additional fix for Bootstrap override */
    .table>thead>tr>th {
        background-color: #304664 !important;
        color: #ffffff !important;
        border-color: #ffffff !important;
    }

    .distribution-group {
        background-color: #f8f9fa;
    }

    .payment-row {
        background-color: #e3f2fd !important;
    }

    .text-end {
        text-align: right !important;
    }

    .reference {
        font-family: 'Courier New', monospace;
        font-size: 11px;
    }

    .amount {
        font-weight: 600;
        color: #2e7d32;
    }

    .total-amount {
        font-weight: 700;
        color: #1976d2;
        background-color: #e3f2fd !important;
    }

    .payment-group {
        border-left: 4px solid #007bff;
    }

    .table tbody tr:nth-child(even) {
        background-color: #f8f9fa;
    }

    .table tbody tr:hover {
        background-color: #e3f2fd;
    }
</style>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Vendor Payment Distribution Report</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2 ps-5 pe-5">
                    <div class="card-content">

                        <!-- Content -->
                        <div id="pdf-content">
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th rowspan="2">Sl.No</th>
                                                <th rowspan="2">Reference</th>
                                                <th rowspan="2">Payment <br> Date</th>
                                                <th rowspan="2">Payment <br> Voucher</th>
                                                <th rowspan="2">Payment <br> Amount</th>
                                                <th colspan="6" class="text-center">Distribution Details</th>
                                            </tr>
                                            <tr class="sub-header">
                                                <th>Purchase <br> No</th>
                                                <th>Purchase <br> Date</th>
                                                <th>Purchase <br> Amount</th>
                                                <th>Distributed <br> Amount</th>
                                                <th>Total <br> Distribution</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Row 1 -->
                                            <tr class="payment-group">
                                                <td rowspan="2">1</td>
                                                <td rowspan="2" class="reference">14362/22972/20693</td>
                                                <td rowspan="2">17-May-2025</td>
                                                <td rowspan="2">PMT02531</td>
                                                <td rowspan="2" class="text-end amount">7,967.00</td>
                                                <td>PR02208</td>
                                                <td>19-May-2025</td>
                                                <td class="text-end">2,173.50</td>
                                                <td class="text-end amount">2,173.50</td>
                                                <td rowspan="2" class="text-end amount">6,212.88</td>
                                            </tr>
                                            <tr>
                                                <td>PR02206</td>
                                                <td>19-May-2025</td>
                                                <td class="text-end">4,039.38</td>
                                                <td class="text-end amount">4,039.38</td>
                                            </tr>

                                            <!-- Row 2 -->
                                            <tr class="payment-group">
                                                <td rowspan="2">2</td>
                                                <td rowspan="2" class="reference">13640/22241/19981</td>
                                                <td rowspan="2">18-May-2025</td>
                                                <td rowspan="2">PMT02453</td>
                                                <td rowspan="2" class="text-end amount">7,051.88</td>
                                                <td>PR02195</td>
                                                <td>18-May-2025</td>
                                                <td class="text-end">3,381.58</td>
                                                <td class="text-end amount">3,381.58</td>
                                                <td rowspan="2" class="text-end amount">4,937.14</td>
                                            </tr>
                                            <tr>
                                                <td>PR01848</td>
                                                <td>06-May-2025</td>
                                                <td class="text-end">1,818.15</td>
                                                <td class="text-end amount">1,555.56</td>
                                            </tr>

                                            <!-- Row 3 -->
                                            <tr class="payment-group">
                                                <td rowspan="6">3</td>
                                                <td rowspan="6" class="reference">13609/21829/19521</td>
                                                <td rowspan="6">15-May-2025</td>
                                                <td rowspan="6">PMT02422</td>
                                                <td rowspan="6" class="text-end amount">5,563.13</td>
                                                <td>PR01848</td>
                                                <td>06-May-2025</td>
                                                <td class="text-end">1,818.15</td>
                                                <td class="text-end amount">262.59</td>
                                                <td rowspan="6" class="text-end amount">5,563.13</td>
                                            </tr>
                                            <tr>
                                                <td>PR01715</td>
                                                <td>30-Apr-2025</td>
                                                <td class="text-end">954.50</td>
                                                <td class="text-end amount">954.50</td>
                                            </tr>
                                            <tr>
                                                <td>PR01842</td>
                                                <td>06-May-2025</td>
                                                <td class="text-end">1,408.75</td>
                                                <td class="text-end amount">1,408.75</td>
                                            </tr>
                                            <tr>
                                                <td>PR01637</td>
                                                <td>28-Apr-2025</td>
                                                <td class="text-end">1,523.75</td>
                                                <td class="text-end amount">1,523.75</td>
                                            </tr>
                                            <tr>
                                                <td>PR01813</td>
                                                <td>04-May-2025</td>
                                                <td class="text-end">1,351.25</td>
                                                <td class="text-end amount">1,351.25</td>
                                            </tr>
                                            <tr>
                                                <td>PR01540</td>
                                                <td>24-Apr-2025</td>
                                                <td class="text-end">1,753.75</td>
                                                <td class="text-end amount">62.29</td>
                                            </tr>

                                            <!-- Row 4 -->
                                            <tr class="payment-group">
                                                <td rowspan="2">4</td>
                                                <td rowspan="2" class="reference">11800/18828/16618</td>
                                                <td rowspan="2">10-May-2025</td>
                                                <td rowspan="2">PMT02218</td>
                                                <td rowspan="2" class="text-end amount">3,682.88</td>
                                                <td>PR01540</td>
                                                <td>24-Apr-2025</td>
                                                <td class="text-end">1,753.75</td>
                                                <td class="text-end amount">1,691.46</td>
                                                <td rowspan="2" class="text-end amount">3,682.88</td>
                                            </tr>
                                            <tr>
                                                <td>PR01155</td>
                                                <td>15-Apr-2025</td>
                                                <td class="text-end">2,515.63</td>
                                                <td class="text-end amount">1,991.42</td>
                                            </tr>

                                            <!-- Row 5 -->
                                            <tr class="payment-group">
                                                <td>5</td>
                                                <td class="reference">10947/17265/15007</td>
                                                <td>20-Apr-2025</td>
                                                <td>PMT02068</td>
                                                <td class="text-end amount">467.00</td>
                                                <td>PR01896</td>
                                                <td>20-Apr-2025</td>
                                                <td class="text-end">467.00</td>
                                                <td class="text-end amount">467.00</td>
                                                <td class="text-end amount">467.00</td>
                                            </tr>

                                            <!-- Row 6 -->
                                            <tr class="payment-group">
                                                <td rowspan="4">6</td>
                                                <td rowspan="4" class="reference">8042/15760/13546</td>
                                                <td rowspan="4">27-Apr-2025</td>
                                                <td rowspan="4">PMT01824</td>
                                                <td rowspan="4" class="text-end amount">5,000.00</td>
                                                <td>PR01138</td>
                                                <td>08-Apr-2025</td>
                                                <td class="text-end">1,782.50</td>
                                                <td class="text-end amount">1,782.50</td>
                                                <td rowspan="4" class="text-end amount">5,000.00</td>
                                            </tr>
                                            <tr>
                                                <td>PR01155</td>
                                                <td>15-Apr-2025</td>
                                                <td class="text-end">2,515.63</td>
                                                <td class="text-end amount">524.21</td>
                                            </tr>
                                            <tr>
                                                <td>PR01129</td>
                                                <td>08-Apr-2025</td>
                                                <td class="text-end">3,866.88</td>
                                                <td class="text-end amount">608.91</td>
                                            </tr>
                                            <tr>
                                                <td>PR01150</td>
                                                <td>14-Apr-2025</td>
                                                <td class="text-end">2,084.38</td>
                                                <td class="text-end amount">2,084.38</td>
                                            </tr>

                                            <!-- Row 7 -->
                                            <tr class="payment-group">
                                                <td rowspan="2">7</td>
                                                <td rowspan="2" class="reference">7207/14567/12386</td>
                                                <td rowspan="2">23-Apr-2025</td>
                                                <td rowspan="2">PMT01726</td>
                                                <td rowspan="2" class="text-end amount">4,482.13</td>
                                                <td>PR01174</td>
                                                <td>07-Apr-2025</td>
                                                <td class="text-end">1,644.50</td>
                                                <td class="text-end amount">1,644.50</td>
                                                <td rowspan="2" class="text-end amount">4,482.13</td>
                                            </tr>
                                            <tr>
                                                <td>PR01129</td>
                                                <td>08-Apr-2025</td>
                                                <td class="text-end">3,866.88</td>
                                                <td class="text-end amount">2,837.63</td>
                                            </tr>

                                            <!-- Row 8 -->
                                            <tr class="payment-group">
                                                <td rowspan="2">8</td>
                                                <td rowspan="2" class="reference">6823/12116/10150</td>
                                                <td rowspan="2">15-Apr-2025</td>
                                                <td rowspan="2">PMT01313</td>
                                                <td rowspan="2" class="text-end amount">1,213.75</td>
                                                <td>PR01103</td>
                                                <td>03-Apr-2025</td>
                                                <td class="text-end">1,391.50</td>
                                                <td class="text-end amount">793.41</td>
                                                <td rowspan="2" class="text-end amount">1,213.75</td>
                                            </tr>
                                            <tr>
                                                <td>PR01129</td>
                                                <td>08-Apr-2025</td>
                                                <td class="text-end">3,866.88</td>
                                                <td class="text-end amount">420.34</td>
                                            </tr>

                                            <!-- Row 9 -->
                                            <tr class="payment-group">
                                                <td rowspan="4">9</td>
                                                <td rowspan="4" class="reference">5150/11176/9189</td>
                                                <td rowspan="4">10-Apr-2025</td>
                                                <td rowspan="4">PMT01275</td>
                                                <td rowspan="4" class="text-end amount">5,080.72</td>
                                                <td>PR01065</td>
                                                <td>24-Mar-2025</td>
                                                <td class="text-end">1,707.75</td>
                                                <td class="text-end amount">1,707.75</td>
                                                <td rowspan="4" class="text-end amount">5,080.72</td>
                                            </tr>
                                            <tr>
                                                <td>PR01103</td>
                                                <td>03-Apr-2025</td>
                                                <td class="text-end">1,391.50</td>
                                                <td class="text-end amount">598.09</td>
                                            </tr>
                                            <tr>
                                                <td>PR01058</td>
                                                <td>24-Mar-2025</td>
                                                <td class="text-end">1,523.75</td>
                                                <td class="text-end amount">1,251.13</td>
                                            </tr>
                                            <tr>
                                                <td>PR01092</td>
                                                <td>03-Apr-2025</td>
                                                <td class="text-end">1,523.75</td>
                                                <td class="text-end amount">1,523.75</td>
                                            </tr>

                                            <!-- Row 10 -->
                                            <tr class="payment-group">
                                                <td rowspan="2">10</td>
                                                <td rowspan="2" class="reference">3383/10225/8277</td>
                                                <td rowspan="2">07-Apr-2025</td>
                                                <td rowspan="2">PMT01253</td>
                                                <td rowspan="2" class="text-end amount">1,305.25</td>
                                                <td>PR01023</td>
                                                <td>16-Mar-2025</td>
                                                <td class="text-end">2,185.00</td>
                                                <td class="text-end amount">1,032.63</td>
                                                <td rowspan="2" class="text-end amount">1,305.25</td>
                                            </tr>
                                            <tr>
                                                <td>PR01058</td>
                                                <td>24-Mar-2025</td>
                                                <td class="text-end">1,523.75</td>
                                                <td class="text-end amount">272.62</td>
                                            </tr>

                                            <!-- Row 11 -->
                                            <tr class="payment-group">
                                                <td rowspan="5">11</td>
                                                <td rowspan="5" class="reference">3030/9611/7643</td>
                                                <td rowspan="5">16-Mar-2025</td>
                                                <td rowspan="5">PMT01208</td>
                                                <td rowspan="5" class="text-end amount">6,655.13</td>
                                                <td>PR01061</td>
                                                <td>13-Mar-2025</td>
                                                <td class="text-end">2,084.38</td>
                                                <td class="text-end amount">2,084.38</td>
                                                <td rowspan="5" class="text-end amount">6,655.13</td>
                                            </tr>
                                            <tr>
                                                <td>PR01017</td>
                                                <td>01-Mar-2025</td>
                                                <td class="text-end">690.00</td>
                                                <td class="text-end amount">690.00</td>
                                            </tr>
                                            <tr>
                                                <td>PR01006</td>
                                                <td>03-Mar-2025</td>
                                                <td class="text-end">690.00</td>
                                                <td class="text-end amount">690.00</td>
                                            </tr>
                                            <tr>
                                                <td>PR01023</td>
                                                <td>16-Mar-2025</td>
                                                <td class="text-end">2,185.00</td>
                                                <td class="text-end amount">1,152.37</td>
                                            </tr>
                                            <tr>
                                                <td>PR01003</td>
                                                <td>02-Mar-2025</td>
                                                <td class="text-end">2,038.38</td>
                                                <td class="text-end amount">2,038.38</td>
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

<!-- html2pdf.js for downloading PDF -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
<script>
    function downloadTableAsPDF() {
        const element = document.getElementById('pdf-content');
        const opt = {
            margin: 0.5,
            filename: 'vendor_payment_distribution_report.pdf',
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
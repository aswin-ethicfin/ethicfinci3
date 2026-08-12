<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between align-items-center">
                        <h6 class="text-white text-capitalize ps-3 mb-0">Driver-wise Delivery Note Report</h6>
                        <div class="pe-3">
                            <div class="btn-group">
                                <a href="<?= base_url('deliverynote/listdrivers'); ?>" class="btn btn-sm btn-outline-white mb-0">
                                    <i class="fas fa-th-list"></i>
                                </a>
                                <button onclick="exportToExcel('reportTable')" class="btn btn-sm btn-outline-white mb-0 me-1" title="Export to Excel">
                                    <i class="fas fa-file-excel"></i>
                                </button>
                                <button onclick="downloadPDF()" class="btn btn-sm btn-outline-white mb-0 me-1" title="Download PDF">
                                    <i class="fas fa-file-pdf"></i>
                                </button>
                                <button onclick="window.print()" class="btn btn-sm btn-outline-white mb-0" title="Print">
                                    <i class="fas fa-print"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="card-body px-0 pb-2">
                        <div class="px-4 mt-3">
                            <form method="get" action="<?= base_url('deliverynote/dvrdnreport') ?>">
                                <div class="row align-items-end mb-4">
                                    <div class="col-md-3">
                                        <div class="input-group input-group-static">
                                            <label class="text-primary font-weight-bold">Date From</label>
                                            <input type="date" name="from_date" class="form-control"
                                                value="<?= (isset($from_date) && $from_date != '') ? $from_date : date('Y-m-d', strtotime('-1 month')); ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="input-group input-group-static">
                                            <label class="text-primary font-weight-bold">Date To</label>
                                            <input type="date" name="to_date" class="form-control"
                                                value="<?= (isset($to_date) && $to_date != '') ? $to_date : date('Y-m-d'); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group input-group-static">
                                            <label class="text-primary font-weight-bold">Select Driver</label>
                                            <select name="driver_id" class="form-control">
                                                <option value="all" <?= ($selected_driver === 'all') ? 'selected' : '' ?>>All Drivers</option>
                                                <?php foreach ($drivers as $driver): ?>
                                                    <option value="<?= $driver['id'] ?>" <?= ($selected_driver == $driver['id']) ? 'selected' : '' ?>>
                                                        <?= $driver['name'] ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" class="btn mb-0 w-8 shadow-sm" style="background-image: linear-gradient(195deg, #f32362 0%, #f32362 100%); border: 1px solid #ffffff;">
                                            <i class="fas fa-filter" style="color: #ffffff;"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>

                            <div class="table-responsive p-0">
                                <table id="reportTable" class="table table-hover align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Driver Name</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Draft</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Approved</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Dispatched</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Part. Del.</th>
                                            <th class="text-center text-uppercase text-success text-xxs font-weight-bolder opacity-7">Delivered</th>
                                            <th class="text-center text-uppercase text-warning text-xxs font-weight-bolder opacity-7">Returned</th>
                                            <th class="text-center text-uppercase text-danger text-xxs font-weight-bolder opacity-7">Cancelled</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Closed</th>
                                            <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder opacity-7 ps-2">Total DN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($report)): ?>
                                            <?php foreach ($report as $row): ?>
                                                <tr>
                                                    <td class="ps-4">
                                                        <h6 class="mb-0 text-sm"><?= $row['driver_name'] ?></h6>
                                                    </td>
                                                    <td class="align-middle text-center text-xs"><?= $row['draft'] ?></td>
                                                    <td class="align-middle text-center text-xs text-info font-weight-bold"><?= $row['approved'] ?></td>
                                                    <td class="align-middle text-center text-xs text-warning font-weight-bold"><?= $row['dispatched'] ?></td>
                                                    <td class="align-middle text-center text-xs text-primary"><?= $row['partially_delivered'] ?></td>
                                                    <td class="align-middle text-center text-xs">
                                                        <span class="text-success font-weight-bolder"><?= $row['delivered'] ?></span>
                                                    </td>
                                                    <td class="align-middle text-center text-xs text-warning"><?= $row['returned'] ?></td>
                                                    <td class="align-middle text-center text-xs text-danger font-weight-bold"><?= $row['cancelled'] ?></td>
                                                    <td class="align-middle text-center text-xs text-secondary"><?= $row['closed'] ?></td>
                                                    <td class="align-middle text-center">
                                                        <a href="<?= base_url('deliverynote/dvrdnreportdetails/' . $row['driver_id']) ?>"
                                                            class="badge badge-sm bg-gradient-info">
                                                            <?= $row['total'] ?> <i class="fas fa-link ms-1" style="font-size: 8px;"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="10" class="text-center py-4">
                                                    <p class="text-xs text-secondary mb-0">No data found for the selected period.</p>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="px-4">
                                <nav aria-label="Pagination">
                                    <div class="d-flex justify-content-between align-items-center mt-4 mb-3">
                                        <ul class="pagination mb-0">
                                            <li class="page-item <?= ($start <= 0) ? 'disabled' : '' ?>">
                                                <a class="page-link" href="<?= ($start > 0) ? current_url() . '?per_page=' . ($start - $perPage) . ($suffix ?? '') : '#' ?>">
                                                    <i class="fa fa-arrow-circle-left"></i>
                                                </a>
                                            </li>

                                            <?php
                                            $totalPages = ceil($totalRows / $perPage);
                                            for ($counter = 0; $counter < $totalPages; $counter++):
                                                $offset = $counter * $perPage;
                                            ?>
                                                <li class="page-item <?= ($offset == $start) ? 'active' : '' ?>">
                                                    <a class="page-link" href="<?= current_url() . '?per_page=' . $offset . ($suffix ?? '') ?>">
                                                        <?= $counter + 1 ?>
                                                    </a>
                                                </li>
                                            <?php endfor; ?>

                                            <li class="page-item <?= ($start + $perPage >= $totalRows) ? 'disabled' : '' ?>">
                                                <a class="page-link" href="<?= ($start + $perPage < $totalRows) ? current_url() . '?per_page=' . ($start + $perPage) . ($suffix ?? '') : '#' ?>">
                                                    <i class="fa fa-arrow-circle-right"></i>
                                                </a>
                                            </li>
                                        </ul>

                                        <div class="text-sm text-secondary">
                                            Showing <?= $start + 1 ?> to <?= min($start + $perPage, $totalRows) ?> of <?= $totalRows ?> entries
                                        </div>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <style>
        .hover-shadow:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08);
            transition: all 0.2s ease;
        }

        .input-group-static label {
            margin-bottom: 5px;
            font-size: 0.75rem;
        }

        /* Styling specifically for the PDF generation */
        #reportTable {
            background-color: white !important;
            width: 100% !important;
        }

        /* Prevent rows from splitting across two pages */
        #reportTable tr {
            page-break-inside: avoid !important;
            break-inside: avoid !important;
        }

        /* Ensure table headers are visible and clear in PDF */
        #reportTable thead th {
            background-color: #f8f9fa !important;
            color: #344767 !important;
            text-transform: uppercase !important;
            font-size: 10px !important;
            padding: 12px !important;
        }

        /* Make body text slightly larger for readability */
        #reportTable tbody td {
            font-size: 11px !important;
            padding: 10px !important;
            border-bottom: 1px solid #e9ecef !important;
        }
    </style>
    <script>
        function downloadPDF() {
            // Select only the table element
            const element = document.getElementById("reportTable");

            // PDF Configuration
            const opt = {
                margin: [0.5, 0.3, 0.5, 0.3], // Top, Left, Bottom, Right
                filename: 'Driver_Delivery_Report.pdf',
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
                html2canvas: {
                    scale: 2,
                    useCORS: true,
                    letterRendering: true
                },
                jsPDF: {
                    unit: 'in',
                    format: 'a4',
                    orientation: 'landscape'
                },
                // This is key: it prevents elements from being split across pages
                pagebreak: {
                    mode: ['avoid-all', 'css', 'legacy']
                }
            };

            // Execute the download
            html2pdf().set(opt).from(element).save();
        }

        function exportToExcel(tableID) {
            let table = document.getElementById(tableID);
            let html = table.outerHTML;
            let downloadLink = document.createElement("a");
            document.body.appendChild(downloadLink);
            let dataType = 'application/vnd.ms-excel';
            downloadLink.href = 'data:' + dataType + ', ' + encodeURIComponent(html);
            downloadLink.download = 'Driver_Delivery_Report.xls';
            downloadLink.click();
        }
    </script>

    <style>
        /* Ensure the table looks good when printing */
        @media print {

            .btn,
            .form-control,
            form,
            nav,
            .card-header button {
                display: none !important;
            }

            .card {
                box-shadow: none !important;
                border: none !important;
            }

            .table-responsive {
                overflow: visible !important;
            }
        }

        .btn-outline-white {
            border: 0px solid rgba(255, 255, 255, 0.6);
            color: white;
            background: transparent;
        }

        .btn-outline-white:hover {
            background: rgba(255, 255, 255, 0.1);
            color: white;
        }
    </style>
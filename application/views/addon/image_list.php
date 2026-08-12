<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3"><?= $pagetitle ?></h6>
                </div>
                <div class="card-body px-4 py-3">

                    <?php
                    // Set default date range: one month ago to today
                    $default_start_date = date('Y-m-d', strtotime('-1 month'));
                    $default_end_date = date('Y-m-d');

                    // Use submitted values if available, otherwise use defaults
                    $start_date_value = $this->input->get('start_date') ? htmlspecialchars($this->input->get('start_date')) : $default_start_date;
                    $end_date_value = $this->input->get('end_date') ? htmlspecialchars($this->input->get('end_date')) : $default_end_date;
                    ?>

                    <!-- Filter Form -->
                    <form method="get" action="<?= site_url('home/listLabImages') ?>" class="row g-3 mb-4">
                        <div class="col-md-3">
                            <input type="text" name="title" class="form-control" placeholder="File Name"
                                value="<?= htmlspecialchars($this->input->get('title')) ?>">
                        </div>
                        <div class="col-md-3">
                            <div class="d-flex align-items-center">
                                <label for="start_date" class="form-label small text-muted me-2 mb-0" style="white-space: nowrap;">From:</label>
                                <input type="date" name="start_date" id="start_date" class="form-control"
                                    value="<?= $start_date_value ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="d-flex align-items-center">
                                <label for="end_date" class="form-label small text-muted me-2 mb-0" style="white-space: nowrap;">To:</label>
                                <input type="date" name="end_date" id="end_date" class="form-control"
                                    value="<?= $end_date_value ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="d-flex align-items-end h-100">
                                <div>
                                    <button type="submit" class="btn btn-primary me-2">Filter</button>
                                    <a href="<?= site_url('home/listLabImages') ?>" class="btn btn-secondary">Reset</a>
                                </div>
                            </div>
                        </div>
                    </form>

                    <!-- Table -->
                    <?php if (!empty($images)) : ?>
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle text-center">
                                <thead class="table-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>File Name</th>
                                        <th>Uploaded Date</th>
                                        <th>Operations</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($images as $index => $img) : ?>
                                        <tr>
                                            <td><?= $start + $index + 1 ?></td>
                                            <td><?= htmlspecialchars($img['title']) ?></td>
                                            <td> <?= $img['file_name'] ?>
                                                <!-- <img src="<?= base_url($img['file_name']) ?>" alt="Lab Image"
                                                    style="height: 80px; margin-bottom: 5px;"> -->
                                            </td>
                                            <td><?= date('d-m-Y', strtotime($img['date_time'])) ?></td>
                                            <td>
                                                <a href="<?= base_url($img['file_path']) ?>" class="btn btn-success"
                                                    style="padding: 2px 6px; font-size: 11px;" download>
                                                    <i class="fas fa-download fa-xs"></i>
                                                </a>
                                                <a href="<?= base_url($img['file_path']) ?>" target="_blank"
                                                    class="btn btn-primary" style="padding: 2px 6px; font-size: 11px;">
                                                    <i class="fas fa-eye fa-xs"></i>
                                                </a>
                                                <!-- <form action="<?= base_url('home/view_file?id=' . $img['id']) ?>"
                                                    method="post" style="display:inline-block;">
                                                    <button type="submit" class="btn btn-primary"
                                                        style="padding: 2px 6px; font-size: 11px;">
                                                        <i class="fas fa-print fa-xs"></i>
                                                    </button>
                                                </form> -->
                                                <a href="<?= base_url('home/editDocument?id=' . $img['id']) ?>"
                                                    class="btn btn-warning"
                                                    style="padding: 2px 6px; font-size: 11px;">
                                                    <i class="fas fa-edit fa-xs"></i>
                                                </a>
                                                <form action="<?= base_url('home/deleteDocument') ?>"
                                                    method="post" style="display:inline-block;"
                                                    onsubmit="return confirm('Are you sure you want to delete this document?');">
                                                    <input type="hidden" name="id" value="<?= $img['id'] ?>">
                                                    <input type="hidden" name="redirect" value="lab">
                                                    <button type="submit" class="btn btn-danger"
                                                        style="padding: 2px 6px; font-size: 11px;">
                                                        <i class="fas fa-trash-alt fa-xs"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                        <?php
                        // Required variables for pagination
                        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                        $search = isset($_GET['title']) ? $_GET['title'] : '';
                        $startPage = max(1, $page - 3);
                        $endPage = min($totalPages, $page + 3);
                        $perPage = isset($per_page) ? $per_page : 10;
                        $suffix = isset($pagination_suffix) ? $pagination_suffix : '';
                        $totalRows = isset($total_rows) ? $total_rows : 0;

                        ?>
                        <nav aria-label="Pagination">
                            <div class="d-flex justify-content-between align-items-center mt-4">
                                <ul class="pagination mb-0">
                                    <!-- Previous Button -->
                                    <li class="page-item <?= ($start <= 0) ? 'disabled' : '' ?>">
                                        <a class="page-link" href="<?= ($start > 0) ? current_url() . '?per_page=' . ($start - $perPage) . $suffix : '#' ?>">
                                            <i class="fa fa-arrow-circle-left"></i>
                                        </a>
                                    </li>

                                    <!-- Page Numbers -->
                                    <?php for ($counter = 0; $counter < $totalPages; $counter++) :
                                        $offset = $counter * $perPage;
                                    ?>
                                        <li class="page-item <?= ($offset == $start) ? 'active' : '' ?>">
                                            <a class="page-link" href="<?= current_url() . '?per_page=' . $offset . $suffix ?>">
                                                <?= $counter + 1 ?>
                                            </a>
                                        </li>
                                    <?php endfor; ?>

                                    <!-- Next Button -->
                                    <li class="page-item <?= ($start + $perPage >= $totalRows) ? 'disabled' : '' ?>">
                                        <a class="page-link" href="<?= ($start + $perPage < $totalRows) ? current_url() . '?per_page=' . ($start + $perPage) . $suffix : '#' ?>">
                                            <i class="fa fa-arrow-circle-right"></i>
                                        </a>
                                    </li>
                                </ul>

                                <!-- Optional Back Button -->
                                <!-- <a href="<?= base_url('home/') ?>" class="btn btn-info ms-3">
                                    Back
                                </a> -->
                            </div>
                        </nav>



                    <?php else : ?>
                        <p class="text-muted">No lab images found.</p>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</div>
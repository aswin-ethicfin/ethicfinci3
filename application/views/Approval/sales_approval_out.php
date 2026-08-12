<div class="container-fluid py-4">

    <div class="row">

        <div class="col-12">

            <div class="card my-4">

                <!-- Header -->
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">

                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">

                        <h6 class="text-white text-capitalize ps-3 mb-0">
                           sales Approval Out
                        </h6>

                    </div>

                </div>


                <!-- Filters -->
                <div class="card-body px-4 pb-2">

                    <form method="get" class="mb-4 row g-3 align-items-end">

                        <!-- Start Date -->
                        <div class="col-md-2">

                            <label class="form-label fw-bold">
                                Start Date
                            </label>

                            <input type="date"
                                   name="start_date"
                                   class="form-control border border-dark rounded">

                        </div>


                        <!-- End Date -->
                        <div class="col-md-2">

                            <label class="form-label fw-bold">
                                End Date
                            </label>

                            <input type="date"
                                   name="end_date"
                                   class="form-control border border-dark rounded">

                        </div>


                        <!-- Document Type -->
                        <div class="col-md-2">

                            <label class="form-label fw-bold">
                                Document Type
                            </label>

                            <select name="type"
                                    class="form-select border border-dark rounded">

                                <option value="">
                                    All Documents
                                </option>

                                <option value="0">
                                    Purchase Order
                                </option>

                                <option value="1">
                                    Sales Order
                                </option>

                                <option value="2">
                                    Payment
                                </option>

                            </select>

                        </div>


                        <!-- Status -->
                        <div class="col-md-2">

                            <label class="form-label fw-bold">
                                Status
                            </label>

                            <select name="approval_status"
                                    class="form-select border border-dark rounded">

                                <option value="">
                                    All Status
                                </option>

                                <option value="waiting">
                                    Waiting
                                </option>

                                <option value="pending">
                                    Pending
                                </option>

                                <option value="approved">
                                    Approved
                                </option>

                                <option value="rejected">
                                    Rejected
                                </option>

                            </select>

                        </div>


                        <!-- Search -->
                        <div class="col-md-3">

                            <label class="form-label fw-bold">
                                Search
                            </label>

                            <input type="text"
                                   name="search"
                                   class="form-control border border-dark rounded"
                                   placeholder="Document No / Vendor">

                        </div>


                        <!-- Buttons -->
                        <div class="col-md-1 d-flex justify-content-end">

                            <button type="submit"
                                    class="btn btn-primary me-2">

                                <i class="fa fa-search"></i>

                            </button>

                            <a href="<?= base_url('Approval/sales_approval_out') ?>"
                               class="btn btn-secondary">

                                <i class="fa fa-sync-alt"></i>

                            </a>

                        </div>

                    </form>


                    <!-- Table -->
                    <div class="table-responsive">

                        <table class="table align-items-center mb-0">

                            <thead>

                                <tr>

                                    <th>
                                        Date
                                    </th>

                                    <th>
                                        Type
                                    </th>

                                    <th>
                                        Doc. No.
                                    </th>

                                    <th>
                                        Vendor
                                    </th>

                                    <th class="text-end">
                                        Amount
                                    </th>

                                    <th>
                                        To
                                    </th>

                                    <th class="text-center">
                                        Status
                                    </th>

                                    <th class="text-end">
                                        Operations
                                    </th>

                                </tr>

                            </thead>


                            <tbody>
<pre><?= print_r($sales_orders) ?></pre>
<?php if (!empty($sales_orders)): ?>

    <?php foreach ($sales_orders as $row): ?>

        <tr>

            <!-- Date -->
            <td>
                <?= !empty($row['inv_date'])
                    ? date('d-M-Y', strtotime($row['inv_date']))
                    : '' ?>
            </td>

            <!-- Type -->
            <td>
                Purchase Order
            </td>

            <!-- Document Number -->
            <td>
                <strong>
                <?= html_escape($row['reference']) ?>
                </strong>
            </td>

            <!-- Vendor -->
            <td>
            <?= html_escape($row['vendor_name']) ?>
            </td>

            <!-- Amount -->
            <td class="text-end">
                <?= number_format((float)$row['grand_total'], 2) ?> SAR
            </td>

            <!-- To -->
            <td>

                <?php
                /*
                 * Here you need the employee who is receiving
                 * the approval.
                 */
                ?>

                <strong>
                    <?= !empty($row['transfer_to_name'])
                        ? esc($row['transfer_to_name'])
                        : '—' ?>
                </strong>

                <?php if (!empty($row['transfer_to_designation'])): ?>
                    <br>

                    <small class="text-secondary">
                    <?= html_escape($row['transfer_to_designation']) ?>
                    </small>
                <?php endif; ?>

            </td>

            <!-- Status -->
            <td class="text-center">

                <?php

                switch ((int)$row['approval_status']) {

                    case 0:
                        echo '<span class="badge bg-gradient-warning">
                                Pending
                              </span>';
                        break;

                    case 1:
                        echo '<span class="badge bg-gradient-success">
                                Approved
                              </span>';
                        break;

                    case 2:
                        echo '<span class="badge bg-gradient-danger">
                                Rejected
                              </span>';
                        break;

                    case 3:
                        echo '<span class="badge bg-gradient-secondary">
                                Waiting
                              </span>';
                        break;

                    default:
                        echo '<span class="badge bg-gradient-dark">
                                Unknown
                              </span>';
                        break;
                }

                ?>

            </td>

            <!-- Operations -->
            <td class="text-end">

                <div class="d-flex justify-content-end gap-1">

                    <!-- Edit -->
                    <a href="#"
                       class="badge bg-gradient-dark badge-sm"
                       title="Edit">

                        <i class="fa fa-pencil"></i>

                    </a>

                    <!-- View -->
                    <a href="<?= base_url('home/viewpurorder?order=' . $row['doc_id']) ?>"
                       class="badge bg-gradient-secondary badge-sm"
                       title="View">

                        <i class="fa fa-eye"></i>

                    </a>

                </div>

            </td>

        </tr>

    <?php endforeach; ?>

<?php else: ?>

    <tr>
        <td colspan="8" class="text-center">
            No purchase orders sent for approval.
        </td>
    </tr>

<?php endif; ?>

</tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
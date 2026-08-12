<div class="container-fluid py-4">

    <div class="row">

        <div class="col-12">

            <div class="card my-4">

                <!-- Header -->
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">

                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">

                        <h6 class="text-white text-capitalize ps-3 mb-0">
                            Sales Approval In
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

                            <a href="<?= base_url('approval/sales_approval_in') ?>"
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

            <th>Date</th>

            <th>Doc. No.</th>

            <th>Vendor</th>

            <th class="text-end">
                Amount
            </th>

            <th>From</th>

            <th class="text-center">
                Status
            </th>

            <th class="text-end">
                Operations
            </th>

        </tr>
    </thead>


    <tbody>
 
<?php if (!empty($sales_orders)): ?>

    <?php foreach ($sales_orders as $row): ?>

        <tr>

            <td>
                <?= !empty($row['inv_date'])
                    ? date('d-M-Y', strtotime($row['inv_date']))
                    : '-' ?>
            </td>

            <td>
                <strong>
                    <?= htmlspecialchars($row['reference'] ?? '-') ?>
                </strong>
            </td>

            <td>
                <?= htmlspecialchars($row['vendor_name'] ?? '-') ?>
            </td>

            <td class="text-end">
                <?= number_format(
                    (float)($row['grand_total'] ?? 0),
                    2
                ) ?>
                SAR
            </td>

            <td>

                <?php if ((int)($row['transfer_from'] ?? 0) === 0): ?>

                    <strong>Created</strong>

                <?php else: ?>

                    <strong>
                        <?= htmlspecialchars(
                            $row['employee_name'] ?? '-'
                        ) ?>
                    </strong>

                    <br>

                    <small class="text-secondary">
                        <?= htmlspecialchars(
                            $row['designation_name'] ?? '-'
                        ) ?>
                    </small>

                <?php endif; ?>

            </td>

            <td class="text-center">

                <?php
                $approval_status = (int)($row['approval_status'] ?? 0);

                switch ($approval_status) {

                    case 0:
                        $status_text = 'Pending';
                        $status_class = 'bg-gradient-warning';
                        break;

                    case 1:
                        $status_text = 'Approved';
                        $status_class = 'bg-gradient-success';
                        break;

                    case 2:
                        $status_text = 'Rejected';
                        $status_class = 'bg-gradient-danger';
                        break;

                    case 3:
                        $status_text = 'Waiting';
                        $status_class = 'bg-gradient-secondary';
                        break;

                    default:
                        $status_text = 'Unknown';
                        $status_class = 'bg-gradient-dark';
                        break;
                }
                ?>

                <span class="badge <?= $status_class ?>">
                    <?= $status_text ?>
                </span>

            </td>

            <td class="text-end">

                <div class="d-flex justify-content-end gap-1">

                    <button type="button"
                            class="badge bg-gradient-dark badge-sm border-0"
                            data-bs-toggle="modal"
                            data-bs-target="#approvalModal_<?= (int)$row['approval_id'] ?>">

                        <i class="fa fa-pencil"></i>

                    </button>

                    <a href="<?= base_url(
                        'home/viewpurorder?order=' . (int)$row['doc_id']
                    ) ?>"
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
        <td colspan="7" class="text-center py-4">
            <span class="text-secondary">
                No purchase orders found for approval.
            </span>
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
<?php if (!empty($sales_orders)): ?>

<?php foreach ($sales_orders as $row): ?>

    <div class="modal fade"
         id="approvalModal_<?= (int)$row['approval_id'] ?>"
         tabindex="-1"
         aria-hidden="true">

        <div class="modal-dialog modal-md modal-dialog-centered">

            <div class="modal-content">

                <form method="post"
                      action="<?= base_url('salesapproval/saveapproval') ?>">

                    <div class="modal-header py-2">

                        <h5 class="modal-title">
                            Change Status
                        </h5>

                        <button type="button"
                                class="btn-close"
                                data-bs-dismiss="modal">
                        </button>

                    </div>


                    <div class="modal-body">

                        <!-- APPROVAL ID -->
                        <input type="hidden"
                               name="approval_id"
                               value="<?= (int)$row['approval_id'] ?>">


                        <!-- DOCUMENT ID -->
                        <input type="hidden"
                               name="doc_id"
                               value="<?= (int)$row['doc_id'] ?>">


                        <!-- TYPE -->
                        <input type="hidden"
                               name="type"
                               value="<?= (int)($row['type'] ?? 0) ?>">


                        <!-- CURRENT TRANSFER FROM -->
                        <input type="hidden"
                               name="transfer_from"
                               value="<?= (int)($row['transfer_from'] ?? 0) ?>">


                        <!-- CURRENT TRANSFER TO -->
                        <input type="hidden"
                               name="transfer_to"
                               value="<?= (int)($row['transfer_to'] ?? 0) ?>">


                        <!-- PO INFORMATION -->

                        <div class="row mb-3">

                            <div class="col-6">

                                <div>
                                    <span class="text-muted">
                                        No :
                                    </span>

                                    <strong>
                                        <?= htmlspecialchars(
                                            $row['reference'] ?? '-'
                                        ) ?>
                                    </strong>
                                </div>


                                <div>
                                    <span class="text-muted">
                                        Date :
                                    </span>

                                    <strong>
                                        <?= !empty($row['inv_date'])
                                            ? date(
                                                'd-M-Y',
                                                strtotime($row['inv_date'])
                                            )
                                            : '-' ?>
                                    </strong>
                                </div>

                            </div>


                            <div class="col-6">

                                <div>
                                    <span class="text-muted">
                                        Amount :
                                    </span>

                                    <strong>
                                        <?= number_format(
                                            (float)(
                                                $row['grand_total'] ?? 0
                                            ),
                                            2
                                        ) ?>
                                        SAR
                                    </strong>
                                </div>


                                <div>
                                    <span class="text-muted">
                                        Vendor :
                                    </span>

                                    <strong>
                                        <?= htmlspecialchars(
                                            $row['vendor_name'] ?? '-'
                                        ) ?>
                                    </strong>
                                </div>

                            </div>

                        </div>


                        <hr>


                        <!-- DATE -->

                        <div class="mb-3">

                            <label class="form-label">
                                Date
                            </label>

                            <input type="date"
                                   name="approval_date"
                                   class="form-control"
                                   value="<?= date('Y-m-d') ?>">

                        </div>


                        <!-- STATUS -->

                        <div class="mb-3">

                            <label class="form-label">
                                Select Status
                            </label>

                            <select name="status"
                                    class="form-select approval-status"
                                    required>

                                <option value="">
                                    Select Status
                                </option>

                                <option value="0"
                                    <?= (int)($row['approval_status'] ?? 0) === 0
                                        ? 'selected'
                                        : '' ?>>
                                    Pending
                                </option>

                                <option value="1"
                                    <?= (int)($row['approval_status'] ?? 0) === 1
                                        ? 'selected'
                                        : '' ?>>
                                    Approved
                                </option>

                                <option value="2"
                                    <?= (int)($row['approval_status'] ?? 0) === 2
                                        ? 'selected'
                                        : '' ?>>
                                    Rejected
                                </option>

                                <option value="3"
                                    <?= (int)($row['approval_status'] ?? 0) === 3
                                        ? 'selected'
                                        : '' ?>>
                                    For Further Approval
                                </option>

                            </select>

                        </div>


                        <!-- FURTHER APPROVAL -->

                        <div class="further-approval-section mb-3"
                             style="<?= (int)($row['approval_status'] ?? 0) === 3
                                 ? ''
                                 : 'display:none;' ?>">

                            <div class="row">

                                <!-- DESIGNATION -->

                                <div class="col-6">

                                    <label class="form-label">
                                        Designation
                                    </label>

                                    <select name="designation_id"
                                                                    class="form-select approval-designation">

                                                                    <option value="">
                                                                        Select Designation
                                                                    </option>

                                                                    <?php if (!empty($designation)): ?>

                                                                        <?php foreach ($designation as $desig): ?>

                                                                            <option value="<?= html_escape($desig['id']) ?>">
                                                                                <?= html_escape($desig['name']) ?>
                                                                            </option>

                                                                        <?php endforeach; ?>

                                                                    <?php endif; ?>

                                                                </select>

                                </div>


                                <!-- EMPLOYEE -->

                                <div class="col-6">

                                    <label class="form-label">
                                        Employee / Name
                                    </label>

                                    <select name="employee_id"
                                            class="form-select approval-employee"
                                            disabled>

                                        <option value="">
                                            Select Employee
                                        </option>

                                    </select>

                                </div>

                            </div>

                        </div>


                        <!-- REMARKS -->

                        <div class="mb-3">

                            <label class="form-label">
                                Remarks
                            </label>

                            <textarea name="remarks"
                                      class="form-control"
                                      rows="3"><?= htmlspecialchars(
                                          $row['remark'] ?? ''
                                      ) ?></textarea>

                        </div>

                    </div>


                    <div class="modal-footer py-2">

                        <button type="button"
                                class="btn btn-secondary btn-sm"
                                data-bs-dismiss="modal">

                            CANCEL

                        </button>


                        <button type="submit"
                                class="btn btn-primary btn-sm">

                            CONFIRM

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

<?php endforeach; ?>

<?php endif; ?>


<script>
    
    $(document).on('change', '.approval-status', function() {

        const section = $(this)
            .closest('.modal')
            .find('.further-approval-section');

        if ($(this).val() == '3') {

            section.show();

        } else {

            section.hide();

            section.find('select[name="designation_id"]').val('');

            section.find('select[name="employee_id"]')
                .html('<option value="">Select Employee</option>');
        }

    });
    // =-=-=--------------------designation based emply-----------------------------------
  // =-=-=--------------------designation based emplye-----------------------------------
  $(document).on('change', '.approval-designation', function() {

const designationId = $(this).val();

const modal = $(this).closest('.modal');

const employeeSelect = modal.find('.approval-employee');

console.log('Designation ID:', designationId);

if (!designationId) {

    employeeSelect
        .html('<option value="">Select Employee</option>')
        .prop('disabled', true);

    return;
}

employeeSelect
    .html('<option value="">Loading...</option>')
    .prop('disabled', true);


$.ajax({

    url: "<?= base_url('approval/getemployeesbydesignation') ?>",

    type: "GET",

    data: {
        designation_id: designationId
    },

    dataType: "json",

    success: function(response) {

        console.log('API Response:', response);

        // Clear dropdown
        employeeSelect.empty();

        // Default option
        employeeSelect.append(
            '<option value="">Select Employee</option>'
        );


        // IMPORTANT:
        // Employees are inside response.data.employees

        if (
            response.status === true &&
            response.data &&
            Array.isArray(response.data.employees)
        ) {

            $.each(response.data.employees, function(index, employee) {

                console.log(
                    'Employee:',
                    employee.id,
                    employee.name
                );

                employeeSelect.append(
                    $('<option>', {
                        value: employee.id,
                        text: employee.name
                    })
                );

            });

            employeeSelect.prop('disabled', false);

        } else {

            employeeSelect.append(
                '<option value="">No employees found</option>'
            );

        }

    },

    error: function(xhr) {

        console.log('AJAX ERROR:', xhr.responseText);

        employeeSelect
            .html('<option value="">Error loading employees</option>')
            .prop('disabled', true);

    }

});

});
</script>
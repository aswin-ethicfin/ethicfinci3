<div class="container-fluid py-4">

    <div class="row">

        <div class="col-12">

            <div class="card my-4">

                <!-- Header -->
                <!-- Header -->
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">

                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-3 pb-3">

                        <div class="d-flex justify-content-between align-items-center px-3">

                            <!-- Title -->
                            <h6 class="text-white text-capitalize mb-0">
                                Purchase Order
                            </h6>


                            <!-- Action Buttons -->
                            <div class="d-flex align-items-center">

                                <!-- Import Excel -->
                                <a class="btn btn-outline-white btn-sm mb-0 me-2"
                                    style="display:none"
                                    href="<?= base_url('home/importpurchaseorder') ?>">

                                    Import Excel

                                </a>


                                <!-- Export Excel -->
                                <a class="btn btn-outline-white btn-sm mb-0 me-2"
                                    href="<?= base_url(
                                                'Excelexport/porders?from=' .
                                                    ($start_date ?? date('Y-m-01')) .
                                                    '&to=' .
                                                    ($end_date ?? date('Y-m-d')) .
                                                    '&branch=1&q=' .
                                                    urlencode($search ?? '')
                                            ) ?>">

                                    Export to Excel

                                </a>


                                <!-- Print / PDF -->
                                <a class="btn btn-outline-white btn-sm mb-0 me-2"
                                    target="_blank"
                                    href="<?= base_url(
                                                'home/porderspdf?p=P' .
                                                    '&from=' .
                                                    ($start_date ?? date('Y-m-01')) .
                                                    '&to=' .
                                                    ($end_date ?? date('Y-m-d')) .
                                                    '&salesrep=All' .
                                                    '&branch=1' .
                                                    '&q=' .
                                                    urlencode($search ?? '') .
                                                    '&cust=All'
                                            ) ?>">

                                    Print / PDF [P]

                                </a>


                                <!-- New Purchase Order -->
                                <a class="btn btn-outline-white btn-sm mb-0"
                                    href="<?= base_url('home/createporder') ?>">

                                    New Purchase Order

                                </a>

                            </div>

                        </div>

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
                                class="form-control border border-dark rounded"
                                value="<?= htmlspecialchars($start_date ?? date('Y-m-01')) ?>">

                        </div>


                        <!-- End Date -->
                        <div class="col-md-2">

                            <label class="form-label fw-bold">
                                End Date
                            </label>

                            <input type="date"
                                name="end_date"
                                class="form-control border border-dark rounded"
                                value="<?= htmlspecialchars($end_date ?? date('Y-m-d')) ?>">

                        </div>




                        <!-- Status -->



                        <!-- Search -->
                        <div class="col-md-3">

                            <label class="form-label fw-bold">
                                Search
                            </label>

                            <input type="text"
                                name="search"
                                class="form-control border border-dark rounded"
                                placeholder="Document No / Vendor"
                                value="<?= htmlspecialchars($search ?? '') ?>">

                        </div>


                        <!-- Buttons -->
                        <div class="col-md-1 d-flex justify-content-end">

                            <button type="submit"
                                class="btn btn-primary me-2">

                                <i class="fa fa-search"></i>

                            </button>

                            <a href="<?= base_url('po/purchase_order') ?>"
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
                                    <th>Branch</th>

                                    <th>Doc. No.</th>

                                    <th>Vendor</th>

                                    <th class="text-end">
                                        Amount
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


                                <?php if (!empty($orders)): ?>

                                    <?php foreach ($orders as $row): ?>

                                        <tr data-doc-id="<?= (int)$row['id'] ?>">

                                            <td>
                                                <?= !empty($row['inv_date'])
                                                    ? date('d-M-Y', strtotime($row['inv_date']))
                                                    : '-' ?>
                                            </td>

                                            <td>
                                                <?= htmlspecialchars($row['branch_name'] ?? '-') ?>
                                            </td>

                                            <td>
                                                <?= htmlspecialchars($row['inv_no'] ?? '-') ?>
                                            </td>

                                            <td>
                                                <?= htmlspecialchars($row['name'] ?? '-') ?>
                                            </td>

                                            <td class="text-end">
                                                <?= number_format(
                                                    (float)($row['grand_total'] ?? 0),
                                                    2
                                                ) ?>
                                            </td>

                                            <td class="approval-status">
                                                <div style="padding-left: 40px !important;">
                                                    <button type="button"
                                                        class="badge bg-gradient-dark badge-sm border-0"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#approvalModal_<?= (int)$row['id'] ?>">

                                                        <i class="fa fa-pencil"></i>

                                                    </button>

                                                    <?php if ((int)$row['payment_status'] === 0): ?>

                                                        <span class="badge bg-warning ms-2">
                                                            Pending
                                                        </span>

                                                    <?php elseif ((int)$row['payment_status'] === 1): ?>

                                                        <span class="badge bg-success ms-2">
                                                            Approved
                                                        </span>

                                                    <?php elseif ((int)$row['payment_status'] === 2): ?>

                                                        <span class="badge bg-danger ms-2">
                                                            Rejected
                                                        </span>

                                                    <?php elseif ((int)$row['payment_status'] === 3): ?>

                                                        <span class="badge bg-info">
                                                            Further Approval
                                                        </span>

                                                    <?php endif; ?>

                                                </div>


                                            </td>

                                            <td class="text-end">



                                                <a href="<?= base_url(
                                                                'home/viewpurorder?order=' . $row['id']
                                                            ) ?>"
                                                    class="badge badge-sm bg-gradient-info">

                                                    <i class="fa fa-eye"></i>

                                                </a>

                                                <a href="<?= base_url(
                                                                'home/editporder?ref=' . $row['reference']
                                                            ) ?>"
                                                    class="badge badge-sm bg-gradient-secondary">

                                                    <i class="fa fa-edit"></i>

                                                </a>
                                                <button type="button"
                                                    class="badge badge-sm bg-gradient-danger border-0 delete-porder-btn"
                                                    data-id="<?= (int)$row['id'] ?>">

                                                    <i class="fa fa-trash"></i>

                                                </button>
                                            </td>

                                        </tr>

                                    <?php endforeach; ?>

                                <?php else: ?>

                                    <tr>
                                        <td colspan="7" class="text-center">
                                            No Purchase Orders found.
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


    <?php if (!empty($orders)): ?>

        <?php foreach ($orders as $row): ?>

            <div class="modal fade"
                id="approvalModal_<?= (int)$row['id'] ?>"
                tabindex="-1"
                aria-hidden="true">




                <div class="modal-dialog modal-md modal-dialog-centered">

                    <div class="modal-content">

                        <form method="post"
                            action="<?= base_url('po/savePurchaseOrderApproval') ?>" class="approval-form">

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
                                <input type="hidden"
                                    name="reference"
                                    value="<?= (int)$row['reference'] ?>">

                                <input type="hidden" name="from_page" value="order_listing">
                                <!-- DOCUMENT ID -->
                                <input type="hidden"
                                    name="doc_id"
                                    value="<?= (int)$row['doc_id'] ?>">


                                <!-- TYPE -->
                                <input type="hidden"
                                    name="type"
                                    value="0">


                                <!-- CURRENT TRANSFER FROM -->
                                <input type="hidden"
                                    name="transfer_from"
                                    value="<?= (int)($row['transfer_from'] ?? 0) ?>">

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
                                        class="form-select approval-status">

                                        <option value="">
                                            Select Status
                                        </option>

                                        <!-- <option value="0"
                                            <//?= (int)($row['approval_status'] ?? 0) === 0
                                                ? 'selected'
                                                : '' ?>>
                                            Pending
                                        </option>

                                        <option value="1"
                                            </?= (int)($row['approval_status'] ?? 0) === 1
                                                ? 'selected'
                                                : '' ?>>
                                            Approved
                                        </option>

                                        <option value="2"
                                            </?= (int)($row['approval_status'] ?? 0) === 2
                                                ? 'selected'
                                                : '' ?>>
                                            Rejected
                                        </option> -->

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
                                                        $row[''] ?? ''
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

    <div class="modal fade"
        id="deletePorderModal"
        tabindex="-1"
        aria-labelledby="deletePorderModalLabel"
        aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title" id="deletePorderModalLabel">
                        Delete Purchase Order
                    </h5>

                    <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close">
                    </button>

                </div>

                <div class="modal-body">

                    <p class="mb-0">
                        Are you sure you want to delete this Purchase Order?
                    </p>

                    <input type="hidden"
                        id="deletePorderId"
                        value="">

                </div>

                <div class="modal-footer">

                    <button type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal">

                        Cancel

                    </button>

                    <button type="button"
                        class="btn btn-danger"
                        id="confirmDeletePorder">

                        <i class="fa fa-trash me-1"></i>
                        Delete

                    </button>

                </div>

            </div>

        </div>

    </div>

    <script>
        // =--------------------------------form validation & message---------------------------------
        function showFlashMessage(type, message) {

            let alertId = type + 'AlertDynamic';

            $('#' + alertId).remove();

            let bg = type === 'success' ?
                'linear-gradient(135deg, #28c76f, #20a85a)' :
                'linear-gradient(135deg, #ea5455, #c53030)';

            let icon = type === 'success' ?
                'fa-check-circle' :
                'fa-times-circle';

            let title = type === 'success' ?
                'Success' :
                'Error';

            let html = `
        <div
            id="${alertId}"
            style="
                position: fixed;
                top: 20px;
                right: 20px;
                z-index: 99999;
                min-width: 320px;
                max-width: 380px;
                animation: slideInRight 0.4s ease;
            "
        >

            <div style="
                background: ${bg};
                border-radius: 6px;
                box-shadow: 0 5px 18px rgba(0,0,0,0.18);
                padding: 14px 18px;
                display: flex;
                align-items: center;
                gap: 12px;
                color: #fff;
            ">

                <i class="fas ${icon}"
                    style="
                        color: #fff;
                        font-size: 22px;
                        flex-shrink: 0;
                    ">
                </i>

                <div style="flex: 1;">

                    <div style="
                        font-weight: 600;
                        font-size: 15px;
                        color: #fff;
                        margin-bottom: 2px;
                    ">
                        ${message}
                    </div>

                </div>

                <button
                    type="button"
                    onclick="$('#${alertId}').remove();"
                    style="
                        background: transparent;
                        border: none;
                        color: #fff;
                        font-size: 18px;
                        cursor: pointer;
                        padding: 0;
                        opacity: 0.8;
                    "
                >
                    &times;
                </button>

            </div>

        </div>
    `;

            $('body').append(html);

            setTimeout(() => {

                $('#' + alertId).fadeOut(500, function() {
                    $(this).remove();
                });

            }, 3000);
        }


        $(document).on('submit', '.approval-form', function(e) {

            e.preventDefault();

            const form = $(this);

            const status = form.find('select[name="status"]').val();

            // -----------------------------
            // VALIDATION
            // -----------------------------

            if (status === '' || status === null) {

                showFlashMessage(
                    'error',
                    'Please select an approval status.'
                );

                return;
            }


            // -----------------------------
            // FURTHER APPROVAL
            // -----------------------------

            if (status === '3') {

                const designation = form
                    .find('select[name="designation_id"]')
                    .val();

                const employee = form
                    .find('select[name="employee_id"]')
                    .val();

                if (!designation) {

                    showFlashMessage(
                        'error',
                        'Please select a designation.'
                    );

                    return;
                }

                if (!employee) {

                    showFlashMessage(
                        'error',
                        'Please select an employee for further approval.'
                    );

                    return;
                }
            }


            // -----------------------------
            // AJAX
            // -----------------------------

            $.ajax({

                url: form.attr('action'),

                type: 'POST',

                data: form.serialize(),

                dataType: 'json',

                beforeSend: function() {

                    form.find('button[type="submit"]')
                        .prop('disabled', true)
                        .text('Saving...');
                },

                success: function(response) {

                    console.log('Purchase Order Approval Response:', response);

                    if (response.status === true) {

                        const docId = response.data.doc_id;

                        const savedStatus = parseInt(
                            response.data.status,
                            10
                        );


                        // -----------------------------
                        // CLOSE MODAL
                        // -----------------------------

                        const modalElement =
                            form.closest('.modal')[0];

                        if (modalElement) {

                            const modalInstance =
                                bootstrap.Modal.getInstance(modalElement);

                            if (modalInstance) {
                                modalInstance.hide();
                            }
                        }


                        // -----------------------------
                        // SUCCESS MESSAGE
                        // -----------------------------

                        showFlashMessage(
                            'success',
                            response.message
                        );


                        // -----------------------------
                        // UPDATE ROW
                        // -----------------------------

                        updatePurchaseOrderRow(
                            docId,
                            savedStatus
                        );


                        // -----------------------------
                        // RELOAD
                        // -----------------------------

                        setTimeout(function() {

                            location.reload();

                        }, 500);


                    } else {

                        showFlashMessage(
                            'error',
                            response.message ||
                            'Failed to save Purchase Order approval.'
                        );
                    }
                },


                // -----------------------------
                // AJAX ERROR
                // -----------------------------

                error: function(xhr) {

                    console.error(
                        '========== PURCHASE ORDER APPROVAL AJAX ERROR =========='
                    );

                    console.error(
                        'HTTP Status:',
                        xhr.status
                    );

                    console.error(
                        'Status Text:',
                        xhr.statusText
                    );

                    console.error(
                        'Response:',
                        xhr.responseText
                    );

                    let message =
                        'Unable to save Purchase Order approval.';

                    try {

                        const response =
                            JSON.parse(xhr.responseText);

                        if (response.message) {

                            message = response.message;
                        }

                        if (response.error) {

                            console.error(
                                'Server Error:',
                                response.error
                            );
                        }

                    } catch (e) {

                        console.error(
                            'Response is not JSON.'
                        );
                    }


                    showFlashMessage(
                        'error',
                        message
                    );
                },


                // -----------------------------
                // COMPLETE
                // -----------------------------

                complete: function() {

                    form.find('button[type="submit"]')
                        .prop('disabled', false)
                        .text('Save');
                }
            });

        });



        function updatePurchaseOrderRow(docId, status) {

            const row = $('tr[data-doc-id="' + docId + '"]');

            console.log('PO row:', row);
            console.log('Doc ID:', docId);
            console.log('Status:', status);

            if (!row.length) {
                console.warn('Purchase Order row not found for ID:', docId);
                return;
            }

            let statusText = '';

            switch (status) {
                case 0:
                    statusText = 'Pending';
                    break;

                case 1:
                    statusText = 'Approved';
                    break;

                case 2:
                    statusText = 'Rejected';
                    break;

                case 3:
                    statusText = 'Further Approval';
                    break;
            }

            row.find('.approval-status').text(statusText);
        }
        <?php
        $successMessage = $this->session->flashdata('success');
        $errorMessage   = $this->session->flashdata('error');
        ?>

        <?php if (!empty($successMessage)): ?>

            showFlashMessage(
                'success',
                <?= json_encode($successMessage) ?>
            );

        <?php endif; ?>

        <?php if (!empty($errorMessage)): ?>

            showFlashMessage(
                'error',
                <?= json_encode($errorMessage) ?>
            );

        <?php endif; ?>
        // =-=-=-=-=-=-=-=------------------------------------------



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



        // delete
        $(document).on('click', '.delete-porder-btn', function() {

            const id = $(this).data('id');

            console.log('Delete Purchase Order ID:', id);

            $('#deletePorderId').val(id);

            const modalElement =
                document.getElementById('deletePorderModal');

            const modal =
                new bootstrap.Modal(modalElement);

            modal.show();
        });
        $(document).on('click', '#confirmDeletePorder', function() {

            const button = $(this);

            const id = $('#deletePorderId').val();

            if (!id) {

                showFlashMessage(
                    'error',
                    'Purchase Order ID is missing.'
                );

                return;
            }


            console.log(
                'Deleting Purchase Order:',
                id
            );


            $.ajax({

                url: '<?= base_url('Update/deleteporder') ?>',

                type: 'POST',

                data: {
                    id: id
                },

                dataType: 'json',

                beforeSend: function() {

                    button
                        .prop('disabled', true)
                        .html(
                            '<i class="fa fa-spinner fa-spin me-1"></i> Deleting...'
                        );
                },

                success: function(response) {

                    console.log(
                        'Delete Purchase Order Response:',
                        response
                    );


                   if (response.success === true) {

                        /*
                        | Close modal
                        */

                        const modalElement =
                            document.getElementById(
                                'deletePorderModal'
                            );

                        const modal =
                            bootstrap.Modal.getInstance(
                                modalElement
                            );

                        if (modal) {
                            modal.hide();
                        }


                        /*
                        | Success message
                        */

                        showFlashMessage(
                            'success',
                            response.message ||
                            'Purchase Order deleted successfully.'
                        );


                        /*
                        | Reload list
                        */

                        setTimeout(function() {

                            location.reload();

                        }, 500);


                    } else {

                        showFlashMessage(
                            'error',
                            response.message ||
                            'Unable to delete Purchase Order.'
                        );
                    }
                },


                error: function(xhr) {

                    console.error(
                        '========== DELETE PURCHASE ORDER ERROR =========='
                    );

                    console.error(
                        'HTTP Status:',
                        xhr.status
                    );

                    console.error(
                        'Response:',
                        xhr.responseText
                    );


                    let message =
                        'Unable to delete Purchase Order.';


                    try {

                        const response =
                            JSON.parse(xhr.responseText);

                        if (response.message) {

                            message =
                                response.message;
                        }

                    } catch (e) {

                        console.error(
                            'Response is not JSON.'
                        );
                    }


                    showFlashMessage(
                        'error',
                        message
                    );
                },


                complete: function() {

                    button
                        .prop('disabled', false)
                        .html(
                            '<i class="fa fa-trash me-1"></i> Delete'
                        );
                }

            });

        });
    </script>
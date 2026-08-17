<div class="container-fluid py-4">

    <div class="row">

        <div class="col-12">

            <div class="card my-4">

                <!-- HEADER -->
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">

                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">

                        <h6 class="text-white text-capitalize ps-3 mb-0">
                            Payment Approval
                        </h6>

                    </div>

                </div>


                <!-- FILTERS -->
                <div class="card-body px-4 pb-2">

                    <form method="get"
                          class="mb-4 row g-3 align-items-end">

                        <!-- START DATE -->
                        <div class="col-md-2">

                            <label class="form-label fw-bold">
                                Start Date
                            </label>

                            <input type="date"
                                   name="start_date"
                                   class="form-control border border-dark rounded"
                                   value="<?= htmlspecialchars($_GET['start_date'] ?? '') ?>">

                        </div>


                        <!-- END DATE -->
                        <div class="col-md-2">

                            <label class="form-label fw-bold">
                                End Date
                            </label>

                            <input type="date"
                                   name="end_date"
                                   class="form-control border border-dark rounded"
                                   value="<?= htmlspecialchars($_GET['end_date'] ?? '') ?>">

                        </div>


                        <!-- STATUS -->
                        <div class="col-md-2">

                            <label class="form-label fw-bold">
                                Status
                            </label>

                            <select name="approval_status"
                                    class="form-select border border-dark rounded">

                                <option value="">
                                    All Status
                                </option>

                                <option value="0"
                                    <?= ($_GET['approval_status'] ?? '') === '0'
                                        ? 'selected'
                                        : '' ?>>
                                    Pending
                                </option>

                                <option value="1"
                                    <?= ($_GET['approval_status'] ?? '') === '1'
                                        ? 'selected'
                                        : '' ?>>
                                    Approved
                                </option>

                                <option value="2"
                                    <?= ($_GET['approval_status'] ?? '') === '2'
                                        ? 'selected'
                                        : '' ?>>
                                    Rejected
                                </option>

                                <option value="3"
                                    <?= ($_GET['approval_status'] ?? '') === '3'
                                        ? 'selected'
                                        : '' ?>>
                                    For Further Approval
                                </option>

                            </select>

                        </div>


                        <!-- SEARCH -->
                        <div class="col-md-3">

                            <label class="form-label fw-bold">
                                Search
                            </label>

                            <input type="text"
                                   name="search"
                                   class="form-control border border-dark rounded"
                                   placeholder="Reference / Voucher / Payer"
                                   value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">

                        </div>


                        <!-- BUTTONS -->
                        <div class="col-md-2 d-flex gap-2">

                            <button type="submit"
                                    class="btn btn-primary">

                                <i class="fa fa-search"></i>

                            </button>

                            <a href="<?= base_url('approval/payment_approval_in') ?>"
                               class="btn btn-secondary">

                                <i class="fa fa-sync-alt"></i>

                            </a>

                        </div>

                    </form>


                    <!-- PAYMENT TABLE -->
                    <div class="table-responsive">

                        <table class="table align-items-center mb-0">

                            <thead>

                                <tr>

                                    <th>Date</th>

                                    <th>Reference</th>

                                    <th>Voucher No.</th>

                                    <th>Receiver / Payer</th>

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

                                <?php if (!empty($payments)): ?>

                                    <?php foreach ($payments as $row): ?>

                                        <tr>

                                            <!-- DATE -->
                                            <td>

                                                <?= !empty($row['date'])
                                                    ? date(
                                                        'd-M-Y',
                                                        strtotime($row['date'])
                                                    )
                                                    : '-' ?>

                                            </td>


                                            <!-- REFERENCE -->
                                            <td>

                                                <strong>
                                                    <?= htmlspecialchars(
                                                        $row['reference'] ?? '-'
                                                    ) ?>
                                                </strong>

                                            </td>


                                            <!-- VOUCHER -->
                                            <td>

                                                <?= htmlspecialchars(
                                                    $row['voucher_no'] ?? '-'
                                                ) ?>

                                            </td>


                                            <!-- RECEIVER / PAYER -->
                                            <td>

                                                <?= htmlspecialchars(
                                                    $row['receiver_payer'] ?? '-'
                                                ) ?>

                                            </td>


                                            <!-- AMOUNT -->
                                            <td class="text-end">

                                                <?= number_format(
                                                    (float)($row['amount'] ?? 0),
                                                    2
                                                ) ?>

                                            </td>


                                            <!-- FROM -->
                                            <td>

                                                <?php if (
                                                    (int)($row['transfer_from'] ?? 0) === 0
                                                ): ?>

                                                    <strong>
                                                        Created
                                                    </strong>

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


                                            <!-- STATUS -->
                                            <td class="text-center">

                                                <?php

                                                $approval_status =
                                                    (int)($row['approval_status'] ?? 0);

                                                switch ($approval_status) {

                                                    case 0:

                                                        $status_text = 'Pending';
                                                        $status_class =
                                                            'bg-gradient-warning';

                                                        break;

                                                    case 1:

                                                        $status_text = 'Approved';
                                                        $status_class =
                                                            'bg-gradient-success';

                                                        break;

                                                    case 2:

                                                        $status_text = 'Rejected';
                                                        $status_class =
                                                            'bg-gradient-danger';

                                                        break;

                                                    case 3:

                                                        $status_text =
                                                            'For Further Approval';

                                                        $status_class =
                                                            'bg-gradient-secondary';

                                                        break;

                                                    default:

                                                        $status_text = 'Unknown';
                                                        $status_class =
                                                            'bg-gradient-dark';

                                                        break;
                                                }

                                                ?>

                                                <span class="badge <?= $status_class ?>">

                                                    <?= $status_text ?>

                                                </span>

                                            </td>


                                            <!-- OPERATIONS -->
                                            <td class="text-end">

                                                <div class="d-flex justify-content-end gap-1">


                                                    <!-- APPROVAL BUTTON -->
                                                    <button type="button"
                                                            class="badge bg-gradient-dark badge-sm border-0"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#paymentApprovalModal_<?= (int)$row['approval_id'] ?>">

                                                        <i class="fa fa-pencil"></i>

                                                    </button>


                                                    <!-- VIEW PAYMENT -->
                                                    <a href="<?= base_url(
                                                        'approval/view_payment?reference=' .
                                                        urlencode($row['reference'])
                                                    ) ?>"
                                                       class="badge bg-gradient-secondary badge-sm"
                                                       title="View Payment">

                                                        <i class="fa fa-eye"></i>

                                                    </a>

                                                </div>

                                            </td>

                                        </tr>

                                    <?php endforeach; ?>


                                <?php else: ?>

                                    <tr>

                                        <td colspan="8"
                                            class="text-center py-4">

                                            <span class="text-secondary">

                                                No payments found for approval.

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


    <!-- ===================================================== -->
    <!-- PAYMENT APPROVAL MODALS -->
    <!-- ===================================================== -->

    <?php if (!empty($payments)): ?>

        <?php foreach ($payments as $row): ?>

            <div class="modal fade"
                 id="paymentApprovalModal_<?= (int)$row['approval_id'] ?>"
                 tabindex="-1"
                 aria-hidden="true">

                <div class="modal-dialog modal-md modal-dialog-centered">

                    <div class="modal-content">

                        <form method="post"
                              action="<?= base_url('approval/payment_saveapproval') ?>"
                              class="approval-form">


                            <!-- HEADER -->
                            <div class="modal-header py-2">

                                <h5 class="modal-title">
                                    Payment Approval
                                </h5>

                                <button type="button"
                                        class="btn-close"
                                        data-bs-dismiss="modal">
                                </button>

                            </div>


                            <!-- BODY -->
                            <div class="modal-body">


                                <!-- APPROVAL ID -->
                                <input type="hidden"
                                       name="approval_id"
                                       id="payment_approval_id"
                                       value="<?= (int)$row['approval_id'] ?>">


                                <!-- DOCUMENT ID -->
                                <input type="hidden"
                                       name="doc_id"
                                       id="payment_doc_id"
                                       value="<?= htmlspecialchars(
                                           $row['doc_id'] ?? ''
                                       ) ?>">


                                <!-- TYPE -->
                                <input type="hidden"
                                       name="type"
                                       value="2">


                                <!-- TRANSFER FROM -->
                                <input type="hidden"
                                       name="transfer_from"
                                       id="payment_transfer_from"
                                       value="<?= (int)(
                                           $row['transfer_from'] ?? 0
                                       ) ?>">


                                <!-- TRANSFER TO -->
                                <input type="hidden"
                                       name="transfer_to"
                                       id="payment_transfer_to"
                                       value="<?= (int)(
                                           $row['transfer_to'] ?? 0
                                       ) ?>">


                                <!-- PAYMENT INFORMATION -->

                                <div class="row mb-3">


                                    <div class="col-6">

                                        <div>

                                            <span class="text-muted">
                                                Reference :
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

                                                <?= !empty($row['date'])
                                                    ? date(
                                                        'd-M-Y',
                                                        strtotime($row['date'])
                                                    )
                                                    : '-' ?>

                                            </strong>

                                        </div>


                                        <div>

                                            <span class="text-muted">
                                                Voucher :
                                            </span>

                                            <strong>

                                                <?= htmlspecialchars(
                                                    $row['voucher_no'] ?? '-'
                                                ) ?>

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
                                                        $row['amount'] ?? 0
                                                    ),
                                                    2
                                                ) ?>

                                            </strong>

                                        </div>


                                        <div>

                                            <span class="text-muted">
                                                Receiver / Payer :
                                            </span>

                                            <strong>

                                                <?= htmlspecialchars(
                                                    $row['receiver_payer'] ?? '-'
                                                ) ?>

                                            </strong>

                                        </div>

                                    </div>

                                </div>


                                <hr>


                                <!-- APPROVAL DATE -->
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

                                        <option value="0">
                                            Pending
                                        </option>

                                        <option value="1">
                                            Approved
                                        </option>

                                        <option value="2">
                                            Rejected
                                        </option>

                                        <option value="3">
                                            For Further Approval
                                        </option>

                                    </select>

                                </div>


                                <!-- FURTHER APPROVAL -->
                                <div class="further-approval-section mb-3"
                                     style="display:none;">

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

                                                    <?php foreach (
                                                        $designation as $desig
                                                    ): ?>

                                                        <option value="<?= html_escape(
                                                            $desig['id']
                                                        ) ?>">

                                                            <?= html_escape(
                                                                $desig['name']
                                                            ) ?>

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


                                <!-- DESCRIPTION -->
                                <div class="mb-3">

                                    <label class="form-label">
                                        Description
                                    </label>

                                    <textarea class="form-control"
                                              rows="2"
                                              readonly><?= htmlspecialchars(
                                                  $row['description'] ?? ''
                                              ) ?></textarea>

                                </div>


                                <!-- REMARK -->
                                <div class="mb-3">

                                    <label class="form-label">
                                        Remarks
                                    </label>

                                    <textarea name="remarks"
                                              class="form-control"
                                              rows="3"><?= htmlspecialchars(
                                                  $row['approval_remark']
                                                      ?? $row['remark']
                                                      ?? ''
                                              ) ?></textarea>

                                </div>

                            </div>


                            <!-- FOOTER -->
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

</div>


<script>
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

    /*
     * Show / hide further approval
     */
    $(document).on(
        'change',
        '.approval-status',
        function() {

            const section = $(this)
                .closest('.modal')
                .find('.further-approval-section');

            if ($(this).val() === '3') {

                section.show();

            } else {

                section.hide();

                section.find(
                    'select[name="designation_id"]'
                ).val('');

                section.find(
                    'select[name="employee_id"]'
                )
                .html(
                    '<option value="">Select Employee</option>'
                )
                .prop('disabled', true);

            }

        }
    );


    /*
     * Get employees by designation
     */
    $(document).on(
        'change',
        '.approval-designation',
        function() {

            const designationId = $(this).val();

            const modal = $(this).closest('.modal');

            const employeeSelect =
                modal.find('.approval-employee');


            if (!designationId) {

                employeeSelect
                    .html(
                        '<option value="">Select Employee</option>'
                    )
                    .prop('disabled', true);

                return;

            }


            employeeSelect
                .html(
                    '<option value="">Loading...</option>'
                )
                .prop('disabled', true);


            $.ajax({

                url: "<?= base_url(
                    'approval/getemployeesbydesignation'
                ) ?>",

                type: "GET",

                data: {
                    designation_id: designationId
                },

                dataType: "json",

                success: function(response) {

                    console.log(
                        'Employee API Response:',
                        response
                    );


                    employeeSelect.empty();


                    employeeSelect.append(
                        '<option value="">Select Employee</option>'
                    );


                    if (
                        response.status === true &&
                        response.data &&
                        Array.isArray(
                            response.data.employees
                        )
                    ) {

                        $.each(
                            response.data.employees,
                            function(index, employee) {

                                employeeSelect.append(
                                    $('<option>', {
                                        value: employee.id,
                                        text: employee.name
                                    })
                                );

                            }
                        );


                        employeeSelect.prop(
                            'disabled',
                            false
                        );

                    } else {

                        employeeSelect.append(
                            '<option value="">No employees found</option>'
                        );

                    }

                },

                error: function(xhr) {

                    console.log(
                        'Employee AJAX ERROR:',
                        xhr.responseText
                    );

                    employeeSelect
                        .html(
                            '<option value="">Error loading employees</option>'
                        )
                        .prop('disabled', true);

                }

            });

        }
    );


    /*
     * Form validation
     */
   $(document).on(
    'submit',
    '.approval-form',
    function(e) {

        e.preventDefault();

        const form = $(this);

        const status = form
            .find('select[name="status"]')
            .val();

        /*
         * Validate status
         */
        if (status === '') {

            showFlashMessage(
                'error',
                'Please select an approval status.'
            );

            return false;
        }


        /*
         * Validate further approval
         */
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

                return false;
            }


            if (!employee) {

                showFlashMessage(
                    'error',
                    'Please select an employee for further approval.'
                );

                return false;
            }
        }


        /*
         * AJAX SUBMIT
         */
        $.ajax({

            url: form.attr('action'),

            type: 'POST',

            data: form.serialize(),

            dataType: 'json',

            beforeSend: function() {

                form.find('button[type="submit"]')
                    .prop('disabled', true)
                    .text('PROCESSING...');
            },

            success: function(response) {

                console.log(
                    'Payment Approval Response:',
                    response
                );


                if (response.status === true) {

                    showFlashMessage(
                        'success',
                        response.message ||
                        'Payment approved successfully.'
                    );


                    /*
                     * Close current modal
                     */
                    const modalElement =
                        form.closest('.modal')[0];

                    const modal =
                        bootstrap.Modal.getInstance(
                            modalElement
                        );

                    if (modal) {
                        modal.hide();
                    }


                    /*
                     * Reload after success
                     */
                    setTimeout(function() {

                        location.reload();

                    }, 800);


                } else {

                    showFlashMessage(
                        'error',
                        response.message ||
                        'Payment approval failed.'
                    );


                    form.find('button[type="submit"]')
                        .prop('disabled', false)
                        .text('CONFIRM');
                }

            },

            error: function(xhr) {

                console.log(
                    'Payment Approval AJAX ERROR:',
                    xhr.responseText
                );


                showFlashMessage(
                    'error',
                    'Payment approval failed. Check console for details.'
                );


                form.find('button[type="submit"]')
                    .prop('disabled', false)
                    .text('CONFIRM');
            }

        });

        return false;
    }
);

</script>
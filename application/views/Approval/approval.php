<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/favicon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <title>
        EthicFin
    </title>



    <link rel="canonical" href="" />

    <meta name="keywords" content="">
    <meta name="description" content="">

    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@">
    <meta name="twitter:title" content="">
    <meta name="twitter:description" content="">
    <meta name="twitter:creator" content="@">
    <meta name="twitter:image" content="">

    <meta property="fb:app_id" content="">
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <meta property="og:description" content="" />
    <meta property="og:site_name" content="" />

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

    <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="assets/css/nucleo-svg.css" rel="stylesheet" />

    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="assets/css/nucleo-svg.css" rel="stylesheet" />


    <link id="pagestyle" href="assets/css/argon-dashboard.min.css?v=2.0.4" rel="stylesheet" />
    <link id="pagestyle" href="assets/css/newst.css" rel="stylesheet" />



</head>

<body class="bg-gray-100">



    <div class="container-fluid py-4 min-h70vh">
        <div class="row">
            <div class="col-xl-6 app-search">

            </div>
            <div class="col-xl-6 app-search">

            </div>
            <div class="col-xl-12 col-xxl-12 col-lg-12 col-md-12 my_tabll">
                <div class="card mb-3 my_form">
                    <div class="card-header d-flex align-items-center border-0 br">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title mb-0">Student Details</h4>
                        </div>
                        <div class="text-end ms-auto d-flex">
                            <div class="card mb-3 my_form m-2">


                                <button type="button"
                                    class="btn btn-pink btn-xs"
                                    data-bs-toggle="modal"
                                    data-bs-target="#exampleModal42"
                                    data-id="25"
                                    data-po="PO001027"
                                    data-amount="23">

                                    Add Approval

                                </button>
                            </div>
                        </div>
                        <a href="<?= base_url('createstudent'); ?>" class="btn btn-pink btn-xs sharp mb-0">Enter
                            Student
                            Details</a>
                    </div>
                </div>

                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-responsive-md mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th><strong>#</strong></th>
                                    <th><strong>FIRST NAME</strong></th>
                                    <th><strong>ADMISSION NO</strong></th>
                                    <th><strong>DATE OF BIRTH</strong></th>
                                    <th><strong>GUARDIAN</strong></th>
                                    <th><strong>FEE AMOUNT</strong></th>
                                    <th class="text-right"><strong>ACTIONS</strong></th>
                                </tr>
                            </thead>

                        </table>
                    </div>
                </div>

            </div>
            <!-- <nav aria-label="...">
                    <ul class="pagination">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1"><i class="fa fa-arrow-circle-left"></i> </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item active">
                            <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#"><i class="fa fa-arrow-circle-right"></i></a>
                        </li>
                    </ul>
                </nav> -->

        </div>
    </div>





    </div>






    <!-- APPROVAL MODAL -->
    <div class="modal fade"
        id="exampleModal42"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true">

        <div class="modal-dialog modal-md modal-dialog-centered">

            <div class="modal-content">
                <form method="post"
                    action="<?= base_url('approval/saveapproval') ?>"
                    id="approvalForm"
                    onsubmit="return debugApprovalForm();">>
                    <!-- HEADER -->
                    <div class="modal-header py-2">

                        <h5 class="modal-title" id="exampleModalLabel">
                            Change Status
                        </h5>

                        <button type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close">
                        </button>

                    </div>


                    <!-- BODY -->
                    <div class="modal-body py-2">

                        <input type="hidden"
                            id="approval_doc_id"
                            name="doc_id">


                        <!-- PO INFORMATION -->
                        <div class="row mb-2">

                            <div class="col-6">

                                <div class="mb-1">
                                    <span class="text-muted">No :</span>
                                    <strong id="approval_po_no">
                                        PO001027
                                    </strong>
                                </div>

                                <div>
                                    <span class="text-muted">Date :</span>
                                    <strong id="approval_po_date">
                                        16-Jul-2026
                                    </strong>
                                </div>

                            </div>


                            <div class="col-6">

                                <div class="mb-1">
                                    <span class="text-muted">Amount :</span>
                                    <strong id="approval_amount">
                                        23
                                    </strong>
                                </div>

                                <div>
                                    <span class="text-muted">Name :</span>
                                    <strong id="approval_name">
                                        haya
                                    </strong>
                                </div>

                            </div>

                        </div>


                        <hr class="my-2">


                        <!-- DATE -->
                        <div class="mb-2">

                            <label for="approval_date"
                                class="form-label mb-1">
                                Date
                            </label>

                            <input type="date"
                                class="form-control"
                                id="approval_date"
                                name="approval_date">

                        </div>


                        <!-- STATUS -->
                        <div class="mb-2">

                            <label for="approval_status"
                                class="form-label mb-1">
                                Select Status
                            </label>

                            <select class="form-select"
                                id="approval_status"
                                name="status" required>

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
                        <div id="furtherApprovalSection"
                            style="display:none;">

                            <div class="row">

                                <!-- DESIGNATION -->
                                <div class="col-6">

                                    <div class="mb-2">

                                        <label for="approval_designation_id"
                                            class="form-label mb-1">
                                            Designation
                                        </label>

                                        <select class="form-select"
                                            id="approval_designation_id"
                                            name="designation_id">

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

                                </div>


                                <!-- EMPLOYEE -->
                                <div class="col-6">

                                    <div class="mb-2">

                                        <label for="approval_employee_id"
                                            class="form-label mb-1">
                                            Employee / Name
                                        </label>

                                        <select class="form-select"
                                            id="approval_employee_id"
                                            name="employee_id"
                                            disabled>

                                            <option value="">
                                                Select Employee
                                            </option>

                                        </select>

                                    </div>

                                </div>

                            </div>

                        </div>


                        <!-- REMARKS -->
                        <div class="mb-1">

                            <label for="approval_remarks"
                                class="form-label mb-1">
                                Remarks
                            </label>

                            <textarea class="form-control"
                                id="approval_remarks"
                                name="remarks"
                                rows="3"
                                placeholder="Enter remarks"></textarea>

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
                            class="btn btn-primary btn-sm"
                            id="saveApproval">
                            CONFIRM
                        </button>

                    </div>
                </form>
            </div>

        </div>

    </div>
    <script src="assets/js/jquery.min.js"></script>

    <script src="assets/js/js.cookie.js"></script>


    <script src="assets/js/perfect-scrollbar.min.js"></script>
    <script src="assets/js/smooth-scrollbar.min.js"></script>

    <script src="assets/js/chartjs.min.js"></script>



    <script src="assets/js/argon.min.js?v=1.2.1"></script>

    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <script>
        function debugApprovalForm() {

            console.log('========== APPROVAL FORM SUBMIT ==========');

            console.log('doc_id:',
                document.getElementById('approval_doc_id').value
            );

            console.log('status:',
                document.getElementById('approval_status').value
            );

            console.log('designation:',
                document.getElementById('approval_designation_id').value
            );

            console.log('employee:',
                document.getElementById('approval_employee_id').value
            );

            console.log('remarks:',
                document.getElementById('approval_remarks').value
            );

            console.log('date:',
                document.getElementById('approval_date').value
            );

            console.log('==========================================');

            return true;
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const statusSelect = document.getElementById('approval_status');

            const furtherApprovalSection =
                document.getElementById('furtherApprovalSection');

            const designationSelect =
                document.getElementById('approval_designation_id');

            const employeeSelect =
                document.getElementById('approval_employee_id');


            /*
             * STATUS CHANGE
             */
            statusSelect.addEventListener('change', function() {

                const status = this.value;


                if (status === '3') {
                    furtherApprovalSection.style.display = 'block';
                } else {
                    furtherApprovalSection.style.display = 'none';

                    designationSelect.value = '';
                    employeeSelect.value = '';

                    employeeSelect.disabled = true;

                    employeeSelect.innerHTML =
                        '<option value="">Select Employee</option>';
                }

            });


            /*
             * DESIGNATION CHANGE
             */
            designationSelect.addEventListener('change', function() {

                const designationId = this.value;


                // No designation selected
                if (!designationId) {

                    employeeSelect.disabled = true;

                    employeeSelect.innerHTML =
                        '<option value="">Select Employee</option>';

                    return;
                }


                // Enable employee
                employeeSelect.disabled = false;


                /*
                 * LOAD EMPLOYEES
                 *
                 * Replace this URL with your existing API URL.
                 */
                fetch(
                        '<?= base_url("approval/getemployeesbydesignation") ?>?designation_id=' +
                        encodeURIComponent(designationId)
                    )

                    .then(response => response.json())

                    .then(data => {

                        employeeSelect.innerHTML =
                            '<option value="">Select Employee</option>';


                        /*
                         * Adjust this depending on your API response.
                         */
                        if (data.status && data.data) {

                            data.data.employees.forEach(function(employee) {

                                const option =
                                    document.createElement('option');

                                option.value = employee.id;

                                option.textContent =
                                    employee.name;

                                employeeSelect.appendChild(option);

                            });

                        }

                    })

                    .catch(function(error) {

                        console.error(
                            'Employee loading error:',
                            error
                        );

                    });

            });

        });
        document.addEventListener('DOMContentLoaded', function() {

            const approvalModal =
                document.getElementById('exampleModal42');

            approvalModal.addEventListener(
                'show.bs.modal',
                function(event) {

                    const button = event.relatedTarget;

                    const poId =
                        button.getAttribute('data-id');

                    const poNo =
                        button.getAttribute('data-po');

                    const amount =
                        button.getAttribute('data-amount');


                    document.getElementById(
                        'approval_doc_id'
                    ).value = poId;


                    document.getElementById(
                        'approval_po_no'
                    ).textContent = poNo;


                    document.getElementById(
                        'approval_amount'
                    ).textContent = amount;

                }
            );

        });
    </script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <script src="assets/js/argon-dashboard.min.js?v=2.0.4"></script>

</body>

</html>
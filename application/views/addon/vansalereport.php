<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
  .van-table {
    font-size: 12px;
    line-height: 1.2;
    table-layout: fixed;
    width: 100%;
  }

  .van-table th,
  .van-table td {
    text-align: center;
    word-wrap: break-word;
    padding: 4px;
  }

  .van-table th {
    white-space: normal;
  }

  .view-icon i {
    cursor: pointer;
    color: #007bff;
  }
</style>

<div class="container-fluid py-4">
  <div class="row">

    <div class="container-fluid py-4">

      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <div class="containers">
                  <div class="item">
                    <div>
                      <h6 class="text-white text-capitalize ps-3">Van sales report</h6>
                    </div>
                  </div>
                  <div class="divider"></div>
                  <div class="item">
                  </div>
                </div>
              </div>

              <form method="get" action="<?= base_url('home/vansalereport') ?>">
                <div class="row">
                  <!-- Branch Selector (Static Options: Branch 1 to Branch 5) -->
                  <div class="col-2 col-sm-1">
                    <div class="input-group input-group-outline my-2 mt-3">
                      <select class="form-control" name="branch">
                        <option value="">--Select Branch--</option>
                        <?php if (!empty($branch)): ?>
                          <?php foreach ($branch as $b): ?>
                            <option value="<?= $b['id']; ?>" <?= (isset($_GET['branch']) && $_GET['branch'] == $b['id']) ? 'selected' : '' ?>>
                              <?= htmlspecialchars($b['name']); ?>
                            </option>
                          <?php endforeach; ?>
                        <?php endif; ?>
                      </select>
                    </div>
                  </div>

                  <!-- Van Selector (Static Options: Van 1 to Van 5) -->
                  <div class="col-2 col-sm-1">
                    <div class="input-group input-group-outline my-2 mt-3">
                      <select class="form-control" name="van">
                        <option value="">--Select Van--</option>
                        <?php if (!empty($van)): ?>
                          <?php foreach ($van as $v): ?>
                            <option value="<?= $v['id']; ?>" <?= (isset($_GET['van']) && $_GET['van'] == $v['id']) ? 'selected' : '' ?>>
                              <?= htmlspecialchars($v['name']); ?>
                            </option>
                          <?php endforeach; ?>
                        <?php endif; ?>
                      </select>
                    </div>
                  </div>

                  <!-- Sales Man Selector (Static Options: Van 1 to Van 5) -->
                  <div class="col-2 col-sm-2">
                    <div class="input-group input-group-outline my-2 mt-3">
                      <select class="form-control" name="salesman">
                        <option value="">--Select Sales Man--</option>
                        <?php if (!empty($salesman)): ?>
                          <?php foreach ($salesman as $s): ?>
                            <option value="<?= $s['id']; ?>" <?= (isset($_GET['salesman']) && $_GET['salesman'] == $s['id']) ? 'selected' : '' ?>>
                              <?= htmlspecialchars($s['name']); ?>
                            </option>
                          <?php endforeach; ?>
                        <?php endif; ?>
                      </select>
                    </div>
                  </div>

                  <!-- From Date -->
                  <div class="col-2 col-sm-2 my-2 mt-3">
                    <div class="input-group input-group-outline" style="display: flex; align-items: center;">
                      <span style="margin-right: 8px; white-space: nowrap;">From</span>
                      <input type="date" class="form-control" name="from_date"
                        value="<?= isset($_GET['from_date']) ? $_GET['from_date'] : '' ?>"
                        placeholder="From Date" style="flex: 1;">
                    </div>
                  </div>

                  <!-- To Date -->
                  <div class="col-2 col-sm-2 my-2 mt-3">
                    <div class="input-group input-group-outline" style="display: flex; align-items: center;">
                      <span style="margin-right: 8px; white-space: nowrap;">To</span>
                      <input type="date" class="form-control" name="to_date"
                        value="<?= isset($_GET['to_date']) ? $_GET['to_date'] : '' ?>"
                        placeholder="To Date" style="flex: 1;">
                    </div>
                  </div>

                  <div class="col-2 col-sm-2">
                    <div class="input-group input-group-outline  my-2 mt-3">
                      <input input class="form-control" name="search" value="" placeholder="Search" type="search">
                    </div>
                  </div>

                  <div class="col-1 col-sm-2 my-2 mt-3">
                    <button class="btn bg-gradient-primary btn-sm ms-auto mb-0" title="filter"><i class="fas fa-search" aria-hidden="true"></i></button>
                    <!-- Reset Button -->
                    <a href="<?= base_url('home/vansalereport'); ?>" class="btn bg-gradient-secondary btn-sm mb-0" title="Reset">
                      <i class="fas fa-undo"></i>
                    </a>
                  </div>

                </div>
                <div class="card-body px-0 pb-2">
                  <div class="table-responsive p-0">
                    <div class="table-responsive" style="overflow-x: auto; font-size: 14px;">
                      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

                      <table class="table table-bordered table-striped table-hover" style="width: 100%; font-size: 13px; line-height: 1.5; text-align: center; border-collapse: collapse;">
                        <thead style="background-color: #f8f9fa; font-weight: bold;">
                          <tr>
                            <th>Date</th>
                            <th>Van</th>
                            <th>Loaded <br>Stock</th>
                            <th>Cash<br>Sale</th>
                            <th>Credit<br>Sale</th>
                            <th>Return <br>Amount</th>
                            <th>Bank<br>Collection</th>
                            <th>Van<br>Expense</th>
                            <th>Cash in<br>Hand</th>
                            <th>Balance<br>Stock</th>
                            <th>Operation</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php if (!empty($vansales)) : ?>
                            <?php foreach ($vansales as $row) : ?>
                              <tr>
                                <td><?= date('d-M-Y', strtotime($row['date'])) ?></td>
                                <td><?= htmlspecialchars($row['warehouse_name']) ?></td>
                                <td><?= number_format($row['loaded_stock'], 2) ?></td>
                                <td><?= number_format($row['cash_sale'] ?? 0, 2) ?></td>
                                <td><?= number_format($row['credit_sale'] ?? 0, 2) ?></td>
                                <td><?= number_format($row['return_amount'] ?? 0, 2) ?></td>
                                <td><?= number_format($row['bank_collection'] ?? 0, 2) ?></td>
                                <td><?= number_format($row['van_expense'] ?? 0, 2) ?></td>
                                <td><?= number_format($row['cash_in_hand'] ?? 0, 2) ?></td>
                                <td><?= number_format($row['balance_stock'], 2) ?></td>
                                <td>
                                  <a href="<?= base_url('home/viewvan/' . $row['warehouse_id']) ?>" title="View" style="color: green;">
                                    <i class="fas fa-eye"></i>
                                  </a>
                                </td>
                              </tr>
                            <?php endforeach; ?>
                          <?php else : ?>
                            <tr>
                              <td colspan="12" class="text-center text-muted">No records found</td>
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

      </div>

    </div>

    <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
		<script src="assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script> -->
    </body>

    <script>
      $(document).ready(function() {
        $('#monthDropdown').select2({
          placeholder: '-- Month --',
          allowClear: true
        });

        $('#yearDropdown').select2({
          placeholder: '-- Year --',
          allowClear: true
        });

      });
    </script>





    <script>
      document.addEventListener("DOMContentLoaded", function() {
        // Set default month and year in dropdowns
        var monthDropdown = document.getElementById("monthDropdown");
        var currentDate = new Date();
        var currentMonth = currentDate.getMonth() + 1;
        var currentYear = currentDate.getFullYear();

        if (!monthDropdown.value) {
          monthDropdown.value = currentMonth;
        }

        // Set period fields for each row based on default/current month
        var startDate = new Date(currentYear, currentMonth - 1, 1);
        var endDate = new Date(currentYear, currentMonth, 0);

        var options = {
          day: 'numeric',
          month: 'short',
          year: 'numeric'
        };
        var startFormatted = startDate.toLocaleDateString('en-GB', options);
        var endFormatted = endDate.toLocaleDateString('en-GB', options);

        $('tbody tr').each(function(index) {
          $(this).find('#periodFrom' + (index + 1)).val(startFormatted);
          $(this).find('#periodTo' + (index + 1)).val(endFormatted);
        });
      });

      $(document).ready(function() {
        // Update period fields when month or year dropdown changes
        $('#monthDropdown, #yearDropdown').change(function() {
          var month = $('#monthDropdown').val();
          var year = $('#yearDropdown').val() || new Date().getFullYear();

          if (month && year) {
            var startDate = new Date(year, month - 1, 1);
            var endDate = new Date(year, month, 0);
            var options = {
              day: 'numeric',
              month: 'short',
              year: 'numeric'
            };
            var startFormatted = startDate.toLocaleDateString('en-GB', options);
            var endFormatted = endDate.toLocaleDateString('en-GB', options);

            // Update period fields in each row based on selected month and year
            $('tbody tr').each(function(index) {
              $(this).find('#periodFrom' + (index + 1)).val(startFormatted);
              $(this).find('#periodTo' + (index + 1)).val(endFormatted);
            });
          }
        });

        // Handle timesheet data submission
        $('#timesheetUpdate').on('click', function(event) {
          event.preventDefault();

          var timesheetData = [];

          // Collect data from each row in the table
          $('tbody tr').each(function(index) {
            var rowId = $(this).attr('id');
            if (rowId) {
              var rowIndex = rowId.replace('row', '');

              var employeeId = $('#emp_id' + rowIndex + ' input').val();
              var absentDays = $('#absent_days' + rowIndex).val();
              var workHrs = $('#work_hrs' + rowIndex).val();
              var otHrs = $('#ot_hrs' + rowIndex).val();
              var otMinutes = $('#ot_minutes' + rowIndex).val(); // Added minutes field

              var selectedMonth = $('#monthDropdown').val();
              var selectedYear = $('#yearDropdown').val();

              if (selectedMonth && selectedYear) {
                // Calculate period range for the selected month and year
                var periodFrom = `${selectedYear}-${String(selectedMonth).padStart(2, '0')}-01`;
                var lastDayOfMonth = new Date(selectedYear, selectedMonth, 0).getDate();
                var periodTo = `${selectedYear}-${String(selectedMonth).padStart(2, '0')}-${lastDayOfMonth}`;

                // Append row data
                timesheetData.push({
                  employeeId: employeeId,
                  periodFrom: periodFrom,
                  periodTo: periodTo,
                  absentDays: absentDays,
                  workHrs: workHrs,
                  otHrs: otHrs,
                  otMinutes: otMinutes
                });
              } else {
                console.error("Error: Month or year is not selected for timesheet data.");
              }
            }
          });

          // Submit data if available
          if (timesheetData.length > 0) {
            $.ajax({
              url: '<?= base_url() ?>hr/update_emp_timesheet',
              type: 'POST',
              data: {
                timesheetData: timesheetData
              },
              success: function(response) {
                $('#updateMessage').css({
                  "display": "block",
                  "background-color": "#d4edda",
                  "color": "#155724",
                  "padding": "10px",
                  "border": "1px solid #c3e6cb",
                  "border-radius": "5px",
                  "font-weight": "bold",
                  "text-align": "center"
                }).text("Timesheet data saved successfully!");

                $('html, body').animate({
                  scrollTop: $('#updateMessage').offset().top - 20
                }, 800);

                $('#updateMessage').fadeOut(3000);
              },
              error: function(error) {
                console.error("Error saving timesheet data:", error);
              }
            });
          } else {
            console.error("No timesheet data to submit.");
          }
        });

      });
    </script>
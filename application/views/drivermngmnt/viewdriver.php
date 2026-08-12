 <style>
     /* Ensure the table looks good when printing */
     @media print {

         .btn {
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

 <div class="container-fluid py-4">
     <div class="row">
         <div class="col-12">
             <div class="card my-4">
                 <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                     <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between align-items-center">
                         <h6 class="text-white text-capitalize ps-3"><?= isset($pagetitle) ? $pagetitle : 'Driver-wise Delivery Note Details'; ?></h6>
                         <div class="pe-3">
                             <a href="<?= base_url('deliverynote/dvrdnreport'); ?>" class="btn btn-sm btn-outline-white mb-0">
                                 <i class="fas fa-file-alt"></i>
                             </a>
                         </div>
                     </div>
                 </div>

                 <div class="card-body px-0 pb-2">
                     <div class="px-4">
                         <form method="get" action="<?= base_url('deliverynote/viewdriver') ?>">
                             <div class="row align-items-end mb-4">
                                 <div class="col-md-3">
                                     <div class="input-group input-group-static mb-0">
                                         <label>Date From</label>
                                         <input type="date" name="from_date" class="form-control"
                                             value="<?= isset($from_date) ? $from_date : date('Y-m-d', strtotime('-1 month')); ?>">
                                     </div>
                                 </div>

                                 <div class="col-md-3">
                                     <div class="input-group input-group-static mb-0">
                                         <label>Date To</label>
                                         <input type="date" name="to_date" class="form-control"
                                             value="<?= isset($to_date) ? $to_date : date('Y-m-d'); ?>">
                                     </div>
                                 </div>

                                 <div class="col-md-1">
                                     <button type="submit" class="btn btn-primary btn-icon mb-0" style="height: 40px;">
                                         <i class="fas fa-search"></i>
                                     </button>
                                 </div>
                             </div>
                         </form>

                         <div class="table-responsive p-0">
                             <table class="table table-bordered align-items-center mb-0">
                                 <thead>
                                     <tr>
                                         <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center" style="width: 5%">Sl.No</th>
                                         <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Delivery Note Number</th>
                                         <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Delivery Status</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php if (!empty($details) && isset($details[0]['inv_no']) && $details[0]['inv_no'] !== ''): ?>
                                         <?php
                                            $i = 1;
                                            $deliveryStatusMap = [
                                                0 => ['label' => 'Draft', 'class' => 'bg-gradient-secondary'],
                                                1 => ['label' => 'Approved', 'class' => 'bg-gradient-info'],
                                                2 => ['label' => 'Dispatched', 'class' => 'bg-gradient-warning'],
                                                3 => ['label' => 'Partially Delivered', 'class' => 'bg-gradient-primary'],
                                                4 => ['label' => 'Delivered', 'class' => 'bg-gradient-success'],
                                                5 => ['label' => 'Returned', 'class' => 'bg-gradient-danger'],
                                                6 => ['label' => 'Cancelled', 'class' => 'bg-gradient-dark'],
                                                7 => ['label' => 'Closed', 'class' => 'bg-gradient-secondary']
                                            ];
                                            ?>
                                         <?php foreach ($details as $row): ?>
                                             <tr>
                                                 <td class="align-middle text-center">
                                                     <span class="text-secondary text-xs font-weight-bold"><?= $i++; ?></span>
                                                 </td>
                                                 <td class="align-middle">
                                                     <p class="text-xs font-weight-bold mb-0"><?= $row['inv_no']; ?></p>
                                                 </td>
                                                 <td class="align-middle text-center text-sm">
                                                     <?php if (isset($deliveryStatusMap[$row['delivery_status']])): ?>
                                                         <span class="badge badge-sm <?= $deliveryStatusMap[$row['delivery_status']]['class'] ?>">
                                                             <?= $deliveryStatusMap[$row['delivery_status']]['label'] ?>
                                                         </span>
                                                     <?php else: ?>
                                                         <span class="badge badge-sm bg-gradient-light text-dark">Unknown</span>
                                                     <?php endif; ?>
                                                 </td>
                                             </tr>
                                         <?php endforeach; ?>
                                     <?php else: ?>
                                         <tr>
                                             <td colspan="3" class="text-center py-4">
                                                 <p class="text-xs text-secondary mb-0">No data found for the selected range</p>
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
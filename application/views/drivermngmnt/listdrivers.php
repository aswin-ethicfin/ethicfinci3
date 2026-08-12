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
                         <h6 class="text-white text-capitalize ps-3"><?= isset($pagetitle) ? $pagetitle : 'Driver List'; ?></h6>
                         <div class="pe-3">
                             <a href="<?= base_url('deliverynote/dvrdnreport'); ?>" class="btn btn-sm btn-outline-white mb-0">
                                 <i class="fas fa-file-alt"></i>
                             </a>
                             <a href="javascript:void(0)" class="btn btn-sm btn-outline-white mb-0" data-bs-toggle="modal" data-bs-target="#addDriverModal">
                                 <i class="fas fa-plus"></i>
                             </a>

                         </div>
                     </div>
                 </div>

                 <div class="card-body px-0 pb-2">
                     <div class="px-4">
                         <?php if ($this->session->flashdata('success')): ?>
                             <div class="alert alert-success alert-dismissible fade show text-white" role="alert">
                                 <span class="text-sm"><?= $this->session->flashdata('success'); ?></span>
                                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                             </div>
                         <?php endif; ?>
                     </div>

                     <div class="table-responsive p-0">
                         <table class="table table-bordered align-items-center mb-0">
                             <thead>
                                 <tr>
                                     <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Sl.No</th>
                                     <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Driver Name</th>
                                     <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php if (!empty($drivers)): ?>
                                     <?php
                                        $sl = $start + 1; // Calculate SL No based on current start offset
                                        foreach ($drivers as $driver):
                                        ?>
                                         <tr>
                                             <td class="align-middle text-center text-sm">
                                                 <p class="text-xs font-weight-bold mb-0"><?= $sl++; ?></p>
                                             </td>
                                             <td class="align-middle">
                                                 <span class="text-secondary text-xs font-weight-bold"><?= $driver['name']; ?></span>
                                             </td>
                                             <td class="align-middle text-center">
                                                 <a href="<?= base_url('deliverynote/dvrdnreportdetails?driver=' . $driver['id']); ?>" class="btn btn-link text-info px-3 mb-0"><i class="fa fa-eye"></i></a>
                                                 <a href="<?= base_url('deliverynote/editdriver?id=' . $driver['id']); ?>" class="btn btn-link text-dark px-3 mb-0"><i class="fas fa-pencil-alt"></i></a>
                                                 <a href="javascript:void(0);" class="btn btn-link text-danger px-3 mb-0" onclick="confirmDelete('<?= $driver['id']; ?>')"><i class="far fa-trash-alt"></i></a>
                                             </td>
                                         </tr>
                                     <?php endforeach; ?>
                                 <?php else: ?>
                                     <tr>
                                         <td colspan="3" class="text-center py-4">No drivers found</td>
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
 <!-- Create Driver Modal -->
 <div class="modal fade" id="addDriverModal" tabindex="-1" aria-labelledby="addDriverModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">

             <form method="post" action="<?= base_url('deliverynote/savedriver'); ?>">
                 <div class="modal-header">
                     <h5 class="modal-title" id="addDriverModalLabel">Add Driver</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>

                 <div class="modal-body">
                     <div class="mb-3">
                         <label for="driver_name" class="form-label">Driver Name</label>
                         <input type="text" name="driver_name" id="driver_name" class="form-control" placeholder="Enter driver name" required>
                     </div>
                 </div>

                 <div class="modal-footer">
                     <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
                     <button type="submit" class="btn btn-sm btn-primary">Save Driver</button>
                 </div>
             </form>

         </div>
     </div>
 </div>

 <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1080">
     <div id="statusToast" class="toast align-items-center text-white border-0 shadow-lg" role="alert" aria-live="assertive" aria-atomic="true">
         <div class="d-flex">
             <div class="toast-body" id="toastMessage" style="font-weight: 600;">
             </div>
             <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
         </div>
     </div>
 </div>
 <script>
     // function confirmDelete(id) {
     //     if (!id) return;

     //     if (confirm("Are you sure you want to delete this driver?")) {
     //         $.ajax({
     //             url: "<?= base_url('deliverynote/deletedriver'); ?>",
     //             type: "POST",
     //             data: {
     //                 id: id
     //             },
     //             dataType: "json",
     //             success: function(res) {
     //                 if (res.status) {
     //                     alert("Driver deleted successfully!");
     //                     location.reload(); // or redirect
     //                 } else {
     //                     alert(res.message || "Failed to delete.");
     //                 }
     //             }
     //         });
     //     }
     // }

     // $(document).ready(function() {
     //     /** * 1. Check for CI3 Flashdata (For Add & Edit redirects)
     //      */
     //     <?php if ($this->session->flashdata('success')): ?>
     //         showToast("<?= $this->session->flashdata('success'); ?>", "success");
     //     <?php elseif ($this->session->flashdata('error')): ?>
     //         showToast("<?= $this->session->flashdata('error'); ?>", "error");
     //     <?php endif; ?>
     // });

     /**
      * 2. The Toast Engine
      */
     function showToast(message, type = 'success') {
         const toastEl = document.getElementById('statusToast');
         const toastMsg = document.getElementById('toastMessage');

         toastMsg.innerText = message;

         // Reset colors
         toastEl.classList.remove('bg-success', 'bg-danger');

         // Apply color based on type
         if (type === 'error' || type === 'danger') {
             toastEl.classList.add('bg-danger');
         } else {
             toastEl.classList.add('bg-success');
         }

         const toast = new bootstrap.Toast(toastEl, {
             autohide: true,
             delay: 3000 // Disappears automatically after 3 seconds
         });
         toast.show();
     }

     /**
      * 3. AJAX Delete Update
      */
     function confirmDelete(id) {
         if (!id) return;

         if (confirm("Are you sure you want to delete this driver?")) {
             $.ajax({
                 url: "<?= base_url('deliverynote/deletedriver'); ?>",
                 type: "POST",
                 data: {
                     id: id
                 },
                 dataType: "json",
                 success: function(res) {
                     if (res.status) {
                         showToast("Driver deleted successfully ✔");
                         // Delay reload so the user can see the toast at the top
                         setTimeout(() => {
                             location.reload();
                         }, 1500);
                     } else {
                         showToast(res.message || "Failed to delete ❌", "error");
                     }
                 }
             });
         }
     }
 </script>
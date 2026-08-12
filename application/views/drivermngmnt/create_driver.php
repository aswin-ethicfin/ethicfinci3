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
                        <h6 class="text-white text-capitalize ps-3"><?= isset($pagetitle) ? $pagetitle : 'Create Driver'; ?></h6>
                        <div class="pe-3">
                            <a href="<?= base_url('deliverynote/listdrivers'); ?>" class="btn btn-sm btn-outline-white mb-0">
                                <i class="fas fa-th-list"></i>
                            </a>

                        </div>
                    </div>
                </div>

                <div class="card-body px-4 pb-2">
                    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1080">
                        <div id="statusToast" class="toast align-items-center text-white border-0 shadow-lg" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="d-flex">
                                <div class="toast-body" id="toastMessage" style="font-weight: 600;"></div>
                                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                        </div>
                    </div>

                    <form method="post" action="<?= base_url('deliverynote/savedriver'); ?>">
                        <div class="row mt-4">
                            <div class="col-md-4">
                                <div class="input-group input-group-static mb-4">
                                    <label>Driver Name <span class="text-danger">*</span></label>
                                    <input type="text" name="driver_name" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn bg-gradient-primary">Save Driver</button>
                                <a href="<?= base_url('deliverynote/listdrivers'); ?>" class="btn btn-outline-secondary">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Trigger Toast if CI3 Flashdata exists
        <?php if ($this->session->flashdata('success')): ?>
            showToast("<?= $this->session->flashdata('success'); ?>", "success");
        <?php endif; ?>

        <?php if ($this->session->flashdata('error')): ?>
            showToast("<?= $this->session->flashdata('error'); ?>", "error");
        <?php endif; ?>
    });

    function showToast(message, type = 'success') {
        const toastEl = document.getElementById('statusToast');
        const toastMsg = document.getElementById('toastMessage');

        toastMsg.innerText = message;
        toastEl.classList.remove('bg-success', 'bg-danger');
        toastEl.classList.add(type === 'error' ? 'bg-danger' : 'bg-success');

        const toast = new bootstrap.Toast(toastEl, {
            delay: 3000
        });
        toast.show();
    }
</script>
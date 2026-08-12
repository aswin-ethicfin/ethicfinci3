<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3"><?= isset($pagetitle) ? $pagetitle : 'Edit Driver'; ?></h6>
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

                    <form method="post" action="<?= base_url('deliverynote/updatedriver'); ?>" enctype="multipart/form-data">
                        <input type="hidden" name="driver_id" value="<?= isset($driver['id']) ? $driver['id'] : ''; ?>">

                        <div class="row mt-4">
                            <div class="col-md-6">
                                <div class="input-group input-group-static mb-4">
                                    <label>Driver Name <span class="text-danger">*</span></label>
                                    <input type="text" name="driver_name" class="form-control"
                                        value="<?= isset($driver['name']) ? $driver['name'] : ''; ?>" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn bg-gradient-primary">Update Driver</button>
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
        // Trigger Toast if CI3 Flashdata exists (handles errors on redirect back)
        <?php if ($this->session->flashdata('success')): ?>
            showToast("<?= $this->session->flashdata('success'); ?>", "success");
        <?php elseif ($this->session->flashdata('error')): ?>
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
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3"><?= $pagetitle ?></h6>
                    </div>
                </div>
                <?php if ($this->session->flashdata('upload_error')): ?>
                    <div class="alert alert-danger"><?= $this->session->flashdata('upload_error') ?></div>
                <?php endif; ?>

                <?php if ($this->session->flashdata('upload_success')): ?>
                    <div class="alert alert-success"><?= $this->session->flashdata('upload_success') ?></div>
                <?php endif; ?>
                <div class="mx-auto my-4" style="max-width: 800px;">
                    <div class="card shadow-primary ">
                        <div class="card-header bg-dark">
                            <h5 class="text-white mb-0">Upload File</h5>
                        </div>
                        <div class="card-body">
                            <form method="post" action="<?= base_url('home/uploadDocument') ?>" enctype="multipart/form-data" class="p-3">
                                <input type="hidden" name="upload_source" value="general_form">
                                <div class="d-flex flex-wrap align-items-end gap-3">
                                    <div style="min-width: 600px;">
                                        <label for="reference_number" class="form-label fw-semibold mb-1">Reference No</label>
                                        <input type="text" name="reference_number" id="reference_number"
                                            class="form-control form-control-sm border border-secondary rounded-1" required>
                                    </div>

                                    <div style="min-width: 600px;">
                                        <label for="title" class="form-label fw-semibold mb-1">Title</label>
                                        <input type="text" name="title" id="title"
                                            class="form-control form-control-sm border border-secondary rounded-1" required>
                                    </div>

                                    <div style="min-width: 600px;">
                                        <label for="file_upload" class="form-label fw-semibold mb-1">File</label>
                                        <input type="file" name="file_upload" id="file_upload"
                                            accept=".pdf,.jpg,.jpeg,.png"
                                            class="form-control form-control-sm border border-secondary rounded-1" required>
                                    </div>
                                </div>

                                <!-- Button on next line, right aligned -->
                                <div class="d-flex justify-content-center mt-3">
                                    <button type="submit" class="btn btn-sm btn-success">
                                        <i class="fas fa-upload me-1"></i> Upload
                                    </button>
                                </div>

                                <small class="form-text text-muted mt-2 d-block">Allowed: PDF, JPG, JPEG, PNG. Max size: 5MB.</small>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
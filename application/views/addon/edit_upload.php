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
                            <h5 class="text-white mb-0">Edit File</h5>
                        </div>
                        <div class="card-body">
                            <form method="post" action="<?= base_url('home/updateDocument?id=' . $upload['id']) ?>" enctype="multipart/form-data" class="p-3">
                                <input type="hidden" name="upload_source" value="lab">
                                <div class="d-flex flex-wrap align-items-end gap-3">
                                    <div style="min-width: 600px;">
                                        <label for="reference_number" class="form-label fw-semibold mb-1">Reference No</label>
                                        <input type="text" name="reference_number" id="reference_number"
                                            class="form-control form-control-sm border border-secondary rounded-1"
                                            value="<?= set_value('reference_number', $upload['reference_no']) ?>" required>
                                    </div>

                                    <div style="min-width: 600px;">
                                        <label for="title" class="form-label fw-semibold mb-1">Title</label>
                                        <input type="text" name="title" id="title"
                                            class="form-control form-control-sm border border-secondary rounded-1"
                                            value="<?= set_value('title', $upload['title']) ?>" required>
                                    </div>

                                    <div style="min-width: 600px;">
                                        <label for="file_upload" class="form-label fw-semibold mb-1">Replace File (optional)</label>
                                        <input type="file" name="file_upload" id="file_upload"
                                            accept=".pdf,.jpg,.jpeg,.png"
                                            class="form-control form-control-sm border border-secondary rounded-1">

                                        <!-- Show existing file preview -->
                                        <?php if (!empty($upload['file_path'])): ?>
                                            <div class="mt-2">
                                                <label class="form-label fw-semibold">Current File:</label><br>
                                                <?php
                                                $ext = pathinfo($upload['file_path'], PATHINFO_EXTENSION);
                                                $file_url = base_url($upload['file_path']);
                                                ?>

                                                <?php if (in_array(strtolower($ext), ['jpg', 'jpeg', 'png'])): ?>
                                                    <img src="<?= $file_url ?>" alt="Current Image" class="img-thumbnail" style="max-width: 200px;">
                                                <?php elseif (strtolower($ext) === 'pdf'): ?>
                                                    <a href="<?= $file_url ?>" target="_blank" class="btn btn-sm btn-outline-info mt-1">
                                                        <i class="fas fa-file-pdf"></i> View Current PDF
                                                    </a>
                                                <?php else: ?>
                                                    <a href="<?= $file_url ?>" target="_blank" class="btn btn-sm btn-outline-secondary mt-1">
                                                        <i class="fas fa-file"></i> View Current File
                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                </div>

                                <div class="d-flex justify-content-center mt-3">
                                    <button type="submit" class="btn btn-sm btn-primary">
                                        <i class="fas fa-save me-1"></i> Update
                                    </button>
                                </div>

                                <small class="form-text text-muted mt-2 d-block">Leave file blank if you don't want to change it. Allowed: PDF, JPG, JPEG, PNG. Max size: 5MB.</small>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
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
                    <div class="card shadow-primary">
                        <div class="card-header bg-dark">
                            <h5 class="text-white mb-0">Edit COA File</h5>
                        </div>
                        <div class="card-body">
                            <form method="post" enctype="multipart/form-data" action="<?= base_url('home/updateDocument?id=' . $imageData['id']) ?>">
                                <input type="hidden" name="upload_source" value="coa"> <!-- or "coa" -->

                                <input type="hidden" name="id" value="<?= $imageData['id'] ?>">

                                <div class="d-flex flex-wrap align-items-end gap-3">
                                    <div style="min-width: 600px;">
                                        <label for="reference_number" class="form-label fw-semibold mb-1">Reference No <span class="text-danger">*</span></label>
                                        <input type="text" name="reference_number" id="reference_number"
                                            value="<?= $imageData['reference_no'] ?>"
                                            class="form-control form-control-sm border border-secondary rounded-1"
                                            required minlength="3" maxlength="50" pattern="[A-Za-z0-9\-_]+">
                                    </div>

                                    <div style="min-width: 600px;">
                                        <label for="title" class="form-label fw-semibold mb-1">Title <span class="text-danger">*</span></label>
                                        <input type="text" name="title" id="title"
                                            value="<?= $imageData['title'] ?>"
                                            class="form-control form-control-sm border border-secondary rounded-1"
                                            required minlength="3" maxlength="100">
                                    </div>

                                    <div style="min-width: 600px;">
                                        <label for="file_upload" class="form-label fw-semibold mt-2 mb-1">Replace PNG File (Optional)</label>
                                        <input type="file" name="file_upload" id="file_upload" accept=".png"
                                            class="form-control form-control-sm border border-secondary rounded-1">
                                        <div class="invalid-feedback" id="file-error">
                                            Please select a valid PNG file.
                                        </div>
                                    </div>
                                    <!-- Show existing file preview -->
                                    <?php if (!empty($imageData['file_path'])): ?>
                                        <div class="mt-2">
                                            <label class="form-label fw-semibold">Current File:</label><br>
                                            <?php
                                            $ext = pathinfo($imageData['file_path'], PATHINFO_EXTENSION);
                                            $file_url = base_url($imageData['file_path']);
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

                                <div class="d-flex justify-content-center mt-3">
                                    <button type="submit" class="btn btn-sm btn-warning" id="submitBtn">
                                        <i class="fas fa-save me-1"></i> Update
                                    </button>
                                </div>

                                <small class="form-text text-muted mt-2 d-block">
                                    <strong>Note:</strong> Only PNG files are allowed. Max size: 5MB. Leave file field empty to keep existing image.
                                </small>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    // Keep the same JS from the previous form, with minor adjustment:
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('uploadForm');
        const fileInput = document.getElementById('file_upload');
        const submitBtn = document.getElementById('submitBtn');
        const referenceInput = document.getElementById('reference_number');
        const titleInput = document.getElementById('title');

        function validateFile(file) {
            const maxSize = 5 * 1024 * 1024;
            const allowedTypes = ['image/png'];
            const allowedExtensions = ['.png'];
            if (!file) return {
                valid: true,
                message: ''
            }; // optional file
            const fileName = file.name.toLowerCase();
            const hasValidExtension = allowedExtensions.some(ext => fileName.endsWith(ext));
            if (!hasValidExtension || !allowedTypes.includes(file.type) || file.size > maxSize) {
                return {
                    valid: false,
                    message: 'File must be PNG and less than 5MB.'
                };
            }
            return {
                valid: true,
                message: ''
            };
        }

        fileInput.addEventListener('change', function() {
            const file = this.files[0];
            const validation = validateFile(file);
            const errorDiv = document.getElementById('file-error');

            if (!validation.valid) {
                this.classList.add('is-invalid');
                errorDiv.textContent = validation.message;
                submitBtn.disabled = true;
            } else {
                this.classList.remove('is-invalid');
                this.classList.add('is-valid');
                errorDiv.textContent = '';
                submitBtn.disabled = false;
            }
        });

        form.addEventListener('submit', function(e) {
            const file = fileInput.files[0];
            const fileValidation = validateFile(file);
            if (!referenceInput.value.trim() || referenceInput.classList.contains('is-invalid') ||
                !titleInput.value.trim() || titleInput.classList.contains('is-invalid') ||
                !fileValidation.valid) {
                e.preventDefault();
                alert('Please correct all errors before submitting.');
                return false;
            }
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i> Updating...';
        });
    });
</script>
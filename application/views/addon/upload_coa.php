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
                            <h5 class="text-white mb-0">Upload PNG File</h5>
                        </div>
                        <div class="card-body">
                            <form method="post" action="<?= base_url('home/uploadDocument') ?>" enctype="multipart/form-data" class="p-3" id="uploadForm">
                                <input type="hidden" name="upload_source" value="png_form">
                                <div class="d-flex flex-wrap align-items-end gap-3">
                                    <div style="min-width: 600px;">
                                        <label for="reference_number" class="form-label fw-semibold mb-1">Reference No <span class="text-danger">*</span></label>
                                        <input type="text" name="reference_number" id="reference_number"
                                            class="form-control form-control-sm border border-secondary rounded-1"
                                            required minlength="3" maxlength="50" pattern="[A-Za-z0-9\-_]+"
                                            title="Reference number should contain only letters, numbers, hyphens, and underscores">
                                        <div class="invalid-feedback">
                                            Reference number is required (3-50 characters, alphanumeric with hyphens/underscores only).
                                        </div>
                                    </div>

                                    <div style="min-width: 600px;">
                                        <label for="title" class="form-label fw-semibold mb-1">Title <span class="text-danger">*</span></label>
                                        <input type="text" name="title" id="title"
                                            class="form-control form-control-sm border border-secondary rounded-1"
                                            required minlength="3" maxlength="100"
                                            title="Title should be between 3-100 characters">
                                        <div class="invalid-feedback">
                                            Title is required (3-100 characters).
                                        </div>
                                    </div>

                                    <div style="min-width: 600px;">
                                        <label for="file_upload" class="form-label fw-semibold mb-1">PNG File <span class="text-danger">*</span></label>
                                        <input type="file" name="file_upload" id="file_upload"
                                            accept=".png"
                                            class="form-control form-control-sm border border-secondary rounded-1"
                                            required>
                                        <div class="invalid-feedback" id="file-error">
                                            Please select a valid PNG file.
                                        </div>
                                    </div>
                                </div>

                                <!-- Button on next line, right aligned -->
                                <div class="d-flex justify-content-center mt-3">
                                    <button type="submit" class="btn btn-sm btn-success" id="submitBtn">
                                        <i class="fas fa-upload me-1"></i> Upload PNG
                                    </button>
                                </div>

                                <small class="form-text text-muted mt-2 d-block">
                                    <strong>Allowed:</strong> PNG files only. <strong>Max size:</strong> 5MB.
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
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('uploadForm');
        const fileInput = document.getElementById('file_upload');
        const submitBtn = document.getElementById('submitBtn');
        const referenceInput = document.getElementById('reference_number');
        const titleInput = document.getElementById('title');

        // File validation function
        function validateFile(file) {
            const maxSize = 5 * 1024 * 1024; // 5MB in bytes
            const allowedTypes = ['image/png'];
            const allowedExtensions = ['.png'];

            if (!file) {
                return {
                    valid: false,
                    message: 'Please select a file.'
                };
            }

            // Check file extension
            const fileName = file.name.toLowerCase();
            const hasValidExtension = allowedExtensions.some(ext => fileName.endsWith(ext));

            if (!hasValidExtension) {
                return {
                    valid: false,
                    message: 'Only PNG files are allowed.'
                };
            }

            // Check MIME type
            if (!allowedTypes.includes(file.type)) {
                return {
                    valid: false,
                    message: 'Invalid file type. Only PNG files are accepted.'
                };
            }

            // Check file size
            if (file.size > maxSize) {
                return {
                    valid: false,
                    message: 'File size must be less than 5MB.'
                };
            }

            return {
                valid: true,
                message: 'File is valid.'
            };
        }

        // Real-time file validation
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

        // Reference number validation
        referenceInput.addEventListener('input', function() {
            const value = this.value.trim();
            const pattern = /^[A-Za-z0-9\-_]+$/;

            if (value.length < 3 || value.length > 50 || !pattern.test(value)) {
                this.classList.add('is-invalid');
                this.classList.remove('is-valid');
            } else {
                this.classList.remove('is-invalid');
                this.classList.add('is-valid');
            }
        });

        // Title validation
        titleInput.addEventListener('input', function() {
            const value = this.value.trim();

            if (value.length < 3 || value.length > 100) {
                this.classList.add('is-invalid');
                this.classList.remove('is-valid');
            } else {
                this.classList.remove('is-invalid');
                this.classList.add('is-valid');
            }
        });

        // Form submission validation
        form.addEventListener('submit', function(e) {
            let isValid = true;
            const file = fileInput.files[0];

            // Validate all fields
            if (!referenceInput.value.trim() || referenceInput.classList.contains('is-invalid')) {
                referenceInput.classList.add('is-invalid');
                isValid = false;
            }

            if (!titleInput.value.trim() || titleInput.classList.contains('is-invalid')) {
                titleInput.classList.add('is-invalid');
                isValid = false;
            }

            const fileValidation = validateFile(file);
            if (!fileValidation.valid) {
                fileInput.classList.add('is-invalid');
                document.getElementById('file-error').textContent = fileValidation.message;
                isValid = false;
            }

            if (!isValid) {
                e.preventDefault();
                alert('Please correct all errors before submitting.');
                return false;
            }

            // Show loading state
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i> Uploading...';
        });

        // Reset form validation styles when form is reset
        form.addEventListener('reset', function() {
            const inputs = form.querySelectorAll('.form-control');
            inputs.forEach(input => {
                input.classList.remove('is-valid', 'is-invalid');
            });
            submitBtn.disabled = false;
            submitBtn.innerHTML = '<i class="fas fa-upload me-1"></i> Upload PNG';
        });
    });
</script>
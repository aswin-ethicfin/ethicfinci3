<style>
    /* ── Select2 theme override ── */
    .select2-container--default .select2-selection--single {
        height: calc(1.5em + .5rem + 2px) !important;
        border: 1px solid #ced4da !important;
        border-radius: 0.375rem !important;
        padding: 0 8px !important;
        font-size: .875rem !important;
        color: #344767 !important;
        display: flex !important;
        align-items: center !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 1 !important;
        padding: 0 !important;
        color: #344767 !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 100% !important;
    }

    .select2-container--default.select2-container--focus .select2-selection--single,
    .select2-container--default.select2-container--open .select2-selection--single {
        border-color: #86b7fe !important;
        box-shadow: 0 0 0 0.15rem rgba(13, 110, 253, .25) !important;
    }

    .select2-dropdown {
        border: 1px solid #ced4da !important;
        border-radius: 0.375rem !important;
        box-shadow: 0 4px 16px rgba(52, 71, 103, .12) !important;
        font-size: .875rem !important;
    }

    .select2-search--dropdown .select2-search__field {
        border: 1px solid #e0e0e0 !important;
        border-radius: 5px !important;
        padding: 5px 8px !important;
        font-size: .8rem !important;
    }

    .select2-container--default .select2-results__option--highlighted[aria-selected] {
        background-color: #344767 !important;
    }

    .select2-container {
        width: 100% !important;
    }

    .select2-loading-indicator {
        padding: 6px 12px;
        color: #7b809a;
        font-size: 12px;
    }

    /* ── original styles ── */
    .form-control {
        border: 1px solid #ced4da !important;
        border-radius: 0.375rem;
        background-color: #fff;
        box-shadow: none !important;
    }

    .form-control:focus {
        border-color: #86b7fe;
        box-shadow: 0 0 0 0.15rem rgba(13, 110, 253, .25);
    }

    .form-select {
        border: 1px solid #ced4da !important;
        border-radius: 0.375rem;
        background-color: #fff;
        box-shadow: none !important;
    }

    .form-select:focus {
        border-color: #86b7fe;
        box-shadow: 0 0 0 0.15rem rgba(13, 110, 253, .25);
    }

    .items-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 12.5px;
    }

    .items-table thead tr {
        background: linear-gradient(195deg, #344767, #344767);
    }

    .items-table thead th {
        padding: 10px 8px;
        color: #fff;
        font-weight: 600;
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: .5px;
        white-space: nowrap;
        text-align: left;
    }

    .items-table tbody tr {
        border-bottom: 1px solid #f0f2f5;
        transition: background .15s;
    }

    .items-table tbody tr:hover {
        background: #fafafa;
    }

    .items-table tfoot td {
        padding: 8px;
        font-weight: 600;
        background: #f8f9fa;
    }

    .td-input {
        width: 100%;
        padding: 5px 7px;
        border: 1px solid #e0e0e0;
        border-radius: 5px;
        font-size: 12px;
        color: #344767;
    }

    .td-input:focus {
        outline: none;
        border-color: #e91e63;
        box-shadow: 0 0 0 2px rgba(233, 30, 99, .1);
    }

    .btn-danger-sm {
        background: #ffebee;
        color: #c62828;
        border: 1px solid #ffcdd2;
        padding: 4px 8px;
        border-radius: 5px;
        font-size: 11px;
        cursor: pointer;
    }

    .btn-danger-sm:hover {
        background: #ffcdd2;
    }

    .totals-box {
        background: #f8f9fa;
        border: 1px solid #e9ecef;
        border-radius: 8px;
        padding: 14px 20px;
        min-width: 280px;
    }

    .totals-row {
        display: flex;
        justify-content: space-between;
        padding: 4px 0;
        font-size: 13px;
        color: #344767;
    }

    .totals-row.grand {
        border-top: 1px solid #dee2e6;
        margin-top: 6px;
        padding-top: 10px;
        font-size: 15px;
        font-weight: 700;
        color: #e91e63;
    }

    .empty-row td {
        text-align: center;
        padding: 24px;
        color: #adb5bd;
        font-style: italic;
    }

    .field-label {
        font-size: 11px !important;
        font-weight: 600 !important;
        color: #7b809a !important;
        text-transform: uppercase;
        letter-spacing: .5px;
        margin-bottom: 4px !important;
    }
</style>

<!-- Select2 CSS + JS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">

                <!-- Card Header -->
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3"><?= $pagetitle ?></h6>
                    </div>
                </div>

                <!-- Card Body -->
                <div class="card-body px-4 py-4">

                    <form method="post" action="<?= base_url('jm/updatejob') ?>">

                        <input type="hidden" name="job_id" value="<?= $jobs['job_id'] ?>">

                        <div class="row mb-4">

                            <!-- Job Received Date -->
                            <div class="col-md-3 col-sm-6">
                                <label>Job Received Date <span style="color:red">*</span></label>
                                <input type="date" class="form-control form-control-sm"
                                    name="received_date"
                                    value="<?= date('Y-m-d', strtotime($jobs['recieved_date'])) ?>"
                                    required>
                            </div>

                            <!-- Job Type — static Select2 with pre-selected value -->
                            <div class="col-md-4 col-sm-6">
                                <label>Job Type <span style="color:red;">*</span></label>
                                <select class="form-select form-select-sm" name="job_type" required>
                                    <option value="">Select Type</option>
                                    <option value="0" <?= isset($jobs['job_type']) && $jobs['job_type'] == 0 ? 'selected' : '' ?>>Maintenance</option>
                                    <option value="1" <?= isset($jobs['job_type']) && $jobs['job_type'] == 1 ? 'selected' : '' ?>>Service</option>
                                </select>
                            </div>

                            <!-- Job Title -->
                            <div class="col-md-3 col-sm-6">
                                <label>Job Title <span style="color:red">*</span></label>
                                <input type="text" class="form-control form-control-sm"
                                    name="job_title"
                                    value="<?= htmlspecialchars($jobs['job_name']) ?>"
                                    required>
                            </div>

                            <!-- Client Name — lazy-load, pre-selected -->
                            <div class="col-md-3 col-sm-6 mt-3">
                                <label>Client Name <span style="color:red">*</span></label>
                                <select class="form-select form-select-sm s2-ajax"
                                    name="client_name"
                                    id="sel-client"
                                    data-url="<?= base_url('jm/getclients') ?>"
                                    data-placeholder="Select Client"
                                    data-selected="<?= $jobs['customer'] ?>"
                                    data-selected-text="<?= htmlspecialchars($customers[array_search($jobs['customer'], array_column($customers, 'id'))]['name'] ?? '') ?>"
                                    required>
                                    <!-- Pre-populate selected option so value is visible before lazy-load -->
                                    <?php
                                    $selClient = '';
                                    foreach ($customers as $c) {
                                        if ($c['id'] == $jobs['customer']) {
                                            $selClient = $c['name'];
                                            break;
                                        }
                                    }
                                    ?>
                                    <?php if ($jobs['customer']): ?>
                                        <option value="<?= $jobs['customer'] ?>" selected><?= htmlspecialchars($selClient) ?></option>
                                    <?php else: ?>
                                        <option value=""></option>
                                    <?php endif; ?>
                                </select>
                            </div>

                            <!-- Assigned To — lazy-load, pre-selected -->
                            <div class="col-md-3 col-sm-6 mt-3">
                                <label>Assigned To <span style="color:red">*</span></label>
                                <select class="form-select form-select-sm s2-ajax"
                                    name="assigned_to"
                                    id="sel-employee"
                                    data-url="<?= base_url('jm/getemployees') ?>"
                                    data-placeholder="Select Employee"
                                    required>
                                    <?php
                                    $selEmp = '';
                                    foreach ($employees as $e) {
                                        if ($e['id'] == $jobs['technician_id']) {
                                            $selEmp = $e['name'];
                                            break;
                                        }
                                    }
                                    ?>
                                    <?php if ($jobs['technician_id']): ?>
                                        <option value="<?= $jobs['technician_id'] ?>" selected><?= htmlspecialchars($selEmp) ?></option>
                                    <?php else: ?>
                                        <option value=""></option>
                                    <?php endif; ?>
                                </select>
                            </div>

                        </div><!-- /row -->

                        <?php $editable = ($jobs['job_status'] != 10); ?>

                        <!-- ── Product Selector (only if editable) ── -->
                        <?php if ($editable): ?>
                            <div class="row mb-3 g-2">

                                <div class="col-md-4">
                                    <label class="form-label field-label">Select Product / Service</label>
                                    <!-- lazy-load product -->
                                    <select class="form-select form-select-sm s2-ajax"
                                        id="product-select"
                                        data-url="<?= base_url('jm/getproducts') ?>"
                                        data-placeholder="-- Select a product --">
                                        <option value=""></option>
                                    </select>
                                    <small id="product-mrp-display" style="color:#7b809a;font-size:11px;display:none">
                                        MRP: <strong id="product-mrp-val">0.00</strong>
                                    </small>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label field-label">Description</label>
                                    <input type="text" class="form-control form-control-sm" id="f-desc" placeholder="Description">
                                </div>

                                <div class="col-md-2">
                                    <label class="form-label field-label">Quantity</label>
                                    <input type="number" class="form-control form-control-sm" id="f-qty" value="1" min="1" step="1"
                                        oninput="recalcFormTotals()">
                                </div>

                                <!-- Unit — lazy-load -->
                                <div class="col-md-2">
                                    <label class="form-label field-label">Unit</label>
                                    <select class="form-select form-select-sm s2-ajax"
                                        id="f-unit"
                                        data-url="<?= base_url('jm/getunits') ?>"
                                        data-placeholder="-- Select Unit --">
                                        <option value=""></option>
                                    </select>
                                </div>

                                <div class="col-md-2">
                                    <label class="form-label field-label">Price</label>
                                    <input type="number" class="form-control form-control-sm" id="f-price" value="0" style="background:#f8f9fa">
                                </div>

                                <div class="col-md-2">
                                    <label class="form-label field-label">Tax Incl. Price</label>
                                    <input type="number" class="form-control form-control-sm" id="f-tax-incl-price" value="0" readonly style="background:#f8f9fa">
                                </div>

                                <div class="col-md-1">
                                    <label class="form-label field-label">Tax %</label>
                                    <input type="number" class="form-control form-control-sm" id="f-tax-perc" value="0" style="background:#f8f9fa">
                                </div>

                                <div class="col-md-2">
                                    <label class="form-label field-label">Tax Amount</label>
                                    <input type="number" class="form-control form-control-sm" id="f-tax-amt" value="0" style="background:#f8f9fa">
                                </div>

                                <div class="col-md-2">
                                    <label class="form-label field-label">Discount %</label>
                                    <input type="number" class="form-control form-control-sm" id="f-disc-perc" value="0" min="0" max="100" step="0.01"
                                        oninput="recalcFormTotals()">
                                </div>

                                <div class="col-md-2">
                                    <label class="form-label field-label">Disc Amt</label>
                                    <input type="number" class="form-control form-control-sm" id="f-disc-amt" value="0" style="background:#f8f9fa">
                                </div>

                                <div class="col-md-2">
                                    <label class="form-label field-label">Total</label>
                                    <input type="number" class="form-control form-control-sm" id="f-total" value="0" readonly style="background:#f8f9fa;font-weight:700;color:#2e7d32">
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label field-label">Remark</label>
                                    <input type="text" class="form-control form-control-sm" id="f-remark" placeholder="Remark">
                                </div>

                                <div class="col-md-2 d-flex align-items-end">
                                    <button type="button" class="btn btn-sm btn-primary w-100"
                                        onclick="addSelectedProduct()" id="add-item-btn" disabled>
                                        <i class="fas fa-plus"></i> Add Item
                                    </button>
                                </div>

                            </div><!-- /product selector row -->
                        <?php endif; ?>

                        <!-- Items Table -->
                        <div class="table-responsive mb-3">
                            <table class="items-table" id="items-table">
                                <thead>
                                    <tr>
                                        <th style="width:30px">#</th>
                                        <th style="min-width:150px">Product / Description</th>
                                        <th style="width:75px">MRP</th>
                                        <th style="width:80px">Price</th>
                                        <th style="width:65px">Qty</th>
                                        <th style="width:60px">Unit</th>
                                        <th style="width:65px">Disc %</th>
                                        <th style="width:70px">Disc Amt</th>
                                        <th style="width:75px">Taxable</th>
                                        <th style="width:55px">Tax %</th>
                                        <th style="width:70px">Tax Amt</th>
                                        <th style="width:80px">Total</th>
                                        <th style="width:35px"></th>
                                    </tr>
                                </thead>
                                <tbody id="items-body">
                                    <tr class="empty-row">
                                        <td colspan="13">No items added yet. Select a product above.</td>
                                    </tr>
                                </tbody>
                                <tfoot id="items-foot" style="display:none">
                                    <tr>
                                        <td colspan="8" style="text-align:right;color:#7b809a;font-size:11px;text-transform:uppercase">Totals</td>
                                        <td id="foot-taxable">0.00</td>
                                        <td></td>
                                        <td id="foot-tax">0.00</td>
                                        <td id="foot-total" style="color:#2e7d32">0.00</td>
                                        <td></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        <!-- Hidden inputs -->
                        <div id="hidden-inputs">
                            <input type="hidden" name="sum_subtotal" id="post-sum-subtotal" value="0">
                            <input type="hidden" name="sum_disc" id="post-sum-disc" value="0">
                            <input type="hidden" name="sum_tax" id="post-sum-tax" value="0">
                            <input type="hidden" name="sum_grand" id="post-sum-grand" value="0">
                        </div>

                        <!-- Grand Totals -->
                        <div class="d-flex justify-content-end mb-3" id="totals-panel" style="display:none!important">
                            <div class="totals-box">
                                <div class="totals-row"><span>Subtotal</span><span id="sum-subtotal">0.00</span></div>
                                <div class="totals-row"><span>Total Discount</span><span id="sum-disc" style="color:#e91e63">- 0.00</span></div>
                                <div class="totals-row"><span>Total Tax</span><span id="sum-tax">0.00</span></div>
                                <div class="totals-row grand"><span>Grand Total</span><span id="sum-grand">0.00</span></div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-4 col-sm-6">
                                <label>Expected Completion</label>
                                <input type="date" class="form-control form-control-sm"
                                    name="expected_date"
                                    value="<?= $jobs['estimated_delivery_date'] ?>">
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Estimated Cost</label>
                                <input type="number" step="0.01" class="form-control form-control-sm"
                                    name="estimated_cost"
                                    value="<?= $jobs['estimated_cost'] ?>">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6 col-sm-12">
                                <label>Scope of Work (Initial) <span style="color:red">*</span></label>
                                <textarea class="form-control form-control-sm" name="scope_of_work" rows="3" required><?= htmlspecialchars($jobs['remark']) ?></textarea>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <label>Problem Description</label>
                                <textarea class="form-control form-control-sm" name="problem_desc" rows="3"><?= htmlspecialchars($jobs['description']) ?></textarea>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-2 col-sm-6 d-flex align-items-end">
                                <button type="submit" class="btn btn-primary w-100">Update Job</button>
                            </div>
                            <div class="col-md-2 col-sm-6 d-flex align-items-end">
                                <a href="<?= base_url('jm/editjob?id=' . $jobs['job_id']) ?>"
                                    class="btn btn-outline-secondary w-100">Reset</a>
                            </div>
                        </div>

                    </form>

                </div><!-- /card-body -->
            </div>
        </div>
    </div>
</div>

<script>
    /* ══════════════════════════════════════════
   SELECT2 INITIALISATION
   ══════════════════════════════════════════ */

    /**
     * Static Select2 (options already in DOM).
     */
    function initBasicSelect2(selector) {
        $(selector).select2({
            theme: 'default',
            width: '100%',
            allowClear: true
        });
    }

    /**
     * Lazy-load Select2.
     * Fetches options ONCE on first open from data-url.
     * Endpoint must return { success: true, data: [{id, text}, …] }
     *
     * @param {string} selector  CSS selector for a single <select>
     */
    function initAjaxSelect2(selector) {
        const $el = $(selector);
        const url = $el.data('url');
        const ph = $el.data('placeholder') || 'Select…';
        let loaded = false;

        // Grab any pre-selected option already in the DOM (edit page)
        const preVal = $el.val();
        const preText = $el.find('option:selected').text();

        $el.select2({
            theme: 'default',
            width: '100%',
            allowClear: true,
            placeholder: ph,
            data: preVal ? [{
                id: preVal,
                text: preText
            }] : [],
        });

        // Restore pre-selected value after init
        if (preVal) {
            $el.val(preVal).trigger('change.select2'); // update display without firing our handler
        }

        // ── Fetch once on first open ──
        $el.on('select2:open', function() {
            if (loaded) return;

            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function(res) {
                    if (!res.success) {
                        showToast(res.error || 'Failed to load options ❌', 'error');
                        return;
                    }
                    const allData = res.data || [];
                    loaded = true;

                    const currentVal = $el.val();

                    // Destroy and re-init with full dataset
                    $el.select2('destroy');
                    $el.select2({
                        theme: 'default',
                        width: '100%',
                        allowClear: true,
                        placeholder: ph,
                        data: allData,
                    });

                    // Restore selection (important for edit page)
                    if (currentVal) {
                        $el.val(currentVal).trigger('change.select2');
                    }

                    // Re-open so user sees results immediately
                    $el.select2('open');

                    // Re-attach open listener for subsequent opens (already loaded, no-op)
                    $el.on('select2:open', function() {
                        /* loaded = true, nothing to do */ });
                },
                error: function() {
                    showToast('Server error while loading options ❌', 'error');
                }
            });
        });
    }

    // ── Static dropdowns ──
    initBasicSelect2('.s2-basic');

    // ── Lazy-load dropdowns ──
    $('.s2-ajax').each(function() {
        initAjaxSelect2('#' + this.id);
    });

    /* ══════════════════════════════════════════
       PRODUCT SELECT — extra behaviour on change
       ══════════════════════════════════════════ */
    <?php if ($editable): ?>
        $('#product-select').on('change', function() {
            const id = $(this).val();
            document.getElementById('add-item-btn').disabled = !id;

            if (!id) {
                document.getElementById('product-mrp-display').style.display = 'none';
                resetFormFields();
                return;
            }

            $.ajax({
                url: '<?= base_url("jm/getitemdetailsbyid") ?>',
                type: 'GET',
                data: {
                    id
                },
                dataType: 'json',
                success: function(res) {
                    if (!res.success) {
                        showToast(res.error || 'Failed to fetch item ❌', 'error');
                        return;
                    }
                    const d = res.data;
                    setVal('f-price', d.sales_price || 0);
                    setVal('f-qty', d.qty || 1);
                    setVal('f-desc', d.description || '');
                    setVal('f-tax-perc', d.vat_perc || 0);
                    setVal('f-disc-perc', 0);
                    setVal('f-disc-amt', 0);
                    setVal('f-tax-amt', 0);
                    setVal('f-total', 0);

                    // Set unit in Select2
                    if (d.unit_id) {
                        const $unit = $('#f-unit');
                        if ($unit.find('option[value="' + d.unit_id + '"]').length === 0) {
                            $unit.append(new Option(d.unit_name || d.unit_id, d.unit_id, true, true));
                        }
                        $unit.val(d.unit_id).trigger('change');
                    }

                    document.getElementById('product-mrp-val').textContent = parseFloat(d.mrp || 0).toFixed(2);
                    document.getElementById('product-mrp-display').style.display = 'block';

                    recalcFormTotals();
                },
                error: function() {
                    showToast('Server error ❌', 'error');
                }
            });
        });

        document.getElementById('f-qty').addEventListener('input', recalcFormTotals);
        document.getElementById('f-price').addEventListener('input', recalcFormTotals);
        document.getElementById('f-tax-perc').addEventListener('input', recalcFormTotals);
        document.getElementById('f-disc-perc').addEventListener('input', recalcFormTotals);

        document.getElementById('f-tax-amt').addEventListener('input', function() {
            const price = parseFloat(getVal('f-price')) || 0;
            const qty = parseFloat(getVal('f-qty')) || 1;
            const discPerc = parseFloat(getVal('f-disc-perc')) || 0;
            const taxAmt = parseFloat(getVal('f-tax-amt')) || 0;
            const subtotal = price * qty;
            const discAmt = parseFloat(((subtotal * discPerc) / 100).toFixed(2));
            const taxable = subtotal - discAmt;
            const taxPerc = taxable > 0 ? parseFloat(((taxAmt / taxable) * 100).toFixed(2)) : 0;
            const taxInclPrice = parseFloat((price + price * taxPerc / 100).toFixed(2));
            const total = parseFloat((taxable + taxAmt).toFixed(2));
            setVal('f-tax-perc', taxPerc.toFixed(2));
            setVal('f-disc-amt', discAmt.toFixed(2));
            setVal('f-tax-incl-price', taxInclPrice.toFixed(2));
            setVal('f-total', total.toFixed(2));
        });

        function recalcFormTotals() {
            const price = parseFloat(getVal('f-price')) || 0;
            const qty = parseFloat(getVal('f-qty')) || 1;
            const taxPerc = parseFloat(getVal('f-tax-perc')) || 0;
            const discPerc = parseFloat(getVal('f-disc-perc')) || 0;
            const subtotal = price * qty;
            const discAmt = parseFloat(((subtotal * discPerc) / 100).toFixed(2));
            const taxable = subtotal - discAmt;
            const taxAmt = parseFloat(((taxable * taxPerc) / 100).toFixed(2));
            const taxInclPrice = parseFloat((price + price * taxPerc / 100).toFixed(2));
            const total = parseFloat((taxable + taxAmt).toFixed(2));
            setVal('f-disc-amt', discAmt.toFixed(2));
            setVal('f-tax-incl-price', taxInclPrice.toFixed(2));
            setVal('f-tax-amt', taxAmt.toFixed(2));
            setVal('f-total', total.toFixed(2));
        }
    <?php endif; ?>

    /* ══════════════════════════════════════════
       ITEMS TABLE STATE
       ══════════════════════════════════════════ */
    let items = [];
    let rowCounter = 0;

    /* ── Pre-load existing job items from PHP ── */
    <?php if (!empty($job_items)): ?>
            (function() {
                const existing = <?= json_encode(array_values($job_items)) ?>;
                const editable = <?= ($jobs['job_status'] != 10) ? 'true' : 'false' ?>;

                existing.forEach(function(d) {
                    rowCounter++;
                    const rId = 'row_' + rowCounter;
                    items.push({
                        rId,
                        id: d.item_id,
                        name: d.item_name || '',
                        desc: d.description || '',
                        mrp: parseFloat(d.mrp) || 0,
                        price: parseFloat(d.price) || 0,
                        qty: parseFloat(d.quantity) || 1,
                        unit: d.unit_id || '',
                        disc_perc: parseFloat(d.disc_perc) || 0,
                        disc_amt: parseFloat(d.disc_amt) || 0,
                        taxable: parseFloat(d.taxable) || 0,
                        tax_perc: parseFloat(d.vat_perc) || 0,
                        tax_amt: parseFloat(d.vat_amt) || 0,
                        total: parseFloat(d.total_price) || 0,
                        remark: d.remark || '',
                    });
                });

                renderTable(editable);
                recalcTotals();
            })();
    <?php endif; ?>

    /* ══════════════════════════════════════════
       ADD / REMOVE ITEMS
       ══════════════════════════════════════════ */
    <?php if ($editable): ?>

        function addSelectedProduct() {
            const $sel = $('#product-select');
            const itemId = $sel.val();
            if (!itemId) return;

            rowCounter++;
            const rId = 'row_' + rowCounter;

            const price = parseFloat(getVal('f-price')) || 0;
            const qty = parseFloat(getVal('f-qty')) || 1;
            const taxPerc = parseFloat(getVal('f-tax-perc')) || 0;
            const discPerc = parseFloat(getVal('f-disc-perc')) || 0;
            const subtotal = price * qty;
            const discAmt = parseFloat(((subtotal * discPerc) / 100).toFixed(2));
            const taxable = parseFloat((subtotal - discAmt).toFixed(2));
            const taxAmt = parseFloat(((taxable * taxPerc) / 100).toFixed(2));
            const total = parseFloat((taxable + taxAmt).toFixed(2));
            const unitText = $('#f-unit option:selected').text();

            items.push({
                rId,
                id: itemId,
                name: $sel.find('option:selected').text(),
                desc: getVal('f-desc'),
                mrp: parseFloat(document.getElementById('product-mrp-val').textContent) || 0,
                price,
                qty,
                unit: unitText,
                disc_perc: discPerc,
                disc_amt: discAmt,
                taxable,
                tax_perc: taxPerc,
                tax_amt: taxAmt,
                total,
                remark: getVal('f-remark'),
            });

            renderTable(true);
            recalcTotals();
            resetFormFields();

            $sel.val(null).trigger('change');
            document.getElementById('product-mrp-display').style.display = 'none';
            document.getElementById('add-item-btn').disabled = true;
        }

        function resetFormFields() {
            setVal('f-desc', '');
            setVal('f-remark', '');
            setVal('f-price', 0);
            setVal('f-qty', 1);
            setVal('f-tax-perc', 0);
            setVal('f-disc-perc', 0);
            setVal('f-disc-amt', 0);
            setVal('f-tax-amt', 0);
            setVal('f-tax-incl-price', 0);
            setVal('f-total', 0);
            $('#f-unit').val(null).trigger('change');
        }

        function removeRow(rId) {
            items = items.filter(i => i.rId !== rId);
            renderTable(true);
            recalcTotals();
        }
    <?php endif; ?>

    function updateField(rId, field, value) {
        const r = items.find(i => i.rId === rId);
        if (!r) return;
        r[field] = value;
        const subtotal = r.price * r.qty;
        r.disc_amt = parseFloat(((subtotal * r.disc_perc) / 100).toFixed(2));
        r.taxable = parseFloat((subtotal - r.disc_amt).toFixed(2));
        r.tax_amt = parseFloat(((r.taxable * r.tax_perc) / 100).toFixed(2));
        r.total = parseFloat((r.taxable + r.tax_amt).toFixed(2));
        document.getElementById(rId + '_disc_amt').textContent = r.disc_amt.toFixed(2);
        document.getElementById(rId + '_taxable').textContent = r.taxable.toFixed(2);
        document.getElementById(rId + '_tax_amt').textContent = r.tax_amt.toFixed(2);
        document.getElementById(rId + '_total').textContent = r.total.toFixed(2);
        recalcTotals();
        updateHiddenInputs();
    }

    function recalcTotals() {
        const subtotal = items.reduce((s, r) => s + r.price * r.qty, 0);
        const disc = items.reduce((s, r) => s + r.disc_amt, 0);
        const tax = items.reduce((s, r) => s + r.tax_amt, 0);
        const grand = items.reduce((s, r) => s + r.total, 0);
        const taxable = items.reduce((s, r) => s + r.taxable, 0);

        document.getElementById('sum-subtotal').textContent = subtotal.toFixed(2);
        document.getElementById('sum-disc').textContent = '- ' + disc.toFixed(2);
        document.getElementById('sum-tax').textContent = tax.toFixed(2);
        document.getElementById('sum-grand').textContent = grand.toFixed(2);
        document.getElementById('foot-taxable').textContent = taxable.toFixed(2);
        document.getElementById('foot-tax').textContent = tax.toFixed(2);
        document.getElementById('foot-total').textContent = grand.toFixed(2);

        const s = (id, v) => {
            const el = document.getElementById(id);
            if (el) el.value = v;
        };
        s('post-sum-subtotal', subtotal.toFixed(2));
        s('post-sum-disc', disc.toFixed(2));
        s('post-sum-tax', tax.toFixed(2));
        s('post-sum-grand', grand.toFixed(2));
    }

    function renderTable(editable = true) {
        const tbody = document.getElementById('items-body');
        const tfoot = document.getElementById('items-foot');
        const totals = document.getElementById('totals-panel');

        if (!items.length) {
            tbody.innerHTML = `<tr class="empty-row"><td colspan="13">No items added yet.</td></tr>`;
            tfoot.style.display = 'none';
            if (totals) totals.style.cssText = 'display:none!important';
            return;
        }

        tfoot.style.display = '';
        if (totals) totals.style.cssText = 'display:flex;justify-content:flex-end';

        tbody.innerHTML = items.map((r, idx) => `
        <tr id="tr_${r.rId}">
            <td><span style="font-size:11px;color:#7b809a;font-weight:600">${idx + 1}</span></td>
            <td>
                <div style="font-weight:600;color:#344767;font-size:12px">${r.name}</div>
                <div style="font-size:11px;color:#7b809a">${r.desc || ''}</div>
            </td>
            <td style="color:#7b809a">${r.mrp.toFixed(2)}</td>
            <td>${r.price.toFixed(2)}</td>
            <td>
                ${editable
                    ? `<input type="number" class="td-input" value="${r.qty}" min="1" step="1"
                           oninput="updateField('${r.rId}','qty',parseFloat(this.value)||1)">`
                    : r.qty
                }
            </td>
            <td style="color:#7b809a">${r.unit}</td>
            <td style="color:#e91e63">${r.disc_perc.toFixed(2)}%</td>
            <td id="${r.rId}_disc_amt" style="color:#e91e63">${r.disc_amt.toFixed(2)}</td>
            <td id="${r.rId}_taxable">${r.taxable.toFixed(2)}</td>
            <td style="color:#1565c0">${r.tax_perc.toFixed(2)}%</td>
            <td id="${r.rId}_tax_amt" style="color:#1565c0">${r.tax_amt.toFixed(2)}</td>
            <td><strong id="${r.rId}_total" style="color:#2e7d32">${r.total.toFixed(2)}</strong></td>
            <td>
                ${editable
                    ? `<button type="button" class="btn-danger-sm" onclick="removeRow('${r.rId}')">
                           <i class="fas fa-times"></i>
                       </button>`
                    : ''
                }
            </td>
        </tr>
    `).join('');

        updateHiddenInputs();
    }

    function updateHiddenInputs() {
        // Preserve the summary hidden inputs, append item inputs after them
        const summaryInputs = `
        <input type="hidden" name="sum_subtotal" id="post-sum-subtotal" value="${document.getElementById('post-sum-subtotal')?.value || 0}">
        <input type="hidden" name="sum_disc"     id="post-sum-disc"     value="${document.getElementById('post-sum-disc')?.value || 0}">
        <input type="hidden" name="sum_tax"      id="post-sum-tax"      value="${document.getElementById('post-sum-tax')?.value || 0}">
        <input type="hidden" name="sum_grand"    id="post-sum-grand"    value="${document.getElementById('post-sum-grand')?.value || 0}">
    `;
        const itemInputs = items.map((r, idx) => `
        <input type="hidden" name="items[${idx}][item_id]"     value="${r.id}">
        <input type="hidden" name="items[${idx}][item_name]"   value="${r.name}">
        <input type="hidden" name="items[${idx}][description]" value="${r.desc}">
        <input type="hidden" name="items[${idx}][mrp]"         value="${r.mrp}">
        <input type="hidden" name="items[${idx}][price]"       value="${r.price}">
        <input type="hidden" name="items[${idx}][quantity]"    value="${r.qty}">
        <input type="hidden" name="items[${idx}][unit]"        value="${r.unit}">
        <input type="hidden" name="items[${idx}][disc_perc]"   value="${r.disc_perc}">
        <input type="hidden" name="items[${idx}][disc_amt]"    value="${r.disc_amt}">
        <input type="hidden" name="items[${idx}][taxable]"     value="${r.taxable}">
        <input type="hidden" name="items[${idx}][vat_perc]"    value="${r.tax_perc}">
        <input type="hidden" name="items[${idx}][vat_amt]"     value="${r.tax_amt}">
        <input type="hidden" name="items[${idx}][total_price]" value="${r.total}">
        <input type="hidden" name="items[${idx}][remark]"      value="${r.remark}">
    `).join('');
        document.getElementById('hidden-inputs').innerHTML = summaryInputs + itemInputs;
    }

    /* ── Helpers ── */
    function getVal(id) {
        const el = document.getElementById(id);
        return el ? el.value : '';
    }

    function setVal(id, val) {
        const el = document.getElementById(id);
        if (el) el.value = val;
    }
</script>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3"><?= $pagetitle ?></h6>
                </div>
                <?php
                // Get invoice reference from URL
                $ref = $this->input->get('ref');
                ?>
                <div class="card-body px-4 py-3">
                    <button id="viewProductBtn"
                        class="btn btn-primary mb-2 me-2 viewProductBtn"
                        data-ref="<?= $ref ?>">
                        Preview Invoice (Ref: <?= $ref ?>)
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product Modal -->
<div id="productModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg modal-custom-width">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Product Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="productAttributesTable">
                        <thead id="productAttributesHead">
                            <tr>
                                <th class="text-center">Loading...</th>
                            </tr>
                        </thead>
                        <tbody id="productAttributesBody">
                            <tr>
                                <td class="text-center">
                                    <div class="spinner-border text-primary" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>


<!-- Include jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Product Details Script -->
<script>
    $(document).on('click', '.viewProductBtn', function() {
        // PHP injects the ref directly here
        const reference = "<?= $ref ?>";

        $('#productReference').text(reference);
        $('#productName').text('-');

        const $thead = $('#productAttributesHead');
        const $tbody = $('#productAttributesBody');

        // Show loading spinner
        $thead.html(`<tr><th class="text-center">Loading...</th></tr>`);
        $tbody.html(`
        <tr>
            <td class="text-center">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </td>
        </tr>
    `);

        $.ajax({
            url: '<?= base_url("home/get_product_details") ?>',
            method: 'GET',
            data: {
                ref: reference
            },
            dataType: 'json',
            success: function(res) {
                console.log("AJAX response:", res);

                if (res.status && res.product && Array.isArray(res.product.attributes) && res.product.attributes.length > 0) {
                    $('#productName').text(res.product.name || '-');

                    const attributeKeys = Object.keys(res.product.attributes[0] || {});
                    const visibleKeys = attributeKeys.filter(key => key !== 'Invoice Item Id');

                    let headers = `<th>Sl. No</th>`;
                    headers += visibleKeys.map(key => `<th>${key}</th>`).join('');
                    $thead.html(`<tr>${headers}</tr>`);

                    let rows = '';
                    res.product.attributes.forEach((item, index) => {
                        let row = `<td>${index + 1}</td>`;
                        row += visibleKeys.map(key => {
                            let value = item[key] ?? '-';
                            let alignment = '';

                            if (key.toLowerCase() === 'quantity') {
                                let qty = parseFloat(value);
                                if (!isNaN(qty)) {
                                    value = parseInt(qty, 10); // force integer, removes .00
                                }
                                alignment = 'text-end';
                            } else {
                                const isNumeric = !isNaN(parseFloat(value)) && isFinite(value);
                                alignment = isNumeric ? 'text-end' : '';
                            }

                            return `<td class="${alignment}">${value}</td>`;
                        }).join('');
                        rows += `<tr>${row}</tr>`;
                    });


                    $tbody.html(rows);
                } else {
                    $thead.html(`<tr><th class="text-center">No Attributes Found</th></tr>`);
                    $tbody.html(`<tr><td class="text-center">-</td></tr>`);
                }
            },
            error: function(xhr, status, error) {
                console.error("AJAX error:", status, error, xhr.responseText);
                $thead.html(`<tr><th class="text-center text-danger">Error</th></tr>`);
                $tbody.html(`<tr><td class="text-center text-danger">Error retrieving product data.</td></tr>`);
            }
        });

        new bootstrap.Modal(document.getElementById('productModal')).show();
    });
</script>
<!-- Custom Modal Styling -->
<style>
    .modal-custom-width {
        max-width: 80%;
        width: 100%;
    }

    #productModal .modal-body,
    #productModal table,
    #productModal th,
    #productModal td {
        font-size: 0.85rem;
    }

    #productModal h5,
    #productModal h6 {
        font-size: 1rem;
    }
</style>
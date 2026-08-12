<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3"><?= $pagetitle ?></h6>
                </div>
                <div class="card-body px-4 py-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product Title</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Discount</th>
                                <th>Taxable</th>
                                <th>Tax</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="mainProductTable">
                            <?php foreach ($product_list as $index => $product): ?>
                                <tr data-index="<?= $index ?>">
                                    <td style="text-align: center;"><?= $index + 1 ?></td>
                                    <td style="text-align: left;"><?= htmlspecialchars($product['name']) ?></td>
                                    <td style="text-align: center;"><?= htmlspecialchars($product['quantity']) ?></td>
                                    <td style="text-align: right;"><?= htmlspecialchars($product['price']) ?></td>
                                    <td style="text-align: right;"><?= htmlspecialchars($product['disc_amt']) ?></td>
                                    <td style="text-align: right;"><?= htmlspecialchars($product['taxable']) ?></td>
                                    <td style="text-align: right;"><?= htmlspecialchars($product['vat_amt']) ?></td>
                                    <td style="text-align: right;"><?= htmlspecialchars($product['total_price']) ?></td>
                                    <td>
                                        <button type="button"
                                            class="btn btn-sm btn-primary addSubProductBtn"
                                            data-product-id="<?= $product['id'] ?>"
                                            data-reference="<?= $product['reference'] ?>">
                                            Add
                                        </button>

                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="subProductModal" style="overflow-y: auto;">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <form id="subProductForm">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add / Edit Sub Product</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <input type="hidden" id="main_product_id" name="main_product_id" value="">
                                <input type="hidden" id="main_product_reference" name="main_product_reference" value="">
                                <div class="modal-body" style="max-height: 70vh; overflow-y: auto;">
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label>Select Product / Service</label>
                                            <select class="form-select" id="otb_products" name="otb_products">
                                                <option value="">-- Select --</option>
                                                <?php foreach ($products as $prod): ?>
                                                    <option value="<?= htmlspecialchars($prod['id']) ?>"
                                                        data-title="<?= htmlspecialchars($prod['name']) ?>"
                                                        data-unit="<?= htmlspecialchars($prod['unit']) ?>"
                                                        data-unit-id="<?= htmlspecialchars($prod['unit_id']) ?>"
                                                        data-price="0">
                                                        <?= htmlspecialchars($prod['name']) ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="col-md-8">
                                            <label>Description</label>
                                            <input type="text" class="form-control" id="otb_description" name="otb_description">
                                        </div>
                                    </div>

                                    <div class="row g-3">
                                        <div class="col-md-3">
                                            <label>Product Title</label>
                                            <input type="text" id="otb_title" name="otb_title" class="form-control" readonly>
                                        </div>
                                        <div class="col-md-2">
                                            <label>Quantity</label>
                                            <input type="number" id="otb_qty" name="otb_qty" class="form-control" value="1">
                                        </div>
                                        <div class="col-md-2">
                                            <label>Unit</label>
                                            <input type="text" id="otb_unit" name="otb_unit" class="form-control" readonly>
                                        </div>
                                        <div class="col-md-2">
                                            <label>Price</label>
                                            <input type="number" id="otb_price" name="otb_price" class="form-control" value="0">
                                        </div>
                                        <div class="col-md-2">
                                            <label>Total</label>
                                            <input type="number" id="otb_total" name="otb_total" class="form-control" value="0" readonly>
                                        </div>
                                        <div class="col-md-1 d-flex align-items-end">
                                            <button type="button" class="btn btn-primary w-100" id="addSubProduct">Add</button>
                                        </div>
                                    </div>

                                    <hr>
                                    <h6>Selected Sub Products</h6>
                                    <div class="sub-product-table">
                                        <table class="table table-sm table-bordered mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Code</th>
                                                    <th>Title</th>
                                                    <th>Description</th>
                                                    <th>Quantity</th>
                                                    <th>Unit</th>
                                                    <th>Price</th>
                                                    <th>Total</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody id="subProductListBody"></tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <input type="hidden" id="currentRowIndex">
                                    <input type="hidden" id="editIndex" value="">
                                    <input type="hidden" id="sub_product_id" name="sub_product_id" value="">
                                    <button type="submit" class="btn btn-success">Save &amp; Close</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1100">
                    <div id="toastMessage" class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="d-flex">
                            <div class="toast-body" id="toastBody">Done</div>
                            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                    </div>
                </div>

                <style>
                    .sub-product-table {
                        margin: 10px 0 20px 0;
                        border-left: 3px solid #ccc;
                        padding-left: 10px;
                    }

                    .sub-product-table td,
                    .sub-product-table th {
                        font-size: 13px;
                    }

                    .modal-body {
                        scroll-behavior: smooth;
                    }
                </style>
                <script>
                    let subProductData = {};

                    $(document).ready(function() {
                        function updateTotal() {
                            const qty = parseFloat($('#otb_qty').val()) || 0;
                            const price = parseFloat($('#otb_price').val()) || 0;
                            $('#otb_total').val((qty * price).toFixed(2));
                        }

                        $('#otb_qty, #otb_price').on('input', updateTotal);

                        $('#otb_products').on('change', function() {
                            const selected = $(this).find('option:selected');
                            $('#otb_title').val(selected.data('title') || '');
                            $('#otb_unit').val(selected.data('unit') || '');
                            $('#otb_unit').data('unit-id', selected.data('unit-id') || '');
                            $('#otb_price').val(selected.data('price') || '0');
                            updateTotal();
                        });

                        $('#subProductModal').on('shown.bs.modal', function() {
                            $('body').css('overflow', 'hidden');
                            $('#subProductModal .modal-body').css('overflow-y', 'auto');
                        });

                        $('.addSubProductBtn').on('click', function() {
                            const productId = $(this).data('product-id');
                            const reference = $(this).data('reference');

                            $('#main_product_id').val(productId);
                            $('#main_product_reference').val(reference);
                            $('#subProductForm')[0].reset();
                            $('#editIndex').val('');
                            $('#sub_product_id').val('');
                            $('#addSubProduct').text('Add');
                            $('#otb_title, #otb_unit').val('');

                            if (!subProductData[productId]) {
                                subProductData[productId] = [];
                            }

                            $.ajax({
                                url: '<?= base_url("home/get_sub_products") ?>',
                                type: 'POST',
                                data: {
                                    main_product_id: productId
                                },
                                success: function(response) {
                                    response = JSON.parse(response);
                                    if (response.status === 'success') {
                                        subProductData[productId] = response.data.map(item => ({
                                            id: item.sub_id,
                                            productCode: item.item_id,
                                            description: item.description,
                                            productTitle: item.productTitle || '',
                                            quantity: item.quantity,
                                            unit: item.unit,
                                            unit_id: item.unit_id,
                                            price: item.price,
                                            total: item.total,
                                        }));
                                        renderSubProductTable(productId);
                                    } else {
                                        alert('No sub-products found.');
                                    }
                                },
                                error: function() {
                                    alert('Failed to fetch sub products.');
                                }
                            });

                            new bootstrap.Modal(document.getElementById('subProductModal')).show();
                        });

                        $('#addSubProduct').on('click', function() {
                            const productId = $('#main_product_id').val();
                            const editIndex = $('#editIndex').val();
                            const selectedProduct = $('#otb_products').val();
                            if (!selectedProduct) {
                                showToast('Please select a product before adding.');
                                return; // stop execution
                            }
                            const updatedProduct = getProductDetails();
                            const productList = subProductData[productId] || [];

                            if (editIndex !== '') {
                                productList[parseInt(editIndex)] = updatedProduct;
                            } else {
                                productList.push(updatedProduct);
                            }

                            subProductData[productId] = productList;

                            renderSubProductTable(productId);
                            $('#subProductForm')[0].reset();
                            $('#editIndex').val('');
                            $('#sub_product_id').val('');
                            $('#addSubProduct').text('Add');
                        });

                        $('#subProductForm').on('submit', function(e) {
                            e.preventDefault();

                            const productId = $('#main_product_id').val();
                            const reference = $('#main_product_reference').val();
                            const subProducts = subProductData[productId] || [];

                            $.ajax({
                                url: '<?= base_url("home/save_sub_products") ?>',
                                type: 'POST',
                                contentType: 'application/json',
                                data: JSON.stringify({
                                    main_product_id: productId,
                                    reference: reference,
                                    subProducts: subProducts
                                }),
                                success: function(res) {
                                    const response = JSON.parse(res);
                                    showToast(response.message || 'Operation completed.');

                                    if (response.status === 'completed') {
                                        $('#subProductModal').modal('hide');
                                    }
                                },
                                error: function() {
                                    alert('Failed to send request');
                                }
                            });
                        });

                        window.renderSubProductTable = function(productId) {
                            const list = subProductData[productId] || [];
                            const rows = list.map((p, index) => {
                                const total = (parseFloat(p.quantity) * parseFloat(p.price)).toFixed(2);
                                return `
                <tr>
                    <td>${p.productCode}</td>
                    <td>${p.productTitle}</td>
                    <td>${p.description}</td>
                    <td>${p.quantity}</td>
                    <td>${p.unit}</td>
                    <td>${p.price}</td>
                    <td>${total}</td>
                    <td>
                        <button type="button" class="btn btn-sm btn-secondary me-1" onclick="editSubProduct('${productId}', ${index})">Edit</button>
                        <button type="button" class="btn btn-sm btn-danger" onclick="removeSubProduct(${index}, '${productId}')">Remove</button>
                    </td>
                </tr>`;
                            }).join('');
                            $('#subProductListBody').html(rows);
                        };

                        window.editSubProduct = function(productId, index) {
                            const productList = subProductData[productId] || [];
                            const product = productList[index];

                            if (!product) {
                                alert('Sub-product not found.');
                                return;
                            }

                            $('#otb_products').val(product.productCode).trigger('change');
                            $('#otb_title').val(product.productTitle);
                            $('#otb_description').val(product.description);
                            $('#otb_qty').val(product.quantity);
                            $('#otb_unit').val(product.unit);
                            $('#otb_unit').data('unit-id', product.unit_id);
                            $('#otb_price').val(product.price);
                            $('#sub_product_id').val(product.id ?? '');
                            $('#editIndex').val(index);
                            $('#addSubProduct').text('Update');
                        };

                        window.removeSubProduct = function(index, productId) {
                            const productList = subProductData[productId] || [];
                            const product = productList[index];

                            if (!product) return;

                            if (!product.id) {
                                // Unsaved product – just remove locally
                                productList.splice(index, 1);
                                subProductData[productId] = productList;
                                renderSubProductTable(productId);
                                return;
                            }

                            if (!confirm('Are you sure you want to delete this sub-product?')) return;

                            $.ajax({
                                url: '<?= site_url("home/delete_sub_product"); ?>',
                                type: 'POST',
                                data: {
                                    sub_id: product.id,
                                    product_id: productId,
                                },
                                success: function(response) {
                                    const res = typeof response === 'string' ? JSON.parse(response) : response;
                                    if (res.success) {
                                        productList.splice(index, 1);
                                        subProductData[productId] = productList;
                                        renderSubProductTable(productId);
                                    } else {
                                        alert(res.message || 'Failed to delete sub-product.');
                                    }
                                },
                                error: function() {
                                    alert('AJAX error while deleting sub-product.');
                                }
                            });
                        };

                        function getProductDetails() {
                            const qty = parseFloat($('#otb_qty').val()) || 0;
                            const price = parseFloat($('#otb_price').val()) || 0;
                            const total = (qty * price).toFixed(2);

                            return {
                                id: $('#sub_product_id').val() || null,
                                productCode: $('#otb_products').val(),
                                productTitle: $('#otb_title').val(),
                                description: $('#otb_description').val(),
                                quantity: qty,
                                unit: $('#otb_unit').val(),
                                unit_id: $('#otb_unit').data('unit-id') || null,
                                price: price,
                                total: total
                            };
                        }

                        function showToast(message) {
                            const toastEl = document.getElementById('toastMessage');
                            const toastBody = document.getElementById('toastBody');
                            toastBody.textContent = message;
                            const toast = new bootstrap.Toast(toastEl);
                            toast.show();
                        }
                    });
                </script>

                <!-- Bootstrap JS (Bundle includes Popper) -->
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

            </div>
        </div>
    </div>
</div>
public function productReport()
{
    $rdata = array();
    $sdata = array();
    $ndata = array();
    $rdata['pagetitle'] = 'Product Report';

    // Set up parameters
    $table_name = 'tbl_invoice i';
    $columns = 'i.*, COUNT(o.id) AS no_of_products';
    $join = [
        'tbl_outbound_items o' => 'i.reference = o.reference'
    ];
    $where = [
        'i.status' => 0
    ];

    // Get date filters from GET
    $from_date = $this->input->get('from_date');
    $to_date = $this->input->get('to_date');

    // If date filters are present, add to $where clause
    if (!empty($from_date) && !empty($to_date)) {
        // CI Active Record needs where clause in array or custom string for BETWEEN
        $this->db->where("DATE(i.inv_date) BETWEEN '$from_date' AND '$to_date'");
    } elseif (!empty($from_date)) {
        $this->db->where("DATE(i.inv_date) >=", $from_date);
    } elseif (!empty($to_date)) {
        $this->db->where("DATE(i.inv_date) <=", $to_date);
    }

    $group_by = 'i.reference';

    // Get data
    $rdata['invoices'] = $this->Intern_model->get_joined_columns($table_name, $columns, $join, $where, $group_by);

    // Load view
    $this->view_function1('ethicfintemplate/productreport.php', $rdata, $sdata, $ndata);
}

public function getInvoiceDetails()
{
    $reference = $this->input->post('reference');

    if (!$reference) {
        echo json_encode(['error' => 'Reference not provided']);
        return;
    }

    // 1. Fetch invoice details
    $invoice = $this->Intern_model->get_specific_columns(
        'tbl_invoice',
        '*',
        ['reference' => $reference, 'status' => 0]
    );

    // 2. Fetch item details with JOIN to get `uqc`
    $table_name = 'tbl_outbound_items o';
    $columns = 'o.item_name, o.quantity, o.unit_id, u.uqc';
    $join = [
        'tbl_unitofmeasure u' => 'u.id = o.unit_id'
    ];
    $where = [
        'o.reference' => $reference,
        'o.status' => 0,
        'u.status' => 0
    ];
    $items = $this->Intern_model->get_joined_columns($table_name, $columns, $join, $where);

    // 3. Get count of products
    $count_result = $this->Intern_model->get_specific_columns(
        'tbl_outbound_items',
        'COUNT(id) AS no_of_products',
        ['reference' => $reference, 'status' => 0]
    );

    // 4. Merge and respond
    if (!empty($invoice)) {
        $invoice_data = $invoice[0];
        $invoice_data['items'] = $items;
        $invoice_data['no_of_products'] = $count_result[0]['no_of_products'];

        echo json_encode($invoice_data);
    } else {
        echo json_encode(['error' => 'Invoice not found']);
    }
}
public function pdctReport()
{
    $rdata = [];
    $sdata = [];
    $ndata = [];
    $rdata['pagetitle'] = 'Product Report';

    // Get filter dates from GET or default to current week
    $from_date = $this->input->get('from_date') ;
    $to_date   = $this->input->get('to_date');

    $table_name = 'tbl_invoice i';
    $columns = 'i.*, COUNT(o.id) AS no_of_products';
    $join = [
        'tbl_outbound_items o' => 'i.reference = o.reference'
    ];

    // Prepare base where condition
    $where = ['i.status' => 0];

    // Build date filter condition as raw SQL string
    if (!empty($from_date) && !empty($to_date)) {
        // Add raw condition in model param (assuming your model supports a custom where string)
        // We'll pass this as a string, separate from the array
        $where = "DATE(i.inv_date) BETWEEN '$from_date' AND '$to_date'";
    } elseif (!empty($from_date)) {
        $where = "DATE(i.inv_date) >= '$from_date'";
    } elseif (!empty($to_date)) {
        $where = "DATE(i.inv_date) <= '$to_date'";
    } else {
        $where = '';
    }

    $group_by = 'i.reference';

    // Get invoices using model method
    // Assuming your model method can accept a custom where string as an optional 6th param
    $invoices = $this->Intern_model->get_joined_columns($table_name, $columns, $join, $where, $group_by);

    // Get items for each invoice
    foreach ($invoices as &$inv) {
        $item_table = 'tbl_outbound_items o';
        $item_columns = 'o.item_name, o.quantity, u.uqc';
        $item_join = ['tbl_unitofmeasure u' => 'u.id = o.unit_id'];
        $item_where = [
            'o.reference' => $inv['reference'],
            'o.status' => 0,
            'u.status' => 0
        ];

        $inv['items'] = $this->Intern_model->get_joined_columns($item_table, $item_columns, $item_join, $item_where);
    }

    $rdata['invoices'] = $invoices;

    $this->view_function1('ethicfintemplate/joborderreport.php', $rdata, $sdata, $ndata);
}




    public function deleteInvoice()
{
    $invoice_id = $this->input->post('reference'); // Get invoice ID from AJAX request

    $updateData = [
        'status' => 1
    ];

    // Update tbl_invoice where id = $invoice_id
    $deleted = $this->Intern_model->update_record('tbl_invoice', $updateData, ['id' => $invoice_id]);

    if ($deleted) {
        echo json_encode([
            "status" => "success",
            "message" => "Invoice deleted successfully"
        ]);
    } else {
        echo json_encode([
            "status" => "error",
            "message" => "Failed to delete invoice"
        ]);
    }
}

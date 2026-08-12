<?php
class MYPDF extends TCPDF {
	
	
    protected $image_1;

    // Constructor to accept the image path
    public function __construct($image_1, $orientation, $unit, $format, $unicode, $encoding) {
        parent::__construct($orientation, $unit, $format, $unicode, $encoding);
        $this->image_1 = $image_1;  // Assign the image path to the class property
    }

    //Page header
    public function Header() {
        // get the current page break margin
        $bMargin = $this->getBreakMargin();
        // get current auto-page-break mode
        $auto_page_break = $this->AutoPageBreak;
        // disable auto-page-break
        $this->SetAutoPageBreak(false, 0);
        // set background image
        $img_file = FCPATH . 'uploads/profile/' . $this->image_1;
        $this->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
        // restore auto-page-break status
        $this->SetAutoPageBreak($auto_page_break, $bMargin);
        // set the starting point for the page content
        $this->setPageMark();
    }
}

// Now, when creating the PDF object, pass the image file name:

if(isset($_GET['ltrh'])) {
$image_1 = $invletrhead->value1; 
} else {
	$image_1 = ''; 
}
$pdf = new MYPDF($image_1, PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$setAuthor = 'Ethicfin';
$setTitle = 'Sales Report : ';
$setSubject = '';
$setKeywords = 'Ethicfin ';
$pdf->setAuthor($setAuthor);
$pdf->setTitle($setTitle);
$pdf->setSubject($setSubject);
$pdf->setKeywords($setKeywords);

// Set custom top and bottom margins
$pdf->SetMargins(20, $d74->active, 20); // Top margin of 44
$pdf->SetAutoPageBreak(true, $d75->active); // Bottom margin of 30
$pdf->setFont('dejavusans', '', 10);
// Add a page
$pdf->AddPage();

$PDF_MARGIN_LEFT=0;
$PDF_MARGIN_TOP=0;
$PDF_MARGIN_BOTTOM=0;
$PDF_MARGIN_RIGHT=0;
$pdf->Ln(-1);

$html = '<div style="text-align:center; font-weight:bold; font-size:13px;">ADVANCED SALES REPORT/<span>تقرير المبيعات المتقدم </span></div>
    <table class="row" style="padding-bottom:3px;">
        <tr>
            <td class="col-md-6" style="text-align:left;font-weight:bold; font-size:7px;">Date Period: ' .$date_period['from_date']. '-' .$date_period['to_date']. '</td>
            <td class="col-md-6" style="text-align:right;font-weight:bold; font-size:7px;"> Branch </td>
        </tr>
    </table>';

$pdf->writeHTML($html, true, false, true, false, '');
$pdf->Ln(-4);

// Wrap the two tables inside an outer table for side-by-side placement
$html3 = '
<div style="font-weight:bold; font-size:7px;">Top 10 Best-Selling Products :</div>
<table style="width:100%;" cellspacing="0" cellpadding="1">
    <tr>
        <td style="text-align:center; font-weight:bold; font-size:7px; border:0.1px solid #000; width:5%; line-height:10px;"><span>م </span><br>Sl.No</td>
        <td style="text-align:center; font-weight:bold; font-size:7px; border:0.1px solid #000; width:60%; line-height:10px;"><span>وصف السلع / الخدمات </span><br>Product</td>
        <td style="text-align:center; font-weight:bold; font-size:7px; border:0.1px solid #000; width:16%; line-height:10px;"><span>الكمية</span><br>Quantity</td>
        <td style="text-align:center; font-weight:bold; font-size:7px; border:0.1px solid #000; width:19%; line-height:10px;"><span>الإجمالي (ريال سعودي)</span><br>Total Sales</td>
    </tr>';

// Dynamically loop over top products
$i = 1;
if (!empty($top_products) && is_array($top_products)) {
    foreach ($top_products as $product) {
        $html3 .= '
        <tr>
            <td style="text-align:center; font-weight:bold; font-size:7px; border:0.3px solid #333; padding:2px;">' . $i . '</td>
            <td style="text-align:center; font-weight:bold; font-size:7px; border:0.3px solid #333; padding:2px;">' . htmlspecialchars($product['product_name']) . '</td>
            <td style="text-align:center; font-weight:bold; font-size:7px; border:0.3px solid #333; padding:2px;">' . $product['qty_sold'] . ' ' . htmlspecialchars($product['unit']) . '</td>
            <td style="text-align:center; font-weight:bold; font-size:7px; border:0.3px solid #333; padding:2px;">' . number_format($product['total_sales'], 2) . '</td>
        </tr>';
        $i++;
    }
} else {
    $html3 .= '
        <tr>
            <td colspan="4" style="text-align:center; font-weight:bold; font-size:7px; border:0.3px solid #333; padding:2px;">No data available</td>
        </tr>';
}

$html3 .= '</table>';

$pdf->writeHTML($html3, true, false, true, false, '');
$pdf->Ln(2);

$html4 = '
<div style="font-weight:bold; font-size:7px;">Top 10 Customers By Sales :</div>
<table style="width:100%;" cellspacing="0" cellpadding="1">
<tr>
    <td style="text-align:center; font-weight:bold; font-size:7px; border:0.1px solid #000; width:10%; line-height:10px;"><span>م </span><br>Sl.No</td>
    <td style="text-align:center; font-weight:bold; font-size:7px; border:0.1px solid #000; width:60%; line-height:10px;"><span>وصف السلع / الخدمات </span><br>Customer</td>
    <td style="text-align:center; font-weight:bold; font-size:7px; border:0.1px solid #000; width:30%; line-height:10px;"><span>الوحدة</span><br>Sales</td>
</tr>';

$i = 1;
if (!empty($top_customers) && is_array($top_customers)) {
    foreach ($top_customers as $customer) {
        $html4 .= '
        <tr>
            <td style="text-align:center; font-weight:bold; font-size:7px; border:0.3px solid #333; padding:2px;">' . $i . '</td>
            <td style="text-align:center; font-weight:bold; font-size:7px; border:0.3px solid #333; padding:2px;">' . htmlspecialchars($customer['customer_name']) . '</td>
            <td style="text-align:center; font-weight:bold; font-size:7px; border:0.3px solid #333; padding:2px;">' . $customer['orders_count'] . '</td>
        </tr>';
        $i++;
    }
} else {
    $html4 .= '<tr><td colspan="3" style="text-align:center; font-weight:bold; font-size:7px; border:0.3px solid #333; padding:2px;">No data available</td></tr>';
}

$html4 .= '</table>';
$pdf->writeHTML($html4, true, false, true, false, '');
$pdf->Ln(2);
$html5 = '<div style="font-weight:bold; font-size:7px;">Sales By Category :</div>
<table style="width:100%;" cellspacing="0" cellpadding="1">
<tr>
    <td style="text-align:center; font-weight:bold; font-size:7px; border:0.1px solid #000; width:5%; line-height:10px;"><span>م </span><br>Sl.No</td>
    <td style="text-align:center; font-weight:bold; font-size:7px; border:0.1px solid #000; width:40%; line-height:10px;"><span>وصف السلع / الخدمات </span><br>Category</td>
    <td style="text-align:center; font-weight:bold; font-size:7px; border:0.1px solid #000; width:30%; line-height:10px;"><span>الكمية</span><br>Unit Sold</td>
    <td style="text-align:center; font-weight:bold; font-size:7px; border:0.1px solid #000; width:25%; line-height:10px;"><span>الإجمالي (ريال سعودي)</span><br>Total Sales('.$isocode.')</td>
</tr>';

$i = 1;
if (!empty($sales_by_category) && is_array($sales_by_category)) {
    foreach ($sales_by_category as $category) {
        $html5 .= '
        <tr>
            <td style="text-align:center; font-weight:bold; font-size:7px; border:0.3px solid #333; padding:2px;">'.$i.'</td>
            <td style="text-align:center; font-weight:bold; font-size:7px; border:0.3px solid #333; padding:2px;">'.htmlspecialchars($category['category_name']).'</td>
            <td style="text-align:center; font-weight:bold; font-size:7px; border:0.3px solid #333; padding:2px;">'.$category['units_sold'].' '.htmlspecialchars($category['unit']).'</td>
            <td style="text-align:center; font-weight:bold; font-size:7px; border:0.3px solid #333; padding:2px;">'.number_format($category['total_sales'],2).'</td>
        </tr>';
        $i++;
    }
} else {
    $html5 .= '<tr><td colspan="4" style="text-align:center; font-weight:bold; font-size:7px; border:0.3px solid #333; padding:2px;">No data available</td></tr>';
}

$html5 .= '</table>';
$pdf->writeHTML($html5, true, false, true, false, '');
$pdf->Ln(2);
$html6 = '<div style="font-weight:bold; font-size:7px;">Least-Selling Products :</div>
<table style="width:100%;" cellspacing="0" cellpadding="1">
<tr>
    <td style="text-align:center; font-weight:bold; font-size:7px; border:0.1px solid #000; width:5%; line-height:10px;"><span>م </span><br>Sl.No</td>
    <td style="text-align:center; font-weight:bold; font-size:7px; border:0.1px solid #000; width:40%; line-height:10px;"><span>وصف السلع / الخدمات </span><br>Product</td>
    <td style="text-align:center; font-weight:bold; font-size:7px; border:0.1px solid #000; width:30%; line-height:10px;"><span>الكمية</span><br>Quantity</td>
    <td style="text-align:center; font-weight:bold; font-size:7px; border:0.1px solid #000; width:25%; line-height:10px;"><span>آخر بيع</span><br>Last Sold Date</td>
</tr>';

$i = 1;
if (!empty($least_selling_products) && is_array($least_selling_products)) {
    foreach ($least_selling_products as $product) {
        $html6 .= '
        <tr>
            <td style="text-align:center; font-weight:bold; font-size:7px; border:0.3px solid #333; padding:2px;">'.$i.'</td>
            <td style="text-align:center; font-weight:bold; font-size:7px; border:0.3px solid #333; padding:2px;">'.htmlspecialchars($product['product_name']).'</td>
            <td style="text-align:center; font-weight:bold; font-size:7px; border:0.3px solid #333; padding:2px;">'.$product['qty_sold'].' '.htmlspecialchars($product['unit']).'</td>
            <td style="text-align:center; font-weight:bold; font-size:7px; border:0.3px solid #333; padding:2px;">'.htmlspecialchars(substr($product['last_sold_date'], 0, 10)).'</td>
        </tr>';
        $i++;
    }
} else {
    $html6 .= '<tr><td colspan="4" style="text-align:center; font-weight:bold; font-size:7px; border:0.3px solid #333; padding:2px;">No data available</td></tr>';
}

$html6 .= '</table>';
$pdf->writeHTML($html6, true, false, true, false, '');
$pdf->Ln(2);
$html7 = '<div style="font-weight:bold; font-size:7px;">Top Salespersons :</div>
<table style="width:100%;" cellspacing="0" cellpadding="1">
<tr>
    <td style="text-align:center; font-weight:bold; font-size:7px; border:0.1px solid #000; width:5%; line-height:10px;"><span>م </span><br>Sl.No</td>
    <td style="text-align:center; font-weight:bold; font-size:7px; border:0.1px solid #000; width:40%; line-height:10px;"><span>اسم الموظف</span><br>Name</td>
    <td style="text-align:center; font-weight:bold; font-size:7px; border:0.1px solid #000; width:30%; line-height:10px;"><span>عدد الطلبات</span><br>Orders</td>
    <td style="text-align:center; font-weight:bold; font-size:7px; border:0.1px solid #000; width:25%; line-height:10px;"><span>إجمالي المبيعات</span><br>Total Sales('.$isocode.')</td>
</tr>';

$i = 1;
if (!empty($top_salespersons) && is_array($top_salespersons)) {
    foreach ($top_salespersons as $salesperson) {
        $html7 .= '
        <tr>
            <td style="text-align:center; font-weight:bold; font-size:7px; border:0.3px solid #333; padding:2px;">'.$i.'</td>
            <td style="text-align:center; font-weight:bold; font-size:7px; border:0.3px solid #333; padding:2px;">'.htmlspecialchars($salesperson['employee_name']).'</td>
            <td style="text-align:center; font-weight:bold; font-size:7px; border:0.3px solid #333; padding:2px;">'.$salesperson['orders_count'].'</td>
            <td style="text-align:center; font-weight:bold; font-size:7px; border:0.3px solid #333; padding:2px;">'.number_format($salesperson['total_sales'],2).'</td>
        </tr>';
        $i++;
    }
} else {
    $html7 .= '<tr><td colspan="4" style="text-align:center; font-weight:bold; font-size:7px; border:0.3px solid #333; padding:2px;">No data available</td></tr>';
}

$html7 .= '</table>';
$pdf->writeHTML($html7, true, false, true, false, '');
$pdf->Ln(2);

$pdf->Output('advanced_report.pdf', 'I');
//============================================================+
// END OF FILE
//============================================================+
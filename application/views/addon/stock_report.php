<?php
class MYPDF extends TCPDF
{
    protected $image_1;

    public function __construct($image_1, $orientation, $unit, $format, $unicode, $encoding)
    {
        parent::__construct($orientation, $unit, $format, $unicode, $encoding);
        $this->image_1 = $image_1;
    }

    public function Header()
    {
        if ($this->image_1 != '') {
            $img_file = FCPATH . 'uploads/profile/' . $this->image_1;
            $this->Image($img_file, 0, 0, $this->getPageWidth(), $this->getPageHeight(), '', '', '', false, 300, '', false, false, 0);
        }

        // Add space from top (move cursor down 15 units)
        $this->Ln(15);

        // Title text only (no background)
        $this->SetFont('helvetica', 'B', 14);
        $this->SetTextColor(0, 0, 0); // Black text
        $this->Cell(0, 12, 'STOCK REPORT', 0, 1, 'C', false, '', 0, false, 'T', 'M');

        $this->Ln(5); // extra spacing after header
    }



    public function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('helvetica', 'I', 8);
        $this->SetTextColor(150, 150, 150);
        $this->Cell(0, 10, 'Ethicfin © ' . date('Y') . ' | Page ' . $this->getAliasNumPage() . ' of ' . $this->getAliasNbPages(), 0, false, 'C');
    }
}

// --- Create PDF ---
$image_1 = isset($_GET['ltrh']) ? $invletrhead->value1 : '';
$pdf = new MYPDF($image_1, 'L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->SetCreator(PDF_CREATOR);
$pdf->setAuthor('Ethicfin');
$pdf->setTitle('Stock Report');
$pdf->SetMargins(10, 35, 10);
$pdf->SetAutoPageBreak(true, 20);
$pdf->setPrintFooter(true);
$pdf->AddPage();

// --- Table styling ---
$pdf->SetFont('dejavusans', '', 8);

// Column widths adjusted like your design (longer "Item" col)
$colWidths = [
    'slno'          => '5%',
    'item_code'     => '10%',
    'name'          => '20%',
    'unitname'      => '7%',
    'opening_qty'   => '7%',
    'inflow_qty'    => '7%',
    'outflow_qty'   => '7%',
    'closing_qty'   => '7%',
    'opening_value' => '8%',
    'inflow_value'  => '8%',
    'outflow_value' => '8%',
    'stock_value'   => '8%',
];

$html = '
<style>
    table {
        border-collapse: collapse;
    }
    thead th{
        background-color:#344767; color:#fff; font-weight:bold; 
        padding:4px; font-size:9px; text-align:center;
    }
    thead td {
        background-color: #344767;
        color: #ffffff;
        font-weight: bold;
        text-align: center;
        border: 0.5px solid #cccccc;
        font-size: 9px;
        padding: 4px;
    }
    tbody td {
        border: 0.5px solid #cccccc;
        font-size: 8px;
        padding: 3px;
    }
    .even { background-color: #f4f6f8; }
    .odd  { background-color: #ffffff; }
</style>
<table cellpadding="3" cellspacing="0" width="100%">
<thead>
<tr class="table-header">
    <td width="' . $colWidths['slno'] . '" align="center"><b>Sl No</b></td>
    <td width="' . $colWidths['item_code'] . '" align="center"><b>Item Code</b></td>
    <td width="' . $colWidths['name'] . '" align="center"><b>Item</b></td>
    <td width="' . $colWidths['unitname'] . '" align="center"><b>UOM</b></td>
    <td width="' . $colWidths['opening_qty'] . '" align="center"><b>Opening Qty</b></td>
    <td width="' . $colWidths['inflow_qty'] . '" align="center"><b>Inflow Qty</b></td>
    <td width="' . $colWidths['outflow_qty'] . '" align="center"><b>Outflow Qty</b></td>
    <td width="' . $colWidths['closing_qty'] . '" align="center"><b>Closing Qty</b></td>
    <td width="' . $colWidths['opening_value'] . '" align="center"><b>Opening Value</b></td>
    <td width="' . $colWidths['inflow_value'] . '" align="center"><b>Inflow Value</b></td>
    <td width="' . $colWidths['outflow_value'] . '" align="center"><b>Outflow Value</b></td>
    <td width="' . $colWidths['stock_value'] . '" align="center"><b>Stock Value</b></td>
</tr>
<tr>
  <td colspan="12" style="padding:0;height:0;line-height:0;border-top:0.5px solid #000;"></td>
</tr>

</thead>

<tbody>';

$rows = 1;
foreach ($stockData as $row) {
    $class = ($rows % 2 == 0) ? 'even' : 'odd';
    $html .= '<tr class="' . $class . '">';
    $html .= '<td width="' . $colWidths['slno'] . '" align="center">' . $rows . '</td>';
    $html .= '<td width="' . $colWidths['item_code'] . '" align="center">' . $row['item_code'] . '</td>';
    $html .= '<td width="' . $colWidths['name'] . '" align="left">' . $row['name'] . '</td>';
    $html .= '<td width="' . $colWidths['unitname'] . '" align="center">' . $row['unitname'] . '</td>';
    $html .= '<td width="' . $colWidths['opening_qty'] . '" align="right">' . $row['opening_qty'] . '</td>';
    $html .= '<td width="' . $colWidths['inflow_qty'] . '" align="right">' . $row['inflow_qty'] . '</td>';
    $html .= '<td width="' . $colWidths['outflow_qty'] . '" align="right">' . $row['outflow_qty'] . '</td>';
    $html .= '<td width="' . $colWidths['closing_qty'] . '" align="right">' . $row['closing_qty'] . '</td>';
    $html .= '<td width="' . $colWidths['opening_value'] . '" align="right">' . number_format($row['opening_value'], $bcdp) . '</td>';
    $html .= '<td width="' . $colWidths['inflow_value'] . '" align="right">' . number_format($row['inflow_value'], $bcdp) . '</td>';
    $html .= '<td width="' . $colWidths['outflow_value'] . '" align="right">' . number_format($row['outflow_value'], $bcdp) . '</td>';
    $html .= '<td width="' . $colWidths['stock_value'] . '" align="right">' . number_format($row['stock_value'], $bcdp) . '</td>';
    $html .= '</tr>';
    $rows++;
}

$html .= '</tbody></table>';

$pdf->writeHTML($html, true, false, true, false, '');
$pdf->lastPage();
$pdf->Output('stock_report.pdf', 'I');

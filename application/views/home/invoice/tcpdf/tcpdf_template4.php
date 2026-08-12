<?php


//$PDF_HEADER_LOGO='image1.png';
$PDF_HEADER_LOGO = '../../../../../uploads/profile/' . $headerimage->value1;

//$CalibriRegular = TCPDF_FONTS::addTTFfont(APPPATH . 'libraries/tcpdf/fonts/Calibri/Calibri Regular/Calibri Regular.ttf', 'TrueTypeUnicode', '', 32);

$PDF_HEADER_TITLE = $comp['name'];
$PDF_HEADER_LOGO_WIDTH = '50';
//$PDF_UNIT='pt';
$PDF_UNIT = 'mm';
$PDF_PAGE_FORMAT = 'A4';
$PDF_PAGE_ORIENTATION = 'p';  //'L' 

$setAuthor = 'Ethicfin';
$setTitle = 'INVOICE';
$setSubject = $details['inv_no'];
$setKeywords = 'Ethicfin ' . $compprof['name'];
//$PDF_HEADER_STRING=" Signin \n Beyond being online\n 9567860174";
$PDF_HEADER_STRING = $compprof['name'] . "\n" . $compprof['contact_no1'] . "\n" . $compprof['email'];
$PDF_MARGIN_LEFT = '5';

if ($d76->active == 0) {
    $PDF_MARGIN_TOP = $d74->active;
} else {
    $PDF_MARGIN_TOP = '25';
}
$PDF_MARGIN_LEFT = '0';
$PDF_MARGIN_RIGHT = '0';
$PDF_MARGIN_HEADER = '0';
//$PDF_MARGIN_FOOTER='10';
//$PDF_MARGIN_BOTTOM='10';



if ($d77->active == 0) {
    $PDF_MARGIN_BOTTOM = $d75->active;
    //$PDF_MARGIN_BOTTOM=30;
    $PDF_MARGIN_FOOTER = 0;
} else {
    $PDF_MARGIN_BOTTOM = '0';
    $PDF_MARGIN_FOOTER = '0';
}

// create new PDF document
class CustomTCPDF extends TCPDF
{
    private $footerImage;

    public function __construct($footerImage, $orientation, $unit, $format, $unicode, $encoding, $diskcache)
    {
        parent::__construct($orientation, $unit, $format, $unicode, $encoding, $diskcache);
        $this->footerImage = $footerImage;
    }

    public function Footer()
    {
        $footerImageWidth = $this->getPageWidth() - ($this->getMargins()['right'] + $this->getMargins()['left']);
        $footerImageHeight = 20;
        if (file_exists($this->footerImage)) {
            $imageInfo = getimagesize($this->footerImage);
            $imageType = $imageInfo[2];

            // Calculate height based on aspect ratio
            $aspectRatio = $imageInfo[0] / $imageInfo[1];
            $footerImageHeight = $footerImageWidth / $aspectRatio;


        }



        $footerImageX = ($this->getPageWidth() - $footerImageWidth) / 2;
        $footerImageY = $this->getPageHeight() - $footerImageHeight;

        if (file_exists($this->footerImage)) {
            $imageInfo = getimagesize($this->footerImage);
            $imageType = $imageInfo[2];

            if ($imageType === IMAGETYPE_JPEG) {
                $this->Image($this->footerImage, $footerImageX, $footerImageY, $footerImageWidth, $footerImageHeight, 'JPG', '', '', true, 150, '', false, false, 0, false, false, false);
            } else if ($imageType === IMAGETYPE_PNG) {
                $this->Image($this->footerImage, $footerImageX, $footerImageY, $footerImageWidth, $footerImageHeight, 'PNG', '', '', true, 150, '', false, false, 0, false, false, false);
            } else {
                // Handle unsupported image format
                $this->SetTextColor(255, 0, 0);
                $this->SetXY($footerImageX, $footerImageY);
                $this->Cell($footerImageWidth, $footerImageHeight, '', 0, 0, 'C');
            }
        } else {
            // Handle image not found error
            $this->SetTextColor(255, 0, 0);
            $this->SetXY($footerImageX, $footerImageY);
            $this->Cell($footerImageWidth, $footerImageHeight, '', 0, 0, 'C');
        }


        parent::Footer();
    }
}
if ($footrst['value1'] == "1") {
    if ($footrstx['value1'] != "") {
        $footerImage = FCPATH . 'uploads/profile/' . $footerimage->value1;
    } else {
        $footerImage = '';
    }
} else {
    $footerImage = '';
}
$pdf = new CustomTCPDF($footerImage, $PDF_PAGE_ORIENTATION, $PDF_UNIT, $PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor($setAuthor);
$pdf->setTitle($setTitle);
$pdf->setSubject($setSubject);
$pdf->setKeywords($setKeywords);
if ($headerinprint->value1 == 1) {
    $headerImageWidth = $pdf->getPageWidth();
    $pdf->setHeaderData($PDF_HEADER_LOGO, $headerImageWidth, '', '', array(0, 0, 0), array(255, 255, 255));
} else {
    $pdf->SetHeaderData('', 0, '', '', array(0, 0, 0), array(255, 255, 255));
}
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->setMargins($PDF_MARGIN_LEFT, $PDF_MARGIN_TOP, $PDF_MARGIN_RIGHT, $PDF_MARGIN_BOTTOM);
$pdf->setHeaderMargin($PDF_MARGIN_HEADER);
$pdf->setFooterMargin($PDF_MARGIN_FOOTER);
$pdf->setAutoPageBreak(TRUE, $PDF_MARGIN_BOTTOM);
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
//$pdf->setFont($CalibriRegular, '', 12);
$pdf->SetFont('dejavusans', '', 9);
$pdf->AddPage();
$pdf->Ln(-1);


//$pdf->SetFont($CalibriRegular, '', 12);
$pdf->SetFont('dejavusans', '', 9);
$pdf->Ln();
//$pdf->SetFont($CalibriRegular, 'B', 12);
$pdf->SetFont('dejavusans', '', 9);
$doctypehtml = '



<table border="0" cellspacing="0" cellpadding="4" >	
	<tr style="font-weight:bold;">
        <td style="color:red;text-align: center; height:1px;font-weight: bolder;font-size:15px; border-bottom:1px solid #e0e0e0;">TAX INVOICE / فاتورة ضريبية </td>	</tr>	
</table>';

// output the HTML content
$pdf->writeHTML($doctypehtml, true, false, true, false, '');
$pdf->Ln(-4);
if ($d51->active == '154') {

    function __getLength($value)
    {
        return strlen($value);
    }

    function __toHex($value)
    {
        return pack("H*", sprintf("%02X", $value));
    }

    function __toString($__tag, $__value, $__length)
    {
        $value = (string) $__value;
        return __toHex($__tag) . __toHex($__length) . $value;
    }

    function __getTLV($dataToEncode)
    {
        $__TLVS = '';
        for ($i = 0; $i < count($dataToEncode); $i++) {
            $__tag = $dataToEncode[$i][0];
            $__value = $dataToEncode[$i][1];
            $__length = __getLength($__value);
            $__TLVS .= __toString($__tag, $__value, $__length);
        }

        return $__TLVS;
    }



    $dataToEncode = [
        [1, $comp['name']],
        [2, $comp['gstin']],
        [3, date('Y-m-d H:i:s', strtotime($details['inv_date']))],
        [4, $details['grand_total']],
        [5, $details['vat']]
    ];

    $__TLV = __getTLV($dataToEncode);
    $__QR = base64_encode($__TLV);
    $__QR;
    //$logo = 'https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl='.$__QR.'&chf=bg,s,00000000'; // Replace with the actual path to your image
    $encodedData = $__QR;

} else {

    $qrCodeData = "INVOICE No: " . $details['inv_no'] . "\n";
    $qrCodeData .= "Amount: " . $details['grand_total'] . "\n";
    $qrCodeData .= "Date: " . date('d-M-Y', strtotime($details['inv_date'])) . "\n";
    $qrCodeData .= "" . $comp['name'] . "\n";
    $qrCodeData .= "Contact: " . $compprof['contact_no1'] . "\n";
    $qrCodeData .= $compprof['website'];
    $encodedData = urlencode($qrCodeData);
    //$logo = 'https://chart.googleapis.com/chart?chs=160x160&cht=qr&chl='.$encodedData.'&chf=bg,s,00000000'; // Replace with the actual path to your image

}

//$pdf->SetFont($CalibriRegular, '', 12);
$pdf->SetFont('dejavusans', '', 9);

$address_lines = array(
    $badr['address_line1'],
    $badr['address_line2'],
    $badr['address_line3'],
    $badr['address_line4'],
    $badr['address_line5'],
    $badr['address_code']
);
$filtered_address_lines = array_filter($address_lines, function ($line) {
    return $line != '';
});



$htmlinv = '
            <table style="border-collapse: collapse;width: 100%;font-family: arial;font-size: 12px;" cellspacing="0" cellpadding="0">
                        <tr>
                            <td style="color: #202940;line-height: 20px;width:39.8%;padding: 0;">
                                <b class="tm_primary_color">BUYER DETAILS:</b>
                                <br>' . $badr['address_line1'] . $badr_lang2['address_line1'] . '
                                <br>' . $badr['address_line2'] . $badr_lang2['address_line2'] . '
                                <br>
                Phone: ' . $compprof['contact_no1'] . '<br>
                VAT No : ' . $details['vat'] . '
              
                            </td>
                            <td style="width:60%;padding: 0;">
                                <table style="border-collapse: collapse;width: 100%;font-family: arial;font-size: 12px;color: #202940;line-height:18px;" cellspacing="0" cellpadding="3">
                    <tr>
                        <td style="border: none;">Invoice No</td>
                        <td style="text-align:left;border-bottom: 1px solid #dbdfea;">' . $details['inv_no'] . '</td>
                        <td style="text-align:right;border-bottom: 1px solid #dbdfea;">رقم الفاتورة</td>
                    </tr>
                    <tr>
                        <td style="border: none;">Invoice Date</td>
                        <td style="text-align:left;border-bottom: 1px solid #dbdfea;">' . $details['inv_date'] . '</td>
                        <td style="text-align:right;border-bottom: 1px solid #dbdfea;">تاريخ الفاتورة</td>
                    </tr>
                    <tr>
                        <td style="border: none;">DN No</td>
                        <td style="text-align:left;border-bottom: 1px solid #dbdfea;"></td>
                        <td style="text-align:right;border-bottom: 1px solid #dbdfea;">رقم الاقتباس</td>
                    </tr>
                    <tr>
                        <td style="border: none;">DN Date</td>
                        <td style="text-align:left;border-bottom: 1px solid #dbdfea;"></td>
                        <td style="text-align:right;border-bottom: 1px solid #dbdfea;">اشاره العملاء</td>
                    </tr>
                    <tr>
                        <td style="border: none;">Mode of Pay</td>
                        <td style="text-align:left;border-bottom: 1px solid #dbdfea;"></td>
                        <td style="text-align:right;border-bottom: 1px solid #dbdfea;">طريقة الدفع</td>
                    </tr>
                    <tr>
                        <td style="border: none;">PO No</td>
                        <td style="text-align:left;border-bottom: 1px solid #dbdfea;"></td>
                        <td style="text-align:right;border-bottom: 1px solid #dbdfea;">رقم الطلب الشراء</td>
                    </tr>
                    <tr>
                        <td style="border: none;">PO Date</td>
                        <td style="text-align:left;border-bottom: 1px solid #dbdfea;">14-Sep-2023</td>
                        <td style="text-align:right;border-bottom: 1px solid #dbdfea;">تاريخ امر الشراء</td>
                    </tr>
                    <tr>
                        <td style="border: none;">Period</td>
                        <td style="text-align:left;border-bottom: 1px solid #dbdfea;">' . $details['inv_from'] . '</td>
                        <td style="text-align:right;border-bottom: 1px solid #dbdfea;">الفترة</td>
                    </tr>
                </table>
                                
                            </td>
                        </tr>
                    </table>';

function getDisplayStyle($templates, $dynamicValue)
{
    // Extract field_id values from the templates array
    // $field_ids = array_column($templates, 'field_id');

    // Check if the dynamic value is in the field_ids array
    return in_array($dynamicValue, $templates) ? 'display:none1;' : 'display:none;';
}
$content = '<table>
                    <tr>
                        <td style="padding: 0;">
                             &nbsp;
                        </td>
                    </tr>
                    </table>
                    <table style="width: 100%;font-family: arial, sans-serif;border: 1px solid #c3c6cf;font-size: 13px;" cellpadding="4"  cellspacing="0">
                      <thead>

                        <tr>         
 ';
(in_array(1, $templates)) ? $content .= '<th style="text-align: left;background-color: #f5f6fa;border-bottom: 1px solid #c3c6cf;line-height: 14px;' . getDisplayStyle($templates, 1) . '">S.N</th> ' : '';
(in_array(3, $templates)) ? $content .= '<th style="text-align: left;background-color: #f5f6fa;border-bottom: 1px solid #c3c6cf;line-height: 14px;' . getDisplayStyle($templates, 3) . '">Item Code</th> ' : '';
(in_array(4, $templates)) ? $content .= '<th style="text-align: left;background-color: #f5f6fa;border-bottom: 1px solid #c3c6cf;line-height: 14px;' . getDisplayStyle($templates, 4) . '">HSN Code</th> ' : '';
(in_array(2, $templates)) ? $content .= '<th style="text-align: left;background-color: #f5f6fa;border-bottom: 1px solid #c3c6cf;line-height: 14px;' . getDisplayStyle($templates, 2) . '">Item</th> ' : '';
(in_array(35, $templates)) ? $content .= '<th style="text-align: left;background-color: #f5f6fa;border-bottom: 1px solid #c3c6cf;line-height: 14px;' . getDisplayStyle($templates, 35) . '"> Description</th> ' : '';
(in_array(39, $templates)) ? $content .= '<th style="text-align: left;background-color: #f5f6fa;border-bottom: 1px solid #c3c6cf;line-height: 14px;' . getDisplayStyle($templates, 39) . '">MRP</th> ' : '';
(in_array(37, $templates)) ? $content .= '<th style="text-align: left;background-color: #f5f6fa;border-bottom: 1px solid #c3c6cf;line-height: 14px;' . getDisplayStyle($templates, 37) . '">Price</th> ' : '';
(in_array(38, $templates)) ? $content .= '<th style="text-align: left;background-color: #f5f6fa;border-bottom: 1px solid #c3c6cf;line-height: 14px;' . getDisplayStyle($templates, 38) . '">Qty</th> ' : '';

(in_array(36, $templates)) ? $content .= '<th style="text-align: left;background-color: #f5f6fa;border-bottom: 1px solid #c3c6cf;line-height: 14px;' . getDisplayStyle($templates, 36) . '"> Unit</th> ' : '';

(in_array(5, $templates)) ? $content .= '<th style="text-align: left;background-color: #f5f6fa;border-bottom: 1px solid #c3c6cf;line-height: 14px;' . getDisplayStyle($templates, 5) . '">Discount %</th> ' : '';

(in_array(6, $templates)) ? $content .= '<th style="text-align: left;background-color: #f5f6fa;border-bottom: 1px solid #c3c6cf;line-height: 14px;' . getDisplayStyle($templates, 6) . '">Discount_Amount</th> ' : '';

(in_array(7, $templates)) ? $content .= '<th style="text-align: left;background-color: #f5f6fa;border-bottom: 1px solid #c3c6cf;line-height: 14px;' . getDisplayStyle($templates, 7) . '">Vat %</th> ' : '';
(in_array(9, $templates)) ? $content .= '<th style="text-align: left;background-color: #f5f6fa;border-bottom: 1px solid #c3c6cf;line-height: 14px;' . getDisplayStyle($templates, 9) . '">IGST %</th> ' : '';
(in_array(10, $templates)) ? $content .= '<th style="text-align: left;background-color: #f5f6fa;border-bottom: 1px solid #c3c6cf;line-height: 14px;' . getDisplayStyle($templates, 10) . '">IGST Amount</th> ' : '';
(in_array(11, $templates)) ? $content .= '<th style="text-align: left;background-color: #f5f6fa;border-bottom: 1px solid #c3c6cf;line-height: 14px;' . getDisplayStyle($templates, 11) . '">CGST %</th> ' : '';
(in_array(12, $templates)) ? $content .= '<th style="text-align: left;background-color: #f5f6fa;border-bottom: 1px solid #c3c6cf;line-height: 14px;' . getDisplayStyle($templates, 12) . '">CGST Amount</th> ' : '';

(in_array(13, $templates)) ? $content .= '<th style="text-align: left;background-color: #f5f6fa;border-bottom: 1px solid #c3c6cf;line-height: 14px;' . getDisplayStyle($templates, 13) . '">SGST %</th> ' : '';
(in_array(14, $templates)) ? $content .= '<th style="text-align: left;background-color: #f5f6fa;border-bottom: 1px solid #c3c6cf;line-height: 14px;' . getDisplayStyle($templates, 14) . '">SGST Amount</th> ' : '';

(in_array(15, $templates)) ? $content .= '<th style="text-align: left;background-color: #f5f6fa;border-bottom: 1px solid #c3c6cf;line-height: 14px;' . getDisplayStyle($templates, 15) . '">Discount_Amount</th> ' : '';
(in_array(16, $templates)) ? $content .= '<th style="text-align: left;background-color: #f5f6fa;border-bottom: 1px solid #c3c6cf;line-height: 14px;' . getDisplayStyle($templates, 16) . '">CessAmount</th> ' : '';
(in_array(33, $templates)) ? $content .= '<th style="text-align: left;background-color: #f5f6fa;border-bottom: 1px solid #c3c6cf;line-height: 14px;' . getDisplayStyle($templates, 33) . '">Taxable</th> ' : '';
(in_array(34, $templates)) ? $content .= '<th style="text-align: left;background-color: #f5f6fa;border-bottom: 1px solid #c3c6cf;line-height: 14px;' . getDisplayStyle($templates, 34) . '">Total</th> ' : '';
$content .= '  
                        </tr>
                      </thead>
                      <tbody>';
$tot = 0;
$i = 1;
$amt = 0;
$txamt = 0;
$disc_amt = 0;
$t = 0;
$s = 0;
$c = 0;
$cess = 0;
$g = 0;
$sl = 1;
foreach ($items as $item) {
    $content .= ' <tr>';
    (in_array(1, $templates)) ? $content .=
        '<td style="text-align: left;border-bottom: 1px solid #c3c6cf;line-height: 20px;">' . $i . '</td>' : '';
    (in_array(3, $templates)) ? $content .=
        '<td style="text-align: left;border-bottom: 1px solid #c3c6cf;line-height: 20px;">' . $item['item_code'] . '</td>' : '';
    (in_array(4, $templates)) ? $content .=
        '<td style="text-align: left;border-bottom: 1px solid #c3c6cf;line-height: 20px;">' . $item['hsn_code'] . '</td>' : '';
    (in_array(2, $templates)) ? $content .=
        '<td style="text-align: left;border-bottom: 1px solid #c3c6cf;line-height: 20px;">' . $item['item_name'] . '</td>' : '';
    (in_array(35, $templates)) ? $content .=
        '<td style="text-align: left;border-bottom: 1px solid #c3c6cf;line-height: 20px;">' . number_format($item['description']) . '</td>' : '';
    (in_array(39, $templates)) ? $content .=
        '<td style="text-align: left;border-bottom: 1px solid #c3c6cf;line-height: 20px;">' . number_format($item['mrp']) . '</td>' : '';
    (in_array(37, $templates)) ? $content .=
        '<td style="text-align: left;border-bottom: 1px solid #c3c6cf;line-height: 20px;">' . number_format($item['price']) . '</td>' : '';
    (in_array(38, $templates)) ? $content .=
        '<td style="text-align: left;border-bottom: 1px solid #c3c6cf;line-height: 20px;">' . number_format($item['quantity']) . '</td>' : '';
    (in_array(36, $templates)) ? $content .=
        '<td style="text-align: left;border-bottom: 1px solid #c3c6cf;line-height: 20px;">' . $item['unit'] . '</td>' : '';
    (in_array(5, $templates)) ? $content .=
        '<td style="text-align: left;border-bottom: 1px solid #c3c6cf;line-height: 20px;">' . $item['disc_perc']     . '</td>' : '';
    (in_array(6, $templates)) ? $content .=
        '<td style="text-align: left;border-bottom: 1px solid #c3c6cf;line-height: 20px;">' . number_format($item['disc_amt']) . '</td>' : '';
    (in_array(7, $templates)) ? $content .=
        '<td style="text-align: left;border-bottom: 1px solid #c3c6cf;line-height: 20px;">' . number_format($item['vat_perc']) . '</td>' : '';
    (in_array(9, $templates)) ? $content .=
        '<td style="text-align: left;border-bottom: 1px solid #c3c6cf;line-height: 20px;">' . number_format($item['igst_perc']) . '</td>' : '';
    (in_array(10, $templates)) ? $content .=
        '<td style="text-align: left;border-bottom: 1px solid #c3c6cf;line-height: 20px;">' . number_format($item['igst_amt']) . '</td>' : '';
    (in_array(11, $templates)) ? $content .=
        '<td style="text-align: left;border-bottom: 1px solid #c3c6cf;line-height: 20px;">' . number_format($item['cgst_perc']) . '</td>' : '';
    (in_array(12, $templates)) ? $content .=
        '<td style="text-align: left;border-bottom: 1px solid #c3c6cf;line-height: 20px;">' . number_format($item['cgst_amt']) . '</td>' : '';
    (in_array(13, $templates)) ? $content .=
        '<td style="text-align: left;border-bottom: 1px solid #c3c6cf;line-height: 20px;">' . number_format($item['sgst_perc']) . '</td>' : '';
    (in_array(14, $templates)) ? $content .=
        '<td style="text-align: left;border-bottom: 1px solid #c3c6cf;line-height: 20px;">' . number_format($item['sgst_amnt']) . '</td>' : '';
    (in_array(15, $templates)) ? $content .=
        '<td style="text-align: left;border-bottom: 1px solid #c3c6cf;line-height: 20px;">' . number_format($item['cess_perc']) . '</td>' : '';
    (in_array(16, $templates)) ? $content .=
        '<td style="text-align: left;border-bottom: 1px solid #c3c6cf;line-height: 20px;">' . number_format($item['cess_amnt']) . '</td>' : '';
    (in_array(33, $templates)) ? $content .=
        '<td style="text-align: left;border-bottom: 1px solid #c3c6cf;line-height: 20px;">' . number_format($item['quantity'] * $item['price']) . '</td>' : '';
    (in_array(34, $templates)) ? $content .=
        '<td style="text-align: left;border-bottom: 1px solid #c3c6cf;line-height: 20px;">' . number_format(($item['quantity'] * $item['price']) - $item['disc_amt']) . '</td>' : '';

    $content .= ' </tr>';
    $tot = $tot + $item['taxable'];
    $disc_amt = $disc_amt + $item['disc_amt'];
    $amt = $amt + $item['price'] * $item['quantity'];
    $txamt = $txamt + ($item['price'] * $item['quantity'] * $details['vat'] / 100);
}
// <tr>   <td width="5%"></td> <td width="90%">' . $htmlinv . '</td> <td width="5%"></td> 
$content .= '



  <table cellspacing="0" cellpadding="5" style="width: 100%;border-collapse: collapse;font-size: 13px;">
        <tr>
            <td style="padding: 0;vertical-align: top;width: 60%">
                <table cellspacing="0" cellpadding="0" style="width: 100%;border-collapse: collapse;line-height: 20px;font-size: 11px;">
                    <tr>
                        <td>
                        <b>Bank Details</b><br>
        Account Name / إسم الحساب :' . $bankdet->acc_name . '<br>
        Bank Name / اسم البنك : 	' . $bankdet->name . '<br>
        Account Number / : ' . $bankdet->acc_no . '<br>
        IBAN No / رقم الآيبان : ' . $bankdet->iban_no . '
                        </td>
                    </tr>


                </table>
            </td>
            <td style="padding: 0;vertical-align: top;width: 40%">
                <table cellspacing="0" cellpadding="5" style="width: 100%;border-collapse: collapse;" class="tab1">
                      <tbody>
                            <tr>
                              <td style="text-align: left;line-height: 18px;width:70%;">Total Amount</td>
                              <td style="text-align: right;line-height: 18px;width:30%;">' . $tot . '</td>
                            </tr>
                            <tr>
                              <td style="text-align: left;line-height: 18px;width:70%;">Discount</td>
                              <td style="text-align: right;line-height: 18px;width:30%;">' . number_format($disc_amt, 2) . '</td>
                            </tr>
                            <tr>
                              <td style="text-align: left;line-height: 18px;width:70%;">Net Amount</td>
                              <td style="text-align: right;line-height: 18px;width:30%;">' . $amt . '</td>
                            </tr>
                            <tr>
                              <td style="text-align: left;line-height: 18px;width:70%;border-bottom: 1px solid #dddddd;">VAT</td>
                              <td style="text-align: right;border-bottom: 1px solid #dddddd;line-height: 20px;width:30%;">' . number_format($details['vat'], 2) . '</td>
                            </tr>
                            <tr class="tm_border_top tm_border_bottom_0">
                              <td style="text-align: left;line-height: 20px;width:70%;"><b>Grand Total</b></td>
                                <td style="text-align: right;line-height: 20px;width:30%;"><b>' . number_format($details['grand_total'], 2) . '</b></td>
                            </tr>
                      </tbody>
                </table>

            </td>
        </tr>

</table>
    </table>';
$termsandcondition = '

    <table style="width: 100%;border-collapse: collapse;border: 1px solid #c3c6cf;font-size: 13px;" cellspacing="0" cellpadding="6">
      <tr>
        <td style="width: 20%;"></td>
        <td style="color: #666;padding: 20px;line-height: 20px;vertical-align: middle;width:80%;">
            <b>Terms and Condition</b><br>
            1.50% As an advance payment balance<br>
            2.50% Advance payment<br>
            3.100% advance payment<br>
            4.LC 30 days<br>
            5.LC 30 days<br>
            6.Quotation validity one week
          </td>
      </tr>
  </table>
  <table style="width: 100%;border-collapse: collapse;border: 1px solid #c3c6cf;font-size: 13px;" cellspacing="0" cellpadding="6">
      <tr>
        <td style="width: 50%;color: #666;padding: 20px;line-height: 20px;text-align: left;">hellow@yourdomain.com</td>
        <td style="color: #666;padding: 20px;line-height: 20px;vertical-align: middle;width:50%;text-align: right;">
            www.yourdomain.com
          </td>
      </tr>
  </table>';








$newhtmlinv = '<table border="0" cellpadding="1">
<tbody>
 <tr>   <td width="5%"></td> <td width="90%">' . $htmlinv . '</td> <td width="5%"></td>  
   
</tr>
</tbody>
</table>';
$pdf->writeHTML($newhtmlinv, true, false, true, false, '');
$newhtmlinv1 = '<table border="0" cellpadding="1">
<tbody>
 <tr>   <td width="5%"></td> <td width="90%">' . $content . '</td> <td width="5%"></td>  
   
</tr>
</tbody>
</table>';
$pdf->writeHTML($newhtmlinv1, true, false, true, false, '');

$newhtmlinv2 = '<table border="0" cellpadding="1">
  <tbody>
    <tr>   <td width="5%"></td> <td width="90%"></td> <td width="5%"></td> </tr> 
       <tr>   <td width="5%"></td> <td width="90%"></td> <td width="5%"></td> </tr> 
         <tr>   <td width="5%"></td> <td width="90%"></td> <td width="5%"></td> </tr>  
          <tr>   <td width="5%"></td> <td width="90%"></td> <td width="5%"></td> </tr> 
  <tr>   <td width="5%"></td> <td width="90%"></td> <td width="5%"></td> </tr> 
    <tr>   <td width="5%"></td> <td width="90%"></td> <td width="5%"></td> </tr> 
      <tr>   <td width="5%"></td> <td width="90%"></td> <td width="5%"></td> </tr> 
        <tr>   <td width="5%"></td> <td width="90%"></td> <td width="5%"></td> </tr> 
          <tr>   <td width="5%"></td> <td width="90%"></td> <td width="5%"></td> </tr> 
   <tr>   <td width="5%"></td> <td width="90%">' . $termsandcondition . '</td> <td width="5%"></td>  
  
  </tr>
  </tbody>
  </table>';
$pdf->writeHTML($newhtmlinv2, true, false, true, false, '');



$pdf->Ln(-5);
$amountinwords1 = '';

$html5 = '
';


$paymentterms = '';


$bankdetails = '';


//$pdf->writeHTML($bankdetails, true, false, true, false, '');










//$pdf->writeHTML($amountinwords1, true, false, true, false, '');


$newamountinwords1 = '<table border="0" cellpadding="1">
<tbody>
    <tr>   <td width="5%"></td> <td width="90%">' . $amountinwords1 . '</td> <td width="5%"></td>  
</tr>
</tbody>
</table>';
$pdf->writeHTML($newamountinwords1, true, false, true, false, '');
$pdf->Ln(-3);
//$pdf->writeHTML($paymentterms, true, false, true, false, '');


$newpaymentterms = '<table border="0" cellpadding="1">
<tbody>
    <tr>   <td width="5%"></td> <td width="90%">' . $paymentterms . '</td> <td width="5%"></td>  
</tr>
</tbody>
</table>';
$pdf->writeHTML($newpaymentterms, true, false, true, false, '');


$pdf->Ln(-6);

//$pdf->writeHTML($bankdetails);
$newbankdetails = '<table border="0" cellpadding="1">
<tbody>
    <tr>   <td width="5%"></td> <td width="90%">' . $bankdetails . '</td> <td width="5%"></td>  
</tr>
</tbody>
</table>';
$pdf->writeHTML($newbankdetails, true, false, true, false, '');
$pdf->Ln(-6);
//$pdf->writeHTML($html5);
$newhtml5 = '<table border="0" cellpadding="1">
<tbody>
    <tr>   <td width="5%"></td> <td width="90%">' . $html5 . '</td> <td width="5%"></td>  
</tr>
</tbody>
</table>';
$pdf->writeHTML($newhtml5, true, false, true, false, '');





$pageWidth = $pdf->getPageWidth();
$pdf->lastPage();
$pdf->Output($details['inv_no'] . '.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

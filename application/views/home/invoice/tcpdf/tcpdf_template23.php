<?php
require_once('amountinwords.php');



//$PDF_HEADER_LOGO='image1.png';
$PDF_HEADER_LOGO='../../../../../uploads/profile/'.$headerimage->value1;
$PDF_HEADER_TITLE= $comp['name'];
$PDF_HEADER_LOGO_WIDTH='50';
//$PDF_UNIT='pt';
$PDF_UNIT='mm';
$PDF_PAGE_FORMAT='A4';
$PDF_PAGE_ORIENTATION='p';  //'L' 

$setAuthor='Ethicfin';
$setTitle='INVOICE';
$setSubject=$details['inv_no'];
$setKeywords='Ethicfin '.$compprof['name'];
//$PDF_HEADER_STRING=" Signin \n Beyond being online\n 9567860174";
$PDF_HEADER_STRING=$compprof['name']."\n".$compprof['contact_no1']."\n".$compprof['email'];
$PDF_MARGIN_LEFT='5';

if($d76->active==0) {
    $PDF_MARGIN_TOP=$d74->active;
} else {
    $PDF_MARGIN_TOP='25';
}

$PDF_MARGIN_RIGHT='5';
$PDF_MARGIN_HEADER='5';
//$PDF_MARGIN_FOOTER='10';
//$PDF_MARGIN_BOTTOM='10';



if($d77->active==0) {
    $PDF_MARGIN_BOTTOM=$d75->active;
    //$PDF_MARGIN_BOTTOM=30;
    $PDF_MARGIN_FOOTER=30;
} else {
    $PDF_MARGIN_BOTTOM='10';
    $PDF_MARGIN_FOOTER='10';
}

// create new PDF document
class CustomTCPDF extends TCPDF {
    private $footerImage;

    public function __construct($footerImage, $orientation, $unit, $format, $unicode, $encoding, $diskcache) {
        parent::__construct($orientation, $unit, $format, $unicode, $encoding, $diskcache);
        $this->footerImage = $footerImage;
    }

    public function Footer() {
        $footerImageWidth = $this->getPageWidth()- ($this->getMargins()['right'] + $this->getMargins()['left']);
        $footerImageHeight = 20;
        $footerImageX = ($this->getPageWidth() - $footerImageWidth) / 2;
        $footerImageY = $this->getPageHeight() -  $footerImageHeight-5;

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
if($footrst['value1']=="1") {
	   if($footrstx['value1']!="") { 
$footerImage = FCPATH . 'uploads/profile/' . $footerimage->value1;
} else { $footerImage = '' ; }  } else {
	$footerImage = '';
}
$pdf = new CustomTCPDF($footerImage, $PDF_PAGE_ORIENTATION, $PDF_UNIT, $PDF_PAGE_FORMAT, true, 'UTF-8', false);



//$pdf->SetUnit('pt');
// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor($setAuthor);
$pdf->setTitle($setTitle);
$pdf->setSubject($setSubject);
$pdf->setKeywords($setKeywords);

// set default header data
//$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 005', PDF_HEADER_STRING);
if($headerinprint->value1==1) {  // show header
//$pdf->setHeaderData($PDF_HEADER_LOGO, $PDF_HEADER_LOGO_WIDTH, $PDF_HEADER_TITLE, $PDF_HEADER_STRING);
//$pdf->setHeaderData($PDF_HEADER_LOGO, 118, '', '');
//$pdf->setHeaderData($PDF_HEADER_LOGO, 200, '', '');
$pdf->setHeaderData($PDF_HEADER_LOGO, 200, '', '',array(0, 0, 0), array(255, 255, 255));

} else {
	$pdf->SetHeaderData('', 0, '', '', array(0, 0, 0), array(255, 255, 255));
}
// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
//$pdf->setMargins($PDF_MARGIN_LEFT, $PDF_MARGIN_TOP, $PDF_MARGIN_RIGHT);
$pdf->setMargins($PDF_MARGIN_LEFT, $PDF_MARGIN_TOP, $PDF_MARGIN_RIGHT, $PDF_MARGIN_BOTTOM);
$pdf->setHeaderMargin($PDF_MARGIN_HEADER);
$pdf->setFooterMargin($PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->setAutoPageBreak(TRUE, $PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
/* if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
} */

// ---------------------------------------------------------

// set font
$pdf->setFont('dejavusans', '', 10);

// add a page
$pdf->AddPage();


$pdf->Ln(-1);

$docdetails = '<table border="0" cellspacing="0" cellpadding="1">
<tr><td width="25%"> Reference No</td><td colspan="2" width="75%"> :'.(isset($details['order_no']) ? $details['order_no'] : '').'</td></tr>
<tr><td width="25%"> Invoice No</td><td width="50%"> :'.$details['inv_no'].'</td><td style="text-align: right; direction: rtl;" width="25%">رقم الوثيقة</td></tr>
<tr><td > Invoice Date</td><td> :'.date('d-M-Y', strtotime($details['inv_date'])).'</td><td style="text-align: right; direction: rtl;">تاريخ الوثيقة</td></tr>';
if($d61->active==1) {
$docdetails .= '<tr><td > Due Date</td><td colspan="2"> :'.date('d-M-Y', strtotime($details['due_date'])).'</td></tr>';
} 
$docdetails .= '<tr><td > Prepared by</td><td colspan="2"> :'.$employee->name.'</td></tr>
<tr><td width="25%"> Contact </td><td colspan="2" width="75%"> :'.$employee->contact_no1.'</td></tr>
</table>';







$pdf->SetFont('dejavusans', '', 12);
$pdf->Ln();

$htmlcontent1 = '<div style="text-align: center; direction: ltr; ">INVOICE</div>';
$pdf->SetFont('aefurat', '', 12);
$htmlcontent2 = '<div style="text-align: center; direction: rtl; "> فاتورة ضريبية  </div>';

$doctypehtml = '
<table border="0" cellspacing="0" cellpadding="4">	
	<tr>
		
		<td>'.$htmlcontent2.'</td>

	</tr>	
	
	<tr>
		<td>'.$htmlcontent1.'</td>
	

	</tr>	
</table>';

// output the HTML content
$pdf->writeHTML($doctypehtml, true, false, true, false, '');


$pdf->Ln(-9);

if($d51->active=='154') {

function __getLength($value) {
    return strlen($value);
}

function __toHex($value) {
    return pack("H*", sprintf("%02X", $value));
}

function __toString($__tag, $__value, $__length) {
    $value = (string) $__value;
    return __toHex($__tag) . __toHex($__length) . $value;
}

function __getTLV($dataToEncode) {
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
$logo = 'https://quickchart.io/qr?text='.$__QR.'&size=150'; // Replace with the actual path to your image


} else {

$qrCodeData = "INVOICE No: ".$details['inv_no']."\n";
$qrCodeData .= "Amount: ".$details['grand_total']."\n";
$qrCodeData .= "Date: ".date('d-M-Y', strtotime($details['inv_date']))."\n";
$qrCodeData .= "".$comp['name']."\n";
$qrCodeData .= "Contact: ".$compprof['contact_no1']."\n";
$qrCodeData .= $compprof['website'];
$encodedData = urlencode($qrCodeData);
//$logo = 'https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl='.$encodedData.'&chf=bg,s,00000000'; // Replace with the actual path to your image
$logo = 'https://quickchart.io/qr?text='.$encodedData.'&size=150'; // Replace with the actual path to your image

}



$htmlinv = '<table style="border:1px solid black; font-size: 13px;width:100%;" >
            <tbody>
<tr style="border:1px solid black;">
	<td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;  "> Invoice Number </td>
	<td class="text-center" style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf; "> ' . $details['inv_no'] . '</td>
	<td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;" class="text-end"><span class="text-bold" style="text-align: right; direction: rtl; ">رقم الفاتورة</span></td>
</tr>
<tr style="border:1px solid black;">
	<td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;  "> Invoice Issue Date</td>
	<td class="text-center" style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf; "> ' . date('d-M-Y', strtotime($details['inv_date'])) . '</td>
	<td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;" class="text-end"><span class="text-bold" style="text-align: right; direction: rtl; ">تاريخ الفاتورة</span></td>
</tr>
<tr style="border:1px solid black;">
	<td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;  "> Date of Supply</td>
	<td class="text-center" style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf; "> ' . date('d-M-Y', strtotime($details['sup_date'])) . '</td>
	<td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;" class="text-end"><span class="text-bold" style="text-align: right; direction: rtl; ">تاريخ التوريد</span></td>
</tr>
<tr style="border:1px solid black;">
	<td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;  "> Branch</td>
	<td class="text-center" style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf; "> ' . $branch['name'] . '</td>
	<td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;" class="text-end"><span class="text-bold" style="text-align: right; direction: rtl; ">الفرع</span></td>
</tr>
<tr style="border:1px solid black;">
	<td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;  "> Due Date</td>
	<td class="text-center" style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf; "> ' . date('d-M-Y', strtotime($details['due_date'])) . '</td>
	<td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;" class="text-end"><span class="text-bold" style="text-align: right; direction: rtl; ">تاريخ الاستحقاق</span></td>
</tr>
<tr style="border:1px solid black;">
	<td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;  "> Customer Code</td>
	<td class="text-center" style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf; "> ' . $profile_code . '</td>
	<td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;" class="text-end"><span class="text-bold" style="text-align: right; direction: rtl; ">رمز العميل</span></td>
</tr>
            </tbody>
        </table>';
		
		
		
		$htmla = '
<table border="0" cellspacing="0" cellpadding="1">
    

    <tr><td width="70%" >	'.$htmlinv.'	</td><td width="30%"  align="center"><img src="' . $logo . '" width="120" height="120"></td>
	  </tr> 
   
</table>
';

// Output HTML content to the PDF
$pdf->writeHTML($htmla, true, false, true, false, '');












$pdf->Ln(-8);
$pdf->SetFont('dejavusans', '', 9);




$supplyertable = '<table style="border:1px solid black; font-size: 10px;width:100%;" cellpadding="1">
            <tbody>
			
			 <tr style="border:1px  solid black;">
                    <td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;  "> Supplier</td>
                    <td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;  "> </td>
                    <td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;  "><span class="text-bold" style="text-align: right; direction: rtl; ">المورد</span></td>
                </tr>
			
			
			
			
                <tr style="border:1px solid black;">
                    <td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;  "> Name</td>
                    <td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;  "> '.$branch['name'].'</td>
					<td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;  "><span class="text-bold" style="text-align: right; direction: rtl; "> الإ سم</span></td>
                </tr>
                <tr style="border:1px solid black;">
                    <td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;  "> Building Number</td>
                    <td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;  "> '.$branch['address_line1'].'</td>
                    <td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;  "><span class="text-bold" style="text-align: right; direction: rtl; ">رقم المبنى</span></td>
                </tr>
                <tr style="border:1px solid black;">
                    <td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;  "> Street Name</td>
                    <td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;  ">'.$branch['address_line2'].'</td>
                    <td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;  "><span class="text-bold" style="text-align: right; direction: rtl; ">اسم الشارع</span></td>
                </tr>
                <tr style="border:1px solid black;">
                   <td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;  "> District</td>
                    <td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;  "> '.$branch['address_line3'].'</td>
                    <td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;  "><span class="text-bold" style="text-align: right; direction: rtl; ">الحي</span></td>
                </tr>
                <tr style="border:1px solid black;">
                    <td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;  "> City</td>
                    <td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;  "> '.$branch['address_line4'].'</td>
                    <td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;  "><span class="text-bold" style="text-align: right; direction: rtl; "> المدينة</span></td>
                </tr>
                <tr style="border:1px solid black;">
                    <td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;  "> Country</td>
                    <td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;  "> '.$branch['address_line5'].'</td>
                    <td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;  "><span class="text-bold" style="text-align: right; direction: rtl; "> البلد</span></td>
                </tr>
                <tr style="border:1px solid black;">
                    <td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;  "> Postal Code</td>
                    <td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;  "> '.$branch['address_code'].'</td>
                    <td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;  "><span class="text-bold" style="text-align: right; direction: rtl; ">الرمز بريدي</span></td>
                </tr>
                <tr style="border:1px solid black;">
                    <td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;  "> Additional NO</td>
                    <td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;  "></td>
                    <td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;  "><span class="text-bold" style="text-align: right; direction: rtl; ">الرقم إضافي</span></td>
                </tr>
                <tr style="border:1px solid black;">
                    <td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;  "> VAT Number</td>
                    <td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;  "> '.$branch['vat'].'</td>
                    <td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;  "><span class="text-bold" style="text-align: right; direction: rtl; "> الرقم ظريبه الشراء</span></td>
                </tr>
                <tr style="border:1px solid black;">
                    <td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;  "> Other Buyer ID</td>
                    <td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;  "></td>
                    <td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;  "><span class="text-bold" style="text-align: right; direction: rtl; "> معرف المشتري الآخر</span></td>
                </tr>
            </tbody>
            </table>';

 
$custtable='<table style="border:1px solid black; font-size: 10px;width:100%; " cellpadding="1">
        <tbody>
		
		 <tr style="border:0 solid black;">
                    <td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;  "> Customer</td>
                    <td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;  "></td>
                    <td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;  "><span class="text-bold" style="text-align: right; direction: rtl; ">العميل</span></td>
                </tr>
                <tr style="border:1px solid black;">
                    <td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;  "> Name</td>
                    <td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;  ">'.$badr['name'].'</td>
                    <td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;  "><span class="text-bold" style="text-align: right; direction: rtl; ">الإ سم</span></td>
                </tr>
                <tr style="border:1px solid black;">
                    <td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;  "> Building Number</td>
                    <td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;  ">'.$badr['address_line1'].'</td>
                    <td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;  "><span class="text-bold" style="text-align: right; direction: rtl; ">رقم المبنى</span></td>
                </tr>
                <tr style="border:1px solid black;">
                    <td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;  "> Street Name</td>
                    <td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;  ">'.$badr['address_line2'].'</td>
                    <td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;  "><span class="text-bold" style="text-align: right; direction: rtl; ">اسم الشارع</span></td>
                </tr>
                <tr style="border:1px solid black;">
                    <td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;  "> District</td>
                    <td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;  ">'.$badr['address_line3'].'</td>
                    <td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;  "><span class="text-bold" style="text-align: right; direction: rtl; ">الحي</span></td>
                </tr>
                <tr style="border:1px solid black;">
                    <td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;  "> City</td>
                    <td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;  ">'.$badr['address_line4'].'</td>
                    <td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;  "><span class="text-bold" style="text-align: right; direction: rtl; "> المدينة</span></td>
                </tr>
                <tr style="border:1px solid black;">
                    <td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;  "> Country</td>
                    <td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;  ">'.$badr['address_line5'].'</td>
                    <td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;  "><span class="text-bold" style="text-align: right; direction: rtl; "> البلد</span></td>
                </tr>
                <tr style="border:1px solid black;">
                    <td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;  "> Postal Code</td>
                    <td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;  "> '.$badr['address_code'].'</td>
                    <td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;  "><span class="text-bold" style="text-align: right; direction: rtl; ">الرمز بريدي</span></td>
                </tr>
                <tr style="border:1px solid black;">
                    <td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;  "> Additional NO</td>
                    <td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;  "></td>
                    <td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;  "><span class="text-bold" style="text-align: right; direction: rtl; ">الرقم إضافي</span></td>
                </tr>
                <tr style="border:1px solid black;">
                    <td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;  "> VAT Number</td>
                    <td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;  "> '.$badr['vat'].'</td>
                    <td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;  "><span class="text-bold" style="text-align: right; direction: rtl; "> الرقم ظريبه الشراء</span></td>
                </tr>
                <tr style="border:1px solid black;">
                    <td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;  "> Other Buyer ID</td>
                    <td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;  "></td>
                    <td style="line-height: 150%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;  "><span class="text-bold" style="text-align: right; direction: rtl; "> معرف المشتري الآخر</span></td>
                </tr>
            </tbody>
            </table>';




$htmladd = '
<table border="0" cellspacing="0" cellpadding="1">
    

    <tr><td width="50%" >	'.$supplyertable.'	</td><td width="50%"  >	'.$custtable.'	</td>
	  </tr> 
   
</table>
';

// Output HTML content to the PDF
$pdf->writeHTML($htmladd, true, false, true, false, '');











$beforeitemposition=$pdf->getY();
$pdf->Ln(-2);





$pdf->setFont('dejavusans', '', 8);
$html = '
<table border="1" cellspacing="0" cellpadding="1" style="border-color: #dc143c;width:100%;">
	<tr style="border:1px solid black;">
                <td style="border:1px solid black;padding:1px 1px; " width="12%">(يشمل ضريبة القيمة المضافة)المجموع</td>
                    <td align="center" width="8%" >قيمة الضريبة</td>
                    <td align="center" width="8%" >معدل الضريبة</td>
                    <td align="center" width="8%"  >المبلغ الخاضع للضريبة</td>
                    <td align="center" width="8%" >خصومات</td>
                    <td align="center" width="8%" >سعر الوحدة</td>
                    <td align="center" width="8%" >الكمية</td>
                    <td align="center" width="24%"  >اسم المنتج</td>
                    <td align="center" width="8%" >معرف المنتج</td>
                    <td align="center" width="8%" >م</td>
                </tr>
                <tr style="border:1px solid black;">
                    <th class="text-center"  style="border:1px solid black;font-family: Arial, Helvetica, sans-serif;padding:1px 1px; " >Item Subtotal Include VAT</th>
                    <th class="text-center"  style="border:1px solid black;font-family: Arial, Helvetica, sans-serif;padding:1px 1px; ">Tax Amount</th>
                    <th class="text-center"  style="border:1px solid black;font-family: Arial, Helvetica, sans-serif;padding:1px 1px; ">Tax Rate</th>
                    <th class="text-center"  style="border:1px solid black;font-family: Arial, Helvetica, sans-serif;padding:1px 1px; " >Taxable Amount</th>
                    <th class="text-center"  style="border:1px solid black;font-family: Arial, Helvetica, sans-serif;padding:1px 1px; ">Discount</th>
                    <th class="text-center"  style="border:1px solid black;font-family: Arial, Helvetica, sans-serif;padding:1px 1px; ">Unit Price</th>
                    <th class="text-center"  style="border:1px solid black;font-family: Arial, Helvetica, sans-serif;padding:1px 1px; " >Quantity</th>
                    <th class="text-center"  style="border:1px solid black;font-family: Arial, Helvetica, sans-serif;padding:1px 1px; ">Product Name</th>
                    <th class="text-center"  style="border:1px solid black;font-family: Arial, Helvetica, sans-serif;padding:1px 1px; ">Product Id</th>
                    <th class="text-center"  style="border:1px solid black;font-family: Arial, Helvetica, sans-serif;padding:1px 1px; ">No</th>
                </tr>';


 
$tot=0;
                $i=1;
                $amt=0;
                $txamt=0;
                $disc_amt=0;
                $t=0;$s=0;$c=0;$cess=0;$g=0; $sl=1; 
foreach($items as $item) { 





	$html .= '
	<tr>
		<td align="center" style="line-height: 200%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;" >'.number_format($item['total_price']+$item['disc_amt'],2).'</td>';
$html .= '<td align="center" style="line-height: 200%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;">'.number_format($item['vat_amt'],2).'</td>
		<td align="right" style="line-height: 200%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;">'.$item['vat_perc'].'</td>
		<td align="right" style="line-height: 200%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;">'.number_format($item['taxable'],2).'</td>
		<td align="right" style="line-height: 200%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;">'.number_format($item['disc_amt'],2).'</td>
		<td align="right" style="line-height: 200%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf; ">'.number_format($item['price'],2).'</td>
		<td align="right" style="line-height: 200%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;">'.$item['quantity'].'</td>
		<td align="right" style="line-height: 200%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;">'.$item['item_name']."\n".$item['name_lang2']."\n".$item['description'].'</td>
		<td style="line-height: 200%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;"> '.$item['item_code'].'</td>
	<td align="center" style="line-height: 200%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;" >'.$i++.'</td>
	</tr>'; 
	
	 $tot=$tot+$item['taxable'];
                    $disc_amt=$disc_amt+$item['disc_amt'];
                    $amt=$amt+$item['price']*$item['quantity'];
                    $txamt=$txamt+($item['price']*$item['quantity']*$details['vat']/100);
}

$html .= '
</table>';
$pdf->writeHTML($html, true, false, true, false, '');






$totaltable='    <table style="border:1px solid black; font-size: 10px;width:100%; ">
            <tbody>
                <tr style="border:1px solid black; width:100%;">
                    <td align="right" style="line-height: 200%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;" >'.number_format($details['total']+ $disc_amt,2).'</td>
                    <td colspan="3" class="text-center" align="right" style="line-height: 200%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;">(باستثناء الضريبة على القيمة المضافة)الإجمالي</td>
                    <td colspan="3" class="text-center"  style="line-height: 200%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;">Total (Excluding VAT)</td>
                    <td colspan="3" rowspan="4" class="text-center"  align="right" style="line-height: 200%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;" ><u>:ملاحظات</u>
                    '.nl2br($details['subj']).'</td>
                </tr>
                <tr style="border:1px solid black; width:100%;">
                    <td class="text-center" align="right" style="line-height: 200%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;" >'.number_format($disc_amt,2).'</td>
                    <td colspan="3" class="text-center" align="right" style="line-height: 200%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;">إجمالي الخصومات</td>
                    <td colspan="3" class="text-center"  style="line-height: 200%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;">Total Discounts</td>
                </tr>
                <tr style="border:1px solid black; width:100%;">
                    <td class="text-center" align="right" style="line-height: 200%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;" >'.number_format($details['total'],2).'</td>
                    <td colspan="3" class="text-center" align="right" style="line-height: 200%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;">(باستثناء الضريبة على القيمة المضافة)إجمالي المبلغ الخاضع للضريبة</td>
                    <td colspan="3" class="text-center"  style="line-height: 200%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;">Total Taxable Amount(excuding VAT)</td>
                </tr>
                <tr style="border:1px solid black; width:100%;">
                    <td class="text-center" align="right" style="line-height: 200%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;" >'.number_format($details['vat'],2).'</td>
                    <td colspan="3" class="text-center" align="right" style="line-height: 200%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;">ضريبة القيمة المضافة</td>
                    <td colspan="3" class="text-center"  style="line-height: 200%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;">Value Added Tax(15%)</td>
                </tr>
                <tr style="border:1px solid black; width:100%;">
                    <td class="text-center" align="right" style="line-height: 200%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;" >'.number_format($details['grand_total'],2).'</td>
                    <td colspan="3" class="text-center" align="right" style="line-height: 200%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;">إجمالي المبلغ المستحق</td>
                    <td colspan="3" class="text-center"  style="line-height: 200%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;">Total Amount Due</td>
                    <td colspan="3" class="text-center" align="right" style="line-height: 200%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;" >'.$amountinwordsar.'</td>
                </tr>
                
            </tbody>
        </table>';


$pdf->writeHTML($totaltable, true, false, true, false, '');













$afteritemposition=$pdf->getY();

  if(isset($_GET['blankhight']))  { if($_GET['blankhight']>0) {  $pdf->Ln($_GET['blankhight']+8); 
 
  $startX2 = $PDF_MARGIN_LEFT;
 $startY2 = $PDF_MARGIN_TOP; 
 $pageHeight = $pdf->getPageHeight();
  $endY2 = $pageHeight-$PDF_MARGIN_BOTTOM; 
// $pdf->Line($startX2, $startY2, $startX2, $endY2);

$pageWidth = $pdf->getPageWidth();
$startXr2 = $pageWidth-$PDF_MARGIN_RIGHT;
//$pdf->Line($startXr2, $startY2, $startXr2, $endY2);
 
 } }
 if(isset($_GET['blankhight']))  { if($_GET['blankhight']<0 AND  $_GET['blankhight']>-7 ) { $pdf->Ln($_GET['blankhight']*(-1)-5);  
 //$pdf->SetFont('dejavusans', '', 8);
 } }
 if(isset($_GET['newpage']))  { 
 $startX2 = $PDF_MARGIN_LEFT;
 $startY2 = $PDF_MARGIN_TOP; 
 $pageHeight = $pdf->getPageHeight();
  $endY2 = $pageHeight-$PDF_MARGIN_BOTTOM; 
 //$pdf->Line($startX2, $startY2, $startX2, $endY2);

$pageWidth = $pdf->getPageWidth();
$startXr2 = $pageWidth-$PDF_MARGIN_RIGHT;
//$pdf->Line($startXr2, $startY2, $startXr2, $endY2);
 
 $pdf->AddPage(); 
 
 
 
 } 
 
/* if(isset($invterms->description)) {
$remark=nl2br($invterms->description);
$pattern = '/^<p>|<\/p>$/i';
$termsandcond = preg_replace($pattern, '', $remark);
} else {
	$termsandcond='';
} */
 
/*  $tandc = '
<div style="border-left: 0.5px solid black;
 border-right: 0.5px solid black; " cellpadding="1"><table border="0" style="padding-left: 10px; padding-bottom: 15px;">
<tr>
<td style="text-align: justify; text-justify: inter-word;">'.$termsandcond.'</td>
</tr>
</table></div>';
$pdf->writeHTML($tandc); */





$currenty = $pdf->getY();
$termshight=$currenty-$afteritemposition;


$blankspace=((230-$PDF_MARGIN_BOTTOM)-$currenty+5);




$bankdetails = '<table border="0" cellspacing="0" cellpadding="1">
<tr><td colspan="2" ><span style="font-weight: bold;font-size: medium;"> Bank Details</span></td></tr>
<tr><td width="35%"> Bank Name</td><td>: '.$bank['name'].'</td><td  align="right" > اسم المصرف</td></tr>
<tr><td> Account Name</td><td>: '.$bank['acc_name'].'</td><td  align="right" > اسم</td></tr>
<tr><td> Account No</td><td>: '.$bank['acc_no'].'</td><td  align="right" > رقم العميل</td></tr>
<tr><td> IBAN</td><td>: '.$bank['iban_no'].'</td><td  align="right" > رقم الآيبان</td></tr>

</table>';


$bankdetails2 = '<table border="0" cellspacing="0" cellpadding="1">
<tr><td colspan="2" ></td></tr>
<tr>
<td style="padding-bottom: 20px;">المبيعات</td>
<td align="right"  style="padding-bottom: 20px;">    الاستلم :................... </td>
</tr>
<tr><td colspan="2" ></td></tr>
<tr>
<td>الاداره</td>
<td align="right">  التوقيع :...................</td>
</tr>
<tr><td colspan="2" ></td></tr>
</table>';

$pageHeight = $pdf->getPageHeight();
//$table1Height = $pdf->getY();




$bankpositiony=240-$PDF_MARGIN_BOTTOM+10;


$blankhight=$bankpositiony-$currenty;

 if(isset($_GET['newpage']))  { } else {
$pdf->SetY($bankpositiony);
 }
//$pdf->SetY(219);

$pdf->getY();
$html1 = '
<table border="1" cellspacing="0" cellpadding="1">
    

    <tr><td width="50%" >	'.$bankdetails.'	</td>   </tr>
   
</table>
';

// Output the first table
$pdf->writeHTML($html1);

$pdf->Ln(-2);

$html3 = '
<table border="0" cellspacing="0" cellpadding="1">
    

    <tr><td >	'.$bankdetails2.'	</td>    </tr>
   
</table>
';

// Output the first table
$pdf->writeHTML($html3);
















if(isset($_GET['blankhight'])) { } else {
	if($blankhight>-7) 
	{
	redirect('home/viewinvoice?inv='.$_GET['inv'].'&tcp=d&blankhight='.$blankhight);
}	  if($blankhight<=-7 AND $blankhight>-9) 
	{
	redirect('home/viewinvoice?inv='.$_GET['inv'].'&tcp=d&blankhight=0');
}
if($blankhight<=-9) 
	{
	redirect('home/viewinvoice?inv='.$_GET['inv'].'&tcp=d&blankhight=0&newpage=y');
} 

}

/*  $startX2 = $PDF_MARGIN_LEFT; 
  if($blankspace<-0.37 OR ($blankspace>=$termhight)) {
  $startY2 = $PDF_MARGIN_TOP;  } else {
 $startY2 = $PDF_MARGIN_TOP+6; }
 $endY2 = $pageHeight-$PDF_MARGIN_BOTTOM; 

$pdf->Line($startX2, $startY2, $startX2, $endY2);


$startXr2 = $pageWidth-$PDF_MARGIN_RIGHT; */
$pageWidth = $pdf->getPageWidth();
$startY2=$beforeitemposition;
$startXr2 = $pageWidth-$PDF_MARGIN_RIGHT;
$startXr1 = $PDF_MARGIN_LEFT;
 $endY2 = $pageHeight-$PDF_MARGIN_BOTTOM;
//$pdf->Line($startXr2, $startY2, $startXr2, $endY2);
//$pdf->Line($startXr1, $startY2, $startXr1, $endY2);
$pdf->lastPage();

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// Print a table




// ---------------------------------------------------------

//Close and output PDF document


;
$pdf->Output($details['inv_no'].'_'.$details['inv_date'].'.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

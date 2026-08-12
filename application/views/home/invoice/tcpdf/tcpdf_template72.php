<?php
// Configuration parameters
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
$PDF_MARGIN_LEFT='5';
$PDF_MARGIN_HEADER='0';
//$PDF_MARGIN_FOOTER='10';
//$PDF_MARGIN_BOTTOM='10';



if($d77->active==0) {
    $PDF_MARGIN_BOTTOM=$d75->active;
    //$PDF_MARGIN_BOTTOM=30;
    $PDF_MARGIN_FOOTER=$d75->active;
} else {
    $PDF_MARGIN_BOTTOM='0';
    $PDF_MARGIN_FOOTER='0';
}

// Custom TCPDF class
class CustomTCPDF extends TCPDF {
    private $footerImage;
    private $showHeader = true;

    public function __construct($footerImage, $orientation, $unit, $format, $unicode, $encoding, $diskcache) {
        parent::__construct($orientation, $unit, $format, $unicode, $encoding, $diskcache);
        $this->footerImage = $footerImage;
    }

    public function Header() {
        if ($this->page == 1) {
            parent::Header();
        }
    }

    public function Footer() {
        $footerImageWidth = $this->getPageWidth() - ($this->getMargins()['right'] + $this->getMargins()['left']);
        $footerImageHeight = 20;
		
        if (file_exists($this->footerImage)) {
            $imageInfo = getimagesize($this->footerImage);
            $imageType = $imageInfo[2];
            $aspectRatio = $imageInfo[0] / $imageInfo[1];
            $footerImageHeight = $footerImageWidth / $aspectRatio;
        }

        $footerImageX = ($this->getPageWidth() - $footerImageWidth) / 2;
        $footerImageY = $this->getPageHeight() - $footerImageHeight - 5;

        if (file_exists($this->footerImage)) {
            $imageInfo = getimagesize($this->footerImage);
            $imageType = $imageInfo[2];
            
            if ($imageType === IMAGETYPE_JPEG) {
                $this->Image($this->footerImage, $footerImageX, $footerImageY, $footerImageWidth, $footerImageHeight, 'JPG', '', '', true, 150, '', false, false, 0, false, false, false);
            } elseif ($imageType === IMAGETYPE_PNG) {
                $this->Image($this->footerImage, $footerImageX, $footerImageY, $footerImageWidth, $footerImageHeight, 'PNG', '', '', true, 150, '', false, false, 0, false, false, false);
            } else {
                $this->SetTextColor(255, 0, 0);
                $this->SetXY($footerImageX, $footerImageY);
                $this->Cell($footerImageWidth, $footerImageHeight, '', 0, 0, 'C');
            }
        } else {
            $this->SetTextColor(255, 0, 0);
            $this->SetXY($footerImageX, $footerImageY);
            $this->Cell($footerImageWidth, $footerImageHeight, '', 0, 0, 'C');
        }

        parent::Footer();
    }
}

// Footer image setup
if ($footrst['value1'] == "1") {
    $footerImage = ($footrstx['value1'] != "") ? FCPATH . 'uploads/profile/' . $footerimage->value1 : '';
} else {
    $footerImage = '';
}

// PDF initialization
$pdf = new CustomTCPDF($footerImage, $PDF_PAGE_ORIENTATION, $PDF_UNIT, $PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor($setAuthor);
$pdf->setTitle($setTitle);
$pdf->setSubject($setSubject);
$pdf->setKeywords($setKeywords);

if ($headerinprint->value1 == 1) { 
    $pdf->setHeaderData($PDF_HEADER_LOGO, 200, '', '', array(0, 0, 0), array(255, 255, 255));
} else {
    $pdf->SetHeaderData('', 0, '', '', array(0, 0, 0), array(255, 255, 255));
}

$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->setMargins($PDF_MARGIN_LEFT, $PDF_MARGIN_TOP, $PDF_MARGIN_RIGHT);
$pdf->setHeaderMargin($PDF_MARGIN_HEADER);
$pdf->setFooterMargin($PDF_MARGIN_FOOTER);
$pdf->setAutoPageBreak(TRUE, $PDF_MARGIN_BOTTOM);
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
$pdf->setFont('dejavusans', '', 10);

$pdf->AddPage();
$pdf->Ln(-1);

$docdetails = '<table border="0" cellspacing="0" cellpadding="1">
<tr><td width="25%"> Reference No</td><td colspan="2" width="75%"> :'.(isset($details['order_no']) ? $details['order_no'] : '').'</td></tr>
<tr><td width="25%"> Invoice No</td><td width="50%"> :'.$details['inv_no'].'</td><td style="text-align: right; direction: rtl;" width="25%">رقم الوثيقة</td></tr>
<tr><td > Invoice Date</td><td> :'.date('d-M-Y', strtotime($details['inv_date'])).'</td><td style="text-align: right; direction: rtl;">تاريخ الوثيقة</td></tr>';
if($d61->active==1) {
$docdetails .= '<tr><td > Due Date</td><td colspan="2"> :'.date('d-M-Y', strtotime($details['due_date'])).'</td></tr>';
} 
$docdetails .= '<tr><td > Prepared by /</td><td colspan="2"> :'.$employee->name.'</td></tr>
<tr><td width="25%"> Contact </td><td colspan="2" width="75%"> :'.$employee->contact_no1.'</td></tr>
</table>';
$pdf->SetFont('dejavusans', '', 12);
$pdf->Ln(-1);
//$pdf->SetFont('aefurat', 'B', 12);
$doctypehtml = '
<table border="0" cellspacing="0" cellpadding="4">	
	<tr>
		<td style="text-align: center; height:35px;"><span style="color: #0080ff;font-weight: 400px;">TAX INVOICE  /</span><span style=" direction: rtl; color: #0080ff;font-weight: bold;"> فاتورة ضريبية </span></td>
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
$encodedData=$__QR;

} else {

$qrCodeData = "INVOICE No: ".$details['inv_no']."\n";
$qrCodeData .= "Amount: ".$details['grand_total']."\n";
$qrCodeData .= "Date: ".date('d-M-Y', strtotime($details['inv_date']))."\n";
$qrCodeData .= "".$comp['name']."\n";
$qrCodeData .= "Contact: ".$compprof['contact_no1']."\n";
$qrCodeData .= $compprof['website'];
$encodedData = urlencode($qrCodeData);
//$logo = 'https://chart.googleapis.com/chart?chs=160x160&cht=qr&chl='.$encodedData.'&chf=bg,s,00000000'; // Replace with the actual path to your image

}

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

$sellertable='<hr style="color:#00008b;">

<table border="0" cellspacing="0" cellpadding="4" style="font-size:8px;">
<tr><td width="10%" style="line-height: 200%;color:#93142d;"> Invoice No :</td><td width="40%" style="line-height: 200%;color:#93142d;"> '.$details['inv_no'].'</td><td width="40%" style="line-height: 200%;text-align: right;color:#93142d;"> '.$inv_noarabic.'  </td><td style="line-height: 200%;text-align: right; direction: rtl;color:#93142d;" width="10%">رقم الفاتورة</td></tr>
</table>
<table style="border:1px groove #bfbfbf; font-size: 8px;width:100%; " cellpadding="4">
        
        <tbody>
        <tr style="border:1px dashed black;">
        <td width="50%" style="line-height: 130%; border-right:hidden !important; border-bottom:1px dashed #bfbfbf; color:#0080ff; border-left:hidden !important; font-family: Arial; padding: 5px;font-weight:800px;">&#x25a0; <u>Our Details:</u></td>
        <td width="50%" style="line-height: 130%; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf; font-family: Arial; padding: 5px;"><span class="text-bold" style="text-align: right; direction: rtl; color:#0080ff;"><u>&#x25a0;تفاصيل شركتنا</u></span></td>
    </tr>
    
  
            <tr style="border:1px dashed black;">
                <td width="10%" style="line-height: 130%;background-color:#e8ecef; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf;  border-left:1px dashed #bfbfbf;">Name:</td>
                <td width="40%" style="line-height: 130%; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf; padding-left:15px; font-weight:bold;font-weight: bold; "> '.$branch['name'].'</td>
                <td width="40%" style="line-height: 130%; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf; padding-left:15px; text-align:right;font-weight: bold;  ">'.$branch_lang2['name'].'</td>
                <td width="10%" style="line-height: 130%;background-color:#e8ecef; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf;  "><span class="text-bold" style="text-align: right; direction: rtl;font-weight: bold;">الإ سم</span></td>
            </tr>

            <tr style="border:1px dashed black;">
                <td width="10%" style="line-height: 130%;background-color:#e8ecef; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf;  border-left:1px dashed #bfbfbf;">Street Name:</td>
                <td width="40%" style="line-height: 130%; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf; padding-left:15px;  "> '.$branch['address_line2'].'</td>
                <td width="40%" style="line-height: 130%; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf; padding-left:15px;  text-align:right; ">'.$branch_lang2['address_line3'].'</td>
                <td width="10%" style="line-height: 130%;background-color:#e8ecef; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf;  "><span class="text-bold" style="text-align: right; direction: rtl;font-weight: bold;">اسم الشارع</span></td>
            </tr>

            <tr style="border:1px dashed black;">
                <td width="10%" style="line-height: 130%;background-color:#e8ecef; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf;  border-left:1px dashed #bfbfbf;">Building No:</td>
                <td width="17%" style="line-height: 130%; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf; padding-left:15px;  "> '.$branch['address_line1'].'</td>
                <td width="8%" style="line-height: 130%;background-color:#e8ecef; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf;  border-left:1px dashed #bfbfbf;">City</td>
                <td width="15%" style="line-height: 130%; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf; padding-left:15px;  "> '.$branch['address_line4'].'</td>
                <td width="15%" style="line-height: 130%; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf;  border-left:1px dashed #bfbfbf; text-align:right;">'.$branch_lang2['address_line4'].'</td>
                <td width="10%" style="line-height: 130%;background-color:#e8ecef; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf; padding-left:15px; text-align:right; font-weight: bold; ">  مدينة</td>
                <td width="15%" style="line-height: 130%; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf; padding-left:15px; text-align:right;  ">'.$branch_lang2['address_line1'].'</td>
                <td width="10%" style="line-height: 130%;background-color:#e8ecef; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf;  "><span class="text-bold" style="text-align: right; direction: rtl;font-weight: bold;">رقم المبنى</span></td>
            </tr>

            <tr style="border:1px dashed black;">
                <td width="10%" style="line-height: 130%;background-color:#e8ecef; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf;  border-left:1px dashed #bfbfbf;">Addl. No:</td>
                <td width="17%" style="line-height: 130%; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf; padding-left:15px; ">'.$branch['additional_no'].'</td>
                <td width="8%" style="line-height: 130%;background-color:#e8ecef; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf;  border-left:1px dashed #bfbfbf;">District</td>
                <td width="15%" style="line-height: 130%; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf; padding-left:15px;  "> '.$branch['address_line3'].'</td>
                <td width="15%" style="line-height: 130%; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf;  border-left:1px dashed #bfbfbf; text-align:right;">'.$branch['address_line5'].'</td>
                <td width="10%" style="line-height: 130%;background-color:#e8ecef; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf; padding-left:15px; text-align:right;font-weight: bold;">  الحي</td>
                <td width="15%" style="line-height: 130%; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf; padding-left:15px; text-align:right;  ">'.$branch_lang2['additional_no'].'</td>
                <td width="10%" style="line-height: 130%;background-color:#e8ecef; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf;  "><span class="text-bold" style="text-align: right; direction: rtl;font-weight: bold;">رقم إضافي</span></td>
            </tr>

            <tr style="border:1px dashed black;">
                <td width="10%" style="line-height: 130%;background-color:#e8ecef; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf;  border-left:1px dashed #bfbfbf;">Postal Code:</td>
                <td width="17%" style="line-height: 130%; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf; padding-left:15px;  ">'.$branch['address_code'].'</td>
                <td width="8%" style="line-height: 130%;background-color:#e8ecef; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf;  border-left:1px dashed #bfbfbf;">Country</td>
                <td width="15%" style="line-height: 130%; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf; padding-left:15px;  "> '.$branch['address_line5'].'</td>
                <td width="15%" style="line-height: 130%; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf;  border-left:1px dashed #bfbfbf; text-align:right;">'.$branch_lang2['address_line5'].'</td>
                <td width="10%" style="line-height: 130%;background-color:#e8ecef; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf; padding-left:15px; text-align:right;font-weight: bold; ">  البلد</td>
                <td width="15%" style="line-height: 130%; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf; padding-left:15px;  text-align:right; ">'.$branch_lang2['address_code'].'</td>
                <td width="10%" style="line-height: 130%;background-color:#e8ecef; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf;  "><span class="text-bold" style="text-align: right; direction: rtl;font-weight: bold;">الرمز البريدي</span></td>
            </tr>

            <tr style="border:1px dashed black;">
                <td width="10%" style="line-height: 130%;background-color:#e8ecef; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf;  border-left:1px dashed #bfbfbf;">VAT number:</td>
                <td width="17%" style="line-height: 130%; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf; padding-left:15px; font-weight: bold; ">'.$branch['vat'].'</td>
                <td width="8%" style="line-height: 130%;background-color:#e8ecef; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf;  border-left:1px dashed #bfbfbf;"> CR No.</td>
                <td width="15%" style="line-height: 130%; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf; padding-left:15px;  ">'.$branch['cr_no'].'</td>
                <td width="15%" style="line-height: 130%; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf;  border-left:1px dashed #bfbfbf; text-align:right;">'.$branch_lang2['cr_no'].'</td>
                <td width="10%" style="line-height: 130%;background-color:#e8ecef; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf; padding-left:15px;  text-align:right;font-weight: bold; ">معرف آخر</td>
                <td width="15%" style="line-height: 130%; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf; padding-left:15px;  text-align:right; ">'.$branch_lang2['vat'].'</td>
                <td width="10%" style="line-height: 130%;background-color:#e8ecef; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf;  "><span class="text-bold" style="text-align: right; direction: rtl;font-weight: bold;">رقم الضريبي</span></td>
            </tr>
            <tr style="border:1px dashed black;">
            <td width="10%" style="line-height: 130%;background-color:#e8ecef; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf;  border-left:1px dashed #bfbfbf;">Phone:</td>
            
            <td width="17%" style="line-height: 130%; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf; padding-left:15px;font-weight: bold;  ">'.$cstmr['contact_no1'].'</td>
            
            <td width="8%" style="line-height: 130%;background-color:#e8ecef; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf;  border-left:1px dashed #bfbfbf;">Email</td>
            
            <td width="15%" style="line-height: 130%; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf; padding-left:15px;  "> '.$cstmr['email'].'</td>
            
            <td width="15%" style="line-height: 130%; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf;  border-left:1px dashed #bfbfbf;text-align:right;">-</td>
            
            <td width="10%" style="line-height: 130%;background-color:#e8ecef; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf; padding-left:15px; text-align:right;font-weight: bold; "> رقم التليفون</td>
            
            <td width="15%" style="line-height: 130%; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf; padding-left:15px; text-align:right; ">-</td>
            
            <td width="10%" style="line-height: 130%;background-color:#e8ecef; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf;"><span class="text-bold" style="text-align: right; direction: rtl;font-weight: bold;"> بريد</span></td>
        </tr>
        </tbody>
    </table>';
    
    $htmlb = '
    <table border="0" cellspacing="0" cellpadding="1">
    <tr><td width="100%" >	'.$sellertable.'	</td>
          </tr>   
    </table>';

    $pdf->writeHTML($htmlb, true, false, true, false, '');
    $pageWidth = $pdf->getPageWidth();
    $startXr2qr = $pageWidth-$PDF_MARGIN_RIGHT-30;
    $qry=$pdf->getY();
    $qrx=$startXr2qr;
    $pdf->Ln(-1);
    $pdf->SetFont('dejavusans', '', 9);
    $beforeitemposition=$pdf->getY();
    $pdf->setFont('dejavusans', '', 8);

    $pdf->Ln(-4);
$custtable='<table style="border:1px solid #bfbfbf; font-size: 8px;width:100%; " cellpadding="4">
        <tbody>
            <tr style="border:1px dashed black;">
                <td width="50%" style="line-height: 130%; border-right:hidden !important; border-bottom:1px dashed #bfbfbf; color:#0080ff;font-weght:1000px;  border-left:hidden !important;padding: 8px;" colspan="">&#x25a0; <u>Client Details :</u></td>
                <td width="50%" style="line-height: 130%; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf;  "><span class="text-bold" style="text-align: right; direction: rtl; font-weight: bold; color:#0080ff;"><u>&#x25a0;تفاصيل شركة العميل</u></span></td>
            </tr>

            <tr style="border:1px dashed black;">
                <td width="10%" style="line-height: 130%;background-color:#e8ecef; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf;  border-left:1px dashed #bfbfbf;">Name:</td>
                <td width="40%" style="line-height: 130%; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf; padding-left:15px;font-weight: bold;  "> '.$badr['name'].'</td>
                <td width="40%" style="line-height: 130%; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf; padding-left:15px;text-align:right;font-weight: bold;  "> '.$badr_lang2['name'].'</td>
                <td width="10%" style="line-height: 130%;background-color:#e8ecef; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf;  "><span class="text-bold" style="text-align: right; direction: rtl;font-weight: bold;">الإ سم</span></td>
            </tr>

            <tr style="border:1px dashed black;">
                <td width="10%" style="line-height: 130%;background-color:#e8ecef; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf;  border-left:1px dashed #bfbfbf;">Street Name:</td>
                <td width="40%" style="line-height: 130%; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf; padding-left:15px;  "> '.$badr['address_line2'].'</td>
                <td width="40%" style="line-height: 130%; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf; padding-left:15px; text-align:right; "> '.$badr_lang2['address_line2'].'</td>
                <td width="10%" style="line-height: 130%;background-color:#e8ecef; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf;  "><span class="text-bold" style="text-align: right; direction: rtl;font-weight: bold;">اسم الشارع</span></td>
            </tr>

            <tr style="border:1px dashed black;">
                <td width="10%" style="line-height: 130%;background-color:#e8ecef; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf;  border-left:1px dashed #bfbfbf;">Building No:</td>
                <td width="17%" style="line-height: 130%; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf; padding-left:15px;  "> '.$badr['address_line1'].'</td>
                <td width="8%" style="line-height: 130%;background-color:#e8ecef; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf;  border-left:1px dashed #bfbfbf;">City</td>
                <td width="15%" style="line-height: 130%; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf; padding-left:15px;  "> '.$badr['address_line4'].'</td>
                <td width="17%" style="line-height: 130%; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf;  border-left:1px dashed #bfbfbf;text-align:right;">'.$badr_lang2['address_line1'].'</td>
                <td width="8%" style="line-height: 130%;background-color:#e8ecef; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf; padding-left:15px;text-align:right; font-weight: bold; ">  مدينة</td>
                <td width="15%" style="line-height: 130%; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf; padding-left:15px;  text-align:right;"> '.$badr_lang2['address_line1'].'</td>
                <td width="10%" style="line-height: 130%;background-color:#e8ecef; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf;  "><span class="text-bold" style="text-align: right; direction: rtl;font-weight: bold;">رقم المبنى</span></td>
            </tr>

            <tr style="border:1px dashed black;">
                <td width="10%" style="line-height: 130%;background-color:#e8ecef; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf;  border-left:1px dashed #bfbfbf;">Addl. No:</td>
				
                <td width="17%" style="line-height: 130%; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf; padding-left:15px;  ">'.$cstmr['additional_no'].'</td>
				
                <td width="8%" style="line-height: 130%;background-color:#e8ecef; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf;  border-left:1px dashed #bfbfbf;">District</td>
				
                <td width="15%" style="line-height: 130%; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf; padding-left:15px;  "> '.$badr['address_line3'].'</td>
				
                <td width="17%" style="line-height: 130%; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf;  border-left:1px dashed #bfbfbf;text-align:right;">'.$badr_lang2['address_line3'].'</td>
				
                <td width="8%" style="line-height: 130%;background-color:#e8ecef; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf; padding-left:15px; text-align:right; font-weight: bold;">  الحي</td>
				
                <td width="15%" style="line-height: 130%; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf; padding-left:15px; text-align:right; ">'.$cstmr['additional_no_lang2'].'</td>
				
                <td width="10%" style="line-height: 130%;background-color:#e8ecef; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf;  "><span class="text-bold" style="text-align: right; direction: rtl;font-weight: bold;">رقم إضافي</span></td>
            </tr>

            <tr style="border:1px dashed black;">
                <td width="10%" style="line-height: 130%;background-color:#e8ecef; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf;  border-left:1px dashed #bfbfbf;">Postal Code:</td>
				
                <td width="17%" style="line-height: 130%; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf; padding-left:15px;  ">'.$badr['address_code'].'</td>
				
                <td width="8%" style="line-height: 130%;background-color:#e8ecef; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf;  border-left:1px dashed #bfbfbf;">Country</td>
				
                <td width="15%" style="line-height: 130%; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf; padding-left:15px;  "> '.$badr['address_line5'].'</td>
				
                <td width="17%" style="line-height: 130%; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf;  border-left:1px dashed #bfbfbf;text-align:right;">'.$badr_lang2['address_line5'].'</td>
				
                <td width="8%" style="line-height: 130%;background-color:#e8ecef; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf; padding-left:15px; text-align:right;font-weight: bold; ">  البلد</td>
				
                <td width="15%" style="line-height: 130%; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf; padding-left:15px; text-align:right; ">'.$badr_lang2['address_code'].'</td>
				
                <td width="10%" style="line-height: 130%;background-color:#e8ecef; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf;  "><span class="text-bold" style="text-align: right; direction: rtl;font-weight: bold;">الرمز البريدي</span></td>
            </tr>

            <tr style="border:1px dashed black;">
                <td width="10%" style="line-height: 130%;background-color:#e8ecef; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf;  border-left:1px dashed #bfbfbf;">VAT number:</td>
				
                <td width="17%" style="line-height: 130%; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf; padding-left:15px;font-weight: bold;  ">'.$badr['vat'].'</td>
				
                <td width="8%" style="line-height: 130%;background-color:#e8ecef; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf;  border-left:1px dashed #bfbfbf;">CR No.</td>
				
                <td width="15%" style="line-height: 130%; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf; padding-left:15px;  "> '.$cstmr['cr_no'].'</td>
				
                <td width="17%" style="line-height: 130%; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf;  border-left:1px dashed #bfbfbf;text-align:right;">'.$cstmr['cr_no'].'</td>
				
                <td width="8%" style="line-height: 130%;background-color:#e8ecef; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf; padding-left:15px; text-align:right;font-weight: bold; ">معرف آخر</td>
				
                <td width="15%" style="line-height: 130%; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf; padding-left:15px; text-align:right; ">'.$badr_lang2['vat'].'</td>
				
                <td width="10%" style="line-height: 130%;background-color:#e8ecef; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf;"><span class="text-bold" style="text-align: right; direction: rtl;font-weight: bold;">رقم الضريبي</span></td>
            </tr>
            <tr style="border:1px dashed black;">
            <td width="10%" style="line-height: 130%;background-color:#e8ecef; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf;  border-left:1px dashed #bfbfbf;">Phone:</td>
            
            <td width="17%" style="line-height: 130%; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf; padding-left:15px;font-weight: bold;  ">'.$compprof['contact_no1'].'</td>
            
            <td width="8%" style="line-height: 130%;background-color:#e8ecef; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf;  border-left:1px dashed #bfbfbf;">Email</td>
            
            <td width="15%" style="line-height: 130%; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf; padding-left:15px;  "> '.$compprof['email'].'</td>
            
            <td width="17%" style="line-height: 130%; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf;  border-left:1px dashed #bfbfbf;text-align:right;">-</td>
            
            <td width="8%" style="line-height: 130%;background-color:#e8ecef; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf; padding-left:15px; text-align:right;font-weight: bold; "> رقم التليفون</td>
            
            <td width="15%" style="line-height: 130%; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf; padding-left:15px; text-align:right; ">-</td>
            
            <td width="10%" style="line-height: 130%;background-color:#e8ecef; border-right:1px dashed #bfbfbf; border-bottom:1px dashed #bfbfbf;"><span class="text-bold" style="text-align: right; direction: rtl;font-weight: bold;"> بريد</span></td>
        </tr>
        </tbody>
    </table>';
/* 
    $htmla = '
<table border="0" cellspacing="0" cellpadding="4">
<tr><td width="100%" >	'.$custtable.'	</td>
	  </tr>   
</table>'; */
$pdf->Ln(1);
$pdf->writeHTML($custtable, true, false, true, false, '');



$pdf->setPrintHeader(false);
$pdf->SetMargins($PDF_MARGIN_LEFT, $PDF_MARGIN_LEFT, $PDF_MARGIN_RIGHT); // Remove top margin space




$pageWidth = $pdf->getPageWidth();
$startXr2qr = $pageWidth-$PDF_MARGIN_RIGHT-30;
$qry=$pdf->getY();
$qrx=$startXr2qr;
$pdf->Ln(-1);
$pdf->SetFont('dejavusans', '', 9);
$beforeitemposition=$pdf->getY();
$pdf->setFont('dejavusans', '', 8);

$pdf->Ln(-6);
$htmlinv = '<table style="border:1px solid white; font-size: 8px;width:100%;" cellpadding="2">
            <tbody>
                <tr style="border:1px solid black;">
                    <td class="text-bold" style="text-align:center; line-height: 200%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;border-top:1px solid #bfbfbf; border-left:1px solid #bfbfbf; background-color:#e8ecef; font-weight: bold;" class="text-center"> تاريخ الفاتورة <br><span style="text-align: center; "> Invoice Date</span></td>
                    <td class="text-bold" style="text-align:center; line-height: 200%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;border-top:1px solid #bfbfbf; border-left:1px solid #bfbfbf; background-color:#e8ecef; font-weight: bold;" class="text-center">  تاريخ التسليم <br><span style="text-align: center; "> Supply Date</span></td>
                    <td class="text-bold" style="text-align:center; line-height: 200%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;border-top:1px solid #bfbfbf; border-left:1px solid #bfbfbf; background-color:#e8ecef; font-weight: bold;" class="text-center">  رقم أمر الشراء <br><span style="text-align: center; "> Contract / PO No </span></td>
                    <td class="text-bold" style="text-align:center; line-height: 200%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;border-top:1px solid #bfbfbf; border-left:1px solid #bfbfbf; background-color:#e8ecef; font-weight: bold;" class="text-center">  تاريخ االستحقاق <br><span style="text-align: center; "> Due Date</span></td>
                    <td class="text-bold" style="text-align:center; line-height: 200%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;border-top:1px solid #bfbfbf; border-left:1px solid #bfbfbf; background-color:#e8ecef; font-weight: bold;" class="text-center">  فترة الفاتورة <br><span style="text-align: center "> Invoice Period</span></td>
                    <td class="text-bold" style="text-align:center; line-height: 200%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;border-top:1px solid #bfbfbf; border-left:1px solid #bfbfbf; background-color:#e8ecef; font-weight: bold;" class="text-center">  رقم المرجع <br><span style="text-align: center; ">Project /ReferenceNo</span></td>
                </tr>
                <tr style="border:1px solid black;">
                    <td class="text-bold" style="text-align:center; line-height: 200%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;border-top:1px solid #bfbfbf; border-left:1px solid #bfbfbf;" class="text-center">' . date('d-M-Y', strtotime($details['inv_date'])) . '</td>
                    <td class="text-bold" style="text-align:center; line-height: 200%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;border-top:1px solid #bfbfbf; border-left:1px solid #bfbfbf;" class="text-center">'.date('d-M-Y', strtotime($details['sup_date'])).'</td>
                    <td class="text-bold" style="text-align:center; line-height: 200%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;border-top:1px solid #bfbfbf; border-left:1px solid #bfbfbf;" class="text-center">' . $details['order_no'] . '</td>
                    <td class="text-bold" style="text-align:center; line-height: 200%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;border-top:1px solid #bfbfbf; border-left:1px solid #bfbfbf;" class="text-center">'.date('d-M-Y', strtotime($details['due_date'])).'</td>';
                   
					
					
					
					if($details['inv_from']>'2000-01-01') {
                    
				$htmlinv .= '	<td class="text-bold" style="text-align:center; line-height: 200%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;border-top:1px solid #bfbfbf; border-left:1px solid #bfbfbf;" class="text-center">'.date('d-M-Y', strtotime($details['inv_from'])).'</td>';
					} else {
					
				$htmlinv .= '	<td class="text-bold" style="text-align:center; line-height: 200%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;border-top:1px solid #bfbfbf; border-left:1px solid #bfbfbf;" class="text-center"></td>';
					
					} 
					
					
					
					
					
					
                    $htmlinv .= '<td class="text-bold" style="text-align:center; line-height: 200%; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;border-top:1px solid #bfbfbf; border-left:1px solid #bfbfbf;" class="text-center">'.$details['reference_no'].'</td>
                </tr>
            </tbody>
        </table>';
$pdf->Ln(2);
		
$pdf->writeHTML($htmlinv, true, false, true, false, '');
		
$pdf->Ln(-3);			
$html = '
<table style="border:1px solid #bfbfbf; font-size: 8px;width:100%; " cellpadding="4">
	<tr style="border:1px solid black;">
	
        <td style="text-align:left; line-height: 130%; border-right:1px solid #bfbfbf; background-color:#e8ecef; border-bottom:1px solid #bfbfbf;border-top:1px solid #bfbfbf; border-left:1px solid #bfbfbf; " align="center" width="9%" > إالجمالى(ريال سعودى) <br>Total Amount Incl.VAT (SAR)</td>
        <td style="text-align:left; line-height: 130%; border-right:1px solid #bfbfbf; background-color:#e8ecef; border-bottom:1px solid #bfbfbf;border-top:1px solid #bfbfbf; border-left:1px solid #bfbfbf; " align="center" width="9%" >ضريبةالقيمةالمضافة(ريال سعودى)<br>VAT Amount(SAR)</td>
        <td style="text-align:left; line-height: 130%; border-right:1px solid #bfbfbf; background-color:#e8ecef; border-bottom:1px solid #bfbfbf;border-top:1px solid #bfbfbf; border-left:1px solid #bfbfbf; " align="center" width="5%" >ضريبةالقيمةالمضافة<br>VAT%</td>
        <td style="text-align:left; line-height: 130%; border-right:1px solid #bfbfbf; background-color:#e8ecef; border-bottom:1px solid #bfbfbf;border-top:1px solid #bfbfbf; border-left:1px solid #bfbfbf; "align="center" width="11%" > لسعر إالجمالى غير شامل ضريبة القيمة المضافة(ريال سعودى)<br>Total Price excl. VAT (SAR)</td>
        <td style="text-align:left; line-height: 130%; border-right:1px solid #bfbfbf; background-color:#e8ecef; border-bottom:1px solid #bfbfbf;border-top:1px solid #bfbfbf; border-left:1px solid #bfbfbf; "align="center" width="9%" > (ريال سعودى) سعر الوحدة<br>Unit Rate(SAR)</td>
        <td style="text-align:left; line-height: 130%; border-right:1px solid #bfbfbf; background-color:#e8ecef; border-bottom:1px solid #bfbfbf;border-top:1px solid #bfbfbf; border-left:1px solid #bfbfbf; "align="center" width="7%" ><br><br> الكمية<br>Qty</td>
        <td style="text-align:left; line-height: 130%; border-right:1px solid #bfbfbf; background-color:#e8ecef; border-bottom:1px solid #bfbfbf;border-top:1px solid #bfbfbf; border-left:1px solid #bfbfbf; "  align="center" width="12%" ><br><br>  وحدة<br>Unit</td>
        <td style="text-align:left; line-height: 130%; border-right:1px solid #bfbfbf; background-color:#e8ecef; border-bottom:1px solid #bfbfbf;border-top:1px solid #bfbfbf; border-left:1px solid #bfbfbf; " align="center" width="27%" ><br><br>الوصف <br>Nature of Goods / Services</td>
        <td style="text-align:left; line-height: 130%; border-right:1px solid #bfbfbf; background-color:#e8ecef; border-bottom:1px solid #bfbfbf;border-top:1px solid #bfbfbf; border-left:1px solid #bfbfbf; " align="center" width="8%" ><br><br> الرمز وحدة حفظ)(المخزون<br>Code (SKU)</td>
        <td style="text-align:left; line-height: 130%; border-right:1px solid #bfbfbf; background-color:#e8ecef; border-bottom:1px solid #bfbfbf;border-top:1px solid #bfbfbf; border-left:1px solid #bfbfbf; " align="center" width="3%" ><br><br><br>#</td>
        
    </tr>';


 
$tot=0;
                $i=1;
                $amt=0;
                $txamt=0;
                $disc_amt=0;
                $t=0;$s=0;$c=0;$cess=0;$g=0; $sl=1; 
foreach($items as $item) { 

$name= $item['item_name']; 
if($item['name_lang2']!=null) { $name2= '<br>'.$item['name_lang2'];  } else { $name2=''; }
if($item['description']!="") { $desc= nl2br($item['description']); } else { $desc=''; }
$itemname=$name.$name2.$desc;
$item_code='';
							$unit=$item['txtf1'];
   $itemid=$item['item_id']; if($itemid>0) {
   	$itm=$this->db->get("tbl_items  WHERE id='$itemid'")->row();	$itmunitid=$itm->unit_id;				
  if($itmunitid>0) {
   $u=$this->db->get("tbl_unitofmeasure  WHERE id='$itmunitid'")->row();
   $unit= $u->uqc;
   }
   } else {
	
   	$unit= $item['txtf1'];
   }



	$html .= '
	<tr>
        <td align="right" style="line-height: 130%; border-left:1px solid #bfbfbf; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf; font-size:8px; ">'.number_format($item['total_price'],2).'</td>';
$html .= '<td align="right" style="line-height: 130%; border-left:1px solid #bfbfbf; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf; font-size:8px; ">'.number_format($item['vat_amt'],2).'</td>
		<td align="right" style="line-height: 130%; border-left:1px solid #bfbfbf; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf; font-size:8px; ">'.$item['vat_perc'].'%</td>
        <td align="right" style="line-height: 130%; border-left:1px solid #bfbfbf; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf; font-size:8px; ">'.number_format($item['taxable'],2).'</td>
        <td align="right" style="line-height: 130%; border-left:1px solid #bfbfbf; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf; font-size:8px; ">'.number_format($item['price'],2).'</td>
        <td align="center" style="line-height: 130%;  border-left:1px solid #bfbfbf;border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf; font-size:8px;">'.$item['quantity'].'</td>
        <td align="center" style="line-height: 130%; border-left:1px solid #bfbfbf; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf; font-size:8px;">'.$unit.'</td>
        <td align="left" style="line-height: 130%; border-left:1px solid #bfbfbf; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf; font-size:8px;">'.$itemname.'</td>
        <td align="right" style="line-height: 130%; border-left:1px solid #bfbfbf; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf; font-size:8px;">'.$item_code.'</td>
        <td align="center" style="line-height: 130%; border-left:1px solid #bfbfbf; border-right:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf; border-left:1px solid #bfbfbf; font-size:8px;" >'.$i++.'</td>
	</tr>
    '; 
	
	 $tot=$tot+$item['taxable'];
                    $disc_amt=$disc_amt+$item['disc_amt'];
                    $amt=$amt+$item['price']*$item['quantity'];
                    $txamt=$txamt+($item['price']*$item['quantity']*$details['vat']/100);
}
$pdf->Ln(-1);
// $html .= '<tr>
//         <td align="right" style="line-height: 400%; border-left:1px solid #bfbfbf; border-bottom:1px solid #bfbfbf;  font-size:9px; "></td>
//         <td align="right" style="line-height: 400%;  border-bottom:1px solid #bfbfbf;  font-size:9px; "></td>
// 		<td align="right" style="line-height: 400%;  border-bottom:1px solid #bfbfbf;  font-size:9px; "></td>
//         <td align="right" style="line-height: 400%;  border-bottom:1px solid #bfbfbf;  font-size:9px; "></td>
//         <td align="right" style="line-height: 400%;  border-bottom:1px solid #bfbfbf;  font-size:9px; "></td>
//         <td align="right" style="line-height: 400%; border-bottom:1px solid #bfbfbf;  font-size:9px;"></td>
//         <td align="right" style="line-height: 400%;  border-bottom:1px solid #bfbfbf;  font-size:9px;"></td>
//         <td align="right" style="line-height: 400%;  border-bottom:1px solid #bfbfbf;  font-size:9px;"></td>
//         <td align="center" style="line-height: 400%;  border-bottom:1px solid #bfbfbf; border-right:1px solid #bfbfbf;  font-size:9px;" ></td>
// </tr>';
$html .= '</table>';
$pdf->writeHTML($html, true, false, true, false, '');


$pdf->Ln(2);


$startY2y = $pdf->GetY();
$afteritemposition=$pdf->getY();
$currenty = $pdf->getY();
$termshight=$currenty-$afteritemposition;
$blankspace=((200-$PDF_MARGIN_BOTTOM)-$currenty+5);
if($signature != '') { $sign=''; } else { $sign=''; } 
if($seal != '') { $cseal=''; } else { $cseal=''; } 
	

 








$approvedby = 
'<table style="border-bottom:1px solid #bfbfbf;border:1px solid #bfbfbf;font-size: 8px;" cellspacing="0" cellpadding="4">
<tr>
    <td style=" background-color:#e8ecef;border-bottom:1px solid black;"><span style="font-weight: bold;font-size: 10px;text-align: center;"> Prepared By /</span><span style="font-weight: bold;font-size: 10px;text-align: center;"> ﻿

معد الفاتورة</span><br></td>
</tr>';

if($d146->active==1) { 
	if($company['seal']!="") {
		
		
$approvedby .=	'<tr>
<td style="text-align:center;"><img src="' . $seal . '" width="100" height="37"><br>التوقيع مع الختم<br>Signature with stamp</td>
</tr>';

	} else {
		
$approvedby .=	'<tr>
<td style="text-align:center;"><br><br><br><br><br><br><br><br><br>التوقيع مع الختم<br>Signature with stamp</td>
</tr>';
	}
	

	} else {

$approvedby .=	'<tr>
    <td style="text-align:center;"><br><br><br><br><br><br><br><br><br>التوقيع مع الختم<br>Signature with stamp</td>
</tr>';

	}

$approvedby .=	'</table>';








/*  } else {  
$approvedby = 
'<table border="0" cellspacing="0" cellpadding="1">
<tr>
    <td style=" background-color:#e8ecef;border-bottom:1px solid black;"><span style="font-weight: bold;font-size: 10px;text-align: center;"> Prepared By /</span><span style="font-weight: bold;font-size: 10px;text-align: center;"> ﻿

معد الفاتورة</span><br></td>
</tr>
<tr>
    <td style="text-align:center;"><br><br><br><br><br><br><br><br><br>التوقيع مع الختم<br>Signature with stamp</td>
</tr>
</table>';

}
 */







// $receivedby = 

// '<table style="border-bottom:1px solid #bfbfbf;border:1px solid #bfbfbf;font-size: 8px;" cellspacing="0" cellpadding="4">
// <tr>
//     <td style=" background-color:#e8ecef;border-bottom:1px solid black;"><span style="font-weight: bold;font-size: 10px;text-align: center;">Recieved  By /</span><span style="font-weight: bold;font-size: 10px;text-align: center;"> ﻿

// معد الفاتورة</span><br></td>
// </tr>';

// if($d146->active==1) { 
// 	if($seal!="") {
		
		
// $receivedby .=	'<tr>
// <td style="text-align:center;"><img src="' . $seal . '" width="100" height="37"><br>التوقيع مع الختم<br>Signature with stamp</td>
// </tr>';

// 	} else {
		
// $receivedby .=	'<tr>
// <td style="text-align:center;"><br><br><br><br><br><br><br><br><br>التوقيع مع الختم<br>Signature with stamp</td>
// </tr>';
// 	}
	

// 	} else {

// $receivedby .=	'<tr>
//     <td style="text-align:center;"><br><br><br><br><br><br><br><br><br>التوقيع مع الختم<br>Signature with stamp</td>
// </tr>';

// 	}

// $receivedby .=	'</table>';


$bankdetails = '<table style="border-bottom:1px solid #bfbfbf;border:1px solid #bfbfbf;font-size: 8px;" cellspacing="0" cellpadding="4">
<tr>
    <td colspan="2" style="border-bottom:1px solid black; background-color:#e8ecef;"><span style="font-weight: bold;font-size: 10px;text-align: center;"> Bank Details /  التفاصيل المصرفية <br></span></td>
</tr>
<tr>
    <td style="line-height: 240%;border:1px solid #bfbfbf;font-weight: bold;font-size: 8px;" width="40%">ACCOUNT NAME /<br> اسم الحساب</td>
    <td style="border:1px solid #bfbfbf;font-size: 9px;" width="60%"> '.$bank['acc_name'].'<span>/'.$bank['acc_name_lang2'].'</span></td>
</tr>
<tr>
    <td style="line-height: 240%;border:1px solid #bfbfbf;font-weight: bold;font-size: 8px;">BANK / بنك </td>
    <td style="border:1px solid #bfbfbf;font-size: 9px;"> '.$bank['name'].'<span>/'.$bank['name'].'</span></td>
</tr>
<tr> 
    <td style="line-height: 240%;border:1px solid #bfbfbf;font-weight: bold;font-size: 8px;">ACCOUNT / الحساب</td>
    <td style="border:1px solid #bfbfbf;font-size: 9px;"> '.$bank['acc_no'].'<span>/'.$bank['acc_no_lang2'].'</span></td>
</tr>
<tr>
    <td style=" line-height: 240%;border:1px solid #bfbfbf;font-weight: bold;font-size: 8px;">IBAN / آيبان</td>
    <td style="border:1px solid #bfbfbf;font-size:9px;"> '.$bank['iban_no'].'<span>/'.$bank['iban_no_lang2'].'</span></td>
</tr>
<tr>
    <td style="line-height: 240%;font-weight: bold;font-size: 8px;">BRANCH</td>
    <td style="border:1px solid #bfbfbf;font-size: 9px;"> '.$bank['swift_no'].'<span>/'.$bank['swift_no_lang2'].'</span></td>
</tr>
</table>';
$pdf->Ln(-6);
$totaldet = '<table style="border:1px solid #bfbfbf; font-size: 8px;width:100%; " cellpadding="4">
<tr>

    <td width="30%" style="border-right:1px solid #bfbfbf;line-height: 100%; border-bottom:1px solid #bfbfbf;font-weight:bold; border-left:hidden !important;padding: 8px;" >Total excl. VAT(SAR)</td>
    <td width="20%" align="right" style=" border-right:1px solid #bfbfbf;line-height: 100%;font-size:8px;font-weight:bold; border-bottom:1px solid #bfbfbf;background-color:#e8ecef;">'.number_format($details['total']+$details['discount'],2).'</td>
    <td width="50%" align="left" style=" border-right:1px solid #bfbfbf;line-height: 100%;font-size:8px;font-weight:bold; border-bottom:1px solid #bfbfbf;" >إالجمالى غير شامل ضريبة القيمة المضافة (ريال سعودى)</td>    
    <td width="43%" rowspan="4" style="border-right: 1px solid #bfbfbf; line-height: 120%; border-top: 2px solid #bfbfbf; border-bottom: 1px solid #bfbfbf;font-size: 9px;">Amount in words : ' . $amountinwords . '<span class="text-end" align="right"><br>' . $amountinwordsar . '</span></td>

    </tr>

<tr>
<td width="30%" style="border-right:1px solid #bfbfbf;line-height: 100%; border-bottom:1px solid #bfbfbf;font-weight:bold; border-left:hidden !important;padding: 8px;" >VAT Amount(SAR)</td>
    <td width="20%" align="right" style="border-right:1px solid #bfbfbf;line-height: 100%; border-bottom:1px solid #bfbfbf;font-weight:bold; border-left:hidden !important;padding: 8px;background-color:#e8ecef;">'.number_format($details['vat'],2).'</td>
    <td width="50%" align="right" style="border-right:1px solid #bfbfbf;line-height: 100%; border-bottom:1px solid #bfbfbf;font-weight:bold; border-left:hidden !important;padding: 8px;">ضريبة القيمة المضافة (ريال سعودى)</td>    
</tr>
<tr> 
    <td width="30%" align="left" style="border-right:1px solid #bfbfbf;line-height: 100%; border-bottom:1px solid #bfbfbf;font-weight:bold; border-left:hidden !important;padding: 8px;">Amount Incl.VAT(SAR)</td>
    <td width="20%" align="right" style="line-height: 100%; border-right:1px solid #bfbfbf;font-size:8px;font-weight:bold; border-bottom:1px solid #bfbfbf; background-color:#e8ecef;">'.number_format($details['grand_total'],2).'</td>
    <td width="50%" align="right" style="line-height: 100%; border-right:1px solid #bfbfbf;font-size:8px;font-weight:bold; border-bottom:1px solid #bfbfbf;">المبلغ  ضريبة القيمة المضافة (ريال سعودى)</td>    
</tr>';
if($d282->active==1) { 
$totaldet .= '
<tr>
    <td width="30%" align="left" style="border-right:1px solid #bfbfbf;line-height: 100%; border-bottom:1px solid #bfbfbf;font-weight:bold; border-left:hidden !important;padding: 8px;">Balance Due(SAR)</td>
    <td width="20%" align="right" style="line-height: 100%; border-right:1px solid #bfbfbf;font-size:8px;font-weight:bold; border-bottom:1px solid #bfbfbf; background-color:#e8ecef;">'.number_format($customerbalance,2).'</td>
    <td width="50%" align="right" style="line-height: 100%; border-right:1px solid #bfbfbf;font-size:8px;font-weight:bold; border-bottom:1px solid #bfbfbf;">(الإجمالي المبلغ المستحق (ريال سعودى</td>   
</tr>';
}
if($d291->active==1) { 
$totaldet .= '<tr>
    <td width="30%" align="left" style="border-right:1px solid #bfbfbf;line-height: 100%; border-bottom:1px solid #bfbfbf;font-weight:bold; border-left:hidden !important;padding: 8px;">Balance Due(SAR)</td>
    <td width="20%" align="right" style="line-height: 100%; border-right:1px solid #bfbfbf;font-size:8px;font-weight:bold; border-bottom:1px solid #bfbfbf; background-color:#e8ecef;">'.number_format($invoicebalance,2).'</td>
    <td width="50%" align="right" style="line-height: 100%; border-right:1px solid #bfbfbf;font-size:8px;font-weight:bold; border-bottom:1px solid #bfbfbf;">(الإجمالي المبلغ المستحق (ريال سعودى</td>   
</tr>';
} else {
	$totaldet .= '
<tr>
    <td width="30%" align="left" style="border-right:1px solid #bfbfbf;line-height: 100%; border-bottom:1px solid #bfbfbf;font-weight:bold; border-left:hidden !important;padding: 8px;"></td>
    <td width="20%" align="right" style="line-height: 100%; border-right:1px solid #bfbfbf;font-size:8px;font-weight:bold; border-bottom:1px solid #bfbfbf; background-color:#e8ecef;"></td>
    <td width="50%" align="right" style="line-height: 100%; border-right:1px solid #bfbfbf;font-size:8px;font-weight:bold; border-bottom:1px solid #bfbfbf;">(الإجمالي المبلغ المستحق (ريال سعودى</td>   
</tr>';
}
   
$totaldet .= '
   
</table>';
$pdf->getY();

$html1 = '
<table style="border:1px solid #bfbfbf" cellspacing="0" cellpadding="1">
    <tr>
        <td width="70%" border="0" >	'.$totaldet.'	</td>   
    </tr>
	
   
</table>';
$pdf->writeHTML($html1);
// $pdf->Ln(1);
//$pdf->writeHTML($html1);
$afteritemposition=$pdf->getY();
if($afteritemposition>225) {
$pdf->AddPage(); 
}
$xp=165;
$yp=$pdf->getY()+2;

$style = array(
'border' => false,
'padding' => 0,
'fgcolor' => array(0,0,0),
'bgcolor' => false
);
// $html1 = '
// <table border="1" cellspacing="0" cellpadding="1">
//     <tr> <td width="34%" >	'.$bankdetails.'	</td> <td width="22%" >	'.$approvedby.'	</td><td width="22%" border="0" >'.$receivedby.'</td><td width="22%" border="0"> </td>   </tr>
//     </table>
//     <table border="1" cellspacing="0" cellpadding="1">
// </table>';




$pdf->write2DBarcode($encodedData, 'QRCODE,H', $xp, $yp, 35, 35, $style, 'N');
$pdf->Ln(-38);







$html3 = '
<table style="border:1px solid #bfbfbf; font-size: 8px;width:100%; " cellpadding="5">
    <tr><td width="38%" style="border-right:1px solid #bfbfbf;line-height: 100%; border-bottom:1px solid #bfbfbf;font-weight:bold;text-align: center;background-color:#e8ecef; " colspan="2">Bank Details/ <span> التفاصيل المصرفية </span></td>
	
	<td width="20%" style="border-right:1px solid #bfbfbf;line-height: 100%; border-bottom:1px solid #bfbfbf;font-weight:bold; text-align: center;background-color:#e8ecef;">Prepared By / <span> معد الفاتورة</span></td>
	<td width="20%" style="border-right:1px solid #bfbfbf;line-height: 100%; border-bottom:1px solid #bfbfbf;font-weight:bold;text-align: center;background-color:#e8ecef; ">Recieved By / <span>فاتورة مستالم</span></td>
	<td width="22%" style="border-right:1px solid #bfbfbf;line-height: 100%; border-bottom:1px solid #bfbfbf;font-weight:bold; text-align: center;" rowspan="6"></td>
	</tr>

    <tr><td width="13%" style="border-right:1px solid #bfbfbf;line-height: 100%; border-bottom:1px solid #bfbfbf;font-weight:bold; ">ACCOUNT NAME / اسم الحساب</td>
	<td width="25%" style="border-right:1px solid #bfbfbf;line-height: 100%; border-bottom:1px solid #bfbfbf;font-weight:bold; "> '.$bank['acc_name'].'<span>/'.$bank['acc_name_lang2'].'</span></td>';
	
		if($d146->active==1) {

	
	$html3 .= '<td width="20%" style="border-right:1px solid #bfbfbf;line-height: 100%; border-bottom:1px solid #bfbfbf;font-weight:bold; text-align: center;" rowspan="5"><img src="' . $seal . '" width="90" height="90" align="center">Signature with Stamp<br>التوقيع مع الختم</td>';
	
		} else { 
	$html3 .= '<td width="20%" style="border-right:1px solid #bfbfbf;line-height: 100%; border-bottom:1px solid #bfbfbf;font-weight:bold; " rowspan="5"></td>';
		}
	
        if($d146->active==1) {

	
            $html3 .= '<td width="20%" style="border-right:1px solid #bfbfbf;line-height: 100%; border-bottom:1px solid #bfbfbf;font-weight:bold; text-align: center;" rowspan="5">
            
            <br><br><br><br><br><br><br><br><br><br><br><br><br>
            Signature with Stamp<br> التوقيع مع الختم</td>';
            
                } else { 
            $html3 .= '<td width="20%" style="border-right:1px solid #bfbfbf;line-height: 100%; border-bottom:1px solid #bfbfbf;font-weight:bold; " rowspan="5"></td>';
                }
				
				
				
				
			$bankname_lang2	=$bank['branch_name_lang2'];
			if($bankname_lang2!="") { $bankname_lang2='/ '.$bankname_lang2; }
			$bankacc_no_lang2	=$bank['branch_name_lang2'];
			if($bankacc_no_lang2!="") { $bankacc_no_lang2='/ '.$bankacc_no_lang2; }
			$bankiban_no_lang2	=$bank['branch_name_lang2'];
			if($bankiban_no_lang2!="") { $bankiban_no_lang2='/ '.$bankiban_no_lang2; }
			$bankbranch_name_lang2	=$bank['branch_name_lang2'];
			if($bankbranch_name_lang2!="") { $bankbranch_name_lang2='/ '.$bankbranch_name_lang2; }
				
				
				
				
            
	$html3 .= '<td width="20%" style="border-right:1px solid #bfbfbf;line-height: 100%; border-bottom:1px solid #bfbfbf;font-weight:bold; " rowspan="5"></td>	
	</tr>
	<tr><td width="13%" style="border-right:1px solid #bfbfbf;line-height: 170%; border-bottom:1px solid #bfbfbf;font-weight:bold; ">BANK /بنك</td>
	<td width="25%" style="border-right:1px solid #bfbfbf;line-height: 170%; border-bottom:1px solid #bfbfbf;font-weight:bold; ">'.$bank['name'].'<span>'.$bankname_lang2.'</span></td>	
	</tr>
    <tr>
    <td width="13%" style="border-right:1px solid #bfbfbf;line-height: 170%; border-bottom:1px solid #bfbfbf;font-weight:bold; ">ACCOUNT / الحساب</td>
	<td width="25%" style="border-right:1px solid #bfbfbf;line-height: 170%; border-bottom:1px solid #bfbfbf;font-weight:bold; ">'.$bank['acc_no'].'<span>'.$bankacc_no_lang2.'</span></td>	
	</tr>
    <tr><td width="13%" style="border-right:1px solid #bfbfbf;line-height: 170%; border-bottom:1px solid #bfbfbf;font-weight:bold; ">IBAN / آيبان</td>
	<td width="25%" style="border-right:1px solid #bfbfbf;line-height: 170%; border-bottom:1px solid #bfbfbf;font-weight:bold; ">'.$bank['iban_no'].'<span>'.$bankiban_no_lang2.'</span></td>	
	</tr>
    <tr><td width="13%" style="border-right:1px solid #bfbfbf;line-height: 170%; border-bottom:1px solid #bfbfbf;font-weight:bold; ">BRANCH</td>
	<td width="25%" style="border-right:1px solid #bfbfbf;line-height: 170%; border-bottom:1px solid #bfbfbf;font-weight:bold; ">'.$bank['branch_name'].'<span>'.$bankbranch_name_lang2.'</span></td>	
	</tr>
	

</table>';


$pdf->writeHTML($html3);













$pageWidth = $pdf->getPageWidth();
$pdf->lastPage();
$pdf->Output($details['inv_no'].'.pdf', 'I');
//============================================================+
// END OF FILE
//============================================================+

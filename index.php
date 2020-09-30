<?php 

// use setasign\Fpdi\Fpdi;
// use tecnickcom\tcpdf;

// include_once './vendor/autoload.php';

// include_once 'vendor/tecnickcom/tcpdf/tcpdf.php';
// require_once 'vendor/setasign/fpdi/src/Fpdi.php';

include_once 'vendors/tcpdf/tcpdf.php';
require_once 'vendors/fpdi/fpdi.php';

$pdf = new FPDI(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

#  กำหนดรายละเอียดของไฟล์ pdf 
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetTitle( 'Title' );  

# กำหนดสี 
$pdf->setFooterData(  
    array(0,64,0),  // กำหนดสีของข้อความใน footer rgb   
    array(0,0,0)   // กำหนดสีของเส้นคั่นใน footer rgb   
);

# กำหนดฟอนท์ของ header และ footer  กำหนดเพิ่มเติมในไฟล์  tcpdf_config.php 
//$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
//$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

# กำหนดฟอนท์ของ monospaced  กำหนดเพิ่มเติมในไฟล์  tcpdf_config.php   //
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);  

# กำหนดขอบเขตความห่างจากขอบ  กำหนดเพิ่มเติมในไฟล์  tcpdf_config.php   //
$pdf->SetMargins(15, PDF_MARGIN_TOP, 0);  
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);  
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

# กำหนด ฟอนท์  
$pdf->SetFont('angsanaupc', '', 16, '', true);  

# กำหนดแบ่่งหน้าอัตโนมัติ  //
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);  

# เพิ่มหน้า  
$pageCount = $pdf->setSourceFile( 'template/demo2.pdf');
$tplIdx    = $pdf->importPage(1);
$pdf->addPage();
$pdf->useTemplate($tplIdx);

# เขียนข้อมูล

$pdf->Output('in.pdf', 'I');  

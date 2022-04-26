<?php

//require_once('tcpdf_include.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->setPrintFooter(false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('MIS');
$pdf->SetTitle('Student Information');
$pdf->SetSubject('TCPDF');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(5,40,5);
//$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetHeaderMargin(0);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// set font
$pdf->SetFont('dejavusans', '', 10);

// add a page
$pdf->AddPage();

$html = '
            <style>        
                  .titlehead {
                  background-color: #b5b5b5;
                  font-family: "Verdana", Geneva, Tahoma, sans-serif;
                  font-size: 13px;
                  font-weight: bold;
                  text-align: center;
                }
                table td{
                    font-size: 12px;
                    font-family: Verdana, Geneva, Tahoma, sans-serif;
                }
                </style>
                <body>
                
                    <table>
                        <tr>
                          <td style="width: 70%;"><strong>Admission ID: </strong> '.$admissionID.' </td>
                          <td><strong>Application Type: </strong>'.$TypeofApplication.'</td>
                        </tr>
                        <tr>
                          <td><strong>Student Number: </strong>'.$extension.$StudentNo.'</td>
                          <td><strong>Date Registered: </strong>'.$DateofEnter.'</td>
                        </tr>
                        <tr>
                          <td><strong>Department: </strong>Grade School</td>
                        </tr>
                        <tr>
                          <td><strong>Year: </strong>'.$Level.'</td>
                        </tr>
                       </table><br>
                 
                <div class="titlehead"><strong>STUDENT INFORMATION</strong></div><br>
            
                <table>
                    <tr>
                      <td style="width: 70%;"><strong>Name: </strong>'.$FullName.'</td>
                      <td><strong>Gender: </strong>'.$Gender.'</td>
                    </tr>
                    <tr>
                      <td><strong>Address: </strong>'.$Address.'</td>
                      <td><strong>Contact No: </strong>'.$Contact.'</td>
                    </tr>
                    <tr>
                      <td><strong>Email: </strong>'.$Email.'</td>
                      <td><strong>Age: </strong>'.$Age.'</td>
                    </tr>
                    <tr>
                      <td><strong>Birthdate: </strong>'.$Birthdate.'</td>
                      <td><strong>Marital Status: </strong>'.$Status.'</td>
                    </tr>
                    <tr>
                        <td><strong>Religion: </strong>'.$Religion.'</td>
                        <td><strong>Nationality: </strong>'.$Nationality.'</td>
                      </tr>
                   </table><br>


              
            
                <div class="titlehead"><strong>PARENT / GUARDIAN INFORMATION</strong></div><br>
            

                <table>
                    <tr>
                        <td style="width: 70%;"><strong>Name: </strong>'.$Guardian1.'</td>
                        <td><strong>Relationship: </strong>'.$RelationG1.'</td>
                    </tr>
                    <tr>
                        <td><strong>Contact: </strong>'.$ContactG1.'</td>
                        <td></td>
                    </tr>
                    <tr>
                    <td style="width: 70%;"><strong>Name: </strong>'.$Guardian2.'</td>
                    <td><strong>Relationship: </strong>'.$RelationG2.'</td>
                    </tr>
                    <tr>
                    <td><strong>Contact: </strong>'.$ContactG2.'</td>
                        <td></td>
                    </tr>
                </table><br>
          
                <div class="titlehead"><strong>EDUCATIONAL BACKGROUND</strong></div><br>
            
                <table>
                    <tr>
                        <td style="width: 70%;"><strong>Elementary: </strong>'.$Elementary.'</td>
                        <td><strong>Year Graduated: </strong>'.$ESY.'</td>
                    </tr>
                </table>

        ';
        // output the HTML content
        $pdf->writeHTML($html, true, false, true, false, '');
        $pdf->Output($FullName.'.pdf','D');
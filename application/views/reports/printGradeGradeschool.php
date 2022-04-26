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

        // $img_file = K_PATH_IMAGES.'logohcc.png';
        // $pdf->Image($img_file, 30, 70, 150, 150, '', '', '', false, 300, '', false, false, 0);

        $html = '
            <style>        
                  .evaluation {
                    border: 1px solid black;
                }
                table td{
                    font-size: 12px;
                    font-family: Verdana, Geneva, Tahoma, sans-serif;
                }
            </style>

            <table>
                <tr>
                    <td style="width: 70%;"></td>
                    <td><h3>GRADE SCHOOL DEPARTMENT</h3></td>
                </tr>
            </table><br>

            <table>
                <tr>
                <td style="background-color: #b5b5b5; font-size: 25px; font-weight: bold; text-align: center;">C E R T I F I C A T I O N</td>
                </tr>
            </table><br><br>

            <table>
            <tr>
                <td style="width: 70%;"><strong>Name: </strong>'. $FullName.' </td>
                <td><strong>Application Type: </strong>'.$TypeofApplication.'</td>
            </tr>
            <tr>
                <td><strong>Admission Number: </strong>'.$admissionID.'</td>
                <td><strong>Year: </strong>'.$Level.'</td>
            </tr>
            <tr>
                <td><strong>Student Number: </strong>'.$StudentNo.'</td>
                <td><strong>Section: </strong>'.$Section.'</td>
            </tr>
            <tr>
                <td><strong>Address: </strong>'.$Address.'</td>
            </tr>
        </table><br><br>

        <table border="1">
            <thead>
                <tr>
                    <th style="width: 11%;text-align: center;font-weight: bold;">Subject Code</th>
                    <th style="width: 25%;text-align: center;font-weight: bold;">Subject Description</th>
                    <th style="width: 8%;text-align: center;font-weight: bold;">1st Gr.</th>
                    <th style="width: 8%;text-align: center;font-weight: bold;">2nd Gr.</th>
                    <th style="width: 8%;text-align: center;font-weight: bold;">3rd Gr.</th>
                    <th style="width: 8%;text-align: center;font-weight: bold;">4th Gr.</th>
                    <th style="width: 10%;text-align: center;font-weight: bold;">Grade</th>
                    <th style="width: 10%;text-align: center;font-weight: bold;">Remarks</th>
                    <th style="width: 11%;text-align: center;font-weight: bold;">Teacher</th>
                </tr>
            </thead>
            <tbody>           
        ';

        foreach($studentSubjects as $row){
           
            $html .= '<tr>
                <td style="width: 11%;"> '.$row['subjectCode'].'</td>
                <td style="width: 25%;"> '.$row['SubjectDesc'].' </td>
                <td style="width: 8%; text-align: center;"> '.$row['G1'].'</td>
                <td style="width: 8%; text-align: center;"> '.$row['G2'].'</td>
                <td style="width: 8%; text-align: center;"> '.$row['G3'].'</td>
                <td style="width: 8%; text-align: center;"> '.$row['G4'].'</td>
                <td style="width: 10%; text-align: center;"> '.$row['Grade'].'</td>
                <td style="width: 10%; text-align: center;"> '.$row['Remarks'].'</td>
                <td style="width: 11%; text-align: center; font-size: 9px"> '.$row['FullName'].'</td>
            </tr>';
        }

        $html .= ' <tr>
                <th></th>
                <th style="text-align: right;font-weight: bold;">General Averages: </th>
                <th style="text-align: center;font-weight: bold;"></th>
                <th style="text-align: center;font-weight: bold;"></th>
                <th style="text-align: center;font-weight: bold;"></th>
                <th style="text-align: center;font-weight: bold;"></th>
                <th style="text-align: center;font-weight: bold;">'.round($genav).'</th>
                <th style="text-align: center;font-weight: bold;">'.$remarks.'</th>
        </tr>';

        $html .= ' </tbody>
                    </table><br><br>
                    
            <table>
                <tr>
                    <td style="text-align: center;">*** THIS IS A STUDENT\'S E-COPY, NOT VALID AS AN OFFICIAL DOCUMENT WITHOUT THE REGISTRAR\'S SIGNATURE ***</td>
                </tr>
            </table><br><br><br><br><br><br><br><br><br><br><br><br><br><br>           
                    
        <table>
            <tr>
                <td style="text-align: center;"><strong>ESTER M. MULDONG</strong></td>
                <td style="text-align: center;"></td>
            </tr>
            <tr>
                <td style="text-align: center;">Registrar</td>
                <td style="text-align: center;"></td>
            </tr>
        </table>        
                    ';
        
        // output the HTML content
        $pdf->writeHTML($html, true, false, false, false, '');
        $pdf->Output($FullName.'.pdf','D');

        
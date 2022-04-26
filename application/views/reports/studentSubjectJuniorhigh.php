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
                    <td><strong> Date Registered: </strong>'.$DateofEnter.'</td>
                </tr>
            </table><br>

            <table>
                <tr>
                    <td style="background-color: #b5b5b5; font-size: 14px; font-weight: bold; text-align: center;">R E G I S T R A T I O N</td>
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
                    <th style="width: 16%;text-align: center;font-weight: bold;">Subject Code</th>
                    <th style="width: 34%;text-align: center;font-weight: bold;">Subject Description</th>
                    <th style="width: 11%;text-align: center;font-weight: bold;">Hours</th>
                    <th style="width: 12%;text-align: center;font-weight: bold;">Schedule</th>
                    <th style="width: 11%;text-align: center;font-weight: bold;">Time</th>
                    <th style="width: 16%;text-align: center;font-weight: bold;">Prof</th>
                </tr>
            </thead>
            <tbody>           
        ';

        foreach($studentSubjects as $row){
            $html .= '<tr>
                <td style="width: 16%;"> '.$row['subjectCode'].'</td>
                <td style="width: 34%;"> '.$row['SubjectDesc'].' </td>
                <td style="width: 11%; text-align: center;"> '.$row['hrs'].' </td>
                <td style="width: 12%; text-align: center;"> '.$row['Day'].'</td>
                <td style="width: 11%; text-align: center;"> '.$row['Time'].'</td>
                <td style="width: 16%; text-align: center; font-size: 9px"> '.$row['FullName'].'</td>
            </tr>';
        }

        $html .= ' </tbody>
                    </table><br><br>  ';
        

        $html .='<table>
                    <tr>
                        <td style="width: 70%;"><strong>Total Subjects: </strong>'. $subjectcount .' </td>
                        <td style="width: 30%;"><strong>Total Hours: </strong>'. $totalhrs .' </td>
                    </tr>
                </table>';
        
        // output the HTML content
        $pdf->writeHTML($html, true, false, false, false, '');
        $pdf->Output($FullName.'.pdf','D');

        
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
                .misctbl{
                    display: inline-block;
                }
            </style>

            <table>
                <tr>
                    <td style="width: 70%;"></td>
                    <td><h3>SENIOR HIGH DEPARTMENT</h3></td>
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
                    <td><strong>Semester: </strong>'.$Semester.'</td>
                </tr>
                <tr>
                    <td><strong>Student Number: </strong>'.$StudentNo.'</td>
                    <td><strong>Year: </strong>'.$Level.'</td>
                </tr>
                <tr>
                    <td><strong>Strand: </strong>'.$strand.'</td>
                    <td><strong>Section: </strong>'.$Section.'</td>
                </tr>
                <tr>
                    <td><strong>Address: </strong>'.$Address.'</td>
                    <td><strong>SY: </strong>'.$sy['schoolyear'].'</td>
                </tr>
        </table><br><br>

        <table border="1">
            <thead>
                <tr>
                    <th style="width: 13%;text-align: center;font-weight: bold;">Category</th>
                    <th style="width: 11%;text-align: center;font-weight: bold;">Subject Code</th>
                    <th style="width: 40%;text-align: center;font-weight: bold;">Subject Description</th>
                    <th style="width: 11%;text-align: center;font-weight: bold;">Schedule</th>
                    <th style="width: 10%;text-align: center;font-weight: bold;">Time</th>
                    <th style="width: 11%;text-align: center;font-weight: bold;">Prof</th>
                </tr>
            </thead>
            <tbody>           
        ';

        foreach($studentSubjects as $row){
            $html .= '<tr>
                <td style="width: 13%;"> '.$row['category'].'</td>
                <td style="width: 11%;"> '.$row['subjectCode'].'</td>
                <td style="width: 40%;"> '.$row['SubjectDesc'].' </td>
                <td style="width: 11%; text-align: center;"> '.$row['Day'].'</td>
                <td style="width: 10%; text-align: center;"> '.$row['Time'].'</td>
                <td style="width: 11%; text-align: center; font-size: 9px"> '.$row['FullName'].'</td>
            </tr>';
        }

        $html .= ' </tbody>
                    </table><br><br>  ';
        
        
        $html .='<table>
                    <tr>
                        <td style="width: 70%;"><strong>Total Subjects: </strong>'. $subjectCount .' </td>
                    </tr>
                </table>';


        $html .= '
                <br>
                <br>

        <table>
            <tr>
                <td style="background-color: #b5b5b5; font-size: 14px; font-weight: bold; text-align: center;">A S S E S S M E N T</td>
            </tr>
        </table><br><br>
        
        ';

        $html .='<table>
                    <tr>
                        <td>
                            <table border=".5" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th style="width: 70%;"><h4>MISCELLANEOUS</h4></th>
                                        <th style="width: 25%;text-align: right;"></th>
                                    </tr>
                                </thead>
                            <tbody> ';

                            foreach($miscellaneousCollege as $row){
                                $html .= '<tr>
                                    <td style="width: 70%;"> '.$row['Miscellaneous'].'</td>
                                    <td style="width: 25%;text-align: right;"> '.$row['Amount'].' </td>
                                </tr>';
                            }


                            $totalfee = $TFee + 0;
                            $totalmisc = $miscfee + 0 ;
                            $totalasses = $totalfee +  $totalmisc;

                        $html .= ' </tbody>
                        </table> 
                        </td>
                        <td>
                            <table border=".5" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th style="width: 70%;"><h4>OTHER FEES</h4></th>
                                        <th style="width: 25%;text-align: right;"></th>
                                    </tr>
                                </thead>
                            <tbody> ';

                            foreach($miscotherSeniorhigh as $row){
                                $html .= '<tr>
                                    <td style="width: 70%;"> '.$row['other'].'</td>
                                    <td style="width: 25%;text-align: right;"> '.number_format($row['Amount'], 2, ".", ",").' </td>
                                </tr>';
                            }

                            if ($discount == .100){
                                $fdiscount = 1;
                            }else{
                                $fdiscount = $discount;
                            }

                            $totalother = $othermiscfee + 0;
                            $totalfee = $TFee + 0;
                            $totalmisc = $miscfee + 0 ;
                            $totalasses = $totalfee +  $totalmisc + $totalother;
                            $totaldiscount = $totalfee * $fdiscount;
                            $masterTotal = $totalasses - $totaldiscount;

                            // if($mp == 'Installment'){
                            //     $monthly = ($masterTotal - $dp) / 8;
                            // }else{
                            //     $monthly = 0;
                            // }

                        $html .= ' </tbody>
                        </table> 
                        </td>
                        <td>

                            <table style="padding: 10px;">
                                <tr>
                                    <td style="width: 65%;text-align: right;">
                                        TUITION FEE
                                    </td>
                                    <td style="width: 45%;text-align: left;">
                                        '.number_format($totalfee, 2, ".", ",").'
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 65%;text-align: right;">
                                        '.$discount.'% Discount:
                                    </td>
                                    <td style="width: 45%;text-align: left;">
                                        '.number_format($totaldiscount, 2, ".", ",").'
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 65%;text-align: right;">
                                        TOTAL MISCELLANEOUS FEE:
                                    </td>
                                    <td style="width: 45%;text-align: left;">
                                        '.number_format($totalmisc, 2, ".", ",").'
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 65%;text-align: right;">
                                        TOTAL OTHER FEE:
                                    </td>
                                    <td style="width: 45%;text-align: left;">
                                        '.number_format($othermiscfee, 2, ".", ",").'
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 65%;text-align: right;">
                                        <strong>TOTAL ASSESSMENT:</strong>
                                    </td>
                                    <td style="width: 45%;text-align: left;">
                                        '.number_format($masterTotal, 2, ".", ",").'
                                    </td>
                                </tr>
                            </table>

                        </td>
                    </tr>
        </table>';


        // date_default_timezone_set("Asia/Singapore");
        // $html .='
        //     <table border=".2" style="width: 50%;">
        //         <thead>
        //             <tr>
        //                 <th style="width: 70%;"><h4>'; if($mp == 'Installment'){$html.='Installment';}else{$html.='Cash';} $html.='</h4></th>
        //                 <th style="width: 30%;text-align: left;">OR#:</th>
        //             </tr>
        //         </thead>
        //         <tbody> ';
                    
        //             if($mp == 'Installment'){
        //                 $html .= '<tr>
        //                     <td style="width: 70%;">Down Payment</td>
        //                     <td style="width: 30%;text-align: right;">'.number_format($dp, 2, ".", ",").'</td>
        //                 </tr>';
        //                 date_default_timezone_set("Asia/Singapore");
        //                 $startdate=strtotime("August 1 2021");
        //                 $enddate=strtotime("+8 months", $startdate);
        //                 $i = 1;
        //                 while ($startdate < $enddate) {
        //                     $html .= '<tr>
        //                         <td style="width: 70%;">'.date("M, d Y", $startdate).'</td>
        //                         <td style="width: 30%;text-align: right;">'.number_format($monthly, 2, ".", ",").'</td>
        //                     </tr>';

        //                     $totalmonth = $monthly * 8;
        //                 $startdate = strtotime("+1 months", $startdate);
        //                 }

        //                 $html .= '<tr>
        //                         <td style="width: 70%;">Total</td>
        //                         <td style="width: 30%;text-align: right;">'.number_format($totalmonth, 2, ".", ",").'</td>
        //                     </tr>';

        //             }elseif($mp == 'Cash'){
        //                 $html .= '<tr>
        //                     <td style="width: 70%;">Cash</td>
        //                     <td style="width: 30%;text-align: right;">'.number_format($dp, 2, ".", ",").'</td>
        //                 </tr>';
        //             }
        //         $html .= ' </tbody>
        //         </table>
        // ';

        $html .='
        <br>
        <br>
        <br>
        <br>

        <table>
            <tr>
                <td style="text-align: center;">MARIA REMEDIOS IRMA A. DIZON</td>
                <td style="text-align: center;">ESTER M. MULDONG</td>
            </tr>
            <tr>
                <td style="text-align: center;">Cash Management Officer</td>
                <td style="text-align: center;">Registrar</td>
            </tr>
        </table>';
        
        
        // output the HTML content
        $pdf->writeHTML($html, true, false, false, false, '');
        $pdf->Output($FullName.'.pdf','D');
      
        

        
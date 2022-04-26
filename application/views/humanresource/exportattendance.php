<?php
        $filename = $dpt.'-'.$from.'-'.$to;

         header('Content-Type: application/vnd.ms-excel'); // FUNCTION FOR EXPORT FILE
         header("Content-Disposition: attachment; filename=$filename.xls"); // FUNCTION FOR EXPORT FILE

    echo '<table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>Position</th>
            <th>Department</th>
            <th>Date-In</th>
            <th>Time-In</th>
            <th>Date-Out</th>
            <th>Time-Out</th>
            <th>Duration</th>
            <th>Remarks</th>
        </tr>
        </thead>
        ';
        foreach($attendance as $row){
            echo '<tr>
                <td>'.$row['Name'].'</td>
                <td>'.$row['Position'].'</td>
                <td>'.$row['Department'].'</td>
                <td>'.$row['DateIN'].'</td>
                <td>'.$row['TimeIN'].'</td>
                <td>'.$row['DateOUT'].'</td>
                <td>'.$row['TimeOUT'].'</td>
                <td>'.$row['DurationH'].':'.$row['DurationM'].'</td>
                <td>'.$row['Remarks'].'</td>
            </tr>';
        }
        echo '</table>';
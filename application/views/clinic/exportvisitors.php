<?php
         header('Content-Type: application/xls'); // FUNCTION FOR EXPORT FILE
         header("Content-Disposition: attachment; filename=Visitors.xls"); // FUNCTION FOR EXPORT FILE

    echo '<table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>Address</th>
            <th>Date</th>
            <th>Time of Visit</th>
            <th>Contact</th>
            <th>Email</th>
            <th>Temp. Reading 1</th>
            <th>Temp. Reading 2</th>
            <th>Last place visited</th>
            <th>Face to Face Contact</th>
            <th>Direct Care</th>
            <th>Travelled</th>
            <th>Cough</th>
            <th>Fever</th>
            <th>Colds</th>
            <th>Body Pain</th>
            <th>Sore Throath</th>
            <th>Difficulties in Breathing</th>
            <th>Diarrhea</th>
            <th>Lost sense of Smell</th>
            <th>Lost sense of Taste</th>
        </tr>
        </thead>
        ';
        foreach($visitors as $row){
            echo '<tr>
                    <td>' . $row['Name'] . '</td>
                    <td>' . $row['Address'] . '</td>
                    <td>' . $row['Date'] . '</td>
                    <td>' . $row['Timeofvisit'] . '</td>
                    <td>' . $row['Contact'] . '</td>
                    <td>' . $row['Email'] . '</td>
                    <td>' . $row['Temperature1'] . '</td>
                    <td>' . $row['Temperature2'] . '</td>
                    <td>' . $row['Visited'] . '</td>
                    <td>' . $row['isFacetoFace'] . '</td>
                    <td>' . $row['isDirectCare'] . '</td>
                    <td>' . $row['isTravelled'] . '</td>
                    <td>' . $row['Cough'] . '</td>
                    <td>' . $row['Fever'] . '</td>
                    <td>' . $row['Colds'] . '</td>
                    <td>' . $row['Body'] . '</td>
                    <td>' . $row['Sorethroath'] . '</td>
                    <td>' . $row['Breathing'] . '</td>
                    <td>' . $row['Diarrhea'] . '</td>
                    <td>' . $row['Smell'] . '</td>
                    <td>' . $row['Taste'] . '</td>
            </tr>';
        }
        echo '</table>';

    <?php
         header('Content-Type: application/vnd.ms-excel'); // FUNCTION FOR EXPORT FILE
         header("Content-Disposition: attachment; filename=$subject($course-$year-$section).xls"); // FUNCTION FOR EXPORT FILE

    echo '<table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Student Number</th>
            <th>Name</th>
            <th>Course</th>
            <th>Year</th>
            <th>Sem</th>
            <th>Contact</th>
        </tr>
        </thead>
        ';
        foreach($collegeclasslist as $row){
            echo '<tr>
                <td>'.$row['extension'].$row['StudentNo'].'</td>
                <td>'.$row['FullName'].'</td>
                <td>'.$row['CourseDesc'].'</td>
                <td>'.$row['Level'].'</td>
                <td>'.$row['Semester'].'</td>
                <td>'.$row['Contact'].'</td>
            </tr>';
        }
        echo '</table>';



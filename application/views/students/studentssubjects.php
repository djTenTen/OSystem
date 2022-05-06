<div class="container-fluid">
    <h1>Subjects & Schedule</h1><br>
    

    <table class="table table-borderless table-sm">
        <tr>
            <td>
                <h6>Student Number: <strong><?= $StudentNo;?></strong></h6>
            </td>
            <td>
                <h6>Section: <strong><?= $Section;?></strong></h6>
            </td>
        </tr>
        <tr>
            <td>
                <h6>Name: <strong><?= $FullName;?></strong></h6>
            </td>
            <td>
                <h6>Level: <strong><?= $Level;?></strong></h6>
            </td>
        </tr>
        <tr>
            <td>
                <h6>Course: <strong><?= $CourseDesc;?></strong></h6>
            </td>
            <td>
                <h6>Status: <strong><?php if($isEvaluated == 'Yes' && $isAssess == 'No' && $isEnrolled =='No'){
                    echo '<button type="button" class="btn btn-info">Pending for Assessment</button>';
                }elseif($isEvaluated == 'Yes' && $isAssess == 'Yes' && $isEnrolled =='No'){
                    echo '<button type="button" class="btn btn-primary">Pending for Enrollment</button>';
                }elseif($isEvaluated == 'Yes' && $isAssess == 'Yes' && $isEnrolled =='Yes'){
                    echo '<button type="button" class="btn btn-success">Enrolled</button>';
                }?></strong></h6>
            </td>
        </tr>
    </table>

        <div style="overflow-y:scroll;width:100%;height:370px">
            <table class="table table-bordered table-hover table-sm">
                <thead class="sticky-top bg-white">
                    <tr>
                        <th>Subject Code</th>
                        <th>Subject Description</th>
                        <th>Day</th>
                        <th>Time</th>
                        <th>Instructor</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($studentSubjects as $subjects){?>
                    <tr>
                        <td><?= $subjects['subjectCode']?></td>
                        <td><?= $subjects['SubjectDesc']?></td>
                        <td><?= $subjects['Day']?></td>
                        <td><?= $subjects['Time']?></td>
                        <td><?= $subjects['FullName']?></td>
                    </tr>
                <?php }?>
                </tbody>
            </table>
        </div>



















</div>
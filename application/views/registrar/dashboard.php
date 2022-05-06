<div class="container-fluid">
<h1>Registrar Dashboard</h1>

<div class="m-4">
    <div class="row">
        <div class="card m-2 alert alert-success" style="width:250px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="card-body">
                <h4 class="card-title">College</h4>
                <h2 class="card-text"> <span class="fas fa-user-graduate"></span><?= $EnrolledCollege;?></h2>
            </div>
        </div>
        <div class="card m-2 alert alert-primary" style="width:250px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="card-body">
                <h4 class="card-title">Seniorhigh</h4>
                <h2 class="card-text"> <span class="fas fa-user-graduate"></span><?= $EnrolledSeniorhigh;?></h2>
            </div>
        </div>
        <div class="card m-2 alert alert-info" style="width:250px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="card-body">
                <h4 class="card-title">Juniorhigh</h4>
                <h2 class="card-text"> <span class="fas fa-user-graduate"></span><?= $EnrolledJuniorhigh;?></h2>
            </div>
        </div>
        <div class="card m-2 alert alert-warning" style="width:250px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="card-body">
                <h4 class="card-title">Gradeschool</h4>
                <h2 class="card-text"> <span class="fas fa-user-graduate"></span><?= $EnrolledGradeschool;?></h2>
            </div>
        </div>

        <div class="card m-2 alert alert-light" style="width:250px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="card-body">
                <h4 class="card-title">New Students</h4>
                <h2 class="card-text"> <span class="fas fa-user-graduate"></span><?= $NewStudentCountCollege+$NewStudentCountSeniorhigh+$NewStudentCountJuniorhigh+$NewStudentCountGradeschool;?></h2>
            </div>
        </div>

        <div class="card m-2 alert alert-dark" style="width:250px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="card-body">
                <h4 class="card-title">Old Students</h4>
                <h2 class="card-text"> <span class="fas fa-user-graduate"></span><?= $OldStudentCountCollege+$OldStudentCountSeniorhigh+$OldStudentCountJuniorhigh+$OldStudentCountGradeschool;?></h2>
            </div>
        </div>

        <div class="card m-2 alert alert-info" style="width:250px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="card-body">
                <h4 class="card-title">Pending</h4>
                <h2 class="card-text"> <span class="fas fa-user-graduate"></span><?= $PendingCollege+$PendingSeniorhigh+$PendingJuniorhigh+$PendingGradeschool;?></h2>
                
            </div>
        </div>

        <div class="card m-2 alert alert-warning" style="width:250px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="card-body">
                <h4 class="card-title">Validated</h4>
                <h2 class="card-text"> <span class="fas fa-user-graduate"></span><?= $ValidatedCollege+$ValidatedSeniorhigh+$ValidatedJuniorhigh+$ValidatedGradeschool;?></h2>
            </div>
        </div>

        <div class="card m-2 alert alert-danger" style="width:250px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="card-body">
                <h4 class="card-title">Evaluated</h4>
                <h2 class="card-text"> <span class="fas fa-user-graduate"></span><?= $EvaluatedCollege+$EvaluatedSeniorhigh+$EvaluatedJuniorhigh+$EvaluatedGradeschool;?></h2>
            </div>
        </div>

        <div class="card m-2 alert alert-secondary" style="width:250px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="card-body">
                <h4 class="card-title">Assessed</h4>
                <h2 class="card-text"> <span class="fas fa-user-graduate"></span><?= $AssessedCollege+$AssessedSeniorhigh+$AssessedJuniorhigh+$AssessedGradeschool;?></h2>
            </div>
        </div>

        <div class="card m-2 alert alert-primary" style="width:250px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="card-body">
                <h4 class="card-title">Enrolled</h4>
                <h2 class="card-text"> <span class="fas fa-user-graduate"></span><?= $EnrolledCollege+$EnrolledSeniorhigh+$EnrolledJuniorhigh+$EnrolledGradeschool;?></h2>
            </div>
        </div>

        <div class="card m-2 alert alert-danger" style="width:1050px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="card-body">
                <h1 class="card-title">Overall Total Students</h1>
                <h1 class="card-text"> <span class="fas fa-user-graduate"></span><?= $TotalCollege+$TotalSeniorhigh+$TotalJuniorhigh+$TotalGradeschool;?></h1>
            </div>
        </div>

    </div>
</div>

<h3>College Students</h3>

<div class="m-4">

    <div class="row">
        <?php 
            $countNEW1styear = $this->db->query("select FullName from students_college where Level='1ST YEAR' and isEnrolled != 'Dismiss' and (TypeofApplication = 'NEW' or TypeofApplication = 'TRANSFEREE')");
            $countNEW2ndyear = $this->db->query("select FullName from students_college where Level='2ND YEAR' and isEnrolled != 'Dismiss' and (TypeofApplication = 'NEW' or TypeofApplication = 'TRANSFEREE')");
            $countNEW3rdyear = $this->db->query("select FullName from students_college where Level='3RD YEAR' and isEnrolled != 'Dismiss' and (TypeofApplication = 'NEW' or TypeofApplication = 'TRANSFEREE')");
            $countNEW4thyear = $this->db->query("select FullName from students_college where Level='4TH YEAR' and isEnrolled != 'Dismiss' and (TypeofApplication = 'NEW' or TypeofApplication = 'TRANSFEREE')");
        ?>
        
        <div class="card m-1" style="width:200px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="card-body">
                <h4 class="card-title">New Students</h4>
                <h2 class="card-text"><span class="fas fa-user-graduate"></span> <?= $NewStudentCountCollege;?></h2>

                <p class="card-text">1st Year: <?= $countNEW1styear->num_rows(); ?><br>
                    2nd Year: <?= $countNEW2ndyear->num_rows(); ?><br>
                    3rd Year: <?= $countNEW3rdyear->num_rows(); ?><br>
                    4th Year: <?= $countNEW4thyear->num_rows(); ?></p>
            </div>
        </div>

        <?php 
            $countOLD1styear = $this->db->query("select FullName from students_college where Level='1ST YEAR' and isEnrolled != 'Dismiss' and TypeofApplication = 'OLD'");
            $countOLD2ndyear = $this->db->query("select FullName from students_college where Level='2ND YEAR' and isEnrolled != 'Dismiss' and TypeofApplication = 'OLD'");
            $countOLD3rdyear = $this->db->query("select FullName from students_college where Level='3RD YEAR' and isEnrolled != 'Dismiss' and TypeofApplication = 'OLD'");
            $countOLD4thyear = $this->db->query("select FullName from students_college where Level='4TH YEAR' and isEnrolled != 'Dismiss' and TypeofApplication = 'OLD'");
        ?>

        <div class="card m-1" style="width:200px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="card-body">
                <h4 class="card-title">Old Students</h4>
                <h2 class="card-text"><span class="fas fa-user-graduate"></span> <?= $OldStudentCountCollege;?></h2>
                <p class="card-text">1st Year: <?= $countOLD1styear->num_rows(); ?><br>
                    2nd Year: <?= $countOLD2ndyear->num_rows(); ?><br>
                    3rd Year: <?= $countOLD3rdyear->num_rows(); ?><br>
                    4th Year: <?= $countOLD4thyear->num_rows(); ?></p>
            </div>
        </div>

        <?php 
            $countPENDING1styear = $this->db->query("select FullName from students_college where Level='1ST YEAR' and isEnrolled != 'Dismiss' and isValidated = 'No'");
            $countPENDING2ndyear = $this->db->query("select FullName from students_college where Level='2ND YEAR' and isEnrolled != 'Dismiss' and isValidated = 'No'");
            $countPENDING3rdyear = $this->db->query("select FullName from students_college where Level='3RD YEAR' and isEnrolled != 'Dismiss' and isValidated = 'No'");
            $countPENDING4thyear = $this->db->query("select FullName from students_college where Level='4TH YEAR' and isEnrolled != 'Dismiss' and isValidated = 'No'");
        ?>

        <div class="card m-1" style="width:200px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="card-body">
                <h4 class="card-title">Pending</h4>
                <h2 class="card-text"> <span class="fas fa-user-graduate"></span><?= $PendingCollege;?></h2>
                <p class="card-text">1st Year: <?= $countPENDING1styear->num_rows(); ?><br>
                    2nd Year: <?= $countPENDING2ndyear->num_rows(); ?><br>
                    3rd Year: <?= $countPENDING3rdyear->num_rows(); ?><br>
                    4th Year: <?= $countPENDING4thyear->num_rows(); ?></p>
            </div>
        </div>

        <?php 
            $countDismissed1styear = $this->db->query("select FullName from students_college where Level='1ST YEAR' and isEnrolled = 'Dismiss'");
            $countDismissed2ndyear = $this->db->query("select FullName from students_college where Level='2ND YEAR' and isEnrolled = 'Dismiss'");
            $countDismissed3rdyear = $this->db->query("select FullName from students_college where Level='3RD YEAR' and isEnrolled = 'Dismiss'");
            $countDismissed4thyear = $this->db->query("select FullName from students_college where Level='4TH YEAR' and isEnrolled = 'Dismiss'");
        ?>
        <div class="card m-1" style="width:200px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="card-body">
                <h4 class="card-title">Dismissed</h4>
                <h2 class="card-text"> <span class="fas fa-user-graduate"></span><?= $TotalDismissedCollege;?></h2>
                <p class="card-text">1st Year: <?= $countDismissed1styear->num_rows(); ?><br>
                    2nd Year: <?= $countDismissed2ndyear->num_rows(); ?><br>
                    3rd Year: <?= $countDismissed3rdyear->num_rows(); ?><br>
                    4th Year: <?= $countDismissed4thyear->num_rows(); ?></p>
            </div>
        </div>

        <?php 
            $countValidated1styear = $this->db->query("select FullName from students_college where Level='1ST YEAR' and isValidated = 'Yes' and isEvaluated = 'No'");
            $countValidated2ndyear = $this->db->query("select FullName from students_college where Level='2ND YEAR' and isValidated = 'Yes' and isEvaluated = 'No'");
            $countValidated3rdyear = $this->db->query("select FullName from students_college where Level='3RD YEAR' and isValidated = 'Yes' and isEvaluated = 'No'");
            $countValidated4thyear = $this->db->query("select FullName from students_college where Level='4TH YEAR' and isValidated = 'Yes' and isEvaluated = 'No'");
        ?>
        <div class="card m-1" style="width:200px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="card-body">
                <h4 class="card-title">Validated</h4>
                <h2 class="card-text"> <span class="fas fa-user-graduate"></span><?= $ValidatedCollege;?></h2>
                <p class="card-text">1st Year: <?= $countValidated1styear->num_rows(); ?><br>
                    2nd Year: <?= $countValidated2ndyear->num_rows(); ?><br>
                    3rd Year: <?= $countValidated3rdyear->num_rows(); ?><br>
                    4th Year: <?= $countValidated4thyear->num_rows(); ?></p>
            </div>
        </div>

        <?php 
            $countEvaluated1styear = $this->db->query("select FullName from students_college where Level='1ST YEAR' and isEvaluated = 'Yes' and isAssess = 'No'");
            $countEvaluated2ndyear = $this->db->query("select FullName from students_college where Level='2ND YEAR' and isEvaluated = 'Yes' and isAssess = 'No'");
            $countEvaluated3rdyear = $this->db->query("select FullName from students_college where Level='3RD YEAR' and isEvaluated = 'Yes' and isAssess = 'No'");
            $countEvaluated4thyear = $this->db->query("select FullName from students_college where Level='4TH YEAR' and isEvaluated = 'Yes' and isAssess = 'No'");
        ?>

        <div class="card m-1" style="width:200px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="card-body">
                <h4 class="card-title">Evaluated</h4>
                <h2 class="card-text"> <span class="fas fa-user-graduate"></span><?= $EvaluatedCollege;?></h2>
                <p class="card-text">1st Year: <?= $countEvaluated1styear->num_rows(); ?><br>
                    2nd Year: <?= $countEvaluated2ndyear->num_rows(); ?><br>
                    3rd Year: <?= $countEvaluated3rdyear->num_rows(); ?><br>
                    4th Year: <?= $countEvaluated4thyear->num_rows(); ?></p>
            </div>
        </div>

        <?php 
            $countAssess1styear = $this->db->query("select FullName from students_college where Level='1ST YEAR' and isAssess = 'Yes' and isEnrolled = 'No'");
            $countAssess2ndyear = $this->db->query("select FullName from students_college where Level='2ND YEAR' and isAssess = 'Yes' and isEnrolled = 'No'");
            $countAssess3rdyear = $this->db->query("select FullName from students_college where Level='3RD YEAR' and isAssess = 'Yes' and isEnrolled = 'No'");
            $countAssess4thyear = $this->db->query("select FullName from students_college where Level='4TH YEAR' and isAssess = 'Yes' and isEnrolled = 'No'");
        ?>
        <div class="card m-1" style="width:200px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="card-body">
                <h4 class="card-title">Assessed</h4>
                <h2 class="card-text"> <span class="fas fa-user-graduate"></span><?= $AssessedCollege;?></h2>
                <p class="card-text">1st Year: <?= $countAssess1styear->num_rows(); ?><br>
                    2nd Year: <?= $countAssess2ndyear->num_rows(); ?><br>
                    3rd Year: <?= $countAssess3rdyear->num_rows(); ?><br>
                    4th Year: <?= $countAssess4thyear->num_rows(); ?></p>
            </div>
        </div>


        <?php 
            $countEnrolled1styear = $this->db->query("select FullName from students_college where Level='1ST YEAR' and isEnrolled = 'Yes'");
            $countEnrolled2ndyear = $this->db->query("select FullName from students_college where Level='2ND YEAR' and isEnrolled = 'Yes'");
            $countEnrolled3rdyear = $this->db->query("select FullName from students_college where Level='3RD YEAR' and isEnrolled = 'Yes'");
            $countEnrolled4thyear = $this->db->query("select FullName from students_college where Level='4TH YEAR' and isEnrolled = 'Yes'");
        ?>

        <div class="card m-1" style="width:200px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="card-body">
                <h4 class="card-title">Enrolled</h4>
                <h2 class="card-text"> <span class="fas fa-user-graduate"></span><?= $EnrolledCollege;?></h2>
                <p class="card-text">1st Year: <?= $countEnrolled1styear->num_rows(); ?><br>
                    2nd Year: <?= $countEnrolled2ndyear->num_rows(); ?><br>
                    3rd Year: <?= $countEnrolled3rdyear->num_rows(); ?><br>
                    4th Year: <?= $countEnrolled4thyear->num_rows(); ?></p>
            </div>
        </div>


        <?php 
            $countTotal1styear = $this->db->query("select FullName from students_college where Level='1ST YEAR' and isEnrolled != 'Dismiss'");
            $countTotal2ndyear = $this->db->query("select FullName from students_college where Level='2ND YEAR' and isEnrolled != 'Dismiss'");
            $countTotal3rdyear = $this->db->query("select FullName from students_college where Level='3RD YEAR' and isEnrolled != 'Dismiss'");
            $countTotal4thyear = $this->db->query("select FullName from students_college where Level='4TH YEAR' and isEnrolled != 'Dismiss'");
        ?>

        <div class="card m-1" style="width:300px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="card-body">
                <h4 class="card-title">Total College Student</h4>
                <h2 class="card-text"> <span class="fas fa-user-graduate"></span><?= $TotalCollege;?></h2>
                <p class="card-text">1st Year: <?= $countTotal1styear->num_rows(); ?><br>
                    2nd Year: <?= $countTotal2ndyear->num_rows(); ?><br>
                    3rd Year: <?= $countTotal3rdyear->num_rows(); ?><br>
                    4th Year: <?= $countTotal4thyear->num_rows(); ?></p>
            </div>
        </div>

        



        
        
    </div>
    <h5 class="mt-3">Courses</h5>
    <div class="row">
        <?php 
            $queryCollege = $this->db->get('courses');
            foreach($queryCollege->result_array() as $row){
                $courseID = $row['CourseID'];
                $EcountCollege = $this->db->query("select Course 
                from students_college 
                where Course = '$courseID' 
                and isEnrolled = 'Yes'");

                $NcountCollege = $this->db->query("select Course 
                from students_college 
                where Course = '$courseID' 
                and isEnrolled = 'No'");

                $cid = $row['CourseID'];
                $Ecount1styear = $this->db->query("select Level from students_college where Course = '$cid' and Level='1ST YEAR' and isEnrolled = 'Yes'");
                $Ecount2ndyear = $this->db->query("select Level from students_college where Course = '$cid' and Level='2ND YEAR' and isEnrolled = 'Yes'");
                $Ecount3rdyear = $this->db->query("select Level from students_college where Course = '$cid' and Level='3RD YEAR' and isEnrolled = 'Yes'");
                $Ecount4thyear = $this->db->query("select Level from students_college where Course = '$cid' and Level='4TH YEAR' and isEnrolled = 'Yes'");

                $Ncount1styear = $this->db->query("select Level from students_college where Course = '$cid' and Level='1ST YEAR' and isEnrolled = 'No'");
                $Ncount2ndyear = $this->db->query("select Level from students_college where Course = '$cid' and Level='2ND YEAR' and isEnrolled = 'No'");
                $Ncount3rdyear = $this->db->query("select Level from students_college where Course = '$cid' and Level='3RD YEAR' and isEnrolled = 'No'");
                $Ncount4thyear = $this->db->query("select Level from students_college where Course = '$cid' and Level='4TH YEAR' and isEnrolled = 'No'");

            ?>
            <div class="card m-1" style="width:170px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">

                <div class="card-body">
                    <h6 class="card-title"><?= $row['CourseCode'];?></h6>
                    <h3 class="card-text"><span class="fas fa-user-graduate"></span> <?= $EcountCollege->num_rows().' / '. $NcountCollege->num_rows(); ?> </h3>
                    <p class="card-text">1st Year: <?= $Ecount1styear->num_rows().' / '. $Ncount1styear->num_rows(); ?><br>
                    2nd Year: <?= $Ecount2ndyear->num_rows().' / '. $Ncount2ndyear->num_rows(); ?><br>
                    3rd Year: <?= $Ecount3rdyear->num_rows().' / '. $Ncount3rdyear->num_rows(); ?><br>
                    4th Year: <?= $Ecount4thyear->num_rows().' / '. $Ncount4thyear->num_rows(); ?></p>
                    
                </div>
            </div>

        <?php }?>
    </div>
    
    
</div>
<br>
<hr>
<br>
<h3>Seniorhigh Students</h3>

<div class="m-4">
    <div class="row">
        <?php   
            $countNEWgrade11 = $this->db->query("select FullName from students_seniorhigh where Level='GRADE 11' and isEnrolled != 'Dismiss' and (TypeofApplication = 'NEW' or TypeofApplication = 'TRANSFEREE')");
            $countNEWgrade12 = $this->db->query("select FullName from students_seniorhigh where Level='GRADE 12' and isEnrolled != 'Dismiss' and (TypeofApplication = 'NEW' or TypeofApplication = 'TRANSFEREE')");
        ?>
        <div class="card m-1" style="width:200px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="card-body">
                <h4 class="card-title">New Students</h4>
                <h2 class="card-text"><span class="fas fa-user-graduate"></span> <?= $NewStudentCountSeniorhigh;?></h2>
                <p class="card-text">
                    Grade 11: <?= $countNEWgrade11->num_rows(); ?><br>
                    Grade 12: <?= $countNEWgrade12->num_rows(); ?><br>
                </p>
            </div>
        </div>
        
        <?php   
            $countOLDgrade11 = $this->db->query("select FullName from students_seniorhigh where Level='GRADE 11' and TypeofApplication = 'OLD'");
            $countOLDgrade12 = $this->db->query("select FullName from students_seniorhigh where Level='GRADE 12' and TypeofApplication = 'OLD'");
        ?>
        <div class="card m-1" style="width:200px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="card-body">
                <h4 class="card-title">Old Students</h4>
                <h2 class="card-text"><span class="fas fa-user-graduate"></span> <?= $OldStudentCountSeniorhigh;?></h2>
                <p class="card-text">
                    Grade 11: <?= $countOLDgrade11->num_rows(); ?><br>
                    Grade 12: <?= $countOLDgrade12->num_rows(); ?><br>
                </p>
            </div>
        </div>

        <?php   
            $countPendinggrade11 = $this->db->query("select FullName from students_seniorhigh where Level='GRADE 11' and isValidated = 'No'");
            $countPendinggrade12 = $this->db->query("select FullName from students_seniorhigh where Level='GRADE 12' and isValidated = 'No'");
        ?>

        <div class="card m-1" style="width:200px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="card-body">
                <h4 class="card-title">Pending</h4>
                <h2 class="card-text"> <span class="fas fa-user-graduate"></span><?= $PendingSeniorhigh;?></h2>
                <p class="card-text">
                    Grade 11: <?= $countPendinggrade11->num_rows(); ?><br>
                    Grade 12: <?= $countPendinggrade12->num_rows(); ?><br>
                </p>
            </div>
        </div>

        <?php   
            $countDismissedgrade11 = $this->db->query("select FullName from students_seniorhigh where Level='GRADE 11' and isEnrolled = 'Dismiss'");
            $countDismissedgrade12 = $this->db->query("select FullName from students_seniorhigh where Level='GRADE 12' and isEnrolled = 'Dismiss'");
        ?>
        <div class="card m-1" style="width:200px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="card-body">
                <h4 class="card-title">Dismissed</h4>
                <h2 class="card-text"> <span class="fas fa-user-graduate"></span><?= $TotalDismissedSeniorhigh;?></h2>
                <p class="card-text">
                    Grade 11: <?= $countDismissedgrade11->num_rows(); ?><br>
                    Grade 12: <?= $countDismissedgrade12->num_rows(); ?><br>
                </p>
            </div>
        </div>

        <?php   
            $countValidatedgrade11 = $this->db->query("select FullName from students_seniorhigh where Level='GRADE 11' and isValidated = 'Yes' and isEvaluated = 'No'");
            $countValidatedgrade12 = $this->db->query("select FullName from students_seniorhigh where Level='GRADE 12' and isValidated = 'Yes' and isEvaluated = 'No'");
        ?>

        <div class="card m-1" style="width:200px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="card-body">
                <h4 class="card-title">Validated</h4>
                <h2 class="card-text"> <span class="fas fa-user-graduate"></span><?= $ValidatedSeniorhigh;?></h2>
                <p class="card-text">
                    Grade 11: <?= $countValidatedgrade11->num_rows(); ?><br>
                    Grade 12: <?= $countValidatedgrade12->num_rows(); ?><br>
                </p>
            </div>
        </div>


        <?php   
            $countEvaluatedgrade11 = $this->db->query("select FullName from students_seniorhigh where Level='GRADE 11' and isEvaluated = 'Yes' and isAssess = 'No'");
            $countEvaluatedgrade12 = $this->db->query("select FullName from students_seniorhigh where Level='GRADE 12' and isEvaluated = 'Yes' and isAssess = 'No'");
        ?>

        <div class="card m-1" style="width:200px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="card-body">
                <h4 class="card-title">Evaluated</h4>
                <h2 class="card-text"> <span class="fas fa-user-graduate"></span><?= $EvaluatedSeniorhigh;?></h2>
                <p class="card-text">
                    Grade 11: <?= $countEvaluatedgrade11->num_rows(); ?><br>
                    Grade 12: <?= $countEvaluatedgrade12->num_rows(); ?><br>
                </p>
            </div>
        </div>



        <?php   
            $countAssessgrade11 = $this->db->query("select FullName from students_seniorhigh where Level='GRADE 11' and isAssess = 'Yes' and isEnrolled = 'No'");
            $countAssessgrade12 = $this->db->query("select FullName from students_seniorhigh where Level='GRADE 12' and isAssess = 'Yes' and isEnrolled = 'No'");
        ?>

        <div class="card m-1" style="width:200px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="card-body">
                <h4 class="card-title">Assessed</h4>
                <h2 class="card-text"> <span class="fas fa-user-graduate"></span><?= $AssessedSeniorhigh;?></h2>
                <p class="card-text">
                    Grade 11: <?= $countAssessgrade11->num_rows(); ?><br>
                    Grade 12: <?= $countAssessgrade12->num_rows(); ?><br>
                </p>
            </div>
        </div>

        <?php   
            $countEnrolledgrade11 = $this->db->query("select FullName from students_seniorhigh where Level='GRADE 11' and isEnrolled = 'Yes'");
            $countEnrolledgrade12 = $this->db->query("select FullName from students_seniorhigh where Level='GRADE 12' and isEnrolled = 'Yes'");
        ?>

        <div class="card m-1" style="width:200px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="card-body">
                <h4 class="card-title">Enrolled</h4>
                <h2 class="card-text"> <span class="fas fa-user-graduate"></span><?= $EnrolledSeniorhigh;?></h2>
                <p class="card-text">
                    Grade 11: <?= $countEnrolledgrade11->num_rows(); ?><br>
                    Grade 12: <?= $countEnrolledgrade12->num_rows(); ?><br>
                </p>
            </div>
        </div>

        <?php   
            $countTotalgrade11 = $this->db->query("select FullName from students_seniorhigh where Level='GRADE 11' and isEnrolled != 'Dismiss'");
            $countTotalgrade12 = $this->db->query("select FullName from students_seniorhigh where Level='GRADE 12' and isEnrolled != 'Dismiss'");
        ?>

        <div class="card m-1" style="width:300px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="card-body">
                <h4 class="card-title">Total Seniorhigh Student</h4>
                <h2 class="card-text"> <span class="fas fa-user-graduate"></span><?= $TotalSeniorhigh;?></h2>
                <p class="card-text">
                    Grade 11: <?= $countTotalgrade11->num_rows(); ?><br>
                    Grade 12: <?= $countTotalgrade12->num_rows(); ?><br>
                </p>
            </div>
        </div>
    </div>
    <h5 class="mt-3">Strand</h5>
    <div class="row">
    
        <?php 
            $querySeniorhigh = $this->db->query("select Distinct Strand from students_seniorhigh");
            foreach($querySeniorhigh->result_array() as $row1){
                $strnd = $row1['Strand'];
                $EcountSeniorhigh = $this->db->query("select Strand 
                from students_seniorhigh 
                where Strand = '$strnd' 
                and isEnrolled = 'Yes'");

                $NcountSeniorhigh = $this->db->query("select Strand 
                from students_seniorhigh 
                where Strand = '$strnd' 
                and isEnrolled = 'No'");

                $strand = $row1['Strand'];
                $Ecountgrade11 = $this->db->query("select Level from students_seniorhigh where Strand = '$strand' and Level='GRADE 11' and isEnrolled = 'Yes'");
                $Ecountgrade12 = $this->db->query("select Level from students_seniorhigh where Strand = '$strand' and Level='GRADE 12' and isEnrolled = 'Yes'");

                $Ncountgrade11 = $this->db->query("select Level from students_seniorhigh where Strand = '$strand' and Level='GRADE 11' and isEnrolled = 'No'");
                $Ncountgrade12 = $this->db->query("select Level from students_seniorhigh where Strand = '$strand' and Level='GRADE 12' and isEnrolled = 'No'");
                
        ?>

            <div class="card m-1" style="width:170px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">

                <div class="card-body">
                    <h6 class="card-title"><?= $row1['Strand'];?></h6>
                    <h3 class="card-text"><span class="fas fa-user-graduate"></span> <?= $EcountSeniorhigh->num_rows().' / '. $NcountSeniorhigh->num_rows(); ?> </h3>
                    <p class="card-text">
                        Grade 11: <?= $Ecountgrade11->num_rows().' / '. $Ncountgrade11->num_rows(); ?><br>
                        Grade 12: <?= $Ecountgrade12->num_rows().' / '. $Ncountgrade12->num_rows(); ?><br>
                    </p>
                    
                </div>
            </div>

        <?php }?>
    </div>
</div>
<br>
<hr>
<br>
<h3>Juniorhigh Students</h3>

<div class="m-4">
    <div class="row">
    
        <?php   
            $countNEWgrade7 = $this->db->query("select FullName from students_juniorhigh where Level='GRADE 7' and isEnrolled != 'Dismiss' and (TypeofApplication = 'NEW' or TypeofApplication = 'TRANSFEREE')");
            $countNEWgrade8 = $this->db->query("select FullName from students_juniorhigh where Level='GRADE 8' and isEnrolled != 'Dismiss' and (TypeofApplication = 'NEW' or TypeofApplication = 'TRANSFEREE')");
            $countNEWgrade9 = $this->db->query("select FullName from students_juniorhigh where Level='GRADE 9' and isEnrolled != 'Dismiss' and (TypeofApplication = 'NEW' or TypeofApplication = 'TRANSFEREE')");
            $countNEWgrade10 = $this->db->query("select FullName from students_juniorhigh where Level='GRADE 10' and isEnrolled != 'Dismiss' and (TypeofApplication = 'NEW' or TypeofApplication = 'TRANSFEREE')");
        ?>

        <div class="card m-1" style="width:200px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="card-body">
                <h4 class="card-title">New Students</h4>
                <h2 class="card-text"><span class="fas fa-user-graduate"></span> <?= $NewStudentCountJuniorhigh;?></h2>
                <p class="card-text">
                    Grade 7: <?= $countNEWgrade7->num_rows(); ?><br>
                    Grade 8: <?= $countNEWgrade8->num_rows(); ?><br>
                    Grade 9: <?= $countNEWgrade9->num_rows(); ?><br>
                    Grade 10: <?= $countNEWgrade10->num_rows(); ?><br>
                </p>
            </div>
        </div>

        <?php   
            $countOLDgrade7 = $this->db->query("select FullName from students_juniorhigh where Level='GRADE 7' and isEnrolled != 'Dismiss' and TypeofApplication = 'OLD'");
            $countOLDgrade8 = $this->db->query("select FullName from students_juniorhigh where Level='GRADE 8' and isEnrolled != 'Dismiss' and TypeofApplication = 'OLD'");
            $countOLDgrade9 = $this->db->query("select FullName from students_juniorhigh where Level='GRADE 9' and isEnrolled != 'Dismiss' and TypeofApplication = 'OLD'");
            $countOLDgrade10 = $this->db->query("select FullName from students_juniorhigh where Level='GRADE 10' and isEnrolled != 'Dismiss' and TypeofApplication = 'OLD'");
        ?>
        <div class="card m-1" style="width:200px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="card-body">
                <h4 class="card-title">Old Students</h4>
                <h2 class="card-text"><span class="fas fa-user-graduate"></span> <?= $OldStudentCountJuniorhigh;?></h2>
                <p class="card-text">
                    Grade 7: <?= $countOLDgrade7->num_rows(); ?><br>
                    Grade 8: <?= $countOLDgrade8->num_rows(); ?><br>
                    Grade 9: <?= $countOLDgrade9->num_rows(); ?><br>
                    Grade 10: <?= $countOLDgrade10->num_rows(); ?><br>
                </p>
            </div>
        </div>


        <?php   
            $countPendinggrade7 = $this->db->query("select FullName from students_juniorhigh where Level='GRADE 7' and isValidated = 'No'");
            $countPendinggrade8 = $this->db->query("select FullName from students_juniorhigh where Level='GRADE 8' and isValidated = 'No'");
            $countPendinggrade9 = $this->db->query("select FullName from students_juniorhigh where Level='GRADE 9' and isValidated = 'No'");
            $countPendinggrade10 = $this->db->query("select FullName from students_juniorhigh where Level='GRADE 10' and isValidated = 'No'");
        ?>

        <div class="card m-1" style="width:200px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="card-body">
                <h4 class="card-title">Pending</h4>
                <h2 class="card-text"> <span class="fas fa-user-graduate"></span><?= $PendingJuniorhigh;?></h2>
                <p class="card-text">
                    Grade 7: <?= $countPendinggrade7->num_rows(); ?><br>
                    Grade 8: <?= $countPendinggrade8->num_rows(); ?><br>
                    Grade 9: <?= $countPendinggrade9->num_rows(); ?><br>
                    Grade 10: <?= $countPendinggrade10->num_rows(); ?><br>
                </p>
            </div>
        </div>


        <?php   
            $countDismissedgrade7 = $this->db->query("select FullName from students_juniorhigh where Level='GRADE 7' and isEnrolled = 'Dismiss'");
            $countDismissedgrade8 = $this->db->query("select FullName from students_juniorhigh where Level='GRADE 8' and isEnrolled = 'Dismiss'");
            $countDismissedgrade9 = $this->db->query("select FullName from students_juniorhigh where Level='GRADE 9' and isEnrolled = 'Dismiss'");
            $countDismissedgrade10 = $this->db->query("select FullName from students_juniorhigh where Level='GRADE 10' and isEnrolled = 'Dismiss'");
        ?>

        <div class="card m-1" style="width:200px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="card-body">
                <h4 class="card-title">Dismissed</h4>
                <h2 class="card-text"> <span class="fas fa-user-graduate"></span><?= $TotalDismissedSeniorhigh;?></h2>
                <p class="card-text">
                    Grade 7: <?= $countDismissedgrade7->num_rows(); ?><br>
                    Grade 8: <?= $countDismissedgrade8->num_rows(); ?><br>
                    Grade 9: <?= $countDismissedgrade9->num_rows(); ?><br>
                    Grade 10: <?= $countDismissedgrade10->num_rows(); ?><br>
                </p>
            </div>
        </div>
        
        <?php   
            $countValidatedgrade7 = $this->db->query("select FullName from students_juniorhigh where Level='GRADE 7' and isValidated = 'Yes' and isEvaluated = 'No'");
            $countValidatedgrade8 = $this->db->query("select FullName from students_juniorhigh where Level='GRADE 8' and isValidated = 'Yes' and isEvaluated = 'No'");
            $countValidatedgrade9 = $this->db->query("select FullName from students_juniorhigh where Level='GRADE 9' and isValidated = 'Yes' and isEvaluated = 'No'");
            $countValidatedgrade10 = $this->db->query("select FullName from students_juniorhigh where Level='GRADE 10' and isValidated = 'Yes' and isEvaluated = 'No'");
        ?>
        <div class="card m-1" style="width:200px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="card-body">
                <h4 class="card-title">Validated</h4>
                <h2 class="card-text"> <span class="fas fa-user-graduate"></span><?= $ValidatedJuniorhigh;?></h2>
                <p class="card-text">
                    Grade 7: <?= $countValidatedgrade7->num_rows(); ?><br>
                    Grade 8: <?= $countValidatedgrade8->num_rows(); ?><br>
                    Grade 9: <?= $countValidatedgrade9->num_rows(); ?><br>
                    Grade 10: <?= $countValidatedgrade10->num_rows(); ?><br>
                </p>
            </div>
        </div>

        <?php   
            $countEvaluatedgrade7 = $this->db->query("select FullName from students_juniorhigh where Level='GRADE 7' and isEvaluated = 'Yes' and isAssess = 'No'");
            $countEvaluatedgrade8 = $this->db->query("select FullName from students_juniorhigh where Level='GRADE 8' and isEvaluated = 'Yes' and isAssess = 'No'");
            $countEvaluatedgrade9 = $this->db->query("select FullName from students_juniorhigh where Level='GRADE 9' and isEvaluated = 'Yes' and isAssess = 'No'");
            $countEvaluatedgrade10 = $this->db->query("select FullName from students_juniorhigh where Level='GRADE 10' and isEvaluated = 'Yes' and isAssess = 'No'");
        ?>
        <div class="card m-1" style="width:200px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="card-body">
                <h4 class="card-title">Evaluated</h4>
                <h2 class="card-text"> <span class="fas fa-user-graduate"></span><?= $EvaluatedJuniorhigh;?></h2>
                <p class="card-text">
                    Grade 7: <?= $countEvaluatedgrade7->num_rows(); ?><br>
                    Grade 8: <?= $countEvaluatedgrade8->num_rows(); ?><br>
                    Grade 9: <?= $countEvaluatedgrade9->num_rows(); ?><br>
                    Grade 10: <?= $countEvaluatedgrade10->num_rows(); ?><br>
                </p>
            </div>
        </div>

        <?php   
            $countAssessgrade7 = $this->db->query("select FullName from students_juniorhigh where Level='GRADE 7' and isAssess = 'Yes' and isEnrolled = 'No'");
            $countAssessgrade8 = $this->db->query("select FullName from students_juniorhigh where Level='GRADE 8' and isAssess = 'Yes' and isEnrolled = 'No'");
            $countAssessgrade9 = $this->db->query("select FullName from students_juniorhigh where Level='GRADE 9' and isAssess = 'Yes' and isEnrolled = 'No'");
            $countAssessgrade10 = $this->db->query("select FullName from students_juniorhigh where Level='GRADE 10' and isAssess = 'Yes' and isEnrolled = 'No'");
        ?>
        <div class="card m-1" style="width:200px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="card-body">
                <h4 class="card-title">Assessed</h4>
                <h2 class="card-text"> <span class="fas fa-user-graduate"></span><?= $AssessedJuniorhigh;?></h2>
                <p class="card-text">
                    Grade 7: <?= $countAssessgrade7->num_rows(); ?><br>
                    Grade 8: <?= $countAssessgrade8->num_rows(); ?><br>
                    Grade 9: <?= $countAssessgrade9->num_rows(); ?><br>
                    Grade 10: <?= $countAssessgrade10->num_rows(); ?><br>
                </p>
            </div>
        </div>

        <?php   
            $countEnrolledgrade7 = $this->db->query("select FullName from students_juniorhigh where Level='GRADE 7' and isEnrolled = 'Yes'");
            $countEnrolledgrade8 = $this->db->query("select FullName from students_juniorhigh where Level='GRADE 8' and isEnrolled = 'Yes'");
            $countEnrolledgrade9 = $this->db->query("select FullName from students_juniorhigh where Level='GRADE 9' and isEnrolled = 'Yes'");
            $countEnrolledgrade10 = $this->db->query("select FullName from students_juniorhigh where Level='GRADE 10' and isEnrolled = 'Yes'");
        ?>
        <div class="card m-1" style="width:200px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="card-body">
                <h4 class="card-title">Enrolled</h4>
                <h2 class="card-text"> <span class="fas fa-user-graduate"></span><?= $EnrolledJuniorhigh;?></h2>
                <p class="card-text">
                    Grade 7: <?= $countEnrolledgrade7->num_rows(); ?><br>
                    Grade 8: <?= $countEnrolledgrade8->num_rows(); ?><br>
                    Grade 9: <?= $countEnrolledgrade9->num_rows(); ?><br>
                    Grade 10: <?= $countEnrolledgrade10->num_rows(); ?><br>
                </p>
            </div>
        </div>
        
        <?php   
            $countTotalgrade7 = $this->db->query("select FullName from students_juniorhigh where Level='GRADE 7' and isEnrolled != 'Dismiss'");
            $countTotalgrade8 = $this->db->query("select FullName from students_juniorhigh where Level='GRADE 8' and isEnrolled != 'Dismiss'");
            $countTotalgrade9 = $this->db->query("select FullName from students_juniorhigh where Level='GRADE 9' and isEnrolled != 'Dismiss'");
            $countTotalgrade10 = $this->db->query("select FullName from students_juniorhigh where Level='GRADE 10' and isEnrolled != 'Dismiss'");
        ?>
        <div class="card m-1" style="width:300px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="card-body">
                <h4 class="card-title">Total Juniorhigh Student</h4>
                <h2 class="card-text"> <span class="fas fa-user-graduate"></span><?= $TotalJuniorhigh;?></h2>
                <p class="card-text">
                    Grade 7: <?= $countTotalgrade7->num_rows(); ?><br>
                    Grade 8: <?= $countTotalgrade8->num_rows(); ?><br>
                    Grade 9: <?= $countTotalgrade9->num_rows(); ?><br>
                    Grade 10: <?= $countTotalgrade10->num_rows(); ?><br>
                </p>
            </div>
        </div>
    </div>
    <h5 class="mt-3">Grade</h5>
    <div class="row">
                
        <?php 
            $queryJuniorhigh = $this->db->query("select Distinct Level from students_juniorhigh order by Level asc");
            foreach($queryJuniorhigh->result_array() as $row2){
                $levl = $row2['Level'];
                $EcountJuniorhigh = $this->db->query("select Level 
                from students_juniorhigh 
                where Level = '$levl' 
                and isEnrolled = 'Yes'");

                $NcountJuniorhigh = $this->db->query("select Level 
                from students_juniorhigh 
                where Level = '$levl' 
                and isEnrolled = 'No'");
        ?>
            <div class="card m-1" style="width:170px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">

                <div class="card-body">
                    <h6 class="card-title"><?= $row2['Level'];?></h6>
                    <h3 class="card-text"><span class="fas fa-user-graduate"></span> <?= $EcountJuniorhigh->num_rows().' / '.$NcountJuniorhigh->num_rows(); ?> </h3>
                    <p class="card-text">
                       
                    </p>
                    
                </div>
            </div>

        <?php }?>
    
    </div>
</div>
<br>
<hr>
<br>
<h3>Grade School Students</h3>

<div class="m-4">
    <div class="row">
        <?php   
            $countNEWgradeI = $this->db->query("select FullName from students_gradeschool where Level='KINDER I' and isEnrolled != 'Dismiss' and (TypeofApplication = 'NEW' or TypeofApplication = 'TRANSFEREE')");
            $countNEWgradeII = $this->db->query("select FullName from students_gradeschool where Level='KINDER II' and isEnrolled != 'Dismiss' and (TypeofApplication = 'NEW' or TypeofApplication = 'TRANSFEREE')");
            $countNEWgrade1 = $this->db->query("select FullName from students_gradeschool where Level='GRADE 1' and isEnrolled != 'Dismiss' and (TypeofApplication = 'NEW' or TypeofApplication = 'TRANSFEREE')");
            $countNEWgrade2 = $this->db->query("select FullName from students_gradeschool where Level='GRADE 2' and isEnrolled != 'Dismiss' and (TypeofApplication = 'NEW' or TypeofApplication = 'TRANSFEREE')");
            $countNEWgrade3 = $this->db->query("select FullName from students_gradeschool where Level='GRADE 3' and isEnrolled != 'Dismiss' and (TypeofApplication = 'NEW' or TypeofApplication = 'TRANSFEREE')");
            $countNEWgrade4 = $this->db->query("select FullName from students_gradeschool where Level='GRADE 4' and isEnrolled != 'Dismiss' and (TypeofApplication = 'NEW' or TypeofApplication = 'TRANSFEREE')");
            $countNEWgrade5 = $this->db->query("select FullName from students_gradeschool where Level='GRADE 5' and isEnrolled != 'Dismiss' and (TypeofApplication = 'NEW' or TypeofApplication = 'TRANSFEREE')");
            $countNEWgrade6 = $this->db->query("select FullName from students_gradeschool where Level='GRADE 6' and isEnrolled != 'Dismiss' and (TypeofApplication = 'NEW' or TypeofApplication = 'TRANSFEREE')");
        ?>

        <div class="card m-1" style="width:200px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="card-body">
                <h4 class="card-title">New Students</h4>
                <h2 class="card-text"><span class="fas fa-user-graduate"></span> <?= $NewStudentCountGradeschool;?></h2>
                <p class="card-text">
                    Kinder I: <?= $countNEWgradeI->num_rows(); ?><br>
                    Kinder II: <?= $countNEWgradeII->num_rows(); ?><br>
                    Grade 1: <?= $countNEWgrade1->num_rows(); ?><br>
                    Grade 2: <?= $countNEWgrade2->num_rows(); ?><br>
                    Grade 3: <?= $countNEWgrade3->num_rows(); ?><br>
                    Grade 4: <?= $countNEWgrade4->num_rows(); ?><br>
                    Grade 5: <?= $countNEWgrade5->num_rows(); ?><br>
                    Grade 6: <?= $countNEWgrade6->num_rows(); ?><br>
                </p>
            </div>
        </div>

        <?php   
            $countOLDgradeI = $this->db->query("select FullName from students_gradeschool where Level='KINDER I' and isEnrolled != 'Dismiss' and TypeofApplication = 'OLD'");
            $countOLDgradeII = $this->db->query("select FullName from students_gradeschool where Level='KINDER II' and isEnrolled != 'Dismiss' and TypeofApplication = 'OLD'");
            $countOLDgrade1 = $this->db->query("select FullName from students_gradeschool where Level='GRADE 1' and isEnrolled != 'Dismiss' and TypeofApplication = 'OLD'");
            $countOLDgrade2 = $this->db->query("select FullName from students_gradeschool where Level='GRADE 2' and isEnrolled != 'Dismiss' and TypeofApplication = 'OLD'");
            $countOLDgrade3 = $this->db->query("select FullName from students_gradeschool where Level='GRADE 3' and isEnrolled != 'Dismiss' and TypeofApplication = 'OLD'");
            $countOLDgrade4 = $this->db->query("select FullName from students_gradeschool where Level='GRADE 4' and isEnrolled != 'Dismiss' and TypeofApplication = 'OLD'");
            $countOLDgrade5 = $this->db->query("select FullName from students_gradeschool where Level='GRADE 5' and isEnrolled != 'Dismiss' and TypeofApplication = 'OLD'");
            $countOLDgrade6 = $this->db->query("select FullName from students_gradeschool where Level='GRADE 6' and isEnrolled != 'Dismiss' and TypeofApplication = 'OLD'");
        ?>

        <div class="card m-1" style="width:200px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="card-body">
                <h4 class="card-title">Old Students</h4>
                <h2 class="card-text"><span class="fas fa-user-graduate"></span> <?= $OldStudentCountGradeschool;?></h2>
                <p class="card-text">
                    Kinder I: <?= $countOLDgradeI->num_rows(); ?><br>
                    Kinder II: <?= $countOLDgradeII->num_rows(); ?><br>
                    Grade 1: <?= $countOLDgrade1->num_rows(); ?><br>
                    Grade 2: <?= $countOLDgrade2->num_rows(); ?><br>
                    Grade 3: <?= $countOLDgrade3->num_rows(); ?><br>
                    Grade 4: <?= $countOLDgrade4->num_rows(); ?><br>
                    Grade 5: <?= $countOLDgrade5->num_rows(); ?><br>
                    Grade 6: <?= $countOLDgrade6->num_rows(); ?><br>
                </p>
                
            </div>
        </div>


        <?php   
            $countPendgradeI = $this->db->query("select FullName from students_gradeschool where Level='KINDER I' and isValidated = 'No'");
            $countPendgradeII = $this->db->query("select FullName from students_gradeschool where Level='KINDER II' and isValidated = 'No'");
            $countPendgrade1 = $this->db->query("select FullName from students_gradeschool where Level='GRADE 1' and isValidated = 'No'");
            $countPendgrade2 = $this->db->query("select FullName from students_gradeschool where Level='GRADE 2' and isValidated = 'No'");
            $countPendgrade3 = $this->db->query("select FullName from students_gradeschool where Level='GRADE 3' and isValidated = 'No'");
            $countPendgrade4 = $this->db->query("select FullName from students_gradeschool where Level='GRADE 4' and isValidated = 'No'");
            $countPendgrade5 = $this->db->query("select FullName from students_gradeschool where Level='GRADE 5' and isValidated = 'No'");
            $countPendgrade6 = $this->db->query("select FullName from students_gradeschool where Level='GRADE 6' and isValidated = 'No'");
        ?>
        <div class="card m-1" style="width:200px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="card-body">
                <h4 class="card-title">Pending</h4>
                <h2 class="card-text"> <span class="fas fa-user-graduate"></span><?= $PendingGradeschool;?></h2>
                <p class="card-text">
                    Kinder I: <?= $countPendgradeI->num_rows(); ?><br>
                    Kinder II: <?= $countPendgradeII->num_rows(); ?><br>
                    Grade 1: <?= $countPendgrade1->num_rows(); ?><br>
                    Grade 2: <?= $countPendgrade2->num_rows(); ?><br>
                    Grade 3: <?= $countPendgrade3->num_rows(); ?><br>
                    Grade 4: <?= $countPendgrade4->num_rows(); ?><br>
                    Grade 5: <?= $countPendgrade5->num_rows(); ?><br>
                    Grade 6: <?= $countPendgrade6->num_rows(); ?><br>
                </p>
            </div>
        </div>

        <?php   
            $countDismissgradeI = $this->db->query("select FullName from students_gradeschool where Level='KINDER I' and isValidated = 'Dismiss'");
            $countDismissgradeII = $this->db->query("select FullName from students_gradeschool where Level='KINDER II' and isValidated = 'Dismiss'");
            $countDismissgrade1 = $this->db->query("select FullName from students_gradeschool where Level='GRADE 1' and isValidated = 'Dismiss'");
            $countDismissgrade2 = $this->db->query("select FullName from students_gradeschool where Level='GRADE 2' and isValidated = 'Dismiss'");
            $countDismissgrade3 = $this->db->query("select FullName from students_gradeschool where Level='GRADE 3' and isValidated = 'Dismiss'");
            $countDismissgrade4 = $this->db->query("select FullName from students_gradeschool where Level='GRADE 4' and isValidated = 'Dismiss'");
            $countDismissgrade5 = $this->db->query("select FullName from students_gradeschool where Level='GRADE 5' and isValidated = 'Dismiss'");
            $countDismissgrade6 = $this->db->query("select FullName from students_gradeschool where Level='GRADE 6' and isValidated = 'Dismiss'");
        ?>

        <div class="card m-1" style="width:200px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="card-body">
                <h4 class="card-title">Dismissed</h4>
                <h2 class="card-text"> <span class="fas fa-user-graduate"></span><?= $TotalDismissedGradeschool;?></h2>
                <p class="card-text">
                    Kinder I: <?= $countDismissgradeI->num_rows(); ?><br>
                    Kinder II: <?= $countDismissgradeII->num_rows(); ?><br>
                    Grade 1: <?= $countDismissgrade1->num_rows(); ?><br>
                    Grade 2: <?= $countDismissgrade2->num_rows(); ?><br>
                    Grade 3: <?= $countDismissgrade3->num_rows(); ?><br>
                    Grade 4: <?= $countDismissgrade4->num_rows(); ?><br>
                    Grade 5: <?= $countDismissgrade5->num_rows(); ?><br>
                    Grade 6: <?= $countDismissgrade6->num_rows(); ?><br>
                </p>
            </div>
        </div>
        

        <?php   
            $countValidatedgradeI = $this->db->query("select FullName from students_gradeschool where Level='KINDER I' and isValidated = 'Yes' and isEvaluated = 'No'");
            $countValidatedgradeII = $this->db->query("select FullName from students_gradeschool where Level='KINDER II' and isValidated = 'Yes' and isEvaluated = 'No'");
            $countValidatedgrade1 = $this->db->query("select FullName from students_gradeschool where Level='GRADE 1' and isValidated = 'Yes' and isEvaluated = 'No'");
            $countValidatedgrade2 = $this->db->query("select FullName from students_gradeschool where Level='GRADE 2' and isValidated = 'Yes' and isEvaluated = 'No'");
            $countValidatedgrade3 = $this->db->query("select FullName from students_gradeschool where Level='GRADE 3' and isValidated = 'Yes' and isEvaluated = 'No'");
            $countValidatedgrade4 = $this->db->query("select FullName from students_gradeschool where Level='GRADE 4' and isValidated = 'Yes' and isEvaluated = 'No'");
            $countValidatedgrade5 = $this->db->query("select FullName from students_gradeschool where Level='GRADE 5' and isValidated = 'Yes' and isEvaluated = 'No'");
            $countValidatedgrade6 = $this->db->query("select FullName from students_gradeschool where Level='GRADE 6' and isValidated = 'Yes' and isEvaluated = 'No'");
        ?>

        <div class="card m-1" style="width:200px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="card-body">
                <h4 class="card-title">Validated</h4>
                <h2 class="card-text"> <span class="fas fa-user-graduate"></span><?= $ValidatedGradeschool;?></h2>
                <p class="card-text">
                    Kinder I: <?= $countValidatedgradeI->num_rows(); ?><br>
                    Kinder II: <?= $countValidatedgradeII->num_rows(); ?><br>
                    Grade 1: <?= $countValidatedgrade1->num_rows(); ?><br>
                    Grade 2: <?= $countValidatedgrade2->num_rows(); ?><br>
                    Grade 3: <?= $countValidatedgrade3->num_rows(); ?><br>
                    Grade 4: <?= $countValidatedgrade4->num_rows(); ?><br>
                    Grade 5: <?= $countValidatedgrade5->num_rows(); ?><br>
                    Grade 6: <?= $countValidatedgrade6->num_rows(); ?><br>
                </p>
            </div>
        </div>

        <?php   
            $countEvaluatedgradeI = $this->db->query("select FullName from students_gradeschool where Level='KINDER I' and isEvaluated = 'Yes' and isAssess = 'No'");
            $countEvaluatedgradeII = $this->db->query("select FullName from students_gradeschool where Level='KINDER II' and isEvaluated = 'Yes' and isAssess = 'No'");
            $countEvaluatedgrade1 = $this->db->query("select FullName from students_gradeschool where Level='GRADE 1' and isEvaluated = 'Yes' and isAssess = 'No'");
            $countEvaluatedgrade2 = $this->db->query("select FullName from students_gradeschool where Level='GRADE 2' and isEvaluated = 'Yes' and isAssess = 'No'");
            $countEvaluatedgrade3 = $this->db->query("select FullName from students_gradeschool where Level='GRADE 3' and isEvaluated = 'Yes' and isAssess = 'No'");
            $countEvaluatedgrade4 = $this->db->query("select FullName from students_gradeschool where Level='GRADE 4' and isEvaluated = 'Yes' and isAssess = 'No'");
            $countEvaluatedgrade5 = $this->db->query("select FullName from students_gradeschool where Level='GRADE 5' and isEvaluated = 'Yes' and isAssess = 'No'");
            $countEvaluatedgrade6 = $this->db->query("select FullName from students_gradeschool where Level='GRADE 6' and isEvaluated = 'Yes' and isAssess = 'No'");
        ?>

        <div class="card m-1" style="width:200px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="card-body">
                <h4 class="card-title">Evaluated</h4>
                <h2 class="card-text"> <span class="fas fa-user-graduate"></span><?= $EvaluatedGradeschool;?></h2>
                <p class="card-text">
                    Kinder I: <?= $countEvaluatedgradeI->num_rows(); ?><br>
                    Kinder II: <?= $countEvaluatedgradeII->num_rows(); ?><br>
                    Grade 1: <?= $countEvaluatedgrade1->num_rows(); ?><br>
                    Grade 2: <?= $countEvaluatedgrade2->num_rows(); ?><br>
                    Grade 3: <?= $countEvaluatedgrade3->num_rows(); ?><br>
                    Grade 4: <?= $countEvaluatedgrade4->num_rows(); ?><br>
                    Grade 5: <?= $countEvaluatedgrade5->num_rows(); ?><br>
                    Grade 6: <?= $countEvaluatedgrade6->num_rows(); ?><br>
                </p>
            </div>
        </div>

        <?php   
            $countAssessgradeI = $this->db->query("select FullName from students_gradeschool where Level='KINDER I' and isAssess = 'Yes' and isEnrolled = 'No'");
            $countAssessgradeII = $this->db->query("select FullName from students_gradeschool where Level='KINDER II' and isAssess = 'Yes' and isEnrolled = 'No'");
            $countAssessgrade1 = $this->db->query("select FullName from students_gradeschool where Level='GRADE 1' and isAssess = 'Yes' and isEnrolled = 'No'");
            $countAssessgrade2 = $this->db->query("select FullName from students_gradeschool where Level='GRADE 2' and isAssess = 'Yes' and isEnrolled = 'No'");
            $countAssessgrade3 = $this->db->query("select FullName from students_gradeschool where Level='GRADE 3' and isAssess = 'Yes' and isEnrolled = 'No'");
            $countAssessgrade4 = $this->db->query("select FullName from students_gradeschool where Level='GRADE 4' and isAssess = 'Yes' and isEnrolled = 'No'");
            $countAssessgrade5 = $this->db->query("select FullName from students_gradeschool where Level='GRADE 5' and isAssess = 'Yes' and isEnrolled = 'No'");
            $countAssessgrade6 = $this->db->query("select FullName from students_gradeschool where Level='GRADE 6' and isAssess = 'Yes' and isEnrolled = 'No'");
        ?>

        <div class="card m-1" style="width:200px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="card-body">
                <h4 class="card-title">Assessed</h4>
                <h2 class="card-text"> <span class="fas fa-user-graduate"></span><?= $AssessedGradeschool;?></h2>
                <p class="card-text">
                    Kinder I: <?= $countAssessgradeI->num_rows(); ?><br>
                    Kinder II: <?= $countAssessgradeII->num_rows(); ?><br>
                    Grade 1: <?= $countAssessgrade1->num_rows(); ?><br>
                    Grade 2: <?= $countAssessgrade2->num_rows(); ?><br>
                    Grade 3: <?= $countAssessgrade3->num_rows(); ?><br>
                    Grade 4: <?= $countAssessgrade4->num_rows(); ?><br>
                    Grade 5: <?= $countAssessgrade5->num_rows(); ?><br>
                    Grade 6: <?= $countAssessgrade6->num_rows(); ?><br>
                </p>
            </div>
        </div>

        <?php   
            $countEnrolledgradeI = $this->db->query("select FullName from students_gradeschool where Level='KINDER I' and isEnrolled = 'Yes'");
            $countEnrolledgradeII = $this->db->query("select FullName from students_gradeschool where Level='KINDER II' and isEnrolled = 'Yes'");
            $countEnrolledgrade1 = $this->db->query("select FullName from students_gradeschool where Level='GRADE 1' and isEnrolled = 'Yes'");
            $countEnrolledgrade2 = $this->db->query("select FullName from students_gradeschool where Level='GRADE 2' and isEnrolled = 'Yes'");
            $countEnrolledgrade3 = $this->db->query("select FullName from students_gradeschool where Level='GRADE 3' and isEnrolled = 'Yes'");
            $countEnrolledgrade4 = $this->db->query("select FullName from students_gradeschool where Level='GRADE 4' and isEnrolled = 'Yes'");
            $countEnrolledgrade5 = $this->db->query("select FullName from students_gradeschool where Level='GRADE 5' and isEnrolled = 'Yes'");
            $countEnrolledgrade6 = $this->db->query("select FullName from students_gradeschool where Level='GRADE 6' and isEnrolled = 'Yes'");
        ?>

        <div class="card m-1" style="width:200px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="card-body">
                <h4 class="card-title">Enrolled</h4>
                <h2 class="card-text"> <span class="fas fa-user-graduate"></span><?= $EnrolledGradeschool;?></h2>
                <p class="card-text">
                    Kinder I: <?= $countEnrolledgradeI->num_rows(); ?><br>
                    Kinder II: <?= $countEnrolledgradeII->num_rows(); ?><br>
                    Grade 1: <?= $countEnrolledgrade1->num_rows(); ?><br>
                    Grade 2: <?= $countEnrolledgrade2->num_rows(); ?><br>
                    Grade 3: <?= $countEnrolledgrade3->num_rows(); ?><br>
                    Grade 4: <?= $countEnrolledgrade4->num_rows(); ?><br>
                    Grade 5: <?= $countEnrolledgrade5->num_rows(); ?><br>
                    Grade 6: <?= $countEnrolledgrade6->num_rows(); ?><br>
                </p>
            </div>
        </div>
        
        <?php   
            $countTotalgradeI = $this->db->query("select FullName from students_gradeschool where Level='KINDER I' and isEnrolled != 'Dismiss'");
            $countTotalgradeII = $this->db->query("select FullName from students_gradeschool where Level='KINDER II' and isEnrolled != 'Dismiss'");
            $countTotalgrade1 = $this->db->query("select FullName from students_gradeschool where Level='GRADE 1' and isEnrolled != 'Dismiss'");
            $countTotalgrade2 = $this->db->query("select FullName from students_gradeschool where Level='GRADE 2' and isEnrolled != 'Dismiss'");
            $countTotalgrade3 = $this->db->query("select FullName from students_gradeschool where Level='GRADE 3' and isEnrolled != 'Dismiss'");
            $countTotalgrade4 = $this->db->query("select FullName from students_gradeschool where Level='GRADE 4' and isEnrolled != 'Dismiss'");
            $countTotalgrade5 = $this->db->query("select FullName from students_gradeschool where Level='GRADE 5' and isEnrolled != 'Dismiss'");
            $countTotalgrade6 = $this->db->query("select FullName from students_gradeschool where Level='GRADE 6' and isEnrolled != 'Dismiss'");
        ?>

        <div class="card m-1" style="width:300px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="card-body">
                <h4 class="card-title">Total Gradeschool Student</h4>
                <h2 class="card-text"> <span class="fas fa-user-graduate"></span><?= $TotalGradeschool;?></h2>
                <p class="card-text">
                    Kinder I: <?= $countTotalgradeI->num_rows(); ?><br>
                    Kinder II: <?= $countTotalgradeII->num_rows(); ?><br>
                    Grade 1: <?= $countTotalgrade1->num_rows(); ?><br>
                    Grade 2: <?= $countTotalgrade2->num_rows(); ?><br>
                    Grade 3: <?= $countTotalgrade3->num_rows(); ?><br>
                    Grade 4: <?= $countTotalgrade4->num_rows(); ?><br>
                    Grade 5: <?= $countTotalgrade5->num_rows(); ?><br>
                    Grade 6: <?= $countTotalgrade6->num_rows(); ?><br>
                </p>
            </div>
        </div>
    </div>
    <h5 class="mt-3">Grade</h5>
    <div class="row">
                
        <?php 
            $queryGradeschool = $this->db->query("select Distinct Level from students_gradeschool order by Level asc");
            foreach($queryGradeschool->result_array() as $row3){
                $lvl = $row3['Level'];
                $EcountGradeschool = $this->db->query("select Level 
                from students_gradeschool 
                where Level = '$lvl' 
                and isEnrolled = 'Yes'");

                $NcountGradeschool = $this->db->query("select Level 
                from students_gradeschool 
                where Level = '$lvl' 
                and isEnrolled = 'No'");
                
        ?>
            <div class="card m-1" style="width:170px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">

                <div class="card-body">
                    <h6 class="card-title"><?= $row3['Level'];?></h6>
                    <h3 class="card-text"><span class="fas fa-user-graduate"></span> <?= $EcountGradeschool->num_rows().' / '.$NcountGradeschool->num_rows(); ?> </h3>
                    <p class="card-text">
                       
                    </p>
                    
                </div>
            </div>

        <?php }?>
    
    </div>
</div>











</div>
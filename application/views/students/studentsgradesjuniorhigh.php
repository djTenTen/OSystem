<div class="container-fluid">
    
    

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
                <h6>Level: <strong><?= $Level;?> / <?= $Semester;?></strong></h6>
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



    <?= form_open('studentsgrades');?>

    <div class="container">
        <div class="row form-inline">
            <div class="form-group m-1">
                <label for="sy">School Year: </label>
                <select name="sy" class="form-control form-control-sm" required>
                    <option value="">School Year</option>
                    <?php foreach($viewSY as $sy){?>
                        <option value="<?= $sy['sy'];?>"><?= $sy['sy'];?></option>
                    <?php }?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">View Grades</button>
        </div>   
    </div>
    <?= form_close();?>

        <div style="overflow-y:scroll;width:100%;height:370px">
            <table class="table table-bordered table-hover table-sm">
                <thead class="sticky-top bg-white">
                    <tr>
                        <th>Subject Code</th>
                        <th>Subject Description</th>
                        <th>Instructor</th>
                        <th>1st Gr.</th>
                        <th>2nd Gr.</th>
                        <th>3rd Gr.</th>
                        <th>4th Gr.</th>
                        <th>Grade</th>
                        <th>Remarks</th>
                    </tr>
                </thead>
                <tbody>
                <?php if($release == 'Yes'){?>
                    <?php foreach($studentSubjects as $subjects){?>
                        <tr class="<?php if($subjects['Remarks'] == 'PASSED'){echo 'alert alert-success';}
                            elseif($subjects['Remarks'] == 'INC'){echo 'alert alert-danger';}
                            elseif($subjects['Remarks'] == 'FA'){echo 'alert alert-danger';}
                            elseif($subjects['Remarks'] == 'DRP'){echo 'alert alert-danger';}
                            elseif($subjects['Remarks'] == 'UW'){echo 'alert alert-danger';}
                            elseif($subjects['Remarks'] == 'FAILED'){echo 'alert alert-danger';}
                            ?>">
                            <td><?= $subjects['subjectCode']?></td>
                            <td><?= $subjects['SubjectDesc']?></td>
                            <td><?= $subjects['FullName']?></td>
                            <td><?= $subjects['G1']?></td>
                            <td><?= $subjects['G2']?></td>
                            <td><?= $subjects['G3']?></td>
                            <td><?= $subjects['G4']?></td>
                            <td><?php if($subjects['isReleasing'] == 'No'){echo 'TBT';}else{echo $subjects['Grade'];}?></td>
                            <td><?php if($subjects['isReleasing'] == 'No'){echo 'TBT';}else{echo $subjects['Remarks'];}?></td>
                        </tr>
                    <?php }?>

                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>Gen Ave:</th>
                        <th><?= round($genav);?></th>
                        <th><?php if($genav >= 75){echo '<button type="button" class="btn btn-success">For Promotion</button>';}else{echo '<button type="button" class="btn btn-danger">Retained</button>';}?></th>

                    </tr>

                <?php } else {?>
                    <div class="alert alert-danger">
                        <h1><strong>Note: </strong>Grade releasing closed</h1>
                    </div>
                <?php }?>
                </tbody>
            </table>
        </div>



















</div>
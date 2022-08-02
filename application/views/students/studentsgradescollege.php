<div class="container-fluid">
    <h1><?= $FullName;?></h1><br>
    

    <?= form_open('studentsgrades');?>

    <div class="container">
        <div class="row form-inline">
            <div class="form-group m-1">
                <label for="sy">School Year: </label>
                <select name="sy" class="form-control form-control-sm" required>
                    <option value="">School Year</option>
                        <option value="2021-2022">2021-2022</option>
                        <option value="2022-2023">2022-2023</option>
                </select>
            </div>
            <div class="form-group m-1">
                <label for="sy">Semester: </label>
                <select name="sem" class="form-control form-control-sm" required>
                    <option value="">Semester</option>
                        <option value="1ST SEM">1ST SEM</option>
                        <option value="2ND SEM">2ND SEM</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">View Grades</button>
        </div>   
    </div>
    <?= form_close();?>


    <div class="container">

       
        <table class="table table-bordered table-hover table-sm">
            <thead class="sticky-top bg-white">
                <tr>
                    <th>Subject Code</th>
                    <th>Subject Description</th>
                    <th>Instructor</th>
                    <th>Prelim</th>
                    <th>Midterm</th>
                    <th>Finals</th>
                    <th>Grade</th>
                    <th>Equivalent</th>
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
                        <td><?= $subjects['SubjectDesc'];?> </td>
                        <td><?= $subjects['FullName']?></td>
                        <td><?= $subjects['Prelim']?></td>
                        <td><?= $subjects['Midterm']?></td>
                        <td><?= $subjects['Finals']?></td>
                        <td><?= $subjects['Grade'];?></td>
                        <td><?= $subjects['Equivalent']?></td>
                        <td><?=$subjects['Remarks'];?></td>
                    </tr>
                <?php }?>
            <?php } else {?>
                <div class="alert alert-danger">
                    <h1><strong>Note: </strong>Grade releasing closed</h1>
                </div>
            <?php }?>
            </tbody>
        </table>
            </div>
        



















</div>
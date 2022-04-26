<div class="main">

<h1>Senior High Subjects</h1>
<h1><?= $Teacher;?></h1>
<br>
<br>

    <?= form_open('viewclasssubjectsshs/'.$teacherID);?>
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
                <div class="form-group m-1">
                    <label for="sy">Semester: </label>
                    <select name="sem" class="form-control form-control-sm" required>
                        <option value="">Semester</option>
                        <?php foreach($viewSem as $sem){?>
                            <option value="<?= $sem['semester'];?>"><?= $sem['semester'];?></option>
                        <?php }?>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">View Subjects</button>
            </div>   
        </div>
    <?= form_close();?>

    <br>

    <div class="container">
        <?php foreach($seniorhighProfSubjects as $row){?>
            <div class="media border p-3">
                <div class="media-body">
                    <a href="<?= base_url();?>viewclasssubjectsstudentsshs/<?= $row['curriculumID'];?>/<?= $row['subjectID'];?>"><h4><?= $row['subjectDesc'];?><small> <i> <?= $row['Year'];?> / <?= $row['Section'];?> / <?= $row['Sem'];?></i></small></h4></a>
                    <h6><?//= $row['CourseDesc'];?></h6>
                </div>
            </div>
        <?php }?>
    </div>


</div>
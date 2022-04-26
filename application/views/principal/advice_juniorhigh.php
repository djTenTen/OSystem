<div class="main">

    <?php
        if($this->session->flashdata('Subject_Removed') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> Subject removed.
        </div>';
        }

        if($this->session->flashdata('Subject_added') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> Subject Added. 
        </div>';
        }
        
        if($this->session->flashdata('CollegeMiscellaneous_Deleted') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> Miscellaneous successfully removed. 
        </div>';
        }
    ?>

    <h1>Evaluation / Advising</h1>
    <div class="container container-fluid">
    
        <div class="row">
            <div class="form-group col-lg-4">
                <label for="fullname">Full Name: </label>
                <input name="fullname" type="text" value="<?= $fullname;?>" class="form-control form-control-sm" placeholder="Full Name" id="fullname" readonly>
            </div>
            
            <div class="form-group col-lg-2">
                <label for="lvl">Level: </label>
                <input name="lvl" type="text" value="<?= $level;?>" class="form-control form-control-sm" placeholder="Level" id="lvl" readonly>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-lg-6">
                <label for="address">Address: </label>
                <input name="address" type="text" value="<?= $address;?>" class="form-control form-control-sm" placeholder="Address" id="address" readonly>
            </div>
            <div class="form-group col-lg-2">
                <label for="address">Contact: </label>
                <input name="address" type="text" value="<?= $contact;?>" class="form-control form-control-sm" placeholder="Address" id="address" readonly>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3">
                <?= form_open('viewcurriculumJuniorhigh');?>
                    <div class="form-group">
                        <label for="address">Select Section: </label>
                        <select id="select-state" name="section" class="form-control form-control-sm" required>
                            <option value="" selected>Select Section</option>
                            <?php foreach($sections as $row1){?>
                                <?php 
                                    $sec = $row1['Section'];
                                    $countSection = $this->db->query("select Section 
                                    from students_juniorhigh 
                                    where Level= '$level' 
                                    and Section ='$sec'");
                                    $SecCount = $countSection->num_rows();
                                ?>
                                <option value="<?= $row1['Section'];?>"><?= $row1['Section'].' ('.$SecCount.')';?></option>
                            <?php }?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm" id="addsubject" value="addsubject" name="addsubject"><span class="far fa-eye"> </span> View Subjects</button>
                <?= form_close();?>
            </div>
            
            <div class="col-lg-7">
                <?= form_open('addsubjectTempJuniorhigh');?>
                    <div class="form-group">
                        <label for="address">Add Subject: </label>
                        <select id="select-state" name="subjects" class="form-control form-control-sm" required>
                            <option value="" selected>Select Section</option>
                            <?php foreach($juniorhighSubjects as $subjects){?>
                                <option value="<?= $subjects['csubjectID'];?>"><?= $subjects['subjectCode'].'-'.$subjects['subjectDesc'].' ('.$subjects['Day'].'/'.$subjects['Time'].')-->'.$subjects['FullName'];?></option>
                            <?php }?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm" id="addsubject" value="addsubject" name="addsubject"><span class="fas fa-plus"></span> Add Subject</button>
                <?= form_close();?>
            </div>
            
        </div>
        <!-- SHOWING OF SUBJECTS OF STUDENT -->
        <br>
        <h6>Total Subjects: <?= $subjectCount?></h6>
        <h6>Total Hours: <?= $hrsCount?></h6>
        <div style="overflow-y:scroll;width:100%;height:550px">
           
            <table class="table table-bordered table-hover table-sm" style="margin-top: 1%;">
                <thead>
                    <tr>
                        <th>Subject ID</th>
                        <th>Subject Code</th>
                        <th>Subject Description</th>
                        <th>Day</th>
                        <th>Time</th>
                        <th>Prof</th>
                        <th>Pre-equisite</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($tempsubjects as $subjects){?>
                    <tr>
                        <td><?= $subjects['subjectID']?></td>
                        <td><?= $subjects['subjectCode']?></td>
                        <td><?= $subjects['subjectDesc']?></td>
                        <td><?= $subjects['Day']?></td>
                        <td><?= $subjects['Time']?></td>
                        <td><?= $subjects['FullName']?></td>
                        <td><?= $subjects['prereq']?></td>
                        <td>
                        <?= form_open('removeTempSubjectJuniorhigh/'.$subjects['csubjectID']);?>
                            <button type="submit" class="btn btn-outline-danger btn-sm" data-toggle="tooltip" title="Remove"><span class="far fa-trash-alt"></span></button>
                        <?= form_close();?>
                        </td>
                    </tr>
                <?php }?>
                </tbody>
            </table>
        </div>

        <div class="container" style="margin-bottom: 5%;">
            <?= form_open('savestudentJuniorhigh');?>
                <button name="savestudent" type="submit" class="btn btn-success float-right" id="savestudent" value="savestudent" ><span class="far fa-save"></span> Save</button>
            <?= form_close();?>
        </div>

    </div>















</div>
<script>
    $(document).ready(function () {
        $('select').selectize({
            sortField: 'text'
        });
    });
</script>
<div class="main">

    <?php
        if($this->session->flashdata('scheduleUpdated') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> Schedule Saved.
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

    <h1>Edit - Junior High Schedule</h1>
    <a href="<?= base_url();?>schedule_juniorhigh" class="btn btn-primary btn-sm">Back</a>
    <div style="overflow-y:scroll;width:100%;height:550px">
        <table class="table table-bordered table-hover table-sm" style="margin-top: 1%;">
            <thead class="sticky-top bg-white">
                <tr>
                    <th>Subject ID</th>
                    <th>Subject Code</th>
                    <th>Subject Description</th>
                    <th>Day</th>
                    <th>Time</th>
                    <th>Professor</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($curriculumsubjects as $row){?>
                        <?= form_open("updateScheduleJuniorhigh/".$row['csubjectID']);?>
                        <tr>
                            <td><?= $row['subjectID'];?></td>
                            <td><?= $row['subjectCode'];?></td>
                            <td><?= $row['subjectDesc'];?></td>
                            <td><input value="<?= $row['Day'];?>" name="day" type="text" style="text-transform:uppercase"></td>
                            <td><input value="<?= $row['Time'];?>" name="time" type="text" style="text-transform:uppercase"></td>
                            <td>
                                <select id="select-state" name="prof" class="form-control form-control-sm" required>
                                <option value="<?= $row['Prof'];?>" selected><?= $row['FullName'];?></option>
                                    <?php foreach($teacher as $users){?>
                                        <option value="<?= $users['userID'];?>"><?= $users['FullName'];?></option>
                                    <?php }?>
                                </select>
                            </td>
                            <td>
                                <button name="updatesubject" type="submit" class="btn btn-success btn-sm"><span class="fas fa-save"></span></button>
                            </td>
                        </tr>
                        <?= form_close();?>
                <?php }?>
            </tbody>
        </table>
    </div>






</div>


<script>
    $(document).ready(function () {
        $('select').selectize({
            sortField: 'text'
        });
    });
</script>
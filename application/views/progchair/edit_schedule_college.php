<div class="container-fluid">
    <h1>Edit - College Schedule</h1>
    <a href="<?= base_url();?>schedule_college" class="btn btn-primary btn-sm">Back</a>
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
                <?php foreach($curriculumSubjects as $row){?>
                        <?= form_open("updateSchedule/".$row['csubjectID'])?>
                        <tr>
                            <td><?= $row['subjectID'];?></td>
                            <td><?= $row['subjectCode'];?></td>
                            <td><?= $row['subjectDesc'];?></td>
                            <td><input class="form-control form-control-sm" value="<?= $row['Day'];?>" name="day" type="text" style="text-transform:uppercase; width:100px"></td>
                            <td><input class="form-control form-control-sm" value="<?= $row['Time'];?>" name="time" type="text" style="text-transform:uppercase; width:100px"></td>
                            <td>
                                <select id="select-state" name="prof" class="form-control form-control-sm" required>
                                <option value="<?= $row['Prof'];?>" selected><?= $row['FullName'];?></option>
                                    <?php foreach($professors as $users){?>
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
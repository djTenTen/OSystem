<div class="container-fluid">

    <?php
        if($this->session->flashdata('gradeupdated') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> Grade successfully updated. 
        </div>';
        }

        if($this->session->flashdata('ErrorInput') != null){
            echo '<div class="alert alert-danger">
            <strong>Error! </strong> Invalid input method. 
        </div>';
        }
        
        if($this->session->flashdata('CollegeSubject_Deleted') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> Subject successfully deleted. 
        </div>';
        }
    
    ?>

    
    <h2 class="text-primary"><?= $SubjectName;?></h2>

        <div class="input-group mb-3">
            <input name="searchEvaluated" id="myInput" type="text" class="form-control" placeholder="Name / Student Number">
            <div class="input-group-append">
                <button name="searchstudent" class="btn btn-primary" type="button"><span class="fa fa-search"></span></button>
            </div>
        </div>
        <div style="overflow-y:scroll;width:100%;height:450px">        
            <table class="table table-bordered table-hover table-sm">
            <thead class="sticky-top bg-white">
                <tr>
                    <th>Student Number</th>
                    <th>Name</th>
                    <th>Level</th>
                    <th>1st Gr.</th>
                    <th>2nd Gr.</th>
                    <th>3rd Gr.</th>
                    <th>4th Gr.</th>
                    <th>Grade</th>
                    <th>Remarks</th>
                    <th>Action</th>

                    
                </tr>
            </thead>
            <tbody id="myTable">
                <?php foreach($seniorhighclasslist as $row){
                    if($row['year'] == 'KINDER I' or $row['year'] == 'KINDER II'){
                        ?> 
    
                        <tr>
                            <td><?= $row['studentnumber'];?></td>
                            <td><?= $row['FullName'];?></td>
                            <td><?= $row['year'];?></td>
                            <td><?= $row['sy'];?></td>
                                <?= form_open('updatesubjectgradegradeschool/'.$row['studentsubjectID'].'/'.$row['subjectID']);?>
                            <td class="col-1">
                                <select name="g1" class="form-control form-control-sm" required>
                                    <option value="<?= $row['G1'];?>" selected><?= $row['G1'];?></option>
                                    <option value="BEGINNING">BEGINNING</option>
                                    <option value="DEVELOPING">DEVELOPING</option>
                                    <option value="CONSISTENT">CONSISTENT</option>
                                </select>
                            </td>
                            <td class="col-1">
                                <select name="g2" class="form-control form-control-sm" required>
                                    <option value="<?= $row['G2'];?>" selected><?= $row['G2'];?></option>
                                    <option value="BEGINNING">BEGINNING</option>
                                    <option value="DEVELOPING">DEVELOPING</option>
                                    <option value="CONSISTENT">CONSISTENT</option>
                                </select>
                            </td>
                            <td class="col-1">
                                <select name="g3" class="form-control form-control-sm" required>
                                    <option value="<?= $row['G3'];?>" selected><?= $row['G3'];?></option>
                                    <option value="BEGINNING">BEGINNING</option>
                                    <option value="DEVELOPING">DEVELOPING</option>
                                    <option value="CONSISTENT">CONSISTENT</option>
                                </select>
                            </td>
                            <td class="col-1">
                                <select name="g4" class="form-control form-control-sm" required>
                                    <option value="<?= $row['G4'];?>" selected><?= $row['G4'];?></option>
                                    <option value="BEGINNING">BEGINNING</option>
                                    <option value="DEVELOPING">DEVELOPING</option>
                                    <option value="CONSISTENT">CONSISTENT</option>
                                </select>
                            </td>
                            <td class="col-1">
                                <select name="grade" class="form-control form-control-sm" required>
                                    <option value="<?= $row['Grade'];?>" selected><?= $row['Grade'];?></option>
                                    <option value="BEGINNING">BEGINNING</option>
                                    <option value="DEVELOPING">DEVELOPING</option>
                                    <option value="CONSISTENT">CONSISTENT</option>
                                </select>
                            </td>
                            <td class="col-1">
                                <select name="remarks" class="form-control form-control-sm" required>
                                    <option value="<?= $row['Remarks'];?>" selected><?= $row['Remarks'];?></option>
                                    <option value="PASSED">PASSED</option>
                                    <option value="FAILED">FAILED</option>
                                </select>
                            </td>
                            <td>
                                <input value="<?= $row['year'];?>" name="year" type="hidden"/>
                                <button type="submit" class="btn btn-outline-success btn-sm" data-toggle="tooltip" title="Update"><span class="fas fa-sync"></span></button>
                                <?= form_close();?>
                            </td>
                        </tr>
    
                        <?php }else{ ?>
                            <tr>
                                <td><?= $row['studentnumber'];?></td>
                                <td><?= $row['FullName'];?></td>
                                <td><?= $row['year'];?></td>
                                <td><?= $row['sy'];?></td>
                                    <?= form_open('updateGradeGradeschool/'.$row['studentsubjectID'].'/'.$row['subjectID']);?>
                                <td class="col-1">
                                    <input value="<?= $row['G1'];?>" step="0.01" name="g1" class="form-control form-control-sm" <?php if($encoding == 'No'){echo 'readonly';}?>/>
                                </td>
                                <td class="col-1">
                                    <input value="<?= $row['G2'];?>" step="0.01" name="g2" class="form-control form-control-sm" <?php if($encoding == 'No'){echo 'readonly';}?>/>
                                </td>
                                <td class="col-1">
                                    <input value="<?= $row['G3'];?>" step="0.01" name="g3" class="form-control form-control-sm" <?php if($encoding == 'No'){echo 'readonly';}?>/>
                                </td>
                                <td class="col-1">
                                    <input value="<?= $row['G4'];?>" step="0.01" name="g4" class="form-control form-control-sm" <?php if($encoding == 'No'){echo 'readonly';}?>/>
                                </td>
                                <td><?= $row['Grade'];?></td>
                                <td><button type="button" class="btn btn-sm <?php if($row['Remarks'] == 'PASSED'){echo 'btn-success';}else{echo 'btn-danger';}?>"><?= $row['Remarks'];?></button></td>
                                <td>
                                    <input value="<?= $row['year'];?>" name="year" type="hidden"/>
                                    <button type="submit" class="btn btn-outline-success btn-sm" data-toggle="tooltip" title="Update"><span class="fas fa-sync"></span></button>
                                
                                    <?= form_close();?>
                                </td>
                            </tr>
    
                        <?php }?>
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

<script>
    $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>

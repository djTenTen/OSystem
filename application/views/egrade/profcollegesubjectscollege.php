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
                    <th>Semester</th>
                    <th>Prelim</th>
                    <th>Midterm</th>
                    <th>Finals</th>
                    <th>Grade</th>
                    <th>Remarks</th>
                    <th>Action</th>
                    
                </tr>
            </thead>
            <tbody id="myTable">
                <?php foreach($collegeclasslist as $row){?> 
                    
                    <tr>
                        <td><?= $row['studentnumber'];?></td>
                        <td><?= $row['FullName'];?></td>
                        <td><?= $row['year'];?></td>
                        <td><?= $row['Semester'];?></td>
                            <?= form_open('updatesubjectgradecollege/'.$row['studentsubjectID']);?>
                        <td class="col-1">
                            <input value="<?= $row['Prelim'];?>" step="0.01" list="pgrade" name="Prelim" class="form-control form-control-sm"/>
                            <datalist id="pgrade">
                                <option value="INC">
                                <option value="FA">
                                <option value="UW">
                                <option value="DRP">
                            </datalist>
                        </td>
                        <td class="col-1">                            
                            <input value="<?= $row['Midterm'];?>" step="0.01" list="mgrade" name="Midterm" class="form-control form-control-sm"/>
                            <datalist id="mgrade">
                                <option value="INC">
                                <option value="FA">
                                <option value="UW">
                                <option value="DRP">
                            </datalist>
                        </td>
                        <td class="col-1">
                            <input value="<?= $row['Finals'];?>" step="0.01" list="fgrade" name="Finals" class="form-control form-control-sm"/>
                            <datalist id="fgrade">
                                <option value="INC">
                                <option value="FA">
                                <option value="UW">
                                <option value="DRP">
                            </datalist>
                        </td>
                        <td><?= $row['Grade'];?></td>
                        <td><button type="button" class="btn btn-sm <?php if($row['Remarks'] == 'PASSED'){echo 'btn-success';}else{echo 'btn-danger';}?>"><?= $row['Remarks'];?></button></td>
                        <td>
                            <button type="submit" class="btn btn-outline-success btn-sm" data-toggle="tooltip" title="Update"><span class="fas fa-sync"></span></button>
                            <?= form_close();?>
                        </td>
                    </tr>
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

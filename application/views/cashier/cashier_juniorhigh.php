<div class="container-fluid">
    <?php
        if($this->session->flashdata('Student_Enrolled') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> Student Successfully Enrolled
        </div>';
        }

        if($this->session->flashdata('Course_Update') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> Course successfully updated. 
        </div>';
        }
        
        if($this->session->flashdata('Course_Delete') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> Course successfully deleted. 
        </div>';
        }
    
    ?>
<div class="container container-fluid">
    <h1>Junior High Students</h1>

        <div class="input-group mb-3">
            <input name="searchEvaluated" id="myInput" type="text" class="form-control" placeholder="Search">
            <div class="input-group-append">
                <button name="searchstudent" class="btn btn-primary" type="button"><span class="fa fa-search"></span></button>
            </div>
        </div>

        <!-- LSIT OF VALIDATED STUDENTS -->
       
        <div style="overflow-y:scroll;width:100%;height:550px">        
            <table class="table table-bordered table-hover table-sm">
            <thead class="sticky-top bg-white">
            <tr>
                <th>Admission ID</th>
                <th>Student Number</th>
                <th>Name</th>
                <th>Year</th>
                <th>Section</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody id="myTable">
            <?php foreach($enrollStudents as $row){?>
                <tr>
                    <td><?= $row['admissionID'];?></td>
                    <td><?= $row['extension'].$row['StudentNo'];?></td>
                    <td><?= $row['FullName'];?></td>
                    <td><?= $row['Level'];?></td>
                    <td><?= $row['Section'];?></td>
                    <td>
                    
                        <button type="submit" class="btn btn-sm btn-outline-success" data-toggle="modal" data-target="#myModalMarkEnrolled<?= $row['admissionID'];?>" data-toggle="tooltip" title="Mark Enrolled"> <span class="fas fa-user-check"></span></button>
                        <!-- The Modal -->
                        <div class="modal fade" id="myModalMarkEnrolled<?= $row['admissionID'];?>">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h5>Confirmation</h5>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        
                                        Mark <strong><?= $row['FullName'];?></strong> as officially enrolled?

                                    </div>
                                    <div class="modal-footer">
                                    <?= form_open('markEnrolledJuniorhigh/'.$row['admissionID']);?>
                                        <button value="markenrolled" name="markenrolled" id="markenrolled" type="submit" class="btn btn-primary">Confirm</button>
                                    <?= form_close();?>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php }?>
            </tbody>
            </table>
        </div>
    </div>

</div>

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
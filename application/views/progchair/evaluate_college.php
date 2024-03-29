<div class="container-fluid">
    <?php
        if($this->session->flashdata('Student_Evaluated') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> The student has been successfully Evaluated. 
        </div>';
        }

        if($this->session->flashdata('CollegeMiscellaneous_Updated') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> Miscellaneous successfully updated. 
        </div>';
        }
        
        if($this->session->flashdata('CollegeMiscellaneous_Deleted') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> Miscellaneous successfully removed. 
        </div>';
        }
    ?>

    <div class="container container-fluid"style="margin-top: 2%">
       
        <div class="input-group mb-3">
            <input name="searchvalidated" type="text" id="myInput" class="form-control" placeholder="Search Admission ID/Lastname" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button name="searchValidated" class="btn btn-primary" type="submit"><span class="fa fa-search"></span></button>
            </div>
        </div>
        
        <div style="overflow-y:scroll;width:100%;height:400px">        
            <table class="table table-bordered table-hover table-sm">
                <thead>
                    <tr>
                        <th>Admission ID</th>
                        <th>Name</th>
                        <th>Course</th>
                        <th>Year</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                <?php foreach($validatedStudents as $row){?>
                    <tr>
                        <td><?= $row['admissionID'];?></td>
                        <td><?= $row['FullName'];?></td>
                        <td><?= $row['CourseCode'];?></td>
                        <td><?= $row['Level'];?></td>
                        <td>
                            <a class="btn btn-outline-primary btn-sm" href="advice_college/<?= $row['admissionID'];?>" data-toggle="tooltip" title="Evaluate"><span class="fas fa-tasks"></span></a>
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
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

<div class="main">
    <h1>List of Enrolled College Students</h1>
    <div class="container container-fluid">
    <br><br>


        <div class="input-group mb-3">
            <input name="searchEvaluated" type="text" id="myInput" class="form-control" placeholder="Search Admission ID/Lastname" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button name="searchstudent" class="btn btn-primary" type="button"><span class="fa fa-search"></span></button>
            </div>
        </div>
        
        <div style="overflow-y:scroll;width:100%;height:440px">        
            <table class="table table-bordered table-hover table-sm">
            <thead class="sticky-top bg-white">
                <tr>
                    <th>Admission ID</th>
                    <th>Name</th>
                    <th>Course</th>
                    <th>Year</th>
                    <th>Section</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="myTable">
                <?php foreach($College as $row){?>   
                    <tr>
                        <td><?= $row['admissionID'];?></td>
                        <td><?= $row['FullName'];?></td>
                        <td><?= $row['CourseCode'];?></td>
                        <td><?= $row['Level'];?></td>
                        <td><?= $row['Section'];?></td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a type="button" href="studentSubjectsCollege/<?= $row['admissionID'];?>"  class="btn btn-outline-success" data-toggle="tooltip" title="Print"><span class="fas fa-print"></span></a>
                                <a type="button" data-toggle="modal" data-target="#myModalReevaluate<?= $row['admissionID'];?>"  class="btn btn-outline-primary" data-toggle="tooltip" title="Re-Evaluate"><span class="far fa-edit"></span></a>
                            </div>

                            <!-- The Modal -->
                            <div class="modal fade" id="myModalReevaluate<?= $row['admissionID'];?>">
                                            <div class="modal-dialog modal-md">
                                                <div class="modal-content">
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h5>CONFIRMATION</h5>
                                                        
                                                    </div>
                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                    
                                                        Are you sure to Re-evaluate <strong><?= $row['FullName'];?></strong><br>
                                                        this will be sent to evaluators to re-evaluate <?= $row['FullName'];?> subjects.
                                                
                                                    <div class="modal-footer">
                                                    <?= form_open('reevaluatestudent/'.$row['admissionID']); ?>
                                                        <button name="delete" class="btn btn-primary" type="submit">Confirm</button>
                                                    <?= form_close(); ?>
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END OF MODAL -->

                        </td>
                    </tr>
                <?php }?>
            </tbody>
            </table>
        </div>
    </div>

</div>


<div class="container-fluid">
    <?php
        if($this->session->flashdata('resetted') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> the Student has been successfully Resetted. 
        </div>';
        }
    ?>


    



    <div class="container">
        <div class="col-lg-12">
                <?= form_open('collegereset');?>
                    <div class="input-group mb-3">
                        <input name="searchcollege" type="text" class="form-control" placeholder="Search Admission ID/Lastname/Firstname" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button name="search" class="btn btn-primary" type="submit"><span class="fa fa-search"></span></button>
                        </div>
                    </div>
                <?= form_close();?>
                <div style="overflow-y:scroll;width:100%;height:450px">    
                    <table class="table table-hover table-sm" id="header-fixed">
                        <thead class="sticky-top bg-white">
                            <tr>
                                <th>Admission ID</th>
                                <th>Extension</th>
                                <th>Student Number</th>
                                <th>FullName</th>
                                <th>Course</th>
                                <th>Level</th>
                                <th>Section</th>
                                <th>Semester</th>
                                <th>TOA</th>
                                <th>Validated</th>
                                <th>Evaluated</th>
                                <th>Assessed</th>
                                <th>Enrolled</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($studentsCollege as $row1){?>
                            <tr>
                                <td><?= $row1['admissionID'];?></td>
                                <td><?= $row1['extension'];?></td>
                                <td><?= $row1['StudentNo'];?></td>
                                <td><?= $row1['FullName'];?></td>
                                <td><?= $row1['CourseCode'];?></td>
                                <td><?= $row1['Level'];?></td>
                                <td><?= $row1['Section'];?></td>
                                <td><?= $row1['Semester'];?></td>
                                <td><?= $row1['TypeofApplication'];?></td>
                                <td><?= $row1['isValidated'];?></td>
                                <td><?= $row1['isEvaluated'];?></td>
                                <td><?= $row1['isAssess'];?></td>
                                <td><?= $row1['isEnrolled'];?></td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a type="button" data-toggle="modal" data-target="#myModalReset<?= $row1['admissionID'];?>"  class="btn btn-outline-danger" data-toggle="tooltip" title="Reset"><span class="fas fa-recycle"></span></a>
                                        <a type="button" data-toggle="modal" data-target="#myModalViewsubjects<?= $row1['admissionID'];?>"  class="btn btn-outline-primary" data-toggle="tooltip" title="View Subjects"><span class="fas fa-eye"></span></a>
                                    </div>


                                    <!-- The Modal -->
                                    <div class="modal fade" id="myModalViewsubjects<?= $row1['admissionID'];?>">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h5><?= $row1['FullName'];?> Subjects</h5>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    <div style="overflow-y:scroll;width:100%;height:450px">   
                                                        <table class="table table-hover table-sm" id="header-fixed">
                                                            <thead class="sticky-top bg-white">
                                                                <tr>
                                                                    <th>Subject Code</th>
                                                                    <th>Subeject Desc</th>
                                                                    <th>Schedule</th>
                                                                    <th>Time</th>
                                                                    <th>Instructor</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach($subjects as $sub){?>
                                                                <tr>
                                                                    <td><?= $sub['subjectCode'];?></td>
                                                                    <td><?= $sub['SubjectDesc'];?></td>
                                                                    <td><?= $sub['Day'];?></td>
                                                                    <td><?= $sub['Time'];?></td>
                                                                    <td><?= $sub['FullName'];?></td>
                                                                </tr>
                                                                <?php }?>
                                                            </tbody>
                                                        </table>
                                                    </div>  
                                                </div>
                                            
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END OF MODAL -->


                                    <!-- The Modal -->
                                    <div class="modal fade" id="myModalReset<?= $row1['admissionID'];?>">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h5>Confirmation</h5>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    
                                                    Are you sure to reset this student?? <strong><?= $row1['FullName'];?></strong>
                                                        
                                                </div>
                                            
                                                <div class="modal-footer">
                                                <?= form_open('resetcollegse/'.$row1['admissionID']);?>
                                                    <button type="submit" name="admitcollege" class="nav-link btn btn-primary">Reset</button>
                                                <?= form_close();?>
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
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
</div>
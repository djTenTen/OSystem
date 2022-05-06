<div class="container-fluid">
    <?php

        if($this->session->flashdata('subjectDropped') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> Subject successfully dropped. 
        </div>';
        }

        if($this->session->flashdata('CollegeSubject_Updated') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> Subject successfully updated. 
        </div>';
        }

        if($this->session->flashdata('CollegeSubject_Deleted') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> Subject successfully deleted. 
        </div>';
        }

    ?>

    <div class="container container-fluid">

        <h1>Students Information</h1>
        <div class="row">
            <div class="form-group col-lg-4">
                <label for="fullname">Full Name: </label>
                <input name="fullname" type="text" value="<?= $fullname;?>" class="form-control form-control-sm" placeholder="Full Name" id="fullname" readonly>
            </div>
            
            <div class="form-group col-lg-2">
                <label for="lvl">Level: </label>
                <input name="lvl" type="text" value="<?= $level;?>" class="form-control form-control-sm" placeholder="Level" id="lvl" readonly>
            </div>
            <div class="form-group col-lg-2">
                <label for="sem">Semester: </label>
                <input name="sem" type="text" value="<?= $sem;?>" class="form-control form-control-sm" placeholder="Semester" id="sem" readonly>
            </div>
            <div class="form-group col-lg-2">
                <label for="dpt">Department: </label>
                <input name="dpt" type="text" value="<?= $department;?>" class="form-control form-control-sm" placeholder="Department" id="dpt" readonly>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-lg-4">
                <label for="course">Course: </label>
                <input name="course" type="text" value="<?= $course;?>" class="form-control form-control-sm" placeholder="Course" id="course" readonly>
            </div>
            <div class="form-group col-lg-6">
                <label for="address">Address: </label>
                <input name="address" type="text" value="<?= $address;?>" class="form-control form-control-sm" placeholder="Address" id="address" readonly>
            </div>
        </div>


        <h1>Students Subjects</h1>
        <a href="<?= base_url();?>college" class="btn btn-sm btn-success">Done</a>
        <div style="overflow-y:scroll;width:100%;height:550px">
           
            <table class="table table-bordered table-hover table-sm" style="margin-top: 1%;">
                <thead class="sticky-top bg-white">
                    <tr>
                        <th>Subject ID</th>
                        <th>Subject Code</th>
                        <th>Subject Description</th>
                        <th>Day</th>
                        <th>Time</th>
                        <th>Prof</th>
                        <th>Units</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($studentSubjects as $subjects){?>
                    <tr>
                        <td><?= $subjects['subjectID']?></td>
                        <td><?= $subjects['subjectCode']?></td>
                        <td><?= $subjects['subjectDesc']?></td>
                        <td><?= $subjects['Day']?></td>
                        <td><?= $subjects['Time']?></td>
                        <td><?= $subjects['FullName']?></td>
                        <td><?= $subjects['units']?></td>            
                        <td>
                            <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#myModaldrop<?= $subjects['studentsubjectID']?>" data-toggle="tooltip" title="Drop"><span class="far fa-trash-alt"></span></button>
                        <!-- The Modal -->
                        <div class="modal fade" id="myModaldrop<?= $subjects['studentsubjectID']?>">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h5>Confirmation</h5>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        You are dropping <strong> <?= $subjects['subjectDesc']?></strong>. Do you want to proceed?
                                    </div>

                                    <div class="modal-footer">
                                    <?= form_open('dropsubject/'.$subjects['studentsubjectID']);?>
                                        <button value="dropsubject" name="dropsubject" id="dropsubject" type="submit" class="btn btn-primary">Confirm</button>
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
<div class="main">
    <?php
        if($this->session->flashdata('CollegeSubject_Added') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> Subject successfully added. 
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
    <h1>College Subject Management</h1>
    <div class="container" style="margin-top: 1%">
        <div class="row">
            <div class="col-lg-3">
                <?= form_open('addCollegeSubjects');?>
                    
                    <div class="form-group">
                        <label class="labelstyle" for="subjectCode">Subject Code</label>
                        <input name="subjectCode" type="text" class="form-control  form-control-sm" style="text-transform:uppercase" placeholder="Subject Code" id="subjectCode" required>
                    </div>
                    <div class="form-group">
                        <label class="labelstyle" for="subjectDesc">Subject Description</label>
                        <input name="subjectDesc" type="text" class="form-control form-control-sm" placeholder="Subject Description" id="subjectDesc" required>
                    </div>
                    <div class="form-group">
                        <label class="labelstyle" for="lec">Lecture</label>
                        <input name="lec" type="decimals" class="form-control form-control-sm" style="text-transform:uppercase" placeholder="Lecture" id="lec" required>
                    </div>
                    <div class="form-group">
                        <label class="labelstyle" for="labcom">Computer Unit</label>
                        <input name="labcom" type="decimals" class="form-control form-control-sm" style="text-transform:uppercase" placeholder="Laboratory" id="labcom" required>
                    </div>
                    <div class="form-group">
                        <label class="labelstyle" for="labnoncom">Non Computer Unit</label>
                        <input name="labnoncom" type="decimals" class="form-control form-control-sm" style="text-transform:uppercase" placeholder="Laboratory" id="labnoncom" required>
                    </div>
                    <div class="form-group">
                        <label class="labelstyle" for="computunits">Computed Units</label>
                        <input name="computunits" type="decimals" class="form-control form-control-sm" style="text-transform:uppercase" placeholder="Computed Units" id="labnoncom" required>
                    </div>
                    <div class="form-group">
                        <label class="labelstyle" for="prereq">Pre-Requisite</label>
                        <input name="prereq" type="text" class="form-control form-control-sm" style="text-transform:uppercase" placeholder="subject code Pre-Req." id="prereq" required>
                    </div>
                    <div class="form-group">
                        <label class="labelstyle" for="fee">Fee</label>
                        <input name="fee" type="decimals" class="form-control form-control-sm" style="text-transform:uppercase" placeholder="Fee" id="fee" required>
                    </div>


                    <button type="submit" class="btn btn-success" id="save" value="save" name="save"><span class="fas fa-plus"></span> Add Subject</button>
                <?= form_close();?>
            </div>

            <div class="col-lg-9">
                <?= form_open('subject_college');?>
                    <div class="input-group mb-3">
                        <input name="searchSubjects" type="text" class="form-control" placeholder="Search Subject Code/Subject Description">
                        <div class="input-group-append">
                            <button name="searchsubjects" class="btn btn-primary" type="submit"><span class="fa fa-search"></span></button>
                        </div>
                    </div>
                <?= form_close();?>

                <div style="overflow-y:scroll;width:100%;height:500px">
                    <table class="table table-bordered table-hover table-sm" bordered="1">  
                        <thead class="sticky-top bg-white">
                            <tr> 
                                <th>Subject ID</th>
                                <th>Subject Code</th>
                                <th>Subject Description</th>
                                <th>Lecture</th>
                                <th>Computer Unit</th>
                                <th>Non-Computer Unit</th>
                                <th>Units</th>
                                <th>Pre-Requisite</th>
                                <th>Fee</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($subject_college as $row){?>
                        <tr>
                            <td><?= $row['subjectID'];?></td>
                            <td><?= $row['subjectCode'];?></td>
                            <td><?= $row['subjectDesc'];?></td>
                            <td><?= $row['lec'];?></td>
                            <td><?= $row['labComputer'];?></td>
                            <td><?= $row['labNonComputer'];?></td>
                            <td><?= $row['units'];?></td>
                            <td><?= $row['prereq'];?></td>
                            <td><?= $row['fee'];?></td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a type="button" data-toggle="modal" data-target="#myModalEdit<?= $row['subjectID'];?>"  class="btn btn-outline-primary" data-toggle="tooltip" title="Edit"><span class="far fa-edit"></span></a>
                                    <a type="button" data-toggle="modal" data-target="#myModalDelete<?= $row['subjectID'];?>"  class="btn btn-outline-danger" data-toggle="tooltip" title="Delete"><span class="far fa-trash-alt"></span></a>
                                </div>
                            <!-- The Modal -->
                            <div class="modal fade" id="myModalEdit<?= $row['subjectID'];?>">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h5>Edit <?= $row['subjectDesc'];?></h5>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                <?= form_open('updateCollegeSubjects/'.$row['subjectID']);?>
                                                    <div class="form-group row">
                                                        <div class="col-md-5">
                                                            <label for="lname">Subject Code:</label>
                                                            <input value="<?= $row['subjectCode'];?>" name="subjectCode" type="text" class="form-control form-control-sm" id="subjectCode" required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="fname">Subject Description:</label>
                                                            <input value="<?= $row['subjectDesc'];?>" name="subjectDesc" type="text" class="form-control form-control-sm" id="subjectDesc" required>
                                                        </div>
                            
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="mname">Lecture:</label>
                                                        <input value="<?= $row['lec'];?>" name="lec" type="decimals" class="form-control form-control-sm" id="lec" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="username">Lab Computer:</label>
                                                        <input value="<?= $row['labComputer'];?>" name="labComputer" type="decimals" class="form-control form-control-sm" id="labComputer" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="username">Lab Computer:</label>
                                                        <input value="<?= $row['labNonComputer'];?>" name="labNonComputer" type="decimals" class="form-control form-control-sm" id="labNonComputer" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="labelstyle" for="computunits">Computed Units</label>
                                                        <input value="<?= $row['computeunits'];?>" name="computunits" type="decimals" class="form-control form-control-sm" style="text-transform:uppercase" placeholder="Computed Units" id="labnoncom" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="prereq">Pre-Requisit:</label>
                                                        <input value="<?= $row['prereq'];?>" name="prereq" type="text" class="form-control form-control-sm" id="prereq" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="fee">Fee:</label>
                                                        <input value="<?= $row['fee'];?>" name="fee" type="decimals" class="form-control form-control-sm" id="fee" required>
                                                    </div>
                                                    
                                                </div>

                                            
                                                <div class="modal-footer">
                                                    <button name="shiftstudent" class="btn btn-success" type="submit">Update</button>
                                                <?= form_close(); ?>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>  
                                <!-- END OF MODAL -->
                                
                                <!-- The Modal -->
                                <div class="modal fade" id="myModalDelete<?= $row['subjectID'];?>">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h5>CONFIRMATION</h5>
                                                    
                                                </div>
                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                
                                                    Are you sure to delete <strong><?= $row['subjectDesc'];?></strong>
                                            
                                                <div class="modal-footer">
                                                <?= form_open('deleteCollegeSubjects/'.$row['subjectID']); ?>
                                                    <button name="delete" class="btn btn-danger" type="submit">Delete</button>
                                                <?= form_close(); ?>
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
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
    </div>
</div>
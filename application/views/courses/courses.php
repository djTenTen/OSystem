<div class="main">
    <?php
        if($this->session->flashdata('Course_Added') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> Course successfully added. 
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
    <h1>Course Management</h1>
    <div class="container" style="margin-top: 1%;">
        <div class="row">
            <div class="col-lg-4">
                <?= form_open('addCourse')?>
                    <div class="form-group"style="font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: bold; font-size: 12px; margin-top: 10px;">
                        <label for="courseCode">Course Code</label>
                        <input name="courseCode" type="text" class="form-control form-control-sm" style="text-transform:uppercase" placeholder="Course Code" id="courseCode" required>
                    </div>
                    <div class="form-group"style="font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: bold; font-size: 12px; margin-top: 10px;">
                        <label for="courseDesc">Course Description</label>
                        <input name="courseDesc" type="text" class="form-control form-control-sm" style="text-transform:uppercase" placeholder="Course Description" id="courseDesc" required>
                    </div>
                    <div class="form-group"style="font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: bold; font-size: 12px; margin-top: 10px;">
                        <label>College Department:</label>
                            <select name="collegeDPT" class="form-control form-control-sm" required>
                                <option value="" selected>Select Department</option>
                                <option value="CCLS">CCLS</option>
                                <option value="CBAH">CBAH</option>
                                <option value="CEC">CEC</option>
                                <option value="CASED">CASED</option>
                            </select>
                    </div>
                    <button type="submit" class="btn btn-success" id="save" value="save" name="save"><span class="fas fa-plus"></span> Add Course</button>
                <?= form_close()?>
            </div>
            <div class="col-lg-8">
                <form action="courses" role="search" method="post">
                    <div class="input-group mb-3">
                        <input name="searchCourse" type="text" class="form-control" placeholder="Search Course Code/Course Description">
                        <div class="input-group-append">
                            <button name="searchsubjects" class="btn btn-primary" type="submit"><span class="fa fa-search"></span></button>
                        </div>
                    </div>
                </form>
                <div style="overflow-y:scroll;width:100%;height:450px">  
                <table class="table table-bordered table-hover table-sm" bordered="1">  
                        <thead class="sticky-top bg-white">
                            <tr> 
                                <th>Course ID</th>
                                <th>Course Code</th>
                                <th>Course Description</th>
                                <th>Department</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($courses as $row){?>
                        <tr>
                            <td><?= $row['CourseID'];?></td>
                            <td><?= $row['CourseCode'];?></td>
                            <td><?= $row['CourseDesc'];?></td>
                            <td><?= $row['CollegeDPT'];?></td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a type="button" data-toggle="modal" data-target="#myModalEdit<?= $row['CourseID'];?>"  class="btn btn-outline-primary" data-toggle="tooltip" title="Edit"><span class="far fa-edit"></span></a>
                                    <a type="button" data-toggle="modal" data-target="#myModalDelete<?= $row['CourseID'];?>"  class="btn btn-outline-danger" data-toggle="tooltip" title="Delete"><span class="far fa-trash-alt"></span></a>
                                </div>
                            <!-- The Modal -->
                            <div class="modal fade" id="myModalEdit<?= $row['CourseID'];?>">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h5>Edit <?= $row['CourseDesc'];?></h5>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                <?= form_open('updateCourse/'.$row['CourseID']);?>
                                                    <div class="form-group">
                                                        <label for="lname">Course Code:</label>
                                                        <input value="<?= $row['CourseCode'];?>" name="CourseCode" type="text" class="form-control form-control-sm" id="subjectCode" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="fname">Subject Description:</label>
                                                        <input value="<?= $row['CourseDesc'];?>" name="CourseDesc" type="text" class="form-control form-control-sm" id="subjectDesc" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>College Department:</label>
                                                            <select name="collegeDPT" class="form-control form-control-sm" required>
                                                                <option value="<?= $row['CollegeDPT'];?>" selected><?= $row['CollegeDPT'];?></option>
                                                                <option value="CCLS">CCLS</option>
                                                                <option value="CBAH">CBAH</option>
                                                                <option value="CEC">CEC</option>
                                                                <option value="CASED">CASED</option>
                                                            </select>
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
                                <div class="modal fade" id="myModalDelete<?= $row['CourseID'];?>">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h5>CONFIRMATION</h5>
                                                    
                                                </div>
                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                
                                                    Are you sure to delete <strong><?= $row['CourseDesc'];?></strong>
                                            
                                                <div class="modal-footer">
                                                <?= form_open('deleteCourse/'.$row['CourseID']); ?>
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
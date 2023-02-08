<div class="container-fluid">
    <?php
        if($this->session->flashdata('CollegeSubject_Added') != null){
            echo '<div class="alert alert-info">
            <strong>Success! </strong> Subject successfully added. 
        </div>';
        }

        if($this->session->flashdata('Curriculum_Added') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> the Curriculum has been successfully set. 
        </div>';
        }

        if($this->session->flashdata('Curriculum_Deleted') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> the Curriculum has been removed. 
        </div>';
        }
        
        
        if($this->session->flashdata('CollegeSubject_Deleted') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> Subject successfully deleted. 
        </div>';
        }
    
    ?>


    <div class="container" style="margin-top:5%">
        <div class="row">
            <div class="col-lg-6">
                <?= form_open('addCurriculumSubjectsCollege');?>
                    <div class="form-group" style="font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: bold; font-size: 12px;">
                        <label for="collegeSubject">Subjects:</label>
                            <select id="select-state" name="collegeSubject" class="form-control form-control-sm" required>
                            <option value="" selected>Search Subects</option>
                                <?php foreach($subjectCollege as $row){?>
                                <option value="<?= $row['subjectID'];?>"><?= $row['subjectCode'] .' - '. $row['subjectDesc'];?></option>
                                <?php }?>
                            </select>
                    </div>
                    <button type="submit" class="btn btn-success" id="addsubject" value="addsubject" name="addsubject"><span class="fas fa-plus"> </span> Add Subject</button>
                <?= form_close();?>
                    <!-- CURRICULUM -->
                <?= form_open('addCurriculumCollege');?>
                    <div class="form-group row">
                        <div class="col-lg-4" style="font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: bold; font-size: 12px; margin-top: 10px;">
                            <label for="sy">School Year:</label>
                            <select name="sy" class="form-control form-control-sm" required>
                                <option value="">School Year</option>
                                <option value="2017-2018">2017-2018</option>
                                <option value="2018-2019">2018-2019</option>
                                <option value="2019-2020">2019-2020</option>
                                <option value="2020-2021">2020-2021</option>
                                <option value="2021-2022" selected>2021-2022</option>
                                <option value="2022-2023">2022-2023</option>
                                <option value="2023-2024">2023-2024</option>
                                <option value="2024-2025">2024-2025</option>
                                <option value="2025-2026">2025-2026</option>
                                <option value="2026-2027">2026-2027</option>
                                <option value="2027-2028">2027-2028</option>
                                <option value="2028-2029">2028-2029</option>
                                <option value="2029-2030">2029-2030</option>
                                <option value="2030-2031">2030-2031</option>
                            </select>
                        </div>
                    <!-- </div>
                    <div class="form-group"> -->
                        <div class="col-lg-4" style="font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: bold; font-size: 12px; margin-top: 10px;">
                            <label for="yearlevel">Year Level:</label>
                            <select name="yearlevel" class="form-control form-control-sm" required>
                                <option value="">Select Year Level</option>
                                <option value="1st Year">1st Year</option>
                                <option value="2nd Year">2nd Year</option>
                                <option value="3rd Year">3rd Year</option>
                                <option value="4th Year">4th Year</option>
                                <option value="5th Year">5th Year</option>
                            </select>
                        </div>
                <!-- </div>
                    <div class="form-group"> -->
                        <div class="col-lg-4" style="font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: bold; font-size: 12px; margin-top: 10px;">
                            <label for="sem">Semester:</label>
                            <select name="sem" class="form-control form-control-sm" required>
                                <option value="">Select Semester</option>
                                <option value="1st Sem">1st Sem</option>
                                <option value="2nd Sem">2nd Sem</option>
                                <option value="Summer">Summer</option>
                            </select>
                        </div>

                        <div class="col-lg-4" style="font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: bold; font-size: 12px; margin-top: 10px;">
                            <label for="section">Section:</label>
                            <select name="section" class="form-control form-control-sm" required>
                                <option value="">Select Section</option>
                                <option value="1-A">1-A</option>
                                <option value="1-B">1-B</option>
                                <option value="1-C">1-C</option>
                                <option value="1-D">1-D</option>
                                <option value="1-E">1-E</option>
                                <option value="1-F">1-F</option>
                                <option value="2-A">2-A</option>
                                <option value="2-B">2-B</option>
                                <option value="2-C">2-C</option>
                                <option value="2-D">2-D</option>
                                <option value="2-E">2-E</option>
                                <option value="2-F">2-F</option>
                                <option value="3-A">3-A</option>
                                <option value="3-B">3-B</option>
                                <option value="3-C">3-C</option>
                                <option value="3-D">3-D</option>
                                <option value="3-E">3-E</option>
                                <option value="3-F">3-F</option>
                                <option value="4-A">4-A</option>
                                <option value="4-B">4-B</option>
                                <option value="4-C">4-C</option>
                                <option value="4-D">4-D</option>
                                <option value="4-E">4-E</option>
                                <option value="4-F">4-F</option>
                                <option value="5-A">5-A</option>
                                <option value="5-B">5-B</option>
                                <option value="5-C">5-C</option>
                                <option value="5-D">5-D</option>
                                <option value="5-E">5-E</option>
                                <option value="5-F">5-F</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group" style="font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: bold; font-size: 12px;">
                        <label for="email">Course:</label>
                        <select name="courseID" class="form-control form-control-sm" required>
                            <option value="" selected>Select Course</option>
                            <?php foreach($courses as $row){?>
                            <option value="<?= $row['CourseID'];?>"><?= $row['CourseCode'].' - '. $row['CourseDesc'];?></option>
                            <?php }?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success" id="addcurriculum" value="addcurriculum" name="addcurriculum"><span class="fas fa-plus"> </span> Add Curriculum</button>
                <?= form_close();?>
            
            </div>

            <!-- SUBJECT TABLE -->

            <div class="col-lg 6">
                <div style="overflow-y:scroll;width:100%;height:550px">  
                    <table class="table table-bordered table-hover table-sm">  
                        <thead class="sticky-top bg-white">
                            <tr> 
                                <th>Subject ID</th>
                                <th>Subject Code</th>
                                <th>Subject Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($subjectCollegeTemp as $row2){?>
                            <tr>
                                <td><?= $row2['subjectID'];?></td>
                                <td><?= $row2['subjectCode'];?></td>
                                <td><?= $row2['subjectDesc'];?></td>
                                <td>
                                    <a type="button" data-toggle="modal" data-target="#myModalDelete<?= $row2['subjectID'];?>"  class="btn btn-outline-danger" data-toggle="tooltip" title="Delete"><span class="far fa-trash-alt"></span></a>
                                    <!-- The Modal -->
                                    <div class="modal fade" id="myModalDelete<?= $row2['subjectID'];?>">
                                            <div class="modal-dialog modal-md">
                                                <div class="modal-content">
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h5>CONFIRMATION</h5>
                                                        
                                                    </div>
                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                    
                                                        Are you sure to delete <strong><?= $row2['SubjectDesc'];?></strong>
                                                
                                                    <div class="modal-footer">
                                                    <?= form_open('removeTempSubjectCollege/'.$row2['subjectID']); ?>
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


            <div class="col-lg 12">
                <?= form_open('curriculum_college');?>
                    <div class="input-group mb-3">
                        <input name="searchCurriculum" type="text" class="form-control" placeholder="Search Course Code">
                        <div class="input-group-append">
                            <button name="searchsubjects" class="btn btn-primary" type="submit"><span class="fa fa-search"></span></button>
                        </div>
                    </div>
                <?= form_close(); ?>
                <div style="overflow-y:scroll;width:100%;height:550px">  
                    <table class="table table-bordered table-sm table-hover">  
                        <thead>
                            <tr> 
                                <th>Curriculum ID</th>
                                <th>Course</th>
                                <th>Year</th>
                                <th>Sem</th>
                                <th>Section</th>
                                <th>School Year File</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($curriculumCollege as $row3){?>
                            <tr>
                                <td><?= $row3['curriculumID'];?></td>
                                <td><?= $row3['CourseCode'];?></td>
                                <td><?= $row3['Year'];?></td>
                                <td><?= $row3['Sem'];?></td>
                                <td><?= $row3['Section'];?></td>
                                <td><?= $row3['sy'];?></td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a type="button" data-toggle="modal" data-target="#myModalView<?= $row3['curriculumID'];?>"  class="btn btn-outline-success" data-toggle="tooltip" title="View"><span class="far fa-eye"></span></a>
                                        <a type="button" data-toggle="modal" data-target="#myModalDelete<?= $row3['curriculumID'];?>"  class="btn btn-outline-danger" data-toggle="tooltip" title="Delete"><span class="far fa-trash-alt"></span></a>
                                        <a href="<?= base_url();?>curriculumCollege/<?= $row3['curriculumID'].'/'.$row3['CourseCode'].'/'.$row3['Section'];?>" class="btn btn-outline-primary" data-toggle="tooltip" title="Edit Curriculum"><span class="far fa-edit"></span></a>
                                    </div>
                                    <!-- The Modal -->
                                    <div class="modal fade" id="myModalView<?= $row3['curriculumID'];?>">
                                            
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h5>Subjects of <?= $row3['CourseCode'].' - '.$row3['Year'].' - '.$row3['Sem'].' - '.$row3['Section'];?></h5>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                    
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button name="shiftstudent" class="btn btn-success" type="submit">Update</button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    <!-- END OF MODAL -->
                                    
                                    <!-- The Modal -->
                                    <div class="modal fade" id="myModalDelete<?= $row3['curriculumID'];?>">
                                            <div class="modal-dialog modal-md">
                                                <div class="modal-content">
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h5>CONFIRMATION</h5>
                                                        
                                                    </div>
                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                    
                                                        Are you sure to delete <strong><?= $row3['CourseCode'].' - '.$row3['Year'].' - '.$row3['Sem'].' - '.$row3['Section'];?></strong> 
                                                
                                                    <div class="modal-footer">
                                                    <?= form_open('deleteCurriculumCollege/'.$row3['curriculumID']); ?>
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


<script>
    $(document).ready(function () {
        $('select').selectize({
            sortField: 'text'
        });
    });
</script>


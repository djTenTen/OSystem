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
                <?= form_open('addCurriculumSubjectsJuniorhigh');?>
                    <div class="form-group" style="font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: bold; font-size: 12px;">
                        <label for="collegeSubject">Subjects:</label>
                            <select id="select-state" name="collegeSubject" class="form-control form-control-sm" required>
                            <option value="" selected>Search Subects</option>
                                <?php foreach($subjectjuniorhigh as $row){?>
                                <option value="<?= $row['subjectID'];?>"><?= $row['subjectCode'] .' - '. $row['subjectDesc'];?></option>
                                <?php }?>
                            </select>
                    </div>
                    <button type="submit" class="btn btn-success" id="addsubject" value="addsubject" name="addsubject"><span class="fas fa-plus"> </span> Add Subject</button>
                <?= form_close();?>
                    <!-- CURRICULUM -->
                <?= form_open('addCurriculumJuniorhigh');?>
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
                                <option value="Grade 7">Grade 7</option>
                                <option value="Grade 8">Grade 8</option>
                                <option value="Grade 9">Grade 9</option>
                                <option value="Grade 10">Grade 10</option>
                            </select>
                        </div>
                <!-- </div>
                    <div class="form-group"> -->
                        <!-- <div class="col-lg-4" style="font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: bold; font-size: 12px; margin-top: 10px;">
                            <label for="sem">Semester:</label>
                            <select name="sem" class="form-control form-control-sm" required>
                                <option value="">Select Semester</option>
                                <option value="1st Sem">1st Sem</option>
                                <option value="2nd Sem">2nd Sem</option>
                                <option value="Summer">Summer</option>
                            </select>
                        </div> -->

                        <div class="col-lg-4" style="font-family: Verdana, Geneva, Tahoma, sans-serif; font-weight: bold; font-size: 12px; margin-top: 10px;">
                            <label for="section">Section:</label>
                            <select name="section" class="form-control form-control-sm" required>
                                <option value="" selected>Select Section</option>
                                <?php foreach($sections as $section){?>
                                    <option value="<?= $section['Section'];?>"><?= $section['Section'];?></option>
                                <?php }?>
                            </select>
                        </div>
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
                                                    
                                                        Are you sure to delete <strong><?= $row2['subjectDesc'];?></strong>
                                                
                                                    <div class="modal-footer">
                                                    <?= form_open('removeCurriculumTempSubjectJuniorhigh/'.$row2['subjectID']); ?>
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
                <?= form_open('curriculum_seniorhigh');?>
                    <div class="input-group mb-3">
                        <input name="searchCurriculum" type="text" class="form-control" placeholder="Search Course Code">
                        <div class="input-group-append">
                            <button name="searchsubjects" class="btn btn-primary" type="submit"><span class="fa fa-search"></span></button>
                        </div>
                    </div>
                <?= form_close(); ?>
                <div style="overflow-y:scroll;width:100%;height:550px">  
                    <table class="table table-bordered table-hover table-sm">  
                        <thead class="sticky-top bg-white">
                            <tr> 
                                <th>Curriculum ID</th>
                                <th>Year</th
                                <th>Section</th>
                                <th>School Year File</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($curriculumSeniorhigh as $row3){?>
                            <tr>
                                <td><?= $row3['curriculumID'];?></td>
                                <td><?= $row3['Year'];?></td>
                                <td><?= $row3['Section'];?></td>
                                <td><?= $row3['sy'];?></td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a type="button" data-toggle="modal" data-target="#myModalView<?= $row3['curriculumID'];?>"  class="btn btn-outline-success" data-toggle="tooltip" title="View"><span class="far fa-eye"></span></a>
                                        <a type="button" data-toggle="modal" data-target="#myModalDelete<?= $row3['curriculumID'];?>"  class="btn btn-outline-danger" data-toggle="tooltip" title="Delete"><span class="far fa-trash-alt"></span></a>
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


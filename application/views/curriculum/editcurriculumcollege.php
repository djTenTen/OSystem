<div class="container-fluid">
    <?php
        if($this->session->flashdata('CollegeSubjectadded') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> Subject successfully added to a curriculum. 
        </div>';
        }
        if($this->session->flashdata('CollegeSubjectdeleted') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> Subject deleted from the curriculum 
        </div>';
        }

        
    ?>
<h1>Edit Curriculum College</h1>
<h1><?= $course;?></h1>

    <div class="col-lg-6">
        <?= form_open('addsubjectcurriculumcollege/'.$curriID);?>
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
    </div>

    <div class="col-lg 12">
        <div style="overflow-y:scroll;width:100%;height:550px">  
            <table class="table table-bordered table-sm table-hover">  
                <thead>
                    <tr> 
                        <th>Subject ID</th>
                        <th>Subject Code</th>
                        <th>Subject Description</th>
                        <th>Lec</th>
                        <th>LabC</th>
                        <th>LabNC</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($currisubjects as $row3){?>
                    <tr>
                        <td><?= $row3['subjectID'];?></td>
                        <td><?= $row3['subjectCode'];?></td>
                        <td><?= $row3['subjectDesc'];?></td>
                        <td><?= $row3['lec'];?></td>
                        <td><?= $row3['labComputer'];?></td>
                        <td><?= $row3['labNonComputer'];?></td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a type="button" data-toggle="modal" data-target="#myModalDelete<?= $row3['csubjectID'];?>"  class="btn btn-outline-danger" data-toggle="tooltip" title="Delete"><span class="far fa-trash-alt"></span></a>
                            </div>
                        
                            <!-- The Modal -->
                            <div class="modal fade" id="myModalDelete<?= $row3['csubjectID'];?>">
                                    <div class="modal-dialog modal-md">
                                        <div class="modal-content">
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h5>CONFIRMATION</h5>
                                                
                                            </div>
                                            <!-- Modal body -->
                                            <div class="modal-body">
                                            
                                                Are you sure to delete <strong><?= $row3['subjectCode'].'-'.$row3['subjectDesc'];?></strong>  subject in the curriculum?
                                        
                                            <div class="modal-footer">
                                            <?= form_open('deletesubjectcurriculum/'.$row3['curriculumID'].'/'.$row3['csubjectID']); ?>
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


<script>
    $(document).ready(function () {
        $('select').selectize({
            sortField: 'text'
        });
    });
</script>

<div class="container-fluid">
    <?php
        if($this->session->flashdata('Meeting_Added') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> Meeting successfully added. 
        </div>';
        }

        if($this->session->flashdata('Meeting_Updated') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> Meeting successfully updated. 
        </div>';
        }
        
        if($this->session->flashdata('Meeting_Deleted') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> Meeting successfully deleted. 
        </div>';
        }
    
    ?>
    <h1>Meeting Management</h1>
    <div class="container" style="margin-top: 1%">
        <div class="row">
            <div class="col-lg-3">

                <?= form_open_multipart('addmeeting');?>
                    <div class="form-group">
                        <label class="" for="subjectCode">Meeting Name:</label>
                        <input name="meetingname" type="text" class="form-control  form-control-sm" style="text-transform:uppercase" placeholder="Meeting Name" id="meetingname" required>
                    </div>
                    <div class="form-group">
                        <label for="comment">Meeting Description:</label>
                        <textarea name="meetingdesc" class="form-control" rows="5" id="comment"></textarea>
                    </div>

                    
                    <div class="form-group">
                        <label for="date">Date:</label>
                        <input name="date" type="date" placeholder="mm/dd/yyyy" min="01-01-1880" max="01-01-4000"  class="form-control form-control-sm" id="date" required>
                    </div>

                    <div class="form-group row col-md-12 form-inline">                
                        <label for="username">Time:(24 hours)</label>                    
                        <input name="hour" type="text" maxlength="2" class="form-control form-control-sm col-2" placeholder="hh" id="hour" required>:                        
                        <input name="minute" type="text" maxlength="2" class="form-control form-control-sm col-2" placeholder="mm" id="minute" required>  
                    </div>


                    <div class="form-group">
                        <label class="labelstyle" for="labcom">Upload File:</label>
                        <input type="file" name="file" id="file" required>
                    </div> 
                    <button type="submit" class="btn btn-success" id="save" value="save" name="save"><span class="fas fa-plus"></span> Add Meeting</button>
                <?= form_close();?>
            </div>

            <div class="col-lg-9">
                <?= form_open('meetings');?>
                    <div class="input-group mb-3">
                        <input name="searchmeeting" type="text" class="form-control" placeholder="Search Meeting Name">
                        <div class="input-group-append">
                            <button name="searchsubjects" class="btn btn-primary" type="submit"><span class="fa fa-search"></span></button>
                        </div>
                    </div>
                <?= form_close();?>

                <div style="overflow-y:scroll;width:100%;height:500px">
                    <table class="table table-bordered table-striped" bordered="1">  
                        <thead class="sticky-top bg-white">
                            <tr> 
                                <th>Meeting ID</th>
                                <th>Meeting Name</th>
                                <th>Meeting Description</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($meetings as $row){?>
                        <tr>
                            <td><?= $row['MeetingID'];?></td>
                            <td><?= $row['MeetingName'];?></td>
                            <td><?= $row['MeetingDesc'];?></td>
                            <td><?= $row['Date'];?></td>
                            <td><?= $row['Time'];?></td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a type="button" data-toggle="modal" data-target="#myModalEdit<?= $row['MeetingID'];?>"  class="btn btn-outline-primary" data-toggle="tooltip" title="Edit"><span class="far fa-edit"></span></a>
                                    <a type="button" data-toggle="modal" data-target="#myModalDelete<?= $row['MeetingID'];?>"  class="btn btn-outline-danger" data-toggle="tooltip" title="Delete"><span class="far fa-trash-alt"></span></a>
                                    <a type="button" data-toggle="modal" data-target="#myModalview<?= $row['MeetingID'];?>"  class="btn btn-outline-success" data-toggle="tooltip" title="View"><span class="fas fa-glasses"></span></a>
                                </div>
                            <!-- The Modal -->
                            <div class="modal fade" id="myModalEdit<?= $row['MeetingID'];?>">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h5>Edit <?= $row['MeetingName'];?></h5>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                <?= form_open('updatemeeting/'.$row['MeetingID']);?>
                                                <div class="form-group">
                                                        <label class="" for="subjectCode">Meeting Name:</label>
                                                        <input value="<?= $row['MeetingName'];?>" name="meetingname" type="text" class="form-control  form-control-sm" style="text-transform:uppercase" placeholder="Meeting Name" id="meetingname" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="comment">Meeting Description:</label>
                                                        <textarea value="<?= $row['MeetingDesc'];?>" name="meetingdesc" class="form-control" rows="5" id="comment"><?= $row['MeetingDesc'];?></textarea>
                                                    </div>

                                                    
                                                    <div class="form-group">
                                                        <label for="date">Date:</label>
                                                        <input value="<?= $row['Date'];?>" name="date" type="date" placeholder="mm/dd/yyyy" min="01-01-1880" max="01-01-4000"  class="form-control form-control-sm" id="date" required>
                                                    </div>

                                                    <div class="form-group row col-md-12 form-inline">                
                                                        <label for="username">Time:(24 hours)</label>              
                                                        <input value="<?= substr($row['Time'], 0, 2);?>" name="hour" type="text" maxlength="2" class="form-control form-control-sm col-2" placeholder="hh" id="hour" required>:                        
                                                        <input value="<?= substr($row['Time'], 3, 2);?>" name="minute" type="text" maxlength="2" class="form-control form-control-sm col-2" placeholder="mm" id="minute" required>  
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
                                <div class="modal fade" id="myModalDelete<?= $row['MeetingID'];?>">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h5>CONFIRMATION</h5>
                                                    
                                                </div>
                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                
                                                    Are you sure to delete <strong><?= $row['MeetingName'];?></strong>
                                            
                                                <div class="modal-footer">
                                                <?= form_open('deletemeeting/'.$row['MeetingID']); ?>
                                                    <button name="delete" class="btn btn-danger" type="submit">Delete</button>
                                                <?= form_close(); ?>
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END OF MODAL -->


                                <!-- The Modal -->
                                <div class="modal fade" id="myModalview<?= $row['MeetingID'];?>">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h5>CONFIRMATION</h5>
                                                    
                                                </div>
                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                
                                                    <strong>Meeting Name: </strong><?= $row['MeetingName'];?><br>
                                                    <strong>Description: </strong><?= $row['MeetingDesc'];?><br>
                                                    <strong>Date: </strong><?= $row['Date'];?><br>
                                                    <strong>Time: </strong><?= $row['Time'];?><br>

                                                    <object data="<?= base_url();?>meetingfiles/<?= $row['MeetingID'];?>.pdf" type="application/pdf" width="100%" height="500">
                                                        <a href="data/test.pdf">test.pdf</a>
                                                    </object>


                                            
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
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

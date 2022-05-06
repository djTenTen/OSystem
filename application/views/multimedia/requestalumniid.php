<div class="container-fluid">
    <?php
        if($this->session->flashdata('forpickup') != null){
            echo '<div class="alert alert-info">
            <strong>Success! </strong> The Alumni ID is now on-hand and ready to pick-up 
        </div>';
        }

        if($this->session->flashdata('markdone') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> The Alumni ID has been picked-up
        </div>';
        }

        if($this->session->flashdata('Deleted') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> Request successfully deleted
        </div>';
        }
    ?>

<h1>Multimedia Request ID Management</h1>

        <?= form_open('request');?>
            <div class="input-group mb-3">
                <input name="search" type="text" class="form-control" placeholder="Search Last Name, First Name" aria-label="Recipient's username" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button name="searchstudent" class="btn btn-primary" type="submit"><span class="fa fa-search"></span></button>
                </div>
            </div>
        <?= form_close();?>

        <div style="overflow-y:scroll;width:100%;height:550px">        
            <table class="table table-bordered table-hover table-sm">
            <thead class="sticky-top bg-white">
                <tr>
                    <th>Request ID</th>
                    <th>Name</th>
                    <th>Option</th>
                    <th>What Request</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($requests as $row){?>
                <tr>
                    <td><?= $row['RequestID'];?></td>
                    <td><?= $row['FullName'];?></td>
                    <td><?= $row['Option'];?></td>
                    <td><?= $row['RequestWhat'];?></td>
                    <td>
                        <?php 
                            if($row['isDone'] == 'No'){echo '<p class="btn btn-sm btn-danger">Pending</p>';}
                            if($row['isDone'] == 'Yes' && $row['isPicked'] == 'No'){echo '<p class="btn btn-sm btn-warning">On Hand</p>';}
                            if($row['isDone'] == 'Yes' && $row['isPicked'] == 'Yes'){echo '<p class="btn btn-sm btn-success">Done</p>';}
                        ?>
                    </td>
                    <td>
                        <div class="btn-group btn-group-sm">
                            <a type="button" data-toggle="modal" data-target="#myModalView<?= $row['RequestID'];?>"  class="btn btn-outline-success" data-toggle="tooltip" title="View"><span class="far fa-eye"></span></a>                           
                            <a type="button" data-toggle="modal" data-target="#myModalDelete<?= $row['RequestID'];?>"  class="btn btn-outline-danger" data-toggle="tooltip" title="Delete"><span class="far fa-trash-alt"></span></a>
                        </div>

                        <!-- FOR PHOTO REQUEST -->
                        <?php if($row['RequestWhat'] == 'Alumni Photo' && $row['isDone'] == 'No' && $row['isPicked'] == 'No'){?>
                        <!-- The Modal -->
                        <div class="modal fade" id="myModalView<?= $row['RequestID'];?>">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h5>Alumni Information</h5>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="modal-body">
                                    <?= form_open('markforpickup/'.$row['RequestID']);?>
                                        <h6><strong class="modalstyle">Name: </strong> <?= $row['FullName'];?></h5><br>
                                        <strong>Address: </strong><?= $row['FullAddress'];?><br>                                        
                                        <strong>Batch: </strong><?= $row['Batch'];?><br>
                                        <strong>Contact: </strong><?= $row['Contact'];?><br>
                                        <strong>Email: </strong><?= $row['Email'];?><br>
                                    </div>
                                
                                    <div class="modal-footer">
                                            <button type="submit" name="admitcollege" class="nav-link btn btn-success">For Pick-up</button>
                                    <?= form_close();?>
                                    </div>                                   
                                    
                                </div>
                            </div>
                        </div>
                        <!-- END OF MODAL -->
                        <?php }?>







                        <?php if($row['RequestWhat'] == 'Alumni Photo' && $row['isDone'] == 'Yes' && $row['isPicked'] == 'No'){?>
                        <!-- The Modal -->
                        <div class="modal fade" id="myModalView<?= $row['RequestID'];?>">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h5>Alumni Information</h5>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="modal-body">
                                    <?= form_open('markdone/'.$row['RequestID']);?>
                                        <h6><strong class="modalstyle">Name: </strong> <?= $row['FullName'];?></h5><br>
                                        <strong>Address: </strong><?= $row['FullAddress'];?><br>                                        
                                        <strong>Batch: </strong><?= $row['Batch'];?><br>
                                        <strong>Contact: </strong><?= $row['Contact'];?><br>
                                        <strong>Email: </strong><?= $row['Email'];?><br>
                                    </div>
                                
                                    <div class="modal-footer">
                                    
                                            <button type="submit" name="admitcollege" class="nav-link btn btn-success">Mark Done</button>
                                    <?= form_close();?>
                                    </div>                                   
                                    
                                </div>
                            </div>
                        </div>
                        <!-- END OF MODAL -->
                        <?php }?>














                        <!-- FOR PICK-UP -->
                        <?php if($row['isDone'] == 'Yes' && $row['isPicked'] == 'No'){?>
                        <!-- The Modal -->
                        <div class="modal fade" id="myModalView<?= $row['RequestID'];?>">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h5>Alumni Information</h5>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="modal-body">
                                    <?= form_open('markdone/'.$row['RequestID']);?>
                                        <h6><strong class="modalstyle">Name: </strong> <?= $row['FullName'];?></h5><br>
                                        <strong>Address: </strong><?= $row['FullAddress'];?><br>                                        
                                        <strong>Student Number: </strong><?= $row['Studentno'];?><br>
                                        <strong>Emergency Contact Person: </strong><?= $row['ContactPerson'];?><br>
                                        <strong>Relationship: </strong><?= $row['Relationship'];?><br>
                                        <strong>Contact: </strong><?= $row['Contact'];?><br>
                                        <strong>ID Case: </strong><?php if($row['IdCase'] == 'Yes'){echo '<p class="btn btn-sm btn-success">Availed</p>';}else{echo '<p class="btn btn-sm btn-danger">Not Availed</p>';}?><br>  
                                        <strong>Lanyard: </strong><?php if($row['Lanyard'] == 'Yes'){echo '<p class="btn btn-sm btn-success">Availed</p>';}else{echo '<p class="btn btn-sm btn-danger">Not Availed</p>';}?><br>    
                                        <strong>Request Date: </strong><?= $row['DateRequest'];?><br>   
                                        <strong>Claim Date: </strong><?= $row['DateofPick'];?><br>                           
                                    </div>
                                
                                    <div class="modal-footer">
                                    
                                            <button type="submit" name="admitcollege" class="nav-link btn btn-success">Mark Done</button>
                                    <?= form_close();?>
                                    </div>                                   
                                    
                                </div>
                            </div>
                        </div>
                        <!-- END OF MODAL -->
                        <?php }?>









                        <!-- FOR MAKING -->
                        <?php if($row['isDone'] == 'No' && $row['isPicked'] == 'No'){?>
                        <!-- The Modal -->
                        <div class="modal fade" id="myModalView<?= $row['RequestID'];?>">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h5>Alumni Information</h5>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="modal-body">
                                    <?= form_open('markforpickup/'.$row['RequestID']);?>
                                        <h6><strong class="modalstyle">Name: </strong> <?= $row['FullName'];?></h5><br>
                                        <strong>Address: </strong><?= $row['FullAddress'];?><br>                                        
                                        <strong>Student Number: </strong><?= $row['Studentno'];?><br>
                                        <strong>Emergency Contact Person: </strong><?= $row['ContactPerson'];?><br>
                                        <strong>Relationship: </strong><?= $row['Relationship'];?><br>
                                        <strong>Contact: </strong><?= $row['Contact'];?><br>
                                        <strong>ID Case: </strong><?php if($row['IdCase'] == 'Yes'){echo '<p class="btn btn-sm btn-success">Availed</p>';}else{echo '<p class="btn btn-sm btn-danger">Not Availed</p>';}?><br>  
                                        <strong>Lanyard: </strong><?php if($row['Lanyard'] == 'Yes'){echo '<p class="btn btn-sm btn-success">Availed</p>';}else{echo '<p class="btn btn-sm btn-danger">Not Availed</p>';}?><br>    
                                        <strong>Request Date: </strong><?= $row['DateRequest'];?><br>   
                                        <strong>Claim Date: </strong><?= $row['DateofPick'];?><br>                           
                                    </div>
                                
                                    <div class="modal-footer">
                                    
                                            <button type="submit" name="admitcollege" class="nav-link btn btn-success">For Pick-up</button>
                                    <?= form_close();?>
                                    </div>                                   
                                    
                                </div>
                            </div>
                        </div>
                        <!-- END OF MODAL -->
                        <?php }?>


                        <!-- The Modal -->
                        <div class="modal fade" id="myModalDelete<?= $row['RequestID'];?>">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h5>Confirmation</h5>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        Are you sure to delete this request?
                                    <div class="modal-footer">
                                    <?= form_open('deleterequest/'.$row['RequestID']); ?>
                                        <button name="delete" class="btn btn-danger" type="submit">Delete</button>
                                    <?= form_close(); ?>
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
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
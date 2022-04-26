<div class="main">

    <?php
        if($this->session->flashdata('offenseadded') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> Offense Added to the student
        </div>';
        }

        if($this->session->flashdata('offenseclosed') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> Offense has been CLosed
        </div>';
        }

        if($this->session->flashdata('pdfuploaded') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> PDF has been uploaded
        </div>';
        }

        if($this->session->flashdata('offensedeleted') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> Offense has been deleted
        </div>';
        }


        
    ?>

    <div class="container">


        <h1>Senior High - <?= $info['FullName'];?></h1>
        <table class="table table-borderless table-sm">
            <tr>
                <td>
                    <h6>Student Number: <strong><?= $info['extension'].$info['StudentNo'];?></strong></h6>
                </td>
                <td>
                    <h6>Section: <strong><?= $info['Section'];?></strong></h6>
                </td>
            </tr>
            <tr>
                <td>
                    <h6>Strand: <strong><?= $info['Strand'];?></strong></h6>
                </td>
                <td>
                    <h6>Level: <strong><?= $info['Level'];?> / <?= $info['Semester'];?></strong></h6>
                </td>
            </tr>
            <tr>
                <td>
                    <h6>Address: <strong><?= $info['Address'];?></strong></h6>
                </td>
                <td>
                    
                </td>
            </tr>
            <tr>
                <td>
                    <h6><?= $info['RelationG1'];?>: <strong><?= $info['Guardian1'];?></strong></h6>
                    <h6>Contact: <?= $info['ContactG1'];?></h6>
                </td>
                <?php if(!empty($info['RelationG2'])){ ?>
                    <td>
                        <h6><?= $info['RelationG2'];?>: <strong><?= $info['Guardian2'];?></strong></h6>
                        <h6>Contact: <?= $info['ContactG2'];?></h6>
                    </td>
                <?php }?>    
            </tr>
            <tr>
                
                <td>
                </td>
            </tr>
        </table>
    

        <h4>Log Offenses</h4>
        <?= form_open_multipart("addoffenseshs/".$info['admissionID']);?>
        <div class="container container-fluid" style="margin-top: 1%;">
            <div class="row">
                <div class="col-lg-2">
                    <label for="offense">Offense Level:</label>
                    <select name="offense" class="form-control form-control-sm" required>
                        <option value="">Select Offense</option>
                        <option value="Minor">Minor</option>
                        <option value="Major">Major</option>
                    </select>
                </div>

                <div class="col-lg-2">
                    <label for="sunction">Sunction:</label>
                    <select name="sunction" class="form-control form-control-sm" required>
                        <option value="">Select Sunction</option>
                        <option value="Verlbal">Verlbal</option>
                        <option value="Writen Warning">Writen Warning</option>
                        <option value="Benching">Benching</option>
                        <option value="Suspension">Suspension</option>
                        <option value="Dismisal">Dismisal</option>
                        <option value="Expultion">Expultion</option>
                    </select>
                </div>


                <div class="form-group col-4">
                    <label for="mm">Date Happened:</label>
                    <div class="row">
                        <div class="col-4">
                            <select name="mm" class="form-control form-control-sm" required>
                                <option value="" selected>MM</option>
                                <option value="01">January</option>
                                <option value="02">February</option>
                                <option value="03">March</option>
                                <option value="04">April</option>
                                <option value="05">May</option>
                                <option value="06">June</option>
                                <option value="07">July</option>
                                <option value="08">August</option>
                                <option value="09">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>
                        </div>/

                        <div class="col-3">
                            <select name="dd" class="form-control form-control-sm" required>
                                <option value="" selected>DD</option>
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                                <option value="06">06</option>
                                <option value="07">07</option>
                                <option value="08">08</option>
                                <option value="09">09</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                                <option value="31">31</option>
                            </select>
                        </div>/
                        <div class="col-4">
                            <select name="yy" class="form-control form-control-sm" required>
                                <option value="2021" selected>2021</option>
                            </select>
                        </div>
                    </div>


                    
                </div>

                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="labelstyle" for="labcom">Upload Supporting Documents (PDF)</label>
                        <input type="file" name="file" id="file">
                    </div> 
                </div>
                
            </div>

            

            <div class="row align-items-center">

                <div class="col-4">
                    <label for="comment">Case:</label>
                    <textarea name="case" class="form-control" rows="2" id="comment"></textarea>
                </div>
                
                <div class="col-4">
                    <label for="comment">Reason:</label>
                    <textarea name="reason" class="form-control" rows="2" id="comment"></textarea>
                </div>

                <div class="col-4">
                    <button type="submit" class="btn btn-success btn-lg">Save Offense</button>
                </div>

            </div>
        </div>
        <?= form_close();?>
        
        


        <br>

        <h4>Offenses</h4>

    <div class="input-group mb-3">
        <input name="searchEvaluated" type="text" id="myInput" class="form-control" placeholder="Search" aria-label="Recipient's username" aria-describedby="basic-addon2">
        <div class="input-group-append">
            <button name="searchstudent" class="btn btn-primary" type="button"><span class="fa fa-search"></span></button>
        </div>
    </div>
        
    <div style="overflow-y:scroll;width:100%;height:550px">
        <table class="table table-bordered table-hover table-sm">
           <thead>
                    <tr>
                        <th>Offense</th>
                        <th>Case</th>
                        <th>Reason</th>
                        <th>Sunction</th>
                        <th>Date Happened</th>
                        <th>Date Logged</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
            </thead>
            <tbody id="myTable">
                <?php
                    $Aid = $info['admissionID'];
                    $query = $this->db->query("select * from offenses where Student = '$Aid' and dpt = 'Seniorhigh' ");
                    
                    foreach($query->result_array() as $row){
                    ?>
                    <tr class="<?php if($row['Status'] == 'Unclosed'){echo 'alert-danger';}elseif($row['Status'] == 'Closed'){echo 'alert-success';} ?>">
                        <td><?= $row['Offense'];?></td>
                        <td><?= $row['Case'];?></td>
                        <td><?= $row['Reason'];?></td>
                        <td><?= $row['Sunction'];?></td>
                        <td><?= $row['DateHappened'];?></td>
                        <td><?= $row['DateLogged'];?></td>
                        <td><?= $row['Status'];?></td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a type="button" data-toggle="modal" data-target="#myModalClose<?= $row['offenseID'];?>"  class="btn btn-outline-primary" data-toggle="tooltip" title="Edit"><span class="far fa-handshake"></span></a>
                                <a type="button" data-toggle="modal" data-target="#myModalDelete<?= $row['offenseID'];?>"  class="btn btn-outline-danger" data-toggle="tooltip" title="Delete"><span class="far fa-trash-alt"></span></a>
                                <?php 
                                    $filename = "./podfiles/".$row['offenseID'].".pdf";
                                if(file_exists($filename)){ ?>
                                    <a type="button" data-toggle="modal" data-target="#myModalview<?= $row['offenseID'];?>"  class="btn btn-outline-success" data-toggle="tooltip" title="View"><span class="fas fa-glasses"></span></a>
                                <?php }else{ ?>
                                    <a type="button" data-toggle="modal" data-target="#myModalupload<?= $row['offenseID'];?>"  class="btn btn-outline-secondary" data-toggle="tooltip" title="Upload"><span class="fas fa-file-alt"></span></a>
                                <?php }?>
                                
                            </div>
                        </td>


                        <!-- The Modal -->
                        <div class="modal fade" id="myModalupload<?= $row['offenseID'];?>">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h5>Upload File on this Case</h5>
                                            
                                        </div>
                                        <?= form_open_multipart('uploadpdfshs/'.$row['offenseID'].'/'.$info['admissionID']); ?>

                                        <!-- Modal body -->
                                        <div class="modal-body">
                                        
                                            <h3>Case: <?= $row['Case'];?></h3>

                                            <div class="form-group">
                                                <label class="labelstyle" for="labcom">Upload Supporting Documents (PDF)</label>
                                                <input type="file" name="file" id="file">
                                            </div> 
                                    
                                        <div class="modal-footer">
                                        
                                            <button name="delete" class="btn btn-primary" type="submit">Upload</button>
                                        <?= form_close(); ?>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END OF MODAL -->



                        <!-- The Modal -->
                        <div class="modal fade" id="myModalClose<?= $row['offenseID'];?>">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h5>CONFIRMATION</h5>
                                            
                                        </div>
                                        <!-- Modal body -->
                                        <div class="modal-body">

                                            <h5>Mark this case <strong><?= $row['Case'];?></strong> as Closed??</h5>
                                    
                                        <div class="modal-footer">
                                        <?= form_open('caseclosedshs/'.$row['offenseID'].'/'.$info['admissionID']); ?>
                                            <button name="delete" class="btn btn-primary" type="submit">Close the Case</button>
                                        <?= form_close(); ?>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END OF MODAL -->



                        <!-- The Modal -->
                        <div class="modal fade" id="myModalDelete<?= $row['offenseID'];?>">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h5>CONFIRMATION</h5>
                                            
                                        </div>
                                        <!-- Modal body -->
                                        <div class="modal-body">
                                        
                                            Are you sure to delete this offense?</strong>
                                    
                                        <div class="modal-footer">
                                        <?= form_open('deleteoffenseshs/'.$row['offenseID'].'/'.$info['admissionID']); ?>
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
                        <div class="modal fade" id="myModalview<?= $row['offenseID'];?>">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h5>CONFIRMATION</h5>
                                            
                                        </div>
                                        <!-- Modal body -->
                                        <div class="modal-body">

                                            <object data="<?= base_url();?>podfiles/<?= $row['offenseID'];?>.pdf" type="application/pdf" width="100%" height="500">
                                                
                                            </object>
                                    
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END OF MODAL -->

                    </tr>
                    <?php }?>
            </tbody>
        </table>
    </div>


















    </div>



</div>


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
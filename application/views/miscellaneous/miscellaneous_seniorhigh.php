<div class="main">
    <?php
        if($this->session->flashdata('SeniorhighMiscellaneous_Added') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> Miscellaneous successfully added. 
        </div>';
        }

        if($this->session->flashdata('SeniorhighMiscellaneous_Updated') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> Miscellaneous successfully updated. 
        </div>';
        }
        
        if($this->session->flashdata('SeniorhighMiscellaneous_Deleted') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> Miscellaneous successfully removed. 
        </div>';
        }
    ?>
    <h1>Miscellaneous Management - Senior High</h1>

    <div class="container container-fluid" style="margin-top: 1%;">
        <div class="row">
            <div class="col-lg-4">
                <?= form_open('addSeniorhighMiscellaneous')?>
                    <div class="form-group">
                        <label for="misc">Miscellaneous Name:</label>
                        <input name="misc" type="text" class="form-control" placeholder="Miscellaneous Name" id="misc" required>
                    </div>
                    <div class="form-group">
                        <label for="other">Other:</label>
                        <input name="other" type="text" class="form-control" placeholder="Other Fees" id="other" required>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="amount">Amount</label>
                            <input name="amount" type="decimals" class="form-control" placeholder="Amount" id="amount" required>
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="for">For:</label>
                            <select name="for" class="form-control" required>
                                <option value="none" selected>Select Grade</option>
                                <option value="GRADE 11">GRADE 11</option>
                                <option value="GRADE 12">GRADE 12</option>
                            </select>
                        </div>
                        
                        <div class="form-group col-lg-6">
                            <label for="sy">School Year:</label>
                            <select name="sy" class="form-control" required>
                                <option value="">School Year</option>
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
                    </div>
                    <div class="form-group col-lg-8">
                        <button type="submit" class="btn btn-success" id="save" value="save" name="save"><span class="fas fa-plus"></span> Add Miscellaneous</button>
                    </div>
                <?= form_close(); ?>
            </div>
            <div class="col-lg-8">
                <div style="overflow-y:scroll;width:100%;height:500px">  
                    <table class="table table-bordered table-hover table-sm" bordered="1">  
                        <thead class="sticky-top bg-white">
                            <tr> 
                                <th>Miscellaneous ID</th>
                                <th>Miscellaneous</th>
                                <th>Other</th>
                                <th>Amount</th>
                                <th>For</th>
                                <th>School Year File</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($miscellaneousSeniorhigh as $row){?>
                            <tr> 
                                <td><?= $row['miscID'];?></td>
                                <td><?= $row['Miscellaneous'];?></td>
                                <td><?= $row['other'];?></td>
                                <td><?= $row['Amount'];?></td>
                                <td><?= $row['forwhat'];?></td>
                                <td><?= $row['syfile'];?></td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a type="button" data-toggle="modal" data-target="#myModalEdit<?= $row['miscID'];?>"  class="btn btn-outline-primary" data-toggle="tooltip" title="Edit"><span class="far fa-edit"></span></a>
                                        <a type="button" data-toggle="modal" data-target="#myModalDelete<?= $row['miscID'];?>"  class="btn btn-outline-danger" data-toggle="tooltip" title="Delete"><span class="far fa-trash-alt"></span></a>
                                    </div>

                                    <!-- The Modal -->
                            <div class="modal fade" id="myModalEdit<?= $row['miscID'];?>">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h5>Edit Miscellaneous Name : <?= $row['Miscellaneous'];?></h5>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                <?= form_open('updateSeniorhighMiscellaneous/'.$row['miscID']);?>
                                                    <div class="form-group">
                                                        <label for="lname">Miscellaneous: </label>
                                                        <input value="<?= $row['Miscellaneous'];?>" name="Miscellaneous" type="text" class="form-control form-control-sm" id="miscellaneous" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="other">Other:</label>
                                                        <input value="<?= $row['other'];?>" name="other" type="text" class="form-control" placeholder="Other Fees" id="other" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="fname">Amount:</label>
                                                        <input value="<?= $row['Amount'];?>" name="Amount" type="text" class="form-control form-control-sm" id="amount" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="for">For:</label>
                                                        <select name="for" class="form-control" required>
                                                            <option value="<?= $row['forwhat'];?>" selected><?= $row['forwhat'];?></option>
                                                            <option value="GRADE 11">GRADE 11</option>
                                                            <option value="GRADE 12">GRADE 12</option>                                                          
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="syfile">School Year:</label>
                                                        <select name="syfile" class="form-control" required>
                                                            <option value="<?= $row['syfile'];?>" selected><?= $row['syfile'];?></option>
                                                            <option value="2021-2022">2021-2022</option>
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
                                <div class="modal fade" id="myModalDelete<?= $row['miscID'];?>">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h5>CONFIRMATION</h5>
                                                    
                                                </div>
                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                
                                                    Are you sure to delete <strong><?= $row['Miscellaneous'];?></strong>
                                            
                                                <div class="modal-footer">
                                                <?= form_open('deleteSeniorhighMiscellaneous/'.$row['miscID']); ?>
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
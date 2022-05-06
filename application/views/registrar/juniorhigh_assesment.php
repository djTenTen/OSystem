<div class="container-fluid">
    <?php

        if($this->session->flashdata('CollegeAssess') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> Student successfully Assessed. 
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
    <h1>Junior High Assesment</h1>
    <div class="container">

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
                <label for="dpt">Section: </label>
                <input name="dpt" type="text" value="<?= $section;?>" class="form-control form-control-sm" placeholder="Department" id="dpt" readonly>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-lg-6">
                <label for="address">Address: </label>
                <input name="address" type="text" value="<?= $address;?>" class="form-control form-control-sm" placeholder="Address" id="address" readonly>
            </div>
        </div>
    

        <br>
        <h6>Total Subjects: <?= $subjectcnt?></h6>
        <h6>Total Hours: <?= $subjecthrs?></h6>
        <div style="overflow-y:scroll;width:100%;height:550px">
           
            <table class="table table-bordered table-hover table-sm" style="margin-top: 1%;">
                <thead class="sticky-top bg-white">
                    <tr>
                        <th>Subject Code</th>
                        <th>Subject Description</th>
                        <th>Day</th>
                        <th>Time</th>
                        <th>Prof</th>
                        
                    </tr>
                </thead>
                <tbody>
                <?php foreach($studentsSubject as $subjects){?>
                    <tr>                   
                        <td><?= $subjects['subjectCode']?></td>
                        <td><?= $subjects['SubjectDesc']?></td>
                        <td><?= $subjects['Day']?></td>
                        <td><?= $subjects['Time']?></td>
                        <td><?= $subjects['FullName']?></td>
                    </tr>
                <?php }?>
                </tbody>
            </table>
        </div>
        <br>
        <h6>ASSESSMENT</h6>

        <div class="row">
            <div class="col-lg-3">
                <div style="overflow-y:scroll;width:100%;height:550px">
                    <h6>Miscellaneous Fee</h6>
                    <table class="table table-bordered table-striped" style="margin-top: 1%;">
                        <tbody>
                        <?php foreach($juniorMisc as $subjects){?>
                            <tr>
                                <td><?= $subjects['Miscellaneous']?></td>
                                <td><?= $subjects['Amount']?></td>
                            </tr>
                        <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-lg-3">
                <div style="overflow-y:scroll;width:100%;height:550px">
                    <h6>Other Fee</h6>
                    <table class="table table-bordered table-striped" style="margin-top: 1%;">
                        <tbody>
                        <?php foreach($juniorhighothermisc as $subjects){?>
                            <tr>
                                <td><?= $subjects['other']?></td>
                                <td><?= number_format($subjects['Amount'], 2, ".", ",");?></td>
                            </tr>
                        <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-lg-5">
                <table class="table">
                    <tbody>
                        <tr>
                            <td style="text-align: right; width: 110px;">Tuition Fee: </td>
                            <td style="text-align: right; width: 110px;"><?= number_format($TFee, 2, ".", ",");?></td>
                        </tr>
                        <tr>
                            <td style="text-align: right; width: 110px;">Total Miscellaneous Fee: </td>
                            <td style="text-align: right; width: 110px;"><?= number_format($MiscFee, 2, ".", ",");?></td>
                        </tr>
                        <tr>
                            <td style="text-align: right; width: 110px;">Total Other Fee: </td>
                            <td style="text-align: right; width: 110px;"><?= number_format($otherMiscFee, 2, ".", ",");?></td>
                        </tr>
                        <tr>
                            <td style="text-align: right; width: 110px;"><strong>TOTAL ASSESSMENT:</strong></td>
                            <td style="text-align: right; width: 110px;"><strong><?= number_format($MiscFee + $TFee + $otherMiscFee, 2, ".", ",");?></strong></td>
                        </tr>
                    </tbody>
                </table>
                <br><br><br>
                <div class="container">
                    <a type="button" data-toggle="modal" data-target="#myModalAsses" class="btn btn-success btn-block"><span class="fas fa-cogs"></span> Assess Student</a>
                    <br>
                    <?= form_open('juniorhigh');?>
                            <button type="submit" name="admitcollege" class="btn btn-primary btn-block"><span class="fas fa-arrow-circle-left"></span> Go Back</button>
                    <?= form_close();?>
                    <!-- The Modal -->
                    <div class="modal fade" id="myModalAsses">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h5>Confirmation</h5>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    Are you sure to Asses <strong><?= $fullname;?></strong>,
                                    this will be sent to Cashier for payment
                                    <?= form_open('assesstudentJuniorhigh/'.$admissionID);?>
                                    <!-- <br>
                                    <br>
                                    <div class="form-group">
                                        <label>Mode of Payment:</label>
                                        <select name="modepayment" class="form-control form-control-sm" required>                                                       
                                            <option value="Installment" selected>Installment</option>
                                            <option value="Cash">Cash</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Down Payment:</label>
                                        <input name="downpayment" type="text" class="form-control form-control-sm" maxlength="6" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
                                    </div> -->
                                    <div class="form-group">
                                        <label>Discount:</label>
                                        <select name="discount" class="form-control form-control-sm" required>                                                       
                                            <?php foreach($discounts as $disc){?>
                                                <option value="<?= $disc['discountPercent'];?>"><?= $disc['discountName'].'  (Php '.$disc['discountPercent'].' discount)';?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="admitcollege" class="nav-link btn btn-primary">Yes</button>
                                    <?= form_close();?>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <!-- END OF MODAL -->
                </div>

            </div>

           
        </div>
        
        

        
    
    
    
    
    </div>
























</div>
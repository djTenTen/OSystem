<div class="container-fluid">

    <?= form_open("exportvisitors");?>
        <div class="form-inline form-control-sm">

            <div class="form-group col-lg-2">
                <select name="category" id="category" class="custom-select" required>
                    <option value="" selected>Select Category</option>
                    <option value="STUDENT">Student</option>
                    <option value="EMPLOYEE">Employee</option>
                    <option value="CLIENT">Client/Visitor</option>
                </select>
            </div> 
            <div class="form-group col-lg-5">
                    <!-- <label for="email">Range Date From:</label>
                    <input type="text" class="form-control form-control-sm" placeholder="mm/dd/yyyy" id="date1" name="date1" style="text-transform:uppercase;" required> -->
                    <label for="type">Range Date From:</label>
                    <select name="mm" class="form-control form-control-sm col-2" required>
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
                    </select>/
                    <select name="dd" class="form-control form-control-sm col-2" required>
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
                    </select>/
                    <select name="yy" class="form-control form-control-sm col-2" required>
                        <option value="2021">2021</option>
                        <option value="2022" selected>2022</option>
                        <option value="2023">2023</option>
                    </select>
            </div>
            <div class="form-group col-lg-5">
                <label for="email">To:</label>
                <select name="mm2" class="form-control form-control-sm col-2" required>
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
                    </select>/
                    <select name="dd2" class="form-control form-control-sm col-2" required>
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
                    </select>/
                    <select name="yy2" class="form-control form-control-sm col-2" required>
                        <option value="2021">2021</option>
                        <option value="2022" selected>2022</option>
                        <option value="2023">2023</option>
                    </select>
                    <button type="submit" name="export" id="export" class="btn btn-success btn-sm">Export</button>
            </div>
            
        </div>
    <?= form_close();?>
    <br>
    <div style="overflow-y:scroll;width:100%;height:550px">        
        <table class="table table-bordered table-hover table-sm">
        <thead class="sticky-top bg-white">
        <tr>
            <th>log ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Date</th>
            <th>Time</th>
            <th>Contact</th>
            <th>Temp Reading</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($visitors as $row){?>
            <tr class="<?php if($row['isFacetoFace'] == "Yes" || $row['isDirectCare'] == "Yes" || $row['isTravelled'] == "Yes" || $row['Cough'] == "Yes" || $row['Fever'] == "Yes" || $row['Colds'] == "Yes" || $row['Body'] == "Yes" || $row['Sorethroath'] == "Yes" || $row['Breathing'] == "Yes" || $row['Diarrhea'] == "Yes" || $row['Smell'] == "Yes" || $row['Taste'] == "Yes"){echo "alert-danger";}?>">
                <td><?= $row['logID'];?></td>
                <td><?= $row['Name'];?></td>
                <td><?= $row['Address'];?></td>
                <td><?= $row['Date'];?></td>
                <td><?= $row['Timeofvisit'];?></td>
                <td><?= $row['Contact'];?></td>
                <td><?= $row['Temperature1'].' / '. $row['Temperature2'];?></td>
                <td>
                    <button type="submit" class="btn btn-sm btn-outline-success" data-toggle="modal" data-target="#myModalMarkEnrolled<?= $row['logID'];?>" data-toggle="tooltip" title="Mark Enrolled"> <span class="far fa-eye"></span></button>
                    <!-- The Modal -->
                    <div class="modal fade" id="myModalMarkEnrolled<?= $row['logID'];?>">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h5><?= $row['Name'];?></h5>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    
                                    <table class="table table-sm table-borderless">
                                        <tbody>
                                            <tr>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        Have you had face-to-face contact with a probable or 
                                                        confirmed COVID-19 case within 1 meter 
                                                        and for more than 15 minutes for the past 14 days?
                                                    </label>
                                                    <?php if($row['isFacetoFace'] == "Yes"){ echo '<button type="button" class="btn btn-danger btn-sm">YES</button>';}else{echo '<button type="button" class="btn btn-success btn-sm">NO</button>';}?>
                                                </div>
                                            </tr>
                                            <tr>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                    <div class="dropdown-divider"></div>
                                                        Have you provided direct care for a patient with probable or 
                                                        confirmed COVID-19 case without using proper personal 
                                                        protective equipment for the past 14 days?
                                                    </label>
                                                    <?php if($row['isDirectCare'] == "Yes"){ echo '<button type="button" class="btn btn-danger btn-sm">YES</button>';}else{echo '<button type="button" class="btn btn-success btn-sm"">NO</button>';}?>
                                                </div>
                                            </tr>
                                            <tr>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                    <div class="dropdown-divider"></div>
                                                        Have you travelled outside the Philippines in the last 14 days?
                                                    </label>
                                                    <?php if($row['isTravelled'] == "Yes"){ echo '<button type="button" class="btn btn-danger btn-sm">YES</button>';}else{echo '<button type="button" class="btn btn-success btn-sm"">NO</button>';}?>
                                                    <div class="dropdown-divider"></div>
                                                </div>
                                            </tr>

                                            <tr>
                                                
                                                Cough : <?php if($row['Cough'] == "Yes"){ echo '<button type="button" class="btn btn-danger btn-sm">YES</button>';}else{echo '<button type="button" class="btn btn-success btn-sm"">NO</button>';}?> <br>                                                                                                                            
                                                Fever : <?php if($row['Fever'] == "Yes"){ echo '<button type="button" class="btn btn-danger btn-sm">YES</button>';}else{echo '<button type="button" class="btn btn-success btn-sm"">NO</button>';}?>     <br>                                      
                                                Colds : <?php if($row['Colds'] == "Yes"){ echo '<button type="button" class="btn btn-danger btn-sm">YES</button>';}else{echo '<button type="button" class="btn btn-success btn-sm"">NO</button>';}?>         <br>                                                                 
                                                Body Pains : <?php if($row['Body'] == "Yes"){ echo '<button type="button" class="btn btn-danger btn-sm">YES</button>';}else{echo '<button type="button" class="btn btn-success btn-sm"">NO</button>';}?>         <br>                                             
                                                Sore Throat : <?php if($row['Sorethroath'] == "Yes"){ echo '<button type="button" class="btn btn-danger btn-sm">YES</button>';}else{echo '<button type="button" class="btn btn-success btn-sm"">NO</button>';}?>     <br>                                                                
                                                Difficulty in Breathing : <?php if($row['Breathing'] == "Yes"){ echo '<button type="button" class="btn btn-danger btn-sm">YES</button>';}else{echo '<button type="button" class="btn btn-success btn-sm"">NO</button>';}?><br>
                                                Diarrhea : <?php if($row['Diarrhea'] == "Yes"){ echo '<button type="button" class="btn btn-danger btn-sm">YES</button>';}else{echo '<button type="button" class="btn btn-success btn-sm"">NO</button>';}?><br>
                                                Loss of Sense of Smell : <?php if($row['Smell'] == "Yes"){ echo '<button type="button" class="btn btn-danger btn-sm">YES</button>';}else{echo '<button type="button" class="btn btn-success btn-sm"">NO</button>';}?><br>
                                                Loss of Sense of Taste : <?php if($row['Taste'] == "Yes"){ echo '<button type="button" class="btn btn-danger btn-sm">YES</button>';}else{echo '<button type="button" class="btn btn-success btn-sm"">NO</button>';}?>
                                                        
                                            </tr>
                                        </tbody>
                                    </table>
                                    

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        <?php }?>
        </tbody>
        </table>
    </div>
</div>
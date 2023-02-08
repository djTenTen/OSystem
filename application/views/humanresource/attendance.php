<div class="container-fluid">

    
    <?= form_open('empattendance');?>
    <div class="m-2 row">

        <div class="form-group col-4">
            <label for="dpt">Department:</label>
            <select name="dpt" class="form-control form-control-sm" required>
                <option value="" selected>Select Department</option>
                <option value="Office of the President" >Office of the President</option>
                <option value="Academic Affairs" >Academic Affairs</option>
                <option value="Student Affairs and Services" >Student Affairs and Services</option>
                <option value="Finance & Admin" >Finance & Admin</option>
                <option value="Management Information System" >Management Information System</option>
                <option value="Multimedia" >Multimedia</option>
                <option value="Internal Security" >Internal Security</option>
                <option value="Office of the VPAA" >Office of the VPAA</option>
                <option value="Accademic Affairs - College" >Accademic Affairs - College</option>
                <option value="Accademic Affairs - Senior High" >Accademic Affairs - Senior High</option>
                <option value="Accademic Affairs - IBED" >Accademic Affairs - IBED</option>
                <option value="All" >All</option>
            </select>
        </div>

        <div class="form-group col-4">
            <label for="mm">Range Date From:</label>
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

        <div class="form-group col-4">
            <label for="mm2">To:</label>
            <div class="row">
                <div class="col-4">
                    <select name="mm2" class="form-control form-control-sm" required>
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
                    <select name="dd2" class="form-control form-control-sm" required>
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
                    <select name="yy2" class="form-control form-control-sm" required>
                        <option value="2021" selected>2021</option>
                    </select>
                </div>
            </div>
        
        </div>
    </div>

        <div class="form-group col-5">
            <div class="btn-group">
                <button name="viewattendance" value="viewattendance" type="submit" class="btn btn-success">View Attendance</button>
                <?= form_close();?>
                <?= form_open('exportattendance');?>
                    <button name="exportattendance" value="exportattendance" type="submit" class="btn btn-primary">Export Attendance</button>
                <?= form_close();?>
            </div>
        </div>
   


        <div style="overflow-y:scroll;width:100%;height:450px">    
                            
            <table class="table table-hover table-sm">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Time-in</th>
                    <th>Time-out</th>
                    <th>Duration</th>
                    <th>Remarks</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($attendance as $row){?>
                    <tr>
                        <td><?= $row['Name'];?></td>
                        <td><?= $row['Position'];?></td>
                        <td><?= $row['DateIN'].'-'.$row['TimeIN'];?></td>
                        <td><?= $row['DateOUT'].'-'.$row['TimeOUT'];?></td>
                        <td><?= $row['DurationH'].':'.$row['DurationM'];?></td>
                        <td><?= $row['Remarks'];?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>


</div>
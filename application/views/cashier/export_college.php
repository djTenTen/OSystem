<div class="main">

    <h1>Export list</h1>
    <div class="container row">
        <div class="col-lg-4 mt-4">
            <?= form_open("exportlistCollegePcourse");?>
            <div class="col-12">
                <label for="section">Course :</label>
                    <select name="courseID" class="form-control form-control-sm col-lg-12" required>
                    <option value="" selected>Select Course</option>
                    <?php foreach($courses as $row){?>
                        <option value="<?= $row['CourseID'];?>"><?= $row['CourseDesc'];?></option>
                    <?php }?>
                    </select>
            </div>

            <div class="col-12">
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

            <div class="col-12">
                <label for="sem">Semester:</label>
                <select name="sem" class="form-control form-control-sm" required>
                    <option value="">Select Semester</option>
                    <option value="1st Sem">1st Sem</option>
                    <option value="2nd Sem">2nd Sem</option>
                    <option value="Summer">Summer</option>
                </select>
            </div>
            <button name="export" class="btn btn-primary mt-3" type="submit"><span class=""></span>Export</button>
            <?= form_close();?>
            <?= form_open("exportlistCollegePcourse");?>
                <button name="export" class="btn btn-primary mt-3" type="submit"><span class=""></span>Export today's Enrollee</button>
            <?= form_close();?>


        </div>
        <div class="col-lg-4 mt-4">
           
        </div>
    </div>




</div>
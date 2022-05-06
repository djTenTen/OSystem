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

<div class="container-fluid">
    <h1>General Averag Rankings</h1>
    <div class="container container-fluid">
    <br><br>


        <div class="input-group mb-3">
            <input name="searchEvaluated" type="text" id="myInput" class="form-control" placeholder="Search Admission ID/Lastname" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button name="searchstudent" class="btn btn-primary" type="button"><span class="fa fa-search"></span></button>
            </div>
        </div>
        
        <div style="overflow-y:scroll;width:100%;height:440px">        
            <table class="table table-bordered table-hover table-sm sortable">
            <thead class="sticky-top bg-white">
                <tr>
                    <th>Admission ID</th>
                    <th>Name</th>
                    <th>Course</th>
                    <th>Year</th>
                    <th>Section</th>
                    <th>GWA</th>
                </tr>
            </thead>
            <tbody id="myTable">
                <?php foreach($College as $row){?>   
                    <tr class="item">
                        <td><?= $row['admissionID'];?></td>
                        <td><?= $row['FullName'];?></td>
                        <td><?= $row['CourseCode'];?></td>
                        <td><?= $row['Level'];?></td>
                        <td><?= $row['Section'];?></td>
                        <td>
                           <?php 

                                $checksy = $this->db->query("select schoolyear from sy where active = 'Yes'");
                                foreach($checksy->result() as $result){
                                    $sy = $result->schoolyear;
                                }
                                $sem = $row['Semester'];
                                $admissionID = $row['admissionID'];
                                // computing grade x subject unit
                                $gxsu = $this->db->query("select sum(Grade * units) as gxsu
                                from student_subject_college,subject_college
                                where student_subject_college.sy = '$sy'
                                and student_subject_college.semester = '1ST SEM'
                                and admissionNO = '$admissionID'
                                and subject_college.subjectID = student_subject_college.subjectID");
                                foreach($gxsu->result_array() as $value){
                                    $totalgxsu =  $value['gxsu'];
                                }
                                // computing total units
                                $computunits = $this->db->query("select Grade,sum(units) as compunits
                                from student_subject_college,subject_college
                                where student_subject_college.sy = '$sy'
                                and student_subject_college.semester = '1ST SEM'
                                and admissionNO = '$admissionID'
                                and subject_college.subjectID = student_subject_college.subjectID");
                                foreach($computunits->result_array() as $value){
                                    $Totatunits = $value['compunits'];
                                }

                                echo round($totalgxsu / $Totatunits,2);

                           ?>
                        </td>
                    </tr>
                <?php }?>
            </tbody>
            </table>
        </div>
    </div>

</div>


<div class="main">
<h1>Class List Senior High</h1>

    <div class="container container-fluid">
    <br><br>
    
        <div class="input-group mb-3">
            <input name="searchEvaluated" id="myInput" type="text" class="form-control" placeholder="Search Subject Code / Subject Description">
            <div class="input-group-append">
                <button name="searchstudent" class="btn btn-primary" type="button"><span class="fa fa-search"></span></button>
            </div>
        </div>
        
        <div style="overflow-y:scroll;width:100%;height:550px">        
            <table class="table table-bordered table-hover table-sm">
            <thead class="sticky-top bg-white">
                <tr>
                    <th>Subject Code</th>
                    <th>Subject Description</th>
                    <th>Strand</th>
                    <th>Year</th>
                    <th>Section</th>
                    <th>Sem</th>
                    <th>Schedule</th>
                    <th>Prof</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="myTable">
                <?php foreach($showClassListSeniorhigh as $row){
                    $sched = $row['subjectDesc'];
                    ?>   
                    <tr>
                        <td><?= $row['subjectCode'];?></td>
                        <td><?= $row['subjectDesc'];?></td>
                        <td><?= $row['Strand'];?></td>
                        <td><?= $row['year'];?></td>
                        <td><?= $row['Section'];?></td>
                        <td><?= $row['semester'];?></td>
                        <td><?= $row['Day'].' / '.$row['Time'];?></td>
                        <td><?= $row['FullName'];?></td>
                        <td>
                            <?= form_open('exportclasslistSeniorhigh/'.$row['curriculumID'].'/'.$row['subjectID'].'/'.$sched.'/'.$row['Strand'].'/'.$row['Section'].'/'.$row['year']);?>
                                <button type="submit" class="btn btn-outline-primary btn-sm" data-toggle="tooltip" title="Export"><span class="fas fa-print"></span></button>
                            <?= form_close();?>
                        </td>
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
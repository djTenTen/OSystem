<div class="main">

    <h1>Juniorhigh Schedule</h1>
    <div class="container container-fluid">

        <div class="input-group mb-3">
            <input name="searchcurriculum" id="myInput" type="text" class="form-control" placeholder="Search Course Code/ Course Description" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button name="searchValidated" class="btn btn-primary" type="button"><span class="fa fa-search"></span></button>
            </div>
        </div>

        <div style="overflow-y:scroll;width:100%;height:550px">
            <table class="table table-bordered table-hover table-sm" style="margin-top: 1%;">
                <thead class="sticky-top bg-white">
                <tr>
                    <th>Curriculum ID</th>
                    <th>Year</th>
                    <th>Section</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody id="myTable">
                    <?php foreach($curriculumJuniorhigh as $row){?>
                    <tr>
                        <td><?= $row['curriculumID'];?></td>
                        <td><?= $row['Year'];?></td>
                        <td><?= $row['Section'];?></td>
                        <td>
                            <a type="button" href="editScheduleJuniorhigh/<?= $row['curriculumID'];?>"  class="btn btn-outline-primary btn-sm" data-toggle="tooltip" title="Edit Schedule"><span class="far fa-edit"></span></a>
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
<div class="container-fluid">
<h1>Junior High Teachers</h1>

        <div class="input-group mb-3 mt-3">
            <input name="searchEvaluated" id="myInput" type="text" class="form-control" placeholder="Teacher Name">
            <div class="input-group-append">
                <button name="searchstudent" class="btn btn-primary" type="button"><span class="fa fa-search"></span></button>
            </div>
        </div>
        <div style="overflow-y:scroll;width:100%;height:400px">        
            <table class="table table-bordered table-hover table-sm">
            <thead class="sticky-top bg-white">
                <tr>
                    <th>Teacher ID</th>
                    <th>Teacher</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="myTable">
                <?php foreach($juniorhighProf as $row){?> 
                    
                    <tr>
                        <td><?= $row['Teacher'];?></td>
                        <td><?= $row['FullName'];?></td>
                        <td>
                            <a class="btn btn-outline-primary btn-sm" href="viewclasssubjectsjhs/<?= $row['Teacher'];?>" data-toggle="tooltip" title="View Subject list"><span class="fas fa-tasks"></span></a>
                        </td>
                    </tr>
                <?php }?>
            </tbody>
            </table>
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
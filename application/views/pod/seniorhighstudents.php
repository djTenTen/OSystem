<div class="main">
    <h1>Senior High Students</h1>

        <?= form_open('pod_seniorhigh');?>
            <div class="input-group mb-3">
                <input name="search" type="text" class="form-control" placeholder="Search Last Name, First Name" aria-label="Recipient's username" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button name="searchstudent" class="btn btn-primary" type="submit"><span class="fa fa-search"></span></button>
                </div>
            </div>
        <?= form_close();?>

        <div style="overflow-y:scroll;width:100%;height:450px">        
            <table class="table table-bordered table-hover table-sm">
            <thead class="sticky-top bg-white">
                <tr>
                    <th>Student Number</th>
                    <th>Name</th>
                    <th>Level & Strand</th>
                    <th>Section</th>
                    <th>Contact</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($students as $row){?>
                <tr>
                    <td><?= $row['extension'].$row['StudentNo'];?></td>
                    <td><?= $row['FullName'];?></td>
                    <td><?= $row['Level'].' - '.$row['Strand'];?></td>
                    <td><?= $row['Section'];?></td>
                    <td><?= $row['Contact'];?></td>
                    <td>
                        <div class="btn-group btn-group-sm">
                            <a class="btn btn-outline-success" data-toggle="tooltip" title="View" href="infostudentseniorhigh/<?= $row['admissionID'];?>"><span class="far fa-eye"></span></a>
                        </div>
                    </td>
                </tr>
            <?php }?>
            </tbody>
            </table>
        </div>


</div>
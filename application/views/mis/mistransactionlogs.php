<div class="main">
    <h1>Transaction Logs</h1>



        <?= form_open('request');?>
            <div class="input-group mb-3">
                <input name="search" type="text" class="form-control" placeholder="Search Last Name, First Name" aria-label="Recipient's username" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button name="searchstudent" class="btn btn-primary" type="submit"><span class="fa fa-search"></span></button>
                </div>
            </div>
        <?= form_close();?>

        <div style="overflow-y:scroll;width:100%;height:550px">        
            <table class="table table-bordered table-hover table-sm">
            <thead class="sticky-top bg-white">
                <tr>
                    <th>Logs</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($logs as $row){?>
                <tr>
                    <td><?= $row['Name'].' requested '.$row['Purpose'].' for '.$row['ofWhat'].' to '.$row['Where'].' with '.$row['Action'].' Action' ; ?></td>
                    <td><?php 
                    if($row['isDone'] == 'No'){echo '<p class="btn btn-sm btn-danger">Pending</p>';}
                    if($row['isDone'] == 'Yes'){echo '<p class="btn btn-sm btn-success">Done</p>';}  
                    ?></td>
                    <td><a type="button" data-toggle="modal" data-target="#myModalView<?= $row['TransactionID'];?>"  class="btn btn-outline-success btn-sm" data-toggle="tooltip" title="View"><span class="far fa-eye"></span></a></td>
                </tr>
            <?php }?>
            </tbody>
            </table>
        </div>
</div>
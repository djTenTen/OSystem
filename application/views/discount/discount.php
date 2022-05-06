
<div class="container-fluid">


    <?php 
        if($this->session->flashdata('added') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> Discount successfully added.
        </div>';
        }

        if($this->session->flashdata('updated') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> Discount successfully updated. 
        </div>';
        }
        
        if($this->session->flashdata('deleted') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> Discount successfully deleted. 
        </div>';
        }
    ?>

<h1>Discount Management</h1>


    <div class="container" style="margin-top: 1%">
        <div class="row">
            <div class="col-lg-3">
                <?= form_open('addDiscount');?>
                    
                    <div class="form-group">
                        <label class="labelstyle" for="subjectCode">Type: </label>
                        <input name="type" type="text" class="form-control  form-control-sm" style="text-transform:uppercase" placeholder="Discount Type" id="discounttype" required>
                    </div>

                    <div class="form-group">
                        <label class="labelstyle" for="subjectDesc">Name: </label>
                        <input name="name" type="text" class="form-control form-control-sm" placeholder="Discount Name" id="discountname" required>
                    </div>

                    <div class="form-group">
                        <label class="labelstyle" for="lec">Description: </label>
                        <input name="desc" type="decimals" class="form-control form-control-sm" style="text-transform:uppercase" placeholder="Desciption" id="description" required>
                    </div>

                    <div class="form-group">
                        <label class="labelstyle" for="labcom">Discount: </label>
                        <input name="discount" type="decimals" class="form-control form-control-sm" style="text-transform:uppercase" placeholder="Discount percent or amount" id="discount" required>
                    </div>

                    <div class="form-group">
                        <label for="sy">SY: </label>
                        <select name="sy" class="form-control form-control-sm" required>
                            <option value="">Semester: </option>
                            <option value="2021-2022" selected>2021-2022</option>
                            <option value="2022-2023">2022-2023</option>
                            <option value="2023-2024">2023-2024</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="sy">Department: </label>
                        <select name="dpt" class="form-control form-control-sm" required>
                            <option value="">Semester</option>
                            <option value="College">College</option>
                            <option value="Seniorhigh">Seniorhigh</option>
                            <option value="Juniorhigh">Juniorhigh</option>
                            <option value="Gradeschool">Gradeschool</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success" id="save" value="save" name="save"><span class="fas fa-plus"></span> Add Discount</button>

                <?= form_close();?>
            </div>

            <div class="col-lg-9">
                <?= form_open('discount');?>
                    <div class="input-group mb-3">
                        <input name="search" type="text" class="form-control" placeholder="Search Discount Type/Name/Description">
                        <div class="input-group-append">
                            <button name="searchsubjects" class="btn btn-primary" type="submit"><span class="fa fa-search"></span></button>
                        </div>
                    </div>
                <?= form_close();?>

                    <table class="table table-hover table-sm" bordered="1" id="datatable">  
                        <thead class="sticky-top bg-white">
                            <tr> 
                                <th>Discount ID</th>
                                <th>Type</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Discount</th>
                                <th>SY</th>
                                <th>Department</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($discount as $row){?>
                            <tr>
                                <td><?= $row['discountID'];?></td>
                                <td><?= $row['discountType'];?></td>
                                <td><?= $row['discountName'];?></td>
                                <td><?= $row['discountDesc'];?></td>
                                <td><?= $row['discountPercent'];?></td>
                                <td><?= $row['syfile'];?></td>
                                <td><?= $row['ForWhat'];?></td>
                                <td>

                                <div class="btn-group btn-group-sm">
                                    <a type="button" data-toggle="modal" data-target="#myModalEdit<?= $row['discountID'];?>"  class="btn btn-outline-primary" data-toggle="tooltip" title="Edit"><span class="far fa-edit"></span></a>
                                    <a type="button" data-toggle="modal" data-target="#myModalDelete<?= $row['discountID'];?>"  class="btn btn-outline-danger" data-toggle="tooltip" title="Delete"><span class="far fa-trash-alt"></span></a>
                                </div>
                                            <!-- The Modal -->
                                            <div class="modal fade" id="myModalEdit<?= $row['discountID'];?>">
                                                <div class="modal-dialog modal-md">
                                                    <div class="modal-content">
                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h5>Edit <?= $row['discountName'].' - '.$row['discountDesc'];?></h5>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <!-- Modal body -->
                                                        <div class="modal-body">
                                                            <?= form_open('updatediscount/'.$row['discountID']);?>

                                                            <div class="form-group">
                                                                <label class="labelstyle" for="subjectCode">Type</label>
                                                                <input value="<?= $row['discountType'];?>" name="type" type="text" class="form-control  form-control-sm" style="text-transform:uppercase" placeholder="Discount Type" id="discounttype" required>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="labelstyle" for="subjectDesc">Name</label>
                                                                <input value="<?= $row['discountName'];?>" name="name" type="text" class="form-control form-control-sm" placeholder="Discount Name" id="discountname" required>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="labelstyle" for="lec">Description</label>
                                                                <input value="<?= $row['discountDesc'];?>" name="desc" type="decimals" class="form-control form-control-sm" style="text-transform:uppercase" placeholder="Desciption" id="description" required>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="labelstyle" for="labcom">Discount</label>
                                                                <input value="<?= $row['discountPercent'];?>" name="discount" type="decimals" class="form-control form-control-sm" style="text-transform:uppercase" placeholder="Discount percent or amount" id="discount" required>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="sy">SY: </label>
                                                                <select name="sy" class="form-control form-control-sm" required>
                                                                    <option value="<?= $row['syfile'];?>"><?= $row['syfile'];?></option>
                                                                    <option value="2021-2022" selected>2021-2022</option>
                                                                    <option value="2022-2023">2022-2023</option>
                                                                    <option value="2023-2024">2023-2024</option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="sy">Department: </label>
                                                                <select name="dpt" class="form-control form-control-sm" required>
                                                                    <option value="<?= $row['ForWhat'];?>"><?= $row['ForWhat'];?></option>
                                                                    <option value="College">College</option>
                                                                    <option value="Seniorhigh">Seniorhigh</option>
                                                                    <option value="Juniorhigh">Juniorhigh</option>
                                                                    <option value="Gradeschool">Gradeschool</option>
                                                                </select>
                                                            </div>


                                                        </div>
                                                        <div class="modal-footer">
                                                            <button name="shiftstudent" class="btn btn-success" type="submit">Update</button>
                                                        <?= form_close(); ?>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        <!-- END OF MODAL -->
                                        
                                        <!-- The Modal -->
                                        <div class="modal fade" id="myModalDelete<?= $row['discountID'];?>">
                                                <div class="modal-dialog modal-md">
                                                    <div class="modal-content">
                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h5>CONFIRMATION</h5>
                                                            
                                                        </div>
                                                        <!-- Modal body -->
                                                        <div class="modal-body">
                                                        
                                                            Are you sure to delete <strong><?= $row['discountName'].' - '.$row['discountDesc'];?></strong>
                                                    
                                                        <div class="modal-footer">
                                                        <?= form_open('deletediscount/'.$row['discountID']); ?>
                                                            <button name="delete" class="btn btn-danger" type="submit">Delete</button>
                                                        <?= form_close(); ?>
                                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END OF MODAL -->
                                    </td>
                            </tr>
                        <?php }?>
                        </tbody>
                    </table>

            </div>
        </div>
    </div>


</div>
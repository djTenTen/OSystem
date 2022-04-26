<div class="main">
    <?php
        if($this->session->flashdata('Inventory_Added') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> Inventory successfully added. 
        </div>';
        }

        if($this->session->flashdata('Inventory_Updated') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> Inventory successfully updated. 
        </div>';
        }
        
        if($this->session->flashdata('Inventory_Deleted') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> Inventory successfully deleted. 
        </div>';
        }
    
    ?>
    <h1>Inventory Management</h1>
    <div class="container" style="margin-top: 1%">
        <div class="row">
            <div class="col-lg-3">
                <?= form_open_multipart('addinventory');?>
                    <div class="form-group">
                        <label class="" for="subjectCode">Inventory Code:</label>
                        <input name="inventorycode" type="text" class="form-control  form-control-sm"  placeholder="Inventory Code" id="inventorycode" required>
                    </div>
                   
                    <div class="form-group">
                        <label class="" for="subjectCode">Item:</label>
                        <input name="item" type="text" class="form-control  form-control-sm"  placeholder="Item" id="item" required>
                    </div>

                    <div class="form-group">
                        <label class="" for="subjectCode">Brand:</label>
                        <input name="brand" type="text" class="form-control  form-control-sm"  placeholder="Brand" id="brand" required>
                    </div>

                    <div class="form-group">
                        <label class="" for="subjectCode">Description:</label>
                        <input name="description" type="text" class="form-control  form-control-sm"  placeholder="Description" id="description" required>
                    </div>

                    <div class="form-group">
                        <label class="" for="subjectCode">Quantity:</label>
                        <input name="quantity" type="text" class="form-control  form-control-sm"  placeholder="Quantity" id="quantity" required>
                    </div>

                                                       
                    <div class="form-group">
                        <label for="date">Date:</label>
                        <input name="date" type="date" placeholder="mm/dd/yyyy" min="01-01-1880" max="01-01-4000"  class="form-control form-control-sm" id="date" required>
                    </div>

                    <button type="submit" class="btn btn-success" id="save" value="save" name="save"><span class="fas fa-plus"></span> Add Inventory</button>
                <?= form_close();?>
            </div>

            <div class="col-lg-9">
                <?= form_open('inventory');?>
                    <div class="input-group mb-3">
                        <input name="searchinventory" type="text" class="form-control" placeholder="Search Inventory Code/Item/Brand">
                        <div class="input-group-append">
                            <button name="searchsubjects" class="btn btn-primary" type="submit"><span class="fa fa-search"></span></button>
                        </div>
                    </div>
                <?= form_close();?>

                <div style="overflow-y:scroll;width:100%;height:500px">
                    <table class="table table-bordered" bordered="1">  
                        <thead>
                            <tr> 
                                <th>Inventory ID</th>
                                <th>Inventory Code</th>
                                <th>Item</th>
                                <th>Brand</th>
                                <th>Quantity</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($inventory as $row){?>
                        <tr class="<?php if($row['Quantity'] <= $row['Crit']){echo 'alert alert-danger';}?>">
                            <td><?= $row['InventoryID'];?></td>
                            <td><?= $row['InventoryCode'];?></td>
                            <td><?= $row['Item'];?></td>
                            <td><?= $row['Brand'];?></td>
                            <td><?= $row['Quantity'];?></td>
                            <td><?= $row['Date'];?></td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a type="button" data-toggle="modal" data-target="#myModalEdit<?= $row['InventoryID'];?>"  class="btn btn-outline-primary" data-toggle="tooltip" title="Edit"><span class="far fa-edit"></span></a>
                                    <a type="button" data-toggle="modal" data-target="#myModalDelete<?= $row['InventoryID'];?>"  class="btn btn-outline-danger" data-toggle="tooltip" title="Delete"><span class="far fa-trash-alt"></span></a>
                                    
                                </div>
                                <!-- The Modal -->
                                <div class="modal fade" id="myModalEdit<?= $row['InventoryID'];?>">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h5>Edit <?= $row['Item'];?></h5>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                <?= form_open('updateinventory/'.$row['InventoryID']);?>
                                                <div class="form-group">
                                                    <label class="" for="subjectCode">Inventory Code:</label>
                                                    <input value="<?= $row['InventoryCode'];?>" name="inventorycode" type="text" class="form-control  form-control-sm"  placeholder="Inventory Code" id="inventorycode" required>
                                                </div>
                                            
                                                <div class="form-group">
                                                    <label class="" for="subjectCode">Item:</label>
                                                    <input value="<?= $row['Item'];?>" name="item" type="text" class="form-control  form-control-sm"  placeholder="Item" id="item" required>
                                                </div>

                                                <div class="form-group">
                                                    <label class="" for="subjectCode">Brand:</label>
                                                    <input value="<?= $row['Brand'];?>" name="brand" type="text" class="form-control  form-control-sm"  placeholder="Brand" id="brand" required>
                                                </div>

                                                <div class="form-group">
                                                    <label class="" for="subjectCode">Description:</label>
                                                    <input value="<?= $row['ItemDesc'];?>" name="description" type="text" class="form-control  form-control-sm"  placeholder="Description" id="description" required>
                                                </div>
                                                                                     
                                                <div class="form-group">
                                                    <label for="date">Date:</label>
                                                    <input value="<?= $row['Date'];?>" name="date" type="date" placeholder="mm/dd/yyyy" min="01-01-1880" max="01-01-4000"  class="form-control form-control-sm" id="date" required>
                                                </div>

                                                                                                                                     
                                                <div class="modal-footer">
                                                    <button name="shiftstudent" class="btn btn-success" type="submit">Update</button>
                                                <?= form_close(); ?>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>  
                                <!-- END OF MODAL -->
                                
                                <!-- The Modal -->
                                <div class="modal fade" id="myModalDelete<?= $row['InventoryID'];?>">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h5>CONFIRMATION</h5>
                                                    
                                                </div>
                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                
                                                    Are you sure to delete <strong><?= $row['Item'];?></strong>
                                            
                                                <div class="modal-footer">
                                                <?= form_open('deleteinventory/'.$row['InventoryID']); ?>
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
</div>

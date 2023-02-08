<div class="container-fluid">
<?php
        if($this->session->flashdata('Insuficient') != null){
            echo '<div class="alert alert-danger">
            <strong>Error! </strong> Insuficient stock. 
        </div>';
        }

        if($this->session->flashdata('Add_deployment') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> Item successfully deployed. 
        </div>';
        }
        
        if($this->session->flashdata('Remove_deployment') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> Deployment successfully deleted. 
        </div>';
        }

        if($this->session->flashdata('Update_deployment') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> Deployment Updated. 
        </div>';
        }

        if($this->session->flashdata('Item_Returned') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> Item Returned. 
        </div>';
        }
    


        
    ?>

   
    <div class="container container-fluid" style="margin-top:1%;">
        <div class="row">
            <div class="col-lg-3">
                    
                    <?= form_open('additemtemp');?>
                        <div class="form-group">
                            <label for="item">Item:</label>
                            <select name="item" class="form-control form-control-sm" required>
                            <option value="" selected>--Item--</option>
                            <?php foreach($inventory as $row){?>
                                <option value="<?= $row['InventoryID'];?>"><?= $row['InventoryCode'].': '.$row['Item'].' - '.$row['Brand'] .' ('.$row['Quantity'].')';?><?php if($row['Quantity'] <=0){echo 'Out of Stock';}?></option>
                            <?php }?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="serial">Serial:</label>
                            <input name="serial" type="text" class="form-control form-control-sm" placeholder="Serial" id="serial">
                        </div>

                        <div class="form-group">
                            <label for="quantity">Quantity:</label>
                            <input name="quantity" type="text" class="form-control form-control-sm" placeholder="Quantity" id="quantity">
                        </div>

                        <button name="searchitem" type="submit" class="btn btn-success" style="margin-top: 2%; margin-bottom: 2%;"><span class="fas fa-plus"></span> Add Item</button>
                    <?= form_close();?>


                     <?= form_open('adddeployment');?> 
                        <div class="form-group">
                            <label for="type">Type of Deployment:</label>
                            <select name="type" class="form-control form-control-sm" required>
                                <option value="" selected>--Type of Deployment--</option>
                                <option value="Deploy">Deploy</option>
                                <option value="Borrow">Borrow</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="todeploy">To Deploy:</label>
                            <select name="todeploy" class="form-control form-control-sm" required>
                            <option value="" selected>--To Deploy--</option>
                                
                            <?php foreach($employee as $row){?>
                                <option value="<?= $row['empID'];?>"><?= $row['Name'].' ('.$row['Position'].')';?></option>
                            <?php }?>

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="designation">Designation:</label>
                            <input name="designation" type="text" class="form-control form-control-sm" placeholder="Designation" id="designation">
                        </div>                      
                                                                     
                        <div class="form-group">
                            <label for="date">Date:</label>
                            <input name="date" type="date" placeholder="mm/dd/yyyy" min="01-01-1880" max="01-01-4000"  class="form-control form-control-sm" id="date" required>
                        </div>
                                               
                    
                <button name="searchitem" type="submit" class="btn btn-success" style="margin-top: 2%; margin-bottom: 2%;"><span class="fas fa-plus"></span> Deploy Item</button>
                <?= form_close();?>
            </div>
            <div class="col-lg-9">
                <h2>Item Lists</h2>  

                <div style="overflow-y:scroll;width:100%;height:200px">
                    <table class="table table-bordered table-striped" bordered="1">  
                        <thead>
                            <tr> 
                                <th>Inventory ID</th>
                                <th>Inventory Code</th>
                                <th>Item</th>
                                <th>Brand</th>
                                <th>Quantity</th>
                                <th>Serial</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($tempitems as $row){?> 
                        <tr>
                            <td><?= $row['InventoryID'];?></td>
                            <td><?= $row['InventoryCode'];?></td>
                            <td><?= $row['Item'];?></td>
                            <td><?= $row['Brand'];?></td>
                            <td><?= $row['Quantity'];?></td>
                            <td><?= $row['Serial'];?></td>
                            <td><?= $row['Date'];?></td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <?= form_open("removeitemtemp/".$row['InventID']);?>
                                    <button type="submit"  class="btn btn-outline-danger btn-sm" data-toggle="tooltip" title="Delete"><span class="far fa-trash-alt"></span></button>
                                    <?= form_close();?>
                                </div>
                            </td>
                        </tr>
                        <?php }?>
                   
                        </tbody>
                    </table>
                </div>
                <form action="deployment" method="post">
                    <div class="input-group mb-3">
                        <input name="searchdeployment" type="text" class="form-control" placeholder="Search Name/Designation" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button name="SearchEnrolled" class="btn btn-primary" type="submit"><span class="fa fa-search"></span></button>
                        </div>
                    </div>


                </form>  

                <h2>Deployment</h2>
                <div style="overflow-y:scroll;width:100%;height:500px">
                    <table class="table table-bordered" bordered="1">  
                        <thead>
                            <tr> 
                                <th>Deployment ID</th>
                                <th>Employee Name</th>
                                <th>Type of Deployment</th>
                                <th>Designation</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                        <?php foreach($deployments as $rowd){?> 
                        <tr class="<?php if($rowd['isReturned'] == 'No'){echo 'alert alert-info';}?>">
                            <td><?= $rowd['DeploymentID'];?></td>
                            <td><?= $rowd['Name'];?></td>
                            <td><?= $rowd['Type'];?></td>
                            <td><?= $rowd['Designation'];?></td>
                            <td><?= $rowd['Date'];?></td>
                            <td>

                                <div class="btn-group btn-group-sm">
                                    <a type="button" data-toggle="modal" data-target="#myModalEdit<?= $rowd['DeploymentID'];?>"  class="btn btn-outline-primary" data-toggle="tooltip" title="Edit"><span class="far fa-edit"></span></a>
                                    <a type="button" data-toggle="modal" data-target="#myModalDelete<?= $rowd['DeploymentID'];?>"  class="btn btn-outline-danger" data-toggle="tooltip" title="Delete"><span class="far fa-trash-alt"></span></a>
                                    <a type="button" data-toggle="modal" data-target="#myModalview<?= $rowd['DeploymentID'];?>"  class="btn btn-outline-success" data-toggle="tooltip" title="view"><span class="far fa-eye"></span></a>
                                
                                </div>
                                <!-- The Modal -->
                                <div class="modal fade" id="myModalEdit<?= $rowd['DeploymentID'];?>">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h5>Edit <?= $rowd['Name'].' - '.$rowd['Type'];?></h5>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                <?= form_open('updatedeployment/'.$rowd['DeploymentID']);?>
                                                <div class="form-group">
                                                    <label for="type">Type of Deployment:</label>
                                                    <select name="type" class="form-control form-control-sm" required>
                                                        <option value="<?= $rowd['Type'];?>" selected><?= $rowd['Type'];?></option>
                                                        <option value="Deploy">Deploy</option>
                                                        <option value="Borrow">Borrow</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="todeploy">To Deploy:</label>
                                                    <select name="todeploy" class="form-control form-control-sm" required>
                                                    <option value="<?= $rowd['employeeID'];?>" selected><?= $rowd['Name'];?></option>
                                                        
                                                    <?php foreach($employee as $row){?>
                                                        <option value="<?= $row['empID'];?>"><?= $row['Name'].' ('.$row['Position'].')';?></option>
                                                    <?php }?>

                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="designation">Designation:</label>
                                                    <input value="<?= $rowd['Designation'];?>" name="designation" type="text" class="form-control form-control-sm" placeholder="Designation" id="designation">
                                                </div>                      
                                                                                            
                                                <div class="form-group">
                                                    <label for="date">Date:</label>
                                                    <input value="<?= $rowd['Date'];?>" name="date" type="date" placeholder="mm/dd/yyyy" min="01-01-1880" max="01-01-4000"  class="form-control form-control-sm" id="date" required>
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
                                <div class="modal fade" id="myModalDelete<?= $rowd['DeploymentID'];?>">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h5>CONFIRMATION</h5>
                                                    
                                                </div>
                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                
                                                    Are you sure to delete <strong><?= $rowd['Name'].' - '.$rowd['Type'];?></strong>
                                                </div>
                                                <div class="modal-footer">
                                                <?= form_open('removedeployment/'.$rowd['DeploymentID']); ?>
                                                    <button name="delete" class="btn btn-danger" type="submit">Delete</button>
                                                <?= form_close(); ?>
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END OF MODAL -->


                                <!-- The Modal -->
                                <div class="modal fade" id="myModalview<?= $rowd['DeploymentID'];?>">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h5>Borrowed / Deployed Items</h5>
                                                    
                                                </div>
                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                        <?php
                                                            $dpID = $rowd['DeploymentID'];
                                                            $query = $this->db->query("select *,deployment_items.Quantity
                                                            from deployment_items,inventory
                                                            where deploymentID = '$dpID'
                                                            and deployment_items.inventoryID = inventory.InventoryID")
                        
                                                        ?>
                                                        <table class="table table-bordered table-striped" bordered="1">  
                                                            <thead>
                                                                <tr> 
                                                                    <th>Item</th>
                                                                    <th>Quantity</th>
                                                                    <th>Returned</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php 
                                                               
                                                                foreach($query->result_array() as $items){
                                                                    ?>
                                                                    <tr>
                                                                        <td><?= $items['Item'];?></td>
                                                                        <td><?= $items['Quantity'];?></td>
                                                                        <?= form_open('returnitem/'.$items['inventoryID'].'/'.$rowd['DeploymentID']);?>
                                                                        <td class="justify-content-center" style="text-align:center;">                                                                    
                                                                            <input class="form-check-input" type="hidden" id="return" name="return" value="No" />
                                                                            <input class="form-check-input" type="checkbox" id="return" name="return" value="Yes" <?php if ($items['isReturned'] == 'Yes'){echo 'checked';}?>>                                                                         
                                                                        </td>
                                                                    </tr>
                                                                <?php }?>
                                                            </tbody>
                                                        </table>

                                                <div class="modal-footer">
                                                        <button name="delete" class="btn btn-primary" type="submit">Return</button>
                                                    <?= form_close();?>
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
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

<script>
    $(document).ready(function () {
        $('select').selectize({
            sortField: 'text'
        });
    });
</script>
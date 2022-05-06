<div class="container-fluid">
<?php
        if($this->session->flashdata('Product_Added') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> Product successfully added. 
        </div>';
        }

        if($this->session->flashdata('Product_Updated') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> Product successfully updated. 
        </div>';
        }
        
        if($this->session->flashdata('Product_Deleted') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> Product successfully deleted. 
        </div>';
        }
        if($this->session->flashdata('Addstock_Updated') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> Stocks successfully deleted. 
        </div>';
        }
        
    ?>



<h1>Product Entry</h1> 
    <div class="container container-fluid" style="margin-top:1%;">
        <div class="row">
            <div class="col-lg-4">
                    <?= form_open("addproduct");?>
                        <div class="form-group">
                            <label for="productName">Product Name:</label>
                            <input name="productName" type="text" class="form-control form-control-sm" placeholder="Product Name" id="productName">
                        </div>
                        <div class="form-group">
                            <label for="supplier">Supplier:</label>
                            <input name="supplier" type="text" class="form-control form-control-sm" placeholder="Supplier" id="supplier">
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="daterecieved">Date Recieved:</label>
                                <input name="daterecieved" type="date" class="form-control form-control-sm" id="daterecieved">
                            </div>
                            <div class="col-md-6">
                                <label for="expirydate">Expiry Date:</label>
                                <input name="expirydate" type="date" class="form-control form-control-sm" id="expirydate">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label for="originalprice">Orig Price:</label>
                                <input name="originalprice" type="number" class="form-control form-control-sm" placeholder="Original Price" id="originalprice">
                            </div>
                            <div class="col-md-4">
                                <label for="markup">Mark up :</label>
                                <input name="markup" type="number" class="form-control form-control-sm" placeholder="Mark up" id="markup">
                            </div>
                            <div class="col-md-4">
                                <label for="QTY">Quantity:</label>
                                <input name="QTY" type="number" class="form-control form-control-sm" placeholder="Quantity" id="QTY">
                            </div>
                            <div class="col-md-12">
                                <label for="barcode">Barcode:</label>
                                <input name="barcode" type="text" class="form-control form-control-sm" placeholder="Barcode" id="barcode">
                            </div>
                        </div>
                        <button name="addproduct" type="submit" class="btn btn-success" style="margin-top: 2%; margin-bottom: 2%;"><span class="fas fa-plus"></span> Add Product</button>
                    </form>  
                            </div>
            <div class="col-lg-8">
                <h2>Product List</h2>  
                <form action="product" method="post">
                    <div class="input-group mb-3">
                        <input name="searchProduct" type="text" class="form-control" placeholder="Search Product" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button name="SearchEnrolled" class="btn btn-primary" type="submit"><span class="fa fa-search"></span></button>
                        </div>
                    </div>
                </form>  
                <div style="overflow-y:scroll;width:100%;height:400px">    
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Product Name</th>
                                <th>Supplier</th>
                                <th>Date Received</th>
                                <th>Expiry Date</th>
                                <th>Original Price</th>
                                <th>Mark Up</th>
                                <th>QTY</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($product as $row){?>
                            <tr>
                                <td><?= $row['ProductID'];?></td>
                                <td><?= $row['ProductName'];?></td>
                                <td><?= $row['Supplier'];?></td>
                                <td><?= $row['DateRecieve'];?></td>
                                <td><?= $row['DateExpire'];?></td>
                                <td><?= $row['OrigPrice'];?></td>
                                <td><?= $row['Markup'];?></td>
                                <td><?= $row['Quantity'];?></td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a type="button" data-toggle="modal" data-target="#myModalEdit<?= $row['ProductID'];?>"  class="btn btn-outline-primary" data-toggle="tooltip" title="Edit"><span class="far fa-edit"></span></a>
                                        <a type="button" data-toggle="modal" data-target="#myModalDelete<?= $row['ProductID'];?>"  class="btn btn-outline-danger" data-toggle="tooltip" title="Delete"><span class="far fa-trash-alt"></span></a>
                                        <a type="button" data-toggle="modal" data-target="#myModalStock<?= $row['ProductID'];?>"  class="btn btn-outline-secondary" data-toggle="tooltip" title="Add Stock"><span class="fas fa-cart-plus"></span></a>
                                    </div>
                                    <!-- The Modal -->
                                    <div class="modal fade" id="myModalEdit<?= $row['ProductID'];?>">
                                                <div class="modal-dialog modal-md">
                                                    <div class="modal-content">
                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h5>Edit <?= $row['ProductName'];?></h5>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <!-- Modal body -->
                                                        <div class="modal-body">
                                                        <?= form_open('updateproduct/'.$row['ProductID']);?>
                                                        <div class="form-group">
                                                            <label for="productName">Product Name:</label>
                                                            <input value="<?= $row['ProductName'];?>" name="productName" type="text" class="form-control form-control-sm" placeholder="Product Name" id="productName">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="supplier">Supplier:</label>
                                                            <input value="<?= $row['Supplier'];?>" name="supplier" type="text" class="form-control form-control-sm" placeholder="Supplier" id="supplier">
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-md-6">
                                                                <label for="daterecieved">Date Recieved:</label>
                                                                <input value="<?= $row['DateRecieve'];?>" name="daterecieved" type="date" class="form-control form-control-sm" id="daterecieved">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="expirydate">Expiry Date:</label>
                                                                <input value="<?= $row['DateExpire'];?>" name="expirydate" type="date" class="form-control form-control-sm" id="expirydate">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <label for="originalprice">Orig Price:</label>
                                                                <input value="<?= $row['OrigPrice'];?>" name="originalprice" type="number" step="any" class="form-control form-control-sm" placeholder="Original Price" id="originalprice">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label for="markup">Mark up :</label>
                                                                <input value="<?= $row['Markup'];?>" name="markup" type="number" step="any" class="form-control form-control-sm" placeholder="Mark up" id="markup">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label for="QTY">Quantity:</label>
                                                                <input value="<?= $row['Quantity'];?>" name="QTY" type="number" class="form-control form-control-sm" placeholder="Quantity" id="QTY">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label for="barcode">Barcode:</label>
                                                                <input value="<?= $row['BarCode'];?>" name="barcode" type="text" class="form-control form-control-sm" placeholder="Barcode" id="barcode">
                                                            </div>
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
                                        <div class="modal fade" id="myModalDelete<?= $row['ProductID'];?>">
                                                <div class="modal-dialog modal-md">
                                                    <div class="modal-content">
                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h5>CONFIRMATION</h5>
                                                            
                                                        </div>
                                                        <!-- Modal body -->
                                                        <div class="modal-body">
                                                        
                                                            Are you sure to delete <strong><?= $row['ProductName'];?></strong>
                                                    
                                                        <div class="modal-footer">
                                                        <?= form_open('deleteproduct/'.$row['ProductID']); ?>
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
                                        <div class="modal fade" id="myModalStock<?= $row['ProductID'];?>">
                                                <div class="modal-dialog modal-md">
                                                    <div class="modal-content">
                                                        <!-- Modal Header -->
                                                    <?= form_open('addstock/'.$row['ProductID']); ?>    
                                                        <div class="modal-header">
                                                            <h5>Add Quantity Stock</h5>
                                                            
                                                        </div>
                                                        <!-- Modal body -->
                                                        <div class="modal-body">
                                                        <b>Product Name:</b>  <?= $row['ProductName'];?><br>
                                                        <b>Supplier: </b> <?= $row['Supplier'];?><br>
                                                        <b>Current Stock: </b> <?= $row['Quantity'];?>

                                                            <div class="col-md-4">
                                                                <label for="QTY">Add Stock:</label>
                                                                <input name="QTY" type="number" class="form-control form-control-sm" placeholder="Quantity" id="QTY">
                                                            </div>
                                                    
                                                        <div class="modal-footer">
                                                        
                                                            <button name="delete" class="btn btn-danger" type="submit">Add</button>
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

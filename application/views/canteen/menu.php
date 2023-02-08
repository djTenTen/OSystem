<div class="container-fluid">
    <?php
        if($this->session->flashdata('Menu_Added') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> Menu successfully added. 
        </div>';
        }

        if($this->session->flashdata('Menu_Updated') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> Menu successfully updated. 
        </div>';
        }
        
        if($this->session->flashdata('Menu_Deleted') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> Menu successfully deleted. 
        </div>';
        }
    
    ?>

      
    <div class="container container-fluid" style="margin-top:1%;">
        <div class="row">
            <div class="col-lg-5">
                    <?= form_open("addmenu");?>
                        <div class="form-group">
                            <label for="menu">Menu:</label>
                            <input name="menu" type="text" class="form-control form-control-sm" placeholder="Menu name" id="menu">
                        </div>
                        <div class="form-group">
                            <label for="type">Type:</label>
                            <select name="type" class="form-control form-control-sm" required>
                                <option value="" selected>Select Type</option>
                                <option value="Meal">Meal</option>
                                <option value="Ulam">Ulam</option>
                                <option value="Drinks">Drinks</option>
                                <option value="Miryenda">Miryenda</option>
                                <option value="Fruit">Fruit</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="amount">Amount:</label>
                            <input name="amount" type="text" class="form-control form-control-sm" placeholder="Amount" id="amount">
                        </div>
                        <button name="addmenu" type="submit" class="btn btn-success" style="margin-top: 2%; margin-bottom: 2%;"><span class="fas fa-plus"></span> Add Menu</button>

                    </form>  
            </div>
            <div class="col-lg-7">
                <h2>Menu List</h2>  
                <form action="menu" method="post">
                    <div class="input-group mb-3">
                        <input name="searchMenu" type="text" class="form-control" placeholder="Search Menu" aria-label="Recipient's username" aria-describedby="basic-addon2">
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
                                <th>Menu</th>
                                <th>Type</th>
                                <th>Amount</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                     

                        <?php foreach($menu as $row){?>
                            <tr>
                                <td><?= $row['MenuID'];?></td>
                                <td><?= $row['MenuName'];?></td>
                                <td><?= $row['Type'];?></td>
                                <td><?= $row['Amount'];?></td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a type="button" data-toggle="modal" data-target="#myModalEdit<?= $row['MenuID'];?>"  class="btn btn-outline-primary" data-toggle="tooltip" title="Edit"><span class="far fa-edit"></span></a>
                                        <a type="button" data-toggle="modal" data-target="#myModalDelete<?= $row['MenuID'];?>"  class="btn btn-outline-danger" data-toggle="tooltip" title="Delete"><span class="far fa-trash-alt"></span></a>
                                       
                                    </div>
                                    <!-- The Modal -->
                                    <div class="modal fade" id="myModalEdit<?= $row['MenuID'];?>">
                                                <div class="modal-dialog modal-md">
                                                    <div class="modal-content">
                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h5>Edit <?= $row['MenuName'];?></h5>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <!-- Modal body -->
                                                        <div class="modal-body">
                                                        <?= form_open('updatemenu/'.$row['MenuID']);?>
                                                        <div class="form-group">
                                                            <label for="menu">Menu:</label>
                                                            <input value="<?= $row['MenuName'];?>" name="menu" type="text" class="form-control form-control-sm" placeholder="Menu name" id="menu">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="type">Type:</label>
                                                            <select name="type" class="form-control form-control-sm" required>
                                                                <option value="<?= $row['Type'];?>" selected><?= $row['Type'];?></option>
                                                                <option value="Meal">Meal</option>
                                                                <option value="Ulam">Ulam</option>
                                                                <option value="Drinks">Drinks</option>
                                                                <option value="Miryenda">Miryenda</option>
                                                                <option value="Fruit">Fruit</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="amount">Amount:</label>
                                                            <input value="<?= $row['Amount'];?>" name="amount" type="text" class="form-control form-control-sm" placeholder="Amount" id="amount">
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
                                        <div class="modal fade" id="myModalDelete<?= $row['MenuID'];?>">
                                                <div class="modal-dialog modal-md">
                                                    <div class="modal-content">
                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h5>CONFIRMATION</h5>
                                                            
                                                        </div>
                                                        <!-- Modal body -->
                                                        <div class="modal-body">
                                                        
                                                            Are you sure to delete <strong><?= $row['MenuName'];?></strong>
                                                    
                                                        <div class="modal-footer">
                                                        <?= form_open('deletemenu/'.$row['MenuID']); ?>
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

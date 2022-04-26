<?php
class Custodian_model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }

    // INVENTORY
    public function viewInventory(){
        $query = $this->db->get('inventory');
        return $query->result_array();
    }

    public function viewInventorySearch($keyword){
        $query = $this->db->query("select *
        from inventory
        where concat(InventoryCode, Item, Brand) like '%$keyword%'");
        return $query->result_array();
    }
    
    public function insertInventory(){

        $crit = $this->input->post('quantity') * 0.25;
 
        $data = array(
            'InventoryCode' => strtoupper($this->input->post('inventorycode')),
            'Item' => ucfirst($this->input->post('item')),
            'Brand' => strtoupper($this->input->post('brand')),
            'ItemDesc' => ucfirst($this->input->post('description')),
            'Entry' => $this->input->post('quantity'),
            'Quantity' => $this->input->post('quantity'),
            'Crit' => $crit,
            'Date' => $this->input->post('date'),
        );

        $this->db->insert('inventory', $data);
    }


    public function editInventory($ID){
        $data = array(
            'InventoryCode' => strtoupper($this->input->post('inventorycode')),
            'Item' => ucfirst($this->input->post('item')),
            'Brand' => strtoupper($this->input->post('brand')),
            'ItemDesc' => ucfirst($this->input->post('description')),
            'Crit' => $this->input->post('critlevel'),
            'Date' => $this->input->post('date'),
        );

        $this->db->where('InventoryID', $ID);
        $this->db->update('inventory', $data);

    }

    public function deleteInventory($ID){
       
        $this->db->where('InventoryID', $ID);
        $this->db->delete('inventory') ;

    }












    // DEPLOYMENT
    
    public function viewTempItems(){
        $userid = $_SESSION['userid'];
        $query = $this->db->query("select *
        from inventory,inventory_temp
        where inventory.InventoryID = inventory_temp.InventoryID
        and inventory_temp.userID = '$userid' ");
        return $query->result_array();
    }
    
    
    
    public function insertItemTemp(){
        $data = array(
            'InventoryID' => $this->input->post('item'),
            'Quantity' => $this->input->post('quantity'),
            'Serial' => $this->input->post('serial'),
            'userID' => $_SESSION['userid']
            
        );
        $this->db->insert('inventory_temp', $data);

    }


    public function removeItemTemp($ID){
       
        $this->db->where('InventID', $ID);
        $this->db->delete('inventory_temp');

    }

    public function viewDeployment(){
        $query = $this->db->query("select *
        from deployment, employees
        where deployment.employeeID = employees.empID
        and Type = 'Borrow'");
        return $query->result_array();
    }

    public function viewDeploymentSearch($keyword){
        $query = $this->db->query("select *
        from deployment, employees
        where deployment.employeeID = employees.empID
        and concat(Name,Designation) like '%$keyword%' ");
        return $query->result_array();
    }

    public function addDeployment(){

        $data = array(
            'employeeID' => $this->input->post('todeploy'),
            'Type' => $this->input->post('type'),
            'Designation' => $this->input->post('designation'),
            'Date' => $this->input->post('date')          
        );
        $this->db->insert('deployment', $data);

        $selectdpID = $this->db->query("select DeploymentID 
        from deployment 
        order by DeploymentID desc limit 1");
        foreach($selectdpID->result_array() as $dpid){
            $deployment = $dpid['DeploymentID'];
        }

        $userid = $_SESSION['userid'];
        $query = $this->db->query("select *
        from inventory_temp
        where userID = '$userid'");

        foreach($query->result_array() as $row){

            $data = array(
                'deploymentID' => $deployment,
                'inventoryID' => $row['InventoryID'],
                'Quantity' => $row['Quantity'],
                'Serial' => $row['Serial']
            );

            $ivtrID = $row['InventoryID'];
            $lessqty = $row['Quantity'];
            $this->db->insert('deployment_items', $data);

            $stock = $this->db->query("select Quantity 
            from inventory 
            where InventoryID = '$ivtrID'");
            foreach($stock->result_array() as $stock){

                $oldstock = $stock['Quantity'];
                $newstock = $oldstock - $lessqty;

                $this->db->query("update inventory set Quantity = '$newstock'
                where InventoryID = '$ivtrID'");

            }


        }

        $this->db->where("userID",$userid);
        $this->db->delete("inventory_temp");

    }

   
    public function removeDeployment($ID){
       
        $this->db->where('DeploymentID', $ID);
        $this->db->delete('deployment');

        $this->db->where('deploymentID', $ID);
        $this->db->delete('deployment_items');

    }

    

    public function updateDeployment($ID){
       
        $data = array(
            'employeeID' => $this->input->post('todeploy'),
            'Type' => $this->input->post('type'),
            'Designation' => $this->input->post('designation'),
            'Date' => $this->input->post('date')          
        );

        $this->db->where('DeploymentID', $ID);
        $this->db->update('deployment', $data);

    }


    public function returnItem($invtryID,$dplymtID){
       
        $isReturned = $this->input->post('return');
      
        $this->db->query("update deployment_items set isReturned = '$isReturned'
        wheres inventoryID = '$invtryID'
        and deploymentID = '$dplymtID'");

    }


    



























}
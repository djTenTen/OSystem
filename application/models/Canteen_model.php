<?php
class Canteen_model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }
    
    public function viewMenu(){
        $query = $this->db->get('menus');
        return $query->result_array();
    }


    public function insertMenu() {
        $data = array(
            'MenuName' => $this->input->post("menu"),
            'Type' => $this->input->post("type"),
            'Amount' => $this->input->post("amount")
        );
        $this->db->insert('menus',$data);
    }

    public function updateMenu($id){
        $data = array(
            'MenuName' => $this->input->post("menu"),
            'Type' => $this->input->post("type"),
            'Amount' => $this->input->post("amount")
        );
        $this->db->where('MenuID',$id);
        $this->db->update('menus',$data);
    }


    public function deleteMenu($id){
        $this->db->where('MenuID',$id);
        $this->db->delete('menus');
    }















    public function viewProduct(){
        $query = $this->db->get('products');
        return $query->result_array();
    }


    public function insertProduct() {
        $data = array(
            'ProductName' => $this->input->post("productName"),
            'Supplier' => $this->input->post("supplier"),
            'DateRecieve' => $this->input->post("daterecieved"),
            'DateExpire' => $this->input->post("expirydate"),
            'OrigPrice' => $this->input->post("originalprice"),
            'Markup' => $this->input->post("markup"),
            'Quantity' => $this->input->post("QTY"),
            'BarCode' => $this->input->post("barcode")
        );
        $this->db->insert('products',$data);
    }

    public function updateProduct($id){
        $data = array(
            'ProductName' => $this->input->post("productName"),
            'Supplier' => $this->input->post("supplier"),
            'DateRecieve' => $this->input->post("daterecieved"),
            'DateExpire' => $this->input->post("expirydate"),
            'OrigPrice' => $this->input->post("originalprice"),
            'Markup' => $this->input->post("markup"),
            'Quantity' => $this->input->post("QTY"),
            'BarCode' => $this->input->post("barcode")
        );
        $this->db->where('ProductID',$id);
        $this->db->update('products',$data);
    }

    public function deleteProduct($id){
        $this->db->where('ProductID',$id);
        $this->db->delete('products');
    }

    public function addStock($id){
        $select = $this->db->query("select Quantity 
        from products
        where ProductID = '$id' ");
        foreach($select->result_array() as $row){
            $oldQTY = $row['Quantity'];
        }

        $qty = $oldQTY + $this->input->post("QTY");
        $this->db->query("update products set Quantity = '$qty' where ProductID='$id'");
    }














}

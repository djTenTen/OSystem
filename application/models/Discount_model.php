<?php
class Discount_model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }

    public function viewDiscount(){

        $query = $this->db->query("select * from discounts");
        return $query->result_array();

    }

    public function viewDiscountSearch($keyword){

        $query = $this->db->query("select * 
        from discounts 
        where discountName like '%$keyword %' 
        or discountDesc like '%$keyword %' 
        or discountType like '%$keyword %'");
        return $query->result_array();

    }

    public function addDiscount(){

        $data = array(
            'discountType' => ucfirst($this->input->post('type')),
            'discountName' => ucfirst($this->input->post('name')),
            'discountDesc' => ucfirst($this->input->post('desc')),
            'discountDesc' => ucfirst($this->input->post('desc')),
            'discountPercent' => ucfirst($this->input->post('discount')),
            'syfile' => $this->input->post('sy'),
            'ForWhat' => ucfirst($this->input->post('dpt'))
        );
        $this->db->insert('discounts', $data);

    }

    public function updateDiscount($DiscountID){

        $data = array(
            'discountType' => ucfirst($this->input->post('type')),
            'discountName' => ucfirst($this->input->post('name')),
            'discountDesc' => ucfirst($this->input->post('desc')),
            'discountDesc' => ucfirst($this->input->post('desc')),
            'discountPercent' => ucfirst($this->input->post('discount')),
            'syfile' => $this->input->post('sy'),
            'ForWhat' => ucfirst($this->input->post('dpt'))
        );

        $this->db->where('discountID',$DiscountID);
        $this->db->update('discounts',$data);
    }

    public function deleteDiscount($DiscountID){

        $this->db->where('discountID',$DiscountID);
        $this->db->delete('discounts');

    }


    
    

}
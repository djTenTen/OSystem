<?php
class Clinic_model extends CI_Model{

    public function __construct(){
        $this->load->database();
    }


    public function viewVisitors(){
        
        $query = $this->db->query("select *
        from visitors order by logID desc limit 200");
        return $query->result_array();

    }

    public function exportVisitors(){

        $cater = $this->input->post('category');
        $from = $this->input->post('mm').'/'.$this->input->post('dd').'/'.$this->input->post('yy');
        $to =   $this->input->post('mm2').'/'.$this->input->post('dd2').'/'.$this->input->post('yy2');
        $query = $this->db->query("select * from visitors where Category='$cater' and Date >='$from' and Date<='$to'");
        return $query->result_array();

    }

}
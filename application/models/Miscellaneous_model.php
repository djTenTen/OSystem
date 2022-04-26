<?php
class Miscellaneous_model extends CI_Model{

    public function __construct(){
        $this->load->database();
    }

    public function viewCollegeMiscellaneous(){
        $this->db->where('Department','College');
        $query = $this->db->get('miscellaneous');
        return $query->result_array();
    }

    public function addCollegeMiscellaneous(){
        $data = array(
            'Miscellaneous' => trim(ucwords($this->input->post('misc'))),
            'Amount' => trim($this->input->post('amount')),
            'syfile' => trim($this->input->post('sy')),
            'Department' => 'College'
        );
        return $this->db->insert('miscellaneous',$data);
    }

    public function updateCollegeMiscellaneous($miscID){
        $data = array(
            'Miscellaneous' => trim(ucwords($this->input->post('Miscellaneous'))),
            'Amount' => trim($this->input->post('Amount')),
            'syfile' => trim($this->input->post('syfile')),
            'Department' => 'College'
        );
        $this->db->where('miscID', $miscID);
        return $this->db->update('miscellaneous',$data);
    }

    public function deleteCollegeMiscellaneous($miscID){
        $this->db->where('miscID', $miscID);
        return $this->db->delete('miscellaneous');
    }

















    public function viewGradeschoolMiscellaneous(){
        $this->db->where('Department','Gradeschool');
        $query = $this->db->query("select * from miscellaneous
        where Department='Gradeschool' order by miscID desc ");
        return $query->result_array();
    }


    public function addGradeschoolMiscellaneous(){
        $data = array(
            'Miscellaneous' => trim(ucwords($this->input->post('misc'))),
            'other' => trim(ucwords($this->input->post('other'))),
            'Amount' => trim($this->input->post('amount')),
            'syfile' => trim($this->input->post('sy')),
            'forwhat' => trim($this->input->post('for')),
            'Department' => 'Gradeschool'
        );
        return $this->db->insert('miscellaneous',$data);
    }


    public function updateGradeschoolMiscellaneous($miscID){
        $data = array(
            'Miscellaneous' => trim(ucwords($this->input->post('Miscellaneous'))),
            'other' => trim(ucwords($this->input->post('other'))),
            'Amount' => trim($this->input->post('Amount')),
            'syfile' => trim($this->input->post('syfile')),
            'forwhat' => trim($this->input->post('for')),
            'Department' => 'Gradeschool'
        );
        $this->db->where('miscID', $miscID);
        return $this->db->update('miscellaneous',$data);
    }


    public function deleteGradeschoolMiscellaneous($miscID){
        $this->db->where('miscID', $miscID);
        return $this->db->delete('miscellaneous');
    }















    public function viewJuniorhighMiscellaneous(){
        $query = $this->db->query("select * from miscellaneous where Department = 'Juniorhigh' order by miscID desc");
        return $query->result_array();
    }


    public function addJuniorhighMiscellaneous(){
        $data = array(
            'Miscellaneous' => trim(ucwords($this->input->post('misc'))),
            'other' => trim(ucwords($this->input->post('other'))),
            'Amount' => trim($this->input->post('amount')),
            'syfile' => trim($this->input->post('sy')),
            'forwhat' => trim($this->input->post('for')),
            'Department' => 'Juniorhigh'
        );
        return $this->db->insert('miscellaneous',$data);
    }


    public function updateJuniorhighMiscellaneous($miscID){
        $data = array(
            'Miscellaneous' => trim(ucwords($this->input->post('Miscellaneous'))),
            'other' => trim(ucwords($this->input->post('other'))),
            'Amount' => trim($this->input->post('Amount')),
            'syfile' => trim($this->input->post('syfile')),
            'forwhat' => trim($this->input->post('for')),
            'Department' => 'Juniorhigh'
        );
        $this->db->where('miscID', $miscID);
        return $this->db->update('miscellaneous',$data);
    }


    public function deleteJuniorhighMiscellaneous($miscID){
        $this->db->where('miscID', $miscID);
        return $this->db->delete('miscellaneous');
    }


















    public function viewSeniorhighMiscellaneous(){
        $this->db->where('Department','Seniorhigh');
        $query = $this->db->get('miscellaneous');
        return $query->result_array();
    }


    public function addSeniorhighMiscellaneous(){
        $data = array(
            'Miscellaneous' => trim(ucwords($this->input->post('misc'))),
            'other' => trim(ucwords($this->input->post('other'))),
            'Amount' => trim($this->input->post('amount')),
            'syfile' => trim($this->input->post('sy')),
            'forwhat' => trim($this->input->post('for')),
            'Department' => 'Seniorhigh'
        );
        return $this->db->insert('miscellaneous',$data);
    }


    public function updateSeniorhighMiscellaneous($miscID){
        $data = array(
            'Miscellaneous' => trim(ucwords($this->input->post('Miscellaneous'))),
            'other' => trim(ucwords($this->input->post('other'))),
            'Amount' => trim($this->input->post('Amount')),
            'syfile' => trim($this->input->post('syfile')),
            'forwhat' => trim($this->input->post('for')),
            'Department' => 'Seniorhigh'
        );
        $this->db->where('miscID', $miscID);
        return $this->db->update('miscellaneous',$data);
    }


    public function deleteSeniorhighMiscellaneous($miscID){
        $this->db->where('miscID', $miscID);
        return $this->db->delete('miscellaneous');
    }


    


}
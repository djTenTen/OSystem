<?php
class Subjects_model extends CI_Model{

    public function __construct(){
        $this->load->database();
    }

    public function viewCollegeSubjects(){
        $query = $this->db->query('select * from subject_college limit 20');
        return $query->result_array();
    }

    public function searchCollegeSubjects($keyword){
        $query = $this->db->query("select * from subject_college where concat (subjectCode,subjectDesc) like '%$keyword%' ");
        return $query->result_array();
    }


    public function insertCollegeSubjects(){

        $lec = trim(strtoupper($this->input->post('lec')));
        $comunit = trim(strtoupper($this->input->post('labcom')));
        $noncomunit =  trim(strtoupper($this->input->post('labnoncom')));
        $unit = $lec +  $comunit + $noncomunit;

        $data = array(
            'subjectCode' => trim(strtoupper($this->input->post('subjectCode'))),
            'subjectDesc' => trim(ucwords($this->input->post('subjectDesc'))),
            'lec' => trim(strtoupper($this->input->post('lec'))),
            'labComputer' => trim(strtoupper($this->input->post('labcom'))),
            'labNonComputer' => $this->input->post('labnoncom'),
            'units' => $unit,
            'computeunits' => $this->input->post('computunits'),
            'prereq' => trim($this->input->post('prereq')),
            'fee' => trim($this->input->post('fee'))
        );
        return $this->db->insert('subject_college',$data);
    
    }

    public function updateCollegeSubjects($subjectID){

        $lec = trim(strtoupper($this->input->post('lec')));
        $comunit = trim(strtoupper($this->input->post('labComputer')));
        $noncomunit =  trim(strtoupper($this->input->post('labNonComputer')));
        $unit = $lec +  $comunit + $noncomunit;

        $data = array(
            'subjectCode' => trim(strtoupper($this->input->post('subjectCode'))),
            'subjectDesc' => trim(ucwords($this->input->post('subjectDesc'))),
            'lec' => trim(strtoupper($this->input->post('lec'))),
            'labComputer' => trim(strtoupper($this->input->post('labComputer'))),
            'labNonComputer' => $this->input->post('labNonComputer'),
            'units' => $unit,
            'computeunits' => $this->input->post('computunits'),
            'prereq' => trim($this->input->post('prereq')),
            'fee' => trim($this->input->post('fee'))
        );
        $this->db->where('subjectID', $subjectID);
        return $this->db->update('subject_college',$data);

    }


    public function deleteCollegeSubjects($subjectID){

        $this->db->where('subjectID', $subjectID);
        return $this->db->delete('subject_college');
        
    }















    public function viewGradeschoolSubjects(){
        $query = $this->db->query('select * from subject_gradeschool limit 20');
        return $query->result_array();
    }

    public function searchGradeschoolSubjects($keyword){
        $query = $this->db->query("select * from subject_gradeschool where concat (subjectCode,subjectDesc) like '%$keyword%' ");
        return $query->result_array();
    }


    public function insertGradeschoolSubjects(){

        $data = array(
            'subjectCode' => trim(strtoupper($this->input->post('subjectCode'))),
            'subjectDesc' => trim(ucwords($this->input->post('subjectDesc'))),
            'hrs' => trim(strtoupper($this->input->post('hrs'))),
            'prereq' => trim($this->input->post('prereq')),
            'fee' => trim($this->input->post('fee'))
        );
        return $this->db->insert('subject_gradeschool',$data);
    
    }

    public function updateGradeschoolSubjects($subjectID){

        $data = array(
            'subjectCode' => trim(strtoupper($this->input->post('subjectCode'))),
            'subjectDesc' => trim(ucwords($this->input->post('subjectDesc'))),
            'hrs' => trim(strtoupper($this->input->post('hrs'))),
            'prereq' => trim($this->input->post('prereq')),
            'fee' => trim($this->input->post('fee'))
        );
        $this->db->where('subjectID', $subjectID);
        return $this->db->update('subject_gradeschool',$data);

    }


    public function deleteGradeschoolSubjects($subjectID){

        $this->db->where('subjectID', $subjectID);
        return $this->db->delete('subject_gradeschool');

        
    }












    public function viewJuniorhighSubjects(){
        $query = $this->db->query('select * from subject_juniorhigh order by subjectID desc limit 20');
        return $query->result_array();
    }

    public function searchJuniorhighSubjects($keyword){
        $query = $this->db->query("select * from subject_juniorhigh where concat (subjectCode,subjectDesc) like '%$keyword%' ");
        return $query->result_array();
    }


    public function insertJuniorhighSubjects(){

        $data = array(
            'subjectCode' => trim(strtoupper($this->input->post('subjectCode'))),
            'subjectDesc' => trim(ucwords($this->input->post('subjectDesc'))),
            'hrs' => trim(strtoupper($this->input->post('hrs'))),
            'prereq' => trim($this->input->post('prereq')),
            'fee' => trim($this->input->post('fee'))
        );
        return $this->db->insert('subject_juniorhigh',$data);
    
    }

    public function updateJuniorhighSubjects($subjectID){
        
        $data = array(
            'subjectCode' => trim(strtoupper($this->input->post('subjectCode'))),
            'subjectDesc' => trim(ucwords($this->input->post('subjectDesc'))),
            'hrs' => trim(strtoupper($this->input->post('hrs'))),
            'prereq' => trim($this->input->post('prereq')),
            'fee' => trim($this->input->post('fee'))
        );
        $this->db->where('subjectID', $subjectID);
        return $this->db->update('subject_juniorhigh',$data);

    }


    public function deleteJuniorhighSubjects($subjectID){

        $this->db->where('subjectID', $subjectID);
        return $this->db->delete('subject_juniorhigh');

    }

    
    
    

    public function viewSeniorhighSubjects(){
        $query = $this->db->query('select * from subject_seniorhigh order by subjectID desc limit 20');
        return $query->result_array();
    }

    public function searchSeniorhighSubjects($keyword){
        $query = $this->db->query("select * from subject_seniorhigh where concat (subjectCode,subjectDesc) like '%$keyword%' ");
        return $query->result_array();
    }


    public function insertSeniorhighSubjects(){
        $data = array(
            'category' => trim(strtoupper($this->input->post('category'))),
            'subjectCode' => trim(strtoupper($this->input->post('subjectCode'))),
            'subjectDesc' => trim(ucwords($this->input->post('subjectDesc'))),
            'hrs' => trim(strtoupper($this->input->post('hrs'))),
            'prereq' => trim($this->input->post('prereq')),
            'fee' => trim($this->input->post('fee'))
        );
        return $this->db->insert('subject_seniorhigh',$data);
    
    }

    public function updateSeniorhighSubjects($subjectID){

        $data = array(
            'category' => trim(strtoupper($this->input->post('category'))),
            'subjectCode' => trim(strtoupper($this->input->post('subjectCode'))),
            'subjectDesc' => trim(ucwords($this->input->post('subjectDesc'))),
            'hrs' => trim(strtoupper($this->input->post('hrs'))),
            'prereq' => trim($this->input->post('prereq')),
            'fee' => trim($this->input->post('fee'))
        );
        $this->db->where('subjectID', $subjectID);
        return $this->db->update('subject_seniorhigh',$data);

    }


    public function deleteSeniorhighSubjects($subjectID){

        $this->db->where('subjectID', $subjectID);
        return $this->db->delete('subject_seniorhigh');

        
    }



}
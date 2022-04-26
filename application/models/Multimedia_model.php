<?php
class Multimedia_model extends CI_Model{

    public function __construct(){
        $this->load->database();
    }

    public function viewRequest(){
        $query = $this->db->query("select *,Studentno,FullName,Email, alumni.Contact,Batch
        from alumni,alumni_id
        where alumni.alumniID = alumni_id.AlumniID limit 100");
        return $query->result_array();
    }


    public function viewRequestSearch($keyword){
        $query = $this->db->query("select *,Studentno,FullName
        from alumni,alumni_id
        where FullName like '%$keyword%'
        and alumni.alumniID = alumni_id.AlumniID");
        return $query->result_array();
    }



    

    public function markforPickup($ID){
        $data = array(
            'isDone' => 'Yes'
        );
        $this->db->where('RequestID', $ID);
        $this->db->update('alumni_id', $data);
    }

    public function markDone($ID){
        $data = array(
            'isPicked' => 'Yes'
        );
        $this->db->where('RequestID', $ID);
        $this->db->update('alumni_id', $data);
    }


    public function deleteRequest($ID){
        $this->db->where('RequestID', $ID);
        $this->db->delete('alumni_id');
    }


    


    

}
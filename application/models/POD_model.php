<?php
class POD_model extends CI_Model{

    public function __construct(){
        $this->load->database();
    }


    public function viewcollgestudents(){
        $query = $this->db->query("select *,CourseCode
        from students_college,courses
        where students_college.Course = courses.CourseID
        and isValidated != 'Dismiss' limit 0");
        return $query->result_array();
    }

    public function viewcollgestudentsSearch($keyword){
       
        $query = $this->db->query("select *,CourseCode,CourseDesc
        from students_college,courses
        where concat(admissionID,StudentNo,FullName) like '%$keyword%'
        and students_college.Course = courses.CourseID
        and isValidated != 'Dismiss'");
        return $query->result_array();

    }

    public function getinformationCollege($admissoinID){

        $query = $this->db->query("select *,CourseCode,CourseDesc
        from students_college,courses
        where students_college.Course = courses.CourseID
        and isValidated != 'Dismiss'
        and admissionID = '$admissoinID'");
        return $query->row_array();

    }

    public function saveOffenses($admissionID,$dpt){
        
        date_default_timezone_set("Asia/Singapore");
        $date = date("m/d/Y");
        $dateH= $this->input->post('mm').'/'.$this->input->post('dd').'/'.$this->input->post('yy');

        $selectsy = $this->db->query("select schoolyear from sy where active = 'Yes'");
        foreach($selectsy->result_array() as $ssy){
            $sy = $ssy['schoolyear'];
        }

        $data = array(
            'Student' => $admissionID,
            'dpt' => $dpt,
            'Offense' => ucwords($this->input->post('offense')),
            'Case' => ucwords($this->input->post('case')),
            'Reason' => ucwords($this->input->post('reason')),
            'Sunction' => ucwords($this->input->post('sunction')),
            'DateHappened' => $dateH,
            'DateLogged' => $date,
            'sy' => $sy,
        );

        $this->db->insert('offenses', $data);

        $select = $this->db->query("select offenseID from offenses order by offenseID desc limit 1");
        foreach($select->result_array() as $row){
            $offenseID = $row['offenseID'];
        }

        $config['allowed_types'] = 'pdf'; 
        $config['upload_path'] = './podfiles/';  
        $config['file_name'] = $offenseID;
        $this->load->library('upload',$config);

        if ($this->upload->do_upload('file')) {
            $this->upload->data();
        }else{
            return $this->upload->display_errors();
        }

    }


    public function caseClosed($offenseID,$dpt){

        $this->db->query("update offenses set Status= 'Closed' where offenseID = '$offenseID' and dpt = '$dpt'");

    }


    public function uploadPDF($offenseID){

        $config['allowed_types'] = 'pdf'; 
        $config['upload_path'] = './podfiles/';  
        $config['file_name'] = $offenseID;
        $this->load->library('upload',$config);

        if ($this->upload->do_upload('file')) {
            $this->upload->data();
        }else{
            return $this->upload->display_errors();
        }

    }


    public function  deleteOffense($offenseID,$dpt){

        $this->db->query("delete from offenses where offenseID = '$offenseID' and dpt = '$dpt'");
        $this->load->helper("file");
        unlink('./podfiles/'.$offenseID.'.pdf');

    }



    





















    //Senior High
    public function viewseniorhighstudents(){
        $query = $this->db->query("select *
        from students_seniorhigh
        where isValidated != 'Dismiss' limit 0");
        return $query->result_array();
    }

    public function viewseniorhighstudentsSearch($keyword){
       
        $query = $this->db->query("select *
        from students_seniorhigh
        where concat(admissionID,StudentNo,FullName) like '%$keyword%'
        and isValidated != 'Dismiss'");
        return $query->result_array();

    }

    public function getinformationSeniorhigh($admissoinID){

        $query = $this->db->query("select *
        from students_seniorhigh
        where isValidated != 'Dismiss'
        and admissionID = '$admissoinID'");
        return $query->row_array();

    }
























    //Junior high

    public function viewjuniorhighstudents(){
        $query = $this->db->query("select *
        from students_juniorhigh
        where isValidated != 'Dismiss' limit 0");
        return $query->result_array();
    }

    public function viewjuniorhighstudentsSearch($keyword){
       
        $query = $this->db->query("select *
        from students_juniorhigh
        where concat(admissionID,StudentNo,FullName) like '%$keyword%'
        and isValidated != 'Dismiss'");
        return $query->result_array();

    }


    public function getinformationJuniorhigh($admissoinID){

        $query = $this->db->query("select *
        from students_juniorhigh
        where isValidated != 'Dismiss'
        and admissionID = '$admissoinID'");
        return $query->row_array();

    }























    public function viewgradeschoolstudents(){
        $query = $this->db->query("select *
        from students_gradeschool
        where isValidated != 'Dismiss' limit 0");
        return $query->result_array();
    }

    public function viewgradeschoolstudentsSearch($keyword){
       
        $query = $this->db->query("select *
        from students_gradeschool
        where concat(admissionID,StudentNo,FullName) like '%$keyword%'
        and isValidated != 'Dismiss'");
        return $query->result_array();

    }


    public function getinformationGradeschool($admissoinID){

        $query = $this->db->query("select *
        from students_gradeschool
        where isValidated != 'Dismiss'
        and admissionID = '$admissoinID'");
        return $query->row_array();

    }


    



   
    

}
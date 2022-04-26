<?php
class MIS_model extends CI_Model{

    public function __construct(){
        $this->load->database();
    }

    public function viewLogs(){
        $query = $this->db->query('select * from mistransactions');
        return $query->result_array();
    }


    public function insertRequest(){

        date_default_timezone_set("Asia/Singapore");
        $datenow = date("m/d/Y");
        $timenow = date("H:i:s");



        $data = array(
            'Name' => trim(ucfirst($this->input->post('name'))),
            'Purpose' => trim(ucfirst($this->input->post('purpose'))),
            'ofWhat' => trim(ucfirst($this->input->post('what'))),
            'Where' => trim(ucfirst($this->input->post('where'))),
            'Action' => trim(ucfirst($this->input->post('action'))),
            'Date' => $datenow,
            'Time' => $timenow
        );

        $this->db->insert('mistransactions', $data);
    }



    public function CollegeStudents(){

        $query = $this->db->query("select * 
        from students_college limit 0");
        return $query->result_array();

    }

    public function CollegeStudentsSearch($keyword){

        $query = $this->db->query("select * 
        from students_college,courses
        where students_college.Course = courses.CourseID 
        and (LastName like '%$keyword%'
        or FirstName like '%$keyword%'
        or FullName like '%$keyword%'
        or admissionID like '%$keyword%'
        or StudentNO like '%$keyword%')");
        return $query->result_array();


    }


    public function resetCollege($admissionID){

        $stud = $this->db->query("select Level,Semester from students_college where admissionID = '$admissionID'");
        $res = $stud->row();
        if (isset($res)){
            $level = $res->Level;
            $sem = $res->Semester;
        }

        $data = array(
            'isValidated' => 'No',
            'isEvaluated' => 'No',
            'isAssess' => 'No',
        );

        $this->db->where('admissionID', $admissionID);
        $this->db->update('students_college',$data);

        $this->db->query("delete from student_subject_college
        where admissionNO = '$admissionID'
        and year = '$level'
        and semester = '$sem'");


    }






















    // SENIORHIGH

    public function seniorhighStudents(){

        $query = $this->db->query("select * 
        from students_seniorhigh limit 0");
        return $query->result_array();

    }

    public function seniorhighStudentsSearch($keyword){

        $query = $this->db->query("select * 
        from students_seniorhigh
        where LastName like '%$keyword%'
        or FirstName like '%$keyword%'
        or FullName like '%$keyword%'
        or admissionID like '%$keyword%'
        or StudentNO like '%$keyword%'");
        return $query->result_array();

    }

    public function resetSeniorhigh($admissionID){

        $stud = $this->db->query("select Level,Semester from students_seniorhigh where admissionID = '$admissionID'");
        $res = $stud->row();
        if (isset($res)){
            $level = $res->Level;
            $sem = $res->Semester;
        }

        $data = array(
            'isValidated' => 'No',
            'isEvaluated' => 'No',
            'isAssess' => 'No',
        );

        $this->db->where('admissionID', $admissionID);
        $this->db->update('students_seniorhigh',$data);

        $this->db->query("delete from student_subject_seniorhigh
        where admissionNO = '$admissionID'
        and year = '$level'
        and semester = '$sem'");


    }





















    public function juniorhighStudents(){

        $query = $this->db->query("select * 
        from students_juniorhigh limit 0");
        return $query->result_array();

    }

    public function juniorhighStudentsSearch($keyword){

        $query = $this->db->query("select * 
        from students_juniorhigh
        where LastName like '%$keyword%'
        or FirstName like '%$keyword%'
        or FullName like '%$keyword%'
        or admissionID like '%$keyword%'
        or StudentNO like '%$keyword%'");
        return $query->result_array();

    }



    public function resetJuniorhigh($admissionID){

        $stud = $this->db->query("select Level from students_juniorhigh where admissionID = '$admissionID'");
        $res = $stud->row();
        if (isset($res)){
            $level = $res->Level;
        }

        $data = array(
            'isValidated' => 'No',
            'isEvaluated' => 'No',
            'isAssess' => 'No',
        );

        $this->db->where('admissionID', $admissionID);
        $this->db->update('students_juniorhigh',$data);

        $this->db->query("delete from student_subject_juniorhigh
        where admissionNO = '$admissionID'
        and year = '$level'");


    }

    

}
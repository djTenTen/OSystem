<?php
class Cashier_model extends CI_Model{

    public function __construct(){
        $this->load->database();
    }



    //COLLEGE
    public function viewassesdCollege(){
        $query = $this->db->query("select admissionID,extension,StudentNo,FullName,CourseDesc,Level,Semester 
        from students_college,courses 
        where students_college.Course = courses.CourseID 
        and isEvaluated ='Yes'
        and isAssess = 'Yes'
        and isEnrolled = 'No' order by LastName asc");

        return $query->result_array();
    }


    public function enrollCollege($admissionID){

        date_default_timezone_set("Asia/Singapore");
        $date = date("m/d/Y");

        $data = array(
            'dateofEnrolled' => $date,
            'isEnrolled' => 'Yes',
            'isEnrolled2' => 'Yes'
        );

        $this->db->where('admissionID',$admissionID);
        return $this->db->update('students_college',$data);
    }

    public function courses(){
        $query = $this->db->get('courses');
        return $query->result_array();
    }













    //SENIORHIGH
    public function viewassesdSeniorhigh(){
        $query = $this->db->query("select admissionID,extension,StudentNo,FullName,Strand,Level,Semester 
        from students_seniorhigh 
        where isEvaluated ='Yes'
        and isAssess = 'Yes'
        and isEnrolled = 'No' order by LastName asc");

        return $query->result_array();
    }

    public function enrollSeniorhigh($admissionID){

        date_default_timezone_set("Asia/Singapore");
        $date = date("m/d/Y");

        $data = array(
            'dateofEnrolled' => $date,
            'isEnrolled' => 'Yes'
        );

        $this->db->where('admissionID',$admissionID);
        return $this->db->update('students_seniorhigh',$data);
    }

















    //JUNIORHIGH
    public function viewassesdJuniorhigh(){
        $query = $this->db->query("select admissionID,extension,StudentNo,FullName,Level,Section
        from students_juniorhigh 
        where isEvaluated ='Yes'
        and isAssess = 'Yes'
        and isEnrolled = 'No'
        order by LastName asc");

        return $query->result_array();
    }

    public function enrollJuniorhigh($admissionID){

        date_default_timezone_set("Asia/Singapore");
        $date = date("m/d/Y");

        $data = array(
            'dateofEnrolled' => $date,
            'isEnrolled' => 'Yes'
        );

        $this->db->where('admissionID',$admissionID);
        return $this->db->update('students_juniorhigh',$data);
    }














    //GRADESCHOOL
    public function viewassesdGradeschool(){
        $query = $this->db->query("select admissionID,extension,StudentNo,FullName,Level,Section
        from students_gradeschool 
        where isEvaluated ='Yes'
        and isAssess = 'Yes'
        and isEnrolled = 'No'
        order by LastName asc");

        return $query->result_array();
    }

    public function enrollGradeschool($admissionID){

        date_default_timezone_set("Asia/Singapore");
        $date = date("m/d/Y");

        $data = array(
            'dateofEnrolled' => $date,
            'isEnrolled' => 'Yes'
        );

        $this->db->where('admissionID',$admissionID);
        return $this->db->update('students_gradeschool',$data);
    }

















}
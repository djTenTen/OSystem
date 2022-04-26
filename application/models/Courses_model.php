<?php
class Courses_model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }

    public function viewCourses(){
        $query = $this->db->get('courses');
        return $query->result_array();
    }

    public function searchCourse($keyword){

        $query = $this->db->query("select * from courses where concat(CourseCode,CourseDesc) like '%$keyword%'");
        return $query->result_array();

    }

    public function insertCourse(){

        $data = array(
            'CourseCode' => trim(strtoupper($this->input->post('courseCode'))),
            'CourseDesc' => trim(strtoupper($this->input->post('courseDesc'))),
            'CollegeDPT' => strtoupper($this->input->post('collegeDPT'))
        );
        return $this->db->insert('courses',$data);

    }

    public function updateCourse($courseID){

        $data = array(
            'CourseCode' => trim(strtoupper($this->input->post('CourseCode'))),
            'CourseDesc' => trim(strtoupper($this->input->post('CourseDesc'))),
            'CollegeDPT' => strtoupper($this->input->post('collegeDPT'))
        );

        $this->db->where('CourseID',$courseID);
        return $this->db->update('courses',$data);

    }

    public function deleteCourse($courseID){

        $this->db->where('CourseID',$courseID);
        return $this->db->delete('courses');

    }
    
}
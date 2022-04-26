<?php
class Deans_model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }


    public function showClassList(){

        $query = $this->db->query("select DISTINCT student_subject_college.curriculumID,student_subject_college.subjectID,subjectCode,subjectDesc,Day,Time,student_subject_college.year,semester,FullName,Section,CourseCode
        from student_subject_college,subject_college,curriculum_subjectcollege,users,curriculum_college,courses
        where student_subject_college.subjectID = subject_college.subjectID
        and student_subject_college.curriculumID = curriculum_subjectcollege.curriculumID
        and student_subject_college.subjectID = curriculum_subjectcollege.subjectID
        and student_subject_college.curriculumID = curriculum_college.curriculumID
        and curriculum_college.courseID = courses.CourseID
        and semester = '2ND SEM'
        and student_subject_college.Teacher = `users`.userID
        order by year asc");
        return $query->result_array();

    }


    public function exportClassListCollege($curriculumID,$subjectID){

        $query = $this->db->query("select extension,StudentNo, FullName,CourseDesc,Level,students_college.Semester,Contact,admissionID
        from students_college,courses,student_subject_college
        where students_college.Course = courses.CourseID
        and students_college.isEnrolled = 'Yes'
        and students_college.admissionID = student_subject_college.admissionNO
        and student_subject_college.curriculumID = '$curriculumID' 
        and student_subject_college.subjectID = '$subjectID'");
            
        return $query->result_array();

    }


}
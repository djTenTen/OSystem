<?php
class Students_model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }

    public function studentsInformation($fn){
        
        if($_SESSION['Collegedpt'] == 'Yes'){
            $query = $this->db->query("select * from students_college,courses
            where FullName = '$fn' and students_college.Course = courses.CourseID");
            return $query->row_array();
        }elseif($_SESSION['SeniorHighdpt'] == 'Yes'){
            $query = $this->db->query("select * from students_seniorhigh
            where FullName = '$fn'");
            return $query->row_array();
        }elseif($_SESSION['JuniorHighdpt'] == 'Yes'){
            $query = $this->db->query("select * from students_juniorhigh
            where FullName = '$fn'");
            return $query->row_array();
        }elseif($_SESSION['GradeSchooldpt'] == 'Yes'){
            $query = $this->db->query("select * from students_gradeschool
            where FullName = '$fn'");
            return $query->row_array();
        }

    }



    public function viewStudentSubjectsCollege($admissionID,$sy,$sem){
        $query = $this->db->query("select student_subject_college.subjectID,subjectCode,SubjectDesc,FullName,Prelim,Midterm,Finals,Grade,Remarks,isReleasing,Equivalent
        from student_subject_college,subject_college,users
        where student_subject_college.subjectID = subject_college.subjectID
        and student_subject_college.Teacher = users.userID
        and student_subject_college.sy = '$sy'
        and student_subject_college.semester = '$sem'
        and admissionNO = '$admissionID'");
        return $query->result_array();
    }

    public function viewSYCollege(){
        $query = $this->db->query("select DISTINCT sy from student_subject_college");
        return $query->result_array();
    }

    public function viewSemCollege(){
        $query = $this->db->query("select DISTINCT semester from student_subject_college");
        return $query->result_array();
    }

    public function getReleasingc(){
        $query = $this->db->query("select Releasing from zzzrelease where dpt = 'College'");
        return $query->row_array();
    }





















    public function viewStudentSubjectsSeniorhigh($admissionID,$sy,$sem){
        $query = $this->db->query("select student_subject_seniorhigh.subjectID,category,subjectCode,SubjectDesc,Day,Time,FullName,1Q,2Q,Grade,Remarks,isReleasing
        from student_subject_seniorhigh,subject_seniorhigh,curriculum_subjectseniorhigh,users
        where student_subject_seniorhigh.subjectID = subject_seniorhigh.subjectID
        and student_subject_seniorhigh.curriculumID = curriculum_subjectseniorhigh.curriculumID
        and student_subject_seniorhigh.subjectID = curriculum_subjectseniorhigh.subjectID
        and student_subject_seniorhigh.Teacher = users.userID
        and student_subject_seniorhigh.sy = '$sy'
        and student_subject_seniorhigh.semester = '$sem'
        and admissionNO = '$admissionID'");
        return $query->result_array();
    }

    public function computeAverageSeniorhigh($admissionID,$sy,$sem){
        $query = $this->db->query("select   avg(1Q) as aq1, avg(2Q) as aq2, avg(Grade) as genav 
        from student_subject_seniorhigh
        where student_subject_seniorhigh.sy = '$sy'
        and student_subject_seniorhigh.semester = '$sem'
        and admissionNO = '$admissionID'");
        return $query->row_array();
    }


    public function viewSYshs(){
        $query = $this->db->query("select DISTINCT sy from student_subject_seniorhigh");
        return $query->result_array();
    }

    public function viewSemshs(){
        $query = $this->db->query("select DISTINCT semester from student_subject_seniorhigh");
        return $query->result_array();
    }


    public function getReleasingshs(){
        $query = $this->db->query("select Releasing from zzzrelease where dpt = 'Seniorhigh'");
        return $query->row_array();
    }
























    public function viewStudentSubjectsJuniorhigh($admissionID,$sy){
        $query = $this->db->query("select student_subject_juniorhigh.subjectID,subjectCode,SubjectDesc,Day,Time,FullName,G1,G2,G3,G4,Grade,Remarks,isReleasing
        from student_subject_juniorhigh,subject_juniorhigh,curriculum_subjectjuniorhigh,users
        where student_subject_juniorhigh.subjectID = subject_juniorhigh.subjectID
        and student_subject_juniorhigh.curriculumID = curriculum_subjectjuniorhigh.curriculumID
        and student_subject_juniorhigh.subjectID = curriculum_subjectjuniorhigh.subjectID
        and student_subject_juniorhigh.Teacher = users.userID
        and student_subject_juniorhigh.sy = '$sy'
        and admissionNO = '$admissionID'");
        return $query->result_array();
    }


    public function viewSYjhs(){
        $query = $this->db->query("select DISTINCT sy from student_subject_juniorhigh");
        return $query->result_array();
    }


    public function computeAverageJuniorhigh($admissionID,$sy){
        $query = $this->db->query("select   avg(G1) as aq1, avg(G2) as aq2, avg(G3) as aq3,avg(G4) as aq4, avg(Grade) as genav 
        from student_subject_juniorhigh, subject_juniorhigh
        where student_subject_juniorhigh.sy = '$sy'
        and admissionNO = '$admissionID'
        and student_subject_juniorhigh.subjectID = subject_juniorhigh.subjectID
        and subject_juniorhigh.isGenInclude = 'Yes'");
    
        return $query->row_array();
    }

    public function getReleasingjhs(){
        $query = $this->db->query("select Releasing from zzzrelease where dpt = 'Juniorhigh'");
        return $query->row_array();
    }




















    public function viewStudentSubjectsGradeschool($admissionID,$sy){
        $query = $this->db->query("select student_subject_gradeschool.subjectID,subjectCode,SubjectDesc,Day,Time,FullName,G1,G2,G3,G4,Grade,Remarks,isReleasing
        from student_subject_gradeschool,subject_gradeschool,curriculum_subjectgradeschool,users
        where student_subject_gradeschool.subjectID = subject_gradeschool.subjectID
        and student_subject_gradeschool.curriculumID = curriculum_subjectgradeschool.curriculumID
        and student_subject_gradeschool.subjectID = curriculum_subjectgradeschool.subjectID
        and student_subject_gradeschool.Teacher = users.userID
        and student_subject_gradeschool.sy = '$sy'
        and admissionNO = '$admissionID'");
        return $query->result_array();
    }


    public function viewSYgs(){
        $query = $this->db->query("select DISTINCT sy from student_subject_gradeschool");
        return $query->result_array();
    }


    public function computeAveragegradeschool($admissionID,$sy){
        $query = $this->db->query("select   avg(G1) as aq1, avg(G2) as aq2, avg(G3) as aq3,avg(G4) as aq4, avg(Grade) as genav 
        from student_subject_gradeschool
        where student_subject_gradeschool.sy = '$sy'
        and admissionNO = '$admissionID'");
        return $query->row_array();
    }
    
    public function getReleasinggs(){
        $query = $this->db->query("select Releasing from zzzrelease where dpt = 'Gradeschool'");
        return $query->row_array();
    }
















}
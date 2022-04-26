<?php
class Egrade_model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }

    public function collegeProf(){

        $query = $this->db->query("select distinct student_subject_college.Teacher,FullName
        from users,student_subject_college
        where users.Position = 9
        and users.Collegedpt = 'Yes'
        and student_subject_college.Teacher = users.userID
        order by FullName asc");
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

    public function getInstructor($teacherID){
        $query = $this->db->query("select FullName 
        from users
        where userID = '$teacherID'");
        return $query->row_array();
    }

    public function collegeProfSubjects($teacherID,$sy,$sem){
        $query = $this->db->query("select Distinct subjectDesc, student_subject_college.subjectID,student_subject_college.curriculumID,curriculum_college.courseID,curriculum_college.Year,Section,Sem,CourseDesc,CourseCode
        from student_subject_college,subject_college,courses,curriculum_college
        where subject_college.subjectID = student_subject_college.subjectID
        and student_subject_college.curriculumID = curriculum_college.curriculumID
        and curriculum_college.`courseID` = courses.`CourseID`
        and Teacher = '$teacherID'
        and student_subject_college.sy = '$sy'
        and semester = '$sem' order by subjectDesc asc");
        return $query->result_array();
    }

    public function collegeClass(){

        $uid = $_SESSION['userid'];
        $query = $this->db->query("select curriculum_subjectcollege.curriculumID,curriculum_subjectcollege.subjectID,subjectDesc,CourseCode,CourseDesc,subjectDesc,Day,Time,Prof
        from `curriculum_subjectcollege`,subject_college,curriculum_college,courses
        where Prof = '$uid'
        and `subject_college`.`subjectID` = curriculum_subjectcollege.subjectID
        and curriculum_subjectcollege.`curriculumID` = `curriculum_college`.`curriculumID`
        and curriculum_college.`courseID` = courses.`CourseID`");
        return $query->result_array();

    }

    // VIWING OF CLASSLIST VIA PROFESSOR
    public function collegeClassList($curriculumID,$subjectID){

        $query = $this->db->query("select studentsubjectID,FullName,studentnumber,curriculumID,subjectID,year,student_subject_college.Semester,Prelim,Midterm,Finals,Grade,Remarks
        from student_subject_college, students_college
        where curriculumID='$curriculumID'
        and subjectID = '$subjectID'
        and student_subject_college.admissionNO = students_college.admissionID 
        and isEnrolled2 = 'Yes' order by FullName asc");
            
        return $query->result_array();
 
    }


    public function updateGradeCollege($studentsubjectID,$remarks,$fgrade){

        // $query = $this->db->query("");
        $Prelim = trim(strtoupper($this->input->post('Prelim')));
        $Midterm = trim(strtoupper($this->input->post('Midterm')));
        $Finals = trim(strtoupper($this->input->post('Finals')));
 
         $data = array(
             'Prelim' => $Prelim,
             'Midterm' => $Midterm,
             'Finals' => $Finals,
             'Grade' => $fgrade,
             'Remarks' => $remarks
         );
 
         $this->db->where('studentsubjectID',$studentsubjectID);
         $this->db->update('student_subject_college', $data);
 
 
 
     }




















     //SENIORHIGH
    public function profSeniorhigh(){

        $query = $this->db->query("select distinct student_subject_seniorhigh.Teacher,FullName
        from users,student_subject_seniorhigh
        where users.Position = 9
        and users.SeniorHighdpt = 'Yes'
        and student_subject_seniorhigh.Teacher = users.userID
        order by FullName asc");
        return $query->result_array();

    }


    public function viewSYSeniorhigh(){
        $query = $this->db->query("select DISTINCT sy from student_subject_seniorhigh");
        return $query->result_array();
    }

    public function viewSemSeniorhigh(){
        $query = $this->db->query("select DISTINCT semester from student_subject_seniorhigh");
        return $query->result_array();
    }

    public function getSeniorhighProf($teacherID){
        $query = $this->db->query("select FullName 
        from users
        where userID = '$teacherID'");
        return $query->row_array();
    }


    public function seniorhighProfSubjects($teacherID,$sy,$sem){
        $query = $this->db->query("select Distinct subjectDesc, student_subject_seniorhigh.subjectID,student_subject_seniorhigh.curriculumID,curriculum_seniorhigh.Year,Section,Sem
        from student_subject_seniorhigh,subject_seniorhigh,curriculum_seniorhigh
        where subject_seniorhigh.subjectID = student_subject_seniorhigh.subjectID
        and student_subject_seniorhigh.curriculumID = curriculum_seniorhigh.curriculumID
        and Teacher = '$teacherID'
        and student_subject_seniorhigh.sy = '$sy'
        and semester = '$sem' order by subjectDesc asc");
        return $query->result_array();
    }


    public function seniorhighClassList($curriculumID,$subjectID){

        $query = $this->db->query("select studentsubjectID,FullName,studentnumber,curriculumID,subjectID,year,student_subject_seniorhigh.Semester,1Q,2Q,Grade,Remarks
        from student_subject_seniorhigh, students_seniorhigh
        where curriculumID='$curriculumID'
        and subjectID = '$subjectID'
        and student_subject_seniorhigh.admissionNO = students_seniorhigh.admissionID 
        and isEnrolled = 'Yes' order by FullName asc");
        return $query->result_array();
 
    }





























    //JUNIORHIGH

    public function profJuniorhigh(){

        $query = $this->db->query("select distinct student_subject_juniorhigh.Teacher,FullName
        from users,student_subject_juniorhigh
        where users.Position = 9
        and users.juniorhighdpt = 'Yes'
        and student_subject_juniorhigh.Teacher = users.userID
        order by FullName asc");
        return $query->result_array();

    }


    public function viewSYJuniorhigh(){
        $query = $this->db->query("select DISTINCT sy from student_subject_juniorhigh");
        return $query->result_array();
    }


    public function juniorhighProfSubjects($teacherID,$sy){
        $query = $this->db->query("select Distinct subjectDesc, student_subject_juniorhigh.subjectID,student_subject_juniorhigh.curriculumID,curriculum_juniorhigh.Year,Section
        from student_subject_juniorhigh,subject_juniorhigh,curriculum_juniorhigh
        where subject_juniorhigh.subjectID = student_subject_juniorhigh.subjectID
        and student_subject_juniorhigh.curriculumID = curriculum_juniorhigh.curriculumID
        and Teacher = '$teacherID'
        and student_subject_juniorhigh.sy = '$sy'");
        return $query->result_array();
    }


    public function juniorhighClassList($curriculumID,$subjectID){

        $query = $this->db->query("select studentsubjectID,FullName,studentnumber,curriculumID,subjectID,year,G1,G2,G3,G4,Grade,Remarks
        from student_subject_juniorhigh, students_juniorhigh
        where curriculumID='$curriculumID'
        and subjectID = '$subjectID'
        and student_subject_juniorhigh.admissionNO = students_juniorhigh.admissionID 
        and isEnrolled = 'Yes' order by FullName asc");
        return $query->result_array();
 
    }



    
     






    //GRADE SCHOOL

    public function profGradeschool(){

        $query = $this->db->query("select distinct student_subject_gradeschool.Teacher,FullName
        from users,student_subject_gradeschool
        where users.Position = 9
        and users.gradeschooldpt = 'Yes'
        and student_subject_gradeschool.Teacher = users.userID
        order by FullName asc");
        return $query->result_array();

    }


    public function viewSYGradeschool(){
        $query = $this->db->query("select DISTINCT sy from student_subject_gradeschool");
        return $query->result_array();
    }


    public function gradeschoolProfSubjects($teacherID,$sy){
        $query = $this->db->query("select Distinct subjectDesc, student_subject_gradeschool.subjectID,student_subject_gradeschool.curriculumID,curriculum_gradeschool.Year,Section
        from student_subject_gradeschool,subject_gradeschool,curriculum_gradeschool
        where subject_gradeschool.subjectID = student_subject_gradeschool.subjectID
        and student_subject_gradeschool.curriculumID = curriculum_gradeschool.curriculumID
        and Teacher = '$teacherID'
        and student_subject_gradeschool.sy = '$sy'");
        return $query->result_array();
    }
    
    public function gradeschoolClassList($curriculumID,$subjectID){

        $query = $this->db->query("select studentsubjectID,FullName,studentnumber,curriculumID,subjectID,year,G1,G2,G3,G4,Grade,Remarks,sy
        from student_subject_gradeschool, students_gradeschool
        where curriculumID='$curriculumID'
        and subjectID = '$subjectID'
        and student_subject_gradeschool.admissionNO = students_gradeschool.admissionID 
        and isEnrolled = 'Yes' order by FullName asc");
        return $query->result_array();
 
    }










}
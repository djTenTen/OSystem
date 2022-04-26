<?php
class Teacher_model extends CI_Model{

    public function __construct(){
        $this->load->database();
    }

    public function collegeClass(){

        $uid = $_SESSION['userid'];
        $query = $this->db->query("select curriculum_subjectcollege.curriculumID,curriculum_subjectcollege.subjectID,subjectDesc,CourseCode,CourseDesc,subjectDesc,Day,Section,Time,Prof
        from `curriculum_subjectcollege`,subject_college,curriculum_college,courses
        where Prof = '$uid'
        and `subject_college`.`subjectID` = curriculum_subjectcollege.subjectID
        and curriculum_subjectcollege.`curriculumID` = `curriculum_college`.`curriculumID`
        and curriculum_college.`courseID` = courses.`CourseID`
        and curriculum_college.Sem = '2nd Sem'");
        return $query->result_array();

    }


    public function collegeClassList($curriculumID,$subjectID){

        $query = $this->db->query("select studentsubjectID,FullName,studentnumber,curriculumID,subjectID,year,sy,student_subject_college.Semester,Prelim,Midterm,Finals,Grade,Remarks
        from student_subject_college, students_college
        where curriculumID='$curriculumID'
        and subjectID = '$subjectID'
        and student_subject_college.admissionNO = students_college.admissionID 
        and sy = (select schoolyear from sy where active = 'Yes')
        and isEnrolled2 = 'Yes' order by FullName asc");
            
        return $query->result_array();
 
    }

    public function updateGradeCollege($studentsubjectID,$remarks,$fgrade,$equi){

       // $query = $this->db->query("");
       $Prelim = trim(strtoupper($this->input->post('Prelim')));
       $Midterm = trim(strtoupper($this->input->post('Midterm')));
       $Finals = trim(strtoupper($this->input->post('Finals')));

        $data = array(
            'Prelim' => $Prelim,
            'Midterm' => $Midterm,
            'Finals' => $Finals,
            'Grade' => $fgrade,
            'Equivalent' => $equi,
            'Remarks' => $remarks
        );

        $this->db->where('studentsubjectID',$studentsubjectID);
        $this->db->update('student_subject_college', $data);



    }



    public function collegeClassName($subjectID){

        $query = $this->db->query("select subjectDesc
        from `subject_college`
        where subjectID = '$subjectID'");
        return $query->row_array();

    }

    public function isEncodingc(){
        $query = $this->db->query("select Encoding from zzzencode where dpt = 'College'");
        return $query->row_array();
    }
















    //SHS PART

    public function seniorhighClassName($subjectID){

        $query = $this->db->query("select subjectDesc
        from `subject_seniorhigh`
        where subjectID = '$subjectID'");
        return $query->row_array();

    }

    public function seniorhighClass(){

        $uid = $_SESSION['userid'];
        $query = $this->db->query("select curriculum_subjectseniorhigh.curriculumID,curriculum_subjectseniorhigh.subjectID,subjectDesc,Strand,Section,year,subjectDesc,Day,Time,Prof
        from `curriculum_subjectseniorhigh`,subject_seniorhigh,curriculum_seniorhigh
        where Prof = '$uid'
        and `subject_seniorhigh`.`subjectID` = curriculum_subjectseniorhigh.subjectID
        and curriculum_subjectseniorhigh.`curriculumID` = `curriculum_seniorhigh`.`curriculumID`
        and curriculum_seniorhigh.Sem = '2nd Sem'");
        return $query->result_array();

    }

    public function seniorhighClassList($curriculumID,$subjectID){

        $query = $this->db->query("select studentsubjectID,FullName,studentnumber,curriculumID,subjectID,year,sy,student_subject_seniorhigh.Semester,1Q,2Q,Grade,Remarks
        from student_subject_seniorhigh, students_seniorhigh
        where curriculumID='$curriculumID'
        and subjectID = '$subjectID'
        and student_subject_seniorhigh.admissionNO = students_seniorhigh.admissionID
        and isEnrolled = 'Yes'
        and sy = (select schoolyear from sy where active = 'Yes')
        order by FullName asc");
            
        return $query->result_array();
 
    }


    public function updateGradeSeniorhigh($studentsubjectID,$remarks,$fgrade){

        $q1 = trim(strtoupper($this->input->post('1q')));
        $q2 = trim(strtoupper($this->input->post('2q')));

         $data = array(    
            '1Q' => $q1,
            '2Q' => $q2,
            'Grade' => $fgrade,
            'Remarks' => $remarks
         );
 
         $this->db->where('studentsubjectID',$studentsubjectID);
         $this->db->update('student_subject_seniorhigh', $data);
 
    }

    public function isEncodingshs(){
        $query = $this->db->query("select Encoding from zzzencode where dpt = 'Seniorhigh'");
        return $query->row_array();
    }














    public function juniorhighClassName($subjectID){

        $query = $this->db->query("select subjectDesc
        from `subject_juniorhigh`
        where subjectID = '$subjectID'");
        return $query->row_array();

    }


    public function juniorhighClass(){

        $uid = $_SESSION['userid'];
        $query = $this->db->query("select curriculum_subjectjuniorhigh.curriculumID,curriculum_subjectjuniorhigh.subjectID,subjectDesc,Section,year,subjectDesc,Day,Time,Prof
        from `curriculum_subjectjuniorhigh`,subject_juniorhigh,curriculum_juniorhigh
        where Prof = '$uid'
        and `subject_juniorhigh`.`subjectID` = curriculum_subjectjuniorhigh.subjectID
        and curriculum_subjectjuniorhigh.`curriculumID` = `curriculum_juniorhigh`.`curriculumID`");
        return $query->result_array();

    }


    
    public function juniorhighClassList($curriculumID,$subjectID){

        $query = $this->db->query("select studentsubjectID,FullName,studentnumber,curriculumID,subjectID,year,sy,G1,G2,G3,G4,Grade,Remarks
        from student_subject_juniorhigh, students_juniorhigh
        where curriculumID='$curriculumID'
        and subjectID = '$subjectID'
        and student_subject_juniorhigh.admissionNO = students_juniorhigh.admissionID
        and isEnrolled = 'Yes'
        and sy = (select schoolyear from sy where active = 'Yes')
        order by FullName asc");
            
        return $query->result_array();
 
    }

    public function updateGradeJuniorhigh($studentsubjectID,$remarks,$fgrade){

        $g1 = trim(strtoupper($this->input->post('g1')));
        $g2 = trim(strtoupper($this->input->post('g2')));
        $g3 = trim(strtoupper($this->input->post('g3')));
        $g4 = trim(strtoupper($this->input->post('g4')));

         $data = array(    
            'G1' => $g1,
            'G2' => $g2,
            'G3' => $g3,
            'G4' => $g4,
            'Grade' => $fgrade,
            'Remarks' => $remarks
         );
 
         $this->db->where('studentsubjectID',$studentsubjectID);
         $this->db->update('student_subject_juniorhigh', $data);

    }

    public function isEncodingjhs(){
        $query = $this->db->query("select Encoding from zzzencode where dpt = 'Juniorhigh'");
        return $query->row_array();
    }































    public function gradeschoolClassName($subjectID){

        $query = $this->db->query("select subjectDesc
        from `subject_gradeschool`
        where subjectID = '$subjectID'");
        return $query->row_array();

    }


    public function gradeschoolClass(){

        $uid = $_SESSION['userid'];
        $query = $this->db->query("select curriculum_subjectgradeschool.curriculumID,curriculum_subjectgradeschool.subjectID,subjectDesc,Section,year,subjectDesc,Day,Time,Prof
        from `curriculum_subjectgradeschool`,subject_gradeschool,curriculum_gradeschool
        where Prof = '$uid'
        and `subject_gradeschool`.`subjectID` = curriculum_subjectgradeschool.subjectID
        and curriculum_subjectgradeschool.`curriculumID` = `curriculum_gradeschool`.`curriculumID`");
        return $query->result_array();

    }


    public function gradeschoolClassList($curriculumID,$subjectID){

        $query = $this->db->query("select studentsubjectID,FullName,studentnumber,curriculumID,year,subjectID,sy,G1,G2,G3,G4,Grade,Remarks
        from student_subject_gradeschool, students_gradeschool
        where curriculumID='$curriculumID'
        and subjectID = '$subjectID'
        and student_subject_gradeschool.admissionNO = students_gradeschool.admissionID
        and isEnrolled = 'Yes'
        and sy = (select schoolyear from sy where active = 'Yes')
        order by FullName asc");
            
        return $query->result_array();
 
    }


    public function updateGradeGradeschool($studentsubjectID,$remarks,$fgrade){

        $g1 = trim(strtoupper($this->input->post('g1')));
        $g2 = trim(strtoupper($this->input->post('g2')));
        $g3 = trim(strtoupper($this->input->post('g3')));
        $g4 = trim(strtoupper($this->input->post('g4')));

         $data = array(    
            'G1' => $g1,
            'G2' => $g2,
            'G3' => $g3,
            'G4' => $g4,
            'Grade' => $fgrade,
            'Remarks' => $remarks
         );
 
         $this->db->where('studentsubjectID',$studentsubjectID);
         $this->db->update('student_subject_gradeschool', $data);

    }

    public function isEncodinggs(){
        $query = $this->db->query("select Encoding from zzzencode where dpt = 'Gradeschool'");
        return $query->row_array();
    }
    







    


    



}
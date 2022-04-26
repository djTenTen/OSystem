<?php
class Reports_model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }


    // COLLEGE
    public function getstudentsInfoCollege($admissionID){
        $query = $this->db->query("select *
        from students_college, courses 
        where students_college.Course = courses.CourseID and admissionID ='$admissionID'");
        return $query->row_array();
    }
    
    public function getstudentsSubjectsCollege($admissionID){

        $stud = $this->db->query("select Level,Semester from students_college where admissionID = '$admissionID'");
        $res = $stud->row();
        if (isset($res)){
            $level = $res->Level;
            $sem = $res->Semester;
        }

        $query = $this->db->query("select student_subject_college.subjectID,subjectCode,SubjectDesc,lec,labComputer,labNonComputer,units,computeunits,Day,Time,FullName
        from student_subject_college,subject_college,curriculum_subjectcollege,users
        where student_subject_college.subjectID = subject_college.subjectID
        and student_subject_college.curriculumID = curriculum_subjectcollege.curriculumID
        and student_subject_college.subjectID = curriculum_subjectcollege.subjectID
        and student_subject_college.Teacher = users.userID
        and admissionNO = '$admissionID'
        and year = '$level'
        and semester = '$sem'");
        
        return $query->result_array();
    }

    public function getstudentsGradeCollege($admissionID,$sy,$sem){
        $query = $this->db->query("select student_subject_college.subjectID,subjectCode,SubjectDesc,Grade,Remarks,FullName,sy,Equivalent
        from student_subject_college,subject_college,curriculum_subjectcollege,users
        where student_subject_college.subjectID = subject_college.subjectID
        and student_subject_college.curriculumID = curriculum_subjectcollege.curriculumID
        and student_subject_college.subjectID = curriculum_subjectcollege.subjectID
        and student_subject_college.Teacher = users.userID
        and student_subject_college.sy = '$sy'
        and student_subject_college.semester = '$sem'
        and admissionNO = '$admissionID'");
        
        return $query->result_array();
    }

    public function getsubjectCountCollege($admissionID){

        $stud = $this->db->query("select Level,Semester from students_college where admissionID = '$admissionID'");
        $res = $stud->row();
        if (isset($res)){
            $level = $res->Level;
            $sem = $res->Semester;
        }

        $query = $this->db->query("select count(admissionNO) as subjectCount, sum(units) as Tunits, sum(fee) as tuitionFee, sum(computeunits) as mainunits
        from student_subject_college,subject_college,curriculum_subjectcollege
        where student_subject_college.subjectID = subject_college.subjectID 
        and student_subject_college.curriculumID = curriculum_subjectcollege.curriculumID 
        and student_subject_college.subjectID = curriculum_subjectcollege.subjectID 
        and admissionNO = '$admissionID'
        and year = '$level'
        and semester = '$sem'");
        return $query->row_array();
    }

    public function getdiscountCollege($admissionID){
        $query = $this->db->query("select sum(discountPercent) as Tdiscount
        from temp_discount, discounts
        where temp_discount.Discount = discounts.discountID
        and admissionId = '$admissionID'
        and dpt = 'College'");
        return $query->row_array();
    }


    public function getMiscellaneousCollege(){
        $query = $this->db->query("select *
        from miscellaneous
        where syfile = '2021-2022'
        and Department = 'College'");
        return $query->result_array();
    }

    public function getMiscellaneousCollegeFee(){
        $query = $this->db->query("select sum(Amount) as MiscFee
        from miscellaneous
        where syfile = '2021-2022'
        and Department = 'College'");
        return $query->row_array();
    }

    public function exportlistCollegePcourse(){
        $course = $this->input->post('courseID');
        $year = $this->input->post('yearlevel');
        $sem = $this->input->post('sem');

        $query = $this->db->query("select admissionID,extension,StudentNo,FullName,CourseDesc,Level,Semester,Contact 
        from students_college,courses
        where students_college.Course = courses.CourseID
        and Course = '$course'
        and Level = '$year'
        and Semester = '$sem'
        and isEnrolled = 'Yes'");

        return $query->result_array();
    }

    public function getCourseCode(){
        $course = $this->input->post('courseID');
        $query = $this->db->query("select CourseCode from courses where CourseID = '$course'");
        return $query->row_array();
    }
    public function getSY(){
        $query = $this->db->query("select schoolyear from sy where active = 'Yes'");
        return $query->row_array();
    }

















    //SENIOR HIGH
    public function getstudentsInfoSeniorhigh($admissionID){
        $query = $this->db->query("select *
        from students_seniorhigh
        where admissionID ='$admissionID'");
        return $query->row_array();
    }


    public function getstudentsSubjectsSeniorhigh($admissionID,$level,$sem){

        $query = $this->db->query("select student_subject_seniorhigh.subjectID,category,hrs,subjectCode,SubjectDesc,Day,Time,FullName
        from student_subject_seniorhigh,subject_seniorhigh,curriculum_subjectseniorhigh,users
        where student_subject_seniorhigh.subjectID = subject_seniorhigh.subjectID
        and student_subject_seniorhigh.curriculumID = curriculum_subjectseniorhigh.curriculumID
        and student_subject_seniorhigh.subjectID = curriculum_subjectseniorhigh.subjectID
        and student_subject_seniorhigh.Teacher = users.userID
        and admissionNO = '$admissionID'
        and year = '$level'
        and semester = '$sem'");
        return $query->result_array();

    }

    public function getsubjectCountSeniorhigh($admissionID){

        $query = $this->db->query("select count(admissionNO) as subjectCount,sum(fee) as tuitionFee, sum(hrs) as thrs
        from student_subject_seniorhigh,subject_seniorhigh,curriculum_subjectseniorhigh,users
        where student_subject_seniorhigh.subjectID = subject_seniorhigh.subjectID
        and student_subject_seniorhigh.curriculumID = curriculum_subjectseniorhigh.curriculumID
        and student_subject_seniorhigh.subjectID = curriculum_subjectseniorhigh.subjectID
        and student_subject_seniorhigh.Teacher = users.userID
        and admissionNO = '$admissionID'");
        return $query->row_array();
        
    }


    public function getMiscellaneousSeniorhigh($grade){
        $query = $this->db->query("select *
        from miscellaneous
        where syfile = '2021-2022'
        and Department = 'Seniorhigh'
        and forwhat = '$grade'
        and Miscellaneous != 'none'");
        return $query->result_array();
    }

    public function getotherMiscellaneousSeniorhigh($grade){
        $query = $this->db->query("select *
        from miscellaneous
        where syfile = '2021-2022'
        and Department = 'Seniorhigh'
        and forwhat = '$grade'
        and other != 'none'");
        return $query->result_array();
    }

    public function getMiscellaneousSeniorhighFee($grade){
        $query = $this->db->query("select sum(Amount) as MiscFee
        from miscellaneous
        where syfile = '2021-2022'
        and Department = 'Seniorhigh'
        and forwhat = '$grade'
        and Miscellaneous != 'none'");
        return $query->row_array();
    }
    public function getotherMiscellaneousSeniorhighFee($grade){
        $query = $this->db->query("select sum(Amount) as otherMiscFee
        from miscellaneous
        where syfile = '2021-2022'
        and Department = 'Seniorhigh'
        and forwhat = '$grade'
        and other != 'none'");
        return $query->row_array();
    }
    public function getstudentsGradeSeniorhigh($admissionID,$sy,$sem){
        $query = $this->db->query("select student_subject_seniorhigh.subjectID,subjectCode,SubjectDesc,1Q,2Q,Grade,Remarks,FullName,sy
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



























    //JUNIORHIGH SCHOOL
    public function getstudentsInfoJuniorhigh($admissionID){
        $query = $this->db->query("select * 
        from students_juniorhigh
        where admissionID ='$admissionID'");
        return $query->row_array();
    }


    public function getstudentsSubjectsJuniorhigh($admissionID){

        $query = $this->db->query("select student_subject_juniorhigh.subjectID,hrs,subjectCode,SubjectDesc,Day,Time,FullName
        from student_subject_juniorhigh,subject_juniorhigh,curriculum_subjectjuniorhigh,users
        where student_subject_juniorhigh.subjectID = subject_juniorhigh.subjectID
        and student_subject_juniorhigh.curriculumID = curriculum_subjectjuniorhigh.curriculumID
        and student_subject_juniorhigh.subjectID = curriculum_subjectjuniorhigh.subjectID
        and student_subject_juniorhigh.Teacher = users.userID
        and admissionNO = '$admissionID'");
        return $query->result_array();

    }

    public function getsubjectCountJuniorhigh($admissionID){

        $query = $this->db->query("select count(admissionNO) as subjectCount,sum(hrs) as subjecthours
        from student_subject_juniorhigh,subject_juniorhigh,curriculum_subjectjuniorhigh
        where student_subject_juniorhigh.subjectID = subject_juniorhigh.subjectID
        and student_subject_juniorhigh.curriculumID = curriculum_subjectjuniorhigh.curriculumID
        and student_subject_juniorhigh.subjectID = curriculum_subjectjuniorhigh.subjectID
        and admissionNO = '$admissionID'");
        return $query->row_array();
        
    }


    public function getMiscellaneousJuniorhigh($grade){
        $query = $this->db->query("select *
        from miscellaneous
        where syfile = '2021-2022'
        and Department = 'Juniorhigh'
        and forwhat = '$grade'
        and Miscellaneous != 'none'");
        return $query->result_array();
    }


    public function getMiscellaneousJuniorhighFee($grade){
        $query = $this->db->query("select sum(Amount) as MiscFee
        from miscellaneous
        where syfile = '2021-2022'
        and Department = 'Juniorhigh'
        and forwhat = '$grade'
        and Miscellaneous != 'none'");
        return $query->row_array();
    }

    public function getOtherMiscellaneousJuniorhigh($grade){
        $query = $this->db->query("select *
        from miscellaneous
        where syfile = '2021-2022'
        and Department = 'Juniorhigh'
        and forwhat = '$grade'
        and other != 'none'");
        return $query->result_array();
    }

    public function getOtherMiscellaneousJuniorhighFee($grade){
        $query = $this->db->query("select sum(Amount) as OtherMiscFee
        from miscellaneous
        where syfile = '2021-2022'
        and Department = 'Juniorhigh'
        and forwhat = '$grade'
        and other != 'none'");
        return $query->row_array();
    }

    public function getstudentsGradeJuniorhigh($admissionID,$sy){
        $query = $this->db->query("select student_subject_juniorhigh.subjectID,subjectCode,SubjectDesc,G1,G2,G3,G4,Grade,Remarks,FullName,sy
        from student_subject_juniorhigh,subject_juniorhigh,curriculum_subjectjuniorhigh,users
        where student_subject_juniorhigh.subjectID = subject_juniorhigh.subjectID
        and student_subject_juniorhigh.curriculumID = curriculum_subjectjuniorhigh.curriculumID
        and student_subject_juniorhigh.subjectID = curriculum_subjectjuniorhigh.subjectID
        and student_subject_juniorhigh.Teacher = users.userID
        and student_subject_juniorhigh.sy = '$sy'
        and admissionNO = '$admissionID'");
        
        return $query->result_array();
    }
























    //JUNIORHIGH SCHOOL
    public function getstudentsInfoGradeschool($admissionID){
        $query = $this->db->query("select *
        from students_gradeschool
        where admissionID ='$admissionID'");
        return $query->row_array();
    }


    public function getstudentsSubjectsGradeschool($admissionID){

        $query = $this->db->query("select student_subject_gradeschool.subjectID,hrs,subjectCode,SubjectDesc,Day,Time,FullName
        from student_subject_gradeschool,subject_gradeschool,curriculum_subjectgradeschool,users
        where student_subject_gradeschool.subjectID = subject_gradeschool.subjectID
        and student_subject_gradeschool.curriculumID = curriculum_subjectgradeschool.curriculumID
        and student_subject_gradeschool.subjectID = curriculum_subjectgradeschool.subjectID
        and student_subject_gradeschool.Teacher = users.userID
        and admissionNO = '$admissionID'");
        return $query->result_array();

    }

    public function getsubjectCountGradeschool($admissionID){

        $query = $this->db->query("select count(admissionNO) as subjectCount,sum(hrs) as subjecthours
        from student_subject_gradeschool,subject_gradeschool,curriculum_subjectgradeschool
        where student_subject_gradeschool.subjectID = subject_gradeschool.subjectID
        and student_subject_gradeschool.curriculumID = curriculum_subjectgradeschool.curriculumID
        and student_subject_gradeschool.subjectID = curriculum_subjectgradeschool.subjectID
        and admissionNO = '$admissionID'");
        return $query->row_array();
        
    }


    public function getMiscellaneousGradeschool($grade){
        $query = $this->db->query("select *
        from miscellaneous
        where syfile = '2021-2022'
        and Department = 'Gradeschool'
        and forwhat = '$grade'
        and Miscellaneous != 'none'");
        return $query->result_array();
    }


    public function getMiscellaneousGradeschoolFee($grade){
        $query = $this->db->query("select sum(Amount) as MiscFee
        from miscellaneous
        where syfile = '2021-2022'
        and Department = 'Gradeschool'
        and forwhat = '$grade'
        and Miscellaneous != 'none'");
        return $query->row_array();
    }

    public function getOtherMiscellaneousGradeschool($grade){
        $query = $this->db->query("select *
        from miscellaneous
        where syfile = '2021-2022'
        and Department = 'Gradeschool'
        and forwhat = '$grade'
        and other != 'none'");
        return $query->result_array();
    }

    public function getOtherMiscellaneousGradeschoolFee($grade){
        $query = $this->db->query("select sum(Amount) as OtherMiscFee
        from miscellaneous
        where syfile = '2021-2022'
        and Department = 'Gradeschool'
        and forwhat = '$grade'
        and other != 'none'");
        return $query->row_array();
    }


    public function getstudentsGradeGradeschool($admissionID,$sy){
        $query = $this->db->query("select student_subject_gradeschool.subjectID,subjectCode,SubjectDesc,G1,G2,G3,G4,Grade,Remarks,FullName,sy
        from student_subject_gradeschool,subject_gradeschool,curriculum_subjectgradeschool,users
        where student_subject_gradeschool.subjectID = subject_gradeschool.subjectID
        and student_subject_gradeschool.curriculumID = curriculum_subjectgradeschool.curriculumID
        and student_subject_gradeschool.subjectID = curriculum_subjectgradeschool.subjectID
        and student_subject_gradeschool.Teacher = users.userID
        and student_subject_gradeschool.sy = '$sy'
        and admissionNO = '$admissionID'");
        
        return $query->result_array();
    }



    



}
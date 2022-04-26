<?php
class ProgChair_model extends CI_Model{
    
    public function __construct(){
        $this->load->database();
    }

    //VIEWING OF STUDENTS
    public function viewStudents(){
        $cdpt = '';
        if($_SESSION['CBAH']=='Yes'){$cdpt = 'CBAH';}
        if($_SESSION['CASED']=='Yes'){$cdpt = 'CASED';}
        if($_SESSION['SCLS']=='Yes'){$cdpt = 'SCLS';}
        if($_SESSION['SCJ']=='Yes'){$cdpt = 'SCJ';}
        if($_SESSION['Administrator']=='Yes'){$cdpt = '';}
        $query = $this->db->query("select *,CourseDesc,CourseCode 
        from students_college,courses 
        where students_college.Course = courses.CourseID 
        and courses.CollegeDPT like '%$cdpt%' 
        and isValidated='Yes' 
        and isEvaluated='No'");
        return $query->result_array();
    }
    
    //GETTING THE STUDENTS INFO
    public function viewStudentInfo($ID){
        $query = $this->db->query("select extension,StudentNo,LastName,FirstName,MiddleName,FullName,Address,Level,Section,Contact,Semester,CourseDesc,CourseCode,CollegeDPT,CourseID 
        from students_college,courses 
        where students_college.Course = courses.CourseID 
        and admissionID = '$ID'");
        return $query->row_array();
    }

    //VIEWING OF SECTION
    public function viewSections($lvl){
        $query = $this->db->query("select * 
        from section 
        where Department='College' 
        and Year='$lvl'");
        return $query->result_array();
    }

    //VIEWING OF SUBJECTS
    public function viewCollegeSubjects(){
        $query = $this->db->query("select csubjectID,subjectCode,subjectDesc,Day,Time,FullName,CourseCode,Section
        from curriculum_subjectcollege,subject_college ,users,`courses`,`curriculum_college`
        where curriculum_subjectcollege.subjectID = subject_college.subjectID
        and curriculum_subjectcollege.Prof = users.userID
        and curriculum_subjectcollege.`curriculumID` = `curriculum_college`.`curriculumID`
        and curriculum_college.Sem = '2nd Sem'
        and curriculum_college.courseID = courses.CourseID order by subjectCode asc");
        return $query->result_array();
    }

    //GETTING OF CURRICULUM ID
    public function getCurriculumIDcollege($courseID,$year,$sem,$section){
        $query = $this->db->query("select curriculumID 
        from curriculum_college 
        where courseID = '$courseID' 
        and Year = '$year' 
        and Sem = '$sem' 
        and Section = '$section'");
        return $query->row_array();
    }

    //VIEWING OF SUBJECTS ON TABLE
    public function viewCollegeCurriculumSubjectsTemp(){

        $uID = $_SESSION['userid'];
        $query = $this->db->query("select *,subjectCode,subjectDesc,units,prereq,FullName,CourseCode,Section
        from curriculum_subjectcollege_temp,subject_college,users,courses,curriculum_college
        where curriculum_subjectcollege_temp.subjectID = subject_college.subjectID
        and curriculum_subjectcollege_temp.Prof = users.userID
        and curriculum_college.courseID = courses.CourseID
        and curriculum_subjectcollege_temp.curriculumID = curriculum_college.curriculumID
        and curriculum_subjectcollege_temp.userID = '$uID'");
        return $query->result_array();
    }

    //ADDING OF SUBJECTS ON TEMPORARY TABLE BASED ON CURRICULUM ID
    public function addCollegeCurriculumSubjectsTemp($curriculumID){

        $this->db->where('userID',$_SESSION['userid']);
        $this->db->delete('curriculum_subjectcollege_temp');

        $query1 = $this->db->query("select csubjectID,curriculumID,subjectID,Day,Time,Prof
        from curriculum_subjectcollege 
        where curriculumID ='$curriculumID'");
        $result1 = $query1->result_array();

        foreach($result1 as $row1){
            $data = array(
                'csubjectID' => $row1['csubjectID'],
                'userID' => $_SESSION['userid'],
                'curriculumID' => $row1['curriculumID'],
                'subjectID' => $row1['subjectID'],
                'Day' => $row1['Day'],
                'Time' => $row1['Time'],
                'Prof' => $row1['Prof']
            );
            $this->db->insert('curriculum_subjectcollege_temp',$data);
        }

    }

    public function subjectCount(){
        $uID = $_SESSION['userid'];
        $query = $this->db->query("select count(csubjectID) as subjectcount 
        from curriculum_subjectcollege_temp
        where userID = '$uID'");
        return $query->row_array();
    }

    public function unitsCount(){
        $uID = $_SESSION['userid'];
        $query = $this->db->query("select sum(units) as unitCount 
        from curriculum_subjectcollege_temp,subject_college
        where curriculum_subjectcollege_temp.subjectID = subject_college.subjectID
        and userID = '$uID'");
        return $query->row_array();
    }



    public function removeTempsubject($CsubjectID){
        $this->db->where('csubjectID',$CsubjectID);
        return $this->db->delete('curriculum_subjectcollege_temp');
    }

    public function addsubjectscollegeTemp($subjects){

        $query1 = $this->db->query("select csubjectID,curriculumID,subjectID,Day,Time,Prof
        from curriculum_subjectcollege 
        where csubjectID ='$subjects'");
        $result1 = $query1->result_array();
        foreach($result1 as $row1){
            $data = array(
                'csubjectID' => $row1['csubjectID'],
                'userID' => $_SESSION['userid'],
                'curriculumID' => $row1['curriculumID'],
                'subjectID' => $row1['subjectID'],
                'Day' => $row1['Day'],
                'Time' => $row1['Time'],
                'Prof' => $row1['Prof']
            );
            $this->db->insert('curriculum_subjectcollege_temp',$data);
        }
    }

    public function saveStudent(){

        $checksy = $this->db->query("select schoolyear from sy where active = 'Yes'");
        foreach($checksy->result() as $result){
            $sy = $result->schoolyear;
        }


        $userID = $_SESSION['userid'];
        $query = $this->db->query("select curriculumID,subjectID,Prof
        from curriculum_subjectcollege_temp 
        where userID='$userID'");
        $result = $query->result_array();
        foreach($result as $row){
            $data = array(
                'admissionNO' => $_SESSION['ID'],
                'studentnumber' => $_SESSION['studentNo'],
                'curriculumID' => $row['curriculumID'],
                'subjectID' => $row['subjectID'],
                'year' => $_SESSION['level'],
                'semester' => $_SESSION['sem'],
                'sy' => $sy,
                'Teacher' => $row['Prof']
            );
            $this->db->insert('student_subject_college',$data);
        }

        $AID = $_SESSION['ID'];
        $update = $this->db->query("select distinct curriculumID 
        from student_subject_college
        where admissionNO = '$AID'");

        if($update->num_rows() > 1){
            $this->db->query("update students_college set isReg ='Irregular'
            where admissionID = '$AID'");
        }

        $ln = $_SESSION['lastName'];
        $fn = $_SESSION['firstName'];
        $mn = $_SESSION['middleName'];
        $aid = $_SESSION['ID'];
        //CHEKING IF USER EXIST
        $usercount = $this->db->query("select userID 
        from users 
        where LastName='$ln' 
        and FirstName='$fn' 
        and MiddleName='$mn'
        and admissionnu = '$aid'");
        
        $count = $usercount->num_rows();
        if($count > 0){
            // if exist
        }else{
            // if not
            //CREATING USER ACCOUNT FOR STUDENT

            $studentno = trim($_SESSION['studentNo'].'@student');
            $data = array(
                'admissionnu' => $_SESSION['ID'],
                'LastName' => $_SESSION['lastName'],
                'FirstName' => $_SESSION['firstName'],
                'MiddleName' => $_SESSION['middleName'],
                'FullName' => $_SESSION['fullname'],
                'Position' => 8,
                'UserName' => $studentno,
                'Password' => 'pass1234',
                'Registrar' => 'No',
                'Guidance' => 'No',
                'Cashier' => 'No',
                'Bookstore' => 'No',
                'Accounting' => 'No',
                'Humanresource' => 'No',
                'Library' => 'No',
                'Dean' => 'No',
                'Progchair' => 'No',
                'Canteen' => 'No',
                'Custodian' => 'No',
                'Teacher' => 'No',
                'Principal' => 'No',
                'Employee' => 'No',
                'Student' => 'Yes',
                'Collegedpt' => 'Yes',
                'GradeSchooldpt' => 'No',
                'JuniorHighdpt' => 'No',
                'SeniorHighdpt' => 'No',
                'CASED' => 'No',
                'CBAH' => 'No',
                'SCLS' => 'No',
                'SCJ' => 'No',
                'Administrator' => 'No'
            );
            $this->db->insert('users',$data);
        }
       
        

        //UPDATING THE STUDENT AS EVALUATED
        $data = array(
            'isEvaluated' => 'Yes',
            'Section' => $_SESSION['section']
        );
        $this->db->where('admissionID', $_SESSION['ID']);
        $this->db->update('students_college', $data);

        //DELETING OF SUBJECTS ON TEMP TABLE
        $this->db->where('userID',$_SESSION['userid']);
        $this->db->delete('curriculum_subjectcollege_temp');

        unset($_SESSION['section']);

    }



    //VIEWING OF STUDENTS
    public function viewEvaluatedStudents(){
        if($_SESSION['CBAH']=='Yes'){$cdpt = 'CBAH';}
        if($_SESSION['CASED']=='Yes'){$cdpt = 'CASED';}
        if($_SESSION['SCLS']=='Yes'){$cdpt = 'SCLS';}
        if($_SESSION['SCJ']=='Yes'){$cdpt = 'SCJ';}
        if($_SESSION['Administrator']=='Yes'){$cdpt = '';}
        $query = $this->db->query("select *,CourseDesc,CourseCode 
        from students_college,courses 
        where students_college.Course = courses.CourseID 
        and courses.CollegeDPT like '%$cdpt%' 
        and isValidated='Yes' 
        and isEvaluated='Yes'
        and isEnrolled='No'");
        return $query->result_array();
    }


    public function reevaluateStudent($evaluationID){

        $userID = $_SESSION['userid'];
        $this->db->where('userID',$userID);
        $this->db->delete('curriculum_subjectcollege_temp');

        //UPDATING THE STUDENT AS EVALUATED
        $data = array(
            'isEvaluated' => 'No',
            'isAssess' => 'No',
        );
        $this->db->where('admissionID', $evaluationID);
        $this->db->update('students_college', $data);

        $stud = $this->db->query("select Level,Semester from students_college where admissionID = '$evaluationID'");
        $res = $stud->row();
        if (isset($res)){
            $level = $res->Level;
            $sem = $res->Semester;
        }
        
        $query = $this->db->query("select curriculumID,subjectID,Teacher
        from student_subject_college
        where admissionNO = '$evaluationID'
        and year = '$level'
        and semester = '$sem'");
        
        foreach($query->result_array() as $row){
            $CID = $row['curriculumID'];
            $SID = $row['subjectID'];
            $query2 = $this->db->query("select csubjectID,curriculumID,subjectID,Day,Time,Prof
            from curriculum_subjectcollege
            where curriculumID = '$CID'
            and subjectID = '$SID'");
            foreach($query2->result_array() as $row2){
                $list = array(
                    'csubjectID' => $row2['csubjectID'],
                    'userID' => $userID,
                    'curriculumID' => $row2['curriculumID'],
                    'subjectID' => $row2['subjectID'],
                    'Day' => $row2['Day'],
                    'Time' => $row2['Time'],
                    'Prof' => $row2['Prof'],
                );
                $this->db->insert('curriculum_subjectcollege_temp',$list);
            }
        }

        $this->db->query("delete from student_subject_college
        where admissionNO = '$evaluationID'
        and year = '$level'
        and semester = '$sem'");
    }

    //viewing of scedule
    public function getCurrilumCollege(){
        $query = $this->db->query("select curriculumID,CourseDesc,Year,Sem,Section
        from curriculum_college,courses
        where curriculum_college.courseID = courses.CourseID
        and Sem = '2nd Sem'");
        return $query->result_array();
    }

    public function getSchedule($curriculumID){
        $query = $this->db->query("select csubjectID,curriculum_subjectcollege.subjectID,Day,Time,Prof,subjectCode,subjectDesc,FullName
        from curriculum_subjectcollege,subject_college,users
        where curriculum_subjectcollege.subjectID = subject_college.subjectID
        and curriculum_subjectcollege.Prof = users.userID
        and curriculumID = '$curriculumID'");
        return $query->result_array();
    }

    public function updateScheduleSubject($csubjectID){

        $data = array(
            'Day' => strtoupper($this->input->post('day')),
            'Time' => $this->input->post('time'),
            'Prof' => $this->input->post('prof'),
        );
        
        $this->db->where("csubjectID",$csubjectID);
        $query = $this->db->update("curriculum_subjectcollege",$data);
        
    }

    public function getProfessors(){
        $query = $this->db->query("select userID,FullName 
        from users
        where Position='9'
        and Collegedpt = 'Yes'");
        return $query->result_array();
    }

    public function viewCollegeEnrolled(){
        $cdpt = '';
        if($_SESSION['CBAH']=='Yes'){$cdpt = 'CBAH';}
        if($_SESSION['CASED']=='Yes'){$cdpt = 'CASED';}
        if($_SESSION['SCLS']=='Yes'){$cdpt = 'SCLS';}
        if($_SESSION['SCJ']=='Yes'){$cdpt = 'SCJ';}
        if($_SESSION['Administrator']=='Yes'){$cdpt = '';}
        $query = $this->db->query("select *,CourseDesc,CourseCode 
        from students_college,courses 
        where students_college.Course = courses.CourseID 
        and courses.CollegeDPT like '%$cdpt%'  
        and isEnrolled = 'Yes'");
        return $query->result_array();
    }




}
<?php
class Principal_model extends CI_Model{

    public function __construct(){
        $this->load->database();
    }

    // SENIOR HIGH
    public function viewvalidatedSeniorhigh(){
        $cdpt = '';
        if($_SESSION['ABM']=='Yes'){$cdpt = 'ABM';}
        if($_SESSION['HUMMS']=='Yes'){$cdpt = 'HUMMS';}
        if($_SESSION['STEM']=='Yes'){$cdpt = 'STEM';}
        if($_SESSION['TVLHE']=='Yes'){$cdpt = 'TVL-HE';}
        if($_SESSION['TVLICT']=='Yes'){$cdpt = 'TVL-ICT';}
        if($_SESSION['GAS']=='Yes'){$cdpt = 'GAS';}
        if($_SESSION['Administrator']=='Yes'){$cdpt = '';}
    
        $query = $this->db->query("select admissionID,FullName,Strand,Level,Semester
        from students_seniorhigh
        where Strand like '%$cdpt%'
        and isValidated = 'Yes'
        and isEvaluated = 'No'");
        return $query->result_array();
    }

    //GETTING THE STUDENTS INFO
    public function viewStudentInfo($ID){
        $query = $this->db->query("select *
        from students_seniorhigh
        where admissionID = '$ID'");
        return $query->row_array();
    }

    public function viewSections($lvl,$strand){
        $query = $this->db->query("select *
        from section
        where Department = 'Seniorhigh'
        and Year = '$lvl'
        and strand = '$strand'");
        return $query->result_array();
    }


    //VIEWING OF SUBJECTS
    public function viewSeniorhighSubjects(){
        $query = $this->db->query("select *,subjectCode,subjectDesc,category,FullName,Section
        from curriculum_subjectseniorhigh,subject_seniorhigh ,users,curriculum_seniorhigh
        where curriculum_subjectseniorhigh.subjectID = subject_seniorhigh.subjectID
        and curriculum_subjectseniorhigh.curriculumID = curriculum_seniorhigh.curriculumID
        and curriculum_subjectseniorhigh.Prof = users.userID");
        return $query->result_array();
    }

    public function getCurriculumIDseniorhigh($strand,$year,$sem,$section){
        $query = $this->db->query("select curriculumID 
        from curriculum_seniorhigh 
        where Strand = '$strand' 
        and Year = '$year' 
        and Sem = '$sem' 
        and Section = '$section'");
        return $query->row_array();
    }

    //ADDING OF SUBJECTS ON TEMPORARY TABLE BASED ON CURRICULUM ID
    public function addSeniorhighCurriculumSubjectsTemp($curriculumID){

        $this->db->where('userID',$_SESSION['userid']);
        $this->db->delete('curriculum_subjectseniorhigh_temp');

        $query1 = $this->db->query("select csubjectID,curriculumID,subjectID,Day,Time,Prof
        from curriculum_subjectseniorhigh
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
            $this->db->insert('curriculum_subjectseniorhigh_temp',$data);
        }

    }

    //VIEWING OF SUBJECTS ON TABLE
    public function viewSeniorhighCurriculumSubjectsTemp(){
        $uID = $_SESSION['userid'];
        $query = $this->db->query("select *,subjectCode,subjectDesc,category,prereq,FullName
        from curriculum_subjectseniorhigh_temp,subject_seniorhigh,users
        where curriculum_subjectseniorhigh_temp.subjectID = subject_seniorhigh.subjectID
        and curriculum_subjectseniorhigh_temp.Prof = users.userID
        and curriculum_subjectseniorhigh_temp.userID = '$uID'");
        return $query->result_array();
    }

    // ADDING OF SUBJECTS ON TEMP TABLE
    public function addsubjectsSeniorhighTemp($subjects){

        $query1 = $this->db->query("select csubjectID,curriculumID,subjectID,Day,Time,Prof
        from curriculum_subjectseniorhigh 
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
            $this->db->insert('curriculum_subjectseniorhigh_temp',$data);
        }

    }

    public function subjectCount(){
        $uID = $_SESSION['userid'];
        $query = $this->db->query("select count(csubjectID) as subjectcount, sum(hrs) as hrsCount
        from curriculum_subjectseniorhigh_temp,subject_seniorhigh
        where curriculum_subjectseniorhigh_temp.subjectID = subject_seniorhigh.subjectID
        and userID = '$uID'");
        return $query->row_array();
    }




    public function removeTempsubjectSeniorhigh($CsubjectID){
        $this->db->where('csubjectID',$CsubjectID);
        return $this->db->delete('curriculum_subjectseniorhigh_temp');
    }


    public function saveStudentSeniorhigh(){

        $checksy = $this->db->query("select schoolyear from sy where active = 'Yes'");
        foreach($checksy->result() as $result){
            $sy = $result->schoolyear;
        }

        $userID = $_SESSION['userid'];
        $query = $this->db->query("select curriculumID,subjectID,Prof
        from curriculum_subjectseniorhigh_temp 
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
            $this->db->insert('student_subject_seniorhigh',$data);
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
                'Collegedpt' => 'No',
                'GradeSchooldpt' => 'No',
                'JuniorHighdpt' => 'No',
                'SeniorHighdpt' => 'Yes',
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
        $this->db->update('students_seniorhigh', $data);

        //DELETING OF SUBJECTS ON TEMP TABLE
        $this->db->where('userID',$_SESSION['userid']);
        $this->db->delete('curriculum_subjectseniorhigh_temp');

    }


    //VIEWING OF STUDENTS
    public function viewEvaluatedStudents(){
        $cdpt = '';
        if($_SESSION['ABM']=='Yes'){$cdpt = 'ABM';}
        if($_SESSION['HUMMS']=='Yes'){$cdpt = 'HUMMS';}
        if($_SESSION['STEM']=='Yes'){$cdpt = 'STEM';}
        if($_SESSION['TVLHE']=='Yes'){$cdpt = 'TVL-HE';}
        if($_SESSION['TVLICT']=='Yes'){$cdpt = 'TVL-ICT';}
        if($_SESSION['GAS']=='Yes'){$cdpt = 'GAS';}
        if($_SESSION['Administrator']=='Yes'){$cdpt = '';}


        $query = $this->db->query("select admissionID,FullName,Strand,Level,Section
        from students_seniorhigh
        where Strand like '%$cdpt%'
        and isValidated = 'Yes'
        and isEvaluated = 'Yes'");
        return $query->result_array();

    }

    public function viewCurriculumSeniorhigh(){

        $query = $this->db->query("select *
        from curriculum_seniorhigh");
        return $query->result_array();

    }


    public function viewScheduleSubectsSeniorhigh($curriculumID){
        $query = $this->db->query("select csubjectID,curriculum_subjectseniorhigh.subjectID,Day,Time,Prof,subjectCode,subjectDesc,FullName
        from curriculum_subjectseniorhigh,subject_seniorhigh,users
        where curriculum_subjectseniorhigh.subjectID = subject_seniorhigh.subjectID
        and curriculum_subjectseniorhigh.Prof = users.userID
        and curriculumID = '$curriculumID'");
        return $query->result_array();
    }

    public function getProfessors(){
        $query = $this->db->query("select userID,FullName 
        from users
        where Position='9'
        and Seniorhighdpt = 'Yes'");
        return $query->result_array();
    }

    public function updateSchedule($CsubjectID){

        $data = array(
            'Day' => strtoupper($this->input->post('day')),
            'Time' => $this->input->post('time'),
            'Prof' => $this->input->post('prof'),
        );
        $this->db->where("csubjectID",$CsubjectID);
        $query = $this->db->update("curriculum_subjectseniorhigh",$data);

    }

    public function reevaluatestudentSeniorhigh($evaluationID){

        $userID = $_SESSION['userid'];
        $this->db->where('userID',$userID);
        $this->db->delete('curriculum_subjectseniorhigh_temp');

        //UPDATING THE STUDENT AS EVALUATED
        $data = array(
            'isEvaluated' => 'No',
            'Section' => ""
        );
        $this->db->where('admissionID', $evaluationID);
        $this->db->update('students_seniorhigh', $data);



        $stud = $this->db->query("select Level,Semester from students_seniorhigh where admissionID = '$evaluationID'");
        $res = $stud->row();
        if (isset($res)){
            $level = $res->Level;
            $sem = $res->Semester;
        }

        $query = $this->db->query("select curriculumID,subjectID,Teacher
        from student_subject_seniorhigh
        where admissionNO = '$evaluationID'");
        foreach($query->result_array() as $row){
            $CID = $row['curriculumID'];
            $SID = $row['subjectID'];
            $query2 = $this->db->query("select csubjectID,curriculumID,subjectID,Day,Time,Prof
            from curriculum_subjectseniorhigh
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
                $this->db->insert('curriculum_subjectseniorhigh_temp',$list);
            }
        }

        $this->db->query("delete from student_subject_seniorhigh 
        where admissionNO = '$evaluationID'
        and year = '$level'
        and semester = '$sem'");

    }


    public function showClassListSeniorhigh(){

        $query = $this->db->query("select DISTINCT student_subject_seniorhigh.curriculumID,student_subject_seniorhigh.subjectID,subjectCode,subjectDesc,Day,Time,student_subject_seniorhigh.year,semester,FullName,Section,Strand
        from student_subject_seniorhigh,subject_seniorhigh,curriculum_subjectseniorhigh,users,curriculum_seniorhigh
        where student_subject_seniorhigh.subjectID = subject_seniorhigh.subjectID
        and student_subject_seniorhigh.curriculumID = curriculum_subjectseniorhigh.curriculumID
        and student_subject_seniorhigh.subjectID = curriculum_subjectseniorhigh.subjectID
        and student_subject_seniorhigh.curriculumID = curriculum_seniorhigh.curriculumID
        and curriculum_subjectseniorhigh.Prof = `users`.userID
        order by subjectCode asc");
        return $query->result_array();

    }

    public function exportClassListSeniorhigh($curriculumID,$subjectID){

        $query = $this->db->query("select extension,StudentNo, FullName,Strand,Level,students_seniorhigh.Semester,Contact,admissionID
        from students_seniorhigh,student_subject_seniorhigh
        where students_seniorhigh.isEnrolled = 'Yes'
        and students_seniorhigh.admissionID = student_subject_seniorhigh.admissionNO
        and student_subject_seniorhigh.curriculumID = '$curriculumID' 
        and student_subject_seniorhigh.subjectID = '$subjectID'");
            
        return $query->result_array();

    }


    



























    // JUNIOR HIGH
    public function viewvalidatedJuniorhigh(){
    
        $query = $this->db->query("select admissionID,FullName,Level
        from students_juniorhigh
        where isValidated = 'Yes'
        and isEvaluated = 'No'");
        return $query->result_array();

    }

    public function viewStudentInfoJuniorhigh($ID){

        $query = $this->db->query("select *
        from students_juniorhigh
        where admissionID = '$ID'");
        return $query->row_array();

    }

    public function viewSectionsJuniorhigh($lvl){
        $query = $this->db->query("select *
        from section
        where Department = 'Juniorhigh'
        and Year = '$lvl'");
        return $query->result_array();
    }


    public function getCurriculumIDjuniorhigh($year,$section){
        $query = $this->db->query("select curriculumID 
        from curriculum_juniorhigh
        where Year = '$year' 
        and Section = '$section'");
        return $query->row_array();
    }

    public function addjuniorhighCurriculumSubjectsTemp($curriculumID){

        $this->db->where('userID',$_SESSION['userid']);
        $this->db->delete('curriculum_subjectjuniorhigh_temp');

        $query1 = $this->db->query("select csubjectID,curriculumID,subjectID,Day,Time,Prof
        from curriculum_subjectjuniorhigh
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
            $this->db->insert('curriculum_subjectjuniorhigh_temp',$data);
        }

    }

    //VIEWING OF SUBJECTS ON TABLE
    public function viewJuniorhighCurriculumSubjectsTemp(){
        $uID = $_SESSION['userid'];
        $query = $this->db->query("select *,subjectCode,subjectDesc,prereq,FullName
        from curriculum_subjectjuniorhigh_temp,subject_juniorhigh,users
        where curriculum_subjectjuniorhigh_temp.subjectID = subject_juniorhigh.subjectID
        and curriculum_subjectjuniorhigh_temp.Prof = users.userID
        and curriculum_subjectjuniorhigh_temp.userID = '$uID'");
        return $query->result_array();
    }

    // ADDING OF SUBJECTS ON TEMP TABLE
    public function addsubjectsJuniorhighTemp($subjects){

        $query1 = $this->db->query("select csubjectID,curriculumID,subjectID,Day,Time,Prof
        from curriculum_subjectjuniorhigh 
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
            $this->db->insert('curriculum_subjectjuniorhigh_temp',$data);
        }

    }

    //VIEWING OF SUBJECTS
    public function viewJuniorhighSubjects(){
        $query = $this->db->query("select *,subjectCode,subjectDesc,FullName
        from curriculum_subjectjuniorhigh,subject_juniorhigh,users
        where curriculum_subjectjuniorhigh.subjectID = subject_juniorhigh.subjectID
        and curriculum_subjectjuniorhigh.Prof = users.userID");
        return $query->result_array();
    }


    public function removeTempsubjectJuniorhigh($CsubjectID){
        $this->db->where('csubjectID',$CsubjectID);
        return $this->db->delete('curriculum_subjectjuniorhigh_temp');
    }

    public function saveStudentJuniorhigh(){

        $checksy = $this->db->query("select schoolyear from sy where active = 'Yes'");
        foreach($checksy->result() as $result){
            $sy = $result->schoolyear;
        }

        $userID = $_SESSION['userid'];
        $query = $this->db->query("select curriculumID,subjectID,Prof
        from curriculum_subjectjuniorhigh_temp 
        where userID='$userID'");
        $result = $query->result_array();
        foreach($result as $row){
            $data = array(
                'admissionNO' => $_SESSION['ID'],
                'studentnumber' => $_SESSION['studentNo'],
                'curriculumID' => $row['curriculumID'],
                'subjectID' => $row['subjectID'],
                'year' => $_SESSION['level'],
                'sy' => $sy,
                'Teacher' => $row['Prof']
            );
            $this->db->insert('student_subject_juniorhigh',$data);
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
        and admissionID = '$aid'");
        
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
                'Collegedpt' => 'No',
                'GradeSchooldpt' => 'No',
                'JuniorHighdpt' => 'Yes',
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
        $this->db->update('students_juniorhigh', $data);

        //DELETING OF SUBJECTS ON TEMP TABLE
        $this->db->where('userID',$_SESSION['userid']);
        $this->db->delete('curriculum_subjectjuniorhigh_temp');

    }


    public function subjectCountJuniorhigh(){
        $uID = $_SESSION['userid'];
        $query = $this->db->query("select count(csubjectID) as subjectcount, sum(hrs) as hrsCount
        from curriculum_subjectjuniorhigh_temp,subject_juniorhigh
        where curriculum_subjectjuniorhigh_temp.subjectID = subject_juniorhigh.subjectID
        and userID = '$uID'");
        return $query->row_array();
    }

    //VIEWING OF STUDENTS
    public function viewEvaluatedStudentsJuniorhigh(){

        $query = $this->db->query("select admissionID,FullName,Level,Section
        from students_juniorhigh
        where isValidated = 'Yes'
        and isEvaluated = 'Yes'");
        return $query->result_array();

    }

    public function reevaluatestudentJuniorhigh($evaluationID){

        $userID = $_SESSION['userid'];
        $this->db->where('userID',$userID);
        $this->db->delete('curriculum_subjectjuniorhigh_temp');

        //UPDATING THE STUDENT AS EVALUATED
        $data = array(
            'isEvaluated' => 'No',
            'Section' => ""
        );
        $this->db->where('admissionID', $evaluationID);
        $this->db->update('students_juniorhigh', $data);


        $stud = $this->db->query("select Level from students_juniorhigh where admissionID = '$evaluationID'");
        $res = $stud->row();
        if (isset($res)){
            $level = $res->Level;
        }


        $query = $this->db->query("select curriculumID,subjectID,Teacher
        from student_subject_juniorhigh
        where admissionNO = '$evaluationID'");
        foreach($query->result_array() as $row){
            $CID = $row['curriculumID'];
            $SID = $row['subjectID'];
            $query2 = $this->db->query("select csubjectID,curriculumID,subjectID,Day,Time,Prof
            from curriculum_subjectjuniorhigh
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
                $this->db->insert('curriculum_subjectjuniorhigh_temp',$list);
            }
        }

        $this->db->query("delete from student_subject_juniorhigh 
        where admissionNO = '$evaluationID'
        and year = '$level'");

    }


    public function viewCurriculumJuniorhigh(){

        $query = $this->db->query("select *
        from curriculum_juniorhigh");
        return $query->result_array();

    }

    public function viewScheduleSubectsJuniorhigh($curriculumID){
        $query = $this->db->query("select csubjectID,curriculum_subjectjuniorhigh.subjectID,Day,Time,Prof,subjectCode,subjectDesc,FullName
        from curriculum_subjectjuniorhigh,subject_juniorhigh,users
        where curriculum_subjectjuniorhigh.subjectID = subject_juniorhigh.subjectID
        and curriculum_subjectjuniorhigh.Prof = users.userID
        and curriculumID = '$curriculumID'");
        return $query->result_array();
    }

    public function getProfessorsJuniorhigh(){
        $query = $this->db->query("select userID,FullName 
        from users
        where Position='9'
        and Juniorhighdpt = 'Yes'");
        return $query->result_array();
    }

    public function updateScheduleJuniorhigh($CsubjectID){

        $data = array(
            'Day' => $this->input->post('day'),
            'Time' => $this->input->post('time'),
            'Prof' => $this->input->post('prof'),
        );
        $this->db->where("csubjectID",$CsubjectID);
        $query = $this->db->update("curriculum_subjectjuniorhigh",$data);

    }


    public function showClassListJuniorhigh(){

        $query = $this->db->query("select DISTINCT student_subject_juniorhigh.curriculumID,student_subject_juniorhigh.subjectID,subjectCode,subjectDesc,Day,Time,student_subject_juniorhigh.year,semester,FullName,Section
        from student_subject_juniorhigh,subject_juniorhigh,curriculum_subjectjuniorhigh,users,curriculum_juniorhigh
        where student_subject_juniorhigh.subjectID = subject_juniorhigh.subjectID
        and student_subject_juniorhigh.curriculumID = curriculum_subjectjuniorhigh.curriculumID
        and student_subject_juniorhigh.subjectID = curriculum_subjectjuniorhigh.subjectID
        and student_subject_juniorhigh.curriculumID = curriculum_juniorhigh.curriculumID
        and curriculum_subjectjuniorhigh.Prof = `users`.userID
        order by subjectCode asc");
        return $query->result_array();

    }

    public function exportClassListJuniorhigh($curriculumID,$subjectID){

        $query = $this->db->query("select extension,StudentNo,FullName,Level,Contact,admissionID
        from students_juniorhigh,student_subject_juniorhigh
        where students_juniorhigh.isEnrolled = 'Yes'
        and students_juniorhigh.admissionID = student_subject_juniorhigh.admissionNO
        and student_subject_juniorhigh.curriculumID = '$curriculumID' 
        and student_subject_juniorhigh.subjectID = '$subjectID'");
            
        return $query->result_array();

    }




















    // GRADESCHOOL
    public function viewvalidatedGradeschool(){
    
        $query = $this->db->query("select admissionID,FullName,Level
        from students_gradeschool
        where isValidated = 'Yes'
        and isEvaluated = 'No'");
        return $query->result_array();

    }

    public function viewStudentInfoGradeschool($ID){

        $query = $this->db->query("select *
        from students_gradeschool
        where admissionID = '$ID'");
        return $query->row_array();

    }


    public function viewSectionsGradeschool($lvl){
        $query = $this->db->query("select *
        from section
        where Department = 'Gradeschool'
        and Year = '$lvl'");
        return $query->result_array();
    }

    public function viewGradeschoolSubjects(){
        $query = $this->db->query("select *,subjectCode,subjectDesc,FullName
        from curriculum_subjectgradeschool,subject_gradeschool,users
        where curriculum_subjectgradeschool.subjectID = subject_gradeschool.subjectID
        and curriculum_subjectgradeschool.Prof = users.userID");
        return $query->result_array();
    }

    public function getCurriculumIDGradeschool($year,$section){
        $query = $this->db->query("select curriculumID 
        from curriculum_gradeschool
        where Year = '$year' 
        and Section = '$section'");
        return $query->row_array();
    }

    public function addGradeschoolCurriculumSubjectsTemp($curriculumID){

        $this->db->where('userID',$_SESSION['userid']);
        $this->db->delete('curriculum_subjectgradeschool_temp');

        $query1 = $this->db->query("select csubjectID,curriculumID,subjectID,Day,Time,Prof
        from curriculum_subjectgradeschool
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
            $this->db->insert('curriculum_subjectgradeschool_temp',$data);
        }

    }


    public function viewGradeschoolCurriculumSubjectsTemp(){
        $uID = $_SESSION['userid'];
        $query = $this->db->query("select *,subjectCode,subjectDesc,prereq,FullName
        from curriculum_subjectgradeschool_temp,subject_gradeschool,users
        where curriculum_subjectgradeschool_temp.subjectID = subject_gradeschool.subjectID
        and curriculum_subjectgradeschool_temp.Prof = users.userID
        and curriculum_subjectgradeschool_temp.userID = '$uID'");
        return $query->result_array();
    }

    // ADDING OF SUBJECTS ON TEMP TABLE
    public function addsubjectsGradeschoolTemp($subjects){

        $query1 = $this->db->query("select csubjectID,curriculumID,subjectID,Day,Time,Prof
        from curriculum_subjectgradeschool
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
            $this->db->insert('curriculum_subjectgradeschool_temp',$data);
        }

    }


    public function removeTempsubjectGradeschool($CsubjectID){
        $this->db->where('csubjectID',$CsubjectID);
        return $this->db->delete('curriculum_subjectgradeschool_temp');
    }


    public function saveStudentGradeschool(){

        $checksy = $this->db->query("select schoolyear from sy where active = 'Yes'");
        foreach($checksy->result() as $result){
            $sy = $result->schoolyear;
        }

        $userID = $_SESSION['userid'];
        $query = $this->db->query("select curriculumID,subjectID,Prof
        from curriculum_subjectgradeschool_temp 
        where userID='$userID'");
        $result = $query->result_array();
        foreach($result as $row){
            $data = array(
                'admissionNO' => $_SESSION['ID'],
                'studentnumber' => $_SESSION['studentNo'],
                'curriculumID' => $row['curriculumID'],
                'subjectID' => $row['subjectID'],
                'year' => $_SESSION['level'],
                'sy' => $sy,
                'Teacher' => $row['Prof']
            );
            $this->db->insert('student_subject_gradeschool',$data);
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
        and admissionID = '$aid'");
        
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
                'Collegedpt' => 'No',
                'GradeSchooldpt' => 'Yes',
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
        $this->db->update('students_gradeschool', $data);

        //DELETING OF SUBJECTS ON TEMP TABLE
        $this->db->where('userID',$_SESSION['userid']);
        $this->db->delete('curriculum_subjectgradeschool_temp');

    }




    public function viewEvaluatedStudentsGradeschool(){

        $query = $this->db->query("select admissionID,FullName,Level,Section
        from students_gradeschool
        where isValidated = 'Yes'
        and isEvaluated = 'Yes'");
        return $query->result_array();

    }


    public function reevaluatestudentGradeschool($evaluationID){

        $userID = $_SESSION['userid'];
        $this->db->where('userID',$userID);
        $this->db->delete('curriculum_subjectgradeschool_temp');

        //UPDATING THE STUDENT AS EVALUATED
        $data = array(
            'isEvaluated' => 'No',
            'Section' => ""
        );
        $this->db->where('admissionID', $evaluationID);
        $this->db->update('students_gradeschool', $data);

        $stud = $this->db->query("select Level from students_gradeschool where admissionID = '$evaluationID'");
        $res = $stud->row();
        if (isset($res)){
            $level = $res->Level;
        }

        $query = $this->db->query("select curriculumID,subjectID,Teacher
        from student_subject_gradeschool
        where admissionNO = '$evaluationID'");
        foreach($query->result_array() as $row){
            $CID = $row['curriculumID'];
            $SID = $row['subjectID'];
            $query2 = $this->db->query("select csubjectID,curriculumID,subjectID,Day,Time,Prof
            from curriculum_subjectgradeschool
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
                $this->db->insert('curriculum_subjectgradeschool_temp',$list);
            }
        }


        $this->db->query("delete from student_subject_gradeschool 
        where admissionNO = '$evaluationID'
        and year = '$level'");

    }


    public function viewCurriculumGradeschool(){

        $query = $this->db->query("select *
        from curriculum_gradeschool");
        return $query->result_array();

    }

    public function viewScheduleSubectsGradeschool($curriculumID){
        $query = $this->db->query("select csubjectID,curriculum_subjectgradeschool.subjectID,Day,Time,Prof,subjectCode,subjectDesc,FullName
        from curriculum_subjectgradeschool,subject_gradeschool,users
        where curriculum_subjectgradeschool.subjectID = subject_gradeschool.subjectID
        and curriculum_subjectgradeschool.Prof = users.userID
        and curriculumID = '$curriculumID'");
        return $query->result_array();
    }

    public function getProfessorsGradeschool(){
        $query = $this->db->query("select userID,FullName 
        from users
        where Position='9'
        and GradeSchooldpt = 'Yes'");
        return $query->result_array();
    }

    public function updateScheduleGradeschool($CsubjectID){

        $data = array(
            'Day' => $this->input->post('day'),
            'Time' => $this->input->post('time'),
            'Prof' => $this->input->post('prof'),
        );
        $this->db->where("csubjectID",$CsubjectID);
        $query = $this->db->update("curriculum_subjectgradeschool",$data);

    }

    public function showClassListGradeschool(){

        $query = $this->db->query("select DISTINCT student_subject_gradeschool.curriculumID,student_subject_gradeschool.subjectID,subjectCode,subjectDesc,Day,Time,student_subject_gradeschool.year,semester,FullName,Section
        from student_subject_gradeschool,subject_gradeschool,curriculum_subjectgradeschool,users,curriculum_gradeschool
        where student_subject_gradeschool.subjectID = subject_gradeschool.subjectID
        and student_subject_gradeschool.curriculumID = curriculum_subjectgradeschool.curriculumID
        and student_subject_gradeschool.subjectID = curriculum_subjectgradeschool.subjectID
        and student_subject_gradeschool.curriculumID = curriculum_gradeschool.curriculumID
        and curriculum_subjectgradeschool.Prof = `users`.userID
        order by subjectCode asc");
        return $query->result_array();

    }

    public function exportClassListGradeschool($curriculumID,$subjectID){

        $query = $this->db->query("select extension,StudentNo,FullName,Level,Contact,admissionID
        from students_gradeschool,student_subject_gradeschool
        where students_gradeschool.isEnrolled = 'Yes'
        and students_gradeschool.admissionID = student_subject_gradeschool.admissionNO
        and student_subject_gradeschool.curriculumID = '$curriculumID' 
        and student_subject_gradeschool.subjectID = '$subjectID'");
            
        return $query->result_array();

    }


    



   







}
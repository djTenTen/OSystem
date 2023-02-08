<?php
class Admission_model extends CI_Model{

    public function __construct(){
        $this->load->database();
    }

    //COLLEGE
    public function viewCollege(){

        ini_set('memory_limit', '-1');
        $query = $this->db->query("select *,CourseDesc
        from students_college,courses
        where students_college.Course = courses.CourseID
        and isEnrolled != 'Dismiss' order by admissionID desc limit 500");
        return $query->result_array();
 
    }

    public function viewCollegeSearch($keyword1){
        $query = $this->db->query("select *,CourseDesc 
        from students_college,courses 
        where concat(admissionID,FullName) like '%$keyword1%' and 
        students_college.Course = courses.CourseID 
        and isEnrolled != 'Dismiss' order by isValidated desc");
        return $query->result_array();
    }

    public function validateCollege($admissionID){
        date_default_timezone_set("Asia/Singapore");

        $query = $this->db->query("select TypeofApplication 
        from students_college 
        where admissionID = '$admissionID'");
        foreach($query->result_array() as $row){
            $TOA = $row['TypeofApplication'];
        }
        if($TOA == "OLD"){

            $data = array('isValidated' => 'Yes');
            $this->db->where('admissionId',$admissionID);
            $this->db->update('students_college',$data);

        }elseif($TOA == "NEW" || $TOA == "TRANSFEREE"){

            $selectLastStudentNo = $this->db->query("select count from studnoscounter");
            foreach($selectLastStudentNo->result_array() as $row){
                $lastStudno = $row['count'] + 1;
            }

            $dy = '21';
            $concat = $dy."C";

            $data = array('count' => $lastStudno);
            $this->db->update("studnoscounter",$data);

            $this->db->query("update students_college set isValidated='Yes', extension='$concat' , StudentNo='$lastStudno' where admissionID = '$admissionID'");

        }

        

    }


    public function viewCourses(){
        $query = $this->db->get('courses');
        return $query->result_array();
    }


    public function updateCollege($admissionID){
        $fn = trim(strtoupper($this->input->post('fname')));
        $ln = trim(strtoupper($this->input->post('lname')));
        $mn = trim(strtoupper($this->input->post('mname')));
        $suf = trim(strtoupper($this->input->post('suffix')));

        $fulllname = $ln .', '. $fn . ' ' . $mn . ' ' . $suf;

        $prob = trim(strtoupper($this->input->post('province')));
        $muni = trim(strtoupper($this->input->post('municipality')));
        $brgy = trim(strtoupper($this->input->post('barangay')));

        $address = $brgy .', '.$muni.', '.$prob;

        $data = array(
            'StudentNo' => trim(strtoupper($this->input->post('studentno'))),
            'LastName' => trim(strtoupper($this->input->post('lname'))),
            'FirstName' => trim(strtoupper($this->input->post('fname'))),
            'MiddleName' => trim(strtoupper($this->input->post('mname'))),
            'Suffix' => trim(strtoupper($this->input->post('suffix'))),
            'FullName' => $fulllname,
            'Province' => trim(strtoupper($this->input->post('province'))),
            'Municipality' => trim(strtoupper($this->input->post('municipality'))),
            'Barangay' => trim(strtoupper($this->input->post('barangay'))),
            'Address' => $address,
            'Contact' => trim($this->input->post('contact')),
            'Email' => trim($this->input->post('email')),
            'Birthdate' => trim($this->input->post('bdate')),
            'Age' => trim($this->input->post('age')),
            'Gender' => trim(strtoupper($this->input->post('gender'))),
            'Status' => trim(strtoupper($this->input->post('status'))),
            'Nationality' => trim(strtoupper($this->input->post('nationality'))),
            'Religion' => trim(strtoupper($this->input->post('religion'))),
            'Guardian1' => trim(strtoupper($this->input->post('parent1name'))),
            'RelationG1' => trim(strtoupper($this->input->post('parent1Relation'))),
            'ContactG1' => trim($this->input->post('parent1Contact')),
            'Guardian2' => trim(strtoupper($this->input->post('parent2name'))),
            'RelationG2' => trim(strtoupper($this->input->post('parent2Relation'))),
            'ContactG2' => trim($this->input->post('parent2Contact')),
            'LRN' => trim($this->input->post('lrn')),
            'Level' => trim(strtoupper($this->input->post('level'))),
            'Semester' => trim(strtoupper($this->input->post('sem'))),
            'Course' => trim($this->input->post('course')),
            'Elementary' => trim(strtoupper($this->input->post('elementary'))),
            'ESY' => trim($this->input->post('esy')),
            'Highschool' => trim(strtoupper($this->input->post('highschool'))),
            'HSY' => trim($this->input->post('hsy')),
            'Seniorhighschool' => trim(strtoupper($this->input->post('seniorhigh'))),
            'Sstrand' => trim(strtoupper($this->input->post('Sstrand'))),
            'SSY' => trim($this->input->post('ssy')),
            'Collegeschool' => trim(strtoupper($this->input->post('Collegeschool'))),
            'Ccourse' => trim(strtoupper($this->input->post('Ccourse'))),
            'CSY' => trim($this->input->post('csy')),
            'TypeofApplication' => trim(strtoupper($this->input->post('toApplication'))),
            'isTES' => $this->input->post('isTES')

        );

        $this->db->where('admissionID',$admissionID);
        return $this->db->update('students_college',$data);
    }

    public function viewValidatedCollege(){
        $query = $this->db->query("select *,CourseDesc,CourseCode 
        from students_college,courses 
        where students_college.Course = courses.CourseID 
        and isValidated='Yes' limit 200");
        return $query->result_array();
    }

    public function viewValidatedCollegeSearch($keyword2){
        $query = $this->db->query("select *,CourseDesc,CourseCode 
        from students_college,courses 
        where concat(admissionID,FullName) like '%$keyword2%' 
        and students_college.Course = courses.CourseID 
        and isValidated='Yes'");
        return $query->result_array();
    }

    public function pendingCountCollege(){
        $query = $this->db->query("select admissionID from students_college where isValidated='No'");
        return $query->num_rows();
    }

    public function validatedCountCollege(){
        $query = $this->db->query("select admissionID from students_college where isValidated='Yes'");
        return $query->num_rows();
    }

    public function EvaluatedCountCollege(){
        $query = $this->db->query("select admissionID from students_college where isEvaluated='Yes'");
        return $query->num_rows();
    }

    public function EnrolledCountCollege(){
        $query = $this->db->query("select admissionID from students_college where isEnrolled='Yes'");
        return $query->num_rows();
    }

    public function deleteCollege($admissionID){
        $this->db->where("admissionID", $admissionID);
        $this->db->delete('students_college');
    }

    public function dismissCollege($admissionID){
        $data = array(
   
            'TypeofApplication' => 'Dismiss',
            'isTES' => 'Dismiss',
            'dateofEnrolled' => 'Dismiss',
            'isReg' => 'Dismiss',
            'isValidated' => 'Dismiss',
            'isEvaluated' => 'Dismiss',
            'isAssess' => 'Dismiss',
            'isEnrolled' => 'Dismiss',
            'isDropped' => 'Dismiss',
            'isTicked' => 'Dismiss',
            'Section' => 'Dismiss',
            'Semester' => 'Dismiss',
            'Reason' => $this->input->post('reason')
        );

        $this->db->where("admissionID", $admissionID);
        $this->db->update('students_college',$data);
    }

    public function cbrCollege($admissionID){
        $data = array(
            'isContact' => 'No',
        );
        $this->db->where("admissionID", $admissionID);
        $this->db->update('students_college',$data);
    }


    

















    // SENIORHIGH
    public function viewPendingSeniorhigh(){
        $query = $this->db->query("select * 
        from students_seniorhigh
        where isEnrolled != 'Dismiss' order by isValidated asc limit 200");
        return $query->result_array();
    }

    public function viewPendingSeniorhighSearch($keyword1){
        $query = $this->db->query("select * 
        from students_seniorhigh
        where concat(admissionID,FullName) like '%$keyword1%' 
        and isEnrolled != 'Dismiss' order by isValidated asc");
        return $query->result_array();
    }


    public function pendingCountSeniorhigh(){
        $query = $this->db->query("select admissionID from students_seniorhigh where isValidated='No'");
        return $query->num_rows();
    }

    public function validatedCounSeniorhigh(){
        $query = $this->db->query("select admissionID from students_seniorhigh where isValidated='Yes'");
        return $query->num_rows();
    }

    public function EvaluatedCountSeniorhigh(){
        $query = $this->db->query("select admissionID from students_seniorhigh where isEvaluated='Yes'");
        return $query->num_rows();
    }

    public function EnrolledCountSeniorhigh(){
        $query = $this->db->query("select admissionID from students_seniorhigh where isEnrolled='Yes'");
        return $query->num_rows();
    }

    public function viewValidatedSeniorhigh(){
        $query = $this->db->query("select * 
        from students_seniorhigh 
        where isValidated='Yes' limit 200");
        return $query->result_array();
    }

    public function viewValidatedSeniorhighSearch($keyword2){
        $query = $this->db->query("select * 
        from students_seniorhigh 
        where concat(admissionID,FullName) like '%$keyword2%' 
        and isValidated='Yes'");
        return $query->result_array();
    }


    public function validateSeniorhigh($admissionID){

        date_default_timezone_set("Asia/Singapore");

        $query = $this->db->query("select TypeofApplication 
        from students_seniorhigh 
        where admissionID = '$admissionID'");
        foreach($query->result_array() as $row){
            $TOA = $row['TypeofApplication'];
        }
        if($TOA == "OLD"){

            $data = array('isValidated' => 'Yes');
            $this->db->where('admissionId',$admissionID);
            $this->db->update('students_seniorhigh',$data);

        }elseif($TOA == "NEW" || $TOA == "TRANSFEREE"){

            $selectLastStudentNo = $this->db->query("select count from studnoscounter");
            foreach($selectLastStudentNo->result_array() as $row){
                $lastStudno = $row['count'] + 1;
            }

            $dy = '21';
            $concat = $dy."S";

            $data = array('count' => $lastStudno);
            $this->db->update("studnoscounter",$data);

            $this->db->query("update students_seniorhigh set isValidated='Yes', extension='$concat' , StudentNo='$lastStudno' where admissionID = '$admissionID'");

        }

    }


    public function updateSeniorhigh($admissionID){
        $fn = trim(strtoupper($this->input->post('fname')));
        $ln = trim(strtoupper($this->input->post('lname')));
        $mn = trim(strtoupper($this->input->post('mname')));
        $suf = trim(strtoupper($this->input->post('suffix')));

        $fulllname = $ln .', '. $fn . ' ' . $mn . ' ' . $suf;

        $prob = trim(strtoupper($this->input->post('province')));
        $muni = trim(strtoupper($this->input->post('municipality')));
        $brgy = trim(strtoupper($this->input->post('barangay')));

        $address = $brgy .', '.$muni.', '.$prob;

        $data = array(
            'LastName' => trim(strtoupper($this->input->post('lname'))),
            'FirstName' => trim(strtoupper($this->input->post('fname'))),
            'MiddleName' => trim(strtoupper($this->input->post('mname'))),
            'Suffix' => trim(strtoupper($this->input->post('suffix'))),
            'FullName' => $fulllname,
            'Province' => trim(strtoupper($this->input->post('province'))),
            'Municipality' => trim(strtoupper($this->input->post('municipality'))),
            'Barangay' => trim(strtoupper($this->input->post('barangay'))),
            'Address' => $address,
            'Contact' => trim($this->input->post('contact')),
            'Email' => trim($this->input->post('email')),
            'Birthdate' => trim($this->input->post('bdate')),
            'Age' => trim($this->input->post('age')),
            'Gender' => trim(strtoupper($this->input->post('gender'))),
            'Status' => trim(strtoupper($this->input->post('status'))),
            'Nationality' => trim(strtoupper($this->input->post('nationality'))),
            'Religion' => trim(strtoupper($this->input->post('religion'))),
            'Guardian1' => trim(strtoupper($this->input->post('parent1name'))),
            'RelationG1' => trim(strtoupper($this->input->post('parent1Relation'))),
            'ContactG1' => trim($this->input->post('parent1Contact')),
            'Guardian2' => trim(strtoupper($this->input->post('parent2name'))),
            'RelationG2' => trim(strtoupper($this->input->post('parent2Relation'))),
            'ContactG2' => trim($this->input->post('parent2Contact')),
            'LRN' => trim($this->input->post('lrn')),
            'Level' => trim(strtoupper($this->input->post('level'))),
            'Semester' => trim(strtoupper($this->input->post('sem'))),
            'Strand' => trim(strtoupper($this->input->post('strand'))),
            'Elementary' => trim(strtoupper($this->input->post('elementary'))),
            'ESY' => trim($this->input->post('esy')),
            'Highschool' => trim(strtoupper($this->input->post('highschool'))),
            'HSY' => trim($this->input->post('hsy')),
            'Seniorhighschool' => trim(strtoupper($this->input->post('seniorhigh'))),
            'Sstrand' => trim(strtoupper($this->input->post('Sstrand'))),
            'SSY' => trim($this->input->post('ssy')),
        );

        $this->db->where('admissionID',$admissionID);
        return $this->db->update('students_seniorhigh',$data);
    }


    




    public function dismissSeniorhigh($admissionID){
        $data = array(
   
            'TypeofApplication' => 'Dismiss',
            'isTES' => 'Dismiss',
            'dateofEnrolled' => 'Dismiss',
            'isValidated' => 'Dismiss',
            'isEvaluated' => 'Dismiss',
            'isAssess' => 'Dismiss',
            'isEnrolled' => 'Dismiss',
            'isDropped' => 'Dismiss',
            'isTicked' => 'Dismiss',
            'Section' => 'Dismiss',
            'Semester' => 'Dismiss',
            'Reason' => $this->input->post('reason')
        );

        $this->db->where("admissionID", $admissionID);
        $this->db->update('students_seniorhigh',$data);
    }


























    // JUNIORHIGH
    public function viewPendingJuniorhigh(){
        $query = $this->db->query("select * 
        from students_juniorhigh
        where isEnrolled != 'Dismiss' order by isValidated asc limit 200");
        return $query->result_array();
    }

    public function viewPendingJuniorhighSearch($keyword1){
        $query = $this->db->query("select * 
        from students_juniorhigh
        where concat(admissionID,FullName) like '%$keyword1%' 
        and isEnrolled != 'Dismiss' order by isValidated asc");
        return $query->result_array();
    }


    public function viewValidatedJuniorhigh(){
        $query = $this->db->query("select * 
        from students_juniorhigh 
        where isValidated='Yes' limit 200");
        return $query->result_array();
    }

    public function viewValidatedJuniorhighSearch($keyword2){
        $query = $this->db->query("select * 
        from students_juniorhigh 
        where concat(admissionID,FullName) like '%$keyword2%' 
        and isValidated='Yes'");
        return $query->result_array();
    }

    public function pendingCountJuniorhigh(){
        $query = $this->db->query("select admissionID from students_juniorhigh where isValidated='No'");
        return $query->num_rows();
    }

    public function validatedCounJuniorhigh(){
        $query = $this->db->query("select admissionID from students_juniorhigh where isValidated='Yes'");
        return $query->num_rows();
    }

    public function EvaluatedCountJuniorhigh(){
        $query = $this->db->query("select admissionID from students_juniorhigh where isEvaluated='Yes'");
        return $query->num_rows();
    }

    public function EnrolledCountJuniorhigh(){
        $query = $this->db->query("select admissionID from students_juniorhigh where isEnrolled='Yes'");
        return $query->num_rows();
    }


    public function validateJuniorhigh($admissionID){

        date_default_timezone_set("Asia/Singapore");

        $query = $this->db->query("select TypeofApplication 
        from students_juniorhigh 
        where admissionID = '$admissionID'");
        foreach($query->result_array() as $row){
            $TOA = $row['TypeofApplication'];
        }
        if($TOA == "OLD"){

            $data = array('isValidated' => 'Yes');
            $this->db->where('admissionId',$admissionID);
            $this->db->update('students_juniorhigh',$data);

        }elseif($TOA == "NEW" || $TOA == "TRANSFEREE"){

            $selectLastStudentNo = $this->db->query("select count from studnoscounter");
            foreach($selectLastStudentNo->result_array() as $row){
                $lastStudno = $row['count'] + 1;
            }

            $dy = '21';
            $concat = $dy."J";

            $data = array('count' => $lastStudno);
            $this->db->update("studnoscounter",$data);

            $this->db->query("update students_juniorhigh set isValidated='Yes', extension='$concat' , StudentNo='$lastStudno' where admissionID = '$admissionID'");

        }

    }

    public function updateJuniorhigh($admissionID){
        $fn = trim(strtoupper($this->input->post('fname')));
        $ln = trim(strtoupper($this->input->post('lname')));
        $mn = trim(strtoupper($this->input->post('mname')));
        $suf = trim(strtoupper($this->input->post('suffix')));

        $fulllname = $ln .', '. $fn . ' ' . $mn . ' ' . $suf;

        $prob = trim(strtoupper($this->input->post('province')));
        $muni = trim(strtoupper($this->input->post('municipality')));
        $brgy = trim(strtoupper($this->input->post('barangay')));

        $address = $brgy .', '.$muni.', '.$prob;

        $data = array(
            'LastName' => trim(strtoupper($this->input->post('lname'))),
            'FirstName' => trim(strtoupper($this->input->post('fname'))),
            'MiddleName' => trim(strtoupper($this->input->post('mname'))),
            'Suffix' => trim(strtoupper($this->input->post('suffix'))),
            'FullName' => $fulllname,
            'Province' => trim(strtoupper($this->input->post('province'))),
            'Municipality' => trim(strtoupper($this->input->post('municipality'))),
            'Barangay' => trim(strtoupper($this->input->post('barangay'))),
            'Address' => $address,
            'Contact' => trim($this->input->post('contact')),
            'Email' => trim($this->input->post('email')),
            'Birthdate' => trim($this->input->post('bdate')),
            'Age' => trim($this->input->post('age')),
            'Gender' => trim(strtoupper($this->input->post('gender'))),
            'Status' => trim(strtoupper($this->input->post('status'))),
            'Nationality' => trim(strtoupper($this->input->post('nationality'))),
            'Religion' => trim(strtoupper($this->input->post('religion'))),
            'Guardian1' => trim(strtoupper($this->input->post('parent1name'))),
            'RelationG1' => trim(strtoupper($this->input->post('parent1Relation'))),
            'ContactG1' => trim($this->input->post('parent1Contact')),
            'Guardian2' => trim(strtoupper($this->input->post('parent2name'))),
            'RelationG2' => trim(strtoupper($this->input->post('parent2Relation'))),
            'ContactG2' => trim($this->input->post('parent2Contact')),
            'LRN' => trim($this->input->post('lrn')),
            'Level' => trim(strtoupper($this->input->post('level'))),
            'Elementary' => trim(strtoupper($this->input->post('elementary'))),
            'ESY' => trim($this->input->post('esy')),
            'Highschool' => trim(strtoupper($this->input->post('highschool'))),
            'HSY' => trim($this->input->post('hsy'))
        );

        $this->db->where('admissionID',$admissionID);
        return $this->db->update('students_juniorhigh',$data);
    }


    public function dismissJuniorhigh($admissionID){
        $data = array(
   
            'TypeofApplication' => 'Dismiss',
            'dateofEnrolled' => 'Dismiss',
            'isReg' => 'Dismiss',
            'isValidated' => 'Dismiss',
            'isEvaluated' => 'Dismiss',
            'isAssess' => 'Dismiss',
            'isEnrolled' => 'Dismiss',
            'isDropped' => 'Dismiss',
            'isTicked' => 'Dismiss',
            'Section' => 'Dismiss',
            'Semester' => 'Dismiss',
            'Reason' => $this->input->post('reason')
        );

        $this->db->where("admissionID", $admissionID);
        $this->db->update('students_juniorhigh',$data);
    }


























    // GRADESCHOOL
    public function viewPendingGradeschool(){
        $query = $this->db->query("select * 
        from students_gradeschool
        where isEnrolled != 'Dismiss' order by isValidated asc limit 200");
        return $query->result_array();
    }

    public function viewPendingGradeschoolSearch($keyword1){
        $query = $this->db->query("select * 
        from students_gradeschool
        where concat(admissionID,FullName) like '%$keyword1%' 
        and isEnrolled != 'Dismiss' order by isValidated asc");
        return $query->result_array();
    }

    public function viewValidatedGradeschool(){
        $query = $this->db->query("select * 
        from students_gradeschool
        where isValidated='Yes' limit 200");
        return $query->result_array();
    }

    public function viewValidatedGradeschoolSearch($keyword2){
        $query = $this->db->query("select * 
        from students_gradeschool
        where concat(admissionID,FullName) like '%$keyword2%' 
        and isValidated='Yes'");
        return $query->result_array();
    }

    public function pendingCountGradeschool(){
        $query = $this->db->query("select admissionID from students_gradeschool where isValidated='No'");
        return $query->num_rows();
    }

    public function validatedCounGradeschool(){
        $query = $this->db->query("select admissionID from students_gradeschool where isValidated='Yes'");
        return $query->num_rows();
    }

    public function EvaluatedCountGradeschool(){
        $query = $this->db->query("select admissionID from students_gradeschool where isEvaluated='Yes'");
        return $query->num_rows();
    }

    public function EnrolledCountGradeschool(){
        $query = $this->db->query("select admissionID from students_gradeschool where isEnrolled='Yes'");
        return $query->num_rows();
    }

    public function validateGradeschool($admissionID){

        date_default_timezone_set("Asia/Singapore");

        $query = $this->db->query("select TypeofApplication 
        from students_gradeschool 
        where admissionID = '$admissionID'");
        foreach($query->result_array() as $row){
            $TOA = $row['TypeofApplication'];
        }

        if($TOA == "OLD"){

            $data = array('isValidated' => 'Yes');
            $this->db->where('admissionId',$admissionID);
            $this->db->update('students_gradeschool',$data);

        }elseif($TOA == "NEW" || $TOA == "TRANSFEREE"){

            $selectLastStudentNo = $this->db->query("select count from studnoscounter");
            foreach($selectLastStudentNo->result_array() as $row){
                $lastStudno = $row['count'] + 1;
            }

            $dy = '21';
            $concat = $dy."G";

            $data = array('count' => $lastStudno);
            $this->db->update("studnoscounter",$data);

            $this->db->query("update students_gradeschool set isValidated='Yes', extension='$concat' , StudentNo='$lastStudno' where admissionID = '$admissionID'");

        }

    }

    public function updateGradeschool($admissionID){
        $fn = trim(strtoupper($this->input->post('fname')));
        $ln = trim(strtoupper($this->input->post('lname')));
        $mn = trim(strtoupper($this->input->post('mname')));
        $suf = trim(strtoupper($this->input->post('suffix')));

        $fulllname = $ln .', '. $fn . ' ' . $mn . ' ' . $suf;

        $prob = trim(strtoupper($this->input->post('province')));
        $muni = trim(strtoupper($this->input->post('municipality')));
        $brgy = trim(strtoupper($this->input->post('barangay')));

        $address = $brgy .', '.$muni.', '.$prob;

        $data = array(
            'LastName' => trim(strtoupper($this->input->post('lname'))),
            'FirstName' => trim(strtoupper($this->input->post('fname'))),
            'MiddleName' => trim(strtoupper($this->input->post('mname'))),
            'Suffix' => trim(strtoupper($this->input->post('suffix'))),
            'FullName' => $fulllname,
            'Province' => trim(strtoupper($this->input->post('province'))),
            'Municipality' => trim(strtoupper($this->input->post('municipality'))),
            'Barangay' => trim(strtoupper($this->input->post('barangay'))),
            'Address' => $address,
            'Contact' => trim($this->input->post('contact')),
            'Email' => trim($this->input->post('email')),
            'Birthdate' => trim($this->input->post('bdate')),
            'Age' => trim($this->input->post('age')),
            'Gender' => trim(strtoupper($this->input->post('gender'))),
            'Status' => trim(strtoupper($this->input->post('status'))),
            'Nationality' => trim(strtoupper($this->input->post('nationality'))),
            'Religion' => trim(strtoupper($this->input->post('religion'))),
            'Guardian1' => trim(strtoupper($this->input->post('parent1name'))),
            'RelationG1' => trim(strtoupper($this->input->post('parent1Relation'))),
            'ContactG1' => trim($this->input->post('parent1Contact')),
            'Guardian2' => trim(strtoupper($this->input->post('parent2name'))),
            'RelationG2' => trim(strtoupper($this->input->post('parent2Relation'))),
            'ContactG2' => trim($this->input->post('parent2Contact')),
            'LRN' => trim($this->input->post('lrn')),
            'Level' => trim(strtoupper($this->input->post('level'))),
            'Elementary' => trim(strtoupper($this->input->post('elementary'))),
            'ESY' => trim($this->input->post('esy'))

        );

        $this->db->where('admissionID',$admissionID);
        return $this->db->update('students_gradeschool',$data);
    }

    public function dismissGradeschool($admissionID){
        $data = array(
            'TypeofApplication' => 'Dismiss',
            'dateofEnrolled' => 'Dismiss',
            'isReg' => 'Dismiss',
            'isValidated' => 'Dismiss',
            'isEvaluated' => 'Dismiss',
            'isAssess' => 'Dismiss',
            'isEnrolled' => 'Dismiss',
            'isDropped' => 'Dismiss',
            'isTicked' => 'Dismiss',
            'Section' => 'Dismiss',
            'Semester' => 'Dismiss',
            'Reason' => $this->input->post('reason')
        );

        $this->db->where("admissionID", $admissionID);
        $this->db->update('students_gradeschool',$data);
    }







}

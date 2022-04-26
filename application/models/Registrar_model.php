<?php
class Registrar_model extends CI_Model{

    public function __construct(){
        $this->load->database();
    }
    // DASHBOARD

    public function getNewStudentCountCollege(){
        $query = $this->db->query("select FullName 
        from students_college 
        where isEnrolled != 'Dismiss' 
        and TypeofApplication = 'NEW'
        or TypeofApplication = 'TRANSFEREE'");
        return $query->num_rows();
    }

    public function getOldStudentCountCollege(){

        $query = $this->db->query("select admissionID
        from students_college
        where TypeofApplication = 'OLD'");
        return $query->num_rows();

    }

    public function getPendingCollege(){

        $query = $this->db->query("select admissionID
        from students_college
        where isValidated = 'No'");
        return $query->num_rows();

    }

    public function getValidatedCollege(){
        $query = $this->db->query("select admissionID
        from students_college
        where isValidated ='Yes'
        and isEvaluated = 'No'");
        return $query->num_rows();
    }

    public function getEvaluatedCollege(){

        $query = $this->db->query("select admissionID
        from students_college
        where isEvaluated ='Yes'
        and isAssess = 'No'");
        return $query->num_rows();

    }

    public function getAssessedCollege(){

        $query = $this->db->query("select admissionID
        from students_college
        where isAssess ='Yes'
        and isEnrolled = 'No'");
        return $query->num_rows();

    }

    public function getEnrolledCollege(){
        $this->db->where("isEnrolled",'Yes');
        $query = $this->db->get('students_college');
        return $query->num_rows();
    }

    public function getTotalCollege(){
        $query = $this->db->query("select FullName
        from students_college
        where isEnrolled != 'Dismiss'");
        return $query->num_rows();
    }

    public function getTotalDismissedCollege(){
        $query = $this->db->query("select admissionID 
        from students_college
        where isEnrolled = 'Dismiss'");
        return $query->num_rows();
    }







    public function getNewStudentCountSeniorhigh(){

        $query = $this->db->query("select admissionID
        from students_seniorhigh
        where TypeofApplication = 'TRANSFEREE'
        or TypeofApplication = 'NEW'");
        return $query->num_rows();

    }

    public function getOldStudentCountSeniorhigh(){

        $query = $this->db->query("select admissionID
        from students_seniorhigh
        where TypeofApplication = 'OLD'");
        return $query->num_rows();
        
    }

    public function getPendingseniorhigh(){

        $query = $this->db->query("select admissionID
        from students_seniorhigh
        where isValidated = 'No'");
        return $query->num_rows();

    }

    public function getValidatedseniorhigh(){

        $query = $this->db->query("select admissionID
        from students_seniorhigh
        where isValidated ='Yes'
        and isEvaluated = 'No'");
        return $query->num_rows();

    }

    public function getEvaluatedseniorhigh(){

        $query = $this->db->query("select admissionID
        from students_seniorhigh
        where isEvaluated ='Yes'
        and isAssess = 'No'");
        return $query->num_rows();

    }

    public function getAssessedseniorhigh(){

        $query = $this->db->query("select admissionID
        from students_seniorhigh
        where isAssess ='Yes'
        and isEnrolled = 'No'");
        return $query->num_rows();
    }

    public function getEnrolledseniorhigh(){
        $this->db->where("isEnrolled",'Yes');
        $query = $this->db->get('students_seniorhigh');
        return $query->num_rows();
    }

    public function getTotalseniorhigh(){
        $query = $this->db->get('students_seniorhigh');
        return $query->num_rows();
    }

    public function getTotalDismissedSeniorhigh(){
        $query = $this->db->query("select admissionID 
        from students_seniorhigh
        where isEnrolled = 'Dismiss'");
        return $query->num_rows();
    }




    


    public function getNewStudentCountJuniorhigh(){

        $query = $this->db->query("select admissionID
        from students_juniorhigh
        where TypeofApplication = 'TRANSFEREE'
        or TypeofApplication = 'NEW'");
        return $query->num_rows();

    }


    public function getOldStudentCountJuniorhigh(){
        $this->db->where("TypeofApplication",'OLD');
        $query = $this->db->get('students_juniorhigh');
        return $query->num_rows();
    }

    public function getPendingjuniorhigh(){

        $query = $this->db->query("select admissionID
        from students_juniorhigh
        where isValidated = 'No'");
        return $query->num_rows();

    }

    public function getValidatedjuniorhigh(){

        $query = $this->db->query("select admissionID
        from students_juniorhigh
        where isValidated ='Yes'
        and isEvaluated = 'No'");
        return $query->num_rows();

    }

    public function getEvaluatedjuniorhigh(){

        $query = $this->db->query("select admissionID
        from students_juniorhigh
        where isEvaluated ='Yes'
        and isAssess = 'No'");
        return $query->num_rows();

    }

    public function getAssessedjuniorhigh(){

        $query = $this->db->query("select admissionID
        from students_seniorhigh
        where isAssess ='Yes'
        and isEnrolled = 'No'");
        return $query->num_rows();
    
    }

    public function getEnrolledjuniorhigh(){
        $this->db->where("isEnrolled",'Yes');
        $query = $this->db->get('students_juniorhigh');
        return $query->num_rows();
    }

    public function getTotaljuniorhigh(){
        $query = $this->db->get('students_juniorhigh');
        return $query->num_rows();
    }

    public function getTotalDismissedJuniorhigh(){
        $query = $this->db->query("select admissionID 
        from students_juniorhigh
        where isEnrolled = 'Dismiss'");
        return $query->num_rows();
    }




    public function getNewStudentCountGradeschool(){

        $query = $this->db->query("select admissionID
        from students_gradeschool
        where TypeofApplication = 'TRANSFEREE'
        or TypeofApplication = 'NEW'");
        return $query->num_rows();
    }

    public function getOldStudentCountGradeschool(){
        $this->db->where("TypeofApplication",'OLD');
        $query = $this->db->get('students_gradeschool');
        return $query->num_rows();
    }

    public function getPendinggradeschool(){
        $this->db->where("isValidated",'No');
        $query = $this->db->get('students_gradeschool');
        return $query->num_rows();
    }

    public function getValidatedgradeschool(){

        $query = $this->db->query("select admissionID
        from students_gradeschool
        where isValidated ='Yes'
        and isEvaluated = 'No'");
        return $query->num_rows();

    }

    public function getEvaluatedgradeschool(){

        $query = $this->db->query("select admissionID
        from students_gradeschool
        where isEvaluated ='Yes'
        and isAssess = 'No'");
        return $query->num_rows();

    }

    public function getAssessedgradeschool(){

        $query = $this->db->query("select admissionID
        from students_gradeschool
        where isAssess ='Yes'
        and isEnrolled = 'No'");
        return $query->num_rows();

    }

    public function getEnrolledgradeschool(){
        $this->db->where("isEnrolled",'Yes');
        $query = $this->db->get('students_gradeschool');
        return $query->num_rows();
    }

    public function getTotalgradeschool(){
        $query = $this->db->get('students_gradeschool');
        return $query->num_rows();
    }

    public function getTotalDismissedGradeschool(){
        $query = $this->db->query("select admissionID 
        from students_gradeschool
        where isEnrolled = 'Dismiss'");
        return $query->num_rows();
    }
    

    // COLLEGE 
    public function getStudents(){
        $query = $this->db->query("select *,CourseCode
        from students_college,courses
        where students_college.Course = courses.CourseID
        and isValidated != 'Dismiss' order by LastName asc limit 0");
        return $query->result_array();
    }

    public function getStudentSearch($keyword){
        $query = $this->db->query("select *,CourseCode,CourseDesc
        from students_college,courses
        where concat(admissionID,StudentNo,FullName) like '%$keyword%'
        and students_college.Course = courses.CourseID
        and isValidated != 'Dismiss'");
        return $query->result_array();
    }
    
    //GETTING THE STUDENTS INFO
    public function viewStudentInfo($ID){
        $query = $this->db->query("select extension,StudentNo,LastName,FirstName,MiddleName,FullName,Address,Level,Semester,CourseDesc,CourseCode,CollegeDPT,CourseID 
        from students_college,courses 
        where students_college.Course = courses.CourseID 
        and admissionID = '$ID'");
        return $query->row_array();
    }

    public function viewStudentSubjects($admissionID){

        $stud = $this->db->query("select Level,Semester from students_college where admissionID = '$admissionID'");
        $res = $stud->row();
        if (isset($res)){
            $level = $res->Level;
            $sem = $res->Semester;
        }

        $query = $this->db->query("select student_subject_college.subjectID,subjectCode,SubjectDesc,lec,labComputer,labNonComputer,units,computeunits,Day,Time,FullName,Grade,Remarks,isReleasing,CourseCode,Section
        from student_subject_college,subject_college,curriculum_subjectcollege,users,courses,curriculum_college
        where student_subject_college.subjectID = subject_college.subjectID
        and student_subject_college.curriculumID = curriculum_subjectcollege.curriculumID
        and student_subject_college.subjectID = curriculum_subjectcollege.subjectID
        and curriculum_college.courseID = courses.CourseID
        and student_subject_college.curriculumID = curriculum_college.curriculumID
        and student_subject_college.Teacher = users.userID
        and admissionNO = '$admissionID'
        and student_subject_college.year = '$level'
        and semester = '$sem'");

        return $query->result_array();
    }

    public function getsubjectCount($admissionID){

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

    public function getCourse(){
        $query = $this->db->get("courses");
        return $query->result_array();
    }

    public function viewTempCollegeDiscount($admissionID){
        $query = $this->db->query("select discounts.discountName, discounts.discountPercent, temp_discount.Discount,temp_discountID
        from temp_discount ,discounts
        where temp_discount.Discount = discounts.discountID
        and admissionID = '$admissionID'");
        return $query->result_array();
    }

    public function addCDiscount($admissionID){

        $data = array(
            'Discount' => $this->input->post('discount'),
            'admissionID' => $admissionID,
            'dpt' => 'College'
        );
        $this->db->insert('temp_discount', $data);

    }

    //removing discount on the student on temp table
    public function removeCDiscount($admissionID,$discountID){
        $this->db->query("delete from temp_discount 
        where admissionID = '$admissionID'
        and temp_discountID = '$discountID'");
    }

    // registering the payment of student
    public function registerFeeCollege($admissionID,$sy,$level,$sem,$mainunits,$mp,$Tfee,$totalmisc,$totalasses,$totaldiscount,$masterTotal){
        
        date_default_timezone_set("Asia/Singapore");
        $date = date("m/d/Y");

        //checking of duplication of accounts
        $checkduplicate = $this->db->query("select accountID 
        from account_college
        where admissionID = '$admissionID'
        and sy = '$sy'
        and Level = '$level'
        and Sem = '$sem'");
        $resuldDuplication = $checkduplicate->num_rows();


        $data = array(
            'admissionID' => $admissionID,
            'sy' => $sy,
            'Level' => $level,
            'Sem' => $sem,
            'Units' => $mainunits,
            'Mode' => $mp,
            'Tuition' => $Tfee,
            'Misc' => $totalmisc,
            'Assessment' => $totalasses,
            'Discount' => $totaldiscount,
            'Tassessment' => $masterTotal,
            'Balance' => $masterTotal,
            'Date' => $date
        );


        if($resuldDuplication > 0){
            // Duplicate Detected and it will update the existing
            $this->db->query("update account_college set
            Units = '$mainunits',
            Mode = '$mp',
            Tuition = '$Tfee',
            Misc = '$totalmisc',
            Assessment = '$totalasses',
            Discount = '$totaldiscount',
            Tassessment = '$masterTotal',
            Balance = '$masterTotal',
            Date = '$date' 
            where admissionID = '$admissionID'
            and sy = '$sy'
            and Level = '$level'
            and Sem = '$sem'");
        }else{
            // No DUplication Detected an it will Add new Account 
            $this->db->insert('account_college', $data);

            //Getting the Account ID
            $query = $this->db->query("select accountID 
            from account_college order by accountID desc limit 1");
            foreach($query->result_array() as $row){
                $accountID = $row['accountID'];
            }

            //Calculating Date
            $startdate=strtotime("August 1 2021");
            $enddate=strtotime("+4 months", $startdate);
            $monthly = $masterTotal / 4;

            //inserting the Date Installment
            while ($startdate < $enddate) {
                
                $payee = array(
                    'accountID' => $accountID,
                    'Amount' => round($monthly, 2),
                    'DueDate' => date("M, d Y", $startdate)
                );
                $this->db->insert('account_college_payable', $payee);
                $startdate = strtotime("+1 months", $startdate);

            }

        }

    }
    

    public function shiftStudent($admissionID){
        $shifto = $this->input->post('shiftCto');

        $stud = $this->db->query("select Level,Semester from students_college where admissionID = '$admissionID'");
        $res = $stud->row();
        if (isset($res)){
            $level = $res->Level;
            $sem = $res->Semester;
        }

        $data = array(
            "Course" => $shifto,
            "isEvaluated" => "No",
            "isAssess" => "No",
            "Section" => "",
        );

        $this->db->where("admissionID", $admissionID);
        $this->db->update("students_college", $data);

        $this->db->query("delete from student_subject_college
        where admissionNO = '$admissionID'
        and year = '$level'
        and semester = '$sem'");

    }

    public function marktesCollege($admissionID){
        $data = array(
            "isTES" => 'Yes'
        );
        $this->db->where("admissionID", $admissionID);
        $this->db->update("students_college", $data);

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

        );

        $this->db->where('admissionID',$admissionID);
        return $this->db->update('students_college',$data);
    }


    public function getstudentInfoCollege($admissionID){

       $query = $this->db->query("select StudentNo,FullName,Address,Level,Semester,CourseDesc,CollegeDPT from students_college,courses
       where students_college.Course = courses.CourseID
       and admissionID = '$admissionID'");
       return $query->row_array();

    }

    public function getSubjectsCollege($admissionID){

        $stud = $this->db->query("select Level,Semester from students_college where admissionID = '$admissionID'");
        $res = $stud->row();
        if (isset($res)){
            $level = $res->Level;
            $sem = $res->Semester;
        }

        $query = $this->db->query("select studentsubjectID,student_subject_college.subjectID,subjectCode,subjectDesc,units,Day,Time,FullName
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
    
    public function dropsubjectCollege($SsubjectID){

        $this->db->where("studentsubjectID",$SsubjectID);
        $this->db->delete("student_subject_college");

    }

    public function viewDiscountsCollege(){
        $query = $this->db->query("select * 
        from discounts
        where ForWhat = 'College'");
        return $query->result_array();
    }

    public function assessstudentCollege($admissionID){

        $data = array(
            'isAssess' => 'Yes',
        );

        $this->db->where("admissionID", $admissionID);
        $this->db->update("students_college", $data);


        $this->db->query("delete from temp_discount 
        where admissionID = '$admissionID'
        and dpt = 'College'");

    }



    public function viewGWACollege(){

        $query = $this->db->query("select *,CourseDesc,CourseCode 
        from students_college,courses 
        where students_college.Course = courses.CourseID  
        and isEnrolled = 'Yes'");
        return $query->result_array();

    }


















    













    //SENIORHIGH
    public function getStudentsSeniorhigh(){
        $query = $this->db->query("select *
        from students_seniorhigh order by LastName asc limit 0");
        return $query->result_array();
    }

    public function getStudentSeniorhighSearch($keyword){
        $query = $this->db->query("select *
        from students_seniorhigh
        where concat(admissionID,StudentNo,FullName) like '%$keyword%'");
        return $query->result_array();
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
            'Elementary' => trim(strtoupper($this->input->post('elementary'))),
            'ESY' => trim($this->input->post('esy')),
            'Highschool' => trim(strtoupper($this->input->post('highschool'))),
            'HSY' => trim($this->input->post('hsy')),
            'Seniorhighschool' => trim(strtoupper($this->input->post('seniorhigh'))),
            'Sstrand' => trim(strtoupper($this->input->post('Sstrand'))),
            'SSY' => trim($this->input->post('ssy'))

        );

        $this->db->where('admissionID',$admissionID);
        return $this->db->update('students_seniorhigh',$data);
    }


    public function viewStudentInfoSeniorhigh($ID){
        $query = $this->db->query("select extension,StudentNo,LastName,FirstName,MiddleName,FullName,Address,Level,Semester,Section,Strand 
        from students_seniorhigh
        where admissionID = '$ID'");
        return $query->row_array();
    }

    
    public function viewStudentSubjectsSeniorhigh($admissionID){

        $stud = $this->db->query("select Level,Semester from students_seniorhigh where admissionID = '$admissionID'");
        $res = $stud->row();
        if (isset($res)){
            $level = $res->Level;
            $sem = $res->Semester;
        }


        $query = $this->db->query("select student_subject_seniorhigh.subjectID,category,subjectCode,SubjectDesc,Day,Time,FullName,Grade,Remarks
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

        $stud = $this->db->query("select Level,Semester from students_seniorhigh where admissionID = '$admissionID'");
        $res = $stud->row();
        if (isset($res)){
            $level = $res->Level;
            $sem = $res->Semester;
        }
        $query = $this->db->query("select count(admissionNO) as subjectCount,sum(fee) as tuitionFee
        from student_subject_seniorhigh,subject_seniorhigh,curriculum_subjectseniorhigh
        where student_subject_seniorhigh.subjectID = subject_seniorhigh.subjectID 
        and student_subject_seniorhigh.curriculumID = curriculum_subjectseniorhigh.curriculumID 
        and student_subject_seniorhigh.subjectID = curriculum_subjectseniorhigh.subjectID 
        and admissionNO = '$admissionID'
        and year = '$level'
        and semester = '$sem'");
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


    public function shiftStudentseniorhigh($admissionID){
        $stud = $this->db->query("select Level,Semester from students_seniorhigh where admissionID = '$admissionID'");
        $res = $stud->row();
        if (isset($res)){
            $level = $res->Level;
            $sem = $res->Semester;
        }


        $shifto = $this->input->post('shiftCto');

        $data = array(
            "Strand" => $shifto,
            "Section" => "",
            "isEvaluated" => "No",
        );

        $this->db->where("admissionID", $admissionID);
        $this->db->update("students_seniorhigh", $data);

        $this->db->query("delete from student_subject_seniorhigh 
        where admissionNO = '$admissionID'
        and year = '$level'
        and semester = '$sem'");

    }

    public function assessstudentSeniorhigh($admissionID){

        $data = array(
            'isAssess' => 'Yes',
        );

        $this->db->where("admissionID", $admissionID);
        $this->db->update("students_seniorhigh", $data);

    }

    public function getstudentInfoSeniorhigh($admissionID){

        $query = $this->db->query("select StudentNo,FullName,Address,Level,Semester,Strand 
        from students_seniorhigh
        where admissionID = '$admissionID'");
        return $query->row_array();
 
    }

    public function getSubjectsSeniorhigh($admissionID){
        $stud = $this->db->query("select Level,Semester from students_seniorhigh where admissionID = '$admissionID'");
        $res = $stud->row();
        if (isset($res)){
            $level = $res->Level;
            $sem = $res->Semester;
        }
        $query = $this->db->query("select student_subject_seniorhigh.subjectID,studentsubjectID,category,subjectCode,SubjectDesc,Day,Time,FullName
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

    public function viewDiscountsSeniorhigh(){
        $query = $this->db->query("select * 
        from discounts
        where ForWhat = 'Seniorhigh'");
        return $query->result_array();
    }

    public function dropsubjectSeniorhigh($SsubjectID){
        $this->db->where("studentsubjectID",$SsubjectID);
        $this->db->delete("student_subject_seniorhigh");
    }
    






















    //JUNIORHIGH
    public function getStudentsJuniorhigh(){
        $query = $this->db->query("select *
        from students_juniorhigh
        where isValidated = 'Yes'
        and isEvaluated = 'Yes' order by LastName asc limit 0");
        return $query->result_array();
    }

    public function getStudentJuniorhighSearch($keyword){
        $query = $this->db->query("select *
        from students_juniorhigh
        where concat(admissionID,StudentNo,FullName) like '%$keyword%'
        and isValidated = 'Yes'
        and isEvaluated = 'Yes'");
        return $query->result_array();
    }

    public function shiftstudentJuniorhigh($admissionID){

        $stud = $this->db->query("select Level from students_juniorhigh where admissionID = '$admissionID'");
        $res = $stud->row();
        if (isset($res)){
            $level = $res->Level;
        }


        $data = array(
            "Section" => "",
            "isEvaluated" => "No",
        );

        $this->db->where("admissionID", $admissionID);
        $this->db->update("students_juniorhigh", $data);

        $this->db->query("delete from student_subject_juniorhigh 
        where admissionNO = '$admissionID'
        and year = '$level'");

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
            'Elementary' => trim(strtoupper($this->input->post('elementary'))),
            'ESY' => trim($this->input->post('esy')),
            'Highschool' => trim(strtoupper($this->input->post('highschool'))),
            'HSY' => trim($this->input->post('hsy'))
        );

        $this->db->where('admissionID',$admissionID);
        return $this->db->update('students_juniorhigh',$data);
    }

    public function viewStudentInfoJuniorhigh($ID){
        $query = $this->db->query("select extension,StudentNo,LastName,FirstName,MiddleName,FullName,Address,Level,Section 
        from students_juniorhigh
        where admissionID = '$ID'");
        return $query->row_array();
    }
 
    public function viewStudentSubjectsJuniorhigh($admissionID){

        $stud = $this->db->query("select Level from students_juniorhigh where admissionID = '$admissionID'");
        $res = $stud->row();
        if (isset($res)){
            $level = $res->Level;
        }


        $query = $this->db->query("select student_subject_juniorhigh.subjectID,subjectCode,SubjectDesc,Day,Time,FullName,Grade,Remarks
        from student_subject_juniorhigh,subject_juniorhigh,curriculum_subjectjuniorhigh,users
        where student_subject_juniorhigh.subjectID = subject_juniorhigh.subjectID
        and student_subject_juniorhigh.curriculumID = curriculum_subjectjuniorhigh.curriculumID
        and student_subject_juniorhigh.subjectID = curriculum_subjectjuniorhigh.subjectID
        and student_subject_juniorhigh.Teacher = users.userID
        and admissionNO = '$admissionID'
        and year = '$level'");
        return $query->result_array();
    }

    public function getsubjectCountJuniorhigh($admissionID){
        $stud = $this->db->query("select Level from students_juniorhigh where admissionID = '$admissionID'");
        $res = $stud->row();
        if (isset($res)){
            $level = $res->Level;
        }

        $query = $this->db->query("select count(admissionNO) as subjectCount, sum(hrs) as subjecthours
        from student_subject_juniorhigh,subject_juniorhigh,curriculum_subjectjuniorhigh
        where student_subject_juniorhigh.subjectID = subject_juniorhigh.subjectID
        and student_subject_juniorhigh.curriculumID = curriculum_subjectjuniorhigh.curriculumID
        and student_subject_juniorhigh.subjectID = curriculum_subjectjuniorhigh.subjectID
        and admissionNO = '$admissionID'
        and year = '$level'");
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

    public function viewDiscountsJuniorhigh(){
        $query = $this->db->query("select * 
        from discounts
        where ForWhat = 'Juniorhigh'");
        return $query->result_array();
    }


    public function assessstudentJuniorhigh($admissionID){

        $data = array(
            'isAssess' => 'Yes',
        );

        $this->db->where("admissionID", $admissionID);
        $this->db->update("students_juniorhigh", $data);

    }
























    //GRADE SCHOOL
    public function getStudentsGradeschool(){
        $query = $this->db->query("select *
        from students_gradeschool
        where isValidated = 'Yes'
        and isEvaluated = 'Yes' order by LastName asc limit 0");
        return $query->result_array();
    }


    public function getStudentsGradeschoolSearch($keyword){
        $query = $this->db->query("select *
        from students_gradeschool
        where concat(admissionID,StudentNo,FullName) like '%$keyword%'
        and isValidated = 'Yes'
        and isEvaluated = 'Yes'");
        return $query->result_array();
    }


    public function viewStudentInfoGradeschool($ID){
        $query = $this->db->query("select extension,StudentNo,LastName,FirstName,MiddleName,FullName,Address,Level,Section 
        from students_gradeschool
        where admissionID = '$ID'");
        return $query->row_array();
    }

    public function viewStudentSubjectsGradeschool($admissionID){
        $stud = $this->db->query("select Level from students_gradeschool where admissionID = '$admissionID'");
        $res = $stud->row();
        if (isset($res)){
            $level = $res->Level;
        }

        $query = $this->db->query("select student_subject_gradeschool.subjectID,subjectCode,SubjectDesc,Day,Time,FullName,Grade,Remarks
        from student_subject_gradeschool,subject_gradeschool,curriculum_subjectgradeschool,users
        where student_subject_gradeschool.subjectID = subject_gradeschool.subjectID
        and student_subject_gradeschool.curriculumID = curriculum_subjectgradeschool.curriculumID
        and student_subject_gradeschool.subjectID = curriculum_subjectgradeschool.subjectID
        and student_subject_gradeschool.Teacher = users.userID
        and admissionNO = '$admissionID'
        and year = '$level'");
        return $query->result_array();
    }

    public function getsubjectCountGradeschool($admissionID){
        $stud = $this->db->query("select Level from students_gradeschool where admissionID = '$admissionID'");
        $res = $stud->row();
        if (isset($res)){
            $level = $res->Level;
        }

        $query = $this->db->query("select count(admissionNO) as subjectCount, sum(hrs) as subjecthours
        from student_subject_gradeschool,subject_gradeschool,curriculum_subjectgradeschool
        where student_subject_gradeschool.subjectID = subject_gradeschool.subjectID
        and student_subject_gradeschool.curriculumID = curriculum_subjectgradeschool.curriculumID
        and student_subject_gradeschool.subjectID = curriculum_subjectgradeschool.subjectID
        and admissionNO = '$admissionID'
        and year = '$level'");
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

    public function getOtherMiscellaneousGradeschoolh($grade){
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


    public function assessstudentGradeschool($admissionID){

        $data = array(
            'isAssess' => 'Yes',
        );

        $this->db->where("admissionID", $admissionID);
        $this->db->update("students_gradeschool", $data);

    }

    public function shiftstudentGradeschool($admissionID){

        $stud = $this->db->query("select Level from students_gradeschool where admissionID = '$admissionID'");
        $res = $stud->row();
        if (isset($res)){
            $level = $res->Level;
        }

        $data = array(
            "Section" => "",
            "isEvaluated" => "No",
        );

        $this->db->where("admissionID", $admissionID);
        $this->db->update("students_gradeschool", $data);

        $this->db->query("delete from student_subject_gradeschool 
        where admissionNO = '$admissionID'
        and year = '$level'");

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
            'Elementary' => trim(strtoupper($this->input->post('elementary'))),
            'ESY' => trim($this->input->post('esy'))
        );

        $this->db->where('admissionID',$admissionID);
        return $this->db->update('students_gradeschool',$data);
    }

    

}

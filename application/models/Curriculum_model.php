<?php
class Curriculum_model extends CI_Model{
    
    public function __construct(){
        $this->load->database();
    }


    // COLLEGE
    public function viewCollegeSubjects(){
        $query = $this->db->get('subject_college');
        return $query->result_array();
    }

    public function viewCourses(){
        $query = $this->db->get('courses');
        return $query->result_array();
    }

    public function viewCollegeTempSubjects(){
        $userID = $_SESSION['userid'];
        $query = $this->db->query("select subject_college_temp.subjectID,subjectCode,subjectDesc 
        from subject_college_temp,subject_college 
        where subject_college_temp.subjectID = subject_college.subjectID 
        and userID = '$userID'");
        return $query->result_array();
    }

    public function viewCollegeCurriculum(){
        $query = $this->db->query("select curriculumID,CourseCode,Year,Sem,Section,sy 
        from curriculum_college,courses 
        where curriculum_college.courseID = courses.CourseID");
        return $query->result_array();
    }


    public function searchCollegeCurriculum($keyword){
        $query = $this->db->query("select curriculumID,CourseCode,Year,Sem,Section,sy 
        from curriculum_college,courses 
        where concat(CourseCode) like '%$keyword%' 
        and curriculum_college.courseID = courses.CourseID");
        return $query->result_array();
    }


    public function deleteCurriculumCollege($curriculumID){
        $this->db->query("delete from curriculum_college where curriculumID ='$curriculumID'");
        $this->db->query("delete from curriculum_subjectcollege where curriculumID ='$curriculumID'");
    }


    public function addCurriculumSubjectsCollege(){
        $data = array(
            'subjectID' => $this->input->post('collegeSubject'),
            'userID' => $_SESSION['userid']
        );
        return $this->db->insert('subject_college_temp',$data);
    }

    public function removeTempSubjectCollege($subjectID){

        $userID = $_SESSION['userid'];
        return $this->db->query("delete from subject_college_temp where subjectID= '$subjectID' and userID='$userID'");
    
    }


    public function addCurriculumCollege(){
        $userID = $_SESSION['userid'];

        $data = array(
            'CourseID' => trim($this->input->post('courseID')),
            'Year' => trim($this->input->post('yearlevel')),
            'Sem' => trim($this->input->post('sem')),
            'sy' => trim($this->input->post('sy')),
            'Section' => trim($this->input->post('section'))
        );
        $this->db->insert('curriculum_college',$data);


        $query1 = $this->db->query('select curriculumID 
        from curriculum_college order by curriculumID desc limit 1');
        $curriculumID = $query1->result_array();
        foreach($curriculumID as $row){
            $curriID = $row['curriculumID'];
        }


        $this->db->where('userID',$userID);
        $query2 = $this->db->get('subject_college_temp');
        $subjects = $query2->result_array();

        foreach($subjects as $row){
            $subjectID = $row['subjectID'];
            $datalist = array(
                'curriculumID' => $curriID,
                'subjectID' => $subjectID
            );
            $this->db->insert('curriculum_subjectcollege',$datalist);
        }

        $this->db->where('userID',$userID);
        $this->db->delete('subject_college_temp');
    }


    public function viewcurriculumSubjectCollege($curriculumID){
        $query = $this->db->query("select csubjectID,cs.subjectID,curriculumID,subjectCode,subjectDesc,lec,labComputer,labNonComputer
        from curriculum_subjectcollege cs,subject_college sc
        where cs.subjectID = sc.subjectID
        and curriculumID = '$curriculumID'");
        
        return $query->result_array();
    }


    public function addsubjectCurriculumCollege($curriculumID){
        $subjectID = $this->input->post('collegeSubject');
        $data = array(
            'curriculumID' => $curriculumID,
            'subjectID' => $subjectID,
        );

        $this->db->insert("curriculum_subjectcollege", $data);

    }


    public function deleteSubjectCurriculum($csubjectID){
        $this->db->where('csubjectID',$csubjectID);
        $this->db->delete('curriculum_subjectcollege');
    }



    



















    // SENIOR HIGH
    public function viewseniorhighSubjects(){
        $query = $this->db->get('subject_seniorhigh');
        return $query->result_array();
    }

    public function addCurriculumSubjectsSeniorhigh(){
        $data = array(
            'subjectID' => $this->input->post('collegeSubject'),
            'userID' => $_SESSION['userid']
        );
        return $this->db->insert('subject_seniorhigh_temp',$data);
    }

    public function viewSeniorhighTempSubjects(){
        $userID = $_SESSION['userid'];
        $query = $this->db->query("select subject_seniorhigh_temp.subjectID,category,subjectCode,subjectDesc 
        from subject_seniorhigh_temp,subject_seniorhigh 
        where subject_seniorhigh_temp.subjectID = subject_seniorhigh.subjectID 
        and userID = '$userID'");
        return $query->result_array();
    }

    public function viewSeniorhighSections(){
        $query = $this->db->query("select * from section where Department = 'Seniorhigh'");
        return $query->result_array();
    }

    public function removeTempSubjectSeniorhigh($subjectID){

        $userID = $_SESSION['userid'];
        return $this->db->query("delete from subject_seniorhigh_temp where subjectID= '$subjectID' and userID='$userID'");
    }


    public function addCurriculumSeniorhigh(){
        $userID = $_SESSION['userid'];

        $data = array(
            'Strand' => trim($this->input->post('strand')),
            'Year' => trim($this->input->post('yearlevel')),
            'Sem' => trim($this->input->post('sem')),
            'sy' => trim($this->input->post('sy')),
            'Section' => trim($this->input->post('section'))
        );
        $this->db->insert('curriculum_seniorhigh',$data);


        $query1 = $this->db->query('select curriculumID 
        from curriculum_seniorhigh order by curriculumID desc limit 1');
        $curriculumID = $query1->result_array();
        foreach($curriculumID as $row){
            $curriID = $row['curriculumID'];
        }


        $this->db->where('userID',$userID);
        $query2 = $this->db->get('subject_seniorhigh_temp');
        $subjects = $query2->result_array();

        foreach($subjects as $row){
            $subjectID = $row['subjectID'];
            $datalist = array(
                'curriculumID' => $curriID,
                'subjectID' => $subjectID
            );
            $this->db->insert('curriculum_subjectseniorhigh',$datalist);
        }

        $this->db->where('userID',$userID);
        $this->db->delete('subject_seniorhigh_temp');

    }

    public function viewSeniorhighCurriculum(){
        $query = $this->db->query("select curriculumID,Strand,Year,Sem,Section,sy 
        from curriculum_seniorhigh");
        return $query->result_array();
    }

    public function searchSeniorhighCurriculum($keyword){
        $query = $this->db->query("select curriculumID,Strand,Year,Sem,Section,sy 
        from curriculum_seniorhigh
        where Strand like '%$keyword%'");
        return $query->result_array();
    }


















    //JUNIOR HIGH
    public function viewjuniorhighSubjects(){
        $query = $this->db->get('subject_juniorhigh');
        return $query->result_array();
    }

    public function addCurriculumSubjectsJuniorhigh(){
        $data = array(
            'subjectID' => $this->input->post('collegeSubject'),
            'userID' => $_SESSION['userid']
        );
        return $this->db->insert('subject_juniorhigh_temp',$data);
    }

    public function viewJuniorhighTempSubjects(){
        $userID = $_SESSION['userid'];
        $query = $this->db->query("select subject_juniorhigh_temp.subjectID,subjectCode,subjectDesc 
        from subject_juniorhigh_temp,subject_juniorhigh 
        where subject_juniorhigh_temp.subjectID = subject_juniorhigh.subjectID 
        and userID = '$userID'");
        return $query->result_array();
    }
    
    public function removeTempSubjectJuniorhigh($subjectID){
        $userID = $_SESSION['userid'];
        return $this->db->query("delete from subject_juniorhigh_temp where subjectID= '$subjectID' and userID='$userID'");
    }

    public function viewJuniorhighSections(){
        $query = $this->db->query("select * from section where Department = 'Juniorhigh'");
        return $query->result_array();
    }


    public function viewJuniorhighCurriculum(){
        $query = $this->db->query("select curriculumID,Year,Section,sy 
        from curriculum_juniorhigh");
        return $query->result_array();
    }

    public function searchJuniorhighCurriculum($keyword){
        $query = $this->db->query("select curriculumID,Year,Section,sy 
        from curriculum_juniorhigh
        where Section like '%$keyword%'");
        return $query->result_array();
    }


    public function addCurriculumJuniorhigh(){
        $userID = $_SESSION['userid'];

        $data = array(

            'Year' => trim($this->input->post('yearlevel')),
            'sy' => trim($this->input->post('sy')),
            'Section' => trim($this->input->post('section'))

        );
        $this->db->insert('curriculum_juniorhigh',$data);


        $query1 = $this->db->query('select curriculumID 
        from curriculum_juniorhigh order by curriculumID desc limit 1');
        $curriculumID = $query1->result_array();
        foreach($curriculumID as $row){
            $curriID = $row['curriculumID'];
        }

        $this->db->where('userID',$userID);
        $query2 = $this->db->get('subject_juniorhigh_temp');
        $subjects = $query2->result_array();

        foreach($subjects as $row){
            $subjectID = $row['subjectID'];
            $datalist = array(
                'curriculumID' => $curriID,
                'subjectID' => $subjectID
            );
            $this->db->insert('curriculum_subjectjuniorhigh',$datalist);
        }

        $this->db->where('userID',$userID);
        $this->db->delete('subject_juniorhigh_temp');

    }

















    //GRADE SCHOOL
    public function gradeschoolSubjects(){
        $query = $this->db->get('subject_gradeschool');
        return $query->result_array();
    }

    public function addCurriculumSubjectsGradeschool(){
        $data = array(
            'subjectID' => $this->input->post('collegeSubject'),
            'userID' => $_SESSION['userid']
        );
        return $this->db->insert('subject_gradeschool_temp',$data);
    }

    public function viewGradeschoolTempSubjects(){
        $userID = $_SESSION['userid'];
        $query = $this->db->query("select subject_gradeschool_temp.subjectID,subjectCode,subjectDesc 
        from subject_gradeschool_temp,subject_gradeschool 
        where subject_gradeschool_temp.subjectID = subject_gradeschool.subjectID 
        and userID = '$userID'");
        return $query->result_array();
    }


    public function removeTempSubjectGradeschool($subjectID){

        $userID = $_SESSION['userid'];
        return $this->db->query("delete from subject_gradeschool_temp where subjectID= '$subjectID' and userID='$userID'");

    }

    public function viewGradeschoolSections(){
        $query = $this->db->query("select * from section where Department = 'Gradeschool'");
        return $query->result_array();
    }

    public function viewGradeschoolCurriculum(){
        $query = $this->db->query("select curriculumID,Year,Section,sy 
        from curriculum_gradeschool");
        return $query->result_array();
    }

    public function searchGradeschoolCurriculum($keyword){
        $query = $this->db->query("select curriculumID,Year,Section,sy 
        from curriculum_gradeschool
        where concat(Year,Section) like '%$keyword%'");
        return $query->result_array();
    }
    
    public function addCurriculumGradeschool(){
        $userID = $_SESSION['userid'];
        $data = array(
            'Year' => trim($this->input->post('yearlevel')),
            'sy' => trim($this->input->post('sy')),
            'Section' => trim($this->input->post('section'))
        );

        $this->db->insert('curriculum_gradeschool',$data);


        $query1 = $this->db->query('select curriculumID 
        from curriculum_gradeschool order by curriculumID desc limit 1');
        $curriculumID = $query1->result_array();
        foreach($curriculumID as $row){
            $curriID = $row['curriculumID'];
        }

        $this->db->where('userID',$userID);
        $query2 = $this->db->get('subject_gradeschool_temp');
        $subjects = $query2->result_array();

        foreach($subjects as $row){
            $subjectID = $row['subjectID'];
            $datalist = array(
                'curriculumID' => $curriID,
                'subjectID' => $subjectID
            );
            $this->db->insert('curriculum_subjectgradeschool',$datalist);
        }

        $this->db->where('userID',$userID);
        $this->db->delete('subject_gradeschool_temp');

    }




    
}
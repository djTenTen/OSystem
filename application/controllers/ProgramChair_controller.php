<?php
class ProgramChair_controller extends CI_Controller{

    public function evaluateCollege(){
        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'evaluate_college';
            if(!file_exists(APPPATH.'views/progchair/'.$page.'.php')){
                show_404();
            }else{

                $data['title'] = "Student Evaluation - College";
                $data['validatedStudents'] = $this->ProgChair_model->viewStudents();
                $this->load->view('templates/header',$data);
                $this->load->view('progchair/'.$page, $data);
                $this->load->view('templates/footer');
                
            }

        }else{
            redirect(base_url());
        }
    }



    public function adviceCollege($ID){
        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'advice_college';
            if(!file_exists(APPPATH.'views/progchair/'.$page.'.php')){
                show_404();
            }else{
                
                $data['title'] = "Student Evaluation";
                
                    $_SESSION['ID'] = $ID;
                    $data['studentinfo'] = $this->ProgChair_model->viewStudentInfo($ID);  
                    $data['studentNo'] =  $data['studentinfo']['StudentNo'];
                    $data['extension'] =  $data['studentinfo']['extension'];
                    $data['lastName'] =  $data['studentinfo']['LastName'];
                    $data['firstName'] =  $data['studentinfo']['FirstName'];
                    $data['middleName'] =  $data['studentinfo']['MiddleName'];
                    $data['fullname'] =  $data['studentinfo']['FullName'];
                    $data['contact'] =  $data['studentinfo']['Contact'];
                    $data['address'] =  $data['studentinfo']['Address'];
                    $data['course'] = $data['studentinfo']['CourseDesc'];
                    $data['coursecode'] = $data['studentinfo']['CourseCode'];
                    $data['courseID'] = $data['studentinfo']['CourseID'];
                    $data['level'] = $data['studentinfo']['Level'];
                    $data['sem'] = $data['studentinfo']['Semester'];
                    $data['department'] =  $data['studentinfo']['CollegeDPT'];

                    //DATA SET FOR STUDENT INFO
                    $_SESSION['studentNo'] = $data['extension'].$data['studentNo'];
                    $_SESSION['lastName'] = $data['lastName'];
                    $_SESSION['firstName'] = $data['firstName'];
                    $_SESSION['middleName'] = $data['middleName'];
                    $_SESSION['fullname'] = $data['fullname'];
                    $_SESSION['contact'] = $data['contact'];
                    $_SESSION['address'] = $data['address'];
                    $_SESSION['course'] = $data['course'];
                    $_SESSION['courseID'] = $data['courseID'];
                    $_SESSION['level'] = $data['level'];
                    $_SESSION['sem'] = $data['sem'];
                    $_SESSION['department'] = $data['department'];
                    $lvl = substr($data['level'],0,1);
                    $data['sections'] = $this->ProgChair_model->viewSections($lvl);

                    $data['collegeSubjects'] = $this->ProgChair_model->viewCollegeSubjects();

                    $data['tempsubjects'] = $this->ProgChair_model->viewCollegeCurriculumSubjectsTemp();
                    $data['SubCount'] = $this->ProgChair_model->subjectCount();
                    $data['subjectCount'] =  $data['SubCount']['subjectcount'];

                    $data['Unitcount'] = $this->ProgChair_model->unitsCount();
                    $data['unitscount'] =  $data['Unitcount']['unitCount'];

                   

                    $this->load->view('templates/header',$data);
                    $this->load->view('progchair/'.$page, $data);
                    $this->load->view('templates/footer');

            }

        }else{
            redirect(base_url());
        }

    }


    public function viewcollegeCurriculum(){

        $_SESSION['section'] = $section = $this->input->post('section');
        $data['curriID'] = $this->ProgChair_model->getCurriculumIDcollege($_SESSION['courseID'],$_SESSION['level'],$_SESSION['sem'],$section);
        $_SESSION['curriculumID'] = $data['curriID']['curriculumID'];
        $this->ProgChair_model->addCollegeCurriculumSubjectsTemp($_SESSION['curriculumID']);

        redirect('advice_college/'.$_SESSION['ID']);

    }


    public function removeTempSubjectcollege($CsubjectID){
        $this->ProgChair_model->removeTempsubject($CsubjectID);
        $this->session->set_flashdata('Subject_Removed','The subject has been removed');
        redirect('advice_college/'.$_SESSION['ID']);
    }


    public function addsubjectTemp(){
        $subjects = $this->input->post('subjects');
        $this->ProgChair_model->addsubjectscollegeTemp($subjects);
        $this->session->set_flashdata('Subject_added','The subject has been added');
        redirect('advice_college/'.$_SESSION['ID']);
    }


    public function savestudentCollege(){

        if(empty($_SESSION['section'])){
            $this->session->set_flashdata('Error_Evaluation','Error Evaluation');
            redirect('advice_college/'.$_SESSION['ID']);
        }else{
            $this->ProgChair_model->saveStudent();
            $this->session->set_flashdata('Student_Evaluated','The student has been successfully Evaluated');
            redirect('evaluate_college');
        }

    }

    public function collegeStudentInfo(){
        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'collegeStudentinfo';
            if(!file_exists(APPPATH.'views/progchair/'.$page.'.php')){
                show_404();
            }else{
                
                $data['title'] = "Student Info - College";
            
                $data['EvaluatedStudents'] = $this->ProgChair_model->viewEvaluatedStudents();
                $this->load->view('templates/header',$data);
                $this->load->view('progchair/'.$page, $data);
                $this->load->view('templates/footer');
   
            }

        }else{
            redirect(base_url());
        }

    }
    

    public function reevaluateStudent($evaluationID){
        $this->ProgChair_model->reevaluateStudent($evaluationID);
        $data['studentinfo'] = $this->ProgChair_model->viewStudentInfo($evaluationID);  
        $_SESSION['section'] = $data['studentinfo']['Section'];
        
        redirect('advice_college/'.$evaluationID);
    }

    public function sheduleCollege(){
        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'schedule_college';
            if(!file_exists(APPPATH.'views/progchair/'.$page.'.php')){
                show_404();
            }else{

                $data['title'] = "College Schedule";
                
                $data['curriculumCollege'] = $this->ProgChair_model->getCurrilumCollege();
                $this->load->view('templates/header',$data);
                $this->load->view('progchair/'.$page, $data);
                $this->load->view('templates/footer');

            }
        }else{
            redirect(base_url());
        }

    }

    public function editSchedule($curriculumID){
        $_SESSION['curriculumID'] = $curriculumID;
        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'edit_schedule_college';
            if(!file_exists(APPPATH.'views/progchair/'.$page.'.php')){
                show_404();
            }else{
                
                $data['title'] = "College Schedule";
            
                $data['curriculumSubjects'] = $this->ProgChair_model->getSchedule($curriculumID);
                $data['professors'] = $this->ProgChair_model->getProfessors();
                $this->load->view('templates/header',$data);
                $this->load->view('progchair/'.$page, $data);
                $this->load->view('templates/footer');
            }

        }else{
            redirect(base_url());
        }
        
    }

    public function updateSchedule($csubjectID){

        $this->ProgChair_model->updateScheduleSubject($csubjectID);
        redirect('editSchedule/'.$_SESSION['curriculumID']);
        
    }


    public function collegeEnrolled(){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'enrolledcollege';
            if(!file_exists(APPPATH.'views/progchair/'.$page.'.php')){
                show_404();
            }else{
                
                $data['title'] = "Enrolled College";
                $data['College'] = $this->ProgChair_model->viewCollegeEnrolled();
                $this->load->view('templates/header',$data);
                $this->load->view('progchair/'.$page, $data);
                $this->load->view('templates/footer');

            }

        }else{
            redirect(base_url());
        }
        
    }


    public function PprofCollege(){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'profcollege';
            if(!file_exists(APPPATH.'views/progchair/'.$page.'.php')){
                show_404();
            }else{

                $data['collegeProf'] = $this->Egrade_model->collegeProf();
                $data['title'] = "Class List"; 
                $this->load->view('templates/header',$data);
                $this->load->view('progchair/'.$page, $data);
                $this->load->view('templates/footer');
            }
        }else{
            redirect(base_url());
        }
    }


    public function PviewClassSubjects($teacherID){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'profcollegesubjects';
            if(!file_exists(APPPATH.'views/progchair/'.$page.'.php')){
                show_404();
            }else{

                $data['viewSY'] = $this->Egrade_model->viewSYCollege();
                $data['viewSem'] = $this->Egrade_model->viewSemCollege();
                $data['prof'] = $this->Egrade_model->getInstructor($teacherID);
                $data['Teacher'] = $data['prof']['FullName'];

                $data['teacherID'] = $teacherID;
                
                $sy = $this->input->post('sy');
                $sem = $this->input->post('sem');

                if(!empty($sy) and !empty($sem)){
                    $data['collegeProfSubjects'] = $this->Egrade_model->collegeProfSubjects($teacherID,$sy,$sem);
                }else{
                    $data['collegeProfSubjects'] = array(
                        array('subjectDesc' => '',
                        'subjectID' => '',
                        'curriculumID' => '',
                        'CourseDesc' => '',
                        'Year' => '',
                        'Section' => '',
                        'Sem' => '')
                    );
                }

                $data['title'] = "Class List"; 
                $this->load->view('templates/header',$data);
                $this->load->view('progchair/'.$page, $data);
                $this->load->view('templates/footer');
            }
        }else{
            redirect(base_url());
        }
    }

    public function PviewClassSubjectsStudentsCol($curriculumID,$subjectID){
    
        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'profcollegesubjectscollege';
            if(!file_exists(APPPATH.'views/progchair/'.$page.'.php')){
                show_404();
            }else{
                $_SESSION['$curriculumID'] = $curriculumID;
                $_SESSION['$subjectID'] = $subjectID;
    
                $data['subject'] = $this->Teacher_model->collegeClassName($subjectID);
                $data['SubjectName'] = $data['subject']['subjectDesc'];
                $data['title'] = $data['SubjectName'];
    
                $dt = $this->Teacher_model->isEncodinggs();
                $data['encoding'] = $dt['Encoding'];
    
    
                $data['collegeclasslist'] = $this->Egrade_model->collegeClassList($curriculumID,$subjectID);
    
                $this->load->view('templates/header',$data);
                $this->load->view('progchair/'.$page, $data);
                $this->load->view('templates/footer');
            }
        }else{
            redirect(base_url());
        }

    }


    



    









}
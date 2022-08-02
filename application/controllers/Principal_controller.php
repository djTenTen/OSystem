<?php
class Principal_controller extends CI_Controller{

    public function evaluateSeniorhigh(){
        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'evaluate_seniorhigh';
            if(!file_exists(APPPATH.'views/principal/'.$page.'.php')){
                show_404();
            }else{

                $data['title'] = "Student Evaluation - Senior High";
                $data['validatedStudents'] = $this->Principal_model->viewvalidatedSeniorhigh();
                $this->load->view('templates/header',$data);
                $this->load->view('principal/'.$page, $data);
                $this->load->view('templates/footer');
                
            }

        }else{
            redirect(base_url());
        }
    }


    public function adviceSeniorhigh($ID){
        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'advice_seniorhigh';
            if(!file_exists(APPPATH.'views/principal/'.$page.'.php')){
                show_404();
            }else{
                
                $data['title'] = "Student Evaluation - Senior High";

                $_SESSION['ID'] = $ID;
                $data['studentinfo'] = $this->Principal_model->viewStudentInfo($ID);  
                $data['extension'] =  $data['studentinfo']['extension'];
                $data['studentNo'] =  $data['studentinfo']['StudentNo'];
                $data['lastName'] =  $data['studentinfo']['LastName'];
                $data['firstName'] =  $data['studentinfo']['FirstName'];
                $data['middleName'] =  $data['studentinfo']['MiddleName'];
                $data['fullname'] =  $data['studentinfo']['FullName'];
                $data['address'] =  $data['studentinfo']['Address'];
                $data['contact'] =  $data['studentinfo']['Contact'];
                $data['strand'] = $data['studentinfo']['Strand'];
                $data['level'] = $data['studentinfo']['Level'];
                $data['sem'] = $data['studentinfo']['Semester'];

                //DATA SET FOR STUDENT INFO
                $_SESSION['studentNo'] = $data['extension'].$data['studentNo'];
                $_SESSION['lastName'] = $data['lastName'];
                $_SESSION['firstName'] = $data['firstName'];
                $_SESSION['middleName'] = $data['middleName'];
                $_SESSION['fullname'] = $data['fullname'];
                $_SESSION['address'] = $data['address'];
                $_SESSION['contact'] = $data['contact'];
                $_SESSION['strand'] = $data['strand'];
                $_SESSION['level'] = $data['level'];
                $_SESSION['sem'] = $data['sem'];

                $lvl = substr($data['level'],-2);
                $data['sections'] = $this->Principal_model->viewSections($lvl,$data['strand']);
                $data['seniorhighSubjects'] = $this->Principal_model->viewSeniorhighSubjects();

                $data['tempsubjects'] = $this->Principal_model->viewSeniorhighCurriculumSubjectsTemp();
                $data['SubCount'] = $this->Principal_model->subjectCount();
                $data['subjectCount'] =  $data['SubCount']['subjectcount'];
                $data['hrsCount'] =  $data['SubCount']['hrsCount'];

                $this->load->view('templates/header',$data);
                $this->load->view('principal/'.$page, $data);
                $this->load->view('templates/footer');

            }

        }else{
            redirect(base_url());
        }

    }


    public function viewSeniorhighCurriculum(){

        $_SESSION['section'] = $section = $this->input->post('section');
        $data['curriID'] = $this->Principal_model->getCurriculumIDseniorhigh($_SESSION['strand'],$_SESSION['level'],$_SESSION['sem'],$section);
        $_SESSION['curriculumID'] = $data['curriID']['curriculumID'];
        $this->Principal_model->addSeniorhighCurriculumSubjectsTemp($_SESSION['curriculumID']);
        redirect('advice_seniorhigh/'.$_SESSION['ID']);

    }

    public function addsubjectTempSeniorhigh(){
        $subjects = $this->input->post('subjects');
        $this->Principal_model->addsubjectsSeniorhighTemp($subjects);
        $this->session->set_flashdata('Subject_added','The subject has been added');
        redirect('advice_seniorhigh/'.$_SESSION['ID']);
    }

    public function removeTempSubjectSeniorhigh($CsubjectID){
        $this->Principal_model->removeTempsubjectSeniorhigh($CsubjectID);
        $this->session->set_flashdata('Subject_Removed','The subject has been removed');
        redirect('advice_seniorhigh/'.$_SESSION['ID']);
    }

    public function saveStudentSeniorhigh(){
        $this->Principal_model->saveStudentSeniorhigh();
        $this->session->set_flashdata('Student_Evaluated','The student has been successfully Evaluated');
        redirect('evaluate_seniorhigh');
    }


    public function seniorhighStudentInfo(){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'seniorhighStudentinfo';
            if(!file_exists(APPPATH.'views/principal/'.$page.'.php')){
                show_404();
            }else{
                
                $data['title'] = "Student Info - Senior High";
                $data['EvaluatedStudents'] = $this->Principal_model->viewEvaluatedStudents();
                $this->load->view('templates/header',$data);
                $this->load->view('principal/'.$page, $data);
                $this->load->view('templates/footer');
                
            }

        }else{
            redirect(base_url());
        }

    }

    public function scheduleSeniorhigh(){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'schedule_seniorhigh';
            if(!file_exists(APPPATH.'views/principal/'.$page.'.php')){
                show_404();
            }else{
                
                $data['title'] = "Schedule - Senior High";
                $data['curriculumSeniorhigh'] = $this->Principal_model->viewCurriculumSeniorhigh();
                $this->load->view('templates/header',$data);
                $this->load->view('principal/'.$page, $data);
                $this->load->view('templates/footer');
         
            }

        }else{
            redirect(base_url());
        }
    }

    public function editScheduleSeniorhigh($curriculumID){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'edit_schedule_seniorhigh';
            if(!file_exists(APPPATH.'views/principal/'.$page.'.php')){
                show_404();
            }else{
                
                $_SESSION['curriID'] = $curriculumID;
                $data['title'] = "Edit Schedule - Senior High";
                $data['curriculumsubjects'] = $this->Principal_model->viewScheduleSubectsSeniorhigh($curriculumID);
                $data['teacher'] = $this->Principal_model->getProfessors();
                $this->load->view('templates/header',$data);
                $this->load->view('principal/'.$page, $data);
                $this->load->view('templates/footer');
                    
            }

        }else{
            redirect(base_url());
        }

    }

    public function updateScheduleSeniorhigh($CsubjectID){
        $this->Principal_model->updateSchedule($CsubjectID);
        $this->session->set_flashdata('scheduleUpdated','The student has been successfully Evaluated');
        redirect('editScheduleSeniorhigh/'.$_SESSION['curriID']);
    }

    public function reevaluatestudentSeniorhigh($evaluationID){
        $this->Principal_model->reevaluatestudentSeniorhigh($evaluationID);
        redirect('advice_seniorhigh/'.$evaluationID);
    }

    public function classlistSeniorhigh(){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'classlistseniorhigh';
            if(!file_exists(APPPATH.'views/principal/'.$page.'.php')){
                show_404();
            }else{
                
                
                $data['title'] = "Class List Senior High";
                $data['showClassListSeniorhigh'] = $this->Principal_model->showClassListSeniorhigh();
                $data['teacher'] = $this->Principal_model->getProfessors();
                $this->load->view('templates/header',$data);
                $this->load->view('principal/'.$page, $data);
                $this->load->view('templates/footer');
                    
            }

        }else{
            redirect(base_url());
        }

    }


    public function exportClasslistSeniorhigh($curriculumID,$subjectID,$sched,$Strand,$Section,$Year){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'seniorhighclasslist';
            if(!file_exists(APPPATH.'views/reports/'.$page.'.php')){
                show_404();
            }else{

                $data['subject'] = $sched;
                $data['strand'] = $Strand;
                $data['section'] = $Section;
                $data['year'] = $Year;
                
                $data['collegeclasslist'] = $this->Principal_model->exportClassListSeniorhigh($curriculumID,$subjectID);
                
                $this->load->view('reports/'.$page, $data);
    
            }

        }else{

            redirect(base_url());

        }

    }
















    // JUNIOR HIGH
    public function evaluateJuniorhigh(){
        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'evaluate_juniorhigh';
            if(!file_exists(APPPATH.'views/principal/'.$page.'.php')){
                show_404();
            }else{

                $data['title'] = "Student Evaluation - Junior High";

                $data['validatedStudents'] = $this->Principal_model->viewvalidatedJuniorhigh();
                $this->load->view('templates/header',$data);
                $this->load->view('principal/'.$page, $data);
                $this->load->view('templates/footer');

            }

        }else{
            redirect(base_url());
        }
    }


    public function adviceJuniorhigh($ID){
        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'advice_juniorhigh';
            if(!file_exists(APPPATH.'views/principal/'.$page.'.php')){
                show_404();
            }else{
                
                $data['title'] = "Student Evaluation - Junior High";

                $_SESSION['ID'] = $ID;
                $data['studentinfo'] = $this->Principal_model->viewStudentInfoJuniorhigh($ID);
                $data['extension'] =  $data['studentinfo']['extension'];  
                $data['studentNo'] =  $data['studentinfo']['StudentNo'];
                $data['lastName'] =  $data['studentinfo']['LastName'];
                $data['firstName'] =  $data['studentinfo']['FirstName'];
                $data['middleName'] =  $data['studentinfo']['MiddleName'];
                $data['fullname'] =  $data['studentinfo']['FullName'];
                $data['address'] =  $data['studentinfo']['Address'];
                $data['contact'] =  $data['studentinfo']['Contact'];
                $data['level'] = $data['studentinfo']['Level'];
               

                //DATA SET FOR STUDENT INFO
                $_SESSION['studentNo'] = $data['extension'].$data['studentNo'];
                $_SESSION['lastName'] = $data['lastName'];
                $_SESSION['firstName'] = $data['firstName'];
                $_SESSION['middleName'] = $data['middleName'];
                $_SESSION['fullname'] = $data['fullname'];
                $_SESSION['address'] = $data['address'];
                $_SESSION['contact'] = $data['contact'];
                $_SESSION['level'] = $data['level'];

                $lvl = substr($data['level'],-1);
                if($lvl == 0){
                    $lvl = '10';
                }
                $data['sections'] = $this->Principal_model->viewSectionsJuniorhigh($lvl);
                $data['juniorhighSubjects'] = $this->Principal_model->viewJuniorhighSubjects();

                $data['tempsubjects'] = $this->Principal_model->viewJuniorhighCurriculumSubjectsTemp();
                $data['SubCount'] = $this->Principal_model->subjectCountJuniorhigh();
                $data['subjectCount'] =  $data['SubCount']['subjectcount'];
                $data['hrsCount'] =  $data['SubCount']['hrsCount'];

                $this->load->view('templates/header',$data);
                $this->load->view('principal/'.$page, $data);
                $this->load->view('templates/footer');

            }

        }else{
            redirect(base_url());
        }

    }

    public function viewJuniorhighCurriculum(){

        $_SESSION['section'] = $section = $this->input->post('section');
        $data['curriID'] = $this->Principal_model->getCurriculumIDjuniorhigh($_SESSION['level'],$section);
        $_SESSION['curriculumID'] = $data['curriID']['curriculumID'];
        $this->Principal_model->addjuniorhighCurriculumSubjectsTemp($_SESSION['curriculumID']);
        redirect('advice_juniorhigh/'.$_SESSION['ID']);

    }

    public function addsubjectTempJuniorhigh(){
        $subjects = $this->input->post('subjects');
        $this->Principal_model->addsubjectsJuniorhighTemp($subjects);
        $this->session->set_flashdata('Subject_added','The subject has been added');
        redirect('advice_juniorhigh/'.$_SESSION['ID']);
    }

    public function removeTempSubjectJuniorhigh($CsubjectID){
        $this->Principal_model->removeTempsubjectJuniorhigh($CsubjectID);
        $this->session->set_flashdata('Subject_Removed','The subject has been removed');
        redirect('advice_juniorhigh/'.$_SESSION['ID']);
    }

    public function saveStudentJuniorhigh(){
        $this->Principal_model->saveStudentJuniorhigh();
        $this->session->set_flashdata('Student_Evaluated','The student has been successfully Evaluated');
        redirect('evaluate_juniorhigh');
    }

    public function juniorhighStudentinfo(){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'juniorhighStudentinfo';
            if(!file_exists(APPPATH.'views/principal/'.$page.'.php')){
                show_404();
            }else{
                
                $data['title'] = "Student Info - Junior High";
              
                $data['EvaluatedStudents'] = $this->Principal_model->viewEvaluatedStudentsJuniorhigh();
                $this->load->view('templates/header',$data);
                $this->load->view('principal/'.$page, $data);
                $this->load->view('templates/footer');
                
            }

        }else{
            redirect(base_url());
        }

    }

    public function reevaluatestudentJuniorhigh($evaluationID){
        $this->Principal_model->reevaluatestudentJuniorhigh($evaluationID);
        redirect('advice_juniorhigh/'.$evaluationID);
    }

    public function scheduleJuniorhigh(){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'schedule_juniorhigh';
            if(!file_exists(APPPATH.'views/principal/'.$page.'.php')){
                show_404();
            }else{
                
                $data['title'] = "Schedule - Junior High";

                $data['curriculumJuniorhigh'] = $this->Principal_model->viewCurriculumJuniorhigh();
                $this->load->view('templates/header',$data);
                $this->load->view('principal/'.$page, $data);
                $this->load->view('templates/footer');
                
            }

        }else{
            redirect(base_url());
        }
    }

    public function editScheduleJuniorhigh($curriculumID){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'edit_schedule_juniorhigh';
            if(!file_exists(APPPATH.'views/principal/'.$page.'.php')){
                show_404();
            }else{
                
                $_SESSION['curriID'] = $curriculumID;
                $data['title'] = "Edit Schedule - Junior High";
                $data['curriculumsubjects'] = $this->Principal_model->viewScheduleSubectsJuniorhigh($curriculumID);
                $data['teacher'] = $this->Principal_model->getProfessorsJuniorhigh();
                $this->load->view('templates/header',$data);
                $this->load->view('principal/'.$page, $data);
                $this->load->view('templates/footer');
                    
            }

        }else{
            redirect(base_url());
        }

    }

    public function updateScheduleJuniorhigh($CsubjectID){
        $this->Principal_model->updateScheduleJuniorhigh($CsubjectID);
        $this->session->set_flashdata('scheduleUpdated','The student has been successfully Evaluated');
        redirect('editScheduleJuniorhigh/'.$_SESSION['curriID']);
    }


    public function classlistJuniorhigh(){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'classlistjuniorhigh';
            if(!file_exists(APPPATH.'views/principal/'.$page.'.php')){
                show_404();
            }else{

                $data['title'] = "Class List Senior High";
                $data['showClassListJuniorhigh'] = $this->Principal_model->showClassListJuniorhigh();
                $data['teacher'] = $this->Principal_model->getProfessors();
                $this->load->view('templates/header',$data);
                $this->load->view('principal/'.$page, $data);
                $this->load->view('templates/footer');
                    
            }

        }else{
            redirect(base_url());
        }

    }


    public function exportClasslistJuniorhigh($curriculumID,$subjectID,$sched,$Section,$Year){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'juniorhighclasslist';
            if(!file_exists(APPPATH.'views/reports/'.$page.'.php')){
                show_404();
            }else{

                $data['subject'] = $sched;
                $data['section'] = $Section;
                $data['year'] = $Year;
                
                $data['collegeclasslist'] = $this->Principal_model->exportClassListJuniorhigh($curriculumID,$subjectID);
                
                $this->load->view('reports/'.$page, $data);
    
            }


        }else{
            redirect(base_url());
        }

    }


    

















    // GRADESCHOOL
    public function evaluateGradeschool(){
        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'evaluate_gradeschool';
            if(!file_exists(APPPATH.'views/principal/'.$page.'.php')){
                show_404();
            }else{

                $data['title'] = "Student Evaluation - Grade School";

                $data['validatedStudents'] = $this->Principal_model->viewvalidatedGradeschool();
                $this->load->view('templates/header',$data);
                $this->load->view('principal/'.$page, $data);
                $this->load->view('templates/footer');
               
            }

        }else{
            redirect(base_url());
        }
    }



    public function adviceGradeschool($ID){
        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'advice_gradeschool';
            if(!file_exists(APPPATH.'views/principal/'.$page.'.php')){
                show_404();
            }else{
                
                $data['title'] = "Student Evaluation - Grade School";

                $_SESSION['ID'] = $ID;
                $data['studentinfo'] = $this->Principal_model->viewStudentInfoGradeschool($ID);
                $data['extension'] =  $data['studentinfo']['extension'];   
                $data['studentNo'] =  $data['studentinfo']['StudentNo'];
                $data['lastName'] =  $data['studentinfo']['LastName'];
                $data['firstName'] =  $data['studentinfo']['FirstName'];
                $data['middleName'] =  $data['studentinfo']['MiddleName'];
                $data['fullname'] =  $data['studentinfo']['FullName'];
                $data['address'] =  $data['studentinfo']['Address'];
                $data['contact'] =  $data['studentinfo']['Contact'];
                $data['level'] = $data['studentinfo']['Level'];
               

                //DATA SET FOR STUDENT INFO
                $_SESSION['studentNo'] = $data['extension'].$data['studentNo'];
                $_SESSION['lastName'] = $data['lastName'];
                $_SESSION['firstName'] = $data['firstName'];
                $_SESSION['middleName'] = $data['middleName'];
                $_SESSION['fullname'] = $data['fullname'];
                $_SESSION['address'] = $data['address'];
                $_SESSION['contact'] = $data['contact'];
                $_SESSION['level'] = $data['level'];

                $lvl = substr($data['level'],-1);
                if($lvl == 0){
                    $lvl = '10';
                }
                if($data['level'] == 'KINDER I'){
                    $lvl = 'I';
                }elseif($data['level'] == 'KINDER II'){
                    $lvl = 'II';
                }

                $data['sections'] = $this->Principal_model->viewSectionsGradeschool($lvl);
                $data['juniorhighSubjects'] = $this->Principal_model->viewGradeschoolSubjects();

                $data['tempsubjects'] = $this->Principal_model->viewGradeschoolCurriculumSubjectsTemp();
                $data['SubCount'] = $this->Principal_model->subjectCountJuniorhigh();
                $data['subjectCount'] =  $data['SubCount']['subjectcount'];
                $data['hrsCount'] =  $data['SubCount']['hrsCount'];

                $this->load->view('templates/header',$data);
                $this->load->view('principal/'.$page, $data);
                $this->load->view('templates/footer');

            }

        }else{
            redirect(base_url());
        }

    }

    public function viewGradeschoolCurriculum(){

        $_SESSION['section'] = $section = $this->input->post('section');
        $data['curriID'] = $this->Principal_model->getCurriculumIDGradeschool($_SESSION['level'],$section);
        $_SESSION['curriculumID'] = $data['curriID']['curriculumID'];
        $this->Principal_model->addGradeschoolCurriculumSubjectsTemp($_SESSION['curriculumID']);
        redirect('advice_gradeschool/'.$_SESSION['ID']);

    }

    public function addsubjectTempGradeschool(){
        $subjects = $this->input->post('subjects');
        $this->Principal_model->addsubjectsGradeschoolTemp($subjects);
        $this->session->set_flashdata('Subject_added','The subject has been added');
        redirect('advice_gradeschool/'.$_SESSION['ID']);
    }

    public function removeTempSubjectGradeschool($CsubjectID){
        $this->Principal_model->removeTempsubjectGradeschool($CsubjectID);
        $this->session->set_flashdata('Subject_Removed','The subject has been removed');
        redirect('advice_gradeschool/'.$_SESSION['ID']);
    }

    public function saveStudentGradeschool(){
        $this->Principal_model->saveStudentGradeschool();
        $this->session->set_flashdata('Student_Evaluated','The student has been successfully Evaluated');
        redirect('evaluate_gradeschool');
    }

    public function gradeschoolStudentinfo(){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'gradeschoolStudentinfo';
            if(!file_exists(APPPATH.'views/principal/'.$page.'.php')){
                show_404();
            }else{
                
                $data['title'] = "Student Info - Junior High";

                $data['EvaluatedStudents'] = $this->Principal_model->viewEvaluatedStudentsGradeschool();
                $this->load->view('templates/header',$data);
                $this->load->view('principal/'.$page, $data);
                $this->load->view('templates/footer');
               
            }

        }else{
            redirect(base_url());
        }

    }

    public function reevaluatestudentGradeschool($evaluationID){
        $this->Principal_model->reevaluatestudentGradeschool($evaluationID);
        redirect('advice_gradeschool/'.$evaluationID);
    }

    public function scheduleGradeschool(){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'schedule_gradeschool';
            if(!file_exists(APPPATH.'views/principal/'.$page.'.php')){
                show_404();
            }else{
                
                $data['title'] = "Schedule - Grade School";
                $data['curriculumJuniorhigh'] = $this->Principal_model->viewCurriculumGradeschool();
                $this->load->view('templates/header',$data);
                $this->load->view('principal/'.$page, $data);
                $this->load->view('templates/footer');
                
            }

        }else{
            redirect(base_url());
        }
    }


    public function editScheduleGradeschool($curriculumID){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'edit_schedule_gradeschool';
            if(!file_exists(APPPATH.'views/principal/'.$page.'.php')){
                show_404();
            }else{
                
                $_SESSION['curriID'] = $curriculumID;
                $data['title'] = "Edit Schedule - Grade School";
                $data['curriculumsubjects'] = $this->Principal_model->viewScheduleSubectsGradeschool($curriculumID);
                $data['teacher'] = $this->Principal_model->getProfessorsGradeschool();
                $this->load->view('templates/header',$data);
                $this->load->view('principal/'.$page, $data);
                $this->load->view('templates/footer');
                    
            }

        }else{
            redirect(base_url());
        }

    }

    public function updateScheduleGradeschool($CsubjectID){
        $this->Principal_model->updateScheduleGradeschool($CsubjectID);
        $this->session->set_flashdata('scheduleUpdated','The student has been successfully Evaluated');
        redirect('editScheduleGradeschool/'.$_SESSION['curriID']);
    }
    

    


    public function classlistGradeschool(){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'classlistgradeschool';
            if(!file_exists(APPPATH.'views/principal/'.$page.'.php')){
                show_404();
            }else{

                $data['title'] = "Class List Senior High";
                $data['showClassListGradeschool'] = $this->Principal_model->showClassListGradeschool();
                $data['teacher'] = $this->Principal_model->getProfessors();
                $this->load->view('templates/header',$data);
                $this->load->view('principal/'.$page, $data);
                $this->load->view('templates/footer');
                    
            }

        }else{
            redirect(base_url());
        }

    }

    public function exportClasslistGradeschool($curriculumID,$subjectID,$sched,$Section,$Year){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'gradeschoolclasslist';
            if(!file_exists(APPPATH.'views/reports/'.$page.'.php')){
                show_404();
            }else{

                $data['subject'] = $sched;
                $data['section'] = $Section;
                $data['year'] = $Year;
                
                $data['collegeclasslist'] = $this->Principal_model->exportClassListGradeschool($curriculumID,$subjectID);
                
                $this->load->view('reports/'.$page, $data);
    
            }


        }else{
            redirect(base_url());
        }

    }
    


}
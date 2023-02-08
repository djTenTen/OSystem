<?php
class Registrar_controller extends CI_Controller{
    
    //COLLEGE

    public function registrarDashboard(){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'dashboard';
            if(!file_exists(APPPATH.'views/registrar/'.$page.'.php')){
                show_404();
            }else{
                
                $data['title'] = "Registrar Dashboard";
                // COLLEGE
                $data['NewStudentCountCollege'] = $this->Registrar_model->getNewStudentCountCollege();
                $data['OldStudentCountCollege'] = $this->Registrar_model-> getOldStudentCountCollege();
                $data['PendingCollege'] = $this->Registrar_model->getPendingCollege();
                $data['ValidatedCollege'] = $this->Registrar_model->getValidatedCollege();
                $data['EvaluatedCollege'] = $this->Registrar_model->getEvaluatedCollege();
                $data['AssessedCollege'] = $this->Registrar_model->getAssessedCollege();
                $data['EnrolledCollege'] = $this->Registrar_model->getEnrolledCollege();
                $data['TotalCollege'] = $this->Registrar_model->getTotalCollege();
                $data['TotalDismissedCollege'] = $this->Registrar_model->getTotalDismissedCollege();
                
                

                //SENIORHIGH
                $data['NewStudentCountSeniorhigh'] = $this->Registrar_model-> getNewStudentCountSeniorhigh();
                $data['OldStudentCountSeniorhigh'] = $this->Registrar_model-> getOldStudentCountSeniorhigh();
                $data['PendingSeniorhigh'] = $this->Registrar_model-> getPendingseniorhigh();
                $data['ValidatedSeniorhigh'] = $this->Registrar_model-> getValidatedseniorhigh();
                $data['EvaluatedSeniorhigh'] = $this->Registrar_model-> getEvaluatedseniorhigh();
                $data['AssessedSeniorhigh'] = $this->Registrar_model-> getAssessedseniorhigh();
                $data['EnrolledSeniorhigh'] = $this->Registrar_model-> getEnrolledseniorhigh();
                $data['TotalSeniorhigh'] = $this->Registrar_model-> getTotalseniorhigh();
                $data['TotalDismissedSeniorhigh'] = $this->Registrar_model-> getTotalDismissedSeniorhigh();

                
                //JUNIOR HIGH
                $data['NewStudentCountJuniorhigh'] = $this->Registrar_model-> getNewStudentCountJuniorhigh();
                $data['OldStudentCountJuniorhigh'] = $this->Registrar_model-> getOldStudentCountJuniorhigh();
                $data['PendingJuniorhigh'] = $this->Registrar_model-> getPendingjuniorhigh();
                $data['ValidatedJuniorhigh'] = $this->Registrar_model-> getValidatedjuniorhigh();
                $data['EvaluatedJuniorhigh'] = $this->Registrar_model-> getEvaluatedjuniorhigh();
                $data['AssessedJuniorhigh'] = $this->Registrar_model-> getAssessedjuniorhigh();
                $data['EnrolledJuniorhigh'] = $this->Registrar_model-> getEnrolledjuniorhigh();
                $data['TotalJuniorhigh'] = $this->Registrar_model-> getTotaljuniorhigh();
                $data['TotalDismissedSeniorhigh'] = $this->Registrar_model-> getTotalDismissedJuniorhigh();
                
                //GRADESCHOOL
                $data['NewStudentCountGradeschool'] = $this->Registrar_model-> getNewStudentCountGradeschool();
                $data['OldStudentCountGradeschool'] = $this->Registrar_model-> getOldStudentCountGradeschool();
                $data['PendingGradeschool'] = $this->Registrar_model-> getPendinggradeschool();
                $data['ValidatedGradeschool'] = $this->Registrar_model-> getValidatedgradeschool();
                $data['EvaluatedGradeschool'] = $this->Registrar_model-> getEvaluatedgradeschool();
                $data['AssessedGradeschool'] = $this->Registrar_model-> getAssessedgradeschool();
                $data['EnrolledGradeschool'] = $this->Registrar_model-> getEnrolledgradeschool();
                $data['TotalGradeschool'] = $this->Registrar_model-> getTotalgradeschool();
                $data['TotalDismissedGradeschool'] = $this->Registrar_model-> getTotalDismissedGradeschool();

                
                
                

                $this->load->view('templates/header',$data);
                $this->load->view('registrar/'.$page, $data);
                $this->load->view('templates/footer');

            }

        }else{
            redirect(base_url());
        }

    }



    public function college(){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'college';
            if(!file_exists(APPPATH.'views/registrar/'.$page.'.php')){
                show_404();
            }else{
                
                $data['title'] = "College Students";

                $keyword = $this->input->post('searchCollege');
                if (empty($keyword)){
                    $data['collegestudents'] = $this->Registrar_model->getStudents();
                    $data['course'] = $this->Registrar_model->getCourse();

                    $data['viewSY'] = $this->Egrade_model->viewSYCollege();
                    $data['viewSem'] = $this->Egrade_model->viewSemCollege();
                    $this->load->view('templates/header',$data);
                    $this->load->view('registrar/'.$page, $data);
                    $this->load->view('templates/footer');
                }else{
                    $data['collegestudents'] = $this->Registrar_model->getStudentSearch($keyword);
                    $data['course'] = $this->Registrar_model->getCourse();

                    $data['viewSY'] = $this->Egrade_model->viewSYCollege();
                    $data['viewSem'] = $this->Egrade_model->viewSemCollege();
                    $this->load->view('templates/header',$data);
                    $this->load->view('registrar/'.$page, $data);
                    $this->load->view('templates/footer');
                }
            }

        }else{
            redirect(base_url());
        }

    }

    public function assescollege($admissionID){
            
        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'college_assesment';
            if(!file_exists(APPPATH.'views/registrar/'.$page.'.php')){
                show_404();
            }else{
                
                $data['title'] = "Asses College";

                $data['admissionID'] = $admissionID;

                $data['studentinfo'] = $this->Registrar_model->viewStudentInfo($admissionID); 
                $data['discounts'] = $this->Registrar_model->viewDiscountsCollege();
                $data['tempdiscount'] = $this->Registrar_model->viewTempCollegeDiscount($admissionID); 
                

                $data['extension'] = $data['studentinfo']['extension'];
                $data['studentNo'] =   $data['extension'].$data['studentinfo']['StudentNo'];
                $data['lastName'] =  $data['studentinfo']['LastName'];
                $data['firstName'] =  $data['studentinfo']['FirstName'];
                $data['middleName'] =  $data['studentinfo']['MiddleName'];
                $data['fullname'] =  $data['studentinfo']['FullName'];
                $data['address'] =  $data['studentinfo']['Address'];
                $data['course'] = $data['studentinfo']['CourseDesc'];
                $data['coursecode'] = $data['studentinfo']['CourseCode'];
                $data['courseID'] = $data['studentinfo']['CourseID'];
                $data['level'] = $data['studentinfo']['Level'];
                $data['sem'] = $data['studentinfo']['Semester'];
                $data['department'] =  $data['studentinfo']['CollegeDPT'];

                //DATA SET FOR STUDENT INFO
                $_SESSION['studentNo'] = $data['studentNo'];
                $_SESSION['lastName'] = $data['lastName'];
                $_SESSION['firstName'] = $data['firstName'];
                $_SESSION['middleName'] = $data['middleName'];
                $_SESSION['fullname'] = $data['fullname'];
                $_SESSION['address'] = $data['address'];
                $_SESSION['course'] = $data['course'];
                $_SESSION['courseID'] = $data['courseID'];
                $_SESSION['level'] = $data['level'];
                $_SESSION['sem'] = $data['sem'];
                $_SESSION['department'] = $data['department'];


                $data['studentsSubject'] = $this->Registrar_model-> viewStudentSubjects($admissionID); 
                $data['count'] = $this->Registrar_model-> getsubjectCount($admissionID);
                $data['subjectCount'] = $data['count']['subjectCount'];
                $data['Tunits'] = $data['count']['Tunits'];
                $data['mainunits'] = $data['count']['mainunits'];

                

                if($data['coursecode'] == 'BSCE' || $data['coursecode'] == 'BSCPE'){
                    $data['TFee'] = $data['mainunits'] * 684;
                }elseif($_SESSION['level'] == '4TH YEAR'){
                    $data['TFee'] = $data['mainunits'] * 629.57;
                }else{
                    $data['TFee'] = $data['mainunits'] * 705.88;
                }
                

                
                
                $data['CollegeMisc'] = $this->Registrar_model->getMiscellaneousCollege();
                $data['CollegeMiscFee'] = $this->Registrar_model->getMiscellaneousCollegeFee();
                $data['MiscFee'] = $data['CollegeMiscFee']['MiscFee'];
                
                $data['admissionID'] = $admissionID;
                
                $this->load->view('templates/header',$data);
                $this->load->view('registrar/'.$page, $data);
                $this->load->view('templates/footer');

                

            }

        }else{
            redirect(base_url());
        }

    }

    public function addCDiscount($admissionID){

        $this->Registrar_model->addCDiscount($admissionID);
        $this->session->set_flashdata('discount_added','The subject has been added');
        redirect('assescollege/'.$admissionID);

    }

    public function removeCDiscount($admissionID,$discountID){

        $this->Registrar_model->removeCDiscount($admissionID,$discountID);
        $this->session->set_flashdata('discount_removed','The subject has been added');
        redirect('assescollege/'.$admissionID);
        
    }
    

    public function shiftStudentCollege($admissionID){

        $this->Registrar_model->shiftStudent($admissionID);
        $this->session->set_flashdata('CollegeShifted','The subject has been added');
        redirect('college');

    }

    public function marktesCollege($admissionID){

        $this->Registrar_model->marktesCollege($admissionID);
        $this->session->set_flashdata('CollegeMarked','The subject has been added');
        redirect('college');

    }
    

    public function updateCollegeinfo($admissionID){

        $this->Registrar_model->updateCollege($admissionID);
        $this->session->set_flashdata('Student_Updated','The student has been updated');
        redirect('college');

    }

    public function getstudentInfoCollege($admissionID){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'college_dropsubject';
            if(!file_exists(APPPATH.'views/registrar/'.$page.'.php')){
                show_404();
            }else{
                $data['title'] = "Drop Subjects";
                
                $_SESSION['admiID'] = $admissionID;

                $data['studentinfo'] = $this->Registrar_model->getstudentInfoCollege($admissionID);  
                $data['studentNo'] =  $data['studentinfo']['StudentNo'];
                $data['fullname'] =  $data['studentinfo']['FullName'];
                $data['address'] =  $data['studentinfo']['Address'];
                $data['course'] = $data['studentinfo']['CourseDesc'];
                $data['level'] = $data['studentinfo']['Level'];
                $data['sem'] = $data['studentinfo']['Semester'];
                $data['department'] =  $data['studentinfo']['CollegeDPT'];

                //DATA SET FOR STUDENT INFO
                $_SESSION['studentNo'] = $data['studentNo'];
                $_SESSION['fullname'] = $data['fullname'];
                $_SESSION['address'] = $data['address'];
                $_SESSION['course'] = $data['course'];
                $_SESSION['level'] = $data['level'];
                $_SESSION['sem'] = $data['sem'];
                $_SESSION['department'] = $data['department'];

                $data['studentSubjects'] = $this->Registrar_model->getSubjectsCollege($admissionID);


                
                $this->load->view('templates/header',$data);
                $this->load->view('registrar/'.$page, $data);
                $this->load->view('templates/footer');

            }

        }else{
            redirect(base_url());
        }

    }

    public function dropsubjectCollege($admissionID){
        $this->Registrar_model->dropsubjectCollege($admissionID);
        $this->session->set_flashdata('subjectDropped','The student has been updated');
        redirect('college_dropsubject/'.$_SESSION['admiID']);
    }


    public function collegRanking(){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'gwacollege';
            if(!file_exists(APPPATH.'views/registrar/'.$page.'.php')){
                show_404();
            }else{
                
                $data['title'] = "College Rankings";
            
                $data['College'] = $this->Registrar_model->viewGWACollege();
                $this->load->view('templates/header',$data);
                $this->load->view('registrar/'.$page, $data);
                $this->load->view('templates/footer');
            }

        }else{
            redirect(base_url());
        }
        
    }



    

























    //SENIOR HIGH
    public function seniorhigh(){
        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'seniorhigh';
            if(!file_exists(APPPATH.'views/registrar/'.$page.'.php')){
                show_404();
            }else{
                $data['title'] = "Senior High Students";

                $keyword = $this->input->post('searchseniorhigh');

                $data['viewSY'] = $this->Egrade_model->viewSYSeniorhigh();
                $data['viewSem'] = $this->Egrade_model->viewSemSeniorhigh();
                
                if (empty($keyword)){
                    $data['seniorhighstudents'] = $this->Registrar_model->getStudentsSeniorhigh();
                    $this->load->view('templates/header',$data);
                    $this->load->view('registrar/'.$page, $data);
                    $this->load->view('templates/footer');
                }else{
                    $data['seniorhighstudents'] = $this->Registrar_model->getStudentSeniorhighSearch($keyword);
                    $data['course'] = $this->Registrar_model->getCourse();
                    $this->load->view('templates/header',$data);
                    $this->load->view('registrar/'.$page, $data);
                    $this->load->view('templates/footer');
                }
                
            }

        }else{
            redirect(base_url());
        }
    }


    public function updateSeniorhighinfo($admissionID){

        $this->Registrar_model->updateSeniorhigh($admissionID);
        $this->session->set_flashdata('Student_Updated','The student has been updated');
        redirect('seniorhigh');

    }


    public function assesSeniorhigh($admissionID){
            
        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'seniorhigh_assesment';
            if(!file_exists(APPPATH.'views/registrar/'.$page.'.php')){
                show_404();
            }else{
                
                $data['title'] = "Asses Senior High";
                $data['discounts'] = $this->Registrar_model->viewDiscountsSeniorhigh();

                $data['studentinfo'] = $this->Registrar_model->viewStudentInfoSeniorhigh($admissionID);  
                $data['studentNo'] =  $data['studentinfo']['StudentNo'];
                $data['lastName'] =  $data['studentinfo']['LastName'];
                $data['firstName'] =  $data['studentinfo']['FirstName'];
                $data['middleName'] =  $data['studentinfo']['MiddleName'];
                $data['fullname'] =  $data['studentinfo']['FullName'];
                $data['address'] =  $data['studentinfo']['Address'];
                $data['strand'] = $data['studentinfo']['Strand'];
                $data['level'] = $data['studentinfo']['Level'];
                $data['sem'] = $data['studentinfo']['Semester'];
        
                //DATA SET FOR STUDENT INFO
                $_SESSION['studentNo'] = $data['studentNo'];
                $_SESSION['lastName'] = $data['lastName'];
                $_SESSION['firstName'] = $data['firstName'];
                $_SESSION['middleName'] = $data['middleName'];
                $_SESSION['fullname'] = $data['fullname'];
                $_SESSION['address'] = $data['address'];
                $_SESSION['level'] = $data['level'];
                $_SESSION['sem'] = $data['sem'];
                $_SESSION['strand'] = $data['strand'];

                $data['studentsSubject'] = $this->Registrar_model->viewStudentSubjectsSeniorhigh($admissionID); 
                $data['count'] = $this->Registrar_model->getsubjectCountSeniorhigh($admissionID);
                $data['subjectCount'] = $data['count']['subjectCount'];
                $data['TFee'] = 17500;
                
                
                $data['CollegeMisc'] = $this->Registrar_model->getMiscellaneousSeniorhigh($data['level']);
                $data['otherSeniorhighMisc'] = $this->Registrar_model->getotherMiscellaneousSeniorhigh($data['level']);
                
                $data['shsmiscfee'] = $this->Registrar_model->getMiscellaneousSeniorhighFee($data['level']);
                $data['MiscFee'] = $data['shsmiscfee']['MiscFee'];

                $data['othershsmiscfee'] = $this->Registrar_model->getotherMiscellaneousSeniorhighFee($data['level']);
                $data['otherMiscFee'] = $data['othershsmiscfee']['otherMiscFee'];
                
                $data['admissionID'] = $admissionID;
                
                $this->load->view('templates/header',$data);
                $this->load->view('registrar/'.$page, $data);
                $this->load->view('templates/footer');

            
            }

        }else{
            redirect(base_url());
        }

    }


    public function getstudentInfoSeniorhigh($admissionID){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'seniorhigh_dropsubject';
            if(!file_exists(APPPATH.'views/registrar/'.$page.'.php')){
                show_404();
            }else{
                $data['title'] = "Drop Subjects";
                
                $_SESSION['admiID'] = $admissionID;

                $data['studentinfo'] = $this->Registrar_model->getstudentInfoSeniorhigh($admissionID);  
                $data['studentNo'] =  $data['studentinfo']['StudentNo'];
                $data['fullname'] =  $data['studentinfo']['FullName'];
                $data['address'] =  $data['studentinfo']['Address'];
                $data['strand'] = $data['studentinfo']['Strand'];
                $data['level'] = $data['studentinfo']['Level'];
                $data['sem'] = $data['studentinfo']['Semester'];

                //DATA SET FOR STUDENT INFO
                $_SESSION['studentNo'] = $data['studentNo'];
                $_SESSION['fullname'] = $data['fullname'];
                $_SESSION['address'] = $data['address'];
                $_SESSION['strand'] = $data['strand'];
                $_SESSION['level'] = $data['level'];
                $_SESSION['sem'] = $data['sem'];

                $data['studentSubjects'] = $this->Registrar_model->getSubjectsSeniorhigh($admissionID);
                
                $this->load->view('templates/header',$data);
                $this->load->view('registrar/'.$page, $data);
                $this->load->view('templates/footer');

            }

        }else{
            redirect(base_url());
        }

    }

    public function dropsubjectSeniorhigh($admissionID){
        $this->Registrar_model->dropsubjectSeniorhigh($admissionID);
        $this->session->set_flashdata('subjectDropped','The student has been updated');
        redirect('seniorhigh_dropsubject/'.$_SESSION['admiID']);
    }

    public function shiftStudentSeniorhigh($admissionID){

        $this->Registrar_model->shiftStudentseniorhigh($admissionID);
        $this->session->set_flashdata('SeniorhighShifted','The subject has been added');
        redirect('seniorhigh');

    }



























    // JUNIOR HIGH
    public function juniorhigh(){
        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'juniorhigh';
            if(!file_exists(APPPATH.'views/registrar/'.$page.'.php')){
                show_404();
            }else{
                $data['title'] = "Junior High Students";

                $keyword = $this->input->post('searchjuniorhigh');
                $data['viewSY'] = $this->Egrade_model->viewSYSeniorhigh();

                if (empty($keyword)){
                    $data['seniorhighstudents'] = $this->Registrar_model->getStudentsJuniorhigh();
                    $this->load->view('templates/header',$data);
                    $this->load->view('registrar/'.$page, $data);
                    $this->load->view('templates/footer');
                }else{
                    $data['seniorhighstudents'] = $this->Registrar_model->getStudentJuniorhighSearch($keyword);
                    $this->load->view('templates/header',$data);
                    $this->load->view('registrar/'.$page, $data);
                    $this->load->view('templates/footer');
                }

            }

        }else{
            redirect(base_url());
        }
    }


    public function shiftstudentJuniorhigh($admissionID){

        $this->Registrar_model->shiftstudentJuniorhigh($admissionID);
        $this->session->set_flashdata('CollegeShifted','The subject has been added');
        redirect('juniorhigh');

    }

    public function updateJuniorhigh($admissionID){

        $this->Registrar_model->updateJuniorhigh($admissionID);
        $this->session->set_flashdata('Student_Updated','The student has been updated');
        redirect('juniorhigh');

    }

    public function assesJuniorhigh($admissionID){
            
        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'juniorhigh_assesment';
            if(!file_exists(APPPATH.'views/registrar/'.$page.'.php')){
                show_404();
            }else{
                
                $data['title'] = "Asses Junior High";
                $data['discounts'] = $this->Registrar_model->viewDiscountsJuniorhigh();

                $data['studentinfo'] = $this->Registrar_model->viewStudentInfoJuniorhigh($admissionID);  
                $data['studentNo'] =  $data['studentinfo']['StudentNo'];
                $data['lastName'] =  $data['studentinfo']['LastName'];
                $data['firstName'] =  $data['studentinfo']['FirstName'];
                $data['middleName'] =  $data['studentinfo']['MiddleName'];
                $data['fullname'] =  $data['studentinfo']['FullName'];
                $data['address'] =  $data['studentinfo']['Address'];
                $data['level'] = $data['studentinfo']['Level'];
                $data['section'] = $data['studentinfo']['Section'];
        
                //DATA SET FOR STUDENT INFO
                $_SESSION['studentNo'] = $data['studentNo'];
                $_SESSION['lastName'] = $data['lastName'];
                $_SESSION['firstName'] = $data['firstName'];
                $_SESSION['middleName'] = $data['middleName'];
                $_SESSION['fullname'] = $data['fullname'];
                $_SESSION['address'] = $data['address'];
                $_SESSION['level'] = $data['level'];
                $_SESSION['section'] = $data['section'];
                
                $data['admissionID'] = $admissionID;

                $data['studentsSubject'] = $this->Registrar_model->viewStudentSubjectsJuniorhigh($admissionID); 

                $data['TFee'] =  0;
                if($_SESSION['level'] == 'GRADE 7'){
                    $data['TFee'] =  12785;
                }else{
                    $data['TFee'] =  21015;
                }
                
                
                
                $data['juniorMisc'] = $this->Registrar_model->getMiscellaneousJuniorhigh($data['level']);
                $data['juniorhighothermisc'] = $this->Registrar_model->getOtherMiscellaneousJuniorhigh($data['level']);
                
                $data['juniorMiscFee'] = $this->Registrar_model->getMiscellaneousJuniorhighFee($data['level']);
                $data['MiscFee'] = $data['juniorMiscFee']['MiscFee'];

                $data['JuniorOtherMiscFee'] = $this->Registrar_model->getOtherMiscellaneousJuniorhighFee($data['level']);
                $data['otherMiscFee'] = $data['JuniorOtherMiscFee']['OtherMiscFee'];


                
                $data['sbjctcount'] = $this->Registrar_model->getsubjectCountJuniorhigh($admissionID); 
                $data['subjectcnt'] = $data['sbjctcount']['subjectCount'];
                $data['subjecthrs'] = $data['sbjctcount']['subjecthours'];
                
                $this->load->view('templates/header',$data);
                $this->load->view('registrar/'.$page, $data);
                $this->load->view('templates/footer');

            
            }

        }else{
            redirect(base_url());
        }

    }

















    public function gradeschool(){
        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'gradeschool';
            if(!file_exists(APPPATH.'views/registrar/'.$page.'.php')){
                show_404();
            }else{
                $data['title'] = "Junior High Students";

                $keyword = $this->input->post('searchgradeschool');
                $data['viewSY'] = $this->Egrade_model->viewSYGradeschool();
                
                if (empty($keyword)){
                    $data['seniorhighstudents'] = $this->Registrar_model->getStudentsGradeschool();
                    $this->load->view('templates/header',$data);
                    $this->load->view('registrar/'.$page, $data);
                    $this->load->view('templates/footer');
                }else{
                    $data['seniorhighstudents'] = $this->Registrar_model->getStudentsGradeschoolSearch($keyword);
                    $this->load->view('templates/header',$data);
                    $this->load->view('registrar/'.$page, $data);
                    $this->load->view('templates/footer');
                }
                
            }

        }else{
            redirect(base_url());
        }
    }


    public function assesGradeschool($admissionID){
            
        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'gradeschool_assesment';
            if(!file_exists(APPPATH.'views/registrar/'.$page.'.php')){
                show_404();
            }else{
                
                $data['title'] = "Asses Junior High";

                $data['studentinfo'] = $this->Registrar_model->viewStudentInfoGradeschool($admissionID);  
                $data['studentNo'] =  $data['studentinfo']['StudentNo'];
                $data['lastName'] =  $data['studentinfo']['LastName'];
                $data['firstName'] =  $data['studentinfo']['FirstName'];
                $data['middleName'] =  $data['studentinfo']['MiddleName'];
                $data['fullname'] =  $data['studentinfo']['FullName'];
                $data['address'] =  $data['studentinfo']['Address'];
                $data['level'] = $data['studentinfo']['Level'];
                $data['section'] = $data['studentinfo']['Section'];
        
                //DATA SET FOR STUDENT INFO
                $_SESSION['studentNo'] = $data['studentNo'];
                $_SESSION['lastName'] = $data['lastName'];
                $_SESSION['firstName'] = $data['firstName'];
                $_SESSION['middleName'] = $data['middleName'];
                $_SESSION['fullname'] = $data['fullname'];
                $_SESSION['address'] = $data['address'];
                $_SESSION['level'] = $data['level'];
                $_SESSION['section'] = $data['section'];
                
                $data['admissionID'] = $admissionID;

                $data['studentsSubject'] = $this->Registrar_model->viewStudentSubjectsGradeschool($admissionID); 

                if ($data['level'] == "KINDER I" || $data['level'] == "KINDER II" ) {
                    $data['TFee'] =  12883;
                }elseif($data['level'] == "GRADE 1"){
                    $data['TFee'] =  14171;
                }elseif($data['level'] == "GRADE 2"){
                    $data['TFee'] =  22162;
                }elseif($data['level'] == "GRADE 3" || $data['level'] == "GRADE 4"){
                    $data['TFee'] =  23270.10;
                }elseif($data['level'] == "GRADE 5" || $data['level'] == "GRADE 6"){
                    $data['TFee'] =  23824.15;
                }

                
                $data['CollegeMisc'] = $this->Registrar_model->getMiscellaneousGradeschool($data['level']);
                $data['juniorhighothermisc'] = $this->Registrar_model->getOtherMiscellaneousGradeschoolh($data['level']);
                
                $data['CollegeMiscFee'] = $this->Registrar_model->getMiscellaneousGradeschoolFee($data['level']);
                $data['MiscFee'] = $data['CollegeMiscFee']['MiscFee'];

                $data['JuniorOtherMiscFee'] = $this->Registrar_model->getOtherMiscellaneousGradeschoolFee($data['level']);
                $data['otherMiscFee'] = $data['JuniorOtherMiscFee']['OtherMiscFee'];

                $data['sbjctcount'] = $this->Registrar_model->getsubjectCountGradeschool($admissionID); 
                $data['subjectcnt'] = $data['sbjctcount']['subjectCount'];
                $data['subjecthrs'] = $data['sbjctcount']['subjecthours'];
                
                $this->load->view('templates/header',$data);
                $this->load->view('registrar/'.$page, $data);
                $this->load->view('templates/footer');

            
            }

        }else{
            redirect(base_url());
        }

    }


    public function shiftstudentGradeschool($admissionID){

        $this->Registrar_model->shiftstudentGradeschool($admissionID);
        $this->session->set_flashdata('CollegeShifted','The subject has been added');
        redirect('gradeschool');

    }

    public function updateGradeschool($admissionID){

        $this->Registrar_model->updateGradeschool($admissionID);
        $this->session->set_flashdata('Student_Updated','The student has been updated');
        redirect('gradeschool');

    }

    
    





    

}
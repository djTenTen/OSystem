<?php
class Admission_controller extends CI_Controller{

    public function collegeAdmission(){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'admission_college';
            if(!file_exists(APPPATH.'views/guidance/'.$page.'.php')){
                show_404();
            }else{
                 
                $data['title'] = "Admission - College";

                $keyword1 = $this->input->post('searchpending');
     
                if(!empty($keyword1)){
                    $data['admissionCollege'] = $this->Admission_model->viewCollegeSearch($keyword1);
                    $data['courses'] = $this->Admission_model->viewCourses();
                    $data['validated'] = $this->Admission_model->viewValidatedCollege();
                    $data['pendingcount'] = $this->Admission_model->pendingCountCollege();
                    $data['validatedcount'] = $this->Admission_model->validatedCountCollege();
                    $data['evaluatedcount'] = $this->Admission_model->EvaluatedCountCollege();
                    $data['enrolledcount'] = $this->Admission_model->EnrolledCountCollege();
                    $data['NewStudentCountCollege'] = $this->Registrar_model->getNewStudentCountCollege();
                    $data['OldStudentCountCollege'] = $this->Registrar_model-> getOldStudentCountCollege();
                    $this->load->view('templates/header',$data);
                    $this->load->view('guidance/'.$page, $data);
                    $this->load->view('templates/footer');
                }else{
                    $data['admissionCollege'] = $this->Admission_model->viewCollege();
                    $data['courses'] = $this->Admission_model->viewCourses();
                    $data['validated'] = $this->Admission_model->viewValidatedCollege();
                    $data['pendingcount'] = $this->Admission_model->pendingCountCollege();
                    $data['validatedcount'] = $this->Admission_model->validatedCountCollege();
                    $data['evaluatedcount'] = $this->Admission_model->EvaluatedCountCollege();
                    $data['enrolledcount'] = $this->Admission_model->EnrolledCountCollege();
                    $data['NewStudentCountCollege'] = $this->Registrar_model->getNewStudentCountCollege();
                    $data['OldStudentCountCollege'] = $this->Registrar_model-> getOldStudentCountCollege();
                    $this->load->view('templates/header',$data);
                    $this->load->view('guidance/'.$page, $data);
                    $this->load->view('templates/footer');
                }
                
            }
        }else{
            redirect(base_url());
        }
    }

    public function collegeValidated(){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'validated_college';
            if(!file_exists(APPPATH.'views/guidance/'.$page.'.php')){
                show_404();
            }else{
                 
                $data['title'] = "Admission - College";

                $keyword2 = $this->input->post('searchvalidated');

                if(!empty($keyword2)){
                    $data['admissionCollege'] = $this->Admission_model->viewPendingCollege();
                    $data['courses'] = $this->Admission_model->viewCourses();
                    $data['validated'] = $this->Admission_model->viewValidatedCollegeSearch($keyword2);
                    $data['pendingcount'] = $this->Admission_model->pendingCountCollege();
                    $data['validatedcount'] = $this->Admission_model->validatedCountCollege();
                    $data['NewStudentCountCollege'] = $this->Registrar_model->getNewStudentCountCollege();
                    $data['OldStudentCountCollege'] = $this->Registrar_model-> getOldStudentCountCollege();
                    $this->load->view('templates/header',$data);
                    $this->load->view('guidance/'.$page, $data);
                    $this->load->view('templates/footer');
                }else{
                    $data['admissionCollege'] = $this->Admission_model->viewPendingCollege();
                    $data['courses'] = $this->Admission_model->viewCourses();
                    $data['validated'] = $this->Admission_model->viewValidatedCollege();
                    $data['pendingcount'] = $this->Admission_model->pendingCountCollege();
                    $data['validatedcount'] = $this->Admission_model->validatedCountCollege();
                    $data['NewStudentCountCollege'] = $this->Registrar_model->getNewStudentCountCollege();
                    $data['OldStudentCountCollege'] = $this->Registrar_model-> getOldStudentCountCollege();
                    $this->load->view('templates/header',$data);
                    $this->load->view('guidance/'.$page, $data);
                    $this->load->view('templates/footer');
                }
            }

        }elseif(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }else{
            redirect(base_url());
        }
    }

    public function validatCollege($admissionID){

        $this->Admission_model->validateCollege($admissionID);
        $this->session->set_flashdata('Student_Validated','The student has been validated');
        redirect('admission_college');

        $this->Logs_model->validateCollege($admissionID);

    }

    public function updateCollege($admissionID){

        $this->Admission_model->updateCollege($admissionID);
        $this->session->set_flashdata('Student_Updated','The student has been updated');
        redirect('admission_college');

    }

    public function deleteCollege($admissionID){

        $this->Admission_model->deleteCollege($admissionID);
        $this->session->set_flashdata('Student_Deleted','The student has been updated');
        redirect('admission_college');

    }

    public function dismissCollege($admissionID){

        $this->Admission_model->dismissCollege($admissionID);
        $this->session->set_flashdata('Student_Dismiss','The student has been updated');
        redirect('admission_college');

    }

    public function cbrCollege($admissionID){

        $this->Admission_model->cbrCollege($admissionID);
        $this->session->set_flashdata('Student_CBR','The student has been updated');
        redirect('admission_college');

    }


    

    













    public function seniorhighAdmission(){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){
            
            $page = 'admission_seniorhigh';
            if(!file_exists(APPPATH.'views/guidance/'.$page.'.php')){
                show_404();
            }else{
                 
                $data['title'] = "Admission - Senior High";

                $keyword1 = $this->input->post('searchpending');
                if(!empty($keyword1)){
                    $data['admissionSeniorhigh'] = $this->Admission_model->viewPendingSeniorhighSearch($keyword1);
                    $data['validated'] = $this->Admission_model->viewValidatedSeniorhigh();
                    $data['pendingcount'] = $this->Admission_model->pendingCountSeniorhigh();
                    $data['validatedcount'] = $this->Admission_model->validatedCounSeniorhigh();
                    $data['evaluatedcount'] = $this->Admission_model->EvaluatedCountSeniorhigh();
                    $data['enrolledcount'] = $this->Admission_model->EnrolledCountSeniorhigh();
                    $data['NewStudentCountSeniorhigh'] = $this->Registrar_model-> getNewStudentCountSeniorhigh();                  
                    $data['OldStudentCountSeniorhigh'] = $this->Registrar_model-> getOldStudentCountSeniorhigh();
                    $this->load->view('templates/header',$data);
                    $this->load->view('guidance/'.$page, $data);
                    $this->load->view('templates/footer');
                }else{
                    $data['admissionSeniorhigh'] = $this->Admission_model->viewPendingSeniorhigh();
                    $data['validated'] = $this->Admission_model->viewValidatedSeniorhigh();
                    $data['pendingcount'] = $this->Admission_model->pendingCountSeniorhigh();
                    $data['validatedcount'] = $this->Admission_model->validatedCounSeniorhigh();
                    $data['evaluatedcount'] = $this->Admission_model->EvaluatedCountSeniorhigh();
                    $data['enrolledcount'] = $this->Admission_model->EnrolledCountSeniorhigh();
                    $data['NewStudentCountSeniorhigh'] = $this->Registrar_model-> getNewStudentCountSeniorhigh();                  
                    $data['OldStudentCountSeniorhigh'] = $this->Registrar_model-> getOldStudentCountSeniorhigh();                
                    $this->load->view('templates/header',$data);
                    $this->load->view('guidance/'.$page, $data);
                    $this->load->view('templates/footer');
                }
                
                
                
                
            }

        }elseif(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }else{
            redirect(base_url());
        }
    }

    public function seniorhighValidated(){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){
            
            $page = 'validated_seniorhigh';
            if(!file_exists(APPPATH.'views/guidance/'.$page.'.php')){
                show_404();
            }else{
                 
                $data['title'] = "Admission - Senior High";

                $keyword2 = $this->input->post('searchvalidated');
                
                if(!empty($keyword2)){
                    $data['admissionSeniorhigh'] = $this->Admission_model->viewPendingSeniorhigh();
                    $data['validated'] = $this->Admission_model->viewValidatedSeniorhighSearch($keyword2);
                    $data['pendingcount'] = $this->Admission_model->pendingCountSeniorhigh();
                    $data['validatedcount'] = $this->Admission_model->validatedCounSeniorhigh();
                    $data['NewStudentCountSeniorhigh'] = $this->Registrar_model-> getNewStudentCountSeniorhigh();                  
                    $data['OldStudentCountSeniorhigh'] = $this->Registrar_model-> getOldStudentCountSeniorhigh(); 
                    $this->load->view('templates/header',$data);
                    $this->load->view('guidance/'.$page, $data);
                    $this->load->view('templates/footer');
                }else{
                    $data['admissionSeniorhigh'] = $this->Admission_model->viewPendingSeniorhigh();
                    $data['validated'] = $this->Admission_model->viewValidatedSeniorhigh();
                    $data['pendingcount'] = $this->Admission_model->pendingCountSeniorhigh();
                    $data['validatedcount'] = $this->Admission_model->validatedCounSeniorhigh();
                    $data['NewStudentCountSeniorhigh'] = $this->Registrar_model-> getNewStudentCountSeniorhigh();                  
                    $data['OldStudentCountSeniorhigh'] = $this->Registrar_model-> getOldStudentCountSeniorhigh();                
                    $this->load->view('templates/header',$data);
                    $this->load->view('guidance/'.$page, $data);
                    $this->load->view('templates/footer');
                }


                
                
                
            }

        }elseif(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }else{
            redirect(base_url());
        }
    }
    
    public function validatSeniorhigh($admissionID){

        $this->Admission_model->validateSeniorhigh($admissionID);
        $this->session->set_flashdata('Student_Validated','The student has been validated');
        redirect('admission_seniorhigh');

    }

    public function updateSeniorhigh($admissionID){

        $this->Admission_model->updateSeniorhigh($admissionID);
        $this->session->set_flashdata('Student_Updated','The student has been updated');
        redirect('admission_seniorhigh');

    }

    public function dismissSeniorhigh($admissionID){

        $this->Admission_model->dismissSeniorhigh($admissionID);
        $this->session->set_flashdata('Student_Dismiss','The student has been updated');
        redirect('admission_seniorhigh');

    }






    









    public function juniorhighAdmission(){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){
            
            $page = 'admission_juniorhigh';
            if(!file_exists(APPPATH.'views/guidance/'.$page.'.php')){
                show_404();
            }else{
                 
                $data['title'] = "Admission - Junior High";

                $keyword1 = $this->input->post('searchpending');

                if(!empty($keyword1)){
                    $data['admissionJuniorhigh'] = $this->Admission_model->viewPendingJuniorhighSearch($keyword1);
                    $data['validated'] = $this->Admission_model->viewValidatedJuniorhigh();
                    $data['pendingcount'] = $this->Admission_model->pendingCountJuniorhigh();
                    $data['validatedcount'] = $this->Admission_model->validatedCounJuniorhigh();
                    $data['evaluatedcount'] = $this->Admission_model->EvaluatedCountJuniorhigh();
                    $data['enrolledcount'] = $this->Admission_model->EnrolledCountJuniorhigh();
                    $data['NewStudentCountJuniorhigh'] = $this->Registrar_model-> getNewStudentCountJuniorhigh();
                    $data['OldStudentCountJuniorhigh'] = $this->Registrar_model-> getOldStudentCountJuniorhigh();
                    $this->load->view('templates/header',$data);
                    $this->load->view('guidance/'.$page, $data);
                    $this->load->view('templates/footer');
                }else{

                    $data['admissionJuniorhigh'] = $this->Admission_model->viewPendingJuniorhigh();
                    $data['validated'] = $this->Admission_model->viewValidatedJuniorhigh();
                    $data['pendingcount'] = $this->Admission_model->pendingCountJuniorhigh();
                    $data['validatedcount'] = $this->Admission_model->validatedCounJuniorhigh();
                    $data['evaluatedcount'] = $this->Admission_model->EvaluatedCountJuniorhigh();
                    $data['enrolledcount'] = $this->Admission_model->EnrolledCountJuniorhigh();
                    $data['NewStudentCountJuniorhigh'] = $this->Registrar_model-> getNewStudentCountJuniorhigh();
                    $data['OldStudentCountJuniorhigh'] = $this->Registrar_model-> getOldStudentCountJuniorhigh();
                    $this->load->view('templates/header',$data);
                    $this->load->view('guidance/'.$page, $data);
                    $this->load->view('templates/footer');

                }
                
                
                
            }

        }elseif(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }else{
            redirect(base_url());
        }
    }

    public function juniorhighValidated(){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){
            
            $page = 'validated_juniorhigh';
            if(!file_exists(APPPATH.'views/guidance/'.$page.'.php')){
                show_404();
            }else{
                 
                $data['title'] = "Admission - Junior High";
                $keyword2 = $this->input->post('searchvalidated');

                if(!empty($keyword2)){
                    $data['admissionJuniorhigh'] = $this->Admission_model->viewPendingJuniorhigh();
                    $data['validated'] = $this->Admission_model->viewValidatedJuniorhighSearch($keyword2);
                    $data['pendingcount'] = $this->Admission_model->pendingCountJuniorhigh();
                    $data['validatedcount'] = $this->Admission_model->validatedCounJuniorhigh();
                    $data['NewStudentCountJuniorhigh'] = $this->Registrar_model-> getNewStudentCountJuniorhigh();
                    $data['OldStudentCountJuniorhigh'] = $this->Registrar_model-> getOldStudentCountJuniorhigh();
                    $this->load->view('templates/header',$data);
                    $this->load->view('guidance/'.$page, $data);
                    $this->load->view('templates/footer');
                }else{
                    $data['admissionJuniorhigh'] = $this->Admission_model->viewPendingJuniorhigh();
                    $data['validated'] = $this->Admission_model->viewValidatedJuniorhigh();
                    $data['pendingcount'] = $this->Admission_model->pendingCountJuniorhigh();
                    $data['validatedcount'] = $this->Admission_model->validatedCounJuniorhigh();
                    $data['NewStudentCountJuniorhigh'] = $this->Registrar_model-> getNewStudentCountJuniorhigh();
                    $data['OldStudentCountJuniorhigh'] = $this->Registrar_model-> getOldStudentCountJuniorhigh();
                    $this->load->view('templates/header',$data);
                    $this->load->view('guidance/'.$page, $data);
                    $this->load->view('templates/footer');
                }
                
                
            
                
                
            }

        }elseif(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }else{
            redirect(base_url());
        }
    }
    
    public function validatJuniorhigh($admissionID){

        $this->Admission_model->validateJuniorhigh($admissionID);
        $this->session->set_flashdata('Student_Validated','The student has been validated');
        redirect('admission_juniorhigh');

    }

    public function updateJuniorhigh($admissionID){

        $this->Admission_model->updateJuniorhigh($admissionID);
        $this->session->set_flashdata('Student_Updated','The student has been updated');
        redirect('admission_juniorhigh');

    }

    public function dismissJuniorhigh($admissionID){

        $this->Admission_model->dismissJuniorhigh($admissionID);
        $this->session->set_flashdata('Student_Dismiss','The student has been updated');
        redirect('admission_juniorhigh');

    }




















    //GRADE SCHOOL ADMISSINO
    public function gradeschoolAdmission(){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){
            
            $page = 'admission_gradeschool';
            if(!file_exists(APPPATH.'views/guidance/'.$page.'.php')){
                show_404();
            }else{
                 
                $data['title'] = "Admission - Grade School";
                $keyword1 = $this->input->post('searchpending');

                if(!empty($keyword1)){
                    $data['admissionJuniorhigh'] = $this->Admission_model->viewPendingGradeschoolSearch($keyword1);
                    $data['validated'] = $this->Admission_model->viewValidatedGradeschool();
                    $data['pendingcount'] = $this->Admission_model->pendingCountGradeschool();
                    $data['validatedcount'] = $this->Admission_model->validatedCounGradeschool();
                    $data['evaluatedcount'] = $this->Admission_model->EvaluatedCountGradeschool();
                    $data['enrolledcount'] = $this->Admission_model->EnrolledCountGradeschool();
                    $data['NewStudentCountGradeschool'] = $this->Registrar_model-> getNewStudentCountGradeschool();
                    $data['OldStudentCountGradeschool'] = $this->Registrar_model-> getOldStudentCountGradeschool();
                    $this->load->view('templates/header',$data);
                    $this->load->view('guidance/'.$page, $data);
                    $this->load->view('templates/footer');
                }else{
                    $data['admissionJuniorhigh'] = $this->Admission_model->viewPendingGradeschool();
                    $data['validated'] = $this->Admission_model->viewValidatedGradeschool();
                    $data['pendingcount'] = $this->Admission_model->pendingCountGradeschool();
                    $data['validatedcount'] = $this->Admission_model->validatedCounGradeschool();
                    $data['evaluatedcount'] = $this->Admission_model->EvaluatedCountGradeschool();
                    $data['enrolledcount'] = $this->Admission_model->EnrolledCountGradeschool();
                    $data['NewStudentCountGradeschool'] = $this->Registrar_model-> getNewStudentCountGradeschool();
                    $data['OldStudentCountGradeschool'] = $this->Registrar_model-> getOldStudentCountGradeschool();
                    $this->load->view('templates/header',$data);
                    $this->load->view('guidance/'.$page, $data);
                    $this->load->view('templates/footer');

                }

                
                
                
                
            }

        }elseif(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }else{
            redirect(base_url());
        }
    }


    public function gradeschoolValidated(){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){
            
            $page = 'validated_gradeschool';
            if(!file_exists(APPPATH.'views/guidance/'.$page.'.php')){
                show_404();
            }else{
                 
                $data['title'] = "Admission - Grade School";

                $keyword2 = $this->input->post('searchvalidated');

                if(!empty($keyword2)){
                    $data['admissionJuniorhigh'] = $this->Admission_model->viewPendingGradeschool();
                    $data['validated'] = $this->Admission_model->viewValidatedGradeschoolSearch($keyword2);
                    $data['pendingcount'] = $this->Admission_model->pendingCountGradeschool();
                    $data['validatedcount'] = $this->Admission_model->validatedCounGradeschool();
                    $data['NewStudentCountGradeschool'] = $this->Registrar_model-> getNewStudentCountGradeschool();
                    $data['OldStudentCountGradeschool'] = $this->Registrar_model-> getOldStudentCountGradeschool();
                    $this->load->view('templates/header',$data);
                    $this->load->view('guidance/'.$page, $data);
                    $this->load->view('templates/footer');
                }else{
                    $data['admissionJuniorhigh'] = $this->Admission_model->viewPendingGradeschool();
                    $data['validated'] = $this->Admission_model->viewValidatedGradeschool();
                    $data['pendingcount'] = $this->Admission_model->pendingCountGradeschool();
                    $data['validatedcount'] = $this->Admission_model->validatedCounGradeschool();
                    $data['NewStudentCountGradeschool'] = $this->Registrar_model-> getNewStudentCountGradeschool();
                    $data['OldStudentCountGradeschool'] = $this->Registrar_model-> getOldStudentCountGradeschool();
                    $this->load->view('templates/header',$data);
                    $this->load->view('guidance/'.$page, $data);
                    $this->load->view('templates/footer');
                }
            }

        }elseif(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }else{
            redirect(base_url());
        }
    }





    

    public function validatGradeschool($admissionID){

        $this->Admission_model->validateGradeschool($admissionID);
        $this->session->set_flashdata('Student_Validated','The student has been validated');
        redirect('admission_gradeschool');

    }

    public function updateGradeschool($admissionID){

        $this->Admission_model->updateGradeschool($admissionID);
        $this->session->set_flashdata('Student_Updated','The student has been updated');
        redirect('admission_gradeschool');

    }

    public function dismissGradeschool($admissionID){

        $this->Admission_model->dismissGradeschool($admissionID);
        $this->session->set_flashdata('Student_Dismiss','The student has been updated');
        redirect('admission_gradeschool');

    }










    





    
}
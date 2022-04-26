<?php
class Subjects_controller extends CI_Controller{
    
    // COLLEGE SUBJECT MANAGEMENT
    public function subject_college(){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'subjects_college';
            if(!file_exists(APPPATH.'views/subjects/'.$page.'.php')){
                show_404();
            }else{
                
                $data['title'] = "College Subjects";

                $keyword = $this->input->post('searchSubjects');
                
                if (empty($keyword)){
                    $data['subject_college'] = $this->Subjects_model->viewCollegeSubjects();
                    $this->load->view('templates/header',$data);
                    $this->load->view('subjects/'.$page, $data);
                    $this->load->view('templates/footer');
                }else{
                    $data['subject_college'] = $this->Subjects_model->searchCollegeSubjects($keyword);
                    $this->load->view('templates/header',$data);
                    $this->load->view('subjects/'.$page, $data);
                    $this->load->view('templates/footer');
                }
                

                
            }


        }else{
            redirect(base_url());
        }

    }

    public function addCollegeSubjects(){

        $this->Subjects_model->insertCollegeSubjects();
        $this->session->set_flashdata('CollegeSubject_Added','The subject has been added');
        redirect('subject_college');

    }


    public function updateCollegeSubjects($subjectID){
        $this->Subjects_model->updateCollegeSubjects($subjectID);
        $this->session->set_flashdata('CollegeSubject_Updated','The subject has been updated');
        redirect('subject_college');
    }

    public function deleteCollegeSubjects($subjectID){
        $this->Subjects_model->deleteCollegeSubjects($subjectID);
        $this->session->set_flashdata('CollegeSubject_Deleted','The subject has been deleted');
        redirect('subject_college');
    }


    // SENIOR HIGH SUBJECT MANAGEMENT
    public function subject_seniorhigh(){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'subjects_seniorhigh';
            if(!file_exists(APPPATH.'views/subjects/'.$page.'.php')){
                show_404();
            }else{
                                
                $data['title'] = "Senior High Subjects";

                $keyword = $this->input->post('searchSubjects');
                
                if (empty($keyword)){
                    $data['subject_seniorhigh'] = $this->Subjects_model->viewSeniorhighSubjects();
                    $this->load->view('templates/header',$data);
                    $this->load->view('subjects/'.$page, $data);
                    $this->load->view('templates/footer');
                }else{
                    $data['subject_seniorhigh'] = $this->Subjects_model->searchSeniorhighSubjects($keyword);
                    $this->load->view('templates/header',$data);
                    $this->load->view('subjects/'.$page, $data);
                    $this->load->view('templates/footer');
                }
                

                
            }


        }else{
            redirect(base_url());
        }

    }

    public function addSeniorhighSubjects(){

        $this->Subjects_model->insertSeniorhighSubjects();
        $this->session->set_flashdata('SeniorhighSubject_Added','The subject has been added');
        redirect('subject_seniorhigh');

    }


    public function updateSeniorhighSubjects($subjectID){
        $this->Subjects_model->updateSeniorhighSubjects($subjectID);
        $this->session->set_flashdata('SeniorhighSubject_Updated','The subject has been updated');
        redirect('subject_seniorhigh');
    }

    public function deleteSeniorhighSubjects($subjectID){
        $this->Subjects_model->deleteSeniorhighSubjects($subjectID);
        $this->session->set_flashdata('SeniorhighSubject_Deleted','The subject has been deleted');
        redirect('subject_seniorhigh');
    }


    // JUNIOR HIGH SUBJECT MANAGEMENT
    public function subject_juniorhigh(){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'subjects_juniorhigh';
            if(!file_exists(APPPATH.'views/subjects/'.$page.'.php')){
                show_404();
            }else{
                
                $data['title'] = "Junior High Subjects";

                $keyword = $this->input->post('searchSubjects');
                
                if (empty($keyword)){
                    $data['subject_juniorhigh'] = $this->Subjects_model->viewJuniorhighSubjects();
                    $this->load->view('templates/header',$data);
                    $this->load->view('subjects/'.$page, $data);
                    $this->load->view('templates/footer');
                }else{
                    $data['subject_juniorhigh'] = $this->Subjects_model->searchJuniorhighSubjects($keyword);
                    $this->load->view('templates/header',$data);
                    $this->load->view('subjects/'.$page, $data);
                    $this->load->view('templates/footer');
                }
                

                
            }


        }else{
            redirect(base_url());
        }

    }

    public function addJuniorhighSubjects(){

        $this->Subjects_model->insertJuniorhighSubjects();
        $this->session->set_flashdata('JuniorhighSubject_Added','The subject has been added');
        redirect('subject_juniorhigh');

    }


    public function updateJuniorhighSubjects($subjectID){
        $this->Subjects_model->updateJuniorhighSubjects($subjectID);
        $this->session->set_flashdata('JuniorhighSubject_Updated','The subject has been updated');
        redirect('subject_juniorhigh');
    }

    public function deleteJuniorhighSubjects($subjectID){
        $this->Subjects_model->deleteJuniorhighSubjects($subjectID);
        $this->session->set_flashdata('JuniorhighSubject_Deleted','The subject has been deleted');
        redirect('subject_juniorhigh');
    }



    // GRADE SCHOOL SUBJECT MANAGEMENT
    public function subject_gradeschool(){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'subjects_gradeschool';
            if(!file_exists(APPPATH.'views/subjects/'.$page.'.php')){
                show_404();
            }else{
               
                $data['title'] = "Grade School Subjects";

                $keyword = $this->input->post('searchSubjects');
                
                if (empty($keyword)){
                    $data['subject_gradeschool'] = $this->Subjects_model->viewGradeschoolSubjects();
                    $this->load->view('templates/header',$data);
                    $this->load->view('subjects/'.$page, $data);
                    $this->load->view('templates/footer');
                }else{
                    $data['subject_gradeschool'] = $this->Subjects_model->searchGradeschoolSubjects($keyword);
                    $this->load->view('templates/header',$data);
                    $this->load->view('subjects/'.$page, $data);
                    $this->load->view('templates/footer');
                }
                

                
            }


        }else{
            redirect(base_url());
        }

    }

    public function addGradeschoolSubjects(){

        $this->Subjects_model->insertGradeschoolSubjects();
        $this->session->set_flashdata('Gradeschool_Added','The subject has been added');
        redirect('subject_gradeschool');

    }


    public function updateGradeschoolSubjects($subjectID){
        $this->Subjects_model->updateGradeschoolSubjects($subjectID);
        $this->session->set_flashdata('Gradeschool_Updated','The subject has been updated');
        redirect('subject_gradeschool');
    }

    public function deleteGradeschoolSubjects($subjectID){
        $this->Subjects_model->deleteGradeschoolSubjects($subjectID);
        $this->session->set_flashdata('Gradeschool_Deleted','The subject has been deleted');
        redirect('subject_gradeschool');
    }
























}
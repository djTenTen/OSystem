<?php
class Miscellaneous_controller extends CI_Controller{

    // COLLEGE MISC
    public function miscellaneousCollege(){
       
        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'miscellaneous_college';
            if(!file_exists(APPPATH.'views/miscellaneous/'.$page.'.php')){
                show_404();
            }else{
                
                $data['title'] = "Miscellaneous College";
                $keyword = $this->input->post('searchCourse');
                
                if (empty($keyword)){
                    $data['miscellaneousCollege'] = $this->Miscellaneous_model->viewCollegeMiscellaneous();
                    $this->load->view('templates/header',$data);
                    $this->load->view('miscellaneous/'.$page, $data);
                    $this->load->view('templates/footer');
                }else{
                    $data['miscellaneousCollege'] = $this->Miscellaneous_model->viewCollegeMiscellaneous();
                    $this->load->view('templates/header',$data);
                    $this->load->view('miscellaneous/'.$page, $data);
                    $this->load->view('templates/footer');
                }
            
                
            }
        }else{
            redirect(base_url());
        }

    }

    public function addCollegeMiscellaneous(){
        $this->Miscellaneous_model->addCollegeMiscellaneous();
        $this->session->set_flashdata('CollegeMiscellaneous_Added','The Miscellaneous has been Added');
        redirect('miscellaneous_college');
    }


    public function updateCollegeMiscellaneous($miscID){
        $this->Miscellaneous_model->updateCollegeMiscellaneous($miscID);
        $this->session->set_flashdata('CollegeMiscellaneous_Updated','The Miscellaneous has been updated');
        redirect('miscellaneous_college');
    }

    public function deleteCollegeMiscellaneous($miscID){
        $this->Miscellaneous_model->deleteCollegeMiscellaneous($miscID);
        $this->session->set_flashdata('CollegeMiscellaneous_Deleted','The Miscellaneous has been deleted');
        redirect('miscellaneous_college');
    }




    // GRADE SCHOOL MISC
    public function miscellaneous_gradeschool(){
       
        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'miscellaneous_gradeschool';
            if(!file_exists(APPPATH.'views/miscellaneous/'.$page.'.php')){
                show_404();
            }else{
                
                $data['title'] = "Miscellaneous Grade School";
                $keyword = $this->input->post('searchCourse');
                
                if (empty($keyword)){
                    $data['miscellaneousGradeschool'] = $this->Miscellaneous_model->viewGradeschoolMiscellaneous();
                    $this->load->view('templates/header',$data);
                    $this->load->view('miscellaneous/'.$page, $data);
                    $this->load->view('templates/footer');
                }else{
                    $data['miscellaneousGradeschool'] = $this->Miscellaneous_model->viewGradeschoolMiscellaneous();
                    $this->load->view('templates/header',$data);
                    $this->load->view('miscellaneous/'.$page, $data);
                    $this->load->view('templates/footer');
                }
            
                
            }
        }else{
            redirect(base_url());
        }

    }


    public function addGradeschoolMiscellaneous(){
        $this->Miscellaneous_model->addGradeschoolMiscellaneous();
        $this->session->set_flashdata('GradeschoolMiscellaneous_Added','The Miscellaneous has been Added');
        redirect('miscellaneous_gradeschool');
    }


    public function updateGradeschoolMiscellaneous($miscID){
        $this->Miscellaneous_model->updateGradeschoolMiscellaneous($miscID);
        $this->session->set_flashdata('GradeschoolMiscellaneous_Updated','The Miscellaneous has been updated');
        redirect('miscellaneous_gradeschool');
    }

    public function deleteGradeschoolMiscellaneous($miscID){
        $this->Miscellaneous_model->deleteGradeschoolMiscellaneous($miscID);
        $this->session->set_flashdata('GradeschoolMiscellaneous_Deleted','The Miscellaneous has been deleted');
        redirect('miscellaneous_gradeschool');
    }




    //JUNIOR HIGH MISC
    public function miscellaneous_juniorhigh(){
       
        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'miscellaneous_juniorhigh';
            if(!file_exists(APPPATH.'views/miscellaneous/'.$page.'.php')){
                show_404();
            }else{
                
                $data['title'] = "Miscellaneous Junior High";
                $keyword = $this->input->post('searchCourse');
                
                if (empty($keyword)){
                    $data['miscellaneousJuniorhigh'] = $this->Miscellaneous_model->viewJuniorhighMiscellaneous();
                    $this->load->view('templates/header',$data);
                    $this->load->view('miscellaneous/'.$page, $data);
                    $this->load->view('templates/footer');
                }else{
                    $data['miscellaneousJuniorhigh'] = $this->Miscellaneous_model->viewJuniorhighMiscellaneous();
                    $this->load->view('templates/header',$data);
                    $this->load->view('miscellaneous/'.$page, $data);
                    $this->load->view('templates/footer');
                }
            
                
            }
        }else{
            redirect(base_url());
        }

    }

    public function addJuniorhighMiscellaneous(){
        $this->Miscellaneous_model->addJuniorhighMiscellaneous();
        $this->session->set_flashdata('JuniorhighMiscellaneous_Added','The Miscellaneous has been Added');
        redirect('miscellaneous_juniorhigh');
    }

    public function updateJuniorhighMiscellaneous($miscID){
        $this->Miscellaneous_model->updateJuniorhighMiscellaneous($miscID);
        $this->session->set_flashdata('JuniorhighMiscellaneous_Updated','The Miscellaneous has been updated');
        redirect('miscellaneous_juniorhigh');
    }

    public function deleteJuniorhighMiscellaneous($miscID){
        $this->Miscellaneous_model->deleteJuniorhighMiscellaneous($miscID);
        $this->session->set_flashdata('JuniorhighMiscellaneous_Deleted','The Miscellaneous has been deleted');
        redirect('miscellaneous_juniorhigh');
    }




    // SENIOR HIGH MISC
    public function miscellaneous_seniorhigh(){
       
        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'miscellaneous_seniorhigh';
            if(!file_exists(APPPATH.'views/miscellaneous/'.$page.'.php')){
                show_404();
            }else{
                
                $data['title'] = "Miscellaneous Senior High";
                $keyword = $this->input->post('searchCourse');
                
                if (empty($keyword)){
                    $data['miscellaneousSeniorhigh'] = $this->Miscellaneous_model->viewSeniorhighMiscellaneous();
                    $this->load->view('templates/header',$data);
                    $this->load->view('miscellaneous/'.$page, $data);
                    $this->load->view('templates/footer');
                }else{
                    $data['miscellaneousSeniorhigh'] = $this->Miscellaneous_model->viewSeniorhighMiscellaneous();
                    $this->load->view('templates/header',$data);
                    $this->load->view('miscellaneous/'.$page, $data);
                    $this->load->view('templates/footer');
                }
            }
        }else{
            redirect(base_url());
        }

    }

    public function addSeniorhighMiscellaneous(){
        $this->Miscellaneous_model->addSeniorhighMiscellaneous();
        $this->session->set_flashdata('SeniorhighMiscellaneous_Added','The Miscellaneous has been Added');
        redirect('miscellaneous_seniorhigh');
    }

    public function updateSeniorhighMiscellaneous($miscID){
        $this->Miscellaneous_model->updateSeniorhighMiscellaneous($miscID);
        $this->session->set_flashdata('SeniorhighMiscellaneous_Updated','The Miscellaneous has been updated');
        redirect('miscellaneous_seniorhigh');
    }

    public function deleteSeniorhighMiscellaneous($miscID){
        $this->Miscellaneous_model->deleteSeniorhighMiscellaneous($miscID);
        $this->session->set_flashdata('SeniorhighMiscellaneous_Deleted','The Miscellaneous has been deleted');
        redirect('miscellaneous_seniorhigh');
    }







}
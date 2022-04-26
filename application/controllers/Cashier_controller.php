<?php
class Cashier_controller extends CI_Controller{


    public function cashierCollege(){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'cashier_college';
            if(!file_exists(APPPATH.'views/cashier/'.$page.'.php')){
                show_404();
            }else{
                    
                $data['title'] = "cashier College";

                $data['enrollStudents'] = $this->Cashier_model->viewassesdCollege();
                $this->load->view('templates/header',$data);
                $this->load->view('cashier/'.$page, $data);
                $this->load->view('templates/footer');
               
            }

        }else{
            redirect(base_url());
        }

    }

    public function enrollCollege($admissionID){

        $this->Cashier_model->enrollCollege($admissionID);
        $this->session->set_flashdata('Student_Enrolled','The student has been updated');
        redirect('cashier_college');

    }

    public function exportCollege(){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'export_college';
            if(!file_exists(APPPATH.'views/cashier/'.$page.'.php')){
                show_404();
            }else{
                    
                $data['title'] = "cashier College";

                $data['courses'] = $this->Cashier_model->courses();
                
                $this->load->view('templates/header',$data);
                $this->load->view('cashier/'.$page, $data);
                $this->load->view('templates/footer');
    
            }

        }else{
            redirect(base_url());
        }

    }








    //SENIOR HIGH
    public function cashierSeniorhigh(){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'cashier_seniorhigh';
            if(!file_exists(APPPATH.'views/cashier/'.$page.'.php')){
                show_404();
            }else{
                    
                $data['title'] = "Cashier Seniorhigh";

                $keyword = $this->input->post('txtsearch');
                
                
                $data['enrollStudents'] = $this->Cashier_model->viewassesdSeniorhigh();
                $this->load->view('templates/header',$data);
                $this->load->view('cashier/'.$page, $data);
                $this->load->view('templates/footer');
             
            
                
            }

        }else{
            redirect(base_url());
        }

    }

    public function enrollSeniorhigh($admissionID){

        $this->Cashier_model->enrollSeniorhigh($admissionID);
        $this->session->set_flashdata('Student_Enrolled','The student has been updated');
        redirect('cashier_seniorhigh');

    }














    //JUNIOR HIGH
    public function cashierJuniorhigh(){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'cashier_juniorhigh';
            if(!file_exists(APPPATH.'views/cashier/'.$page.'.php')){
                show_404();
            }else{
                    
                $data['title'] = "Cashier Juniorhigh";

                $keyword = $this->input->post('txtsearch');
                
                
                $data['enrollStudents'] = $this->Cashier_model->viewassesdJuniorhigh();
                $this->load->view('templates/header',$data);
                $this->load->view('cashier/'.$page, $data);
                $this->load->view('templates/footer');
              
                
            }

        }else{
            redirect(base_url());
        }

    }

    public function enrollJuniorhigh($admissionID){

        $this->Cashier_model->enrollJuniorhigh($admissionID);
        $this->session->set_flashdata('Student_Enrolled','The student has been updated');
        redirect('cashier_juniorhigh');

    }















    //GRADE SCHOOL
    public function cashierGradeschool(){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'cashier_gradeschool';
            if(!file_exists(APPPATH.'views/cashier/'.$page.'.php')){
                show_404();
            }else{
                    
                $data['title'] = "Cashier Gradeschool";

                $keyword = $this->input->post('txtsearch');
                
                
                $data['enrollStudents'] = $this->Cashier_model->viewassesdGradeschool();
                $this->load->view('templates/header',$data);
                $this->load->view('cashier/'.$page, $data);
                $this->load->view('templates/footer');
                
            }

        }else{
            redirect(base_url());
        }

    }

    public function enrollGradeschool($admissionID){

        $this->Cashier_model->enrollGradeschool($admissionID);
        $this->session->set_flashdata('Student_Enrolled','The student has been updated');
        redirect('cashier_gradeschool');

    }





}
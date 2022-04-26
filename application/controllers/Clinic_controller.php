<?php
class Clinic_controller extends CI_Controller{
    
    public function visitors(){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'visitors';
            if(!file_exists(APPPATH.'views/clinic/'.$page.'.php')){
                show_404();
            }else{
                    
                $data['title'] = "Visitors";

                $data['visitors'] = $this->Clinic_model->viewVisitors();
                $this->load->view('templates/header',$data);
                $this->load->view('clinic/'.$page, $data);
                $this->load->view('templates/footer');
            
            }

        }else{
            redirect(base_url());
        }

    }


    public function exportVisitors(){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'exportvisitors';
            if(!file_exists(APPPATH.'views/clinic/'.$page.'.php')){
                show_404();
            }else{
                    
                $data['visitors'] = $this->Clinic_model->exportVisitors();
                $this->load->view('clinic/'.$page, $data);
                
            }

        }else{
            redirect(base_url());
        }

    }

}
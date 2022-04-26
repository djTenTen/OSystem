<?php
class Dashboard_controller extends CI_Controller{

    public function dashboard(){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){
            $page = 'dashboard';
            if(!file_exists(APPPATH.'views/dashboard/'.$page.'.php')){
                show_404();
            }else{

                $data['title'] = "Dashboard"; 
                $this->load->view('templates/header',$data);
                $this->load->view('dashboard/'.$page, $data);
                $this->load->view('templates/footer');
                
            }
        }else{
            redirect(base_url());
        }

        

    }

}
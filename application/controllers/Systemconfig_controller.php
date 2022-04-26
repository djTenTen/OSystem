<?php
class Systemconfig_controller extends CI_Controller{

    public function SystemConfig(){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'systemconfig';
            if(!file_exists(APPPATH.'views/configuration/'.$page.'.php')){
                show_404();
            }else{
                
                $data['title'] = "System Config";

                // encoding
                $data['collegeEncoding'] = $this->Systemconfig_model->checkEncodingC();
                $data['seniorhighEncoding'] = $this->Systemconfig_model->checkEncodingS();
                $data['juniorhighEncoding'] = $this->Systemconfig_model->checkEncodingJ();
                $data['gradeschoolEncoding'] = $this->Systemconfig_model->checkEncodingG();

                // releasing
                $data['collegeReleasing'] = $this->Systemconfig_model->checkReleasingC();
                $data['seniorhighReleasing'] = $this->Systemconfig_model->checkReleasingS();
                $data['juniorhighReleasing'] = $this->Systemconfig_model->checkReleasingJ();
                $data['gradeschoolReleasing'] = $this->Systemconfig_model->checkReleasingG();

                $this->load->view('templates/header',$data);
                $this->load->view('configuration/'.$page, $data);
                $this->load->view('templates/footer');
                
            }


        }else{
            redirect(base_url());
        }


    }


}
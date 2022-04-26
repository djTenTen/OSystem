<?php
class Multimedia_controller extends CI_Controller{


    public function requestAlumniID(){
        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'requestalumniid';
            if(!file_exists(APPPATH.'views/multimedia/'.$page.'.php')){
                show_404();
            }else{
                
                $data['title'] = "Request Alumni ID";
                $keyword = $this->input->post('search');
                
                if (empty($keyword)){
                    $data['requests'] = $this->Multimedia_model->viewRequest();
                    $this->load->view('templates/header',$data);
                    $this->load->view('multimedia/'.$page, $data);
                    $this->load->view('templates/footer');
                }else{
                    $data['requests'] = $this->Multimedia_model->viewRequestSearch($keyword);
                    $this->load->view('templates/header',$data);
                    $this->load->view('multimedia/'.$page, $data);
                    $this->load->view('templates/footer');
                }   
            }
        }else{
            redirect(base_url());
        }
    }


    public function markforPickup($ID){
        $this->Multimedia_model->markforPickup($ID);
        $this->session->set_flashdata('forpickup','The User has been added');
        redirect('request');
    }

    public function markDone($ID){
        $this->Multimedia_model->markDone($ID);
        $this->session->set_flashdata('markdone','The User has been added');
        redirect('request');
    }


    public function deleteRequest($ID){
        $this->Multimedia_model->deleteRequest($ID);
        $this->session->set_flashdata('Deleted','The User has been added');
        redirect('request');
    }




    








    











}
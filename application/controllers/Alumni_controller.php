<?php
class Alumni_controller extends CI_Controller{
    
    public function alumni(){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'alumni';
            if(!file_exists(APPPATH.'views/alumni/'.$page.'.php')){
                show_404();
            }else{
                 
                $data['title'] = "Alumni";
                $data['alumni'] = $this->Alumni_model->viewAlumni();
                $this->load->view('templates/header',$data);
                $this->load->view('alumni/'.$page, $data);
                $this->load->view('templates/footer');
            
            }
        }else{
            redirect(base_url());
        }
    }


    public function updateAlumni($ID){
        $this->Alumni_model->updateAlumni($ID);
        $this->session->set_flashdata('updated','The User has been added');
        redirect('alumni');
    }

    public function validateAlumni($ID){
        $this->Alumni_model->validateAlumni($ID);
        $this->session->set_flashdata('validated','The User has been added');
        redirect('alumni');
    }

    public function deleteAlumni($ID){
        $this->Alumni_model->deleteAlumni($ID);
        $this->session->set_flashdata('deleted','The User has been added');
        redirect('alumni');
    }



    


    


    

}
<?php
class Meeting_controller extends CI_Controller{

    public function Meeting(){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'president';
            if(!file_exists(APPPATH.'views/president/'.$page.'.php')){
                show_404();
            }else{
                
                $data['title'] = "Office of the President";

                $keyword = $this->input->post('searchmeeting');
                
                if (empty($keyword)){
                    $data['meetings'] = $this->Meeting_model->viewMeetings();

                    $this->load->view('templates/header',$data);
                    $this->load->view('president/'.$page, $data);
                    $this->load->view('templates/footer');
                }else{
                    $data['meetings'] = $this->Meeting_model->viewMeetingsSearch($keyword);
                    
                    $this->load->view('templates/header',$data);
                    $this->load->view('president/'.$page, $data);
                    $this->load->view('templates/footer');
                }
                
            }
        }else{
            redirect(base_url());
        }

    }

    public function addMeeting(){
        
        $this->Meeting_model->saveMeeting();
        $this->session->set_flashdata('Meeting_Added','The Miscellaneous has been Added');
        redirect('meetings');

    }

    public function updateMeeting($meetingID){
        
        $this->Meeting_model->updateMeeting($meetingID);
        $this->session->set_flashdata('Meeting_Updated','The Miscellaneous has been Added');
        redirect('meetings');
        
    }


    public function deleteMeeting($meetingID){
        
        $this->Meeting_model->deleteMeeting($meetingID);
        $this->session->set_flashdata('Meeting_Deleted','The Miscellaneous has been Added');
        redirect('meetings');
        
    }


    




}
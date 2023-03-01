<?php
class MIS_controller extends CI_Controller{

    public function transactionLogs(){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'mistransactionlogs';
            if(!file_exists(APPPATH.'views/mis/'.$page.'.php')){
                show_404();
            }else{
                
                $data['title'] = "MIS Transaction Logs";

                $keyword = $this->input->post('searchmeeting');
                
                if (empty($keyword)){
                    $data['logs'] = $this->MIS_model->viewLogs();

                    $this->load->view('templates/header',$data);
                    $this->load->view('mis/'.$page, $data);
                    $this->load->view('templates/footer');
                }else{
                    $data['logs'] = $this->MIS_model->viewLogs();
                    
                    $this->load->view('templates/header',$data);
                    $this->load->view('mis/'.$page, $data);
                    $this->load->view('templates/footer');
                }
                
            }

        }else{
            redirect(base_url());
        }

    }



    public function transactionForms(){

        $page = 'mistransactionforms';

        if(!file_exists(APPPATH.'views/mis/'.$page.'.php')){
            show_404();
        }else{
            
            $data['title'] = "MIS Transaction Form";
            $this->load->view('mis/'.$page, $data);
        
        }

    }


    public function insertRequest(){
        $this->MIS_model->insertRequest();
        $this->session->set_flashdata('added','The Miscellaneous has been Added');
        redirect('mistransactionforms');
    }




    public function collegestudents(){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'college';
            if(!file_exists(APPPATH.'views/mis/'.$page.'.php')){
                show_404();
            }else{
                
                $data['title'] = "College Resettings";

                $keyword = $this->input->post('searchcollege');
                
                if (empty($keyword)){
                    $data['studentsCollege'] = $this->MIS_model->CollegeStudents();
                    $this->load->view('templates/header',$data);
                    $this->load->view('mis/'.$page, $data);
                    $this->load->view('templates/footer');
                }else{
                    $data['studentsCollege'] = $this->MIS_model->CollegeStudentsSearch($keyword);
                    $this->load->view('templates/header',$data);
                    $this->load->view('mis/'.$page, $data);
                    $this->load->view('templates/footer');
                }
                
            }

        }else{
            redirect(base_url());
        }

    }


    public function resetCollege($admissionID){
        $this->MIS_model->resetCollege($admissionID);
        $this->session->set_flashdata('resetted','The Miscellaneous has been Added');
        redirect('collegereset');
    }










    public function shsstudents(){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'seniorhigh';
            if(!file_exists(APPPATH.'views/mis/'.$page.'.php')){
                show_404();
            }else{
                
                $data['title'] = "Senior High Resettings";

                $keyword = $this->input->post('searchcollege');
                
                if (empty($keyword)){
                    $data['studentsCollege'] = $this->MIS_model->seniorhighStudents();
                    $this->load->view('templates/header',$data);
                    $this->load->view('mis/'.$page, $data);
                    $this->load->view('templates/footer');
                }else{
                    $data['studentsCollege'] = $this->MIS_model->seniorhighStudentsSearch($keyword);
                    $this->load->view('templates/header',$data);
                    $this->load->view('mis/'.$page, $data);
                    $this->load->view('templates/footer');
                }
                
            }

        }else{
            redirect(base_url());
        }

    }


    public function resetSeniorhigh($admissionID){
        $this->MIS_model->resetSeniorhigh($admissionID);
        $this->session->set_flashdata('resetted','The Miscellaneous has been Added');
        redirect('shsreset');
    }
















    public function jhsstudents(){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'juniorhigh';
            if(!file_exists(APPPATH.'views/mis/'.$page.'.php')){
                show_404();
            }else{
                
                $data['title'] = "Junior High Resettings";

                $keyword = $this->input->post('searchcollege');
                
                if (empty($keyword)){
                    $data['studentsCollege'] = $this->MIS_model->juniorhighStudents();
                    $this->load->view('templates/header',$data);
                    $this->load->view('mis/'.$page, $data);
                    $this->load->view('templates/footer');
                }else{
                    $data['studentsCollege'] = $this->MIS_model->juniorhighStudentsSearch($keyword);
                    $this->load->view('templates/header',$data);
                    $this->load->view('mis/'.$page, $data);
                    $this->load->view('templates/footer');
                }
                
            }

        }else{
            redirect(base_url());
        }

    }


    public function resetJuniorhigh($admissionID){
        $this->MIS_model->resetJuniorhigh($admissionID);
        $this->session->set_flashdata('resetted','The Miscellaneous has been Added');
        redirect('jhsreset');
    }

















    public function seviceRequestForm(){

        $data['title'] = "Sevice Request Form";

        $page = "service";
        $this->load->view('mis/'.$page, $data);

    }


    public function seviceRequestList(){

        $data['title'] = "Sevice Request List";

        $page = "service_request";

        $data['request'] = $this->MIS_model->getServiceRequest();
        $this->load->view('mis/'.$page, $data);

    }



    public function sendRequestForm(){

        $this->MIS_model->sendRequestForm();
        $this->session->set_flashdata('requestsent','requestsent');
        redirect('sevicerequestform');

    }





    














    

}
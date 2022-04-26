<?php
class POD_controller extends CI_Controller{


    //College
    public function collegestudents(){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'collegestudents';
            if(!file_exists(APPPATH.'views/pod/'.$page.'.php')){
                show_404();
            }else{
                
                $data['title'] = "College Students";
                $keyword = $this->input->post('search');
                
                if (empty($keyword)){
                    $data['students'] = $this->POD_model->viewcollgestudents();
                    $this->load->view('templates/header',$data);
                    $this->load->view('pod/'.$page, $data);
                    $this->load->view('templates/footer');
                }else{
                    $data['students'] = $this->POD_model->viewcollgestudentsSearch($keyword);
                    $this->load->view('templates/header',$data);
                    $this->load->view('pod/'.$page, $data);
                    $this->load->view('templates/footer');
                }  

            }
        }else{
            redirect(base_url());
        }

    }



    public function ViewstudentsinfoCollege($admissionID){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'collegestudentsinfocases';
            if(!file_exists(APPPATH.'views/pod/'.$page.'.php')){
                show_404();
            }else{
                
                $data['title'] = "College Students";
                $data['info'] = $this->POD_model->getinformationCollege($admissionID);

                $this->load->view('templates/header',$data);
                $this->load->view('pod/'.$page, $data);
                $this->load->view('templates/footer');

            }
        }else{
            redirect(base_url());
        }

    }


    public function addOffense($admissionID){

        $this->POD_model->saveOffenses($admissionID,"College");
        $this->session->set_flashdata('offenseadded','The User has been added');

        redirect('infostudentcollege/'.$admissionID);

    }


    public function caseClosed($offenseID,$admissionID){

        $this->POD_model->caseClosed($offenseID,"College");
        $this->session->set_flashdata('offenseclosed','The User has been added');
        redirect('infostudentcollege/'.$admissionID);

    }

    public function uploadPDF($offenseID,$admissionID){

        $this->POD_model->uploadPDF($offenseID);
        $this->session->set_flashdata('pdfuploaded','The User has been added');
        redirect('infostudentcollege/'.$admissionID);

    }

    public function deleteOffense($offenseID,$admissionID){

        $this->POD_model->deleteOffense($offenseID,"College");
        $this->session->set_flashdata('offensedeleted','The User has been added');
        redirect('infostudentcollege/'.$admissionID);

    }















    //Seniorhigh 
    public function seniorhighstudents(){
        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'seniorhighstudents';
            if(!file_exists(APPPATH.'views/pod/'.$page.'.php')){
                show_404();
            }else{
                
                $data['title'] = "Senior High Students";
                $keyword = $this->input->post('search');
                
                if (empty($keyword)){
                    $data['students'] = $this->POD_model->viewseniorhighstudents();
                    $this->load->view('templates/header',$data);
                    $this->load->view('pod/'.$page, $data);
                    $this->load->view('templates/footer');
                }else{
                    $data['students'] = $this->POD_model->viewseniorhighstudentsSearch($keyword);
                    $this->load->view('templates/header',$data);
                    $this->load->view('pod/'.$page, $data);
                    $this->load->view('templates/footer');
                }  

            }
        }else{
            redirect(base_url());
        }
    }


    public function ViewstudentsinfoSeniorhigh($admissionID){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'seniorhighstudentsinfocases';
            if(!file_exists(APPPATH.'views/pod/'.$page.'.php')){
                show_404();
            }else{
                
                $data['title'] = "College Students";
                $data['info'] = $this->POD_model->getinformationSeniorhigh($admissionID);

                $this->load->view('templates/header',$data);
                $this->load->view('pod/'.$page, $data);
                $this->load->view('templates/footer');

            }
        }else{
            redirect(base_url());
        }

    }



    public function addOffenseshs($admissionID){

        $this->POD_model->saveOffenses($admissionID,"Seniorhigh");
        $this->session->set_flashdata('offenseadded','The User has been added');

        redirect('infostudentseniorhigh/'.$admissionID);

    }


    public function caseClosedshs($offenseID,$admissionID){

        $this->POD_model->caseClosed($offenseID,"Seniorhigh");
        $this->session->set_flashdata('offenseclosed','The User has been added');
        redirect('infostudentseniorhigh/'.$admissionID);

    }

    public function deleteoffenseshs($offenseID,$admissionID){

        $this->POD_model->deleteOffense($offenseID,"Seniorhigh");
        $this->session->set_flashdata('offensedeleted','The User has been added');
        redirect('infostudentseniorhigh/'.$admissionID);

    }


























    //JHS
    public function juniorhighstudents(){
        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'juniorhighstudents';
            if(!file_exists(APPPATH.'views/pod/'.$page.'.php')){
                show_404();
            }else{
                
                $data['title'] = "Junior High Students";
                $keyword = $this->input->post('search');
                
                if (empty($keyword)){
                    $data['students'] = $this->POD_model->viewjuniorhighstudents();
                    $this->load->view('templates/header',$data);
                    $this->load->view('pod/'.$page, $data);
                    $this->load->view('templates/footer');
                }else{
                    $data['students'] = $this->POD_model->viewjuniorhighstudentsSearch($keyword);
                    $this->load->view('templates/header',$data);
                    $this->load->view('pod/'.$page, $data);
                    $this->load->view('templates/footer');
                }  

            }
        }else{
            redirect(base_url());
        }
    }


    public function ViewstudentsinfoJuniorhigh($admissionID){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'juniorhighstudentsinfocases';
            if(!file_exists(APPPATH.'views/pod/'.$page.'.php')){
                show_404();
            }else{
                
                $data['title'] = "College Students";
                $data['info'] = $this->POD_model->getinformationJuniorhigh($admissionID);

                $this->load->view('templates/header',$data);
                $this->load->view('pod/'.$page, $data);
                $this->load->view('templates/footer');

            }
        }else{
            redirect(base_url());
        }

    }



    public function addOffensejhs($admissionID){

        $this->POD_model->saveOffenses($admissionID,"Juniorhigh");
        $this->session->set_flashdata('offenseadded','The User has been added');

        redirect('infostudentjuniorhigh/'.$admissionID);

    }

    public function caseClosedjhs($offenseID,$admissionID){

        $this->POD_model->caseClosed($offenseID,"Juniorhigh");
        $this->session->set_flashdata('offenseclosed','The User has been added');
        redirect('infostudentjuniorhigh/'.$admissionID);

    }

    public function deleteoffensejhs($offenseID,$admissionID){

        $this->POD_model->deleteOffense($offenseID,"Juniorhigh");
        $this->session->set_flashdata('offensedeleted','The User has been added');
        redirect('infostudentjuniorhigh/'.$admissionID);

    }






















    //GS
    public function gradeschoolstudents(){
        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'gradeschoolstudents';
            if(!file_exists(APPPATH.'views/pod/'.$page.'.php')){
                show_404();
            }else{
                
                $data['title'] = "Junior High Students";
                $keyword = $this->input->post('search');
                
                if (empty($keyword)){
                    $data['students'] = $this->POD_model->viewgradeschoolstudents();
                    $this->load->view('templates/header',$data);
                    $this->load->view('pod/'.$page, $data);
                    $this->load->view('templates/footer');
                }else{
                    $data['students'] = $this->POD_model->viewgradeschoolstudentsSearch($keyword);
                    $this->load->view('templates/header',$data);
                    $this->load->view('pod/'.$page, $data);
                    $this->load->view('templates/footer');
                }  

            }
        }else{
            redirect(base_url());
        }
    }


    public function ViewstudentsinfoGradeschool($admissionID){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'gradeschoolstudentsinfocases';
            if(!file_exists(APPPATH.'views/pod/'.$page.'.php')){
                show_404();
            }else{
                
                $data['title'] = "College Students";
                $data['info'] = $this->POD_model->getinformationGradeschool($admissionID);

                $this->load->view('templates/header',$data);
                $this->load->view('pod/'.$page, $data);
                $this->load->view('templates/footer');

            }
        }else{
            redirect(base_url());
        }

    }



    public function addOffensegs($admissionID){

        $this->POD_model->saveOffenses($admissionID,"Gradeschool");
        $this->session->set_flashdata('offenseadded','The User has been added');

        redirect('infostudentgradeschool/'.$admissionID);

    }

    public function caseClosedgs($offenseID,$admissionID){

        $this->POD_model->caseClosed($offenseID,"Gradeschool");
        $this->session->set_flashdata('offenseclosed','The User has been added');
        redirect('infostudentgradeschool/'.$admissionID);

    }

    public function deleteoffensegs($offenseID,$admissionID){

        $this->POD_model->deleteOffense($offenseID,"Gradeschool");
        $this->session->set_flashdata('offensedeleted','The User has been added');
        redirect('infostudentgradeschool/'.$admissionID);

    }



    
    
    


    


    


}
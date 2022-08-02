<?php
class Users_controller extends CI_Controller{

    public function users(){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'users';
            if(!file_exists(APPPATH.'views/users/'.$page.'.php')){
                show_404();
            } else{
                $data['title'] = "Users Management";

                $keyword = $this->input->post('searchUser');
                
                if(empty($keyword)){
                    $data['users'] = $this->Users_model->viewUsers();
                    $data['positions'] = $this->Users_model->viewPositions();
                    $this->load->view('templates/header',$data);
                    $this->load->view('users/'.$page, $data);
                    $this->load->view('templates/footer');
                }else{
                    $data['users'] = $this->Users_model->searchUsers($keyword);
                    $data['positions'] = $this->Users_model->viewPositions();
                    $this->load->view('templates/header',$data);
                    $this->load->view('users/'.$page, $data);
                    $this->load->view('templates/footer');
                }

            }

            
        }else{
            redirect(base_url());
        }

            
    
    }

    public function addUser(){

        $this->Users_model->insertUser();
        $this->session->set_flashdata('User_Added','The User has been added');
        redirect('users');
    
    }

    public function updateUser($userID){

        $this->Users_model->updateUser($userID);
        $this->session->set_flashdata('User_Update','The User has been updated');
        redirect('users');
        //echo "update user";
    
    }

    public function deleteUser($userID){
        $this->Users_model->deleteUser($userID);
        $this->session->set_flashdata('User_Delete','The User has been Deleted');
        redirect('users');
        //echo "update user";
    }


    
    public function getuserInfo($userID){


        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'accountsetting';
            if(!file_exists(APPPATH.'views/users/'.$page.'.php')){
                show_404();
            }else{
                $data['title'] = "Account Setting";
                $data['userinfo'] = $this->Users_model->getUserInfo($userID);
                $data['ln'] = $data['userinfo']['LastName'];
                $data['fn'] = $data['userinfo']['FirstName'];
                $data['mn'] = $data['userinfo']['MiddleName'];
                $data['un'] = $data['userinfo']['Username'];
                $data['pss'] = $data['userinfo']['Password'];

                $data['positions'] = $this->Users_model->viewPositions();
                $this->load->view('templates/header',$data);
                $this->load->view('users/'.$page, $data);
                $this->load->view('templates/footer');
            }
        }else{
            redirect(base_url());
        }


        // $this->Users_model->getUserInfo($userID);
        // $this->session->set_flashdata('User_Delete','The User has been Deleted');
        // redirect('users');
    }


    public function accountsettingsupdate($userID){



        $len = strlen($this->input->post('password'));
        if($len > 7){
            $this->Users_model->accountsettingsupdate($userID);
            redirect('logout');
        }else{
            $this->session->set_flashdata('userDenied','The User has been updated');
            redirect('accountsetting/'.$userID);
        };


        

    }

    

    public function selectdpt(){

        $page = 'dpt';
        if(!file_exists(APPPATH.'views/users/'.$page.'.php')){
            show_404();
        } else{
            $data['title'] = "Select Department";
            $this->load->view('users/'.$page, $data);
        }
        
    }


    public function signupcollege(){

        $page = 'signupcollege';
        if(!file_exists(APPPATH.'views/users/'.$page.'.php')){
            show_404();
        } else{
            $data['title'] = "Sign-up";

            $data['course'] = $this->Users_model->getcourse();
            $this->load->view('users/'.$page, $data);
        
        }
        
    }

    public function signupshs(){

        $page = 'signup';
        if(!file_exists(APPPATH.'views/users/'.$page.'.php')){
            show_404();
        } else{
            $data['title'] = "Sign-up";
            $this->load->view('users/'.$page, $data);
        
        }
        
    }

    public function signupjhs(){

        $page = 'signup';
        if(!file_exists(APPPATH.'views/users/'.$page.'.php')){
            show_404();
        } else{
            $data['title'] = "Sign-up";
            $this->load->view('users/'.$page, $data);
        
        }
        
    }


    public function signupgs(){

        $page = 'signup';
        if(!file_exists(APPPATH.'views/users/'.$page.'.php')){
            show_404();
        } else{
            $data['title'] = "Sign-up";
            $this->load->view('users/'.$page, $data);
        
        }
        
    }
    




}
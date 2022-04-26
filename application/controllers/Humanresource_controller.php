<?php
class Humanresource_controller extends CI_Controller{

    public function employees(){


        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'employees';
            if(!file_exists(APPPATH.'views/humanresource/'.$page.'.php')){
                show_404();
            }else{

                $data['title'] = "Employee Management"; 

                $keyword = $this->input->post('searchUser');
                
                if (empty($keyword)){
                    $data['employees'] = $this->Humanresource_model->viewEmployees();
                    $this->load->view('templates/header',$data);
                    $this->load->view('humanresource/'.$page, $data);
                    $this->load->view('templates/footer');
                }else{
                    $data['employees'] = $this->Humanresource_model->viewEmployeesSearch($keyword);
                    $this->load->view('templates/header',$data);
                    $this->load->view('humanresource/'.$page, $data);
                    $this->load->view('templates/footer');
                }
  
            }
        }else{
            redirect(base_url());
        }

        

    }

    public function addEmployee(){

        $this->Humanresource_model->insertEmployee();
        $this->session->set_flashdata('Employee_Added','The User has been added');
        redirect('employees');
    
    }


    public function updateEmployee($empID){

        $this->Humanresource_model->updateEmployee($empID);
        $this->session->set_flashdata('Employee_Updated','The User has been added');
        redirect('employees');
    
    }

    public function deleteEmployee($empID){

        $this->Humanresource_model->deleteEmployee($empID);
        $this->session->set_flashdata('Employee_Deleted','The User has been added');
        redirect('employees');
    
    }



    public function viewAttendance(){
        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'attendance';
            if(!file_exists(APPPATH.'views/humanresource/'.$page.'.php')){
                show_404();
            }else{

                $data['title'] = "Employee Attendance"; 

                $keyword = $this->input->post('viewattendance');
                if (empty($keyword)){
                    //$data['employees'] = $this->Humanresource_model->viewEmployeeAttendance();
                    $data['attendance'] = array(array(
                        "Name" => '',
                        "Position" => '',
                        "DateIN" => '',
                        "TimeIN" => '',
                        "DateOUT" => '',
                        "TimeOUT" => '',
                        "DurationH" => '',
                        "DurationM" => '',
                        "Remarks" => '',
                    ));

                    $this->load->view('templates/header',$data);
                    $this->load->view('humanresource/'.$page, $data);
                    $this->load->view('templates/footer');
                }else{
                    $data['attendance'] = $this->Humanresource_model->viewEmployeeAttendance();
                    $this->load->view('templates/header',$data);
                    $this->load->view('humanresource/'.$page, $data);
                    $this->load->view('templates/footer');
                }
                // }elseif($keyword == 'exportattendance'){

                //     $data['t'] = $keyword;
                //     $this->load->view('templates/header',$data);
                //     $this->load->view('humanresource/'.$page, $data);
                //     $this->load->view('templates/footer');

                //     // $data['dpt'] = $this->input->post('dpt');
                //     // $data['from']= $this->input->post('mm').'/'.$this->input->post('dd').'/'.$this->input->post('yy');
                //     // $data['to'] =   $this->input->post('mm2').'/'.$this->input->post('dd2').'/'.$this->input->post('yy2');

                //     // $page = 'exportattendance';
                //     // $data['attendance'] = $this->Humanresource_model->viewEmployeeAttendance();
                //     // $this->load->view('humanresource/'.$page, $data);

                // }
  
            }
        }else{
            redirect(base_url());
        }
    }

    public function exportAttendance(){
        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            
            $data['dpt'] = $_SESSION['dpt'];
            $data['from']= $_SESSION['from'];
            $data['to'] = $_SESSION['to'];

            $page = 'exportattendance';
            if(!file_exists(APPPATH.'views/humanresource/'.$page.'.php')){
                show_404();
            }else{

                $data['attendance'] = $this->Humanresource_model->exportAttendance();
                $this->load->view('humanresource/'.$page, $data);
                    
            }
        }else{
            redirect(base_url());
        }
    }
    
    
}
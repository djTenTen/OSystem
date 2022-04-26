<?php
class Courses_controller extends CI_Controller{

    public function courses(){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'courses';
            if(!file_exists(APPPATH.'views/courses/'.$page.'.php')){
                show_404();
            }else{
                    
                $data['title'] = "Course Management";

                $keyword = $this->input->post('searchCourse');
                
                if (empty($keyword)){
                    $data['courses'] = $this->Courses_model->viewCourses();
                    $this->load->view('templates/header',$data);
                    $this->load->view('courses/'.$page, $data);
                    $this->load->view('templates/footer');
                }else{
                    $data['courses'] = $this->Courses_model->searchCourse($keyword);
                    $this->load->view('templates/header',$data);
                    $this->load->view('courses/'.$page, $data);
                    $this->load->view('templates/footer');
                }
            
                
            }
        }else{
            redirect(base_url());
        }

    }

    public function addCourse(){

        $this->Courses_model->insertCourse();
        $this->session->set_flashdata('Course_Added','The User has been added');
        redirect('courses');
    
    }

    public function updateCourse($courseID){

        $this->Courses_model->updateCourse($courseID);
        $this->session->set_flashdata('Course_Update','The User has been updated');
        redirect('courses');
    
    }

    public function deleteCourse($userID){
        $this->Courses_model->deleteCourse($userID);
        $this->session->set_flashdata('Course_Delete','The User has been Deleted');
        redirect('courses');

    }


}
<?php
class Deans_controller extends CI_Controller{

    public function classlist(){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'classlist';
            if(!file_exists(APPPATH.'views/progchair/'.$page.'.php')){
                show_404();
            }else{

                $data['classlist'] = $this->Deans_model->showClassList();
                $data['title'] = "Class List - College"; 
                $this->load->view('templates/header',$data);
                $this->load->view('progchair/'.$page, $data);
                $this->load->view('templates/footer');
            }
        }else{
            redirect(base_url());
        }
    }



    public function exportClasslistCollege($curriculumID,$subjectID,$sched,$Course,$Section,$Year){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'collegeclasslist';
            if(!file_exists(APPPATH.'views/reports/'.$page.'.php')){
                show_404();
            }else{

                $data['subject'] = $sched;
                $data['course'] = $Course;
                $data['section'] = $Section;
                $data['year'] = $Year;
                
                $data['collegeclasslist'] = $this->Deans_model->exportClassListCollege($curriculumID,$subjectID);
                
                $this->load->view('reports/'.$page, $data);
    
            }
        }else{
            redirect(base_url());
        }
    }


}
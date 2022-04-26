<?php
class Curriculum_controller extends CI_Controller{

    //COLLEGE CURRICULUM
    public function collegeCurriculum(){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'curriculum_college';
            if(!file_exists(APPPATH.'views/curriculum/'.$page.'.php')){
                show_404();
            }else{
                
                $data['title'] = "Curriculum Management - College";

                $keyword = $this->input->post('searchCurriculum');
                
                if (empty($keyword)){
                    $data['subjectCollege'] = $this->Curriculum_model->viewCollegeSubjects();
                    $data['subjectCollegeTemp'] = $this->Curriculum_model->viewCollegeTempSubjects();
                    $data['courses'] = $this->Curriculum_model->viewCourses();
                    $data['curriculumCollege'] = $this->Curriculum_model->viewCollegeCurriculum();          
                    $this->load->view('templates/header',$data);
                    $this->load->view('curriculum/'.$page, $data);
                    $this->load->view('templates/footer');
                }else{
                    $data['subjectCollege'] = $this->Curriculum_model->viewCollegeSubjects();
                    $data['subjectCollegeTemp'] = $this->Curriculum_model->viewCollegeTempSubjects();
                    $data['courses'] = $this->Curriculum_model->viewCourses();
                    $data['curriculumCollege'] = $this->Curriculum_model->searchCollegeCurriculum($keyword);  
                    $this->load->view('templates/header',$data);
                    $this->load->view('curriculum/'.$page, $data);
                    $this->load->view('templates/footer');
                }
            
                
            }
        }else{
            redirect(base_url());
        }
    }

    public function addCurriculumSubjectsCollege(){

        $this->Curriculum_model->addCurriculumSubjectsCollege();
        $this->session->set_flashdata('CollegeSubject_Added','The Subject has been added');
        redirect('curriculum_college');
    
    }

    public function removeTempSubjectCollege($subjectID){

        $this->Curriculum_model->removeTempSubjectCollege($subjectID);
        $this->session->set_flashdata('CollegeSubject_Deleted','The Subject has been removed');
        redirect('curriculum_college');
    
    }

    public function addCurriculumCollege(){

        $this->Curriculum_model->addCurriculumCollege();
        $this->session->set_flashdata('Curriculum_Added','The Curriculum has been set');
        redirect('curriculum_college');
    
    }
    
    public function deleteCurriculumCollege($curriculumID){

        $this->Curriculum_model->deleteCurriculumCollege($curriculumID);
        $this->session->set_flashdata('Curriculum_Deleted','The Curriculum has been Deleted');
        redirect('curriculum_college');

    }


    //Editing of Curriculum College
    public function curriculumCollege($curriculumID,$Coursecode,$section){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'editcurriculumcollege';
            if(!file_exists(APPPATH.'views/curriculum/'.$page.'.php')){
                show_404();
            }else{
                
                $data['title'] = "Curriculum Management - ".$Coursecode;
                $data['course'] = $Coursecode.'  '.$section;
                $data['curriID'] = $curriculumID;
                $_SESSION['coursecode'] = $Coursecode;
                $_SESSION['section'] = $section;
                
                $data['subjectCollege'] = $this->Curriculum_model->viewCollegeSubjects();
                $data['currisubjects'] = $this->Curriculum_model->viewcurriculumSubjectCollege($curriculumID);          
                $this->load->view('templates/header',$data);
                $this->load->view('curriculum/'.$page, $data);
                $this->load->view('templates/footer');
               
                
            }
        }else{
            redirect(base_url());
        }
    }

    public function addsubjectCurriculumCollege($curriculumID){

        $this->Curriculum_model->addsubjectCurriculumCollege($curriculumID);
        $this->session->set_flashdata('CollegeSubjectadded','The Subject has been removed');
        redirect('curriculumCollege/'.$curriculumID.'/'.$_SESSION['coursecode'].'/'.$_SESSION['section']);

    }

    public function deleteSubjectCurriculum($curriculumID,$csubjectID){

        $this->Curriculum_model->deleteSubjectCurriculum($csubjectID);
        $this->session->set_flashdata('CollegeSubjectdeleted','The Subject has been removed');
        redirect('curriculumCollege/'.$curriculumID.'/'.$_SESSION['coursecode'].'/'.$_SESSION['section']);

    }


    








    








    //SENIOR HIGH CURRICULUM
    public function seniorhighCurriculum(){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'curriculum_seniorhigh';
            if(!file_exists(APPPATH.'views/curriculum/'.$page.'.php')){
                show_404();
            }else{
                
                $data['title'] = "Curriculum Management - Senior High";

                $keyword = $this->input->post('searchCurriculum');
                
                if (empty($keyword)){
                    $data['subjectseniorhigh'] = $this->Curriculum_model->viewseniorhighSubjects();
                    $data['subjectCollegeTemp'] = $this->Curriculum_model->viewSeniorhighTempSubjects();
                    $data['sections'] = $this->Curriculum_model->viewSeniorhighSections();
                    $data['curriculumSeniorhigh'] = $this->Curriculum_model->viewSeniorhighCurriculum();          
                    $this->load->view('templates/header',$data);
                    $this->load->view('curriculum/'.$page, $data);
                    $this->load->view('templates/footer');
                }else{
                    $data['subjectCollege'] = $this->Curriculum_model->viewCollegeSubjects();
                    $data['subjectCollegeTemp'] = $this->Curriculum_model->viewSeniorhighTempSubjects();
                    $data['sections'] = $this->Curriculum_model->viewSeniorhighSections();
                    $data['curriculumSeniorhigh'] = $this->Curriculum_model->searchSeniorhighCurriculum($keyword);  
                    $this->load->view('templates/header',$data);
                    $this->load->view('curriculum/'.$page, $data);
                    $this->load->view('templates/footer');
                }
            
                
            }
        }else{
            redirect(base_url());
        }
    }

    public function addCurriculumSubjectsSeniorhigh(){

        $this->Curriculum_model->addCurriculumSubjectsSeniorhigh();
        $this->session->set_flashdata('CollegeSubject_Added','The Subject has been added');
        redirect('curriculum_seniorhigh');
    
    }

    public function removeTempSubjectSeniorhigh($subjectID){

        $this->Curriculum_model->removeTempSubjectSeniorhigh($subjectID);
        $this->session->set_flashdata('CollegeSubject_Deleted','The Subject has been removed');
        redirect('curriculum_seniorhigh');
    
    }

    public function addCurriculumSeniorhigh(){

        $this->Curriculum_model->addCurriculumSeniorhigh();
        $this->session->set_flashdata('Curriculum_Added','The Curriculum has been set');
        redirect('curriculum_seniorhigh');
    
    }
























    //JUNIOR HIGH CURRICULUM
    public function juniorhighCurriculum(){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'curriculum_juniorhigh';
            if(!file_exists(APPPATH.'views/curriculum/'.$page.'.php')){
                show_404();
            }else{
                
                $data['title'] = "Curriculum Management - Junior High";

                $keyword = $this->input->post('searchCurriculum');
                
                if (empty($keyword)){
                    $data['subjectjuniorhigh'] = $this->Curriculum_model->viewjuniorhighSubjects();
                    $data['subjectCollegeTemp'] = $this->Curriculum_model->viewJuniorhighTempSubjects();
                    $data['sections'] = $this->Curriculum_model->viewJuniorhighSections();
                    $data['curriculumSeniorhigh'] = $this->Curriculum_model->viewJuniorhighCurriculum();          
                    $this->load->view('templates/header',$data);
                    $this->load->view('curriculum/'.$page, $data);
                    $this->load->view('templates/footer');
                }else{
                    $data['subjectjuniorhigh'] = $this->Curriculum_model->viewjuniorhighSubjects();
                    $data['subjectCollegeTemp'] = $this->Curriculum_model->viewJuniorhighTempSubjects();
                    $data['sections'] = $this->Curriculum_model->viewJuniorhighSections();
                    $data['curriculumSeniorhigh'] = $this->Curriculum_model->searchJuniorhighCurriculum($keyword);  
                    $this->load->view('templates/header',$data);
                    $this->load->view('curriculum/'.$page, $data);
                    $this->load->view('templates/footer');
                }
            
                
            }
        }else{
            redirect(base_url());
        }
    }



    public function addCurriculumSubjectsJuniorhigh(){

        $this->Curriculum_model->addCurriculumSubjectsJuniorhigh();
        $this->session->set_flashdata('CollegeSubject_Added','The Subject has been added');
        redirect('curriculum_juniorhigh');
    
    }


    public function removeTempSubjectJuniorhigh($subjectID){

        $this->Curriculum_model->removeTempSubjectJuniorhigh($subjectID);
        $this->session->set_flashdata('CollegeSubject_Deleted','The Subject has been removed');
        redirect('curriculum_juniorhigh');
    
    }


    public function addCurriculumJuniorhigh(){

        $this->Curriculum_model->addCurriculumJuniorhigh();
        $this->session->set_flashdata('Curriculum_Added','The Curriculum has been set');
        redirect('curriculum_juniorhigh');
    
    }


















    //JUNIOR HIGH CURRICULUM
    public function gradeschoolCurriculum(){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'curriculum_gradeschool';
            if(!file_exists(APPPATH.'views/curriculum/'.$page.'.php')){
                show_404();
            }else{
                
                $data['title'] = "Curriculum Management - Grade School";

                $keyword = $this->input->post('searchCurriculum');
                
                if (empty($keyword)){
                    $data['subjectjuniorhigh'] = $this->Curriculum_model->gradeschoolSubjects();
                    $data['subjectCollegeTemp'] = $this->Curriculum_model->viewGradeschoolTempSubjects();
                    $data['sections'] = $this->Curriculum_model->viewGradeschoolSections();
                    $data['curriculumSeniorhigh'] = $this->Curriculum_model->viewGradeschoolCurriculum();          
                    $this->load->view('templates/header',$data);
                    $this->load->view('curriculum/'.$page, $data);
                    $this->load->view('templates/footer');
                }else{
                    $data['subjectjuniorhigh'] = $this->Curriculum_model->gradeschoolSubjects();
                    $data['subjectCollegeTemp'] = $this->Curriculum_model->viewGradeschoolTempSubjects();
                    $data['sections'] = $this->Curriculum_model->viewGradeschoolSections();
                    $data['curriculumSeniorhigh'] = $this->Curriculum_model->searchGradeschoolCurriculum($keyword);  
                    $this->load->view('templates/header',$data);
                    $this->load->view('curriculum/'.$page, $data);
                    $this->load->view('templates/footer');
                }
            
                
            }
        }else{
            redirect(base_url());
        }
    }


    
    public function addCurriculumSubjectsGradeschool(){

        $this->Curriculum_model->addCurriculumSubjectsGradeschool();
        $this->session->set_flashdata('CollegeSubject_Added','The Subject has been added');
        redirect('curriculum_gradeschool');
    
    }

    public function removeTempSubjectGradeschool($subjectID){

        $this->Curriculum_model->removeTempSubjectGradeschool($subjectID);
        $this->session->set_flashdata('CollegeSubject_Deleted','The Subject has been removed');
        redirect('curriculum_gradeschool');
    
    }


    public function addCurriculumGradeschool(){

        $this->Curriculum_model->addCurriculumGradeschool();
        $this->session->set_flashdata('Curriculum_Added','The Curriculum has been set');
        redirect('curriculum_gradeschool');
    
    }







  

    



    

    

}
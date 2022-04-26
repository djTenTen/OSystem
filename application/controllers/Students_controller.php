<?php
class Students_controller extends CI_Controller{

    //21C1218@student
    //pass1234


    //20S0522@student
    //pass1234

    //21J1250@student
    //pass1234

    //21G1238@student
    //pass1234

    public function studentsInfo(){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'studentsinfo';
            if(!file_exists(APPPATH.'views/students/'.$page.'.php')){
                show_404();
            }else{

                $fn = $_SESSION['FullName'];
                $data['title'] = "$fn";
                
                $data['studentSubjectsInfo'] = $this->Students_model->studentsInformation($fn);
                $data['admissionID'] = $data['studentSubjectsInfo']['admissionID'];
                $data['extension'] = $data['studentSubjectsInfo']['extension'];
                $data['StudentNo'] = $data['extension'].$data['studentSubjectsInfo']['StudentNo'];
                $data['FullName'] = $data['studentSubjectsInfo']['FullName'];
                $data['FirstName'] = $data['studentSubjectsInfo']['FirstName'];
                $data['MiddleName'] = $data['studentSubjectsInfo']['MiddleName'];
                $data['LastName'] = $data['studentSubjectsInfo']['LastName'];
                $data['Suffix'] = $data['studentSubjectsInfo']['Suffix'];
                $data['Address'] = $data['studentSubjectsInfo']['Address'];
                $data['Municipality'] = $data['studentSubjectsInfo']['Municipality'];
                $data['Barangay'] = $data['studentSubjectsInfo']['Barangay'];
                $data['Province'] = $data['studentSubjectsInfo']['Province'];
                $data['Email'] = $data['studentSubjectsInfo']['Email'];
                $data['Contact'] = $data['studentSubjectsInfo']['Contact'];
                $data['Birthdate'] = $data['studentSubjectsInfo']['Birthdate'];
                $data['Age'] = $data['studentSubjectsInfo']['Age'];
                $data['Gender'] = $data['studentSubjectsInfo']['Gender'];

                $data['Guardian1'] = $data['studentSubjectsInfo']['Guardian1'];
                $data['RelationG1'] = $data['studentSubjectsInfo']['RelationG1'];
                $data['ContactG1'] = $data['studentSubjectsInfo']['ContactG1'];

                $data['Guardian2'] = $data['studentSubjectsInfo']['Guardian2'];
                $data['RelationG2'] = $data['studentSubjectsInfo']['RelationG2'];
                $data['ContactG2'] = $data['studentSubjectsInfo']['ContactG2'];
            

                // $data['admissionID'] = $admissionID;

                // $data['studentSubjects'] = $this->Reports_model->getstudentsSubjectsCollege($admissionID);
                // $data['subjectandunits'] = $this->Reports_model->getsubjectCountCollege($admissionID);
                // $data['subjectcount'] = $data['subjectandunits']['subjectCount'];
                // $data['units'] = $data['subjectandunits']['Tunits'];
                $this->load->view('templates/header',$data);
                $this->load->view('students/'.$page, $data);
                $this->load->view('templates/footer');
            
            }

        }else{
            redirect(base_url());
        }

    }

    public function schedSubjects(){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'studentssubjects';
            if(!file_exists(APPPATH.'views/students/'.$page.'.php')){
                show_404();
            }else{

                if($_SESSION['Collegedpt'] == 'Yes'){
                    $fn = $_SESSION['FullName'];
                    $data['title'] = "$fn";
                    
                    $data['studentSubjectsInfo'] = $this->Students_model->studentsInformation($fn);
                    $data['admissionID'] = $data['studentSubjectsInfo']['admissionID'];
                    $data['extension'] = $data['studentSubjectsInfo']['extension'];
                    $data['StudentNo'] = $data['extension'].$data['studentSubjectsInfo']['StudentNo'];
                    $data['FullName'] = $data['studentSubjectsInfo']['FullName'];
            
                    $data['Section'] = $data['studentSubjectsInfo']['Section'];
                    $data['Semester'] = $data['studentSubjectsInfo']['Semester'];
                    $data['CourseDesc'] = $data['studentSubjectsInfo']['CourseDesc'];
                    $data['Level'] = $data['studentSubjectsInfo']['Level'];
                    $data['CollegeDPT'] = $data['studentSubjectsInfo']['CollegeDPT'];
                    $data['TypeofApplication'] = $data['studentSubjectsInfo']['TypeofApplication'];
                    $data['DateofEnter'] = $data['studentSubjectsInfo']['DateofEnter'];
                    $data['admissionID'] = $data['studentSubjectsInfo']['admissionID'];

                    $data['isEvaluated'] = $data['studentSubjectsInfo']['isEvaluated'];
                    $data['isAssess'] = $data['studentSubjectsInfo']['isAssess'];
                    $data['isEnrolled'] = $data['studentSubjectsInfo']['isEnrolled'];


                    $data['studentSubjects'] = $this->Registrar_model->viewStudentSubjects($data['admissionID']);
                }elseif($_SESSION['SeniorHighdpt'] == 'Yes'){
                    $fn = $_SESSION['FullName'];
                    $data['title'] = "$fn";
                    
                    $data['studentSubjectsInfo'] = $this->Students_model->studentsInformation($fn);
                    $data['admissionID'] = $data['studentSubjectsInfo']['admissionID'];
                    $data['extension'] = $data['studentSubjectsInfo']['extension'];
                    $data['StudentNo'] = $data['extension'].$data['studentSubjectsInfo']['StudentNo'];
                    $data['FullName'] = $data['studentSubjectsInfo']['FullName'];
            
                    $data['Section'] = $data['studentSubjectsInfo']['Section'];
                    $data['Semester'] = $data['studentSubjectsInfo']['Semester'];
                    $data['CourseDesc'] = $data['studentSubjectsInfo']['Strand'];
                    $data['Level'] = $data['studentSubjectsInfo']['Level'];
                    $data['TypeofApplication'] = $data['studentSubjectsInfo']['TypeofApplication'];
                    $data['DateofEnter'] = $data['studentSubjectsInfo']['DateofEnter'];
                    $data['admissionID'] = $data['studentSubjectsInfo']['admissionID'];

                    $data['isEvaluated'] = $data['studentSubjectsInfo']['isEvaluated'];
                    $data['isAssess'] = $data['studentSubjectsInfo']['isAssess'];
                    $data['isEnrolled'] = $data['studentSubjectsInfo']['isEnrolled'];

                    $data['studentSubjects'] = $this->Registrar_model->viewStudentSubjectsSeniorhigh($data['admissionID']);
                }elseif($_SESSION['JuniorHighdpt'] == 'Yes'){

                    $fn = $_SESSION['FullName'];
                    $data['title'] = "$fn";
                    
                    $data['studentSubjectsInfo'] = $this->Students_model->studentsInformation($fn);
                    $data['admissionID'] = $data['studentSubjectsInfo']['admissionID'];
                    $data['extension'] = $data['studentSubjectsInfo']['extension'];
                    $data['StudentNo'] = $data['extension'].$data['studentSubjectsInfo']['StudentNo'];
                    $data['FullName'] = $data['studentSubjectsInfo']['FullName'];
            
                    $data['Section'] = $data['studentSubjectsInfo']['Section'];
                    $data['Semester'] = '';
                    $data['CourseDesc'] = '';
                    $data['Level'] = $data['studentSubjectsInfo']['Level'];
                    $data['TypeofApplication'] = $data['studentSubjectsInfo']['TypeofApplication'];
                    $data['DateofEnter'] = $data['studentSubjectsInfo']['DateofEnter'];
                    $data['admissionID'] = $data['studentSubjectsInfo']['admissionID'];

                    $data['isEvaluated'] = $data['studentSubjectsInfo']['isEvaluated'];
                    $data['isAssess'] = $data['studentSubjectsInfo']['isAssess'];
                    $data['isEnrolled'] = $data['studentSubjectsInfo']['isEnrolled'];


                    $data['studentSubjects'] = $this->Registrar_model->viewStudentSubjectsJuniorhigh($data['admissionID']);
                }elseif($_SESSION['GradeSchooldpt'] == 'Yes'){

                    $fn = $_SESSION['FullName'];
                    $data['title'] = "$fn";
                    
                    $data['studentSubjectsInfo'] = $this->Students_model->studentsInformation($fn);
                    $data['admissionID'] = $data['studentSubjectsInfo']['admissionID'];
                    $data['extension'] = $data['studentSubjectsInfo']['extension'];
                    $data['StudentNo'] = $data['extension'].$data['studentSubjectsInfo']['StudentNo'];
                    $data['FullName'] = $data['studentSubjectsInfo']['FullName'];
            
                    $data['Section'] = $data['studentSubjectsInfo']['Section'];
                    $data['Semester'] = '';
                    $data['CourseDesc'] = '';
                    $data['Level'] = $data['studentSubjectsInfo']['Level'];
                    $data['TypeofApplication'] = $data['studentSubjectsInfo']['TypeofApplication'];
                    $data['DateofEnter'] = $data['studentSubjectsInfo']['DateofEnter'];
                    $data['admissionID'] = $data['studentSubjectsInfo']['admissionID'];

                    $data['isEvaluated'] = $data['studentSubjectsInfo']['isEvaluated'];
                    $data['isAssess'] = $data['studentSubjectsInfo']['isAssess'];
                    $data['isEnrolled'] = $data['studentSubjectsInfo']['isEnrolled'];
                    $data['studentSubjects'] = $this->Registrar_model->viewStudentSubjectsGradeschool($data['admissionID']);

                    

                }

                // $data['admissionID'] = $admissionID;

                // $data['studentSubjects'] = $this->Reports_model->getstudentsSubjectsCollege($admissionID);
                // $data['subjectandunits'] = $this->Reports_model->getsubjectCountCollege($admissionID);
                // $data['subjectcount'] = $data['subjectandunits']['subjectCount'];
                // $data['units'] = $data['subjectandunits']['Tunits'];
                $this->load->view('templates/header',$data);
                $this->load->view('students/'.$page, $data);
                $this->load->view('templates/footer');
            
            }

        }else{
            redirect(base_url());
        }


    }


    public function studentsGrades(){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            if($_SESSION['Collegedpt'] == 'Yes'){

                $page = 'studentsgradescollege';
                if(!file_exists(APPPATH.'views/students/'.$page.'.php')){
                    show_404();
                }else{

                    $fn = $_SESSION['FullName'];
                    $data['title'] = "$fn";
                    
                    $data['studentSubjectsInfo'] = $this->Students_model->studentsInformation($fn);
                    $data['admissionID'] = $data['studentSubjectsInfo']['admissionID'];
                    $data['extension'] = $data['studentSubjectsInfo']['extension'];
                    $data['StudentNo'] = $data['extension'].$data['studentSubjectsInfo']['StudentNo'];
                    $data['FullName'] = $data['studentSubjectsInfo']['FullName'];
            
                    $data['Section'] = $data['studentSubjectsInfo']['Section'];
                    $data['Semester'] = $data['studentSubjectsInfo']['Semester'];
                    $data['CourseDesc'] = $data['studentSubjectsInfo']['CourseDesc'];
                    $data['Level'] = $data['studentSubjectsInfo']['Level'];
                    $data['CollegeDPT'] = $data['studentSubjectsInfo']['CollegeDPT'];
                    $data['TypeofApplication'] = $data['studentSubjectsInfo']['TypeofApplication'];
                    $data['DateofEnter'] = $data['studentSubjectsInfo']['DateofEnter'];
                    $data['admissionID'] = $data['studentSubjectsInfo']['admissionID'];
                    
                    $data['isEvaluated'] = $data['studentSubjectsInfo']['isEvaluated'];
                    $data['isAssess'] = $data['studentSubjectsInfo']['isAssess'];
                    $data['isEnrolled'] = $data['studentSubjectsInfo']['isEnrolled'];


                    $dt = $this->Students_model->getReleasingc();
                    $data['release'] = $dt['Releasing'];


                    $sy = $this->input->post('sy');
                    $sem = $this->input->post('sem');

                    if(!empty($sy) and !empty($sem)){
                        $data['studentSubjects'] = $this->Students_model->viewStudentSubjectsCollege($data['admissionID'],$sy,$sem);
                    }else{
                        $data['studentSubjects'] = array(
                            array('Remarks' => '',
                            'subjectCode' => '',
                            'SubjectDesc' => '',
                            'FullName' => '',
                            'Prelim'=> '',
                            'Midterm'=> '',
                            'Finals'=> '',
                            'Grade' => '',
                            'CourseCode'=> '',
                            'Section' => '',
                            'Equivalent' => '',
                            'isReleasing' => '')
                        );
                    }
                    
                    $data['viewSY'] = $this->Students_model->viewSYCollege();
                    $data['viewSem'] = $this->Students_model->viewSemCollege();

                    


                    $this->load->view('templates/header',$data);
                    $this->load->view('students/'.$page, $data);
                    $this->load->view('templates/footer');

                }
            }elseif($_SESSION['SeniorHighdpt'] == 'Yes'){

                $page = 'studentsgradesseniorhigh';
                if(!file_exists(APPPATH.'views/students/'.$page.'.php')){
                    show_404();
                }else{
                    $fn = $_SESSION['FullName'];
                    $data['title'] = "$fn";
                    
                    $data['studentSubjectsInfo'] = $this->Students_model->studentsInformation($fn);
                    $data['admissionID'] = $data['studentSubjectsInfo']['admissionID'];
                    $data['extension'] = $data['studentSubjectsInfo']['extension'];
                    $data['StudentNo'] = $data['extension'].$data['studentSubjectsInfo']['StudentNo'];
                    $data['FullName'] = $data['studentSubjectsInfo']['FullName'];
            
                    $data['Section'] = $data['studentSubjectsInfo']['Section'];
                    $data['Semester'] = $data['studentSubjectsInfo']['Semester'];
                    $data['CourseDesc'] = $data['studentSubjectsInfo']['Strand'];
                    $data['Level'] = $data['studentSubjectsInfo']['Level'];
                    $data['TypeofApplication'] = $data['studentSubjectsInfo']['TypeofApplication'];
                    $data['DateofEnter'] = $data['studentSubjectsInfo']['DateofEnter'];
                    $data['admissionID'] = $data['studentSubjectsInfo']['admissionID'];
    
                    $data['isEvaluated'] = $data['studentSubjectsInfo']['isEvaluated'];
                    $data['isAssess'] = $data['studentSubjectsInfo']['isAssess'];
                    $data['isEnrolled'] = $data['studentSubjectsInfo']['isEnrolled'];

                    $sy = $this->input->post('sy');
                    $sem = $this->input->post('sem');

                    $dt = $this->Students_model->getReleasingshs();
                    $data['release'] = $dt['Releasing'];

                    
                    if(!empty($sy) and !empty($sem)){
                    $data['studentSubjects'] = $this->Students_model->viewStudentSubjectsSeniorhigh($data['admissionID'],$sy,$sem);

                    

                    $data['ave'] = $this->Students_model->computeAverageSeniorhigh($data['admissionID'],$sy,$sem);
                    $data['aq1'] = $data['ave']['aq1'];
                    $data['aq2'] = $data['ave']['aq2'];
                    $data['genav'] = $data['ave']['genav'];


                    }else{

                        $data['studentSubjects'] = array(
                            array('Remarks' => '',
                            'subjectCode' => '',
                            'SubjectDesc' => '',
                            'FullName' => '',
                            '1Q' => '',
                            '2Q' => '',
                            '3Q' => '',
                            '4Q' => '',
                            'Grade' => '',
                            'isReleasing' => '')
                        );

                        $data['aq1'] = "";
                        $data['aq2'] = "";
                        $data['aq3'] = "";
                        $data['aq4'] = "";
                        $data['genav'] = "";
                        
                    }

                    $data['viewSY'] = $this->Students_model->viewSYshs();
                    $data['viewSem'] = $this->Students_model->viewSemshs();


                    $this->load->view('templates/header',$data);
                    $this->load->view('students/'.$page, $data);
                    $this->load->view('templates/footer');
                }
               
            }elseif($_SESSION['JuniorHighdpt'] == 'Yes'){

                $page = 'studentsgradesjuniorhigh';
                if(!file_exists(APPPATH.'views/students/'.$page.'.php')){
                    show_404();
                }else{
                    $fn = $_SESSION['FullName'];
                    $data['title'] = "$fn";
                    
                    $data['studentSubjectsInfo'] = $this->Students_model->studentsInformation($fn);
                    $data['admissionID'] = $data['studentSubjectsInfo']['admissionID'];
                    $data['extension'] = $data['studentSubjectsInfo']['extension'];
                    $data['StudentNo'] = $data['extension'].$data['studentSubjectsInfo']['StudentNo'];
                    $data['FullName'] = $data['studentSubjectsInfo']['FullName'];
                    
                    $data['Section'] = $data['studentSubjectsInfo']['Section'];
                    $data['Semester'] = '';
                    $data['CourseDesc'] = '';
                    $data['Level'] = $data['studentSubjectsInfo']['Level'];
                    $data['TypeofApplication'] = $data['studentSubjectsInfo']['TypeofApplication'];
                    $data['DateofEnter'] = $data['studentSubjectsInfo']['DateofEnter'];
                    $data['admissionID'] = $data['studentSubjectsInfo']['admissionID'];

                    $data['isEvaluated'] = $data['studentSubjectsInfo']['isEvaluated'];
                    $data['isAssess'] = $data['studentSubjectsInfo']['isAssess'];
                    $data['isEnrolled'] = $data['studentSubjectsInfo']['isEnrolled'];

                    $dt = $this->Students_model->getReleasingjhs();
                    $data['release'] = $dt['Releasing'];
                    $sy = $this->input->post('sy');
                    
                    if(!empty($sy)){
                    $data['studentSubjects'] = $this->Students_model->viewStudentSubjectsJuniorhigh($data['admissionID'],$sy);

                    

                    $data['ave'] = $this->Students_model->computeAverageJuniorhigh($data['admissionID'],$sy);
                    $data['aq1'] = $data['ave']['aq1'];
                    $data['aq2'] = $data['ave']['aq2'];
                    $data['aq3'] = $data['ave']['aq3'];
                    $data['aq4'] = $data['ave']['aq4'];
                    $data['genav'] = $data['ave']['genav'];

                    }else{

                        $data['studentSubjects'] = array(
                            array('Remarks' => '',
                            'subjectCode' => '',
                            'SubjectDesc' => '',
                            'FullName' => '',
                            'G1' => '',
                            'G2' => '',
                            'G3' => '',
                            'G4' => '',
                            'Grade' => '',
                            'isReleasing' => '')
                        );

                        $data['aq1'] = "";
                        $data['aq2'] = "";
                        $data['aq3'] = "";
                        $data['aq4'] = "";
                        $data['genav'] = "";
                        
                    }

                    
                    $data['viewSY'] = $this->Students_model->viewSYjhs();

                    $this->load->view('templates/header',$data);
                    $this->load->view('students/'.$page, $data);
                    $this->load->view('templates/footer');
                }

                    
            }elseif($_SESSION['GradeSchooldpt'] == 'Yes'){

                $page = 'studentsgradesgradeschool';
                if(!file_exists(APPPATH.'views/students/'.$page.'.php')){
                    show_404();
                }else{
                    $fn = $_SESSION['FullName'];
                    $data['title'] = "$fn";
                    
                    $data['studentSubjectsInfo'] = $this->Students_model->studentsInformation($fn);
                    $data['admissionID'] = $data['studentSubjectsInfo']['admissionID'];
                    $data['extension'] = $data['studentSubjectsInfo']['extension'];
                    $data['StudentNo'] = $data['extension'].$data['studentSubjectsInfo']['StudentNo'];
                    $data['FullName'] = $data['studentSubjectsInfo']['FullName'];
            
                    $data['Section'] = $data['studentSubjectsInfo']['Section'];
                    $data['Semester'] = '';
                    $data['CourseDesc'] = '';
                    $data['Level'] = $data['studentSubjectsInfo']['Level'];
                    $data['TypeofApplication'] = $data['studentSubjectsInfo']['TypeofApplication'];
                    $data['DateofEnter'] = $data['studentSubjectsInfo']['DateofEnter'];
                    $data['admissionID'] = $data['studentSubjectsInfo']['admissionID'];

                    $data['isEvaluated'] = $data['studentSubjectsInfo']['isEvaluated'];
                    $data['isAssess'] = $data['studentSubjectsInfo']['isAssess'];
                    $data['isEnrolled'] = $data['studentSubjectsInfo']['isEnrolled'];

                    $dt = $this->Students_model->getReleasinggs();
                    $data['release'] = $dt['Releasing'];
                    $sy = $this->input->post('sy');
                    
                    if(!empty($sy)){
                    $data['studentSubjects'] = $this->Students_model->viewStudentSubjectsGradeschool($data['admissionID'],$sy);

                    

                    $data['ave'] = $this->Students_model->computeAveragegradeschool($data['admissionID'],$sy);
                    $data['aq1'] = $data['ave']['aq1'];
                    $data['aq2'] = $data['ave']['aq2'];
                    $data['aq3'] = $data['ave']['aq3'];
                    $data['aq4'] = $data['ave']['aq4'];
                    $data['genav'] = $data['ave']['genav'];

                    }else{

                        $data['studentSubjects'] = array(
                            array('Remarks' => '',
                            'subjectCode' => '',
                            'SubjectDesc' => '',
                            'FullName' => '',
                            'G1' => '',
                            'G2' => '',
                            'G3' => '',
                            'G4' => '',
                            'Grade' => '',
                            'isReleasing' => '')
                        );

                        $data['aq1'] = "";
                        $data['aq2'] = "";
                        $data['aq3'] = "";
                        $data['aq4'] = "";
                        $data['genav'] = "";
                        
                    }

                    
                    $data['viewSY'] = $this->Students_model->viewSYgs();

                    $this->load->view('templates/header',$data);
                    $this->load->view('students/'.$page, $data);
                    $this->load->view('templates/footer');
               
                }

            }
        
        }else{
            redirect(base_url());
        }

    }



}
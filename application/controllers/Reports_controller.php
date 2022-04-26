<?php
class Reports_controller extends CI_Controller{


    public function __construct(){
        parent::__construct();
        $this->load->library('Pdf_report');
    }


    // COLLEGE 
    public function studentsSubjectsCollege($admissionID){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'studentSubjectsCollege';
            if(!file_exists(APPPATH.'views/reports/'.$page.'.php')){
                show_404();
            }else{
                
                $data['studentSubjectsInfo'] = $this->Reports_model->getstudentsInfoCollege($admissionID);
                $data['admissionID'] = $data['studentSubjectsInfo']['admissionID'];
                $data['extension'] = $data['studentSubjectsInfo']['extension'];
                $data['StudentNo'] = $data['extension'].$data['studentSubjectsInfo']['StudentNo'];
                $data['FullName'] = $data['studentSubjectsInfo']['FullName'];
                $data['Address'] = $data['studentSubjectsInfo']['Address'];
                $data['Section'] = $data['studentSubjectsInfo']['Section'];
                $data['Semester'] = $data['studentSubjectsInfo']['Semester'];
                $data['CourseDesc'] = $data['studentSubjectsInfo']['CourseDesc'];
                $data['Level'] = $data['studentSubjectsInfo']['Level'];
                $data['CollegeDPT'] = $data['studentSubjectsInfo']['CollegeDPT'];
                $data['TypeofApplication'] = $data['studentSubjectsInfo']['TypeofApplication'];
                $data['DateofEnter'] = $data['studentSubjectsInfo']['DateofEnter'];

                $data['admissionID'] = $admissionID;

                $data['studentSubjects'] = $this->Reports_model->getstudentsSubjectsCollege($admissionID);
                $data['subjectandunits'] = $this->Reports_model->getsubjectCountCollege($admissionID);
                $data['subjectcount'] = $data['subjectandunits']['subjectCount'];
                $data['units'] = $data['subjectandunits']['Tunits'];

                $this->load->view('reports/'.$page, $data);
            
            }

        }else{
            redirect(base_url());
        }

    }


    public function printGradeCollege($admissionID){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'printGradeCollege';
            if(!file_exists(APPPATH.'views/reports/'.$page.'.php')){
                show_404();
            }else{
                
                $data['studentSubjectsInfo'] = $this->Reports_model->getstudentsInfoCollege($admissionID);
                $data['admissionID'] = $data['studentSubjectsInfo']['admissionID'];
                $data['extension'] = $data['studentSubjectsInfo']['extension'];
                $data['StudentNo'] = $data['extension'].$data['studentSubjectsInfo']['StudentNo'];
                $data['FullName'] = $data['studentSubjectsInfo']['FullName'];
                $data['Address'] = $data['studentSubjectsInfo']['Address'];
                $data['Section'] = $data['studentSubjectsInfo']['Section'];
                $data['Semester'] = $data['studentSubjectsInfo']['Semester'];
                $data['CourseDesc'] = $data['studentSubjectsInfo']['CourseDesc'];
                $data['Level'] = $data['studentSubjectsInfo']['Level'];
                $data['CollegeDPT'] = $data['studentSubjectsInfo']['CollegeDPT'];
                $data['TypeofApplication'] = $data['studentSubjectsInfo']['TypeofApplication'];
                $data['DateofEnter'] = $data['studentSubjectsInfo']['DateofEnter'];

                $data['admissionID'] = $admissionID;


                $sy = $this->input->post('sy');
                $data['sy'] = $sy;
                $sem = $this->input->post('sem');
                $data['sem'] = $sem;
                $data['studentSubjects'] = $this->Reports_model->getstudentsGradeCollege($admissionID,$sy,$sem);

                $this->load->view('reports/'.$page, $data);
            
            }

        }else{
            redirect(base_url());
        }

    }


    public function studentsAssessment($admissionID){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'studentsAssesmentCollege';
            if(!file_exists(APPPATH.'views/reports/'.$page.'.php')){
                show_404();
            }else{

                $data['mp'] = $this->input->post('modepayment');
                $data['dp'] = $this->input->post('downpayment');
                
                $data['studentSubjectsInfo'] = $this->Reports_model->getstudentsInfoCollege($admissionID);
                $data['admissionID'] = $data['studentSubjectsInfo']['admissionID'];
                $data['extension'] = $data['studentSubjectsInfo']['extension'];
                $data['StudentNo'] = $data['extension'].$data['studentSubjectsInfo']['StudentNo'];
                $data['FullName'] = $data['studentSubjectsInfo']['FullName'];
                $data['Address'] = $data['studentSubjectsInfo']['Address'];
                $data['Section'] = $data['studentSubjectsInfo']['Section'];
                $data['Semester'] = $data['studentSubjectsInfo']['Semester'];
                $data['CourseDesc'] = $data['studentSubjectsInfo']['CourseDesc'];
                $data['coursecode'] = $data['studentSubjectsInfo']['CourseCode'];
                $data['Level'] = $data['studentSubjectsInfo']['Level'];
                $data['CollegeDPT'] = $data['studentSubjectsInfo']['CollegeDPT'];
                $data['TypeofApplication'] = $data['studentSubjectsInfo']['TypeofApplication'];
                $data['DateofEnter'] = $data['studentSubjectsInfo']['DateofEnter'];

                $data['sy'] = $this->Reports_model->getSY();
                $sy = $data['sy']['schoolyear'];

                $data['admissionID'] = $admissionID;

                
                $dsc = $this->Reports_model->getdiscountCollege($admissionID);
                if(empty($dsc['Tdiscount'])){
                    $data['discount'] = 0;
                }else{
                    $data['discount'] = $dsc['Tdiscount'];
                }
                
                $data['studentSubjects'] = $this->Registrar_model-> viewStudentSubjects($admissionID);
                $data['count'] = $this->Reports_model->getsubjectCountCollege($admissionID);
                $data['subjectCount'] = $data['count']['subjectCount'];
                $data['Tunits'] = $data['count']['Tunits'];
                $data['mainunits'] = $data['count']['mainunits'];


                $totalnstp = 0;
                if($data['coursecode'] == 'BSCE' || $data['coursecode'] == 'BSCPE'){
                    foreach($data['studentSubjects'] as $row){
                        if($row['subjectCode'] == 'NSTP1' || $row['subjectCode'] == 'NSTP2'){
                            $totalnstp = ($row['units'] * .50) * 684;
                        }
                    }
                    $data['TFee'] = ($data['Tunits'] * 684) - $totalnstp;
                }elseif($_SESSION['level'] == '4TH YEAR'){
                    foreach($data['studentSubjects'] as $row2){
                        if($row2['subjectCode'] == 'NSTP1' || $row2['subjectCode'] == 'NSTP2'){
                            $totalnstp = ($row2['units'] * .50) * 629.57;
                        }
                    }
                    $data['TFee'] = ($data['Tunits'] * 629.57)- $totalnstp;
                }else{
                    foreach($data['studentSubjects'] as $row1){
                        if($row1['subjectCode'] == 'NSTP1' || $row1['subjectCode'] == 'NSTP2'){
                            $totalnstp = ($row1['units'] * 705.88) * .50;
                        }
                    }
                    $data['TFee'] = ($data['Tunits'] * 705.88)- $totalnstp;
                }
                


                $data['miscellaneousCollege'] = $this->Reports_model->getMiscellaneousCollege();
                $data['mscFee'] = $this->Reports_model->getMiscellaneousCollegeFee();
                $data['miscfee'] = $data['mscFee']['MiscFee'];

                $totalfee = round($data['TFee'] + 0, 2);
                $totalmisc = round($data['miscfee'] + 0 , 2);
                $totalasses = round($totalfee +  $totalmisc, 2);
                $totaldiscount = round($totalfee * $data['discount'], 2);
                $masterTotal = round($totalasses - $totaldiscount, 2);

                //Registering the tuitionfee of the student
                $this->Registrar_model->registerFeeCollege($admissionID,$sy,$data['Level'],$data['Semester'],$data['mainunits'],$data['mp'],$data['TFee'],$totalmisc,$totalasses,$totaldiscount,$masterTotal);
                $this->Registrar_model->assessstudentCollege($admissionID);
                

                $this->load->view('reports/'.$page, $data);

    
            }

        }else{
            redirect(base_url());
        }

    }

    public function exportlistCollegePcourse(){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'exportenrolledcollege';
            if(!file_exists(APPPATH.'views/reports/'.$page.'.php')){
                show_404();
            }else{

                $data['studentlist'] = $this->Reports_model->exportlistCollegePcourse();
               
                $data['cCode'] = $this->Reports_model->getCourseCode();
                $data['CourseCode'] = $data['cCode']['CourseCode'];
                
                $this->load->view('reports/'.$page, $data);
            
            }

        }else{
            redirect(base_url());
        }

    } 

    public function printCollegeInfo($admissionID){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'infocollege';
            if(!file_exists(APPPATH.'views/reports/'.$page.'.php')){
                show_404();
            }else{
                
                $data['studentCollegeInfo'] = $this->Reports_model->getstudentsInfoCollege($admissionID);
                $data['admissionID'] = $data['studentCollegeInfo']['admissionID'];
                $data['extension'] = $data['studentCollegeInfo']['extension'];
                $data['StudentNo'] = $data['extension'].$data['studentCollegeInfo']['StudentNo'];
                $data['FullName'] = $data['studentCollegeInfo']['FullName'];
                $data['Gender'] = $data['studentCollegeInfo']['Gender'];
                $data['Contact'] = $data['studentCollegeInfo']['Contact'];
                $data['Address'] = $data['studentCollegeInfo']['Address'];
                $data['Email'] = $data['studentCollegeInfo']['Email'];
                $data['Age'] = $data['studentCollegeInfo']['Age'];
                $data['Birthdate'] = $data['studentCollegeInfo']['Birthdate'];
                $data['Status'] = $data['studentCollegeInfo']['Status'];
                $data['Religion'] = $data['studentCollegeInfo']['Religion'];
                $data['Nationality'] = $data['studentCollegeInfo']['Nationality'];
                $data['Guardian1'] = $data['studentCollegeInfo']['Guardian1'];
                $data['RelationG1'] = $data['studentCollegeInfo']['RelationG1'];
                $data['ContactG1'] = $data['studentCollegeInfo']['ContactG1'];

                $data['Guardian2'] = $data['studentCollegeInfo']['Guardian2'];
                $data['RelationG2'] = $data['studentCollegeInfo']['RelationG2'];
                $data['ContactG2'] = $data['studentCollegeInfo']['ContactG2'];

                $data['Elementary'] = $data['studentCollegeInfo']['Elementary'];
                $data['ESY'] = $data['studentCollegeInfo']['ESY'];
                $data['Highschool'] = $data['studentCollegeInfo']['Highschool'];
                $data['HSY'] = $data['studentCollegeInfo']['HSY'];
                $data['Seniorhighschool'] = $data['studentCollegeInfo']['Seniorhighschool'];
                $data['SSY'] = $data['studentCollegeInfo']['SSY'];
                $data['Sstrand'] = $data['studentCollegeInfo']['Sstrand'];
                $data['Collegeschool'] = $data['studentCollegeInfo']['Collegeschool'];
                $data['CSY'] = $data['studentCollegeInfo']['CSY'];
                $data['Ccourse'] = $data['studentCollegeInfo']['Ccourse'];
                

                $data['Section'] = $data['studentCollegeInfo']['Section'];
                $data['Semester'] = $data['studentCollegeInfo']['Semester'];
                $data['CourseDesc'] = $data['studentCollegeInfo']['CourseDesc'];
                $data['Level'] = $data['studentCollegeInfo']['Level'];
                $data['CollegeDPT'] = $data['studentCollegeInfo']['CollegeDPT'];
                $data['TypeofApplication'] = $data['studentCollegeInfo']['TypeofApplication'];
                $data['DateofEnter'] = $data['studentCollegeInfo']['DateofEnter'];
                $data['admissionID'] = $admissionID;

                $this->load->view('reports/'.$page, $data);
            
            }

        }else{
            redirect(base_url());
        }

    }



















    // SENIOR HIGH
    public function studentSubjectSeniorhigh($admissionID){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'studentSubjectSeniorhigh';
            if(!file_exists(APPPATH.'views/reports/'.$page.'.php')){
                show_404();
            }else{
                
                $data['studentSubjectsInfo'] = $this->Reports_model->getstudentsInfoSeniorhigh($admissionID);
                $data['admissionID'] = $data['studentSubjectsInfo']['admissionID'];
                $data['extension'] = $data['studentSubjectsInfo']['extension'];
                $data['StudentNo'] = $data['extension'].$data['studentSubjectsInfo']['StudentNo'];
                $data['FullName'] = $data['studentSubjectsInfo']['FullName'];
                $data['Address'] = $data['studentSubjectsInfo']['Address'];
                $data['Section'] = $data['studentSubjectsInfo']['Section'];
                $data['Semester'] = $data['studentSubjectsInfo']['Semester'];
                $data['Strand'] = $data['studentSubjectsInfo']['Strand'];
                $data['Level'] = $data['studentSubjectsInfo']['Level'];
                $data['TypeofApplication'] = $data['studentSubjectsInfo']['TypeofApplication'];
                $data['DateofEnter'] = $data['studentSubjectsInfo']['DateofEnter'];

                $data['admissionID'] = $admissionID;

                $data['studentSubjects'] = $this->Reports_model->getstudentsSubjectsSeniorhigh($admissionID,$data['Level'],$data['Semester']);
                $data['subjectCount'] = $this->Reports_model->getsubjectCountSeniorhigh($admissionID);
                $data['subjectcount'] = $data['subjectCount']['subjectCount'];
                $data['totalhrs'] = $data['subjectCount']['thrs'];

                $this->load->view('reports/'.$page, $data);
            
            }

        }else{
            redirect(base_url());
        }
    }

    public function studentsAssessmentSeniorhigh($admissionID){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'studentsAssesmentSenoirhigh';
            if(!file_exists(APPPATH.'views/reports/'.$page.'.php')){
                show_404();
            }else{

                // $data['mp'] = $this->input->post('modepayment');
                // $data['dp'] = $this->input->post('downpayment');
                
                $data['studentSubjectsInfo'] = $this->Reports_model->getstudentsInfoSeniorhigh($admissionID);
                $data['admissionID'] = $data['studentSubjectsInfo']['admissionID'];
                $data['extension'] = $data['studentSubjectsInfo']['extension'];
                $data['StudentNo'] = $data['extension'].$data['studentSubjectsInfo']['StudentNo'];
                $data['FullName'] = $data['studentSubjectsInfo']['FullName'];
                $data['Address'] = $data['studentSubjectsInfo']['Address'];
                $data['Section'] = $data['studentSubjectsInfo']['Section'];
                $data['Semester'] = $data['studentSubjectsInfo']['Semester'];
                $data['strand'] = $data['studentSubjectsInfo']['Strand'];
                $data['Level'] = $data['studentSubjectsInfo']['Level'];
                $data['TypeofApplication'] = $data['studentSubjectsInfo']['TypeofApplication'];
                $data['DateofEnter'] = $data['studentSubjectsInfo']['DateofEnter'];
                $data['sy']=$this->Reports_model->getSY();
                $data['admissionID'] = $admissionID;

                $data['discount'] = $this->input->post('discount');
                
                $data['studentSubjects'] = $this->Reports_model->getstudentsSubjectsSeniorhigh($admissionID,$data['Level'],$data['Semester']);
                $data['count'] = $this->Reports_model->getsubjectCountSeniorhigh($admissionID);
                $data['subjectCount'] = $data['count']['subjectCount'];
                $data['TFee'] = 17500;

                $data['miscellaneousCollege'] = $this->Reports_model->getMiscellaneousSeniorhigh($data['Level']);
                $data['mscFee'] = $this->Reports_model->getMiscellaneousSeniorhighFee($data['Level']);
                $data['miscfee'] = $data['mscFee']['MiscFee'];

                $data['miscotherSeniorhigh'] = $this->Reports_model->getotherMiscellaneousSeniorhigh($data['Level']);
                
                $data['OthermscFee'] = $this->Reports_model->getotherMiscellaneousSeniorhighFee($data['Level']);
                $data['othermiscfee'] = $data['OthermscFee']['otherMiscFee'];
                
                $this->Registrar_model->assessstudentSeniorhigh($admissionID);

                $this->load->view('reports/'.$page, $data);
            
            }

        }else{
            redirect(base_url());
        }

    }

    public function printSeniorhighInfo($admissionID){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'infoseniorhigh';
            if(!file_exists(APPPATH.'views/reports/'.$page.'.php')){
                show_404();
            }else{
                
                $data['studentInfo'] = $this->Reports_model->getstudentsInfoSeniorhigh($admissionID);
                $data['admissionID'] = $data['studentInfo']['admissionID'];
                $data['extension'] = $data['studentInfo']['extension'];
                $data['StudentNo'] = $data['extension'].$data['studentInfo']['StudentNo'];
                $data['FullName'] = $data['studentInfo']['FullName'];
                $data['Gender'] = $data['studentInfo']['Gender'];
                $data['Contact'] = $data['studentInfo']['Contact'];
                $data['Address'] = $data['studentInfo']['Address'];
                $data['Email'] = $data['studentInfo']['Email'];
                $data['Age'] = $data['studentInfo']['Age'];
                $data['Birthdate'] = $data['studentInfo']['Birthdate'];
                $data['Status'] = $data['studentInfo']['Status'];
                $data['Religion'] = $data['studentInfo']['Religion'];
                $data['Nationality'] = $data['studentInfo']['Nationality'];
                $data['Guardian1'] = $data['studentInfo']['Guardian1'];
                $data['RelationG1'] = $data['studentInfo']['RelationG1'];
                $data['ContactG1'] = $data['studentInfo']['ContactG1'];

                $data['Guardian2'] = $data['studentInfo']['Guardian2'];
                $data['RelationG2'] = $data['studentInfo']['RelationG2'];
                $data['ContactG2'] = $data['studentInfo']['ContactG2'];

                $data['Elementary'] = $data['studentInfo']['Elementary'];
                $data['ESY'] = $data['studentInfo']['ESY'];
                $data['Highschool'] = $data['studentInfo']['Highschool'];
                $data['HSY'] = $data['studentInfo']['HSY'];
                $data['Seniorhighschool'] = $data['studentInfo']['Seniorhighschool'];
                $data['SSY'] = $data['studentInfo']['SSY'];
                $data['Sstrand'] = $data['studentInfo']['Sstrand'];
                $data['Section'] = $data['studentInfo']['Section'];
                $data['Semester'] = $data['studentInfo']['Semester'];
                $data['Strand'] = $data['studentInfo']['Strand'];
                $data['Level'] = $data['studentInfo']['Level'];
                $data['TypeofApplication'] = $data['studentInfo']['TypeofApplication'];
                $data['DateofEnter'] = $data['studentInfo']['DateofEnter'];
                $data['admissionID'] = $admissionID;

                $this->load->view('reports/'.$page, $data);
            
            }

        }else{
            redirect(base_url());
        }

    }


    public function printGradeSeniorhigh($admissionID){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'printGradeSeniorhigh';
            if(!file_exists(APPPATH.'views/reports/'.$page.'.php')){
                show_404();
            }else{
                
                $data['studentSubjectsInfo'] = $this->Reports_model->getstudentsInfoSeniorhigh($admissionID);
                $data['admissionID'] = $data['studentSubjectsInfo']['admissionID'];
                $data['extension'] = $data['studentSubjectsInfo']['extension'];
                $data['StudentNo'] = $data['extension'].$data['studentSubjectsInfo']['StudentNo'];
                $data['FullName'] = $data['studentSubjectsInfo']['FullName'];
                $data['Address'] = $data['studentSubjectsInfo']['Address'];
                $data['Section'] = $data['studentSubjectsInfo']['Section'];
                $data['Semester'] = $data['studentSubjectsInfo']['Semester'];
                $data['Strand'] = $data['studentSubjectsInfo']['Strand'];
                $data['Level'] = $data['studentSubjectsInfo']['Level'];
                $data['TypeofApplication'] = $data['studentSubjectsInfo']['TypeofApplication'];
                $data['DateofEnter'] = $data['studentSubjectsInfo']['DateofEnter'];

                $data['admissionID'] = $admissionID;


                $sy = $this->input->post('sy');
                $data['sy'] = $sy;
                $sem = $this->input->post('sem');
                $data['sem'] = $sem;


                $data['ave'] = $this->Students_model->computeAverageSeniorhigh($data['admissionID'],$sy,$sem);
                $data['aq1'] = $data['ave']['aq1'];
                $data['aq2'] = $data['ave']['aq2'];
                $data['genav'] = $data['ave']['genav'];

                $data['studentSubjects'] = $this->Reports_model->getstudentsGradeSeniorhigh($admissionID,$sy,$sem);

                $this->load->view('reports/'.$page, $data);
            
            }

        }else{
            redirect(base_url());
        }

    }







   



















     public function studentSubjectJuniorhigh($admissionID){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'studentSubjectJuniorhigh';
            if(!file_exists(APPPATH.'views/reports/'.$page.'.php')){
                show_404();
            }else{
                
                $data['studentSubjectsInfo'] = $this->Reports_model->getstudentsInfoJuniorhigh($admissionID);
                $data['admissionID'] = $data['studentSubjectsInfo']['admissionID'];
                $data['extension'] = $data['studentSubjectsInfo']['extension'];
                $data['StudentNo'] = $data['extension'].$data['studentSubjectsInfo']['StudentNo'];
                $data['FullName'] = $data['studentSubjectsInfo']['FullName'];
                $data['Address'] = $data['studentSubjectsInfo']['Address'];
                $data['Section'] = $data['studentSubjectsInfo']['Section'];
                $data['Level'] = $data['studentSubjectsInfo']['Level'];
                $data['TypeofApplication'] = $data['studentSubjectsInfo']['TypeofApplication'];
                $data['DateofEnter'] = $data['studentSubjectsInfo']['DateofEnter'];

                $data['admissionID'] = $admissionID;

                $data['studentSubjects'] = $this->Reports_model->getstudentsSubjectsJuniorhigh($admissionID);
                $data['subjectCount'] = $this->Reports_model->getsubjectCountJuniorhigh($admissionID);
                $data['subjectcount'] = $data['subjectCount']['subjectCount'];
                $data['totalhrs'] = $data['subjectCount']['thrs'];

                $this->load->view('reports/'.$page, $data);
            
            }

        }else{
            redirect(base_url());
        }

    }

    public function studentsAssessmentJuniorhigh($admissionID){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'studentsAssesmentJunoirhigh';
            if(!file_exists(APPPATH.'views/reports/'.$page.'.php')){
                show_404();
            }else{

                // $data['mp'] = $this->input->post('modepayment');
                // $data['dp'] = $this->input->post('downpayment');
                
                $data['studentSubjectsInfo'] = $this->Reports_model->getstudentsInfoJuniorhigh($admissionID);
                $data['admissionID'] = $data['studentSubjectsInfo']['admissionID'];
                $data['extension'] = $data['studentSubjectsInfo']['extension'];
                $data['StudentNo'] = $data['extension'].$data['studentSubjectsInfo']['StudentNo'];
                $data['FullName'] = $data['studentSubjectsInfo']['FullName'];
                $data['Address'] = $data['studentSubjectsInfo']['Address'];
                $data['Section'] = $data['studentSubjectsInfo']['Section'];
                $data['Level'] = $data['studentSubjectsInfo']['Level'];
                $data['TypeofApplication'] = $data['studentSubjectsInfo']['TypeofApplication'];
                $data['DateofEnter'] = $data['studentSubjectsInfo']['DateofEnter'];
                $data['sy']=$this->Reports_model->getSY();
                $data['admissionID'] = $admissionID;

                $data['discount'] = $this->input->post('discount');

                $data['studentSubjects'] = $this->Reports_model->getstudentsSubjectsJuniorhigh($admissionID);
                $data['count'] = $this->Reports_model->getsubjectCountJuniorhigh($admissionID);
                $data['subjectCount'] = $data['count']['subjectCount'];
                $data['subjecthrs'] = $data['count']['subjecthours'];
                
                $data['TFee'] =  0;
                if($_SESSION['level'] == 'GRADE 7'){
                    $data['TFee'] =  12785;
                }else{
                    $data['TFee'] =  21015;
                }

                $data['miscellaneousCollege'] = $this->Reports_model->getMiscellaneousJuniorhigh($data['Level']);
                $data['mscFee'] = $this->Reports_model->getMiscellaneousJuniorhighFee($data['Level']);
                $data['miscfee'] = $data['mscFee']['MiscFee'];


                $data['othermiscJuniohigh'] = $this->Reports_model->getOtherMiscellaneousJuniorhigh($data['Level']);
                $data['mscOtherFee'] = $this->Reports_model->getOtherMiscellaneousJuniorhighFee($data['Level']);
                $data['othermiscfee'] = $data['mscOtherFee']['OtherMiscFee'];

                $this->Registrar_model->assessstudentJuniorhigh($admissionID);
                
                $this->load->view('reports/'.$page, $data);
            
            }

        }else{
            redirect(base_url());
        }

    }


    public function printJuniorhighInfo($admissionID){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'infojuniorhigh';
            if(!file_exists(APPPATH.'views/reports/'.$page.'.php')){
                show_404();
            }else{
                
                $data['studentInfo'] = $this->Reports_model->getstudentsInfoJuniorhigh($admissionID);
                $data['admissionID'] = $data['studentInfo']['admissionID'];
                $data['extension'] = $data['studentInfo']['extension'];
                $data['StudentNo'] = $data['extension'].$data['studentInfo']['StudentNo'];
                $data['FullName'] = $data['studentInfo']['FullName'];
                $data['Gender'] = $data['studentInfo']['Gender'];
                $data['Contact'] = $data['studentInfo']['Contact'];
                $data['Address'] = $data['studentInfo']['Address'];
                $data['Email'] = $data['studentInfo']['Email'];
                $data['Age'] = $data['studentInfo']['Age'];
                $data['Birthdate'] = $data['studentInfo']['Birthdate'];
                $data['Status'] = $data['studentInfo']['Status'];
                $data['Religion'] = $data['studentInfo']['Religion'];
                $data['Nationality'] = $data['studentInfo']['Nationality'];
                $data['Guardian1'] = $data['studentInfo']['Guardian1'];
                $data['RelationG1'] = $data['studentInfo']['RelationG1'];
                $data['ContactG1'] = $data['studentInfo']['ContactG1'];

                $data['Guardian2'] = $data['studentInfo']['Guardian2'];
                $data['RelationG2'] = $data['studentInfo']['RelationG2'];
                $data['ContactG2'] = $data['studentInfo']['ContactG2'];

                $data['Elementary'] = $data['studentInfo']['Elementary'];
                $data['ESY'] = $data['studentInfo']['ESY'];
                $data['Highschool'] = $data['studentInfo']['Highschool'];
                $data['HSY'] = $data['studentInfo']['HSY'];
                $data['Section'] = $data['studentInfo']['Section'];
                $data['Level'] = $data['studentInfo']['Level'];
                $data['TypeofApplication'] = $data['studentInfo']['TypeofApplication'];
                $data['DateofEnter'] = $data['studentInfo']['DateofEnter'];
                $data['admissionID'] = $admissionID;

                $this->load->view('reports/'.$page, $data);
            
            }

        }else{
            redirect(base_url());
        }

    }


    public function printGradeJuniorhigh($admissionID){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'printGradeJuniorhigh';
            if(!file_exists(APPPATH.'views/reports/'.$page.'.php')){
                show_404();
            }else{
                
                $data['studentSubjectsInfo'] = $this->Reports_model->getstudentsInfoJuniorhigh($admissionID);
                $data['admissionID'] = $data['studentSubjectsInfo']['admissionID'];
                $data['extension'] = $data['studentSubjectsInfo']['extension'];
                $data['StudentNo'] = $data['extension'].$data['studentSubjectsInfo']['StudentNo'];
                $data['FullName'] = $data['studentSubjectsInfo']['FullName'];
                $data['Address'] = $data['studentSubjectsInfo']['Address'];
                $data['Section'] = $data['studentSubjectsInfo']['Section'];
                $data['Semester'] = "";
                $data['Strand'] = "";
                $data['Level'] = $data['studentSubjectsInfo']['Level'];
                $data['TypeofApplication'] = $data['studentSubjectsInfo']['TypeofApplication'];
                $data['DateofEnter'] = $data['studentSubjectsInfo']['DateofEnter'];

                $data['admissionID'] = $admissionID;


                $sy = $this->input->post('sy');
                $data['sy'] = $sy;

                $data['ave'] = $this->Students_model->computeAverageJuniorhigh($data['admissionID'],$sy);
                $data['aq1'] = $data['ave']['aq1'];
                $data['aq2'] = $data['ave']['aq2'];
                $data['aq3'] = $data['ave']['aq3'];
                $data['aq4'] = $data['ave']['aq4'];
                $data['genav'] = $data['ave']['genav'];

                if(round($data['genav']) >= 75){$data['remarks'] = 'FOR PROMOTION';}else{$data['remarks'] = 'RETAINED';}

                $data['studentSubjects'] = $this->Reports_model->getstudentsGradeJuniorhigh($admissionID,$sy);

                $this->load->view('reports/'.$page, $data);
            
            }

        }else{
            redirect(base_url());
        }

    }











































     // GRADE SCHOOL
     public function studentSubjectGradeschool($admissionID){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'studentSubjectGradeschool';
            if(!file_exists(APPPATH.'views/reports/'.$page.'.php')){
                show_404();
            }else{
                
                $data['studentSubjectsInfo'] = $this->Reports_model->getstudentsInfoGradeschool($admissionID);
                $data['admissionID'] = $data['studentSubjectsInfo']['admissionID'];
                $data['extension'] = $data['studentSubjectsInfo']['extension'];
                $data['StudentNo'] = $data['extension'].$data['studentSubjectsInfo']['StudentNo'];
                $data['FullName'] = $data['studentSubjectsInfo']['FullName'];
                $data['Address'] = $data['studentSubjectsInfo']['Address'];
                $data['Section'] = $data['studentSubjectsInfo']['Section'];
                $data['Level'] = $data['studentSubjectsInfo']['Level'];
                $data['TypeofApplication'] = $data['studentSubjectsInfo']['TypeofApplication'];
                $data['DateofEnter'] = $data['studentSubjectsInfo']['DateofEnter'];

                $data['admissionID'] = $admissionID;

                $data['studentSubjects'] = $this->Reports_model->getstudentsSubjectsGradeschool($admissionID);
                $data['subjectCount'] = $this->Reports_model->getsubjectCountGradeschool($admissionID);
                $data['subjectcount'] = $data['subjectCount']['subjectCount'];
                $data['totalhrs'] = $data['subjectCount']['thrs'];

                $this->load->view('reports/'.$page, $data);
            
            }

        }else{
            redirect(base_url());
        }

    }



    public function studentsAssessmentGradeschool($admissionID){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'studentsAssesmentGradeschool';
            if(!file_exists(APPPATH.'views/reports/'.$page.'.php')){
                show_404();
            }else{

                // $data['mp'] = $this->input->post('modepayment');
                // $data['dp'] = $this->input->post('downpayment');
                
                $data['studentSubjectsInfo'] = $this->Reports_model->getstudentsInfoGradeschool($admissionID);
                $data['admissionID'] = $data['studentSubjectsInfo']['admissionID'];
                $data['extension'] = $data['studentSubjectsInfo']['extension'];
                $data['StudentNo'] = $data['extension'].$data['studentSubjectsInfo']['StudentNo'];
                $data['FullName'] = $data['studentSubjectsInfo']['FullName'];
                $data['Address'] = $data['studentSubjectsInfo']['Address'];
                $data['Section'] = $data['studentSubjectsInfo']['Section'];
                $data['Level'] = $data['studentSubjectsInfo']['Level'];
                $data['TypeofApplication'] = $data['studentSubjectsInfo']['TypeofApplication'];
                $data['DateofEnter'] = $data['studentSubjectsInfo']['DateofEnter'];
                $data['sy']=$this->Reports_model->getSY();
                $data['admissionID'] = $admissionID;

                $data['studentSubjects'] = $this->Reports_model->getstudentsSubjectsGradeschool($admissionID);
                $data['count'] = $this->Reports_model->getsubjectCountGradeschool($admissionID);
                $data['subjectCount'] = $data['count']['subjectCount'];
                $data['subjecthrs'] = $data['count']['subjecthours'];
                
                if ($data['Level'] == "KINDER I" || $data['Level'] == "KINDER II" ) {
                    $data['TFee'] =  12883;
                }elseif($data['Level'] == "GRADE 1"){
                    $data['TFee'] =  14171;
                }elseif($data['Level'] == "GRADE 2"){
                    $data['TFee'] =  22162;
                }elseif($data['Level'] == "GRADE 3" || $data['Level'] == "GRADE 4"){
                    $data['TFee'] =  23270.10;
                }elseif($data['Level'] == "GRADE 5" || $data['Level'] == "GRADE 6"){
                    $data['TFee'] =  23824.15;
                }
                
                //$data['TFee'] = 1;

                $data['miscellaneousCollege'] = $this->Reports_model->getMiscellaneousGradeschool($data['Level']);
                $data['mscFee'] = $this->Reports_model->getMiscellaneousGradeschoolFee($data['Level']);
                $data['miscfee'] = $data['mscFee']['MiscFee'];


                $data['othermiscJuniohigh'] = $this->Reports_model->getOtherMiscellaneousGradeschool($data['Level']);
                $data['mscOtherFee'] = $this->Reports_model->getOtherMiscellaneousGradeschoolFee($data['Level']);
                $data['othermiscfee'] = $data['mscOtherFee']['OtherMiscFee'];

                $this->Registrar_model->assessstudentGradeschool($admissionID);
                
                $this->load->view('reports/'.$page, $data);
            
            }

        }else{
            redirect(base_url());
        }

    }



    public function printGradeschoolInfo($admissionID){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'infogradeschool';
            if(!file_exists(APPPATH.'views/reports/'.$page.'.php')){
                show_404();
            }else{
                
                $data['studentInfo'] = $this->Reports_model->getstudentsInfoGradeschool($admissionID);
                $data['admissionID'] = $data['studentInfo']['admissionID'];
                $data['extension'] = $data['studentInfo']['extension'];
                $data['StudentNo'] = $data['extension'].$data['studentInfo']['StudentNo'];
                $data['FullName'] = $data['studentInfo']['FullName'];
                $data['Gender'] = $data['studentInfo']['Gender'];
                $data['Contact'] = $data['studentInfo']['Contact'];
                $data['Address'] = $data['studentInfo']['Address'];
                $data['Email'] = $data['studentInfo']['Email'];
                $data['Age'] = $data['studentInfo']['Age'];
                $data['Birthdate'] = $data['studentInfo']['Birthdate'];
                $data['Status'] = $data['studentInfo']['Status'];
                $data['Religion'] = $data['studentInfo']['Religion'];
                $data['Nationality'] = $data['studentInfo']['Nationality'];
                $data['Guardian1'] = $data['studentInfo']['Guardian1'];
                $data['RelationG1'] = $data['studentInfo']['RelationG1'];
                $data['ContactG1'] = $data['studentInfo']['ContactG1'];

                $data['Guardian2'] = $data['studentInfo']['Guardian2'];
                $data['RelationG2'] = $data['studentInfo']['RelationG2'];
                $data['ContactG2'] = $data['studentInfo']['ContactG2'];

                $data['Elementary'] = $data['studentInfo']['Elementary'];
                $data['ESY'] = $data['studentInfo']['ESY'];
                $data['Section'] = $data['studentInfo']['Section'];
                $data['Level'] = $data['studentInfo']['Level'];
                $data['TypeofApplication'] = $data['studentInfo']['TypeofApplication'];
                $data['DateofEnter'] = $data['studentInfo']['DateofEnter'];
                $data['admissionID'] = $admissionID;
                $this->load->view('reports/'.$page, $data);

            }

        }else{
            redirect(base_url());
        }

    }





    public function printGradeGradeschool($admissionID){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'printGradeGradeschool';
            if(!file_exists(APPPATH.'views/reports/'.$page.'.php')){
                show_404();
            }else{
                
                $data['studentSubjectsInfo'] = $this->Reports_model->getstudentsInfoGradeschool($admissionID);
                $data['admissionID'] = $data['studentSubjectsInfo']['admissionID'];
                $data['extension'] = $data['studentSubjectsInfo']['extension'];
                $data['StudentNo'] = $data['extension'].$data['studentSubjectsInfo']['StudentNo'];
                $data['FullName'] = $data['studentSubjectsInfo']['FullName'];
                $data['Address'] = $data['studentSubjectsInfo']['Address'];
                $data['Section'] = $data['studentSubjectsInfo']['Section'];
                $data['Semester'] = "";
                $data['Strand'] = "";
                $data['Level'] = $data['studentSubjectsInfo']['Level'];
                $data['TypeofApplication'] = $data['studentSubjectsInfo']['TypeofApplication'];
                $data['DateofEnter'] = $data['studentSubjectsInfo']['DateofEnter'];

                $data['admissionID'] = $admissionID;


                $sy = $this->input->post('sy');
                $data['sy'] = $sy;

                $data['ave'] = $this->Students_model->computeAverageGradeschool($data['admissionID'],$sy);
                $data['aq1'] = $data['ave']['aq1'];
                $data['aq2'] = $data['ave']['aq2'];
                $data['aq3'] = $data['ave']['aq3'];
                $data['aq4'] = $data['ave']['aq4'];
                $data['genav'] = $data['ave']['genav'];

                if(round($data['genav']) >= 75){$data['remarks'] = 'FOR PROMOTION';}else{$data['remarks'] = 'RETAINED';}

                $data['studentSubjects'] = $this->Reports_model->getstudentsGradeGradeschool($admissionID,$sy);

                $this->load->view('reports/'.$page, $data);
            
            }

        }else{
            redirect(base_url());
        }

    }
    





}
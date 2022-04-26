<?php
class Egrade_controller extends CI_Controller{

    public function profCollege(){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'profcollege';
            if(!file_exists(APPPATH.'views/egrade/'.$page.'.php')){
                show_404();
            }else{

                $data['collegeProf'] = $this->Egrade_model->collegeProf();
                $data['title'] = "Class List"; 
                $this->load->view('templates/header',$data);
                $this->load->view('egrade/'.$page, $data);
                $this->load->view('templates/footer');
            }
        }else{
            redirect(base_url());
        }
    }

    public function viewClassSubjects($teacherID){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'profcollegesubjects';
            if(!file_exists(APPPATH.'views/egrade/'.$page.'.php')){
                show_404();
            }else{

                $data['viewSY'] = $this->Egrade_model->viewSYCollege();
                $data['viewSem'] = $this->Egrade_model->viewSemCollege();
                $data['prof'] = $this->Egrade_model->getInstructor($teacherID);
                $data['Teacher'] = $data['prof']['FullName'];

                $data['teacherID'] = $teacherID;
                
                $sy = $this->input->post('sy');
                $sem = $this->input->post('sem');

                if(!empty($sy) and !empty($sem)){
                    $data['collegeProfSubjects'] = $this->Egrade_model->collegeProfSubjects($teacherID,$sy,$sem);
                }else{
                    $data['collegeProfSubjects'] = array(
                        array('subjectDesc' => '',
                        'subjectID' => '',
                        'curriculumID' => '',
                        'CourseDesc' => '',
                        'Year' => '',
                        'Section' => '',
                        'Sem' => '')
                    );
                }

                $data['title'] = "Class List"; 
                $this->load->view('templates/header',$data);
                $this->load->view('egrade/'.$page, $data);
                $this->load->view('templates/footer');
            }
        }else{
            redirect(base_url());
        }
    }

    public function viewClassSubjectsStudentsCol($curriculumID,$subjectID){
    
        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'profcollegesubjectscollege';
            if(!file_exists(APPPATH.'views/egrade/'.$page.'.php')){
                show_404();
            }else{
                $_SESSION['$curriculumID'] = $curriculumID;
                $_SESSION['$subjectID'] = $subjectID;
    
                $data['subject'] = $this->Teacher_model->collegeClassName($subjectID);
                $data['SubjectName'] = $data['subject']['subjectDesc'];
                $data['title'] = $data['SubjectName'];
    
                $dt = $this->Teacher_model->isEncodinggs();
                $data['encoding'] = $dt['Encoding'];
    
    
                $data['collegeclasslist'] = $this->Egrade_model->collegeClassList($curriculumID,$subjectID);
    
                $this->load->view('templates/header',$data);
                $this->load->view('egrade/'.$page, $data);
                $this->load->view('templates/footer');
            }
        }else{
            redirect(base_url());
        }

    }

    public function updateSubjectGradeCollege($studentsubjectID){

        $Prelim = trim(strtoupper($this->input->post('Prelim')));
        $Midterm = trim(strtoupper($this->input->post('Midterm')));
        $Finals = trim(strtoupper($this->input->post('Finals')));
        if(is_numeric($Prelim) and is_numeric($Midterm) and is_numeric($Finals)){
            if($Prelim < 60 or $Midterm < 60 or $Finals < 60){
                $this->session->set_flashdata('ErrorInput','The student has been updated');
            }elseif($Prelim > 100 or $Midterm > 100 or $Finals > 100){
                $this->session->set_flashdata('ErrorInput','The student has been updated');
            }else{

                $pre = $Prelim * .30;
                $mid = $Midterm * .30;
                $fin = $Finals * .40;
                
                $fgrade = round($pre + $mid + $fin);

                if($fgrade > 100 or $fgrade < 60){
                    $this->session->set_flashdata('ErrorInput','The student has been updated');
                }elseif($fgrade >= 97 and $fgrade <= 100){
                    $remarks = 'PASSED';
                    $equi = '1.00';
                    $this->Teacher_model->updateGradeCollege($studentsubjectID,$remarks,$fgrade,$equi);
                    $this->session->set_flashdata('gradeupdated','The student has been updated');
                }elseif($fgrade >= 94 and $fgrade <= 96){
                    $remarks = 'PASSED';
                    $equi = '1.25';
                    $this->Teacher_model->updateGradeCollege($studentsubjectID,$remarks,$fgrade,$equi);
                    $this->session->set_flashdata('gradeupdated','The student has been updated');
                }elseif($fgrade >= 91 and $fgrade <= 93){
                    $remarks = 'PASSED';
                    $equi = '1.50';
                    $this->Teacher_model->updateGradeCollege($studentsubjectID,$remarks,$fgrade,$equi);
                    $this->session->set_flashdata('gradeupdated','The student has been updated');
                }elseif($fgrade >= 88 and $fgrade <= 90){
                    $remarks = 'PASSED';
                    $equi = '1.75';
                    $this->Teacher_model->updateGradeCollege($studentsubjectID,$remarks,$fgrade,$equi);
                    $this->session->set_flashdata('gradeupdated','The student has been updated');
                }elseif($fgrade >= 85 and $fgrade <= 87){
                    $remarks = 'PASSED';
                    $equi = '2.00';
                    $this->Teacher_model->updateGradeCollege($studentsubjectID,$remarks,$fgrade,$equi);
                    $this->session->set_flashdata('gradeupdated','The student has been updated');
                }elseif($fgrade >= 82 and $fgrade <= 84){
                    $remarks = 'PASSED';
                    $equi = '2.25';
                    $this->Teacher_model->updateGradeCollege($studentsubjectID,$remarks,$fgrade,$equi);
                    $this->session->set_flashdata('gradeupdated','The student has been updated');
                }elseif($fgrade >= 79 and $fgrade <= 81){
                    $remarks = 'PASSED';
                    $equi = '2.50';
                    $this->Teacher_model->updateGradeCollege($studentsubjectID,$remarks,$fgrade,$equi);
                    $this->session->set_flashdata('gradeupdated','The student has been updated');
                }elseif($fgrade >= 76 and $fgrade <= 78){
                    $remarks = 'PASSED';
                    $equi = '2.75';
                    $this->Teacher_model->updateGradeCollege($studentsubjectID,$remarks,$fgrade,$equi);
                    $this->session->set_flashdata('gradeupdated','The student has been updated');
                }elseif($fgrade == 75){
                    $remarks = 'PASSED';
                    $equi = '3.00';
                    $this->Teacher_model->updateGradeCollege($studentsubjectID,$remarks,$fgrade,$equi);
                    $this->session->set_flashdata('gradeupdated','The student has been updated');
                }elseif($fgrade >= 60 and $fgrade <= 74){
                    $remarks = 'FAILED';
                    $equi = '5.00';
                    $this->Teacher_model->updateGradeCollege($studentsubjectID,$remarks,$fgrade,$equi);
                    $this->session->set_flashdata('gradeupdated','The student has been updated');
                }

            }
        }elseif($Prelim == 'TBT' or $Midterm == 'TBT' or $Finals == 'TBT'){
            $remarks = 'TBT';
            $fgrade = 'TBT';
            $equi = 'TBT';
            $this->Egrade_model->updateGradeCollege($studentsubjectID,$remarks,$fgrade,$equi);
            $this->session->set_flashdata('gradeupdated','The student has been updated');
        }elseif($Prelim == 'INC' or $Midterm == 'INC' or $Finals == 'INC'){
            $remarks = 'INC';
            $fgrade = 'INC';
            $equi = 'INC';
            $this->Egrade_model->updateGradeCollege($studentsubjectID,$remarks,$fgrade,$equi);
            $this->session->set_flashdata('gradeupdated','The student has been updated');
        }elseif($Prelim == 'FA' or $Midterm == 'FA' or $Finals == 'FA'){
            $remarks = 'FA';
            $fgrade = 'FA';
            $equi = 'FA';
            $this->Egrade_model->updateGradeCollege($studentsubjectID,$remarks,$fgrade,$equi);
            $this->session->set_flashdata('gradeupdated','The student has been updated');
        }elseif($Prelim == 'UW' or $Midterm == 'UW' or $Finals == 'UW'){
            $remarks = 'UW';
            $fgrade = 'UW';
            $equi = 'UW';
            $this->Egrade_model->updateGradeCollege($studentsubjectID,$remarks,$fgrade,$equi);
            $this->session->set_flashdata('gradeupdated','The student has been updated');
        }elseif($Prelim == 'DRP' or $Midterm == 'DRP' or $Finals == 'DRP'){
            $remarks = 'DRP';
            $fgrade = 'DRP';
            $equi = 'DRP';
            $this->Egrade_model->updateGradeCollege($studentsubjectID,$remarks,$fgrade,$equi);
            $this->session->set_flashdata('gradeupdated','The student has been updated');
        }elseif(empty($Prelim) or empty($Midterm) or empty($Finals)){
            $this->session->set_flashdata('ErrorInput','The student has been updated');
        }else{
            $this->session->set_flashdata('ErrorInput','The student has been updated');
        }

        redirect('viewclasssubjectsstudentscol/'.$_SESSION['$curriculumID'].'/'.$_SESSION['$subjectID']);

    }











    public function profSeniorhigh(){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'profseniorhigh';
            if(!file_exists(APPPATH.'views/egrade/'.$page.'.php')){
                show_404();
            }else{
                $data['seniorhighProf'] = $this->Egrade_model->profSeniorhigh();
            
                $data['title'] = "Class List"; 
                $this->load->view('templates/header',$data);
                $this->load->view('egrade/'.$page, $data);
                $this->load->view('templates/footer');
            }
        }else{
            redirect(base_url());
        }
    }




    public function viewClassSubjectsSeniorhigh($teacherID){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'profseniorhighsubjects';
            if(!file_exists(APPPATH.'views/egrade/'.$page.'.php')){
                show_404();
            }else{

                $data['viewSY'] = $this->Egrade_model->viewSYSeniorhigh();
                $data['viewSem'] = $this->Egrade_model->viewSemSeniorhigh();
                $data['prof'] = $this->Egrade_model->getInstructor($teacherID);
                $data['Teacher'] = $data['prof']['FullName'];

                $data['teacherID'] = $teacherID;
                
                $sy = $this->input->post('sy');
                $sem = $this->input->post('sem');

                if(!empty($sy) and !empty($sem)){
                    $data['seniorhighProfSubjects'] = $this->Egrade_model->seniorhighProfSubjects($teacherID,$sy,$sem);
                }else{
                    $data['seniorhighProfSubjects'] = array(
                        array('subjectDesc' => '',
                        'subjectID' => '',
                        'curriculumID' => '',
                        'CourseDesc' => '',
                        'Year' => '',
                        'Section' => '',
                        'Sem' => '')
                    );
                }

                $data['title'] = "Class List"; 
                $this->load->view('templates/header',$data);
                $this->load->view('egrade/'.$page, $data);
                $this->load->view('templates/footer');
            }
        }else{
            redirect(base_url());
        }
    }


    public function viewClassSubjectsStudentsSHS($curriculumID,$subjectID){
    
        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'profseniorhighsubjectsseniorhigh';
            if(!file_exists(APPPATH.'views/egrade/'.$page.'.php')){
                show_404();
            }else{
                $_SESSION['$curriculumID'] = $curriculumID;
                $_SESSION['$subjectID'] = $subjectID;
    
                $data['subject'] = $this->Teacher_model->seniorhighClassName($subjectID);
                $data['SubjectName'] = $data['subject']['subjectDesc'];
                $data['title'] = $data['SubjectName'];
    
                $dt = $this->Teacher_model->isEncodinggs();
                $data['encoding'] = $dt['Encoding'];
    
    
                $data['seniorhighclasslist'] = $this->Egrade_model->seniorhighClassList($curriculumID,$subjectID);
    
                $this->load->view('templates/header',$data);
                $this->load->view('egrade/'.$page, $data);
                $this->load->view('templates/footer');
            }
        }else{
            redirect(base_url());
        }

    }



    public function updateSubjectGradeSeniorhigh($studentsubjectID){

        $q1 = trim(strtoupper($this->input->post('1q')));
        $q2 = trim(strtoupper($this->input->post('2q')));
        if(is_numeric($q1) and is_numeric($q2)){

            if($q1 < 60 or $q2 < 60 ){
                $this->session->set_flashdata('ErrorInput','The student has been updated');
            }elseif($q1 > 100 or $q2 > 100){
                $this->session->set_flashdata('ErrorInput','The student has been updated');
            }else{
                
                $fgrade = round(($q1 + $q2) / 2) ;

                if($fgrade > 100 or $fgrade < 60){
                    $this->session->set_flashdata('ErrorInput','The student has been updated');
                }elseif($fgrade >= 75 ){
                    $remarks = 'PASSED';
                    $this->Teacher_model->updateGradeSeniorhigh($studentsubjectID,$remarks,$fgrade);
                    $this->session->set_flashdata('gradeupdated','The student has been updated');
                }else{
                    $remarks = 'FAILED';
                    $this->Teacher_model->updateGradeSeniorhigh($studentsubjectID,$remarks,$fgrade);
                    $this->session->set_flashdata('gradeupdated','The student has been updated');
                }

            }
        }elseif($q1 == 'TBT' or $q2 == 'TBT'){
            $remarks = 'TBT';
            $fgrade = 'TBT';
            $this->Egrade_model->updateGradeSeniorhigh($studentsubjectID,$remarks,$fgrade);
            $this->session->set_flashdata('gradeupdated','The student has been updated');
        }elseif($q1 == 'INC' or $q2 == 'INC'){
            $remarks = 'INC';
            $fgrade = 'INC';
            $this->Egrade_model->updateGradeSeniorhigh($studentsubjectID,$remarks,$fgrade);
            $this->session->set_flashdata('gradeupdated','The student has been updated');
        }elseif($q1 == 'FA' or $q2 == 'FA'){
            $remarks = 'FA';
            $fgrade = 'FA';
            $this->Egrade_model->updateGradeSeniorhigh($studentsubjectID,$remarks,$fgrade);
            $this->session->set_flashdata('gradeupdated','The student has been updated');
        }elseif($q1 == 'UW' or $q2 == 'UW'){
            $remarks = 'UW';
            $fgrade = 'UW';
            $this->Egrade_model->updateGradeSeniorhigh($studentsubjectID,$remarks,$fgrade);
            $this->session->set_flashdata('gradeupdated','The student has been updated');
        }elseif($q1 == 'DRP' or $q2 == 'DRP'){
            $remarks = 'DRP';
            $fgrade = 'DRP';
            $this->Egrade_model->updateGradeSeniorhigh($studentsubjectID,$remarks,$fgrade);
            $this->session->set_flashdata('gradeupdated','The student has been updated');
        }elseif(empty($q1) or empty($q2)){
            $this->session->set_flashdata('ErrorInput','The student has been updated');
        }else{
            $this->session->set_flashdata('ErrorInput','The student has been updated');
        }
        redirect('viewclasssubjectsstudentsshs/'.$_SESSION['$curriculumID'].'/'.$_SESSION['$subjectID']);

    }

    
    


    

    













    public function profJuniorhigh(){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'profjuniorhigh';
            if(!file_exists(APPPATH.'views/egrade/'.$page.'.php')){
                show_404();
            }else{
                $data['juniorhighProf'] = $this->Egrade_model->profJuniorhigh();
            
                $data['title'] = "Class List"; 
                $this->load->view('templates/header',$data);
                $this->load->view('egrade/'.$page, $data);
                $this->load->view('templates/footer');
            }
        }else{
            redirect(base_url());
        }
    }

    
    public function viewClassSubjectsJuniorhigh($teacherID){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'profjuniorhighsubjects';
            if(!file_exists(APPPATH.'views/egrade/'.$page.'.php')){
                show_404();
            }else{

                $data['viewSY'] = $this->Egrade_model->viewSYJuniorhigh();
                $data['prof'] = $this->Egrade_model->getInstructor($teacherID);
                $data['Teacher'] = $data['prof']['FullName'];

                $data['teacherID'] = $teacherID;
                
                $sy = $this->input->post('sy');


                if(!empty($sy)){
                    $data['seniorhighProfSubjects'] = $this->Egrade_model->juniorhighProfSubjects($teacherID,$sy);
                }else{
                    $data['seniorhighProfSubjects'] = array(
                        array('subjectDesc' => '',
                        'subjectID' => '',
                        'curriculumID' => '',
                        'CourseDesc' => '',
                        'Year' => '',
                        'Section' => '',
                        'Sem' => '')
                    );
                }

                $data['title'] = "Class List"; 
                $this->load->view('templates/header',$data);
                $this->load->view('egrade/'.$page, $data);
                $this->load->view('templates/footer');
            }
        }else{
            redirect(base_url());
        }
    }


    public function viewClassSubjectsStudentsJHS($curriculumID,$subjectID){
    
        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'profjuniorhighsubjectsjuniorhigh';
            if(!file_exists(APPPATH.'views/egrade/'.$page.'.php')){
                show_404();
            }else{
                $_SESSION['$curriculumID'] = $curriculumID;
                $_SESSION['$subjectID'] = $subjectID;
    
                $data['subject'] = $this->Teacher_model->juniorhighClassName($subjectID);
                $data['SubjectName'] = $data['subject']['subjectDesc'];
                $data['title'] = $data['SubjectName'];
    
                $dt = $this->Teacher_model->isEncodinggs();
                $data['encoding'] = $dt['Encoding'];
    
    
                $data['seniorhighclasslist'] = $this->Egrade_model->juniorhighClassList($curriculumID,$subjectID);
    
                $this->load->view('templates/header',$data);
                $this->load->view('egrade/'.$page, $data);
                $this->load->view('templates/footer');
            }
        }else{
            redirect(base_url());
        }

    }

    public function updateSubjectGradeJuniorhigh($studentsubjectID){

        $g1 = trim(strtoupper($this->input->post('g1')));
        $g2 = trim(strtoupper($this->input->post('g2')));
        $g3 = trim(strtoupper($this->input->post('g3')));
        $g4 = trim(strtoupper($this->input->post('g4')));
        if(is_numeric($g1) and is_numeric($g2) and is_numeric($g3) and is_numeric($g4)){

            if($g1 < 65 or $g2 < 65 or $g3 < 65 or $g4 < 65 ){
                $this->session->set_flashdata('ErrorInput','The student has been updated');
            }elseif($g1 > 100 or $g2 > 100 or $g3 > 100 or $g4 > 100){
                $this->session->set_flashdata('ErrorInput','The student has been updated');
            }else{
                
                $fgrade = round(($g1 + $g2 + $g3 + $g4) / 4 );

                if($fgrade > 100 or $fgrade < 60){
                    $this->session->set_flashdata('ErrorInput','The student has been updated');
                }elseif($fgrade >= 75 ){
                    $remarks = 'PASSED';
                    $this->Teacher_model->updateGradeJuniorhigh($studentsubjectID,$remarks,$fgrade);
                    $this->session->set_flashdata('gradeupdated','The student has been updated');
                }else{
                    $remarks = 'FAILED';
                    $this->Teacher_model->updateGradeJuniorhigh($studentsubjectID,$remarks,$fgrade);
                    $this->session->set_flashdata('gradeupdated','The student has been updated');
                }
            }
        }elseif($g1 == 'TBT' or $g2 == 'TBT' or $g3 == 'TBT' or $g4 == 'TBT' ){
            $remarks = 'TBT';
            $fgrade = 'TBT';
            $this->Teacher_model->updateGradeJuniorhigh($studentsubjectID,$remarks,$fgrade);
            $this->session->set_flashdata('gradeupdated','The student has been updated');
        }elseif(empty($g1) or empty($g2) or empty($g3) or empty($g4)){
            $this->session->set_flashdata('ErrorInput','The student has been updated');
        }else{
            $this->session->set_flashdata('ErrorInput','The student has been updated');
        }
        redirect('viewclasssubjectsstudentsjhs/'.$_SESSION['$curriculumID'].'/'.$_SESSION['$subjectID']);

    }



























    
    public function profGradeschool(){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'profgradeschool';
            if(!file_exists(APPPATH.'views/egrade/'.$page.'.php')){
                show_404();
            }else{
                $data['gradeschoolProf'] = $this->Egrade_model->profGradeschool();
            
                $data['title'] = "Class List"; 
                $this->load->view('templates/header',$data);
                $this->load->view('egrade/'.$page, $data);
                $this->load->view('templates/footer');
            }
        }else{
            redirect(base_url());
        }
    }

    


    public function viewClassSubjectsGradeschool($teacherID){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'profgradeschoolsubjects';
            if(!file_exists(APPPATH.'views/egrade/'.$page.'.php')){
                show_404();
            }else{

                $data['viewSY'] = $this->Egrade_model->viewSYGradeschool();
                $data['prof'] = $this->Egrade_model->getInstructor($teacherID);
                $data['Teacher'] = $data['prof']['FullName'];

                $data['teacherID'] = $teacherID;
                
                $sy = $this->input->post('sy');

                if(!empty($sy)){
                    $data['gradeschoolProfSubjects'] = $this->Egrade_model->gradeschoolProfSubjects($teacherID,$sy);
                }else{
                    $data['gradeschoolProfSubjects'] = array(
                        array('subjectDesc' => '',
                        'subjectID' => '',
                        'curriculumID' => '',
                        'CourseDesc' => '',
                        'Year' => '',
                        'Section' => '',
                        'Sem' => '')
                    );
                }

                $data['title'] = "Class List"; 
                $this->load->view('templates/header',$data);
                $this->load->view('egrade/'.$page, $data);
                $this->load->view('templates/footer');
            }
        }else{
            redirect(base_url());
        }
    }


    public function viewClassSubjectsStudentsGS($curriculumID,$subjectID){
    
        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'profgradeschoolsubjectsgradeschool';
            if(!file_exists(APPPATH.'views/egrade/'.$page.'.php')){
                show_404();
            }else{
                $_SESSION['$curriculumID'] = $curriculumID;
                $_SESSION['$subjectID'] = $subjectID;

                $data['subject'] = $this->Teacher_model->gradeschoolClassName($subjectID);
                $data['SubjectName'] = $data['subject']['subjectDesc'];
                $data['title'] = $data['SubjectName'];

                $dt = $this->Teacher_model->isEncodinggs();
                $data['encoding'] = $dt['Encoding'];


                $data['seniorhighclasslist'] = $this->Egrade_model->gradeschoolClassList($curriculumID,$subjectID);

                $this->load->view('templates/header',$data);
                $this->load->view('egrade/'.$page, $data);
                $this->load->view('templates/footer');
            }
            
        }else{
            redirect(base_url());
        }

    }

    public function updateSubjectGradeGradeschool($studentsubjectID,$subjectID){

        $year = trim(strtoupper($this->input->post('year')));


        if($year == 'GRADE 1'){
            if($subjectID == '651'){
                $g3 = trim(strtoupper($this->input->post('g3')));
                $g4 = trim(strtoupper($this->input->post('g4')));
                if(is_numeric($g3) and is_numeric($g4)){
                    if($g3 < 65 or $g4 < 65 ){
                        $this->session->set_flashdata('ErrorInput','The student has been updated');
                    }elseif($g3 > 100 or $g4 > 100){
                        $this->session->set_flashdata('ErrorInput','The student has been updated');
                    }else{
            
                        $fgrade = round(( $g3 + $g4) / 2 );
                        if($fgrade > 100 or $fgrade < 60){
                            $this->session->set_flashdata('ErrorInput','The student has been updated');
                        }elseif($fgrade >= 75 ){
                            $remarks = 'PASSED';
                            $this->Teacher_model->updateGradeGradeschool($studentsubjectID,$remarks,$fgrade);
                            $this->session->set_flashdata('gradeupdated','The student has been updated');
                        }else{
                            $remarks = 'FAILED';
                            $this->Teacher_model->updateGradeGradeschool($studentsubjectID,$remarks,$fgrade);
                            $this->session->set_flashdata('gradeupdated','The student has been updated');
                        }
                    }
                }elseif($g3 == 'TBT' or $g4 == 'TBT'){
                    $remarks = 'TBT';
                    $fgrade = 'TBT';
                    $this->Teacher_model->updateGradeGradeschool($studentsubjectID,$remarks,$fgrade);
                    $this->session->set_flashdata('gradeupdated','The student has been updated');
                }elseif(empty($g3) or empty($g4)){
                    $this->session->set_flashdata('ErrorInput','The student has been updated');
                }else{
                    $this->session->set_flashdata('ErrorInput','The student has been updated');
                }
                redirect('viewclasssubjectsstudentsgs/'.$_SESSION['$curriculumID'].'/'.$_SESSION['$subjectID']);

            }elseif($subjectID ==='650'){

                $g2 = trim(strtoupper($this->input->post('g2')));
                $g3 = trim(strtoupper($this->input->post('g3')));
                $g4 = trim(strtoupper($this->input->post('g4')));
                if(is_numeric($g2) and is_numeric($g3) and is_numeric($g4)){

                    if($g2 < 65 or $g3 < 65 or $g4 < 65 ){
                        $this->session->set_flashdata('ErrorInput','The student has been updated');
                    }elseif($g2 > 100 or $g3 > 100 or $g4 > 100){
                        $this->session->set_flashdata('ErrorInput','The student has been updated');
                    }else{
                        
                        $fgrade = round(($g2 + $g3 + $g4) / 3 );

                        if($fgrade > 100 or $fgrade < 60){
                            $this->session->set_flashdata('ErrorInput','The student has been updated');
                        }elseif($fgrade >= 75 ){
                            $remarks = 'PASSED';
                            $this->Teacher_model->updateGradeGradeschool($studentsubjectID,$remarks,$fgrade);
                            $this->session->set_flashdata('gradeupdated','The student has been updated');
                        }else{
                            $remarks = 'FAILED';
                            $this->Teacher_model->updateGradeGradeschool($studentsubjectID,$remarks,$fgrade);
                            $this->session->set_flashdata('gradeupdated','The student has been updated');
                        }
                    }
                }elseif($g2 == 'TBT' or $g3 == 'TBT' or $g4 == 'TBT'){
                    $remarks = 'TBT';
                    $fgrade = 'TBT';
                    $this->Teacher_model->updateGradeGradeschool($studentsubjectID,$remarks,$fgrade);
                    $this->session->set_flashdata('gradeupdated','The student has been updated');
                }elseif(empty($g2) or empty($g3) or empty($g4)){
                    $this->session->set_flashdata('ErrorInput','The student has been updated');
                }else{
                    $this->session->set_flashdata('ErrorInput','The student has been updated');
                }
                redirect('viewclasssubjectsstudentsgs/'.$_SESSION['$curriculumID'].'/'.$_SESSION['$subjectID']);

            }else{
                $g1 = trim(strtoupper($this->input->post('g1')));
                $g2 = trim(strtoupper($this->input->post('g2')));
                $g3 = trim(strtoupper($this->input->post('g3')));
                $g4 = trim(strtoupper($this->input->post('g4')));
                if(is_numeric($g1) and is_numeric($g2) and is_numeric($g3) and is_numeric($g4)){

                    if($g1 < 65 or $g2 < 65 or $g3 < 65 or $g4 < 65 ){
                        $this->session->set_flashdata('ErrorInput','The student has been updated');
                    }elseif($g1 > 100 or $g2 > 100 or $g3 > 100 or $g4 > 100){
                        $this->session->set_flashdata('ErrorInput','The student has been updated');
                    }else{
                        
                        $fgrade = round(($g1 + $g2 + $g3 + $g4) / 4 );

                        if($fgrade > 100 or $fgrade < 60){
                            $this->session->set_flashdata('ErrorInput','The student has been updated');
                        }elseif($fgrade >= 75 ){
                            $remarks = 'PASSED';
                            $this->Teacher_model->updateGradeGradeschool($studentsubjectID,$remarks,$fgrade);
                            $this->session->set_flashdata('gradeupdated','The student has been updated');
                        }else{
                            $remarks = 'FAILED';
                            $this->Teacher_model->updateGradeGradeschool($studentsubjectID,$remarks,$fgrade);
                            $this->session->set_flashdata('gradeupdated','The student has been updated');
                        }
                    }
                }elseif($g1 == 'TBT' or $g2 == 'TBT' or $g3 == 'TBT' or $g4 == 'TBT'){
                    $remarks = 'TBT';
                    $fgrade = 'TBT';
                    $this->Teacher_model->updateGradeGradeschool($studentsubjectID,$remarks,$fgrade);
                    $this->session->set_flashdata('gradeupdated','The student has been updated');
                }elseif(empty($g1) or empty($g2) or empty($g3) or empty($g4)){
                    $this->session->set_flashdata('ErrorInput','The student has been updated');
                }else{
                    $this->session->set_flashdata('ErrorInput','The student has been updated');
                }
                redirect('viewclasssubjectsstudentsgs/'.$_SESSION['$curriculumID'].'/'.$_SESSION['$subjectID']);
            }
        }elseif($year == 'KINDER I' or $year == 'KINDER II'){


            $g1 = trim(strtoupper($this->input->post('g1')));
            $g2 = trim(strtoupper($this->input->post('g2')));
            $g3 = trim(strtoupper($this->input->post('g3')));
            $g4 = trim(strtoupper($this->input->post('g4')));
            $fgrade = trim(strtoupper($this->input->post('grade')));
            $remarks = trim(strtoupper($this->input->post('remarks')));

            if(is_numeric($g1) or is_numeric($g2) or is_numeric($g3) or is_numeric($g4)){
                $this->session->set_flashdata('ErrorInput','The student has been updated');
            }else{
                $this->Teacher_model->updateGradeGradeschool($studentsubjectID,$remarks,$fgrade);
                $this->session->set_flashdata('gradeupdated','The student has been updated');
            }
            redirect('viewclasssubjectsstudentsgs/'.$_SESSION['$curriculumID'].'/'.$_SESSION['$subjectID']);
        
        }else{

            $g1 = trim(strtoupper($this->input->post('g1')));
            $g2 = trim(strtoupper($this->input->post('g2')));
            $g3 = trim(strtoupper($this->input->post('g3')));
            $g4 = trim(strtoupper($this->input->post('g4')));
            if(is_numeric($g1) and is_numeric($g2) and is_numeric($g3) and is_numeric($g4)){

                if($g1 < 65 or $g2 < 65 or $g3 < 65 or $g4 < 65 ){
                    $this->session->set_flashdata('ErrorInput','The student has been updated');
                }elseif($g1 > 100 or $g2 > 100 or $g3 > 100 or $g4 > 100){
                    $this->session->set_flashdata('ErrorInput','The student has been updated');
                }else{
                    
                    $fgrade = round(($g1 + $g2 + $g3 + $g4) / 4 );

                    if($fgrade > 100 or $fgrade < 60){
                        $this->session->set_flashdata('ErrorInput','The student has been updated');
                    }elseif($fgrade >= 75 ){
                        $remarks = 'PASSED';
                        $this->Teacher_model->updateGradeGradeschool($studentsubjectID,$remarks,$fgrade);
                        $this->session->set_flashdata('gradeupdated','The student has been updated');
                    }else{
                        $remarks = 'FAILED';
                        $this->Teacher_model->updateGradeGradeschool($studentsubjectID,$remarks,$fgrade);
                        $this->session->set_flashdata('gradeupdated','The student has been updated');
                    }
                }
            }elseif($g1 == 'TBT' or $g2 == 'TBT' or $g3 == 'TBT' or $g4 == 'TBT'){
                $remarks = 'TBT';
                $fgrade = 'TBT';
                $this->Teacher_model->updateGradeGradeschool($studentsubjectID,$remarks,$fgrade);
                $this->session->set_flashdata('gradeupdated','The student has been updated');
            }elseif(empty($g1) or empty($g2) or empty($g3) or empty($g4)){
                $this->session->set_flashdata('ErrorInput','The student has been updated');
            }else{
                $this->session->set_flashdata('ErrorInput','The student has been updated');
            }
            redirect('viewclasssubjectsstudentsgs/'.$_SESSION['$curriculumID'].'/'.$_SESSION['$subjectID']);
            
        }

        
    }


    
    



    


    
    










    

}
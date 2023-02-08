<?php
class Teacher_controller extends CI_Controller{
    

    // COLLEGE PART
    public function mySubjectCollege(){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'myclasscollege';
            if(!file_exists(APPPATH.'views/teacher/'.$page.'.php')){
                show_404();
            }else{
                $data['title'] = "College Class";
                $data['collegeclass'] = $this->Teacher_model->collegeClass();
                $this->load->view('templates/header',$data);
                $this->load->view('teacher/'.$page, $data);
                $this->load->view('templates/footer');
            }

        }else{
            redirect(base_url());
        }

    }



    public function collegeClassList($curriculumID,$subjectID,$subjectDesc,$course){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'collegeclasslist';
            if(!file_exists(APPPATH.'views/teacher/'.$page.'.php')){
                show_404();
            }else{
                $_SESSION['$curriculumID'] = $curriculumID;
                $_SESSION['$subjectID'] = $subjectID;

                $data['curriID'] = $curriculumID;
                $data['subID'] = $subjectID;
                $data['subjectDesc'] = $subjectDesc;
                $data['course'] = $course;
                $_SESSION['subjectDesc'] = $subjectDesc;
                $_SESSION['course'] = $course;

                $data['subject'] = $this->Teacher_model->collegeClassName($subjectID);
                $data['SubjectName'] = $data['subject']['subjectDesc'];
                $data['title'] = $data['SubjectName'];

                $dt = $this->Teacher_model->isEncodingc();
                $data['encoding'] = $dt['Encoding'];


                $data['collegeclasslist'] = $this->Teacher_model->collegeClassList($curriculumID,$subjectID);

                $this->load->view('templates/header',$data);
                $this->load->view('teacher/'.$page, $data);
                $this->load->view('templates/footer');
            }
        
        }else{
            redirect(base_url());
        }
    }

    public function updateGradeCollege($studentsubjectID){

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
            $this->Teacher_model->updateGradeCollege($studentsubjectID,$remarks,$fgrade,$equi);
            $this->session->set_flashdata('gradeupdated','The student has been updated');
        }elseif($Prelim == 'INC' or $Midterm == 'INC' or $Finals == 'INC'){
            $remarks = 'INC';
            $fgrade = 'INC';
            $equi = 'INC';
            $this->Teacher_model->updateGradeCollege($studentsubjectID,$remarks,$fgrade,$equi);
            $this->session->set_flashdata('gradeupdated','The student has been updated');
        }elseif($Prelim == 'FA' or $Midterm == 'FA' or $Finals == 'FA'){
            $remarks = 'FA';
            $fgrade = 'FA';
            $equi = 'FA';
            $this->Teacher_model->updateGradeCollege($studentsubjectID,$remarks,$fgrade,$equi);
            $this->session->set_flashdata('gradeupdated','The student has been updated');
        }elseif($Prelim == 'UW' or $Midterm == 'UW' or $Finals == 'UW'){
            $remarks = 'UW';
            $fgrade = 'UW';
            $equi = 'UW';
            $this->Teacher_model->updateGradeCollege($studentsubjectID,$remarks,$fgrade,$equi);
            $this->session->set_flashdata('gradeupdated','The student has been updated');
        }elseif($Prelim == 'DRP' or $Midterm == 'DRP' or $Finals == 'DRP'){
            $remarks = 'DRP';
            $fgrade = 'DRP';
            $equi = 'DRP';
            $this->Teacher_model->updateGradeCollege($studentsubjectID,$remarks,$fgrade,$equi);
            $this->session->set_flashdata('gradeupdated','The student has been updated');
        }elseif(empty($Prelim) or empty($Midterm) or empty($Finals)){
            $this->session->set_flashdata('ErrorInput','The student has been updated');
        }else{
            $this->session->set_flashdata('ErrorInput','The student has been updated');
        }

        redirect('collegeclasslist/'.$_SESSION['$curriculumID'].'/'.$_SESSION['$subjectID']);

    }

    public function teacherexportclasslistcollege($curriculumID,$subjectID,$subjectDesc,$course){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'teachercollegeclasslist';
            if(!file_exists(APPPATH.'views/reports/'.$page.'.php')){
                show_404();
            }else{

                $data['subject'] = $subjectDesc;
                $data['course'] = $course;
                $data['collegeclasslist'] = $this->Deans_model->exportClassListCollege($curriculumID,$subjectID);
                
                $this->load->view('reports/'.$page, $data);
    
            }
        }else{
            redirect(base_url());
        }

    }



































    // SHS PPART
    public function mySubjectSeniorhigh(){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'myclassseniorhigh';
            if(!file_exists(APPPATH.'views/teacher/'.$page.'.php')){
                show_404();
            }else{
                $data['title'] = "Senior High Class";

                $data['seniorhighclass'] = $this->Teacher_model->seniorhighClass();
                $this->load->view('templates/header',$data);
                $this->load->view('teacher/'.$page, $data);
                $this->load->view('templates/footer');
            }
        
        }else{
            redirect(base_url());
        }

    }



    public function seniorhighClassList($curriculumID,$subjectID){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'seniorhighclasslist';
            if(!file_exists(APPPATH.'views/teacher/'.$page.'.php')){
                show_404();
            }else{
                $_SESSION['$curriculumID'] = $curriculumID;
                $_SESSION['$subjectID'] = $subjectID;

                $data['subject'] = $this->Teacher_model->seniorhighClassName($subjectID);
                $data['SubjectName'] = $data['subject']['subjectDesc'];
                $data['title'] = $data['SubjectName'];

                $dt = $this->Teacher_model->isEncodingshs();
                $data['encoding'] = $dt['Encoding'];

                $data['seniorhighclasslist'] = $this->Teacher_model->seniorhighClassList($curriculumID,$subjectID);

                $this->load->view('templates/header',$data);
                $this->load->view('teacher/'.$page, $data);
                $this->load->view('templates/footer');
            }
        
        }else{
            redirect(base_url());
        }
    }


    public function updateGradeSeniorhigh($studentsubjectID){

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
            $this->Teacher_model->updateGradeSeniorhigh($studentsubjectID,$remarks,$fgrade);
            $this->session->set_flashdata('gradeupdated','The student has been updated');
        }elseif($q1 == 'INC' or $q2 == 'INC'){
            $remarks = 'INC';
            $fgrade = 'INC';
            $this->Teacher_model->updateGradeSeniorhigh($studentsubjectID,$remarks,$fgrade);
            $this->session->set_flashdata('gradeupdated','The student has been updated');
        }elseif($q1 == 'FA' or $q2 == 'FA'){
            $remarks = 'FA';
            $fgrade = 'FA';
            $this->Teacher_model->updateGradeSeniorhigh($studentsubjectID,$remarks,$fgrade);
            $this->session->set_flashdata('gradeupdated','The student has been updated');
        }elseif($q1 == 'UW' or $q2 == 'UW'){
            $remarks = 'UW';
            $fgrade = 'UW';
            $this->Teacher_model->updateGradeSeniorhigh($studentsubjectID,$remarks,$fgrade);
            $this->session->set_flashdata('gradeupdated','The student has been updated');
        }elseif($q1 == 'DRP' or $q2 == 'DRP'){
            $remarks = 'DRP';
            $fgrade = 'DRP';
            $this->Teacher_model->updateGradeSeniorhigh($studentsubjectID,$remarks,$fgrade);
            $this->session->set_flashdata('gradeupdated','The student has been updated');
        }elseif(empty($q1) or empty($q2)){
            $this->session->set_flashdata('ErrorInput','The student has been updated');
        }else{
            $this->session->set_flashdata('ErrorInput','The student has been updated');
        }
        redirect('seniorhighclasslist/'.$_SESSION['$curriculumID'].'/'.$_SESSION['$subjectID']);

    }



































    

    public function mySubjectJuniorhigh(){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'myclassjuniorhigh';
            if(!file_exists(APPPATH.'views/teacher/'.$page.'.php')){
                show_404();
            }else{
                $data['title'] = "Junior High Class";

                $data['seniorhighclass'] = $this->Teacher_model->juniorhighClass();
                $this->load->view('templates/header',$data);
                $this->load->view('teacher/'.$page, $data);
                $this->load->view('templates/footer');
            }
        }else{
            redirect(base_url());
        }

    }


    

    public function juniorhighClassList($curriculumID,$subjectID){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'juniorhighclasslist';
            if(!file_exists(APPPATH.'views/teacher/'.$page.'.php')){
                show_404();
            }else{
                $_SESSION['$curriculumID'] = $curriculumID;
                $_SESSION['$subjectID'] = $subjectID;

                $data['subject'] = $this->Teacher_model->juniorhighClassName($subjectID);
                $data['SubjectName'] = $data['subject']['subjectDesc'];
                $data['title'] = $data['SubjectName'];

                $dt = $this->Teacher_model->isEncodingjhs();
                $data['encoding'] = $dt['Encoding'];

                $data['juniorhighclasslist'] = $this->Teacher_model->juniorhighClassList($curriculumID,$subjectID);

                $this->load->view('templates/header',$data);
                $this->load->view('teacher/'.$page, $data);
                $this->load->view('templates/footer');
            }
        }else{
            redirect(base_url());
        }
    }


    public function updateGradeJuniorhigh($studentsubjectID){

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

                $fgrade = 'TBT';

                if($fgrade > 100 or $fgrade < 60){
                    $this->session->set_flashdata('ErrorInput','The student has been updated');
                }elseif($fgrade >= 75 ){
                    $remarks = 'TBT';
                    $this->Teacher_model->updateGradeJuniorhigh($studentsubjectID,$remarks,$fgrade);
                    $this->session->set_flashdata('gradeupdated','The student has been updated');
                }else{
                    $remarks = 'TBT';
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
        redirect('juniorhighclasslist/'.$_SESSION['$curriculumID'].'/'.$_SESSION['$subjectID']);

    }








    public function mySubjectGradeschool(){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'myclassgradeschool';
            if(!file_exists(APPPATH.'views/teacher/'.$page.'.php')){
                show_404();
            }else{
                $data['title'] = "Junior High Class";
                $data['seniorhighclass'] = $this->Teacher_model->gradeschoolClass();
                $this->load->view('templates/header',$data);
                $this->load->view('teacher/'.$page, $data);
                $this->load->view('templates/footer');
            }

            
        
        }else{
            redirect(base_url());
        }

    }
    

    public function gradeschoolClassList($curriculumID,$subjectID){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'gradeschoolclasslist';
            if(!file_exists(APPPATH.'views/teacher/'.$page.'.php')){
                show_404();
            }else{
                $_SESSION['$curriculumID'] = $curriculumID;
                $_SESSION['$subjectID'] = $subjectID;
    
                $data['subject'] = $this->Teacher_model->gradeschoolClassName($subjectID);
                $data['SubjectName'] = $data['subject']['subjectDesc'];
                $data['title'] = $data['SubjectName'];
    
                $dt = $this->Teacher_model->isEncodinggs();
                $data['encoding'] = $dt['Encoding'];
    
                $data['gradeschoolclasslist'] = $this->Teacher_model->gradeschoolClassList($curriculumID,$subjectID);
    
                $this->load->view('templates/header',$data);
                $this->load->view('teacher/'.$page, $data);
                $this->load->view('templates/footer');
            }
        }else{
            redirect(base_url());
        }
    }


    
    
    public function updateGradeGradeschool($studentsubjectID,$subjectID){

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
                redirect('gradeschoolclasslist/'.$_SESSION['$curriculumID'].'/'.$_SESSION['$subjectID']);

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
                redirect('gradeschoolclasslist/'.$_SESSION['$curriculumID'].'/'.$_SESSION['$subjectID']);

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
                redirect('gradeschoolclasslist/'.$_SESSION['$curriculumID'].'/'.$_SESSION['$subjectID']);
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
            redirect('gradeschoolclasslist/'.$_SESSION['$curriculumID'].'/'.$_SESSION['$subjectID']);
        
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
            redirect('gradeschoolclasslist/'.$_SESSION['$curriculumID'].'/'.$_SESSION['$subjectID']);
            
        }

        

    }
    

    






    
}
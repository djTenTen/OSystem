<?php
class Login_controller extends CI_Controller{

    public function login(){

        $page = 'login';

        if(!file_exists(APPPATH.'views/login/'.$page.'.php')){
            show_404();
        }else{
            $data['title'] = "Login";
            $this->load->view('login/'.$page, $data);
        }
       
    }
    
    public function authenticate(){

        $u = $this->input->post('un');
        $p = $this->input->post('pss');

        $result = $this->Login_model->authenticate($u,$p);

        if($result != null){
            // USER INFO
            $data['login'] = $result;
            $data['FullName'] = $data['login']['FullName'];
            $data['LastName'] = $data['login']['LastName'];
            $data['Position'] = $data['login']['pos'];
            $data['uID'] = $data['login']['userID'];
            $data['pss'] = $data['login']['Password'];

            // ACCOUNT RESTRICTION
            $data['Registrar'] = $data['login']['Registrar'];
            $data['Guidance'] = $data['login']['Guidance'];
            $data['Cashier'] = $data['login']['Cashier'];
            $data['Clinic'] = $data['login']['Clinic'];
            $data['Bookstore'] = $data['login']['Bookstore'];
            $data['Accounting'] = $data['login']['Accounting'];
            $data['Humanresource'] = $data['login']['Humanresource'];
            $data['Library'] = $data['login']['Library'];
            $data['Dean'] = $data['login']['Dean'];
            $data['Progchair'] = $data['login']['Progchair'];
            $data['Canteen'] = $data['login']['Canteen'];
            $data['Custodian'] = $data['login']['Custodian'];
            $data['Teacher'] = $data['login']['Teacher'];
            $data['Principal'] = $data['login']['Principal'];
            $data['POD'] = $data['login']['POD'];
            $data['Employee'] =  $data['login']['Employee'];
            $data['Student'] =  $data['login']['Student'];
            $data['Multimedia'] = $data['login']['Multimedia'];
            $data['MIS'] = $data['login']['MIS'];
            $data['President'] = $data['login']['President'];

            //SCHOOL DEPARTMENT RESTRICTION
            $data['Collegedpt'] = $data['login']['Collegedpt'];
            $data['GradeSchooldpt'] = $data['login']['GradeSchooldpt'];
            $data['JuniorHighdpt'] = $data['login']['JuniorHighdpt'];
            $data['SeniorHighdpt'] = $data['login']['SeniorHighdpt'];

            // COLLEGE DEPARTMENT RESTRICTION
            $data['CASED'] = $data['login']['CASED'];
            $data['CBAH'] = $data['login']['CBAH'];
            $data['SCLS'] = $data['login']['SCLS'];
            $data['SCJ'] = $data['login']['SCJ'];

            //SENIOR HIGH DEPARTMENT RESTRICTION
            $data['ABM'] = $data['login']['ABM'];
            $data['HUMMS'] = $data['login']['HUMMS'];
            $data['STEM'] = $data['login']['STEM'];
            $data['TVLHE'] = $data['login']['TVLHE'];
            $data['TVLICT'] = $data['login']['TVLICT'];
            $data['GAS'] = $data['login']['GAS'];

            //ADMIN
            
            $data['Administrator'] = $data['login']['Administrator'];
            $data['Status'] = $data['login']['Status'];

            if (count($result) > 0){

                
                // DATA ON ARRAY
                $sess_data = array('Authentication' => 1,
                'FullName' => $data['FullName'],
                'LastName' => $data['LastName'],
                'Position' => $data['Position'],
                'userid' => $data['uID'],
                'pss' =>  $data['pss'],
                'Registrar' => $data['Registrar'],
                'Guidance' => $data['Guidance'],
                'Cashier' => $data['Cashier'],
                'Clinic' => $data['Clinic'],
                'Bookstore' => $data['Bookstore'],
                'Accounting' => $data['Accounting'],
                'Humanresource' => $data['Humanresource'],
                'Library' => $data['Library'],
                'Dean' => $data['Dean'],
                'Progchair' => $data['Progchair'],
                'Canteen' => $data['Canteen'],
                'Custodian' => $data['Custodian'],
                'Teacher' => $data['Teacher'],
                'Principal' => $data['Principal'],
                'POD' => $data['POD'],
                'Employee' => $data['Employee'],
                'Student' => $data['Student'],
                'Collegedpt' => $data['Collegedpt'],
                'GradeSchooldpt' => $data['GradeSchooldpt'],
                'JuniorHighdpt' => $data['JuniorHighdpt'],
                'SeniorHighdpt' => $data['SeniorHighdpt'],
                'CASED' => $data['CASED'],
                'CBAH' => $data['CBAH'],
                'SCLS' => $data['SCLS'],
                'SCJ' => $data['SCJ'],
                'ABM' => $data['ABM'],
                'HUMMS' => $data['HUMMS'],
                'STEM' => $data['STEM'],
                'TVLHE' => $data['TVLHE'],
                'TVLICT' => $data['TVLICT'],
                'GAS' =>$data['GAS'],
                'President' =>$data['President'],
                'Multimedia' => $data['Multimedia'],
                'MIS' => $data['MIS'],
                'Administrator' => $data['Administrator'],
                'Status' => $data['Status']
            );

                $this->session->set_userdata($sess_data);
                $this->Logs_model->login();
                redirect('dashboard');    
    
            }else{
    
                $this->session->set_flashdata('Login_Failed','login failed');
                redirect(base_url());
    
            }
        }else{
            $this->session->set_flashdata('Login_Failed','login failed');
            redirect(base_url());
        }
    
    }



    public function authenticate2(){

        $u = $this->input->post('un');
        $p = $this->input->post('pss');

        $result = $this->Login_model->authenticate($u,$p);

        if($result != null){
            // USER INFO
            $data['login'] = $result;
            $data['FullName'] = $data['login']['FullName'];
            $data['LastName'] = $data['login']['LastName'];
            $data['Position'] = $data['login']['pos'];
            $data['uID'] = $data['login']['userID'];
            $data['pss'] = $data['login']['Password'];

            // ACCOUNT RESTRICTION
            $data['Registrar'] = $data['login']['Registrar'];
            $data['Guidance'] = $data['login']['Guidance'];
            $data['Cashier'] = $data['login']['Cashier'];
            $data['Clinic'] = $data['login']['Clinic'];
            $data['Bookstore'] = $data['login']['Bookstore'];
            $data['Accounting'] = $data['login']['Accounting'];
            $data['Humanresource'] = $data['login']['Humanresource'];
            $data['Library'] = $data['login']['Library'];
            $data['Dean'] = $data['login']['Dean'];
            $data['Progchair'] = $data['login']['Progchair'];
            $data['Canteen'] = $data['login']['Canteen'];
            $data['Custodian'] = $data['login']['Custodian'];
            $data['Teacher'] = $data['login']['Teacher'];
            $data['Principal'] = $data['login']['Principal'];
            $data['POD'] = $data['login']['POD'];
            $data['Employee'] =  $data['login']['Employee'];
            $data['Student'] =  $data['login']['Student'];
            $data['Multimedia'] = $data['login']['Multimedia'];
            $data['MIS'] = $data['login']['MIS'];
            $data['President'] = $data['login']['President'];

            //SCHOOL DEPARTMENT RESTRICTION
            $data['Collegedpt'] = $data['login']['Collegedpt'];
            $data['GradeSchooldpt'] = $data['login']['GradeSchooldpt'];
            $data['JuniorHighdpt'] = $data['login']['JuniorHighdpt'];
            $data['SeniorHighdpt'] = $data['login']['SeniorHighdpt'];

            // COLLEGE DEPARTMENT RESTRICTION
            $data['CASED'] = $data['login']['CASED'];
            $data['CBAH'] = $data['login']['CBAH'];
            $data['SCLS'] = $data['login']['SCLS'];
            $data['SCJ'] = $data['login']['SCJ'];

            //SENIOR HIGH DEPARTMENT RESTRICTION
            $data['ABM'] = $data['login']['ABM'];
            $data['HUMMS'] = $data['login']['HUMMS'];
            $data['STEM'] = $data['login']['STEM'];
            $data['TVLHE'] = $data['login']['TVLHE'];
            $data['TVLICT'] = $data['login']['TVLICT'];
            $data['GAS'] = $data['login']['GAS'];

            //ADMIN
            
            $data['Administrator'] = $data['login']['Administrator'];
            $data['Status'] = $data['login']['Status'];

            if (count($result) > 0){

                
                // DATA ON ARRAY
                $sess_data = array('Authentication' => 1,
                'FullName' => $data['FullName'],
                'LastName' => $data['LastName'],
                'Position' => $data['Position'],
                'userid' => $data['uID'],
                'pss' =>  $data['pss'],
                'Registrar' => $data['Registrar'],
                'Guidance' => $data['Guidance'],
                'Cashier' => $data['Cashier'],
                'Clinic' => $data['Clinic'],
                'Bookstore' => $data['Bookstore'],
                'Accounting' => $data['Accounting'],
                'Humanresource' => $data['Humanresource'],
                'Library' => $data['Library'],
                'Dean' => $data['Dean'],
                'Progchair' => $data['Progchair'],
                'Canteen' => $data['Canteen'],
                'Custodian' => $data['Custodian'],
                'Teacher' => $data['Teacher'],
                'Principal' => $data['Principal'],
                'POD' => $data['POD'],
                'Employee' => $data['Employee'],
                'Student' => $data['Student'],
                'Collegedpt' => $data['Collegedpt'],
                'GradeSchooldpt' => $data['GradeSchooldpt'],
                'JuniorHighdpt' => $data['JuniorHighdpt'],
                'SeniorHighdpt' => $data['SeniorHighdpt'],
                'CASED' => $data['CASED'],
                'CBAH' => $data['CBAH'],
                'SCLS' => $data['SCLS'],
                'SCJ' => $data['SCJ'],
                'ABM' => $data['ABM'],
                'HUMMS' => $data['HUMMS'],
                'STEM' => $data['STEM'],
                'TVLHE' => $data['TVLHE'],
                'TVLICT' => $data['TVLICT'],
                'GAS' =>$data['GAS'],
                'President' =>$data['President'],
                'Multimedia' => $data['Multimedia'],
                'MIS' => $data['MIS'],
                'Administrator' => $data['Administrator'],
                'Status' => $data['Status']
            );

                $this->session->set_userdata($sess_data);
                $this->Logs_model->login();
                redirect('dashboard');    
    
            }else{
    
                $this->session->set_flashdata('Login_Failed','login failed');
                redirect(base_url());
    
            }
        }else{
            $this->session->set_flashdata('Login_Failed','login failed');
            redirect(base_url());
        }
    
    }

}
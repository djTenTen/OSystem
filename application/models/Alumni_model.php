<?php
class Alumni_model extends CI_Model{

    public function __construct(){
        $this->load->database();
    }

    public function viewAlumni(){
        $query = $this->db->query("select *
        from alumni 
        order by isValidated asc 
        limit 30");
        return $query->result_array();
    }


    public function validateAlumni($ID){
        
        $query = $this->db->query("select FullName,Email from alumni where alumniID = $ID limit 1");
        foreach($query->result_array() as $row){
            $Name = $row['FullName'];
            $Email = $row['Email'];
        }

        
        $config = array(
            'protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'
            'smtp_host' => 'mail.holycrosscollegepampanga.edu.ph', 
            'smtp_port' => 465,
            'smtp_user' => 'verification@holycrosscollegepampanga.edu.ph',
            'smtp_pass' => 'MasterPassword',
            'smtp_crypto' => 'ssl', //can be 'ssl' or 'tls' for example
            'mailtype' => 'text', //plaintext 'text' mails or 'html'
            'smtp_timeout' => '4', //in seconds
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
        );

        
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('verification@holycrosscollegepampanga.edu.ph', "Holy Cross College");
        $this->email->to($Email);  
        $this->email->subject("Email Verification");
        $this->email->message("Dear ".$Name.",\n\nYour Alumni account has been verified, you can now Login to our alumni website and update your profile.\n\n http://192.168.0.254/alumnitracer/\n"."\n\nBest Regards\nHoly Cross College");
        $this->email->send();

        $studentno = $this->input->post('studentnumber');

        $data = array(
            'isValidated' => 'Yes',
            'Studentno' => $studentno
        );
        
        $this->db->where('alumniID', $ID);
        return $this->db->update('alumni', $data);
    }


    public function updateAlumni($ID){

        $ln = trim(strtoupper($this->input->post('lname')));
        $fn = trim(strtoupper($this->input->post('fname')));
        $mn = trim(strtoupper($this->input->post('mname')));
        $FullName = $ln .', '.$fn.' '.$mn;


        $country = trim(strtoupper($this->input->post('country')));
        $province = trim(strtoupper($this->input->post('province')));
        $municipality = trim(strtoupper($this->input->post('municipality')));
        $barangay = trim(strtoupper($this->input->post('barangay')));
        $fullAddress = $barangay.', '.$municipality.', '.$province.', '.$country;

        $username = strtolower($fn.$ln).'@hccpalumni';
        $password = strtolower($ln);


        $data = array(
            "LastName" => trim(strtoupper($this->input->post('lname'))),
            "FirstName" => trim(strtoupper($this->input->post('fname'))),
            "MiddleName" => trim(strtoupper($this->input->post('mname'))),
            "Suffix" => trim(strtoupper($this->input->post('suffix'))),
            "FullName" => $FullName,
            "Username" => $username,
            "Password" => $password,
            "Gender" => $this->input->post('gender'),
            "Birthdate" => $this->input->post('bdate'),
            "Age" => $this->input->post('age'),
            "MaritalStatus" => $this->input->post('status'),
            "Email" => $this->input->post('email'),
            "Contact" => $this->input->post('contact'),
            "Country" => trim(strtoupper($this->input->post('country'))),
            "Province" => trim(strtoupper($this->input->post('province'))),
            "Municipality" => trim(strtoupper($this->input->post('municipality'))),
            "Barangay" => trim(strtoupper($this->input->post('barangay'))),
            "FullAddress" => $fullAddress,

            "EmploymentStatus" => $this->input->post('employeestatus'),
            "Industry" => $this->input->post('industry'),
            "Otherindustry" => trim(ucfirst($this->input->post('otherindustry'))),
            "CompanyName" => trim(strtoupper($this->input->post('companyname'))),
            "Position" => $this->input->post('position'),
            "OtherPosition" => trim(ucfirst($this->input->post('otherposition'))),
            "CompanyAddress" => trim(ucfirst($this->input->post('companyaddress'))),
            "EmployeeStatus" => $this->input->post('empstatus'),
            "BusinessName1" => trim(ucfirst($this->input->post('businessname1'))),
            "BusinessAddress1" => trim(ucfirst($this->input->post('businessaddress1'))),
            "BusinessName2" => trim(ucfirst($this->input->post('businessname2'))),
            "BusinessAddress2" => trim(ucfirst($this->input->post('businessaddress2'))),
            "EducationalAttainment" => trim(ucfirst($this->input->post('hea'))),
            "Achievements" => ucfirst($this->input->post('achievements')),  
            "Alumni" => $this->input->post('alumni'),
            "Course" => trim(ucfirst($this->input->post('course'))),
            "Batch" => $this->input->post('batch'),
        );

        $this->db->where('alumniID',$ID);
        return $this->db->update('alumni',$data);

    }

    public function deleteAlumni($ID){
        $this->db->where('alumniID',$ID);
        return $this->db->delete('alumni');
    }



}
<?php 
class Users_model extends CI_Model{

    public function __construct(){
        $this->load->database();
    }

    //SELECTING MULTIPLE RECORDS
    public function viewUsers(){

        $query = $this->db->query("select *
        from users,positions
        where users.Position = positions.positionID
        order by LastName asc limit 50");
        return $query->result_array();

    }

    public function searchUsers($keyword){

        $query = $this->db->query("select *
        from users,positions
        where users.Position = positions.positionID
        and (LastName like '%$keyword%' or FirstName like '%$keyword%' or Username like '%$keyword%' or FullName like '%$keyword%')");
        return $query->result_array();

    }

    public function viewPositions(){
        $query = $this->db->get('positions');
        return $query->result_array();
    }


    public function insertUser(){

        $ln = strtoupper($this->input->post('lname'));
        $fn = strtoupper($this->input->post('fname'));
        $mn =  strtoupper($this->input->post('mname'));
        $fullname = $ln . ', ' . $fn . ' ' .$mn;


        $data = array(
            'LastName' => strtoupper($this->input->post('lname')),
            'FirstName' => strtoupper($this->input->post('fname')),
            'MiddleName' => strtoupper($this->input->post('mname')),
            'FullName' => strtoupper($fullname),
            'Position' => $this->input->post('position'),
            'UserName' => $this->input->post('username'),
            'Password' => $this->input->post('password'),
            'Registrar' => $this->input->post('registrar'),
            'Guidance' => $this->input->post('guidance'),
            'Cashier' => $this->input->post('cashier'),
            'Clinic' => $this->input->post('clinic'),
            'Bookstore' => $this->input->post('bookstore'),
            'Accounting' => $this->input->post('accounting'),
            'Humanresource' => $this->input->post('humanresource'),
            'Library' => $this->input->post('library'),
            'Dean' => $this->input->post('dean'),
            'Progchair' => $this->input->post('progchair'),
            'Canteen' => $this->input->post('canteen'),
            'Custodian' => $this->input->post('custodian'),
            'Teacher' => $this->input->post('teacher'),
            'Principal' => $this->input->post('principal'),
            'Employee' => $this->input->post('employee'),
            'Student' => $this->input->post('student'),
            'Collegedpt' => $this->input->post('college'),
            'GradeSchooldpt' => $this->input->post('gsdpt'),
            'JuniorHighdpt' => $this->input->post('jhsdpt'),
            'SeniorHighdpt' => $this->input->post('shsdpt'),
            'CASED' => $this->input->post('cased'),
            'CBAH' => $this->input->post('cbah'),
            'SCLS' => $this->input->post('scls'),
            'SCJ' => $this->input->post('scj'),
            'ABM' => $this->input->post('ABM'),
            'HUMMS' => $this->input->post('HUMMS'),
            'STEM' => $this->input->post('STEM'),
            'TVLHE' => $this->input->post('TVLHE'),
            'TVLICT' => $this->input->post('TVLICT'),
            'GAS' => $this->input->post('GAS'),
            //'President' => $this->input->post('president'),
            'Multimedia' => $this->input->post('multimedia'),
            'POD' => $this->input->post('pod'),
            'MIS' => $this->input->post('mis'),
            'Administrator' => $this->input->post('administrator')
        );
        return $this->db->insert('users',$data);
    
    }



    public function updateUser($userID){

        $ln = strtoupper($this->input->post('lname'));
        $fn = strtoupper($this->input->post('fname'));
        $mn =  strtoupper($this->input->post('mname'));
        $fullname = $ln . ', ' . $fn . ' ' .$mn;


        $data = array(
            'LastName' => strtoupper($this->input->post('lname')),
            'FirstName' => strtoupper($this->input->post('fname')),
            'MiddleName' => strtoupper($this->input->post('mname')),
            'FullName' => strtoupper($fullname),
            'Position' => $this->input->post('position'),
            'UserName' => $this->input->post('username'),
            'Password' => $this->input->post('password'),
            'Registrar' => $this->input->post('registrar'),
            'Guidance' => $this->input->post('guidance'),
            'Cashier' => $this->input->post('cashier'),
            'Clinic' => $this->input->post('clinic'),
            'Bookstore' => $this->input->post('bookstore'),
            'Accounting' => $this->input->post('accounting'),
            'Humanresource' => $this->input->post('humanresource'),
            'Library' => $this->input->post('library'),
            'Dean' => $this->input->post('dean'),
            'Progchair' => $this->input->post('progchair'),
            'Canteen' => $this->input->post('canteen'),
            'Custodian' => $this->input->post('custodian'),
            'Teacher' => $this->input->post('teacher'),
            'Principal' => $this->input->post('principal'),
            'Employee' => $this->input->post('employee'),
            'Student' => $this->input->post('student'),
            'Collegedpt' => $this->input->post('college'),
            'GradeSchooldpt' => $this->input->post('gsdpt'),
            'JuniorHighdpt' => $this->input->post('jhsdpt'),
            'SeniorHighdpt' => $this->input->post('shsdpt'),
            'CASED' => $this->input->post('cased'),
            'CBAH' => $this->input->post('cbah'),
            'SCLS' => $this->input->post('scls'),
            'SCJ' => $this->input->post('scj'),
            'ABM' => $this->input->post('ABM'),
            'HUMMS' => $this->input->post('HUMMS'),
            'STEM' => $this->input->post('STEM'),
            'TVLHE' => $this->input->post('TVLHE'),
            'TVLICT' => $this->input->post('TVLICT'),
            'GAS' => $this->input->post('GAS'),
            //'President' => $this->input->post('president'),
            'Multimedia' => $this->input->post('multimedia'),
            'POD' => $this->input->post('pod'),
            'MIS' => $this->input->post('mis'),
            'Administrator' => $this->input->post('administrator')
        );
        $this->db->where('userID', $userID);
        return $this->db->update('users',$data);
    
    }

    public function deleteUser($userID){

        $this->db->where('userID', $userID);
        return $this->db->delete('users');

    }

    public function getUserInfo($userID){
        
        $this->db->where("userID",$userID);
        $query = $this->db->get('users');
        return $query->row_array();

    }

    public function accountsettingsupdate($userID){

        $ln = strtoupper($this->input->post('lname'));
        $fn = strtoupper($this->input->post('fname'));
        $mn =  strtoupper($this->input->post('mname'));
        $fullname = $ln . ', ' . $fn . ' ' .$mn;

        $data = array(
            'LastName' => strtoupper($this->input->post('lname')),
            'FirstName' => strtoupper($this->input->post('fname')),
            'MiddleName' => strtoupper($this->input->post('mname')),
            'FullName' => strtoupper($fullname),
            'Password' => $this->input->post('password'),
        );

        $this->db->where('userID', $userID);
        return $this->db->update('users',$data);

    }

    public function getcourse(){
        $query = $this->db->get('courses');
        return $query->result_array();
    }

}
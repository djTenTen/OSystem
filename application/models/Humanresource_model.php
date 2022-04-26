<?php
class Humanresource_model extends CI_Model{

    public function __construct(){
        $this->load->database();
    }


    public function viewEmployees(){
        $query = $this->db->query("select * from employees");
        return $query->result_array();
    }

    public function viewEmployeesSearch($keyword){
        $query = $this->db->query("select * from employees
        where Name like '%$keyword%'");
        return $query->result_array();
    }


    public function insertEmployee(){

        $ln = trim(strtoupper($this->input->post('lname')));
        $fn = trim(strtoupper($this->input->post('fname')));
        $mn = trim(strtoupper($this->input->post('mname')));

        $fullname = $ln.', '.$fn.' '.$mn;

        $sh = trim(strtoupper($this->input->post('shour')));
        $sm = trim(strtoupper($this->input->post('sminute')));
        $starttime = $sh.':'.$sm.':'.'00';

        $eh = trim(strtoupper($this->input->post('ehour')));
        $em = trim(strtoupper($this->input->post('eminute')));
        $endtime = $eh.':'.$em.':'.'00';
        

        $data = array(
            'rfid' => trim(strtoupper($this->input->post('rfid'))),
            'EmployeeID' => trim(strtoupper($this->input->post('empid'))),
            'Lname' => trim(strtoupper($this->input->post('lname'))),
            'Fname' => trim(strtoupper($this->input->post('fname'))),
            'Mname' => strtoupper($this->input->post('mname')),
            'Name' => $fullname,
            'Department' => strtoupper($this->input->post('department')),
            'Position' => strtoupper($this->input->post('position')),
            'Status' => strtoupper($this->input->post('status')),
            'Address' => strtoupper($this->input->post('address')),
            'Contact' => strtoupper($this->input->post('contact')),
            'setTimeIN' => $starttime,
            'setTimeOUT' => $endtime
        );

        return $this->db->insert('employees',$data);

    }


    public function updateEmployee($empID){

        $ln = trim(strtoupper($this->input->post('lname')));
        $fn = trim(strtoupper($this->input->post('fname')));
        $mn = trim(strtoupper($this->input->post('mname')));

        $fullname = $ln.', '.$fn.' '.$mn;

        $sh = trim(strtoupper($this->input->post('shour')));
        $sm = trim(strtoupper($this->input->post('sminute')));
        $starttime = $sh.':'.$sm.':'.'00';

        $eh = trim(strtoupper($this->input->post('ehour')));
        $em = trim(strtoupper($this->input->post('eminute')));
        $endtime = $eh.':'.$em.':'.'00';
        
        $data = array(
            'rfid' => trim(strtoupper($this->input->post('rfid'))),
            'EmployeeID' => trim(strtoupper($this->input->post('empid'))),
            'Lname' => trim(strtoupper($this->input->post('lname'))),
            'Fname' => trim(strtoupper($this->input->post('fname'))),
            'Mname' => strtoupper($this->input->post('mname')),
            'Name' => $fullname,
            'Department' => $this->input->post('department'),
            'Position' => strtoupper($this->input->post('position')),
            'Status' => strtoupper($this->input->post('status')),
            'Address' => strtoupper($this->input->post('address')),
            'Contact' => strtoupper($this->input->post('contact')),
            'setTimeIN' => $starttime,
            'setTimeOUT' => $endtime

        );

        $this->db->where("empID", $empID);
        return $this->db->update('employees',$data);

    }

    public function deleteEmployee($empID){
        $this->db->where("empID", $empID);
        return $this->db->delete('employees');
    }


    public function viewEmployeeAttendance(){

        $dpt = $this->input->post('dpt');
        $from = $this->input->post('mm').'/'.$this->input->post('dd').'/'.$this->input->post('yy');
        $to =   $this->input->post('mm2').'/'.$this->input->post('dd2').'/'.$this->input->post('yy2');

        $_SESSION['dpt'] = $dpt;
        $_SESSION['from'] = $from;
        $_SESSION['to'] = $to;

        if($dpt == 'All'){
            $query = $this->db->query("select attendance.Name,attendance.Position,DateIN,TimeIN,DateOUT,TimeOUT,DurationH,DurationM,Remarks,Department
            from attendance,employees
            where employees.rfid = attendance.rfid
            and DateIN >='$from' 
            and DateIN<='$to' order by Name asc, AttID");
            return $query->result_array();
        }else{
            $query = $this->db->query("select attendance.Name,attendance.Position,DateIN,TimeIN,DateOUT,TimeOUT,DurationH,DurationM,Remarks,Department
            from attendance,employees
            where employees.rfid = attendance.rfid
            and Department = '$dpt' 
            and DateIN >='$from' 
            and DateIN<='$to' order by Name asc, AttID");
            return $query->result_array();
        }
    }

    public function exportAttendance(){
        
        $dpt = $_SESSION['dpt'];
        $from = $_SESSION['from'];
        $to = $_SESSION['to'];

        if($dpt == 'All'){
            $query = $this->db->query("select attendance.Name,attendance.Position,DateIN,TimeIN,DateOUT,TimeOUT,DurationH,DurationM,Remarks,Department
            from attendance,employees
            where employees.rfid = attendance.rfid
            and DateIN >='$from' 
            and DateIN<='$to' order by Name asc, AttID");
            return $query->result_array();
        }else{
            $query = $this->db->query("select attendance.Name,attendance.Position,DateIN,TimeIN,DateOUT,TimeOUT,DurationH,DurationM,Remarks,Department
            from attendance,employees
            where employees.rfid = attendance.rfid
            and Department = '$dpt' 
            and DateIN >='$from' 
            and DateIN<='$to' order by Name asc, AttID");
            return $query->result_array();
        }
    }




    

}
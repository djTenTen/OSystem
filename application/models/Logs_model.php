<?php 
class Logs_model extends CI_Model{

    public function __construct(){
        $this->load->database();
    }

    public function login(){
        
        $file = fopen('login.txt',"w") or die("Unable to open file!");
        $logmsg = $_SESSION['FullName'].'  -->Login to the system';
        fwrite($file, $logmsg);
        // fclose($file);

    }


}
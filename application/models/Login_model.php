<?php 
class Login_model extends CI_Model{

    protected $users = "users";
    protected $un = "Username";
    protected $pss = "Password";

    public function __construct(){
        $this->load->database();
    }

    public function authenticate($u,$p){

        //$array = array('Username' => $u, 'Password' => $p);
        // $this->db->where("Username = '$u' and Password = '$p'");
        $login = "select *,positions.pos, users.Position from users,positions where BINARY Username = ? and BINARY Password = ? and users.Position = positions.positionID";
        $result = $this->db->query($login, array($u,$p));
        return $result->row_array();

    }



}
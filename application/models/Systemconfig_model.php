<?php
class Systemconfig_model extends CI_Model{

    public function __construct(){
        $this->load->database();
    }


    public function checkEncodingC(){
        $query = $this->db->query("select * from zzzencode where dpt = 'College'");
        return $query->row_array();
    }

    public function checkEncodingS(){
        $query = $this->db->query("select * from zzzencode where dpt = 'Seniorhigh'");
        return $query->row_array();
    }

    public function checkEncodingJ(){
        $query = $this->db->query("select * from zzzencode where dpt = 'Juniorhigh'");
        return $query->row_array();
    }

    public function checkEncodingG(){
        $query = $this->db->query("select * from zzzencode where dpt = 'Gradeschool'");
        return $query->row_array();
    }



    public function checkReleasingC(){
        $query = $this->db->query("select * from zzzrelease where dpt = 'College'");
        return $query->row_array();
    }

    public function checkReleasingS(){
        $query = $this->db->query("select * from zzzrelease where dpt = 'Seniorhigh'");
        return $query->row_array();
    }

    public function checkReleasingJ(){
        $query = $this->db->query("select * from zzzrelease where dpt = 'Juniorhigh'");
        return $query->row_array();
    }

    public function checkReleasingG(){
        $query = $this->db->query("select * from zzzrelease where dpt = 'Gradeschool'");
        return $query->row_array();
    }






















}
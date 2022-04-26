<?php
class Logout_controller extends CI_Controller{

    public function logout(){
        session_destroy();
        redirect(base_url());
    }

}
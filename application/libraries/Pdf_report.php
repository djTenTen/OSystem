<?php

require_once dirname(__file__).'/TCPDF/tcpdf.php';
class Pdf_report extends TCPDF{
    protected $ci;

    public function __construct(){
        $this->ci =& get_instance();
    }

}

<?php

/* Author: Vikash Kumar
 * Organization : Kvmgroupbiz
 * Note : 
 */
class About extends CI_Controller{
    
    
    public function __construct() {
        parent::__construct();
        $this->load->helper('html');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('form_validation');
    }
     public function index()
     {
         $this->load->view('pages/about');
        
     }
}



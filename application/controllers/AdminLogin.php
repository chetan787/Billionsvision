<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class AdminLogin extends CI_Controller{
    
    
    public function __construct() {
        parent::__construct();
        $this->load->helper('html');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('form_validation');
    }
     public function index()
     {
         $this->load->view('pages/Admin_login');
         //echo "hellop";
     }
}


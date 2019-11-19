<?php

/* 
 * Author:Vikash Kumar
 * Organization: Kvmgroupbiz
 * URL: www.kvmgroupbiz.in
 * ----------------------------------------------------------------------------------------
 * Note : This is the Payment Controller for payment activiy of  the user
 * ----------------------------------------------------------------------------------------
 * 
 */

class Payment extends CI_Controller{
    
    /*
     **************************************************************************************************
     * This is the __construct function for loading all required library and helpers and models
     * ************************************************************************************************
    */ 
    
        public function __construct() {
            parent::__construct();
            $this->load->helper('html');
            $this->load->library('session');
            $this->load->helper('url');
            $this->load->library('form_validation');
        }
        
        
        
    /*
     **************************************************************************************************
     * This is the  index function for loading the default payment page for users
     * ************************************************************************************************
    */
    
        public function index()
        {
            $this->load->view('user/user_payment');

        }
        
        
    
     
}

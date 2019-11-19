<?php

/* 
 * Author:Vikash Kumar
 * Organization: Kvmgroupbiz
 * URL: www.kvmgroupbiz.in
 * ----------------------------------------------------------------------------------------
 * Note : This is the AdminDashboard Controller for admin activiy of  the admin
 * ----------------------------------------------------------------------------------------
 * 
 */

class AdminDashboard extends CI_Controller{
    
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
     * This is the  index function for loading the default Login page for users
     * ************************************************************************************************
     */
    
        public function index()
        {
            
            $this->load->view('admin/admin_dashboard');

        }   
      /*  public function show_name()
        {
            $this->load->modal('Admin_model');
            $this->Admin_model->reg_validate()
        } */
}


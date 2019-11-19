<?php

class Emailtempl extends CI_Controller{
    
      public function __construct() {
        parent::__construct();
        $this->load->helper('html');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('form_validation');
    }
    
   public function index(){
         $user_email="";
         if(isset($_SESSION['user_email'])){
             $user_email = $_SESSION['user_email'];
         }
       
                $this->load->model('Register_model');
                $db_user_row=$this->Register_model->load_user_by_email('anujaiswal110@gmail.com');
                $data['data']=$db_user_row;
                $this->load->view('user/email_template',$data);
       
       //$this->load->view('user/email_template');
   } 
    
    
}

?>


<?php

/* 
 * Author:Vikash Kumar
 * Organization: Kvmgroupbiz
 * URL: www.kvmgroupbiz.in
 * ----------------------------------------------------------------------------------------
 * Note : This is the Login Model for user login process
 * ----------------------------------------------------------------------------------------
 * 
 */

class Login_model extends CI_Model{
    
 /* 
  * ----------------------------------------------------------------------------------------
  * This is the login_valid_user function for registration of  the user
  * ----------------------------------------------------------------------------------------
  */
    public function login_valid_user($useremail,$password){
         
       $q= $this->db->where('user_email',$useremail)
                    ->where('user_password',$password)
                    ->get('user');
       if($q->num_rows()){
        // returning user_email of user from rows
            return $q->row()->user_email;
       }else{
           return FALSE;
       }
        
    }
    
    public function fetch_user_type($useremail,$password){
        
        $q=  $this->db->where(['user_email'=>$useremail,'user_password'=>$password])->get('user');
     if($q->num_rows())
     {
         return $q->row()->user_type;
     }
     else{
         return FALSE;
     }
    
    }
    
    public function fetch_user_status($useremail,$password){
        
        $q=  $this->db->where(['user_email'=>$useremail,'user_password'=>$password])->get('user');
     if($q->num_rows())
     {
         return $q->row()->user_status;
     }
     else{
         return FALSE;
     }
    
    }
    
    public function fetch_user_name($useremail,$password){
        
        $q=  $this->db->where(['user_email'=>$useremail,'user_password'=>$password])->get('user');
     if($q->num_rows())
     {
         return $q->row()->user_name;
     }
     else{
         return FALSE;
     }
    
    }
    
    
    
}

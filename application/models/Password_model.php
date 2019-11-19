<?php

/* 
 * Author:Vikash Kumar
 * Organization: Kvmgroupbiz
 * URL: www.kvmgroupbiz.in
 * ----------------------------------------------------------------------------------------
 * Note : This is the Password_Model for user password recovery process
 * ----------------------------------------------------------------------------------------
 * 
 */

class Password_model extends CI_Model{
    
 /* 
  * ----------------------------------------------------------------------------------------
  * This is the password_valid function for password of  the user
  * ----------------------------------------------------------------------------------------
  */
    public function password_valid($useremail,$password){
         
       $q= $this->db->where('user_email',$useremail)
                    ->where('user_password',$password)
                    ->get('user');
       if($q->num_rows()){
        // returning user_password of user from rows
            return $q->row()->user_password;
       }else{
           return FALSE;
       }
        
    }
   
   /* 
  * ----------------------------------------------------------------------------------------
  * This is the password_recover function for recover password of  the user
  * ----------------------------------------------------------------------------------------
  */
    public function password_recover($useremail){
         
       $q= $this->db->where('user_email',$useremail)
                     ->get('user');
                  
       if($q->num_rows()){
        // returning user_password of user from rows
            return $q->row()->user_password;
            //return $q->row()->user_email;
       }else{
           return "FALSE";
       }
        
    } 
    
      /* 
  * ----------------------------------------------------------------------------------------
  * This is the get_user_email function for recover password of  the user
  * ----------------------------------------------------------------------------------------
  */
    public function get_user_email($useremail){
         
       $q= $this->db->where('user_email',$useremail)
                     ->get('user');
                  
       if($q->num_rows()){
        // returning user_password of user from rows
            return $q->row()->user_email;
            //return $q->row()->user_email;
       }else{
           return FALSE;
       }
        
    } 
    
 /* 
  * ----------------------------------------------------------------------------------------
  * This is the update_password function for password update of  the user
  * ----------------------------------------------------------------------------------------
  */
    public function update_password($useremail,$userArray){
         
       $q= $this->db->where('user_email',$useremail)->get('user');
       if($q->num_rows()){
            // returning user_password of user from rows after update
                       $this->db->where('user_email',$useremail)
                       ->update('user',$userArray);
               // returning user_email of user from rows after update
                        $q1= $this->db->where('user_email',$useremail)->get('user');
                        if($q1->num_rows()){
                             return $q1->row()->user_password;   
                        }else{
                             return FALSE;
                        }
                              
                       
          
       }else{
          return FALSE;
       }
        
    }  
    
    
    
}

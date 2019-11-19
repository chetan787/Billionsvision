<?php

/* 
 * Author:Vikash Kumar
 * Organization: Kvmgroupbiz
 * URL: www.kvmgroupbiz.in
 * ----------------------------------------------------------------------------------------
 * Note : This is the Admin Model for admin  process
 * ----------------------------------------------------------------------------------------
 * 
 */

class Admin_model extends CI_Model{
    
 /* 
  * ----------------------------------------------------------------------------------------
  * This is the load_all_users function for loading all users form db
  * ----------------------------------------------------------------------------------------
  */
    public function load_all_users(){
         
       $q= $this->db->get('user');
                  
       if($q->num_rows()){
        // returning all rows from table
            return $q->result_array();
       }else{
           return FALSE;
       }
        
    }
    
    
    
 /* 
  * ----------------------------------------------------------------------------------------
  * This is the user_status_update function for update the user data from admin panel
  * ----------------------------------------------------------------------------------------
  */
    public function user_status_update($id,$userArray){
         
       $q= $this->db->where('id',$id)->get('user');
                  
       if($q->num_rows()){
          $this->db->where('id',$id)->update('user',$userArray);
         
             
             return TRUE; 
         
          
       }else{
           return FALSE;
       }
        
    }
    
 
    
    
    /*
     * ----------------------------------------------------------------------------------
     * This is reg_validation function for registering the admin data in admin table
     * ----------------------------------------------------------------------------------
     */
    
    public function reg_validate($adminArray){

    
    $q=$this->db->where('user_email',$adminArray['user_email'])->get('admin');
    
    if ( $q->num_rows() > 0) 
    {
        // retrun the email if exist
        $email = $q->row()->user_email;
        return $email;
        
    }
    else{
        
        // insert the data if does not exist
        
        $this->db->insert('admin',$adminArray);
        
        
    }

    
    }
    
//---------------ADMIN - LOGIN LOGIC start here  ------------------------------------------------------------
    
 /* 
  * ----------------------------------------------------------------------------------------
  * This is the login_valid_user function for checking valid admin user
  * ----------------------------------------------------------------------------------------
  */
    public function login_valid_user($useremail,$password){
         
       $q= $this->db->where('user_email',$useremail)
                    ->where('user_password',$password)
                    ->get('admin');
       if($q->num_rows()){
        // returning user_email of user from rows
            return $q->row()->user_email;
       }else{
           return FALSE;
       }
        
    }
    /*
     * ---------------------------------------------------------------------------------------------------------
     * This is fetch_user_type function for fetching user_type from admin table by sending useremail & password
     * ---------------------------------------------------------------------------------------------------------
     */
    
    public function fetch_user_type($useremail,$password){
        
        $q=  $this->db->where(['user_email'=>$useremail,'user_password'=>$password])->get('admin');
     if($q->num_rows())
     {
         return $q->row()->user_type;
     }
     else{
         return FALSE;
     }
    
    }
    
    
    /*
     * ----------------------------------------------------------------------------------
     * This is fetch_user_status function for fetching user_status by sending useremail & password
     * ----------------------------------------------------------------------------------
     */
    public function fetch_user_status($useremail,$password){
        
        $q=  $this->db->where(['user_email'=>$useremail,'user_password'=>$password])->get('admin');
     if($q->num_rows())
     {
         return $q->row()->user_status;
     }
     else{
         return FALSE;
     }
    
    }
    
    
   /*
     * ----------------------------------------------------------------------------------
     * This is fetch_user_name function for fetching user_name by sending useremail & password
     * ----------------------------------------------------------------------------------
     */ 
    public function fetch_user_name($useremail,$password){
        
        $q=  $this->db->where(['user_email'=>$useremail,'user_password'=>$password])->get('admin');
     if($q->num_rows())
     {
         return $q->row()->user_name;
     }
     else{
         return FALSE;
     }
    
    }


    
    
}

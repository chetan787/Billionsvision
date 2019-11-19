<?php

/* 
 * Author:Vikash Kumar
 * Organization: Kvmgroupbiz
 * URL: www.kvmgroupbiz.in
 * ----------------------------------------------------------------------------------------
 * Note : This is the Payment Model for user payment process
 * ----------------------------------------------------------------------------------------
 * 
 */

class Payment_model extends CI_Model{
    
 /* 
  * ----------------------------------------------------------------------------------------
  * This is the leads_payment_status function for payment status of  the leads
  * ----------------------------------------------------------------------------------------
  */
    public function leads_payment_status($user_email,$lead_email){
         
       $q= $this->db->where('user_email',$user_email)
                    ->where('lead_email',$lead_email)
                    ->get('payments');
       if($q->num_rows()){
        // returning user_email of user from rows
            return $q->row()->pay_status;
       }else{
           return FALSE;
       }
        
    }
    
   
    
    
    
}

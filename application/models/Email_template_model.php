<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Email_template_model extends CI_Model{
    
    public function email_model($adminArray){
        $q= $this->db->where('template_name',$adminArray['template_name'])->get('emailtemplate');
                  
       if($q->num_rows()){
         return  $q->row()->template_name;
        }else{
            $q=$this->db->insert('emailtemplate',$adminArray);
       }
       
        
    }
    
    
     public function load_all_email_template(){
        $q= $this->db->get('emailtemplate');
                  
       if($q->num_rows()>0){
         return  $q->result_array();
        }else{
        return   false;
       }
       
        
    }
    
    
    public function load_email_template_by_template_name($temp_name){
        $q= $this->db->where('template_name',$temp_name)->get('emailtemplate');
                  
       if($q->num_rows()>0){
         return  $q->result_array();
        }else{
        return   false;
       }
       
        
    }
    
    public function delete_email_template_by_id($id){
        $q= $this->db->where('id',$id)->get('emailtemplate');
                  
       if($q->num_rows()){
           $this->db->where('id',$id);
           $this->db->delete('emailtemplate'); 
           return TRUE;
        }else{
           return FALSE;
       }
       
    }
    
    
    public function update_email_template_by_id($id,$dataArray){
        $q= $this->db->where('id',$id)->get('emailtemplate');
                  
       if($q->num_rows()){
           $this->db->where('id',$id);
           $this->db->update('emailtemplate',$dataArray); 
           return TRUE;
        }else{
           return FALSE;
       }
       
    }
    public function send_custom_template($selectedtemplate)
    {
       $q= $this->db->where('template_name',$selectedtemplate)->get('emailtemplate');
                  
       if($q->num_rows()>0){
         return  $q->result_array();
        }else{
        return   false;
       }
    }
     
    
    
    
}

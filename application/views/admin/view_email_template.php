<!-- header-->
<?php include 'header.php' ?>
<!-- end header-->
<?php
// setting session for invalid entry
if($_SESSION['user_name'] ==null ||$_SESSION['user_name'] =="" ){
    return redirect('Admin/index');
}
?>

<!--  page-wrapper -->
        <div id="page-wrapper">

            <div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                  <h3 class="page-header"> 
                   <div class="row">
                       <div class="col-lg-4">
                           
                                  <i class="fa fa-inbox" title="View Email Template" style="font-size:20px;">View Email Template</i>
                       </div>
                    <div class="col-lg-8">
                        <div style="text-align: center;">
                 
<!--                            <div class="btn-group">   
                                <a class="btn btn-default" href="<?php //echo base_url(); ?>index.php/AdminMatchfixture/view_match_fixture">
                                  <i class="fa fa-archive" title="Match Fixture"> </i>
                                </a>
                                <a class="btn btn-default" href="<?php //echo base_url(); ?>index.php/Admin/user_list">
                                  <i class="fa fa-users" title="User List"> </i>
                                </a>
                                <a class="btn btn-default" href="<?php //echo base_url(); ?>index.php/AdminPrediction/view_prediction">
                                  <i class="fa fa-bar-chart" title="User Prediction"> </i>
                                </a>
                                <a class="btn btn-default" href="<?php //echo base_url(); ?>index.php/AdminPointTable/index">
                                  <i class="fa fa-pie-chart" title="Point Table"> </i>
                                </a> 
                            </div>-->
                            
                        </div>
                    </div>
                </div></h3>
                   
                </div>
                
                <!--End Page Header -->
            </div>
           <!-- page body-->
         
       
           
                <div class="jumbotron">
                    
                    
                    <?php if($error=$this->session->flashdata('failure')){
                    ?><div class="alert alert-dismissible alert-danger">
                    <?=$error ?> 
                    </div>  
                    <?php }
                    ?>                       
                    <?php if($error=$this->session->flashdata('success')){
                    ?><div class="alert alert-dismissible alert-success">
                    <?=$error ?> 
                    </div>  
                    <?php }
                    ?>
                    <div style="overflow-x:auto; height:400px;">
                  <table class="table table-striped">
    <thead>
      <tr>
        <th>SL</th>
        <th>Template Name</th>
        <th> Template Category</th>
        <th>Template Subject</th>
        <th>Template Message</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead> 
    
    <tbody>
        
        <?php 
           $i=1;
           if(isset($email_template)  && is_array($email_template)){
            
           foreach ($email_template as $key => $data) {
               ?>
                    <tr>
                        <td><?php echo   $i;?>  </td>
                        <td><?php echo  $data['template_name']?>  </td>
                        <td><?php echo  $data['template_category']?></td>
                        <td><?php echo  $data['template_subject']?></td>
                        <td><?php echo  $data['template_message']?></td>
                        
                        <td><button class="btn btn-primary" data-toggle="modal" data-target="#myModal" name="email_temp_update<?php echo   $i;?>"  id="email_temp_update<?php echo $i;?>" data-todo='{"id":"<?php echo  $data['id']?>","templ_name":" <?php echo  $data['template_name']?>","templ_category":" <?php echo  $data['template_category']?>","templ_subject":" <?php echo  $data['template_subject']?>","templ_message":" <?php echo  $data['template_message']?> " }'>Edit</button></td>
                        <td><button class="btn btn-danger" name="email_temp_delete<?php echo   $i;?>" id="email_temp_delete<?php echo   $i;?>" >Delete</button>
                            <input type="hidden" name="id<?php echo   $i;?>" id="id<?php echo   $i;?>" value="<?php echo  $data['id']?>">
    <script>
    $(document).ready(function(){
//       alert('hello'); 
    $('#email_temp_update<?php echo $i;?>').click(function(){
        var id= $("#email_temp_update<?php echo $i;?>").data('todo').id;
       var templ_name = $("#email_temp_update<?php echo $i;?>").data('todo').templ_name;
        var templ_category = $("#email_temp_update<?php echo $i;?>").data('todo').templ_category;
         var templ_subject = $("#email_temp_update<?php echo $i;?>").data('todo').templ_subject;
          var templ_message = $("#email_temp_update<?php echo $i;?>").data('todo').templ_message;

      // setting data on modal input
       $('#email_temp_id').val(id);
       $('#email_temp_name').val(templ_name);
       $('#email_temp_cat').val(templ_category);
       $('#email_temp_sub').val(templ_subject);
       $('#email_temp_mess').val(templ_message);
     
       //alert(myBookId) ; 
    });
    });
    
    
    </script>
     <script>
    $(document).ready(function(){
     //  alert('hello'); 
    $('#email_temp_delete<?php echo $i;?>').click(function(){
         var delete_confirm = confirm("Are you sure to delete?");
        
        if(delete_confirm){
            // delete the data from db
             var id= $("#id<?php echo   $i;?>").val();
       //alert(id); 
            // run an ajax call for delete row
            $.ajax({
                   type:'POST',
                   url:"<?php echo base_url(); ?>index.php/EmaiMessagelTemplate/delete_email_template",
                   data: {"id":id,},
                   success:function(result)
                  {

                    // alert(result);
                    if(result){
                        alert("Deleted Successfully !");
                          window.location.href='<?php echo base_url(); ?>index.php/EmaiMessagelTemplate/view_email_template';
                    }else{
                        //alert("Failed to Delete !"); 
                    }


                   },
                   error: function(result)
                   {
                           //  $("#div_result").html("Error"); 
                   },
                   fail:(function(status) {
                           //  $("#div_result").html("Fail");
                   }),
                   beforeSend:function(d){
                       // $('#myModal_loader').modal();
                   }

               });
               }
               else{
                   // do nothing
               }
   
    });
     });
     
    
    
    </script>
                        
                        
                        
    </td>
                    
                    </tr>
              
             <?php
             $i++;
           }
        } else {
           ?>
            <tr> <td>No Data</td></tr>  
         <?php   
               
}?>
      
    </tbody>
  </table>
                    </div>
                </div>
           <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update Email Template</h4>
        </div>
        <div class="modal-body">
            
             <?php if($error=$this->session->flashdata('failure')){
                    ?><div class="alert alert-dismissible alert-danger">
                    <?=$error ?> 
                    </div>  
                    <?php }
                    ?>                       
                    <?php if($error=$this->session->flashdata('success')){
                    ?><div class="alert alert-dismissible alert-success">
                    <?=$error ?> 
                    </div>  
                    <?php }
                    ?>
<!--          <p>Some text in the modal.</p>-->
            <form action="<?php echo base_url().'index.php/EmaiMessagelTemplate/update_email_template' ?>" method="post">
                    <div class="form-group">
                      <label for="name"> Template Name:</label>
                      <input type="hidden" class="form-control" id="email_temp_id" name="email_temp_id"  value="">
                      <input type="text" class="form-control" id="email_temp_name" name="email_temp_name" readonly="" value="">
                      <?php echo form_error('email_temp_name',"<p  style='font-size: 12px;' class='text-danger'>","</p>"); ?>
                    </div>
                    <div class="form-group">
                      <label for="name">Template Category:</label>
                      <input type="text" class="form-control" id="email_temp_cat" name="email_temp_cat"  value="">
                     <?php echo form_error('email_temp_cat',"<p  style='font-size: 12px;' class='text-danger'>","</p>"); ?>
                    </div>
                    <div class="form-group">
                      <label for="name">Template Subject:</label>
                      <input type="text" class="form-control" id="email_temp_sub" name="email_temp_sub"  value="">
                      <?php echo form_error('email_temp_sub',"<p  style='font-size: 12px;' class='text-danger'>","</p>"); ?>
                    </div>
                    <div class="form-group">
                     
                      <label for="tempmessage">Template Message</label>
                      <textarea placeholder="Type your message here" name="email_temp_mess" id="email_temp_mess" class="form-control" style="height: 190px" value="" maxlength="160"></textarea>
                    
                      <?php echo form_error('email_temp_mess',"<p  style='font-size: 12px;' class='text-danger'>","</p>"); ?>
                      
                    </div>
                    
                    <button type="submit" class="btn btn-primary" i>Update</button>
           </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
                 
                  
                  
                     
   
            
           <!-- End Page Body-->
        </div>
        <!-- end page-wrapper -->
        
        
<!-- footer-->
    <?php include 'footer.php';?>                
<!-- end footer-->
   
       
    
</body>

</html>

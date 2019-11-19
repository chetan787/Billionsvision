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
                           
                           <i class="fa fa-inbox" title="View Whatsapp Template" style="font-size:20px;">View Whatsapp Template</i>
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
                    <div style="overflow: auto; height: 400px;" >
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
           if(isset($whatsapp_template)  && is_array($whatsapp_template)){
            
           foreach ($whatsapp_template as $key => $data) {
               ?>
                    <tr>
                        <td><?php echo   $i;?>  </td>
                        <td><?php echo  $data['template_name']?>  </td>
                        <td><?php echo  $data['template_category']?></td>
                        <td><?php echo  $data['template_subject']?></td>
                        <td><?php echo  $data['template_message']?></td>
                        
                        <td><button class="btn btn-primary" data-toggle="modal" data-target="#myModal" name="whatsapp_temp_update<?php echo   $i;?>"  id="whatsapp_temp_update<?php echo $i;?>" data-todo='{"id":"<?php echo  $data['id']?>","temp_name":"<?php echo  $data['template_name']?> ","temp_category":"<?php echo  $data['template_category']?> ","temp_subject":"<?php echo  $data['template_subject']?> ","temp_message":"<?php echo  $data['template_message']?> " }'>Edit</button>
                        
                      <td><button class="btn btn-danger" name="whatsapp_temp_delete<?php echo   $i;?>" id="whatsapp_temp_delete<?php echo   $i;?>" >Delete</button>
                            <input type="hidden" name="id<?php echo   $i;?>" id="id<?php echo   $i;?>" value="<?php echo  $data['id']?>">
      <script>
    $(document).ready(function(){
//       alert('hello'); 
    $('#whatsapp_temp_update<?php echo $i;?>').click(function(){
        var id= $("#whatsapp_temp_update<?php echo $i;?>").data('todo').id;
        var temp_name = $("#whatsapp_temp_update<?php echo $i;?>").data('todo').temp_name;
        var temp_category = $("#whatsapp_temp_update<?php echo $i;?>").data('todo').temp_category;
        var temp_subject = $("#whatsapp_temp_update<?php echo $i;?>").data('todo').temp_subject;
        var temp_message = $("#whatsapp_temp_update<?php echo $i;?>").data('todo').temp_message;

      // setting data on modal input
       $('#temp_id').val(id);
       $('#temp_name').val(temp_name);
       $('#temp_category').val(temp_category);
       $('#temp_subject').val(temp_subject);
       $('#temp_message').val(temp_message);
//     
     //  alert(temp_message) ; 
    });
    });
    
    
    </script>
    
    <script>
    $(document).ready(function(){
     //  alert('hello'); 
    $('#whatsapp_temp_delete<?php echo $i;?>').click(function(){
        
           
        var id= $("#id<?php echo   $i;?>").val();
      // alert(id); 
     // run an ajax call for delete row
     $.ajax({
            type:'POST',
            url:"<?php echo base_url(); ?>index.php/WhatsappTemplate/delete_whatsapp_template",
            data: {"id":id,},
            success:function(result)
           {
                 var result = confirm("Want to delete?");
             // alert(result);
             if(result){
                 alert("Deleted Successfully !");
                   window.location.href='<?php echo base_url(); ?>index.php/WhatsappTemplate/view_whatsapp_template';
             }else{
                // alert("Failed to Delete !"); 
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
   
    
    });
     });
     
    
    
    </script>
                        
                        </td>
                        
    
                    
                    </tr>
              
             <?php
             $i++;
           }
        }
         else {
           ?>
            <tr> <td>No Data</td></tr>  
         <?php   
               
}?>
      
    </tbody>
  </table>
                    </div>
                </div>
           
                            <!--Modal loading -->
                 <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Template Update</h4>
        </div>
        <div class="modal-body">
                           <!--Error Message display-->
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
            <form action="<?php echo base_url().'index.php/WhatsappTemplate/update_whatsapp_template' ?>" method="post">
                    <div class="form-group">
                      <label for="temp_name">Template Name</label>
                      <input type="hidden" class="form-control" name="temp_id" id="temp_id"  value="">
                      <input type="text" class="form-control"  name="temp_name" id="temp_name" readonly="" value="">
                    <?php echo form_error('temp_name',"<p  style='font-size: 12px;' class='text-danger'>","</p>"); ?>
                   </div>
                
                   <div class="form-group">
                      <label for="tempcategory">Template Category</label>
                      <input class="form-control" type="text" placeholder="" name="temp_category" id="temp_category" required="">
                      <?php echo form_error('temp_category',"<p  style='font-size: 12px;' class='text-danger'>","</p>"); ?>
                  </div>
                
                <div class="form-group">
                      <label for="tempsubject">Template Subject</label>
                      <input class="form-control" type="text" placeholder="" name="temp_subject" id="temp_subject" required="">
                 <?php echo form_error('temp_subject',"<p  style='font-size: 12px;' class='text-danger'>","</p>"); ?>
                </div>
                <div class="form-group">
                      <label for="tempmessage">Template Message</label>
                      <textarea  name="temp_message" id="temp_message" class="form-control"></textarea>
                       <?php echo form_error('temp_message',"<p  style='font-size: 12px;' class='text-danger'>","</p>"); ?>    
                    </div>
          
                <button type="submit" class="btn btn-success" >Update</button>
            </form>
                               <div class="footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"style="margin-left:495px;">Close</button>
                    </div>
                </div>
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

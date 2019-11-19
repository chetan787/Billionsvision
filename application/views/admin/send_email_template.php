<!-- header-->
<?php include 'header.php' ?>
<!-- end header-->
<?php
// setting session for invalid entry
if($_SESSION['user_name'] ==null ||$_SESSION['user_name'] =="" ){
    return redirect('Admin/index');
}
?>
<!-- for loader css  -->
<style>
.loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid blue;
  border-bottom: 16px solid blue;
  width: 90px;
  height: 90px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>






<!-- for mobile smartphone device look -->
<style>
/* The device with borders */
.smartphone {
  position: relative;
  width: 270px;
  height: 480px;
  margin: auto;
  border: 16px black solid;
  border-top-width: 60px;
  border-bottom-width: 60px;
  border-radius: 36px;
}

/* The horizontal line on the top of the device */
.smartphone:before {
  content: '';
  display: block;
  width: 60px;
  height: 5px;
  position: absolute;
  top: -30px;
  left: 50%;
  transform: translate(-50%, -50%);
  background: #333;
  border-radius: 10px;
}

/* The circle on the bottom of the device */
.smartphone:after {
  content: '';
  display: block;
  width: 35px;
  height: 35px;
  position: absolute;
  left: 50%;
  bottom: -65px;
  transform: translate(-50%, -50%);
  background: #333;
  border-radius: 50%;
}

/* The screen (or content) of the device */
.smartphone .content {
  width: 240px;
  height: 360px;
  background: white;
}
</style>
 <script>
    $(document).ready(function(){
     //  alert('hello'); 
    $('#select_template').on('change',function(){
          
           var templateName = $('#select_template').find(":selected").text();
          // alert(templateName);
          
      
     // run an ajax call for delete row
     $.ajax({
            type:'POST',
            url:"<?php echo base_url(); ?>index.php/EmaiMessagelTemplate/ajax_load_email_template",
            data: {"templateName":templateName,},
            success:function(result)
           {
           // $('#myModal_loader').modal('hide');   
            //alert(result);
               var templ_category; 
               var templ_subject; 
               var templ_message;
               
              var res = JSON.parse(result);
                res.forEach(function(items) {
                     templ_category = items.template_category;
                     templ_subject = items.template_subject;
                     templ_message = items.template_message;
                   
                   
                   //alert(e);
                }); 
                
               $('#tcategory').val(templ_category);
               $('#tsub').val(templ_subject);
               $('#tmessage').html(templ_message);
                $("#dynamic_view_template").attr("src","<?php echo base_url(); ?>index.php/EmaiMessagelTemplate/show_email_template_view?templateName="+templateName);
               
        
               
               
               
               
               //alert(templ_category);
            },
            error: function(result)
            {
                    //  $("#div_result").html("Error"); 
            },
            fail:(function(status) {
                    //  $("#div_result").html("Fail");
            }),
            beforeSend:function(d){
            //  $('#myModal_loader').modal();
            }

        });
   
   
   
    
    });
     });
     
    
    
    </script>
    
    
<!--  page-wrapper -->
        <div id="page-wrapper">

            <div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                  <h3 class="page-header"> 
                   <div class="row">
                       <div class="col-lg-4">
                           
                                  <i class="fa fa-inbox" title="Send Email Template"> Send Email Template</i>
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
                    <div class="row">
                        <div class="col-md-6">
<!--         Email Template Loading Form          -->
                    <div class="contact-form-wthreelayouts">
                  
                    <?php if($error=$this->session->flashdata('user_exist')){
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
                    
                    <?php if($error=$this->session->flashdata('email_temp_exist')){
                    ?><div class="alert alert-dismissible alert-danger">
                    <?=$error ?> 
                    </div>  
                    <?php }
                    ?>
                        
                    <?php if($error=$this->session->flashdata('email_temp_added')){
                    ?><div class="alert alert-dismissible alert-success">
                    <?=$error ?> 
                    </div>  
                    <?php }
                    ?>
                        
                        
                        <form action="<?php echo base_url()?>index.php/EmaiMessagelTemplate/add_email" method="post" class="register-wthree">
                            <div class="form-group">
                                <label for="select_template">Template Name:</label>
                                <select class="form-control" id="select_template" name="select_template">
                                  <option></option>
                                  <?php 
                                    if(isset($email_template)&& is_array($email_template))
                                    {
                                  foreach ($email_template as $key => $data) {
                                                          ?>
                                                         <option><?php echo $data['template_name']; ?></option>
                                                         <?php
                                                      }
                                    } else {
                                        ?>
                                        <option>No Template Available</option>
                                        <?php
                                        
                                    }?>
                                     
                                 
                                </select>
                                <?php echo form_error('name',"<p  style='font-size: 12px;' class='text-danger'>","</p>"); ?>
                            </div>
                            <div class="form-group">
                                <label>
                                    Template Category
                                </label>
                                <input class="form-control" type="text" placeholder="xxxx xxxxx" name="tcategory" id="tcategory" required="" value="">
                                <?php echo form_error('tcategory',"<p  style='font-size: 12px;' class='text-danger'>","</p>"); ?>
                            </div>
                          
                            
                             <div class="form-group">
                                <label>
                                   Template Subject
                                </label>
                                <input class="form-control" type="text" placeholder="Enter Subject" name="tsub" id="tsub"
                                    required="" value="">
                                 <?php echo form_error('tsub',"<p  style='font-size: 12px;' class='text-danger'>","</p>"); ?>
                             </div>
                            
                            
                            
                            <div class="form-group">
                                <label>
                                    Template message
                                </label>
                                <textarea placeholder="Type your message here" name="tmessage" id="tmessage" class="form-control" style="height: 200px"></textarea>
                                <?php echo form_error('tmessage',"<p  style='font-size: 12px;' class='text-danger'>","</p>"); ?>
                            </div>
                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-w3layouts btn-primary  bg-theme text-wh w-100 font-weight-bold text-uppercase">Send</button>
                            </div>
                        </form>
                    </div>

                    </div>
                        <div class="col-md-4">
                            <div class="smartphone">
                                    <div class="content">
                                        <iframe id="dynamic_view_template" src="" style="width:100%;border:none;height:100%" ></iframe>
                                    </div>
                            </div>
                        </div>
                    </div> 
                </div>
        
           
           
           <div class="jumbotron">
                <div class="container">
                    <div class="row">
                        
                      <div class="col-sm-4 ">
                           
                          <label style="font-size:18px; color: red;" >Custom </label>
                          <form action="#">
                                <div class="form-group">
                                  <label for="email" > To Email:</label>
                                  <input type="email" class="form-control" id="custom_email" placeholder="Enter a valid email" name="custom_email" required="required">
                                </div>
    
<!--                                <div class="form-group form-check">
                                  <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="remember"> Send from Excel
                                  </label>
                                </div>-->
                                <div class="form-group">   
                                <button type="button" class="btn btn-primary " id="button_custom_email">Submit</button>
                                </div>
                          </form>
                       
                      </div>
                        
                       
                      <div class="col-sm-4 ">
                           
                          <label style="font-size:18px; color: red;"> Users</label>
                            <form action="<?php echo base_url()?>index.php/EmaiMessagelTemplate/send_email" method="post"">
                                <div class="form-group">
                                  <label for="single">To Single:</label>
                                  <input type="email" class="form-control" id="user_email" placeholder="Enter a valid email" name="user_email" >
                                </div>
    
                                <div class="form-group form-check">
                                   <label for="all"> To All:</label>  
                                  
                                   <input class="form-check-input" type="checkbox" name="user_all" id="user_all"> 
                                 
                                </div>
                               <div class="form-group">   
                                <button type="button"  class="btn btn-primary" id="button_user_email" name="buttn">Submit</button>
                                </div>
                          </form>
                      </div>
                        
                       <div class="col-sm-4 ">
                             <label style="font-size:18px; color: red;"> Visiters</label>
                             <form action="#">
                                <div class="form-group">
                                  <label for="single">To Single:</label>
                                  <input type="email" class="form-control" id="visiter_email" placeholder="Enter a valid email" name="visiter_email" required="">
                                </div>
    
                                <div class="form-group form-check">
                                   <label for="all"> To All:</label>  
                                  
                                    <input class="form-check-input" type="checkbox" name="remember"> 
                                 
                                </div>
                                <div class="form-group">   
                                <button type="button" class="btn btn-primary" id="button_visiter_email">Submit</button>
                                </div>
                          </form>
                      </div> 
                        
                    </div>
                </div>
            </div>
                 
                  
                  
                     
   
                </div>  
           <!-- End Page Body-->
          
        <!-- end page-wrapper -->
    
<!-- footer-->
    <?php include 'footer.php';?>                
<!-- end footer-->
<!--<script>
    $(document).ready(function(){
       //alert('hello'); 
       $('#buttn').click(function(){
          //user_email
         var useremail= $('#user_email').val();
         if(useremail!=''){
             alert('user has filled ');
          
         }
         
        else if($("#user_all").prop('checked') == true){
             alert('Send to  all'); 
             $('#user_email').attr('readonly','readonly');
        }
        else
        {
             $('#user_email').attr('readonly',false);
            if(useremail!=''){
                 alert('user has filled ');

             }else
             {
                alert('Please Enter Email'); 
             } 
        }
         
         
          
       });
    });
// if($("#user_all").prop('checked') == true){
//    //do something
//}   
    
 </script>-->

<!--- Code for Custom Email Sending Section -->
<script>
    $(document).ready(function(){
       
      $('#button_custom_email').click(function(){
          
       // reading the selected template name   
        
         //  alert(selectedtemplate); 
       // reading the email from input   
       var custom_email=  $('#custom_email').val();
       if(custom_email==''){
           alert('Please Enter email !');
           
       }else{
            var selectedtemplate = $('#select_template'). children("option:selected"). val();
           if(selectedtemplate==''){
              alert('Please Select Email Template !');  
           }else{
                     // calling ajax for sending custom email send data to controller
     $.ajax({
                                                              type:'POST',
                                                              url:"<?php  echo base_url(); ?>index.php/EmaiMessagelTemplate/send_custom_email",
                                                              data: {"custom_email":custom_email,"selectedtemplate":selectedtemplate},
                                                              success:function(result){

                                                               $('#myModal_loader').modal('hide');
                                                               alert(result);
                                                             
                                                             
                                                              },
                                                              error: function(result)
                                                              {
                                                             //  $("#div_result").html("Error"); 
                                                              },
                                                              fail:(function(status) {
                                                             //  $("#div_result").html("Fail");
                                                              }),
                                                              beforeSend:function(d){
                                                               $('#myModal_loader').modal();
                                                              }

                                                             });
           }
    
    
 
       }
      
   //  alert( custom_email);
        
    
     });  
});                                                         
</script>

 


   
  <!----start Modal for Ajax loader-->
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <div class="modal fadeInDown" id="myModal_loader">
        <div class="modal-dialog" style="margin-left: 619px; margin-top:225px; ">   
<!--                        <div class="loader"></div>-->
<div class="container">
                <div class="progress">
                  <div class="progress-bar progress-bar-striped active" id="myBar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" >

                  </div>
                </div>
</div>
<!--                    <img src="<?php //echo base_url();?>Adminasset/images/ajax-loader.gif" style="display: block; margin-left: auto; margin-right: auto;">-->
       </div>
    </div>
    <!----end Modal for Ajax loader-->    
    
    
    <!--- Code for User Email Sending Section -->
<script>
    $(document).ready(function(){
       
      $('#button_user_email').click(function(){
          
          if($("#user_all").prop('checked') == true){
           //do something
           alert('cheked');
            var selectedtemplate = $('#select_template'). children("option:selected"). val();
           if(selectedtemplate==''){
              alert('Please Select Email Template !');  
           }else{
                     // calling ajax for sending custom email send data to controller
     $.ajax({
                                                              type:'POST',
                                                              url:"<?php  echo base_url(); ?>index.php/EmaiMessagelTemplate/send_user_email_to_all",
                                                              data: {"selectedtemplate":selectedtemplate},
                                                              success:function(result){
                                                                  
                                                                                                                             var i = 0;
function move() {
  if (i == 0) {
    i = 1;
    var elem = document.getElementById("myBar");
    var width = 0;
    var id = setInterval(frame,300);
    function frame() {
      if (width >= 100) {
        clearInterval(id);
        i = 0;
      } else {
        width++;
        elem.style.width = width + "%";
        elem.innerHTML = width  + "%";
      }
    }
  }
}
                                                              
                                                              
                                                             
                                                              
                                                                move();    
                                                                  
                                                                  
                                                                  
                                                              // $('#myModal_loader').modal('hide');
                                                               alert(result);
                                                             
                                                             
                                                              },
                                                              error: function(result)
                                                              {
                                                             //  $("#div_result").html("Error"); 
                                                              },
                                                              fail:(function(status) {
                                                             //  $("#div_result").html("Fail");
                                                              }),
                                                              beforeSend:function(d){
                                                               $('#myModal_loader').modal();
                                                              }

                                                             });
           } 
           
           
           
           }else{
               // reading the selected template name   
        
         //  alert(selectedtemplate); 
       // reading the email from input   
       var user_email=  $('#user_email').val();
       if(user_email==''){
           alert('Please Enter email !');
           
       }else{
            var selectedtemplate = $('#select_template'). children("option:selected"). val();
           if(selectedtemplate==''){
              alert('Please Select Email Template !');  
           }else{
              
                     // calling ajax for sending custom email send data to controller
     $.ajax({
                                                              type:'POST',
                                                              url:"<?php  echo base_url(); ?>index.php/EmaiMessagelTemplate/send_user_email",
                                                              data: {"user_email":user_email,"selectedtemplate":selectedtemplate},
                                                              success:function(result){
    
                                                               //  alert(result);
                                                             $('#myModal_loader').modal('hide');
                                                             
                                                              },
                                                              error: function(result)
                                                              {
                                                             //  $("#div_result").html("Error"); 
                                                              },
                                                              fail:(function(status) {
                                                             //  $("#div_result").html("Fail");
                                                              }),
                                                              beforeSend:function(d){
                                                               $('#myModal_loader').modal();
                                                              }

                                                             });
           }
           
           }
          
          
          
       
    
    
 
       }
      
   //  alert( custom_email);
        
    
     });  
});                                                         
</script>             
<script>
var i = 0;
function move() {
  if (i == 0) {
    i = 1;
    var elem = document.getElementById("myBar");
    var width = 0;
    var id = setInterval(frame,300);
    function frame() {
      if (width >= 100) {
        clearInterval(id);
        i = 0;
      } else {
        width++;
        elem.style.width = width + "%";
        elem.innerHTML = width  + "%";
      }
    }
  }
}
</script>



<br>
<button onclick="move()">Click Me</button>  

</body>

</html>

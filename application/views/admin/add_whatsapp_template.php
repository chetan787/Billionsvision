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
                           
                                  <i class="fa fa-inbox" title="Add Whatsapp Template" style="font-size:20px;"> Add Whatsapp Template</i>
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
                  <div class="row mt-4">
                <div class="col-lg-7">
<!--                    <h5 class="cont-form">send us a note</h5>-->
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
                    
                    <?php if($error=$this->session->flashdata('whatsapp_temp_exist')){
                    ?><div class="alert alert-dismissible alert-danger">
                    <?=$error ?> 
                    </div>  
                    <?php }
                    ?>
                        
                    <?php if($error=$this->session->flashdata('whatsapp_temp_added')){
                    ?><div class="alert alert-dismissible alert-success">
                    <?=$error ?> 
                    </div>  
                    <?php }
                    ?>
                        
                        
                        <form action="<?php echo base_url()?>index.php/WhatsappTemplate/whatsapp_verification" method="post" class="register-wthree">
                            <div class="form-group">
                                <label>
                                     Template Name
                                </label>
                                <input class="form-control" type="text" placeholder="Johnson" name="tname" required="">
                                <?php echo form_error('name',"<p  style='font-size: 12px;' class='text-danger'>","</p>"); ?>
                            </div>
                            
                            <div class="form-group">
                                <label>
                                    Template Category
                                </label>
                                <input class="form-control" type="text" placeholder="xxxx xxxxx" name="tcategory" required="">
                                <?php echo form_error('tcategory',"<p  style='font-size: 12px;' class='text-danger'>","</p>"); ?>
                            </div>
<!--                            <div class="form-group">
                                <label>
                                    Email
                                </label>
                                <input class="form-control" type="email" placeholder="example@email.com" name="email"
                                    required="">
                                <?php echo form_error('email',"<p  style='font-size: 12px;' class='text-danger'>","</p>"); ?>
                            </div>-->
                            
                             <div class="form-group">
                                <label>
                                   Template Subject
                                </label>
                                <input class="form-control" type="text" placeholder="Enter Subject" name="tsub"
                                    required="">
                                 <?php echo form_error('tsub',"<p  style='font-size: 12px;' class='text-danger'>","</p>"); ?>
                             </div>
                            
                            
                            
                            <div class="form-group">
                                <label>
                                    Template message
                                </label>
                                <textarea placeholder="Type your message here" name="tmessage" class="form-control" style="height: 200px"></textarea>
                                <?php echo form_error('tmessage',"<p  style='font-size: 12px;' class='text-danger'>","</p>"); ?>
                            </div>
                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-layouts btn-primary  bg-theme text-wh w-100 font-weight-bold text-uppercase">Send</button>
                            </div>
                        </form>
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

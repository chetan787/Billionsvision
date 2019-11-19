<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<!DOCTYPE HTML>
<html>
<head>
<title> BillionsVision | Admin Login </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<!--<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet"> 
<link href='css/SidebarNav.min.css' media='all' rel='stylesheet' type='text/css'/>
<link href="css/custom.css" rel="stylesheet">-->
<link href="https://fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">

<style>
#chartdiv {
  width: 100%;
  height: 295px;
}
</style>

 <!--Core CSS - Include with every page -->
      <?=  link_tag('admin_assets/assets/css/bootstrap.min.css','stylesheet', 'text/css') ?>
      <?=  link_tag('admin_assets/assets/css/font-awesome.min.css','stylesheet', 'text/css') ?>
      <?=  link_tag('admin_assets/assets/css/style.css','stylesheet', 'text/css') ?>
      <?=  link_tag('admin_assets/assets/css/SidebarNav.min.css','stylesheet', 'text/css') ?>
      <?=  link_tag('admin_assets/assets/css/custom.css','stylesheet', 'text/css') ?>
      <?=  link_tag('admin_assets/assets/images/shipingkaro_logo.jpeg','icon', 'image/png') ?>
 <!-- Core CSS - Include with every page end   -->    


<!-- main content start-->

<!-- header content --->		
<?php   
   // include 'header.php';
?>
<!-- end header content-->

<!-- body content -->
<div id="page-wrapper">
    <div class="main-page login-page ">
	<h2 class="title1"> Admin Login</h2>
            <div class="widget-shadow">
		<div class="login-body">
                    <div id="errormsg" class="alert alert-danger" style="display:none;">Invalid Username & Password</div>
                    <div id="suucessmsg" class="alert alert-success" style="display:none;">You Have Login Successfully </div>
		<form role="form" action="<?php echo base_url(); ?>index.php/Admin/login_check" method="post">
                            <?php if($error=$this->session->flashdata('Invalid_Login')){
                            ?><div class="alert alert-dismissible alert-danger">
                           <?=$error ?> 
                            </div>  
                            <?php }
                            ?>
                            <?php if($error=$this->session->flashdata('user_exist')){
                            ?><div class="alert alert-dismissible alert-danger">
                            <?=$error ?> 
                            </div>  
                            <?php }
                            ?>                       
                            <?php if($error=$this->session->flashdata('user_register')){
                            ?><div class="alert alert-dismissible alert-success">
                            <?=$error ?> 
                            </div>  
                            <?php }
                            ?>
                        
                            
                         
                            
                            <input type="text" class="useremail" name="useremail" placeholder="Enter Your email" >
                            <?php echo form_error('useremail',"<p  style='font-size: 12px;' class='text-danger'>","</p>"); ?>
							
                            <input type="password" name="password" class="password" placeholder="Password" >
                            <?php echo form_error('password',"<p  style='font-size: 12px;' class='text-danger'>","</p>"); ?>
                                                        
                                                        
                            <div class="forgot-grid">

                            <div class="forgot">
                                <a href="#">Forgot password?</a>
                            </div>
                            <div class="clearfix"> </div>
                            </div>
                                                        
                            <input type="submit" id="submit" onclick="" name="submit" value="Sign In">
                                                    
                            <div class="registration">
                                   Don't have an account ?
                                <a class="" href="<?php echo base_url(); ?>index.php/Admin/admin_register">
                                 Create an account
                                </a>
                            </div>                            
							
			</form>
		</div>
            </div>				
    </div>
</div>
<!-- end body content -->

<!-- start footer content -->
<?php   
  // include 'footer.php';
?>
<!-- end footer content -->
	<!--- global scripts start ----->
<!--	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/modernizr.custom.js"></script>
        <script src="js/Chart.js"></script>
        <script src="js/metisMenu.min.js"></script>
        <script src="js/custom.js"></script>
        <script src="js/pie-chart.js" type="text/javascript"></script>
        <script src="js/Chart.bundle.js"></script>
        <script src="js/utils.js"></script>
	<script src="js/classie.js"></script>
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<script src='js/SidebarNav.min.js' type='text/javascript'></script>
	<script src="js/SimpleChart.js"></script>
        <script src="js/bootstrap.js"> </script>-->
        <!--- end global scripts --->
        <!-- Core Scripts - Include with every page -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery-1.11.1.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/modernizr.custom.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/Chart.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/metisMenu.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/pie-chart.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/Chart.bundle.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/utils.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/classie.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.nicescroll.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/SidebarNav.min.js"></script>
        
   
</body>
</html>
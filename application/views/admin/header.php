<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* Author : vikash kumar
 * Note   : 
 * 
 */
?>
<?php
// setting session for invalid entry
if($_SESSION['user_name'] ==null ||$_SESSION['user_name'] =="" ){
    return redirect('Admin/index');
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    
    <title> Billionsvision || Admin Dashboard </title>
    <!-- Core CSS - Include with every page -->
<!--    <link rel="icon" type="image/png" href="img/cae_logo.png">
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/main-style.css" rel="stylesheet" />
    -->
    <?=  link_tag('admin_assets/images/bv.png','icon', 'image/png') ?>
    <?=  link_tag('admin_assets/plugins/bootstrap/bootstrap.css','stylesheet', 'text/css') ?>
    <?=  link_tag('admin_assets/font-awesome/css/font-awesome.css','stylesheet', 'text/css') ?>
    <?=  link_tag('admin_assets/plugins/pace/pace-theme-big-counter.css','stylesheet', 'text/css') ?>
    <?=  link_tag('admin_assets/css/style.css','stylesheet', 'text/css') ?>
    <?=  link_tag('admin_assets/css/custom_style.css','stylesheet', 'text/css') ?>
    <?=  link_tag('admin_assets/css/main-style.css','stylesheet', 'text/css') ?>
    

    
</head>

<body>
<?php
// //setting session for invalid entry
//if($_SESSION['user_name'] ==null ||$_SESSION['user_name'] =="" ){
//    return redirect('Adminlogin/index');
//}
?>


    <!--  wrapper -->
    <div id="wrapper">
        <!-- navbar top -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
            <!-- navbar-header -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand">
                    <img src="<?php echo base_url('admin_assets/images/shipingkaro_logo.jpeg'); ?>"width="35" height="25"  alt="" /> <b style="color: whitesmoke; font-size: 26px;"> Billionsvision || Admin </b>
                </a>
            </div>
            <!-- end navbar-header -->
            <!-- navbar-top-links -->
            <ul class="nav navbar-top-links navbar-right">
                <!-- main dropdown -->
                        <li class="dropdown">
                            <a href="<?php echo base_url(); ?>index.php/Admin/index">
                                <i class="fa fa-home fa-2x" title="Home"></i>
                                </a>
                        </li>
                        
                        <li class="dropdown">
                            <a href="<?php echo base_url(); ?>index.php/Admin/logout">
                                <i class="fa fa-eject" style="font-size: 26px;" title="Sign Out"></i>
                                </a>
                        </li>
                
                        
                <!-- end main dropdown -->
            </ul>
            <!-- end navbar-top-links -->

        </nav>
        <!-- end navbar top -->

        <!-- navbar side -->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <!-- sidebar-collapse -->
            <div class="sidebar-collapse">
                <!-- side-menu -->
                <ul class="nav" id="side-menu">
                    <li>
                        <!-- user image section-->
                        <div class="user-section">
                            <div class="user-section-inner">
                                <i class="fa fa-user fa-fw fa-2x text-center"></i>
                            </div>
                            <div class="user-info">
                                <div><p class="text-center"><?php echo $_SESSION["user_name"]; ?></p></div>
                                <div class="user-text-online">
                                    <span class="user-circle-online text-center"></span>&nbsp;Online
                                </div>
                            </div>
                        </div>
                        <!--end user image section-->
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>index.php/AdminDashboard/index" style="font-size:18px;"><i class="fa fa-home" style="font-size: 20px;"></i> Home</a>
                    </li>
                    
<!--                    <li>
                        <a href="#"><i class="fa fa-gear"></i> Manage Settings <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/Department/create_department">Department </a>
                            </li>
                            <li>
                                 <a href="<?php echo base_url(); ?>index.php/Section/create_section">Section </a>
                            </li>
                            
                        </ul>
                         second-level-items 
                    </li>-->
                    
                    <li>
                        <a href="#" style="font-size:18px;"><i class="fa fa-user-circle" style="font-size:20px;margin-right:5px;"></i>  Manage User  <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/Admin/user_list" style="font-size: 18px;"><i class="fa fa-users" style="font-size: 20px;margin-right:9px;"></i>Users List </a>
                            </li>
                            
                             <li>
                                <a href="<?php echo base_url(); ?>index.php/Visitor/visitor_list" style="font-size: 18px;"><i class="fa fa-street-view"  style="font-size: 20px;margin-right:9px;"></i>Visitor List </a>
                            </li>
                        </ul>
                        <!-- second-level-items -->
                    </li>
                   
                    
                    <li>
                        <a href="#" style="font-size: 18px;"><i class="fa fa-bar-chart" style="font-size: 20px;"></i> Manage Campaign <span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li>
                                <a href="#" style="font-size: 18px;"><i class="fab fa-whatsapp" style="font-size: 20px;margin-right:5px;"></i> Whatsapp Campaign<span class="fa arrow"></span> </a>
                                <ul class="nav nav-third-level">
                                      <li>
                                            <a href="<?php echo base_url(); ?>index.php/WhatsappTemplate/index"style="font-size: 18px;"><i class="fa fa-inbox" style="font-size: 20px;margin-right:9px;"></i>Add Template </a>
                                     </li>
                              
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/WhatsappTemplate/view_whatsapp_template"style="font-size: 18px; padding-left: 10px;"><i class="fab fa-stack-overflow" style="font-size: 22px;margin-left: 4px; margin-right:9px;"></i>View Template </a>
                                    </li>
                            
                                </ul>
                            </li>
                          
                        </ul>
                          <ul class="nav nav-third-level">
                            <li>
                                <a href="#" style="font-size: 18px; "><i class="fa fa-inbox" style="font-size: 20px;margin-right:5px;"></i> Email Campaign<span class="fa arrow"></span> </a>
                                <ul class="nav nav-third-level">
                                      <li>
                                            <a href="<?php echo base_url(); ?>index.php/EmaiMessagelTemplate/index" style="font-size: 18px;"><i class="fas fa-layer-group" style="font-size: 20px;margin-right:9px;"></i>Add Email Template </a>
                                     </li>
                              
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/EmaiMessagelTemplate/view_email_template"style="font-size: 18px; padding-left: 10px;margin-right:5px;"><i class="fab fa-stack-overflow" style="font-size: 20px;margin-left: 4px;margin-right:9px;"></i>View Email Template </a>
                                    </li>
                                    
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/EmaiMessagelTemplate/send_email_template"style="font-size: 18px; padding-left: 10px;margin-right:5px;"><i class="fab fa-inbox" style="font-size: 20px;margin-left: 4px;margin-right:9px;"></i>Send Email Template </a>
                                    </li>
                                </ul>
                            </li>
                          
                        </ul>
<!--                         Third-level-items -->
                    </li> 
                </ul>
                <!-- end side-menu -->
            </div>
            <!-- end sidebar-collapse -->
        </nav>
        <!-- end navbar side -->
    </div>
    <!-- end wrapper -->

    <!-- Core Scripts - Include with every page -->
    <script src="<?php echo base_url(); ?>admin_assets/plugins/jquery-1.10.2.js"></script>
    <script src="<?php echo base_url(); ?>admin_assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>admin_assets/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo base_url(); ?>admin_assets/plugins/pace/pace.js"></script>
    <script src="<?php echo base_url(); ?>admin_assets/scripts/siminta.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

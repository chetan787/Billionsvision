
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Billionsvision || Login </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8" />
    <meta name="keywords" content="Kvmgroupbiz Software Services, Kvmgroupbiz Software  in Kulti, Kvmgroupbiz Software in Asansol, Kvmgroupbiz Software in Kokata, Kvmgroupbiz Software in Delhi" />
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- Custom Theme files -->
     <?= link_tag('Adminasset/fonts/css/bootstrap.css','stylesheet','text/css')?> 

    <?= link_tag('Adminasset/fonts/css/style.css','stylesheet','text/css')?>

    <!-- font-awesome icons -->
    <?= link_tag('Adminasset/fonts/css/font-awesome.min.css','stylesheet','text/css')?>

    <!-- //Custom Theme files -->
    <!-- online-fonts -->
    <link href="//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   

</head>

<body>
    <!-- header -->
    <?php include'header.php'?>
    <!-- //header -->
    <!-- inner banner -->
    <div class="inner-banner-w3ls d-flex flex-column justify-content-center align-items-center">
    </div>
    <!-- //inner banner -->
    <!-- breadcrumbs -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb d-flex justify-content-center">
            <li class="breadcrumb-item">
                <a href="<?php echo base_url();?>index.php/Home/index" class="m-0">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Login</li>
        </ol>
    </nav>
    <!-- //breadcrumbs -->
    <!-- login  -->
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="ml-lg-5">
                <form action="<?php echo base_url()?>index.php/Login/user_login" method="post" class="p-sm-3">
                
                    <?php if($error=$this->session->flashdata('Invalid_Login')){
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
                
            <div class="form-group">
                <label for="useremail" class="col-form-label">Email</label>
                <input type="email" class="form-control" placeholder="hello@gmail.com" name="useremail" id="useremail" required="">
                <?php echo form_error('useremail',"<p  style='font-size: 12px;' class='text-danger'>","</p>"); ?>
            </div>
            <div class="form-group">
                <label for="password" class="col-form-label">Password</label>
                <input type="password" class="form-control" placeholder="******" name="password" id="password" required="">
                <?php echo form_error('password',"<p  style='font-size: 12px;' class='text-danger'>","</p>"); ?>    
            </div>
            <div class="right-w3l">
                <input type="submit" class="form-control bg-theme" value="Login">
            </div>
            <div class="row sub-w3l my-3">
                <div class="col-sm-6 sub-w3layouts_hub">
                    <input type="checkbox" id="brand1" value="">
                    <label for="brand1" class="text-secondary">
                        <span></span>Remember me?</label>
                </div>
                <div class="col-sm-6 forgot-w3l text-sm-right">
                    <a href="<?php echo base_url();?>index.php/Password/forgot" class="text-secondary">Forgot Password?</a>
                </div>
            </div>
            <p class="text-center dont-do text-secondary mt-4 mb-4">Don't have an account?
                <a href="<?php echo base_url();?>index.php/Register/index" class="text-theme-2 font-weight-bold mt-4 mb-4">
                    Register Now</a>
            </p>
        </form>
                </div>
        </div>
        <div class="col-md-4"></div>
        
                
            
    </div>
    <!-- //login -->

    <!-- footer -->
    <?php include 'footer.php' ?>
    <!-- //footer -->
    
    <!-- move top icon -->
    <a href="#home" class="move-top text-center">
        <span class="fa fa-level-up" aria-hidden="true"></span>
    </a>
    <!-- //move top icon -->

</body>

</html>
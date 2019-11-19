
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Billionsvision || Dashboard </title>
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
<?php
 //setting session for invalid entry
if($_SESSION['user_name'] ==null ||$_SESSION['user_name'] =="" ){
    return redirect('Login/index');
}
?>
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
                 <a href="<?php echo base_url();?>index.php/UserDashboard/index" class="m-0">Dashboard</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </nav>
    <!-- //breadcrumbs -->
    <!-- main body content -->
    <div class="row">
        <div class="jumbotron">
            <h3 class="text-center mb-4">Welcome to Billions Vision</h3> 
            
            <h5 class="text-center mb-4" style="color:blue;">Billions Vision is online platform for providing the right mentoring to both the investor and the entrepreneur. It serves as a bridge between investors and entrepreneurs to fullfill their requirements for a new startup businesses.</h5>
            <h6 class="text-center mb-4"> Make Your Vision Fly</h6> 
        </div>  
        
                
            
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
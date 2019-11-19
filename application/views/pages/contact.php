

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Billionsvision || Contact </title>
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
<!--    <link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">-->
     <?= link_tag('Adminasset/fonts/css/style.css','stylesheet','text/css')?>
<!--    <link href="css/style.css" type="text/css" rel="stylesheet" media="all">-->
    <!-- font-awesome icons -->
     <?= link_tag('Adminasset/fonts/css/font-awesome.min.css','stylesheet','text/css')?>
<!--    <link href="css/font-awesome.min.css" rel="stylesheet">-->
    <!-- //Custom Theme files -->
    <!-- online-fonts -->
    <link href="//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
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
                <a href="<?php echo base_url(); ?>index.php/Home/index" class="m-0">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
        </ol>
    </nav>
    <!-- //breadcrumbs -->
    <!-- contact -->
    <section class="contact-wthree align-w3" id="contact">
        <div class="container">
            <div class="wthree_pvt_title text-center">
                <h4 class="w3pvt-title" style="text-decoration: underline;">contact us
                </h4>
                <p class="sub-title">Billions Vision,  Banglore, India. </p>
                <p><br> Email: info@billionsvision.com <br> Ph:  +91 6261259949</p>
            </div>
<!--            <div class="mx-auto text-center">
                <iframe class="mt-lg-4 contact-form-wthreelayouts" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387190.2798902705!2d-74.25986790365911!3d40.697670067823786!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+Delhi%2C+ND%2C+India!5e0!3m2!1sen!2sin!4v1536917325197"
                    allowfullscreen></iframe>
                 //footer right 
            </div>-->
            <div class="row mt-4">
                <div class="col-lg-7">
                    <h5 class="cont-form">send us a note</h5>
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
                        
                        <!--Success Flash message available here ..............-->
                          <?php if($error = $this->session->flashdata('msg')){ ?>
                          <p style="color: green;"><strong>Success!</strong> <?php echo $error; ?><p>                         
                            <?php } ?>
                         <!-- //End Flash message available here .............. -->
                        <form action="<?php echo base_url()?>index.php/Visitor/visitor_manager" method="post" class="register-wthree">
                            <div class="form-group">
                                <label>
                                    Your Name
                                </label>
                                <input class="form-control" type="text" placeholder="Johnson" name="name" required="">
                                <?php echo form_error('name',"<p  style='font-size: 12px;' class='text-danger'>","</p>"); ?>
                            </div>
                            
                            <div class="form-group">
                                <label>
                                    Mobile
                                </label>
                                <input class="form-control" type="text" placeholder="xxxx xxxxx" name="mob" required="">
                                <?php echo form_error('mob',"<p  style='font-size: 12px;' class='text-danger'>","</p>"); ?>
                            </div>
                            <div class="form-group">
                                <label>
                                    Email
                                </label>
                                <input class="form-control" type="email" placeholder="example@email.com" name="email"
                                    required="">
                                <?php echo form_error('email',"<p  style='font-size: 12px;' class='text-danger'>","</p>"); ?>
                            </div>
                            
                             <div class="form-group">
                                <label>
                                    Subject
                                </label>
                                <input class="form-control" type="text" placeholder="Enter Subject" name="sub"
                                    required="">
                                 <?php echo form_error('sub',"<p  style='font-size: 12px;' class='text-danger'>","</p>"); ?>
                             </div>
                            
                            
                            
                            <div class="form-group">
                                <label>
                                    Your message
                                </label>
                                <textarea placeholder="Type your message here" name="message" class="form-control"></textarea>
                                <?php echo form_error('message',"<p  style='font-size: 12px;' class='text-danger'>","</p>"); ?>
                            </div>
                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-w3layouts btn-block  bg-theme text-wh w-100 font-weight-bold text-uppercase">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5 text-center">
                    <h5 class="cont-form">get in touch</h5>
                    <div class="row flex-column">
                        <div class="contact-w3">
                            <span class="fa fa-envelope-open  mb-3"></span>
                            <div class="d-flex flex-column">
                                <a href="mailto:info@billionsvision.com" class="d-block">info@billionsvision.com</a>
                            </div>
                        </div>
                        <div class="contact-w3 my-4">
                            <span class="fa fa-phone mb-3"></span>
                            <div class="d-flex flex-column">
                                <p>+91 6261259949</p>
                                
                            </div>
                        </div>
                        <div class="contact-w3">
                            <span class="fa fa-home mb-3"></span>
                            <address>Bangalore <br>India</address>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- //contact -->
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
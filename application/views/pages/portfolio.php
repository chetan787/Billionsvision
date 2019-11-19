
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Billionsvision || Portfolio</title>
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
<a href="<?php echo base_url(); ?>Adminasset/fonts/FontAwesome.otf"></a>
    <!-- Custom Theme files -->

   <?= link_tag('Adminasset/fonts/fontawesome-webfont.eot')?> 
  <?= link_tag('Adminasset/fonts/fontawesome-webfont.svg')?>
   <?= link_tag('Adminasset/fonts/fontawesome-webfont.ttf')?>
 <?= link_tag('Adminasset/fonts/fontawesome-webfont.woff')?>
    <?= link_tag('Adminasset/fonts/fontawesome-webfont.woff2')?>
     <?= link_tag('Adminasset/fonts/css/bootstrap.css','stylesheet','text/css')?>
    
     <?= link_tag('Adminasset/fonts/css/style.css','stylesheet','text/css')?>
    
    <!-- font-awesome icons -->
    <?= link_tag('Adminasset/fonts/css/font-awesome.min.css','stylesheet','text/css')?>
  
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
        <ol class="breadcrumb d-flex justify-content-center ">
            <li class="breadcrumb-item">
                <a href="<?php echo base_url(); ?>index.php/Home/index" class="m-0">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Portfolio</li>
        </ol>
    </nav>
    <!-- //breadcrumbs -->
    <!-- portfolio -->
    <section class="portfolio-wthree align-w3" id="portfolio">
        <div class="container">
            <div class="wthree_pvt_title text-center">
                <h4 class="w3pvt-title">our Portfolio
                </h4>
                <p class="sub-title">Billions Vision is online platform for providing the right mentoring to both the investor and the entrepreneur. 
                           It serves as a bridge between investors and entrepreneurs to fullfill their requirements for a new startup businesses..</p>
            </div>

            
        </div>
    </section>
    <!-- testimonials -->
    <div class="testimonials align-w3" id="testi">
        <div class="container">
            <div class="wthree_pvt_title text-center">
                <h4 class="w3pvt-title">testimonials
                </h4>
                <p class="sub-title">we encourage the new ideas and provide platform to your vision.</p>
            </div>
            <div class="carousel-inner">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="testimonials_grid">
                            <div class="testi-text text-center">
                                <p><span class="fa fa-quote-left"></span>Billions vision help you to achieve your goals and make your career fly.<span class="fa fa-quote-right"></span>
                                </p>
                            </div>
                            <div class="d-flex align-items-center justify-content-center">
                                <div class="testi-desc">
                                    <span class="fa fa-user"></span>
                                    <h5>Chetan</h5>
                                    <p>Member</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="testimonials_grid mt-lg-0 mt-4">
                            <div class="testi-text text-center">
                                <p><span class="fa fa-quote-left"></span>Billions vision help your dream come true<span class="fa fa-quote-right"></span>
                                </p>
                            </div>
                            <div class="d-flex align-items-center justify-content-center">
                                <div class="testi-desc">
                                    <span class="fa fa-user"></span>
                                    <h5>Samsuddin</h5>
                                    <p>Member</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- //testimonials -->
    
    
    <!-- //portfolio -->
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
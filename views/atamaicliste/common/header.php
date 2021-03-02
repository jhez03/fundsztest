<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fundsz</title>
   

    <!-- plugin scripts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,500i,600,700,800%7CSatisfy&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/new/assets/css/animate.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/new/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/new/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/new/assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/new/assets/plugins/fontawesome-free-5.11.2-web/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/new/assets/plugins/kipso-icons/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/new/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/new/assets/css/vegas.min.css">

    <!-- template styles -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/new/assets/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/new/assets/css/responsive.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/new/assets/css/customcss.css">
    <style type="text/css">
    @media (max-width: 1024px) and (min-width: 801px) {
      .banner-one__title{
        font-size: 90px !important;
      }
    }
    @media (max-width: 800px) and (min-width: 769px) {
      .banner-one__title{
        font-size: 70px !important;
      }
    }
    @media (max-width: 768px) {
      .banner-one__title{
        font-size: 70px !important;
      }
    }
    @media (max-width: 414px) {
      .banner-one__scratch{
        width: 80% !important;
      }
    }

    </style>
</head>
<!--     <body id="page-top"> -->
        <!-- Navigation-->
        <!-- <nav class="navbar navbar-expand-lg bg-secondary fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="<?php echo base_url(); ?>"><img style="max-height: 45px !important;" src="<?php echo base_url(); ?>assets/img/site/<?php echo getSiteLogo();?>" class="img-fluid"></a><button class="navbar-toggler navbar-toggler-right bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"> <i class="fa fa-bars"></i></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                         <?php if($_SESSION['juego_id'] != "") { ?>
                        <li class="nav-item mx-0 mx-lg-2"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="<?php echo site_url("dashboard")?>"><?php echo lang('Control Panel'); ?></a></li>
                        <li class="nav-item mx-0 mx-lg-2"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="<?php echo site_url("partners");?>"><?php echo lang('Partners'); ?></a></li>
                        <?php } ?>
                        <li class="nav-item mx-0 mx-lg-2"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="<?php echo site_url("faq");?>">FAQ</a></li>
                        
                    </ul>

                </div>
            </div>
        </nav> -->
        <!-- Masthead-->
        <!-- <header class="masthead banner-bg text-white text-center">
            <div class="container d-flex align-items-center flex-column bounce_index">
                <img class="masthead-avatar mb-3 img-fluid" src="<?php echo base_url(); ?>assets/img/banner-center-logo.png" alt="" />
                <h1 class="masthead-heading text-uppercase mb-2">THE WORLD'S FIRST</h1>
                <h2 class="text-uppercase mb-3">100% DECENTRALIZED</h2>
                <p class="masthead-subheading font-weight-light mb-0">Ethereum Blockchain Instant Income Project</p>
                <?php if($_SESSION['juego_id'] == "") { ?>    
                <div class="mt-3">
                   <a href="<?php echo site_url('earnMoney')?>">  <button class="btn-signup">Sign Up</button></a>
                   <a href="<?php echo site_url('earnMoney')?>"> <button class="btn-login">Login</button></a>
                </div>  
                <?php } ?>  
            </div>
        </header> -->

        <!-- <div id="cover-spin"></div> -->
        
<body>
  <!--  <div class="preloader"><span></span></div> -->
    <div class="page-wrapper">
        <div class="topbar-one">
            <div class="container">
                <div class="topbar-one__left">
                    <div class="header__social" style="    margin: 0px;">
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="<?php echo getSociallinks()->facebooklink;?>"><i class="fab fa-facebook-square"></i></a>
                            <a href="#"><i class="fab fa-pinterest-p"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div><!-- /.header__social -->
                </div><!-- /.topbar-one__left -->
                <div class="topbar-one__right">
                    <a href="<?php echo site_url('earnMoney')?>">Login</a>
                    <a href="<?php echo site_url('refer/1')?>">Register</a>
          
          <a href="#"><div id="google_translate_element"></div>

<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script></a>
                </div><!-- /.topbar-one__right -->
            </div><!-- /.container -->
        </div><!-- /.topbar-one -->
        <header class="site-header site-header__header-one ">
            <nav class="navbar navbar-expand-lg navbar-light header-navigation stricky">
                <div class="container clearfix">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="logo-box clearfix">
                        <a class="navbar-brand" href="<?php echo base_url(); ?>en">
                            <img src="<?php echo base_url(); ?>assets/new/assets/images/logo-dark.png" class="main-logo" width="200" alt="" />
                        </a>
                        
                        <button class="menu-toggler rightside" data-target=".main-navigation">
                            <span class="kipso-icon-menu"></span>
                        </button>
                    </div><!-- /.logo-box -->
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="main-navigation">
                        <ul class=" navigation-box">


                            <li class="current">
                                <a href="<?php echo base_url(); ?>en">Home</a>
                                
                            </li>
                            <li>
                                <a href="<?php echo site_url('referral')?>">Referral Program</a>
                               
                            </li>
                            <!--<li>
                                <a href="">Features</a>
                                
                            </li>
                                <li>
                                <a href="">FAQ's</a>
                                
                            </li>
                            <li>
                                <a href="">Terms</a>
                               
                            </li>
                            <li>
                                <a href="">Contact</a>
                            </li>-->
                        </ul>
                    </div><!-- /.navbar-collapse -->
                   
                </div>
                <!-- /.container -->
            </nav>
            <div class="site-header__decor">
                <div class="site-header__decor-row">
                    <div class="site-header__decor-single">
                        <div class="site-header__decor-inner-1"></div><!-- /.site-header__decor-inner -->
                    </div><!-- /.site-header__decor-single -->
                    <div class="site-header__decor-single">
                        <div class="site-header__decor-inner-2"></div><!-- /.site-header__decor-inner -->
                    </div><!-- /.site-header__decor-single -->
                    <div class="site-header__decor-single">
                        <div class="site-header__decor-inner-3"></div><!-- /.site-header__decor-inner -->
                    </div><!-- /.site-header__decor-single -->
                </div><!-- /.site-header__decor-row -->
            </div><!-- /.site-header__decor -->
        </header><!-- /.site-header -->
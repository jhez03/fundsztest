<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title>Dashboard Page</title>
<link rel="icon" href="https://fundsz.com/assets/img/site/1612269705.png?1234545" type="image/png">
<!-- Bootstrap core CSS -->
<link href="https://fundsz.com/assets/front/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom fonts for this template -->
<link href="https://fundsz.com/assets/front/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Ubuntu:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Russo+One&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Asap:400,500,500i,600,700&display=swap" rel="stylesheet">
<link href="https://fundsz.com/assets/front/css/styles.css?ver=1614096172" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://fundsz.com/assets/front/css/jquery.mCustomScrollbar.css">
<link rel="stylesheet" type="text/css" href="https://fundsz.com/assets/front/css/slick.css">
 <style>
    .fa-bars{
    border: 1px solid #e8cfa0;
    padding: 5px 10px;
    border-radius: 5px;
  }
  .error
  {
    color :red;
  }
  .node {
    cursor: pointer;
  }

  .node circle {
    fill:#082F49;
    stroke: steelblue;
    /*stroke: #082F49;*/
    stroke-width: 3px;
  }

  .node text {
    font: 12px sans-serif;
  }

  .link {
    fill: none;
    stroke: #082F49;
    stroke-width: 5px;
  }
  .circle
  {
    fill:#082F49;
  }
  .lengthy_val p{
    word-break: break-all;
    white-space: :normal;
  }
  .bg_card_blue_2{
    height:100%;
  }
  #mainNav{
    border-bottom: 1px #e8cfa0 solid;
  }
  .bg_card{

    background-color: rgba(0,0,0,0.85);
    border-radius: 0;
    border-width: 2px;
    border-style: solid;
    border-image-source: linear-gradient(to bottom, #000000, #e8cfa0 50%, #000000);
    border-image-slice: 1;
    background-position: center;
    color: #e8cfa0;
    text-align: center;
  
  }
  .text-gold{
    color: #e8cfa0;
    
  }
  /*
    DEMO STYLE
*/

@import "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700";
body {
    font-family: 'Poppins', sans-serif;
    background: #fafafa;
}

p {
    font-family: 'Poppins', sans-serif;
    font-size: 1.1em;
    font-weight: 300;
    line-height: 1.7em;
    color: #999;
}

a,
a:hover,
a:focus {
    color: inherit;
    text-decoration: none;
    transition: all 0.3s;
}

.navbar {
    padding: 15px 10px;
    background: #fff;
    border: none;
    border-radius: 0;
    margin-bottom: 40px;
    box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
}

.navbar-btn {
    box-shadow: none;
    outline: none !important;
    border: none;
}

.line {
    width: 100%;
    height: 1px;
    border-bottom: 1px dashed #ddd;
    margin: 40px 0;
}

/* ---------------------------------------------------
    SIDEBAR STYLE
----------------------------------------------------- */

.wrapper {
    display: flex;
    width: 100%;
}

#sidebar {
    width: 250px;
    position: fixed;
    top: 0;
    left: 0;
    height: 100vh;
    z-index: 999;
    background: #000;
    box-shadow: 0px 2px 5px 0px #e8cfa0;
    color: #e8cfa0;
    transition: all 0.3s;
}

#sidebar.active {
    margin-left: -250px;
}

#sidebar .sidebar-header {
    padding: 20px;
    background: #6d7fcc;
}

#sidebar ul.components {
    padding: 20px 0;
    border-bottom: 1px solid #47748b;
}

#sidebar ul p {
    color: #fff;
    padding: 10px;
}

#sidebar ul li a {
    padding: 10px;
    font-size: 1.1em;
    display: block;
}
.sidebar_menu a {

    display: flex !important;
    align-items: center;

}
#sidebar ul li a:hover,.sidebar_menu:hover, .sidebar_menu.active{
    background: #756300;
    box-shadow: 0px 2px 5px 0px rgb(0 0 0 / 50%);
    border-left: 1px solid #e3ca9c;
    transition: 0s;
    
    
}



a[data-toggle="collapse"] {
    position: relative;
}

.dropdown-toggle::after {
    display: block;
    position: absolute;
    top: 50%;
    right: 20px;
    transform: translateY(-50%);
}

ul ul a {
    font-size: 0.9em !important;
    padding-left: 30px !important;
    background: #6d7fcc;
}

ul.CTAs {
    padding: 20px;
}

ul.CTAs a {
    text-align: center;
    font-size: 0.9em !important;
    display: block;
    border-radius: 5px;
    margin-bottom: 5px;
}

a.download {
    background: #fff;
    color: #7386D5;
}

a.article,
a.article:hover {
    background: #6d7fcc !important;
    color: #fff !important;
}

/* ---------------------------------------------------
    CONTENT STYLE
----------------------------------------------------- */

#content {
    width: calc(100% - 250px);
    min-height: 100vh;
    transition: all 0.3s;
    position: absolute;
    top: 0;
    right: 0;
}

#content.active {
    width: 100%;
}

/* ---------------------------------------------------
    MEDIAQUERIES
----------------------------------------------------- */

@media (max-width: 768px) {
    #sidebar {
        margin-left: -250px;
    }
    #sidebar.active {
        margin-left: 0;
    }
    #content {
        width: 100%;
    }
    #content.active {
        width: calc(100% - 250px);
    }
    #sidebarCollapse span {
        display: none;
    }

}
@media (min-width: 769px){
    #sidebarCollapse, #left-nav {
    display: none;
    }
    #logoResponsive{
        display: flex !important;
    }

    #sidebar {
        margin-left: 0px;
    }
}
/* new color style*/
.user-info{
    background: transparent;
}
.user-info p, .card-body p, .card-body img{
    color: #e8cfa0;

}
.gradient-dark{
    background-image: linear-gradient(180deg, #131313 0%, #080808 100%);
    border: 1px solid #272727;
    border-radius: 5px;
}
.card-header{
    margin-bottom: 0;
    padding: 0.9rem 0.5rem;
    border-bottom: 1px solid rgba(0, 0, 0, .05);
    background-color: unset;
    border-bottom: 1px solid #272727;
    text-align: center;
    display: flex;
    justify-content: center;
    align-items: center;
    color: #e8cfa0;
}
.card-body{
    text-align: center;
    flex: 1 1 auto;

}
.card{
  background-image: linear-gradient(180deg, #131313 0%, #080808 100%);
    border: 1px solid #272727;
    border-radius: 5px;
}
.banner_card_img {
    max-width: 27px;
}
.card_level:hover, .card_level.active {
    background: none;
    background-image: linear-gradient(to right, #000000 1%, #e3ca9c 20%, #000000 100%);
}
.sell_level_bg_2 {
    background: #131313;
    box-shadow: 0px 2px 2px 0px rgb(0 0 0 / 50%);
}
.btn-black-large{
 
    border: 2px solid #e8cfa0;
    background-color: transparent;
    color: #fff;
    transition: all ease 0.5s;
    font-size: 20px;
    line-height: normal;
    padding: 12px;
    border-radius: 0;
}
.btn-black-large:hover{
  cursor: pointer;
   background-color: #e8cfa0;
    box-shadow: none;
    color: #756300;

  }
.partners-sec .form-control{
    border: none;
    background-color: transparent;
    border-bottom: 1px solid #e8cfa0;
    outline: none;
    box-shadow: none;
  }
  .social_icon_footer i{
    border: 1px solid #e8cfa0 !important;
    background-image: linear-gradient(to top, #131313, #e8cfa0, #e8cfa0, #e8cfa0, #131313);
  }
  .faq-accord-sec .panel-title > a, .faq-accord-sec .panel-title > a:active {
    background: transparent;
  }
  .faq-tab-sec nav > div a.nav-item.nav-link{
    background: transparent;
    background-color: rgba(0,0,0,0.85);
    border-radius: 0;
    border-width: 2px;
    border-style: solid;
    border-image-source: linear-gradient(to bottom, #000000, #e8cfa0 50%, #000000);
    border-image-slice: 1;
    background-position: center;
    color: #e8cfa0;
    text-align: center;

  }
  .faq-tab-sec nav > div a.nav-item.nav-link.active {
    background-image: linear-gradient(to right, #000000 1%, #e3ca9c 20%, #000000 100%);
  }
    .faq-tab-sec nav > div a.nav-item.nav-link:hover {
    background-image: linear-gradient(to right, #000000 1%, #e3ca9c 20%, #000000 100%);
    color: #756300;
  }
  .navbar-nav li.nav-item a.nav-link:hover{
    color: #756300 !important;
  }
  </style>




</head>

   <body id="page-top">
        <!-- Navigation-->
      <div class="wrapper">
        
        <nav class="navbar navbar-expand-lg bg-secondary fixed-top" id="mainNav">
            <div class="container-fluid">
                <a class="navbar-brand js-scroll-trigger collapse navbar-collapse " id="logoResponsive" href="https://fundsz.com/"><img style="max-height: 45px !important;" src="https://fundsz.com/assets/img/site/1612269692.png" class="img-fluid"  ></a>
                <button class="navbar-toggler navbar-toggler-right text-white rounded" type="button" data-toggle="collapse" id="sidebarCollapse"data-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars "></i></button>

                <button class="navbar-toggler navbar-toggler-right text-white rounded" id="left-nav" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars "></i></button>

                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                                            <li class="nav-item mx-0 mx-lg-2"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="https://fundsz.com/en/dashboard">Dashboard</a></li>
                        <li class="nav-item mx-0 mx-lg-2"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="https://fundsz.com/en/partners">Team Network</a></li>
                                            <li class="nav-item mx-0 mx-lg-2"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="https://fundsz.com/en/faq">FAQ</a></li>
                        <?php if($_SESSION['juego_id'] != "") { ?>
              <li class="nav-item mx-0 mx-lg-2"><a href='<?php echo site_url('sair');?>' class="nav-link py-3 px-0 px-lg-3 rounded"><?php echo lang('Logout'); ?></a>
              </li>
              <?php } ?>
                        
                    </ul>

                </div>
            </div>
            <hr>
        </nav>

  
     
  <input type="hidden" id="base_url" value="https://fundsz.com/en">

  <input type="hidden" id="curr_lang" value="en">

  <input type="hidden" id="en_url" custom="en" value="https://fundsz.com/en/dashboard">

  <input type="hidden" id="es_url" custom="es" value="https://fundsz.com/es/dashboard">

        <div id="content" class="control-panel id=">
           <!-- Sidebar  -->
        <nav id="sidebar" style="margin-top:77px;">
        

            <ul class="list-unstyled components">
              <?php if($_SESSION['juego_id'] != "") { ?>
            <li class="sidebar_menu <?php echo $action=='dashboard' ? 'active' : '';?>">

                <a href='<?php echo site_url("dashboard")?>'><span class="sidebar_icon"><img src="<?php echo base_url()?>assets/front/images/control_panel_grey.png" class="icon_sidebar"></span><span class="sidebar_text">Dashboard</span></a></li>
            <?php if($_SESSION['juego_id'] != "1") { ?>
            <li class="sidebar_menu <?php echo $action=='uplines' ? 'active' : '';?>">

              <a href='<?php echo site_url("uplines");?>'><span class="sidebar_icon"><img src="<?php echo base_url()?>assets/front/images/uplines.png" class="icon_sidebar"></span><span class="sidebar_text">Uplines</span></a>

            </li>
            <?php } ?>
                <li class="sidebar_menu <?php echo $action=='commission' ? 'active' : '';?>">

                <a href='<?php echo site_url("commission");?>'><span class="sidebar_icon"><img src="<?php echo base_url()?>assets/front/img/earned-money-white.png" class="icon_sidebar" height="25" width="25"></span><span class="sidebar_text"><?php echo "Donations Received"; ?></span></a>

              </li> 
              <li class="sidebar_menu <?php echo $action=='referred' ? 'active' : '';?>">

                <a href='<?php echo site_url("referred");?>'><span class="sidebar_icon"><img src="<?php echo base_url()?>assets/front/images/partners.png" class="icon_sidebar"></span><span class="sidebar_text"><?php echo 'Team Network'; ?></span></a>

              </li>
              <li class="sidebar_menu <?php echo $action=='partners' ? 'active' : '';?>">

                <a href='<?php echo site_url("partners");?>'><span class="sidebar_icon"><img src="<?php echo base_url()?>assets/front/images/partners.png" class="icon_sidebar"></span><span class="sidebar_text"><?php echo 'My Personally Referred'; ?></span></a>

              </li>
              <li class="sidebar_menu <?php echo $action=='placement' ? 'active' : '';?>">

                <a href='<?php echo site_url("placement");?>'><span class="sidebar_icon"><img src="<?php echo base_url()?>assets/front/images/uplines.png" class="icon_sidebar"></span><span class="sidebar_text"><?php echo "Placement Tool"; ?></span></a>

              </li>
              <li class="sidebar_menu <?php echo $action=='promo' ? 'active' : '';?>">

                <a href='<?php echo site_url("promo");?>'><span class="sidebar_icon"><img src="<?php echo base_url()?>assets/front/images/mobile-marketing.png" class="icon_sidebar" height="25" width="25"></span><span class="sidebar_text">Marketing Tools</span></a>

              </li>
              <li class="sidebar_menu <?php echo $action=='faq' ? 'active' : '';?>">

                <a href='<?php echo site_url("faq");?>'><span class="sidebar_icon"><img src="<?php echo base_url()?>assets/front/images/faq.png" class="icon_sidebar"></span><span class="sidebar_text"><?php echo lang('Frequently Asked Questions'); ?></span></a>

              </li>
               
              <?php if($_SESSION['juego_id'] != "1") { ?>
              <li class="sidebar_menu <?php echo $action=='renewal' ? 'active' : '';?>">

                <a href='<?php echo site_url("renewal");?>'><span class="sidebar_icon"><img src="<?php echo base_url()?>assets/front/images/uplines.png" class="icon_sidebar"></span><span class="sidebar_text"><?php echo "Renewal Date"; ?></span></a>

              </li>
              <?php } ?>

              


              

             

              <!--<li class="sidebar_menu <?php echo $action=='email' ? 'active' : '';?>">

                <a href='<?php echo site_url("email");?>'><span class="sidebar_icon"><img src="<?php echo base_url()?>assets/front/images/promo.png" class="icon_sidebar"></span><span class="sidebar_text"><?php echo "Email Update"; ?></span></a>

              </li>-->

              <!--<li class="sidebar_menu <?php echo $action=='support' ? 'active' : '';?>">

                <a href='<?php echo site_url("support");?>'><span class="sidebar_icon"><img src="<?php echo base_url()?>assets/front/images/faq.png" class="icon_sidebar"></span><span class="sidebar_text"><?php echo "Support"; ?></span></a>

              </li>-->
              <?php } ?>
              






               <?php if($_SESSION['juego_id'] != "") { ?>
              <li class="sidebar_menu mb-5"><a href='<?php echo site_url('sair');?>'><span class="sidebar_icon"><img src="<?php echo base_url()?>assets/front/images/logout.png" class="icon_sidebar"></span><span class="sidebar_text"><?php echo lang('Logout'); ?></span></a>
              </li>
              <?php } ?>
            </ul>

        </nav>

<!-- <div id="cover-spin">
<div class="test">
  
  <center><p class="show_text">
  !DO NOT CLOSE THIS WINDOW !!
  <br/>
  Your Transaction is in Process!
  <br/>
  It May Take Several Minutes For This Process to Complete...
  ! DO NOT CLICK OR REFRESH THE PAGE !!
  <br/>
  After the transaction is complete, you will be redirected into your members area account.
  <br/>
  Then you can check your transaction on etherscan.io</p> </center>

</div>
</div> -->




        <?php 

        if(FS::session()->userdata('login_type')=='manual')
        {

            ?>
          

            <?php 

        }
        ?>


<?php if($news->status==1) {?>
      <div class="row mx-0 mt-3 photo_banner">
        <div class="bg_card  w-100">
          <div class="card-body p-1">
            <p class='text-gold'><?php echo "Members Online"; ?></p>
             <div class="media mb-1">
              <div class="media-body lengthy_val">
                <p class="mb-0 mt-1" ><?php echo $news->content1; ?> </p>                 
              </div>
            </div>
          </div>
        </div>
        <div class="bg_card w-100 ">
          <div class="card-body p-1">
            <p class='text-gold'><?php echo "Visitors online"; ?></p>
             <div class="media mb-1">
              <div class="media-body lengthy_val">
                <p class="mb-0 mt-1" ><?php echo $news->content2; ?> </p>                 
              </div>
            </div>
          </div>
        </div>
        <div class="bg_card  partner_card w-100">
          <div class="card-body p-1">
            <p class='text-gold'><?php echo "Latest News"; ?></p>
             <div class="media mb-1">
              <div class="media-body lengthy_val">
                  <a href="<?php echo site_url('news');?>"><p class="mb-0 mt-1" >Click here </p>  </a>         
              </div>
            </div>
          </div>
        </div>
        <!--<div class="bg_card_blue_1 bg_card_blue_2 partner_card w-100">
          <div class="card-body p-1">
            <p class='text-white'>Tuesday conference calls</p>
             <div class="media mb-1">
              <div class="media-body lengthy_val">
                  <p class="mb-0 mt-1" ><?php echo $news->content4; ?> </p>                   
              </div>
             

            </div>
          </div>
        </div> --> 
      </div>  

        <?php } ?>
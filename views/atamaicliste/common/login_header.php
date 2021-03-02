<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title><?php echo getSiteName();?></title>
<link rel="icon" href="<?php echo base_url();?>assets/img/site/<?php echo getSiteFavicon();?>?1234545" type="image/png">
<!-- Bootstrap core CSS -->
<link href="<?php echo base_url()?>assets/front/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">



<link href="<?php echo base_url()?>assets/front/css/styles.css?ver=<?php echo date('U')?>" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/front/css/DataTables/datatables.min.css">
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
   .error
  {
    color :red;
  }
</style>

</head>

  <body id="page-top">
        <!-- Navigation-->

        <!-- Masthead-->
        <header class="masthead-login banner-bg text-white text-center">
            <div class="container">
              <div class="row justify-content-end">
                 <div class="col-lg-3">
                    
                 </div> 
              </div>  
             <?php 

              $lang_url     =   FS::uri()->segment(1);

              ?>
              <input type="hidden" id="curr_lang" value="<?php echo $lang_url;?>">

              <input type="hidden" id="base_url" value="<?php echo base_url().$lang_url;?>">
        
<div id="cover-spin">
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
</div>

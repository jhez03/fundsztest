<div class="inner_section_bg">
  <div class="row mx-0 py-3 container-fluid">
    <div class="col-12 col-lg-2 sidebar_col px-3 px-lg-0">
      <div class="sidebar">

<div class=""> 

<div class="left_sidebar">  
<ul class="left_sidebar_menu mb-0 pl-0">
  <li class="sidebar_menu navigation">
     <button class="navbar-toggler" type="button" data-toggle="collapse" id="sidabar_toggle_btn_1" data-target="#sidebarSupportedContent" aria-controls="sidebarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="text-white"><?php echo lang('Navigation'); ?></span>
</button>
  </li>
<div class="" id="sidebarSupportedContent"> 
<?php if($_SESSION['juego_id'] != "") { ?>
<li class="sidebar_menu <?php echo $action=='dashboard' ? 'active' : '';?>">

	<a href='<?php echo site_url("dashboard")?>'><span class="sidebar_icon"><img src="<?php echo base_url()?>assets/front/images/control_panel_grey.png" class="icon_sidebar"></span><span class="sidebar_text"><?php echo lang('Control Panel'); ?></span></a></li>

<!-- <li class="sidebar_menu <?php echo $action=='message' ? 'active' : '';?>">

	<a href='<?php echo site_url("message");?>'><span class="sidebar_icon"><img src="<?php echo base_url()?>assets/front/images/messages.png" class="icon_sidebar"></span><span class="sidebar_text"><?php echo lang('Messages'); ?></span></a>

</li> -->


<?php if($_SESSION['juego_id'] != "1") { ?>
<li class="sidebar_menu <?php echo $action=='uplines' ? 'active' : '';?>">

	<a href='<?php echo site_url("uplines");?>'><span class="sidebar_icon"><img src="<?php echo base_url()?>assets/front/images/uplines.png" class="icon_sidebar"></span><span class="sidebar_text"><?php echo lang('Uplines'); ?></span></a>

</li>
<?php } ?>
 <li class="sidebar_menu <?php echo $action=='commission' ? 'active' : '';?>">

	<a href='<?php echo site_url("commission");?>'><span class="sidebar_icon"><img src="<?php echo base_url()?>assets/front/images/lost_profiles.png" class="icon_sidebar"></span><span class="sidebar_text"><?php echo "Commission Earned (Transactions)"; ?></span></a>

</li> 

<li class="sidebar_menu <?php echo $action=='promo' ? 'active' : '';?>">

	<a href='<?php echo site_url("promo");?>'><span class="sidebar_icon"><img src="<?php echo base_url()?>assets/front/images/promo.png" class="icon_sidebar"></span><span class="sidebar_text"><?php echo lang('Promo'); ?></span></a>

</li>
<?php if($_SESSION['juego_id'] != "1") { ?>
<li class="sidebar_menu <?php echo $action=='renewal' ? 'active' : '';?>">

	<a href='<?php echo site_url("renewal");?>'><span class="sidebar_icon"><img src="<?php echo base_url()?>assets/front/images/uplines.png" class="icon_sidebar"></span><span class="sidebar_text"><?php echo "Renewal Date"; ?></span></a>

</li>
<?php } ?>

<li class="sidebar_menu <?php echo $action=='partners' ? 'active' : '';?>">

	<a href='<?php echo site_url("partners");?>'><span class="sidebar_icon"><img src="<?php echo base_url()?>assets/front/images/partners.png" class="icon_sidebar"></span><span class="sidebar_text"><?php echo 'Personally Referred Partners'; ?></span></a>

</li>


<li class="sidebar_menu <?php echo $action=='referred' ? 'active' : '';?>">

	<a href='<?php echo site_url("referred");?>'><span class="sidebar_icon"><img src="<?php echo base_url()?>assets/front/images/partners.png" class="icon_sidebar"></span><span class="sidebar_text"><?php echo 'Indirect Partners'; ?></span></a>

</li>

<li class="sidebar_menu <?php echo $action=='placement' ? 'active' : '';?>">

	<a href='<?php echo site_url("placement");?>'><span class="sidebar_icon"><img src="<?php echo base_url()?>assets/front/images/uplines.png" class="icon_sidebar"></span><span class="sidebar_text"><?php echo "Placement Tool"; ?></span></a>

</li>

<li class="sidebar_menu <?php echo $action=='email' ? 'active' : '';?>">

	<a href='<?php echo site_url("email");?>'><span class="sidebar_icon"><img src="<?php echo base_url()?>assets/front/images/promo.png" class="icon_sidebar"></span><span class="sidebar_text"><?php echo "Email Update"; ?></span></a>

</li>

<!--<li class="sidebar_menu <?php echo $action=='support' ? 'active' : '';?>">

	<a href='<?php echo site_url("support");?>'><span class="sidebar_icon"><img src="<?php echo base_url()?>assets/front/images/faq.png" class="icon_sidebar"></span><span class="sidebar_text"><?php echo "Support"; ?></span></a>

</li>-->
<?php } ?>
<li class="sidebar_menu <?php echo $action=='faq' ? 'active' : '';?>">

	<a href='<?php echo site_url("faq");?>'><span class="sidebar_icon"><img src="<?php echo base_url()?>assets/front/images/faq.png" class="icon_sidebar"></span><span class="sidebar_text"><?php echo lang('FAQ'); ?></span></a>

</li>






 <?php if($_SESSION['juego_id'] != "") { ?>
<li class="sidebar_menu mb-5"><a href='<?php echo site_url('sair');?>'><span class="sidebar_icon"><img src="<?php echo base_url()?>assets/front/images/logout.png" class="icon_sidebar"></span><span class="sidebar_text"><?php echo lang('Logout'); ?></span></a>
</li>
<?php } ?>

</div>
</ul>
</div>
</div> 


</div>
</div>
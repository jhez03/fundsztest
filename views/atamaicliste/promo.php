<!--<div class="col-12 col-lg-10 content_col pl-3 pl-lg-3 pr-3 pr-lg-0">-->
<div>
      <div>
        <div class="">
       <div class="row user-info mx-2 p-3">
         <div class="col-lg-2 border-right">
           <div class="user-id">
             <p>ID <img src="<?php echo base_url(); ?>assets/img/id-card.png" class="img-fluid mx-2"> <span class="text-white"><?php echo FS::session()->userdata('con_u_id')?></span></p>
           </div> 
         </div> 
         <div class="col-lg-10 col-xl-8">
           <div class="user-id mx-3">
             <p>ETH Address <img src="" class="img-fluid"> <a href="https://etherscan.io/address/<?php echo FS::session()->userdata('address');?>"> <span class="text-white"><?php echo substr(FS::session()->userdata('address'),0,1000); ?></span>
             </a></p>
           </div> 
         </div>
       </div> 
     </div>
      <div class="pl-3 pl-lg-3 pr-3 pr-lg-0 mt-4">
        <h3 class="text-white font_weight_400 font_asap">Promotional Materials</h3>
        <div class="mx-0 mb-3">
          <div class="col-lg-12 faq-tab-sec mt-4 sell_level_bg_2" style="color:#fff">
            <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                      <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#tabs-1" role="tab" aria-controls="nav-home" aria-selected="true">Presentation</a>
                      <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#tabs-2" role="tab" aria-controls="nav-profile" aria-selected="false">Text</a>
                      <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#tabs-3" role="tab" aria-controls="nav-contact" aria-selected="false">Banner</a>
                      <a class="nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#tabs-4" role="tab" aria-controls="nav-about" aria-selected="false">Video</a>
                     
                    </div>
                  </nav><!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane active" id="tabs-1" role="tabpanel">

    <?php if($presen)
      {   
           foreach($presen as $result) { ?>

     <div class="promo-img text-center">
      <p class="mb-3 text-center present-title"> <?php echo $result->title; ?></p>
      <a target="_blank" href="<?php echo base_url().'assets/img/site/'.$result->document; ?>" class="down-pre my-2 d-block">Download Presentation</a>
      <img src="<?php echo base_url().'assets/img/site/'.$result->image; ?>" class="img-fluid">
      
     </div>

      <?php   
   } }else {?>

     <div class="promo-img text-center">
        <p class="mb-3 text-center present-title"><?php echo lang('No Records Found')?></p>
     </div>
  <?php }?>
  </div>
   <div class="tab-pane" id="tabs-2" role="tabpanel">
     <h2 class="ad-news present-title text-center mb-4"><?php echo lang('Text advertising for posts and newsletters')?></h2>

      <?php if($text)
      {    
           foreach($text as $result) { ?>

     <div class="ad-news-cont">
       <p class="text-center"><?php echo $result->title; ?></p>
       <p><?php echo $result->content; ?></p>
     </div> <br> <br> <br>


     <?php } }else {?>

   <div class="ad-news-cont">
        <p class="text-center"><?php echo lang('No Records Found')?></p>
     </div>
  <?php }?>
  </div>
 
  <div class="tab-pane" id="tabs-3" role="tabpanel">

     <?php if($banner)
      {    
           foreach($banner as $result) { ?>

     <div class="promo-img text-center py-5">

      <img src="<?php echo base_url().'assets/img/site/'.$result->image; ?>" class="img-fluid mb-3 d-block mx-auto">

      <a target="_blank" href="<?php echo base_url().'assets/img/site/'.$result->image; ?>" class="down-pre my-2 d-block"><?php echo lang('View');?></a>

     
     </div>

      <?php } }else {?>

      <div class="promo-img text-center py-5">
            <p class="text-center"><?php echo lang('No Records Found')?></p>
     </div>

          <?php }?>

      
  </div>
    <div class="tab-pane" id="tabs-4" role="tabpanel">


      <?php if($video)
      {  
        $i=1;

           foreach($video as $result) { $val= $i % 3 ;   
if($i % 3 == '1')
{?>

      <div class="row emb-yt">
<?php }?>
        <div class="col-sm-4">
          <h5 class="text-center"><?php echo $result->title; ?></h5>
          <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="<?php echo $result->link; ?>" allowfullscreen></iframe>
          </div>
          <input readonly="readonly" id="rlink" class="ad-path my-3" value="<?php echo $result->link; ?>" size="33">
        </div> 

    <?php    if($i % 3 == '0')
{?>     
     </div>
<?php }?>

      <?php $i++; } }else {?>

      <div class="promo-img text-center py-5">
            <p class="text-center"><?php echo lang('No Records Found')?></p>
     </div>

      <?php }?>
          
  </div>
</div>

</div>
         

        </div>

        
      </div>  
 
      </div>

    </div>
    

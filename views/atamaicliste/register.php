                  <div class="login-sec mt-3">
                    <div class="row no-gutters justify-content-center">
                       <div class="col-lg-6 col-xl-5 col-12">
                              <div class="login-box">
                         <h3><?php echo lang('Registration'); ?></h3>
                         <p>(<?php echo "Purchase of 1 Level"; ?>)</p>
                         <img src="<?php echo base_url()?>assets/front/img/login-img.png" class="img-fluid"><br>
                          
                            <div class="form-group">

                            <input class="form-control" readonly="" placeholder="<?php echo lang('ETH address or ID upline'); ?>" id="referrer_value">

                             <input class="form-control"  type="hidden" placeholder="<?php echo lang('ETH address or ID upline'); ?>" id="original_referrer_value" >
                          </div>

                          <p><?php echo lang('To specify the referrer manually'); ?></p>
                          <!-- new additions -->
                          <div>
                            <label for="" class="col-form-label">Membership Plan</label>
                          </div>
                          <div class="custom-control custom-radio custom-control-inline">
                          <input checked type="radio" id="vip_10" name="vip" class="custom-control-input plan" value="1">
                          <label class="custom-control-label" for="vip_10">VIP 10</label>
                          </div>
                          <div class="custom-control custom-radio custom-control-inline" >
                          <input type="radio" id="vip_50" name="vip" class="custom-control-input plan" value="2">
                          <label class="custom-control-label" for="vip_50">VIP 50</label>
                          </div>

                          <input type="hidden" id="vipplan" name="vipplan"  value="1">
                          <input type="hidden" id="plan1_price" name="plan1_price"  value="<?php echo $plan1_price ?>">
                          <input type="hidden" id="plan2_price" name="plan2_price"  value="<?php echo $plan2_price ?>">
                          <!-- end new additions -->

                           <button class="btn btn-green-large mt-4 to-reg"><?php echo lang('To Register'); ?></button>
                        
                        <br>
                         <a href="<?php echo site_url("earnMoney")?>">
                         <button class="btn btn-green-br mt-3"><i class="fa fa-fw fa-long-arrow-left"></i> <?php echo lang('Back'); ?></button>
                       </a>
                        
                     </div> 
                       </div>
                       <div class="col-lg-6 col-xl-5 col-12">
                           <div class="login-box2">
                             <div class="close-icon float-right">
            <a href=""> <img src="<?php echo base_url()?>assets/front/img/close-icon.png" class="img-fluid"></a>
          </div> 
                               <a href="<?php echo site_url()?>"> <img src="<?php echo base_url(); ?>assets/img/site/<?php echo getSiteLogo();?>"  class="img-fluid"></a>
                               <div class="mt-3">
                                <h4><?php echo lang('Follow us on social networks'); ?></h4>
                                  <a href="<?php echo getSociallinks()->facebooklink;?>"  target="_blank"> <span class="social_icon_footer mr-3"><i class="fa fa-facebook" aria-hidden="true"></i></span> </a>
                                   <a href="<?php echo getSociallinks()->twitterlink;?>" target="_blank"> <span class="social_icon_footer mr-3"><i class="fa fa-twitter" aria-hidden="true"></i></span> </a>

                                   <a href="<?php echo getSociallinks()->youtubelink;?>" target="_blank"> <span class="social_icon_footer mr-3"><i class="fa fa-youtube" aria-hidden="true"></i></span> </a>
                               </div> 
                              

                                 <p class="mt-3"><?php echo lang('Any question you get in our chat'); ?>:</p>
                                  <a href="<?php echo getSociallinks()->telegram_link;?>" target="_blank">   <button class="btn btn-green-large mt-3"><img src="<?php echo base_url()?>assets/front/img/telegram.png" class="img-fluid pr-2"> <?php echo lang('Chat in Telegram EN'); ?></button></a>
                                  
                                    <div class="smart-contract">
                                     <h3>FUNDSZ Smart Contract:</h3>
                                       <a href="<?php echo $add_url; ?>address/<?php echo encrypt_decrypt('decrypt',$address->address_name); ?>"  target="_blank" class="text_green word_break"> <p><?php echo substr(encrypt_decrypt('decrypt',$address->address_name),0,132); ?>
                    
                                  
                                  
                                     </p></a>
                                     </div>
                           </div>   
                       </div>
                     </div>  
                 
                  </div> 
               
               </div> 
                <div class="container">
                  <div class="row mx-0">
                    <div class="col-xl-10 mx-auto mt-3 px-3 px-lg-0">


                  <?php 
                  if($is_referrer==0)
                  {

                  ?>
                  <div class="alert alert-warning" >

                    <i class="fa fa-exclamation-circle"></i> <?php echo lang("You came without affiliate links, or it didn't work, so Your upline is unknown. If You know the id or Ethereum address of Your upline, then enter it in the field"); ?>

                  </div> 

                  <div class="overlay">
                  <div class="modal fade" id="myModal" role="dialog" >
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content" >
                          
                          <div class="modal-body"  >
                          <button type="button" class="close close_custom"  data-dismiss="modal" id="close_modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                            <center><p ><b> <img   class=""style="max-height: 45px !important;" src="<?php echo base_url(); ?>assets/img/site/<?php echo getSiteLogo();?>" > </b> </p>
                            </center>
                            <center><p style="font-size: 18px;color: black;"><b> <?php echo lang("You came without affiliate links, or it didn't work, so Your upline is unknown. If You know the id or Ethereum address of Your upline, then enter it in the field"); ?>
                           </b></p></center>
                      
                          </div>
                          <div class="modal-footer" >
                           <center><p style="font-size: 20px"><b></b> </p></center>
                          </div>
                        </div>
                      </div>
                    </div>
                    </div>
                   

                  <?php 
                  }
                  ?>
                     
                 </div>
            </div>
          </div>
        </header>
     


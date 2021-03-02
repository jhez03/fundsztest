<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/front/css/tooltip.css?ver=<?php echo date('U')?>">
<div class="col-12 col-lg-10 content_col pl-3 pl-lg-3 pr-3 pr-lg-0">
      <div>
         <div class="">
       <div class="row user-info mx-2 p-3">
         <div class="col-lg-2 border-right">
           <div class="user-id">
             <p>ID <img src="<?php echo base_url(); ?>assets/img/id-card.png" class="img-fluid mx-2"> <span class="text-white word_break"><?php echo FS::session()->userdata('con_u_id')?></span></p>
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
      <div class="pl-3 pl-lg-3 pr-3 pr-lg-0 mt-3">
        <h3 class="text-white font_weight_400 font_asap"><?php echo 'Personally Refered Partners'; ?></h3>
      



        <div class="mx-0 mb-3">
          <div class="row mb-4 mt-3">
          <div class="col-12 col-xl-6">
             <div class="sell_level_bg_2 partners-sec px-5 py-4 h-175">
                <div class="partners-sec">
                   <h4><?php echo lang('Your Affiliate Link'); ?></h4>
                   <form class="mt-3">
                    <div class="row">
                     <div class="form-group col-12 col-md-9">
                     <input class="form-control" placeholder="" id="ref_url" value="<?php echo $ref_url?>"> 
                   </div>
                   <div class="col-12 col-md-3">
                      <button class="btn btn-black-large" type="button" onclick="copy()"><?php echo lang('Copy'); ?></button>
                   </div>
                   </div>
                
                   </form>
                   <div class="mb-0 mt-2">


                        <span class="social_icon_footer mr-3"  data-sharer="facebook" data-url="<?php echo $ref_url?>"><i class="fa fa-facebook" aria-hidden="true"></i></span> 

                        <span class="social_icon_footer mr-3" data-sharer="twitter" data-title="<?php echo getSiteName();?>" data-url="<?php echo $ref_url?>"><i class="fa fa-twitter" aria-hidden="true"></i></span>

                       <span class="social_icon_footer mr-1" data-sharer="telegram" data-title="<?php echo getSiteName();?>" data-url="<?php echo $ref_url?>" data-to="+44555-5555"><i class="fa fa-telegram" aria-hidden="true"></i></span>


                  


                  </div>
                </div> 
             </div>
          </div>   
           <div class="col-12 col-xl-6">
             <div class="sell_level_bg_2 partners-sec px-5 py-4 h-175">
               <div class="partners-sec">
                   <h4><?php echo lang('Data About Partner'); ?></h4>

                    <form class="mt-3" id="about_partner">
                      <div class="row">

                      <div class="form-group col-12 col-md-9">
                        <input class="form-control" placeholder="<?php echo lang('ID or ETH Wallet Partner'); ?>" name="partner_id" id="partner_id">
                      </div>
                      
                      <div class="col-12 col-md-3">
                        <button class="btn btn-black-large" type="submit"><?php echo lang('Show'); ?></button>
                      </div>

                     </div>
                
                   </form>

                     

                </div> 


                <div class="data-add">
                
                </div>
             </div>
          </div>   
         </div>
          <div class="row mt-3">
            <div class="col-12">
               <div class="sell_level_bg_2 partners-sec px-4 py-4 text-white">
                    
                    <?php

                      
                        $viewTree = 'yes';
                       
                    ?>
                   <div class="partners-sec  <?php echo $viewTree=='yes' ? 'scroll-content' : ''?>"> 
                        <h4><?php echo lang('Your Structure'); ?></h4>
                        <p onclick="toggleTree();" class="expand"><strong><?php echo lang('To expand collapse all'); ?></strong></p>

                          <?php 

                          if($viewTree=='yes')
                          {

                          ?>

                          <div class="tree" id="tree">
                         
                          <script type="text/javascript">

                          var partnertreeData = '<?php echo $tree_data;?>';

                          </script>

                          <script src="<?php echo base_url()?>assets/FKundzJSOfghjiiToraus/jukepox/d3.js"></script>

                         

                          <script src="<?php echo base_url()?>assets/FKundzJSOfghjiiToraus/jukepox/partnertree.js?ver=<?php echo date('U')?>"></script>                     

                          </div>
                          
                          <?php

                          }
                          else
                          {
                            ?>
                                      <div class="row mt-5 mb-5">
                                      <div class="col-12 col-md-5 mx-auto">
                                      <div class="login-box">
                                      <h3><?php echo lang('Login')?></h3>
                                      <p><?php echo lang('In Order to see your tree structure, you must provide your password.')?></p>
                                      <form id="levelPassCheck" class="text-center">
                                      <div class="form-group">
                                      <input class="form-control" placeholder="<?php echo lang('Enter Your Password')?>" name="levelPasswrd" id="levelPasswrd" type="password">
                                      </div>
                                      <button class="btn btn-green-large mt-4" type="submit"><?php echo lang('Submit')?></button>
                                      </form>
                                      </div>
                                      </div>  
                                      </div>
                            <?php
                          }
                      ?>


               </div>
               </div>
            </div>
         </div>    

        </div>

        
      </div>  


      </div>

    </div>

    <script type="text/javascript">
      
      let curr_level    =   "<?php echo $users->current_level;?>";

      let contract_id    =   "<?php echo $users->contract_id;?>";

    </script>
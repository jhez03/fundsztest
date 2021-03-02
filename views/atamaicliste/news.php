<div class="col-12 col-lg-10 content_col pl-3 pl-lg-3 pr-3 pr-lg-0">
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
             <p>ETH Address <img src="" class="img-fluid"> <a href="https://ropsten.etherscan.io/address/<?php echo FS::session()->userdata('address');?>"> <span class="text-white"><?php echo substr(FS::session()->userdata('address'),0,1000); ?></span>
             </a></p>
           </div> 
         </div>
       </div> 
     </div>
      <div class="pl-3 pl-lg-3 pr-3 pr-lg-0 mt-4">
        <h3 class="text-white font_weight_400 font_asap">Latest News</h3>
        <div class="mx-0 mb-3">
          <div class="col-lg-12 faq-tab-sec mt-4 sell_level_bg_2" style="color:#fff">
            
          <p><?php echo $news->content3; ?></p>

          </div>
         

        </div>

        
      </div>  
 
      </div>

    </div>
    </div>

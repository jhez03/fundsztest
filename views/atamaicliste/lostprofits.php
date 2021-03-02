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
        <h3 class="text-white font_weight_400 font_asap"><?php echo lang('Lost Profits'); ?> <span class="pull-right"><?php echo lang('Lost Profits Total')?> : <span id="total_profit">0 ETH</span></span></h3>
      


          <div class="mx-0 mb-3 mt-4">
             <div class="card sell_level_bg_2 w-100">
               <div class="search-form">
                  <div class="input-group">
                  
                </div>
               </div> 
             </div> 
          </div>  
        <div class="mx-0 mb-3 mt-4">
          <div class="card sell_level_bg_2 w-100">
            <div class="table-responsive">
            <table class="table" id=""> <!-- lostprofits_data -->
  <thead>
    <tr>
      <th class="border-radius-left"><?php echo lang('Line'); ?></th>
      <th><?php echo lang('ID')?></th> 
      <th><?php echo lang('ETH Wallet'); ?></th>
      <th><?php echo lang('Amount')?></th>
      <th class="border-radius-right"><?php echo lang('Level'); ?></th>
    </tr>
  </thead>
  <tbody id="lost_result">
    
    <tr class="no_record hide">
      <td colspan="4">
         <?php echo lang('No Records Found'); ?>  !!!
      </td>
    </tr>

    <tr class="profit_loading">
      <td colspan="4">
         <!-- <?php echo lang('Loading'); ?> ... -->
         <?php echo lang('No Records Found'); ?>
      </td>
    </tr>

  </tbody>
</table>
</div>
</div>
         

        </div>

        
      </div>  


      </div>

    </div>
<div class="col-12 col-lg-10 content_col pl-3 pl-lg-3 pr-3 pr-lg-0">
      <div class="">
       <div class="row user-info mx-2 p-3">
         <div class="col-lg-2 border-right">
           <div class="user-id">
             <p>ID <img src="<?php echo base_url(); ?>assets/img/id-card.png" class="img-fluid mx-2"> <span class="text-white word_break"><?php echo FS::session()->userdata('con_u_id')?></span></p>
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

         <div class="row mx-2 mt-4">
          <div class="col-12 col-md-12 col-xl-12 px-2 d-flex mb-4">
            <div class="bg_card_blue_1 w-100">
              <div class="card-body p-3">
                <p class='text-white'><?php echo 'Renewal Date'; ?></p>
                 <div class="media mb-3">
                  <div class="media-body">
                   <?php     
                     $user_levels      =   unserialize($users->user_levels);

                     $curr_levels      =   array_slice($user_levels,0,$users->current_level);         
                    if(!empty($USER_L_P))
                    {   
                        $i = 1;

                        foreach($USER_L_P as $result) 
                        { 

                            $level = $users->current_level + 1; 

                    ?>
            
                 <?php  if($i == "1") {  ?>
                    <p class="text-white"><span class="" style="color:white !important;">PLAN: </span> VIP 10 </p>
                 
                <?php } else { ?>
                 <p class="text-white"><span class="" style="color:white !important;">PLAN: </span> VIP 50 </p>
                 

                <?php   } ?>
                    <p class="active <?php if($i < $level){ echo 'active'; } else  { echo 'inactive'; }  ?> <?php if($i < $level){ echo 'active'; } else  { echo 'inactive'; }  ?>-date">Status: <?php if($i < $level){ echo lang('Active'); } else  { echo lang('Inactive'); }  ?> 
                    </p>

                             <span class="dates">
                              <?php 

                              if(array_key_exists($result->id-1,$curr_levels))
                              {
                                echo "Renewal date: ".date('d-m-Y H:i:s',strtotime($curr_levels[$result->id-1]['end_date'])).'<br>';

                                echo "Last Payment Paid on: ".date('d-m-Y H:i:s',strtotime($curr_levels[$result->id-1]['start_date'])).'<br>';

                                $future       =   strtotime($curr_levels[$result->id-1]['end_date']);

                                $timefromdb   =   strtotime(date('Y-m-d H:i:s'));

                                $timeleft     =   $future-$timefromdb;

                                $daysleft     =   round((($timeleft/24)/60)/60); 


                        

                              }

                              ?></span> 
                              <hr/>
                           
                              
                      <?php  

                      $i++; 
                      if($i == "3")
                        break;
                    }
                  }
                  ?>                  
                  </div>
                  

                </div>
              </div>
            </div>
          </div>
          </div>

        
    </div>


<script type="text/javascript">

let id_update = "<?php echo FS::session()->userdata('id_update')?>";

let con_u_id = "<?php echo FS::session()->userdata('con_u_id')?>";

let curr_level = "<?php echo $users->current_level;?>";

let user_id = "<?php echo juego_id();?>";

let login_type = "<?php echo FS::session()->userdata('login_type');?>";

let aff_id = "<?php echo $users->affiliate_id;?>";

</script>
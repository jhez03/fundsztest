<!--<div class="col-12 col-lg-10 content_col pl-3 pl-lg-3 pr-3 pr-lg-0">-->
<div>
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
        <div class="row mx-0 mt-3">
          <div class="col-12 col-md-6 col-xl-3 px-1 d-flex mb-3">
            <div class="card gradient-dark w-100">
              <div class="card-body p-1">
                <p class='card-header'><?php echo lang('Earned Ethereum'); ?></p>
                <hr>
                 <div class="media mb-2">
                  <div class="media-body card-body">
                    <p class="mb-0 mt-3 earned_eth" id="earned_eth"><?php echo $users->earned_eth; ?> <?php echo lang('ETH'); ?></p>                  
                  </div>
                  <img class="img-fluid banner_card_img ml-1 align-self-center partner_card_img" src="<?php echo base_url()?>assets/front/img/eth-img.png" alt="Generic placeholder image">

                </div>
              </div>
            </div>
          </div>
          
          <div class="col-12 col-md-6 col-xl-3 px-1 d-flex mb-3">
            <div class="card gradient-dark w-100">
              <div class="card-body p-1">
                <p class='card-header'><?php echo lang('Earned Dollars'); ?></p>
                <hr>
                 <div class="media mb-2">
                  <div class="media-body card-body" >
                    <p class="mb-0 mt-3 earned_usd" id="earned_usd"><?php echo $usd_value; ?> <?php echo lang('USD'); ?> </p>                  
                  </div>
                  <img class="img-fluid banner_card_img ml-3 align-self-center partner_card_img" src="<?php echo base_url()?>assets/front/img/earned-money.png" alt="Generic placeholder image">

                </div>
              </div>
            </div>
          </div> 

          <div class="col-12 col-md-6 col-xl-3 px-1 d-flex mb-3">
            <div class="card gradient-dark  partner_card w-100">
              <div class="card-body p-1">
                <p class='card-header'><?php echo lang('Partners'); ?></p>
                <hr>
                 <div class="media mb-2">
                  <div class="media-body card-body">
                    <p class="mt-3 mb-0"><?php echo $partners; ?></p>                  
                  </div>
                  <img class="img-fluid banner_card_img ml-1 align-self-center partner_card_img" src="<?php echo base_url()?>assets/front/img/partners-img.png" alt="Generic placeholder image">
                   <div class="partner_card_icon">
                 


                         <span class="social_icon_partner mr-1"  data-sharer="facebook" data-url="<?php echo $ref_url?>"><i class="fa fa-facebook" aria-hidden="true"></i></span> 

                        <span class="social_icon_partner mr-1" data-sharer="twitter" data-title="<?php echo getSiteName();?>" data-url="<?php echo $ref_url?>"><i class="fa fa-twitter" aria-hidden="true"></i></span>

                        <span class="social_icon_partner mr-0" data-sharer="telegram" data-title="<?php echo getSiteName();?>" data-url="<?php echo $ref_url?>" data-to="+44555-5555"><i class="fa fa-telegram" aria-hidden="true"></i></span>

                       
                  </div>

                </div>
              </div>
            </div>
          </div>

         
          <div class="col-12 col-md-6 col-xl-3 px-1 d-flex mb-3">
            <div class="card gradient-dark  partner_card w-100">
              <div class="card-body p-1">
                <p class='card-header'>Current Plan</p>
                <hr>
                 <div class="media mb-2">
                  <div class="media-body card-body">
                    <p class="mb-0 mt-3"><?php       if($users->donated==1)
                                                     {
                                                       echo "VIP Plan $10 ";
                                                     }
                                                     else if($users->donated==2)
                                                     {
                                                      echo "VIP Plan $50";
                                                     }
                                                     else if($users->vip_plan_1==1 && $users->vip_plan_2==1)
                                                     {
                                                      echo "VIP Plan $10 & $50";
                                                     } ?>  </p>  
                    <input type="hidden" id="current_plan" name="current_plan" value="<?php echo @$users->current_level;?>">                
                  </div>
                  <img class="img-fluid banner_card_img ml-3 align-self-center partner_card_img" src="<?php echo base_url()?>assets/front/img/level-img.png" alt="Generic placeholder image">
                  <?php 
                  if(FS::session()->userdata('login_type') =="auto")
                  {
                  ?>
                   <div class="partner_card_icon">
                    <a href="javascript:;" class="partner_a raise_level"><?php echo lang('To Raise'); ?></a>
                   </div>
                   <?php 
                 }
                 ?>

                </div>
              </div>
            </div>
          </div>
        </div>

        <input type="hidden" name="level_value" id="level_value" value='<?php echo $level_value; ?>'>
        <input type="hidden" name="color_value" id="color_value" value='<?php echo $color_value; ?>'>
        <input type="hidden" name="data_value"  id="data_value" value="<?php echo $data_value; ?>">

        <input type="hidden" name="color_value" id="bar_data" value='<?php echo $bar_data; ?>'>

        <input type="hidden" name="color_value" id="bar_label" value='<?php echo $bar_label; ?>'>
        <div class="row mx-0 mb-3">
          <div class="col-12 col-md-6 d-flex px-1">
            <div class="card sell_level_bg box-shadow-black w-100">
              <div class="card-body">
                <p class="font_18 text_green font_weight_700 text-center mb-2"><?php echo lang('The growth of structure'); ?></p>
               
                  <div class="text-center">
               
                  <canvas id="myChartbar" class="myChart" width="400" height="400"></canvas>

                </div>
              </div>
            </div>
          </div>

           <div class="col-12 col-md-6 d-flex px-1">
            <div class="card sell_level_bg box-shadow-black w-100">
              <div class="card-body">
                <p class="font_18 text_green font_weight_700 text-center mb-2">Plan</p>
              <div class="text-center mt-4">
              
                <canvas id="myChart" class="myChart" width="300" height="300"></canvas>
             </div>
              </div>
            </div>
          </div>
        </div>


        <div class="row mx-0 mb-3">

      <?php 

    

      $user_levels      =   unserialize($users->user_levels);

      $curr_levels      =   array_slice($user_levels,0,$users->current_level); 


 


      if(!empty($USER_L_P))
      {   
          $i = 1;

          foreach($USER_L_P as $result) 
          { 
              $status= "";
              $style = "";
              $buylevel = "";
              $level = $users->current_level + 1; 

              $vipplan1 = $users->vip_plan_1;

              $vipplan2 = $users->vip_plan_2;

              $donated = $users->donated;

              if($i==1)
              {
                if($donated==1)
                {
                   $status= "active";
                   $style = "";
                   $buylevel = "extend";
                }
                else
                {
                  $status= "inactive";
                  $style = 'style="display:none;"';
                  $buylevel = "buy";

                }

              }
              else if($i==2)
              {
                if($donated==2)
                {
                  $status= "active";
                  $style = "";
                  $buylevel = "extend";
                }
                else
                {
                  $status= "inactive";
                  $style = 'style="display:none;"';
                  $buylevel = "buy";


                   

                }
              }

      ?>
            <div class="col-12 col-sm-6 d-flex px-1 mb-4">
              <div class="card sell_level_bg border-radius-10 w-100 card_level_loop_<?php echo $i; ?> card_level <?php echo $status; ?>  text-center">
                <div class="card-body level-box">
                  <?php  if($i == "1") {  ?>
                  <p class="text-white">VIP10 </p>
                  <p class="text-white">The 10 represents $ 10 worth of ETH</p>
                <?php } else { ?>
                  <p class="text-white">VIP 50 </p>
                  <p class="text-white">The 50 represents $ 50 worth of ETH</p>

                <?php   } ?>
                 
                  <p class="active level_status_<?php echo $i; ?> <?php echo $status; ?> <?php echo $status; ?>-date"> <?php echo ucfirst($status); ?>
                    </p>
          
                 <span  <?php echo $style; ?> class="dates level_days_<?php echo $i; ?>">
                  <?php 

                  


                    


                         $createddate = $users->expirytime;

                         $subscription_plan = $users->subscription_plan;
                         $date=date("Y/m/d h:i:s");
                         $date    = strtotime($date);
                         $datediff = $createddate -$date;
                         $daysleft = floor($datediff/(60*60*24));

                         echo $daysleft > 1 ? $daysleft.' days' : 'day';
                         echo "<br/>";
                         echo $subscription_plan == 1 ? 'Plan: Annual Subscription' : 'Plan: Monthly Subscription';
                         



                  

                  ?></span> 
                  
                  <p class=""><?php if($result->price < 1) { echo $result->price; } else { echo $result->price;}?><?php echo lang('ETH'); ?> </p>

                  <div class="text-center">

                    <?php $total = @array_key_exists($result->id-1,$curr_levels) ? $curr_levels[$result->id-1]['total_days'] : ''; ?>
                    <?php if($_SESSION['juego_id'] != "1") { ?>
                    <button type ="button" class="btn btn-green my-3 curr_level_buy buy-level" data-type="<?php echo $buylevel; ?>" data-days="1" data-level="<?php echo $result->id;?>" data-amount="<?php echo $result->price;?>"  >   <?php echo ucfirst($buylevel); ?> </button>

                     <button type ="button" class="btn btn-green my-3 curr_level_buy buy-level" data-type="<?php echo $buylevel; ?>" data-days="12" data-level="<?php echo $result->id;?>" data-amount="<?php echo $result->price;?>"  >   Annual Subscription </button>
                    <?php } ?>
                    <input type="hidden" id="level_price" name="level_price" value="<?php echo @$result->price;?>">
                     <input type="hidden" id="extend_update_100" name="extend_update_100" value="<?php echo @$users->extend_update_100;?>">
                     <input type="hidden" id="extend_update_500" name="extend_update_500" value="<?php echo @$users->extend_update_500;?>">
                     <input type="hidden" id="extend_prev_status_100" name="extend_prev_status_100" value="<?php echo @$users->extend_prev_status_100;?>">
                     <input type="hidden" id="extend_prev_status_500" name="extend_prev_status_500" value="<?php echo @$users->extend_prev_status_500;?>">
                     <input type="hidden" id="usd_earned_level1" name="usd_earned_level1" value="<?php echo @$users->usd_earned_level1;?>">
                     <input type="hidden" id="usd_earned_level2" name="usd_earned_level2" value="<?php echo @$users->usd_earned_level2;?>">
                  </div>
                 
                </div>
              </div>
            </div>

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



<script type="text/javascript">

let id_update = "<?php echo FS::session()->userdata('id_update')?>";

let con_u_id = "<?php echo FS::session()->userdata('con_u_id')?>";

let curr_level = "<?php echo $users->current_level;?>";

let user_id = "<?php echo juego_id();?>";

let login_type = "<?php echo FS::session()->userdata('login_type');?>";

let aff_id = "<?php echo $users->affiliate_id;?>";



</script>
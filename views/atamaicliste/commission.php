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
             <p>ETH Address <img src="" class="img-fluid"> <a href="https://etherscan.io/address/<?php echo FS::session()->userdata('address');?>"> <span class="text-white"><?php echo substr(FS::session()->userdata('address'),0,1000); ?></span></a></p>
           </div> 
         </div>
       </div> 
     </div>
     <div class="pl-3 pl-lg-3 pr-3 pr-lg-0 mt-4">
        <h3 class="text-white font_weight_400 font_asap"><?php echo 'Commission Earned (Transactions)'; ?></h3>
      



        <div class="mx-0 mb-3 mt-4">
          <div class="card sell_level_bg_2 w-100">
            <div class="table-responsive commission-table">
            <table id="" class="table">
                      <thead>   
                        <th>#</th>     
                        <th>Commission Type</th>
                        <th>Address</th>
                        <th>Matrix Level</th>
                        <th>Commission Earner Amount Earned ETH</th>
                        <th>Commission Earners ID</th>
                        <th>Commission From ID</th>
                        
                      </thead>
                      <tbody>

                        
                      <?php
                      if(isset($transaction))
                      {
                        $i=0;
                        $j=0;
                      foreach ($transaction as $datavalue) {
                        $class ="";

                        $i++;
                       

                        
                        $eventname = $datavalue->eventname;
                        $eventresults =unserialize($datavalue->eventresults);

                        
                       $useraddress = strtolower($eventresults['_user']);
                       $earnedeth="";

                       if($eventname=="MatrixCommission")
                       {
                         if(strtolower($eventresults['_level1'])==strtolower($contract_address) || strtolower($eventresults['_level2'])==strtolower($contract_address) || strtolower($eventresults['_level3'])==strtolower($contract_address) || strtolower($eventresults['_level4'])==strtolower($contract_address) || strtolower($eventresults['_level5'])==strtolower($contract_address) || strtolower($eventresults['_level6'])==strtolower($contract_address) || strtolower($eventresults['_level7'])==strtolower($contract_address) || strtolower($eventresults['_level8'])==strtolower($contract_address))
                         {
                            $class ="";

                            $earnedeth= $eventresults['_levelValue']/1000000000000000000;
                            $j=1;
                         }
                         else
                         {
                            $class ="style='display:none;'";
                            $i = $i-1;
                         }
                         $eventname= "Matrix Commission";
                       }
                       else if($eventname=="RefBonus")
                       {
                         if(strtolower($eventresults['_sponser'])==strtolower($contract_address))
                         {
                            $class ="";
                            $earnedeth= $eventresults['_value']/1000000000000000000;
                            $j=1;
                         }
                         else
                         {
                            $class ="style='display:none;'";
                            $i = $i-1;
                         }
                         $eventname= "Referral Bonus";
                       }
                       else if($eventname=="InfinityHouseBonus")
                       {
                        if(strtolower($eventresults['_upline9'])==strtolower($contract_address) || strtolower($eventresults['_uplin10'])==strtolower($contract_address) || strtolower($eventresults['_upline11'])==strtolower($contract_address) || strtolower($eventresults['_upline12'])==strtolower($contract_address))
                         {
                            $class ="";
                            $earnedeth= $eventresults['_uplineAmount9To12']/1000000000000000000;
                             $j=1;
                         }
                         else
                         {
                            $class ="style='display:none;'";
                            $i = $i-1;
                         }

                         $eventname= "InfinityHouseBonus";
                       }
                      else if($eventname=="MatchingCarBonus")
                      {
                       
                        
                        for($i=0; $i < count($eventresults['receiver']); $i++) {
                            $eventresults['receiver'][$i] = strtolower($eventresults['receiver'][$i]);
                        }

                        if(in_array(strtolower($contract_address),$eventresults['receiver']))
                         {
                            $class ="";
                            $earnedeth = $eventresults['_value'] / 10 ** 18;
                            $j=1;
                             
                         }
                         else
                         {
                            $class ="style='display:none;'";
                            $i = $i-1;
                         }

                         $eventname= "MatchingCarBonus";
                       }
                      else if($eventname=="BreakageEvent")
                      {
                        if(FS::session()->userdata('con_u_id') == "1") 
                        {

                         $class ="";
                         $earnedeth= $eventresults['_value']/1000000000000000000;
                             $j=1;
                        }
                        else
                        {
                          $class ="style='display:none;'";
                          $i = $i-1;
                        }

                         $eventname= "AdminEvent";
                       }
                       else
                       {
                        $class ="style='display:none;'";
                        $i = $i-1;
                        $eventname ="N/A";

                       }
                        
                        
                        
                          ?>

                                        <tr <?php echo  $class;?>    > 
                                        <td><?php echo  $i; ?></td>
                                        <td><?php echo  $eventname; ?></td>
                                        <td><?php echo  ($useraddress) ? $useraddress:"---";?></td>
                                        <td><?php $vipplan1=getUserId($useraddress,'donated');
                                          $vipplan2=getUserId($useraddress,'donated'); 
                                          if($vipplan1==1)
                                          {
                                            echo  "Vip $10 Membership";
                                          }
                                          else if($vipplan2==2)
                                          {
                                            echo  "Vip $50 Membership";
                                          }
                                          else
                                          {
                                            echo  "N/A";
                                          }
                                              ?></td>
                                          
                                        <td><?php echo  number_format($earnedeth,8); ?> ETH</td>
                                        <td><?php echo  (strtolower($contract_address)) ? getUserId(strtolower($contract_address),'contract_id'):"---";?></td>
                                        <td><?php echo  ($useraddress) ? getUserId($useraddress,'contract_id'):"---";?></td>
                            </tr>
                        <?php 
                         
                       
                        ?>
                        <?php
                        } 
                        }      
                        else
                        {
                        ?>
                          <tr class="partners_table_inner active" > No Records Found.</tr>
                        <?php
                        }
                        ?>
                        
                     </tbody>
                  </table>
</div>

</div>
         

        </div>

        
      </div>  

 
      </div>

    </div>
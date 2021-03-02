<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/front/css/tooltip.css?ver=<?php echo date('U')?>">
<!--<div class="col-12 col-lg-10 content_col pl-3 pl-lg-3 pr-3 pr-lg-0">-->
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
        <h3 class="text-white font_weight_400 font_asap"><?php echo 'Placement Tool'; ?></h3>
      



        <div class="mx-0 mb-3">
          <div class="row mb-4 mt-3">
          <div class="col-12 col-xl-6">
             <div class="sell_level_bg_2 partners-sec px-5 py-4 h-175">
                <div class="partners-sec">
                   <h4><?php echo 'Choose a placement sponsor(ID)'; ?></h4>
                   <form class="mt-3">
                    <div class="row">
                     <div class="form-group col-12 col-md-9">
                 
                   
                    <input list="browsers" name="sponsor" id="sponsor" class="form-control" placeholder="Choose a sponsor" required="true"  value="<?php echo ($sponsor_id!=0)? $sponsor_id:"" ;?>" autocomplete="off" />
                      <datalist id="browsers">
                        <?php foreach($partners as $key => $value){ echo $value;?>

                                    <option value="<?php echo $value['contract_id'];?>"   ><?php echo $value['contract_id'];     ?></option> 
                                    <?php } ?> 
                      </datalist>
                 
                   </div>
                   <div class="col-12 col-md-3">
                      <button class="btn btn-black-large set" type="button" ><?php echo "SET"; ?></button>
                   </div>
                   </div>
                
                   </form>
                   <div class="mb-0 mt-2">


                        


                   


                  </div>
                </div> 
             </div>
          </div>   
           <div class="col-12 col-xl-6">
             <div class="sell_level_bg_2 partners-sec px-5 py-4 h-175">
               <div class="partners-sec">
                   

                    <form class="mt-3" id="about_partner">
                      <div class="row">
                      <div class="form-group col-12 col-md-6">
                         <h4><?php echo "Current placement is set to: "; ?></h4>
                      </div>
                      <div class="form-group col-12 col-md-4">
                        <p class="text-white"><?php echo ($sponsor_id!=0)? $sponsor_id:"NONE" ; ?></p> 
                      </div>
                      
                       <div class="col-12 col-md-3">
                      <button class="btn btn-black-large reset" type="button" ><?php echo "RESET TO DEFAULT"; ?></button>
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
                <?php if($sponsor_id!=0) { ?>
                 <h4><?php echo 'Placement sponsor(Details)'; ?></h4>
                 <div class="card sell_level_bg_2 w-100">
                  <div class="table-responsive">
                  <table  class="table">
                  <thead>
                    <tr>
                      <th class="border-radius-left"><?php echo "Member Status"; ?></th>
                      <th><?php echo lang('ID'); ?></th>
                      <th><?php echo lang('ETH Wallet'); ?></th>
                      <th><?php echo "Placement Status"; ?></th>
                      <th><?php echo "Plan"; ?></th>
                  </thead>
                  <tbody id="sponsor_table">

                      

                  </tbody>
                </table>
                <input type="hidden" name="sponsor_add" id="sponsor_add" value="<?php echo $sponsor->address;?>">
                <input type="hidden" name="sponsor_level" id="sponsor_level" value="<?php echo $sponsor->current_level;?>">
                <input type="hidden" name="sponsor_cid" id="sponsor_cid" value="<?php echo $sponsor_id;?>">
                </div>

                </div>
                <?php } ?>  
                    
               </div>
            </div>
         </div>    

        </div>

        
      </div>  


      </div>

    </div>
    <script src="<?php echo base_url()?>assets/front/vendor/jquery/jquery.min.js"></script>
    <script type="text/javascript">
      
      let curr_level    =   "<?php echo $users->current_level;?>";

      let contract_id    =   "<?php echo $users->contract_id;?>";

      let login_type="<?php echo FS::session()->userdata('login_type');     ?>";
      
      $('.set').click(function(e){
      if(login_type == 'auto')
      {
     
      var sponsor_id    =   $("#sponsor").val();

      if(sponsor_id != null && sponsor_id != undefined && sponsor_id != '')
      {  
      start_loader();
      $.ajax({
                url: base_urll+"/setSponsor",
                type: "POST",
               
                data: {value: sponsor_id}, 
                dataType: "JSON",
                success: function(resp) {
                    $.growl.notice({ message: ("Placement Sponsor Set SuccessFully !!!") },{

                    })
                    if(resp == 1)
                    {
                     location.href  =   base_urll+'/placement';
                    }
                    else
                    {
                      
                    }
                }
            })
       
      }
      else
      {
        
      }
      }
      else
      {
        $.growl.error({ message: ("Placement Sponsor Not Set, Please Login Automatically to continue !!!") },{

                    })
      }
      });
      $('.reset').click(function(){
       if(login_type == 'auto')
       {
        start_loader();
     
      let sponsor_id    =   $("#sponsor").val();
    
      $.ajax({
                url: base_urll+"/setSponsor",
                type: "POST",
                //data: {value: reff_id,captcha : $('#captcha').val()}, 
                data: {value: 0}, 
                dataType: "JSON",
                success: function(resp) {
                    $.growl.notice({ message: ("Placement Sponsor Set To Default SuccessFully !!!") },{

                    })
                    if(resp == 1)
                    {
                     location.href  =   base_urll+'/placement';
                    }
                    else
                    {
                      
                    }
                }
            })
        }
        else
        {
           $.growl.error({ message: ("Placement Sponsor Not ReSet, Please Login Automatically to continue !!!") },{

                    })
        }
       });
    </script>
<link href="<?php echo base_url()?>assets/front/css/message.css?ver=<?php echo date('U')?>" rel="stylesheet">

<?php 
if(FS::session()->userdata('login_type') == 'manual')
{
  ?>



<div class="col-12 col-lg-10 content_col pl-3 pl-lg-3 pr-3 pr-lg-0">
      <div>
        <p class="text-white font_weight_400 font_18 font_asap"><?php echo lang('No Authorization'); ?></p>
      



        <div class="mx-0 mb-3">
          <div class="card sell_level_bg box-shadow-black w-100">
            <div class="row">
        <div class="col-12">
            <div class="">
              <div class="">
                 <div class="auto-login-box">
                   <p><?php echo lang('In Order to read your message and be able to communicate with your partners and Uplines. You must log in to account through the'); ?> <span class="new-color">" <?php echo lang('Auto Login'); ?> "</span> <?php echo lang('function'); ?>.  </p>
                 </div>  
               
              </div>
            </div>
          </div>
        </div>

        <div class="row mt-5 mb-5">
          <div class="col-12 col-md-5 mx-auto">

            <img src="<?php echo base_url()?>assets/front/images/Login Page.png">

            
          </div>  
          </div>


        </div>
         
        </div>

      
      </div>  

      </div>
<!--  -->

<?php } 
  
else if(FS::session()->userdata('login_type') == 'auto')
{
?>



 <div class="col-12 col-lg-10 content_col pl-3 pl-lg-3 pr-3 pr-lg-0">
      <div>
       
      



        <div class="mx-0 mb-3">
          <div class="card sell_level_bg box-shadow-black w-100">
            <div class="row">
              <div class="col-md-12 chat">
              <div class="card">
                 
                <div class="card-body msg_card_body" id="msg_card_body">
                 
              

                    <div class="chat" id="received">

                        

                    </div>

                    <div class="chat" id="received_no">

                        

                    </div>

                </div>
                <div class="card-footer">
                  <div class="input-group">
                    <div class="input-group-append">
                      <span class="input-group-text attach_btn"><i class="fa fa-envelope"></i></span>
                    </div>
                    <textarea name="message" id="message" class="form-control type_msg" placeholder="<?php echo lang('Type your message'); ?>..."></textarea>
                    <div class="input-group-append">
                      <button id="submit" class="input-group-text send_btn" ><i class="fa fa-location-arrow"></i></button>
                    </div>
                  </div>
                  <a id="back2Top" title="Back to top" href="#">&#10148;</a>
                </div>
              </div>
        </div>
        </div>
      
</div>
         

        </div>

      <?php } ?>


    </div>
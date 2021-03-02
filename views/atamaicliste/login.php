 <div class="login-sec mt-3">
    <div class="row no-gutters justify-content-center">
       <div class="col-lg-6 col-xl-5 col-12">
              <div class="login-box">
               <h3>Login</h3>
               <p>Automatic login if you have one of the following wallets:</p>
               <img src="<?php echo base_url()?>assets/front/img/login-img.png" class="img-fluid">
               <button class="btn btn-green-large mt-4 login-auto">Login Automatically</button>
               <p>Or you can enter manually, enter the number of your ETH purse</p>
                <form id="manual_login" method="post">
                   <div class="form-group">
                     <input class="form-control" placeholder="Enter ETH address or System ID" name="manual_value" id="manual_value">
                   </div>
                 <button type="submit" class="btn btn-green-large mt-2">Enter Manually (Preview Mode)</button>
                 </form>
            </div>
        </div> 
         <div class="col-lg-6 col-xl-5 col-12">
        <div class="login-box2">
          <div class="close-icon float-right">
            <a href=""> <img src="<?php echo base_url()?>assets/front/img/close-icon.png" class="img-fluid"></a>
          </div>  
              <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/img/site/<?php echo getSiteLogo();?>"  class="img-fluid"></a>
               <h4>Follow us on social networks</h4>
               <div class="mb-5 mt-3">
               
               <a href="<?php echo getSociallinks()->facebooklink;?>"  target="_blank"> <span class="social_icon_footer mr-2"><i class="fa fa-facebook" aria-hidden="true"></i></span> </a>
               
               <a href="<?php echo getSociallinks()->twitterlink;?>"  target="_blank"> <span class="social_icon_footer mr-2"><i class="fa fa-twitter" aria-hidden="true"></i></span> </a>
               
               <a href="<?php echo getSociallinks()->youtubelink;?>"  target="_blank"> <span class="social_icon_footer mr-0"><i class="fa fa-youtube" aria-hidden="true"></i></span> </a>
            </div>
               
               <p class="">Any question you get in our chat:</p>
               <a href="<?php echo getSociallinks()->telegram_link;?>" target="_blank">  <button class="btn btn-green-large mt-3"><img src="<?php echo base_url()?>assets/front/img/telegram.png" class="img-fluid pr-2"> Chat in Telegram EN</button></a>
               <div class="smart-contract">
                  <h3>FUNDSZ Smart Contract:</h3>
                

                 <a target="_blank" href="<?php echo $add_url; ?>address/<?php echo encrypt_decrypt('decrypt',$address->address_name); ?>"><p><?php echo encrypt_decrypt('decrypt',$address->address_name); ?></p> </a>
               </div>
            </div>
        </div>
     </div> 
  </div>      
                
            </div>
        </header>

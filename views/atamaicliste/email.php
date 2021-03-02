
<style type="text/css">
  .help-block
{
color:red;
}
	.content_col{ color: white;  }
	.malr5 {
    margin-left: -5px !important;
    margin-right: -5px !important;
}
col-lg-6 {
    -webkit-box-flex: 0;
    -ms-flex: 0 0 50%;
    flex: 0 0 50%;
    max-width: 50%;
}
.col-1, .col-2, .col-3, .col-4, .col-5, .col-6, .col-7, .col-8, .col-9, .col-10, .col-11, .col-12, .col, .col-auto, .col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm, .col-sm-auto, .col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11, .col-md-12, .col-md, .col-md-auto, .col-lg-1, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg, .col-lg-auto, .col-xl-1, .col-xl-2, .col-xl-3, .col-xl-4, .col-xl-5, .col-xl-6, .col-xl-7, .col-xl-8, .col-xl-9, .col-xl-10, .col-xl-11, .col-xl-12, .col-xl, .col-xl-auto {
    position: relative;
    width: 100%;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;
}

</style>
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


         <div class="row mb-4 mt-3">
          <div class="col-12 col-xl-6">
             <div class="sell_level_bg_2 partners-sec px-5 py-4 h-175">
                <div class="partners-sec">
                   <h4><?php echo 'Email ID'; ?></h4>
                   <form class="mt-3" id='email_form'>
                    <div class="row">
                     <div class="form-group col-12 col-md-9">
                 
                   
                       <input type="text" class="form-control" name="email" id="email" value="<?php echo encrypt_decrypt('decrypt', $email->email);?>" <?php 
                                       if(FS::session()->userdata('login_type') != 'auto')
                      { echo "readonly"; }?>  >
                 
                   </div>
                   <div class="col-12 col-md-3">
                    <?php 
                                       if(FS::session()->userdata('login_type') == 'auto')
                      {
                      ?>
                      <button class="btn btn-green-large " type="submit" ><?php echo "SET"; ?></button>
                       <?php } ?>
                   </div>
                   </div>
                
                   </form>
                   <div class="mb-0 mt-2">

                    


                   


                  </div>
                </div> 
             </div>
          </div> 
          </div>
          </div>
          
        






  

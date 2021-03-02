 <div >
      <div>
      <?php if($_SESSION['juego_id'] != "") { ?><div class="">
       <div class="row user-info mx-2 p-3">
         <div class="col-lg-2 border-right">
           <div class="user-id">
             <p>ID <img src="<?php echo base_url(); ?>assets/img/id-card.png" class="img-fluid mx-2"> <span class="text-white"><?php echo FS::session()->userdata('con_u_id')?></span></p>
           </div> 
         </div> 
         <div class="col-lg-10 col-xl-8">
           <div class="user-id mx-3">
             <p>ETH Address <img src="" class="img-fluid"> <a href="https://etherscan.io/address/<?php echo FS::session()->userdata('address');?>"> <span class="text-white"><?php echo substr(FS::session()->userdata('address'),0,1000); ?></span>
             </a></p>
           </div> 
         </div>
       </div> 
     </div> <?php } ?>
       
        
       <div class="pl-3 pl-lg-3 pr-3 pr-lg-0 mt-4">
       <h3 class="text-white font_weight_400 font_asap">FAQ</h3>


<div class="">
                  <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="faq-accord">
                           <div class="row">
                             <div class="col-lg-12">
                                  <div class="faq-accord-sec">
                                      <div class="wrapper center-block px-md-3">
  <div class="panel-group snj-panel accordion" id="accordion" role="tablist" aria-multiselectable="true">

<?php if($faq)
      {    $i = 1;
           foreach($faq as $result) { ?>


           
<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne<?php echo $i;?>">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse"  data-target="#collapseOne<?php echo $i;?>" aria-expanded="false" aria-controls="collapseOne<?php echo $i;?>" class="collapsed">
          <?php echo $result->question; ?>
        </a>
      </h4>
      <hr>
    </div>
    <div id="collapseOne<?php echo $i;?>" class="panel-collapse in collapse" data-parent="#accordion" role="tabpanel" aria-labelledby="headingOne<?php echo $i;?>" style="">
      <div class="panel-body">
      <?php echo $result->answer; ?>
      </div>
    </div>
  </div>


    

   <?php if($i == 100) break; 
    $i++; }
   } ?>

            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>


        
      </div>  


      </div>
    </div>
    


    
        <script type="text/javascript">
      $(document).ready(function()
      {
         $('.simple_accordion .card-link').click(function()
         {
          $('.simple_accordion .faq_row').removeClass("active_faq");
         $(this).parent().parent().parent().parent().addClass("active_faq")
         });
      });
      
    </script>
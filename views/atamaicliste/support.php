
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
<div class="row malr5">
        <div class="col-lg-6 pdlr d-flex">
          <div class="pl-3 pl-lg-3 pr-3 pr-lg-0 mt-4">
            
            <div class="das_panel1">
            	<h3 class="text-white font_weight_400 font_asap">Support</h3>
              <div class="prof_blk1">
              	<?php echo form_open('',array('class'=>'hrz_frm1','id'=>'support_form')); ?>
                  <div class="row form-group">
                    <div class="col-md-5">
                      <label class="form-control-label"><?php echo 'Username'; ?></label>
                    </div>
                    <div class="col-md-7">
                      <input type="text" class="form-control" name="username_">
                    </div>
                  </div>
                  <div class="row form-group">
                    <div class="col-md-5">
                      <label class="form-control-label"><?php echo 'Email Address'; ?></label>
                    </div>
                    <div class="col-md-7">
                      <input type="text" class="form-control tbx1" name="email_" value="">
                    </div>
                  </div>
                  <div class="row form-group">
                    <div class="col-md-5">
                      <label class="form-control-label"><?php echo 'Type'; ?></label>
                    </div>
                    <div class="col-md-7">
                      <div class="select_style1">
                        <select name="category">
                          <?php foreach($support_category as $support_category1) { ?>
                          <option value="<?php echo $support_category1->sup_id; ?>" ><?php echo $support_category1->category; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="row form-group">
                    <div class="col-md-5">
                      <label class="form-control-label"><?php echo 'Subject'; ?></label>
                    </div>
                    <div class="col-md-7">
                      <input type="text" class="form-control" placeholder="<?php echo 'Subject'; ?>" name="subject">
                    </div>
                  </div>
                  <div class="row form-group">
                    <div class="col-md-5">
                      <label class="form-control-label"><?php echo 'Description'; ?></label>
                    </div>
                    <div class="col-md-7">
                      <textarea class="tarea2" name="contact_message" placeholder="<?php echo 'Description'; ?>"></textarea>
                    </div>
                  </div>
                  <div class="row form-group">
                    <div class="col-md-5">
                      <label class="form-control-label"><?php echo 'Attachment if any'; ?></label>
                    </div>
                    <div class="col-md-7">
                      <div class="input-group file-upload">
                        <div class="input-group-addon">
                          <div class="fileUpload btn" style="color:white">
                            <span for="image1" class="url_up1">   </span>
                           
                            <input id="image1" class="upload" type="file" name="file" onChange="readURL_front(this,1)">
                          </div>
                        </div>
                        &nbsp;&nbsp;<img height="35" id="profile_1">
                      
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-5"> </div>
                    <div class="col-md-7">
                      <button type="submit" style="background:#ffff;" class="btn cm_yelbtn1"><?php echo 'Submit'; ?></button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 pdlr5 d-flex">
          <div class="das_bx1 w-100">
            <h4 class="das_hd1"> <span class="das_tit1">Previous Tickets</span> </h4>
            <div class="das_panel1">
              <div class="prof_blk1">
              
                <!--support accordion-->
                <div class="faq-accord-sec">
                  <div class="panel-group snj-panel accordion" id="supp_accord">
                    <div class="panel panel-default">
                      
<?php if($support_list){
$i=1;
   foreach($support_list as $support_list1) { ?>
                    <div class="panel panel-default">
                      <div class="panel-heading">
                      <a style="color: white;text-decoration: none" href="#supp_faq<?php echo $support_list1->id; ?>" data-toggle="collapse" data-parent="#supp_accord" class="collapsed">
                      <span class="fwm"><?php echo 'Type'; ?> :</span> <?php foreach($support_category as $support_category1) {
                         if($support_list1->departments == $support_category1->sup_id) {
                             echo $support_category1->category;
                       }  } ?>
                      <span class="stat_suptx2"><span class="fwm"><?php echo 'Ticket ID'; ?> :</span> <?php echo "65120".$support_list1->id; ?></span>
                      </a>
                      </div>
                      <div id="supp_faq<?php echo $support_list1->id; ?>" class="collapse <?php echo ($i == 1)?'show':''; ?>">
                        <div class="panel-body">
                          <div class="supp_cn2">
                            <div class="susr_prw1">
                              <div class="susr_plef1"> <img width="40" src="<?php  echo base_url(); ?>assets/front/profile/no_image.png" class="img-fluid"> </div>
                              <div class="susr_prig1">
                                <h6> <span class="auth_nam"> <?php echo $support_list1->name; ?> </span> <span class="auth_dat"> <?php $date=date_create($support_list1->created_date);
              echo date_format($date,"d-m-Y H:i:s"); ?></span> </h6>
                                <h6> <span class="auth_nam"> Subject : <?php echo $support_list1->subject; ?>  </span>  </h6>
                                <p><?php echo $support_list1->message; ?> </p>  <?php if($support_list1->file != "empty") {  ?> <a href="<?php  echo base_url(); ?>assets/front/profile/<?php echo $support_list1->file; ?>" target="_blank"> <img width="30" src="<?php  echo base_url(); ?>assets/front/profile/<?php echo $support_list1->file; ?>"></a><?php } ?>
                                <hr>
                              </div>
                            </div>
                          <?php if($support_messages1) { foreach($support_messages1 as $support_messages11) {
                            if($support_messages11->parent_id == $support_list1->id) {
                             ?>
                            <div class="susr_prw1">
                               <?php if($support_messages11->DiZrIeSsOu != "") { ?>
                                            <h6><span class="auth_nam"><?php echo $this->username; ?></span> <span class="auth_dat"><?php $date=date_create($support_messages11->created_date);
              echo date_format($date,"d-m-Y H:i:s"); ?> </span></h6>
                                  <?php } else { ?>
                                  <h4 class="text-warning"><span class="auth_nam"><?php echo site_config()->contact_person; ?></span> <span class="auth_dat"><?php $date=date_create($support_messages11->created_date);
              echo date_format($date,"d-m-Y H:i:s"); ?></span></h4>
                                  <?php } ?>
                              <div class="susr_plef1"> <img width="30" src="<?php  echo base_url(); ?>assets/front/profile/<?php echo 'no_image.png'; ?>" class="img-fluid"> </div>
                              <div class="susr_prig1">
                               

                             


                                <p><?php echo $support_messages11->message; ?> </p> <?php if($support_messages11->file != "empty") {  ?> <a href="<?php  echo base_url(); ?>assets/front/profile/<?php echo $support_messages11->file; ?>" target="_blank"> <img width="30" src="<?php  echo base_url(); ?>assets/front/profile/<?php echo $support_messages11->file; ?>"></a><?php } ?>


                                <hr>
                              </div>
                            </div>
                          <?php } } }  ?>


                            <?php if($support_list1->status != 'closed') { ?>
                            <div class="susr_prw1">
                              <div class="susr_prig1">
                                <?php $sup_id=$support_list1->id; $idf="support_con".$sup_id; ?>
                            <?php echo form_open_multipart('support_form',array('id'=>$idf,'class'=>'hrz_frm1')); ?>
                                  <div class="form-group">
                                    <textarea cols="40" class="tarea1" name="message" placeholder="Message"></textarea>
                                  </div>
                                  <input class="" type="checkbox" name="close_sec">
                                   <span class=""><?php echo 'Yes, Close this ticket'; ?></span>
                                  <input type="hidden" name="idd" value="<?php echo $support_list1->id; ?>">
                                  <div class="row form-group">
                                    <div class="col-md-5">
                                      <label class="form-control-label"><?php echo 'Attachment'; ?></label>
                                    </div>
                                    <div class="col-md-7">
                                      <div class="input-group file-upload">
                                        <div class="input-group-addon">
                                          <div class="fileUpload btn"> 
                                            <input id="image<?php echo $sup_id; ?>" name="file" class="upload" type="file" onChange="readURL_front(this,<?php echo $sup_id; ?>)">
                                          </div>
                                        </div>
                                        &nbsp;&nbsp;<img height="35" id="profile_<?php echo $sup_id; ?>">

                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group text-center">
                                    <button style="background:#ffff;" type="submit" class="btn cm_yelbtn1"><?php echo 'Send'; ?></button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          <?php } ?>
                          </div>
                        </div>
                      </div>
                    </div>
                <?php $i++; } } else { ?><div class="tickd_rgrw1"><?php echo 'No Tickets Available'; ?></div><?php } ?>
                                  </div>
                </div>
                <!--support accordion-->
              </div>
            </div>
          </div>
        </div>
      </div>

<script src="<?php echo base_url(); ?>assets/FKundzJSOfghjiiToraus/jukepox/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/FKundzJSOfghjiiToraus/jukepox/bootstrapValidator.min.js"> </script>
  <script src="<?php echo base_url(); ?>assets/FKundzJSOfghjiiToraus/jukepox/jquery.form.js"></script>

  <script type="text/javascript" src="<?php echo base_url(); ?>assets/FKundzJSOfghjiiToraus/jukepox/support.js?<?php echo time(); ?>"> </script>

<?php if($support_list) { foreach($support_list as $support_list111) { ?>
<script>
$('#support_con<?php echo $support_list111->id; ?>').bootstrapValidator({
      feedbackIcons: {
      },
      fields: {
  message: {
              validators: {
                  notEmpty: {
                      message: "Message is required"
                  },
                  stringLength: {
                      max: 1000,
                      message: 'The Message must be less than 1000 characters long'
                  }
              }
          },


      }
  }).on('success.form.bv', function(e) {
  $.ajax({
    type : 'POST',
    data:new FormData($('#support_con<?php echo $support_list111->id; ?>')[0]),
    url:'support_form',
    processData: false,
    contentType: false,
    beforeSend : function () {
      $('.pageloadingBG, .pageloading').css('display', '');
    },
    success:function(output)
                   {
           $('.pageloadingBG, .pageloading').css('display', 'none');
                      var doutput = output.trim();
          if(doutput == "success")
          {
          $('#support_con<?php echo $support_list111->id; ?>')[0].reset();
          $("#stat_suc").html("Success");
          $("#msg_suc").html("Your Message has been sent successfully.");
          $('#success-modal').modal('show');
          window.setTimeout(function(){
                      window.location.href ="";   },3000);
          }
          else
                      {
          $('#phone_btn').attr('disabled', false);
          $("#stat").html("Error");
          $("#msg").html("some error occured please try again.");
          $('#error-modal').modal('show');
          }
          },
  });
  return false;
});

</script>
<?php }  } ?>


<div id="error-modal" class="modal fade">
  <div class="modal-dialog">
  <div class="alert alert-danger" style="color: red; background: #fff none repeat scroll 0px 0px;border-color:red;font-size:17px;">
    <a href="#" class="close" data-dismiss="modal" aria-label="close">&times;</a>
  <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
   <span id="msg"></span>
  </div>
  </div>
  </div>

  <div id="success-modal" class="modal fade">
  <div class="modal-dialog">
  <div class="alert alert-success" style="color: green; background: #fff none repeat scroll 0px 0px;border-color:green;font-size:17px;">
    <a href="#" class="close" data-dismiss="modal" aria-label="close">&times;</a>
  <i class="fa fa-check-circle-o" aria-hidden="true"></i>
    <!--<strong id="stat_suc"></strong>-->
  <span id="msg_suc"></span>
  </div>
  </div>
  </div>
  </div>
  </div>

<div class="main-panel">
        <!-- BEGIN : Main Content-->
        <div class="main-content">
          <div class="content-wrapper"><!-- Form actions layout section start -->
<section id="form-action-layouts">
  <div class="row">
    <div class="col-sm-6">
      <div class="content-header">Manage Site Settings</div>
    </div>
     <div class="col-sm-6">
      <?php 
      if(!empty(FS::session()->flashdata('success')))
      {
      ?>
      <div class="alert alert-success"> <?php echo FS::session()->flashdata('success')?> </div>
      <?php 
      }
      else if(!empty(FS::session()->flashdata('error')))
      {
      ?>
      <div class="alert alert-danger"> <?php echo FS::session()->flashdata('error')?> </div>
      <?php 
      }
      ?>
    </div>
  </div>
  <div class="row">

    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title" id="from-actions-bottom-right"><!-- User Profile --></h4>
          
        </div>
        <div class="card-body">
          <div class="px-3">

            <form class="form" id="site_settings" method="post"  enctype="multipart/form-data" >

              <div class="form-body">
                <h4 class="form-section"><i class="ft-info"></i> Basic Info</h4>
                <div class="row">
                  <div class="form-group col-md-6 mb-2">
                    <label for="userinput1">Site Name</label>
                    <input type="text" id="site_name" class="form-control border-primary" placeholder="Site Name" name="site_name" value="<?php echo $siteSettings->site_name;?>">
                  </div>
                  <div class="form-group col-md-6 mb-2">
                    <label for="userinput2">Contact Email</label>
                    <input type="email" id="site_email" class="form-control border-primary" placeholder="Contact Email" name="site_email" value="<?php echo $siteSettings->site_email;?>">
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6 mb-2">
                    <label for="userinput3">Contact Number</label>
                    <input type="text" id="contactno" class="form-control border-primary" placeholder="Contact Number" name="contactno" value="<?php echo $siteSettings->contactno;?>">
                  </div>
                  <div class="form-group col-md-6 mb-2">
                    <label for="userinput4">Alternative Contact Number</label>
                    <input type="text" id="altcontactno" class="form-control border-primary" placeholder="Alternative Contact Number" name="altcontactno" value="<?php echo $siteSettings->altcontactno;?>">
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-md-6 mb-2">
                    <label for="userinput3">Country</label>
                    <input type="text" id="country" class="form-control border-primary" placeholder="Country" name="country" value="<?php echo $siteSettings->country;?>">
                  </div>
                  <div class="form-group col-md-6 mb-2">
                    <label for="userinput4">State</label>
                    <input type="text" id="state" class="form-control border-primary" placeholder="State" name="state" value="<?php echo $siteSettings->state;?>">
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-md-6 mb-2">
                    <label for="userinput3">City</label>
                    <input type="text" id="city" class="form-control border-primary" placeholder="City" name="city" value="<?php echo $siteSettings->city;?>">
                  </div>
                  <div class="form-group col-md-6 mb-2">
                    <label for="userinput4">Address</label>
                    <input type="text" id="address" class="form-control border-primary" placeholder="Address" name="address" value="<?php echo $siteSettings->address;?>">
                  </div>
                </div>

                  <div class="row">
                  <div class="form-group col-md-6 mb-2">
                    <label for="userinput3">Copyright</label>
                    <input type="text" id="copyright" class="form-control border-primary" placeholder="copyright" name="copyright" value="<?php echo $siteSettings->copy_right_text;?>">
                  </div>
                  <div class="form-group col-md-6 mb-2">
                   
                  </div>
                </div>


                 <div class="row">
                  <div class="form-group col-md-6 mb-2">
                      <fieldset class="form-group">
                      <label for="site_logo">Site Logo</label>
                      <input type="file" class="form-control-file" id="site_logo" name="site_logo">
                      </fieldset>
                   
                  </div>
                  <div class="form-group col-md-6 mb-2">
                      <fieldset class="form-group">
                      <label for="fav_icon">Fav Icon</label>
                      <input type="file" class="form-control-file" id="fav_icon" name="fav_icon">
                      </fieldset>
                   
                  </div>
                </div>

                 <div class="row">
                  <?php if($siteSettings->site_logo){?>
                  <div class="form-group col-md-6 mb-2">
                      <img height="100" weight="100" src="<?php echo base_url().'assets/img/site/'.$siteSettings->site_logo;?>"/>
                  </div>
                   <?php } if($siteSettings->fav_icon){?>
                  <div class="form-group col-md-6 mb-2">
                       <img src="<?php echo base_url().'assets/img/site/'.$siteSettings->fav_icon;?>"/>
                   
                  </div>
                <?php } ?>
                </div>



                <h4 class="form-section"><i class="ft-mail"></i> Social Info</h4>
                <div class="row">
                  <div class="form-group col-6 mb-2">
                    <label for="userinput5">Facebook Link</label>
                    <input class="form-control border-primary" type="url" placeholder="Facebook Link" id="facebooklink" name="facebooklink" value="<?php echo $siteSettings->facebooklink;?>">
                  </div>

                   <div class="form-group col-6 mb-2">
                    <label for="userinput6">Twitter Link</label>
                    <input class="form-control border-primary" type="url" placeholder="Twitter Link" id="twitterlink" name="twitterlink" value="<?php echo $siteSettings->twitterlink;?>">
                  </div>

                </div>

                <div class="row">

                  <div class="form-group col-6 mb-2">
                    <label>Telegram Link</label>
                    <input class="form-control border-primary" type="url" placeholder="Telegram Link" id="telegramlink" name="telegramlink" value="<?php echo $siteSettings->telegram_link;?>">
                  </div>
                   <div class="form-group col-6 mb-2">
                    <label>Youtube Link</label>
                    <input class="form-control border-primary" type="url" placeholder="Linkedin Link" id="youtubelink" name="youtubelink" value="<?php echo $siteSettings->youtubelink;?>">
                  </div>
                 
                </div>

               

                <h4 class="form-section"><i class="ft-mail"></i> App Info</h4>

                <div class="row">
                  <div class="form-group col-6 mb-2">
                    <label for="userinput5">Android App Link</label>
                    <input class="form-control border-primary" type="url" placeholder="Android App Link" id="android_app_link" name="android_app_link" value="<?php echo $siteSettings->android_app_link;?>">
                  </div>

                   <div class="form-group col-6 mb-2">
                    <label for="userinput6">IOS App Link</label>
                    <input class="form-control border-primary" type="url" placeholder="IOS App Link" id="ios_app_link" name="ios_app_link" value="<?php echo $siteSettings->ios_app_link;?>">
                  </div>

                </div>



              </div>

              <div class="form-actions right">
                <button type="reset" class="btn btn-raised btn-warning mr-1">
                  <i class="ft-x"></i> Cancel
                </button>
                <button type="submit" class="btn btn-raised btn-primary">
                  <i class="fa fa-check-square-o"></i> Save
                </button>
              </div>

            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
 
</section>
<!-- // Form actions layout section end -->

          </div>
        </div>
         
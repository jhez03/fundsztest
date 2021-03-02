


        

  <div class="main-panel">
        <!-- BEGIN : Main Content-->
        <div class="main-content">
          <div class="content-wrapper"><!-- Form actions layout section start -->
<section id="form-action-layouts">
  <div class="row">
    <div class="col-sm-6">
      <div class="content-header">Sent Newletter</div>
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
  <div class="row ">

    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title" id="from-actions-bottom-right"><!-- User Profile --></h4>
          
        </div>
        <div class="card-body">
          <div class="px-3">

            <form class="form" id="sent_email" method="post">

              <div class="form-body">
                <h4 class="form-section"><i class="ft-info"></i>Sent Newletter</h4>

                  <div class="row justify-content-md-center">
                    <div class="col-md-6 mb-2">
                    <fieldset class="form-group">
                      <label for="type">Users Type</label>
                        <select class="form-control" name="type" readonly selected="true">
                                 <option value="3">Users</option>
                               
                               </select>
                    </fieldset>
                  </div>
                </div>

                <div class="row justify-content-md-center">
                    <div class="col-md-6 mb-2">
                    <fieldset class="form-group">
                      <label for="type">Mail Type</label>
                        <select class="form-control" name="type" readonly selected="true">
                                 <option value="3">HTML</option>
                               
                               </select>
                    </fieldset>
                  </div>
                </div>

                <div class="row justify-content-md-center">
                  <div class="form-group col-md-6 mb-2">
                   <label for="type">Mail Users List</label>
                    <select class="form-control" id="multi" size="5" multiple name="to[]" >
                                  <?php if($result){ $i=0; foreach($result as $val){ $i++;?>
                                  <?php if($val->email) { ?>
                                  <option <?php if($i==1){ echo "selected"; }?> value="<?php echo  encrypt_decrypt('decrypt',$val->email); ?>"><?php echo encrypt_decrypt('decrypt',$val->email); ?></option>
                                  <?php } } }?> 
                    </select>
                  </div>
                 
                </div>
                <div class="row justify-content-md-center">
                  <div class="form-group col-md-6 mb-2">
                    <label for="userinput1">Subject</label>
                     <input type="text" placeholder="Mail Subject" class="form-control"  name="subject" id="subject" value=""  /> 
                  </div>
                 
                </div>
                <div class="row justify-content-md-center">
                  <div class="form-group col-md-6 mb-2">
                    <label for="userinput1">Message</label>

                    <textarea class="form-control ckeditor" id="message" name="message" rows="20"></textarea>

                  </div>
                 
                </div>
                   <div class="row justify-content-md-center">
                  <div class="form-group col-md-6 mb-2">

               <label id="message-error" class="error" for="message"></label>
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
         
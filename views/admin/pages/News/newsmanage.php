<div class="main-panel">
        <!-- BEGIN : Main Content-->
        <div class="main-content">
          <div class="content-wrapper"><!-- Form actions layout section start -->
<section id="form-action-layouts">
  <div class="row">
    <div class="col-sm-6">
      <div class="content-header">Edit News</div>
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

            <form class="form" id="edit_news" method="post" enctype="multipart/form-data">

              <div class="form-body">
                <h4 class="form-section"><i class="ft-info"></i>Edit News</h4>

                 

                <div class="row justify-content-md-center">
                  <div class="form-group col-md-6 mb-2">
                    <label for="userinput1">Members online</label>
                    <input type="text" id="content1" class="form-control border-primary" placeholder="Members online" name="content1" value="<?php echo $news->content1 ; ?>" required>
                  </div>
                 
                </div>

                <div class="row justify-content-md-center">
                  <div class="form-group col-md-6 mb-2">
                    <label for="userinput1">Visitors online</label>
                    <input type="text" id="content2" class="form-control border-primary" placeholder="Visitors online" name="content2" value="<?php echo $news->content2 ; ?>" required>
                  </div>
                 
                </div>

                <div class="row justify-content-md-center">
                  <div class="form-group col-md-6 mb-2">
                    <label for="userinput1">Latest News</label>
                     <textarea class="form-control ckeditor" id="content3" name="content3" rows="20" required><?php echo $news->content3; ?></textarea>
                  </div>
                 
                </div>

                <div class="row justify-content-md-center">
                  <div class="form-group col-md-6 mb-2">
                    <label for="userinput1">Tuesday Conference Calls</label>
                    <input type="text" id="content4" class="form-control border-primary" placeholder="call date time" name="content4" value="<?php echo $news->content4 ; ?>" required>
                  </div>
                 
                </div>

                 <div class="row justify-content-md-center">
                    <fieldset class="form-group col-md-6 mb-2">
                      <label for="basicSelect">Status</label>
                      <select class="form-control" id="status" name="status" required>
                        <option  value="">Select Option</option>
                        <option value="1"<?php if($news->status == 1) { echo 'selected'; } ?>>Active</option>
                        <option value="0"<?php if($news->status == 0) { echo 'selected'; } ?>>Deactive</option>
                      
                      </select>
                    </fieldset>
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
         
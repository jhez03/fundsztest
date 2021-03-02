<div class="main-panel">
        <!-- BEGIN : Main Content-->
  <div class="main-content">
      <div class="content-wrapper"><!-- Zero configuration table -->
<section id="configuration">
  <div class="row">
    <div class="col-12">
      <div class="card">

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

        <div class="card-header">
          <h4 class="card-title">User Management</h4>
          
        </div>

      
        <div class="card-content">
          <div class="card-body card-dashboard table-responsive">
            <table class="table table-striped table-bordered zero-configuration" id="user-list">
              <thead>
                <tr>
                          <th>S.No.<span class="fa fa-sort"></span></th>
                        <!--   <th>First Name<span class="fa fa-sort"></span></th>
                          <th>Last Name<span class="fa fa-sort"></span></th> -->
                          <th>Address<span class="fa fa-sort"></span></th>
                          <th>Contract Id<span class="fa fa-sort"></span></th>
                          <th>Affiliate Id<span class="fa fa-sort"></span></th>
                          <th>Current Level<span class="fa fa-sort"></span></th>
                          
                </tr>
              </thead>
              <tbody>


              

              </tbody>
              
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--/ Zero configuration table -->
<!-- Default ordering table -->







<!--/ Language - Comma decimal place table -->

          </div>
        </div>
        <!-- END : End Main Content-->


        

  
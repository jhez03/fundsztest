 <!-- BEGIN : Footer-->
        <footer class="footer footer-static footer-light">
          <p class="clearfix text-muted text-sm-center px-2"><span>Copyright  &copy; <?php echo date("Y");  ?> <a href="<?php echo base_url(); ?>" id="pixinventLink" target="_blank" class="text-bold-800 primary darken-2"><?php echo getSiteName();?> </a>, All rights reserved. </span></p>
        </footer>
        <!-- End : Footer-->

      </div>
    </div>

     <div class="cz-bg-image row sb-bg-img">
      
      
      <div class="col-sm-2 mb-3"><img src="assets/admin/img/sidebar-bg/01.jpg" width="90" class="rounded sb-bg-01"></div>
      
    </div>

<script type="text/javascript">
      var base_url = "<?php echo base_url(); ?>"
</script>
    <script src="<?php echo base_url();?>assets/admin/vendors/js/core/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/admin/vendors/js/core/popper.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/admin/vendors/js/core/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/admin/vendors/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/admin/vendors/js/prism.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/admin/vendors/js/jquery.matchHeight-min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/admin/vendors/js/screenfull.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/admin/vendors/js/pace/pace.min.js" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
   
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN APEX JS-->
    <script src="<?php echo base_url();?>assets/admin/js/app-sidebar.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/admin/js/notification-sidebar.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/admin/js/customizer.js?ver=dfsdfsdfsdfsfdsdfsdfsd" type="text/javascript"></script>
    <!-- END APEX JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="<?php echo base_url();?>assets/admin/js/dashboard1.js" type="text/javascript"></script>

    <script src="<?php echo front_url(); ?>assets/admin/js/jquery.validate.min.js" type="text/javascript"></script>

     <script src="<?php echo front_url(); ?>assets/admin/vendors/js/datatable/datatables.min.js" type="text/javascript"></script>


    <script src="<?php echo front_url(); ?>assets/admin/js/data-tables/datatable-basic.js" type="text/javascript"></script>


    <script src="<?php echo front_url(); ?>assets/admin/plugins/ckeditor/ckeditor.js"></script>

     <script src="<?php echo front_url(); ?>assets/admin/js/pattern/script.js?ver=<?php echo date('U');?>" type="text/javascript"></script>
    <script src="<?php echo front_url(); ?>assets/admin/js/pattern/script1.js?ver=<?php echo date('U');?>" type="text/javascript"></script>

    <!-- END PAGE LEVEL JS-->

    <script type="text/javascript">
    	setTimeout(function(){

    	$(".cz-bg-image img").trigger('click');

    	},100)



        $(document).ready(function() {
    
            CKEDITOR.config.allowedContent = true;
            CKEDITOR.config.autoParagraph = false;
            CKEDITOR.config.extraAllowedContent = 'a[*]';

            CKEDITOR.replace('content_description' ,
              { 

              
              filebrowserBrowseUrl : '<?php echo base_url() ?>assets/admin/plugins/ckfinder/ckfinder.html',
              filebrowserImageBrowseUrl : '<?php echo base_url() ?>assets/admin/plugins/ckfinder/ckfinder.html?type=Images',
              filebrowserFlashBrowseUrl : '<?php echo base_url() ?>assets/admin/plugins/ckfinder/ckfinder.html?type=Flash',
              filebrowserUploadUrl : '<?php echo base_url() ?>assets/admin/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
              filebrowserImageUploadUrl : '<?php echo base_url() ?>assets/admin/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images¤tFolder=userfiles/',
              filebrowserFlashUploadUrl : '<?php echo base_url() ?>assets/admin/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'

            });
        });


         $(document).ready(function() {
    
            CKEDITOR.config.allowedContent = true;
            CKEDITOR.config.autoParagraph = false;
            CKEDITOR.config.extraAllowedContent = 'a[*]';

            CKEDITOR.replace('content_description_add' ,
              { 

              
              filebrowserBrowseUrl : '<?php echo base_url() ?>assets/admin/plugins/ckfinder/ckfinder.html',
              filebrowserImageBrowseUrl : '<?php echo base_url() ?>assets/admin/plugins/ckfinder/ckfinder.html?type=Images',
              filebrowserFlashBrowseUrl : '<?php echo base_url() ?>assets/admin/plugins/ckfinder/ckfinder.html?type=Flash',
              filebrowserUploadUrl : '<?php echo base_url() ?>assets/admin/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
              filebrowserImageUploadUrl : '<?php echo base_url() ?>assets/admin/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images¤tFolder=userfiles/',
              filebrowserFlashUploadUrl : '<?php echo base_url() ?>assets/admin/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'

            });
        });
      

    </script>

    <script src="<?php echo front_url(); ?>assets/admin/js/script.js?ver=<?php echo date("U");?>" type="text/javascript"></script>
    <script>

          $('#user-list').DataTable({
              "ajax": {
                  url : "<?php echo base_url(); ?>get_users",
                  type : 'GET'
              },
          });

        </script>

  </body>
  <!-- END : Body-->
</html>
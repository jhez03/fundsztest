<div class="main-panel">
        <!-- BEGIN : Main Content-->
        <div class="main-content">
          <div class="content-wrapper"><!-- Form actions layout section start -->
<section id="form-action-layouts">
  <div class="row">
    <div class="col-sm-6">
      <div class="content-header">Home Page Content</div>
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
          <h4 class="card-title" id="from-actions-bottom-right">English</h4>
          
        </div>
        <div class="card-body">
          <div class="px-3">

            <form class="form" id="homecontent" method="post"  enctype="multipart/form-data" >
                <input type="hidden" value="en" name="lang">

              <div class="form-body">
                <h4 class="form-section"><i class="ft-info"></i> SMART CONTRACT</h4>
                <div class="row">
                  <div class="form-group col-md-6 mb-6">

                     <fieldset class="form-group col-md-12 mb-12">
                      <label for="answer">Heading 1</label>
                      <textarea class="form-control" name= "smart_head_one" id="smart_head_one" rows="3"
                        placeholder="Answer"><?php echo $home->smart_contact_1;?></textarea>
                    </fieldset>

                  </div>
                  <div class="form-group col-md-6 mb-6">

                     <fieldset class="form-group col-md-12 mb-12">
                      <label for="answer">Heading 2</label>
                      <textarea class="form-control" name= "smart_head_two" id="smart_head_two" rows="3"
                        placeholder="Answer"><?php echo $home->smart_contact_2;?></textarea>
                    </fieldset>

              
                  </div>
                </div>
               

                 <h4 class="form-section"><i class="ft-info"></i> How Everything Works?</h4>
                <div class="row">
                  <div class="form-group col-md-6 mb-2">

                     <fieldset class="form-group col-md-12 mb-12">
                      <label for="answer">Heading 1</label>
                      <textarea class="form-control" name= "how_work_one" id="how_work_one" rows="3"
                        placeholder="Answer"><?php echo $home->how_every_1;?></textarea>
                    </fieldset>

                  </div>
                  <div class="form-group col-md-6 mb-2">

                     <fieldset class="form-group col-md-12 mb-12">
                      <label for="answer">Heading 2</label>
                      <textarea class="form-control" name= "how_work_two" id="how_work_two" rows="3"
                        placeholder="Answer"><?php echo $home->how_every_2;?></textarea>
                    </fieldset>

                    </div>
                </div>

              
                <h4 class="form-section"><i class="ft-info"></i> Advanced Technology</h4>
                <div class="row">
                  <div class="form-group col-md-6 mb-2">

                     <fieldset class="form-group col-md-12 mb-12">
                      <label for="answer">Heading 1</label>
                      <textarea class="form-control" name= "adv_tech_one" id="adv_tech_one" rows="3"
                        placeholder="Answer"><?php echo $home->adv_tech_1;?></textarea>
                    </fieldset>

                  </div>
                  <div class="form-group col-md-6 mb-2">

                     <fieldset class="form-group col-md-12 mb-12">
                      <label for="answer">Heading 2</label>
                      <textarea class="form-control" name= "adv_tech_two" id="adv_tech_two" rows="3"
                        placeholder="Answer"><?php echo $home->adv_tech_2;?></textarea>
                    </fieldset>
                </div>
                </div>
                 <h4 class="form-section"><i class="ft-info"></i>Marketing Plan</h4>
                <div class="row">
                  <div class="form-group col-md-6 mb-2">

                     <fieldset class="form-group col-md-12 mb-12">
                      <label for="answer">Heading 1</label>
                      <textarea class="form-control" name= "market_plan_one" id="market_plan_one" rows="3"
                        placeholder="Answer"><?php echo $home->market_plan_1;?></textarea>
                    </fieldset>

                  </div>
                  <div class="form-group col-md-6 mb-2">
                     <fieldset class="form-group col-md-12 mb-12">
                      <label for="answer">Heading 2</label>
                      <textarea class="form-control" name= "market_plan_two" id="market_plan_two" rows="3"
                        placeholder="Answer"><?php echo $home->market_plan_2;?></textarea>
                    </fieldset>

                  </div>
                </div>

                <h4 class="form-section"><i class="ft-info"></i>Registration in the Project</h4>
                <div class="row">
                  <div class="form-group col-md-6 mb-2">

                     <fieldset class="form-group col-md-12 mb-12">
                      <label for="answer">Heading 1</label>
                      <textarea class="form-control" name= "reg_page_one" id="reg_page_one" rows="3"
                        placeholder="Answer"><?php echo $home->reg_page_1;?></textarea>
                    </fieldset>

                  </div>
                  <div class="form-group col-md-6 mb-2">
                     <fieldset class="form-group col-md-12 mb-12">
                      <label for="answer">Heading 2</label>
                      <textarea class="form-control" name= "reg_page_two" id="reg_page_two" rows="3"
                        placeholder="Answer"><?php echo $home->reg_page_2;?></textarea>
                    </fieldset>

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
            
        <!-- <h4 class="card-title" id="from-actions-bottom-right">Spanish</h4>


            <form class="form" id="homecontent_sp" method="post"  enctype="multipart/form-data" >
              <input type="hidden" value="sp" name="lang">
              <div class="form-body">
                <h4 class="form-section"><i class="ft-info"></i> SMART CONTRACT</h4>
                <div class="row">
                  <div class="form-group col-md-6 mb-6">

                     <fieldset class="form-group col-md-12 mb-12">
                      <label for="answer">Heading 1</label>
                      <textarea class="form-control" name= "smart_head_one_sp" id="smart_head_one_sp" rows="3"
                        placeholder="Answer"><?php echo $home_sp->smart_contact_1;?></textarea>
                    </fieldset>

                  </div>
                  <div class="form-group col-md-6 mb-6">

                     <fieldset class="form-group col-md-12 mb-12">
                      <label for="answer">Heading 2</label>
                      <textarea class="form-control" name= "smart_head_two_sp" id="smart_head_two_sp" rows="3"
                        placeholder="Answer"><?php echo $home_sp->smart_contact_2;?></textarea>
                    </fieldset>

              
                  </div>
                </div>
               

                 <h4 class="form-section"><i class="ft-info"></i> How Everything Works?</h4>
                <div class="row">
                  <div class="form-group col-md-6 mb-2">

                     <fieldset class="form-group col-md-12 mb-12">
                      <label for="answer">Heading 1</label>
                      <textarea class="form-control" name= "how_work_one_sp" id="how_work_one_sp" rows="3"
                        placeholder="Answer"><?php echo $home_sp->how_every_1;?></textarea>
                    </fieldset>

                  </div>
                  <div class="form-group col-md-6 mb-2">

                     <fieldset class="form-group col-md-12 mb-12">
                      <label for="answer">Heading 2</label>
                      <textarea class="form-control" name= "how_work_two_sp" id="how_work_two_sp" rows="3"
                        placeholder="Answer"><?php echo $home_sp->how_every_2;?></textarea>
                    </fieldset>

                    </div>
                </div>

              
                <h4 class="form-section"><i class="ft-info"></i> Advanced Technology</h4>
                <div class="row">
                  <div class="form-group col-md-6 mb-2">

                     <fieldset class="form-group col-md-12 mb-12">
                      <label for="answer">Heading 1</label>
                      <textarea class="form-control" name= "adv_tech_one_sp" id="adv_tech_one_sp" rows="3"
                        placeholder="Answer"><?php echo $home_sp->adv_tech_1;?></textarea>
                    </fieldset>

                  </div>
                  <div class="form-group col-md-6 mb-2">

                     <fieldset class="form-group col-md-12 mb-12">
                      <label for="answer">Heading 2</label>
                      <textarea class="form-control" name= "adv_tech_two_sp" id="adv_tech_two_sp" rows="3"
                        placeholder="Answer"><?php echo $home_sp->adv_tech_2;?></textarea>
                    </fieldset>
                </div>
                </div>
                 <h4 class="form-section"><i class="ft-info"></i>Marketing Plan</h4>
                <div class="row">
                  <div class="form-group col-md-6 mb-2">

                     <fieldset class="form-group col-md-12 mb-12">
                      <label for="answer">Heading 1</label>
                      <textarea class="form-control" name= "market_plan_one_sp" id="market_plan_one_sp" rows="3"
                        placeholder="Answer"><?php echo $home_sp->market_plan_1;?></textarea>
                    </fieldset>

                  </div>
                  <div class="form-group col-md-6 mb-2">
                     <fieldset class="form-group col-md-12 mb-12">
                      <label for="answer">Heading 2</label>
                      <textarea class="form-control" name= "market_plan_two_sp" id="market_plan_two_sp" rows="3"
                        placeholder="Answer"><?php echo $home_sp->market_plan_2;?></textarea>
                    </fieldset>

                  </div>
                </div>

                <h4 class="form-section"><i class="ft-info"></i>Registration in the Project</h4>
                <div class="row">
                  <div class="form-group col-md-6 mb-2">

                     <fieldset class="form-group col-md-12 mb-12">
                      <label for="answer">Heading 1</label>
                      <textarea class="form-control" name= "reg_page_one_sp" id="reg_page_one_sp" rows="3"
                        placeholder="Answer"><?php echo $home_sp->reg_page_1;?></textarea>
                    </fieldset>

                  </div>
                  <div class="form-group col-md-6 mb-2">
                     <fieldset class="form-group col-md-12 mb-12">
                      <label for="answer">Heading 2</label>
                      <textarea class="form-control" name= "reg_page_two_sp" id="reg_page_two_sp" rows="3"
                        placeholder="Answer"><?php echo $home_sp->reg_page_2;?></textarea>
                    </fieldset>

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

            </form> -->


          </div>
        </div>
      </div>
    </div>
  </div>
 
</section>
<!-- // Form actions layout section end -->

          </div>
        </div>
         
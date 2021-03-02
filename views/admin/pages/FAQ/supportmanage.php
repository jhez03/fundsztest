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
          <h4 class="card-title">Support Management </h4>
          
        </div>

      <div class="text-right d-none d-sm-none d-md-none d-lg-block">
               
        </div>
        <div class="card-content">
          <div class="card-body card-dashboard table-responsive">
            <table class="table table-striped table-bordered zero-configuration">
              <thead>
                <tr>
<th>TicketId</th>
<th>TicketDate</th>
<th>Email</th>
<th>Name</th>
<th>Message</th>
<th>Status</th>
<th>Options</th>
</tr>
              </thead>
              <tbody>
<?php
$i=0;
if($result){
foreach($result as $row)
{
$user_id = $row->user_id;
$where2 = "user_id=".$user_id;
//  $username = $this->user_model->get_data('userdetails',$where2,'','','','','row','','username');
$ticketuser = $row->username;
echo "<tr>";
$l=" ";
echo "<td>".($i+1)."</td>";
echo "<td>".$row->created_date."</td>";
echo "<td>".$row->email."</td>";
echo "<td>".$row->name."</td>";
echo "<td>".substr($row->message,0,10)."</td>";
echo "<td>".$row->status."</td>";
echo "<td>&nbsp;&nbsp;";
// if($view1==1){
echo anchor('/view_ticket_detail/'.$row->id,$l,$delete=array('title'=>"View Ticket",'class'=>"fa fa-eye"));
// }
?>
&nbsp;
<?php
// if($dele1==1){
echo anchor('/delete_ticket/'.$row->id,$l,$delete=array('title'=>"Delete",'class'=>"fa fa-remove",'onclick'=>"return confirm('Do you want to delete this ticket ?');"));
// }
echo "</td>";

echo "</tr>";

$i++;
}

}?>
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

  
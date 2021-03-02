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
<div class="container">
          <h4 class="card-title">Support Management </h4>
          

      <div class="text-right d-none d-sm-none d-md-none d-lg-block">
               
        </div>
        <div class="card-content">

<?php if(isset($view)) { ?>
<h4><?php //echo anchor('admin/add_adminuser','Customer Details'); ?></h4>
<?php  if(isset($notfound)) { ?>

<?php }
else {  ?>

<!-- BEGIN EXAMPLE TABLE widget-->
<table id="dynamic-table" class="table table-striped table-bordered table-hover">
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
if($view1==1){
echo anchor('AOdSmIiZn/view_ticket_detail/'.$row->id,$l,$delete=array('title'=>"View Ticket",'class'=>"fa fa-eye"));
}
?>
&nbsp;
<?php
if($dele1==1){
echo anchor('AOdSmIiZn/delete_ticket/'.$row->id,$l,$delete=array('title'=>"Delete",'class'=>"fa fa-remove",'onclick'=>"return confirm('Do you want to delete this ticket ?');"));
}
echo "</td>";

echo "</tr>";

$i++;
}

}?>
</tbody>
</table>

<?php echo form_close(); ?>
</div>
</div>
<!-- END EXAMPLE TABLE widget-->
</div>
<?php
}
}
if(isset($replyview)) { ?>

<div class="row-fluid">
<div class="span12">
<div class="widget box blue" id="form_wizard_1">
<div class="widget-title">
<h4>
<i class="icon-reorder"></i>Reply Ticket
</h4>
<span class="tools">
<a href="javascript:;" class="icon-chevron-down"></a>
<!-- <a href="javascript:;" class="icon-remove"></a>-->
</span>
</div>
<div class="widget-body form">
<?php $attributes=array('class'=>'form form-horizontal','id'=>'addadmin');
echo  form_open_multipart('admin/sendmail',$attributes); ?>
<div class="form-wizard">
<div class="navbar steps">
<div class="navbar-inner">
<ul class="row-fluid">
<li class="span3">
<a href="#tab1" data-toggle="tab" class="step active">
<span class="number">1</span>
<span class="desc"><i class="icon-ok"></i>Reply Ticket</span>
</a>
</li>
</ul>
</div>
</div>
<div id="bar" class="progress progress-striped">
<div class="bar"></div>
</div>
<div class="tab-content">
<div class="tab-pane active" id="tab1">
<div class="control-group">
<label class="control-label">TO:</label>
<div class="controls">
<input type="text" class="input req-email span8" minlength="3" maxlength="40" name="tomail" value="<?php echo $email_id;?>"  />
</div>
</div>
<div class="control-group">
<label class="control-label">Subject</label>
<div class="controls">
<input type="text" class="input req-string span8" name="subject" value=""  />
</div>
</div>
<div class="control-group">
<label class="control-label">Message:</label>
<div class="controls">
<textarea name="message" class="input req-string span8" style="width:500px;height:200px;"></textarea>
</div>
</div>
</div>
</div>
<div class="form-actions clearfix">
<input type="submit" id="addbutton" name="submit" class="btn btn-success" value="Save" />
<div id="errorDiv1" class="error-div" style="float:left"></div>
<Submit <i class="icon-ok"></i>
</a>
</div>
</div>
<?php echo form_close();?>
</div>
</div>
</div>
</div>
</div>
<?php
}

if(isset($detailview)) {  ?>

<div class="row-fluid">
<div class="span12">
<div class="widget box blue" id="form_wizard_1">
<div class="widget-title">
<h4>
<i class="icon-reorder"></i><?php if($result) { foreach($result as $result1) { echo "Subject : ".$result1->subject ." ,Ticket Id : 65120".$result1->id.", Type : ".FS::Common()->get_catname($result1->departments);  break; }  } ?>
</h4>

</div>
<div class="">
<?php //$attributes=array('class'=>'form form-horizontal','id'=>'editadmin');
//echo  form_open_multipart('admin/reply_ticket',$attributes); ?>
<!--<input type="hidden" name="id" value="<?php // echo $id;?>">  -->
<div class="form-wizard">

<div class="tab-content">
<?php if($result) { ?>
<?php
$i=1;
foreach($result as $gkques)
{
$g_id           =   $gkques->id;
// $ques_question  =   $gkques->subject;
$ques_answer  =   $gkques->message;
$name  =   $gkques->name;
$attachment=   $gkques->file;
$user_id = $gkques->DiZrIeSsOu;
$created_date = $gkques->created_date;

//$username = "ADMIN";
if($user_id)
$username = $name;
else
$username = "Admin";

?>

<input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
<div class="bs-callout bs-callout-warning">
<!--<h4><?php echo $username?></h4>-->
<?php if($i != 1) { ?>
<hr>
<?php } ?>
<p><?php echo $username?><span style="margin-left:55px;"><?php echo $created_date; ?></span></p>
<p><?php echo  $ques_answer?></p>
<?php if($attachment!='empty') { ?>
<a download title="<?php echo $attachment; ?>" href="<?php echo base_url(); ?>assets/front/profile/<?php echo $attachment; ?>" class="btn btn-small btn-primary"><i class='icon-eye-open'></i> Download Attachment</a>
<?php  ?>
<?php } ?>
</div>
<?php $i++; } }else { echo "No records found at the moment."; } ?>

</div>



<hr />
<?php $iidd = $this->uri->segment(2); ?>
<?php echo form_open_multipart("/view_ticket_detail/$iidd", array('method'=>'POST')); ?>
<input type="hidden" name="username" value="<?php echo $username; ?>">
Message
<p><textarea class="span12" required cols="85" rows="10" name="message" value="<?php echo set_value('message'); ?>"></textarea></p>
<div style="color:#F33"> <?php echo form_error('message'); ?> </div>
<input type="file" name="image">
<br>
<p><button class="btn btn-success btn-large" type="submit" name="post_ticket_reply"  value="post_ticket_reply">Reply</button></p>
<?php echo form_close(); ?>
</a>
</div>
</div>
</form>
</div>
</div>
</div>

</div>
<?php
}
?>
</div>
</div>
</div>
</div>
</div>
</div>


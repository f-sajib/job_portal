<!DOCTYPE html>

 <html class="no-js">
<head>
    <?php include ('head.php'); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">

<style>
.info > a {
transition: all 1s;

}
.info > a:hover{
  cursor: pointer;
  background: linear-gradient(to top left, #2193b0 11%, #6dd5ed 63%);
  color:white;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.main-div:hover{
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
</style>
<script>
  function contact(user_id,emp_id)
  {
    $.ajax({
        data : {user_id:user_id,emp_id:emp_id},
        method : 'post',
        url : '<?php echo base_url('Welcome/notify_user');?>',
        success : function(data) {
                if (data='ok') {
                  swal('Message Sent','A message is sent to the person,Requesting him/her to sent their Resume to your respected Email','success');
                }
        }           
    });
    $("#hide"+user_id).hide();
  }
</script>

<script>
  function warning()
  {
    swal('Please Login','Login as a Employeer to contact this person','warning');
  }
</script>

</head>
<body>
<?php $page= 'job_sk'; include ('header.php'); ?>
<br>
<div class="container">
  <div class="row">
    <div  class="col-sm-9">
      <div class="main-div" style="border:1px solid #ccc; border-radius: 10px; margin-bottom:10px">
        <div class="row">
          <div class="col-sm-4 ">       
          <img style="border:5px solid #6dd5ed; border-radius:25px;margin-left: 25px; margin-bottom: 25px;margin-top: 25px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" height="130" width="130" src="<?= base_url();?>asset/img/<?php echo $details->photo?>">
        </div>
        <div style="margin-bottom: 20px;margin-top: 20px;" class="col-sm-6 col-sm-pull-1">
          <h4>
              <b><?php echo $details->f_name.' '.$details->l_name?></b>
          </h4>
          <i style="font-size: 20px;color:#6dd5ed" class="ti-email" aria-hidden="true"></i> <?php echo $details->email?>
          <i style="font-size: 20px; border-left: 1px solid #ccc;color:#6dd5ed" class="ti-location-pin" aria-hidden="true"></i><?php echo $details->pre_address?><br>
          <div style="border-radius:10px;margin-top: 10px; padding:8px; border: 1px solid #ccc;background:linear-gradient(to top left, #2193b0 11%, #6dd5ed 63%);"><?php echo $details->skill?></div>
        </div>
        <div style="margin-bottom: 20px;" class="col-sm-2 col-sm-pull-1">
          <?php $emp_id=$this->session->userdata("emp_id");?>
          <?php if($this->session->userdata("emp_id")) {?>
          <?php $data['contact']=$this->db->query("SELECT user_id,emp_id FROM notification WHERE user_id=$details->id AND emp_id=$emp_id")->row();
            if(!isset($data['contact'])):?>
            <div class="info" style="margin-top: 45px;"><a id="hide<?php echo $details->id?>" onclick="contact(<?php echo $details->id?>,<?php echo $emp_id;?>)"style="text-decoration:none; border:1px solid #ccc;padding: 12px;border-radius: 5px"><b><i class="fa fa-phone" style="font-size: 18px"></i> Contact</b></a></div>
            <?php endif;?>
            <?php } else {?>
            <div class="info" style="margin-top: 100px;"><a onclick="warning()" style="text-decoration:none;border:1px solid #ccc;padding: 12px;border-radius: 5px"><b><i class="fa fa-phone" style="font-size: 18px"></i> Contact</b></a>
            </div>
            <?php }?>
        </div>    
        </div>                
      </div>
      <div class="main-div" style="border:1px solid #ccc; border-radius: 10px; margin-bottom:10px">
        <div class="row">
          <div class="col-sm-12">
            <h3 style="margin-left: 25px;"><b>About Me</b></h3>
            <p style="margin-left: 25px;"><?php echo $details->objective;?></p>
          </div>   
        </div>                
      </div>
      <div class="main-div" style="border:1px solid #ccc; border-radius: 10px; margin-bottom:10px">
        <div class="row">
          <div class="col-sm-12">
            <h3 style="margin-left: 25px;"><b>Qualifications</b></h3>
            <?php foreach($edu as $row):?>
            <div style="margin-left: 25px;border-left: 5px solid #6dd5ed; margin-bottom: 10px;">
              <div style="margin-left: 15px;line-height:2;">
                <b style="color: #2193b0"><?php echo $row->degree;?></b><br>
                Graduation Year : <?php echo $row->year;?><br>
                Result : <?php echo $row->result;?><br>
                <?php echo $row->institute;?> , <?php echo $row->board;?>
              </div>
            </div>
          <?php endforeach;?>
          </div>   
        </div>                
      </div>
      <div class="main-div" style="border:1px solid #ccc; border-radius: 10px; margin-bottom:10px">
        <div class="row">
          <div class="col-sm-12">
            <h3 style="margin-left: 25px;"><b>Work Experience</b></h3>
            <?php foreach($work as $row):?>
            <div style="margin-left: 25px;border-left: 5px solid #6dd5ed; margin-bottom: 10px;">
              <div style="margin-left: 15px;line-height:2;">
                <b style="color: #2193b0"><?php echo $row->company;?></b><br>
                <?php echo $row->designation;?>, <?php echo $row->department;?>  <br>
                <?php echo $row->responsibilites;?><br>
                <?php $timestamp = strtotime($row->d_from);
                $timestamp1 = strtotime($row->d_to);
                $date = date('F  Y', $timestamp);
                $date1 = date('F  Y', $timestamp1);?>
                Work period : <?php echo $date;?> To <?php echo $date1;?>
              </div>
            </div>
          <?php endforeach;?>
          </div>   
        </div>                
      </div>
      <div class="main-div" style="border:1px solid #ccc; border-radius: 10px; margin-bottom:10px">
        <div class="row">
          <div class="col-sm-12">
            <h3 style="margin-left: 25px;"><b>Training</b></h3>
            <?php if(isset($training) && !empty($training)):
            foreach($training as $row):?>
            <div style="margin-left: 25px;border-left: 5px solid #6dd5ed; margin-bottom: 10px;">
              <div style="margin-left: 15px;line-height:2;">
                <b style="color: #2193b0"><?php echo $row->title;?></b><br>
                <?php echo $row->institution;?> , <?php echo $row->location;?><br>
                Topics : <?php echo $row->topics;?><br>
                Duration : <?php echo $row->duration;?><br>
                Year : <?php echo $row->year;?>
              </div>
            </div>
            <?php endforeach;
                  endif;?>
          </div>   
        </div>                
      </div>
    </div>
  
</div>
  <br>
</div>



<?php include ('footer.php'); ?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="<?= base_url(); ?>asset/js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
<script src="<?= base_url(); ?>asset/js/bootstrap.min.js"></script>    
</body>

</html>
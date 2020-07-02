<!DOCTYPE html>

 <html class="no-js">
<head>
  <?php include ('head.php'); ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
  
  
   
  
  <link rel="stylesheet" href="<?= base_url(); ?>asset/tagify/tagify.css">       
  <script src="<?= base_url(); ?>asset/tagify/tagify.js"></script>
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
/*.card:hover{
  background: #d1faca;
  cursor: pointer;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}*/
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
<div class="container">
  <br>
  <form method="post" action="<?php echo base_url();?>Welcome/jobseeker">
      <section id='section-basic'>                
          <aside>
              <input type="text" id="tags" name='tags' class='some_class_name' placeholder='Filter with key skill'>
              <button type="submit" class="btn btn-primary">Search</button>
              <button class='tags--removeAllBtn btn btn-danger' id="reset" type='button'>Clear tags</button>
          </aside>
      </section>
  </form>
  <br>

  <?php if($seeker && !empty($seeker)):
        foreach($seeker as $row):?>
          <div class="row">
            <div style="border:1px solid #ccc; border-radius: 10px;" class="main-div card col-sm-9">
              <div class="card-body">
                <div class="col-sm-4 ">       
                  <img style="border:5px solid #6dd5ed; border-radius:25px; margin-bottom: 25px;margin-top: 25px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" height="130" width="130" src="<?= base_url();?>asset/img/<?php echo $row->photo?>">
                </div>
                <div style="margin-bottom: 20px;margin-top: 20px;" class="col-sm-6 col-sm-pull-1">
                  <h4><b><?php echo $row->f_name.' '.$row->l_name?></h4></b>
                  <i style="font-size: 20px;color:#6dd5ed" class="ti-email" aria-hidden="true"></i> <?php echo $row->email?>
                  <i style="font-size: 20px; border-left: 1px solid #ccc;color:#6dd5ed" class="ti-location-pin" aria-hidden="true"></i><?php echo $row->pre_address?><br>
                  <div style="border-radius:10px;margin-top: 10px; padding:8px; border: 1px solid #ccc;background:linear-gradient(to top left, #2193b0 11%, #6dd5ed 63%);"><?php echo $row->skill?></div>
                </div>
                <div style="margin-bottom: 20px;" class="col-sm-2">
                  <div class="info" style="margin-top: 45px;"><a target="_black" href="<?php echo base_url(); ?>Welcome/jobseeker_details/<?php echo $row->id;?>" style="text-decoration:none; border:1px solid #ccc;padding: 12px;border-radius: 5px"><b><i class="ti-file" style="font-size: 18px"></i> Resume</b></a></div>
                  <?php $emp_id=$this->session->userdata("emp_id");?>
                  <?php if($this->session->userdata("emp_id")) {?>
                  <?php $data['contact']=$this->db->query("SELECT user_id,emp_id FROM notification WHERE user_id=$row->id AND emp_id=$emp_id")->row();
                  if(!isset($data['contact'])):?>
                  <div class="info" style="margin-top: 45px;"><a id="hide<?php echo $row->id?>" onclick="contact(<?php echo $row->id?>,<?php echo $emp_id;?>)"  style="text-decoration:none; border:1px solid #ccc;padding: 12px;border-radius: 5px"><b><i class="fa fa-phone" style="font-size: 18px"></i> Contact</b></a></div>
                  <?php endif;?>
                <?php } else {?>
                  <div class="info" style="margin-top: 45px;"><a onclick="warning()" style="text-decoration:none; border:1px solid #ccc;padding: 12px;border-radius: 5px"><b><i class="fa fa-phone" style="font-size: 18px"></i> Contact</b></a></div>
                <?php }?>
                </div>                    
              </div>
            </div>
        </div>
          <br>
  <?php endforeach;
          endif;?>
    <nav class="pull-right" aria-label=...>
      <ul class=pagination>
        <li class="page-item" id="previous-page"><a  href="javascript:void(0)" aria-label=Previous><span aria-hidden=true>&laquo;</span></a></li>&nbsp;
      </ul>
    </nav>
</div>

<script type="text/javascript">
 var numberOfItems = $('.main-div').length;
 var limitPerPage = 5;
$('.main-div:gt(' + (limitPerPage - 1) + ')').hide();
var totalPages = Math.round(numberOfItems / limitPerPage);
$(".pagination").append("<li class='current-page active'><a  href='javascript:void(0)'>" + 1 + "</a></li>\xa0");
for (var i = 2; i <= totalPages; i++) {
  $(".pagination").append("<li class='current-page'><a  href='javascript:void(0)'>" + i + "</a></li>\xa0");
}
$(".pagination").append("<li id='next-page'><a  href='javascript:void(0)' aria-label=Next><span aria-hidden=true>&raquo;</span></a></li>");
$(".pagination li.current-page").on("click", function() {
  if ($(this).hasClass('active')) {
    return false;
  } else {
    var currentPage = $(this).index();
    $(".pagination li").removeClass('active');
    $(this).addClass('active');
    $(".main-div").hide();
    var grandTotal = limitPerPage * currentPage;
    for (var i = grandTotal - limitPerPage; i < grandTotal; i++) {
      $(".main-div:eq(" + i + ")").show();
    }
  }
});
$("#next-page").on("click", function() {
  var currentPage = $(".pagination li.active").index();  
  if (currentPage === totalPages) {
    return false;
  } else {
    currentPage++;
    $(".pagination li").removeClass('active');
    $(".main-div").hide();
    var grandTotal = limitPerPage * currentPage;
    for (var i = grandTotal - limitPerPage; i < grandTotal; i++) {
      $(".main-div:eq(" + i + ")").show();
    }
    $(".pagination li.current-page:eq(" + (currentPage - 1) + ")").addClass('active');
  }
});
$("#previous-page").on("click", function() {
  var currentPage = $(".pagination li.active").index();
  if (currentPage === 1) {
    return false;
  } else {
    currentPage--;
    $(".pagination li").removeClass('active');
    $(".main-div").hide(); 
    var grandTotal = limitPerPage * currentPage;
    for (var i = grandTotal - limitPerPage; i < grandTotal; i++) {
      $(".main-div:eq(" + i + ")").show();
    }
    $(".pagination li.current-page:eq(" + (currentPage - 1) + ")").addClass('active');
  }
});
</script>
<script data-name="basic">

(function(){
    var input = document.querySelector('input[name=tags]'),
    tagify = new Tagify(input, {
        whitelist : ["java","php","javascript"],
        // blacklist : [".NET", "PHP"], 
    })
    document.querySelector('.tags--removeAllBtn')
    .addEventListener('click', tagify.removeAllTags.bind(tagify))
})()
</script>

<script> 
$(document).ready(function(){
//load_data(); 
 
 
    $('#search').click(function(){
        var query = $('#tags').val();
        if(query != '') {
            load_data(query);
        } else {
            load_data();
        }      
    });


});
</script>


<?php include ('footer.php'); ?>
<script>window.jQuery || document.write('<script src="<?= base_url(); ?>asset/js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
   
</body>

</html>
<!DOCTYPE html>  
<html>  
<head>
<?php include ('head.php'); ?>  
</head>
 
<body>

       
<?php $page= 'home'; include ('header.php'); ?>

 <!--================ Company ======================
    ==================== List ASC ==================-->
       
<div class="container">
	<?php if(isset($cat->category)):?>
<b>Job Category :</b> <h4><?php echo $cat->category;?></h4>
<?php endif;?>



<?php if($joblist && !empty($joblist)):
        foreach($joblist as $row):
          $job_id=$row->id;?>
        <a target="_blank" class="row" style="text-decoration: none;" href='<?php echo base_url("Welcome/job/".$job_id)?>'>
          <div class="col-sm-offset-1 col-md-7 panel panel-success bg">
          <div class="panel-body">
            <h3 style="color:green; text-decoration: none;"><b><?php echo $row->title?></b></h3>
            <b><i class="icon-location"></i></b><?php echo $row->location?><br>
            <b><i class="fa fa-book"></i></b>&nbsp;<?php echo $row->education?><br>
            <b><i class="fa fa-suitcase"></i></b>&nbsp;<?php echo $row->experience?>
            <?php $timestamp = strtotime($row->deadline);
                  $date = date('F d,Y', $timestamp);?>
            <b class="pull-right"><i class="fa fa-clock-o"></i>&nbsp; Deadline : <?php echo $date ?></b>
          </div>
        </div>
      </a>
    <?php endforeach;
      else:
       echo "<div style='margin-bottom: 100px;'><center><i style='font-size:50px;' class='fa fa-suitcase'></i><h2><b>No Job Available</h2></center></b></div>";
      endif;
    ?>


</div>

 <!-- container -->
 <!-- Footer Section -->           
<?php include ('footer.php'); ?> 


<script>window.jQuery || document.write('<script src="<?= base_url(); ?>asset/js/vendor/jquery-1.10.2.min.js"><\/script>')</script>

<script src="<?= base_url(); ?>asset/js/bootstrap.min.js"></script>
 <!-- <script src="<?= base_url(); ?>asset/js/main.js"></script> -->
</body>

 </html>  
   
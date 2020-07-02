<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <?php include ('head.php'); ?>
</head>


<script>
   function view_info1(id)
   {
    $.ajax({
                    data : {id:id},
                    method : 'post',
                    url : '<?php echo base_url('Welcome/view_info1');?>',
                    success : function(data) {

                        $('#view_user').html(data);
                    },
                    error :function(){
                        swal('Something went wrong','','warning');
                    }
                });
   } 

   function view_info2(id)
   {

    $.ajax({
                    data : {id:id},
                    method : 'post',
                    url : '<?php echo base_url('Welcome/view_info2');?>',
                    success : function(data) {

                        $('#view_employee').html(data);
                    },
                    error :function(){
                        swal('Something went wrong','','warning');
                    }
                });
   } 
</script>
<body>

   <!--  <div id="preloader">
        <div id="status">&nbsp;</div>
    </div> -->
    <!-- Header Section (top bar & menu bar) -->
    <?php $page = 'home'; include ('header.php'); ?>

    <?php if($this->session->flashdata('message'))
            { ?>
                <div class="alert alert-success text-center">
                    <?php echo $this->session->flashdata('message');?>
                </div>
    <?php   }  ?>
    
    <!-- Body content -->
    
    <div class="slider-area">
        <div class="slider">
            <div id="bg-slider" class="owl-carousel owl-theme">
              <div class="item"><img style="height: 450px; width: 100%;" src="<?= base_url(); ?>asset/img/1.jpg" alt="Mirror Edge"></div>
              <div class="item"><img style="height: 450px; width: 100%;" src="<?= base_url(); ?>asset/img/2.jpg" alt="The Last of us"></div>
              <div class="item"><img style="height: 450px; width: 100%;" src="<?= base_url(); ?>asset/img/3.jpg" alt="GTA V"></div>
			  <div class="item"><img style="height: 450px; width: 100%;" src="<?= base_url(); ?>asset/img/4.jpg" alt="Mirror Edge"></div>
              <div class="item"><img style="height: 450px; width: 100%;" src="<?= base_url(); ?>asset/img/5.jpg" alt="The Last of us"></div>
            </div>
        </div>
        <div class="container slider-content">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12">
                    <div class="search-form wow pulse" data-wow-delay="0.8s">
                        <form action="<?php echo site_url('Welcome/search')?>" method="post" class="form-inline">
                            <div class="form-group">
                                <input name="string" type="text" class="form-control" placeholder="Job Key Word">
                            </div>
                            <div class="form-group">
                                <select name="division" class="form-control">
                                    <option value="">-- Select Division --</option>
                                    <option value="Dhaka">Dhaka</option>
                                    <option value="Chittagong">Chittagong</option>
                                    <option value="Rajshahi">Rajshahi</option>
                                    <option value="Khulna">Khulna</option>
                                    <option value="Barisal">Barisal</option>
                                    <option value="Sylhet">Sylhet</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="category" class="form-control">
                                    <option value="">Select Your Category</option>
                                    <?php foreach($categorys as $row):?>
                                    <option style="cursor: pointer;" value="<?php echo $row->id;?>"><?php echo $row->category;?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-lg btn-success">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content-area">
        <div class="container">
            <div class="row page-title text-center wow zoomInDown" data-wow-delay="1s">
                <h5>Our Process</h5>
                <h2>How we work for you?</h2>
                <p>We have a good connection with various level corporate company and we ensure the best standard formation of your carriculum vitae</p>
            </div>
            <div class="row how-it-work text-center">
                <div class="col-md-6">
                    <div class="single-work wow fadeInUp" data-wow-delay="0.8s">
                        <img src="<?= base_url(); ?>asset/img/how-work2.png" alt="">
                        <h3>Searching for the best job</h3>
                        <p>CareerAgeBD will help find you a job that maximizes your career. If you are advancing your career in Bangladesh. Take the first step and let our Network introducing you to the next stage of your career.</p>
                    </div>
                </div>
                <div class="col-md-4" hidden>
                    <div class="single-work  wow fadeInUp"  data-wow-delay="0.9s">
                        <img src="<?= base_url(); ?>asset/img/how-work2.png" alt="">
                        <h3>Searching for the best job</h3>
                        <p>Using the outcomes from the job, we will put together a plan for the most effective marketing strategy to get the best results.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="single-work wow fadeInUp"  data-wow-delay="1s">
                        <img src="<?= base_url(); ?>asset/img/how-work3.png" alt="">
                        <h3>Searching for the best employee</h3>
                        <p>With our knowledge in the business market and our effecient human resource strategy, we can support you in all of your recruitment needs.We make it easy to search for the best employee with CV sorting.</p>
                    </div>
                </div>
            </div>
        </div>
        <hr>

        <div class="container">
            <div class="row job-posting wow fadeInUp" data-wow-delay="1s">
                <div role="tabpanel">
                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#job-seekers" aria-controls="home" role="tab" data-toggle="tab">Job Seekers</a></li>
                    <li role="presentation"><a href="#employeers" aria-controls="profile" role="tab" data-toggle="tab">Employeers</a></li>
                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="job-seekers">
                    <ul class="list-inline job-seeker">
                    <?php if($user->num_rows() > 0)
                            {
                              foreach(array_slice($user->result(), 0, 6) as $row)
                                { ?>
                            <li>
                                <a onclick="view_info1(<?php echo $row->id?>)" style="cursor: pointer;" data-toggle="modal" data-target="#myModal">
                                    <img height='170px' width='165px' src="<?= base_url(); ?>asset/img/<?php echo $row->photo;?>" alt="">
                                    <div class="overlay"><h3><?php echo $row->f_name.' '.$row->l_name; ?></h3><p>Position</p></div>
                                </a>
                            </li>
                         <?php } } ?>
                            
                    </ul>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="employeers">
                        <ul class="list-inline">
                    <?php if($employee->num_rows() > 0)
                    {
                      foreach(array_slice($employee->result(), 0, 6) as $row)
                        { ?>
                            <li>
                                <a onclick="view_info2(<?php echo $row->id?>)" style="cursor: pointer;" data-toggle="modal" data-target="#myModal2">
                                    <img height='170px' width='165px' src="<?= base_url(); ?>asset/img/<?php echo $row->logo;?>" alt="">
                                    <div class="overlay"><h3><?php echo $row->c_name; ?></h3></div>
                                </a>
                            </li>
                            <?php } } ?>
                        </ul>
                    </div>
                  </div>

                </div>
            </div>
        </div>
        <hr>

        <div class="container">
            <div class="row page-title text-center wow bounce"  data-wow-delay="1s">
                <h5>Recent Jobs</h5>
                <?php if($job->num_rows() > 0)
                        { $result=  $job->result();}
                        else{}?>
                <h2><span><?php if (isset($result)){echo count($result);}?></span> Available jobs for you</h2>
            </div>
            <div class="row jobs">
                <div class="col-md-9">
                    <div class="job-posts table-responsive">
                        <table class="index-table">
                            
                      <?php if($job->num_rows() > 0)
                        {
                            foreach(array_slice($job->result(), 0, 6) as $row)
                            { ?>
                            <tr class="odd wow fadeInUp" data-wow-delay="1s">
                                <td class="tbl-logo"><img height='80px' width='75px' src="<?= base_url(); ?>asset/img/<?php echo $row->logo;?>" alt=""></td>
                                <td class="tbl-title"><h4><?php echo $row->title?><br><span class="job-type"><?php echo $row->status?></span></h4></td>
                                <td><p><?php echo $row->c_name?></p></td>
                                <?php $job_id= $row->id?>
                                <td><p><i class="icon-location"></i><?php echo $row->location?></p></td>
                                <td><p>&dollar;<?php echo $row->salary?></p></td>
                                <td class="tbl-apply"><a target="_blank" href='<?php echo base_url("Welcome/job/".$job_id)?>'>Details</a></td>
                            </tr>
                        <?php } }
                        else{echo "NO Job Availabl";} ?>
                        </table>
                    </div>
                    <div class="more-jobs">
                        <a href=""> <i class="fa fa-refresh"></i>View more jobs</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="job-add wow fadeInRight" data-wow-delay="1.5s">
                        <h2>Seeking a job?</h2>
                        <a href="#signUp" data-toggle="modal">Create a Account</a>
                    </div>
                </div>
            </div>
        </div>
        <hr>

        <div class="container">
            <div class="row page-title text-center  wow bounce"  data-wow-delay=".7s">
                <h5>TESTIMONIALS</h5>
                <h2>WHAT PEOPLES ARE SAYING</h2>
            </div>
            <div class="row testimonial">
                <div class="col-md-12">
                    <div id="testimonial-slider">
                        <div class="item">
                            <div class="client-text">                                
                                <p>Jobify offer an amazing service and I couldn’t be happier! They 
                                are dedicated to helping recruiters find great candidates, wonderful service!</p>
                                <h4><strong>Ashrafulislam, </strong><i>CEO, FaceSoftware LTD.</i></h4>
                            </div>
                            <div class="client-face wow fadeInRight" data-wow-delay=".9s"> 
                                <img height="88" width="88" src="<?= base_url(); ?>asset/img/feedback01.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body" id="view_user">
        </div>
        <div class="modal-footer">
          
        </div>
      </div>
  </div>
</div>

<div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body" id="view_employee">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
  </div>
</div>
    
	<!-- Footer Section -->
	<?php include ('footer.php'); ?>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="<?= base_url(); ?>asset/js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
    <script src="<?= base_url(); ?>asset/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>asset/js/owl.carousel.min.js"></script>
    <script src="<?= base_url(); ?>asset/js/wow.js"></script>
    <script src="<?= base_url(); ?>asset/js/main.js"></script>
    
</body>
</html>

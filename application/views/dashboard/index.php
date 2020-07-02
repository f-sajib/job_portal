<!doctype html>
<html class="no-js" lang="en">

<head>
	<?php require ('head.php') ?>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
   <!--  <div id="preloader">
        <div class="loader"></div>
    </div> -->
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <?php $page = 'dashboard'; require ('sidebar_menu.php'); ?>
       
        <div class="main-content">
          
            <?php require ('header.php'); ?>
          
            <div class="page-title-area">
            <div class="row align-items-center">
                <div class="col-sm-12 ">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Dashboard</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="#">Home</a></li>
                        <li><span>Dashboard</span></li>
                    </ul>
                </div>
                </div>
            </div>    
            </div>
            <br>
            <div class="col-md-3">
                <img class="img-responsive img-circle db-pf" src="<?php echo base_url(); ?>asset/img/<?php echo $info->photo;?>" class="img-thumbnail">
                <br>
                <center><h4><span style="color:#b6c5de">Name :</span>&nbsp;<?php echo $info->f_name.' '.$info->l_name; ?></h4></center>
            </div>
            <div class="col-md-9">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#basic">Basic</a></li>
                    <li><a data-toggle="tab" href="#education">Education</a></li>
                    <li><a data-toggle="tab" href="#traning">Training & Courses</a></li>
                    <li><a data-toggle="tab" href="#history">Employmetn History</a></li>
                </ul>

                <div class="tab-content">
                    <div id="basic" class="tab-pane fade in active">
                        <div style="margin-top: 10px; border-left: 10px solid lightgreen; padding: 10px;" class="col-md-4">
                            <h4><i class="fas fa-venus-mars"></i>&nbsp;Gender</h4><br>
                            Male
                        </div>
                         <div style="margin-top: 10px; border-left: 10px solid lightgreen;padding: 10px;" class="col-md-4">
                            <h4><i class="fas fa-male"></i>&nbsp;Father's Name</h4><br>
                            <?php echo $info->father; ?>
                        </div>
                        <div style="margin-top: 10px; border-left: 10px solid lightgreen;padding: 10px;" class="col-md-4">
                            <h4><i class="fas fa-female"></i>&nbsp;Mother's Name</h4><br>
                            <?php echo $info->mother; ?>
                        </div>
                        <div style="margin-top: 10px; border-left: 10px solid lightgreen;padding: 10px;" class="col-md-4">
                            <h4><i class="far fa-calendar-alt"></i>&nbsp;Date of Birth</h4><br>
                            <?php echo $info->date_of_birth; ?>
                        </div>
                        <div style="margin-top: 10px; border-left: 10px solid lightgreen;padding: 10px;" class="col-md-4">
                            <h4><i class="fas fa-mobile-alt"></i>&nbsp;Contanct</h4><br>
                            <?php echo $info->mobile; ?>
                        </div>
                        <div style="margin-top: 10px; border-left: 10px solid lightgreen;padding: 10px;" class="col-md-4">
                            <h4><i class="fas fa-at"></i>&nbsp;Email</h4><br>
                            <?php echo $info->email; ?>
                        </div>
                    </div>
                    <div id="education" class="tab-pane fade in">
                        <div style="margin-top: 10px; border-left: 10px solid lightgreen;padding: 10px;" class="col-md-12">
                        <?php if($info1->num_rows() > 0)
                          { 
                            foreach($info1->result() as $row)
                                { ?>
                            <div class="col-md-2">
                                <?php echo $row->year; ?>
                            </div>
                            <div class="col-md-10">
                                <?php echo $row->degree;?><br>
                                <?php echo $row->institute;?>, <?php echo $row->board;?><br>
                                GPA : <?php echo $row->result; ?>
                            </div>
                            <?php }
                          }
                          else {
                            echo "<center><i class='fas fa-hourglass-start'></i>&nbsp;No data found</center>";
                          } ?>
                        </div>
                    </div>
                    <div id="traning" class="tab-pane fade in">
                        <div style="margin-top: 10px; border-left: 10px solid lightgreen;padding: 10px;" class="col-md-12">
                        <?php if($info2->num_rows() > 0)
                          { 
                            foreach($info2->result() as $row1)
                                { ?>
                            <div class="col-md-2">
                                <?php echo $row1->year; ?>
                            </div>
                            <div class="col-md-10">
                                <?php echo $row1->title;?><br>
                                <?php echo $row1->institution;?>, <?php echo $row1->location;?><br>
                                Duration : <?php echo $row1->duration; ?><br>
                                Topic Covered : <?php echo $row1->topics; ?>
                            </div>
                            <?php }
                          }
                          else {
                            echo "<center><i class='fas fa-hourglass-start'></i>&nbsp;No data found</center>";
                          } ?>
                        </div>
                    </div>
                    <div id="history" class="tab-pane fade in">
                        <div style="margin-top: 10px; border-left: 10px solid lightgreen;padding: 10px;" class="col-md-12">
                        <?php if($info3->num_rows() > 0)
                          { 
                            foreach($info3->result() as $row2)
                                { ?>
                            <div class="col-md-4">
                                <?php $timestamp = strtotime($row2->d_from);
                                    $date = date('F d', $timestamp);
                                    $timestamp2 = strtotime($row2->d_to);
                                    $date2 = date('F d,Y', $timestamp2);?>
                                <?php echo $date; ?> To <?php echo $date2; ?>
                            </div>
                            <div class="col-md-8">
                                <?php echo $row2->company;?><br>
                                <?php echo $row2->designation; ?>, <?php echo $row2->department;?><br>
                                Responsibility : <?php echo $row2->responsibilites; ?><br>
                            </div>
                            <?php }
                          }
                          else {
                            echo "<center><i class='fas fa-hourglass-start'></i>&nbsp;No data found</center>";
                          } ?>
                        </div>
                    </div>
                </div>
            </div>
            
            
        </div>
       
        <footer>
        	<?php require ('footer.php'); ?>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
    <!-- offset area start -->
    <div class="offset-area">
        <div class="offset-close"><i class="ti-close"></i></div>
        <ul class="nav offset-menu-tab">
            <li><a class="active" data-toggle="tab" href="#activity">Activity</a></li>
            <li><a data-toggle="tab" href="#settings">Settings</a></li>
        </ul>
        <div class="offset-content tab-content">
            <div id="activity" class="tab-pane fade in show active">
                <div class="recent-activity">
                    <div class="timeline-task">
                        <div class="icon bg1">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Rashed sent you an email</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg2">
                            <i class="fa fa-check"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Added</h4>
                            <span class="time"><i class="ti-time"></i>7 Minutes Ago</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg2">
                            <i class="fa fa-exclamation-triangle"></i>
                        </div>
                        <div class="tm-title">
                            <h4>You missed you Password!</h4>
                            <span class="time"><i class="ti-time"></i>09:20 Am</span>
                        </div>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg3">
                            <i class="fa fa-bomb"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Member waiting for you Attention</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg3">
                            <i class="ti-signal"></i>
                        </div>
                        <div class="tm-title">
                            <h4>You Added Kaji Patha few minutes ago</h4>
                            <span class="time"><i class="ti-time"></i>01 minutes ago</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg1">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Ratul Hamba sent you an email</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                        <p>Hello sir , where are you, i am egerly waiting for you.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg2">
                            <i class="fa fa-exclamation-triangle"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Rashed sent you an email</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg2">
                            <i class="fa fa-exclamation-triangle"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Rashed sent you an email</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg3">
                            <i class="fa fa-bomb"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Rashed sent you an email</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg3">
                            <i class="ti-signal"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Rashed sent you an email</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                        </p>
                    </div>
                </div>
            </div>
            <div id="settings" class="tab-pane fade">
                <div class="offset-settings">
                    <h4>General Settings</h4>
                    <div class="settings-list">
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <h5>Notifications</h5>
                                <div class="s-swtich">
                                    <input type="checkbox" id="switch1" />
                                    <label for="switch1">Toggle</label>
                                </div>
                            </div>
                            <p>Keep it 'On' When you want to get all the notification.</p>
                        </div>
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <h5>Show recent activity</h5>
                                <div class="s-swtich">
                                    <input type="checkbox" id="switch2" />
                                    <label for="switch2">Toggle</label>
                                </div>
                            </div>
                            <p>The for attribute is necessary to bind our custom checkbox with the input.</p>
                        </div>
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <h5>Show your emails</h5>
                                <div class="s-swtich">
                                    <input type="checkbox" id="switch3" />
                                    <label for="switch3">Toggle</label>
                                </div>
                            </div>
                            <p>Show email so that easily find you.</p>
                        </div>
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <h5>Show Task statistics</h5>
                                <div class="s-swtich">
                                    <input type="checkbox" id="switch4" />
                                    <label for="switch4">Toggle</label>
                                </div>
                            </div>
                            <p>The for attribute is necessary to bind our custom checkbox with the input.</p>
                        </div>
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <h5>Notifications</h5>
                                <div class="s-swtich">
                                    <input type="checkbox" id="switch5" />
                                    <label for="switch5">Toggle</label>
                                </div>
                            </div>
                            <p>Use checkboxes when looking for yes or no answers.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- offset area end -->
    <!-- jquery latest version -->
    <script src="<?= base_url(); ?>asset/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="<?= base_url(); ?>asset/js/popper.min.js"></script>
    <script src="<?= base_url(); ?>asset/js/owl.carousel.min.js"></script>
    <script src="<?= base_url(); ?>asset/js/metisMenu.min.js"></script>
    <script src="<?= base_url(); ?>asset/js/jquery.slimscroll.min.js"></script>
    <script src="<?= base_url(); ?>asset/js/jquery.slicknav.min.js"></script>
    <script src="<?= base_url(); ?>asset/js/dashboard_plugins.js"></script>
    <script src="<?= base_url(); ?>asset/js/dashboard_scripts.js"></script>
    <script src="<?= base_url(); ?>asset/js/vendor/modernizr-2.8.3.min.js"></script><script>
    zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
</body>

</html>

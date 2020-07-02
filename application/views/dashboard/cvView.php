<!doctype html>

<html class="no-js" lang="en">

<head>
    <?php require ('head.php') ?>
    <style type="text/css">
        .cvHeader{padding: 10px; color: #2db300;}
        .fa{color: #2db300;} .cvFa{font-size: 25px;}
        .cvImg{width: 150px; height: 150px; border-radius: 75px;}
        .cvRow{display: flex; width: 100%; border: 5px solid #ccc;}
        .cvLeft{flex: 1; width: 25%; background: #b3ffb3; border-right: 2px dotted #ccc;}
        .cvRight{flex: 3; width: 75%;}
    </style>
</head>

<body>
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <?php $page = 'cv'; require ('sidebar_menu.php'); ?>

        <!-- header area start -->
        <div class="header-area">
            <div class="row cvRow">
                <!-- CV Left Side -->
                <div class="col-sm-3 cvLeft">
                    <center> <img class="img-responsive cvImg" src="<?php echo base_url(); ?>asset/img/<?php echo $info->photo;?>" class="img-responsive"> </center>
                    <br/> <br/>
                    <p><i class="fa fa-envelope" style="font-size: 15px;">&nbsp;</i><?php echo $info->email; ?></p>
                    <p> <i class="cvFa fa fa-mobile">&nbsp;</i> 0<?php echo $info->mobile; ?></p>
                    <p><i class="cvFa fa fa-map-marker">&nbsp;</i><?php echo $info->pre_address; ?></p><br/>
                    <b><h4>Skills</h4></b>
                    <?php 
                    $skills  = $info->skill;
                    $count= substr_count($skills,",");
                    $skill = explode(",", $skills);                    
                    for ($i=0; $i<$count+1; $i++) {
                    ?>
                    <p>&nbsp; <i class="fa fa-dot-circle-o"> </i><?php echo $skill[$i]; ?></p>
                    <?php }?>
                    <br/>
                    <div>
                        <b><h4>Interests</h4></b>
                        <?php 
                        $interests  = $info->interest;
                        $count1= substr_count($interests,",");
                        $interest = explode(",", $interests);
                        for ($i=0; $i<$count1+1; $i++) {
                        ?>
                        <p>&nbsp; <i class="fa fa-angle-right"> </i></i><?php echo $interest[$i]; ?></p>
                        <?php } ?>
                    </div>
                </div>
                <!-- CV right Side -->
                <div class="col-sm-9 cvRight">
                    <div class="row">
                        <h2 class="col-sm-12 cvHeader"><?php echo $info->f_name.' '.$info->l_name; ?></h2> 
                    </div>
                    <br/>
                    <div class="row">
                        <h4 class="col-sm-12 cvHeader">Career Objective</h4>
                        <p class="col-sm-12 text-justify"><?php echo $info->objective?></p>
                    </div>
                    <br/>
                    <div class="row">
                        <h4 class="col-sm-12 cvHeader">Experience:</h4>
                        <?php if($info3->num_rows() > 0) { 
                            foreach($info3->result() as $row) {
                        ?>
                        <div class="col-sm-3 text-center" style="color: #2db300;">
                            <?php $year = date('Y', strtotime($row->d_from)); echo $year;?>-<?php $year = date('Y', strtotime($row->d_to)); echo $year; ?>
                        </div>
                        <div class="col-sm-9">
                            <p>In &nbsp;<b><?php echo $row->company; ?></b> 
                                as <b><?php echo $row->designation;?></b> 
                                [Dept. <?php echo $row->department;?>]</p>
                            <p><?php echo $row->responsibilites; ?></p>
                        </div>
                        <?php } } ?>
                    </div>
                    <br/>
                    <div class="row">
                        <h4 class="col-sm-12 cvHeader">Education</h4>
                        <?php if($info1->num_rows() > 0) { 
                            foreach($info1->result() as $row) {
                        ?>
                        <div class="col-sm-3 text-center" style="color: #2db300;">
                            <?php echo $row->year; ?>
                        </div>
                        <div class="col-sm-9">
                            <p><b><?php echo $row->degree; ?></b> <br/> 
                                <?php echo $row->institute; ?> , <?php echo $row->board; ?>
                                <br/>Result: <?php echo $row->result; ?></p>
                        </div>
                        <?php } } ?>
                    </div>                  

                </div>

            </div> <br/>






            </div>
            <!-- header area end -->

    </div>  <!-- page container -->

    <!-- footer area -->
    <footer>
        <?php require ('footer.php'); ?>
    </footer>


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

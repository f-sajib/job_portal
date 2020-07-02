<!doctype html>
<html class="no-js" lang="en">

<head>
    <?php require ('head.php') ?>
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

        <!-- main content area start -->
        <div class="main-content">
            <!-- header area -->
            <?php require ('header.php'); ?>
            <!-- page title area start -->
            <div class="page-title-area">
            <div class="row align-items-center">
                <div class="col-sm-12 ">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Dashboard</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="<?=base_url(); ?>Dashboard">Home</a></li>
                        <li><span>Curriculum Vitae</span></li>
                    </ul>
                </div>
                </div>
            </div>    
            </div>  <!-- page title area end --> <br/>

            <div class="main-content-inner">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="user-name user-profile">Personal CV</h3> <br/>
                        <p class="text-justify">Upload your Latest personal CV.This cv will be submitted when you will apply for a job<br>(NB: PDF formate only)</p><br>
                        <form enctype="multipart/form-data" action="<?php echo base_url("Dashboard/uploadCv")?>" method="post">
                            <input type="file" name="pdf" id="upload" onchange="checkextension()">
                            <center> <!-- <a href="#" class="btn btn-primary">check CV</a> -->
                            <button type="submit" id="submit" class="btn btn-success">Upload CV</button></center>
                        </form>
                        <iframe width="100%" height="300px" src="<?php if(isset($info->cv) && !empty($info->cv)){echo base_url(); ?>asset/cvpdf/<?php echo $info->cv;} ?>"></iframe>
                    </div>
                    <div class="col-md-6">
                    <h3 class="user-name user-profile">Career Age CV</h3> <br/>
                    <p class="text-justify">Complete your <strong>Career Age</strong> profile. Your career age CV is here. You can check and Create your CV.</p>
                    <center> <a class="btn btn-primary" href="<?=base_url(); ?>Dashboard/cvShow" target="_blank">View</a>
                    <a  target="_blank" class="btn btn-success" href="<?=base_url(); ?>Dashboard/cvPdf">Generate</a> </center>
                    </div>
                </div>  <!-- main-content-inner -->

        </div>  <!-- main content area end -->
    </div>  <!-- page container -->
<script>

document.getElementById("submit").disabled = true;
function checkextension() {
    var file = document.querySelector("#upload");
    if ( /\.(pdf)$/i.test(file.files[0].name) === false ) { 
        swal('Not a Valid file Format','','warning'); 
    } else {
        document.getElementById("submit").disabled = false;
    }
}
</script>


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

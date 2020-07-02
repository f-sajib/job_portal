<!doctype html>
<html class="no-js" lang="en">

<head>
    <?php require ('head.php') ?>
</head>

<body>
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <?php $page = 'cp'; require ('sidebar_menu.php'); ?>
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <?php require ('header.php'); ?>
            <!-- header area end -->
            <!-- page title area start -->
            <div class="page-title-area">
            <div class="row align-items-center">
                <div class="col-sm-12 ">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Dashboard</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="<?=base_url(); ?>Dashboard">Home</a></li>
                        <li><span>Update Company Informations</span></li>
                    </ul>
                </div>
                </div>
            </div>  
            </div><br/>
            <h3 class="user-name user-profile">Complete Your Company Profile</h3>
            <!-- page title area end -->

            <div class="main-content-inner">
                <div class="row">
                <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo base_url("Empdashboard/updateCprofile")?>" method="post"> <br/>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label class="control-label col-sm-3">Company Name</label>
                            <div class="col-sm-9">   <input name="c_name" class="form-control" value="<?php echo $info->c_name; ?>"> </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Email</label>
                            <div class="col-sm-9">  <input type="Email" name="c_email" class="form-control" value="<?php echo $info->c_email; ?>"> </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Contact No.</label>
                            <div class="col-sm-9">  <input name="c_mobile" class="form-control" value="<?php echo $info->c_mobile; ?>"> </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Trade License</label>
                            <div class="col-sm-9">  <input name="c_trade_license" class="form-control col-sm-3" value="<?php echo $info->c_trade_license; ?>">  </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Address</label>
                            <div class="col-sm-9"> <textarea name="c_address" class="form-control"><?php echo $info->c_address; ?> </textarea> </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">About Company</label>
                            <div class="col-sm-9"> <textarea name="c_company" class="form-control"><?php echo $info->c_company; ?></textarea> </div>
                        </div>
                    </div>
                    <center class="col-md-4">
                        <img style="height: 250px; width: 250px;" class="img-circle" src="<?=base_url(); ?>asset/img/<?php echo $info->logo;?>">
                        <input type="file" class="btn user-name user-profile" name="logo">
                    </center>

                    <div class="col-sm-offset-2 col-sm-10">
                        <button class="btn user-profile user-name">Update</button>
                    </div>
                </form>
            </div>
            </div>    <!-- class main-content-inner -->

        </div>  <!-- main content area end -->

        <footer> <?php require ('footer.php'); ?> </footer>
    </div> <!-- class page-container end -->

</body>

</html>

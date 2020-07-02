<!doctype html>
<html class="no-js" lang="en">

<head>
    <?php require ('head.php') ?>
</head>

<style type="text/css">
.icon:hover{
    padding: 3px 3px 3px 3px;
     }
</style>

<body>
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
                        <li><a href="<?=base_url(); ?>Empdashboard">Home</a></li>
                        <li><span>CV Bank</span></li>
                    </ul>
                </div>
                </div>
            </div>  
            </div><br/>

            <?php if($cv->num_rows() > 0)
                    {                        
                        foreach($cv->result() as $row)
                            {?>
                            
                            <div class="col-md-4">
                                <div class="card" style="border: 1px dotted green; border-radius: 10px;">
                                    <div class="card-body row">
                                        <dl class="col-sm-9">                                
                                            <dt><h4><?php echo $row->title?></h4></dt>
                                            <dd style="color: #b2b8c2">Deadline: <?php echo $row->deadline?></dd>
                                        </dl>
                                        <div class="col-sm-3 form-inline">
                                                <a href="<?=base_url(); ?>Empdashboard/appliedCv/<?php echo $row->id;?>"><i style="font-size: 30px; color:red;" class="fa fa-file-pdf-o icon" aria-hidden="true"></i></a>
                                            <label class="control-label" style="font-size: 20px; color: #00ADEF;"> <b><?php echo $row->count?></b> </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php } } else {echo "<center><h3 style='color: #b2b8c2'><i style='font-size: 40px;color:red;' class='fa fa-file-pdf-o'></i><br>No Cv Submited</h3></center>";} ?>

        </div>  <!-- main content area end -->

        <footer> <?php require ('footer.php'); ?> </footer>
    </div> <!-- class page-container end -->

</body>

</html>

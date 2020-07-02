<!doctype html>
<html class="no-js" lang="en">

<head>
    <?php require ('head.php') ?>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <?php $page = 'td'; require ('sidebar_menu.php'); ?>
        <!-- sidebar menu area end -->

        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <?php require ('header.php'); ?>
            <!-- header area end -->
            <!-- page title area start -->
            <div class="page-title-area">
            <div class="row align-items-center">
                <div class="col-sm-12">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Dashboard</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="<?=base_url(); ?>Dashboard">Home</a></li>
                        <li><span>Training & Courses</span></li>
                    </ul>
                </div>
                </div>
            </div>    
            </div>
            <!-- page title area end -->


            <!-- =================================
            ================================== -->
            <br>
            <div class="main-content-inner">

            <div class="row" style="overflow-x: hidden;">
                
                <form id="insert" name="trainform" action="<?php echo base_url("Dashboard/inserttraining")?>"  method="post">

                <h3 data-toggle="collapse" data-target="#train" class="col-sm-12 user-profile user-name"><i class="fa fa-plus-square"></i>&nbsp;Insert New</h3>
                <div id="train" class="collapse">
                <div id="dynamic_field1">
                <div class="col-md-12 col-sm-12"> <br/>
                <div class="form-group row">
                    <?php $user_id = $this->session->userdata('user_id');?>
                    <div style="border-bottom: 1px solid #ccc; width: 20%; margin: 10px 15px;"> <h4>Training </h4></div>
                    <div class="col-sm-12"> <br/><button type="button" name="add1" id="add1" class="btn btn-success pull-right">ADD</button></div>
                    <div class="col-md-4">
                        <label>Training Title *</label>
                        <input  name="title[]" class="form-control" id="title">
                        <div id="title_error"></div>
                        <input type="hidden" name="user_id[]" class="form-control" 
                        value="<?php echo $user_id;?>">
                    </div>
                    <div class="col-md-4">
                        <label>Instutution</label>
                        <input id="institute"  name="institution[]" class="form-control">
                        <div id="institute_error"></div>
                    </div>
                    <div class="col-md-4">
                        <label>Country & Location</label>
                        <input id="location"  name="location[]" class="form-control">
                        <div id="location_error"></div>
                    </div>
                    <div class="col-md-4"><br/>
                        <label>Topics Covered</label>
                        <input id="topic"  name="topic[]" class="form-control">
                        <div id="topic_error"></div>
                    </div>
                    <div class="col-md-4"><br/>
                        <label>Duration</label>
                        <input id="duration"  name="duration[]" class="form-control">
                        <div id="duration_error"></div>
                    </div>
                    <div class="col-md-4"><br/>
                        <label>Year</label>
                        <input id="year"  name="year[]" class="form-control">
                        <div id="year_error"></div>
                    </div>
                    
                </div>  
                </div>
                </div>
                <div class="col-sm-4"> <button type="submit" id="submit" class="user-name user-profile btn">Save</button></div>
                </div>

                </form>
            </div>

             <div class="row" style="overflow-x: hidden;">

                <br>
                <form action="<?php echo base_url("Dashboard/updattraining")?>"  method="post">

                <h3 class="col-sm-12 user-profile user-name">Update Training & Courses Details</h3>

                <?php if($training->num_rows() > 0)

                  { 
                    
                    foreach($training->result() as $row)
                        { ?>
                    
                            <div class="col-md-12 col-sm-12"> <br/>
                            <div class="form-group row">
                            <div style="border-bottom: 1px solid #ccc; width: 20%; margin: 10px 15px;"><h4><a  href="<?php echo base_url()?>Dashboard/deletetraining/<?php echo $row->id;?>" class="btn btn-xs btn-danger" onclick='return confirm("You want to delete this?");'><i class="fa fa-trash"></i></a> Training</h4></div>
                            <div class="col-md-4">
                            <input type="hidden" name="t_id[]" value="<?php echo $row->id; ?>">
                            <label>Training Title *</label>
                            <input  name="title[]" class="form-control" value='<?php echo $row->title; ?>'>
                            
                            </div>
                            <div class="col-md-4">
                            <label>Instutution</label>
                            <input  name="institution[]" class="form-control" value='<?php echo $row->institution; ?>'>
                            </div>
                            <div class="col-md-4">
                            <label>Country & Location</label>
                            <input  name="location[]" class="form-control" value='<?php echo $row->location; ?>'>
                            </div>
                            <div class="col-md-4"><br/>
                            <label>Topics Covered</label>
                            <input  name="topic[]" class="form-control" value='<?php echo $row->topics; ?>'>
                            </div>
                            <div class="col-md-4"><br/>
                            <label>Duration</label>
                            <input  name="duration[]" class="form-control" value='<?php echo $row->duration; ?>'>
                            </div>
                            <div class="col-md-4"><br/>
                            <label>Year</label>
                            <input  name="year[]" class="form-control" value='<?php echo $row->year; ?>'>
                            </div>
                    
                            </div>  
                            </div>
            
                  <?php } ?>

                <div class="col-sm-12">
                    <button type="submit" id="submit" class="user-name user-profile btn pull-right">Update</button>
                </div>
                  
                  <?php } ?>
             
                </form>
                </div>
             



               
            </div>

            <!-- =================================
            ================================== -->

        </div>
        <!-- main content area end -->

        <!-- footer area start-->
        <footer>
            <?php require ('footer.php'); ?>
        </footer>
        <!-- footer area end-->
    </div>

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


  <script>

$(document).ready(function(){
    var n=1;

    $('#add1').click(function(){
        n++;

        $('#dynamic_field1').append('<div id="row'+n+'" class="col-md-12 col-sm-12"> <br/><div class="form-group row"><div style="border-bottom: 1px solid #ccc; width: 20%; margin: 10px 15px;"> <h4>Training  &nbsp; <button type="button" name="remove" r_id="'+n+'" class="btn btn-danger btn_remove">remove</button></h4></div><div class="col-md-4"><label>Training Title *</label><input  name="title[]" class="form-control"><input type="hidden" name="user_id[]" class="form-control" value="<?php echo $user_id;?>"></div><div class="col-md-4"><label>Instutution</label><input  name="institution[]" class="form-control"></div><div class="col-md-4"><label>Country & Location</label><input  name="location[]" class="form-control"></div><div class="col-md-4"><br/><label>Topics Covered</label><input  name="topic[]" class="form-control"></div><div class="col-md-4"><br/><label>Duration</label><input  name="duration[]" class="form-control"></div><div class="col-md-4"><br/><label>Year</label><input name="year[]" class="form-control"></div><div class="col-sm-12"> </div></div></div>');
    });
    
    $(document).on('click', '.btn_remove', function(){
        var button_id = $(this).attr("r_id"); 
        $('#row'+button_id+'').remove();
        
    });
    
});
</script>


<script>
    $(document).ready(function(){

        $('#insert').submit(function(){

            var title       = $("#title").val();
            var institute   = $("#institute").val();
            var location    = $("#location").val();
            var topic       = $("#topic").val();
            var duration    = $("#duration").val();
            var year        = $("#year").val();

            if(!title)
            {
                $("#title").css("border", "1px solid red");
                $("#title").focus();
                $("#title_error").html("Reqiured").css("color", "red");
                return false;
            }
            else if(!institute)
            {
                $("#institute").css("border", "1px solid red");
                $("#institute").focus();
                $("#institute_error").html("Reqiured").css("color", "red");
                return false;
            }
            else if(!location)
            {
                $("#location").css("border", "1px solid red");
                $("#location").focus();
                $("#location_error").html("Reqiured").css("color", "red");
                return false;
            }
            else if(!topic)
            {
                $("#topic").css("border", "1px solid red");
                $("#topic").focus();
                $("#topic_error").html("Reqiured").css("color", "red");
                return false;
            }
            else if(!duration)
            {
                $("#duration").css("border", "1px solid red");
                $("#duration_error").html("Reqiured").css("color", "red");
                $("#duration").focus();
    
                return false;
            }
            else if(!year)
            {
                $("#year").css("border", "1px solid red");
                $("#year").focus();
                $("#year_error").html("Reqiured").css("color", "red");    
                return false;
            }
            else
            {
                swal('Successful','','success');
                return true;
            }


        });

        $("#title, #institute, #location, #topic, #duration, #year").keyup(function(){

            var title       = $("#title").val();
            var institute   = $("#institute").val();
            var location    = $("#location").val();
            var topic       = $("#topic").val();
            var duration    = $("#duration").val();
            var year        = $("#year").val();
            
            if(title)
            {
                $("#title").css("border", "1px solid black");
                $("#title_error").fadeOut();
            }
            if(institute)
            {
                $("#institute").css("border", "1px solid black");
                $("#institute_error").fadeOut();
            }
            if(location)
            {
                $("#location").css("border", "1px solid black");
                $("#location_error").fadeOut();
            }
            if(topic)
            {
                $("#topic").css("border", "1px solid black");
                $("#topic_error").fadeOut();
            }
            if(duration)
            {
                $("#duration").css("border", "1px solid black");
                $("#duration_error").fadeOut();
            }
            if(year)
            {
                $("#year").css("border", "1px solid black");
                $("#year_error").fadeOut();
            }
        });
    });

</script>

</body>

</html>

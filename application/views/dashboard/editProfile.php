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
        <?php $page = 'pd'; require ('sidebar_menu.php'); ?>
        <!-- sidebar menu area end -->

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
                        <li><span>Edit Profile</span></li>
                    </ul>
                </div>
                </div>
            </div>    
            </div>
            <!-- page title area end -->
<script>
$(document).ready(function(){
    $('#submit').submit(function(){

        var objective   = $("#obj").val();
        var skill1      = $("#s1").val();
        var skill2      = $("#s2").val();

            if (!objective) {
                $("#obj").css("border", "1px solid red");
                $("#obj").focus();
                $("#obj_error").html("Reqiured").css("color", "red");
                return false;
            } else if(!skill1) {
                $("#s1").css("border", "1px solid red");
                $("#s1").focus();
                $("#skill_error").html("Atleast two Skills required").css("color", "red");
                return false;
            } else if(!skill2) {
                $("#s2").css("border", "1px solid red");
                $("#s2").focus();
                $("#skill_error").html("Atleast two Skills required").css("color", "red");
                return false;
            } else {
                return true;
            }
    });
    $("#obj, #s1, #s2").keyup(function() {
        var objective   = $("#obj").val();
        var skill1      = $("#s1").val();
        var skill2      = $("#s2").val();

        if(objective)
        {
            $("#obj").css("border", "1px solid black");
            $("#obj_error").fadeOut();
        }
        if(skill1)
        {
            $("#s1").css("border", "1px solid black");
            $("#skill_error").fadeOut();
        }
        if(skill2)
        {
            $("#s2").css("border", "1px solid black");
            $("#skill_error").fadeOut();
        }
    });
});
</script>


            <!-- =================================
            ================================== -->
            <br>
            <div class="main-content-inner">
            <div class="row" style="overflow-x: hidden;">                
                <form id="submit" action="<?php echo base_url("Dashboard/insertExtra")?>" method="post">
                <h3 data-toggle="collapse" data-target="#extra" class="col-sm-12 user-profile user-name"><i class="fa fa-plus-square"></i> &nbsp;Extra</h3>
                <div id="extra" class="collapse">
                <div class="col-md-12 col-sm-12"> <br/>
                <div class="form-group row">
                    <?php $user_id = $this->session->userdata('user_id')?>
                    <label class="control-label col-md-12">Carrer objective</label>
                    <div class="col-md-12">
                        <textarea name="obj" id="obj" class="form-control"><?php echo $info->objective; ?></textarea>
                        <div id="obj_error"></div>
                    </div>                    
                </div>
                <div class="form-group row">
                    <?php 
                    $skills  = $info->skill;
                    $skill = explode(",", $skills);
                    ?>
                    <label class="control-label col-md-12">Skill</label>
                    <div class="col-md-2"><input name="skill[]" value="<?php if(isset($skill[0])){echo $skill[0]; }?>" id="s1" class="form-control"></div>
                    <div class="col-md-2"><input name="skill[]" value="<?php if(isset($skill[1])){echo $skill[1]; }?>" id="s2" class="form-control"></div>                    
                    <div class="col-md-2"><input name="skill[]" value="<?php if(isset($skill[2])){echo $skill[2]; }?>" class="form-control"></div>
                    <div class="col-md-2"><input name="skill[]" value="<?php if(isset($skill[3])){echo $skill[3]; }?>" class="form-control"></div>
                    <div class="col-md-2"><input name="skill[]" value="<?php if(isset($skill[4])){echo $skill[4]; }?>" class="form-control"></div>
                    <div class="col-md-2"><input name="skill[]" value="<?php if(isset($skill[5])){echo $skill[5]; }?>" class="form-control"></div>
                    <div class="col-md-12" id="skill_error"></div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-12">Interest</label>
                    <?php 
                    $interests  = $info->interest;
                    $interest = explode(",", $interests);
                    ?>
                    <div class="col-md-2"><input name="interest[]" value="<?php if(isset($interest[0])){echo $interest[0]; }?>" class="form-control"></div>
                    <div class="col-md-2"><input name="interest[]" value="<?php if(isset($interest[1])){echo $interest[1]; }?>" class="form-control"></div>
                    <div class="col-md-2"><input name="interest[]" value="<?php if(isset($interest[2])){echo $interest[2]; }?>" class="form-control"></div>
                    <div class="col-md-2"><input name="interest[]" value="<?php if(isset($interest[3])){echo $interest[3]; }?>" class="form-control"></div>
                    <div class="col-md-2"><input name="interest[]" value="<?php if(isset($interest[4])){echo $interest[4]; }?>" class="form-control"></div>
                    <div class="col-md-2"><input name="interest[]" value="<?php if(isset($interest[5])){echo $interest[5]; }?>" class="form-control"></div>
                </div>  
                </div>

                <div class="col-sm-4"> <button type="submit" id="submit" class="btn user-name user-profile">Save</button> </div>

                </div>
                </form>

            </div>
            <br>

            <div class="row" style="overflow-x: hidden;">
                <h3 class="user-profile user-name">Update Personal Details</h3><br/>
                <form enctype="multipart/form-data" action="<?php echo base_url("Dashboard/updatePfrofile")?>"  method="post">
                <div class="col-md-9">
                    <div class="form-group row">
                        <label class="control-label col-sm-2">First Name</label>
                        <div class="col-sm-4"> 
                            <input name="edit_f_name" class="form-control" value="<?php echo $info->f_name; ?> ">
                        </div>
                        <label class="control-label col-sm-2">Last Name</label>
                        <div class="col-sm-4"> 
                            <input name="edit_l_name" class="form-control" value="<?php echo $info->l_name; ?> ">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-2">Father's Name</label>
                        <div class="col-sm-4"> 
                            <input name="edit_father" class="form-control" value="<?php echo $info->father; ?> ">
                        </div>
                        <label class="control-label col-sm-2">Mother's Name</label>
                        <div class="col-sm-4"> 
                            <input name="edit_mother" class="form-control" value="<?php echo $info->mother; ?> ">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-2">Date Of Birth</label>
                        <div class="col-sm-4"> 
                            <input  type="date" name="dob" class="form-control" value="<?php echo $info->date_of_birth; ?>">
                        </div>
                        <label class="control-label col-sm-2">Gender</label>
                        <div class="col-sm-4">
                            <input type="radio" <?php if($info->gender=='Male'){echo 'checked';} ?> name="gender"  value="Male"> Male &nbsp;
                            <input type="radio" <?php if($info->gender=='Female'){echo 'checked';} ?>  name="gender" value="Female"> Female
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-2">Email</label>
                        <div class="col-sm-4"> 
                            <input type="email" name="edit_email" class="form-control" value="<?php echo $info->email; ?>">
                         </div>
                        <label class="control-label col-sm-2">Contact</label>
                        <div class="col-sm-4">
                            <input name="edit_mobile" class="form-control" value="<?php echo $info->mobile; ?>">
                         </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-2">Present Address</label>
                        <div class="col-sm-10">                  
                             <textarea  name="edit_pre_address" class="form-control"> <?php echo $info->pre_address; ?> </textarea>
                         </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-2">Permanent Address</label>
                        <div class="col-sm-10"> 
                            <textarea  name="edit_per_address" class="form-control"> <?php echo $info->per_address; ?> </textarea>
                         </div>
                    </div>
                </div>
            
                <div class="col-md-3">
                    <img class="img-thumbnail img-responsive img-circle db-pf" src="<?php echo base_url(); ?>asset/img/<?php echo $info->photo; ?>">
                    <input type="file" name="pic">
                </div>

                <div class="col-sm-12"> <button type="submit" id="submit" class="user-profile user-name btn pull-left">Update</button> </div>

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


</body>

</html>

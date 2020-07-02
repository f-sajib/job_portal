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
        <?php $page = 'eh'; require ('sidebar_menu.php'); ?>
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
                        <li><span>Edit Employee History</span></li>
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
                
                <form name="historyform" onsubmit="return validation()" action="<?php echo base_url("Dashboard/insertemphistory")?>"  method="post">

                <h3 data-toggle="collapse" data-target="#emp" class="col-sm-12 user-profile user-name"><i class="fa fa-plus-square"></i> &nbsp; Insert New</h3>
                <div id="emp" class="collapse">
                <div id="dynamic_field">
                <div class="col-md-12 col-sm-12"> <br/>
                <div class="form-group row">
                    <div style="border-bottom: 1px solid #ccc; width: 20%; margin: 10px 15px;"> <h4>Company </h4></div>
                    <?php $user_id = $this->session->userdata('user_id')?>
                    <div class="col-sm-12"> <br/><button type="button" name="add" id="add" class="btn btn-success pull-right">ADD</button></div>
                    <div class="col-md-4">
                        <label>Company Name</label>
                        <div id="company_div">
                        <input  name="company[]" class="form-control">
                        <input type="hidden" name="user_id[]" value="<?php echo $user_id;?>">
                        <div id="company_error"></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label>Designation</label>
                        <div id="designation_div">
                        <input  name="designation[]" class="form-control">
                        <div id="designation_error"></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label>Department</label>
                        <div id="department_div">
                        <input  name="department[]" class="form-control">
                        <div id="department_error"></div>
                        </div>
                    </div>
                    <div class="col-md-6"><br/>
                        <label>Responsibilities</label>\
                        <div id="responsibilites_div">
                        <input name="responsibilites[]" class="form-control">
                        <div id="responsibilites_error"></div>
                        </div>
                    </div>
                    <div class="col-md-3"><br/>
                        <label>Employment Period --> From</label>
                        <input type="date" name="d_from[]" class="form-control">
                    </div>
                    <div class="col-md-3"><br/>
                        <label>To</label>
                        <input type="date" name="d_to[]" class="form-control">
                    </div>
                    
                </div>  
                </div>
                </div>

                <div class="col-sm-4"> <button type="submit" id="submit" class="btn user-name user-profile">Save</button> </div>

                </div>
                </form>

            </div>

        <div class="row" style="overflow-x: hidden;">

            <br>
            <form action="<?php echo base_url("Dashboard/updateemphistory")?>"  method="post">

            <h3 class="col-sm-12 user-profile user-name">Update Employee History</h3>

            <?php if($history->num_rows() > 0)

              { 
                
                foreach($history->result() as $row)
                    { ?>
                
                        <div class="col-md-12 col-sm-12"> <br/>
                        <div class="form-group row">
                        <div style="border-bottom: 1px solid #ccc; width: 20%; margin: 10px 15px;"><h4><a href="<?php echo base_url()?>Dashboard/deleteemphistory/<?php echo $row->id;?>" name="delete" onclick='return confirm("You want to delete this?");' class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a> Company</h4></div>
                        

                        <div class="col-md-4">
                        <input type="hidden" name="e_id[]" value="<?php echo $row->id;?>">
                        <label>Company Name</label>
                        <input  name="company[]" class="form-control" value="<?php echo $row->company?>">
                        </div>

                        <div class="col-md-4">
                        <label>Designation</label>
                        <input  name="designation[]" class="form-control" value="<?php echo $row->designation?>">
                        </div>

                        <div class="col-md-4">
                        <label>Department</label>
                        <input  name="department[]" class="form-control" value="<?php echo $row->department?>">
                        </div>

                        <div class="col-md-6"><br/>
                        <label>Responsibilities</label>
                        <input name="responsibilites[]" class="form-control" value="<?php echo $row->responsibilites?>">
                        </div>

                        <div class="col-md-3"><br/>
                        <label>Employment Period --> From</label>
                        <input type="date" name="d_from[]" class="form-control" value="<?php echo $row->d_from?>">
                        </div>

                        <div class="col-md-3"><br/>
                        <label>To</label>
                        <input type="date" name="d_to[]" class="form-control" value="<?php echo $row->d_to?>">
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

    $('#add').click(function(){
        n++;

        $('#dynamic_field').append('<div id="row'+n+'" class="col-md-12 col-sm-12"> <br/><div class="form-group row"><div style="border-bottom: 1px solid #ccc; width: 20%; margin: 10px 15px;"> <h4>Company &nbsp; <button type="button" name="remove" id="'+n+'" class="btn btn-danger btn_remove">remove</button> </h4></div><div class="col-md-4"><label>Company Name</label><input  name="company[]" class="form-control"><input type="hidden" name="user_id[]" value="<?php echo $user_id;?>"></div><div class="col-md-4"><label>Designation</label><input  name="designation[]" class="form-control"></div><div class="col-md-4"><label>Department</label><input  name="department[]" class="form-control"></div><div class="col-md-6"><br/><label>Responsibilities</label><input name="responsibilites[]" class="form-control"></div><div class="col-md-3"><br/><label>Employment Period --> From</label><input type="date" name="d_from[]" class="form-control"></div><div class="col-md-3"><br/><label>To</label><input type="date" name="d_to[]" class="form-control"></div></div></div>');
    });
    
    $(document).on('click', '.btn_remove', function(){
        var button_id = $(this).attr("id"); 
        $('#row'+button_id+'').remove();
       
    });
    
});
</script>

<script src="<?= base_url(); ?>asset/js/valid_history.js"></script>


</body>

</html>

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
        <?php $page = 'ed'; require ('sidebar_menu.php'); ?>
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
                <li><span>Education Details</span></li>
            </ul>
        </div>
        </div>
    </div>    
    </div>
    <!-- page title area end -->



    <br>
    <div class="main-content-inner">

    <div class="row" style="overflow-x: hidden;">
    <form onsubmit="return validation()" name="eduform" action="<?php echo base_url("Dashboard/insertedu")?>"  method="post">
        
        <h3 data-toggle="collapse" data-target="#edu" class="col-sm-12 user-profile user-name"><i class="fa fa-plus-square"></i>&nbsp;Insert New</h3>
        <div id="edu" class="collapse">
        <div class="col-md-12 col-sm-12">
        <br>
        <table class="table table-bordered" id="dynamic_field" >
            <?php $user_id = $this->session->userdata('user_id');?>
            <tr class="dashboard_edu">
            <td width="10%">
            <div id="degree_div">
            <input name="degree[]" class="form-control" placeholder="Degree">
            <div id="degree_error"></div>
            </div>
            <input type="hidden" name="user_id[]" class="form-control" value="<?php echo $user_id; ?>">
            </td>
            <td width="10%">
            <div id="year_div">
            <input name="year[]" class="form-control" placeholder="Year">
            <div id="year_error"></div>
            </div>
            </td>
            <td width="30%">
            <div id="board_div">
            <input name="board[]" class="form-control" placeholder="Board/City">
            <div id="board_error"></div>
            </div>
            </td>
            <td width="40%">
            <div id="institute_div">
            <input name="institute[]" class="form-control" placeholder="Institution">
            <div id="institute_error"></div>
            </div>
            </td>
            <td width="10%">
            <div id="result_div">
            <input name="result[]" class="form-control" placeholder="Result">
            <div id="result_error"></div>
            </div>
            </td>
            <td><button type="button" name="add" id="add" class="btn btn-success">ADD</button></td>
            </tr> 
        </table> 
        </div>
        <div class="col-sm-4"> <button type="submit" class="user-name user-profile btn">Save</button> </div>
       </div>
    
    </form>
    </div>

    <div class="row">
    <form  action="<?php echo base_url("Dashboard/updateedu")?>"  method="post">
    
        <br>
        <h3 class="col-sm-12 user-profile user-name">Update Education Details</h3>
        <div class="col-md-12 col-sm-12">
        <br>
        <table class="table table-striped" border="2">
            <tr class="dashboard_edu">
                <th width="20%" style="text-align: center;">Degree</th>
                <th width="10%">Passing Year</th>
                <th width="25%">Board/City</th>
                <th width="35%">Institute</th>
                <th width="10%">Result</th>
                <th>Action</th>
            </tr>
            
     <?php if($edu->num_rows() > 0) { 
        
        foreach($edu->result() as $row) { ?>
            <tr>
            <td>
            <input name="degree[]" class="form-control" value='<?php echo $row->degree; ?>'>
            <input type="hidden" name="p_id[]" class="form-control" value="<?php echo $row->id; ?>">
            <input type="hidden" name="user_id[]" class="form-control" value="<?php echo $user_id; ?>">
            </td>
            <td>
            <input name="year[]" class="form-control" value='<?php echo $row->year; ?>'>
            </td>
            <td>
            <input name="board[]" class="form-control" value='<?php echo $row->board; ?>'>
            </td>
            <td>
            <input name="institute[]" class="form-control" value='<?php echo $row->institute; ?>'>
            </td>
            <td>
            <input name="result[]" class="form-control" value='<?php echo $row->result; ?>'>
            </td>
             <td>
            <a href="<?php echo base_url()?>Dashboard/deleteedu/<?php echo $row->id; ?>" name="delete" onclick='return confirm("You want to delete this?");' class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
            </td>
            </tr>
            <?php } ?>

        <tr style="background: none; border: none;"> <td colspan="6">
            <?php {echo '<button type="submit" class="btn user-profile user-name pull-right"}">Update</button>';} } ?></td> 
        </tr>

        </table>

        </div>

    </div>
       
    </div>    <!-- class main-content-inner -->

</div>  <!-- main content area end -->

        <footer>
            <?php require ('footer.php'); ?>
        </footer>
    </div> <!-- class page-container end -->

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
    var i=1;
    $('#add').click(function(){
        i++;
        $('#dynamic_field').append('<tr id="row'+i+'"><td width="10%"><div id="degree_div"><input name="degree[]" class="form-control" placeholder="Degree"><div id="degree_error"></div></div><input type="hidden" name="user_id[]" class="form-control" value="<?php echo $user_id; ?>"></td><td width="10%"><div id="year_div"><input name="year[]" class="form-control" placeholder="Year"><div id="year_error"></div></div></td><td width="30%"><div id="board_div"><input name="board[]" class="form-control" placeholder="Board/City"><div id="board_error"></div></div></td><td width="40%"><div id="institute_div"><input name="institute[]" class="form-control" placeholder="Institution"><div id="institute_error"></div></div></td><td width="10%"><div id="result_div"><input name="result[]" class="form-control" placeholder="Result"><div id="result_error"></div></div></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
    });
    
    $(document).on('click', '.btn_remove', function(){
        var button_id = $(this).attr("id"); 
        $('#row'+button_id+'').remove();
    });
    
});

</script>

<script src="<?= base_url(); ?>asset/js/valid_edu.js"></script>



</body>

</html>

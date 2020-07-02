<?php require ('head.php'); ?>

<!-- page container area start -->
<div class="page-container">
    <!-- sidebar menu area start -->
    <?php $page = 'dashboard'; require ('sidebar_menu.php'); ?>
    <!-- main content area start -->
    <div class="main-content">
        <!-- header area  -->
        <head>
        <?php require ('header.php'); ?> <br/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        </head>

        <!-- page title area start -->
        <div class="page-title-area">
            <div class="row">
            <div class="col-sm-12 ">
                <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Dashboard</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="<?=base_url(); ?>Dashboard">Home</a></li>
                    <li><span>Dashboard</span></li>
                </ul>
                </div>
            </div>
            </div>
        </div> <!-- page title area end --> <br/>

<script type="text/javascript">
    function delete_job(id)
    {
        swal({

            title : 'Delete this job post?',
            text : '',
            type : 'question',
            showLoaderOnConfirm : true,
            showCancelButton : true,
            confirmButtonText : 'Delete',
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            preConfirm:
            function()
            {                
                $.ajax({
                    data : {id:id},
                    method : 'post',
                    url : '<?php echo base_url('Empdashboard/deleteJob');?>',
                    success : function(data) {

                        if(data==1){
                            swal('Deleted','','success');
                        }
                        window.location.replace("<?php echo base_url('Empdashboard');?>");
                    },
                    error :function(){
                        swal('Something went wrong','','warning');
                    }
                }); 
            }
        });
    }
    function post_job(id)
    {
        
        swal({

            title : 'post this job?',
            text : '',
            type : 'question',
            showLoaderOnConfirm : true,
            showCancelButton : true,
            confirmButtonText : 'Yes',
            preConfirm:
            function()
            {                
                $.ajax({
                    data : {id:id},
                    method : 'post',
                    url : '<?php echo base_url('Empdashboard/postJob');?>',
                    success : function(data) {

                        if(data==1){
                            swal('posted','','success');
                        }
                        window.location.replace("<?php echo base_url('Empdashboard');?>");
                    },
                    error :function(){
                        swal('Something went wrong','','warning');
                    }
                }); 
            }
        });
    }
    function view_job(id)
    {
        $.ajax({
                    data : {id:id},
                    method : 'post',
                    url : '<?php echo base_url('Empdashboard/viewJob');?>',
                    success : function(data) {

                        $("#test").html(data);
                    },
                    error :function(){
                        swal('Something went wrong','','warning');
                    }
                });

    }
</script>


<script>
$(document).ready(function(){
    $.ajax({
        method : 'get',
        url : '<?php echo base_url('Empdashboard/draftJob');?>',

        success : function(data) {
            $(".draftJob").html(data);
        },
        error :function(){
            swal('Error','','error')
        }
    });
    $.ajax({
        method : 'get',
        url : '<?php echo base_url('Empdashboard/postedJob');?>',

        success : function(data) {
            $(".postedJob").html(data);
        },
        error :function(){
            swal('Error','','error')
        }
    });
     $.ajax({
        method : 'get',
        url : '<?php echo base_url('Empdashboard/archivejob');?>',

        success : function(data) {
            $(".archivejob").html(data);
        },
        error :function(){
            swal('Error','','error')
        }
    });      
});  
</script>

        <div class="main-content-inner">
            <div class="row">
                <div class="col-md-4">
                    <img class="img-responsive img-thumbnail" style="height: 250px; width: 250px; border-radius: 150px;" src="<?=base_url(); ?>asset/img/<?php echo $info->logo;?>">
                </div>

                <div class="col-md-8">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="active"><a data-toggle="tab" href="#postedJob" id="postedJob_tab">Posted Jobs
                            (<?php $emp_id = $this->session->userdata('emp_id');
                                $results = $this->Model_employee->postedJob($emp_id);                              
                                echo count($this->Model_employee->postedJob($emp_id));?>)

                        </a></li>
                        <li class=""><a data-toggle="tab" href="#draftedJob" id="draftedJob_tab">Drafted Jobs
                            (<?php $emp_id = $this->session->userdata('emp_id');
                                $result = $this->Model_employee->draftJob($emp_id);
                                echo count($result);?>)
                        </a></li>
                        <li ><a data-toggle="tab" href="#archivedJob" id="archivedJob_tab">Archived Jobs(<?php $emp_id = $this->session->userdata('emp_id');
                                $result = $this->Model_employee->archivejob($emp_id);
                                echo count($result);?>)</a></li>
                    </ul> <br/>
                    <div class="tab-content">
                        <div id="postedJob" class="tab-pane  active postedJob">


                        </div>
                        <div id="draftedJob" class="tab-pane fade in draftJob">
                            
                        </div>

                        <div id="archivedJob" class="tab-pane fade in archivejob">

                        </div>
                    </div>
                </div>
            </div> <br/>
            <div class="row">
                <fieldset>
                    <legend class="col-sm-12"> <b>Company Details:</b></legend>
                    <div class="col-sm-12">
                        <div> <i class="fa fa-quote-left"></i></div>
                    </div>
                    <div class="col-md-offset-1 col-md-5">
                        <div><b>Name:</b> &nbsp;<?php echo $info->c_name; ?> </div><hr/>
                        <div><b>Email:</b> &nbsp;<?php echo $info->c_email; ?> </div><hr/>
                        <div><b>Contact:</b> &nbsp;<?php echo $info->c_mobile.(',&nbsp;').$info->c_phone; ?></div>
                    </div>
                    <div class="col-md-5">
                        <div><b>Address:<b/> &nbsp;<?php echo $info->c_address; ?> </div><hr/>
                        <div>License No:<b/> &nbsp;<?php echo  $info->c_trade_license; ?> </div><hr/>
                        <div>Company:<b/> &nbsp;<?php echo  $info->c_company; ?></div>
                    </div>
                    <div class="col-sm-12">
                        <div><i class=" pull-right fa fa-quote-right"></i> </div>
                    </div>
                </fieldset>
                <!-- Trigger the modal with a button -->

  
 

  

            </div>
        </div>  <!-- main content inner end -->

    </div>  <!-- main content end -->

    <?php require ('footer.php'); ?>
</div>  <!-- page container end -->

<!-- The Modal -->
  <div style="background-color:rgba(106,234,106,.5);" class="modal" id="myModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Job Information</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <div id="test"></div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>


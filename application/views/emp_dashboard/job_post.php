<?php require ('head.php'); ?>

<!-- page container area start -->
<div class="page-container">
    <!-- sidebar menu area start -->
    <?php $page = 'job'; require ('sidebar_menu.php'); ?>
    <!-- main content area start -->
<div class="main-content">
        <!-- header area  -->
        <?php require ('header.php'); ?> <br/>
<style type="text/css">

    hr {
  border: 0; 
  margin-top: 10px;
  clear:both;
  border-radius: 25px; 
  display:block;
  max-width: 100%;               
  background-color:#5fea31;
  height: 20px;
}
</style>

        <!-- page title area start -->
       <div class="page-title-area">
            <div class="row align-items-center">
                <div class="col-sm-12 ">
                    <div class="breadcrumbs-area clearfix">
                        <h4 class="page-title pull-left">Dashboard</h4>
                        <ul class="breadcrumbs pull-left">
                            <li><a href="<?=base_url(); ?>Empdashboard">Home</a></li>
                            <li><span>Post Your New Job</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div> <!-- page title area end --> <br/>

<div class="main-content-inner">
    
        <div class="row">
            <div id="mark" style="border-radius: 50%; background:#5fea31; height:40px; width:40px; font-size: 30px; position:absolute; text-align: center;">
                <i class="fa fa-arrow-right" aria-hidden="true"></i>
            </div>  <hr/>

<script> 
$(document).ready(function()
{
    
    $("#confirm").hide();
    $("#next").prop("disabled", true);
    $("#r1").prop("disabled", true);
    $("#r2").prop("disabled", true);
    $("#r3").prop("disabled", true);
    $("#r4").prop("disabled", true);
    $("#data2").hide();
    $("#data3").hide();
    $("#data4").hide();
    $("#warning").html('(All required*  field need to be filled)');    
    $("#title , #location , #status , #category ,#sub_category, #vacancy, #context, #division").keyup(function()
    {
       
        var a = $('#title').val();
        var b = $('#location').val();
        var c = $('#status').val();
        var d = $('#category').val();
        var e = $('#sub_category').val();
        var f = $('#vacancy').val();
        var g = $('#context').val();
        var h = $('#division').val();
        if(a!='' && b!='' && c!=='' && d!=='' && e!=='' && f!=='' && g!=='' && h!=='') {
            $("#next").prop("disabled", false);
            $("#warning").hide();
        } else {
            $("#next").prop("disabled", true);
            $("#warning").show();
        }        
    });
    $("#responsibilities, #skill, #requirment, #benifit").keyup(function(){
        var a = $('#responsibilities').val();
        var b = $('#skill').val();
        var c = $('#requirment').val();
        var d = $('#benifit').val();
        if(a!='') {
            $("#r1").prop("disabled", false);
        } else {
            $("#r1").prop("disabled", true);
        }
        if(b!='') {
            $("#r3").prop("disabled", false);
        } else {
            $("#r3").prop("disabled", true);
        }
        if(c!='') {
            $("#r2").prop("disabled", false);
        } else {
            $("#r2").prop("disabled", true);
        }
         if(d!='') {
            $("#r4").prop("disabled", false);
        } else {
            $("#r4").prop("disabled", true);
        }
    });
    var i = 0;
    $("#next").click(function()
    {
        $("#mark").animate({left: '+=25%'});
        i++;
        $("#mark").html(i+1);
        if(i==1) {
            $("#education").keyup(function() {
                var a = $('#education').val();
                if(a!='') {
                    $("#next").prop("disabled", false);
                    $("#warning").hide();
                } else {
                    $("#next").prop("disabled", true);
                    $("#warning").show();
                }   
            }) 
            $("#next").prop("disabled", true);
            $("#warning").show();
            $("#data1").hide();
            $("#data2").show();
        }
        if(i==2) {
        	 $("#experience").keyup(function() {
                var a = $('#experience').val();
                if(a!='') {
                    $("#next").prop("disabled", false);
                    $("#warning").hide();
                } else {
                    $("#next").prop("disabled", true);
                    $("#warning").show();
                }   
            })
            $("#next").prop("disabled", true);
            $("#warning").show(); 
            $("#data2").hide();
            $("#data3").show();
        }
        if(i==3) {
            $("#experience").keyup(function() {
                var a = $('#experience').val();
                if(a!='') {
                    $("#next").prop("disabled", false);
                    $("#warning").hide();
                } else {
                    $("#next").prop("disabled", true);
                    $("#warning").show();
                }   
            })
            $("#salary").keyup(function() {
                var a = $('#salary').val();
                if(a!='') {
                    $("#confirm").prop("disabled", false);
                    $("#warning").hide();
                } else {
                    $("#confirm").prop("disabled", true);
                    $("#warning").show();
                }   
            })
            $("#confirm").show();
            $("#confirm").prop("disabled", true);
            $("#next").hide();
            $("#warning").show(); 
            $("#data3").hide();
            $("#data4").show();
        }
    });

    $("#confirm").click(function()
    {
        var a = $('#title').val();
        var b = $('#location').val();
        var c = $('#status').val();
        var d = $('#category').val();
        var e = $('#sub_category').val();
        var f = $('#deadline').val();
        var g = $('#vacancy').val();
        var h = $('#context').val();
        var i = $('#education').val();
        var j = $('#result').val();
        var k = $('#description').val();
        var l = $('#experience').val();
        var m = $('#salary').val();
        var n = $('#division').val();

        var table_data =[];
        $('#field_1 tr').each(function(row,tr)
        {
            if($(tr).find('td:eq(0)').text()=="") {

            } else {
                var sub = $(tr).find('td:eq(0)').text();
                table_data.push(sub);
            }       
        });
        var table_data2 =[];
        $('#field_2 tr').each(function(row,tr)
        {
            if($(tr).find('td:eq(0)').text()=="") {

            } else {
                var sub2 = $(tr).find('td:eq(0)').text();
                table_data2.push(sub2);
            }       
        });
        var table_data3 =[];
        $('#field_3 tr').each(function(row,tr)
        {
            if($(tr).find('td:eq(0)').text()=="") {

            } else {
                var sub3 = $(tr).find('td:eq(0)').text();
                table_data3.push(sub3);
            }       
        });
        var table_data4 =[];
        $('#field_4 tr').each(function(row,tr)
        {
            if($(tr).find('td:eq(0)').text()=="") {

            } else {
                var sub4 = $(tr).find('td:eq(0)').text();
                table_data4.push(sub4);
            }       
        });         
        
        swal({

            title : 'Are you sure?',
            text : '',
            type : 'question',
            showLoaderOnConfirm : true,
            showCancelButton : true,
            confirmButtonText : 'Yes',
            preConfirm:
            function()
            {                
                 var val = {'field_1':table_data,'field_2':table_data2,'field_3':table_data3,'field_4':table_data4,title:a,location:b,status:c,category:d,sub_category:e,deadline:f,vacancy:g,context:h,education:i,result:j,description:k,experience:l,salary:m,division:n};
                $.ajax({
                    data : val,
                    type : 'POST',
                    url : '<?php echo base_url('Empdashboard/job_insert');?>',
                    dataType : 'Json',

                    success : function(result)
                    {
                        if(result.status == "success")
                        {
                            swal('Successfull','','success');
                            window.location.replace("<?php echo base_url('Empdashboard');?>");
                        }
                        else
                        {
                            swal('Not Saved','','warning');
                        }
                    }
                });
            }
        });
    });    
});
</script> 
        </div>
<script>
$(document).ready(function(){
  var i=1;
  $("#r1").click(function(){
  	i++;
    var responsibilities = $('#responsibilities').val();
    $('#field_1 tbody:last-child').append(

			'<tr id="row'+i+'">'+
				'<td>'+responsibilities+'</td>'+
				'<td><button type="button" id="'+i+'" class="btn btn-danger btn-xs btn_remove">remove</button></td>'+
			'</tr>'
	);

    $('#responsibilities').val('');
  });
  $(document).on('click', '.btn_remove', function(){
        var button_id = $(this).attr("id"); 
        $('#row'+button_id+'').remove();
    });
});
</script>

<script>
$(document).ready(function(){
  var i=1;
  $("#r2").click(function(){
    i++;
     var requirment = $('#requirment').val();
    $('#field_2 tbody:last-child').append(

			'<tr id="row1'+i+'">'+
				'<td>'+requirment+'</td>'+
				'<td><button type="button" id="'+i+'" class="btn btn-danger btn-xs btn_remove1">remove</button></td>'+
			'</tr>'
	);
	$('#requirment').val('');
    
  });
  $(document).on('click', '.btn_remove1', function(){
        var button_id = $(this).attr("id"); 
        $('#row1'+button_id+'').remove();
    });
});
</script>

<script>
$(document).ready(function(){
  var i=1;
  $("#r3").click(function(){
    i++;
     var skill = $('#skill').val();
    $('#field_3 tbody:last-child').append(

            '<tr id="row2'+i+'">'+
                '<td>'+skill+'</td>'+
                '<td><button type="button" id="'+i+'" class="btn btn-danger btn-xs btn_remove2">remove</button></td>'+
            '</tr>'
    );
    $('#skill').val('');
    
  });
  $(document).on('click', '.btn_remove2', function(){
        var button_id = $(this).attr("id"); 
        $('#row2'+button_id+'').remove();
    });
});
</script>

<script>
$(document).ready(function(){
  var i=1;
  $("#r4").click(function(){
    i++;
     var benifit = $('#benifit').val();
    $('#field_4 tbody:last-child').append(

            '<tr id="row3'+i+'">'+
                '<td class="col-md-7">'+benifit+'</td>'+
                '<td class="col-md-1"><button type="button" id="'+i+'" class="btn btn-danger btn-xs btn_remove3">remove</button></td>'+
            '</tr>'+
            '<br>'
    );
    $('#benifit').val('');
    
  });
  $(document).on('click', '.btn_remove3', function(){
        var button_id = $(this).attr("id"); 
        $('#row3'+button_id+'').remove();
    });
});
</script>


        <!-- Job post panel 01  -->
        <div id="data1">
        <h3 >General Information</h3> <br/>
        <form id="data" class="form-horizontal">            
                <?php $emp_id = $this->session->userdata('emp_id');?>
                <input type="hidden" id="emp_id" value="<?php echo $emp_id;?>">
                 <div class="row form-group">
                    <label class="col-md-2 control-label"><b>Job Category*</b></label>
                    <div class="col-md-3">
                        <select class="form-control" id="category" onchange="categorys()">
                            <option value="">-- Select Main Categories --</option>
                            <?php foreach($categorys as $row):?>
                                <option style="cursor: pointer;" value="<?php echo $row->id;?>"><?php echo $row->category;?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="col-md-3" id="sub_cat">
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-md-2 control-label"><b>Deadline</b>*</label>
                    <div class="col-md-3">
                        <input id="deadline" type="date" class="form-control">
                    </div>

                    <label class="col-md-2 control-label"><b>Employment Status*</b></label>
                    <div class="col-md-3">
                    <select class="form-control" id="status">
                        <option value="">-- Select Status --</option>
                        <option value="Full Time">Full Time</option>
                        <option value="Part Time">Part Time</option>
                        <option value="Contractual">Contractual</option>
                        <option value="Internship">Internship</option>
                    </select>
                    </div>
                </div>


                <div class="row form-group">
                    <label class="col-md-2 control-label"><b>Job Title</b>*</label>
                    <div class="col-md-3">
                        <input id="title" type="text" class="form-control" placeholder="Write job title">
                    </div>

                    <label class="col-md-2 control-label"><b>Division*</b></label>
                    <div class="col-md-3">
                    <select class="form-control" id="division">
                        <option value="">-- Select Status --</option>
                        <option value="Dhaka">Dhaka</option>
                        <option value="Chittagong">Chittagong</option>
                        <option value="Rajshahi">Rajshahi</option>
                        <option value="Khulna">Khulna</option>
                        <option value="Barisal">Barisal</option>
                        <option value="Sylhet">Sylhet</option>
                    </select>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-md-2 control-label"><b>Job Location</b>*</label>
                    <div class="col-md-3">
                        <input id="location" type="text" class="form-control" placeholder="Write Location/Office address">
                    </div>

                    <label class="col-md-2 control-label"><b>Vacancies*</b> </label>
                    <div class="col-md-2">
                        <input id="vacancy" class="form-control" placeholder="NO. of vacancies">
                    </div>
                    <div class="col-md-1 checkbox">
                        <input type="checkbox" class="form-check-input" onchange="doalert(this)"/>N/A
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-2 control-label"><b>Job Context*</b></label>
                    <div class="col-md-8">
                        <textarea id="context" class="form-control" placeholder="write job context"></textarea>
                    </div>
                </div>
            </div>
            <!-- Job post panel 02  -->
            <div id="data2">
            <h3>Educational Requirement</h3> <br/>
                <div class="row form-group">
                    <label class="col-md-3 control-label"><b>Minimum Education Level*</b></label>
                    <div class="col-md-7">
                        <input id="education" type="text" class="form-control" placeholder="Example: Minimum B.Sc/H.S.C./.....">
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-md-3 control-label"><b>Result Requirement</b></label>
                    <div class="col-md-7">
                        <input id="result" type="text" class="form-control" placeholder="3.00/3.25/.....">
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 control-label"><b>Add Description</b></label>
                    <div class="col-md-7">
                        <textarea id="description" class="form-control" placeholder="write description (if amy)"></textarea>
                    </div>
                </div>
                <div class="row" style="height: 100px;"> </div>
            </div>

        <!-- Job post panel 03  -->
            <div id="data3">
            <h3>Job Requirement & Responsibilities</h3> <br/>        
                <div class="row form-group">
                    <div class="col-md-2">job Responsibilities*</div>
                    <div class="col-md-10" >
                        <table class="table" id="field_1">
                        	<tbody>
	                            <tr>
	                                <td><input id="responsibilities" class="form-control" placeholder="Add responsibilities here"></td>
	                                <td><button type="button" id="r1" class="btn btn-xs btn-success">Add to list</button></td>
	                            </tr>
                        	</tbody>
                        </table>                        
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-2">Skill Requirment*</div>
                    <div class="col-md-10">
                        <table class="table" id="field_3">
                            <tbody>
                                <tr>
                                    <td><input id="skill" class="form-control" placeholder="Add required skill here"></td>
                                    <td><button type="button" id="r3" class="btn btn-xs btn-success">Add to list</button></td>
                                </tr>
                            </tbody>
                        </table>                        
                    </div>
                </div> <br/>
                <div class="row form-group">
                    <div class="col-md-2">Additional Requirment*</div>
                    <div class="col-md-10">
                        <table class="table" id="field_2">
                        	<tbody>
	                            <tr>
	                                <td><input id="requirment" class="form-control" placeholder="Add requirement here"></td>
	                                <td><button type="button" id="r2" class="btn btn-xs btn-success">Add to list</button></td>
	                            </tr>
                            </tbody>
                        </table>                        
                    </div>
                </div> <br/>
                <div class="row form-group">
                    <label class="col-md-2"><b>Experience*</b></label>
                    <div class="col-md-8">
                        <input id="experience" class="form-control" placeholder="(if needed)"/>
                    </div>                
                </div>
            </div>
        <!-- Job post panel 04  -->
            <div id="data4">
            <h3>Additonal Informations</h3> <br/>
                <div class="row form-group">
                    <label class="col-md-3 control-label">Benifits & Compensation*</label>
                    <table class="col-md-8" id="field_4">
                        <tbody class="row">
                            <tr>
                                <td class="col-md-7"><input id="benifit" class="form-control"></td>
                                <td class="col-md-1"><button type="button" id="r4" class="btn btn-success btn-xs">Add to list</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div> 
                <div class="row form-group">
                    <label class="col-md-3"><b>Salary Range*</b></label>
                    <div class="col-md-7">
                        <input id="salary" class="form-control" placeholder="Ex: 10000-15000"/>
                    </div>                
                </div>
            </div>            
        </form>
        <br>

        
        <button id="next" class="btn btn-info pull-right">Next</button>
        <button id="confirm" class="btn btn-success pull-right">confirm</button>
        <div id="warning"></div>
         

 
</div>  <!-- main content inner end -->

</div>  <!-- main content end -->

<!-- footer area start-->
<?php require ('footer.php'); ?>

</div>  <!-- page container end -->

<script>
 function categorys() {
  var id = $("#category").val();
   
   $.ajax({
            data : {id:id},
            method : 'post',
            url : '<?php echo base_url('Empdashboard/job_subcategory');?>',
            success : function(data) {

                $("#sub_cat").html(data);
            },
            error :function(){
                swal('Something went wrong','','warning');
            }
        });
}
</script>
<script>
function doalert(checkboxElem)
{
  if (checkboxElem.checked) 
  {
    $("#vacancy").prop("disabled", true);
    $("#vacancy").val("N/a");
  } 
  else 
  {
   $("#vacancy").prop("disabled", false);
   $("#vacancy").val("");
  }
}
</script>


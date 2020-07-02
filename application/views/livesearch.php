<!DOCTYPE html>  
<html>  
<head>
<?php include ('head.php'); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css"/>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<style>
.mt-8{margin-top: 10px;}
.container1 {
  height: 550px;
}
.box{
  cursor: pointer;
  width: 100%;
  transition: all 3s;
  background-color: #b2f5a2;
  border-radius: 50px;
  height: 200px; 
}
.box:hover{
  height: 14%; 
}
</style>
</head>
 
<body>

       
<?php $page= 'job_s'; include ('header.php'); ?>
       
<div class="container1">
<br>
<div class="row">
  <div class="col-sm-3">
    <div class="box" id="search-box" style="border:1px solid #d3dbd5; padding: 10px; border-radius: 25px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
        <div class="col-sm-12">
          <div class="form-group">
            <select name="job_type" id="job_type" class="form-control" style="border: 2px solid #b2f5a2; padding: 5px;" required>
              <option value="">Select Job Type</option>
              <option value="Full Time">Full Time</option>
              <option value="Part Time">Part Time</option>
              <option value="Contractual">Contractual</option>
              <option value="Internship">Internship</option>       
            </select>
          </div>
        </div>
        <div class="col-sm-12">
          <div class="form-group">
            <select name="division" id="division" class="form-control" style="border: 2px solid #b2f5a2; padding: 5px;" required>
              <option value="">Select Division</option>
              <option value="Dhaka">Dhaka</option>
              <option value="Chittagong">Chittagong</option>
              <option value="Rajshahi">Rajshahi</option>
              <option value="Khulna">Khulna</option>
              <option value="Barisal">Barisal</option>
              <option value="Sylhet">Sylhet</option> 
            </select>
          </div>
        </div>
        <div class="col-sm-12">
        <div class="form-group">
            <select name="salary" id="salary" class="form-control" style="border: 2px solid #b2f5a2; padding: 5px;" required>
              <option value="">Salary Range</option>
              <option value="1">10000-20000</option>
              <option value="2">21000-40000</option>
              <option value="3">Above 40000</option> 
            </select>
          </div>
        </div>
        <div class="form-group mt-8" align="center">
            <button type="button" name="filter" id="filter" class="btn btn-info">Filter</button>
        </div>
    </div>
  </div>
  <div class="col-sm-9">  
    <div class="table-responsive">
      <table align="right" id="job_data" class="table table-bordered table-striped dt-responsive display nowrap">
        <thead>
          <tr>
            <th style="border-radius: 25px;">Title</th>
            <th>Status</th>
            <th>Division</th>
            <th>location</th>
            <th>Vacancy</th>
            <th>Salary</th>
            <th>Deadline</th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
</div>

</div>          
<?php include ('footer.php'); ?>

<script type="text/javascript" language="javascript" >
 $(document).ready(function(){
  
  fill_datatable();
  
  function fill_datatable(job_type = '', division = '', salary = '')
  {
   var dataTable = $('#job_data').DataTable({
    "processing" : true,
    "serverSide" : true,
    "responsive": true,
    "order" : [],
    "searching" : false,
    "ajax" : {
     url:"<?php echo base_url(); ?>Welcome/livesearch_data",
     type:"POST",
     data:{job_type:job_type, division:division, salary:salary}
    }
   });
  }
  $('#filter').click(function(){
     var job_type = $('#job_type').val();
     var division = $('#division').val();
     var salary = $('#salary').val();

     if(job_type != '' && division != '' && salary != '') {
        $('#job_data').DataTable().destroy();
        fill_datatable(job_type, division, salary);
     } else if(job_type != '' && division == '' && salary == '') {
        $('#job_data').DataTable().destroy();
        fill_datatable(job_type,division='',salary='');
     } else if(job_type == '' && division != '' && salary == '') {
        $('#job_data').DataTable().destroy();
        fill_datatable(job_type='',division,salary='');
     } else if(job_type == '' && division == '' && salary != '') {
        $('#job_data').DataTable().destroy();
        fill_datatable(job_type='',division='',salary);
     } else if(job_type != '' && division != '' && salary == '') {
        $('#job_data').DataTable().destroy();
        fill_datatable(job_type,division,salary='');
     } else if(job_type != '' && division == '' && salary != '') {
        $('#job_data').DataTable().destroy();
        fill_datatable(job_type,division='',salary);
     } else if(job_type == '' && division != '' && salary != '') {
        $('#job_data').DataTable().destroy();
        fill_datatable(job_type='',division,salary);
     } else {
        $('#job_data').DataTable().destroy();
        fill_datatable();
     }
  });
  
  
 });
 
</script>




<script>window.jQuery || document.write('<script src="<?= base_url(); ?>asset/js/vendor/jquery-1.10.2.min.js"><\/script>')</script>

<script src="<?= base_url(); ?>asset/js/bootstrap.min.js"></script>
 <!-- <script src="<?= base_url(); ?>asset/js/main.js"></script> -->
</body>

 </html>  
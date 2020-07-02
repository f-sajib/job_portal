 <!DOCTYPE html>  
 <html>  
<head>
<?php include ('head.php'); ?>     
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
   <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
   <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
</head>  
<body>
<!-- <div id="preloader">
    <div id="status">&nbsp;</div>
</div> -->

<style type="text/css">
    .design{border-radius: 10px; padding: 20px;}
    a:hover{color:#2ccc47;}
    tr:hover
    {color:#2ccc47;}
</style>

 <!-- Header Section (top bar & menu bar) -->
       
<?php $page= 'employe'; include ('header.php'); ?>

 <!--================ Company ======================
    ==================== List ASC ==================-->
       
<div class="container">
      
    <div class="table-responsive">  
        <table id="employee_data" class="table table-striped">  
            <thead>  
               <tr style="background: #b3ffb3;">
                  <th class="design" width="10%">SL. </th>&nbsp;
                  <th class="design" width="70%">Company Name </th>&nbsp;
                  <th class="design" width="20%">Available job</th>
               </tr> 
            </thead> 
    <?php $i=1; if($job && !empty($job)):
        foreach($job as $row):?>
                <tr>
                    <td class="design" ><?php echo $i;?></td>&nbsp;
                    <td class="design" ><a target="_blank" style="text-decoration: none;" href="<?=base_url(); ?>Welcome/joblist/<?php echo $row->id?>"><?php echo $row->c_name;?></a></td>&nbsp;
                    <td class="design" ><?php  echo $row->count?></td>
                </tr>
    <?php $i++; endforeach;
          endif;?> 
        </table>  
    </div>  
</div>

 <!-- Footer Section -->           
<?php include ('footer.php'); ?> 


<script>window.jQuery || document.write('<script src="<?= base_url(); ?>asset/js/vendor/jquery-1.10.2.min.js"><\/script>')</script>

<script src="<?= base_url(); ?>asset/js/bootstrap.min.js"></script>
 <!-- <script src="<?= base_url(); ?>asset/js/main.js"></script> -->
</body>
<script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable();  
 });  
 </script>  
 </html>  
   
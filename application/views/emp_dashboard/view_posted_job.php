<?php require ('head.php'); ?>
<style type="text/css">
    .p-2{padding: 10px;}
</style>
<!-- page container area start
<div class="page-container"> -->

    <!-- main content area start -->

    <div class="main-content">
        <br/> <br/>
        <div class="col-sm-9 col-sm-offset-1 row" style="background: #fff;">
            <h4 class="text-success p-2"><?php echo $details->title; ?></h4>    
            <h5 class="p-2"><?php echo $details->c_name;?></h5>
            <div class="col-sm-8 col-sm-offset-1">
                <table class="table table-striped">
                    <tr>
                        <th width="25%" style="border: none;"> Vacancy: </th>
                        <td width="60%" style="border: none;"><?php echo $details->vacancy; ?></td>
                    </tr>
                    <tr>
                        <th> Key skill: </th>
                        <td><?php 
                            $s1 =implode(",",json_decode($details->skill));
                            echo $s1;
                            ?>                                
                        </td>
                    </tr>
                    <tr>
                        <th> Job Context: </th>
                        <td><?php echo $details->context; ?></td>
                    </tr>
                    <tr>
                        <th> Job Responsibilities: </th>
                        <td><?php 
                        $r1=implode("|",json_decode($details->responsibility));

                        $value = str_replace("[", "", $details->responsibility);
                        $value_two =str_replace(']', "", $value);
                        $value_three =str_replace('"', "|", $value_two);
                        $r2 = substr_count($value_three,'|,|');

                        $r3 = explode("|",$r1);
                        echo '<ul style="list-style-type:square;">';
                        for($i=0; $i<=$r2; $i++)
                        {
                           
                            echo '<li>'.$r3[$i].'</li>';                           
                        }
                        echo '</ul>';
                        ?></td>
                    </tr>
                    <tr>
                        <th> Employeement Status: </th>
                        <td><?php echo $details->status; ?></td>
                    </tr>
                    <tr>
                        <th> Educational Requirement: </th>
                        <td>
                            <?php echo $details->education; ?><br>
                            <?php if(isset($details->result) && !empty($details->result)){?>
                                Minimum <?php echo $details->result; ?> required<br>
                                <?php echo $details->description; ?>
                            <?php }?>
                        </td>
                    </tr>
                    <tr>
                        <th> Experience Requirement: </th>
                        <td><?php echo $details->experience; ?></td>
                    </tr>
                    <tr>
                        <th> Additional Requirement: </th>
                        <td><?php 
                        $re1 =implode("|",json_decode($details->requirment));

                        $value1 = str_replace("[", "", $details->requirment);
                        $value_two1 =str_replace(']', "", $value1);
                        $value_three1 =str_replace('"', "|", $value_two1);
                        $re2 = substr_count($value_three1,'|,|');

                        $re3 = explode("|",$re1);
                        echo '<ul style="list-style-type:square;">';
                        for($i=0; $i<=$re2; $i++)
                        {
                            echo '<li>'.$re3[$i].'</li>';                           
                        }
                        echo '</ul>';
                        ?></td>
                    </tr>
                    <tr>
                        <th> Job Location: </th>
                        <td><?php echo $details->location; ?></td>
                    </tr>
                    <tr>
                        <th> Salary: </th>
                        <td><?php echo $details->salary; ?></td>
                    </tr>
                    <tr>
                        <th> Additional Benifit: </th>
                        <td><?php 
                        $b1 =implode("|",json_decode($details->benifit));

                        $value2 = str_replace("[", "", $details->benifit);
                        $value_two2 =str_replace(']', "", $value2);
                        $value_three2 =str_replace('"', "|", $value_two2);
                        $b2 = substr_count($value_three2,'|,|');

                        $b3 = explode("|",$b1);
                        echo '<ul style="list-style-type:square;">';
                        for($i=0; $i<=$b2; $i++)
                        {
                            echo '<li>'.$b3[$i].'</li>';                           
                        }
                        echo '</ul>';
                        ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    
    <div class="main-content-inner bg-success row">
        <div class="col-sm-9 col-sm-offset-1 row p-2">
           <!--  <center>
                <button class="btn btn-success">Apply Now</button>
                <p>Send your CV to <b>email@mail.com</b> or to Email CV from CAREER AGE BD account</p>
                <p>Deadline: <b>19 july, 2019</b> </p>
            </center> --><hr/>        
            <b>Company Information</b>
            <p>Company Name: <?php echo $details->c_name;?> <br/> Address: <?php echo $details->c_address;?> <br> Mobile: <?php echo $details->c_phone;?></p>
        </div>
    </div>  <!-- main content inner end -->


<!-- </div>  page container end -->
<div class="clearfix">   </div>
<!-- footer area start-->
<?php require ('footer.php'); ?>

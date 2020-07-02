<!doctype html>
<html class="no-js" lang="en">

<head>
    <?php require ('head.php') ?>
</head>

<style type="text/css">
.icon:hover{ padding: 3px 3px 3px 3px; }
</style>

<body>
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <?php $page = ''; require ('sidebar_menu.php'); ?>
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
                        <li><a href="<?=base_url(); ?>Empdashboard/cv_bank">Cv Bank</a></li>
                        <li><span>Applicant list</span></li>
                    </ul>
                </div>
                </div>
            </div>  
            </div><br/>
            <div class="col-md-2"></div>
            <div class="col-md-8">
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th>Candidate</th>
                            <th>Work Experience</th>
                            <th>Resume</th>
                        </tr>
                    
            <?php if($applicant->num_rows() > 0)
                    {                        
                        foreach($applicant->result() as $row)
                            {?>
                                <tr>
                                    <td><?php echo $row->f_name.'&nbsp;'.$row->l_name?></td>
                                    <td>
                                        <?php                                            
                                            $ts1 = strtotime($row->d_from);
                                            $ts2 = strtotime($row->d_to);

                                            $year1 = date('Y', $ts1);
                                            $year2 = date('Y', $ts2);

                                            $month1 = date('m', $ts1);
                                            $month2 = date('m', $ts2);

                                            $diff = (($year2 - $year1) * 12) + ($month2 - $month1);
                                            $actual= $diff+1;

                                            if($actual<12){
                                                echo $actual; echo "Months";
                                            }
                                            elseif($actual>12){
                                                $value =($actual/12);
                                                $year=floor($actual/12);
                                                $aprox_month=$value - $year;
                                                $month=(($aprox_month*100)/25)*3;
                                                
                                                echo $year." year&nbsp;"; echo $month." month";
                                            }
                                        ?>
                                    </td>
                                    <td><a target="_blank" href="<?=base_url(); ?>Empdashboard/cvShow/<?php echo $row->id;?>"><i style="font-size: 20px;color:red;" class="fa fa-file-pdf-o icon" aria-hidden="true"></i></a></td>
                                </tr>
                    <?php } }?>
                    </table>
            </div>

          
        </div>  <!-- main content area end -->

        <footer> <?php require ('footer.php'); ?> </footer>
    </div> <!-- class page-container end -->

</body>

</html>

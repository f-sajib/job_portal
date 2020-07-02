<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>
        <?php require ('head.php') ?>
    </head>

<body>
    <div style="width: 100%; min-height: 500px; display: flex; border: 2px solid #ccc; padding: 3px;">
        <div style="width: 30%; float: left; padding: 5px; background: #b3ffb3; flex: 1; height: 100%; border-right: 2px dotted #ccc;">
            <center> <img style="height: 200px; width: 200px; border-radius: 100px" src="<?php echo base_url(); ?>asset/img/<?php echo $info->photo;?>"> </center>
            <br/> <br/>
            <p><b style="color: #2db300;">Email:</b>&nbsp; <?php echo $info->email; ?></p>
            <p><b style="color: #2db300;">Contact:</b>&nbsp; 0<?php echo $info->mobile; ?></p>
            <p><b style="color: #2db300;">Address:</b>&nbsp; <?php echo $info->pre_address; ?></p>
            <br/>
            <b><h4>Skills</h4></b>
            <?php
                $skills  = $info->skill;
                $count= substr_count($skills,",");
                $skill = explode(",", $skills);
                for ($i=0; $i<$count+1; $i++) {
            ?>
            <p>&nbsp;* <?php echo $skill[$i]; ?></p><br/>
            <?php }?>
            <b><h4>Interests</h4></b>
            <?php
                $interests  = $info->interest;
                $count1= substr_count($interests,",");
                $interest = explode(",", $interests);
                for ($i=0; $i<$count1+1; $i++) {
            ?>
            <p>&nbsp;* <?php echo $interest[$i]; ?></p>
            <?php } ?>
        </div>
        <div style="width: 2%; float: left;"></div>

        <div style="width: 68%; float: right; flex: 3;">
            <h2 style="color: #2db300;"><?php echo $info->f_name.' '.$info->l_name; ?></h2><br/>
            <h4 style="color: #2db300;">Career Objective</h4>
            <p style="margin-left: 10px; text-align: justify;"><?php echo $info->objective?></p>
            <br/>
            <h4 style="color: #2db300;">Experience:</h4>
            <?php if($info3->num_rows() > 0) {
                foreach($info3->result() as $row) {
                    ?>
                    <div style="color: #2db300; width: 20%; float: left;">
                        <p style="text-align: right;"><?php $year = date('Y', strtotime($row->d_from));
                            echo $year;?>-<?php $year = date('Y', strtotime($row->d_to));
                            echo $year; ?>
                        </p> <br/>
                    </div>
                    <div style="width: 75%; float: right;">
                        <p>In &nbsp;<b><?php echo $row->company; ?></b>
                            as <b><?php echo $row->designation;?></b>
                            [Dept. <?php echo $row->department;?>]</p>
                        <p><?php echo $row->responsibilites; ?></p>
                    </div>
            <?php } } ?>
            <br/>

            <h4 style="color: #2db300;">Education:</h4>
            <?php if($info1->num_rows() > 0) {
                foreach($info1->result() as $row) {
            ?>
            <div style="color: #2db300; width: 20%; float: left;">
                <p style="text-align: right;"><?php echo $row->year; ?></p> <br/> <br/>
            </div>
            <div style="width: 68%; float: right;">
                <p><b><?php echo $row->degree; ?></b> <br/>
                    <?php echo $row->institute; ?> , <?php echo $row->board; ?>
                    <br/>Result: <?php echo $row->result; ?></p>
            </div>
            <?php } } ?>
        </div>
    </div>
</body>
</html>

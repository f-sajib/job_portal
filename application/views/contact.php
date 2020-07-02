<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <?php include ('head.php'); ?>
</head>

<body>

    <!-- <div id="preloader">
        <div id="status">&nbsp;</div>
    </div> -->

    <!-- Header Section (top bar & menu bar) -->
    <?php $page= 'contact'; include ('header.php'); ?>

    <div class="container contact-page">
    
    <div style="width: 100%;">
        <h2 class="text-center">Get In Touch With Us</h2>
        <div class="pg-title"></div>
        <div class="pg-title-2"> </div>
    </div> <br/>

    <div class="row">
        <div class="col-md-5 jumbotron thm-bg">
            <h3><b>Contact Information</b></h3><hr/>
            <div> <i class="fa fa-map-marker"> Location:</i> H#16, R#10, Nikunjo-2. Dhaka-1229</div><hr/>
            <div> <i class="fa fa-envelope"> Email: </i> info@careeragebd.com</div><hr/>
            <div> <i class="fa fa-phone"> Hotline: </i> +8801612622555</div><hr/>
            <div> <i class="fa fa-clock-o"> Office Time: </i> 9.00 AM to 6.00 PM</div><hr/>
        </div>
        <div class="col-md-7">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.085677526225!2d90.39249211445642!3d23.77996319356444!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c769f1cb61ab%3A0x8197ad5d45175ff5!2sFace+of+Art+Technologies+Ltd%2C+Rd+No+29%2C+Dhaka+1205!5e0!3m2!1sen!2sbd!4v1557055476947!5m2!1sen!2sbd" width="100%" height="427" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>    
    </div>

    <hr/>

    <div class="row">
        <center> <h3> Fell free to wirte Us </h3> <div class="pg-title-2"></div> </center>
        <div class="col-md-offset-2 col-md-8">
        <form action="" method="post">
            <div class="form-group">
                <label for="name">Name *</label>
                <input type="text" class="form-control" id="">
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="name">Email *</label>
                    <input type="Email" class="form-control" id="">
                </div>
                <div class="col-md-6 form-group">
                    <label for="name">Mobile No. *</label>
                    <input type="Email" class="form-control" id="">
                </div>
            </div>
            <div class="form-group">
                <label>Your Message</label>
                <textarea rows="7" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-success pull-right">Send Message</button>
        </form>
        </div>

    </div><br/>

   

    </div>

	<!-- Footer Section -->
	<?php include ('footer.php'); ?>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="<?= base_url(); ?>asset/js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
    <script src="<?= base_url(); ?>asset/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>asset/js/main.js"></script>
    
</body>
</html>
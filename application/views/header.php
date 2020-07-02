<div class="header-connect fixed-top">
    <div class="container">
        <div class="row">
        	<div class="text-info text-center">
        	
        	</div>
            <div class="col-md-5 col-sm-8 col-xs-8">
                <div class="header-half header-call">
                    <p>
                        <span><i class="fa fa-phone"></i>+880 1612 622555</span>
                        <span><i class="icon-mail"></i>support@careerage.com</span>
                    </p>
                </div>
            </div>
            <div class="col-md-2 col-md-offset-5  col-sm-3 col-sm-offset-1  col-xs-3  col-xs-offset-1">
                <div class="header-half header-social">
                    <ul class="list-inline">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-vine"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Top Bar End & Menu Bar Start -->
<nav class="navbar navbar-default fixed-top">
<div class="container">
<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header">
	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	</button>
	<a class="navbar-brand" href="<?= base_url(); ?>"><img src="<?= base_url(); ?>asset/img/logo.png" height="55" alt="CareerAgeBD"></a>
	</div>
	<!-- Collect the nav links, forms, and other content for toggling -->
	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<div class="button navbar-right">
			  <?php if($this->session->userdata('loggedin')) { ?>

			  	<form action="<?php echo base_url("Welcome/logOut");?>" method="POST"> <button type="submit" class="navbar-btn nav-button wow bounceInLeft " data-wow-delay="0.6s">LogOut</button></form>

			 <?php  }
			  else
			  {
			  	echo '<button class="navbar-btn nav-button wow bounceInRight login" data-wow-delay="0.8s" data-toggle="modal" data-target="#logIn">Login</button>
			  		  <button class="navbar-btn nav-button wow fadeInRight" data-toggle="collapse" data-target="#signUpList" >Sign Up <i class="fa fa-angle-down"></i></button>';
			  }?>
			  <ul id="signUpList" class="collapse list-group">
            <li> <a class="list-group-item btn" data-toggle="modal" id="mymodal" href="#signUp">Jobseeker</a> </li>
            <li> <a class="list-group-item btn" data-toggle="modal" id="mymodal" href="#signUpEM">Employeer</a> </li>
            <li> <a class="list-group-item btn" data-toggle="modal" id="mymodal" href="#admin">Administration</a> </li>
        </ul>			  
		</div>
		<ul class="main-nav nav navbar-nav navbar-right">
			<li class="wow fadeInDown" data-wow-delay="0s"><a class="<?php if($page=='home'){echo 'active';}?>" href="<?= base_url(); ?>Welcome/index">Home</a></li>
			<li class="wow fadeInDown" data-wow-delay="0.1s"><a class="<?php if($page=='job_sk'){echo 'active';}?>" href="<?= base_url(); ?>Welcome/jobseeker">Job Seekers</a></li>
			<li class="wow fadeInDown" data-wow-delay="0.2s"><a class="<?php if($page=='employe'){echo 'active';}?>" href="<?= base_url(); ?>Welcome/employeers">Company</a></li>
      <li class="wow fadeInDown" data-wow-delay="0.2s"><a class="<?php if($page=='job_s'){echo 'active';}?>" href="<?= base_url(); ?>Welcome/livesearch">Live job search</a></li>
			<!-- <li class="wow fadeInDown" data-wow-delay="0.3s"><a href=>About us</a></li> -->
			<li class="wow fadeInDown" data-wow-delay="0.5s"><a class="<?php if($page=='contact'){echo 'active';}?>" href="<?= base_url(); ?>Welcome/Contact">Contact</a></li>
			<?php if($this->session->userdata('loggedin'))
					 { ?>
					 	<?php if($this->session->userdata('user_id'))
					 		{ ?>
								<li><a href="<?= base_url(); ?>Dashboard"><strong>My account</strong></a></li>
					  <?php } ?>
					  <?php  if($this->session->userdata('emp_id'))
					 		{ ?>
								<li><a href="<?= base_url(); ?>Empdashboard"><strong>My account</strong></a></li>
					  <?php } ?>		
			   <?php } ?>
		</ul>
	</div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
</nav>


<!--=================================
			Log In Form
==================================-->
<style type="text/css">
	.modal{background: rgba(0, 255, 0, 0.3);}
  .design2 label {
  	cursor: pointer;
  	padding: 7px;
  	border : 2px solid #ccc;
  	box-shadow: 3px 6px #ccc;
  	border-radius: 4px;

  }
  .design2 {margin-left: 30px;}
  .design2 input[type=radio]{display: none;}
  .design2 label:hover {border : 2px solid #00ADEF;box-shadow: 3px 6px #00ADEF;}
  
  .design1 input[type=radio]:checked ~ label{
  		color: #00ADEF;
  		border : 2px solid #00ADEF;
  		box-shadow: 3px 6px #00ADEF;
  }
  .design1 input[type=radio]:checked ~ label:before{
  		content: '';
  		width: 100%;
  		height: 100%;
  		position: absolute;
  		top: 0;
  		left: 0;
  		background : #00ADEF;
  		z-index: -1;
  				
  }

</style>

<div id="logIn" class="modal fade" role="dialog">
<div class="modal-dialog modal-sm">
    <!-- Modal content-->
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<center>
				<img class="img-responsive" src="<?= base_url(); ?>asset/img/logo.png">
			</center>
			<!-- <h4 class="modal-title text-center">Login Now</h4> -->
		</div>
		<form id="login"  action="<?php echo site_url('Welcome/signIn')?>" method="POST">
		<div class="modal-body">
			
			<div class="form-group">
				<input id="name" type="text" name="username" placeholder="Email" class=" form-control">
			</div>
			<div class="form-group">
				<input id="pass" type="password" name="pass" placeholder="password" class=" form-control">
			</div>
      <div class="form-group design1">
        <div  class="design2">
          <input class="col-sm-1" type="radio" id="f-option" value="1" name="type">
          <label style=" "  class="col-sm-5 control-label" for="f-option">Job Seeker</label>
        </div>
        <div class="design2">
          <input class="col-sm-1" type="radio" id="s-option" value="2" name="type">
          <label style="margin-left: 20px;" class="col-sm-4 control-label" for="s-option">Employee</label>
        </div>
      </div>
      
		</div>
		<div class="modal-footer">
      <br>
			<button type="submit" id="confirm_button" class="btn btn-success form-control">Sign In</button>
			
			<p class="text-left"> <a href="#">forget password</a> </p>
		</div>
	</form>
		<div class="modal-body form-group" method="get">
			<p class="text-center"> Don't Have a CareerAge Account ?</p>
			<button class="btn btn-success form-control" data-toggle="modal" data-target="#signUp">Create Account</button>
		</div>
	</div>
</div>
</div>
<!--=================================
		Sign Up As job seeker
==================================-->
<style type="text/css">
	.modal{background: rgba(0, 255, 0, 0.3);}
</style>

<div id="signUp" class="modal fade" role="dialog">
<div class="modal-dialog modal-lg">
    <!-- Modal content-->
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<center>
				<img class="img-responsive" style="max-height: 100px;" src="<?= base_url(); ?>asset/img/logo.png">
			</center>
		</div>
		
		<form id="signup" action="<?php echo site_url('Welcome/signUp')?>" method="POST">
		<div class="modal-body" >
			<div class="form-group row">
				<div class="col-md-6">
				<input id="f_name" name="f_name" placeholder="First Name *" class="form-control"> 
				</div>
				
				<div class="col-md-6"> 
				<input id="l_name" name="l_name" placeholder="Last Name *" class="col-md-6 form-control" > 
				</div>

			</div>

			<div class="form-group row">
				<div class="col-md-6"> 
				<input id="email" type="email" name="email" placeholder="You Email address *" class="form-control" >
				 </div>
				<div class="col-md-6">
				<input id="mobile" name="mobile" placeholder="Contact No. " class="form-control">
				</div>
			</div>

			

			<div class="form-group row">
				<p class="text-left ml-2">Your Present Address *</p>
				<div class="col-md-12">
					<textarea id="pre_address" name="pre_address" class="form-control" placeholder="type your address" row="4"></textarea>
				</div>
			</div>

			<div class="form-group row">
				<p class="text-left ml-2">Your Permanent Address *</p>
				<div class="col-md-12">
					<textarea id="per_address" name="per_address" class="form-control" placeholder="type your address" row="4"></textarea>
				</div>
			</div>

			<div class="form-group row">
				<div class="col-md-6">
				<input id="u_password"  type="password" name="password" placeholder="password *" class="form-control">
				 </div>
				<div class="col-md-6"> 
				<input id="c_pass" type="password" name="c_password" placeholder="Confirm password *" class=" form-control" >
				<input type="hidden" name="level" value="<?php echo "1"?>" >
				<input type="hidden" name="photo" value="<?php echo "00.jpg"?>" > 
				</div>
			</div>
		</div>
		<div class="modal-body">
			<button type="submit" class="btn btn-success">Submit</button>
			<button type="reset" class="btn btn-danger">Reset</button>
		</div>
		</form>
	</div>
</div>
</div>
<!--=================================
		Sign Up As Employeer
==================================-->
<div id="signUpEM" class="modal fade" role="dialog">
<div class="modal-dialog modal-lg">
    <!-- Modal content-->
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<center>
				<img class="img-responsive" style="max-height: 100px;" src="<?= base_url(); ?>asset/img/logo.png">
			</center>
		</div>
		
		<form id="csign"  action="<?php echo site_url('Welcome/company_signUp')?>" name="seform" method="POST">
		<div class="modal-body" >
			<div class="form-group row">
				<div class="col-md-6">
				<input id="c_name" name="c_name" placeholder="Company Name *" class="form-control"> 
				</div>
				
				<div class="col-md-6"> 
				<input id="c_email" type="email" name="c_email" placeholder="You Email address *" class="form-control" >
				</div>

			</div>

			<div class="form-group row">
				<div class="col-md-6"> 
				<input id="c_mobile" type="tel" name="c_mobile" placeholder="Mobile No.* " class="form-control"> 
				</div>

				<div class="col-md-6">
				<input id="c_phone" type="tel" name="c_phone" placeholder="Telephone No. " class="form-control">
				</div>
			</div>		
			<div class="form-group row">
				<p class="text-left ml-2">Company Address *</p>
				<div class="col-md-12">
					<textarea id="c_address" name="c_address" class="form-control" placeholder="type your address" row="4"></textarea>
				</div>
			</div>

			<div class="form-group row">
				<p class="text-left ml-2">Trade License No. *</p>
				<div class="col-md-12">
					<input id="c_trade_license"  name="c_trade_license" class="form-control">
				</div>
			</div>

			<div class="form-group row">
				<div class="col-md-6">
				<input id="password" type="password" name="pass" placeholder="password *" class=" form-control" >
				 </div>
				<div class="col-md-6">
				<input id="c_password" type="password" name="c_pass" placeholder="Confirm password *" class=" form-control" >
				<input type="hidden" name="level" value="<?php echo "2";?>" >
				<input type="hidden" name="logo" value="<?php echo "00.png";?>" >
				</div>
			</div>
		</div>
		<div class="modal-body">
			<button type="submit" class="btn btn-success">Submit</button>
			<button type="reset" class="btn btn-danger">Reset</button>
		</div>
		</form>
	</div>
</div>
</div>

<!--=================================
		Sign Up As Administration
==================================-->
<div id="admin" class="modal fade" role="dialog">
<div class="modal-dialog modal-lg">
    <!-- Modal content-->
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<center>
				<img class="img-responsive" style="max-height: 100px;" src="<?= base_url(); ?>asset/img/logo.png">
			</center>
		</div>
		
		<form id="adminsign"  action="<?php echo site_url('Welcome/admin_signUp')?>"  method="POST">
		<div class="modal-body" >
			<div class="form-group row">
				<div class="col-md-6">
				<input id="ad_name" name="ad_name" placeholder="Your Name here*" class="form-control"> 
				</div>
				
				<div class="col-md-6"> 
				<input id="ad_email" type="email" name="ad_email" placeholder="Your Email address *" class="form-control" >
				</div>

			</div>
		
			<div class="form-group row">
				<div class="col-md-6">
					<input id="ad_phone" type="text" name="ad_phone" placeholder="Your Phone here*" class="form-control" >
				</div>
				<div class="col-md-6"></div>
			</div>


			<div class="form-group row">
				<div class="col-md-6">
				<input id="ad_password" type="password" name="ad_password" placeholder="password *" class=" form-control" >
				 </div>
				<div class="col-md-6">
				<input id="ad_c_password" type="password" name="ad_c_password" placeholder="Confirm password *" class=" form-control" >
				<input type="hidden" name="level" value="<?php echo "2";?>" >
				<input type="hidden" name="logo" value="<?php echo "00.png";?>" >
				</div>
			</div>
		</div>
		<div class="modal-body">
			<button type="submit" class="btn btn-success">Submit</button>
			<button type="reset" class="btn btn-danger">Reset</button>
		</div>
		</form>
	</div>
</div>
</div>

<!-- <script src="<?= base_url(); ?>asset/js/validation.js"></script> -->

<script>
$(document).ready(function()
{
 $("#confirm_button").prop("disabled",true);
 $("#f-option").click(function(){
    $("#confirm_button").prop("disabled",false);
 });

 $("#s-option").click(function(){
    $("#confirm_button").prop("disabled",false);
 });

});
</script>
<script>
	
$(document).ready(function()
{
  $("#csign").submit(function()
  {


  		var c_name 			= $("#c_name").val();
  		var c_email 		= $("#c_email").val();
  		var c_mobile		= $("#c_mobile").val();
  		var c_address 		= $("#c_address").val();
  		var c_trade_license = $("#c_trade_license").val();
  		var pass 			= $("#password").val();
  		var c_pass 			= $("#c_password").val();

  		
 
  			if(c_name=='')
  			{
  				
  				$("#c_name").css({"border": "1px solid red"});
  				$("#c_name").focus();
  				return false;
  			}
  			else if(c_email=='')
  			{
  				$("#c_email").css({"border": "1px solid red"});
  				$("#c_email").focus();
  				return false;
  			}
  			else if(c_mobile=='')
  			{
  				$("#c_mobile").css({"border": "1px solid red"});
  				$("#c_mobile").focus();
  				return false;
  			}
  			else if(c_address=='')
  			{
  				$("#c_address").css({"border": "1px solid red"});
  				$("#c_address").focus();
  				return false;
  			}
  			else if(c_trade_license=='')
  			{
  				$("#c_trade_license").css({"border": "1px solid red"});
  				$("#c_trade_license").focus();
  				return false;
  			}
  			else if(pass=='')
  			{
  				$("#password").css({"border": "1px solid red"});
  				$("#password").focus();
  				return false;
  			}
  			else if(c_pass=='')
  			{
  				$("#c_password").css({"border": "1px solid red"});
  				$("#c_password").focus();
  				return false;
  			}
  			else if(pass != c_pass)
  			{
  				swal('Password does not match','','warning');
  				$("#password , #c_password").css({"border": "1px solid red"});
  				return false;

  			} 
  			else if(c_email!='') 
  			{
				$.ajax({
		   			url:"<?php echo base_url(); ?>Welcome/uniqeEmail",
		   			method:"POST",
		   			data:{c_email:c_email},
		   			context: this,
		   			success:function(data){
		    			if(data != '0') {
		    				
		    				this.submit();				
		    			} else {
		    				swal('This Email is already in use','','warning');	    				

		    			}

		   			}
	  			});
	  			$('#c_email').css("background-color", "#acf0a8");
		    	$('#c_email').focus();
	  			return false;
			}
  			else
  			{
  				swal('Successfull','Your account created succesfully','success');
  				return true;

  			}

  			
  	});

  $("#c_name, #c_email, #c_mobile, #c_address, #c_trade_license, #pass").keyup(function(){
  			
  			var c_name 			= $("#c_name").val();
	  		var c_email 		= $("#c_email").val();
	  		var c_mobile		= $("#c_mobile").val();
	  		var c_address 		= $("#c_address").val();
	  		var c_trade_license = $("#c_trade_license").val();
	  		
 			if(c_name!='')
  			{
  				$("#c_name").css({"border": "1px solid black"});	
  			}

  			if(c_email!='')
  			{
  				$("#c_email").css({"border": "1px solid black"});
  			}
  			if(c_mobile!='')
  			{
  				$("#c_mobile").css({"border": "1px solid black"});
  			}
  			if(c_address!='')
  			{
  				$("#c_address").css({"border": "1px solid black"});
  			}
  			if(c_trade_license!='')
  			{
  				$("#c_trade_license").css({"border": "1px solid black"});
  			}
  			
  });

  $("#signup").submit(function(){
  		var f_name 			= $("#f_name").val();
  		var l_name 			= $("#l_name").val();
  		var email			= $("#email").val();
  		var mobile 			= $("#mobile").val();
  		var pre_address 	= $("#pre_address").val();
  		var per_address 	= $("#per_address").val();
  		var pass 			= $("#u_password").val();
  		var c_pass 			= $("#c_pass").val();

  		if(f_name=='') {
  			$("#f_name").css({"border": "1px solid red"});
  			$("#f_name").focus();
  			return false;
  		} else if(l_name=='') {
  			$("#l_name").css({"border": "1px solid red"});
  			$("#l_name").focus();
  			return false;
  		} else if(email=='') {
  			$("#email").css({"border": "1px solid red"});
  			$("#email").focus();
  			return false;
  		} else if(mobile=='') {
  			$("#mobile").css({"border": "1px solid red"});
  			$("#mobile").focus();
  			return false;
  		} else if(pre_address=='') {
  			$("#pre_address").css({"border": "1px solid red"});
  			$("#pre_address").focus();
  			return false;
  		} else if(per_address=='') {
  			$("#per_address").css({"border": "1px solid red"});
  			$("#per_address").focus();
  			return false;
  		} else if(pass=='') {
  			$("#u_password").css({"border": "1px solid red"});
  			$("#u_password").focus();
  			return false;
  		} else if(c_pass=='') {
  			$("#c_pass").css({"border": "1px solid red"});
  			$("#c_pass").focus();
  			return false;
  		} else if(pass != c_pass) {
			swal('Password does not match','','warning');
			$("#u_password , #c_pass").css({"border": "1px solid red"});
			return false;

		} else if(email!='') {
			$.ajax({
	   			url:"<?php echo base_url(); ?>Welcome/uniqeEmail",
	   			method:"POST",
	   			data:{email:email},
	   			context: this,
	   			success:function(data){
	    			if(data != '0') {
	    				
	    				this.submit();				
	    			} else {
	    				swal('This Email is already in use','','warning');	    				

	    			}

	   			}
  			});
  			$('#email').css("background-color", "#acf0a8");
	    	$('#email').focus();
  			return false;
		} else {
			swal('Successfull','Your account created succesfully','success');
			return true;
		}
  });

   $("#f_name, #l_name, #email, #mobile, #pre_address, per_address").keyup(function(){
  			
  		var f_name 			= $("#f_name").val();
  		var l_name 			= $("#l_name").val();
  		var email			= $("#email").val();
  		var mobile 			= $("#mobile").val();
  		var pre_address 	= $("#pre_address").val();
  		var per_address 	= $("#per_address").val();

 			if(f_name!='')
  			{
  				$("#f_name").css({"border": "1px solid black"});	
  			}

  			if(l_name!='')
  			{
  				$("#l_name").css({"border": "1px solid black"});
  			}
  			if(email!='')
  			{
  				$("#email").css({"border": "1px solid black"});
  			}
  			if(mobile!='')
  			{
  				$("#mobile").css({"border": "1px solid black"});
  			}
  			if(pre_address!='')
  			{
  				$("#pre_address").css({"border": "1px solid black"});
  			}
  			if(per_address!='')
  			{
  				$("#per_address").css({"border": "1px solid black"});
  			}
  });

   $("#adminsign").submit(function(){
   		var ad_name = $("#ad_name").val();
   		var ad_email = $("#ad_email").val();
   		var ad_phone = $("#ad_phone").val();
   		var ad_password = $("#ad_password").val();
   		var ad_c_password = $("#ad_c_password").val();

   		if(ad_name=='') {
   		  $("#ad_name").css({"border": "1px solid red"});
  		  $("#ad_name").focus();
  		  return false;
   		} else if(ad_email=='') {
   		  $("#ad_email").css({"border": "1px solid red"});
  		  $("#ad_email").focus();
  		  return false;
   		} else if(ad_phone=='') {
   		  $("#ad_phone").css({"border": "1px solid red"});
  		  $("#ad_phone").focus();
  		  return false;
   		} else if(ad_password=='') {
   		  $("#ad_password").css({"border": "1px solid red"});
  		  $("#ad_password").focus();
  		  return false;
   		} else if(ad_c_password=='') {
   		  $("#ad_c_password").css({"border": "1px solid red"});
  		  $("#ad_c_password").focus();
  		  return false;
   		} else {
   		  return true;
   		}
   });

   $("#login").submit(function(){

   		var name = $("#name").val();
   		var pass = $("#pass").val();

   		if(name=='')
  		{
  			$("#name").css({"border": "1px solid red"});
  			$("#name").focus();
  			return false;
  		}
  		else if(pass=='')
  		{
  			$("#pass").css({"border": "1px solid red"});
  			$("#pass").focus();
  			return false;
  		}
  		else
  		{
  			return true;
  		}

   });

   $("#name, #pass").keyup(function(){

		var name = $("#name").val();
   		var pass = $("#pass").val();

   		if(name!='')
		{
			$("#name").css({"border": "1px solid black"});	
		}

		if(pass!='')
		{
			$("#pass").css({"border": "1px solid black"});
		}  	
   });

  

});
</script>

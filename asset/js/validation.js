	//signup
	var f_name = document.forms["sform"]["f_name"];
	var l_name = document.forms["sform"]["l_name"];
	var email = document.forms["sform"]["email"];
	var mobile = document.forms["sform"]["mobile"];
	var pre_address = document.forms["sform"]["pre_address"];
	var per_address = document.forms["sform"]["per_address"];
	var password = document.forms["sform"]["password"];
	var c_password = document.forms["sform"]["c_password"];
	
	//login
	var username = document.forms["logform"]["username"];
	var pass = document.forms["logform"]["pass"];


	//.......................................................................//
	
	//signup
	var f_name_error = document.getElementById("f_name_error");
	var l_name_error = document.getElementById("l_name_error");
	var email_error = document.getElementById("email_error");
	var mobile_error = document.getElementById("mobile_error");
	var pre_address_error = document.getElementById("pre_address_error");
	var per_address_error = document.getElementById("per_address_error");
	var password_error = document.getElementById("password_error");
	var c_password_error = document.getElementById("c_password_error");
	
	//login
	var username_error = document.getElementById("username_error");
	var pass_error = document.getElementById("pass_error");


	//.......................................................................//

	//signup
	f_name.addEventListener("blur" , f_nameVerify , true);
	l_name.addEventListener("blur" , l_nameVerify , true);
	email.addEventListener("blur" , emailVerify , true);
	mobile.addEventListener("blur" , mobileVerify , true);
	pre_address.addEventListener("blur" , pre_addressVerify , true);
	per_address.addEventListener("blur" , per_addressVerify , true);
	password.addEventListener("blur" , passwordVerify , true);
	c_password.addEventListener("blur" , c_passwordVerify , true);
	
	//login
	username.addEventListener("blur" , usernameVerify , true);
	pass.addEventListener("blur" , passVerify , true);


	//.......................................................................//

	
	function validate()
	{
		if(f_name.value == "")
		{
			f_name.style.border = "1px solid red";
			document.getElementById('f_name_div').style.color = "red";
			f_name_error.textContent = "First Name is Required";
			f_name.focus();
			return false;
		}
		if(l_name.value == "")
		{
			l_name.style.border = "1px solid red";
			document.getElementById('l_name_div').style.color = "red";
			l_name_error.textContent = "Last Name is Required";
			l_name.focus();
			return false;
		}
		if(email.value == "")
		{
			email.style.border = "1px solid red";
			document.getElementById('email_div').style.color = "red";
			email_error.textContent = "Email Name is Required";
			email.focus();
			return false;
		}
		if(mobile.value == "")
		{
			mobile.style.border = "1px solid red";
			document.getElementById('mobile_div').style.color = "red";
			mobile_error.textContent = "Mobile Number is Required";
			mobile.focus();
			return false;
		}
		
		if(pre_address.value == "")
		{
			pre_address.style.border = "1px solid red";
			document.getElementById('pre_address_div').style.color = "red";
			pre_address_error.textContent = "Present Address is Required";
			pre_address.focus();
			return false;
		}
		if(per_address.value == "")
		{
			per_address.style.border = "1px solid red";
			document.getElementById('per_address_div').style.color = "red";
			per_address_error.textContent = "Permanent Address is Required";
			per_address.focus();
			return false;
		}
		if(password.value == "")
		{
			password.style.border = "1px solid red";
			document.getElementById('password_div').style.color = "red";
			password_error.textContent = "password is Required";
			password.focus();
			return false;
		}
		if(c_password.value == "")
		{
			c_password.style.border = "1px solid red";
			document.getElementById('c_password_div').style.color = "red";
			c_password_error.textContent = "Confirm password is Required";
			c_password.focus();
			return false;
		}
		if(password.value != c_password.value)
		{
			password.style.border = "1px solid red";
			c_password.style.border = "1px solid red";
			document.getElementById('c_password_div').style.color = "red";
			c_password_error.textContent = "Password doesn't match";
			return false;

		}

	}

	function valid()
	{
		if(username.value == "")
		{
			username.style.border = "1px solid red";
			document.getElementById('username_div').style.color = "red";
			username_error.textContent = "Email is Required";
			username.focus();
			return false;
		}
		if(pass.value == "")
		{
			pass.style.border = "1px solid red";
			document.getElementById('pass_div').style.color = "red";
			pass_error.textContent = "Password is Required";
			pass.focus();
			return false;
		}	
	}



	function f_nameVerify()
	{
		if(f_name.value !="")
		{
			f_name.style.border = "1px solid #5e6e66";
			document.getElementById('f_name_div').style.color = "#5e6e66";
			f_name_error.innerHTML = "";
			return true;
		}
	}
	function l_nameVerify()
	{
		if(l_name.value !="")
		{
			l_name.style.border = "1px solid #5e6e66";
			document.getElementById('l_name_div').style.color = "#5e6e66";
			l_name_error.innerHTML = "";
			return true;
		}
	}
	function emailVerify()
	{
		if(email.value !="")
		{
			email.style.border = "1px solid #5e6e66";
			document.getElementById('email_div').style.color = "#5e6e66";
			email_error.innerHTML = "";
			return true;
		}
	}
	function mobileVerify()
	{
		if(mobile.value !="")
		{
			mobile.style.border = "1px solid #5e6e66";
			document.getElementById('mobile_div').style.color = "#5e6e66";
			mobile_error.innerHTML = "";
			return true;
		}
	}
	
	function pre_addressVerify()
	{
		if(pre_address.value !="")
		{
			pre_address.style.border = "1px solid #5e6e66";
			document.getElementById('pre_address_div').style.color = "#5e6e66";
			pre_address_error.innerHTML = "";
			return true;
		}
	}
	function per_addressVerify()
	{
		if(per_address.value !="")
		{
			per_address.style.border = "1px solid #5e6e66";
			document.getElementById('per_address_div').style.color = "#5e6e66";
			per_address_error.innerHTML = "";
			return true;
		}
	}
	function passwordVerify()
	{
		if(password.value !="")
		{
			password.style.border = "1px solid #5e6e66";
			document.getElementById('password_div').style.color = "#5e6e66";
			password_error.innerHTML = "";
			return true;
		}
	}
	function c_passwordVerify()
	{
		if(c_password.value !="")
		{
			c_password.style.border = "1px solid #5e6e66";
			document.getElementById('c_password_div').style.color = "#5e6e66";
			c_password_error.innerHTML = "";
			return true;
		}
	}
	
	function usernameVerify()
	{
		if(username.value !="")
		{
			username.style.border = "1px solid #5e6e66";
			document.getElementById('username_div').style.color = "#5e6e66";
			username_error.innerHTML = "";
			return true;
		}
	}
	
	function passVerify()
	{
		if(pass.value !="")
		{
			pass.style.border = "1px solid #5e6e66";
			document.getElementById('pass_div').style.color = "#5e6e66";
			pass_error.innerHTML = "";
			return true;
		}
	}
	


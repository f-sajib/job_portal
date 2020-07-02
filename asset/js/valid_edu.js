var degree = document.forms["eduform"]["degree[]"];
var year = document.forms["eduform"]["year[]"];
var board = document.forms["eduform"]["board[]"];
var institute = document.forms["eduform"]["institute[]"];
var result = document.forms["eduform"]["result[]"];


var degree_error = document.getElementById("degree_error");
var year_error = document.getElementById("year_error");
var board_error = document.getElementById("board_error");
var institute_error = document.getElementById("institute_error");
var result_error = document.getElementById("result_error");


degree.addEventListener("blur" , degreeVerify , true);
year.addEventListener("blur" , yearVerify , true);
board.addEventListener("blur" , boardVerify , true);
institute.addEventListener("blur" , instituteVerify , true);
result.addEventListener("blur" , resultVerify , true);

function validation()
	{
		if(degree.value == "")
		{
			degree.style.border = "1px solid red";
			document.getElementById('degree_div').style.color = "red";
			degree_error.textContent = "Required";
			degree.focus();
			return false;
		}
		if(year.value == "")
		{
			year.style.border = "1px solid red";
			document.getElementById('year_div').style.color = "red";
			year_error.textContent = "Required";
			year.focus();
			return false;
		}
		if(board.value == "")
		{
			board.style.border = "1px solid red";
			document.getElementById('board_div').style.color = "red";
			board_error.textContent = "Required";
			board.focus();
			return false;
		}
		if(institute.value == "")
		{
			institute.style.border = "1px solid red";
			document.getElementById('institute_div').style.color = "red";
			institute_error.textContent = "Required";
			institute.focus();
			return false;
		}
		if(result.value == "")
		{
			result.style.border = "1px solid red";
			document.getElementById('result_div').style.color = "red";
			result_error.textContent = "Required";
			result.focus();
			return false;
		}	
	}

	function degreeVerify()
	{
		if(degree.value !="")
		{
			degree.style.border = "1px solid #5e6e66";
			document.getElementById('degree_div').style.color = "#5e6e66";
			degree_error.innerHTML = "";
			return true;
		}
	}

	function yearVerify()
	{
		if(year.value !="")
		{
			year.style.border = "1px solid #5e6e66";
			document.getElementById('year_div').style.color = "#5e6e66";
			year_error.innerHTML = "";
			return true;
		}
	}
	function boardVerify()
	{
		if(board.value !="")
		{
			board.style.border = "1px solid #5e6e66";
			document.getElementById('board_div').style.color = "#5e6e66";
			board_error.innerHTML = "";
			return true;
		}
	}
	function instituteVerify()
	{
		if(institute.value !="")
		{
			institute.style.border = "1px solid #5e6e66";
			document.getElementById('institute_div').style.color = "#5e6e66";
			institute_error.innerHTML = "";
			return true;
		}
	}

	function resultVerify()
	{
		if(result.value !="")
		{
			result.style.border = "1px solid #5e6e66";
			document.getElementById('result_div').style.color = "#5e6e66";
			result_error.innerHTML = "";
			return true;
		}
	}
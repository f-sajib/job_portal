var company = document.forms["historyform"]["company[]"];
var designation = document.forms["historyform"]["designation[]"];
var department = document.forms["historyform"]["department[]"];
var responsibilites = document.forms["historyform"]["responsibilites[]"];

var company_error = document.getElementById("company_error");
var designation_error = document.getElementById("designation_error");
var department_error = document.getElementById("department_error");
var responsibilites_error = document.getElementById("responsibilites_error");

company.addEventListener("blur" , companyVerify , true);
designation.addEventListener("blur" , designationVerify , true);
department.addEventListener("blur" , departmentVerify , true);
responsibilites.addEventListener("blur" , responsibilitesVerify , true);

function validation()
{
	if(company.value == "")
		{
			company.style.border = "1px solid red";
			document.getElementById('company_div').style.color = "red";
			company_error.textContent = "Required";
			company.focus();
			return false;
		}
		if(designation.value == "")
		{
			designation.style.border = "1px solid red";
			document.getElementById('designation_div').style.color = "red";
			designation_error.textContent = "Required";
			designation.focus();
			return false;
		}
		if(department.value == "")
		{
			department.style.border = "1px solid red";
			document.getElementById('department_div').style.color = "red";
			department_error.textContent = "Required";
			department.focus();
			return false;
		}
		if(responsibilites.value == "")
		{
			responsibilites.style.border = "1px solid red";
			document.getElementById('responsibilites_div').style.color = "red";
			responsibilites_error.textContent = "Required";
			responsibilites.focus();
			return false;
		}
}


	function companyVerify()
	{
		if(company.value !="")
		{
			company.style.border = "1px solid #5e6e66";
			document.getElementById('company_div').style.color = "#5e6e66";
			company_error.innerHTML = "";
			return true;
		}
	}
	function designationVerify()
	{
		if(designation.value !="")
		{
			designation.style.border = "1px solid #5e6e66";
			document.getElementById('designation_div').style.color = "#5e6e66";
			designation_error.innerHTML = "";
			return true;
		}
	}
	function departmentVerify()
	{
		if(department.value !="")
		{
			department.style.border = "1px solid #5e6e66";
			document.getElementById('department_div').style.color = "#5e6e66";
			department_error.innerHTML = "";
			return true;
		}
	}
	function responsibilitesVerify()
	{
		if(responsibilites.value !="")
		{
			responsibilites.style.border = "1px solid #5e6e66";
			document.getElementById('responsibilites_div').style.color = "#5e6e66";
			responsibilites_error.innerHTML = "";
			return true;
		}
	}



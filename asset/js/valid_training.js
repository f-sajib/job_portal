var title = document.forms["trainform"]["title[]"];
var institution = document.forms["trainform"]["institution[]"];
var location = document.forms["trainform"]["location[]"];
var topic = document.forms["trainform"]["topic[]"];
var duration = document.forms["trainform"]["duration[]"];
var year = document.forms["trainform"]["year[]"];




var title_error = document.getElementById("title_error");
var institution_error = document.getElementById("institution_error");
var location_error = document.getElementById("location_error");
var topic_error = document.getElementById("topic_error");
var duration_error = document.getElementById("duration_error");
var year_error = document.getElementById("year_error");



title.addEventListener("blur" , titleVerify , true);
institution.addEventListener("blur" , institutionVerify , true);
location.addEventListener("blur" , locationVerify , true);
topic.addEventListener("blur" , topicVerify , true);
duration.addEventListener("blur" , durationVerify , true);
year.addEventListener("blur" , yearVerify , true);

function validation()
	{
		if(title.value == "")
		{
			title.style.border = "1px solid red";
			document.getElementById('title_div').style.color = "red";
			title_error.textContent = "Required";
			title.focus();
			return false;
		}
		if(institution.value == "")
		{
			institution.style.border = "1px solid red";
			document.getElementById('institution_div').style.color = "red";
			institution_error.textContent = "Required";
			institution.focus();
			return false;
		}
		if(location.value == "")
		{
			location.style.border = "1px solid red";
			document.getElementById('location_div').style.color = "red";
			location_error.textContent = "Required";
			location.focus();
			return false;
		}
		if(topic.value == "")
		{
			topic.style.border = "1px solid red";
			document.getElementById('topic_div').style.color = "red";
			topic_error.textContent = "Required";
			topic.focus();
			return false;
		}
		if(duration.value == "")
		{
			duration.style.border = "1px solid red";
			document.getElementById('duration_div').style.color = "red";
			duration_error.textContent = "Required";
			duration.focus();
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
	}

	function titleVerify()
	{
		if(title.value !="")
		{
			title.style.border = "1px solid #5e6e66";
			document.getElementById('title_div').style.color = "#5e6e66";
			title_error.innerHTML = "";
			return true;
		}
	}

	function institutionVerify()
	{
		if(institution.value !="")
		{
			institution.style.border = "1px solid #5e6e66";
			document.getElementById('institution_div').style.color = "#5e6e66";
			institution_error.innerHTML = "";
			return true;
		}
	}
	function locationVerify()
	{
		if(location.value !="")
		{
			location.style.border = "1px solid #5e6e66";
			document.getElementById('location_div').style.color = "#5e6e66";
			location_error.innerHTML = "";
			return true;
		}
	}
	function topicVerify()
	{
		if(topic.value !="")
		{
			topic.style.border = "1px solid #5e6e66";
			document.getElementById('topic_div').style.color = "#5e6e66";
			topic_error.innerHTML = "";
			return true;
		}
	}

	function durationVerify()
	{
		if(duration.value !="")
		{
			duration.style.border = "1px solid #5e6e66";
			document.getElementById('duration_div').style.color = "#5e6e66";
			duration_error.innerHTML = "";
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
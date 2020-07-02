<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Welcome extends CI_Controller {

  	public function __construct()
    {
        parent::__construct();
		$this->load->model('Model_saveuser');
		$this->load->model('Model_employee');
		$this->load->model('Model_welcome');
		$this->load->library('pagination');
		
	}
    
	
	//Web front page WEBSITE// 
	public function index()
	{
		
        $this->session->userdata('loggedin');
        $data['user'] = $this->db->query("SELECT * FROM user ORDER BY RAND()");
        $data['employee'] = $this->db->query("SELECT * FROM employee ORDER BY RAND()");
        $data['job'] = $this->db->query("SELECT a.c_name, a.logo,b.*,c.salary FROM employee a RIGHT JOIN job_general_info b ON(a.id=b.emp_id) LEFT JOIN job_benifit_info c ON(b.id=c.job_id) WHERE b.state='2' GROUP BY b.id");
        $data['categorys']= $this->db->query("SELECT * FROM job_category")->result();
        $this->load->view('index', $data);

	}
	public function search()
	{ 
		$cat_id = $this->input->post("category");
		$string = $this->input->post("string");
		$division = $this->input->post("division");
		if($cat_id !='' && $string =='' && $division =='') {
			$data['joblist'] = $this->db->query("SELECT a.id,a.title,a.deadline,a.location,b.experience,c.education FROM job_general_info a LEFT JOIN job_requirment_info b ON(b.job_id=a.id) LEFT JOIN job_edu_info c ON(c.job_id=a.id) WHERE a.state=2 AND a.job_cat=$cat_id")->result();
			$data['cat'] = $this->db->query("SELECT category FROM job_category WHERE id=$cat_id")->row();
		}
		else if($string !='' && $cat_id=='' && $division =='') {
			$data['joblist'] = $this->db->query("SELECT a.id,a.title,a.deadline,a.location,b.experience,c.education FROM job_general_info a LEFT JOIN job_requirment_info b ON(b.job_id=a.id) LEFT JOIN job_edu_info c ON(c.job_id=a.id) WHERE a.state=2 AND a.title like '%$string%'")->result();
		}
		else if($string =='' && $cat_id=='' && $division !='') {
			$data['joblist'] = $this->db->query("SELECT a.id,a.title,a.deadline,a.location,b.experience,c.education FROM job_general_info a LEFT JOIN job_requirment_info b ON(b.job_id=a.id) LEFT JOIN job_edu_info c ON(c.job_id=a.id) WHERE a.state=2 AND a.division='$division'")->result();
		}
		else if($string =='' && $cat_id!='' && $division !='') {
			$data['joblist'] = $this->db->query("SELECT a.id,a.title,a.deadline,a.location,b.experience,c.education FROM job_general_info a LEFT JOIN job_requirment_info b ON(b.job_id=a.id) LEFT JOIN job_edu_info c ON(c.job_id=a.id) WHERE a.state=2 AND a.job_cat=$cat_id AND a.division='$division'")->result();
			$data['cat'] = $this->db->query("SELECT category FROM job_category WHERE id=$cat_id")->row();
		}
		else if($string !='' && $cat_id=='' && $division !='') {
			$data['joblist'] = $this->db->query("SELECT a.id,a.title,a.deadline,a.location,b.experience,c.education FROM job_general_info a LEFT JOIN job_requirment_info b ON(b.job_id=a.id) LEFT JOIN job_edu_info c ON(c.job_id=a.id) WHERE a.state=2 AND a.division='$division' AND a.title like '%$string%'")->result();
		}
		else if($string !='' && $cat_id!='' && $division =='') {
			$data['joblist'] = $this->db->query("SELECT a.id,a.title,a.deadline,a.location,b.experience,c.education FROM job_general_info a LEFT JOIN job_requirment_info b ON(b.job_id=a.id) LEFT JOIN job_edu_info c ON(c.job_id=a.id) WHERE a.state=2 AND a.job_cat=$cat_id AND a.title like '%$string%'")->result();
			$data['cat'] = $this->db->query("SELECT category FROM job_category WHERE id=$cat_id")->row();
		}
		else if($string !='' && $cat_id !='' && $division !='') {
			$data['joblist'] = $this->db->query("SELECT a.id,a.title,a.deadline,a.location,b.experience,c.education FROM job_general_info a LEFT JOIN job_requirment_info b ON(b.job_id=a.id) LEFT JOIN job_edu_info c ON(c.job_id=a.id) WHERE a.state=2 AND a.title like '%$string%' AND a.job_cat=$cat_id AND a.division='$division'")->result();
			$data['cat'] = $this->db->query("SELECT category FROM job_category WHERE id=$cat_id")->row();
		}
		else if($string =='' && $cat_id =='' && $division =='') {
			$data['joblist'] = $this->db->query("SELECT a.id,a.title,a.deadline,a.location,b.experience,c.education FROM job_general_info a LEFT JOIN job_requirment_info b ON(b.job_id=a.id) LEFT JOIN job_edu_info c ON(c.job_id=a.id) WHERE a.state=2")->result();
		}


		$this->load->view("search",$data);
	}
	public function livesearch()
	{
		$this->load->view("livesearch");
	}
	public function count_all_data()
	{
	 	$result = $this->db->query("SELECT * FROM job_general_info WHERE state=2")->result();
	 	return count($result);
	}
	public function livesearch_data()
	{
		$job_type = $this->input->post("job_type");
		$division = $this->input->post("division");
		$salary = $this->input->post("salary");
		$column = array('title', 'status', 'division', 'location', 'vacancy', 'deadline', 'salary');
		$query = "SELECT a.title,a.status,a.division,a.location,a.vacancy,a.deadline,b.salary FROM job_general_info a LEFT JOIN job_benifit_info b ON(a.id=b.job_id) WHERE state=2";

		if(isset($job_type, $division, $salary) && $job_type != '' && $division != '' && $salary != '') {
			if($salary == 1) {
				$query .= '  AND a.status = "'.$job_type.'" AND a.division = "'.$division.'" AND b.salary <=20000';
			} elseif($salary == 2) {
				$query .= '  AND a.status = "'.$job_type.'" AND a.division = "'.$division.'" AND b.salary BETWEEN 21000 AND 40000';
			} elseif($salary == 3) {
				$query .= '  AND a.status = "'.$job_type.'" AND a.division = "'.$division.'" AND AND b.salary > 40000';
			}	 		
	 	} elseif ($job_type != '' && $division == '' && $salary == '') {
	 		$query .= '  AND a.status = "'.$job_type.'"';	
	 	} elseif ($job_type == '' && $division != '' && $salary == '') {
	 		$query .= '  AND a.division = "'.$division.'"';
	 	} elseif ($job_type == '' && $division == '' && $salary != '') {
	 		if($salary == 1) {
				$query .= ' AND b.salary <=20000';
			} elseif($salary == 2) {
				$query .= ' AND b.salary BETWEEN 21000 AND 40000';
			} elseif($salary == 3) {
				$query .= ' AND b.salary > 40000';
			}
	 	} elseif ($job_type != '' && $division != '' && $salary == '') {
	 		$query .= '  AND a.status = "'.$job_type.'" AND a.division = "'.$division.'"';
	 	} elseif ($job_type != '' && $division == '' && $salary != '') {
	 		if($salary == 1) {
				$query .= ' AND a.status = "'.$job_type.'" AND b.salary <=20000';
			} elseif($salary == 2) {
				$query .= ' AND a.status = "'.$job_type.'" AND b.salary BETWEEN 21000 AND 40000';
			} elseif($salary == 3) {
				$query .= ' AND a.status = "'.$job_type.'" AND b.salary > 40000';
			}
	 	}
	 	elseif ($job_type == '' && $division != '' && $salary != '') {
	 		if($salary == 1) {
				$query .= ' AND a.division = "'.$division.'" AND b.salary <=20000';
			} elseif($salary == 2) {
				$query .= ' AND a.division = "'.$division.'" AND b.salary BETWEEN 21000 AND 40000';
			} elseif($salary == 3) {
				$query .= ' AND a.division = "'.$division.'" AND b.salary > 40000';
			}
	 	}

		if(isset($_POST['order'])) {
	 		$query .= ' ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
		} else {
	 		$query .= ' ORDER BY a.id DESC ';
		}
		$query1 = '';

		if($_POST["length"] != -1) {
	 		$query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}
		$result1 = $this->db->query($query)->result();
		$number_filter_row = count($result1);
		$result = $this->db->query($query . $query1)->result();

		$data = array();
		foreach($result as $row) {
		 	$sub_array = array();
		 	$sub_array[] = $row->title;
		 	$sub_array[] = $row->status;
		 	$sub_array[] = $row->division;
		 	$sub_array[] = $row->location;
		 	$sub_array[] = $row->vacancy;
		 	$sub_array[] = $row->salary;
		 	$sub_array[] = $row->deadline;
		 	$data[] = $sub_array;
		}		
		$output = array(
 			"draw"       =>  intval($_POST["draw"]),
 			"recordsTotal"   =>  $this->count_all_data(),
 			"recordsFiltered"  =>  $number_filter_row,
 			"data"       =>  $data
		);

		echo json_encode($output);	 	
	}
	public function view_info1()
	{
		$id=$this->input->post("id");

		$result = $this->db->query("SELECT * FROM user WHERE id=$id")->row();

		echo '<h4 style="color:green;">'.$result->f_name.' '.$result->l_name;
        echo '</h4><br><b>Email</b> :'.$result->email;
        echo '<br><b>Skill</b> :'.$result->skill;
        echo '<br><b>Career objective</b> :'.$result->objective;
        echo '<div class="pull-right"><img height="150" src="'.base_url().'asset/img/'.$result->photo.'"></div>';
        
	}

	public function view_info2()
	{
		$id=$this->input->post("id");

		$result = $this->db->query("SELECT * FROM employee WHERE id=$id")->row();

		echo '<h4 style="color:green;">'.$result->c_name;
        echo '</h4><br><b>Email</b> :'.$result->c_email;
        echo '<br><b>Phone</b> :'.$result->c_mobile;
        echo '<br><b>About Company</b> :'.$result->c_company;        
	}
	public function job($job_id)
	{
		$this->session->userdata('loggedin');
		$data['details']= $this->db->query("SELECT a.*,b.*,c.*,d.*,e.* FROM job_general_info a LEFT JOIN job_edu_info b ON(a.id=b.job_id) LEFT JOIN job_requirment_info c ON(a.id=c.job_id) LEFT JOIN job_benifit_info d ON(a.id=d.job_id) LEFT JOIN employee e ON(a.emp_id=e.id) WHERE a.id=$job_id")->row();
		$this->load->view('job',$data);
	}
	public function applyjob()
	{
		$job_id = $this->input->post('id');
		$user_id = $this->input->post('user_id');
		$emp_id = $this->input->post('emp_id');
		$cv = $this->db->query("SELECT cv FROM user WHERE id=$user_id")->row('cv');

		$data=array();
		$data['job_id'] = $job_id;
		$data['user_id'] = $user_id;
		$data['emp_id'] = $emp_id;
		$data['cv'] = $cv;
		$result=$this->db->insert('cv_bank',$data);		
		if($result) {
            echo $ids="1";
        }
		

	}
	public function jobseeker()
	{
        $this->session->userdata('loggedin');
        $query = $this->input->post("tags");
        if (isset($query) && !empty($query)) {
        	$search6 = str_replace(",", "|", $query);
 			$search5 = str_replace('"', '', $search6);
 			$search4 = str_replace('[', '', $search5);
 			$search3 = str_replace(']', '', $search4);
 			$search2 = str_replace('{', '', $search3);
 			$search1 = str_replace('}', '', $search2);
 			$search =  str_replace('value:', '', $search1);
 			$data['seeker'] = $this->db->query("SELECT * FROM user WHERE skill REGEXP '".$search."'")->result();
        } else {
        	$data['seeker']= $this->db->query("SELECT * FROM user")->result();
        }        
        $this->load->view('jobseeker',$data);
    }
    public function jobseeker_details($id)
	{
        $this->session->userdata('loggedin');
        $data['details']= $this->db->query("SELECT id,f_name,l_name,email,pre_address,objective,skill,photo FROM user WHERE id=$id")->row();
        $data['edu'] = $this->db->query("SELECT * FROM user_edu WHERE user_id=$id")->result();
        $data['work'] = $this->db->query("SELECT * FROM user_emphistory WHERE user_id=$id")->result();
        $data['training'] = $this->db->query("SELECT * FROM user_training WHERE user_id=$id")->result();
        $this->load->view('jobseeker_details',$data);
    }
    public function notify_user()
    {
    	$user_id = $this->input->post("user_id");
    	$emp_id = $this->input->post("emp_id");
    	$message = "A new Notification from company";
    	$dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
    	$data = array();
    	$data['user_id'] = $user_id;
    	$data['emp_id'] = $emp_id;
    	$data['message'] = $message;
    	$data['reading'] = 0;
    	$data['date'] = $dt->format('F j, Y, g:i a');
    	$result = $this->db->insert('notification',$data);
    	if ($result) {
    		echo"ok";
    	}
    }
    public function notify()
    {
    	$user_id = $this->input->post("user_id");
    	$data['total'] = $this->db->query("SELECT * FROM notification WHERE user_id=$user_id AND reading=0")->result();
    	$total_msg = count($data['total']);
    	echo $total_msg;
    }
    public function notify1()
    {
    	$id = $this->input->post("id");
    	$data['reading'] = 1;
    	$this->db->where('id', $id);
		$this->db->update('notification', $data);
    	echo $id;
    }
	
	public function Employeers()
	{

		$this->session->userdata('loggedin');
		$data['job'] = $this->db->query("SELECT a.c_name,a.id, COUNT(b.state) as count FROM employee a LEFT JOIN job_general_info b ON(a.id=b.emp_id) AND b.state=2 GROUP BY a.id")->result();
		$this->load->view('employeers', $data);
	}
	public function joblist($id)
	{

		$data['company'] = $this->db->query("SELECT c_name,c_company,c_address FROM employee WHERE id=$id")->row();
		$data['joblist'] = $this->db->query("SELECT a.id,a.title,a.deadline,a.location,b.experience,c.education FROM job_general_info a LEFT JOIN job_requirment_info b ON(b.job_id=a.id) LEFT JOIN job_edu_info c ON(c.job_id=a.id) WHERE a.state=2 AND a.emp_id=$id")->result();
		$this->load->view('joblist',$data);
	}
	public function Contact()
	{
		$this->session->userdata('loggedin');
		$this->load->view('contact');
	}


	//user signup
	public function signUp()
	{		
		//get user inputs
		$email = $this->input->post('email');
		$password = $this->input->post('password');


		//generate random code
		$set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$code = substr(str_shuffle($set), 0, 12);

		//get inserted user id
	 	$id = $this->Model_saveuser->saveUser($code);

	 	//set up email
		$config = array(
	  		'protocol'  => 'smtp',
	  		'smtp_host' => 'mail.careeragebd.com',
	  		'smtp_port' => 587,
	  		'smtp_user' => 'test@careeragebd.com', 
	  		'smtp_pass' => 'Sajib!@#$%54321', 
	  		'mailtype'  => 'html',
	  		'charset'   => 'utf-8',
	  		'wordwrap'  => TRUE
		);

		$message = 	"
					<html>
					<head>
						<title>Verification Code</title>
					</head>
					<body>
						<h2>Thank you for Registering.</h2>
						<p>Your Account:</p>
						<p>Email: ".$email."</p>
						<p>Password: ".$password."</p>
						<p>Please click the link below to activate your account.</p>
						<h4><a href='".base_url()."Welcome/activate/".$id."/".$code."'>Activate My Account</a></h4>
					</body>
					</html>";
	 		
		    $this->load->library('email', $config);
		    $this->email->set_newline("\r\n");
		    $this->email->from($config['smtp_user']);
		    $this->email->to($email);
		    $this->email->subject('Signup Verification Email');
		    $this->email->message($message);


		    //sending email
		    if($this->email->send()) {
		    	$this->session->set_flashdata('message','Activation code sent to email<br>Please check your Spam mail if you can not find your mail in inbox');
		    } else {
		    	$this->session->set_flashdata('message', $this->email->print_debugger());	 
		    }

	 	redirect('Welcome');

	}
	public function uniqeEmail()
	{
		$email = $this->input->post("email");
		$c_email = $this->input->post("c_email");
		if($email!='') {
		   $result = $this->db->query("SELECT email FROM user WHERE email='$email'")->row('email');
		} else {
		   $result = $this->db->query("SELECT c_email FROM employee WHERE c_email='$c_email'")->row('c_email');
		}
		

		if($result != '')
		{
			echo "0";
			
		} else {
			echo "1";

		}
	}

	//user account activate
	public function activate()
	{
		$id =  $this->uri->segment(3);
		$code = $this->uri->segment(4);

		//fetch user details
		$user = $this->Model_saveuser->getUser($id);
		//fetch employee details
		$employee = $this->Model_employee->getEmployee($id);

		//if code matches
		if($user['code'] == $code ) {
			//update user active status
			$data['active'] = true;
			$query = $this->Model_saveuser->activate($data, $id);
			if($query) {
				$this->session->set_flashdata('message', 'User activated successfully');
			} else {
				$this->session->set_flashdata('message', 'Something went wrong in activating account');
			}
		} elseif($employee['code'] == $code) {
		    $data['active'] = true;
		    $query = $this->Model_employee->activate($data, $id);
		    if($query) {
				$this->session->set_flashdata('message', 'User activated successfully');
			} else {
				$this->session->set_flashdata('message', 'Something went wrong in activating account');
			}
		    
		} else {
			$this->session->set_flashdata('message', 'Cannot activate account. Code didnt match');
		}
		redirect('Welcome');
	}

	//employee signup
	public function company_signUp()
	{
		
		//get user inputs
		$email = $this->input->post('c_email');
		$password = $this->input->post('pass');
		//generate simple random code
		$set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$code = substr(str_shuffle($set), 0, 12);
		$id = $this->Model_employee->saveEmployee($code);
		//set up email
		$config = array(
	  		'protocol'  => 'smtp',
	  		'smtp_host' => 'mail.careeragebd.com',
	  		'smtp_port' =>  587,
	  		'smtp_user' => 'test@careeragebd.com', 
	  		'smtp_pass' => 'Sajib!@#$%54321', 
	  		'mailtype'  => 'html',
	  		'charset'   => 'utf-8',
	  		'wordwrap'  => TRUE
		);
		$message = 	"
					<html>
					<head>
						<title>Verification Code</title>
					</head>
					<body>
						<h2>Thank you for Registering.</h2>
						<p>Your Account:</p>
						<p>Email: ".$email."</p>
						<p>Password: ".$password."</p>
						<p>Please click the link below to activate your account.</p>
						<h4><a href='".base_url()."Welcome/activate/".$id."/".$code."'>Activate My Account</a></h4>
					</body>
					</html>";
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$this->email->from($config['smtp_user']);
		$this->email->to($email);
		$this->email->subject('Signup Verification Email');
		$this->email->message($message);
		 //sending email
	    if ($this->email->send()) {
	    	$this->session->set_flashdata('message','Activation code sent to email<br>Please check your Spam mail if you can not find your email in inbox');
	    } else {
	    	$this->session->set_flashdata('message', $this->email->print_debugger());	 
	    }
	    redirect('Welcome');
	 	
	}

	public function signIn()
	{
		$email = $this->input->post('username');
        $pass = md5($this->input->post('pass'));

        
        if($this->input->post('type') == 1) {
        	$checkUser = $this->Model_saveuser->checkValidUser($email, $pass);
        } else {
        	$checkEmployee = $this->Model_employee->checkValidEmployee($email, $pass);	
        }  
    
    	if($checkUser) {    	   	
    	   	if ($checkUser->active == 1) {
    	   		$user_id = $this->session->set_userdata("user_id", $checkUser->id);
    	   		$name = $this->session->set_userdata("name", $checkUser->f_name);    	   		  		
            	$this->session->set_userdata("loggedin",TRUE);
				redirect('Dashboard');
    	   	} else {
    	   		$this->session->set_flashdata('message', 'Your Account is not activate');
    			redirect("Welcome");
    	   	}    		
    	} elseif($checkEmployee) {   	    
    	    if($checkEmployee->active == 1) {
    	        $emp_id = $this->session->set_userdata("emp_id", $checkEmployee->id);
    		    $this->session->set_userdata("loggedin",TRUE);
    		    redirect('Empdashboard');
    	    } else {
    	   		$this->session->set_flashdata('message', 'Your Account is not activate');
    			redirect("Welcome");
    	   	}  	
    	} else {
    		$this->session->set_flashdata('message', 'Email or password is wrong');
    		redirect("Welcome");
    	}
	}
	 public function logOut()
  	{
	    if ($this->session->userdata('user_id') || $this->session->userdata('emp_id')) 
	    	{
	            $this->session->unset_userdata('user_id');
	            $this->session->unset_userdata('emp_id');
	            $this->session->unset_userdata('f_name');
				$this->session->unset_userdata('dashboard/index');
	            /* Session is being destoyed , newly added this line--*/
	            $this->session->sess_destroy();
	            redirect('Welcome');
	        } else {
	            redirect("Welcome");
	        }
 	}
}

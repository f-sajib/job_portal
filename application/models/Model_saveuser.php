<?php

class Model_saveuser extends CI_Model 
{


	public function __construct() 
	{
		parent::__construct();
		
	}

	function saveUser($code)

	{

		$data=array();

		$data['f_name']		=$this->input->post('f_name');
		$data['l_name']		=$this->input->post('l_name');
		$data['email']		=$this->input->post('email');
		$data['mobile']		=$this->input->post('mobile');
		$data['pre_address']=$this->input->post('pre_address');
		$data['per_address']=$this->input->post('per_address');
		$data['photo']		=$this->input->post('photo');
		$data['level']		=$this->input->post('level');
		$data['password']	=md5($this->input->post('password'));
		$data['code'] 		= $code;
		$data['active'] 	= false;

		$this->db->insert('user',$data);
		return $this->db->insert_id();

	}

	public function getUser($id)
	{
		$query = $this->db->get_where('user',array('id'=>$id));
		return $query->row_array();
	}

	public function activate($data, $id)
	{
		$this->db->where('user.id', $id);
		return $this->db->update('user', $data);
	}
	
	function checkValidUser($email, $pass)
	{
			
		$level = 1;	

		$this->db->select('*');
	    $this->db->from('user');
	    $this->db->where('email', $email);
	    $this->db->where('password', $pass);
	    $this->db->where('level', $level);
	    $result = $this->db->get()->row();
	   
	    return $result;	   
	}

	public function activeUserAccount()
	{
		
		
		$this->db->select('*');
	    $this->db->from('user');
	    $this->db->where('active',1);
	    $result = $this->db->get()->row();
	    return $result;
	}
	
	function loggedin() 
	{
        return (bool) $this->session->userdata('loggedin');
	}

    function updateUser()
    {

	    $id=$this->session->userdata('user_id');
	    $data=array();
	  

	     if($_FILES['pic']['name']!="")
	       {
	          $id=$this->session->userdata('user_id');
	          $config['upload_path'] = './asset/img/';
	          $config['allowed_types'] = 'gif|jpg|jpeg|png|PNG|JPEG|JPG';
	          $this->load->library('upload', $config);
	          if ($this->upload->do_upload("pic"))
	              {
	                  $upload_info = $this->upload->data();
	                  $config['image_library'] = 'gd2';
	                  $config['source_image'] = './asset/img/' . $upload_info['file_name'];
	                  $config['maintain_ratio'] = FALSE;
	                  $this->load->library('image_lib', $config);
	                  $this->image_lib->resize();

	                  $data['photo']=$upload_info['file_name'];
	              }
	          }

				$data['f_name']=$this->input->post('edit_f_name');
				$data['l_name']=$this->input->post('edit_l_name');
				$data['email']=$this->input->post('edit_email');
				$data['mobile']=$this->input->post('edit_mobile');
				$data['father']=$this->input->post('edit_father');
				$data['mother']=$this->input->post('edit_mother');
				$data['date_of_birth']=$this->input->post('dob');
				$data['gender']=$this->input->post('gender');
				$data['pre_address']=$this->input->post('edit_pre_address');
				$data['per_address']=$this->input->post('edit_per_address');
				

				$this->db->WHERE('id',$id);
				$result = $this->db->update('user',$data);
				return $result;

				
	}
	public function updateUserExtra() {
		$id=$this->session->userdata('user_id');
		$skill = implode(",", array_filter($this->input->post('skill')));
		$inetrest = implode(",", array_filter($this->input->post('interest')));
		$data = array();

		$data['objective']=$this->input->post('obj');
		$data['skill']=$skill;
		$data['interest']=$inetrest;

		$this->db->WHERE('id',$id);
		$result = $this->db->update('user',$data);
		return $result;
	}
	
	function insertUserEdu() 
	{
        foreach($_POST["user_id"] as $row =>  $user)
			{
				$data=array();
				$data["user_id"]		=$user;
				$data["degree"]			=$_POST['degree'][$row];
				$data["year"]			=$_POST['year'][$row];
				$data["board"]			=$_POST['board'][$row];
				$data["institute"]		=$_POST['institute'][$row];
				$data["result"]			=$_POST['result'][$row];
			 	$result = $this->db->insert('user_edu',$data);
			}
			return $result;
    }

    function updateUserEdu()
    {
    	foreach($_POST["p_id"] as $row1 =>  $user)
            {
                $data1=array();
                $data1["degree"]            =$_POST['degree'][$row1];
                $data1["year"]              =$_POST['year'][$row1];
                $data1["board"]             =$_POST['board'][$row1];
                $data1["institute"]         =$_POST['institute'][$row1];
                $data1["result"]            =$_POST['result'][$row1];
                $result = $this->db->where('id',$user)->update('user_edu',$data1);
            }
            return $result;
    }

    function insertUserTraining() 
	{
        foreach($_POST["user_id"] as $row =>  $user)
			{
				$data=array();
				$data["user_id"]			=$user;
				$data["title"]				=$_POST['title'][$row];
				$data["institution"]		=$_POST['institution'][$row];
				$data["location"]			=$_POST['location'][$row];
				$data["topics"]				=$_POST['topic'][$row];
				$data["duration"]			=$_POST['duration'][$row];
				$data["year"]				=$_POST['year'][$row];
			 	$result = $this->db->insert('user_training',$data);
			}
			return $result;
    }
    
    function updateUserTraining()
    {
    	
    	foreach($_POST["t_id"] as $row1 =>  $user)
            {
                $data1=array();
                $data1["title"]            	=$_POST['title'][$row1];
                $data1["institution"]      	=$_POST['institution'][$row1];
                $data1["location"]         	=$_POST['location'][$row1];
                $data1["topics"]         	=$_POST['topic'][$row1];
                $data1["duration"]			=$_POST['duration'][$row1];
				$data1["year"]				=$_POST['year'][$row1];
                $result = $this->db->where('id',$user)->update('user_training',$data1);
            }
            return $result;
    }

    function insertUserHistory()
    {
    	
    	
    	foreach($_POST["user_id"] as $row =>  $user) 
    		{
				$data=array();
				$data["user_id"]			=$user;
				$data["company"]			=$_POST['company'][$row];
				$data["designation"]		=$_POST['designation'][$row];
				$data["department"]			=$_POST['department'][$row];
				$data["responsibilites"]	=$_POST['responsibilites'][$row];
				$data["d_from"]				=$_POST['d_from'][$row];
				$data["d_to"]				=$_POST['d_to'][$row];
			 	$result = $this->db->insert('user_emphistory',$data);
			}
			return $result;
    }

     function updateEmpHistory()
    {
    	
    	foreach($_POST["e_id"] as $row1 =>  $user)
            {
                $data1=array();
                $data1["company"]            =$_POST['company'][$row1];
                $data1["designation"]      	 =$_POST['designation'][$row1];
                $data1["department"]         =$_POST['department'][$row1];
                $data1["responsibilites"]    =$_POST['responsibilites'][$row1];
                $data1["d_from"]			 =$_POST['d_from'][$row1];
				$data1["d_to"]				 =$_POST['d_to'][$row1];
                $result = $this->db->where('id',$user)->update('user_emphistory',$data1);
            }
            return $result;
    }
    public function uploadCv()
    {
    	$id=$this->session->userdata('user_id');
	    $data=array();  
	    if ($_FILES['pdf']['name']!="") {
            $id=$this->session->userdata('user_id');
            $config['upload_path'] = './asset/cvpdf/';
            $config['allowed_types'] = 'pdf|doc';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload("pdf")) {
                $upload_info = $this->upload->data();
                $config['image_library'] = 'gd2';
                $config['source_image'] = './asset/cvpdf/'.$upload_info['file_name'];
                $config['maintain_ratio'] = FALSE;
                $this->load->library('image_lib', $config);
                $data['cv']=$upload_info['file_name'];
            }
	    }
	    $this->db->set($data);
	    $this->db->WHERE('id',$id);
		$result = $this->db->update('user',$data);
		return $result;
    }

}




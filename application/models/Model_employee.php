<?php

class Model_employee extends CI_Model 
{


	public function __construct() 
	{
		parent::__construct();
		
	}

	function saveEmployee($code)
	{
		$data=array();

		$data['c_name']=$this->input->post('c_name');
		$data['c_email']=$this->input->post('c_email');
		$data['c_mobile']=$this->input->post('c_mobile');
		$data['c_phone']=$this->input->post('c_phone');
		$data['c_address']=$this->input->post('c_address');
		$data['c_trade_license']=$this->input->post('c_trade_license');
		$data['logo']=$this->input->post('logo');
		$data['level']=$this->input->post('level');
		$data['password']=md5($this->input->post('pass'));
		$data['code'] 		= $code;
		$data['active'] 	= false;

		$this->db->insert('employee',$data);
		return $this->db->insert_id();
	}
	public function getEmployee($id)
	{
		$query = $this->db->get_where('employee',array('id'=>$id));
		return $query->row_array();
	}
	public function activate($data, $id)
	{
		$this->db->where('employee.id', $id);
		return $this->db->update('employee', $data);
	}

	function checkValidEmployee($email, $pass)
	{
		
		$level = 2;

		$this->db->select('*');
	    $this->db->from('employee');
	    $this->db->where('c_email', $email);
	    $this->db->where('password', $pass);
	    $this->db->where('level', $level);
	    $result = $this->db->get()->row();
	   
	    return $result;
	}
	
	public function activeEmployeeAccount()
	{
		
		$this->db->select('*');
	    $this->db->from('employee');
	    $this->db->where('active',1);
	    $result = $this->db->get()->row();
	    return $result;
	}

	public function updateCprofile()
	{
		$id=$this->session->userdata('emp_id');
		$data= array();

		if($_FILES['logo']['name']!="")
	       {
	          $id=$this->session->userdata('emp_id');
	          $config['upload_path'] = './asset/img/';
	          $config['allowed_types'] = 'gif|jpg|jpeg|png|PNG|JPEG|JPG';
	          $this->load->library('upload', $config);
	          if ($this->upload->do_upload("logo"))
	              {
	                  $upload_info = $this->upload->data();
	                  $config['image_library'] = 'gd2';
	                  $config['source_image'] = './asset/img/' . $upload_info['file_name'];
	                  $config['maintain_ratio'] = FALSE;
	                  $this->load->library('image_lib', $config);
	                  $this->image_lib->resize();

	                  $data['logo']=$upload_info['file_name'];
	              }
	          }

		$data['c_name'] = $this->input->post('c_name');
		$data['c_email'] = $this->input->post('c_email');
		$data['c_mobile'] = $this->input->post('c_mobile');
		$data['c_trade_license'] = $this->input->post('c_trade_license');
		$data['c_address'] = $this->input->post('c_address');
		$data['c_company'] = $this->input->post('c_company');

		$this->db->WHERE('id',$id);
		$result = $this->db->update('employee',$data);
		return $result;
	}

	public function job_insert($data,$data1,$data2,$data3)
	{

		// for($i=0; $i<count($field_1); $i++ )
		// 	{
		// 		$data2[]=array(				
		// 			'responsibility'	=> $field_1[$i]['responsibilities'],
		// 		);
		// 	}

		try {
			$this->db->insert('job_general_info',$data);
			$job_id = $this->db->insert_id();
			$data1['job_id']=  $job_id;
			$this->db->insert('job_edu_info',$data1);
			// for($i=0; $i<count($field_1); $i++ )
			// {
			// 	$this->db->insert('job_requirment_info',$data2[$i]);
			// }
			$data2['job_id']=  $job_id;
			$this->db->insert('job_requirment_info',$data2);
			$data3['job_id']=  $job_id;
			$this->db->insert('job_benifit_info',$data3);
			return 'success';
		} catch(Exception $e) {
			return 'failed';
		}
	}
	public function draftJob($emp_id)
	{
	 	$this->db->select('a.*');
    	$this->db->from('job_general_info a'); 
       	// $this->db->join(' job_edu_info b', 'b.job_id=a.id', 'left');
       	// $this->db->join(' job_requirment_info c', 'c.job_id=a.id', 'left');
       	// $this->db->join(' job_benifit_info d', 'd.job_id=a.id', 'left');
       	$this->db->where('a.state',1);
       	$this->db->where('a.emp_id',$emp_id);
       	$query = $this->db->get();
       	if($query->num_rows() > 0) {
       	     return $query->result();
       	} else {
       	    
       	}
	}
	public function postedJob($emp_id)
	{
	 	$date = date('Y-m-d');
	 	$this->db->select('*');
    	$this->db->from('job_general_info');
       	$this->db->where('state',2);
       	$this->db->where('emp_id',$emp_id);
       	$this->db->where('deadline >=', $date);
       	$query = $this->db->get();
       	if($query->num_rows() > 0) {       		
       	     return $query->result();
       	} else {

       	}
	}
	public function archivejob($emp_id)
	{
		$date = date('Y-m-d');
		$this->db->select('*');
    	$this->db->from('job_general_info');
       	$this->db->where('state',2);
       	$this->db->where('emp_id',$emp_id);
       	$this->db->where('deadline <', $date);
       	$query = $this->db->get();
       	if($query->num_rows() > 0) {       		
       	     return $query->result();
       	} else {

       	}
	}
	

}




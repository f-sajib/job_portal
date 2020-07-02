<?php 
class Model_welcome extends CI_Model 
{


	public function __construct() 
	{
		parent::__construct();
		
	}

	public function fetch_data($query)
 	{
  		$this->db->select("a.id,a.title,a.division,a.status,a.vacancy,a.deadline,b.experience");
  		$this->db->from("job_general_info a");
  		$this->db->join(' job_requirment_info b', 'b.job_id=a.id', 'left');
  		$this->db->where('a.state',2);
  		if($query != '')
  		{
		   $this->db->like('title', $query);
		   $this->db->or_like('division', $query);
		   $this->db->or_like('status', $query);
		   $this->db->or_like('vacancy', $query);
		   $this->db->or_like('deadline', $query);
		   $this->db->or_like('experience', $query);
  		}
  		$this->db->order_by('a.id', 'DESC');
  		return $this->db->get();
 	}
 	public function record_count() {
 		return $this->db->count_all("user");       
   	}
   	public function record_count1($query) { 
   	$search6 = str_replace(",", "|", $query);
 		$search5 = str_replace('"', '', $search6);
 		$search4 = str_replace('[', '', $search5);
 		$search3 = str_replace(']', '', $search4);
 		$search2 = str_replace('{', '', $search3);
 		$search1 = str_replace('}', '', $search2);
 		$search =  str_replace('value:', '', $search1);
 		$test = $this->db->query("SELECT * FROM user WHERE skill REGEXP '".$search."'")->result();
 		return count($test);
   	}
    public function fetch_d($limit, $start, $query) {
        if($query!='') {
        	$this->db->limit($limit, $start);
        	$search6 = str_replace(",", "|", $query);
	 		$search5 = str_replace('"', '', $search6);
	 		$search4 = str_replace('[', '', $search5);
	 		$search3 = str_replace(']', '', $search4);
	 		$search2 = str_replace('{', '', $search3);
	 		$search1 = str_replace('}', '', $search2);
	 		$search =  str_replace('value:', '', $search1);
	 		$this->db->limit($limit, $start);
	 		$this->db->select("f_name,l_name,photo,objective,skill");
	 		$this->db->from("user");
	 		$this->db->where('skill REGEXP', $search);
	 		$query = $this->db->get();
        	// $query = $this->db->query("SELECT f_name,l_name,photo,objective,skill FROM user WHERE skill REGEXP '".$search."' LIMIT $limit, $start ");
        } else {
        	$this->db->limit($limit, $start);
       		$query = $this->db->get("user");
        }	 	
       	if ($query->num_rows() > 0) {
           foreach ($query->result() as $row) {
               $data[] = $row;
           }
           return $data;
       	}
       return false;
    }

}

?>
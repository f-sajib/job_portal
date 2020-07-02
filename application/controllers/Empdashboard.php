
<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Empdashboard extends CI_Controller 
{

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_saveuser');
        $this->load->model('Model_employee');
    }
   


   //employee profile dashboard a.*,b.education,c.experience,d.benifit
    public function index()
    {
    	
    	if ($this->session->userdata('emp_id'))
        {
           $emp_id = $this->session->userdata('emp_id');
           $data['info']= $this->db->query("SELECT * FROM employee WHERE id=$emp_id")->row();
           $result = $this->Model_employee->draftJob($emp_id);      
          
           $this->load->view('emp_dashboard/index',$data);
        }
        else
        {
            redirect('Welcome');
        }

    }
    public function job_subcategory()
    {
        $cat_id = $this->input->post("id");

        $result = $this->db->query("SELECT * FROM  job_sub_category WHERE cat_id=$cat_id")->result();

        $str = "";
        $str .= "<select class='form-control' id='sub_category'>";
        foreach ($result as $row) {
            
            $str .= "<option value=".$row->id.">";
            $str .= $row->sub_category;
            $str .= "</option>";            

        }
        $str .= "</select>";

        echo $str;
                        
    }

    public function editCprofile()
    {
        if ($this->session->userdata('emp_id')) {       
           $emp_id = $this->session->userdata('emp_id');
           $data['info']= $this->db->query("SELECT * FROM employee WHERE id=$emp_id")->row();
           $this->load->view('emp_dashboard/updateCprofile',$data);
        }

    }
    public function updateCprofile()
    {
        if ($this->session->userdata('emp_id')) {       
           $update=$this->Model_employee->updateCprofile();

           if ($update) {
            redirect('Empdashboard');
           }
        }
    } 
    //ajax get data
    public function draftJob()
    {
       $emp_id = $this->session->userdata('emp_id');
       $result = $this->Model_employee->draftJob($emp_id);
        $id=1;
        if (isset($result) && !empty($result))
        {
          foreach ($result as $value) {
            $ids=$id++;
             ?>
             <style type="text/css">
                .bgHover{border: 1px dotted; border-radius: 15px;}
                .bgHover:hover{
                    background: #E6FFE6; padding: 3px 3px 3px 3px;
                    box-shadow: 3px 3px 3px 3px #5FFE65; }
            </style>
             <script>
                $(document).ready(function(){

                    $("#options<?php echo $ids;?>").hide();

                    $("#jobs<?php echo $ids;?>").mouseover(function(){
                        $("#options<?php echo $ids;?>").show();
                    });
                    $("#jobs<?php echo $ids;?>").mouseout(function(){
                        $("#options<?php echo $ids;?>").hide();
                    });
                });
                </script>
             <div class="card bgHover">
                <div class="card-body row" id="jobs<?php echo $ids;?>">
                    <div class="col-sm-8">
                        <b><?php echo $value->title?></b><br>
                        <p><?php echo $value->context?></p>
                    </div>                        
                    <div class="col-sm-4" id="options<?php echo $ids;?>">
                        <abbr title="Delete job"> <a data-content="Some content" data-trigger="hover" data-toggle="popover" onclick="delete_job(<?php echo $value->id?>)"><i style="font-size: 25px; cursor: pointer; color: red;" class="fa fa-trash-o" aria-hidden="true"></i></a> </abbr> &nbsp;&nbsp;
                        <abbr title="Post job"><a onclick="post_job(<?php echo $value->id?>)"><i style="font-size: 25px; cursor: pointer; color: green;" class="fa fa-paper-plane-o" aria-hidden="true"></i></a></abbr>&nbsp;&nbsp;
                        <abbr title="View"><a onclick="view_job(<?php echo $value->id?>)" data-toggle="modal" data-target="#myModal"><i style="font-size: 25px; cursor: pointer;color: blue;" class="fa fa-eye" aria-hidden="true"></i></a></abbr>
                    </div>
                </div>
            </div>
            <br>

        <?php
          }}
          else{
            echo "<center><b>No Drafted job<b></center>";
          }
    }
    public function postJob()
    {
        $emp_id = $this->session->userdata('emp_id');
        $id=$this->input->post("id");
        $result=$this->db->set("state",2)->where('id', $id)->update('job_general_info');
        if($result) {
            echo $ids="1";
        }
    }
    public function deleteJob()
    {
        $emp_id = $this->session->userdata('emp_id');
        $id=$this->input->post("id");
     
        $this->db->query("DELETE FROM job_general_info WHERE id=$id");
        $this->db->query("DELETE FROM job_edu_info WHERE job_id=$id");
        $this->db->query("DELETE FROM job_requirment_info WHERE job_id=$id");
        $result = $this->db->query("DELETE FROM job_benifit_info WHERE job_id=$id");       
        if($result) {
            echo $ids="1";
        }
    }
    public function viewJob()
    {
        $id=$this->input->post("id");

        $result = $this->db->query("SELECT a.title,a.context,a.status,a.deadline,b.experience FROM job_general_info a LEFT JOIN job_requirment_info b ON(a.id=b.job_id) WHERE a.id=$id")->row();


        echo '<h4 style="color:green;">'.$result->title;
        echo '</h4><br>Job Context :'.$result->context;
        echo '<br>Status :'.$result->status;
        echo '<br>Experience :'.$result->experience;
        echo '<br>Deadline :'.$result->deadline;
    }

    public function postedJob()
    {
        $emp_id = $this->session->userdata('emp_id');
        $result = $this->Model_employee->postedJob($emp_id);
        if (isset($result) && !empty($result))
        {
          foreach ($result as $value) {?> 

            <style type="text/css">
                .bgHover{border: 1px dotted; border-radius: 15px;}
                .bgHover:hover{
                    background: #E6FFE6; padding: 3px 3px 3px 3px;
                    box-shadow: 3px 3px 3px 3px #5FFE65; }
            </style>
            <a target="_blank" href="<?php echo base_url('Empdashboard/view_posted_job/'.$value->id);?>">
                    <div class="card bgHover" style="border: 1px dotted black">
                    <div class="card-body row">
                        <div class="col-sm-8">                                
                            <b><?php echo $value->title?></b><br>
                            <p>Deadline: <?php echo $value->deadline?></p>                             
                        </div>
                        <div class="col-sm-4">
                            <i style="font-size: 20px; color: green;" onclick="delete_job(<?php echo $value->id?>)" class="fa fa-check-square-o" aria-hidden="true"></i>
                            <b class="text-success">Posted</b>
                        </div>
                    </div>
                    </div>
                </a>
            <br>

        <?php
          }} else {
                echo "<center><b>No Posted job<b></center>";
          }
    }
    public function archivejob()
    {
        $emp_id = $this->session->userdata('emp_id');
        $result = $this->Model_employee->archivejob($emp_id);
        if (isset($result) && !empty($result))
        {
          foreach ($result as $value) {?> 

            <style type="text/css">
                .bgHover{border: 1px dotted; border-radius: 15px;}
                .bgHover:hover{
                    background: #E6FFE6; padding: 3px 3px 3px 3px;
                    box-shadow: 3px 3px 3px 3px #5FFE65; }
            </style>
            
                    <div class="card bgHover" style="border: 1px dotted black">
                    <div class="card-body row">
                        <div class="col-sm-8">                                
                            <b><?php echo $value->title?></b><br>
                            <p>Deadline: <?php echo $value->deadline?></p>                             
                        </div>
                        <div class="col-sm-4">
                            <i style="font-size: 40px; color: green; cursor: pointer;" onclick="delete_job(<?php echo $value->id?>)" class="fa fa-archive" aria-hidden="true"></i>
                        </div>
                    </div>
                    </div>
                
            <br>

        <?php
          }} else {
                echo "<center><b>No archived job<b></center>";
          }
    }
    public function view_posted_job($id)
    {
        $data['details']= $this->db->query("SELECT a.*,b.*,c.*,d.*,e.* FROM job_general_info a LEFT JOIN job_edu_info b ON(a.id=b.job_id) LEFT JOIN job_requirment_info c ON(a.id=c.job_id) LEFT JOIN job_benifit_info d ON(a.id=d.job_id) LEFT JOIN employee e ON(a.emp_id=e.id) WHERE a.id=$id")->row();
        $this->load->view('emp_dashboard/view_posted_job',$data);
    }
    public function job_post()
    {
        if ($this->session->userdata('emp_id')) {
            $emp_id = $this->session->userdata('emp_id');
            $data['categorys']= $this->db->query("SELECT * FROM job_category")->result();
            $this->load->view('emp_dashboard/job_post',$data);
        }
    }
    public function cv_bank()
    {
        if ($this->session->userdata('emp_id')) {

            $emp_id = $this->session->userdata('emp_id');
            $data['cv'] = $this->db->query("SELECT b.id,b.title,b.deadline, COUNT(a.cv) as count FROM cv_bank a LEFT JOIN job_general_info b ON(a.job_id=b.id) WHERE b.state=2 GROUP BY a.job_id");
            $this->load->view('emp_dashboard/cv_bank',$data);
        }
    }
    public function appliedCv($job_id)
    {
        if($this->session->userdata('emp_id')) {

            $emp_id = $this->session->userdata('emp_id');
            $data['applicant']= $this->db->query("SELECT a.id,a.cv,b.f_name,b.l_name,c.d_from,c.d_to FROM cv_bank a Left JOIN user b ON(a.user_id=b.id) LEFT JOIN user_emphistory c ON(c.user_id=b.id) ");
            $this->load->view('emp_dashboard/applied_cv',$data);
        }
    }
    public function cvShow($cv_id)
    {
        if($this->session->userdata('emp_id')) {
            $data['cvshow'] = $this->db->query("SELECT cv FROM cv_bank WHERE id=$cv_id")->row();
            $this->load->view('emp_dashboard/cvshow',$data);
        }   
    }

    public function job_insert()
    {
      if ($this->session->userdata('emp_id'))
      {
        $emp_id = $this->session->userdata('emp_id');        
        
        $data=array();
        $data1=array();
        $data2=array();
        $data3=array();
        $data['emp_id']=  $emp_id;
        $data['title']=$this->input->post('title');
        $data['job_cat']=$this->input->post('category');
        $data['job_sub_cat']=$this->input->post('sub_category');
        $data['deadline']=$this->input->post('deadline');
        $data['status']=$this->input->post('status');
        $data['title']=$this->input->post('title');
        $data['division']=$this->input->post('division');
        $data['location']=$this->input->post('location');
        $data['vacancy']=$this->input->post('vacancy');
        $data['context']=$this->input->post('context');
        $data['state']=1;
        $data1['emp_id']=  $emp_id;
        $data1['education']= $this->input->post('education');
        $data1['result']= $this->input->post('result');
        $data1['description']= $this->input->post('description');

        //$count= substr_count($this->input->post('field_1'),",");
        // echo "<pre>";
        // print_r($this->input->post('field_1'));
        // print_r($this->input->post('field_2'));
        // print_r($this->input->post('field_3'));
        // print_r($this->input->post('field_4'));
        // die();
        
        $data2['emp_id']=  $emp_id;
        $data2['responsibility'] = json_encode($this->input->post('field_1'));
        $data2['requirment'] = json_encode($this->input->post('field_2'));
        $data2['skill'] = json_encode($this->input->post('field_3'));
        $data2['experience']= $this->input->post('experience');

        //$field_1 = $this->input->post('field_1');
        $data3['emp_id']=  $emp_id;
        $data3['salary']=  $this->input->post('salary');
        $data3['benifit'] = json_encode($this->input->post('field_4'));

        $status=$this->Model_employee->job_insert($data,$data1,$data2,$data3);

        $this->output->set_content_type('application/Json');
        echo json_encode(array('status' => $status));
      }
    }
                 

}
        

         
    

   


















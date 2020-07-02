<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller 
{

	    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_saveuser');
    }


    //user profile dashboard
    public function index()
    {
    	
    	if ($this->session->userdata('user_id'))
        {
           
            $user_id = $this->session->userdata('user_id');  
            $data['info'] = $this->db->query("SELECT * FROM user WHERE id=$user_id")->row();
            $data['info1'] = $this->db->query("SELECT * FROM user_edu WHERE user_id=$user_id");
            $data['info2'] = $this->db->query("SELECT * FROM user_training WHERE user_id=$user_id");
            $data['info3'] = $this->db->query("SELECT * FROM user_emphistory WHERE user_id=$user_id");
            $this->load->view('dashboard/index', $data);
        } else {
            redirect('Welcome');
        }

    }
    public function insertExtra() {
        if ($this->session->userdata('user_id')) {
            $update = $this->Model_saveuser->updateUserExtra();
            if($update)
            {
                 redirect("Dashboard");
            }
        } else {
            redirect('Welcome');
        }
    }

    //personal information
    public function editProfile()
    {
       if ($this->session->userdata('user_id'))
        {
           
            $user_id = $this->session->userdata('user_id');  
            $data['info'] = $this->db->query("SELECT * FROM user WHERE id=$user_id")->row();  
            $this->load->view('dashboard/editProfile', $data);
        } else {
            redirect('Welcome');
        }       
    }


    //personal information update
    public function updatePfrofile()
    {
         
        if($this->session->userdata('user_id'))
        {
            $update=$this->Model_saveuser->updateUser();

            if($update)
            {
                 redirect("Dashboard");
            }                          
        } else {
            redirect('Welcome');
        }
                 

    }

    //user education 
    public function editedu()
    {
       if ($this->session->userdata('user_id'))
        {
           
            $user_id = $this->session->userdata('user_id');
            $data['info'] = $this->db->query("SELECT * FROM user WHERE id=$user_id")->row();  
            $data['edu'] = $this->db->query("SELECT * FROM user_edu WHERE user_id=$user_id");  
            $this->load->view('dashboard/editEdu', $data);
        } else {
            redirect('Welcome');
        }       
    }

    //user education insert
    public function insertedu()
    {
         
        if($this->session->userdata('user_id'))
        {
            
            $insert=$this->Model_saveuser->insertUserEdu();            
            if($insert) {
                 redirect("Dashboard/editedu");
            }
        } else {
            redirect('Welcome');
        }
                         
    }    
    //user education update
    public function updateedu()
    {
        if($this->session->userdata('user_id'))
        {
            $update=$this->Model_saveuser->updateUserEdu();
            if($update) {
                 redirect("Dashboard/editedu");
            }
        } else {
            redirect('Welcome');
        }
    }

    //user education delete
    public function deleteedu($id)
    {
        $this->db->query("DELETE FROM user_edu WHERE id=$id");
        redirect("Dashboard/editedu");

    }

    //user training course 
    public function edittraining()
    {
       if ($this->session->userdata('user_id'))
        {
           
            $user_id = $this->session->userdata('user_id');
            $data['info'] = $this->db->query("SELECT * FROM user WHERE id=$user_id")->row();
            $data['training'] = $this->db->query("SELECT * FROM user_training WHERE user_id=$user_id");  
            $this->load->view('dashboard/editTraining', $data);
        } else {
            redirect('Welcome');
        }      
    }

    //user training insert
    public function inserttraining()
    {
         
        if($this->session->userdata('user_id'))
        {
            
            $insert=$this->Model_saveuser->insertUserTraining();
            
            if($insert)
            {
                 redirect("Dashboard/editTraining");
            }
        } else {
            redirect('Welcome');
        }
                         
    }

    //user training update
    public function updattraining()
    {
        if($this->session->userdata('user_id'))
        {
             $update=$this->Model_saveuser->updateUserTraining();
                    if($update)
                    {
                         redirect("Dashboard/editTraining");
                    }
        } else {
            redirect('Welcome');
        }
    }

    //user training delete
    public function deletetraining($id)
    {
        $this->db->query("DELETE FROM user_training WHERE id=$id");
        redirect("Dashboard/edittraining");
    }

    //user Employee history 
    public function editemphistory()
    {
       if ($this->session->userdata('user_id'))
        {
           
            $user_id = $this->session->userdata('user_id');
            $data['info'] = $this->db->query("SELECT * FROM user WHERE id=$user_id")->row();
            $data['history'] = $this->db->query("SELECT * FROM user_emphistory WHERE user_id=$user_id");  
            $this->load->view('dashboard/editEmpHistory', $data);
        } else {
            redirect('Welcome');
        }      
    }

    //user history insert
    public function insertemphistory()
    {
         
        if($this->session->userdata('user_id'))
        {
            
            $insert=$this->Model_saveuser->insertUserHistory();
            
            if($insert)
            {
                 redirect("Dashboard/editemphistory");
            }
        } else {
            redirect('Welcome');
        }
                         
    }

     //user history update
    public function updateemphistory()
    {
        if($this->session->userdata('user_id'))
        {
            $update=$this->Model_saveuser->updateEmpHistory();
                if($update) {
                    redirect("Dashboard/editemphistory");
                }
        } else {
            redirect('Welcome');
        }
    }

    //user history delete
    public function deleteemphistory($id)
    {
        $this->db->query("DELETE FROM user_emphistory WHERE id=$id");
        redirect("Dashboard/editemphistory");
    }

   //user cv/resume
    public function cv()
    {
        if($this->session->userdata('user_id'))
        {
            $user_id = $this->session->userdata('user_id');
            $data['info'] = $this->db->query("SELECT * FROM user WHERE id=$user_id")->row();
            $this->load->view('Dashboard/cv',$data);
        } else {
            redirect('Welcome');
        }
           
    }

    public function cvShow()
    {
        if($this->session->userdata('user_id'))
        {
            $user_id = $this->session->userdata('user_id');  
            $data['info'] = $this->db->query("SELECT * FROM user WHERE id=$user_id")->row();
            $data['info1'] = $this->db->query("SELECT * FROM user_edu WHERE user_id=$user_id");
            $data['info2'] = $this->db->query("SELECT * FROM user_training WHERE user_id=$user_id");
            $data['info3'] = $this->db->query("SELECT * FROM user_emphistory WHERE user_id=$user_id");
            $this->load->view('dashboard/cvView',$data);

        } else {
            redirect('Welcome');
        }          
    }
    public function cvPdf()
    {
        
        if($this->session->userdata('user_id'))
        {         
            
            $name = $this->session->userdata('name');
            $user_id = $this->session->userdata('user_id');  
            $data['info'] = $this->db->query("SELECT * FROM user WHERE id=$user_id")->row();
            $data['info1'] = $this->db->query("SELECT * FROM user_edu WHERE user_id=$user_id");
            $data['info2'] = $this->db->query("SELECT * FROM user_training WHERE user_id=$user_id");
            $data['info3'] = $this->db->query("SELECT * FROM user_emphistory WHERE user_id=$user_id");         
            $filename = $name."cv";          
            $html = $this->load->view('dashboard/cvPdf',$data,true);           
            ini_set("pcre.backtrack_limit","1000000000");
            ini_set('memory_limit', '256M');
            $this->load->library('mpdf');
            $mpdf =  new mPDF('bn','L','','','15','15','15','15');                        
            $mpdf->WriteHTML($html);
           // $mpdf->Output($filename.".pdf", 'D');
            $mpdf->Output();
        }
    }

    public function uploadCv()
    {
        if($this->session->userdata('user_id')) {
            $pdf = $this->Model_saveuser->uploadCv();
            if ($pdf) {
                redirect("Dashboard/cv");
            }
        }        
    }
                 

}
        
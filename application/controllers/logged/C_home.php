<?php
class C_home extends CI_Controller
{
	public function __Construct()
	{
		parent::__Construct();
		if ($this->session->userdata('username')=="")
		{
			redirect('');
		}
		$this->load->helper('text');
		$this->load->model('M_home');
	}
	public function index()
	{
		$data['username'] =$this->session->userdata('username');		
		$this->load->Model('M_home');
		$data['profil']=$this->M_home->getData($data['username']);
		$data['lst']=$this->M_home->getData1();		
		$data['lst2']=$this->M_home->getData2();
		$this->load->view('V_home',$data);
	}
	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level');
		session_destroy();
		redirect('');
	}
	public function post()
	{
		$this->M_home->post();
		$this->load->view('V_home',$data);
	}
	public function hapus($id)
	{
		ob_start();
		$this->db->where('id',$id);
		$this->db->delete('tbl_post');
		redirect('logged/C_home');
		ob_flush();
	}
	public function komen()
	{
		$data['username'] =$this->session->userdata('username');		
		$this->load->Model('M_home');
		$data['profil']=$this->M_home->getData($data['username']);
		$data['lst']=$this->M_home->getData1();
		$data['lst2']=$this->M_home->getData2();
		$this->load->view('V_home',$data);
	}
	public function autocomplete()
        {
                $this->load->model('M_home');

                $search_data = $this->input->post('search_data');
                $result = $this->M_home->get_autocomplete($search_data);
                if (!empty($result))
                {
                    foreach ($result as $row):
                        echo "<li><a href='".site_url()."/logged/C_profile/user/".$row->username."'> <img src='".base_url ('upload/'.$row->foto)."' width='35' height='40'> " . $row->username ."</a></li>";
                    endforeach;
                    
                }
                else
                {
                    echo "<li> <em> Username tidak ditemukan... </em> </li>";
                }

        }
     public function search()
	{
		ob_start();
		$data['username']=$this->session->userdata('username');
		$this->load->model('M_home');
		$data['profil']=$this->M_home->getData($data['username']);
		$cari=$this->input->post('cari');
        $data['lstadmin']=$this->M_home->search($cari);        
        $this->load->view('V_admin',$data);
		ob_flush();
	}
     public function admin()
     {

		$data['username'] =$this->session->userdata('username');		
		$this->load->Model('M_home');
		$data['profil']=$this->M_home->getData($data['username']);	
		$data['lstadmin']=$this->M_home->view();
		$this->load->view('V_admin',$data);
     }
     public function hapusadmin($id)
	{
		ob_start();
		$this->db->where('id',$id);
		$this->db->delete('tbl_user');
		redirect('logged/C_home/admin/');
		ob_flush();
	}
}
?>
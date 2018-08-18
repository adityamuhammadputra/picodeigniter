<?php
class C_profile extends CI_Controller
{
	public function __Construct()
	{
		parent::__Construct();
		if ($this->session->userdata('username')=="")
		{
			redirect('');
		}
		$this->load->helper('text');

	}
	public function index()
	{
		$data['username']=$this->session->userdata('username');
		$this->load->model('M_home');
		$data['profil']=$this->M_home->getData($data['username']);
		$this->load->view('V_profile',$data);
	}
	public function post()
	{

		$this->load->model('M_profile');
		$this->M_profile->post();
		$this->load->view('V_profile',$data);
	}
	public function user($id)
	{
		$data['username']=$this->session->userdata('username');
		$this->load->model('M_home');
		$data['profil']=$this->M_home->getData($data['username']);
		$this->load->model('M_profile');
		$data['profil2']=$this->M_profile->getData($id);
		$data['lst2']=$this->M_profile->getData1($id);
		$this->load->view('V_show',$data);
	}
	 
}
?>
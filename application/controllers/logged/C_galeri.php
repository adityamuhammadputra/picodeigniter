<?php
class C_galeri extends CI_Controller
{	
	public function __Construct()
	{
		parent:: __Construct();
		if ($this->session->userdata('username')=="")
		{
			redirect('');
		}
		$this->load->helper('text');
		$this->load->model('M_galeri');		
	}
	public function index()
	{
		$data['username']=$this->session->userdata('username');
		$this->load->model('M_home');
		$data['profil']=$this->M_home->getData($data['username']);
		$data['lst']=$this->M_galeri->getData1();
		$this->load->view('V_galeri',$data);
	}
	public function post()
	{
		$this->M_galeri->post();
		redirect('logged/C_galeri');
	}
	public function hapus($id)
	{
		ob_start();
		$this->db->where('id',$id);
		$this->db->delete('tbl_galeri');
		redirect('logged/C_galeri');
		ob_flush();
	}
}
?>
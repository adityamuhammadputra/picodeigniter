<?php
class C_rumahsinggah extends CI_Controller
{
	public function __Construct()
	{
		parent::__Construct();
		if($this->session->userdata('username')=="")
		{
			redirect ('');
		}
		$this->load->helper('text');		
		$this->load->model('M_rumahsinggah');
	}
	public function index()
	{
		$data['username']=$this->session->userdata('username');
		$this->load->model('M_home');
		$data['profil']=$this->M_home->getData($data['username']);
		$data['lst']=$this->M_rumahsinggah->getData1();
		$this->load->view('V_rumahsinggah',$data);
	}
	public function edit($id)
	{
		
		$data['lst']=$this->M_rumahsinggah->getData1();
		$data['tbl_rumah_singgah']=$this->M_rumahsinggah->getData2($id);
		$data['lst']=$this->M_rumahsinggah->getData1();
		$this->load->view('/edit/V_editrumahsinggah',$data);
		
	}
	public function post()
	{
		$this->M_rumahsinggah->post();
		$this->load->view('V_rumahsinggah',$data);
	}
	public function hapus($id)
	{
		ob_start();
		$this->db->where('id',$id);
		$this->db->delete('tbl_rumah_singgah');
		redirect('logged/C_rumahsinggah');
		ob_flush();
	}
	public function cari()
	{
		ob_start();
		$data['username']=$this->session->userdata('username');
		$this->load->model('M_home');
		$data['profil']=$this->M_home->getData($data['username']);		
		$data['lst']=$this->M_rumahsinggah->getData1();
		$cari = $this->input->get('lokasi');
		$data['lst']=$this->M_rumahsinggah->getDataWhere('tbl_rumah_singgah','tbl_rumah_singgah.username', $cari) or 
		$data['lst']=$this->M_rumahsinggah->getDataWhere('tbl_rumah_singgah','lokasi', $cari) or 
		$data['lst']=$this->M_rumahsinggah->getDataWhere('tbl_rumah_singgah','deskripsi', $cari);		
		$this->load->view('V_rumahsinggah',$data);
		ob_flush();
	}

}
?>
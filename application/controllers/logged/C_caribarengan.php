<?php
class C_caribarengan extends CI_Controller
{
	public function __Construct()
	{
		parent::__Construct();
		if ($this->session->userdata('username')=="")
		{
			redirect('');
		}
		$this->load->helper('text');
		$this->load->model('M_caribarengan');

	}
	public function index()
	{
		$data['username']=$this->session->userdata('username');
		$this->load->model('M_home');
		$data['profil']=$this->M_home->getData($data['username']);
		$data['lst']=$this->M_caribarengan->getData1();
		$this->load->view('V_caribarengan',$data);
	}
	public function edit($id)
	{		
		$data['lst']=$this->M_caribarengan->getData1();
		$data['tbl_cari_barengan']=$this->M_caribarengan->getData2($id);
		$data['lst']=$this->M_caribarengan->getData1();
		$this->load->view('/edit/V_editcaribarengan',$data);		
	}

	public function post()
	{

		$this->M_caribarengan->post();
		$this->load->view('V_caribarengan',$data);
	}
	public function hapus($id)
	{
		ob_start();
		$this->db->where('id',$id);
		$this->db->delete('tbl_cari_barengan');
		redirect('logged/C_caribarengan');
		ob_flush();
	}
	public function cari()
	{
		ob_start();
		$data['username']=$this->session->userdata('username');
		$this->load->model('M_home');
		$data['profil']=$this->M_home->getData($data['username']);		
		$data['lst']=$this->M_caribarengan->getData1();
		$cari = $this->input->get('asal');
		$data['lst']=$this->M_caribarengan->getDataWhere('tbl_cari_barengan','tbl_cari_barengan.username', $cari) or 
		$data['lst']=$this->M_caribarengan->getDataWhere('tbl_cari_barengan','asal', $cari) or 
		$data['lst']=$this->M_caribarengan->getDataWhere('tbl_cari_barengan','tujuan', $cari) or 
		$data['lst']=$this->M_caribarengan->getDataWhere('tbl_cari_barengan','deskripsi', $cari);		
		$this->load->view('V_caribarengan',$data);
		ob_flush();
	}
}
?>
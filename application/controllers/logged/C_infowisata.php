<?php
class C_infowisata extends CI_Controller
{
	public function __Construct()
	{
		parent::__Construct();
		if($this->session->userdata('username')=="")
		{
			redirect('');
		}
		$this->load->helper('text');
		$this->load->model('M_infowisata');
	}
	public function index()
	{
		$data['username']=$this->session->userdata('username');
		$this->load->model('M_home');
		$data['profil']=$this->M_home->getData($data['username']);
		$data['lst']=$this->M_infowisata->getData1();
		$this->load->view('V_infowisata',$data);
	}
	public function edit($id)
	{		
		$data['lst']=$this->M_infowisata->getData1();
		$data['tbl_info_wisata']=$this->M_infowisata->getData2($id);
		$data['lst']=$this->M_infowisata->getData1();
		$this->load->view('/edit/V_editinfowisata',$data);		
	}
	public function post()
	{
		$this->M_infowisata->post();
		$this->load->view('V_infowisata',$data);
	}
	public function hapus($id)
	{
		ob_start();
		$this->db->where('id',$id);
		$this->db->delete('tbl_info_wisata');
		redirect('logged/C_infowisata');
		ob_flush();
	}
	public function search()
	{
		ob_start();
		$data['username']=$this->session->userdata('username');
		$this->load->model('M_home');
		$data['profil']=$this->M_home->getData($data['username']);
		$cari=$this->input->post('cari');
        $data['lst']=$this->M_infowisata->search($cari);        
        $this->load->view('V_infowisata',$data);
		ob_flush();
	}
	public function autocomplete()
        {
                // load model
                $this->load->model('M_infowisata');

                $search_data = $this->input->post('search_data');
                $result = $this->M_infowisata->get_autocomplete($search_data);
                if (!empty($result))
                {
                    foreach ($result as $row):
                        echo "<li><a href='".site_url()."/logged/C_profile/user/".$row->username."'> <img src='".base_url ('upload/'.$row->foto)."' width='35' height='40'> " . $row->username ."</a></li>";
                    endforeach;                    
                }
                else
                {
                    echo "<li> <em> Not found ... </em> </li>";
                }
        }
}
?>
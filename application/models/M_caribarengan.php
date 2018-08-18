<?php
class M_caribarengan extends CI_Model
{	
	function getData1()
	{
$this->db->select('tbl_cari_barengan.*,tbl_user.username,tbl_user.foto'); // <-- There is never any reason to write this line!
$this->db->from('tbl_cari_barengan');
$this->db->join('tbl_user', 'tbl_cari_barengan.username = tbl_user.username','inner');
$this->db->order_by('tanggal','desc');
$q = $this->db->get();

		if($q->num_rows()>0)
		{
			return $q->result();
		}
	}
	function getData2($kode)
	{
		$this->db->select('*');
		$this->db->where('id',$kode);
		$q=$this->db->get('tbl_cari_barengan');
		if($q->num_rows()>0)
		{
			return $q->result();
		}
	}
	function getDataWhere($table,$field,$kode)
	{
		$this->db->like($field,$kode);
		$this->db->select('tbl_cari_barengan.*,tbl_user.foto'); // <-- There is never any reason to write this line!
$this->db->from('tbl_cari_barengan');
$this->db->join('tbl_user', 'tbl_cari_barengan.username = tbl_user.username','inner');
$this->db->order_by('tanggal','desc');
$sql = $this->db->get();
		return $sql->result();
	}
	function post()
	{
		if(isset($_POST['post']))
		{
			date_default_timezone_set('Asia/Jakarta');
			$tanggal = date("Y-m-d H:i:s");
			$sqli="insert into tbl_cari_barengan values ('".$this->input->post('id')."','".$this->session->userdata('username')."','".($tanggal)."','".$this->input->post('kategori')."','".$this->input->post('tujuan')."','".$this->input->post('asal')."','".$this->input->post('tgl_berangkat',date("d F Y"))."','".$this->input->post('tgl_pulang')."','".$this->input->post('deskripsi')."')";
			$this->db->query($sqli);
			redirect('logged/C_caribarengan/');
		}
		if(isset($_POST['update']))
		{			
			date_default_timezone_set('Asia/Jakarta');
			$tanggal = date("Y-m-d H:i:s");
			$sqli="update tbl_cari_barengan set username = '".$this->session->userdata('username')."',tanggal='".($tanggal)."', kategori = '".$this->input->post('kategori')."', tujuan = '".$this->input->post('tujuan')."',asal='".$this->input->post('asal')."', tanggal_berangkat = '".$this->input->post('tanggal_berangkat',date("d F Y"))."', tanggal_pulang = '".$this->input->post('tanggal_pulang')."', deskripsi = '".$this->input->post('deskripsi')."' where id = '".$this->input->post('id')."'";
			$this->db->query($sqli);
			redirect('logged/C_caribarengan/');
		}
	}	
}
?>
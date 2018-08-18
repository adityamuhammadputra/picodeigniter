<?php
class M_rumahsinggah extends CI_Model
{
	function getData1()
	{
$this->db->select('tbl_rumah_singgah.*,tbl_user.username,tbl_user.foto'); // <-- There is never any reason to write this line!
$this->db->from('tbl_rumah_singgah');
$this->db->join('tbl_user', 'tbl_rumah_singgah.username = tbl_user.username','inner');
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
		$q=$this->db->get('tbl_rumah_singgah');
		if($q->num_rows()>0)
		{
			return $q->result();
		}
	}
	function post()
	{
		if(isset($_POST['post'])) 
		{
			date_default_timezone_set('Asia/Jakarta');
			$tanggal = date("Y-m-d H:i:s");
			$sqli="insert into tbl_rumah_singgah values ('".$this->input->post('id')."', '".$this->session->userdata('username')."', '".($tanggal)."','".$this->input->post('lokasi')."','".$this->input->post('kategori_kontak')."','".$this->input->post('kontak')."','".$this->input->post('deskripsi')."')";
			$this->db->query($sqli);
			redirect('logged/C_rumahsinggah/');
		}
		if(isset($_POST['update']))
		{			
			date_default_timezone_set('Asia/Jakarta');
			$tanggal = date("Y-m-d H:i:s");
			$sqli="update tbl_rumah_singgah set username = '".$this->session->userdata('username')."',tanggal='".($tanggal)."', lokasi = '".$this->input->post('lokasi')."', kategori_kontak = '".$this->input->post('kategori_kontak')."',kontak='".$this->input->post('kontak')."', deskripsi = '".$this->input->post('deskripsi')."' where id = '".$this->input->post('id')."'";
			$this->db->query($sqli);
			redirect('logged/C_rumahsinggah/');
		}

	}
	function getDataWhere($table,$field,$kode)
	{
		$this->db->like($field,$kode);
		$this->db->select('tbl_rumah_singgah.*,tbl_user.foto'); // <-- There is never any reason to write this line!
$this->db->from('tbl_rumah_singgah');
$this->db->join('tbl_user', 'tbl_rumah_singgah.username = tbl_user.username','inner');
$this->db->order_by('tanggal','desc');
$sql = $this->db->get();
		return $sql->result();
	}
	
}
?>
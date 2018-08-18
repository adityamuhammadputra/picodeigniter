<?php
class M_galeri extends CI_Model
{
	function post()
	{
		if(isset($_POST['post']))
		{			
			$uploadPath = 'upload/galeri/';
				$config['upload_path'] = $uploadPath;
				$config['allowed_types'] = 'gif|jpg|png';
				$config['file_name'] = date("YmdHis");
				//$config['max_size']	= '100';
				//$config['max_width'] = '1024';
				//$config['max_height'] = '768';				
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if($this->upload->do_upload('filename')){
					$fileData = $this->upload->data();
					$uploadData[$i]['file_name'] = $fileData['file_name'];
					}			
			if(!empty($uploadData)){
			$tanggal = date("Y-m-d H:i:s");
			date_default_timezone_set('Asia/Jakarta');
			$sqli="insert into tbl_galeri values ('".$this->input->post('id')."','".$this->session->userdata('username')."','".$uploadData[$i]['file_name']."','".($tanggal)."')";
			$this->db->query($sqli);
			}
			else{
			$tanggal = date("Y-m-d H:i:s");
			date_default_timezone_set('Asia/Jakarta');
			$sqli="insert into tbl_galeri values ('".$this->input->post('id')."','".$this->session->userdata('username')."','".($tanggal)."')";
			$this->db->query($sqli);
			}
			redirect('/logged/C_galeri/post');
		}		
	}
	function getData1()
	{
$this->db->select('tbl_galeri.*,tbl_user.username'); // <-- There is never any reason to write this line!
$this->db->from('tbl_galeri');
$this->db->join('tbl_user', 'tbl_galeri.username = tbl_user.username','inner');
$this->db->where('tbl_galeri.username',$this->session->userdata('username'));
$this->db->order_by('foto','asc');
$q = $this->db->get();
		if($q->num_rows()>0)
		{
			return $q->result();
		}
	}
}
?>
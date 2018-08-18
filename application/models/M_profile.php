<?php
class M_profile extends CI_Model
{
	function post()
	{
		if(isset($_POST['post']))
		{
				$uploadPath = 'upload/';
				$config['upload_path'] = $uploadPath;
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['file_name'] = date("YmdHis");
				$config['max_size'] = '5000'; //maksimum besar file 3M
        		$config['max_width']  = '3000'; //lebar maksimum 5000 px
        		$config['max_height']  = '3000'; //tinggi maksimu 5000 px
				//$config['max_size']	= '100';
				//$config['max_width'] = '1024';
				//$config['max_height'] = '768';
				
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if($this->upload->do_upload('filename')){
					$fileData = $this->upload->data();
					$uploadData[$i]['file_name'] = $fileData['file_name'];
					$uploadData[$i]['quality'] = $fileData['20%'];
				}
			
			if(!empty($uploadData)){
				$sqli="update tbl_user  set tempat = '".$this->input->post('tempat')."', tgl_lahir = '".$this->input->post('tgl_lahir')."', alamat = '".$this->input->post('alamat')."',kota = '".$this->input->post('kota')."',provinsi = '".$this->input->post('provinsi')."',foto = '".$uploadData[$i]['file_name']."' ,hobby = '".$this->input->post('hobi')."',pekerjaan = '".$this->input->post('pekerjaan')."',hubungan = '".$this->input->post('hubungan')."',kategori_kontak = '".$this->input->post('kategori_kontak')."',kontak = '".$this->input->post('kontak')."',about = '".$this->input->post('about')."' where username = '".$this->session->userdata('username')."'";
			$this->db->query($sqli);
			}
			else{
			$sqli="update tbl_user  set tempat = '".$this->input->post('tempat')."', tgl_lahir = '".$this->input->post('tgl_lahir')."', alamat = '".$this->input->post('alamat')."',kota = '".$this->input->post('kota')."',provinsi = '".$this->input->post('provinsi')."',hobby = '".$this->input->post('hobi')."',pekerjaan = '".$this->input->post('pekerjaan')."',hubungan = '".$this->input->post('hubungan')."',kategori_kontak = '".$this->input->post('kategori_kontak')."',kontak = '".$this->input->post('kontak')."',about = '".$this->input->post('about')."' where username = '".$this->session->userdata('username')."'";
			$this->db->query($sqli);
			}
			redirect('logged/C_profile/');

		}
	}
	 public function get_autocomplete($search_data)
        {
            $this->db->select('username, id');
            $this->db->like('username', $search_data);
            return $this->db->get('tbl_user', 10)->result();
        }
        function getData($kode)
	{
		$this->db->select('*');
		$this->db->where('username',$kode);
		$q=$this->db->get('tbl_user');
		if($q->num_rows()>0)
		{
			return $q->result();
		}
	}
	function getData1($kode)
	{
$this->db->select('tbl_galeri.*,tbl_user.username'); // <-- There is never any reason to write this line!
$this->db->from('tbl_galeri');
$this->db->join('tbl_user', 'tbl_galeri.username = tbl_user.username','inner');
$this->db->where('tbl_galeri.username',$kode);
$this->db->order_by('foto','asc');
$q = $this->db->get();


		if($q->num_rows()>0)
		{
			return $q->result();
		}
	}
	
}
?>
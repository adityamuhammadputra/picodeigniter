<?php
class M_infowisata extends CI_Model
{
	function post()
	{
		if(isset($_POST['post']))
		{
			$cekdata=$this->db->get_where('tbl_info_wisata',array('judul'=>$this->input->post('judul')));
			if($cekdata->num_rows()==0)
			{
			$uploadPath = 'upload/infowisata/';
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
			$sqli="insert into tbl_info_wisata values ('".$this->input->post('id')."','".$this->session->userdata('username')."','".($tanggal)."','".$this->input->post('kategori')."','".$this->input->post('judul')."','".$uploadData[$i]['file_name']."','".$this->input->post('deskripsi')."')";
			$this->db->query($sqli);
			}
			else{
			$tanggal = date("Y-m-d H:i:s");
			date_default_timezone_set('Asia/Jakarta');
			$sqli="insert into tbl_info_wisata values ('".$this->input->post('id')."','".$this->session->userdata('username')."','".($tanggal)."','".$this->input->post('kategori')."','".$this->input->post('judul')."','".$this->input->post('foto')."','".$this->input->post('deskripsi')."')";
			$this->db->query($sqli);
		}
			redirect('logged/C_infowisata/');
		}
		else{
				 echo'<script>alert("Mohon maaf anda Gagal , mungkin Judul atau Info post anda sudah ada. atau cek kembali data anda ");history.go(-1);</script>';

			}
	}
	if(isset($_POST['update']))
		{	
			
			$uploadPath = 'upload/infowisata/';
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
			$sqli="update tbl_info_wisata set username = '".$this->session->userdata('username')."',tanggal='".($tanggal)."', id_kategori = '".$this->input->post('id_kategori')."', judul = '".$this->input->post('judul')."',foto='".$uploadData[$i]['file_name']."', deskripsi = '".$this->input->post('deskripsi')."' where id = '".$this->input->post('id')."'";
			$this->db->query($sqli);
			}
			else{
			$tanggal = date("Y-m-d H:i:s");
			date_default_timezone_set('Asia/Jakarta');
			$sqli="update tbl_info_wisata set username = '".$this->session->userdata('username')."',tanggal='".($tanggal)."', id_kategori = '".$this->input->post('id_kategori')."', judul = '".$this->input->post('judul')."', deskripsi = '".$this->input->post('deskripsi')."' where id = '".$this->input->post('id')."'";
			$this->db->query($sqli);
		}
			redirect('logged/C_infowisata/');
		
				
			
		}

	}
	
	function getData1()
	{
$this->db->select('tbl_info_wisata.*,tbl_user.username'); // <-- There is never any reason to write this line!
$this->db->from('tbl_info_wisata');
$this->db->join('tbl_user', 'tbl_info_wisata.username = tbl_user.username','inner');
$this->db->order_by('judul','asc');
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
		$q=$this->db->get('tbl_info_wisata');
		if($q->num_rows()>0)
		{
			return $q->result();
		}
	}
	function search($cari)
    {
        $this->db->like('id_kategori',$cari);
        $this->db->or_like('judul',$cari);
        $query=$this->db->get('tbl_info_wisata');
        return $query->result();
    }
     public function get_autocomplete($search_data)
        {
                $this->db->select('*');
                $this->db->like('username', $search_data);
                return $this->db->get('tbl_user', 10)->result();
        }




	
}
?>
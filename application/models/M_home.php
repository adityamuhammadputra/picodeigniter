<?php
class M_home extends CI_Model
{
	
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
	public function get_autocomplete($search_data)
        {
                $this->db->select('*');
                $this->db->like('username', $search_data);
                return $this->db->get('tbl_user', 10)->result();
        }
	function getData1()
	{
$this->db->select('tbl_post.*,tbl_user.username,tbl_user.foto'); // <-- There is never any reason to write this line!
$this->db->from('tbl_post');
$this->db->join('tbl_user', 'tbl_post.username = tbl_user.username','inner');
$this->db->order_by('tanggal','desc');
$q = $this->db->get();


		if($q->num_rows()>0)
		{
			return $q->result();
		}
	}
	function getdata2()
	{
$this->db->select('tbl_komen.*,tbl_user.username,tbl_user.foto');
$this->db->from('tbl_komen');
$this->db->join('tbl_user', 'tbl_komen.username = tbl_user.username','inner');
$this->db->order_by('date','desc');
$q = $this->db->get();


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
			$sqli="insert into tbl_post values ('".$this->input->post('id')."','".$this->session->userdata('username')."','".$this->input->post('textarea')."','".($tanggal)."')";
 			$this->db->query($sqli);
			redirect('logged/C_home/');
		}
	}
	function view()
	{
		$sqli ="select * from tbl_user";
		$query = $this->db->query($sqli);
		return $query->result();
		
	}
	function search($cari)
    {
        $this->db->like('username',$cari);
        $this->db->or_like('nama',$cari);
        $this->db->or_like('tempat',$cari);
		$this->db->from('tbl_user');
        $query=$this->db->get('');
        return $query->result();
    }

}
?>
<?php
class C_login extends CI_Controller{
	public function proses()
	{
		$data = array('username' =>$this->input->post('username',true),'password'=> md5($this->input->post('password',true)));
		$this->load->model('M_login');
		$hasil = $this->M_login->cek_user($data);
		if($hasil->num_rows()==1)
		{
			foreach ($hasil->result() as $sess)
			{
				$sess_data['logged_in'] = 'sudah login';
				$sess_data['username'] = $sess->username;
				$sess_data['level'] = $sess->level;
				$this->session->set_userdata($sess_data);
			}
			if ($this->session->userdata('level')=='admin')
			{
				redirect('logged/C_home/');
			}
			elseif ($this->session->userdata('level')=='user')
			{
				redirect('logged/C_profile/');
			}
		}
		else 
		{
			echo "<script>alert('GAGAL LOGIN cek kembali username, pass');history.go(-1);</script>";
		}
	}
	public function signup()
	{
		if($this->input->post('signup'))
		{
			$cekdata=$this->db->get_where('tbl_user',array('username'=>$this->input->post('username')));
			if($cekdata->num_rows()==0)
			{
				$array=array('username'=>$this->input->post('username'),
							'password'=>md5($this->input->post('password')),
							'level'=>"user",
							'nama'=>$this->input->post('nama'),
							'email'=>$this->input->post('email'));
			$this->db->insert('tbl_user',$array);
			echo '<script>alert("Selamat anda berhasil, Silahkan coba untuk login");window.location.href = "../../#open-modal";</script>';
			}
			else{
				 echo'<script>alert("Maaf anda Gagal bergabung, mungkin username anda sudah digunakan.<br> atau cek kembali data anda ");history.go(-1);</script>';

			}
			
		}
	}
	public function forgot()
        {
            
            $cekdata=$this->db->get_where('tbl_user',array('email'=>$this->input->post('email')));
			if($cekdata->num_rows()==false) {
               
                $this->load->view('V_lupapass');
            }else{
                $email = $this->input->post('email');  
                $clean = $this->security->xss_clean($email);
                $this->load->model('M_login');
                $userInfo = $this->M_login->getUserInfoByEmail($clean);
                
                
                //build token 
				
                $token = $this->M_login->insertToken($userInfo->id);                    
                $qstring = $this->base64url_encode($token);                      
                $url = site_url() . '/C_login/reset_password/token/' . $qstring;
                $link = '<a href="' . $url . '">' . $url . '</a>'; 
                
                $message = '';                     
                $message .= '<strong>A password reset has been requested for this email account</strong><br>';
                $message .= '<strong>Please click:</strong> ' . $link;             
                echo $message; //send this through mail
                exit;
                
            }
            
        }
        public function reset_password()
        {
            $token = $this->base64url_decode($this->uri->segment(4));         
            $cleanToken = $this->security->xss_clean($token);
            
            $user_info = $this->user_model->isTokenValid($cleanToken); //either false or array();               
            
            if(!$user_info){
                $this->session->set_flashdata('flash_message', 'Token is invalid or expired');
                redirect(site_url().'main/login');
            }            
            $data = array(
                'firstName'=> $user_info->first_name, 
                'email'=>$user_info->email,                
                'token'=>base64_encode($token)
            );
           
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
            $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');              
            
            if ($this->form_validation->run() == FALSE) {   
                $this->load->view('header');
                $this->load->view('reset_password', $data);
                $this->load->view('footer');
            }else{
                                
                $this->load->library('password');                 
                $post = $this->input->post(NULL, TRUE);                
                $cleanPost = $this->security->xss_clean($post);                
                $hashed = $this->password->create_hash($cleanPost['password']);                
                $cleanPost['password'] = $hashed;
                $cleanPost['user_id'] = $user_info->id;
                unset($cleanPost['passconf']);                
                if(!$this->user_model->updatePassword($cleanPost)){
                    $this->session->set_flashdata('flash_message', 'There was a problem updating your password');
                }else{
                    $this->session->set_flashdata('flash_message', 'Your password has been updated. You may now login');
                }
                redirect(site_url().'main/login');                
            }
        }
}
?>
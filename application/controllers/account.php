<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller {

    public function __construct()
    {
    	parent::__construct();
		$this->load->model('M_admin', 'ADM', TRUE);
		$this->load->model('M_config', 'CONF', TRUE);
		$this->load->model('M_loginmember', 'MEM', TRUE);
		$this->SA =& get_instance();
    }

	public function index($filter1='', $filter2='', $filter3='')
	{
		$data['content']		= '/default/content/account';

		$this->load->vars($data);
		$this->load->view('default/home');
	}

	public function login_process()
	{
		$username		= $this->input->post('member_username');
		$password		= $this->input->post('member_password');
		$do				= $this->input->post('masuk');
		
		$where_login['member_username']	= $username;
		$where_login['member_password']	= do_hash($password, 'md5');
		
		if ($do && $this->MEM->cek_login($where_login) === TRUE){
			redirect("home");
		} else {
			$this->session->set_flashdata('warning','Username atau Password tidak cocok!');
            redirect("home");
		}
		
	}
	
	public function logout()
	{
		$this->MEM->remov_session();
        session_destroy();
			$this->session->set_flashdata('warning','Anda telah keluar dari aplikasi!');
		redirect("home");
	}

	public function signup_process($filter1='', $filter2='', $filter3='')
	{
		$data['member_name']			= ($this->input->post('member_name'))?$this->input->post('member_name'):'';
		$data['member_username']		= ($this->input->post('member_username'))?$this->input->post('member_username'):'';	
		$data['member_password']		= ($this->input->post('member_password'))?$this->input->post('member_password'):'';	
		$data['member_email']			= ($this->input->post('member_email'))?$this->input->post('member_email'):'';	
		$data['member_phone']			= ($this->input->post('member_phone'))?$this->input->post('member_phone'):'';	
		$data['departement']			= ($this->input->post('departement'))?$this->input->post('departement'):'';	
		$simpan							= $this->input->post('simpan');
		if($simpan){
				$insert['member_name']	= $data['member_name'];
				$insert['member_username']	= $data['member_username'];
				$insert['member_password']	= md5($data['member_password']);
				$insert['member_email']	= $data['member_email'];
				$insert['member_phone']	= $data['member_phone'];
				$insert['departement_id']= $data['departement_id'];
				$this->ADM->insert_member($insert);
				$this->session->set_flashdata('success','Telah berhasil diterdaftar!,');
				redirect("home");
		} else {
				$this->session->set_flashdata('warning','Gagal terdaftar!,');
				redirect("home");
		}

		
	}


	public function cv($filter1='', $filter2='', $filter3='')
	{
		if($this->session->userdata('logged_in2') == TRUE){
			@date_default_timezone_set('Asia/Jakarta');
			$data['content']		= '/default/content/cv';
			$data['action']					= (empty($filter1))?'view':$filter1;
			if ($data['action']	== 'tambah') {
					$data['cv_file']			= ($this->input->post('cv_file'))?$this->input->post('cv_file'):'';	
					$data['member_id']			= $this->session->userdata('member_id');	
					$data['cv_created']			= date('Y-m-d H:i:s');												
					$simpan						= $this->input->post('simpan');
					if($simpan){
						$file = upload_file("cv_file", "./assets/files/download/");
						$data['cv_file']	= $file;
						if ($data['cv_file']) { $insert['cv_file'] = $data['cv_file']; }
						$insert['member_id']	= $data['member_id'];
						$insert['cv_created']	= $data['cv_created'];
						$this->ADM->insert_cv($insert);
						$this->session->set_flashdata('success','File telah berhasil ditambahkan!,');
						redirect("account/cv");
					}
			} elseif($data['action']	== 'hapus') {
				$where_delete['cv_id'] 	= $filter2;
				$row = $this->ADM->get_cv('*', $where_delete);
				@unlink('./assets/files/download/'.$row->cv_file);
				$this->ADM->delete_cv($where_delete);
				$this->session->set_flashdata('warning','File telah berhasil dihapus!,');
				redirect("account/cv");

			}

		$this->load->vars($data);
		$this->load->view('default/home');

		} else {
			redirect("home");
		}
	}

	public function apply($filter1='', $filter2='', $filter3='')
	{
		if($this->session->userdata('logged_in2') == TRUE){
		@date_default_timezone_set('Asia/Jakarta');
			$data['content']				= '/default/content/pengumuman';

			$data['cari']				= ($this->input->post('cari'))?$this->input->post('cari'):'apply_id';
			$data['q']					= ($this->input->post('q'))?$this->input->post('q'):'';
			$data['halaman']			= (empty($filter2))?1:$filter2;
			$data['batas']				= 10;
			$data['page']				= ($data['halaman']-1) * $data['batas'];
			$like_apply[$data['cari']]	= $data['q'];
			$where_apply['member_id']	= $this->session->userdata('member_id');				
			$data['jml_data']			= $this->ADM->count_all_apply('', $like_job);
			$data['jml_halaman']		= ceil($data['jml_data']/$data['batas']);
		$this->load->vars($data);
		$this->load->view('default/home');

		} else {
			redirect("home");
		}
	}

	public function applyjob($filter1='', $filter2='', $filter3='')
	{
		if($this->session->userdata('logged_in2') == TRUE){
		@date_default_timezone_set('Asia/Jakarta');
		$data['member_id']				= $this->session->userdata('member_id');
		$data['job_id']					= ($this->input->post('job_id'))?$this->input->post('job_id'):'';
		$data['company_id']				= ($this->input->post('company_id'))?$this->input->post('company_id'):'';
		$data['apply_status']			= 'BELUM DIPROSES';	
		$data['apply_created']			= date('Y-m-d H:i:s');	
		$where['b.member_id']			= $this->session->userdata('member_id');
		$where['d.job_id']				= ($this->input->post('job_id'))?$this->input->post('job_id'):'';
		$jml_member						= $this->ADM->count_all_apply($where, '');			
		$simpan							= $this->input->post('apply');
		if($simpan && $jml_member < 1){
				$insert['member_id']	= $data['member_id'];
				$insert['job_id']		= $data['job_id'];
				$insert['company_id']	= $data['company_id'];
				$insert['apply_status']	= $data['apply_status'];
				$insert['apply_created']= $data['apply_created'];
				$this->ADM->insert_apply($insert);
				$this->session->set_flashdata('success','Telah berhasil melakukan apply job!,');
				redirect("home");
				
		} elseif ($simpan && $jml_member > 0 ){
				$this->session->set_flashdata('warning','Anda sudah melakukan apply job pada lowongan ini!,');
				redirect("home");
				
		} else {
				$this->session->set_flashdata('warning','Gagal melakukan apply job!,');
				redirect("home");
		}
		$this->load->vars($data);
		$this->load->view('default/home');

		} else {
				$this->session->set_flashdata('warning','Harus login terlebih dahulu!,');
			redirect("home");
		}
	}

	public function profile($filter1='', $filter2='', $filter3='')
	{
		if($this->session->userdata('logged_in2') == TRUE){
			@date_default_timezone_set('Asia/Jakarta');
			$data['content']		= '/default/content/akun';
			$data['action']					= (empty($filter1))?'view':$filter1;
				$where_member['member_id'] = $this->session->userdata('member_id');		
				$data['member']			= $this->ADM->get_member('*', $where_member);
			if ($data['action']	== 'edit') {
				$data['member_id']				= $this->session->userdata('member_id');	
				$data['member_name']			= ($this->input->post('member_name'))?$this->input->post('member_name'):$member->member_name;
				$data['member_address']			= ($this->input->post('member_address'))?$this->input->post('member_address'):$member->member_address;
				$data['member_email']			= ($this->input->post('member_email'))?$this->input->post('member_email'):$member->member_email;
				$data['member_phone']			= ($this->input->post('member_phone'))?$this->input->post('member_phone'):$member->member_phone;
				$data['member_images']			= ($this->input->post('member_images'))?$this->input->post('member_images'):$member->member_images;
				$data['department_id']			= ($this->input->post('department_id'))?$this->input->post('department_id'):$member->department_id;
				$simpan							= $this->input->post('simpan');
				
				if($simpan) {
					$where_edit['member_id']	= $data['member_id'];
					$edit['member_name']	= $data['member_name'];
					$edit['member_address']	= $data['member_address'];
					$edit['member_email']	= $data['member_email'];
					$edit['member_phone']	= $data['member_phone'];
					$edit['department_id']	= $data['department_id'];
					$gambar = upload_image("member_images", "./assets/images/member/", "1920x929", seo($data['member_nama']));
					$data['member_images']		= $gambar;
					if ($data['member_images']) {
						$row = $this->ADM->get_member('*', $where_edit);
						@unlink('./assets/images/member/'.$row->member_images);
						@unlink('./assets/images/member/kecil_'.$row->member_images);
						$edit['member_images']	= $data['member_images']; 
					}
					$this->ADM->update_member($where_edit, $edit);
					$this->session->set_flashdata('success','Profile telah berhasil diedit!,');
					redirect("account/profile");
				}
			}

		$this->load->vars($data);
		$this->load->view('default/home');

		} else {
			redirect("home");
		}
	}


}
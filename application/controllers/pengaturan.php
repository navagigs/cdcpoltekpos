<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengaturan extends CI_Controller {

    public function __construct()
    {
    	parent::__construct();
		$this->load->model('M_admin', 'ADM', TRUE);
		$this->load->model('M_config', 'CONF', TRUE);
    }

	public function index()
	{
		if ($this->session->userdata('logged_in') == TRUE){
			$where_admin['admin_user'] 	= $this->session->userdata('admin_user');
			$data['admin'] 				= $this->ADM->get_admin('',$where_admin);
			$data['web']				= $this->ADM->identitaswebsite();
			$data['dashboard_info']		= TRUE;
            $data['breadcrumb']         = 'Dashboard';
			$data['dashboard'] 			= 'admin/dashboard/statistik';
			$data['boxmenu'] 			= 'admin/boxmenu/setting';
			$data['menu_terpilih']		= '1';
			$data['submenu_terpilih']	= '';
			$this->load->vars($data);
			$this->load->view('admin/home');
		} else {
			redirect("home");
		}
	}

    
	
	//FUNCTION PENGGUNA
	public function pengguna($filter1='', $filter2='', $filter3='')
	{
		if ($this->session->userdata('logged_in') == TRUE){
			$where_admin['admin_user'] 	= $this->session->userdata('admin_user');
			$data['admin'] 				= $this->ADM->get_admin('',$where_admin);
			@date_default_timezone_set('Asia/Jakarta');
			$data['dashboard_info']		= FALSE;
            $data['breadcrumb']         = 'Pengguna';
			$data['content'] 			= 'admin/content/pengaturan/pengguna';
			$data['menu_terpilih']		= '1';
			$data['submenu_terpilih']	= '162';
			$data['action']				= (empty($filter1))?'view':$filter1;			
			if ($data['action'] == 'view'){
				$data['berdasarkan']		= array('admin_user'=>'USERNAME',
													'admin_nama'=>'NAMA LENGKAP',
													'admin_telepon'=>'TELEPON',
													'admin_level_kode'=>'KELOMPOK');
				$data['cari']				= ($this->input->post('cari'))?$this->input->post('cari'):'admin_nama';
				$data['q']					= ($this->input->post('q'))?$this->input->post('q'):'';
				$data['halaman']			= (empty($filter2))?1:$filter2;
				$data['batas']				= 20;
				$data['page']				= ($data['halaman']-1) * $data['batas'];
				// $where_admin['admin_status']	= 'A';
				$like_admin[$data['cari']]	= $data['q'];
				$data['jml_data_admin']		= $this->ADM->count_all_admin('');
				$data['jml_data']			= $this->ADM->count_all_admin('', $like_admin);
				$data['jml_halaman'] 		= ceil($data['jml_data']/$data['batas']);
			} elseif ($data['action'] == 'tambah'){
				$data['validate']			= array('admin_user'=>'Username',
												'admin_pass'=>'Password',
												'admin_nama'=>'Nama Lengkap',
												'admin_alamat'=>'Alamat',
												'admin_telepon'=>'Telepon',
												'admin_level_kode'=>'Kelompok'
											);
				$data['onload']				= 'admin_user';
				$data['admin_user']			= ($this->input->post('admin_user'))?$this->input->post('admin_user'):'';
				$data['admin_pass']			= ($this->input->post('admin_pass'))?$this->input->post('admin_pass'):'';
				$data['admin_nama']			= ($this->input->post('admin_nama'))?$this->input->post('admin_nama'):'';
				$data['admin_alamat']		= ($this->input->post('admin_alamat'))?$this->input->post('admin_alamat'):'';				
				$data['admin_telepon']		= ($this->input->post('admin_telepon'))?$this->input->post('admin_telepon'):'';
				$data['admin_level_kode']	= ($this->input->post('admin_level_kode'))?$this->input->post('admin_level_kode'):'';
				
				$where['admin_user']		= $data['admin_user'];
				$jml_pengguna				= $this->ADM->count_all_admin($where);
								
				$simpan						= $this->input->post('simpan');
				if ($simpan && $jml_pengguna < 1 ){								
					$insert['admin_user']		= validasi_sql($data['admin_user']);
					$insert['admin_pass']		= validasi_sql(do_hash(($data['admin_pass']), 'md5'));
					$insert['admin_nama']		= validasi_sql($data['admin_nama']);
					$insert['admin_alamat']		= validasi_sql($data['admin_alamat']);
					$insert['admin_telepon']	= validasi_sql($data['admin_telepon']);
					$insert['admin_level_kode']	= validasi_sql($data['admin_level_kode']);			
					$insert['admin_status']		= validasi_sql('A');
					$this->ADM->insert_admin($insert);
					$this->session->set_flashdata('success','Pengguna baru telah berhasil ditambahkan!,');
					redirect("pengaturan/pengguna");
				} elseif ($simpan && $jml_pengguna > 0 ){
					echo '<script type="text/javascript">
						  	alert("Pengguna telah terdaftar!,");
						  </script>';
				}
			} elseif ($data['action'] == 'edit'){
				$data['validate']			= array('admin_user'=>'Pengguna',
												'admin_nama'=>'Nama Lengkap',
												'admin_alamat'=>'Alamat',
												'admin_telepon'=>'Telepon',
												'admin_level_kode'=>'Kelompok'
											);
				$data['onload']					= 'admin_nama';
				$where_admin['admin_user']		= $filter2; 
				$admin							= $this->ADM->get_admin('*', $where_admin);
				$data['admin_user']				= ($this->input->post('admin_user'))?$this->input->post('admin_user'):$admin->admin_user;
				$data['admin_pass']				= ($this->input->post('admin_pass'))?$this->input->post('admin_pass'):$admin->admin_pass;				
				$data['admin_nama']				= ($this->input->post('admin_nama'))?$this->input->post('admin_nama'):$admin->admin_nama;				
				$data['admin_alamat']			= ($this->input->post('admin_alamat'))?$this->input->post('admin_alamat'):$admin->admin_alamat;				
				$data['admin_telepon']			= ($this->input->post('admin_telepon'))?$this->input->post('admin_telepon'):$admin->admin_telepon;				
				$data['admin_level_kode']		= ($this->input->post('admin_level_kode'))?$this->input->post('admin_level_kode'):$admin->admin_level_kode;	
				$simpan							= $this->input->post('simpan');
				if ($simpan){
					$where_edit['admin_user']	= validasi_sql($data['admin_user']);
					if ($data['admin_pass'] <> '') {						
					$edit['admin_pass']			= validasi_sql(do_hash(($data['admin_pass']), 'md5')); }
					$edit['admin_nama']			= validasi_sql($data['admin_nama']);
					$edit['admin_alamat']		= validasi_sql($data['admin_alamat']);
					$edit['admin_telepon']		= validasi_sql($data['admin_telepon']);					
					$edit['admin_level_kode']	= validasi_sql($data['admin_level_kode']);
					$this->ADM->update_admin($where_edit, $edit);
					$this->session->set_flashdata('success','Pengguna telah berhasil diedit!,');
					redirect("pengaturan/pengguna");
				}
			} elseif ($data['action'] == 'hapus'){
				$where_edit['admin_user']= $filter2;
				$edit['admin_status']	= 'H';
				$this->ADM->update_admin($where_edit, $edit);
				$this->session->set_flashdata('warning','Pengguna telah berhasil dihapus!,');
				redirect("pengaturan/pengguna");
			}
			$this->load->vars($data);
			$this->load->view('admin/home');
		} else {
			redirect("home");
		}
	}
	
	public function pengguna_detail($admin_user="")
	{
		if ($this->session->userdata('logged_in') == TRUE){
			$where_admin['admin_user'] 	= $this->session->userdata('admin_user');
			$data['admin'] 				= $this->ADM->get_admin('',$where_admin);
			$data['web']					= $this->ADM->identitaswebsite();
			$where_admin['admin_user']	= $admin_user; 
			$data['admin'] 				= $this->ADM->get_admin('', $where_admin);
			$data['action']				= 'detail';
			$this->load->vars($data);
			$this->load->view('admin/content/pengaturan/pengguna');
		} else {
			redirect("home");
		}
	}
	
	
    // ================================================== END PENGATURAN ================================================== //
	
}

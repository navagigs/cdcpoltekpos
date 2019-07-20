<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adminkarir extends CI_Controller {
  

  	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_admin', 'ADM', TRUE);
		$this->load->model('M_config', 'CONF', TRUE);
	}

	public function index()
	{
		if($this->session->userdata('logged_in') == TRUE){
			$where_admin['admin_user']		= $this->session->userdata('admin_user');
			$data['admin']					= $this->ADM->get_admin('',$where_admin);
			$data['dashboard_info']			= TRUE;
            $data['breadcrumb']             = 'Dashboard';
			$data['dashboard']				= 'admin/dashboard/statistik';
			$data['content']				= 'admin/dashboard/statistik';
			$data['menu_terpilih']			= '1';
			$data['submenu_terpilih']		= '1';
			$this->load->vars($data);
			$this->load->view('admin/home');
		} else {
			redirect("home");
		}
	 }
    
	//PERUSAHAAN
	public function company($filter1='', $filter2='', $filter3='')
	{ 
		if($this->session->userdata('logged_in') == TRUE) {
			$where_admin['admin_user']		= $this->session->userdata('admin_user');
			$data['admin']					= $this->ADM->get_admin('*',$where_admin);
			@date_default_timezone_set('Asia/Jakarta');
			$data['dashboard_info']			= FALSE;
            $data['breadcrumb']             = 'Perusahaan';
			$data['content']				= 'admin/content/website/company';
			$data['action']					= (empty($filter1))?'view':$filter1;
			$data['validate']				= array('company_name'=>'NAMA PERUSAHAAN');
			if($data['action'] == 'view') {
				$data['berdasarkan']		= array('company_name'=>'NAMA PERUSAHAAN');
				$data['cari']				= ($this->input->post('cari'))?$this->input->post('cari'):'company_name';
				$data['q']					= ($this->input->post('q'))?$this->input->post('q'):'';
				$data['halaman']			= (empty($filter2))?1:$filter2;
				$data['batas']				= 10;
				$data['page']				= ($data['halaman']-1) * $data['batas'];
				$like_company[$data['cari']]	= $data['q'];
				$where_company['admin_nama']	= $this->session->userdata('admin_nama');				
				$data['jml_data']			= $this->ADM->count_all_company('', $like_company);
				$data['jml_halaman']		= ceil($data['jml_data']/$data['batas']);
			} elseif ($data['action']	== 'tambah') {
				$data['onload']				= 'company_name';
				$data['ckeditor']			= $this->ckeditor('company_description');
				$data['company_name']		= ($this->input->post('company_name'))?$this->input->post('company_name'):'';	
				$data['company_logo']		= ($this->input->post('company_logo'))?$this->input->post('company_logo'):'';
				$data['company_field']		= ($this->input->post('company_field'))?$this->input->post('company_field'):'';		
				$data['company_description']= ($this->input->post('company_description'))?$this->input->post('company_description'):'';		
				$data['company_year']		= ($this->input->post('company_year'))?$this->input->post('company_year'):'';		
				$data['company_address']	= ($this->input->post('company_address'))?$this->input->post('company_address'):'';		
				$data['company_contact']	= ($this->input->post('company_contact'))?$this->input->post('company_contact'):'';	
				$data['company_web']		= ($this->input->post('company_web'))?$this->input->post('company_web'):'';		
				$data['company_created']	= date('Y-m-d H:i:s');												
				$simpan						= $this->input->post('simpan');
				if($simpan){

					$gambar = upload_image("company_logo", "./assets/images/company/", "555x320", seo($data['company_name']));
					$data['company_logo']	= $gambar;
					if ($data['company_logo']) { $insert['company_logo'] = $data['company_logo']; }
					$insert['company_name']	= $data['company_name'];
					$insert['company_field']	= $data['company_field'];
					$insert['company_description']	= $data['company_description'];
					$insert['company_year']	= $data['company_year'];
					$insert['company_address']	= $data['company_address'];
					$insert['company_contact']	= $data['company_contact'];
					$insert['company_web']	= $data['company_web'];
					$insert['company_created']	= $data['company_created'];
					$this->ADM->insert_company($insert);
					$this->session->set_flashdata('success','Perusahaan telah berhasil ditambahkan!,');
					redirect("adminkarir/company");
				}
			} elseif ($data['action']	== 'edit') {
				$data['ckeditor']			= $this->ckeditor('company_description');
				$where['company_id'] 		= $filter2;
				$data['onload']					= 'company_name';
				$where_company['company_id']	= $filter2;
				$company						= $this->ADM->get_company('', $where_company);
				$data['company_id']				= ($this->input->post('company_id'))?$this->input->post('company_id'):$company->company_id;
				$data['company_name']			= ($this->input->post('company_name'))?$this->input->post('company_name'):$company->company_name;
				$data['company_field']			= ($this->input->post('company_field'))?$this->input->post('company_field'):$company->company_field;
				$data['company_description']	= ($this->input->post('company_description'))?$this->input->post('company_description'):$company->company_description;
				$data['company_year']			= ($this->input->post('company_year'))?$this->input->post('company_year'):$company->company_year;
				$data['company_address']		= ($this->input->post('company_address'))?$this->input->post('company_address'):$company->company_address;
				$data['company_contact']		= ($this->input->post('company_contact'))?$this->input->post('company_contact'):$company->company_contact;
				$data['company_web']			= ($this->input->post('company_web'))?$this->input->post('company_web'):$company->company_web;
				$data['company_logo']			= ($this->input->post('company_logo'))?$this->input->post('company_logo'):$company->company_logo;
				$simpan							= $this->input->post('simpan');
				
				if($simpan) {
					$where_edit['company_id']	= $data['company_id'];
					$edit['company_name']	= $data['company_name'];
					$edit['company_field']	= $data['company_field'];
					$edit['company_description']	= $data['company_description'];
					$edit['company_year']	= $data['company_year'];
					$edit['company_address']	= $data['company_address'];
					$edit['company_contact']	= $data['company_contact'];
					$edit['company_web']	= $data['company_web'];
					$gambar = upload_image("company_logo", "./assets/images/company/", "1920x929", seo($data['company_nama']));
					$data['company_logo']		= $gambar;
					if ($data['company_logo']) {
						$row = $this->ADM->get_company('*', $where_edit);
						@unlink('./assets/images/company/'.$row->company_logo);
						@unlink('./assets/images/company/kecil_'.$row->company_logo);
						$edit['company_logo']	= $data['company_logo']; 
					}
					$this->ADM->update_company($where_edit, $edit);
					$this->session->set_flashdata('success','Perusahaan telah berhasil diedit!,');
					redirect("adminkarir/company");
				}
			} elseif ($data['action'] == 'hapus') {
				$where_delete['company_id'] =$filter2;
				$this->ADM->delete_company($where_delete);
				$this->session->set_flashdata('warning','Perusahaan telah berhasil dihapus!,');
				redirect("adminkarir/company");
			}
			$this->load->vars($data);
			$this->load->view('admin/home');
		 } else {
			 redirect("home");		 	
			}
	}


	public function job($filter1='', $filter2='', $filter3='')
	{ 
		if($this->session->userdata('logged_in') == TRUE) {
			$where_admin['admin_user']		= $this->session->userdata('admin_user');
			$data['admin']					= $this->ADM->get_admin('*',$where_admin);
			@date_default_timezone_set('Asia/Jakarta');
			$data['dashboard_info']			= FALSE;
            $data['breadcrumb']             = 'Lowongan';
			$data['content']				= 'admin/content/website/job';
			$data['action']					= (empty($filter1))?'view':$filter1;
			$data['validate']				= array('job_name'=>'POSISI LOWONGAN', 'company_name' => 'NAMA PERUSAHAAN');
			if($data['action'] == 'view') {
				$data['berdasarkan']		= array('job_name'=>'POSISI LOWONGAN', 'company_name' => 'NAMA PERUSAHAAN');
				$data['cari']				= ($this->input->post('cari'))?$this->input->post('cari'):'job_name';
				$data['q']					= ($this->input->post('q'))?$this->input->post('q'):'';
				$data['halaman']			= (empty($filter2))?1:$filter2;
				$data['batas']				= 10;
				$data['page']				= ($data['halaman']-1) * $data['batas'];
				$like_job[$data['cari']]	= $data['q'];
				$where_job['admin_nama']	= $this->session->userdata('admin_nama');				
				$data['jml_data']			= $this->ADM->count_all_job('', $like_job);
				$data['jml_halaman']		= ceil($data['jml_data']/$data['batas']);
			} elseif ($data['action']	== 'tambah') {
				$data['onload']				= 'job_name';
				$data['ckeditor']			= $this->ckeditor('job_description');
				$data['job_name']		= ($this->input->post('job_name'))?$this->input->post('job_name'):'';	
				$data['job_images']		= ($this->input->post('job_images'))?$this->input->post('job_images'):'';
				$data['job_responsible']		= ($this->input->post('job_responsible'))?$this->input->post('job_responsible'):'';		
				$data['job_qualifications']		= ($this->input->post('job_qualifications'))?$this->input->post('job_qualifications'):'';	
				$data['job_date']	= ($this->input->post('job_date'))?$this->input->post('job_date'):'';	
				$data['company_id']	= ($this->input->post('company_id'))?$this->input->post('company_id'):'';		
				$data['job_created']	= date('Y-m-d H:i:s');												
				$simpan						= $this->input->post('simpan');
				if($simpan){
					$gambar = upload_image("job_images", "./assets/images/job/", "555x320", seo($data['job_name']));
					$data['job_images']	= $gambar;
					if ($data['job_images']) { $insert['job_images'] = $data['job_images']; }
					$insert['job_name']	= $data['job_name'];
					$insert['job_responsible']	= $data['job_responsible'];
					$insert['job_qualifications']	= $data['job_qualifications'];
					$insert['job_date']	= $data['job_date'];
					$insert['company_id']	= $data['company_id'];
					$insert['job_created']	= $data['job_created'];
					$this->ADM->insert_job($insert);
					$this->session->set_flashdata('success','Lowongan telah berhasil ditambahkan!,');
					redirect("adminkarir/job");
				}
			} elseif ($data['action']	== 'edit') {
				$data['ckeditor']			= $this->ckeditor('job_description');
				$where['job_id'] 		= $filter2;
				$data['onload']					= 'company_id';
				$where_job['job_id']	= $filter2;
				$job						= $this->ADM->get_job('', $where_job);
				$data['job_id']				= ($this->input->post('job_id'))?$this->input->post('job_id'):$job->job_id;
				$data['job_name']			= ($this->input->post('job_name'))?$this->input->post('job_name'):$job->job_name;
				$data['job_responsible']			= ($this->input->post('job_responsible'))?$this->input->post('job_responsible'):$job->job_responsible;
				$data['job_qualifications']			= ($this->input->post('job_qualifications'))?$this->input->post('job_qualifications'):$job->job_qualifications;
				$data['job_date']		= ($this->input->post('job_date'))?$this->input->post('job_date'):$job->job_date;
				$data['job_images']			= ($this->input->post('job_images'))?$this->input->post('job_images'):$job->job_images;
				$data['company_id']			= ($this->input->post('company_id'))?$this->input->post('company_id'):$job->company_id;
				$simpan							= $this->input->post('simpan');
				if($simpan) {
					$where_edit['job_id']	= $data['job_id'];
					$edit['job_name']	= $data['job_name'];
					$edit['job_responsible']	= $data['job_responsible'];
					$edit['job_qualifications']	= $data['job_qualifications'];
					$edit['company_id']	= $data['company_id'];
					$edit['job_date']	= $data['job_date'];
					$gambar = upload_image("job_images", "./assets/images/job/", "1920x929", seo($data['job_name']));
					$data['job_images']		= $gambar;
					if ($data['job_images']) {
						$row = $this->ADM->get_job('*', $where_edit);
						@unlink('./assets/images/job/'.$row->job_images);
						@unlink('./assets/images/job/kecil_'.$row->job_images);
						$edit['job_images']	= $data['job_images']; 
					}
					$this->ADM->update_job($where_edit, $edit);
					$this->session->set_flashdata('success','Lowongan telah berhasil diedit!,');
					redirect("adminkarir/job");
				}
			} elseif ($data['action'] == 'hapus') {
				$where_delete['job_id'] =$filter2;
				$this->ADM->delete_job($where_delete);
				$this->session->set_flashdata('warning','Lowongan telah berhasil dihapus!,');
				redirect("adminkarir/job");
			}
			$this->load->vars($data);
			$this->load->view('admin/home');
		 } else {
			 redirect("home");		 	
			}
	}



	public function report($filter1='', $filter2='', $filter3='')
	{ 
		if($this->session->userdata('logged_in') == TRUE) {
			$where_admin['admin_user']		= $this->session->userdata('admin_user');
			$data['admin']					= $this->ADM->get_admin('*',$where_admin);
			@date_default_timezone_set('Asia/Jakarta');
			$data['dashboard_info']			= FALSE;
            $data['dari']             		= $this->input->post('dari');
            $data['sampai']             	= $this->input->post('sampai');
			$data['content']				= 'admin/content/website/report';
			$data['action']					= (empty($filter1))?'view':$filter1;

			$this->load->vars($data);
			$this->load->view('admin/home');
		 } else {
			 redirect("home");		 	
			}
	}



	public function report_excel($dari='', $sampai='')
	{ 
		if($this->session->userdata('logged_in') == TRUE) {
			$where_admin['admin_user']		= $this->session->userdata('admin_user');
			$data['admin']					= $this->ADM->get_admin('*',$where_admin);
            $data['dari']             		= $dari;
            $data['sampai']             	= $sampai;
			@date_default_timezone_set('Asia/Jakarta');
				        header("Pragma: public");
				        header("Expires: 0");
				        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
				        header("Content-Type: application/force-download");
				        header("Content-Type: application/octet-stream");
				        header("Content-Type: application/download");
				        header("Content-Disposition: attachment;filename=Laporan.xls");
				        header("Content-Transfer-Encoding: binary ");
			$this->load->vars($data);
			$this->load->view('admin/content/website/report_excel');
		 } else {
			 redirect("home");		 	
			}
	}



	public function chart($filter1='', $filter2='', $filter3='')
	{ 
		if($this->session->userdata('logged_in') == TRUE) {
			$where_admin['admin_user']		= $this->session->userdata('admin_user');
			$data['admin']					= $this->ADM->get_admin('*',$where_admin);
			@date_default_timezone_set('Asia/Jakarta');
			$data['dashboard_info']			= FALSE;
            $data['dari']             		= $this->input->post('dari');
            $data['sampai']             	= $this->input->post('sampai');
			$data['content']				= 'admin/content/website/chart';
			$data['action']					= (empty($filter1))?'view':$filter1;

			$this->load->vars($data);
			$this->load->view('admin/home');
		 } else {
			 redirect("home");		 	
			}
	}
	

	   //CKEDITOR
	private function ckeditor($text) {
		return '
		<script type="text/javascript" src="'.base_url().'editor/ckeditor.js"></script>
		<script type="text/javascript">
		var editor = CKEDITOR.replace("'.$text.'",
		{
			filebrowserBrowseUrl 	  : "'.base_url().'finder/ckfinder.html",
			filebrowserImageBrowseUrl : "'.base_url().'finder/ckfinder.html?Type=Images",
			filebrowserFlashBrowseUrl : "'.base_url().'finder/ckfinder.html?Type=Flash",
			filebrowserUploadUrl 	  : "'.base_url().'finder/core/connector/php/connector.php?command=QuickUpload&type=Files",
			filebrowserImageUploadUrl : "'.base_url().'finder/core/connector/php/connector.php?command=QuickUpload&type=Images",
			filebrowserFlashUploadUrl : "'.base_url().'finder/core/connector/php/connector.php?command=QuickUpload&type=Flash",
			filebrowserWindowWidth    : 900,
			filebrowserWindowHeight   : 700,
			toolbarStartupExpanded 	  : false,
			height					  : 400	
		}
		);
	</script>';
	}
}


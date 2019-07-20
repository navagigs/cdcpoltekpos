<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Perusahaan extends CI_Controller {

    public function __construct()
    {
    	parent::__construct();
		$this->load->model('M_admin', 'ADM', TRUE);
		$this->load->model('M_config', 'CONF', TRUE);
		$this->SA =& get_instance();
    }

	public function index($filter1='', $filter2='', $filter3='')
	{
		$data['content']		= '/default/content/perusahaan';
		$data['q']				= ($this->input->post('q'))?$this->input->post('q'):'';
		$data['halaman']		= (empty($filter1))?1:$filter1;
		$data['batas']			= 10;
		$like_pencarian['company_name']= $data['q'];
		$data['page']			= ($data['halaman']-1) * $data['batas'];
		$data['jml_data']		= $this->ADM->count_all_company('', $like_pencarian);
		$data['jml_halaman'] 	= ceil($data['jml_data']/$data['batas']);

		$this->load->vars($data);
		$this->load->view('default/home');
	}
	
	public function detail($company_id='')
	{
		
		$data['content']		= '/default/content/perusahaan';
		$data['action']			= 'detail';

		$data['company_id']			=  (empty($company_id))?'':$company_id;
    	$where_company['company_id']    = $company_id;
    	$data['company']          	= $this->ADM->get_company('',$where_company);
				$data['halaman']			= (empty($filter2))?1:$filter2;
				$data['batas']				= 10;
				$data['page']				= ($data['halaman']-1) * $data['batas'];
				$data['jml_data']			= $this->ADM->count_all_job();
				$data['jml_halaman']		= ceil($data['jml_data']/$data['batas']);


		$this->load->vars($data);
		$this->load->view('default/home');
	}	
	
	
}

/* End of file video.php */
/* Location: ./application/controllers/video.php */
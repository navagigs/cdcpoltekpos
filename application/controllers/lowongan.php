<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lowongan extends CI_Controller {

    public function __construct()
    {
    	parent::__construct();
		$this->load->model('M_admin', 'ADM', TRUE);
		$this->load->model('M_config', 'CONF', TRUE);
		$this->SA =& get_instance();
    }

	public function index($filter1='', $filter2='', $filter3='')
	{
		$data['content']		= '/default/content/lowongan';
		$data['q']				= ($this->input->post('q'))?$this->input->post('q'):'';
		$data['halaman']		= (empty($filter1))?1:$filter1;
		$data['batas']			= 10;
		$like_pencarian['job_name']= $data['q'];
		$data['page']			= ($data['halaman']-1) * $data['batas'];
		$data['jml_data']		= $this->ADM->count_all_job('', $like_pencarian);
		$data['jml_halaman'] 	= ceil($data['jml_data']/$data['batas']);

		$this->load->vars($data);
		$this->load->view('default/home');
	}
	
	public function detail($job_id='')
	{
		
		$data['content']		= '/default/content/lowongan';
		$data['action']			= 'detail';

		$data['job_id']			=  (empty($job_id))?'':$job_id;
    	$where_job['job_id']    = $job_id;
    	$data['job']          	= $this->ADM->get_job('',$where_job);


		$this->load->vars($data);
		$this->load->view('default/home');
	}	
	
	
	
}

/* End of file video.php */
/* Location: ./application/controllers/video.php */
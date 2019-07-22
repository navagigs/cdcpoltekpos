<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
    	parent::__construct();
		$this->load->model('M_admin', 'ADM', TRUE);
		$this->load->model('M_config', 'CONF', TRUE);
    }

	public function index()
	{
						
		$data['content']		= '/default/content/home';
		$data['cari']				= ($this->input->post('cari'))?$this->input->post('cari'):'job_name';
		$data['q']					= ($this->input->post('q'))?$this->input->post('q'):'';
		$data['halaman']			= (empty($filter2))?1:$filter2;
		$data['batas']				= 10;
		$data['page']				= ($data['halaman']-1) * $data['batas'];
		$like_job[$data['cari']]	= $data['q'];
		$where_job['admin_nama']	= $this->session->userdata('admin_nama');				
		$data['jml_data']			= $this->ADM->count_all_job('', $like_job);
		$data['jml_halaman']		= ceil($data['jml_data']/$data['batas']);
			$data['jml_data_job']			= $this->ADM->count_all_job('');
			$data['jml_data_company']		= $this->ADM->count_all_company('');
			$data['jml_data_apply']			= $this->ADM->count_all_apply('');
			$data['jml_data_member']		= $this->ADM->count_all_member('');
		$this->load->vars($data);
		$this->load->view('default/home');
		
	}
	
	
	public function twitter() {
	  echo '<script charset="utf-8" src="'.base_url().'templates/default/js/widget-twitter.js"></script>
			<script>
			new TWTR.Widget({
			  version: 2,
			  type: "profile",
			  rpp: 40,
			  interval: 3000,
			  width: 275,
			  height: 110,
			  theme: {
				shell: {
				  background: "#1469b3",
				  color: "#ffffff"
				},
				tweets: {
				  background: "#0d2652",
				  color: "#ffffff",
				  links: "#4aed05"
				}
			  },
			  features: {
				scrollbar: false,
				loop: true,
				live: true,
				hashtags: true,
				timestamp: true,
				avatars: true,
				behavior: "default"
			  }
			}).render().setUser("bptkit").start();
			</script>';
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Internal extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_login', 'LOG', TRUE);
		$this->load->model('M_admin', 'ADM', TRUE);
		$this->load->model('M_config', 'CONF', TRUE);
	}
	
	public function index()
	{
        if ($this->session->userdata('logged_in') == TRUE){       
            redirect('admin/','refresh');
        } else {     
		$this->load->vars($data);
		$this->load->view('admin/login');
                
            
            }
	}
	
	public function ceklogin()
	{
		$username		= $this->input->post('username');
		$password		= $this->input->post('password');
		$do				= $this->input->post('masuk');
		
		$where_login['admin_user']	= $username;
		$where_login['admin_pass']	= do_hash($password, 'md5');
		
		date_default_timezone_set('Asia/Jakarta');
		if ($do && $this->LOG->cek_login($where_login) === TRUE){
			redirect("admin/");
		} else {
			$this->session->set_flashdata('warning','Username, Password, dan Caphcha tidak cocok!');
            redirect("internal");
		}
		
	}
	
	public function keluar()
	{
		$this->LOG->remov_session();
        session_destroy();
		redirect("internal");
	}
	
	
		
}
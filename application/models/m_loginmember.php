<?php
class M_loginmember extends CI_Model {
	
	function __contsruct(){
		parent::Model();
	}
	
	function cek_login($where){
		$data = "";
		$this->db->select("*");
		$this->db->from("member");
		$this->db->where($where);
		$this->db->limit(1);
		$Q = $this->db->get();
		if ($Q->num_rows() > 0) {
			$data = $Q->row();
			$this->set_session($data);
			return true;
		}
		return false;
	}
	
	function set_session(&$data){
		$session = array(
					'member_username' 	=> $data->member_username,
					'member_id' 	=> $data->member_id,
					'member_name' 	=> $data->member_name,
					'logged_in2'		=> TRUE
					);
		$this->session->set_userdata($session);
	}
	
	function update_log($where){
		$where['member_username'] = $data->member_username;
		$where['member_name'] = $data->member_name;
		$where['member_id'] = $data->member_id;
		$data['member_ip']	 = $_SERVER['REMOTE_ADDR'];
		$data['member_online']= time();
		$this->db->update('member',$data,$where);
	}
	
	function remov_session() {
		$session = array(
					'member_username'  =>'',
					'member_id' =>'',
					'logged_in2'	  => FALSE
					);
		$this->session->unset_userdata($session);
	}
		
	
}
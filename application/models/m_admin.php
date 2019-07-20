<?php
class M_admin extends CI_Model  {

    public function __contsruct(){
        parent::Model();
    }
	
	
	//KONFIGURASI TABEL SERANA KATEGORI
	public function insert_sarana_kategori($data){
        $this->db->insert("sarana_kategori",$data);
    }
    
    public function update_sarana_kategori($where,$data){
        $this->db->update("sarana_kategori",$data,$where);
    }

    public function delete_sarana_kategori($where){
        $this->db->delete("sarana_kategori", $where);
    }

	public function get_sarana_kategori($select, $where){
        $data = "";
		$this->db->select($select);
        $this->db->from("sarana_kategori");
		$this->db->where($where);
		$this->db->limit(1);
		$Q = $this->db->get();
		if ($Q->num_rows() > 0){
			$data = $Q->row();
		}
		$Q->free_result();
		return $data;
	}

    public function grid_all_sarana_kategori($select, $sidx, $sord, $limit, $start, $where="", $like=""){
        $data = "";
        $this->db->select($select);
        $this->db->from("sarana_kategori");
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $this->db->order_by($sidx,$sord);
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }

    public function count_all_sarana_kategori($where="", $like=""){
        $this->db->select("*");
        $this->db->from("sarana_kategori");
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
    }
	
	 //KONFIGURASI TABEL SARANA
	public function insert_sarana($data){
        $this->db->insert("sarana",$data);
    }
    
    public function update_sarana($where,$data){
        $this->db->update("sarana",$data,$where);
    }
	
    public function delete_sarana($where){
        $this->db->delete("sarana", $where);
    }

	public function get_sarana($select, $where){
        $data = "";
		$this->db->select($select);
        $this->db->from("sarana_kategori sk");
		$this->db->join('sarana a', 'sk.sarana_kat_id=a.sarana_kat_id', 'left');
		$this->db->where($where);
		$this->db->limit(1);
		$Q = $this->db->get();
		if ($Q->num_rows() > 0){
			$data = $Q->row();
		}
		$Q->free_result();
		return $data;
	}
	 public function grid_all_sarana1($select, $sidx,$sord,$limit,$start,$where="", $like=""){
			$data = "";
			$this->db->select($select);
        	$this->db->from("sarana_kategori sk");
			$this->db->join('sarana a', 'sk.sarana_kat_id=a.sarana_kat_id', 'left');
			if ($where){$this->db->where($where);}
			if ($like){
				foreach($like as $key => $value){ 
				$this->db->like($key, $value); 
				}
			}
			$names = array('nava', 'admin');
			$this->db->where_not_in('admin_nama', $names);
			$this->db->order_by($sidx,$sord);
			$this->db->limit($limit,$start);
			$Q = $this->db->get();
			if ($Q->num_rows() > 0){
				$data=$Q->result();
			}
			$Q->free_result();
			return $data;
		}
		
    public function grid_all_sarana($select, $sidx,$sord,$limit,$start,$where="", $like=""){
        $data = "";
        $this->db->select($select);
        $this->db->from("sarana_kategori sk");
		$this->db->join('sarana a', 'sk.sarana_kat_id=a.sarana_kat_id', 'left');
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $this->db->order_by($sidx,$sord);
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }

    public function count_all_sarana($where="", $like=""){
        $this->db->select("*");
        $this->db->from("sarana_kategori sk");
		$this->db->join('sarana a', 'sk.sarana_kat_id=a.sarana_kat_id', 'left');
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
    }
        public function grid_all_sarana2($select, $sidx,$sord,$limit,$start,$where="", $like=""){
        $data = "1";
        $this->db->select($select);
        $this->db->from("sarana");
		if ($where){$this->db->where($where);}
        $this->db->order_by($sidx,"ASC");
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }

    public function count_all_sarana2($where="", $like=""){
        $this->db->select("*");
        $this->db->from("sarana");
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
    }	
	
  //KONFIGURASI TABEL PERUSAHAAN
	public function insert_company($data){
        $this->db->insert("company",$data);
    }
    
    public function update_company($where,$data){
        $this->db->update("company",$data,$where);
    }

    public function delete_company($where){
        $this->db->delete("company", $where);
    }

	public function get_company($select, $where){
        $data = "";
		$this->db->select($select);
        $this->db->from("company");
		$this->db->where($where);
		$this->db->limit(1);
		$Q = $this->db->get();
		if ($Q->num_rows() > 0){
			$data = $Q->row();
		}
		$Q->free_result();
		return $data;
	}

    public function grid_all_company($select, $sidx, $sord, $limit, $start, $where="", $like=""){
        $data = "";
        $this->db->select($select);
        $this->db->from("company");
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $this->db->order_by($sidx,$sord);
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }

    public function count_all_company($where="", $like=""){
        $this->db->select("*");
        $this->db->from("company");
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
    }

    //KONFIGURASI TABEL MEMBER
	public function insert_member($data){
        $this->db->insert("member",$data);
    }
    
    public function update_member($where,$data){
        $this->db->update("member",$data,$where);
    }

    public function delete_member($where){
        $this->db->delete("member", $where);
    }

	public function get_member($select, $where){
        $data = "";
		$this->db->select($select);
        $this->db->from("member");
		$this->db->where($where);
		$this->db->limit(1);
		$Q = $this->db->get();
		if ($Q->num_rows() > 0){
			$data = $Q->row();
		}
		$Q->free_result();
		return $data;
	}

    public function grid_all_member($select, $sidx, $sord, $limit, $start, $where="", $like=""){
        $data = "";
        $this->db->select($select);
        $this->db->from("member");
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $this->db->order_by($sidx,$sord);
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }

    public function count_all_member($where="", $like=""){
        $this->db->select("*");
        $this->db->from("member");
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
    }

    //KONFIGURASI TABEL CV
	public function insert_cv($data){
        $this->db->insert("cv",$data);
    }
    
    public function update_cv($where,$data){
        $this->db->update("cv",$data,$where);
    }

    public function delete_cv($where){
        $this->db->delete("cv", $where);
    }

	public function get_cv($select, $where){
        $data = "";
		$this->db->select($select);
        $this->db->from("cv");
		$this->db->where($where);
		$this->db->limit(1);
		$Q = $this->db->get();
		if ($Q->num_rows() > 0){
			$data = $Q->row();
		}
		$Q->free_result();
		return $data;
	}

    public function grid_all_cv($select, $sidx, $sord, $limit, $start, $where="", $like=""){
        $data = "";
        $this->db->select($select);
        $this->db->from("cv");
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $this->db->order_by($sidx,$sord);
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }

    public function count_all_cv($where="", $like=""){
        $this->db->select("*");
        $this->db->from("cv");
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
    }
	
	//KONFIGURASI TABEL LOWONGAN
	public function insert_job($data){
        $this->db->insert("job",$data);
    }
    
    public function update_job($where,$data){
        $this->db->update("job",$data,$where);
    }

    public function delete_job($where){
        $this->db->delete("job", $where);
    }

	public function get_job($select, $where){
        $data = "";
		$this->db->select($select);
        $this->db->from("job a");
		$this->db->join('company b', 'a.company_id = b.company_id', 'left');
		$this->db->where($where);
		$this->db->limit(1);
		$Q = $this->db->get();
		if ($Q->num_rows() > 0){
			$data = $Q->row();
		}
		$Q->free_result();
		return $data;
	}

    public function grid_all_job($select, $sidx, $sord, $limit, $start, $where="", $like=""){
        $data = "";
        $this->db->select($select);
        $this->db->from("job a");
		$this->db->join('company b', 'a.company_id = b.company_id', 'left');
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $this->db->order_by($sidx,$sord);
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }

    public function count_all_job($where="", $like=""){
        $this->db->select("*");
        $this->db->from("job a");
		$this->db->join('company b', 'a.company_id = b.company_id', 'left');
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
    }

    //KONFIGURASI TABEL DAFTAR
    public function insert_apply($data){
        $this->db->insert("apply",$data);
    }
    
    public function update_apply($where,$data){
        $this->db->update("apply",$data,$where);
    }

    public function delete_apply($where){
        $this->db->delete("apply", $where);
    }

    public function get_apply($select, $where){
        $data = "";
        $this->db->select($select);
        $this->db->from("apply a");
        $this->db->join('member b', 'a.member_id = b.member_id', 'left');
        $this->db->join('company c', 'a.company_id = c.company_id', 'left');
        $this->db->join('job d', 'a.job_id = d.job_id', 'left');
        $this->db->where($where);
        $this->db->limit(1);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data = $Q->row();
        }
        $Q->free_result();
        return $data;
    }

    public function grid_all_apply($select, $sidx, $sord, $limit, $start, $where="", $like=""){
        $data = "";
        $this->db->select($select);
        $this->db->from("apply a");
        $this->db->join('member b', 'a.member_id = b.member_id', 'left');
        $this->db->join('company c', 'a.company_id = c.company_id', 'left');
        $this->db->join('job d', 'a.job_id = d.job_id', 'left');
        if ($where){$this->db->where($where);}
        if ($like){
            foreach($like as $key => $value){ 
            $this->db->like($key, $value); 
            }
        }
        $this->db->order_by($sidx,$sord);
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }

    public function count_all_apply($where="", $like=""){
        $this->db->select("*");
        $this->db->from("apply a");
        $this->db->join('member b', 'a.member_id = b.member_id', 'left');
        $this->db->join('company c', 'a.company_id = c.company_id', 'left');
        $this->db->join('job d', 'a.job_id = d.job_id', 'left');
        if ($where){$this->db->where($where);}
        if ($like){
            foreach($like as $key => $value){ 
            $this->db->like($key, $value); 
            }
        }
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
    }
	

	//CONFIGURATION TABLE ADMIN
	public function insert_admin($data){
        $this->db->insert("admin",$data);
    }
    
    public function update_admin($where,$data){
        $this->db->update("admin",$data,$where);
    }

    public function delete_admin($where){
        $this->db->delete("admin", $where);
    }

	public function get_admin($select, $where){
        $data = "";
		$this->db->select($select);
        $this->db->from("admin a");
		$this->db->join('admin_level al', 'a.admin_level_kode = al.admin_level_kode', 'left');
		$this->db->where($where);
		$this->db->limit(1);
		$Q = $this->db->get();
		if ($Q->num_rows() > 0){
			$data = $Q->row();
		}
		$Q->free_result();
		return $data;
	}

    public function grid_all_admin($select, $sidx,$sord,$limit,$start,$where="", $like=""){
        $data = "";
        $this->db->select($select);
        $this->db->from("admin a");
		$this->db->join('admin_level al', 'a.admin_level_kode = al.admin_level_kode', 'left');
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $this->db->order_by($sidx,$sord);
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }

    public function count_all_admin($where="", $like=""){
        $this->db->select("*");
        $this->db->from("admin");		
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
    }
	 public function grid_all_admin2($select, $sidx, $sord, $limit, $start, $where="", $like=""){
        $data = "";
        $this->db->select($select);
        $this->db->from("admin a");
        $this->db->join('admin_level al', 'a.admin_level_kode = al.admin_level_kode', 'left');
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $this->db->order_by($sidx,$sord);
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }
	//CONFIGURATION TABLE ADMIN LEVEL
	public function insert_admin_level($data){
        $this->db->insert("admin_level",$data);
    }
    
    public function update_admin_level($where,$data){
        $this->db->update("admin_level",$data,$where);
    }

    public function delete_admin_level($where){
        $this->db->delete("admin_level", $where);
    }

	public function get_admin_level($select, $where){
        $data = "";
		$this->db->select($select);
        $this->db->from("admin_level");
		$this->db->where($where);
		$this->db->limit(1);
		$Q = $this->db->get();
		if ($Q->num_rows() > 0){
			$data = $Q->row();
		}
		$Q->free_result();
		return $data;
	}

    public function grid_all_admin_level($select, $sidx,$sord,$limit,$start,$where="", $like=""){
        $data = "";
        $this->db->select($select);
        $this->db->from("admin_level");
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $this->db->order_by($sidx,$sord);
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }

    public function count_all_admin_level($where="", $like=""){
        $this->db->select("*");
        $this->db->from("admin_level");		
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
    }
    // ================================================== END PENGATURAN ================================================== //
    
    // FUNGSI PENCARIAN
	public function grid_all_pencarian($select, $sidx,$sord,$limit,$start,$where="", $like=""){
        $data = "";
        $this->db->select($select);
        $this->db->from("berita b");
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->or_like($key, $value); 
			}
		}
        $this->db->order_by($sidx,$sord);
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }
	
	public function count_all_pencarian($where="", $like=""){
        $this->db->select("*");
        $this->db->from("berita b");
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->or_like($key, $value); 
			}
		}
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
    }	
    
    // CONFIGURATION COMBO BOX WITH DATABASE WITH VALIDASI
	public function combo_box($table, $name, $value, $name_value, $pilihan, $js='', $label='', $width=''){
		echo "<select name='$name' id='$name' onchange='$js' required class='form-control input-sm' style='width:$width'>";
		echo "<option value=''>".$label."</option>";
		$query = $this->db->query($table);
		foreach ($query->result() as $row){
			if ($pilihan == $row->$value){
				echo "<option value='".$row->$value."' selected>".$row->$name_value."</option>";
			} else {
				echo "<option value='".$row->$value."'>".$row->$name_value."</option>";
			}
		}
		echo "</select>";
	}
    
    // CONFIGURATION COMBO BOX WITH DATABASE NO VALIDASI
	public function combo_box2($table, $name, $value, $name_value, $pilihan, $js='', $label='', $width=''){
		echo "<select name='$name' id='$name' onchange='$js' class='form-control input-sm' style='width:$width'>";
		echo "<option value=''>".$label."</option>";
		$query = $this->db->query($table);
		foreach ($query->result() as $row){
			if ($pilihan == $row->$value){
				echo "<option value='".$row->$value."' selected>".$row->$name_value."</option>";
			} else {
				echo "<option value='".$row->$value."'>".$row->$name_value."</option>";
			}
		}
		echo "</select>";
	}
	
	//CONFIGURATION CHECKBOX ARRAY WITH DATABASE
	public function checkbox($table, $name, $value, $name_value, $pilihan=''){
		$query = $this->db->query($table);
		$array_tag = explode(',', $pilihan);
		$ceked = "";
		foreach ($query->result() as $row){
			$ceked = (array_search($row->tag_id, $array_tag) === false)? '' : 'checked';
			echo "<div class='radio'><label for='".$row->$value."'><input type='checkbox' class='icheck' name='$name' id='".$row->$value."' value='".$row->$value."' ".$ceked."/> ".$row->$name_value."</label></div>";
		}
	}
	
	//CONFIGURATION CHECKBOX ARRAY WITH DATABASE
	public function checkbox_status($table, $name, $value, $name_value, $pilihan=''){
		$query = $this->db->query($table);
		$array_tag = explode(',', $pilihan);
		$ceked = "";
		foreach ($query->result() as $row){
			$ceked = (array_search($row->status_perkawinan_kode, $array_tag) === false)? '' : 'checked';
			echo "<input type='checkbox' name='$name' id='".$row->$value."' style='display: inline-block;' value='".$row->$value."' ".$ceked."/><label for='".$row->$value."' style='display: inline-block; margin-right: 10px;'>".$row->$name_value."</label>";
		}
	}
	
	//CONFIGURATION LIST ARRAY WITH DATABASE AND EXPLODE
	public function listarray($table, $name, $value, $name_value, $pilihan=''){
		$query = $this->db->query($table);
		$array_tag = explode(',', $pilihan);
		$ceked = "";
		foreach ($query->result() as $row){
			if (array_search($row->tag_id, $array_tag) === false) {
			} else {
			echo $row->$name_value.", ";
			}
		}
	}
	
}
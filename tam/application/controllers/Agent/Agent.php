<?php
require APPPATH. '/controllers/Agent/Agent_config.php';

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Agent extends CI_Controller {
   private $log_key,$log_temp,$title;
   function __construct(){
        parent::__construct();
		$this->load->model('Agent/Agent_model','tmodel');
		$this->load->model('Custom_model/Sys_user_log_login_model','sys_user_log_login');
		$this->load->model('Custom_model/Sys_user_table_model', 'sys_user');
		$this->load->model('Custom_model/Sys_user_log_in_out_table_model', 'Sys_log');
		$this->load->model('sys/Sys_user_log_model', 'log_login');
		$this->load->model('Custom_model/Sys_user_table_model', 'Sys_user_table_model');
		$this->log_key ='log_Agent';
		
		$this->title = new Agent_config();
   }


	public function index(){
		$data = array(
			'title_page_big'		=> 'DAFTAR',
			'title'					=> $this->title,
			'link_refresh_table'	=> site_url().'Agent/Agent/refresh_table/'.$this->_token,
			'link_create'			=> site_url().'Agent/Agent/create',
			'link_update'			=> site_url().'Agent/Agent/update',
			'link_delete'			=> site_url().'Agent/Agent/delete_multiple',
		);
		
		$this->template->load('Agent/Agent_list',$data);
	}
	public function monitoring(){
		$data = array(
			'title_page_big'		=> 'MONITORING AGENT',
			'title'					=> $this->title,
			'link_delete'			=> site_url().'Agent/Agent/delete_multiple',
		);
		$where_agent = array("opt_level" => 8);
		$data['agent'] = $this->sys_user->get_results($where_agent, array("id,nama,agentid,picture"));
		$this->template->load('Agent/monitoring_agent',$data);
	}
	public function report(){
		$idlogin = $this->session->userdata('idlogin');
		$logindata = $this->log_login->get_by_id($idlogin);
		$userdata = $this->Sys_user_table_model->get_row(array("id" => $logindata->id_user));
		$data = array(
			'title_page_big'		=> 'MONITORING AGENT',
			'title'					=> $this->title,
			'link_delete'			=> site_url().'Agent/Agent/delete_multiple',
		);
		$where_agent = array("opt_level" => 8);
		if ($userdata->opt_level == 9) {
			$where_agent = array("tl" => $userdata->agentid);
		}
		$data['agent'] = $this->sys_user->get_results($where_agent, array("id,nama,agentid,picture"));
		$this->template->load('Agent/report_monitoring_agent',$data);
	}

	public function refresh_table($token){
		if($token==$this->_token){
			$row = $this->tmodel->json();
			
			//encode id 
			$tm = time();
			$this->session->set_userdata($this->log_key,$tm);
			$x = 0;
			foreach($row['data'] as $val){
				$idgenerate = _encode_id($val['id'],$tm);
				$row['data'][$x]['id'] = $idgenerate;
				$x++;
			}
			
			$o = new Outputview();
			$o->success	= 'true';
			$o->serverside	= 'true';
			$o->message	= $row;
			
			echo $o->result();
			

		}else{
			redirect('Auth');
		}
	}

	public function create(){
		$data = array(
			'title_page_big'		=> 'Buat Baru',
			'title'					=> $this->title,
			'link_save'				=> site_url().'Agent/Agent/create_action',
			'link_back'				=> $this->agent->referrer(),			
		);
		
		$this->template->load('Agent/Agent_form',$data);

	}

	public function create_action(){
		$data 	= $this->input->post('data_ajax',true);
		$val	= json_decode($data,true);
		$o		= new Outputview(); 

		/* 
		*	untuk mengganti message output
		* tambahkan perintah : $o->message = 'isi pesan'; 
 		* sebelum perintah validasi.
		* ex.
		* 	$o->message = 'halo ini pesan baru';
		* 	if(!$o->not_empty($val['descriptions'],'#descriptions')){
		*		echo $o->result();	
		*		return;
		*  	}
		*
		*/	

		//mencegah data kosong
		if(!$o->not_empty($val['nmuser'],'#nmuser')){
			echo $o->result();	
			return;
		}

		//mencegah data double
		$field=array('nmuser'=>$val['nmuser']);
		$exist = $this->tmodel->if_exist('',$field);
		if(!$o->not_exist($exist,'#nmuser')){
			echo $o->result();	
			return;
		}

		//mencegah data kosong
		if(!$o->not_empty($val['passuser'],'#passuser')){
			echo $o->result();	
			return;
		}

		//mencegah data double
		$field=array('passuser'=>$val['passuser']);
		$exist = $this->tmodel->if_exist('',$field);
		if(!$o->not_exist($exist,'#passuser')){
			echo $o->result();	
			return;
		}

		//mencegah data kosong
		if(!$o->not_empty($val['opt_level'],'#opt_level')){
			echo $o->result();	
			return;
		}

		//mencegah data double
		$field=array('opt_level'=>$val['opt_level']);
		$exist = $this->tmodel->if_exist('',$field);
		if(!$o->not_exist($exist,'#opt_level')){
			echo $o->result();	
			return;
		}

		//mencegah data kosong
		if(!$o->not_empty($val['opt_status'],'#opt_status')){
			echo $o->result();	
			return;
		}

		//mencegah data double
		$field=array('opt_status'=>$val['opt_status']);
		$exist = $this->tmodel->if_exist('',$field);
		if(!$o->not_exist($exist,'#opt_status')){
			echo $o->result();	
			return;
		}

		//mencegah data kosong
		if(!$o->not_empty($val['picture'],'#picture')){
			echo $o->result();	
			return;
		}

		//mencegah data double
		$field=array('picture'=>$val['picture']);
		$exist = $this->tmodel->if_exist('',$field);
		if(!$o->not_exist($exist,'#picture')){
			echo $o->result();	
			return;
		}

		//mencegah data kosong
		if(!$o->not_empty($val['nama'],'#nama')){
			echo $o->result();	
			return;
		}

		//mencegah data double
		$field=array('nama'=>$val['nama']);
		$exist = $this->tmodel->if_exist('',$field);
		if(!$o->not_exist($exist,'#nama')){
			echo $o->result();	
			return;
		}

		//mencegah data kosong
		if(!$o->not_empty($val['agentid'],'#agentid')){
			echo $o->result();	
			return;
		}

		//mencegah data double
		$field=array('agentid'=>$val['agentid']);
		$exist = $this->tmodel->if_exist('',$field);
		if(!$o->not_exist($exist,'#agentid')){
			echo $o->result();	
			return;
		}

		//mencegah data kosong
		if(!$o->not_empty($val['kategori'],'#kategori')){
			echo $o->result();	
			return;
		}

		//mencegah data double
		$field=array('kategori'=>$val['kategori']);
		$exist = $this->tmodel->if_exist('',$field);
		if(!$o->not_exist($exist,'#kategori')){
			echo $o->result();	
			return;
		}

		unset($val['id']);
		$success = $this->tmodel->insert($val);
		echo $o->auto_result($success);

	}

	public function update($id){
		$id 				= $this->security->xss_clean($id);
		$id_generate		= $id;
		
		/** proses decode id 
		* important !! tempdata digunakan sbagai antisipasi
		* perubahan session saat membuka tab baru secara bersamaan
		**/
		$this->log_temp	= $this->session->userdata($this->log_key);
		$this->session->set_tempdata($id,$this->log_temp,300);
		
		//mengembalikan id asli
		$id = _decode_id($id,$this->log_temp);
		
		$row = $this->tmodel->get_by_id($id);
		
		if($row){
			$data = array(
				'title_page_big'		=> 'Buat Baru',
				'title'					=> $this->title,
				'link_save'				=> site_url().'Agent/Agent/update_action',
				'link_back'				=> $this->agent->referrer(),
				'data'					=> $row,
				'id'					=> $id_generate,
			);
			
			$this->template->load('Agent/Agent_form',$data);
		}else{
			redirect($this->agent->referrer());
		}
	}

	public function update_action(){
		$data 	= $this->input->post('data_ajax',true);
		$val	= json_decode($data,true);
		$this->log_temp		= $this->session->tempdata($val['id']);
		$val['id']				= _decode_id($val['id'],$this->log_temp);
		
		$o		= new Outputview(); 
			
		/* 
		*	untuk mengganti message output
		* tambahkan perintah : $o->message = 'isi pesan'; 
 		* sebelum perintah validasi.
		* ex.
		* 	$o->message = 'halo ini pesan baru';
		* 	if(!$o->not_empty($val['descriptions'],'#descriptions')){
		*		echo $o->result();	
		*		return;
		*  	}
		*
		*/			

		//mencegah data kosong
		if(!$o->not_empty($val['nmuser'],'#nmuser')){
			echo $o->result();	
			return;
		}

		//mencegah data double
		$field=array('nmuser'=>$val['nmuser']);
		$exist = $this->tmodel->if_exist($val['id'],$field);
		if(!$o->not_exist($exist,'#nmuser')){
			echo $o->result();	
			return;
		}

		//mencegah data kosong
		if(!$o->not_empty($val['passuser'],'#passuser')){
			echo $o->result();	
			return;
		}

		//mencegah data double
		$field=array('passuser'=>$val['passuser']);
		$exist = $this->tmodel->if_exist($val['id'],$field);
		if(!$o->not_exist($exist,'#passuser')){
			echo $o->result();	
			return;
		}

		//mencegah data kosong
		if(!$o->not_empty($val['opt_level'],'#opt_level')){
			echo $o->result();	
			return;
		}

		//mencegah data double
		$field=array('opt_level'=>$val['opt_level']);
		$exist = $this->tmodel->if_exist($val['id'],$field);
		if(!$o->not_exist($exist,'#opt_level')){
			echo $o->result();	
			return;
		}

		//mencegah data kosong
		if(!$o->not_empty($val['opt_status'],'#opt_status')){
			echo $o->result();	
			return;
		}

		//mencegah data double
		$field=array('opt_status'=>$val['opt_status']);
		$exist = $this->tmodel->if_exist($val['id'],$field);
		if(!$o->not_exist($exist,'#opt_status')){
			echo $o->result();	
			return;
		}

		//mencegah data kosong
		if(!$o->not_empty($val['picture'],'#picture')){
			echo $o->result();	
			return;
		}

		//mencegah data double
		$field=array('picture'=>$val['picture']);
		$exist = $this->tmodel->if_exist($val['id'],$field);
		if(!$o->not_exist($exist,'#picture')){
			echo $o->result();	
			return;
		}

		//mencegah data kosong
		if(!$o->not_empty($val['nama'],'#nama')){
			echo $o->result();	
			return;
		}

		//mencegah data double
		$field=array('nama'=>$val['nama']);
		$exist = $this->tmodel->if_exist($val['id'],$field);
		if(!$o->not_exist($exist,'#nama')){
			echo $o->result();	
			return;
		}

		//mencegah data kosong
		if(!$o->not_empty($val['agentid'],'#agentid')){
			echo $o->result();	
			return;
		}

		//mencegah data double
		$field=array('agentid'=>$val['agentid']);
		$exist = $this->tmodel->if_exist($val['id'],$field);
		if(!$o->not_exist($exist,'#agentid')){
			echo $o->result();	
			return;
		}

		//mencegah data kosong
		if(!$o->not_empty($val['kategori'],'#kategori')){
			echo $o->result();	
			return;
		}

		//mencegah data double
		$field=array('kategori'=>$val['kategori']);
		$exist = $this->tmodel->if_exist($val['id'],$field);
		if(!$o->not_exist($exist,'#kategori')){
			echo $o->result();	
			return;
		}


		$success = $this->tmodel->update($val['id'],$val);
		echo $o->auto_result($success);

	}

	public function delete_multiple(){
		$data=$this->input->get('data_ajax',true);
		$val=json_decode($data,true);
		$data = explode(',',$val['data_delete']);

		//get key generate
		$log_id = $this->session->userdata($this->log_key);
		$xx=0;
		foreach($data as $value){
			$value =  _decode_id($value,$log_id);
			//menganti ke id asli
			$data[$xx] = $value;
			$xx++;	
		}
		
		$success = $this->tmodel->delete_multiple($data);
		
		$o = new Outputview();
		
		//create message
		if($success){
			$o->success 	= 'true';
			$o->message	= 'Data berhasil di hapus !';
		}else{
			$o->success 	= 'false';
			$o->message	= 'Opps..Gagal menghapus data !!';
		}
		
		
		echo $o->result();
	
	}



};

/* END */
/* Mohon untuk tidak mengubah informasi ini : */
/* Generated by YBS CRUD Generator 2020-01-30 09:24:57 */
/* contact : YAP BRIDGING SYSTEM 		*/
/*			 bridging.system@gmail.com  */
/* 			 MAKASSAR CITY, INDONESIAN 	*/


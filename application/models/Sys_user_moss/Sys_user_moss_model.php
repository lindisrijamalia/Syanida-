<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sys_user_moss_model extends CI_Model {
   public $id;	
   function __construct(){
        parent::__construct();
   }	
	
	public function json(){
		$this->datatables->select('
			sys_user_moss.id as id,
			sys_user_moss.agentid as agentid,
			sys_user_moss.periode_start as periode_start,
			sys_user_moss.periode_end as periode_end,
			sys_user_moss.shift as shift,
			agentid.id as agentid_id,
			agentid.nmuser as nmuser,
			agentid.passuser as passuser,
			agentid.opt_level as opt_level,
			agentid.opt_status as opt_status,
			agentid.picture as picture,
			agentid.nama as nama,
			agentid.agentid as agentid_agentid,
			agentid.kategori as kategori,
			agentid.tl as tl,
			agentid.nik_absensi as nik_absensi,
			shift.id as shift_id,
			shift.keterangan as keterangan,
		');
		
		$this->datatables->from('sys_user_moss');
	
		$this->datatables->join('sys_user agentid','agentid.id=sys_user_moss.agentid','LEFT'); 
	
		$this->datatables->join('shift_moss shift','shift.id=sys_user_moss.shift','LEFT'); 

		
		
		//mengembalikan dalam bentuk array
		$q =  json_decode($this->datatables->generate(),true);
		return $q;
	}
	

   public function get_all(){
		$afield = array(
			'sys_user_moss.id as id',
			'sys_user_moss.agentid as agentid',
			'sys_user_moss.periode_start as periode_start',
			'sys_user_moss.periode_end as periode_end',
			'sys_user_moss.shift as shift',
			'agentid.id as agentid_id',
			'agentid.nmuser as nmuser',
			'agentid.passuser as passuser',
			'agentid.opt_level as opt_level',
			'agentid.opt_status as opt_status',
			'agentid.picture as picture',
			'agentid.nama as nama',
			'agentid.agentid as agentid_agentid',
			'agentid.kategori as kategori',
			'agentid.tl as tl',
			'agentid.nik_absensi as nik_absensi',
			'shift.id as shift_id',
			'shift.keterangan as keterangan',
		
		);
		$this->db->select($afield);
		$this->db->join('sys_user agentid','agentid.id=sys_user_moss.agentid','LEFT'); 
		$this->db->join('shift_moss shift','shift.id=sys_user_moss.shift','LEFT'); 

		$this->db->order_by('sys_user_moss.id', 'ASC');
		return $this->db->get('sys_user_moss')->result_array();
   }


	public function get_by_id($id){
		$afield = array(
			'sys_user_moss.id as id',
			'sys_user_moss.agentid as agentid',
			'sys_user_moss.periode_start as periode_start',
			'sys_user_moss.periode_end as periode_end',
			'sys_user_moss.shift as shift',
			'agentid.id as agentid_id',
			'agentid.nmuser as nmuser',
			'agentid.passuser as passuser',
			'agentid.opt_level as opt_level',
			'agentid.opt_status as opt_status',
			'agentid.picture as picture',
			'agentid.nama as nama',
			'agentid.agentid as agentid_agentid',
			'agentid.kategori as kategori',
			'agentid.tl as tl',
			'agentid.nik_absensi as nik_absensi',
			'shift.id as shift_id',
			'shift.keterangan as keterangan',
		
		);
		$this->db->select($afield);
		$this->db->join('sys_user agentid','agentid.id=sys_user_moss.agentid','LEFT'); 
		$this->db->join('shift_moss shift','shift.id=sys_user_moss.shift','LEFT'); 

		$this->db->where('sys_user_moss.id', $id);
		$this->db->order_by('sys_user_moss.id', 'ASC');
		return $this->db->get('sys_user_moss')->row();
   }


	/* Memastikan data yg dibuat tidak kembar/sama,
	   fungsi ini sebagai pengganti fungsi primary key dr db,
	   krn primary key sudah di gunakan untuk column id.
	   -create : id di kosongkan.
	   -update : id di isi dengan id data yg di proses.	
	*/	
	function if_exist($id,$data){
		$this->db->where('sys_user_moss.id <>',$id);

		$q = $this->db->get_where('sys_user_moss', $data)->result_array();
		
		if(count($q)>0){
			return true;
		}else{
			return false;
		}		

	

	}


	function insert($data){
	
	    /* transaction rollback */
		$this->db->trans_start();
		
		$this->db->insert('sys_user_moss', $data);		
		/* id primary yg baru saja di input*/
		$this->id = $this->db->insert_id(); 
		
		$this->db->trans_complete();
		return $this->db->trans_status(); //return true or false
	}

	function update($id,$data){

		/* transaction rollback */
		$this->db->trans_start();

		$this->db->where('sys_user_moss.id', $id);
		$this->db->update('sys_user_moss', $data);
		
		$this->db->trans_complete();
		return $this->db->trans_status(); //return true or false	
	}

	function delete_multiple($data){
		/* transaction rollback */
		$this->db->trans_start();
		
		if(!empty($data)){
			$this->db->where_in('sys_user_moss.id',$data);	
	
			$this->db->delete('sys_user_moss');
		}
		
		$this->db->trans_complete();
		return $this->db->trans_status(); //return true or false	
		
	}


};

/* END */
/* Mohon untuk tidak mengubah informasi ini : */
/* Generated by YBS CRUD Generator 2020-04-03 12:45:33 */
/* contact : YAP BRIDGING SYSTEM 		*/
/*			 bridging.system@gmail.com  */
/* 			 MAKASSAR CITY, INDONESIAN 	*/

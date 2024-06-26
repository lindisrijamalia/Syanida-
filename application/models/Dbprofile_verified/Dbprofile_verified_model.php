<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dbprofile_verified_model extends CI_Model {
   public $id;	
   function __construct(){
		parent::__construct();
		$this->dbprofile_verified = $this->load->database('dbprofile_verified',TRUE);
   }	
	
	public function json(){
		$this->datatables->select('
		DBPROFILE_VERIFIED.NCLI as NCLI,
			DBPROFILE_VERIFIED.NO_PSTN as NO_PSTN,
			DBPROFILE_VERIFIED.NO_SPEEDY as NO_SPEEDY,
			DBPROFILE_VERIFIED.NAMA_PELANGGAN as NAMA_PELANGGAN,
			DBPROFILE_VERIFIED.RELASI as RELASI,
			DBPROFILE_VERIFIED.NO_HP as NO_HP,
			DBPROFILE_VERIFIED.STATUS_HP as STATUS_HP,
			DBPROFILE_VERIFIED.EMAIL as EMAIL,
			DBPROFILE_VERIFIED.STATUS_EMAIL as STATUS_EMAIL,
			DBPROFILE_VERIFIED.NAMA_PEMILIK as NAMA_PEMILIK,
			DBPROFILE_VERIFIED.ALAMAT as ALAMAT,
			DBPROFILE_VERIFIED.KOTA as KOTA,
			DBPROFILE_VERIFIED.REGIONAL as REGIONAL,
			DBPROFILE_VERIFIED.UPDATE_BY as UPDATE_BY,
			DBPROFILE_VERIFIED.TGL_VERIFIKASI as TGL_VERIFIKASI,
			DBPROFILE_VERIFIED.IS_LAST as IS_LAST,
			DBPROFILE_VERIFIED.SUMBER as SUMBER,
			DBPROFILE_VERIFIED.TGL_UPDATE as TGL_UPDATE,
			DBPROFILE_VERIFIED.DATRS as DATRS,
			DBPROFILE_VERIFIED.ALAMAT_KORESPONDENSI as ALAMAT_KORESPONDENSI,
			DBPROFILE_VERIFIED.FACEBOOK_ID as FACEBOOK_ID,
			DBPROFILE_VERIFIED.FACEBOOK as FACEBOOK,
			DBPROFILE_VERIFIED.TWITTER_ID as TWITTER_ID,
			DBPROFILE_VERIFIED.TWITTER as TWITTER,
			DBPROFILE_VERIFIED.TWITTER_FOLLOWER as TWITTER_FOLLOWER,
			DBPROFILE_VERIFIED.TWITTER_STATUS as TWITTER_STATUS,
			DBPROFILE_VERIFIED.NIK as NIK,
			DBPROFILE_VERIFIED.PATH_ as PATH_,
			DBPROFILE_VERIFIED.INSTAGRAM as INSTAGRAM,
			DBPROFILE_VERIFIED.NAMA_LGKP as NAMA_LGKP,
			DBPROFILE_VERIFIED.AGAMA as AGAMA,
			DBPROFILE_VERIFIED.TGL_LHR as TGL_LHR,
			DBPROFILE_VERIFIED.TMPT_LHR as TMPT_LHR,
			DBPROFILE_VERIFIED.JENIS_KLMIN as JENIS_KLMIN,
			DBPROFILE_VERIFIED.JENIS_PKRJN as JENIS_PKRJN,
			DBPROFILE_VERIFIED.IS_INDIHOME as IS_INDIHOME,
			DBPROFILE_VERIFIED.NO_HP_1 as NO_HP_1,
			DBPROFILE_VERIFIED.EMAIL_1 as EMAIL_1,
			DBPROFILE_VERIFIED.STATUS_TELPON as STATUS_TELPON,
			DBPROFILE_VERIFIED.STATUS_INET as STATUS_INET,
			DBPROFILE_VERIFIED.NDOS as NDOS,
			DBPROFILE_VERIFIED.NO_HP_MYIH as NO_HP_MYIH,
			DBPROFILE_VERIFIED.NO_HP_BILLING as NO_HP_BILLING,
			DBPROFILE_VERIFIED.KET_MANJA as KET_MANJA,
			DBPROFILE_VERIFIED.LATITUDE as LATITUDE,
			DBPROFILE_VERIFIED.LONGITUDE as LONGITUDE,
		');
		
		$this->datatables->from('DBPROFILE_VERIFIED');

		
		
		//mengembalikan dalam bentuk array
		$q =  json_decode($this->datatables->generate(),true);
		return $q;
	}
	

   public function get_all(){
		$afield = array(
			'dbprofile_verified.NCLI as NCLI',
			'dbprofile_verified.NO_PSTN as NO_PSTN',
			'dbprofile_verified.NO_SPEEDY as NO_SPEEDY',
			'dbprofile_verified.NAMA_PELANGGAN as NAMA_PELANGGAN',
			'dbprofile_verified.RELASI as RELASI',
			'dbprofile_verified.NO_HP as NO_HP',
			'dbprofile_verified.STATUS_HP as STATUS_HP',
			'dbprofile_verified.EMAIL as EMAIL',
			'dbprofile_verified.STATUS_EMAIL as STATUS_EMAIL',
			'dbprofile_verified.NAMA_PEMILIK as NAMA_PEMILIK',
			'dbprofile_verified.ALAMAT as ALAMAT',
			'dbprofile_verified.KOTA as KOTA',
			'dbprofile_verified.REGIONAL as REGIONAL',
			'dbprofile_verified.UPDATE_BY as UPDATE_BY',
			'dbprofile_verified.TGL_VERIFIKASI as TGL_VERIFIKASI',
			'dbprofile_verified.IS_LAST as IS_LAST',
			'dbprofile_verified.SUMBER as SUMBER',
			'dbprofile_verified.TGL_UPDATE as TGL_UPDATE',
			'dbprofile_verified.DATRS as DATRS',
			'dbprofile_verified.ALAMAT_KORESPONDENSI as ALAMAT_KORESPONDENSI',
			'dbprofile_verified.FACEBOOK_ID as FACEBOOK_ID',
			'dbprofile_verified.FACEBOOK as FACEBOOK',
			'dbprofile_verified.TWITTER_ID as TWITTER_ID',
			'dbprofile_verified.TWITTER as TWITTER',
			'dbprofile_verified.TWITTER_FOLLOWER as TWITTER_FOLLOWER',
			'dbprofile_verified.TWITTER_STATUS as TWITTER_STATUS',
			'dbprofile_verified.NIK as NIK',
			'dbprofile_verified.PATH_ as PATH_',
			'dbprofile_verified.INSTAGRAM as INSTAGRAM',
			'dbprofile_verified.NAMA_LGKP as NAMA_LGKP',
			'dbprofile_verified.AGAMA as AGAMA',
			'dbprofile_verified.TGL_LHR as TGL_LHR',
			'dbprofile_verified.TMPT_LHR as TMPT_LHR',
			'dbprofile_verified.JENIS_KLMIN as JENIS_KLMIN',
			'dbprofile_verified.JENIS_PKRJN as JENIS_PKRJN',
			'dbprofile_verified.IS_INDIHOME as IS_INDIHOME',
			'dbprofile_verified.NO_HP_1 as NO_HP_1',
			'dbprofile_verified.EMAIL_1 as EMAIL_1',
			'dbprofile_verified.STATUS_TELPON as STATUS_TELPON',
			'dbprofile_verified.STATUS_INET as STATUS_INET',
			'dbprofile_verified.NDOS as NDOS',
			'dbprofile_verified.NO_HP_MYIH as NO_HP_MYIH',
			'dbprofile_verified.NO_HP_BILLING as NO_HP_BILLING',
			'dbprofile_verified.KET_MANJA as KET_MANJA',
			'dbprofile_verified.LATITUDE as LATITUDE',
			'dbprofile_verified.LONGITUDE as LONGITUDE',
		
		);
		$this->dbprofile_verified->select($afield);

		$this->dbprofile_verified->order_by('dbprofile_verified.id', 'ASC');
		return $this->dbprofile_verified->get('dbprofile_verified')->result_array();
   }


	public function get_by_id($id,$berdasarkan){
		$afield = array(
			'DBPROFILE_VERIFIED.NCLI as NCLI',
			'DBPROFILE_VERIFIED.NO_PSTN as NO_PSTN',
			'DBPROFILE_VERIFIED.NO_SPEEDY as NO_SPEEDY',
			'DBPROFILE_VERIFIED.NAMA_PELANGGAN as NAMA_PELANGGAN',
			'DBPROFILE_VERIFIED.RELASI as RELASI',
			'DBPROFILE_VERIFIED.NO_HP as NO_HP',
			'DBPROFILE_VERIFIED.STATUS_HP as STATUS_HP',
			'DBPROFILE_VERIFIED.EMAIL as EMAIL',
			'DBPROFILE_VERIFIED.STATUS_EMAIL as STATUS_EMAIL',
			'DBPROFILE_VERIFIED.NAMA_PEMILIK as NAMA_PEMILIK',
			'DBPROFILE_VERIFIED.ALAMAT as ALAMAT',
			'DBPROFILE_VERIFIED.KOTA as KOTA',
			'DBPROFILE_VERIFIED.REGIONAL as REGIONAL',
			'DBPROFILE_VERIFIED.UPDATE_BY as UPDATE_BY',
			'DBPROFILE_VERIFIED.TGL_VERIFIKASI as TGL_VERIFIKASI',
			'DBPROFILE_VERIFIED.IS_LAST as IS_LAST',
			'DBPROFILE_VERIFIED.SUMBER as SUMBER',
			'DBPROFILE_VERIFIED.TGL_UPDATE as TGL_UPDATE',
			'DBPROFILE_VERIFIED.DATRS as DATRS',
			'DBPROFILE_VERIFIED.ALAMAT_KORESPONDENSI as ALAMAT_KORESPONDENSI',
			'DBPROFILE_VERIFIED.FACEBOOK_ID as FACEBOOK_ID',
			'DBPROFILE_VERIFIED.FACEBOOK as FACEBOOK',
			'DBPROFILE_VERIFIED.TWITTER_ID as TWITTER_ID',
			'DBPROFILE_VERIFIED.TWITTER as TWITTER',
			'DBPROFILE_VERIFIED.TWITTER_FOLLOWER as TWITTER_FOLLOWER',
			'DBPROFILE_VERIFIED.TWITTER_STATUS as TWITTER_STATUS',
			'DBPROFILE_VERIFIED.NIK as NIK',
			'DBPROFILE_VERIFIED.PATH_ as PATH_',
			'DBPROFILE_VERIFIED.INSTAGRAM as INSTAGRAM',
			'DBPROFILE_VERIFIED.NAMA_LGKP as NAMA_LGKP',
			'DBPROFILE_VERIFIED.AGAMA as AGAMA',
			'DBPROFILE_VERIFIED.TGL_LHR as TGL_LHR',
			'DBPROFILE_VERIFIED.TMPT_LHR as TMPT_LHR',
			'DBPROFILE_VERIFIED.JENIS_KLMIN as JENIS_KLMIN',
			'DBPROFILE_VERIFIED.JENIS_PKRJN as JENIS_PKRJN',
			'DBPROFILE_VERIFIED.IS_INDIHOME as IS_INDIHOME',
			'DBPROFILE_VERIFIED.NO_HP_1 as NO_HP_1',
			'DBPROFILE_VERIFIED.EMAIL_1 as EMAIL_1',
			'DBPROFILE_VERIFIED.STATUS_TELPON as STATUS_TELPON',
			'DBPROFILE_VERIFIED.STATUS_INET as STATUS_INET',
			'DBPROFILE_VERIFIED.NDOS as NDOS',
			'DBPROFILE_VERIFIED.NO_HP_MYIH as NO_HP_MYIH',
			'DBPROFILE_VERIFIED.NO_HP_BILLING as NO_HP_BILLING',
			'DBPROFILE_VERIFIED.KET_MANJA as KET_MANJA',
			'DBPROFILE_VERIFIED.LATITUDE as LATITUDE',
			'DBPROFILE_VERIFIED.LONGITUDE as LONGITUDE',
		
		);
		$this->dbprofile_verified->select($afield);

		$this->dbprofile_verified->where('DBPROFILE_VERIFIED.'.$berdasarkan, $id);
		$this->dbprofile_verified->order_by('DBPROFILE_VERIFIED.TGL_VERIFIKASI', 'DESC');
		return $this->dbprofile_verified->get('DBPROFILE_VERIFIED')->row();
   }
   public function get_by_id_2($id,$berdasarkan,$tgl_veri){
	$afield = array(
		'DBPROFILE_VERIFIED.NCLI as NCLI',
		'DBPROFILE_VERIFIED.NO_PSTN as NO_PSTN',
		'DBPROFILE_VERIFIED.NO_SPEEDY as NO_SPEEDY',
		'DBPROFILE_VERIFIED.NAMA_PELANGGAN as NAMA_PELANGGAN',
		'DBPROFILE_VERIFIED.RELASI as RELASI',
		'DBPROFILE_VERIFIED.NO_HP as NO_HP',
		'DBPROFILE_VERIFIED.STATUS_HP as STATUS_HP',
		'DBPROFILE_VERIFIED.EMAIL as EMAIL',
		'DBPROFILE_VERIFIED.STATUS_EMAIL as STATUS_EMAIL',
		'DBPROFILE_VERIFIED.NAMA_PEMILIK as NAMA_PEMILIK',
		'DBPROFILE_VERIFIED.ALAMAT as ALAMAT',
		'DBPROFILE_VERIFIED.KOTA as KOTA',
		'DBPROFILE_VERIFIED.REGIONAL as REGIONAL',
		'DBPROFILE_VERIFIED.UPDATE_BY as UPDATE_BY',
		'DBPROFILE_VERIFIED.TGL_VERIFIKASI as TGL_VERIFIKASI',
		'DBPROFILE_VERIFIED.IS_LAST as IS_LAST',
		'DBPROFILE_VERIFIED.SUMBER as SUMBER',
		'DBPROFILE_VERIFIED.TGL_UPDATE as TGL_UPDATE',
		'DBPROFILE_VERIFIED.DATRS as DATRS',
		'DBPROFILE_VERIFIED.ALAMAT_KORESPONDENSI as ALAMAT_KORESPONDENSI',
		'DBPROFILE_VERIFIED.FACEBOOK_ID as FACEBOOK_ID',
		'DBPROFILE_VERIFIED.FACEBOOK as FACEBOOK',
		'DBPROFILE_VERIFIED.TWITTER_ID as TWITTER_ID',
		'DBPROFILE_VERIFIED.TWITTER as TWITTER',
		'DBPROFILE_VERIFIED.TWITTER_FOLLOWER as TWITTER_FOLLOWER',
		'DBPROFILE_VERIFIED.TWITTER_STATUS as TWITTER_STATUS',
		'DBPROFILE_VERIFIED.NIK as NIK',
		'DBPROFILE_VERIFIED.PATH_ as PATH_',
		'DBPROFILE_VERIFIED.INSTAGRAM as INSTAGRAM',
		'DBPROFILE_VERIFIED.NAMA_LGKP as NAMA_LGKP',
		'DBPROFILE_VERIFIED.AGAMA as AGAMA',
		'DBPROFILE_VERIFIED.TGL_LHR as TGL_LHR',
		'DBPROFILE_VERIFIED.TMPT_LHR as TMPT_LHR',
		'DBPROFILE_VERIFIED.JENIS_KLMIN as JENIS_KLMIN',
		'DBPROFILE_VERIFIED.JENIS_PKRJN as JENIS_PKRJN',
		'DBPROFILE_VERIFIED.IS_INDIHOME as IS_INDIHOME',
		'DBPROFILE_VERIFIED.NO_HP_1 as NO_HP_1',
		'DBPROFILE_VERIFIED.EMAIL_1 as EMAIL_1',
		'DBPROFILE_VERIFIED.STATUS_TELPON as STATUS_TELPON',
		'DBPROFILE_VERIFIED.STATUS_INET as STATUS_INET',
		'DBPROFILE_VERIFIED.NDOS as NDOS',
		'DBPROFILE_VERIFIED.NO_HP_MYIH as NO_HP_MYIH',
		'DBPROFILE_VERIFIED.NO_HP_BILLING as NO_HP_BILLING',
		'DBPROFILE_VERIFIED.KET_MANJA as KET_MANJA',
		'DBPROFILE_VERIFIED.LATITUDE as LATITUDE',
		'DBPROFILE_VERIFIED.LONGITUDE as LONGITUDE',
	
	);
	$this->dbprofile_verified->select($afield);

	$this->dbprofile_verified->where('DBPROFILE_VERIFIED.'.$berdasarkan, $id);
	$this->dbprofile_verified->where('DBPROFILE_VERIFIED.TGL_VERIFIKASI', $tgl_veri);
	$this->dbprofile_verified->order_by('DBPROFILE_VERIFIED.TGL_VERIFIKASI', 'DESC');
	return $this->dbprofile_verified->get('DBPROFILE_VERIFIED')->row();
}
   public function get_by_filter($id,$berdasarkan){
	$afield = array(
		'DBPROFILE_VERIFIED.NCLI as NCLI',
		'DBPROFILE_VERIFIED.NO_PSTN as NO_PSTN',
		'DBPROFILE_VERIFIED.NO_SPEEDY as NO_SPEEDY',
		'DBPROFILE_VERIFIED.NAMA_PELANGGAN as NAMA_PELANGGAN',
		'DBPROFILE_VERIFIED.RELASI as RELASI',
		'DBPROFILE_VERIFIED.NO_HP as NO_HP',
		'DBPROFILE_VERIFIED.STATUS_HP as STATUS_HP',
		'DBPROFILE_VERIFIED.EMAIL as EMAIL',
		'DBPROFILE_VERIFIED.STATUS_EMAIL as STATUS_EMAIL',
		'DBPROFILE_VERIFIED.NAMA_PEMILIK as NAMA_PEMILIK',
		'DBPROFILE_VERIFIED.ALAMAT as ALAMAT',
		'DBPROFILE_VERIFIED.KOTA as KOTA',
		'DBPROFILE_VERIFIED.REGIONAL as REGIONAL',
		'DBPROFILE_VERIFIED.UPDATE_BY as UPDATE_BY',
		'DBPROFILE_VERIFIED.TGL_VERIFIKASI as TGL_VERIFIKASI',
		'DBPROFILE_VERIFIED.IS_LAST as IS_LAST',
		'DBPROFILE_VERIFIED.SUMBER as SUMBER',
		'DBPROFILE_VERIFIED.TGL_UPDATE as TGL_UPDATE',
		'DBPROFILE_VERIFIED.DATRS as DATRS',
		'DBPROFILE_VERIFIED.ALAMAT_KORESPONDENSI as ALAMAT_KORESPONDENSI',
		'DBPROFILE_VERIFIED.FACEBOOK_ID as FACEBOOK_ID',
		'DBPROFILE_VERIFIED.FACEBOOK as FACEBOOK',
		'DBPROFILE_VERIFIED.TWITTER_ID as TWITTER_ID',
		'DBPROFILE_VERIFIED.TWITTER as TWITTER',
		'DBPROFILE_VERIFIED.TWITTER_FOLLOWER as TWITTER_FOLLOWER',
		'DBPROFILE_VERIFIED.TWITTER_STATUS as TWITTER_STATUS',
		'DBPROFILE_VERIFIED.NIK as NIK',
		'DBPROFILE_VERIFIED.PATH_ as PATH_',
		'DBPROFILE_VERIFIED.INSTAGRAM as INSTAGRAM',
		'DBPROFILE_VERIFIED.NAMA_LGKP as NAMA_LGKP',
		'DBPROFILE_VERIFIED.AGAMA as AGAMA',
		'DBPROFILE_VERIFIED.TGL_LHR as TGL_LHR',
		'DBPROFILE_VERIFIED.TMPT_LHR as TMPT_LHR',
		'DBPROFILE_VERIFIED.JENIS_KLMIN as JENIS_KLMIN',
		'DBPROFILE_VERIFIED.JENIS_PKRJN as JENIS_PKRJN',
		'DBPROFILE_VERIFIED.IS_INDIHOME as IS_INDIHOME',
		'DBPROFILE_VERIFIED.NO_HP_1 as NO_HP_1',
		'DBPROFILE_VERIFIED.EMAIL_1 as EMAIL_1',
		'DBPROFILE_VERIFIED.STATUS_TELPON as STATUS_TELPON',
		'DBPROFILE_VERIFIED.STATUS_INET as STATUS_INET',
		'DBPROFILE_VERIFIED.NDOS as NDOS',
		'DBPROFILE_VERIFIED.NO_HP_MYIH as NO_HP_MYIH',
		'DBPROFILE_VERIFIED.NO_HP_BILLING as NO_HP_BILLING',
		'DBPROFILE_VERIFIED.KET_MANJA as KET_MANJA',
		'DBPROFILE_VERIFIED.LATITUDE as LATITUDE',
		'DBPROFILE_VERIFIED.LONGITUDE as LONGITUDE',
	
	);
	$this->dbprofile_verified->select($afield);

	$this->dbprofile_verified->where('DBPROFILE_VERIFIED.'.$berdasarkan, $id);
	$this->dbprofile_verified->order_by('DBPROFILE_VERIFIED.TGL_VERIFIKASI', 'ASC');
	return $this->dbprofile_verified->get('DBPROFILE_VERIFIED')->result_array();
}

	/* Memastikan data yg dibuat tidak kembar/sama,
	   fungsi ini sebagai pengganti fungsi primary key dr db,
	   krn primary key sudah di gunakan untuk column id.
	   -create : id di kosongkan.
	   -update : id di isi dengan id data yg di proses.	
	*/	
	function if_exist($id,$data,$berdasarkan){
		$this->dbprofile_verified->where('DBPROFILE_VERIFIED.'.$berdasarkan.' <>',$id);

		$q = $this->dbprofile_verified->get_where('DBPROFILE_VERIFIED', $data)->result_array();
		
		if(count($q)>0){
			return true;
		}else{
			return false;
		}		

	

	}


	// function insert($data){
	
	//     /* transaction rollback */
	// 	$this->dbprofile_verified->trans_start();
		
	// 	$this->dbprofile_verified->insert('dbprofile_verified', $data);		
	// 	/* id primary yg baru saja di input*/
	// 	$this->id = $this->dbprofile_verified->insert_id(); 
		
	// 	$this->dbprofile_verified->trans_complete();
	// 	return $this->dbprofile_verified->trans_status(); //return true or false
	// }

	function update($id,$data,$berdasarkan,$tgl_veri){

		/* transaction rollback */
		$this->dbprofile_verified->trans_start();

		$this->dbprofile_verified->where('DBPROFILE_VERIFIED.'.$berdasarkan, $id);
		$this->dbprofile_verified->where('DBPROFILE_VERIFIED.TGL_VERIFIKASI', $tgl_veri);
		$this->dbprofile_verified->update('DBPROFILE_VERIFIED', $data);
		
		$this->dbprofile_verified->trans_complete();
		return $this->dbprofile_verified->trans_status(); //return true or false	
	}



};

/* END */
/* Mohon untuk tidak mengubah informasi ini : */
/* Generated by YBS CRUD Generator 2020-02-08 07:42:27 */
/* contact : YAP BRIDGING SYSTEM 		*/
/*			 bridging.system@gmail.com  */
/* 			 MAKASSAR CITY, INDONESIAN 	*/

<?php
require APPPATH . 'controllers/sistem/General_title.php';
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Template_digital_channel_config {
	


   function __construct(){
	   /* title */
	    $this->general		= new General_title();
		$this->template_digital_channel_id	= 'ID';
		$this->template_digital_channel_template	= 'TEMPLATE';
		$this->template_digital_channel_jumlah_konten	= 'JUMLAH_KONTEN';
		$this->template_digital_channel_kode_template	= 'KODE_TEMPLATE';

		
		
		
		/*field_alias_database db*/
		$this->f_id	= 'id';
		$this->f_template	= 'template';
		$this->f_jumlah_konten	= 'jumlah_konten';
		$this->f_kode_template	= 'kode_template';

		
		
		
		/* CONFIG FORM LIST */
		/* field_alias_database => $title */	
		$this->table_column =array(
			$this->f_id	=> $this->template_digital_channel_id,
			$this->f_template	=> $this->template_digital_channel_template,
			$this->f_jumlah_konten	=> $this->template_digital_channel_jumlah_konten,
			$this->f_kode_template	=> $this->template_digital_channel_kode_template,
		);

	}

};









/* END */
/* Mohon untuk tidak mengubah informasi ini : */
/* Generated by YBS CRUD Generator 2020-12-15 07:42:06 */
/* contact : YAP BRIDGING SYSTEM 		*/
/*			 bridging.system@gmail.com  */
/* 			 MAKASSAR CITY, INDONESIAN 	*/


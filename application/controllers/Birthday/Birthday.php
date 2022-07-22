<?php


if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Birthday extends CI_Controller
{
	private $log_key, $log_temp, $title;
	function __construct()
	{
		parent::__construct();
		$this->load->model('Custom_model/Sys_user_table_model', 'sys_user');
	}


	public function index()
	{


		$this->load->model('sys/Sys_user_log_model', 'log_login');
		$this->load->model('Custom_model/Sys_user_table_model', 'Sys_user_table_model');
		$idlogin = $this->session->userdata('idlogin');
		$logindata = $this->log_login->get_by_id($idlogin);
		$userdata = $this->Sys_user_table_model->get_row(array("id" => $logindata->id_user));
		$tgllahir = $this->db->query("SELECT * FROM sys_user_detail WHERE agentid='$userdata->agentid'")->row();
		$curentdate = date('m-d');

		if ($curentdate == substr($tgllahir->tanggal_lahir, 5, 5)) {
			$this->load->view('Birthday/Birthday');
		} else {
			echo "<script>alert(':)');</script>";
		}
	}
};

/* END */
/* Mohon untuk tidak mengubah informasi ini : */
/* Generated by YBS CRUD Generator 2020-01-12 19:58:23 */
/* contact : YAP BRIDGING SYSTEM 		*/
/*			 bridging.system@gmail.com  */
/* 			 MAKASSAR CITY, INDONESIAN 	*/

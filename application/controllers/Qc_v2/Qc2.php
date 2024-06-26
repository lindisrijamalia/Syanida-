<?php
require APPPATH . '/controllers/Report_profiling/Report_profiling_config.php';

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Qc extends CI_Controller
{
	private $log_key, $log_temp, $title;
	function __construct()
	{
		parent::__construct();
		$this->load->model('Custom_model/Status_call_model', 'status_call');
		$this->load->model('Custom_model/Sys_user_table_model', 'sys_user');
		// $this->load->model('Custom_model/Trans_profiling_model', 'trans_profiling');
		$this->load->model('Custom_model/Trans_profiling_infomedia_model', 'trans_profiling');
		$this->load->model('Custom_model/Trans_profiling_verifikasi_infomedia_model', 'trans_profiling_verifikasi');
		$this->load->model('Custom_model/Trans_profiling_daily_model', 'trans_profiling_daily');
		// $this->load->model('Custom_model/Asterisk_infomedia_model', 'asterisk');
		$this->load->model('Custom_model/Cdr_model', 'cdr');
		$this->load->model('Custom_model/qc_model', 'qc');


		$this->title = new Report_profiling_config();
	}

	////render by ajax
	public function index()
	{
		$data = array(
			'title_page_big'		=> 'Quality control',
			'title'					=> $this->title,
			'link_refresh_table'	=> site_url() . 'Status_call/Status_call/refresh_table/' . $this->_token,
			'link_create'			=> site_url() . 'Status_call/Status_call/create',
			'link_update'			=> site_url() . 'Status_call/Status_call/update',
			'link_delete'			=> site_url() . 'Status_call/Status_call/delete_multiple',
		);
		$start_filter = date('Y-m-d');
		$end_filter = date('Y-m-d');
		if (isset($_GET['start']) && isset($_GET['end'])) {
			$start_filter = $_GET['start'];
			$end_filter = $_GET['end'];
			$agentid = $_GET['agentid'];
		}
		$this->load->model('sys/Sys_user_log_model', 'log_login');
		$this->load->model('Custom_model/Sys_user_table_model', 'Sys_user_table_model');
		$idlogin = $this->session->userdata('idlogin');
		$logindata = $this->log_login->get_by_id($idlogin);
		$userdata = $this->Sys_user_table_model->get_row(array("id" => $logindata->id_user));
		$filter_agent = array("opt_level" => 8);
		$data['user_categori'] = '-';

		$data['list_agent_d'] = $this->sys_user->get_results($filter_agent);
		$this->load->model('Custom_model/Sys_user_log_in_out_table_model', 'Sys_log');

		$this->template->load('qc/Qc_list_by_ajax', $data);
	}

	// function check_verified()
	// {
	// 	$data = array(
	// 		'title_page_big'		=> 'Quality control',
	// 		'title'					=> $this->title,
	// 		'link_refresh_table'	=> site_url() . 'Status_call/Status_call/refresh_table/' . $this->_token,
	// 		'link_create'			=> site_url() . 'Status_call/Status_call/create',
	// 		'link_update'			=> site_url() . 'Status_call/Status_call/update',
	// 		'link_delete'			=> site_url() . 'Status_call/Status_call/delete_multiple',
	// 	);
	// 	$start_filter = date('Y-m-d');
	// 	$end_filter = date('Y-m-d');
	// 	if (isset($_GET['start']) && isset($_GET['end'])) {
	// 		$start_filter = $_GET['start'];
	// 		$end_filter = $_GET['end'];
	// 		$agentid = $_GET['agentid'];
	// 	}
	// 	$this->load->model('sys/Sys_user_log_model', 'log_login');
	// 	$this->load->model('Custom_model/Sys_user_table_model', 'Sys_user_table_model');
	// 	$idlogin = $this->session->userdata('idlogin');
	// 	$logindata = $this->log_login->get_by_id($idlogin);
	// 	$userdata = $this->Sys_user_table_model->get_row(array("id" => $logindata->id_user));
	// 	$filter_agent = array("opt_level" => 8);
	// 	$data['user_categori'] = '-';

	// 	$data['list_agent_d'] = $this->sys_user->get_results($filter_agent);
	// 	$this->load->model('Custom_model/Sys_user_log_in_out_table_model', 'Sys_log');

	// 	$this->template->load('qc/Qc_agent_by_ajax', $data);
	// }
	function get_data_list()
	{
		$data['controller'] = $this;
		$start_filter = date('Y-m-d');
		if (isset($_GET['start'])) {
			$start_filter = $_GET['start'];
			

			$data['status'] = $this->status_call->get_results();
			$where_agent = array("opt_level" => 8);
			$filter_agent = "";

			$this->load->model('sys/Sys_user_log_model', 'log_login');
			$this->load->model('Custom_model/Sys_user_table_model', 'Sys_user_table_model');
			$idlogin = $this->session->userdata('idlogin');
			$logindata = $this->log_login->get_by_id($idlogin);

			$userdata = $this->Sys_user_table_model->get_row(array("id" => $logindata->id_user));

			if ($userdata->opt_level == 8) {
				$agentid[0] = $userdata->agentid;
			}

			
			if ($userdata->opt_level == 9) {
				$where_agent['tl'] = $userdata->agentid;
			}
			$data['agent'] = $this->sys_user->get_results($where_agent, array("nama,agentid"));
			$filter = array();
			$data['query_trans_profiling'] = $this->trans_profiling_daily->live_query(
				"SELECT trans_profiling_last_month.* FROM trans_profiling_last_month 
				WHERE DATE(trans_profiling_last_month.lup) = '$start_filter'
				AND trans_profiling_last_month.veri_call='13'
				"
			);
		}
		$this->load->view('qc/agent_area', $data);
	}
	// function get_data_verified()
	// {
	// 	$data['controller'] = $this;
	// 	$start_filter = date('Y-m-d');
	// 	$end_filter = date('Y-m-d');
	// 	if (isset($_GET['start']) && isset($_GET['end'])) {
	// 		$start_filter = $_GET['start'];
	// 		$end_filter = $_GET['end'];
	// 		$agentid = $_GET['agentid'];

	// 		$data['status'] = $this->status_call->get_results();
	// 		$where_agent = array("opt_level" => 8);
	// 		$filter_agent = "";

	// 		$this->load->model('sys/Sys_user_log_model', 'log_login');
	// 		$this->load->model('Custom_model/Sys_user_table_model', 'Sys_user_table_model');
	// 		$idlogin = $this->session->userdata('idlogin');
	// 		$logindata = $this->log_login->get_by_id($idlogin);

	// 		$userdata = $this->Sys_user_table_model->get_row(array("id" => $logindata->id_user));

	// 		if (isset($agentid)) {

	// 			$where_agent['agentid'] = $agentid;
	// 			$filter_agent = " AND trans_profiling_last_month.veri_upd = '$agentid'";
	// 			$filter_agent_veri = " AND update_by = '$agentid'";
	// 		}
	// 		if ($userdata->opt_level == 9) {
	// 			$where_agent['tl'] = $userdata->agentid;
	// 		}
	// 		$data['agent'] = $this->sys_user->get_results($where_agent, array("nama,agentid"));
	// 		$filter = array();
	// 		$data['query_trans_profiling'] = $this->trans_profiling_daily->live_query(
	// 			"SELECT trans_profiling_last_month.* FROM trans_profiling_last_month 
	// 			WHERE DATE_FORMAT(trans_profiling_last_month.lup ,'%Y-%m-%d') >= '$start_filter' 
	// 			AND DATE_FORMAT(trans_profiling_last_month.lup ,'%Y-%m-%d') <= '$end_filter'
	// 			AND trans_profiling_last_month.veri_call='13'
	// 			$filter_agent
	// 			GROUP BY idx
	// 			ORDER BY trans_profiling_last_month.nama ASC
	// 			"
	// 		);
	// 	}
	// 	$this->load->view('qc/agent_area', $data);
	// }
	function edit_form_approve()
	{
		$data = array(
			'title_page_big'		=> 'Edit Quality Control ',
			'title'					=> $this->title,
			'link_save'				=> site_url() . 'Qc/Qc/update_action',
			'link_back'				=> $this->agent->referrer(),
		);

		$data['data_qc'] = $this->qc->get_row(array("id" => $_GET['id']));
		$ncli = $data['data_qc']->ncli;
		$agentid = $data['data_qc']->agentid;
		$lup = $data['data_qc']->lup;

		$filter_agent = " AND trans_profiling.veri_upd = '$agentid'";
		$data['query_trans_profiling'] = $this->trans_profiling->live_query(
			"SELECT trans_profiling.*,DATE_FORMAT(trans_profiling.lup ,'%Y-%m-%d') as lup_date FROM trans_profiling 
			WHERE trans_profiling.lup = '$lup'
			AND trans_profiling.veri_call='13'
			AND trans_profiling.veri_upd='$agentid'
			AND trans_profiling.ncli='$ncli'
			$filter_agent
			GROUP BY idx
			"			);
		$data['agent'] = $this->sys_user->get_row(array("agentid" => $agentid));
		$data['data'] = $data['query_trans_profiling']->row();
		$data['recording'] = false;
		// $data['q_recording'] = $this->cdr->get_row(array("dst" => "61" . $data['data']->handphone));
		// if (!$data['q_recording']) {
		// 	$data['q_recording'] = $this->cdr->get_row(array("dst" => "61" . $data['data']->pstn1));
		// }
		// if ($data['q_recording']) {
		// 	$data['recording'] = $data['q_recording']->recordingfile;
		// }
		$this->load->model('sys/Sys_user_log_model', 'log_login');
		$this->load->model('Custom_model/Sys_user_table_model', 'Sys_user_table_model');
		$idlogin = $this->session->userdata('idlogin');
		$data['loginid'] = $this->log_login->get_by_id($idlogin);


		$this->template->load('qc/edit_form_qc', $data);
	}
	
	function form_approve()
	{
		$data = array(
			'title_page_big'		=> 'Quality Control ',
			'title'					=> $this->title,
			'link_save'				=> site_url() . 'Qc/Qc/create_action',
			'link_back'				=> $this->agent->referrer(),
		);
		$ncli = $_GET['ncli'];
		$agentid = $_GET['agentid'];
		$start_filter = $_GET['start'];
		$filter_agent = " AND trans_profiling.veri_upd = '$agentid'";
		$data['query_trans_profiling'] = $this->trans_profiling->live_query(
			"SELECT trans_profiling.* FROM trans_profiling
			WHERE DATE_FORMAT(trans_profiling.lup ,'%Y-%m-%d') >= '$start_filter' 
			AND trans_profiling.veri_call='13'
			AND trans_profiling.veri_upd='$agentid'
			AND trans_profiling.ncli='$ncli'
			$filter_agent
			GROUP BY idx"
		);
		$data['agent'] = $this->sys_user->get_row(array("agentid" => $agentid));
		$data['data'] = $data['query_trans_profiling']->row();
		$data['recording'] = false;
		// $data['q_recording'] = $this->cdr->get_row(array("dst" => "61" . $data['data']->handphone));
		// if (!$data['q_recording']) {
		// 	$data['q_recording'] = $this->cdr->get_row(array("dst" => "61" . $data['data']->pstn1));
		// }
		// if ($data['q_recording']) {
		// 	$data['recording'] = $data['q_recording']->recordingfile;
		// }

		$this->load->model('Custom_model/Sys_user_table_model', 'Sys_user_table_model');
		$this->load->model('sys/Sys_user_log_model', 'log_login');
		$idlogin = $this->session->userdata('idlogin');
		$data['loginid'] = $this->log_login->get_by_id($idlogin);

		$this->template->load('qc/form_qc', $data);
	}
	public function create_action()
	{
		$data 	= $this->input->post('data_ajax', true);
		$val	= json_decode($data, true);
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
		$idlogin = $this->session->userdata('idlogin');
		$val['idlogin'] = $idlogin;
		$val['tanggal'] = date('Y-m-d H:i:s');
		$success = $this->qc->insert($val);
		echo $o->auto_result($success);
	}
	public function update_action()
	{
		$data 	= $this->input->post('data_ajax', true);
		$val	= json_decode($data, true);
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
		$idlogin = $this->session->userdata('idlogin');
		$val['idlogin'] = $idlogin;
		$id = $val['id'];
		unset($val['id']);
		$success = $this->qc->update($id, $val);
		echo $o->auto_result($success);
	}
	public function report()
	{
		$data = array(
			'title_page_big'		=> 'Report Quality Control',
			'title'					=> $this->title,
		);
		$start_filter = date('Y-m-d');
		$end_filter = date('Y-m-d');

		if (isset($_GET['start']) && isset($_GET['end'])) {

			$start_filter = $_GET['start'];
			$end_filter = $_GET['end'];
		}
		$this->template->load('qc/report_ajax', $data);
	}
	function get_data_list_report()
	{
		$data['controller'] = $this;
		$start_filter = date('Y-m-d');
		$end_filter = date('Y-m-d');
		if (isset($_GET['start']) && isset($_GET['end'])) {
			$start_filter = $_GET['start'];
			$end_filter = $_GET['end'];


			$data['data_qc'] = $this->qc->get_results(array('DATE(lup) >=' => $start_filter, 'DATE(lup) <=' => $end_filter));
		}
		$this->load->view('qc/list_area_report', $data);
	}
	function filter_by_value($array, $index, $value)
	{
		if (is_array($array) && count($array) > 0) {
			foreach (array_keys($array) as $key) {
				$temp[$key] = $array[$key][$index];

				if ($temp[$key] == $value) {
					$newarray[$key] = $array[$key];
				}
			}
		}
		return $newarray;
	}
};

<?php
require APPPATH . '/controllers/New_cwc/New_cwc_config.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Form_General
 *
 * @author Dhiya
 */
class New_cwc extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('sys/Sys_user_log_model', 'log_login');
    $this->load->model('Custom_model/Sys_user_table_model', 'Sys_user_table_model');
    $this->load->model('Custom_model/Dapros_infomedia_model', 'distribution');
    // $this->load->model('Custom_model/Dapros_model', 'distribution');
    $this->infomedia = $this->load->database('infomedia', TRUE);
    $idlogin = $this->session->userdata('idlogin');
    $logindata = $this->log_login->get_by_id($idlogin);
    $data['userdata'] = $this->Sys_user_table_model->get_row(array("id" => $logindata->id_user));
    $this->load->model('Custom_model/Sys_user_log_in_out_table_model', 'Sys_log');
    if ($data['userdata']->opt_level == 8) {
      $log_where = array(
        'id_user' => $logindata->id_user,
        'agentid' => $data['userdata']->agentid,
      );
      $log = $this->Sys_log->get_row($log_where, array("id,logout_time"), array("id" => "DESC"));
      if ($log) {
        if ($log->logout_time == '') {
          redirect('Lockscreen', 'refresh');
        }
      }
    }
    $this->log_key = 'log_New_cwc';
		$this->title = new New_cwc_config();
  }
  public function index()
  {
    $idlogin = $this->session->userdata('idlogin');
		$logindata = $this->log_login->get_by_id($idlogin);
		$userdata = $this->Sys_user_table_model->get_row(array("id" => $logindata->id_user));
		$data['userdata'] = $this->Sys_user_table_model->get_row(array("id" => $logindata->id_user));
    $view = 'New_cwc/input_cwc';

    $this->load->view($view, $data);
  }

  public function insertdata()
  {
    //agentid
    $idlogin = $this->session->userdata('idlogin');
    $logindata = $this->log_login->get_by_id($idlogin);
    $userdata = $this->Sys_user_table_model->get_row(array("id" => $logindata->id_user));
    $agentid = $userdata->agentid;
    //
    if (isset($agentid)) {
      $lup = date("Y-m-d H:i:s");
      $datainsert = array(
        'no_telp' => $_POST['no_telp'],
        'no_internet' => $_POST['no_internet'],
        'ncli' => $_POST['ncli'],
        'nama_pelanggan' => $_POST['nama_pelanggan'],
        'relasi' => $_POST['relasi'],
        'jk' => $_POST['jk'],
        'no_hp' => $_POST['no_hp'],
        'no_hp_lain' => $_POST['no_hp_lain'],
        'wa' => $_POST['wa'],
        'email_utama' => $_POST['email_utama'],
        'email_lain' => $_POST['email_lain'],
        'fb' => $_POST['fb'],
        'tw' => $_POST['tw'],
        'ig' => $_POST['ig'],
        'v_nama' => $_POST['v_nama'],
        'v_alamat' => $_POST['v_alamat'],
        'v_kota' => $_POST['v_kota'],
        'v_kecepatan' => $_POST['v_kecepatan'],
        'v_tagihan' => $_POST['v_tagihan'],
        'tp_bayar' => $_POST['tp_bayar'],
        'th_pasang' => $_POST['th_pasang'],
        'v_email' => $_POST['v_email'],
        'v_sms' => $_POST['v_sms'],
        'opsi_call' => $_POST['opsi_call'],
        'kat_call' => $_POST['kat_call'],
        'sub_call' => $_POST['sub_call'],
        'status_call' => $_POST['status_call'],
        'keterangan' => $_POST['keterangan'],
        'veri_upd' => $agentid,
        'veri_lup' => $lup,
        'lup' => $lup
      );
      $insertdata = $this->infomedia->insert('v2_trans_profiling', $datainsert);
      if ($insertdata) {
        $onload = 'berhasil disimpan';
      }
    } else {
      $onload = 'login terlebih dahulu';
    }
    echo "<script>
			alert('" . $onload . "');	
			window.location = '" . base_url() . "New_cwc/New_cwc';
			</script>";
  }
}

<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 12/12/2018
 * Time: 20:50
 */

class M_Authentication extends CI_Model {

    private $AKTIF = true;
    private $NON_AKTIF = false;
    private $Code_UNAUTHORIZED = 401;

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array(
            'M_User'
        ));
    }

    /**
     * @param $DATA_POST : Berisi array package yang belum dibuka diantar oleh controller
     * todo : Usahakan menggunakan Codeigniter Active Record Untuk meminimalisir Hack SQL Injection
     */
    public function logIn($DATA_POST) {
        $data = array(
            'idUser' => $DATA_POST['username'],
            'passUser' => encode_str($DATA_POST['password'])
        );
        $Fetch = $this->guzzle->API_Get('B_User/login', $data);
        if (empty($Fetch)) {
            $this->session->set_flashdata("akses_ditolak", "true");
            redirect("Auth/index");
        } else if (!empty($Fetch)) {
            if (isset($Fetch->status)) {
                $this->session->set_flashdata("akses_ditolak", "true");
                redirect("Auth/index");
            } if (!isset($Fetch->status)) {
                if ($Fetch->statusUser == $this->NON_AKTIF) {
                    $this->session->set_flashdata("non_aktif", "true");
                    redirect("Auth/index");
                } if ($Fetch->statusUser == $this->AKTIF) {
                    $this->session->set_userdata("idUser", $Fetch->idUser);
                    $this->session->set_userdata("namaUser", $Fetch->namaUser);
                    $this->session->set_userdata("idJabatan", $Fetch->idJabatan);
                    $this->session->set_userdata("idDepartemen", $Fetch->idDepartemen);
                    $this->session->set_userdata("namaDepartemen", $Fetch->namaDepartemen);
                    $this->session->set_userdata("singkatanDepartemen", $Fetch->singkatanDepartemen);
                    $this->session->set_userdata("idGrup", $Fetch->idGrup);
                    $this->session->set_userdata("idAkses", $Fetch->idAkses);
                    $this->session->set_userdata("namaAkses", $Fetch->namaAkses);
                    $this->session->set_userdata("namaJabatan", $Fetch->namaJabatan);
                    self::set_info_device();
                    self::simpan_log();
                    redirect("F_Dashboard/index");
                }
            }
        }
    }

    public function logOut($idLog) {
        $info = array (
            'idLog' => $idLog,
            'signoutLog'    => date('Y-m-d H:i:s')
        );
        $this->guzzle->API_Put('B_Log/put/', $info);

        $this->session->sess_destroy();
        redirect("Auth/index");
    }

    //simpan login di history
    private function simpan_log(){
        $this->load->library(array('user_agent','mobile_detect','misc'));

        $detect = new Mobile_Detect();

        $deviceType = ($detect->isMobile() ? ($detect->isTablet() ? '' : '') : 'PC');

        foreach($detect->getRules() as $name => $regex):
            $check = $detect->{'is'.$name}();
            if($check == 'true'){
                $deviceType .= $name.' ';
            }
        endforeach;

        if ($this->agent->is_browser()){
            $agent = $this->agent->browser().' '.$this->agent->version();
        } elseif ($this->agent->is_robot()){
            $agent = $this->agent->robot();
        } elseif ($this->agent->is_mobile()){
            $agent = $this->agent->mobile();
        } else{
            $agent = 'Unidentified User Agent';
        }

        $info = array (
            'idUser'    => $this->session->userdata('idUser'),
            'tanggalLog'   => date('Y-m-d H:i:s'),
            'signinLog'    => date('Y-m-d H:i:s'),
            'hostnameLog'  => $this->session->userdata('host_name'),
            'ipaddressLog' => $this->session->userdata('ip_address'),
            'deviceLog'    => $deviceType,
            'browserLog'   => $agent,
            'platformLog'  => $this->misc->platform(),
            'useragentLog'=> $this->agent->agent_string()
        );
        $data_log = $this->guzzle->API_Post('B_Log/post/', $info);
        $this->session->set_userdata('idLog', $data_log->idLog);
    }

    private function set_info_device(){
        $ipaddr=$_SERVER['REMOTE_ADDR'];
        $this->session->set_userdata('ip_address', $ipaddr);

        $hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $this->session->set_userdata('host_name', $hostname);
    }

    public function cekOtorisasi($sesiAktif) {
		$parsedBody['idUser'] = encode_str($sesiAktif);
		$Fetch = $this->guzzle->API_Get('B_User/cekOtorisasi', $parsedBody, true);
		if ($Fetch == $this->Code_UNAUTHORIZED) {
			return $this->Code_UNAUTHORIZED;
		} if ($Fetch !== $this->Code_UNAUTHORIZED) {
			return 200;
		}
	}
}

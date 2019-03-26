<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 16/12/2018
 * Time: 19:18
 */

class F_User extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('idUser')){
            redirect('Auth/index');
        }
        $this->load->model(array(
                'M_User',
                'M_Perusahaan',
                'M_Departemen',
                'M_Jabatan',
                'M_Grup'
            )
        );
    }

    public function logUser() {
        $data['get_log'] = $this->M_User->getUser('getLogUser', NULL, NULL, $this->session->idUser, false);
        $this->template->frontend("user_log/index", "User Log", $data);
    }

    public function profileUser() {
        $data['get_perusahaan'] = $this->M_Perusahaan->getPerusahaan('getAll', NULL, NULL, NULL, false);
        $data['get_departemen'] = $this->M_Departemen->getDepartemen('getAll', NULL, NULL, NULL, false);
        $data['get_jabatan'] = $this->M_Jabatan->getJabatan('getAll', NULL, NULL, NULL, false);
        $data['get_grup'] = $this->M_Grup->getGrup('getAll', NULL, NULL, NULL, false);
        $data['get_profil'] = $this->M_User->getUser("getDataByPK", null, null, $this->session->idUser);
        $this->template->frontend("user_profil/index", "User Profile", $data);
    }

	public function changePassword() {
		$RETURN_MODEL = $this->M_User->changePassword($_POST);
		if ($RETURN_MODEL) {
			$this->session->set_flashdata("NOTIFY", $RETURN_MODEL["STATUS"]."/".$RETURN_MODEL['PESAN']);
			redirect($RETURN_MODEL['CLASS']."/".$RETURN_MODEL['METHOD']);
		} else {
			$this->session->set_flashdata("NOTIFY", $RETURN_MODEL["STATUS"]."/".$RETURN_MODEL['PESAN']);
			redirect($RETURN_MODEL['CLASS']."/".$RETURN_MODEL['METHOD']);
		}
	}

    /**
     * Segala konfigurasi AJAX akan di kontrol melalui function dibawah
     * segala konstruksi proses ajax dapat dilihat di model
     */
    /**
     * Segala konfigurasi AJAX akan di kontrol melalui function dibawah
     * segala konstruksi proses ajax dapat dilihat di model
     */
    public function AJAXLog() {
        if (isset($_POST['fungsi'])) {
            if ($_POST['fungsi'] == 'formatDateTime') {
                echo $this->M_User->AJAX_formatDateTime($_POST);
            }
        } else if (!isset($_POST['fungsi'])) {
            echo $this->M_User->getUser("getLogUser", NULL, NULL, $this->session->idUser);
        }
    }

}

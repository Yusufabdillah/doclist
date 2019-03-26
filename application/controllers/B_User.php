<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 13/12/2018
 * Time: 9:34
 */

class B_User extends MY_Controller {

    private $VIEW_PATH = 'user';

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

    /**
     * Diusahakan dalam pengambilan data hanya menggunakan satu fungsi get
     * dikarenakan fungsi get sudah memakai tabel view jadi tabel view sudah di LEFT JOIN
     * dengan tabel lainnya , sehingga tidak perlu memakai fungsi dari model lainnya
     */
    public function index() {
        $data['get_user'] = $this->M_User->getUser('cekKode');
        $this->template->backend($this->VIEW_PATH."/index", "User", $data);
    }

    public function logUser() {
        $data['get_log'] = $this->M_User->getUser('cekKode');
        $this->template->backend("user_log/index", "User Log", $data);
    }

    public function profileUser() {
        $data['get_perusahaan'] = $this->M_Perusahaan->getPerusahaan('getAll', NULL, NULL, NULL, false);
        $data['get_departemen'] = $this->M_Departemen->getDepartemen('getAll', NULL, NULL, NULL, false);
        $data['get_jabatan'] = $this->M_Jabatan->getJabatan('getAll', NULL, NULL, NULL, false);
        $data['get_grup'] = $this->M_Grup->getGrup('getAll', NULL, NULL, NULL, false);
        $data['get_profil'] = $this->M_User->getUser("getDataByPK", null, null, $this->session->idUser);
        $this->template->backend("user_profil/index", "User Profile", $data);
    }

    /*
     * Notice : Jangan pernah mengambil id melalui segment
     *          Ambil saja melalui Array $_POST[]
     *
     * Alasan : Dikarenakan id di segment di encript oleh fungsi encode_str (helper)
     */
    public function form($idUser = null) {
        if (empty($idUser)) {
            $data['get_perusahaan'] = $this->M_Perusahaan->getPerusahaan('getAll', NULL, NULL, NULL, false);
            $data['get_departemen'] = $this->M_Departemen->getDepartemen('getAll', NULL, NULL, NULL, false);
            $data['get_jabatan'] = $this->M_Jabatan->getJabatan('getAll', NULL, NULL, NULL, false);
            $data['get_grup'] = $this->M_Grup->getGrup('getAll', NULL, NULL, NULL, false);
            $this->template->backend($this->VIEW_PATH."/form", "Create User", $data);
        } if (!empty($idUser)) {
            $data['get_perusahaan'] = $this->M_Perusahaan->getPerusahaan('getAll', NULL, NULL, NULL, false);
            $data['get_departemen'] = $this->M_Departemen->getDepartemen('getAll', NULL, NULL, NULL, false);
            $data['get_jabatan'] = $this->M_Jabatan->getJabatan('getAll', NULL, NULL, NULL, false);
            $data['get_grup'] = $this->M_Grup->getGrup('getAll', NULL, NULL, NULL, false);
            $data['get_user'] = $this->M_User->getUser("getDataByPK", null, null, decode_str($idUser));
            $this->template->backend($this->VIEW_PATH."/form", "Update User", $data);
        }
    }

    public function saveUser() {
        $RETURN_MODEL = $this->M_User->saveUser($_POST);
        if ($RETURN_MODEL) {
            if ($RETURN_MODEL["STATUS"] === 'Update') {
                $this->session->set_flashdata("NOTIFY", $RETURN_MODEL["STATUS"]."/".$RETURN_MODEL['PESAN']);
                if ($RETURN_MODEL['profileUser'] == true) {
                    redirect($this->router->fetch_class().'/profileUser');
                } else if ($RETURN_MODEL['profileUser'] == false) {
                    redirect($this->router->fetch_class().'/form/'.$RETURN_MODEL['PK']);
                }
            } if ($RETURN_MODEL["STATUS"] === 'Create') {
                $this->session->set_flashdata("NOTIFY", $RETURN_MODEL["STATUS"]."/".$RETURN_MODEL['PESAN']);
                redirect($this->router->fetch_class().'/form');
            }
        } else {
            $this->session->set_flashdata("NOTIFY", $RETURN_MODEL["STATUS"]."/".$RETURN_MODEL['PESAN']);
            redirect($this->router->fetch_class().'/form');
        }
    }

    public function deleteUser() {
        $RETURN_MODEL = $this->M_User->deleteUser($_POST);
        if ($RETURN_MODEL) {
            $this->session->set_flashdata("NOTIFY", $RETURN_MODEL["STATUS"]."/".$RETURN_MODEL['PESAN']);
            redirect($this->router->fetch_class().'/index');
        } else {
            $this->session->set_flashdata("NOTIFY", $RETURN_MODEL["STATUS"]."/".$RETURN_MODEL['PESAN']);
            redirect($this->router->fetch_class().'/index');
        }
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
    public function AJAX() {
        if (isset($_POST['fungsi'])) {
            if ($_POST['fungsi'] == 'encode') {
                echo $this->M_User->AJAXencode($_POST['idUser']);
            } if ($_POST['fungsi'] == 'formatDateTime') {
                echo $this->M_User->AJAX_formatDateTime($_POST);
            }
        } else if (!isset($_POST['fungsi'])) {
            echo $this->M_User->getUser();
        }
    }

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
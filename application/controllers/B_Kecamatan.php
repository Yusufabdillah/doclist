<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 23/01/2019
 * Time: 10:59
 */

class B_Kecamatan extends MY_Controller {

    private $VIEW_PATH = 'kecamatan';

    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('idUser')){
            redirect('Auth/index');
        }
        $this->load->model(array('M_Negara','M_Provinsi', 'M_Kota','M_Kecamatan'));
    }

    /**
     * Diusahakan dalam pengambilan data hanya menggunakan satu fungsi get
     * dikarenakan fungsi get sudah memakai tabel view jadi tabel view sudah di LEFT JOIN
     * dengan tabel lainnya , sehingga tidak perlu memakai fungsi dari model lainnya
     */
    public function index() {
        $data['get_kecamatan'] = $this->M_Kecamatan->getKecamatan('cekKode');
        $this->template->backend($this->VIEW_PATH."/index", "Kecamatan", $data);
    }

    /*
     * Notice : Jangan pernah mengambil id melalui segment
     *          Ambil saja melalui Array $_POST[]
     *
     * Alasan : Dikarenakan id di segment di encript oleh fungsi encode_str (helper)
     */
    public function form($idKecamatan = null) {
        if (empty($idKecamatan)) {
            $data['get_negara'] = $this->M_Negara->getNegara('getAll', NULL, NULL, NULL, false);
            $data['get_provinsi'] = $this->M_Provinsi->getProvinsi('getAll', NULL, NULL, NULL, false);
            $data['get_kota'] = $this->M_Kota->getKota('getAll', NULL, NULL, NULL, false);
            $this->template->backend($this->VIEW_PATH."/form", "Create Kecamatan", $data);
        } if (!empty($idKecamatan)) {
            $data['get_negara'] = $this->M_Negara->getNegara('getAll', NULL, NULL, NULL, false);
            $data['get_provinsi'] = $this->M_Provinsi->getProvinsi('getAll', NULL, NULL, NULL, false);
            $data['get_kota'] = $this->M_Kota->getKota('getAll', NULL, NULL, NULL, false);
            $data['get_kecamatan'] = $this->M_Kecamatan->getKecamatan("getDataByPK", null, null, decode_str($idKecamatan));
            $this->template->backend($this->VIEW_PATH."/form", "Update Kecamatan", $data);
        }
    }

    public function saveKecamatan() {
        $RETURN_MODEL = $this->M_Kecamatan->saveKecamatan($_POST);
        if ($RETURN_MODEL) {
            if ($RETURN_MODEL["STATUS"] === 'Update') {
                $this->session->set_flashdata("NOTIFY", $RETURN_MODEL["STATUS"]."/".$RETURN_MODEL['PESAN']);
                redirect($this->router->fetch_class().'/form/'.$RETURN_MODEL['PK']);
            } if ($RETURN_MODEL["STATUS"] === 'Create') {
                $this->session->set_flashdata("NOTIFY", $RETURN_MODEL["STATUS"]."/".$RETURN_MODEL['PESAN']);
                redirect($this->router->fetch_class().'/form');
            }
        } else {
            $this->session->set_flashdata("NOTIFY", $RETURN_MODEL["STATUS"]."/".$RETURN_MODEL['PESAN']);
            redirect($this->router->fetch_class().'/form');
        }
    }

    public function deleteKecamatan() {
        $RETURN_MODEL = $this->M_Kecamatan->deleteKecamatan($_POST);
        if ($RETURN_MODEL) {
            $this->session->set_flashdata("NOTIFY", $RETURN_MODEL["STATUS"]."/".$RETURN_MODEL['PESAN']);
            redirect($this->router->fetch_class().'/index');
        } else {
            $this->session->set_flashdata("NOTIFY", $RETURN_MODEL["STATUS"]."/".$RETURN_MODEL['PESAN']);
            redirect($this->router->fetch_class().'/index');
        }
    }

    /**
     * Segala konfigurasi AJAX akan di kontrol melalui function dibawah
     * segala konstruksi proses ajax dapat dilihat di model
     */
    public function AJAX() {
        if (isset($_POST['fungsi'])) {
            if ($_POST['fungsi'] == 'encode') {
                echo $this->M_Kecamatan->AJAXencode($_POST['idKecamatan']);
            } if ($_POST['fungsi'] == 'formatDateTime') {
                echo $this->M_Kecamatan->AJAX_formatDateTime($_POST);
            }
        } else if (!isset($_POST['fungsi'])) {
            echo $this->M_Kecamatan->getKecamatan();
        }
    }
    
}
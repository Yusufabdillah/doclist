<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 14/12/2018
 * Time: 10:03
 */

class B_Kota extends MY_Controller {

    private $VIEW_PATH = 'kota';

    public function __construct()
    {
        parent::__construct();
		$this->otorisasi->cek($this->session->idUser, 'backEnd');
        $this->load->model(array('M_Negara','M_Provinsi', 'M_Kota'));
    }

    /**
     * Diusahakan dalam pengambilan data hanya menggunakan satu fungsi get
     * dikarenakan fungsi get sudah memakai tabel view jadi tabel view sudah di LEFT JOIN
     * dengan tabel lainnya , sehingga tidak perlu memakai fungsi dari model lainnya
     */
    public function index() {
        $data['get_kota'] = $this->M_Kota->getKota('cekKode');
        $this->template->backend($this->VIEW_PATH."/index", "City", $data);
    }

    /*
     * Notice : Jangan pernah mengambil id melalui segment
     *          Ambil saja melalui Array $_POST[]
     *
     * Alasan : Dikarenakan id di segment di encript oleh fungsi encode_str (helper)
     */
    public function form($idKota = null) {
        if (empty($idKota)) {
            $data['get_negara'] = $this->M_Negara->getNegara('getAll', NULL, NULL, NULL, false);
            $data['get_provinsi'] = $this->M_Provinsi->getProvinsi('getAll', NULL, NULL, NULL, false);
            $this->template->backend($this->VIEW_PATH."/form", "Create City", $data);
        } if (!empty($idKota)) {
            $data['get_negara'] = $this->M_Negara->getNegara('getAll', NULL, NULL, NULL, false);
            $data['get_provinsi'] = $this->M_Provinsi->getProvinsi('getAll', NULL, NULL, NULL, false);
            $data['get_kota'] = $this->M_Kota->getKota("getDataByPK", null, null, decode_str($idKota));
            $this->template->backend($this->VIEW_PATH."/form", "Update City", $data);
        }
    }

    public function saveKota() {
        $RETURN_MODEL = $this->M_Kota->saveKota($_POST);
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

    public function deleteKota() {
        $RETURN_MODEL = $this->M_Kota->deleteKota($_POST);
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
                echo $this->M_Kota->AJAXencode($_POST['idKota']);
            } if ($_POST['fungsi'] == 'formatDateTime') {
                echo $this->M_Kota->AJAX_formatDateTime($_POST);
            }
        } else if (!isset($_POST['fungsi'])) {
            echo $this->M_Kota->getKota();
        }
    }

}

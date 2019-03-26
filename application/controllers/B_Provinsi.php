<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 14/12/2018
 * Time: 8:29
 */

class B_Provinsi extends MY_Controller {

    private $VIEW_PATH = 'provinsi';

    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('idUser')){
            redirect('Auth/index');
        }
        $this->load->model(array('M_Provinsi','M_Negara'));
    }

    /**
     * Diusahakan dalam pengambilan data hanya menggunakan satu fungsi get
     * dikarenakan fungsi get sudah memakai tabel view jadi tabel view sudah di LEFT JOIN
     * dengan tabel lainnya , sehingga tidak perlu memakai fungsi dari model lainnya
     */
    public function index() {
        $data['get_provinsi'] = $this->M_Provinsi->getProvinsi('cekKode');
        $this->template->backend($this->VIEW_PATH."/index", "Province", $data);
    }

    /*
     * Notice : Jangan pernah mengambil id melalui segment
     *          Ambil saja melalui Array $_POST[]
     *
     * Alasan : Dikarenakan id di segment di encript oleh fungsi encode_str (helper)
     */
    public function form($idProvinsi = null) {
        if (empty($idProvinsi)) {
            $data['get_negara'] = $this->M_Provinsi->getProvinsi();
            $this->template->backend($this->VIEW_PATH."/form", "Create Province", $data);
        } if (!empty($idProvinsi)) {
            $data['get_negara'] = $this->M_Negara->getNegara('getAll', NULL, NULL, NULL, false);
            $data['get_provinsi'] = $this->M_Provinsi->getProvinsi("getDataByPK", null, null, decode_str($idProvinsi));
            $this->template->backend($this->VIEW_PATH."/form", "Update Province", $data);
        }
    }

    public function saveProvinsi() {
        $RETURN_MODEL = $this->M_Provinsi->saveProvinsi($_POST);
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

    public function deleteProvinsi() {
        $RETURN_MODEL = $this->M_Provinsi->deleteProvinsi($_POST);
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
                echo $this->M_Provinsi->AJAXencode($_POST['idProvinsi']);
            } if ($_POST['fungsi'] == 'formatDateTime') {
                echo $this->M_Provinsi->AJAX_formatDateTime($_POST);
            }
        } else if (!isset($_POST['fungsi'])) {
            echo $this->M_Provinsi->getProvinsi();
        }
    }

}
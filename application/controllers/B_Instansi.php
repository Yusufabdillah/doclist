<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 15/12/2018
 * Time: 14:37
 */

class B_Instansi extends MY_Controller {

    private $VIEW_PATH = 'instansi';

    public function __construct()
    {
        parent::__construct();
		$this->otorisasi->cek($this->session->idUser, 'backEnd');
        $this->load->model(array(
            'M_Instansi',
            'M_Kota'
        ));
    }

    /**
     * Diusahakan dalam pengambilan data hanya menggunakan satu fungsi get
     * dikarenakan fungsi get sudah memakai tabel view jadi tabel view sudah di LEFT JOIN
     * dengan tabel lainnya , sehingga tidak perlu memakai fungsi dari model lainnya
     */
    public function index() {
        $data['get_instansi'] = $this->M_Instansi->getInstansi('cekKode');
        $this->template->backend($this->VIEW_PATH."/index", "Agency", $data);
    }

    /*
     * Notice : Jangan pernah mengambil id melalui segment
     *          Ambil saja melalui Array $_POST[]
     *
     * Alasan : Dikarenakan id di segment di encript oleh fungsi encode_str (helper)
     */
    public function form($idInstansi = null) {
        if (empty($idInstansi)) {
            $data['get_kota'] = $this->M_Kota->getKota('getAll', NULL, NULL, NULL, false);
            $this->template->backend($this->VIEW_PATH."/form", "Create Agency", $data);
        } if (!empty($idInstansi)) {
            $data['get_kota'] = $this->M_Kota->getKota('getAll', NULL, NULL, NULL, false);
            $data['get_instansi'] = $this->M_Instansi->getInstansi("getDataByPK", null, null, decode_str($idInstansi));
            $this->template->backend($this->VIEW_PATH."/form", "Update Agency", $data);
        }
    }

    public function saveInstansi() {
        $RETURN_MODEL = $this->M_Instansi->saveInstansi($_POST);
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

    public function deleteInstansi() {
        $RETURN_MODEL = $this->M_Instansi->deleteInstansi($_POST);
        $this->session->set_flashdata("NOTIFY", $RETURN_MODEL["STATUS"]."/".$RETURN_MODEL['PESAN']);
        redirect($this->router->fetch_class().'/index');
    }

    /**
     * Segala konfigurasi AJAX akan di kontrol melalui function dibawah
     * segala konstruksi proses ajax dapat dilihat di model
     */
    public function AJAX() {
        if (isset($_POST['fungsi'])) {
            if ($_POST['fungsi'] == 'encode') {
                echo $this->M_Instansi->AJAXencode($_POST['idInstansi']);
            } if ($_POST['fungsi'] == 'formatDateTime') {
                echo $this->M_Instansi->AJAX_formatDateTime($_POST);
            }
        } else if (!isset($_POST['fungsi'])) {
            echo $this->M_Instansi->getInstansi();
        }
    }

}

<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 13/12/2018
 * Time: 11:15
 */

class B_Negara extends CI_Controller {

    private $VIEW_PATH = 'negara';

    public function __construct()
    {
        parent::__construct();
		$this->otorisasi->cek($this->session->idUser, 'backEnd');
        $this->load->model('M_Negara');
    }

    /**
     * Diusahakan dalam pengambilan data hanya menggunakan satu fungsi get
     * dikarenakan fungsi get sudah memakai tabel view jadi tabel view sudah di LEFT JOIN
     * dengan tabel lainnya , sehingga tidak perlu memakai fungsi dari model lainnya
     */
    public function index() {
        $data['get_negara'] = $this->M_Negara->getNegara('cekKode');
        $this->template->backend($this->VIEW_PATH."/index", "Country", $data);
    }

    /*
     * Notice : Jangan pernah mengambil id melalui segment
     *          Ambil saja melalui Array $_POST[]
     *
     * Alasan : Dikarenakan id di segment di encript oleh fungsi encode_str (helper)
     */
    public function form($idNegara = null) {
        if (empty($idNegara)) {
            $this->template->backend($this->VIEW_PATH."/form", "Create Country");
        } if (!empty($idNegara)) {
            $data['get_negara'] = $this->M_Negara->getNegara("getDataByPK", null, null, decode_str($idNegara));
            $this->template->backend($this->VIEW_PATH."/form", "Update Country", $data);
        }
    }

    public function saveNegara() {
        $RETURN_MODEL = $this->M_Negara->saveNegara($_POST);
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

    public function deleteNegara() {
        $RETURN_MODEL = $this->M_Negara->deleteNegara($_POST);
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
                echo $this->M_Negara->AJAXencode($_POST['idNegara']);
            } if ($_POST['fungsi'] == 'formatDateTime') {
                echo $this->M_Negara->AJAX_formatDateTime($_POST);
            }
        } else if (!isset($_POST['fungsi'])) {
            echo $this->M_Negara->getNegara();
        }
    }

}


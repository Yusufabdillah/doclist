<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 14/12/2018
 * Time: 16:53
 */

class B_Keyword extends MY_Controller {

    private $VIEW_PATH = 'keyword';

    public function __construct()
    {
        parent::__construct();
		$this->otorisasi->cek($this->session->idUser, 'backEnd');
        $this->load->model('M_Keyword');
    }

    /**
     * Diusahakan dalam pengambilan data hanya menggunakan satu fungsi get
     * dikarenakan fungsi get sudah memakai tabel view jadi tabel view sudah di LEFT JOIN
     * dengan tabel lainnya , sehingga tidak perlu memakai fungsi dari model lainnya
     */
    public function index() {
        $data['get_keyword'] = $this->M_Keyword->getKeyword('cekKode');
        $this->template->backend($this->VIEW_PATH."/index", "Keyword", $data);
    }

    /*
     * Notice : Jangan pernah mengambil id melalui segment
     *          Ambil saja melalui Array $_POST[]
     *
     * Alasan : Dikarenakan id di segment di encript oleh fungsi encode_str (helper)
     */
    public function form($idKeyword = null) {
        if (empty($idKeyword)) {
            $this->template->backend($this->VIEW_PATH."/form", "Create Keyword");
        } if (!empty($idKeyword)) {
            $data['get_keyword'] = $this->M_Keyword->getKeyword("getDataByPK", null, null, decode_str($idKeyword));
            $this->template->backend($this->VIEW_PATH."/form", "Update Keyword", $data);
        }
    }

    public function saveKeyword() {
        $RETURN_MODEL = $this->M_Keyword->saveKeyword($_POST);
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

    public function deleteKeyword() {
        $RETURN_MODEL = $this->M_Keyword->deleteKeyword($_POST);
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
                echo $this->M_Keyword->AJAXencode($_POST['idKeyword']);
            } if ($_POST['fungsi'] == 'formatDateTime') {
                echo $this->M_Keyword->AJAX_formatDateTime($_POST);
            }
        } else if (!isset($_POST['fungsi'])) {
            echo $this->M_Keyword->getKeyword();
        }
    }

}

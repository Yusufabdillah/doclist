<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 15/12/2018
 * Time: 12:09
 */

class B_SKategori extends MY_Controller {

    private $VIEW_PATH = 'kategori_sub';

    public function __construct()
    {
        parent::__construct();
		$this->otorisasi->cek($this->session->idUser, 'backEnd');
        $this->load->model(array('M_SKategori','M_Kategori'));
    }

    /**
     * Diusahakan dalam pengambilan data hanya menggunakan satu fungsi get
     * dikarenakan fungsi get sudah memakai tabel view jadi tabel view sudah di LEFT JOIN
     * dengan tabel lainnya , sehingga tidak perlu memakai fungsi dari model lainnya
     */
    public function index() {
        $data['get_subk'] = $this->M_SKategori->getSKategori('cekKode');
        $this->template->backend($this->VIEW_PATH."/index", "Sub Category", $data);
    }

    /*
     * Notice : Jangan pernah mengambil id melalui segment
     *          Ambil saja melalui Array $_POST[]
     *
     * Alasan : Dikarenakan id di segment di encript oleh fungsi encode_str (helper)
     */
    public function form($idSubk = null) {
        if (empty($idSubk)) {
            $data['get_kategori'] = $this->M_Kategori->getKategori('getAll', NULL, NULL, NULL, false);
            $this->template->backend($this->VIEW_PATH."/form", "Create Sub Category", $data);
        } if (!empty($idSubk)) {
            $data['get_kategori'] = $this->M_Kategori->getKategori('getAll', NULL, NULL, NULL, false);
            $data['get_subk'] = $this->M_SKategori->getSKategori("getDataByPK", null, null, decode_str($idSubk));
            $this->template->backend($this->VIEW_PATH."/form", "Update Sub Category", $data);
        }
    }

    public function saveSKategori() {
        $RETURN_MODEL = $this->M_SKategori->saveSKategori($_POST);
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

    public function deleteSKategori() {
        $RETURN_MODEL = $this->M_SKategori->deleteSKategori($_POST);
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
                echo $this->M_SKategori->AJAXencode($_POST['idSubk']);
            } if ($_POST['fungsi'] == 'formatDateTime') {
                echo $this->M_SKategori->AJAX_formatDateTime($_POST);
            }
        } else if (!isset($_POST['fungsi'])) {
            echo $this->M_SKategori->getSKategori();
        }
    }

}

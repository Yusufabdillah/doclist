<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 15/12/2018
 * Time: 11:20
 */

class B_Kategori extends MY_Controller {

    private $VIEW_PATH = 'kategori';

    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('idUser')){
            redirect('Auth/index');
        }
        $this->load->model(array('M_Kategori'));
    }

    /**
     * Diusahakan dalam pengambilan data hanya menggunakan satu fungsi get
     * dikarenakan fungsi get sudah memakai tabel view jadi tabel view sudah di LEFT JOIN
     * dengan tabel lainnya , sehingga tidak perlu memakai fungsi dari model lainnya
     */
    public function index() {
        $data['get_kategori'] = $this->M_Kategori->getKategori('cekKode');
        $this->template->backend($this->VIEW_PATH."/index", "Category", $data);
    }

    /*
     * Notice : Jangan pernah mengambil id melalui segment
     *          Ambil saja melalui Array $_POST[]
     *
     * Alasan : Dikarenakan id di segment di encript oleh fungsi encode_str (helper)
     */
    public function form($idKategori = null) {
        if (empty($idKategori)) {
            $this->template->backend($this->VIEW_PATH."/form", "Create Category");
        } if (!empty($idKategori)) {
            $data['get_kategori'] = $this->M_Kategori->getKategori("getDataByPK", null, null, decode_str($idKategori));
            $this->template->backend($this->VIEW_PATH."/form", "Update Category", $data);
        }
    }

    public function saveKategori() {
        $RETURN_MODEL = $this->M_Kategori->saveKategori($_POST);
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

    public function deleteKategori() {
        $RETURN_MODEL = $this->M_Kategori->deleteKategori($_POST);
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
                echo $this->M_Kategori->AJAXencode($_POST['idKategori']);
            } if ($_POST['fungsi'] == 'formatDateTime') {
                echo $this->M_Kategori->AJAX_formatDateTime($_POST);
            }
        } else if (!isset($_POST['fungsi'])) {
            echo $this->M_Kategori->getKategori();
        }
    }

}
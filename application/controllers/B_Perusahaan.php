<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 14/12/2018
 * Time: 13:35
 */

class B_Perusahaan extends MY_Controller {

    private $VIEW_PATH = 'perusahaan';

    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('idUser')){
            redirect('Auth/index');
        }
        $this->load->model(array(
            'M_Perusahaan',
            'M_Negara',
            'M_Provinsi',
            'M_Kota',
            'M_Kecamatan'
        ));
    }

    /**
     * Diusahakan dalam pengambilan data hanya menggunakan satu fungsi get
     * dikarenakan fungsi get sudah memakai tabel view jadi tabel view sudah di LEFT JOIN
     * dengan tabel lainnya , sehingga tidak perlu memakai fungsi dari model lainnya
     */
    public function index() {
        $data['get_perusahaan'] = $this->M_Perusahaan->getPerusahaan('cekKode');
        $this->template->backend($this->VIEW_PATH."/index", "Company", $data);
    }

    /*
     * Notice : Jangan pernah mengambil id melalui segment
     *          Ambil saja melalui Array $_POST[]
     *
     * Alasan : Dikarenakan id di segment di encript oleh fungsi encode_str (helper)
     */
    public function form($idPerusahaan = null) {
        if (empty($idPerusahaan)) {
            $data['get_negara'] = $this->M_Negara->getNegara('getAll', NULL, NULL, NULL, false);
            $this->template->backend($this->VIEW_PATH."/form", "Create Company", $data);
        } if (!empty($idPerusahaan)) {
            $data['get_perusahaan'] = $this->M_Perusahaan->getPerusahaan("getDataByPK", null, null, decode_str($idPerusahaan));
            $data['get_negara'] = $this->M_Negara->getNegara('getAll', NULL, NULL, NULL, false);
            $data['get_provinsi'] = $this->M_Provinsi->getProvinsi('getDataByNegara', NULL, NULL, $data['get_perusahaan']->idNegara);
            $data['get_kota'] = $this->M_Kota->getKota('getDataByProvinsi', NULL, NULL, $data['get_perusahaan']->idProvinsi);
            $data['get_kecamatan'] = $this->M_Kecamatan->getKecamatan('getDataByKota', NULL, NULL, $data['get_perusahaan']->idKota);
            $this->template->backend($this->VIEW_PATH."/form", "Update Company", $data);
        }
    }

    public function savePerusahaan() {
        $RETURN_MODEL = $this->M_Perusahaan->savePerusahaan($_POST);
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

    public function deletePerusahaan() {
        $RETURN_MODEL = $this->M_Perusahaan->deletePerusahaan($_POST);
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
            $Fungsi = $this->input->post('fungsi');
            if ($Fungsi == 'encode') {
                echo $this->M_Perusahaan->AJAXencode($_POST['idPerusahaan']);
            } if ($Fungsi == 'formatDateTime') {
                echo $this->M_Perusahaan->AJAX_formatDateTime($_POST);
            }

            /**
             * Untuk data wilayah dokumen
             */
            if ($Fungsi == 'toProvinsi') {
                $data['get_provinsi'] = $this->M_Provinsi->getProvinsi('getDataByNegara', null, null, $_POST['idNegara']);
                $this->load->view('backend/perusahaan/ajax_view/provinsi',$data);
            } if ($Fungsi == 'toKota') {
                $data['get_kota'] = $this->M_Kota->getKota('getDataByProvinsi', null, null, $_POST['idProvinsi']);
                $this->load->view('backend/perusahaan/ajax_view/kota',$data);
            } if ($Fungsi == 'toKecamatan') {
                $data['get_kecamatan'] = $this->M_Kecamatan->getKecamatan('getDataByKota', null, null, $_POST['idKota']);
                $this->load->view('backend/perusahaan/ajax_view/kecamatan',$data);
            }
        } else if (!isset($_POST['fungsi'])) {
            echo $this->M_Perusahaan->getPerusahaan();
        }
    }

}
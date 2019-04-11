<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 14/12/2018
 * Time: 21:25
 */

class B_Grup extends MY_Controller {

    private $VIEW_PATH = 'grup';

    public function __construct()
    {
        parent::__construct();
		$this->otorisasi->cek($this->session->idUser, 'backEnd');
        $this->load->model(array('M_Grup', 'M_Akses', 'M_MenuAkses_Backend', 'M_MenuAkses_Frontend', 'M_PerusahaanAkses', 'M_Perusahaan'));
    }

    /**
     * Diusahakan dalam pengambilan data hanya menggunakan satu fungsi get
     * dikarenakan fungsi get sudah memakai tabel view jadi tabel view sudah di LEFT JOIN
     * dengan tabel lainnya , sehingga tidak perlu memakai fungsi dari model lainnya
     */
    public function index() {
        $data['get_grup'] = $this->M_Grup->getGrup('cekKode');
        $this->template->backend($this->VIEW_PATH."/index", "Group User", $data);
    }

    /*
     * Notice : Jangan pernah mengambil id melalui segment
     *          Ambil saja melalui Array $_POST[]
     *
     * Alasan : Dikarenakan id di segment di encript oleh fungsi encode_str (helper)
     */
    public function form($idGrup = null) {
        if (empty($idGrup)) {
            $data['get_akses'] = $this->M_Akses->getAkses('getAll', NULL, NULL, NULL, false);
            $data['get_menu_lv1'] = $this->M_MenuAkses_Backend->getMenuAkses_lv1('getAll_lv1', NULL, NULL, NULL, false);
            $data['get_menu_lv2'] = $this->M_MenuAkses_Backend->getMenuAkses_lv2('getAll_lv2', NULL, NULL, NULL, false);
            $data['get_menuuser_lv1'] = $this->M_MenuAkses_Frontend->getMenuAkses_lv1('getAll_lv1', NULL, NULL, NULL, false);
            $data['get_menuuser_lv2'] = $this->M_MenuAkses_Frontend->getMenuAkses_lv2('getAll_lv2', NULL, NULL, NULL, false);
            $data['get_perusahaan'] = $this->M_Perusahaan->getPerusahaan('getAll', NULL, NULL, NULL, false);
            $this->template->backend($this->VIEW_PATH."/form", "Create Group User", $data);
        } if (!empty($idGrup)) {
            $data['get_akses'] = $this->M_Akses->getAkses('getAll', NULL, NULL, NULL, false);
            $data['get_menu_lv1'] = $this->M_MenuAkses_Backend->getMenuAkses_lv1('getMenu_lv1', NULL, NULL, decode_str($idGrup), false);
            $data['get_menu_lv2'] = $this->M_MenuAkses_Backend->getMenuAkses_lv2('getMenu_lv2', NULL, NULL, decode_str($idGrup), false);
            $data['get_menuuser_lv1'] = $this->M_MenuAkses_Frontend->getMenuAkses_lv1('getMenu_lv1', NULL, NULL, decode_str($idGrup), false);
            $data['get_menuuser_lv2'] = $this->M_MenuAkses_Frontend->getMenuAkses_lv2('getMenu_lv2', NULL, NULL, decode_str($idGrup), false);
            $data['get_perusahaan'] = $this->M_Perusahaan->getPerusahaan('getAll', NULL, NULL, NULL, false);
            $data['get_perusahaanAkses'] = $this->M_PerusahaanAkses->getPerusahaanAkses('getView', NULL, NULL, decode_str($idGrup), false);
            $data['get_grup'] = $this->M_Grup->getGrup("getDataByPK", null, null, decode_str($idGrup));
            $this->template->backend($this->VIEW_PATH."/form", "Update Group User", $data);
        }
    }

    public function saveGrup() {
        $RETURN_MODEL = $this->M_Grup->saveGrup($_POST);
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

    public function deleteGrup() {
        $RETURN_MODEL = $this->M_Grup->deleteGrup($_POST);
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
                echo $this->M_Grup->AJAXencode($_POST['idGrup']);
            } if ($_POST['fungsi'] == 'formatDateTime') {
                echo $this->M_Grup->AJAX_formatDateTime($_POST);
            }
        } else if (!isset($_POST['fungsi'])) {
            echo $this->M_Grup->getGrup();
        }
    }

}

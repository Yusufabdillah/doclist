<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 14/12/2018
 * Time: 16:53
 */

class B_Audit extends MY_Controller {

    private $VIEW_PATH = 'audit';

    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('idUser')){
            redirect('Auth/index');
        }
        $this->load->model('M_Audit');
    }

    /**
     * Diusahakan dalam pengambilan data hanya menggunakan satu fungsi get
     * dikarenakan fungsi get sudah memakai tabel view jadi tabel view sudah di LEFT JOIN
     * dengan tabel lainnya , sehingga tidak perlu memakai fungsi dari model lainnya
     */
    public function index() {
        $data['get_audit'] = $this->M_Audit->getAudit('cekKode');
        $this->template->backend($this->VIEW_PATH."/index", "Audit", $data);
    }

    /*
     * Notice : Jangan pernah mengambil id melalui segment
     *          Ambil saja melalui Array $_POST[]
     *
     * Alasan : Dikarenakan id di segment di encript oleh fungsi encode_str (helper)
     */
    public function form($idAudit = null) {
        if (empty($idAudit)) {
            $this->template->backend($this->VIEW_PATH."/form", "Create Audit");
        } if (!empty($idAudit)) {
            $data['get_audit'] = $this->M_Audit->getAudit("getDataByPK", null, null, decode_str($idAudit));
            $this->template->backend($this->VIEW_PATH."/form", "Update Audit", $data);
        }
    }

    public function saveAudit() {
        $RETURN_MODEL = $this->M_Audit->saveAudit($_POST);
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

    public function deleteAudit() {
        $RETURN_MODEL = $this->M_Audit->deleteAudit($_POST);
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
                echo $this->M_Audit->AJAXencode($_POST['idAudit']);
            } if ($_POST['fungsi'] == 'formatDateTime') {
                echo $this->M_Audit->AJAX_formatDateTime($_POST);
            }
        } else if (!isset($_POST['fungsi'])) {
            echo $this->M_Audit->getAudit();
        }
    }

}

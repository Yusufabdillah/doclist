<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 16/12/2018
 * Time: 20:01
 */

class F_MonitoringDokumen extends MY_Controller {

    private $VIEW_PATH = 'monitoring_dokumen';

    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('idUser')){
            redirect('Auth/index');
        }

        $this->load->model(array(
            'M_Dokumen',
            'M_Departemen',
            'M_Instansi'
        ));
    }

    /**
     * Diusahakan dalam pengambilan data hanya menggunakan satu fungsi get
     * dikarenakan fungsi get sudah memakai tabel view jadi tabel view sudah di LEFT JOIN
     * dengan tabel lainnya , sehingga tidak perlu memakai fungsi dari model lainnya
     */
    public function index() {
        $data['http_kode'] = $this->M_Dokumen->getDokumen('cekKode');
        if ($_SESSION['idAkses'] == 1) {
			$data['get_dokumen'] = $this->M_Dokumen->getDokumen();
		} else {
			$data['get_dokumen'] = $this->M_Dokumen->getDokumen('getDataByDepartemen');
		}
        $this->template->frontend($this->VIEW_PATH."/index", "Master Document", $data);
    }
   

    /*
     * Notice : Jangan pernah mengambil id melalui segment
     *          Ambil saja melalui Array $_POST[]
     *
     * Alasan : Dikarenakan id di segment di encript oleh fungsi encode_str (helper)
     */
    
    public function form($idDokumen = null) {
        if (empty($idDokumen)) {
            $data['get_departemen'] = $this->M_Departemen->getDepartemen("getAll", null, null, null, false);
            $data['get_instansi'] = $this->M_Instansi->getInstansi("getAll", null, null, null, false);
            $this->template->frontend($this->VIEW_PATH."/form", "Tambah Dokumen", $data);
        } else if (!empty($idDokumen)) {
			$data['get_dokumen'] = $this->M_Dokumen->getDokumen('getDataByPK', null, null, decode_str($idDokumen));
			$data['get_departemen'] = $this->M_Departemen->getDepartemen("getAll", null, null, null, false);
			$data['get_instansi'] = $this->M_Instansi->getInstansi("getAll", null, null, null, false);
			$this->template->frontend($this->VIEW_PATH."/form", "Edit Dokumen", $data);
        }
    }

    public function detail($idDokumen) {
		$data['get_dokumen'] = $this->M_Dokumen->getDokumen('getDataByPK', null, null, decode_str($idDokumen));
		$this->template->frontend($this->VIEW_PATH."/detail", "Detail Dokumen", $data);
	}

    public function saveDokumen() {
        $RETURN_MODEL = $this->M_Dokumen->saveDokumen($_POST, $_FILES);
        if ($RETURN_MODEL) {
            if ($RETURN_MODEL["STATUS"] === 'Update') {
                $this->session->set_flashdata("NOTIFY", $RETURN_MODEL["STATUS"]."/".$RETURN_MODEL['PESAN']);
                redirect($this->router->fetch_class().'/index/');
            } if ($RETURN_MODEL["STATUS"] === 'Create') {
                $this->session->set_flashdata("NOTIFY", $RETURN_MODEL["STATUS"]."/".$RETURN_MODEL['PESAN']);
                redirect($this->router->fetch_class().'/index');
            }
        } else {
            $this->session->set_flashdata("NOTIFY", $RETURN_MODEL["STATUS"]."/".$RETURN_MODEL['PESAN']);
            redirect($this->router->fetch_class().'/index');
        }
    }

    public function deleteDokumen() {
        $RETURN_MODEL = $this->M_Dokumen->deleteDokumen($_POST);
        $this->session->set_flashdata("NOTIFY", $RETURN_MODEL["STATUS"]."/".$RETURN_MODEL['PESAN']);
        redirect($this->router->fetch_class().'/index');
    }

    public function pengajuanEdit() {
    	$RETURN_MODEL = $this->M_Dokumen->pengajuanEdit($_POST);
		$this->session->set_flashdata("NOTIFY", $RETURN_MODEL["STATUS"]."/".$RETURN_MODEL['PESAN']);
		redirect($this->router->fetch_class().'/index');
	}

    public function AJAX() {
        $Fungsi = $this->input->post('fungsi');
        if ($Fungsi == 'toMasaBerlaku') {
            $data['status'] = $this->input->post('status');
            $this->load->view('frontend/dokumen/ajax_view/tgl_berlaku', $data);
        }
		if ($Fungsi == 'toReminder') {
			$data['status'] = $this->input->post('status');
			$this->load->view('frontend/dokumen/ajax_view/reminder', $data);
		}
        /**
         * Untuk Kepala Instansi
         */
        if ($Fungsi == 'toKepalaInstansi') {
            $data['get_instansi'] = $this->M_Instansi->getInstansi('getDataByPK', null, null, $_POST['idInstansi']);
            $this->load->view('frontend/dokumen/ajax_view/kepala_instansi',$data);
        }

    }

}

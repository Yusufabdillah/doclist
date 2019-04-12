<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 16/12/2018
 * Time: 20:01
 */

class F_Dokumen extends MY_Controller {

    private $VIEW_PATH = 'dokumen';

    public function __construct()
    {
        parent::__construct();
		$this->otorisasi->cek($this->session->idUser, 'frontEnd');
        $this->load->model(array(
            'M_Dokumen',
            'M_Departemen',
            'M_Instansi',
            'M_Audit',
			'M_Keyword',
			'M_User'
        ));
    }

    /**
     * Diusahakan dalam pengambilan data hanya menggunakan satu fungsi get
     * dikarenakan fungsi get sudah memakai tabel view jadi tabel view sudah di LEFT JOIN
     * dengan tabel lainnya , sehingga tidak perlu memakai fungsi dari model lainnya
     */
    public function index() {
		$data['get_departemen'] = $this->M_Departemen->getDepartemen("getAll", null, null, null, false);
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
            $data['get_audit'] = $this->M_Audit->getAudit('getAll', null, null, null, false)->data;
            $data['get_keyword'] = $this->M_Keyword->getKeyword('getAll', null, null, null, false);
            $this->template->frontend($this->VIEW_PATH."/form", "Tambah Dokumen", $data);
        } else if (!empty($idDokumen)) {
			$refAudit = $this->M_Audit->getRefAudit('getDataByDokumen', null, null, decode_str($idDokumen));
			$refKeyword = $this->M_Keyword->getKeyword('getDataByDokumen', null, null, decode_str($idDokumen));
			foreach ($refAudit as $KEY => $data) {
				$dataRefAudit[$KEY+1] = $data->idAudit;
			}
			foreach ($refKeyword as $KEY => $data) {
				$dataRefKeyword[$KEY+1] = $data->idKeyword;
			}
        	$data = array(
        		'get_dokumen' => $this->M_Dokumen->getDokumen('getDataByPK', null, null, decode_str($idDokumen)),
				'get_departemen' => $this->M_Departemen->getDepartemen("getAll", null, null, null, false),
				'get_instansi' => $this->M_Instansi->getInstansi("getAll", null, null, null, false),
				'get_audit' => $this->M_Audit->getAudit('getAll', null, null, null, false)->data,
				'get_keyword' => $this->M_Keyword->getKeyword('getAll', null, null, null, false),
				'get_ref_audit' => isset($dataRefAudit) ? $dataRefAudit : null,
				'get_ref_keyword' => isset($dataRefKeyword) ? $dataRefKeyword : null,
			);
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
                redirect($this->router->fetch_class().'/index');
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

    public function AJAX($fetch = null, $parsingValue = null) {
		if (isset($fetch)) {
			if ($fetch == 'getDokumen-getByAkses') {
				if (decode_str($parsingValue) == 1) {
					print $this->M_Dokumen->getDokumen('getAll', null, null, null, true);
				} else {
					print $this->M_Dokumen->getDokumen('getDataByDepartemen', null, null, null, true);
				}
			}
		} else if (!isset($fetch)) {
			$Fungsi = $this->input->post('fungsi');
			if ($Fungsi == 'toForm') {
				print encode_str($this->input->post('idDokumen'));
			}
			if ($Fungsi == 'toDetail') {
				print encode_str($this->input->post('idDokumen'));
			}
			if ($Fungsi == 'toMasaBerlaku') {
				$data['status'] = $this->input->post('status');
				$this->load->view('frontend/dokumen/ajax_view/tgl_berlaku', $data);
			}
			if ($Fungsi == 'toReminder') {
				$data['status'] = $this->input->post('status');
				$this->load->view('frontend/dokumen/ajax_view/reminder', $data);
			}
			if ($Fungsi == 'toKoordinator') {
				$data['get_user'] = $this->M_User->getUser('getDataByDepartemen', null, null, $_POST['idDepartemen']);
				$this->load->view('frontend/dokumen/ajax_view/user', $data);
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

}

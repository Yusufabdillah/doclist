<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 27/02/2019
 * Time: 12.29
 */

class F_PengajuanEdit extends MY_Controller {

	private $VIEW_PATH = 'pengajuan_edit';

	public function __construct()
	{
		parent::__construct();
		$this->otorisasi->cek($this->session->idUser, 'frontEnd');
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
		$this->template->frontend($this->VIEW_PATH."/index", "Master Document", $data);
	}

	public function detail($idDokumen) {
		$data['get_dokumen'] = $this->M_Dokumen->getDokumen('getDataByPK', null, null, decode_str($idDokumen));
		$this->template->frontend($this->VIEW_PATH."/detail", "Detail Dokumen", $data);
	}

	public function approveEdit() {
		$RETURN_MODEL = $this->M_Dokumen->approveEdit($_POST);
		$this->session->set_flashdata("NOTIFY", $RETURN_MODEL["STATUS"]."/".$RETURN_MODEL['PESAN']);
		redirect($this->router->fetch_class().'/index');
	}

	public function declineEdit() {
		$RETURN_MODEL = $this->M_Dokumen->declineEdit($_POST);
		$this->session->set_flashdata("NOTIFY", $RETURN_MODEL["STATUS"]."/".$RETURN_MODEL['PESAN']);
		redirect($this->router->fetch_class().'/index');
	}

	public function AJAX($fetch = null) {
		if (isset($fetch)) {
			if ($fetch == 'getDokumen-getDataPengajuanEdit') {
				print $this->M_Dokumen->getDokumen('getDataPengajuanEdit', null, null, null, true);
			}
		} else if (!isset($fetch)) {
			$Fungsi = $this->input->post('fungsi');
			if ($Fungsi == 'toDetail') {
				print encode_str($this->input->post('idDokumen'));
			}
		}
	}

}

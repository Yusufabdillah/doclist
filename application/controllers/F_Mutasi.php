<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 27/03/2019
 * Time: 13.33
 */

class F_Mutasi extends MY_Controller {

	private $VIEW_PATH = 'mutasi';

	public function __construct()
	{
		parent::__construct();
		$this->otorisasi->cek($this->session->idUser, 'frontEnd');
		$this->load->model(array(
			'M_Dokumen',
			'M_Mutasi'
		));
	}

	/**
	 * Diusahakan dalam pengambilan data hanya menggunakan satu fungsi get
	 * dikarenakan fungsi get sudah memakai tabel view jadi tabel view sudah di LEFT JOIN
	 * dengan tabel lainnya , sehingga tidak perlu memakai fungsi dari model lainnya
	 */
	public function index() {
		$this->template->frontend($this->VIEW_PATH."/index", "Mutasi");
	}

	public function mutasiDokumen() {
		$RETURN_MODEL = $this->M_Mutasi->mutasiDokumen($_POST);
		$this->session->set_flashdata("NOTIFY", $RETURN_MODEL["STATUS"]."/".$RETURN_MODEL['PESAN']);
		redirect('F_Dokumen/index');
	}

	public function verifikasiMutasi() {
		$this->M_Mutasi->verifikasiMutasi($_POST);
	}

	public function tolakMutasi() {
		$this->M_Mutasi->tolakMutasi($_POST);
	}

	public function detail($idDokumen) {
		$data['get_dokumen'] = $this->M_Dokumen->getDokumen('getDataByPK', null, null, decode_str($idDokumen));
		$this->template->frontend($this->VIEW_PATH."/detail", "Detail Dokumen", $data);
	}

	public function AJAXRouter() {
		$fungsi = $this->input->post('fungsi');
		if ($fungsi == 'toVerifikasiTrue') {
			$this->load->view('frontend/mutasi/ajax_view/verifikasi_true/index');
		} if ($fungsi == 'toVerifikasiFalse') {
			$this->load->view('frontend/mutasi/ajax_view/verifikasi_false/index');
		} if ($fungsi == 'toTermutasiTrue') {
			$this->load->view('frontend/mutasi/ajax_view/termutasi_true/index');
		} if ($fungsi == 'toTermutasiFalse') {
			$this->load->view('frontend/mutasi/ajax_view/termutasi_false/index');
		} else if ($fungsi == 'toTermutasiTolak') {
			$this->load->view('frontend/mutasi/ajax_view/termutasi_tolak/index');
		}
	}

	public function AJAXData($bagian) {
		if ($bagian == 'getVerifikasiTrue') {
			print $this->M_Mutasi->getMutasi('getListVerifikasiTrue', true);
		} if ($bagian == 'getVerifikasiFalse') {
			print $this->M_Mutasi->getMutasi('getListVerifikasiFalse', true);
		} if ($bagian == 'getTermutasiTrue') {
			print $this->M_Mutasi->getMutasi('getListCreatedByTrue', true);
		} if ($bagian == 'getTermutasiFalse') {
			print $this->M_Mutasi->getMutasi('getListCreatedByFalse', true);
		} else if ($bagian == 'getTermutasiTolak') {
			print $this->M_Mutasi->getMutasi('getListTolakMutasi', true);
		}
	}

	public function AJAXEncode() {
		$fungsi = $this->input->post('fungsi');
		if ($fungsi == 'toDetail') {
			print encode_str($this->input->post('idDokumen'));
		}
	}

}

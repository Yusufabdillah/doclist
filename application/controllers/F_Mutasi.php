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
		if(!$this->session->userdata('idUser')){
			redirect('Auth/index');
		}

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
		$data['get_verifikasi_false'] = $this->M_Mutasi->getMutasi('getListVerifikasiFalse');
		$data['get_verifikasi_true'] = $this->M_Mutasi->getMutasi('getListVerifikasiTrue');
		$data['get_created_false'] = $this->M_Mutasi->getMutasi('getListCreatedByFalse');
		$data['get_created_true'] = $this->M_Mutasi->getMutasi('getListCreatedByTrue');
		$data['get_tolak'] = $this->M_Mutasi->getMutasi('getListTolakMutasi');
		$this->template->frontend($this->VIEW_PATH."/index", "Mutasi", $data);
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

}

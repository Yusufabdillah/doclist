<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 27/03/2019
 * Time: 13.33
 */

class F_Keyword extends MY_Controller {

	private $VIEW_PATH = 'keyword';

	public function __construct()
	{
		parent::__construct();
		$this->otorisasi->cek($this->session->idUser, 'frontEnd');
		$this->load->model(array(
			'M_Dokumen',
			'M_Keyword'
		));
	}

	/**
	 * Diusahakan dalam pengambilan data hanya menggunakan satu fungsi get
	 * dikarenakan fungsi get sudah memakai tabel view jadi tabel view sudah di LEFT JOIN
	 * dengan tabel lainnya , sehingga tidak perlu memakai fungsi dari model lainnya
	 */
	public function index() {
		$data['get_keyword'] = $this->M_Keyword->getKeyword('getAll', null, null, null, false);
		$this->template->frontend($this->VIEW_PATH."/index", "Master Document", $data);
	}

	public function detail($idDokumen) {
		$data['get_dokumen'] = $this->M_Dokumen->getDokumen('getDataByPK', null, null, decode_str($idDokumen));
		$this->template->frontend($this->VIEW_PATH."/detail", "Detail Dokumen", $data);
	}

	public function AJAX() {
		if ($_POST['AR_idKeyword'] == 'NULL') {
			print null;
		} else if ($_POST['AR_idKeyword'] !== 'NULL') {
			foreach ($_POST['AR_idKeyword'] AS $KEY => $data) {
				$AR_idKeyword[] = 'idKeyword = '.$data;
			}
			$whereRaw = implode(' AND ', $AR_idKeyword);
			print $this->M_Keyword->getKeyword('getDokumenByKeyword', null, null, $whereRaw, true);
		}
	}

	public function AJAXRedirect() {
		$fungsi = $this->input->post('fungsi');
		if ($fungsi == 'toDetail') {
			print encode_str($this->input->post('idDokumen'));
		}
	}
}

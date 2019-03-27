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
		if(!$this->session->userdata('idUser')){
			redirect('Auth/index');
		}

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
		$data['http_kode'] = $this->M_Dokumen->getDokumen('cekKode');
		$data['get_dokumen'] = null;
		$data['get_keyword'] = $this->M_Keyword->getKeyword('getAll', null, null, null, false);
		$this->template->frontend($this->VIEW_PATH."/index", "Master Document", $data);
	}

	public function AJAX() {
		$Fungsi = $this->input->post('fungsi');
		if ($Fungsi == 'toKeyword') {
			if ($_POST['AR_idKeyword'] == 'NULL') {
				$data = array(
					'get_dokumen' => null
				);
				$this->load->view('frontend/keyword/ajax_view/dokumen', $data);
			} else if ($_POST['AR_idKeyword'] !== 'NULL') {
				foreach ($_POST['AR_idKeyword'] AS $KEY => $data) {
					$AR_idKeyword[] = 'idKeyword = '.$data;
				}
				$whereRaw = implode(' AND ', $AR_idKeyword);
				$data = array(
					'get_dokumen' => $this->M_Keyword->getKeyword('getDokumenByKeyword', null, null, $whereRaw)
				);
				$this->load->view('frontend/keyword/ajax_view/dokumen', $data);
			}
		}
	}

}

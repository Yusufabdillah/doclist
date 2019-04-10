<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 16/12/2018
 * Time: 20:01
 */

class F_Audit extends MY_Controller
{

	private $VIEW_PATH = 'audit';

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('idUser')) {
			redirect('Auth/index');
		}

		$this->load->model(array(
			'M_Audit',
			'M_Dokumen'
		));
	}

	/**
	 * Diusahakan dalam pengambilan data hanya menggunakan satu fungsi get
	 * dikarenakan fungsi get sudah memakai tabel view jadi tabel view sudah di LEFT JOIN
	 * dengan tabel lainnya , sehingga tidak perlu memakai fungsi dari model lainnya
	 */

	public function index()
	{
		$data['http_kode'] = $this->M_Audit->getAudit('cekKode');
		$data['get_audit'] = $this->M_Audit->getAudit("getAll", null, null, null, false);
		$this->template->frontend($this->VIEW_PATH . "/index", "Dokumen Audit", $data);
	}

	/*
     * Notice : Jangan pernah mengambil id melalui segment
     *          Ambil saja melalui Array $_POST[]
     *
     * Alasan : Dikarenakan id di segment di encript oleh fungsi encode_str (helper)
     */
	public function form($idAudit)
	{
		$data['get_audit'] = $this->M_Audit->getAudit('getDataByPK', null, null, decode_str($idAudit));
		$this->template->frontend($this->VIEW_PATH . "/form", "Form Audit", $data);
	}

	public function detail($idDokumen) {
		$data['get_dokumen'] = $this->M_Dokumen->getDokumen('getDataByPK', null, null, decode_str($idDokumen));
		$this->template->frontend($this->VIEW_PATH."/detail", "Detail Dokumen", $data);
	}

	public function hapusDokumen()
	{
		$RETURN_MODEL = $this->M_Audit->hapusDokumen($_POST);
		$this->session->set_flashdata("NOTIFY", $RETURN_MODEL["STATUS"] . "/" . $RETURN_MODEL['PESAN']);
		redirect($this->router->fetch_class() . '/form/' . $RETURN_MODEL['PK']);
	}

	public function AJAX($fetch = null, $id = null)
	{
		if (isset($fetch)) {
			if ($fetch == 'getAudit-getAll') {
				print $this->M_Audit->getAudit("getAll", null, null, null, true);
			}
			if ($fetch == 'getRefAudit-getDataByAudit') {
				print $this->M_Audit->getRefAudit('getDataByAudit', null, null, decode_str($id), true);
			}
		} else if (!isset($fetch)) {
			$Fungsi = $this->input->post('fungsi');
			if ($Fungsi == 'toForm') {
				print encode_str($this->input->post('idAudit'));
			}
			if ($Fungsi == 'toDetail') {
				print encode_str($this->input->post('idDokumen'));
			}
		}
	}

}

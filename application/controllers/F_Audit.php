<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 16/12/2018
 * Time: 20:01
 */

class F_Audit extends MY_Controller {

    private $VIEW_PATH = 'audit';

    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('idUser')){
            redirect('Auth/index');
        }

        $this->load->model(array(
            'M_Audit',
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
       	$data['http_kode'] = $this->M_Audit->getAudit('cekKode');
       	$data['get_audit'] = $this->M_Audit->getAudit("getAll", null, null, null, false);
       	$this->template->frontend($this->VIEW_PATH."/index", "Dokumen Audit", $data);
    }

    /*
     * Notice : Jangan pernah mengambil id melalui segment
     *          Ambil saja melalui Array $_POST[]
     *
     * Alasan : Dikarenakan id di segment di encript oleh fungsi encode_str (helper)
     */
    public function form($idAudit) {
		$data['get_audit'] = $this->M_Audit->getAudit('getDataByPK', null, null, decode_str($idAudit));
		$data['get_ref_audit'] = $this->M_Audit->getRefAudit('getDataByAudit', null, null, decode_str($idAudit));
		$data['get_departemen'] = $this->M_Departemen->getDepartemen("getAll", null, null, null, false);
		$data['get_instansi'] = $this->M_Instansi->getInstansi("getAll", null, null, null, false);
		$data['get_dokumen'] = $this->M_Dokumen->getDokumen("getAll", null, null, null, false);
		$this->template->frontend($this->VIEW_PATH."/form", "Form Audit", $data);
    }

	public function tambahDokumen() {
		$RETURN_MODEL = $this->M_Audit->tambahDokumen($_POST);
		$this->session->set_flashdata("NOTIFY", $RETURN_MODEL["STATUS"]."/".$RETURN_MODEL['PESAN']);
		redirect($this->router->fetch_class().'/form/'.$RETURN_MODEL['PK']);
	}

	public function hapusDokumen() {
		$RETURN_MODEL = $this->M_Audit->hapusDokumen($_POST);
		$this->session->set_flashdata("NOTIFY", $RETURN_MODEL["STATUS"]."/".$RETURN_MODEL['PESAN']);
		redirect($this->router->fetch_class().'/form/'.$RETURN_MODEL['PK']);
	}

}

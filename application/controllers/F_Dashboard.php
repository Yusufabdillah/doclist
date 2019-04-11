<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 15/12/2018
 * Time: 16:20
 */

class F_Dashboard extends MY_Controller {

    private $VIEW_PATH = 'dashboard';

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
        $this->template->frontend($this->VIEW_PATH."/index", "Dashboard");
    }

    public function sesiAktif() {
		$this->template->frontend($this->VIEW_PATH."/sesi_aktif", "Sesi");
	}

	public function AJAX($fetch = null, $parsingValue = null) {
		if (isset($fetch)) {
			if ($fetch == 'getDokumen-getByAkses') {
				if (decode_str($parsingValue) == 1) {
					print $this->M_Dokumen->getDokumenExpired('getAll', null, null, null, true);
				} else {
					print $this->M_Dokumen->getDokumenExpired('getDataByDepartemen', null, null, null, true);
				}
			}
		} else if (!isset($fetch)) {
			$Fungsi = $this->input->post('fungsi');
			if ($Fungsi == 'toDetail') {
				print encode_str($this->input->post('idDokumen'));
			}
		}
	}

}

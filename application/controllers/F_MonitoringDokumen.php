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
		$this->otorisasi->cek($this->session->idUser, 'frontEnd');
        $this->load->model(array(
            'M_Dokumen'
        ));
    }

    /**
     * Diusahakan dalam pengambilan data hanya menggunakan satu fungsi get
     * dikarenakan fungsi get sudah memakai tabel view jadi tabel view sudah di LEFT JOIN
     * dengan tabel lainnya , sehingga tidak perlu memakai fungsi dari model lainnya
     */
    public function index() {
        $this->template->frontend($this->VIEW_PATH."/index", "Master Document");
    }

    public function detail($idDokumen) {
		$data['get_dokumen'] = $this->M_Dokumen->getDokumen('getDataByPK', null, null, decode_str($idDokumen));
		$this->template->frontend($this->VIEW_PATH."/detail", "Detail Dokumen", $data);
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
			if ($Fungsi == 'toDetail') {
				print encode_str($this->input->post('idDokumen'));
			}
		}
	}

}

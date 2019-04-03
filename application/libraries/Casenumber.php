<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 03/04/2019
 * Time: 10.34
 */

class Casenumber
{

	private $_CI;

	public function __construct()
	{
		$this->_CI = &get_instance();
		$this->_CI->load->model('M_Dokumen');
	}

	public function create($singkatan, $tipe) {
		$str = rand(1,99999);
		$kode = str_pad($str,5,"0", STR_PAD_LEFT);
		$caseNumber = $kode.'RSUP'.date("Y").date("m").date("d")."-".$tipe;
		$Fetch = $this->_CI->M_Dokumen->getDokumen("cekCaseNumber", null, null, $caseNumber);
		if ($Fetch == 'ada_yang_sama') {
			self::create($singkatan, $tipe);
		} else if ($Fetch == 'tidak_ada_yang_sama') {
			return $caseNumber;
		}
	}

}

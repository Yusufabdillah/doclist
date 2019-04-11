<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 11/04/2019
 * Time: 15.06
 */

class Otorisasi
{

	private $_CI;
	private $OK = '200';
	private $Unathorized = '401';

	public function __construct()
	{
		$this->_CI = &get_instance();
		$this->_CI->load->model('M_Authentication');
	}

	public function cek($sesiAktif = null, $Bagian) {
		if (empty($sesiAktif)) {
			redirect(site_url('Auth/index'));
		} else {
			$kode = $this->_CI->M_Authentication->cekOtorisasi($sesiAktif);
			if ($kode == $this->OK) {
				return null;
			} else if ($kode == $this->Unathorized) {
				redirect(site_url('auth/cekAPI/'.$Bagian.'/'.$this->Unathorized));
			} else {
				redirect(site_url('auth/cekAPI/'.$Bagian.'/500'));
			}
		}
	}

}

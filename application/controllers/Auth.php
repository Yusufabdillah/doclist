<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 12/12/2018
 * Time: 18:35
 */

class Auth extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        if (isset($this->session->idUser)) {
        	redirect(site_url('F_Dashboard/index'));
		}
    }

    protected function load_models(){
        $this->load->model('M_Authentication');
    }

    public function index() {
        $this->template->backend("authentication/login", "Login", null, true);
    }

    public function logIn() {
        $this->M_Authentication->logIn($_POST);
    }

    public function logOut() {
        $this->M_Authentication->logOut($this->session->idLog);
    }

    public function cekAPI($Bagian = 'frontEnd', $kode) {
    	if ($Bagian == 'frontEnd') {
			$this->template->frontend("authentication/".$kode, "Unauthorized");
		} else if ($Bagian == 'backEnd') {
			$this->template->backend("authentication/".$kode, "Unauthorized");
		}
	}


}

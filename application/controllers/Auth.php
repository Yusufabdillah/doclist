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


}
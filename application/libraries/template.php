<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 12/12/2018
 * Time: 18:36
 */

class Template {

    private $_CI;

    public function __construct()
    {
        $this->_CI = &get_instance();
    }

    public function frontEnd($view_path, $title, $data = null) {
        $this->_CI->load->model('M_MenuAkses_Frontend');

        if(!$this->_CI->session->userdata('idGrup')){
            $idGrup = null;
        }else{
            $idGrup = $this->_CI->session->userdata('idGrup');
        }

        $data['_getMenu1'] = $this->_CI->M_MenuAkses_Frontend->getMenuAkses_lv1('getData_lv1' , NULL, NULL, $idGrup, false);
        $data['_getMenu2'] = $this->_CI->M_MenuAkses_Frontend->getMenuAkses_lv2('getData_lv2' , NULL, NULL, $idGrup, false);

        $config = array(
            "_TITLE_" => $title,
            "_STYLE_" => $this->_CI->load->view("tmp_frontend/style", $data, true),
            "_SCRIPT_" => $this->_CI->load->view("tmp_frontend/script", $data, true),
            "_HEADBAR_" => $this->_CI->load->view("tmp_frontend/headbar", $data, true),
            "_SIDEBAR_" => $this->_CI->load->view("tmp_frontend/sidebar", $data, true),
            "_CONTENT_" => $this->_CI->load->view("frontend/".$view_path, $data, true),
            "_FOOTER_" => $this->_CI->load->view("tmp_frontend/footer", $data, true),
            "_BODY_CLASS_" => "header-fixed-top sidebar-partial sidebar-visible-lg sidebar-no-animations footer-fixed"
        );
        self::htmlBodyFrontend($config, false, "Frontend");
    }

    public function backEnd($view_path, $title, $data = null, $login = false) {
        $this->_CI->load->model('M_MenuAkses_Backend');

        if(!$this->_CI->session->userdata('idGrup')){
            $idGrup = null;
        }else{
            $idGrup = $this->_CI->session->userdata('idGrup');
        }

        $data['_getMenu1'] = $this->_CI->M_MenuAkses_Backend->getMenuAkses_lv1('getData_lv1' , NULL, NULL, $idGrup, false);
        $data['_getMenu2'] = $this->_CI->M_MenuAkses_Backend->getMenuAkses_lv2('getData_lv2' , NULL, NULL, $idGrup, false);
        //$data['_getMenu3'] = $this->_CI->M_MenuAkses_Backend->getMenuAkses_lv3('getData_lv3' , NULL, NULL, $idGrup, false);

        $config = array(
            "_TITLE_" => $title,
            "_STYLE_" => $this->_CI->load->view("tmp_backend/style", $data, true),
            "_SCRIPT_" => $this->_CI->load->view("tmp_backend/script", $data, true),
            "_HEADBAR_" => $this->_CI->load->view("tmp_backend/headbar", $data, true),
            "_SIDEBAR_" => $this->_CI->load->view("tmp_backend/sidebar", $data, true),
            "_CONTENT_" => $this->_CI->load->view("backend/".$view_path, $data, true),
            "_FOOTER_" => $this->_CI->load->view("tmp_backend/footer", $data, true),
            "_BODY_CLASS_" => "m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"
        );
        self::htmlBodyBackend($config, $login, "Backend");
    }

    private function htmlBodyBackend($config, $login = false, $part = null) {
        ?>
<html>
    <head>
        <title><?= $part." | ".$config['_TITLE_']; ?></title>
        <?= $config['_SCRIPT_']; ?>
        <?= $config['_STYLE_']; ?>
    </head>
    <body class="<?= $config['_BODY_CLASS_'] ?>">
        <div class="m-grid m-grid--hor m-grid--root m-page">
            <?= $login == false ? $config['_HEADBAR_'] : null; ?>
            <?php if ($login == false) { ?><div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body"> <?php } ?>
                <?= $login == false ? $config['_SIDEBAR_'] : null; ?>
                <?= $config['_CONTENT_']; ?>
            <?php if ($login == false) { ?></div><?php } ?>
            <?= $login == false ? $config['_FOOTER_'] : null; ?>
        </div>
        <?php $this->_CI->load->view('tmp_backend/modalFrontend'); ?>
    </body>
</html>
        <?php
    }

    private function htmlBodyFrontend($config, $login = false, $part = null) {
        ?>
<!DOCTYPE html>
<html class="no-js lt-ie10" lang="en">
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <title><?= $part." | ".$config['_TITLE_']; ?></title>
    <meta name="description" content="Sistem informasi manajemen dokumen legal sambu groups">
    <meta name="author" content="Sambu Groups">
    <meta name="robots" content="noindex, nofollow">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0">
    <?= $config['_SCRIPT_']; ?>
    <?= $config['_STYLE_']; ?>
</head>
<body>
    <div id="page-wrapper">
        <div class="preloader themed-background">
            <h1 class="push-top-bottom text-light text-center"><strong>Pro</strong>UI</h1>
            <div class="inner">
                <h3 class="text-light visible-lt-ie10"><strong>Loading..</strong></h3>
                <div class="preloader-spinner hidden-lt-ie10"></div>
            </div>
        </div>
        <div id="page-container" class="header-fixed-top sidebar-partial sidebar-visible-lg sidebar-no-animations footer-fixed">
            <div id="sidebar-alt"></div>
            <div id="sidebar">
                <div id="sidebar-scroll">
                    <div class="sidebar-content">
                        <?= $config['_SIDEBAR_']; ?>
                    </div>
                </div>
            </div>
            <div id="main-container">
                <header class="navbar navbar-default navbar-fixed-top">
                    <?= $config['_HEADBAR_']; ?>
                </header>
                <div id="page-content">
                    <?= $config['_CONTENT_']; ?>
                </div>
                <footer class="clearfix">
                    <?= $config['_FOOTER_']; ?>
                </footer>
            </div>
        </div>
    </div>
    <a href="#" id="to-top"><i class="fa fa-angle-double-up"></i></a>
    <?php $this->_CI->load->view('tmp_frontend/modalBackend'); ?>
    <?php $this->_CI->load->view('frontend/authentication/modalLogout'); ?>
    <?php $this->_CI->load->view('frontend/authentication/modalChangePass'); ?>
</body>
</html>
        <?php
    }


}

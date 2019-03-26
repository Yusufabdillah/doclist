<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 12/12/2018
 * Time: 22:16
 */
?>
<!-- END: Left Aside -->
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title">
                    User Account
                </h3>
            </div>
            <ul class="breadcrumb">
                <li>
                    <a href="<?= site_url("B_Dashboard/index"); ?>">
                        <i style="font-size: 20px" class="fa fa-2x fa-home"></i>
                    </a>
                </li>
                <li>&nbsp;>&nbsp;</li>
                <li>
                    <a href="<?= site_url($this->router->fetch_class()."/".$this->router->fetch_method()) ?>">
                        <?php
                        $EXPL = explode('_',$this->router->fetch_class());
                        echo $EXPL[1];
                        ?>
                    </a>
                </li>
                <li>&nbsp;>&nbsp;</li>
                <li>
                    <?= $this->router->fetch_method(); ?>
                </li>
            </ul>
        </div>
    </div>
    <!-- END: Subheader -->
    <div class="m-content">
        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            <i class="la la-list-ol"></i> Tabel Data User
                        </h3>
                    </div>
                </div>
                <?php
                if ($get_user !== '401') {
                    ?>
                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item">
                                <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right"
                                     data-dropdown-persistent="true" data-dropdown-toggle="click">
                                    <a href="#" class="m-dropdown__toggle btn m-btn--pill btn-primary dropdown-toggle">
                                        <i class="la la-search"></i>
                                    </a>
                                    <div class="m-dropdown__wrapper">
                                        <span class="m-dropdown__arrow m-dropdown__arrow--right"></span>
                                        <div class="m-dropdown__inner">
                                            <div class="m-dropdown__body">
                                                <div class="m-dropdown__content">
                                                    <input autofocus type="text" class="form-control m-input"
                                                           placeholder="Pencarian..." id="generalSearch">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="m-portlet__nav-item">
                                <a href="<?= site_url('b_user/form'); ?>" class="btn m-btn--pill btn-accent"
                                   data-container="body"
                                   data-toggle="m-popover"
                                   data-placement="left"
                                   data-skin="dark"
                                   data-html="true"
                                   data-content="<i class='la la-info-circle'></i> Tambah User"
                                >
                                    <i class="la la-plus"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="m-portlet__body">
                <?php
                if ($get_user == 401) {
                    ?>
                    <h2 class="text-center">
                        <i style="font-size: 25px" class="fa fa-2x fa-lock"></i> Kunci API tidak diberikan izin...
                    </h2>
                    <?php
                } else if ($get_user !== 401) {
                    ?>
                    <div class="m_datatable" id="server_data"></div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php
$this->load->view('backend/user/modalDelete');
$this->load->view('backend/user/JSDatatable');
$this->load->view('backend/user/JSNotify');
$this->load->view('backend/user/JS');



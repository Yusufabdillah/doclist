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
                    User Profile
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
        <div class="row">
            <div class="col-xl-3 col-lg-4">
                <div class="m-portlet ">
                    <div class="m-portlet__body">
                        <div class="m-card-profile">
                            <div class="m-card-profile__title m--hide">
                                Your Profile
                            </div>
                            <div class="m-card-profile__pic">
                                <div class="m-card-profile__pic-wrapper">
                                    <i style="font-size: 60px" class="la la-2x la-user"></i>
                                </div>
                            </div>
                            <div class="m-card-profile__details">
                                <span class="m-card-profile__name">
                                    <?= $get_profil->namaUser ?>
                                </span>
                                <a href="" class="m-card-profile__email m-link">
                                    <?= $get_profil->namaJabatan; ?>
                                </a>
                            </div>
                        </div>
                        <div class="m-portlet__body-separator"></div>
                        <div class="m-widget1 m-widget1--paddingless">
                            <div class="m-widget1__item">
                                <div class="row m-row--no-padding align-items-center">
                                    <div class="col">
                                        <h3 class="m-widget1__title">
                                            <i class="flaticon-user-ok"></i>
                                        </h3>
                                        <span class="m-widget1__desc">
                                            Status User
                                        </span>
                                    </div>
                                    <div class="col m--align-right">
                                        <?php
                                        if ($get_profil->statusUser == true) {
                                            $statusUser = array(
                                                'style' => 'success',
                                                'title' => 'Aktif'
                                            );
                                        } else if ($get_profil->statusUser == false) {
                                            $statusUser = array(
                                                'style' => 'danger',
                                                'title' => 'Non Aktif'
                                            );
                                        }
                                        ?>
                                        <span class="m-badge m-badge--<?= $statusUser['style']; ?> m-badge--wide">
                                            <?= $statusUser['title']; ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="m-widget1__item">
                                <div class="row m-row--no-padding align-items-center">
                                    <div class="col">
                                        <h3 class="m-widget1__title">
                                            <i class="flaticon-multimedia"></i>
                                        </h3>
                                        <span class="m-widget1__desc">
                                            API Akses
                                        </span>
                                    </div>
                                    <div class="col m--align-right">
                                        <?php
                                        if ($get_profil->statusAPI == true) {
                                            $statusAPI = array(
                                                'style' => 'success',
                                                'title' => 'Aktif'
                                            );
                                        } else if ($get_profil->statusAPI == false) {
                                            $statusAPI = array(
                                                'style' => 'danger',
                                                'title' => 'Non Aktif'
                                            );
                                        }
                                        ?>
                                        <span class="m-badge m-badge--<?= $statusAPI['style']; ?> m-badge--wide">
                                            <?= $statusAPI['title']; ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="m-widget1__item">
                                <div class="row m-row--no-padding align-items-center">
                                    <div class="col">
                                        <h3 class="m-widget1__title">
                                            <i class="flaticon-route"></i>
                                        </h3>
                                        <span class="m-widget1__desc">
                                            Person In Charge
                                        </span>
                                    </div>
                                    <div class="col m--align-right">
                                        <?php
                                        if ($get_profil->statusPIC == true) {
                                            $statusPIC = array(
                                                'style' => 'success',
                                                'title' => 'Aktif'
                                            );
                                        } else if ($get_profil->statusPIC == false) {
                                            $statusPIC = array(
                                                'style' => 'danger',
                                                'title' => 'Non Aktif'
                                            );
                                        }
                                        ?>
                                        <span class="m-badge m-badge--<?= $statusPIC['style']; ?> m-badge--wide">
                                        <?= $statusPIC['title']; ?>
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8">
                <div class="m-portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    Description
                                </h3>
                            </div>
                        </div>
                    </div>
                    <!--begin::Form-->
                    <form action="<?= site_url("b_user/saveUser") ?>" method="post" class="m-form m-form--state m-form--fit m-form--label-align-right" id="formUser">
                        <div class="m-portlet__body">
                            <?php
                            /**
                             * Alert berikut menggunakan JSValidasi bila di aktifkan , jika tidak di trigger
                             * maka tidak akan keluar
                             */
                            ?>
                            <div class="m-form__content">
                                <div class="m-alert m-alert--icon alert alert-warning m--hide" role="alert" id="formUser_msg">
                                    <div class="m-alert__icon">
                                        <i class="la la-warning"></i>
                                    </div>
                                    <div class="m-alert__text">
                                        Oh snap! Change a few things up and try submitting again.
                                    </div>
                                    <div class="m-alert__close">
                                        <button type="button" class="close" data-close="alert" aria-label="Close"></button>
                                    </div>
                                </div>
                            </div>
                            <?php
                            //#########################################################################
                            if (isset($get_profil)) {
                                ?>
                                <input type="hidden" name="passUser" value="<?= !empty($get_profil) ? $get_profil->passUser : null; ?>">
                                <input type="hidden" name="createdBy" value="<?= !empty($get_profil) ? $get_profil->createdBy : null; ?>">
                                <input type="hidden" name="createdDate" value="<?= !empty($get_profil) ? $get_profil->createdDate : null; ?>">
                                <input type="hidden" name="idPerusahaan" value="<?= !empty($get_profil) ? $get_profil->idPerusahaan : null; ?>">
                                <input type="hidden" name="idDepartemen" value="<?= !empty($get_profil) ? $get_profil->idDepartemen : null; ?>">
                                <input type="hidden" name="idJabatan" value="<?= !empty($get_profil) ? $get_profil->idJabatan : null; ?>">
                                <input type="hidden" name="idGrup" value="<?= !empty($get_profil) ? $get_profil->idGrup : null; ?>">
                                <input type="hidden" name="_Update_" value="true">
                                <input type="hidden" name="profileUser" value="true">
                                <?php
                                if ($get_profil->statusAPI == true) {
                                    ?>
                                    <input type="hidden" name="statusAPI" value="<?= $get_profil->statusAPI; ?>">
                                    <?php
                                } if ($get_profil->statusPIC == true) {
                                    ?>
                                    <input type="hidden" name="statusPIC" value="<?= $get_profil->statusPIC; ?>">
                                    <?php
                                } if ($get_profil->statusUser == true) {
                                    ?>
                                    <input type="hidden" name="statusUser" value="<?= $get_profil->statusUser; ?>">
                                    <?php
                                }
                            }
                            ?>
                            <div class="form-group m-form__group row">
                                <label class="col-form-label col-md-3">
                                    Username *
                                </label>
                                <div class="col-md-3 col-md-7">
                                    <input readonly type="text" required value="<?= !empty($get_profil) ? $get_profil->idUser : null; ?>" class="form-control m-input" name="idUser" placeholder="Enter username...">
                                    <span class="m-form__help">
                                Please fill with format text.
                            </span>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-form-label col-md-3">
                                    Nama Lengkap *
                                </label>
                                <div class="col-md-3 col-md-7">
                                    <input type="text" value="<?= !empty($get_profil) ? $get_profil->namaUser : null; ?>" class="form-control m-input" name="namaUser" placeholder="Enter user long name...">
                                    <span class="m-form__help">
                                        Please fill with format text.
                                    </span>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-form-label col-lg-3 col-sm-12">
                                    Nomor Telephone
                                </label>
                                <div class="col-lg-5 col-md-9 col-sm-12">
                                    <input type='text' value="<?= !empty($get_profil) ? $get_profil->telpUser : null; ?>" class="form-control" id="phoneUser" name="telpUser"/>
                                    <span class="m-form__help">
                                        Phone number mask:
                                        <code>
                                            9999-9999-9999
                                        </code>
                                </span>
                                </div>
                            </div>
                            <div class="m-portlet__body-separator"></div>
                            <div class="form-group m-form__group row">
                                <label class="col-form-label col-lg-3 col-sm-12">
                                    Perusahaan
                                </label>
                                <div class="col-md-9 col-md-9 col-sm-12">
                                    <p>
                                        <?= $get_profil->namaPerusahaan." ".$get_profil->lokasiPerusahaan; ?>
                                    </p>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-form-label col-lg-3 col-sm-12">
                                    Departemen
                                </label>
                                <div class="col-md-9 col-md-9 col-sm-12">
                                    <p>
                                        <?= $get_profil->namaDepartemen." di ".$get_profil->namaPerusahaan." ".$get_profil->lokasiPerusahaan; ?>
                                    </p>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-form-label col-lg-3 col-sm-12">
                                    Jabatan
                                </label>
                                <div class="col-md-9 col-md-9 col-sm-12">
                                    <p>
                                        <?= $get_profil->namaJabatan." di ".$get_profil->namaPerusahaan." ".$get_profil->lokasiPerusahaan; ?>
                                    </p>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-form-label col-lg-3 col-sm-12">
                                    Grup User
                                </label>
                                <div class="col-md-8 col-md-9 col-sm-12">
                                    <p>
                                        <?= $get_profil->namaGrup." di ".$get_profil->Grup_namaPerusahaan." ".$get_profil->Grup_lokasiPerusahaan; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="m-portlet__foot m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions">
                                <div class="row">
                                    <div class="col-lg-9 ml-lg-auto">
                                        <button type="submit" class="btn m-btn--pill btn-accent">
                                            Submit
                                        </button>
                                        <button type="reset" class="btn m-btn--pill btn-warning">
                                            Cancel
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!--end::Form-->
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$this->load->view('backend/user_profil/JSNotify');
$this->load->view('backend/user_profil/JSValidasi');
$this->load->view('backend/user_profil/JSSelect2');



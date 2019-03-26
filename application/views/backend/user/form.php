<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 13/12/2018
 * Time: 14:47
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
                        <a href="<?= site_url($this->router->fetch_class() . "/index") ?>">
                            <?php
                            $EXPL = explode('_', $this->router->fetch_class());
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
            <div class="m-portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Form User Account
                            </h3>
                        </div>
                    </div>
                </div>
                <?php
                /**
                 * Untuk Create
                 */
                if (empty($get_user)) {
                ?>
                    <!--begin::Form-->
                    <form action="<?= site_url("b_user/saveUser") ?>" method="post"
                          class="m-form m-form--state m-form--fit m-form--label-align-right" id="formUser">
                        <div class="m-portlet__body">
                            <?php
                            /**
                             * Alert berikut menggunakan JSValidasi bila di aktifkan , jika tidak di trigger
                             * maka tidak akan keluar
                             */
                            ?>
                            <div class="m-form__content">
                                <div class="m-alert m-alert--icon alert alert-warning m--hide" role="alert"
                                     id="formUser_msg">
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
                            ?>
                            <div class="form-group m-form__group row">
                                <label class="col-form-label col-md-3">
                                    Username *
                                </label>
                                <div class="col-md-3 col-md-7">
                                    <input type="text"
                                           class="form-control m-input" name="idUser" placeholder="Enter username...">
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
                                    <input type="text"
                                           class="form-control m-input" name="namaUser"
                                           placeholder="Enter user long name...">
                                    <span class="m-form__help">
                                Please fill with format text.
                            </span>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-form-label col-lg-3 col-sm-12">
                                    Nomor Telp.
                                </label>
                                <div class="col-lg-6 col-md-9 col-sm-12">
                                    <input type='text'
                                           class="form-control" id="phoneUser" name="telpUser"/>
                                    <span class="m-form__help">
                                Phone number mask:
                                <code>
                                9999-9999-9999
                            </code>
                        </span>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-form-label col-lg-3 col-sm-12">
                                    Perusahaan *
                                </label>
                                <div class="col-lg-4 col-md-9 col-sm-12">
                                    <select class="form-control m-select2" id="select_idPerusahaan" name="idPerusahaan">
                                        <option></option>
                                        <?php
                                        foreach ($get_perusahaan as $KEY_ARRAY => $data) {
                                            ?>
                                            <option <?php
                                            if (!empty($get_user)) {
                                                if ($get_user->idPerusahaan === $data->idPerusahaan) {
                                                    echo 'selected';
                                                } else {
                                                    null;
                                                }
                                            } else {
                                                null;
                                            }
                                            ?> value="<?= $data->idPerusahaan ?>">
                                                <?= $data->namaPerusahaan; ?> at <?= $data->lokasiPerusahaan; ?>
                                            </option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                    <span class="m-form__help">
                                Please choose a company.
                            </span>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-form-label col-lg-3 col-sm-12">
                                    Departemen *
                                </label>
                                <div class="col-lg-4 col-md-9 col-sm-12">
                                    <select class="form-control m-select2" id="select_idDepartemen" name="idDepartemen">
                                        <option></option>
                                        <?php
                                        foreach ($get_departemen as $KEY_ARRAY => $data) {
                                            ?>
                                            <option <?php
                                            if (!empty($get_user)) {
                                                if ($get_user->idDepartemen === $data->idDepartemen) {
                                                    echo 'selected';
                                                } else {
                                                    null;
                                                }
                                            } else {
                                                null;
                                            }
                                            ?> value="<?= $data->idDepartemen ?>">
                                                <?= $data->namaDepartemen . " di " . $data->namaPerusahaan . " " . $data->lokasiPerusahaan; ?>
                                            </option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                    <span class="m-form__help">
                                Please choose a departement.
                            </span>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-form-label col-lg-3 col-sm-12">
                                    Jabatan *
                                </label>
                                <div class="col-lg-4 col-md-9 col-sm-12">
                                    <select class="form-control m-select2" id="select_idJabatan" name="idJabatan">
                                        <option></option>
                                        <?php
                                        foreach ($get_jabatan as $KEY_ARRAY => $data) {
                                            ?>
                                            <option <?php
                                            if (!empty($get_user)) {
                                                if ($get_user->idJabatan === $data->idJabatan) {
                                                    echo 'selected';
                                                } else {
                                                    null;
                                                }
                                            } else {
                                                null;
                                            }
                                            ?> value="<?= $data->idJabatan ?>">
                                                <?= $data->namaJabatan . " di " . $data->namaPerusahaan . " " . $data->lokasiPerusahaan; ?>
                                            </option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                    <span class="m-form__help">
                                Please choose a position.
                            </span>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-form-label col-lg-3 col-sm-12">
                                    Group User *
                                </label>
                                <div class="col-lg-4 col-md-9 col-sm-12">
                                    <select class="form-control m-select2" id="select_idGrup" name="idGrup">
                                        <option></option>
                                        <?php
                                        foreach ($get_grup as $KEY_ARRAY => $data) {
                                            ?>
                                            <option <?php
                                            if (!empty($get_user)) {
                                                if ($get_user->idGrup === $data->idGrup) {
                                                    echo 'selected';
                                                } else {
                                                    null;
                                                }
                                            } else {
                                                null;
                                            }
                                            ?> value="<?= $data->idGrup ?>">
                                                <?= $data->namaGrup; ?>
                                            </option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                    <span class="m-form__help">
                                Please choose a group user.
                            </span>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-3 col-form-label">
                                    Status Aktif *
                                </label>
                                <div class="col-3">
                                    <div class="m-checkbox-inline">
                                <span class="m-switch m-switch--icon m-switch--accent">
                                    <label>
                                        <input type="checkbox" value="1"
                                               <?php
                                               if (!empty($get_user)) {
                                                   if ($get_user->statusUser == true) {
                                                       echo 'checked';
                                                   } else {
                                                       null;
                                                   }
                                               } else {
                                                   null;
                                               }
                                               ?>
                                               name="statusUser">
                                        <span></span>
                                    </label>
                                </span>
                                    </div>
                                    <span class="m-form__help">
                                Please set status user.
                            </span>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-3 col-form-label">
                                    API Akses *
                                </label>
                                <div class="col-3">
                                    <div class="m-checkbox-inline">
                                <span class="m-switch m-switch--icon m-switch--accent">
                                    <label>
                                        <input type="checkbox" value="1"
                                               <?php
                                               if (!empty($get_user)) {
                                                   if ($get_user->statusAPI == true) {
                                                       echo 'checked';
                                                   } else {
                                                       null;
                                                   }
                                               } else {
                                                   null;
                                               }
                                               ?>
                                               name="statusAPI">
                                        <span></span>
                                    </label>
                                </span>
                                    </div>
                                    <span class="m-form__help">
                                Please set status API.
                            </span>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-3 col-form-label">
                                    Person In Charge *
                                </label>
                                <div class="col-3">
                                    <div class="m-checkbox-inline">
                                <span class="m-switch m-switch--icon m-switch--accent">
                                    <label>
                                        <input type="checkbox" value="1"
                                               <?php
                                               if (!empty($get_user)) {
                                                   if ($get_user->statusPIC == true) {
                                                       echo 'checked';
                                                   } else {
                                                       null;
                                                   }
                                               } else {
                                                   null;
                                               }
                                               ?>
                                               name="statusPIC">
                                        <span></span>
                                    </label>
                                </span>
                                    </div>
                                    <span class="m-form__help">
                                Please set status Person In Charge.
                            </span>
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
                                        <a href="<?= site_url("b_user/index"); ?>" class="btn m-btn--pill btn-danger">
                                            Back
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!--end::Form-->
                <?php
                }
                /**
                 * Untuk Update
                 */
                if (!empty($get_user)) {
                    if ($get_user == '401') {
                        ?>
                        <div class="m-portlet__body">
                            <div class="text-center">
                                <h2><i style="font-size: 25px" class="fa fa-2x fa-lock"></i> Kunci API tidak diberikan
                                    izin..</h2>
                            </div>
                        </div>
                        <?php
                    } else if ($get_user !== '401') {
                        ?>
                        <!--begin::Form-->
                        <form action="<?= site_url("b_user/saveUser") ?>" method="post"
                              class="m-form m-form--state m-form--fit m-form--label-align-right" id="formUser">
                            <div class="m-portlet__body">
                                <?php
                                /**
                                 * Alert berikut menggunakan JSValidasi bila di aktifkan , jika tidak di trigger
                                 * maka tidak akan keluar
                                 */
                                ?>
                                <div class="m-form__content">
                                    <div class="m-alert m-alert--icon alert alert-warning m--hide" role="alert"
                                         id="formUser_msg">
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
                                if (isset($get_user)) {
                                    ?>
                                    <input type="hidden" name="passUser"
                                           value="<?= !empty($get_user) ? $get_user->passUser : null; ?>">
                                    <input type="hidden" name="createdBy"
                                           value="<?= !empty($get_user) ? $get_user->createdBy : null; ?>">
                                    <input type="hidden" name="createdDate"
                                           value="<?= !empty($get_user) ? $get_user->createdDate : null; ?>">
                                    <input type="hidden" name="_Update_" value="true">
                                    <?php
                                }
                                ?>
                                <div class="form-group m-form__group row">
                                    <label class="col-form-label col-md-3">
                                        Username *
                                    </label>
                                    <div class="col-md-3 col-md-7">
                                        <input type="text" value="<?= !empty($get_user) ? $get_user->idUser : null; ?>"
                                               class="form-control m-input" name="idUser" placeholder="Enter username...">
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
                                        <input type="text" value="<?= !empty($get_user) ? $get_user->namaUser : null; ?>"
                                               class="form-control m-input" name="namaUser"
                                               placeholder="Enter user long name...">
                                        <span class="m-form__help">
                                Please fill with format text.
                            </span>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-form-label col-lg-3 col-sm-12">
                                        Nomor Telp.
                                    </label>
                                    <div class="col-lg-6 col-md-9 col-sm-12">
                                        <input type='text' value="<?= !empty($get_user) ? $get_user->telpUser : null; ?>"
                                               class="form-control" id="phoneUser" name="telpUser"/>
                                        <span class="m-form__help">
                                Phone number mask:
                                <code>
                                9999-9999-9999
                            </code>
                        </span>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-form-label col-lg-3 col-sm-12">
                                        Perusahaan *
                                    </label>
                                    <div class="col-lg-4 col-md-9 col-sm-12">
                                        <select class="form-control m-select2" id="select_idPerusahaan" name="idPerusahaan">
                                            <option></option>
                                            <?php
                                            foreach ($get_perusahaan as $KEY_ARRAY => $data) {
                                                ?>
                                                <option <?php
                                                if (!empty($get_user)) {
                                                    if ($get_user->idPerusahaan === $data->idPerusahaan) {
                                                        echo 'selected';
                                                    } else {
                                                        null;
                                                    }
                                                } else {
                                                    null;
                                                }
                                                ?> value="<?= $data->idPerusahaan ?>">
                                                    <?= $data->namaPerusahaan; ?> at <?= $data->lokasiPerusahaan; ?>
                                                </option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                        <span class="m-form__help">
                                Please choose a company.
                            </span>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-form-label col-lg-3 col-sm-12">
                                        Departemen *
                                    </label>
                                    <div class="col-lg-4 col-md-9 col-sm-12">
                                        <select class="form-control m-select2" id="select_idDepartemen" name="idDepartemen">
                                            <option></option>
                                            <?php
                                            foreach ($get_departemen as $KEY_ARRAY => $data) {
                                                ?>
                                                <option <?php
                                                if (!empty($get_user)) {
                                                    if ($get_user->idDepartemen === $data->idDepartemen) {
                                                        echo 'selected';
                                                    } else {
                                                        null;
                                                    }
                                                } else {
                                                    null;
                                                }
                                                ?> value="<?= $data->idDepartemen ?>">
                                                    <?= $data->namaDepartemen . " di " . $data->namaPerusahaan . " " . $data->lokasiPerusahaan; ?>
                                                </option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                        <span class="m-form__help">
                                Please choose a departement.
                            </span>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-form-label col-lg-3 col-sm-12">
                                        Jabatan *
                                    </label>
                                    <div class="col-lg-4 col-md-9 col-sm-12">
                                        <select class="form-control m-select2" id="select_idJabatan" name="idJabatan">
                                            <option></option>
                                            <?php
                                            foreach ($get_jabatan as $KEY_ARRAY => $data) {
                                                ?>
                                                <option <?php
                                                if (!empty($get_user)) {
                                                    if ($get_user->idJabatan === $data->idJabatan) {
                                                        echo 'selected';
                                                    } else {
                                                        null;
                                                    }
                                                } else {
                                                    null;
                                                }
                                                ?> value="<?= $data->idJabatan ?>">
                                                    <?= $data->namaJabatan . " di " . $data->namaPerusahaan . " " . $data->lokasiPerusahaan; ?>
                                                </option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                        <span class="m-form__help">
                                Please choose a position.
                            </span>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-form-label col-lg-3 col-sm-12">
                                        Group User *
                                    </label>
                                    <div class="col-lg-4 col-md-9 col-sm-12">
                                        <select class="form-control m-select2" id="select_idGrup" name="idGrup">
                                            <option></option>
                                            <?php
                                            foreach ($get_grup as $KEY_ARRAY => $data) {
                                                ?>
                                                <option <?php
                                                if (!empty($get_user)) {
                                                    if ($get_user->idGrup === $data->idGrup) {
                                                        echo 'selected';
                                                    } else {
                                                        null;
                                                    }
                                                } else {
                                                    null;
                                                }
                                                ?> value="<?= $data->idGrup ?>">
                                                    <?= $data->namaGrup; ?>
                                                </option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                        <span class="m-form__help">
                                Please choose a group user.
                            </span>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-3 col-form-label">
                                        Status Aktif *
                                    </label>
                                    <div class="col-3">
                                        <div class="m-checkbox-inline">
                                <span class="m-switch m-switch--icon m-switch--accent">
                                    <label>
                                        <input type="checkbox" value="1"
                                               <?php
                                               if (!empty($get_user)) {
                                                   if ($get_user->statusUser == true) {
                                                       echo 'checked';
                                                   } else {
                                                       null;
                                                   }
                                               } else {
                                                   null;
                                               }
                                               ?>
                                               name="statusUser">
                                        <span></span>
                                    </label>
                                </span>
                                        </div>
                                        <span class="m-form__help">
                                Please set status user.
                            </span>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-3 col-form-label">
                                        API Akses *
                                    </label>
                                    <div class="col-3">
                                        <div class="m-checkbox-inline">
                                <span class="m-switch m-switch--icon m-switch--accent">
                                    <label>
                                        <input type="checkbox" value="1"
                                               <?php
                                               if (!empty($get_user)) {
                                                   if ($get_user->statusAPI == true) {
                                                       echo 'checked';
                                                   } else {
                                                       null;
                                                   }
                                               } else {
                                                   null;
                                               }
                                               ?>
                                               name="statusAPI">
                                        <span></span>
                                    </label>
                                </span>
                                        </div>
                                        <span class="m-form__help">
                                Please set status API.
                            </span>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-3 col-form-label">
                                        Person In Charge *
                                    </label>
                                    <div class="col-3">
                                        <div class="m-checkbox-inline">
                                <span class="m-switch m-switch--icon m-switch--accent">
                                    <label>
                                        <input type="checkbox" value="1"
                                               <?php
                                               if (!empty($get_user)) {
                                                   if ($get_user->statusPIC == true) {
                                                       echo 'checked';
                                                   } else {
                                                       null;
                                                   }
                                               } else {
                                                   null;
                                               }
                                               ?>
                                               name="statusPIC">
                                        <span></span>
                                    </label>
                                </span>
                                        </div>
                                        <span class="m-form__help">
                                Please set status Person In Charge.
                            </span>
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
                                            <a href="<?= site_url("b_user/index"); ?>" class="btn m-btn--pill btn-danger">
                                                Back
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--end::Form-->
                        <?php
                    }
                }
                ?>
            </div>
            <!--end::Portlet-->
        </div>
    </div>
<?php
$this->load->view("backend/user/JSValidasi");
$this->load->view("backend/user/JSNotify");
$this->load->view("backend/user/JSSelect2");

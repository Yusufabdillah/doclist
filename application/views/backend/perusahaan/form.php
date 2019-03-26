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
                        Company
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
                                Form Company
                            </h3>
                        </div>
                    </div>
                </div>
                <?php
                /**
                 * Untuk Create
                 */
                if (empty($get_perusahaan)) {
                    ?>
                    <!--begin::Form-->
                    <form action="<?= site_url("b_perusahaan/savePerusahaan") ?>" method="post"
                          class="m-form m-form--state m-form--fit m-form--label-align-right" id="formPerusahaan">
                        <div class="m-portlet__body">
                            <?php
                            /**
                             * Alert berikut menggunakan JSValidasi bila di aktifkan , jika tidak di trigger
                             * maka tidak akan keluar
                             */
                            ?>
                            <div class="m-form__content">
                                <div class="m-alert m-alert--icon alert alert-warning m--hide" role="alert"
                                     id="formPerusahaan_msg">
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
                                    Company Name *
                                </label>
                                <div class="col-md-3 col-md-7">
                                    <input type="text"
                                           value="<?= !empty($get_perusahaan) ? $get_perusahaan->namaPerusahaan : null; ?>"
                                           class="form-control m-input" name="namaPerusahaan"
                                           placeholder="Enter company name...">
                                    <span class="m-form__help">
                                Please fill with format text.
                            </span>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-form-label col-md-3">
                                    Location *
                                </label>
                                <div class="col-md-3 col-md-7">
                                    <input type="text"
                                           value="<?= !empty($get_perusahaan) ? $get_perusahaan->lokasiPerusahaan : null; ?>"
                                           class="form-control m-input" name="lokasiPerusahaan"
                                           placeholder="Enter location company...">
                                    <span class="m-form__help">
                                Please fill with format text.
                            </span>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-form-label col-md-3">
                                    Sort Name *
                                </label>
                                <div class="col-md-3 col-md-4">
                                    <input type="text"
                                           value="<?= !empty($get_perusahaan) ? $get_perusahaan->singkatanPerusahaan : null; ?>"
                                           class="form-control m-input" name="singkatanPerusahaan"
                                           placeholder="Enter sort company name...">
                                    <span class="m-form__help">
                                Please fill with format text.
                            </span>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-form-label col-lg-3 col-sm-12">
                                    Negara *
                                </label>
                                <div class="col-lg-4 col-md-9 col-sm-12">
                                    <select class="form-control m-select2" id="AJAX_idNegara" name="idNegara">
                                        <option></option>
                                        <?php
                                        foreach ($get_negara as $data) {
                                            ?>
                                            <option value="<?= $data->idNegara; ?>"><?= $data->namaNegara; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-form-label col-lg-3 col-sm-12">
                                    Provinsi *
                                </label>
                                <div class="col-lg-4 col-md-9 col-sm-12">
                                    <select class="form-control m-select2" id="AJAX_idProvinsi" name="idProvinsi">
                                        <option></option>
                                        <?php
                                        foreach ($get_provinsi as $data) {
                                            ?>
                                            <option value="<?= $data->idProvinsi; ?>"><?= $data->namaProvinsi; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-form-label col-lg-3 col-sm-12">
                                    Kota *
                                </label>
                                <div class="col-lg-4 col-md-9 col-sm-12">
                                    <select class="form-control m-select2" id="AJAX_idKota" name="idKota">
                                        <option></option>
                                        <?php
                                        foreach ($get_kota as $data) {
                                            ?>
                                            <option value="<?= $data->idKota; ?>"><?= $data->namaKota; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-form-label col-lg-3 col-sm-12">
                                    Kecamatan *
                                </label>
                                <div class="col-lg-4 col-md-9 col-sm-12">
                                    <select class="form-control m-select2" id="AJAX_idKecamatan" name="idKecamatan">
                                        <option></option>
                                        <?php
                                        foreach ($get_kecamatan as $data) {
                                            ?>
                                            <option value="<?= $data->idKecamatan; ?>"><?= $data->namaKecamatan; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
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
                                        <a href="<?= site_url("b_perusahaan/index"); ?>" class="btn m-btn--pill btn-danger">
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
                if (!empty($get_perusahaan)) {
                    if ($get_perusahaan == '401') {
                        ?>
                        <div class="m-portlet__body">
                            <div class="text-center">
                                <h2><i style="font-size: 25px" class="fa fa-2x fa-lock"></i> Kunci API tidak diberikan
                                    izin..</h2>
                            </div>
                        </div>
                        <?php
                    } else if ($get_perusahaan !== '401') {
                        ?>
                        <!--begin::Form-->
                        <form action="<?= site_url("b_perusahaan/savePerusahaan") ?>" method="post"
                              class="m-form m-form--state m-form--fit m-form--label-align-right" id="formPerusahaan">
                            <div class="m-portlet__body">
                                <?php
                                /**
                                 * Alert berikut menggunakan JSValidasi bila di aktifkan , jika tidak di trigger
                                 * maka tidak akan keluar
                                 */
                                ?>
                                <div class="m-form__content">
                                    <div class="m-alert m-alert--icon alert alert-warning m--hide" role="alert"
                                         id="formPerusahaan_msg">
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
                                if (isset($get_perusahaan)) {
                                    ?>
                                    <input type="hidden" name="idPerusahaan"
                                           value="<?= !empty($get_perusahaan) ? $get_perusahaan->idPerusahaan : null; ?>">
                                    <input type="hidden" name="createdBy"
                                           value="<?= !empty($get_perusahaan) ? $get_perusahaan->createdBy : null; ?>">
                                    <input type="hidden" name="createdDate"
                                           value="<?= !empty($get_perusahaan) ? $get_perusahaan->createdDate : null; ?>">
                                    <?php
                                }
                                ?>
                                <div class="form-group m-form__group row">
                                    <label class="col-form-label col-md-3">
                                        Company Name *
                                    </label>
                                    <div class="col-md-3 col-md-7">
                                        <input type="text"
                                               value="<?= !empty($get_perusahaan) ? $get_perusahaan->namaPerusahaan : null; ?>"
                                               class="form-control m-input" name="namaPerusahaan"
                                               placeholder="Enter company name...">
                                        <span class="m-form__help">
                                Please fill with format text.
                            </span>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-form-label col-md-3">
                                        Location *
                                    </label>
                                    <div class="col-md-3 col-md-7">
                                        <input type="text"
                                               value="<?= !empty($get_perusahaan) ? $get_perusahaan->lokasiPerusahaan : null; ?>"
                                               class="form-control m-input" name="lokasiPerusahaan"
                                               placeholder="Enter location company...">
                                        <span class="m-form__help">
                                            Please fill with format text.
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-form-label col-md-3">
                                        Sort Name *
                                    </label>
                                    <div class="col-md-3 col-md-4">
                                        <input type="text"
                                               value="<?= !empty($get_perusahaan) ? $get_perusahaan->singkatanPerusahaan : null; ?>"
                                               class="form-control m-input" name="singkatanPerusahaan"
                                               placeholder="Enter sort company name...">
                                        <span class="m-form__help">
                                            Please fill with format text.
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-form-label col-lg-3 col-sm-12">
                                        Negara *
                                    </label>
                                    <div class="col-lg-4 col-md-9 col-sm-12">
                                        <select class="form-control m-select2" id="AJAX_idNegara" name="idNegara">
                                            <option></option>
                                            <?php
                                            foreach ($get_negara as $data) {
                                                ?>
                                                <option <?= $get_perusahaan->idNegara == $data->idNegara ? 'selected' : null; ?> value="<?= $data->idNegara; ?>"><?= $data->namaNegara; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-form-label col-lg-3 col-sm-12">
                                        Provinsi *
                                    </label>
                                    <div class="col-lg-4 col-md-9 col-sm-12">
                                        <select class="form-control m-select2" id="AJAX_idProvinsi" name="idProvinsi">
                                            <option></option>
                                            <?php
                                            foreach ($get_provinsi as $data) {
                                                ?>
                                                <option <?= $get_perusahaan->idProvinsi == $data->idProvinsi ? 'selected' : null; ?> value="<?= $data->idProvinsi; ?>"><?= $data->namaProvinsi; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-form-label col-lg-3 col-sm-12">
                                        Kota *
                                    </label>
                                    <div class="col-lg-4 col-md-9 col-sm-12">
                                        <select class="form-control m-select2" id="AJAX_idKota" name="idKota">
                                            <option></option>
                                            <?php
                                            foreach ($get_kota as $data) {
                                                ?>
                                                <option <?= $get_perusahaan->idKota == $data->idKota ? 'selected' : null; ?> value="<?= $data->idKota; ?>"><?= $data->namaKota; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-form-label col-lg-3 col-sm-12">
                                        Kecamatan *
                                    </label>
                                    <div class="col-lg-4 col-md-9 col-sm-12">
                                        <select class="form-control m-select2" id="AJAX_idKecamatan" name="idKecamatan">
                                            <option></option>
                                            <?php
                                            foreach ($get_kecamatan as $data) {
                                                ?>
                                                <option <?= $get_perusahaan->idKecamatan == $data->idKecamatan ? 'selected' : null; ?> value="<?= $data->idKecamatan; ?>"><?= $data->namaKecamatan; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
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
                                            <a href="<?= site_url("b_perusahaan/index"); ?>" class="btn m-btn--pill btn-danger">
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
$this->load->view("backend/perusahaan/JSValidasi");
$this->load->view("backend/perusahaan/JSNotify");
$this->load->view("backend/perusahaan/AJAX");
$this->load->view("backend/perusahaan/JSSelect2");

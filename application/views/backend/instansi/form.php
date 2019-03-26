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
                        Instansi
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
                                Form Instansi
                            </h3>
                        </div>
                    </div>
                </div>
                <?php
                if (empty($get_instansi)) {
                    ?>
                    <!--begin::Form-->
                    <form action="<?= site_url("b_instansi/saveInstansi") ?>" method="post"
                          class="m-form m-form--state m-form--fit m-form--label-align-right" id="formInstansi">
                        <div class="m-portlet__body">
                            <?php
                            /**
                             * Alert berikut menggunakan JSValidasi bila di aktifkan , jika tidak di trigger
                             * maka tidak akan keluar
                             */
                            ?>
                            <div class="m-form__content">
                                <div class="m-alert m-alert--icon alert alert-warning m--hide" role="alert"
                                     id="formInstansi_msg">
                                    <div class="m-alert__icon">
                                        <i class="la la-warning"></i>
                                    </div>
                                    <div class="m-alert__text">
                                        Oh maaf! Ubah sesuatu atau tekan tombol submit kembali.
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
                                    Nama Instansi *
                                </label>
                                <div class="col-md-3 col-md-7">
                                    <input type="text"
                                           class="form-control m-input" name="namaInstansi"
                                           placeholder="Masukkan nama instansi...">
                                    <span class="m-form__help">
                                        Tolong masukkan dengan format text.
                                    </span>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-form-label col-md-3">
                                    Nama Kepala Instansi *
                                </label>
                                <div class="col-md-3 col-md-7">
                                    <input type="text"
                                           class="form-control m-input" name="kepalaInstansi"
                                           placeholder="Masukkan nama kepala instansi...">
                                    <span class="m-form__help">
                                        Tolong masukkan dengan format text.
                                    </span>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-form-label col-md-3">
                                    Jabatan Kepala Instansi *
                                </label>
                                <div class="col-md-3 col-md-7">
                                    <input type="text"
                                           class="form-control m-input" name="jbt_kplInstansi"
                                           placeholder="Masukkan jabatan kepala instansi...">
                                    <span class="m-form__help">
                                        Tolong masukkan dengan format text.
                                    </span>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-form-label col-lg-3 col-sm-12">
                                    Kota *
                                </label>
                                <div class="col-lg-4 col-md-9 col-sm-12">
                                    <select class="form-control m-select2" id="select_idKota" name="idKota">
                                        <option></option>
                                        <?php
                                        foreach ($get_kota as $KEY_ARRAY => $data) {
                                            ?>
                                            <option <?php
                                            if (!empty($get_instansi)) {
                                                if ($get_instansi->idKota === $data->idKota) {
                                                    echo 'selected';
                                                } else {
                                                    null;
                                                }
                                            } else {
                                                null;
                                            }
                                            ?> value="<?= $data->idKota ?>">
                                                <?= $data->namaKota; ?>
                                            </option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                    <span class="m-form__help">
                                        Tolong pilih kota.
                                    </span>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-form-label col-md-3">
                                    Alamat *
                                </label>
                                <div class="col-md-3 col-md-7">
                                <textarea class="form-control m-input" name="alamatInstansi"
                                          placeholder="Masukkan alamat instansi..."
                                          rows="3"></textarea>
                                    <span class="m-form__help">
                                        Masukkan alamat dengan format text.
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
                                        <a href="<?= site_url("b_instansi/index"); ?>" class="btn m-btn--pill btn-danger">
                                            Kembali
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!--end::Form-->
                    <?php
                } else if (!empty($get_instansi)) {
                    if ($get_instansi == '401') {
                        ?>
                        <div class="m-portlet__body">
                            <div class="text-center">
                                <h2><i style="font-size: 25px" class="fa fa-2x fa-lock"></i> Kunci API tidak diberikan
                                    izin..</h2>
                            </div>
                        </div>
                        <?php
                    } else if ($get_instansi !== '401') {
                        ?>
                        <!--begin::Form-->
                        <form action="<?= site_url("b_instansi/saveInstansi") ?>" method="post"
                              class="m-form m-form--state m-form--fit m-form--label-align-right" id="formInstansi">
                            <div class="m-portlet__body">
                                <?php
                                /**
                                 * Alert berikut menggunakan JSValidasi bila di aktifkan , jika tidak di trigger
                                 * maka tidak akan keluar
                                 */
                                ?>
                                <div class="m-form__content">
                                    <div class="m-alert m-alert--icon alert alert-warning m--hide" role="alert"
                                         id="formInstansi_msg">
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
                                if (isset($get_instansi)) {
                                    ?>
                                    <input type="hidden" name="idInstansi"
                                           value="<?= !empty($get_instansi) ? $get_instansi->idInstansi : null; ?>">
                                    <input type="hidden" name="createdBy"
                                           value="<?= !empty($get_instansi) ? $get_instansi->createdBy : null; ?>">
                                    <input type="hidden" name="createdDate"
                                           value="<?= !empty($get_instansi) ? $get_instansi->createdDate : null; ?>">
                                    <?php
                                }
                                ?>
                                <div class="form-group m-form__group row">
                                    <label class="col-form-label col-md-3">
                                        Nama Instansi *
                                    </label>
                                    <div class="col-md-3 col-md-7">
                                        <input type="text"
                                               value="<?= !empty($get_instansi) ? $get_instansi->namaInstansi : null; ?>"
                                               class="form-control m-input" name="namaInstansi"
                                               placeholder="Enter agency name...">
                                        <span class="m-form__help">
                                            Please fill with format text.
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-form-label col-md-3">
                                        Nama Kepala Instansi *
                                    </label>
                                    <div class="col-md-3 col-md-7">
                                        <input type="text"
                                               value="<?= !empty($get_instansi) ? $get_instansi->kepalaInstansi : null; ?>"
                                               class="form-control m-input" name="kepalaInstansi"
                                               placeholder="Masukkan nama kepala instansi...">
                                        <span class="m-form__help">
                                        Tolong masukkan dengan format text.
                                    </span>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-form-label col-md-3">
                                        Jabatan Kepala Instansi *
                                    </label>
                                    <div class="col-md-3 col-md-7">
                                        <input type="text"
                                               value="<?= !empty($get_instansi) ? $get_instansi->jbt_kplInstansi : null; ?>"
                                               class="form-control m-input" name="jbt_kplInstansi"
                                               placeholder="Masukkan jabatan kepala instansi...">
                                        <span class="m-form__help">
                                        Tolong masukkan dengan format text.
                                    </span>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-form-label col-lg-3 col-sm-12">
                                        Kota *
                                    </label>
                                    <div class="col-lg-4 col-md-9 col-sm-12">
                                        <select class="form-control m-select2" id="select_idKota" name="idKota">
                                            <option></option>
                                            <?php
                                            foreach ($get_kota as $KEY_ARRAY => $data) {
                                                ?>
                                                <option <?php
                                                if (!empty($get_instansi)) {
                                                    if ($get_instansi->idKota === $data->idKota) {
                                                        echo 'selected';
                                                    } else {
                                                        null;
                                                    }
                                                } else {
                                                    null;
                                                }
                                                ?> value="<?= $data->idKota ?>">
                                                    <?= $data->namaKota; ?>
                                                </option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                        <span class="m-form__help">
                                            Please choose city.
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-form-label col-md-3">
                                        Alamat *
                                    </label>
                                    <div class="col-md-3 col-md-7">
                                        <textarea class="form-control m-input" name="alamatInstansi"
                                                  placeholder="Enter agency address..."
                                                  rows="3"><?= !empty($get_instansi) ? $get_instansi->alamatInstansi : null; ?></textarea>
                                        <span class="m-form__help">
                                            Please fill with format text.
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
                                            <a href="<?= site_url("b_instansi/index"); ?>" class="btn m-btn--pill btn-danger">
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
$this->load->view("backend/instansi/JSValidasi");
$this->load->view("backend/instansi/JSNotify");
$this->load->view("backend/instansi/JSSelect2");

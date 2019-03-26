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
                        Grup User
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
                                Form Grup User
                            </h3>
                        </div>
                    </div>
                </div>
                <?php
                if (empty($get_grup)) {
                    ?>
                    <!--begin::Form-->
                    <form action="<?= site_url("B_Grup/saveGrup") ?>" method="post"
                          class="m-form m-form--state m-form--fit m-form--label-align-right" id="formGrup">
                        <div class="m-portlet__body">
                            <?php
                            /**
                             * Alert berikut menggunakan JSValidasi bila di aktifkan , jika tidak di trigger
                             * maka tidak akan keluar
                             */
                            ?>
                            <div class="m-form__content">
                                <div class="m-alert m-alert--icon alert alert-warning m--hide" role="alert"
                                     id="formGrup_msg">
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
                                <label class="col-form-label col-lg-3 col-sm-12">
                                    Akses *
                                </label>
                                <div class="col-lg-5 col-md-9 col-sm-12">
                                    <select class="form-control" id="select_idAkses" name="idAkses">
                                        <option></option>
                                        <?php
                                        foreach ($get_akses as $KEY_ARRAY => $data) {
                                            ?>
                                            <option <?php
                                            if (!empty($get_grup)) {
                                                if ($get_grup->idAkses === $data->idAkses) {
                                                    echo 'selected';
                                                } else {
                                                    null;
                                                }
                                            } else {
                                                null;
                                            }
                                            ?> value="<?= $data->idAkses ?>">
                                                <?= $data->namaAkses; ?>
                                            </option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                    <span class="m-form__help">
                                        Tolong pilih satu akses.
                                    </span>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-form-label col-lg-3 col-sm-12">
                                    Site *
                                </label>
                                <div class="col-lg-7 col-md-9 col-sm-12">
                                    <select class="form-control" id="select_idPerusahaan" name="idPerusahaan">
                                        <option></option>
                                        <?php
                                        foreach ($get_perusahaan as $KEY_ARRAY => $data) {
                                            ?>
                                            <option <?php
                                            if (!empty($get_grup)) {
                                                if ($get_grup->idPerusahaan === $data->idPerusahaan) {
                                                    echo 'selected';
                                                } else {
                                                    null;
                                                }
                                            } else {
                                                null;
                                            }
                                            ?> value="<?= $data->idPerusahaan ?>">
                                                <?= $data->namaPerusahaan . " di " . $data->lokasiPerusahaan; ?>
                                            </option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                    <span class="m-form__help">
                                        Tolong pilih site.
                                    </span>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label class="col-form-label col-md-3">
                                    Group User *
                                </label>
                                <div class="col-md-3 col-md-7">
                                    <input type="text" autofocus
                                           value="<?= !empty($get_grup) ? $get_grup->namaGrup : null; ?>"
                                           class="form-control m-input" name="namaGrup"
                                           placeholder="Masukkan nama grup user...">
                                    <span class="m-form__help">
                                        Tolong masukkan nama grup user.
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="m-portlet__head">
                            <div class="m-portlet__head-caption">
                                <div class="m-portlet__head-title">
                                    <h3 class="m-portlet__head-text">
                                        Akses Site
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="m-porlet__body">
                                <div class="form-group m-form__group row">
                                    <label class="col-form-label col-lg-2 col-sm-12">
                                        Site *
                                    </label>
                                    <div class="col-lg-9 col-md-9 col-sm-12">
                                        <select class="form-control" id="select_aksesPerusahaan" name="aksesPerusahaan[]" multiple>
                                            <option></option>
                                            <?php
                                            foreach ($get_perusahaan as $KEY_ARRAY => $data) {
                                                ?>
                                                <option value="<?= $data->idPerusahaan ?>">
                                                    <?= $data->namaPerusahaan . " di " . $data->lokasiPerusahaan; ?>
                                                </option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                        <span class="m-form__help">
                                            Tolong pilih site.
                                        </span>
                                    </div>
                                </div>
                        </div>

                        <div class="m-portlet__head">
                            <div class="m-portlet__head-caption">
                                <div class="m-portlet__head-title">
                                    <h3 class="m-portlet__head-text">
                                        Akses Menu Backend
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="m-porlet__body">
                            <div class="row">
                                <?php foreach ($get_menu_lv1 as $row1){
                                    echo "<div class='col-lg-4'>";
                                    echo "<div class='form-group m-form__group row'>";
                                    echo "<label class='col-9 col-form-label'>";
                                    echo $row1->menuLabel;
                                    echo "</label>";
                                    echo "<div class='col-3'>";
                                    echo "<div class='m-checkbox-inline'>";
                                    echo "<span class='m-switch m-switch--icon m-switch--accent'>";
                                    echo "<label>";
                                    echo "<input type='checkbox' value='".$row1->idMenu."' name='menuback[]'>";
                                    echo "<span></span>";
                                    echo "</label>";
                                    echo "</span>";
                                    echo "</div>";
                                    echo "</div>";
                                    echo "</div>";

                                    foreach ($get_menu_lv2 as $row2) {
                                        if($row2->menuHeader === $row1->idMenu){
                                            echo "<div class='form-group m-form__group row'>";
                                            echo "<label class='col-9 col-form-label'>";
                                            echo $row2->menuLabel;
                                            echo "</label>";
                                            echo "<div class='col-3'>";
                                            echo "<div class='m-checkbox-inline'>";
                                            echo "<span class='m-switch m-switch--icon m-switch--accent'>";
                                            echo "<label>";
                                            echo "<input type='checkbox' value='".$row2->idMenu."' name='menuback[]'>";
                                            echo "<span></span>";
                                            echo "</label>";
                                            echo "</span>";
                                            echo "</div>";
                                            echo "</div>";
                                            echo "</div>";
                                        }
                                    }

                                    echo "</div>";
                                } ?>
                            </div>
                        </div>

                        <div class="m-portlet__head">
                            <div class="m-portlet__head-caption">
                                <div class="m-portlet__head-title">
                                    <h3 class="m-portlet__head-text">
                                        Akses Menu Frontend
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="m-porlet__body">
                            <div class="row">
                                <?php foreach ($get_menuuser_lv1 as $row1){
                                    echo "<div class='col-lg-4'>";
                                    echo "<div class='form-group m-form__group row'>";
                                    echo "<label class='col-9 col-form-label'>";
                                    echo $row1->menuLabel;
                                    echo "</label>";
                                    echo "<div class='col-3'>";
                                    echo "<div class='m-checkbox-inline'>";
                                    echo "<span class='m-switch m-switch--icon m-switch--accent'>";
                                    echo "<label>";
                                    echo "<input type='checkbox' value='".$row1->idMenu."' name='menufront[]'>";
                                    echo "<span></span>";
                                    echo "</label>";
                                    echo "</span>";
                                    echo "</div>";
                                    echo "</div>";
                                    echo "</div>";

                                    foreach ($get_menuuser_lv2 as $row2) {
                                        if($row2->menuHeader === $row1->idMenu){
                                            echo "<div class='form-group m-form__group row'>";
                                            echo "<label class='col-9 col-form-label'>";
                                            echo $row2->menuLabel;
                                            echo "</label>";
                                            echo "<div class='col-3'>";
                                            echo "<div class='m-checkbox-inline'>";
                                            echo "<span class='m-switch m-switch--icon m-switch--accent'>";
                                            echo "<label>";
                                            echo "<input type='checkbox' value='".$row2->idMenu."' name='menufront[]'>";
                                            echo "<span></span>";
                                            echo "</label>";
                                            echo "</span>";
                                            echo "</div>";
                                            echo "</div>";
                                            echo "</div>";
                                        }
                                    }

                                    echo "</div>";
                                } ?>
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
                                        <a href="<?= site_url("b_grup/index"); ?>" class="btn m-btn--pill btn-danger">
                                            Kembali
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!--end::Form-->
                    <?php
                } else if (!empty($get_grup)) {
                    if ($get_grup == '401') {
                        ?>
                        <div class="m-portlet__body">
                            <div class="text-center">
                                <h2><i style="font-size: 25px" class="fa fa-2x fa-lock"></i> Kunci API tidak diberikan
                                    izin..</h2>
                            </div>
                        </div>
                        <?php
                    } else if ($get_grup !== '401') {
                        ?>
                        <!--begin::Form-->
                        <form action="<?= site_url("B_Grup/saveGrup") ?>" method="post"
                              class="m-form m-form--state m-form--fit m-form--label-align-right" id="formGrup">
                            <div class="m-portlet__body">
                                <?php
                                /**
                                 * Alert berikut menggunakan JSValidasi bila di aktifkan , jika tidak di trigger
                                 * maka tidak akan keluar
                                 */
                                ?>
                                <div class="m-form__content">
                                    <div class="m-alert m-alert--icon alert alert-warning m--hide" role="alert"
                                         id="formGrup_msg">
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
                                if (isset($get_grup)) {
                                    ?>
                                    <input type="hidden" name="idGrup"
                                           value="<?= !empty($get_grup) ? $get_grup->idGrup : null; ?>">
                                    <input type="hidden" name="createdBy"
                                           value="<?= !empty($get_grup) ? $get_grup->createdBy : null; ?>">
                                    <input type="hidden" name="createdDate"
                                           value="<?= !empty($get_grup) ? $get_grup->createdDate : null; ?>">
                                    <?php
                                }
                                ?>
                                <div class="form-group m-form__group row">
                                    <label class="col-form-label col-lg-3 col-sm-12">
                                        Akses *
                                    </label>
                                    <div class="col-lg-5 col-md-9 col-sm-12">
                                        <select class="form-control" id="select_idAkses" name="idAkses">
                                            <option></option>
                                            <?php
                                            foreach ($get_akses as $KEY_ARRAY => $data) {
                                                ?>
                                                <option <?php
                                                if (!empty($get_grup)) {
                                                    if ($get_grup->idAkses === $data->idAkses) {
                                                        echo 'selected';
                                                    } else {
                                                        null;
                                                    }
                                                } else {
                                                    null;
                                                }
                                                ?> value="<?= $data->idAkses ?>">
                                                    <?= $data->namaAkses; ?>
                                                </option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                        <span class="m-form__help">
                                Please choose a akses.
                            </span>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-form-label col-lg-3 col-sm-12">
                                        Site *
                                    </label>
                                    <div class="col-lg-7 col-md-9 col-sm-12">
                                        <select class="form-control" id="select_idPerusahaan" name="idPerusahaan">
                                            <option></option>
                                            <?php
                                            foreach ($get_perusahaan as $KEY_ARRAY => $data) {
                                                ?>
                                                <option <?php
                                                if (!empty($get_grup)) {
                                                    if ($get_grup->idPerusahaan === $data->idPerusahaan) {
                                                        echo 'selected';
                                                    } else {
                                                        null;
                                                    }
                                                } else {
                                                    null;
                                                }
                                                ?> value="<?= $data->idPerusahaan ?>">
                                                    <?= $data->namaPerusahaan . " di " . $data->lokasiPerusahaan; ?>
                                                </option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                        <span class="m-form__help">
                                Please choose a site.
                            </span>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label class="col-form-label col-md-3">
                                        Group User *
                                    </label>
                                    <div class="col-md-3 col-md-7">
                                        <input type="text" autofocus
                                               value="<?= !empty($get_grup) ? $get_grup->namaGrup : null; ?>"
                                               class="form-control m-input" name="namaGrup"
                                               placeholder="Enter group user name...">
                                        <span class="m-form__help">
                                Please fill with format text.
                            </span>
                                    </div>
                                </div>

                            </div>

                            <div class="m-portlet__head">
                                <div class="m-portlet__head-caption">
                                    <div class="m-portlet__head-title">
                                        <h3 class="m-portlet__head-text">
                                            Akses Site
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="m-porlet__body">
                                <div class="form-group m-form__group row">
                                    <label class="col-form-label col-lg-2 col-sm-12">
                                        Site *
                                    </label>
                                    <div class="col-lg-9 col-md-9 col-sm-12">
                                        <select class="form-control" id="select_aksesPerusahaan" name="aksesPerusahaan[]" multiple>
                                            <option></option>
                                            <?php foreach ($get_perusahaanAkses as $site) {
                                                $select = $site->Atc == 1 ? 'selected' : null;
                                                echo "<option $select value='$site->idPerusahaan'>$site->namaPerusahaan ". di ." $site->lokasiPerusahaan</option>";
                                            } ?>
                                        </select>
                                        <span class="m-form__help">
                                            Tolong pilih site.
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="m-portlet__head">
                                <div class="m-portlet__head-caption">
                                    <div class="m-portlet__head-title">
                                        <h3 class="m-portlet__head-text">
                                            Akses Menu Backend
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="m-porlet__body">
                                <div class="row">
                                    <?php foreach ($get_menu_lv1 as $row1){
                                        $check1 = $row1->Atc == 1 ? 'checked' : null;

                                        echo "<div class='col-lg-4'>";
                                        echo "<div class='form-group m-form__group row'>";
                                        echo "<label class='col-9 col-form-label'>";
                                        echo $row1->menuLabel;
                                        echo "</label>";
                                        echo "<div class='col-3'>";
                                        echo "<div class='m-checkbox-inline'>";
                                        echo "<span class='m-switch m-switch--icon m-switch--accent'>";
                                        echo "<label>";
                                        echo "<input type='checkbox' value='".$row1->idMenu."' $check1 name='menuback[]'>";
                                        echo "<span></span>";
                                        echo "</label>";
                                        echo "</span>";
                                        echo "</div>";
                                        echo "</div>";
                                        echo "</div>";

                                        foreach ($get_menu_lv2 as $row2) {
                                            if($row2->menuHeader === $row1->idMenu){
                                                $check2 = $row2->Atc == 1 ? 'checked' : null;

                                                echo "<div class='form-group m-form__group row'>";
                                                echo "<label class='col-9 col-form-label'>";
                                                echo $row2->menuLabel;
                                                echo "</label>";
                                                echo "<div class='col-3'>";
                                                echo "<div class='m-checkbox-inline'>";
                                                echo "<span class='m-switch m-switch--icon m-switch--accent'>";
                                                echo "<label>";
                                                echo "<input type='checkbox' value='".$row2->idMenu."' $check2 name='menuback[]'>";
                                                echo "<span></span>";
                                                echo "</label>";
                                                echo "</span>";
                                                echo "</div>";
                                                echo "</div>";
                                                echo "</div>";
                                            }
                                        }

                                        echo "</div>";
                                    } ?>
                                </div>
                            </div>

                            <div class="m-portlet__head">
                                <div class="m-portlet__head-caption">
                                    <div class="m-portlet__head-title">
                                        <h3 class="m-portlet__head-text">
                                            Akses Menu Frontend
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="m-porlet__body">
                                <div class="row">
                                    <?php foreach ($get_menuuser_lv1 as $row1){
                                        $check1 = $row1->Atc == 1 ? 'checked' : null;

                                        echo "<div class='col-lg-4'>";
                                        echo "<div class='form-group m-form__group row'>";
                                        echo "<label class='col-9 col-form-label'>";
                                        echo $row1->menuLabel;
                                        echo "</label>";
                                        echo "<div class='col-3'>";
                                        echo "<div class='m-checkbox-inline'>";
                                        echo "<span class='m-switch m-switch--icon m-switch--accent'>";
                                        echo "<label>";
                                        echo "<input type='checkbox' value='".$row1->idMenu."' $check1 name='menufront[]'>";
                                        echo "<span></span>";
                                        echo "</label>";
                                        echo "</span>";
                                        echo "</div>";
                                        echo "</div>";
                                        echo "</div>";

                                        foreach ($get_menuuser_lv2 as $row2) {
                                            if($row2->menuHeader === $row1->idMenu){
                                                $check2 = $row2->Atc == 1 ? 'checked' : null;

                                                echo "<div class='form-group m-form__group row'>";
                                                echo "<label class='col-9 col-form-label'>";
                                                echo $row2->menuLabel;
                                                echo "</label>";
                                                echo "<div class='col-3'>";
                                                echo "<div class='m-checkbox-inline'>";
                                                echo "<span class='m-switch m-switch--icon m-switch--accent'>";
                                                echo "<label>";
                                                echo "<input type='checkbox' value='".$row2->idMenu."' $check2 name='menufront[]'>";
                                                echo "<span></span>";
                                                echo "</label>";
                                                echo "</span>";
                                                echo "</div>";
                                                echo "</div>";
                                                echo "</div>";
                                            }
                                        }

                                        echo "</div>";
                                    } ?>
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
                                            <a href="<?= site_url("b_grup/index"); ?>" class="btn m-btn--pill btn-danger">
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
$this->load->view("backend/grup/JSValidasi");
$this->load->view("backend/grup/JSNotify");
$this->load->view("backend/grup/JSSelect2");

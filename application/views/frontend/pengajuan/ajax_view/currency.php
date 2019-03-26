<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 07/02/2019
 * Time: 8:58
 */

if ($get_instansi == '404') {
    ?>
    <h5 class="text-center text-danger">
        <i class="fa fa-info-circle"></i> Pilih terdahulu instansi.
    </h5>
    <?php
} else if ($get_instansi !== '404') {
    $data['get_idCurrency'] = isset($get_instansi) ? $get_instansi->idCurrency : null;
    ?>
    <input type="hidden" name="idCurrency" id="AJAX_idCurrency" value="<?= isset($get_instansi) ? $get_instansi->idCurrency : null; ?>">
    <span class="input-group-addon"><?= isset($get_instansi) ? $get_instansi->idCurrency : null; ?></span>
    <input type="number" id="AJAX_biayaPengajuan"
           name="biayaPengajuan"
           class="form-control input-sm"
           placeholder="Mohon masukkan biaya dengan format angka"/>
    <?php
    $this->load->view('frontend/pengajuan/AJAX', $data);
}
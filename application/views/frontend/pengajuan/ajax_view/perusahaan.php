<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 26/12/2018
 * Time: 14:24
 */
?>
<option></option>
<?php
if ($get_perusahaan->status !== 'failed') {
    foreach ($get_perusahaan as $data) {
        ?>
        <option value="<?= $data->idPerusahaan; ?>"><?= $data->namaPerusahaan . " di " . $data->lokasiPerusahaan; ?></option>
        <?php
    }
}
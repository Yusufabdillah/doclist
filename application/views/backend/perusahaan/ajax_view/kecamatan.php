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
if ($get_kecamatan->status !== 'failed') {
    foreach ($get_kecamatan as $data) {
        ?>
        <option value="<?= $data->idKecamatan; ?>"><?= $data->namaKecamatan; ?></option>
        <?php
    }
}
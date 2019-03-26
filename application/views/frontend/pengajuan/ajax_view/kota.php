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
if ($get_kota->status !== 'failed') {
    foreach ($get_kota as $data) {
        ?>
        <option value="<?= $data->idKota; ?>"><?= $data->namaKota; ?></option>
        <?php
    }
}
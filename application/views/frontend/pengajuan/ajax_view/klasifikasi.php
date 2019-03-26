<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 26/12/2018
 * Time: 14:58
 */
?>
<option></option>
<?php
if ($get_klasifikasi->status !== 'failed') {
    foreach ($get_klasifikasi as $data) {
        ?>
        <option value="<?= $data->idKlasifikasi; ?>"><?= $data->namaKlasifikasi; ?></option>
        <?php
    }
}


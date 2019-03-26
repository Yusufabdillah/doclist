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
if ($get_kelurahan->status !== 'failed') {
    foreach ($get_kelurahan as $data) {
        ?>
        <option value="<?= $data->idKelurahan; ?>"><?= $data->namaKelurahan; ?></option>
        <?php
    }
}
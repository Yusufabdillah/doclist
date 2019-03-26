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
if ($get_provinsi->status !== 'failed') {
    foreach ($get_provinsi as $data) {
        ?>
        <option value="<?= $data->idProvinsi; ?>"><?= $data->namaProvinsi; ?></option>
        <?php
    }
}
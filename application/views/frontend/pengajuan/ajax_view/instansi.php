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
if ($get_instansi->status !== 'failed') {
    foreach ($get_instansi as $data) {
        ?>
        <option value="<?= $data->idInstansi; ?>"><?= $data->namaInstansi . " di " . $data->namaKota; ?></option>
        <?php
    }
}
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
if ($get_kategori->status !== 'failed') {
    foreach ($get_kategori as $data) {
        ?>
        <option value="<?= $data->idKategori; ?>"><?= $data->namaKategori; ?></option>
        <?php
    }
}
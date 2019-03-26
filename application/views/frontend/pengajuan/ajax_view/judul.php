<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 07/02/2019
 * Time: 8:58
 */
?>
<option></option>
<?php
if ($get_judul->status !== 'empty') {
    foreach ($get_judul as $data) {
        ?>
        <option value="<?= $data->idJudul; ?>"><?= $data->namaJudul; ?></option>
        <?php
    }
}
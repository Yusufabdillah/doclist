<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 26/12/2018
 * Time: 14:59
 */
?>
<option></option>
<?php
if ($get_subk->status !== 'failed') {
    foreach ($get_subk as $data) {
        ?>
        <option value="<?= $data->idSubk; ?>"><?= $data->namaSubk; ?></option>
        <?php
    }
}

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
if ($get_sub_subk->status !== 'failed') {
    foreach ($get_sub_subk as $data) {
        ?>
        <option value="<?= $data->idSub_subk; ?>"><?= $data->namaSub_subk; ?></option>
        <?php
    }
}

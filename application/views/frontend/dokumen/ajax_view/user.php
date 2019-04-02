<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 01/04/2019
 * Time: 13.33
 */

?>
	<option></option>
<?php
if ($get_user->status == 'success') {
	foreach ($get_user->data as $data) {
		?>
		<option value="<?= $data->idUser; ?>"><?= $data->namaUser; ?></option>
		<?php
	}
}

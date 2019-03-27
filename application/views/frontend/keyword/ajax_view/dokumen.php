<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 27/03/2019
 * Time: 13.59
 */
?>
<table id="tabel" width="100%" class="table table-striped table-bordered">
	<thead>
	<tr>
		<th style="text-align: center;font-size: 13px" width="20px">No</th>
		<th style="text-align: center;font-size: 13px" width="50px">Action</th>
		<th style="text-align: center;font-size: 13px" width="80px">Nama Dokumen</th>
	</tr>
	</thead>
	<tbody>
	<?php
	if (empty($get_dokumen)) {
		?>
		<tr>
			<td colspan="3" style="text-align: center"><i class="fa fa-info-circle"></i> Data Kosong...</td>
		</tr>
		<?php
	} else if (!empty($get_dokumen)) {
		foreach ($get_dokumen as $KEY => $data) {
			?>
			<tr>
				<td style="text-align: center"><?= $KEY + 1; ?></td>
				<td style="text-align: center">
					<div class="btn-group">
						<a href="<?= site_url('F_Keyword/detail/' . encode_str($data->idDokumen)); ?>"
						   data-toggle="tooltip" title="Detail Dokumen" class="btn btn-xs btn-info"><i
								class="fa fa-book"></i></a>
					</div>
				</td>
				<td><?= $data->judulDokumen; ?></td>
			</tr>
			<?php
		}
	}
	?>
	</tbody>
</table>

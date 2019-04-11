<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 13/12/2018
 * Time: 13:06
 */
?>
	<script type="text/javascript">
		$(document).ready(function() {
			App.datatables();
			var tabel = $('.table').DataTable( {
				"processing": true,
				"scrollY": true,
				"scrollX": true,
				'stateSave' : true,
				'lengthMenu' : [ 5, 10, 20, 30, 50 ],
				"ajax": "<?= site_url($this->router->fetch_class().'/AJAX/getDokumen-getDataPengajuanEdit'); ?>",
				"columnDefs": [
					{"targets" : 0, 'title' : "No", 'className' : 'text-center', "searchable": false, "orderable": false, 'data' : null},
					{
						"targets" : 1,
						'title' : "Action",
						'className' : 'text-center',
						"data" : null,
						'render' : function (data) {
							if (data.ktr_pengajuan_editDokumen == null) {
								return "<div class='btn-group'>" +
									" <button type='button' data-ap_id='"+data.idDokumen+"' data-ap_jdl='"+data.judulDokumen+"' data-ap_no='"+data.nomorDokumen+"'  data-target='#modalApprove' data-toggle='modal' title='Setujui Pengubahan Dokumen' class='modalApprove btn btn-md btn-success'><i class='fa fa-check-circle'></i></button>" +
									" <button type='button' data-de_id='"+data.idDokumen+"' data-de_jdl='"+data.judulDokumen+"' data-de_no='"+data.nomorDokumen+"'  data-target='#modalDecline' data-toggle='modal' title='Tolak Pengubahan Dokumen' class='modalDecline btn btn-md btn-danger'><i class='fa fa-times-circle'></i></button>" +
									" <button type='button' data-redirect_id='"+data.idDokumen+"' id='toDetail' data-toggle='tooltip' title='Detail Dokumen' class='btn btn-md btn-info'><i class='fa fa-book'></i></button>" +
									" </div>";
							} else if (data.ktr_pengajuan_editDokumen !== null) {
								return "<div class='btn-group'>" +
									" <button type='button' data-ap_id='"+data.idDokumen+"' data-ap_jdl='"+data.judulDokumen+"' data-ap_no='"+data.nomorDokumen+"'  data-target='#modalApprove' data-toggle='modal' title='Setujui Pengubahan Dokumen' class='modalApprove btn btn-md btn-success'><i class='fa fa-check-circle'></i></button>" +
									" <button type='button' data-de_id='"+data.idDokumen+"' data-de_jdl='"+data.judulDokumen+"' data-de_no='"+data.nomorDokumen+"'  data-target='#modalDecline' data-toggle='modal' title='Tolak Pengubahan Dokumen' class='modalDecline btn btn-md btn-danger'><i class='fa fa-times-circle'></i></button>" +
									" <button type='button' data-kt_jdl='"+data.judulDokumen+"' data-kt_ktr='"+data.ktr_pengajuan_editDokumen+"'  data-target='#modalKeterangan' data-toggle='modal' title='Keterangan Pengubahan Dokumen' class='modalKeterangan btn btn-md btn-warning'><i class='fa fa-info-circle'></i></button>" +
									" <button type='button' data-redirect_id='"+data.idDokumen+"' id='toDetail' data-toggle='tooltip' title='Detail Dokumen' class='btn btn-md btn-info'><i class='fa fa-book'></i></button>" +
									" </div>";
							}
						}
					},
					{
						"targets" : 2,
						'title' : "Departemen",
						"data" : 'namaDepartemen'
					},
					{
						"targets" : 3,
						'title' : "Case Number",
						"data" : 'casenumberDokumen'
					},
					{
						"targets" : 4,
						'title' : "Nomor Dokumen",
						"data" : 'nomorDokumen'
					},
					{
						"targets" : 5,
						'title' : "Instansi",
						"data" : 'namaInstansi'
					},
					{
						"targets" : 6,
						'title' : "Judul Dokumen",
						"data" : 'judulDokumen'
					},
					{
						"targets" : 7,
						'title' : "Deskripsi",
						"data" : 'deskripsiDokumen'
					},
					{
						"targets" : 8,
						'title' : "Dokumen Terbit",
						"data" : null,
						'render' : function (data) {
							if (data.tgl_terbitDokumen == null) {
								return "<i class='fa fa-info-circle'></i> Data belum ada...";
							} else if (data.tgl_terbitDokumen !== null) {
								return formatDate(data.tgl_terbitDokumen);
							}
						}
					},
					{
						"targets" : 9,
						'title' : "Dokumen Valid",
						"data" : null,
						'render' : function (data) {
							if (data.tgl_habisDokumen == null) {
								return "<i class='fa fa-info-circle'></i> Data belum ada...";
							} else if (data.tgl_habisDokumen !== null) {
								return formatDate(data.tgl_habisDokumen);
							}
						}
					},
					{
						"targets" : 10,
						'title' : "Dibuat Oleh",
						'className' : 'text-center',
						'data' : null,
						'render' : function (data) {
							if (data.createdBy == null) {
								return "<i class='fa fa-info-circle'></i> Data belum ada...";
							} else if (data.createdBy !== null) {
								return data.createdBy+"<br>"+formatDatetime(data.createdDate,'WIB');
							}
						}
					},
					{
						"targets" : 11,
						'title' : "Dirubah Oleh",
						'className' : 'text-center',
						'data' : null,
						'render' : function (data) {
							if (data.updatedBy == null) {
								return "<i class='fa fa-info-circle'></i> Data belum ada...";
							} else if (data.updatedBy !== null) {
								return data.updatedBy+"<br>"+formatDatetime(data.updatedDate,'WIB');
							}
						}
					}
				]
			} );

			$(document).on("click", "#toDetail", function () {
				var red_idDokumen = $(this).data('redirect_id');
				$.ajax({
					type: "POST",
					url: "<?= site_url($this->router->fetch_class().'/AJAX')?>",
					data: {
						'fungsi' : 'toDetail',
						'idDokumen': red_idDokumen
					},
					success: function(idDokumen){
						window.location.href = '<?= site_url('F_PengajuanEdit/detail/'); ?>'+idDokumen;
					}
				});
			});

			tabel.on( 'order.dt search.dt', function () {
				tabel.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
					cell.innerHTML = i+1;
				} );
			} ).draw();

			$('.dataTables_filter input').attr('placeholder', 'Pencarian...');
		} );
	</script>
<?php
$this->template->helperJS('formatDate');
$this->template->helperJS('formatDatetime');

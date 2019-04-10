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
			var tabel = $('.table').removeAttr('width').DataTable( {
				"processing": true,
				"scrollY": true,
				"scrollX": true,
				'stateSave' : true,
				'lengthMenu' : [ 5, 10, 20, 30, 50 ],
				"ajax": "<?= site_url($this->router->fetch_class().'/AJAX/getRefAudit-getDataByAudit/'.encode_str($get_audit->idAudit)); ?>",
				"columnDefs": [
					{"targets" : 0, 'title' : "No", 'className' : 'text-center', "searchable": false, "orderable": false, 'data' : null},
					{
						"targets" : 1,
						'title' : "Action",
						'className' : 'text-center',
						"data" : null,
						'render' : function (data) {
							if (data.idDepartemen == <?= $_SESSION['idDepartemen']; ?>) {
								return "<div class='btn-group'>" +
									"<a" +
									"data-h_id='"+data.idRef_audit+"' " +
									"data-h_audit='"+data.idAudit+"' " +
									"data-h_jdl='"+data.judulDokumen+"' " +
									"data-h_no='"+data.nomorDokumen+"' " +
									"href='#modalHapus' data-toggle='modal' " +
									"title='Hapus Dokumen Dari Daftar Audit' " +
									"class='modalHapus btn btn-sm btn-danger' " +
									"><i class='fa fa-times-circle'></i></a> " +
									"</div>" +
									"<a data-redirect_id='"+data.idDokumen+"' id='redirectTo' data-toggle='tooltip' title='Detail Dokumen' class='btn btn-sm btn-info'><i class='fa fa-book'></i></a> ";
							} else {
								if (<?= $_SESSION['idAkses']; ?> == 1) {
									return "<div class='btn-group'>" +
										"<a" +
										"data-h_id='"+data.idRef_audit+"' " +
										"data-h_audit='"+data.idAudit+"' " +
										"data-h_jdl='"+data.judulDokumen+"' " +
										"data-h_no='"+data.nomorDokumen+"' " +
										"href='#modalHapus' data-toggle='modal' " +
										"title='Hapus Dokumen Dari Daftar Audit' " +
										"class='modalHapus btn btn-sm btn-danger' " +
										"><i class='fa fa-times-circle'></i></a> " +
										"</div>" +
										"<a data-redirect_id='"+data.idDokumen+"' id='redirectTo' data-toggle='tooltip' title='Detail Dokumen' class='btn btn-sm btn-info'><i class='fa fa-book'></i></a> ";
								} else {
									return "<i class='fa fa-info-circle'></i> Bukan akses anda...";
								}
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
						'title' : "Judul Dokumen",
						"data" : 'judulDokumen'
					},
					{
						"targets" : 6,
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
						"targets" : 7,
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
						"targets" : 8,
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
					}
				]
			} );

			$(document).on("click", "#redirectTo", function () {
				var red_idDokumen = $(this).data('redirect_id');
				$.ajax({
					type: "POST",
					url: "<?= site_url($this->router->fetch_class().'/AJAX')?>",
					data: {
						'fungsi' : 'toDetail',
						'idDokumen': red_idDokumen
					},
					success: function(idDokumen){
						window.location.href = '<?= site_url('F_Audit/detail/'); ?>'+idDokumen;
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

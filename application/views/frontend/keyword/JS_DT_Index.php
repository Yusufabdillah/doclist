<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 01/11/2018
 * Time: 13:49
 */
?>
<script type="text/javascript">
	$(document).ready(function() {
		$('#AJAX_idKeyword').on("change", function () {
			var data = $('#AJAX_idKeyword').val();
			if (data == null) {
				$.ajax({
					type: "POST",
					url: "<?= site_url($this->router->fetch_class().'/AJAX')?>",
					data: {
						'fungsi' : 'toKeyword',
						'AR_idKeyword': 'NULL'
					},
					success: function(data){
						/**
						 * Datatable di refresh kosong apabila JSON kosong
						 */
						$('.table').DataTable().clear().draw();
					},
				});
			} if (data !== null) {
				$.ajax({
					type: "POST",
					url: "<?= site_url($this->router->fetch_class().'/AJAX')?>",
					data: {
						'fungsi' : 'toKeyword',
						'AR_idKeyword': data
					},
					success: function(data){
						jsDatatable(data);
					},
				});
			}
		});

		function jsDatatable(data) {
			App.datatables();
			/**
			 * Datatable ini harus di destroy dulu untuk merefresh processing pengambilan data nya
			 * supaya bisa di inisialisi kembali
			 * Sumber : https://datatables.net/manual/tech-notes/3
			 * 			https://datatables.net/reference/api/clear()
			 */
			var HasilData = JSON.parse(data);
			$('.table').DataTable( {
				'destroy': true,
				"processing": true,
				"scrollY": true,
				'autoWidth': true,
				'stateSave' : true,
				'data' : HasilData.data,
				'lengthMenu' : [ 5, 10, 20, 30, 50 ],
				"columnDefs": [
					{"targets" : 0, 'title' : "Index", 'className' : 'text-center', "searchable": false, "orderable": false, 'data' : 'idDokumen'},
					{
						"targets" : 1,
						'title' : "Action",
						'className' : 'text-center',
						"data" : null,
						'render' : function (data) {
							return "<div class='btn-group'>" +
								" <button type='button' data-redirect_id='"+data.idDokumen+"' id='toDetail' data-toggle='tooltip' title='Detail Dokumen' class='btn btn-md btn-info'><i class='fa fa-book'></i></button>" +
								" </div>";
						}
					},
					{
						"targets" : 2,
						'title' : "Judul Dokumen",
						"data" : 'judulDokumen'
					}
				]
			} );

			/**
			 * Untuk menonaktifkan error notice Datatables
			 * karena kalau data JSON kosong Default datatable akan mengeluarkan notice alert
			 * @type {string}
			 */
			$.fn.dataTable.ext.errMode = 'none';

			$('.dataTables_filter input').attr('placeholder', 'Pencarian...');
		}

		$(document).on("click", "#toDetail", function () {
			var red_idDokumen = $(this).data('redirect_id');
			$.ajax({
				type: "POST",
				url: "<?= site_url($this->router->fetch_class().'/AJAXRedirect')?>",
				data: {
					'fungsi' : 'toDetail',
					'idDokumen': red_idDokumen
				},
				success: function(idDokumen){
					window.location.href = '<?= site_url('F_Keyword/detail/'); ?>'+idDokumen;
				}
			});
		});

	});
</script>

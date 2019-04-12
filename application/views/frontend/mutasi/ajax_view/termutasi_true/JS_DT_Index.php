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
			"autoWidth": true,
			"processing": true,
			'stateSave' : true,
			'lengthMenu' : [ 5, 10, 20, 30, 50 ],
			"ajax": "<?= site_url($this->router->fetch_class().'/AJAXData/getTermutasiTrue'); ?>",
			"columnDefs": [
				{"targets" : 0, 'title' : "No", 'className' : 'text-center', "searchable": false, "orderable": false, 'data' : null},
				{
					"targets" : 1,
					'title' : "Aksi",
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
					"data" : 'judulDokumen',
				},
				{
					"targets" : 3,
					'title' : "Nomor Dokumen",
					"data" : 'nomorDokumen',
				},
				{
					"targets" : 4,
					'title' : "Diverifikasi Oleh",
					'className' : 'text-center',
					'data' : null,
					'render' : function (data) {
						if (data.verifikasiBy == null) {
							return "<i class='fa fa-info-circle'></i> Data belum ada...";
						} else if (data.verifikasiBy !== null) {
							return data.verifikasiBy+"<br>"+formatDatetime(data.createdDate,'WIB');
						}
					}
				}
			]
		} );

		$(document).on("click", "#toDetail", function () {
			var red_idDokumen = $(this).data('redirect_id');
			$.ajax({
				type: "POST",
				url: "<?= site_url($this->router->fetch_class().'/AJAXEncode')?>",
				data: {
					'fungsi' : 'toDetail',
					'idDokumen': red_idDokumen
				},
				success: function(idDokumen){
					window.location.href = '<?= site_url('F_Mutasi/detail/'); ?>'+idDokumen;
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
$this->template->helperJS('formatDatetime');

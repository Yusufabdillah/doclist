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
			"ajax": "<?= site_url($this->router->fetch_class().'/AJAX/getAudit-getAll'); ?>",
			"columnDefs": [
				{"targets" : 0, 'title' : "No", 'className' : 'text-center', "searchable": false, "orderable": false, 'data' : null},
				{
					"targets" : 1,
					'title' : "Aksi",
					'className' : 'text-center',
					"data" : null,
					'render' : function (data) {
						return "<button type='button' data-redirect_id='"+data.idAudit+"' id='redirectTo' data-toggle='tooltip' title='Edit' class='btn btn-md btn-success'><i class='fa fa-pencil'></i></button>"
					}
				},
				{
					"targets" : 2,
					'title' : "Nama Audit",
					"data" : 'namaAudit',
				},
				{
					"targets" : 3,
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
			var red_idAudit = $(this).data('redirect_id');
			$.ajax({
				type: "POST",
				url: "<?= site_url($this->router->fetch_class().'/AJAX')?>",
				data: {
					'fungsi' : 'toForm',
					'idAudit': red_idAudit
				},
				success: function(idAudit){
					window.location.href = '<?= site_url('F_Audit/form/'); ?>'+idAudit;
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

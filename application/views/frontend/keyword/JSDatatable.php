<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 13/12/2018
 * Time: 13:06
 */
?>
<script type="text/javascript">
    /* Initialize Bootstrap Datatables Integration */
    App.datatables();
    /* Initialize Datatables */
    $('#tabel').dataTable({
        pageLength: 10,
        "scrollX": true,
        lengthMenu: [ 5, 10, 20, 30, 50]
    });

	$('#tabel-audit').dataTable({
		pageLength: 10,
		"scrollX": true,
		lengthMenu: [ 5, 10, 20, 30, 50]
	});
    /* Add placeholder attribute to the search input */
    $('.dataTables_filter input').attr('placeholder', 'Pencarian...');
</script>
<?php

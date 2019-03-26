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
        columnDefs: [ { orderable: false, targets: [ 1, 5 ] } ],
        pageLength: 5,
        "scrollX": true,
        lengthMenu: [ 5, 10, 20, 30, 'All'],
    });
    /* Add placeholder attribute to the search input */
    $('.dataTables_filter input').attr('placeholder', 'Pencarian...');
</script>
<?php

<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 13/12/2018
 * Time: 17:00
 */
?>
<script type="text/javascript">
    $(document).on("click", ".modalDelete", function () {
        var d_idPerusahaan = $(this).data('d_id');
        var d_namaPerusahaan = $(this).data('d_nama');
        $(".modal-body #d_idPerusahaan").val(d_idPerusahaan);
        $(".modal-body #d_namaPerusahaan").val(d_namaPerusahaan);
    });
</script>

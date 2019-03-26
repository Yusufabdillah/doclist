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
        var d_idKecamatan = $(this).data('d_id');
        var d_namaKecamatan = $(this).data('d_nama');
        $(".modal-body #d_idKecamatan").val(d_idKecamatan);
        $(".modal-body #d_namaKecamatan").val(d_namaKecamatan);
    });
</script>

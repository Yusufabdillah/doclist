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
        var d_idKategori = $(this).data('d_id');
        var d_namaKategori = $(this).data('d_nama');
        $(".modal-body #d_idKategori").val(d_idKategori);
        $(".modal-body #d_namaKategori").val(d_namaKategori);
    });
</script>

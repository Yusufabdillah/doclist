<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 14/12/2018
 * Time: 9:07
 */
?>
<script type="text/javascript">
    $('#select_idPerusahaan').select2({
        placeholder: "Select company...",
        allowClear: true
    });
    $('#select_idDivisi').select2({
        placeholder: "Select division...",
        allowClear: true
    });
    $('#select_idJabatan').select2({
        placeholder: "Select position...",
        allowClear: true
    });
    $('#select_idDepartemen').select2({
        placeholder: "Select departement...",
        allowClear: true
    });
    $('#select_idGrup').select2({
        placeholder: "Select group user...",
        allowClear: true
    });
    $("#phoneUser").inputmask("mask", {
        "mask": "****-****-****"
    });
</script>

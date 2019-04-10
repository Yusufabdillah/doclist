<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 31/01/2019
 * Time: 14:28
 */
?>
<script type="text/javascript">
    function formatDate(tanggal) {
        var DATA = tanggal.split(" ");
        var SPL_Tanggal = DATA[0].split("-");
        var tgl = SPL_Tanggal[2];
        var bln_angka = SPL_Tanggal[1];
        if (bln_angka == '01') {
            var bln = 'Januari';
        } if (bln_angka == '02') {
            var bln = 'Februari';
        } if (bln_angka == '03') {
            var bln = 'Maret';
        } if (bln_angka == '04') {
            var bln = 'April';
        } if (bln_angka == '05') {
            var bln = 'Mei';
        } if (bln_angka == '06') {
            var bln = 'Juni';
        } if (bln_angka == '07') {
            var bln = 'Juli';
        } if (bln_angka == '08') {
            var bln = 'Agustus';
        } if (bln_angka == '09') {
            var bln = 'September';
        } if (bln_angka == '10') {
            var bln = 'Oktober';
        } if (bln_angka == '11') {
            var bln = 'November';
        } if (bln_angka == '12') {
            var bln = 'Desember';
        }
        var thn = SPL_Tanggal[0];
        var Tanggal = tgl+" "+bln+" "+thn;
        return Tanggal;
    }
</script>

<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 31/01/2019
 * Time: 14:28
 */
?>
<script type="text/javascript">
	function dateDiff(key, tglSekarang, tglNanti) {
		if (key == 'Hari') {
			var t2 = tglSekarang.getTime();
			var t1 = tglNanti.getTime();
			return parseInt((t2-t1)/(24*3600*1000));
		} if (key == 'Minggu') {
			var t2 = tglSekarang.getTime();
			var t1 = tglNanti.getTime();
			return parseInt((t2-t1)/(24*3600*1000*7));
		} if (key == 'Bulan') {
			var d1Y = tglNanti.getFullYear();
			var d2Y = tglSekarang.getFullYear();
			var d1M = tglNanti.getMonth();
			var d2M = tglSekarang.getMonth();
			return (d2M+12*d2Y)-(d1M+12*d1Y);
		} if (key == 'Tahun') {
			return d2.getFullYear()-d1.getFullYear();
		}
	}
</script>

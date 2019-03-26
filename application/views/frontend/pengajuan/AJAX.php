<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 26/12/2018
 * Time: 13:49
 */
?>
<script type="text/javascript">
    $(document).ready(function() {
        /**
         * Untuk Data Wilayah Dokumen
         */
        $('#AJAX_idNegara').change(function () {
            var data = $("#AJAX_idNegara").val();
            $.ajax({
                type: "POST",
                url: "<?= site_url($this->router->fetch_class().'/AJAX')?>",
                data: {
                    'fungsi' : 'toProvinsi',
                    'idNegara': data
                },
                success: function(msg){
                    $('#AJAX_idProvinsi').html(msg);
                }
            });
        });

        $('#AJAX_idProvinsi').change(function () {
            var data = $("#AJAX_idProvinsi").val();
            $.ajax({
                type: "POST",
                url: "<?= site_url($this->router->fetch_class().'/AJAX')?>",
                data: {
                    'fungsi' : 'toKota',
                    'idProvinsi': data
                },
                success: function(msg){
                    $('#AJAX_idKota').html(msg);
                }
            });
        });

        $('#AJAX_idKota').change(function () {
            var data = $("#AJAX_idKota").val();
            $.ajax({
                type: "POST",
                url: "<?= site_url($this->router->fetch_class().'/AJAX')?>",
                data: {
                    'fungsi' : 'toKecamatan',
                    'idKota': data
                },
                success: function(msg){
                    $('#AJAX_idKecamatan').html(msg);
                }
            });
            $.ajax({
                type: "POST",
                url: "<?= site_url($this->router->fetch_class().'/AJAX')?>",
                data: {
                    'fungsi' : 'toInstansi',
                    'idKota': data
                },
                success: function(msg){
                    $('#AJAX_idInstansi').html(msg);
                }
            });
        });

        $('#AJAX_idKecamatan').change(function () {
            var data = $("#AJAX_idKecamatan").val();
            $.ajax({
                type: "POST",
                url: "<?= site_url($this->router->fetch_class().'/AJAX')?>",
                data: {
                    'fungsi' : 'toKelurahan',
                    'idKecamatan': data
                },
                success: function(msg){
                    $('#AJAX_idKelurahan').html(msg);
                }
            });
            $.ajax({
                type: "POST",
                url: "<?= site_url($this->router->fetch_class().'/AJAX')?>",
                data: {
                    'fungsi' : 'toPerusahaan',
                    'idKecamatan': data
                },
                success: function(msg){
                    $('#AJAX_idPerusahaan').html(msg);
                }
            });
        });


        /**
         * Untuk klasifikasi dokumen
         */
        $('#AJAX_idAspek').change(function () {
            var data = $("#AJAX_idAspek").val();
            $.ajax({
                type: "POST",
                url: "<?= site_url($this->router->fetch_class().'/AJAX')?>",
                data: {
                    'fungsi' : 'toKategori',
                    'idAspek': data
                },
                success: function(msg){
                    $('#AJAX_idKategori').html(msg);
                }
            });
        });

        $('#AJAX_idKategori').change(function () {
            var data = $("#AJAX_idKategori").val();
            $.ajax({
                type: "POST",
                url: "<?= site_url($this->router->fetch_class().'/AJAX')?>",
                data: {
                    'fungsi' : 'toSKategori',
                    'idKategori': data
                },
                success: function(msg){
                    $('#AJAX_idSubk').html(msg);
                }
            });
        });

        $('#AJAX_idSubk').change(function () {
            var data = $("#AJAX_idSubk").val();
            $.ajax({
                type: "POST",
                url: "<?= site_url($this->router->fetch_class().'/AJAX')?>",
                data: {
                    'fungsi' : 'toSSKategori',
                    'idSubk': data
                },
                success: function(msg){
                    $('#AJAX_idSub_subk').html(msg);
                }
            });

			$.ajax({
				type: "POST",
				url: "<?= site_url($this->router->fetch_class().'/AJAX')?>",
				data: {
                    'fungsi' : 'toKlasifikasi_Subk',
					'idSubk': data
				},
				success: function(msg){
					$('#AJAX_idKlasifikasi').html(msg);
				}
			});
        });

        $('#AJAX_idSub_subk').change(function () {
            var data = $("#AJAX_idSub_subk").val();
            $.ajax({
                type: "POST",
                url: "<?= site_url($this->router->fetch_class().'/AJAX')?>",
                data: {
                    'fungsi' : 'toKlasifikasi',
                    'idSub_subk': data
                },
                success: function(msg){
                    $('#AJAX_idKlasifikasi').html(msg);
                }
            });
        });

        $('#AJAX_idKlasifikasi').change(function () {
            var data = $("#AJAX_idKlasifikasi").val();
            $.ajax({
                type: "POST",
                url: "<?= site_url($this->router->fetch_class().'/AJAX')?>",
                data: {
                    'fungsi' : 'toJudul',
                    'idKlasifikasi': data
                },
                success: function(msg){
                    $('#AJAX_judulPengajuan').html(msg);
                }
            });
        });

        $('#AJAX_judulPengajuan').change(function () {
            var data = $("#AJAX_judulPengajuan").val();
            $.ajax({
                type: "POST",
                url: "<?= site_url($this->router->fetch_class().'/AJAX')?>",
                data: {
                    'fungsi' : 'toReferensi',
                    'idJudul': data
                },
                success: function(msg){
                    $('#AJAX_referensiPersyaratan').html(msg);
                }
            });
            $.ajax({
                type: "POST",
                url: "<?= site_url($this->router->fetch_class().'/AJAX')?>",
                data: {
                    'fungsi' : 'toRekomSyarat',
                    'idJudul': data
                },
                success: function(msg){
                    $('#AJAX_rekom_syaratJudul').html(msg);
                }
            });
        });

        /**
         * Untuk biaya pengajuan
         */

        /**
         * Untuk Currency
         */
        $('#AJAX_idInstansi').change(function () {
            var data = $("#AJAX_idInstansi").val();
            $.ajax({
                type: "POST",
                url: "<?= site_url($this->router->fetch_class().'/AJAX')?>",
                data: {
                    'fungsi' : 'toCurrency_INS',
                    'idInstansi': data
                },
                success: function(msg){
                    $('#AJAX_idCurrency').html(msg);
                }
            })
            $.ajax({
                type: "POST",
                url: "<?= site_url($this->router->fetch_class().'/AJAX')?>",
                data: {
                    'fungsi' : 'toKepalaInstansi',
                    'idInstansi': data
                },
                success: function(msg){
                    $('#AJAX_kpl_instansiPengajuan').html(msg);
                }
            })
        });

        <?php
        if (isset($get_idCurrency)) {
            ?>
            $('#AJAX_biayaPengajuan').on('input', function () {
                var data = $("#AJAX_biayaPengajuan").val();
                var idCurrency = '<?= $get_idCurrency; ?>';
                if (data == null) {
                    data = 0;
                }
                $.ajax({
                    type: "POST",
                    url: "<?= site_url($this->router->fetch_class().'/AJAX')?>",
                    data: {
                        'fungsi' : 'toKonversi',
                        'biayaPengajuan': data,
                        'idCurrency': idCurrency
                    },
                    success: function(msg){
                        $('#AJAX_Konversi').html(msg);
                    }
                });
            });
        <?php
        }
        ?>

    });
</script>
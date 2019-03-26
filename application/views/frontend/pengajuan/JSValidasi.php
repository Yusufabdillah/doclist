<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 26/12/2018
 * Time: 9:16
 */
?>
<script type="text/javascript">
   
$(document).ready(function(){
    $("#submit").click(function(){
        /**
         * Setelah submit ditekan .. modal ditutup
         */
        $('#modalSubmit').modal('hide');
        /**
         * Berikut adalah cek validasi , apabila benar tombol akan submit
         * apabila salah tombol akan false
         * submit button type "submit"
         */
        $('#formPengajuan').validate({
            errorClass: 'help-block animation-slideDown', // You can change the animation class for a different entrance animation - check animations page
            errorElement: 'div',
            errorPlacement: function(error, e) {
                e.parents('.form-group > div').append(error);
            },
            highlight: function(e) {
                $(e).closest('.form-group').removeClass('has-success has-error').addClass('has-error');
                $(e).closest('.help-block').remove();
            },
            success: function(e) {
                // You can use the following if you would like to highlight with green color the input after successful validation!
                e.closest('.form-group').removeClass('has-success has-error').addClass('has-success');
                //e.closest('.form-group').removeClass('has-success has-error');
                e.closest('.help-block').remove();
            },
            rules: {
                idJudul: {
                    required: true
                },
                idNegara: {
                    required: true
                },
                idProvinsi: {
                    required: true
                },
                idKota: {
                    required: true
                },
                idKecamatan: {
                    required: true
                },
                idKelurahan: {
                    required: true
                },
                nomorPengajuan: {
                    required: true
                },
                idPerusahaan: {
                    required: true
                },
                idTipe: {
                    required: true
                },
                idInstansi: {
                    required: true
                },
                kpl_instansiPengajuan: {
                    required: true
                },
                jbt_kpl_insPengajuan: {
                    required: true
                },
                idAspek: {
                    required: true
                },
                idKategori: {
                    required: true
                },
                idSubk: {
                    required: true
                },
                idSub_subk: {
                    required: true
                },
                idKlasifikasi: {
                    required: true
                },
                biayaPengajuan: {
                    required: true
                }
            },
            messages: {
                idJudul: {
                    required: 'Form ini wajib diisi'
                },
                idNegara: {
                    required: 'Form ini wajib diisi'
                },
                idProvinsi: {
                    required: 'Form ini wajib diisi'
                },
                idKota: {
                    required: 'Form ini wajib diisi'
                },
                idKecamatan: {
                    required: 'Form ini wajib diisi'
                },
                idKelurahan: {
                    required: 'Form ini wajib diisi'
                },
                nomorPengajuan: {
                    required: 'Form ini wajib diisi'
                },
                idPerusahaan: {
                    required: 'Form ini wajib diisi'
                },
                idTipe: {
                    required: 'Form ini wajib diisi'
                },
                idInstansi: {
                    required: 'Form ini wajib diisi'
                },
                kpl_instansiPengajuan: {
                    required: 'Form ini wajib diisi'
                },
                jbt_kpl_insPengajuan: {
                    required: 'Form ini wajib diisi'
                },
                idAspek: {
                    required: 'Form ini wajib diisi'
                },
                idKategori: {
                    required: 'Form ini wajib diisi'
                },
                idSubk: {
                    required: 'Form ini wajib diisi'
                },
                idSub_subk: {
                    required: 'Form ini wajib diisi'
                },
                idKlasifikasi: {
                    required: 'Form ini wajib diisi'
                },
                biayaPengajuan: {
                    required: 'Form ini wajib diisi'
                }
            }
        });
    });
});
</script>

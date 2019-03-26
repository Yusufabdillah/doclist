<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 13/12/2018
 * Time: 14:59
 */
?>
<script type="text/javascript">
    $( "#formKecamatan" ).validate({
        // Trigger bukan berasal dari ID Melainkan dari Name
        rules: {
            namaKecamatan: {
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
            }
        },

        //display error alert on form submit
        invalidHandler: function(event, validator) {
            var alert = $('#formKecamatan_msg');
            alert.removeClass('m--hide').show();
            mApp.scrollTo(alert, -200);
        },
    });
</script>

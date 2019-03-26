<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 13/12/2018
 * Time: 14:59
 */
?>
<script type="text/javascript">
    $( "#formUser" ).validate({
        // Trigger bukan berasal dari ID Melainkan dari Name
        rules: {
            idUser: {
                required: true
            },
            namaUser: {
                required: true
            },
            idDivisi: {
                required: true
            },
            idPerusahaan: {
                required: true
            },
            idDepartemen: {
                required: true
            },
            idJabatan: {
                required: true
            },
            idGrup: {
                required: true
            }
        },

        //display error alert on form submit
        invalidHandler: function(event, validator) {
            var alert = $('#formUser_msg');
            alert.removeClass('m--hide').show();
            mApp.scrollTo(alert, -200);
        },
    });
</script>

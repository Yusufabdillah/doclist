<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 26/12/2018
 * Time: 9:16
 */
?>
<script type="text/javascript">
	$(document).ready(function () {
		$("#submit").click(function () {
			/**
			 * Setelah submit ditekan .. modal ditutup
			 */
			$('#modalSubmit').modal('hide');

			/**
			 * Berikut adalah cek validasi , apabila benar tombol akan submit
			 * apabila salah tombol akan false
			 * submit button type "submit"
			 */
			$('#formDokumen').validate({
				errorClass: 'help-block animation-slideDown', // You can change the animation class for a different entrance animation - check animations page
				errorElement: 'div',
				errorPlacement: function (error, e) {
					e.parents('.form-group > div').append(error);
				},
				highlight: function (e) {
					$(e).closest('.form-group').removeClass('has-success has-error').addClass('has-error');
					$(e).closest('.help-block').remove();
				},
				success: function (e) {
					// You can use the following if you would like to highlight with green color the input after successful validation!
					e.closest('.form-group').removeClass('has-success has-error').addClass('has-success');
					//e.closest('.form-group').removeClass('has-success has-error');
					e.closest('.help-block').remove();
				},
				rules: {
					idInstansi: {
						required: true
					},
					judulDokumen: {
						required: true
					},
					nomorDokumen: {
						required: true
					}
					// fileDokumen: {
					//     required: true
					// }
				},
				messages: {
					idJudul: {
						required: 'Form ini wajib diisi'
					},
					idInstansi: {
						required: 'Form ini wajib diisi'
					},
					judulDokumen: {
						required: 'Form ini wajib diisi'
					},
					nomorDokumen: {
						required: 'Form ini wajib diisi'
					}
					//fileDokumen: {
					//    required: 'Form ini wajib diisi'
					//}
				}
			});
		});
	});
</script>

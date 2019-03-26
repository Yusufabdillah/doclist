<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 13/12/2018
 * Time: 8:46
 */
?>
<div class="modal fade" id="modalChangePass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="<?= site_url("b_user/changePassword"); ?>" method="post" id="formChangePass">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        <i class="fa fa-2x fa-key"></i> Change Password
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        &times;
                    </span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" required name="class" value="<?= $this->router->fetch_class(); ?>">
                    <input type="hidden" required name="method" value="<?= $this->router->fetch_method(); ?>">
                    <input type="hidden" required name="idUser" value="<?= $this->session->idUser; ?>">
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">
                            New Password *
                        </label>
                        <input type="password" placeholder="Enter new password..." class="form-control" name="passUser">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="form-control-label">
                            Re-type Password *
                        </label>
                        <input type="password" placeholder="Re-type new password..." class="form-control" name="retypePass">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn m-btn--pill btn-secondary" data-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn m-btn--pill btn-primary">
                        Submit
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript">
    $( "#formChangePass" ).validate({
        // Trigger bukan berasal dari ID Melainkan dari Name
        rules: {
            passUser: {
                required: true
            },
            retypePass: {
                required: true
            }
        }
    });
</script>

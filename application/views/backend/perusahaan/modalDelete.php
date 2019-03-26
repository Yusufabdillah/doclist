<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 13/12/2018
 * Time: 0:37
 */
?>
<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="<?= site_url("b_perusahaan/deletePerusahaan"); ?>" method="post">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        <i class="fa fa-2x fa-trash"></i> Delete Company
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        &times;
                    </span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="idPerusahaan" id="d_idPerusahaan" required>
                    <div class="form-group m-form__group">
                        <label>
                            Company Name
                        </label>
                        <input type="text" readonly name="namaPerusahaan" class="form-control m-input" id="d_namaPerusahaan">
                    </div>
                    <hr>
                    <h3>
                        Are you sure ?
                    </h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn m-btn--pill btn-secondary" data-dismiss="modal">
                        <i class="fa fa-times-circle-o"></i> No.
                    </button>
                    <button type="submit" class="btn m-btn--pill btn-danger">
                        <i class="fa fa-trash"></i> Yes, I'm sure.
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

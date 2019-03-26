<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 13/12/2018
 * Time: 0:37
 */
?>
<div class="modal fade" id="modalLogout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    <i class="fa fa-2x fa-power-off"></i> Logout
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        &times;
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    Are you sure ?
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn m-btn--pill btn-secondary" data-dismiss="modal">
                    <i class="fa fa-times-circle-o"></i> No.
                </button>
                <a href="<?= site_url("Auth/logout"); ?>" class="btn m-btn--pill btn-danger">
                    <i class="fa fa-power-off"></i> Yes, I'm sure.
                </a>
            </div>
        </div>
    </div>
</div>

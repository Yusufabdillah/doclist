<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 13/12/2018
 * Time: 11:58
 */
?>
<!-- END: Left Aside -->
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title">
                    Dashboard
                </h3>
            </div>
			<?php $this->load->view('tmp_backend/breadcrumb'); ?>
        </div>
    </div>
    <!-- END: Subheader -->
    <div class="m-content">
        <div class="m-portlet">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            Session Active
                        </h3>
                    </div>
                </div>
            </div>
            <div class="m-portlet__body">
                <pre>
                    <?= print_r($_SESSION); ?>
                </pre>
            </div>
        </div>
    </div>
</div>



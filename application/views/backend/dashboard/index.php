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
            <ul class="breadcrumb">
                <li>
                    <a href="<?= site_url("B_Dashboard/index"); ?>">
                        <i style="font-size: 20px" class="fa fa-2x fa-home"></i>
                    </a>
                </li>
                <li>&nbsp;>&nbsp;</li>
                <li>
                    <a href="<?= site_url($this->router->fetch_class()."/index") ?>">
                        <?php
                        $EXPL = explode('_',$this->router->fetch_class());
                        echo $EXPL[1];
                        ?>
                    </a>
                </li>
                <li>&nbsp;>&nbsp;</li>
                <li>
                    <?= $this->router->fetch_method(); ?>
                </li>
            </ul>
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
                <pre>
                    <?= print_r(site_url()) ?>
                </pre>
            </div>
        </div>
    </div>
</div>



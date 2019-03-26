<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 30/01/2019
 * Time: 14:22
 */
?>
<ul class="breadcrumb breadcrumb-top">
    <li>
        <a href="<?= site_url('F_Dashboard/index'); ?>">
            <i class="fa fa-home"></i>
        </a>
    </li>
    <li>
        <a href="<?= site_url($this->router->fetch_class()."/index"); ?>">
            <?php
            $EXPL = explode('_', $this->router->fetch_class());
            echo $EXPL[1];
            ?>
        </a>
    </li>
    <li>
        <?= $this->router->fetch_method(); ?>
    </li>
</ul>


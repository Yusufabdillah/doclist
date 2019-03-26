<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 12/12/2018
 * Time: 18:58
 */
?>
<ul class="nav navbar-nav-custom">
    <li>
        <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar');this.blur();">
            <i class="fa fa-bars fa-fw"></i>
        </a>
    </li>
</ul>
<ul class="nav navbar-nav-custom pull-right">
    <li class="dropdown">
        <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-comments"></i>
        </a>
        <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
            <li class="dropdown-header text-center">Notifikasi</li>
            <li>
                <div class="alert alert-success alert-alt">
                    <small>5 min ago</small><br>
                    <i class="fa fa-thumbs-up fa-fw"></i> Tes Notifikasi
                </div>
            </li>
        </ul>
    </li>
    <li class="dropdown">
        <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-user-circle-o"></i> | <?= $this->session->namaUser; ?> <i class="fa fa-caret-down"></i>
        </a>
        <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
            <li class="dropdown-header text-center"><?= $this->session->namaJabatan; ?></li>
            <li>
                <a href="<?= site_url('F_User/profileUser') ?>">
                    <i class="fa fa-user fa-fw pull-right"></i>
                    Profil Pengguna
                </a>
                <a href="<?= site_url('F_User/logUser') ?>">
                    <i class="fa fa-history fa-fw pull-right"></i>
                    Log Activity
                </a>
            </li>
            <li class="divider"></li>
			<li>
				<a data-toggle="modal" href="#modalChangePass"><i class="fa fa-key fa-fw pull-right"></i> Ubah Password</a>
			</li>
            <li>
                <a data-toggle="modal" href="#modalLogout"><i class="fa fa-power-off fa-fw pull-right"></i> Logout</a>
            </li>

        </ul>
    </li>
</ul>

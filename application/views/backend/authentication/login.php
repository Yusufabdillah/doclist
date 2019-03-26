<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 12/12/2018
 * Time: 19:12
 */

$this->load->view("backend/authentication/JS");
?>
<style>
    body {
        overflow: hidden;
    }
    .m-login.m-login--1 .m-login__wrapper {
        overflow: hidden;
        padding: 20% 2rem 2rem 2rem;
    }
</style>
<div class="m-grid m-grid--hor m-grid--root m-page">
    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-grid--tablet-and-mobile m-grid--hor-tablet-and-mobile m-login m-login--1 m-login--signin" id="m_login">
        <div class="m-grid__item m-grid__item--order-tablet-and-mobile-2 m-login__aside">
            <div class="m-stack m-stack--hor m-stack--desktop">
                <div class="m-stack__item m-stack__item--fluid">
                    <div class="m-login__wrapper">
                        <div class="m-login__logo">
                            <img height="80px" src="<?= base_url()."assets/img/system/logo.png"; ?>">
                        </div>
                        <div class="m-login__signin">
                            <form class="m-login__form m-form" action="<?= site_url('Auth/logIn') ?>" method="post">
                                <div class="form-group m-form__group">
                                    <input autofocus class="form-control m-input" type="text" placeholder="Username" name="username" autocomplete="off" required>
                                </div>
                                <div class="form-group m-form__group">
                                    <input class="form-control m-input m-login__form-input--last" type="password" placeholder="Password" name="password" required>
                                </div>
                                <div class="row m-login__form-sub">
                                    <div class="col m--align-left">
                                        <label class="m-checkbox m-checkbox--focus">
                                            <input type="checkbox" name="remember">
                                            Remember me
                                            <span></span>
                                        </label>
                                    </div>
                                    <div class="col m--align-right">
                                        <a href="javascript:;" id="m_login_forget_password" class="m-link">
                                            Forget Password ?
                                        </a>
                                    </div>
                                </div>
                                <div class="m-login__form-action">
                                    <button id="m_login_signin_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom btn-info m-btn--air">
                                        Log In
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="m-stack__item m-stack__item--center">
                            <div class="m-login__account">
								<span class="m-login__account-msg">
									<i class="la la-copyright"></i> IT Departemen, 2019
								</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="m-grid__item m-grid__item--fluid m-grid m-grid--center m-grid--hor m-grid__item--order-tablet-and-mobile-1	m-login__content"
             style="background-image: url(<?= base_url()."assets/img/system/login.jpg" ?>)">
            <div class="m-grid__item m-grid__item--middle">
                <h3 class="m-login__welcome">
                    Sistem Manajemen Dokumen Legal
                </h3>
                <p class="m-login__msg">
                    PT. Riau Sakti United Plantations
                </p>
            </div>
        </div>
    </div>
</div>




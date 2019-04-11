<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 12/12/2018
 * Time: 18:58
 */
?>
<!-- BEGIN: Left Aside -->
<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
    <i class="la la-close"></i>
</button>
<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
    <!-- BEGIN: Aside Menu -->
    <div
        id="m_ver_menu"
        class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark "
        data-menu-vertical="true"
        data-menu-scrollable="false" data-menu-dropdown-timeout="500">

        <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
                <a href="#modalFrontend" data-toggle="modal" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-background"></i>
                    <span class="m-menu__link-text">
						Frontend
					</span>
                </a>
            </li>
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
                <a href="<?= site_url("B_Dashboard/index"); ?>" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-line-graph"></i>
                    <span class="m-menu__link-text">
						Dashboard
					</span>
                </a>
            </li>
            <?php
			if ($_getMenu1 == 401) {
				?>
				<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
					<a href="#" class="m-menu__link m-menu__toggle">
						<i class="m-menu__link-icon flaticon-lock-1"></i>
						<span class="m-menu__link-text">
						Unauthorized
					</span>
					</a>
				</li>
				<?php
			} else {
				?>
				<li class="m-menu__section">
					<h4 class="m-menu__section-text">
						System Administration
					</h4>
					<i class="m-menu__section-icon flaticon-more-v3"></i>
				</li>
				<?php
				if (!isset($_getMenu1->status)) {
					foreach ($_getMenu1 as $row1){ ?>
						<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
							<a  href="#" class="m-menu__link m-menu__toggle">
								<?= $row1->menuIcon; ?>
								<span class="m-menu__link-text">
                            <?= $row1->menuLabel; ?>
                        </span>
								<i class="m-menu__ver-arrow la la-angle-right"></i>
							</a>
							<div class="m-menu__submenu ">
								<span class="m-menu__arrow"></span>
								<ul class="m-menu__subnav">
									<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
                                <span class="m-menu__link">
                                    <span class="m-menu__link-text">
                                        <?= $row1->menuLabel; ?>
                                    </span>
                                </span>
									</li>

									<?php
									if (!isset($_getMenu1->status)) {
										foreach ($_getMenu2 as $row2){
											if ($row2->menuHeader == $row1->idMenu){
												?>
												<li class="m-menu__item " aria-haspopup="true" >
													<a  href="<?= site_url($row2->menuLink); ?>" class="m-menu__link ">
														<i class="m-menu__link-bullet m-menu__link-bullet--dot">
															<span></span>
														</i>
														<span class="m-menu__link-text">
                                            <?= $row2->menuLabel; ?>
                                        </span>
													</a>
												</li>
												<?php
											}
										}
									}
									?>

								</ul>
							</div>
						</li>
						<?php
					}
				}
			}
			?>

        </ul>
    </div>
    <!-- END: Aside Menu -->
</div>

<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 12/12/2018
 * Time: 18:58
 */
?>
<a href="index.html" class="sidebar-brand">
	<img style="alignment: center" alt="permit" height="40px" src="<?= base_url() . "assets/img/system/logo.png"; ?>"/>
</a>
<ul class="sidebar-nav">
	<?php
	if ($_SESSION['idAkses'] == 1) {
		?>
		<li>
			<a data-toggle="modal" href="#modalBackend">
				<table width="100%">
					<tr>
						<td width="16%">
							<i class="fa fa-database sidebar-nav-icon"></i>
						</td>
						<td width="*" style="line-height: 16px">
                        <span class="sidebar-nav-mini-hide">
                            Backend
                        </span>
						</td>
					</tr>
				</table>
			</a>
		</li>
		<?php
	}
	?>
	<li class="<?= strtolower('F_Dashboard') == strtolower($this->router->fetch_class()) ? 'active' : null; ?>">
		<a href="<?= site_url('F_Dashboard/index'); ?>">
			<table width="100%">
				<tr>
					<td width="16%">
						<i class="fa fa-home sidebar-nav-icon"></i>
					</td>
					<td width="*" style="line-height: 16px">
                        <span class="sidebar-nav-mini-hide">
                            Dashboard
                        </span>
					</td>
				</tr>
			</table>
		</a>
	</li>
	<?php
	foreach ($_getMenu1 as $row1) {
		?>
		<li class='sidebar-header'>
			<span class='sidebar-header-title'><?= $row1->menuLabel ?></span>
		</li>
		<?php
		foreach ($_getMenu2 as $row2) {
			if ($row2->menuHeader == $row1->idMenu) {
				$EXP_Menu = explode('/', $row2->menuLink);
				?>
				<li class="<?= strtolower($EXP_Menu[0]) == strtolower($this->router->fetch_class()) ? 'active' : null; ?>">
					<a href="<?= site_url($row2->menuLink); ?>">
						<table width="100%">
							<tr>
								<td width="16%">
									<?= $row2->menuIcon; ?>
								</td>
								<td width="*" style="line-height: 16px">
									<span class="sidebar-nav-mini-hide"><?= $row2->menuLabel; ?></span>
								</td>
							</tr>
						</table>
					</a>
				</li>
				<?php
			}
		}
	} ?>

</ul>

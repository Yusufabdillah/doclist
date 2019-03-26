<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 12/12/2018
 * Time: 18:58
 */
?>
<a href="index.html" class="sidebar-brand">
    <img style="alignment: center" alt="permit" height="40px" src="<?= base_url()."assets/img/system/logo.png"; ?>"/>
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
    <li>
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

    <?php foreach ($_getMenu1 as $row1){
        echo "<li class='sidebar-header'>";
        echo "<span class='sidebar-header-title'>$row1->menuLabel</span>";
        echo "</li>";

        foreach ($_getMenu2 as $row2) {
            if ($row2->menuHeader == $row1->idMenu) {
                echo "<li>";
                echo "<a href='".site_url($row2->menuLink)."'>";
                echo "<table width='100%'>";
                echo "<tr>";
                echo "<td width='16%'>";
                //echo "<i class='$row2->menuIcon'></i>";
                echo $row2->menuIcon;
                echo "</td>";
                echo "<td width='*' style='line-height: 16px'>";
                echo "<span class='sidebar-nav-mini-hide'>";
                echo $row2->menuLabel;
                echo "</span>";
                echo "</td>";
                echo "</tr>";
                echo "</table>";
                echo "</a>";
                echo "</li>";
            }
        }
    } ?>

</ul>

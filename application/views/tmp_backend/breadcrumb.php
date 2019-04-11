<?php
/**
 * Created by PhpStorm.
 * User: Yusuf Abdillah Putra
 * Date: 11/04/2019
 * Time: 16.21
 */
?>
<ul class="breadcrumb">
	<li>
		<a href="<?= site_url("B_Dashboard/index"); ?>">
			<i style="font-size: 20px" class="fa fa-2x fa-home"></i>
		</a>
	</li>
	<li>&nbsp;>&nbsp;</li>
	<li>
		<a href="<?= site_url($this->router->fetch_class() . "/" . $this->router->fetch_method()) ?>">
			<?php
			$EXPL = explode('_', $this->router->fetch_class());
			echo $EXPL[1];
			?>
		</a>
	</li>
	<li>&nbsp;>&nbsp;</li>
	<li>
		<?= $this->router->fetch_method(); ?>
	</li>
</ul>

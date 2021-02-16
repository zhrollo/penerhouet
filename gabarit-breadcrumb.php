<!-- Breadcrumb -->
	<nav class="breadcrumb d-none d-sm-block arr-right">
		<a class="breadcrumb-item" href="<?= _ROOT._LANG ?>"><i class="fa fa-home"></i></a>
<?php
if ($parent!="") {
?>
		<span class="breadcrumb-item"><?= $parent?></span>
<?php
}
?>		
		<span class="breadcrumb-item active"><?= $titre?></span>
	</nav>		
<!-- /Breadcrumb -->
<?php
// head et début de body
require "gabarit-head.php";
require "gabarit-breadcrumb.php";
?>
<!-- début Contenu utile -->
<div class="container">
	<h2><?= $titre?></h2>
	<?= $bloc_content ?>
</div>
<!-- Fin Contenu utile -->
<?php
require "gabarit-footer.php";
?>

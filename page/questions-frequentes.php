<?php
ob_start();
?>
<div id="accordion">
<?php
$tab_faq = unserialize(_TXT_QSTF_DATA_FAQ);

$cpt=100;
$nbN1 = count($tab_faq);
for ($i=0;$i<$nbN1;$i++) {
	$elt = $tab_faq[$i];
	if (isset($elt["titreN1"]) && $elt["titreN1"]<>"") {
		echo "<h3>".$elt["titreN1"]."</h3>";
	}
	
	if (isset($elt["listeN1"])) {
		$liste = $elt["listeN1"];
		$nbN2 = count($liste);
		for($j=0;$j<$nbN2;$j++) {
			$qr = $liste[$j];
			$q = $qr["q"];
			$r = $qr["r"];
			$cpt++;
?>
  <div class="card">
    <div class="card-header" id="heading<?= $cpt ?>">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse<?= $cpt ?>" aria-expanded="true" aria-controls="collapse<?= $cpt ?>"><?= $q ?></button>
      </h5>
    </div>

    <div id="collapse<?= $cpt ?>" class="collapse" aria-labelledby="heading<?= $cpt ?>" data-parent="#accordion">
      <div class="card-body"><?= $r ?></div>
    </div>
  </div>
<?php				
		}
	}
}		
?>
</div>
<?php
$bloc_content=ob_get_contents();
ob_end_clean();
?>		
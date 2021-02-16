<?php
ob_start();
require ("lang/".$lg."/".$lg."-".$p0.".php");
$bloc_content=ob_get_contents();
ob_end_clean();
?>	
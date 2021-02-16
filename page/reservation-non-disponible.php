<?php
ob_start();
?>
<p><?= _TXT_RCMP_P ?></p>
<?php
$bloc_content=ob_get_contents();
ob_end_clean();
?>
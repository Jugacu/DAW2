<?php
    /*
     * Cosas de goyo
     */
    ob_start();
?>
<h2>Auth</h2>


<?php
/*
 * Cosas de goyo
 */
$contenido = ob_get_clean();
include(dirname(__FILE__) . "/../base.php");
?>

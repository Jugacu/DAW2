<?php ob_start() ;?>
<h2>NOTICIAS</h2>
<?php foreach($noticias as $key => $value) :?>
    <p>
        <h3><?=$value['titular'] ;?></h3><br>
        <?=$value['desarrollo'] ;?><br>
    </p>
<?php endforeach;?>
<?php $contenido=ob_get_clean() ; include 'base.php'; ?>
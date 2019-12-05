<?php ob_start() ; setlocale(LC_ALL, 'es');?>
<form method="post">
  <fieldset>
  <legend>Modificar noticia</legend>
  <input type="text" name="not[title]" value="<?=$notice->getTitle()?>" placeholder="Título"><br>
  <input type="text" name="not[descr]" value="<?=$notice->getDescr()?>" placeholder="Descripción"><br>
  <input type="submit" name="modNot" value="Modify">
</fieldset>
</form>
<?php $contenido=ob_get_clean() ; include 'base.php'; ?>
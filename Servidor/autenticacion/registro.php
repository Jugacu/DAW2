<?php
echo password_hash('Abc123??', PASSWORD_DEFAULT);
  if(isset($_POST['ok'])) {
    try {
      include 'usuario.php';
      $usuario = new Usuario($_POST);
      $query="SELECT usuario, pwd
              FROM usuario
              WHERE usuario = :usu";
      try {
        $con=new PDO("sqlsrv:server=(local);Database=Test");
        $snt=$con->prepare($query);
        $snt->bindValue(':usu', $_POST['usu']);
        $snt->execute();
        $row=$snt->fetch(PDO::FETCH_ASSOC);
        if(empty($row)){
          $error="Usuario o contraseña incorrectos";
        }elseif(!password_verify($_POST['pwd'],$row['pwd'])){
            $error="Usuario o contraseña incorrectos";
        }else{
          $error="Usuario autenticado";
        }
      } catch (PDOException $ex) {
        die(var_dump( $ex->getMessage()));
      }finally{
        $snt=null;
        $con=null;
      }
    } catch (UsuarioException $ex) {
      $error = $ex->getMessage();
    }
  }
 ?>
<!DOCTYPE html>
<html lang="es-ES" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registro de usuarios</title>
  </head>
  <body>
    <form method="POST" autocomplete="off">
      <fieldset>
        <legend>Registro</legend>
        <label>Usuario:
          <input type="text" name="usu" value="" placeholder="Mínimo 4 caracteres">
        </label>
        <?= isset ($error)?'<span style="color:red">Usuario es obligatorio y debe tener 4 caracteres mínimo</span>':''?>
        <br>
        <label>Contraseña:
          <input type="password" name="pwd" value=""
              placeholder="Mínimo una Mayúscula, una minúscula, un dígito y un carácter especial">
        </label>
        <?= isset ($error)?'<span style="color:red">Contraseña es obligatorio y debe tener 8 caracteres mínimo<br>
                            de los cuales uno debe ser minúscula, uno Mayúscula, uno dígito y otro carácter especial</span>':''?>
        <br>
        <input type="submit" name="ok" value="Enviar">
        <p><a href="nuevo.php">No estoy registrado</a></p>
        <?php if (isset($error)): ?>
          <p style="color:red"><?=$error?></p>
        <?php endif; ?>
      </fieldset>
    </form>
  </body>
</html>

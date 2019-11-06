<?php
$pass = password_hash('algo', PASSWORD_DEFAULT);
$query="INSERT INTO usuario (usuario, pwd)
          VALUES ('jose', :pass)";
$con=new PDO("sqlsrv:server=(local);Database=Test");
$snt=$con->prepare($query);
$snt->bindValue(':pass', $pass);
$snt->execute();
header('location: registro.php');

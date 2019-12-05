<?php
require_once 'App/Conexion.php';


$db = new DB();

try {
    $sql = 'select * from noticias';
    $con = $db->getConexion();

    $stm = $con->prepare($sql);
    $stm->execute();

    $data = $stm->fetchAll(PDO::FETCH_ASSOC);
    
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}

foreach($data as $row): ?>
        <p>
            <strong>id: </strong> <?=$row['id']?> <br>
            <strong>titulo: </strong> <?=$row['titulo']?> <br>
            <strong>descripcion: </strong> <?=$row['desc']?>
        </p>
<?php endforeach; ?>
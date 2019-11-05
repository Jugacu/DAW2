<?php
try {
    $db = new PDO("sqlsrv:Server=localhost;Database=testdb"/*, "root", "rootroot"*/);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $stmt = $db->prepare('select * from dbo.users');
    $stmt->execute();
    $data = $stmt->fetchAll();
} catch (PDOException $e) {
    echo "Failed to get DB handle: " . $e->getMessage() . "\n";
    die();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>OvO</title>
    <meta charset="UTF-8">
</head>
<body>
<p>
    <?php
    foreach ($data as $user) {
        echo "$user[usuario], $user[pass]<br>";
    }
    ?>
</p>
</body>
</html>

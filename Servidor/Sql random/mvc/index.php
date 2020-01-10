<?php
session_start();
require_once __DIR__ . '/routes/RouteManager.php';
require_once __DIR__ . '/database/DBManager.php';
require_once __DIR__ . '/views/ViewManager.php';
?>

<html lang="es">
<head>
    <title>MVC random</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>
<body>
<?php
try {
    RouteManager::exec(
        !isset($_GET['ctl']) ? '' : $_GET['ctl']
    );
} catch (Exception $e) {
    echo $e->getMessage();
}
?>

</body>
</html>

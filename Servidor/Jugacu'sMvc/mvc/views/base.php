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
<h1>
    MVC Random
</h1>
<div id="content">
    <?= (isset($content) ? $content : '') ?>
</div>
</body>
</html>

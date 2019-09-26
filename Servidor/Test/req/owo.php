<html>
    <head>
        <title>owo</title>
    </head>
    <body>
        <?php
            $nombre = $_POST['nombre'];
            $modulos = $_POST['modulos'];

            echo "<p>[NOMBRE] $nombre </p>";

            foreach ($modulos as $modulo)
            {
                echo "<p>[MODULO] $modulo</p>";
            }

            print_r($_POST);
            echo "<br>";
            print_r($_GET);
            echo "<br>";
            print_r($_REQUEST);
        ?>
    </body>
</html>
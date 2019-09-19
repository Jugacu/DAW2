<?php declare(strict_types = 1);?>
<html lang="es-ES">
<head>
    <title>owo</title>
    <meta charset="UTF-8">
</head>
<body>
    <?php
        // Ejercicio 4
        echo "<br>----------4<br>";
        $var1 = 1;
        $var2 = 2;
        $var3 = 3;
        echo "\$var1 es: $var1" . " <br>";
        echo "\$var2 es: $var2" . " <br>";
        echo "\$var3 es: $var3" . " <br>";

        function get_higher_value(int $a, int $b, int $c): int {
            return ($a > $b && $a > $c) ? $a: ($b > $a && $b > $c) ? $b : $c;
        }

        function get_lower_value (int $a, int $b, int $c): int {
            return ($a < $b && $a < $c) ? $a: ($b < $a && $b < $c) ? $b : $c;
        }

        echo "Más grande: ".  get_higher_value($var1, $var2, $var3) . '<br>';
        echo "Más pequeña: ".  get_lower_value($var1, $var2, $var3);


        // Ejercicio 5
        echo "<br>----------5<br>";
        $old_coins = [
            1, 5, 10, 25, 50, 100, 200, 500, 1000, 2000, 5000
        ];
        const VALOR_EURO = 166.386;

        function to_euro(int $coin, bool $round = false): float {
            $result = $coin / VALOR_EURO;
            return ($round) ? round($result, 2) : $result;
        }

        echo "<br>FOR<br>";

        for ($i = 0; $i < count($old_coins); $i++) {
            echo "[REAL] $old_coins[$i] -> " . to_euro($old_coins[$i]) . "€ <br>";
            echo "[2 DECIMALES] $old_coins[$i] -> " . to_euro($old_coins[$i], true) . "€ <br>";
        }

        echo "<br>WHILE<br>";

        $i = 0;
        while ($i < count($old_coins)) {
            echo "[REAL] $old_coins[$i] -> " . to_euro($old_coins[$i]) . "€ <br>";
            echo "[2 DECIMALES] $old_coins[$i] -> " . to_euro($old_coins[$i], true) . "€ <br>";
            $i++;
        }

        echo "<br>DO WHILE<br>";

        $i = 0;
        do {
            echo "[REAL] $old_coins[$i] -> " . to_euro($old_coins[$i]) . "€ <br>";
            echo "[2 DECIMALES] $old_coins[$i] -> " . to_euro($old_coins[$i], true) . "€ <br>";
            $i++;
        } while ($i < count($old_coins));
    ?>
</body>
</html>

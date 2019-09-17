<html lang="es-ES">
<head>
    <title>owo</title>
    <meta charset="UTF-8">
</head>
<body>
    <?php

        // Ejercicio 1
        echo "<br>----------1<br>";
        echo $_SERVER ['HTTP_USER_AGENT'];

        // Ejercicio 2
        echo "<br>----------2<br>";
        # phpinfo();

        // Ejercicio 3
        echo "<br>----------3<br>";
        $var1 = 5;
        $var2 = 10;

        echo "El valor de var1 es {$var1} <br>";
        echo "El valor de var2 es {$var2} <br>";
        echo "{$var1} + {$var2} son " . ($var1 + $var2) . " <br>";
        echo "{$var1} * {$var2} son " . ($var1 * $var2) . " <br>";
        echo "{$var1} / {$var2} son " . floor($var1 / $var2) . " <br>";
        echo "{$var1} / {$var2} son " . ($var1 / $var2) . " <br>";
        echo "{$var1} % {$var2} son " . ($var1 % $var2);

        // Ejercicio 4
        echo "<br>----------4<br>";
        $var1 = 1;
        $var2 = 2;
        $var3 = 3;
        echo "\$var1 es: $var1" . " <br>";
        echo "\$var2 es: $var2" . " <br>";
        echo "\$var3 es: $var3" . " <br>";
        echo ($var1 > $var2 && $var1 > $var3) ? "\$var1 es la más grande" . " <br>" : "";
        echo ($var2 > $var1 && $var2 > $var3) ? "\$var2 es la más grande" . " <br>" : "";
        echo ($var3 > $var2 && $var3 > $var1) ? "\$var3 es la más grande" . " <br>" : "";

        echo ($var1 < $var2 && $var1 < $var3) ? "\$var1 es la más pequeño" . " <br>" : "";
        echo ($var2 < $var1 && $var2 < $var3) ? "\$var2 es la más pequeño" . " <br>" : "";
        echo ($var3 < $var2 && $var3 < $var1) ? "\$var3 es la más pequeño" . " <br>" : "";

        // Ejercicio 5
        echo "<br>----------5<br>";
        $old_coins = [
            1, 5, 10, 25, 50, 100, 200, 500, 1000, 2000, 5000
        ];
        const VALOR_EURO = 166.386;

        echo "<br>FOR<br>";

        for ($i = 0; $i < sizeof($old_coins); $i++) {
            echo "[REAL] $old_coins[$i] -> " . $old_coins[$i] / VALOR_EURO . "€ <br>";
            echo "[2 DECIMALES] $old_coins[$i] -> " . round($old_coins[$i] / VALOR_EURO, 2) . "€ <br>";
        }

        echo "<br>WHILE<br>";

        $i = 0;
        while ($i < sizeof($old_coins)) {
            echo "[REAL] $old_coins[$i] -> " . $old_coins[$i] / VALOR_EURO . "€ <br>";
            echo "[2 DECIMALES] $old_coins[$i] -> " . round($old_coins[$i] / VALOR_EURO, 2) . "€ <br>";
            $i++;
        }

        echo "<br>DO WHILE<br>";

        $i = 0;
        do {
            echo "[REAL] $old_coins[$i] -> " . $old_coins[$i] / VALOR_EURO . "€ <br>";
            echo "[2 DECIMALES] $old_coins[$i] -> " . round($old_coins[$i] / VALOR_EURO, 2) . "€ <br>";
            $i++;
        } while ($i < sizeof($old_coins));

        // Ejercicio 6
        echo "<br>----------6<br>";
        const PI = 3.141597;

        $radius = 10;
        $height = 5;
        echo "Radio = $radius <br>";
        echo "Altura del segmento = $height <br>";
        echo "[AREA] " . PI * pow($radius, 2) . "<br>";
        echo "[LONGITUD] " . 2 * PI * $radius . "<br>";
        echo "[LONGITUD SEGMENTO 90º] " . $radius * 90 / 360 . "<br>";
        echo "[AREA SEGMENTO 90º] " . pow($radius, 2) / 2 * (90 / 360 - sin(90 / 360)) . "<br>";
        echo "[AREA SECTOR 90º] " . PI * $radius * 2 * 90 / 360 . "<br>";

        // Ejercicio 7
        echo "<br>----------7<br>";

        $size = 100;

        $prime = [];
        // Calculo de los primeros 100 primos
        $number = 2;
        while ($number < $size) {
            $divisors = 0;
            for ($i = 1; $i <= $number; $i++) {
                if (($number % $i) == 0) {
                    $divisors++;
                }
            }
            if ($divisors < 3) {
                array_push($prime, $number);
            }
            $number++;
        }

        //fibonacci
        $fib = [];
        $x = 0;
        $y = 1;

        for ($i = 0; $i <= $size; $i++) {
            $z = $x + $y;
            $x = $y;
            $y = $z;
            array_push($fib, $z);
        }

        for ($i = 1; $i <= $size; $i++) {
            echo "[$i] " . (($i % 2 === 0) ? "PAR" : "IMPAR");

            foreach ($prime as $value) {
                if ($value === $i) {
                    echo " | PRIMO";
                    break;
                }
            }

            foreach ($fib as $value) {
                if ($value === $i) {
                    echo " | FIB";
                    break;
                }
            }

            echo "<br>";
        }

        // Ejercicio 8
        echo "<br>----------8<br>";
        $var1 = 10;
        $var2 = 5;
        $var3 = 6.2;

        $array = [
            "var1" => $var1,
            "var2" => $var2,
            "var3" => $var3
        ];

        asort($array);
        print_r($array);

        // Ejercicio 9
        echo "<br>----------9<br>";
        $var1 = 5;
        $var2 = 5.0;
        $var3 = "5";
        $var4 = "5.0";
        echo "[\$var1 == \$var2] ". json_encode($var1 == $var2). "<br>";
        echo "[\$var1 === \$var3] ". json_encode($var1 === $var3). "<br>";
        echo "[\$var1 !== \$var4] ". json_encode($var1 !== $var4). "<br>";
        echo "[\$var1 > \$var4] ". json_encode($var1 > $var4). "<br>";
        echo "[\$var1 < \$var2] ". json_encode($var1 < $var2). "<br>";

        echo "[\$var2 == \$var1] ". json_encode($var2 == $var1). "<br>";
        echo "[\$var2 === \$var3] ". json_encode($var2 === $var3). "<br>";
        echo "[\$var2 !== \$var4] ". json_encode($var2 !== $var4). "<br>";
        echo "[\$var2 > \$var4] ". json_encode($var2 > $var4). "<br>";
        echo "[\$var2 < \$var2] ". json_encode($var2 < $var2). "<br>";

        echo "[\$var3 == \$var2] ". json_encode($var3 == $var2). "<br>";
        echo "[\$var3 === \$var1] ". json_encode($var3 === $var1). "<br>";
        echo "[\$var3 !== \$var4] ". json_encode($var3 !== $var4). "<br>";
        echo "[\$var3 > \$var4] ". json_encode($var3 > $var4). "<br>";
        echo "[\$var3 < \$var2] ". json_encode($var3 < $var2). "<br>";

        echo "[\$var4 == \$var2] ". json_encode($var4 == $var2). "<br>";
        echo "[\$var4 === \$var1] ". json_encode($var4 === $var1). "<br>";
        echo "[\$var4 !== \$var4] ". json_encode($var4 !== $var4). "<br>";
        echo "[\$var4 > \$var3] ". json_encode($var4 > $var3). "<br>";
        echo "[\$var4 < \$var2] ". json_encode($var4 < $var2). "<br>";

        // Ejercicio 10
        echo "<br>----------10<br>";
        echo "[\$var1 == \$var2 && \$var1 === \$var3] ". json_encode($var1 == $var2 && $var1 === $var3). "<br>";
        echo "[\$var1 !== \$var4 || \$var1 > \$var4] ". json_encode($var1 !== $var4 || $var1 > $var4). "<br>";
        echo "[\$var1 < \$var2 && \$var1 === \$var3] ". json_encode($var1 < $var2 && $var1 === $var3). "<br>";

        // Ejercicio 11
        echo "<br>----------11<br>";
        $var1 = 1000;
        for($i = 1; $i < $var1; $i ++) {
            if ($var1 % $i == 0) {
                echo "[$i]<br>";
            }
        }

        // Ejercicio 12
        echo "<br>----------12<br>";
        for ($i = 1; $i <= 10000; $i++){

            $uwu = 0;

            for($j = $i - 1; $j >= 1; $j--){
                if($i % $j == 0){
                    $uwu += $j;
                }
            }

            if ($uwu == $i){
                echo "[$i] <br>";
            }
        }
    ?>
</body>
</html>

<?php
// Ejercicio 1
echo "<b>Tu user-agent es</b>: " . $_SERVER ['HTTP_USER_AGENT'];

// Ejercicio 3
$var1 = 5;
$var2 = 10;
?>

<hr>

<?php
echo "El valor de var1 es {$var1} <br>";
echo "El valor de var2 es {$var2} <br>";
echo "{$var1} + {$var2} son " . ($var1 + $var2) . " <br>";
echo "{$var1} * {$var2} son " . ($var1 * $var2) . " <br>";
echo "{$var1} / {$var2} son " . floor($var1 / $var2) . " <br>";
echo "{$var1} / {$var2} son " . ($var1 / $var2) . " <br>";
echo "{$var1} % {$var2} son " . ($var1 % $var2) . " <br>";
?>
<?php
// Ejercicio 2
phpinfo(INFO_MODULES);

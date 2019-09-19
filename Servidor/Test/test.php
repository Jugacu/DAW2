<?php

    $var = 'Juan';

    function println($str): void
    {
        echo '<br>' . $str;
    }

    ?>
    <html lang="es-ES">
    <head>
        <title>xd</title>
        <meta charset="UTF-8">
    </head>
    <body>
    <h1>OwU</h1>
    <?php
    // owo owo owo owo owo owo owo
    # owo owo owo owo owo owo owo
    /*
     * owo owo owo owo owo owo owo owo owo
     * owo owo owo owo owo owo owo owo owo
     */
    ?>
    <?= 'Hola Ju$an' ?>
    <?php
    println("Hola {$var}jo");
    println('Hola Juan');
    println(27);
    println('$var= ' . $var);

    $foo = 'owo';
    $bar = &$foo;

    $bar = "<br>Mi nombre es $bar";
    echo $bar;
    echo $foo;
    ?>
    <h1>Tests</h1>
    <?php
    $test = null;
    println(var_dump($uwus));
    println(var_dump($test));
    echo $test ? 'true' : 'false';

    $foo = isset($awa);
    println(var_dump($foo));

    $foo = isset($foo);
    println(var_dump($foo));


    function duplicar($var)
    {
        $temp = $var * 2;
    }

    $var = 5;
    duplicar($var);

    println("El valor de la variable \$temp es $temp");

    function duplicar2($var)
    {
        global $temp;
        $temp = $var * 2;
    }

    $var = 5;
    duplicar2($var);

    println("El valor de la variable \$temp es $temp <br>");


    $array = array(
        "foo" => "bar",
        "bar" => "foo",
        100 => -100,
        -100 => 100,
    );

    var_dump($array);

    $array = [
        "foo",
        "bar",
        "hello",
        "world"
    ];

    print '<br>';

    var_dump($array);

    $array = [
        "foo",
        "bar",
        6 => "hello",
        "world"
    ];

    print '<br>';

    var_dump($array);


    $array = [
        "foo" => "bar",
        42 => 24,
        "multi" => array(
            "dimensional" => [
                "array" => "foo"
            ]
        )
    ];

    print '<br>';
    var_dump($array['foo']);
    print '<br>';
    var_dump($array[42]);
    print '<br>';
    var_dump($array['multi']['dimensional']['array']);

    function hacerCafe($var = ["capuchinno"], $fabricante = null)
    {
        $aparato = is_null($fabricante) ? 'las manos' : $fabricante;
        return "Hacer una taza de " . join(',', $var) . " con $aparato";
    }

    echo '<br>';

    echo hacerCafe(["uwu"], 'juan');


    function total_intervals($unit, DateInterval ...$intervals) {
        $time = 0;
        foreach ($intervals as $interval) {
            $time += $interval->$unit;
        }
        return $time;
    }

    $a = new DateInterval('P1D');
    $b = new DateInterval('P2D');

    echo '<br>';


    echo total_intervals('d', $a, $b). ' days';


    function &devolver_referencia() {
        $algunaref = 'owo';
        return $algunaref;
    }

    $algunaref = &devolver_referencia();

    echo '<br>';

    echo $algunaref;

    function sum ($a, $b): int {
        return $a + $b;
    }

    echo '<br>';

    var_dump(sum(1, 2));

    echo '<br>';

    var_dump(sum(4, 2));
?>
</body>
</html>
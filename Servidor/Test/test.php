<?php

    $var = 'Juan';

    function println($str): void
    {
        echo '<br>'.$str;
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
        <?='Hola Ju$an'?>
        <?php
            println("Hola {$var}jo");
            println('Hola Juan');
            println(27);
            println('$var= '.$var);

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


            function duplicar($var) {
                $temp = $var * 2;
            }

            $var = 5;
            duplicar($var);

            println("El valor de la variable \$temp es $temp");

        function duplicar2($var) {
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

        ?>
    </body>
</html>
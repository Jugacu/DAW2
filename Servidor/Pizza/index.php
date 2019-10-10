<?php
error_reporting(E_STRICT);

session_name('owo');
session_start();

function validatePost(): Array
{
    $errors = [];
    $required = ['name', 'address', 'tlf', 'mail'];
    foreach ($required as $value) {
        if (!isset($_POST[$value]) || empty($_POST[$value])) {
            array_push($errors, $value);
        }
    }

    if (isset($_POST['tlf']) && !empty($_POST['tlf'] && !is_numeric($_POST['tlf']))) {
        if (!in_array('tlf', $errors)) {
            array_push($errors, 'tlf');
        }
    }

    $pizzaErrors = ['pizza_name', 'type', 'dough', 'amount'];
    foreach ($pizzaErrors as $required) {
        foreach ($_POST['pizzas'] as $key => $pizza) {
            if (!isset($_POST['pizzas'][$key][$required]) || empty($_POST['pizzas'][$key][$required])) {
                if (!in_array($required, $errors)) {
                    array_push($errors, $required);
                }
            }
            if (isset($_POST['pizzas'][$key]['amount']) && !empty($_POST['pizzas'][$key]['amount']) && $_POST['pizzas'][$key]['amount'] < 1) {
                if (!in_array('amount', $errors)) {
                    array_push($errors, 'amount');
                }
            }
        }
    }

    return $errors;
}

function resetSession(): void
{
    unset($_SESSION['userData']);
    unset($_SESSION['pizzas']);
    $_SESSION['numberOfPizzas'] = 1;
}

const pizzaPrices = [
    'margarita' => [
        'normal' => 4,
        'big' => 5,
        'familiar' => 10
    ],
    'barbacoa' => [
        'normal' => 4,
        'big' => 7,
        'familiar' => 15
    ],
    '4quesos' => [
        'normal' => 3,
        'big' => 5,
        'familiar' => 10
    ],
    'carbonara' => [
        'normal' => 3,
        'big' => 6,
        'familiar' => 12
    ]
];

const extraPrices = [
    'cheese' => 2,
    'pepper' => 1,
    'onion' => 6,
    'ham' => 4,
    'boneless-chicken' => 99,
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = validatePost();

    $_SESSION['userData']['name'] = $_POST['name'];
    $_SESSION['userData']['address'] = $_POST['address'];
    $_SESSION['userData']['tlf'] = $_POST['tlf'];
    $_SESSION['userData']['mail'] = $_POST['mail'];

    $_SESSION['pizzas'] = $_POST['pizzas'];

    // Add button
    if (isset($_POST['add'])) {
        $_SESSION['numberOfPizzas'] = (isset($_SESSION['numberOfPizzas'])) ? $_SESSION['numberOfPizzas'] + 1 : 0;
    } else if (sizeof($errors) === 0) {
        //Submit
        $pizzaResult = $_POST['pizzas'];
        resetSession();
    }

}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    resetSession();
}
?>

<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>PizzaNet</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Roboto', sans-serif;
        }

        #content {
            margin: 0 auto;
            max-width: 800px;
            padding: 15px;
            box-shadow: 0px 0px 5px -1px rgba(0, 0, 0, 0.55);
        }

        h2 {
            font-weight: 400;
        }

        label {
            display: block;
        }

        input {
            padding: 5px;
            border: 1px solid #9a9a9a;
            margin-bottom: 20px;
        }

        select, input[type= number] {
            border: 1px solid #9a9a9a;
            padding: 5px;
        }

        .pizza {
            display: flex;
            margin-bottom: 15px;
            justify-content: center;
        }

        .pizza select, input[type= number] {
            margin: 0 15px;
        }

        .pizza label {
            font-weight: 500;
        }

        #error, #result {
            padding: 10px;
            background: #bb0000;
            color: white;
            margin-bottom: 15px;
        }

        #result {
            background: green;
        }

        input[type= number] {
            width: 50px;
            height: 50px;
        }
    </style>
</head>
<body>
<div id="content">
    <h1>PizzaNet</h1>
    <h2>Pide tu pizza customizada ya!</h2>
    <?php
    if (isset($errors) && sizeof($errors) > 0) {
        ?>
        <div id="error">
            Hay un error en los siguientes campos:
            <ul>
                <?php
                foreach ($errors as $error) {
                    ?>
                    <li><?= $error ?></li>
                    <?php
                }
                ?>
            </ul>
        </div>
        <?php
    }
    ?>
    <?php
    if (isset($pizzaResult)) {
        ?>
        <div id="result">
            Tu pedido ha sido completado
        </div>
        <div id="data">
            <p>
                Nombre: <?= $_POST['name'] ?> <br>
                Dirección: <?= $_POST['address'] ?> <br>
                Teléfono: <?= $_POST['tlf'] ?> <br>
                Correo: <?= $_POST['mail'] ?> <br>
            </p>
            <p>
                <?php
                $total = 0;
                foreach ($_POST['pizzas'] as $pizza) {
                    $finalPrice = pizzaPrices[$pizza['pizza_name']][$pizza['type']];
                    ?>
                    x<?=$pizza['amount']?> Pizza: <?= $pizza['pizza_name'] ?> <?= $pizza['type'] ?>
                    <?= isset($pizza['complements']) ? 'con' : '' ?>
                    <?php
                    foreach ($pizza['complements'] as $complement) {
                        $finalPrice += extraPrices[$complement];
                        ?>
                        <?= $complement ?> (<?=extraPrices[$complement]?>€),
                        <?php
                    }
                    $finalPrice *= $pizza['amount'];
                    ?>
                    masa <?=$pizza['dough']?>
                    -
                    <?=$finalPrice?>€
                    <br>
                    <?php
                    $total += $finalPrice;
                }
                ?>
            </p>
            <h3>TOTAL: <?=$total?>€</h3>
        </div>
        <?php
    } else {
        ?>
        <form method="post" action="/">
            <label for="name">Nombre*</label>
            <input required type="text" name="name" id="name" value="<?= $_SESSION['userData']['name'] ?>">

            <label for="address">Direccion*</label>
            <input required type="text" name="address" id="address" value="<?= $_SESSION['userData']['address'] ?>">

            <label for="tlf">Telefono*</label>
            <input required type="tel" name="tlf" id="tlf" value="<?= $_SESSION['userData']['tlf'] ?>">

            <label for="mail">Correo*</label>
            <input required type="email" name="mail" id="mail" value="<?= $_SESSION['userData']['mail'] ?>">

            <hr>

            <h3>
                Pizzas
            </h3>

            <div id="pizzas">

                <?php
                for ($i = 1; $i <= $_SESSION['numberOfPizzas']; $i++) {
                    ?>
                    <div class="pizza">
                        <label for="pizza-<?= $i ?>">Elige*</label>
                        <select required size="4" name="pizzas[<?= $i ?>][pizza_name]" id="pizza-<?= $i ?>">
                            <option
                                <?= ($_SESSION['pizzas'][$i]['pizza_name'] === 'margarita') ? 'selected' : '' ?>
                                    value="margarita">Margarita
                            </option>
                            <option
                                <?= ($_SESSION['pizzas'][$i]['pizza_name'] === 'barbacoa') ? 'selected' : '' ?>
                                    value="barbacoa">Barbacoa
                            </option>
                            <option
                                <?= ($_SESSION['pizzas'][$i]['pizza_name'] === '4quesos') ? 'selected' : '' ?>
                                    value="4quesos">4 Quesos
                            </option>
                            <option
                                <?= ($_SESSION['pizzas'][$i]['pizza_name'] === 'carbonara') ? 'selected' : '' ?>
                                    value="carbonara">Carbonara
                            </option>
                        </select>
                        <label for="pizza-<?= $i ?>-type">Tamaño*</label>
                        <select required size="3" name="pizzas[<?= $i ?>][type]" id="pizza-<?= $i ?>-type">
                            <option
                                <?= ($_SESSION['pizzas'][$i]['type'] === 'normal') ? 'selected' : '' ?>
                                    value="normal">Normal
                            </option>
                            <option
                                <?= ($_SESSION['pizzas'][$i]['type'] === 'big') ? 'selected' : '' ?>
                                    value="big">Grande
                            </option>
                            <option
                                <?= ($_SESSION['pizzas'][$i]['type'] === 'familiar') ? 'selected' : '' ?>
                                    value="familiar">Familiar
                            </option>
                        </select>
                        <label for="pizza-<?= $i ?>-dough">Masa*</label>
                        <select required size="3" name="pizzas[<?= $i ?>][dough]" id="pizza-<?= $i ?>-dough">
                            <option
                                <?= ($_SESSION['pizzas'][$i]['dough'] === 'fine') ? 'selected' : '' ?>
                                    value="fine">Fina
                            </option>
                            <option
                                <?= ($_SESSION['pizzas'][$i]['dough'] === 'normal') ? 'selected' : '' ?>
                                    value="normal">Normal
                            </option>
                        </select>
                        <label for="pizza-<?= $i ?>-complements">Compl.</label>
                        <select size="5" name="pizzas[<?= $i ?>][complements][]" id="pizza-<?= $i ?>-complements"
                                multiple>
                            <option
                                <?= (in_array('cheese', $_SESSION['pizzas'][$i]['complements'])) ? 'selected' : '' ?>
                                    value="cheese">+ Queso
                            </option>
                            <option
                                <?= (in_array('pepper', $_SESSION['pizzas'][$i]['complements'])) ? 'selected' : '' ?>
                                    value="pepper">Pimiento
                            </option>
                            <option
                                <?= (in_array('onion', $_SESSION['pizzas'][$i]['complements'])) ? 'selected' : '' ?>
                                    value="onion">Cebolla
                            </option>
                            <option
                                <?= (in_array('ham', $_SESSION['pizzas'][$i]['complements'])) ? 'selected' : '' ?>
                                    value="ham">Jamón
                            </option>
                            <option
                                <?= (in_array('boneless-chicken', $_SESSION['pizzas'][$i]['complements'])) ? 'selected' : '' ?>
                                    value="boneless-chicken">Pollo
                            </option>
                        </select>
                        <label for="pizza-<?= $i ?>-amount">Cantidad*</label>
                        <input type="number" id="pizza-<?= $i ?>-amount" name="pizzas[<?= $i ?>][amount]"
                               value="<?=
                               (isset($_SESSION['pizzas'][$i]['amount'])) ? $_SESSION['pizzas'][$i]['amount'] : 1 ?>">
                    </div>
                    <?php
                }
                ?>

                <input type="submit" name="add" value="Añadir otra pizza">

                <hr>
            </div>

            <input type="submit">
        </form>
    <?php } ?>
</div>
</body>
</html>

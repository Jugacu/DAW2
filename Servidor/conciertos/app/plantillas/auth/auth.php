<?php
/*
 * Cosas de goyo
 */
ob_start();
?>
<h2>Auth</h2>

<?php
if (!isset($_SESSION['rol'])) {
    ?>

    <form method="POST">
        <h2>Inicio de sesión</h2>
        <label>
            Usuario
            <input name="log[username]" type="text" placeholder="Usuario" required>
        </label>
        <label>
            Contraseña
            <input name="log[password]" type="password" placeholder="Contraseña" required>
        </label>
        <input type="submit" name="login" value="Inicio">
    </form>

    <form method="POST">
        <h2>Registro</h2>
        <label>
            Usuario
            <input name="reg[username]" type="text" placeholder="Usuario" required>
        </label>
        <label>
            Contraseña
            <input name="reg[password]" type="password" placeholder="Contraseña" required>
        </label>
        <input type="submit" name="register" value="Registro">
    </form>

    <?php
    if (isset($registered)) {
        ?>
        <p>Te has registrado!</p>
        <?php
    }
    ?>

    <div id="errors">
        <?php
        if (isset($errors)) {
            foreach ($errors as $error) {
                ?>
                <p><strong>Error: </strong> <?= $error ?></p>
                <?php
            }
        }
        ?>
    </div>

    <?php
} else {
    ?>
    <a href="/?ctl=auth&logout=true">cerrar sesion</a>
    <?php
}
?>

<?php
/*
 * Cosas de goyo
 */
$contenido = ob_get_clean();
include(dirname(__FILE__) . "/../base.php");
?>

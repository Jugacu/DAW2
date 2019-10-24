<?php
error_reporting(E_STRICT);

class CursoBasura
{
    public const HE = 'asd ';

    public static function trash(): string
    {
        return 'b a s u r a ';
    }

    public function XD(): string
    {
        return 'x d ';
    }

    public function imaginate(): string {
        return 'e x p l i c a r';
    }
}

?>
<pre>
    <?php
    echo CursoBasura::HE;
    echo CursoBasura::trash();

    $basura = new CursoBasura();
    echo $basura->XD();
    echo $basura->imaginate();
    ?>
</pre>

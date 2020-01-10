<?php

class ViewManager
{
    public static function view(string $view, array $data)
    {
        $file = $view . '.php';

        if (!file_exists(__DIR__ . '/' . $file)) {
            throw new Exception('View \'' . $view . '\' does not exist.');
        }

        ob_start();
        require_once $file;
        $content = ob_get_clean();
        require_once 'base.php';
    }
}

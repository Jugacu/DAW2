<?php
session_start();
require_once __DIR__ . '/../routes/Route.php';
require_once __DIR__ . '/../routes/Routes.php';
require_once __DIR__ . '/../database/DBManager.php';
require_once __DIR__ . '/../views/ViewManager.php';

try {
    Route::run();
} catch (Exception $e) {
    echo $e->getMessage();
}

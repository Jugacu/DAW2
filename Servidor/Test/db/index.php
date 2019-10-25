<?php

try {
    $db = new PDO("sqlsrv:Server=localhost;Database=testdb"/*, "root", "rootroot"*/);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Failed to get DB handle: " . $e->getMessage() . "\n";
    die();
}

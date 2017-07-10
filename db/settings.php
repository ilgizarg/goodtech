<?php
// db settings

$host = 'localhost';
$db   = 'i91739qq_bd';
$user = "i91739qq_bd";
$pass = "mklP54sd";
$dsn = "mysql:host=$host;dbname=$db";

$opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];


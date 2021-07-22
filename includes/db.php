<?php

require 'Medoo.php';

use Medoo\Medoo;


try {
    $database = new Medoo([
        'type' => 'mysql',
        'host' => 'localhost',
        'database' => 'emails',
        'username' => 'root',
        'password' => 'root'
    ]);
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}

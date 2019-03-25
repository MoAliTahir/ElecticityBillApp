<?php
    $dsn = 'mysql:dbname=electricity;host=localhost';
    $user = 'root';
    $password = '';

    try {
        $db = new PDO($dsn, $user, $password);            
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }




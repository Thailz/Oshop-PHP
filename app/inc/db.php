<?php

    $dsn      = "mysql:host=localhost;dbname=OshopDB";
    $login    = "root";     // Sur vos VM, c'est "explorateur"
    $password = "92e524b7"; // Sur vos VM, c'est "Ereul9Aeng" 

    $pdo = new PDO( $dsn, $login, $password, [ PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING ] );
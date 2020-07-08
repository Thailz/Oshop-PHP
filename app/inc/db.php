<?php

    $dsn      = "mysql:host=localhost;dbname=OshopDB";
    $login    = "explorateur";     // Sur vos VM, c'est "explorateur"
    $password = "Ereul9Aeng"; // Sur vos VM, c'est "Ereul9Aeng" 

    $pdo = new PDO( $dsn, $login, $password, [ PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING ] );
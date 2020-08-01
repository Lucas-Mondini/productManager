<?php

    //configurações do DB
    
    $host   = "localhost";
    $DB     = "desafio_softexpert";
    $user   = "postgres";
    $pass   = "123321";
    $dsn    = "pgsql:host=".$host.";dbname=".$DB.";user=".$user.";password=".$pass;
    $pdo = new PDO($dsn);


?>
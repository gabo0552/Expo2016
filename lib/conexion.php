<?php
    $host = 'localhost';
    $username = 'expo';
    $password = ':58453205@';
    $database = 'expo';
    try
    {
        $PDO = new PDO("mysql:host=".$host."; dbname=".$database, $username, $password);
    }
    catch(PDOException $e)
    {
        die($e->getMessage());
    }
?>
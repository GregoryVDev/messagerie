<?php

try {
    $server_name = "db";
    $db_name = "messagerie";
    $user_name = "test";
    $password = "test";
    $db = new PDO("mysql:host=$server_name; dbname=$db_name;charset=utf8mb4", $user_name, $password);
} catch (PDOException $e) {
    echo "Échec de connexion : " . $e->getMessage();
}

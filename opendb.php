<?php
session_start();
try {
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $database = "cookbookdb";
    $pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
} catch (PDOException $e) {
    echo $e->getMessage();
}

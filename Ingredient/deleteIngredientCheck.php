<?php
include 'opendb.php';
include 'debug.php';

try{
    if(!empty($_POST) && isset($_POST['id'])){
        $pdo->exec("DELETE FROM ingredient_models WHERE id=\"{$_POST['id']}\"");
    }else{
        debug_to_console("your request is empty");
    }
}catch (PDOException $e) {
    debug_to_console($e->getMessage());
}

header('HTTP/1.1 200 OK');
header('Location: http://'.$_SERVER['HTTP_HOST'].'/cookBookPHP/ingredients.php');

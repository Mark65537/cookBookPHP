<?php
include 'opendb.php';
include 'layout.php';

try{
    if(!empty($_POST)){
        if(isset($_POST['name']) && isset($_POST['measure']))
            $pdo->exec("INSERT INTO ingredient_models ( name, measure ) 
                                values ( \"{$_POST['name']}\", \"{$_POST['measure']}\" )");
        else
            debug_to_console("your request is unset");
    }else{
        debug_to_console("your request is empty");
    }
}catch (PDOException $e) {
    debug_to_console($e->getMessage());
}

header('HTTP/1.1 200 OK');
header('Location: http://'.$_SERVER['HTTP_HOST'].'/cookBookPHP/ingredients.php');
<?php
include 'opendb.php';

if(!empty($_POST)){
    if(isset($_POST['name']))
    $pdo->exec("INSERT INTO recipe_models ( name,ingredients, steps, foto ) 
                    values ( \"{$_POST['name']}\", \"{$_POST['ingredients']}\" , \"{$_POST['steps']}\", \"{$_POST['foto']}\")");
}



header('HTTP/1.1 200 OK');
header('Location: http://'.$_SERVER['HTTP_HOST'].'/cookBookPHP/recipes.php');

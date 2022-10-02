<?php
include 'opendb.php';
include_once('fileFuncs.php');

//echo '$_FILES=';
//var_dump($_FILES);
//echo '$_POST=';
//var_dump($_POST);

try {
    // если была произведена отправка формы
    if(isset($_FILES['foto'])) {
        // проверяем, можно ли загружать изображение
        $check = can_upload($_FILES['foto']);

        if($check === true){
            // загружаем изображение на сервер
            $newFileName=make_upload($_FILES['foto']);
            echo "<strong>Файл успешно загружен!</strong>";
        }
        else{
            // выводим сообщение об ошибке
            echo "<strong>$check</strong>";
            exit();
        }
    }

    if (!empty($_POST)) {
        if (isset($_POST['name']) && !empty($_POST['name']))
            $pdo->exec("INSERT INTO recipe_models ( name,ingredients, steps, foto ) 
                    values ( \"{$_POST['name']}\", \"{$_POST['ingredients']}\" , \"{$_POST['steps']}\", \"{$newFileName}\")");
    }
}catch (PDOException $e) {
    echo $e->getMessage();
}

header('HTTP/1.1 200 OK');
header('Location: http://'.$_SERVER['HTTP_HOST'].'/cookBookPHP/recipes.php');

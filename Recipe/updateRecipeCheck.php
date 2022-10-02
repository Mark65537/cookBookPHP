<?php
include 'opendb.php';
include 'debug.php';
include_once('fileFuncs.php');

echo '$_FILES=';
var_dump($_FILES);
echo '$_POST=';
var_dump($_POST);

try{
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
    if(!empty($_POST) && isset($_POST['id'])){
        $pdo->exec("UPDATE recipe_models SET name = \"{$_POST['name']}\", ingredients=\"{$_POST['ingredients']}\",
                                steps=\"{$_POST['steps']}\", foto = \"{$newFileName}\"
                             WHERE id=\"{$_POST['id']}\"");
    }else{
        debug_to_console("your request is empty");
    }
}catch (PDOException $e) {
    debug_to_console($e->getMessage());
}

//header('HTTP/1.1 200 OK');
//header('Location: http://'.$_SERVER['HTTP_HOST'].'/cookBookPHP/recipes.php');

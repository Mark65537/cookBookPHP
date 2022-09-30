<?php
function check($variable){
//если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт    
   if (empty($variable)) {
     exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!<a href='index.html'>возврат</a>");
    }
//если логин и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести  
   $variable = stripslashes($variable);
   $variable = htmlspecialchars($variable);
//удаляем лишние пробелы
   $variable = trim($variable);
   return $variable;
}

function registration($db){
   $login = $_POST['login'];
   $password=$_POST['password'];
   $login=check($login);
   $password=check($password);
// проверка на существование пользователя с таким же логином
   $result = mysql_query("SELECT id FROM users WHERE login='$login'",$db);//output: Resource id #"number of id" 
   $myrow = mysql_fetch_array($result);
   
   if (!empty($myrow['id'])) {
    echo "Извините, введённый вами логин уже зарегистрирован. Введите другой логин.<a href='index.html'>возврат</a>";
	exit ();	
    }
// если такого нет, то сохраняем данные
   $result2 = mysql_query ("INSERT INTO users (login,password) VALUES('$login','$password')");
// Проверяем, есть ли ошибки
    if ($result2=='TRUE') {
    echo "Вы успешно зарегистрированы! Теперь вы можете зайти на сайт. <a href='chat.php'>Главная страница</a>";
     }
    else {
    echo "Ошибка! Вы не зарегистрированы.<a href='index.html'>возврат</a>";
     } 
}

function login($db){
   $login = $_POST['login']; 
   $password=$_POST['password'];
   $login=check($login);
   $password=check($password);
// проверка на существование пользователя с таким же логином
   $result = mysql_query($db,"SELECT id FROM users WHERE login='$login'");
   $myrow = mysql_fetch_array($result);
   
   if (!empty($myrow['id'])) {
    echo "Вы успешно вошли! Теперь вы можете зайти на сайт. <a href='chat.php'>Главная страница</a>";
    }
    else {
    echo "Ошибка! Вы не зарегистрированы.";
     } 
}

//***начало main
 //подключаемся к базе данных
    include 'opendb.php';   

/*    echo "<pre>";
   print_r($_POST);
   echo "</pre>";*/ 
	 
    if($_POST['but']=="Зарегистрироваться"){
     registration($db);
    }
	else if($_POST['but']=="войти"){
	 login($db);
    }else
		echo "имя не соответствует";
//***конец main
?>
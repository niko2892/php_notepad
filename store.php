<?php 

$pdo = new PDO("mysql:host=localhost; dbname=test", "root", "root");
$sql = "INSERT INTO tasks (title, content) VALUES (:title, :content)"; //готовлю метки title u content для загрузки в БД
$statement = $pdo->prepare($sql); //готовлю запрос
// $statement->bindParam(":title", $_POST['title']); //привязываю метки к значениям из массива tasks
// $statement->bindParam(":content", $_POST['content']);
$statement->execute($_POST); //выполняю запрос (возвращает true/false. Проверка через var_dump)
                             //execute самостоятельно привязвает метки к значениям массива из $_POST
header("Location: /php_practice/");exit; //Переадресация на главную страницу
?>
<?php 

require 'database/querybuilder.php';

$db = new QueryBuilder;

$db->store("tasks", $_POST); //в post лежит массив, переданый с вызывающей страницы
header("Location: /php_practice/"); //Переадресация на главную страницу
?>
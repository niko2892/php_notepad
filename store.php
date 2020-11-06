<?php 

require 'database/querybuilder.php';

$db = new QueryBuilder;

$db->addTask($_POST);
header("Location: /php_practice/"); //Переадресация на главную страницу
?>
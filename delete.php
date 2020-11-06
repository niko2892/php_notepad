<?php
require 'database/querybuilder.php'; //подключаю файл с клиентом

$db = new QueryBuilder;

$id = $_GET['id'];

$db->deleteTask($id);

header("Location: /php_practice/"); exit; 

?>
<?php 
require 'database/querybuilder.php';

$db = new QueryBuilder;

$data = [
    "id" => $_GET['id'],
    "title" => $_POST['title'],
    "content" => $_POST['content']
];

$db->updateTask($data);
header("Location: /php_practice/");exit; 
?>